<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Disukai;
use App\Models\Produk;
use App\Models\ProdukFasilitas;
use App\Models\ProdukGambar;
use App\Models\ProdukShareRevenue;
use App\Models\ProdukUnitUsaha;
use App\Models\ProdukVarian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ProdukController extends Controller
{
    public function model()
    {
        $produk = new Produk();

        return $produk->with(['produk_gambars', 'produk_kategori', 'produk_satuan', 'produk_share_revenues.kas_rekening.metode_pembayaran', 'produk_varians', 'produk_unit_usaha'])->first();
    }

    public function index(Request $request)
    {
        $produk = new Produk();

        $produk = $produk->with(['produk_gambars', 'produk_kategori', 'produk_satuan', 'produk_share_revenues.kas_rekening.metode_pembayaran', 'produk_varians', 'produk_unit_usaha']);

        if ($request->last_id) {
            $produk = $produk->where('id', '>', $request->last_id);
        }

        if ($request->unit_usaha_id) {
            $produk = $produk->whereHas("produk_unit_usaha", function ($query) use ($request) {
                return $query->where('unit_usaha_id', $request->unit_usaha_id);
            });
        }

        if ($request->limit) {

            $produk = $produk->where(['status' => 'Aktif'])->limit($request->limit);
        }

        if ($request->where) {

            $produk = DB::select("select * from produk where $request->where");
        }

        $produk = $produk->get();

        return response()->json([
            "success" => true,
            'data' => $produk
        ]);
    }

    public function store(Request $request)
    {
        $requestData = json_decode($request->all()['data'], true);

        if (!count($requestData['produk_varians'])) {
            $validator = Validator::make($requestData, [
                'nama' => 'required|string|max:40|unique:produk,nama',
                'produk_kategori_id' => 'required',
                'produk_satuan_id' => 'required',
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
        } elseif (count($requestData['produk_varians'])) {
            $validator = Validator::make($requestData, [
                'nama' => 'required|string|max:40',
                'produk_kategori_id' => 'required',
                'produk_varians.namaVarian.*' => 'required|distinct',
                'produk_varians.hargaJual.*' => 'required',
                'produk_varians.stokTersedia.*' => 'required',
                'produk_varians.hargaModal.*' => 'required',
                'produk_varians.produkSatuanId.*' => 'required',
                'produk_varians.satuan.*' => 'required',
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
            if (!count($requestData['produk_varians'])) {
                $produkCreate = Produk::create([
                    'nama' => $requestData['nama'],
                    'produk_kategori_id' => $requestData['produk_kategori_id'],
                    'produk_satuan_id' => $requestData['produk_satuan_id'],
                    'hargaJual' => $requestData['hargaJual'],
                    'hargaBeli' => $requestData['hargaBeli'],
                    'stok' => $requestData['stok'],
                    'barcode' => $requestData['barcode'],
                ]);
            }

            if (count($requestData['produk_varians'])) {
                $produkCreate = Produk::create([
                    'nama' => $requestData['nama'],
                    'produk_kategori_id' => $requestData['produk_kategori_id'],
                    'barcode' => $requestData['barcode'],
                ]);
            }

            if (count($requestData['share_revenues'])) {
                foreach ($requestData['share_revenues'] as $item) {

                    ProdukShareRevenue::create([
                        'produk_id' => $produkCreate->id,
                        'kas_rekening_id' => $item['kasRekeningId'],
                        'dalam' => $item['jumlahRevenueSatuan'],
                        'jumlah' => $item['jumlahRevenue'],
                    ]);
                }
            }

            if (count($requestData['produk_varians'])) {
                foreach ($requestData['produk_varians'] as $item) {
                    ProdukVarian::create([
                        'produk_id' => $produkCreate->id,
                        'produk_satuan_id' => $item['produkSatuanId'],
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

                    ProdukGambar::create([
                        'produk_id' => $produkCreate->id,
                        'gambar' => $gambar
                    ]);
                }
            }

            foreach ($requestData['unit_usaha_ids'] as $item) {
                ProdukUnitUsaha::create([
                    'produk_id' => $produkCreate->id,
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