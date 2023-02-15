<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Disukai;
use App\Models\Keuangan;
use App\Models\KeuanganFasilitas;
use App\Models\KeuanganGambar;
use App\Models\KeuanganShareRevenue;
use App\Models\KeuanganUnitUsaha;
use App\Models\KeuanganVarian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class KeuanganController extends Controller
{
    protected $relations = ['unit_usaha.lokasi_usaha', 'unit_usaha.jenis_usaha', 'dari_rekening', 'ke_rekening'];
    
    public function model()
    {
        $keuangan = new Keuangan();

        return $keuangan->with($this->relations)->first();
    }

    public function index(Request $request)
    {        
        $keuangan = new Keuangan();

        $keuangan = $keuangan->with($this->relations);

        if ($request->last_id) {
            $keuangan = $keuangan->where('id', '>', $request->last_id);
        }

        if ($request->unit_usaha_id) {
            $keuangan = $keuangan->whereHas("keuangan_unit_usahas", function ($query) use ($request) {
                return $query->where('unit_usaha_id', $request->unit_usaha_id);
            });
        }

        if ($request->limit) {

            $keuangan = $keuangan->limit($request->limit);
        }

        if ($request->where) {

            $keuangan = DB::select("select * from keuangan where $request->where");
        }

        $keuangan = $keuangan->get();

        return response()->json([
            "success" => true,
            'data' => $keuangan
        ]);
    }

    public function store(Request $request)
    {
        $requestData = json_decode($request->all()['data'], true);

        if (!count($requestData['keuangan_varians'])) {
            $validator = Validator::make($requestData, [
                'nama' => 'required|string|max:40|unique:keuangan,nama',
                'keuangan_kategori_id' => 'required',
                'keuangan_satuan_id' => 'required',
                'hargaJual' => 'required',
                'hargaBeli' => 'required',
                'stok' => 'required',
                'barcode' => 'required',
                'user_id' => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    "success" => false,
                    "message" => $validator->errors()
                ]);
            }
        } elseif (count($requestData['keuangan_varians'])) {
            $validator = Validator::make($requestData, [
                'nama' => 'required|string|max:40',
                'keuangan_kategori_id' => 'required',
                'keuangan_varians.namaVarian.*' => 'required|distinct',
                'keuangan_varians.hargaJual.*' => 'required',
                'keuangan_varians.stokTersedia.*' => 'required',
                'keuangan_varians.hargaModal.*' => 'required',
                'keuangan_varians.keuanganSatuanId.*' => 'required',
                'keuangan_varians.satuan.*' => 'required',
                'barcode' => 'required',
                'user_id' => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    "success" => false,
                    "message" => $validator->errors()
                ]);
            }
        }

        if (count($requestData['share_revenues'])) {
            $validator = Validator::make($requestData, [
                'kasRekeningId.*' => 'required|distinct',
                'kasRekening.*' => 'required',
                'jumlahRevenue.*' => 'required',
                'jumlahRevenueSatuan.*' => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    "success" => false,
                    "message" => $validator->errors()
                ]);
            }
        }

        $validator = Validator::make($requestData, [
            'unit_usaha_ids.*' => 'required|distinct',
        ]);

        if ($validator->fails()) {
            return response()->json([
                "success" => false,
                "message" => $validator->errors()
            ]);
        }


        DB::transaction(function () use ($request, $requestData) {
            if (!count($requestData['keuangan_varians'])) {
                $keuanganCreate = Keuangan::create([
                    'nama' => $requestData['nama'],
                    'keuangan_kategori_id' => $requestData['keuangan_kategori_id'],
                    'keuangan_satuan_id' => $requestData['keuangan_satuan_id'],
                    'hargaJual' => $requestData['hargaJual'],
                    'hargaBeli' => $requestData['hargaBeli'],
                    'stok' => $requestData['stok'],
                    'barcode' => $requestData['barcode'],
                ]);
            }

            if (count($requestData['keuangan_varians'])) {
                $keuanganCreate = Keuangan::create([
                    'nama' => $requestData['nama'],
                    'keuangan_kategori_id' => $requestData['keuangan_kategori_id'],
                    'barcode' => $requestData['barcode'],
                ]);
            }

            if (count($requestData['share_revenues'])) {
                foreach ($requestData['share_revenues'] as $item) {

                    KeuanganShareRevenue::create([
                        'keuangan_id' => $keuanganCreate->id,
                        'kas_rekening_id' => $item['kasRekeningId'],
                        'dalam' => $item['jumlahRevenueSatuan'],
                        'jumlah' => $item['jumlahRevenue'],
                    ]);
                }
            }

            if (count($requestData['keuangan_varians'])) {
                foreach ($requestData['keuangan_varians'] as $item) {
                    KeuanganVarian::create([
                        'keuangan_id' => $keuanganCreate->id,
                        'keuangan_satuan_id' => $item['keuanganSatuanId'],
                        'namaVarian' => $item['namaVarian'],
                        'hargaJual' => $item['hargaJual'],
                        'hargaModal' => $item['hargaModal'],
                        'stok' => $item['stokTersedia'],
                    ]);
                }
            }

            file_put_contents("update.json", json_encode($request->allFiles()));

            if ($request->hasFile('gambar0')) {
                foreach ($request->allFiles() as $key => $allFile) {
                    $gambar = str_replace("\\", "/", $request->file($key)
                        ->move('uploads', time() . "." . $request->file($key)->getClientOriginalExtension()));

                    KeuanganGambar::create([
                        'keuangan_id' => $keuanganCreate->id,
                        'gambar' => $gambar
                    ]);
                }
            }

            foreach ($requestData['unit_usaha_ids'] as $item) {
                KeuanganUnitUsaha::create([
                    'keuangan_id' => $keuanganCreate->id,
                    'unit_usaha_id' => $item
                ]);
            }
        });

        return response()->json([
            "success" => true,
            "message" => ""
        ]);
    }

}