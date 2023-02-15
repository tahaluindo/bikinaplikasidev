<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Disukai;
use App\Models\Custom;
use App\Models\CustomFasilitas;
use App\Models\CustomGambar;
use App\Models\CustomShareRevenue;
use App\Models\CustomUnitUsaha;
use App\Models\CustomVarian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CustomController extends Controller
{
    public function model()
    {
        $custom = new Custom();

        return $custom->with(['user', 'unit_usaha.lokasi_usaha', 'unit_usaha.jenis_usaha', 'metode_pembayaran', 'pelanggan'])->first();
    }

    public function index(Request $request)
    {        
        $custom = new Custom();

        $custom = $custom->with(['user', 'unit_usaha', 'metode_pembayaran', 'pelanggan']);

        if ($request->last_id) {
            $custom = $custom->where('id', '>', $request->last_id);
        }

        if ($request->unit_usaha_id) {
            $custom = $custom->whereHas("custom_unit_usahas", function ($query) use ($request) {
                return $query->where('unit_usaha_id', $request->unit_usaha_id);
            });
        }

        if ($request->limit) {

            $custom = $custom->limit($request->limit);
        }

        if ($request->where) {

            $custom = DB::select("select * from custom where $request->where");
        }

        $custom = $custom->get();

        return response()->json([
            "success" => true,
            'data' => $custom
        ]);
    }

    public function store(Request $request)
    {
        $requestData = json_decode($request->all()['data'], true);

        if (!count($requestData['custom_varians'])) {
            $validator = Validator::make($requestData, [
                'nama' => 'required|string|max:40|unique:custom,nama',
                'custom_kategori_id' => 'required',
                'custom_satuan_id' => 'required',
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
        } elseif (count($requestData['custom_varians'])) {
            $validator = Validator::make($requestData, [
                'nama' => 'required|string|max:40',
                'custom_kategori_id' => 'required',
                'custom_varians.namaVarian.*' => 'required|distinct',
                'custom_varians.hargaJual.*' => 'required',
                'custom_varians.stokTersedia.*' => 'required',
                'custom_varians.hargaModal.*' => 'required',
                'custom_varians.customSatuanId.*' => 'required',
                'custom_varians.satuan.*' => 'required',
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
            if (!count($requestData['custom_varians'])) {
                $customCreate = Custom::create([
                    'nama' => $requestData['nama'],
                    'custom_kategori_id' => $requestData['custom_kategori_id'],
                    'custom_satuan_id' => $requestData['custom_satuan_id'],
                    'hargaJual' => $requestData['hargaJual'],
                    'hargaBeli' => $requestData['hargaBeli'],
                    'stok' => $requestData['stok'],
                    'barcode' => $requestData['barcode'],
                ]);
            }

            if (count($requestData['custom_varians'])) {
                $customCreate = Custom::create([
                    'nama' => $requestData['nama'],
                    'custom_kategori_id' => $requestData['custom_kategori_id'],
                    'barcode' => $requestData['barcode'],
                ]);
            }

            if (count($requestData['share_revenues'])) {
                foreach ($requestData['share_revenues'] as $item) {

                    CustomShareRevenue::create([
                        'custom_id' => $customCreate->id,
                        'kas_rekening_id' => $item['kasRekeningId'],
                        'dalam' => $item['jumlahRevenueSatuan'],
                        'jumlah' => $item['jumlahRevenue'],
                    ]);
                }
            }

            if (count($requestData['custom_varians'])) {
                foreach ($requestData['custom_varians'] as $item) {
                    CustomVarian::create([
                        'custom_id' => $customCreate->id,
                        'custom_satuan_id' => $item['customSatuanId'],
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

                    CustomGambar::create([
                        'custom_id' => $customCreate->id,
                        'gambar' => $gambar
                    ]);
                }
            }

            foreach ($requestData['unit_usaha_ids'] as $item) {
                CustomUnitUsaha::create([
                    'custom_id' => $customCreate->id,
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