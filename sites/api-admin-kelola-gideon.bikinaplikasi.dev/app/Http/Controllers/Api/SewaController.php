<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Disukai;
use App\Models\Sewa;
use App\Models\SewaFasilitas;
use App\Models\SewaGambar;
use App\Models\SewaShareRevenue;
use App\Models\SewaUnitUsaha;
use App\Models\SewaVarian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class SewaController extends Controller
{
    public function model()
    {
        $sewa = new Sewa();

        return $sewa->with(['sewa_gambars', 'sewa_kategori', 'sewa_penyewaans.sewa_penyewaan_waktu_sewas.sewa_waktu_sewa', 'sewa_penyewaans.user', 'sewa_penyewaans.pelanggan', 'sewa_satuan', 'sewa_share_revenues.kas_rekening.metode_pembayaran', 'sewa_unit_usahas.unit_usaha.user', 'sewa_unit_usahas.unit_usaha.jenis_usaha','sewa_unit_usahas.unit_usaha.lokasi_usaha','sewa_waktu_sewa',])->first();
    }

    public function index(Request $request)
    {        
        $sewa = new Sewa();

        $sewa = $sewa->with(['sewa_gambars', 'sewa_kategori', 'sewa_penyewaans.sewa_penyewaan_waktu_sewas.sewa_waktu_sewa', 'sewa_penyewaans.user', 'sewa_penyewaans.pelanggan', 'sewa_satuan', 'sewa_share_revenues.kas_rekening.metode_pembayaran', 'sewa_unit_usahas.unit_usaha.user', 'sewa_unit_usahas.unit_usaha.jenis_usaha','sewa_unit_usahas.unit_usaha.lokasi_usaha','sewa_waktu_sewa',]);

        if ($request->last_id) {
            $sewa = $sewa->where('id', '>', $request->last_id);
        }

        if ($request->unit_usaha_id) {
            $sewa = $sewa->whereHas("sewa_unit_usahas", function ($query) use ($request) {
                return $query->where('unit_usaha_id', $request->unit_usaha_id);
            });
        }

        if ($request->limit) {

            $sewa = $sewa->where(['status' => 'Aktif'])->limit($request->limit);
        }

        if ($request->where) {

            $sewa = DB::select("select * from sewa where $request->where");
        }

        $sewa = $sewa->get();

        return response()->json([
            "success" => true,
            'data' => $sewa
        ]);
    }

    public function store(Request $request)
    {
        $requestData = json_decode($request->all()['data'], true);

        if (!count($requestData['sewa_varians'])) {
            $validator = Validator::make($requestData, [
                'nama' => 'required|string|max:40|unique:sewa,nama',
                'sewa_kategori_id' => 'required',
                'sewa_satuan_id' => 'required',
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
        } elseif (count($requestData['sewa_varians'])) {
            $validator = Validator::make($requestData, [
                'nama' => 'required|string|max:40',
                'sewa_kategori_id' => 'required',
                'sewa_varians.namaVarian.*' => 'required|distinct',
                'sewa_varians.hargaJual.*' => 'required',
                'sewa_varians.stokTersedia.*' => 'required',
                'sewa_varians.hargaModal.*' => 'required',
                'sewa_varians.sewaSatuanId.*' => 'required',
                'sewa_varians.satuan.*' => 'required',
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
            if (!count($requestData['sewa_varians'])) {
                $sewaCreate = Sewa::create([
                    'nama' => $requestData['nama'],
                    'sewa_kategori_id' => $requestData['sewa_kategori_id'],
                    'sewa_satuan_id' => $requestData['sewa_satuan_id'],
                    'hargaJual' => $requestData['hargaJual'],
                    'hargaBeli' => $requestData['hargaBeli'],
                    'stok' => $requestData['stok'],
                    'barcode' => $requestData['barcode'],
                ]);
            }

            if (count($requestData['sewa_varians'])) {
                $sewaCreate = Sewa::create([
                    'nama' => $requestData['nama'],
                    'sewa_kategori_id' => $requestData['sewa_kategori_id'],
                    'barcode' => $requestData['barcode'],
                ]);
            }

            if (count($requestData['share_revenues'])) {
                foreach ($requestData['share_revenues'] as $item) {

                    SewaShareRevenue::create([
                        'sewa_id' => $sewaCreate->id,
                        'kas_rekening_id' => $item['kasRekeningId'],
                        'dalam' => $item['jumlahRevenueSatuan'],
                        'jumlah' => $item['jumlahRevenue'],
                    ]);
                }
            }

            if (count($requestData['sewa_varians'])) {
                foreach ($requestData['sewa_varians'] as $item) {
                    SewaVarian::create([
                        'sewa_id' => $sewaCreate->id,
                        'sewa_satuan_id' => $item['sewaSatuanId'],
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

                    SewaGambar::create([
                        'sewa_id' => $sewaCreate->id,
                        'gambar' => $gambar
                    ]);
                }
            }

            foreach ($requestData['unit_usaha_ids'] as $item) {
                SewaUnitUsaha::create([
                    'sewa_id' => $sewaCreate->id,
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