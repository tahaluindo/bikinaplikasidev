<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Disukai;
use App\Models\Supplier;
use App\Models\SupplierFasilitas;
use App\Models\SupplierGambar;
use App\Models\SupplierShareRevenue;
use App\Models\SupplierUnitUsaha;
use App\Models\SupplierVarian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class SupplierController extends Controller
{
    protected $relations = ['unit_usaha.lokasi_usaha', 'unit_usaha.jenis_usaha', 'dari_rekening', 'ke_rekening'];
    
    public function model()
    {
        $supplier = new Supplier();

        return $supplier->with($this->relations)->first();
    }

    public function index(Request $request)
    {        
        $supplier = new Supplier();

        $supplier = $supplier->with($this->relations);

        if ($request->last_id) {
            $supplier = $supplier->where('id', '>', $request->last_id);
        }

        if ($request->unit_usaha_id) {
            $supplier = $supplier->whereHas("supplier_unit_usahas", function ($query) use ($request) {
                return $query->where('unit_usaha_id', $request->unit_usaha_id);
            });
        }

        if ($request->limit) {

            $supplier = $supplier->limit($request->limit);
        }

        if ($request->where) {

            $supplier = DB::select("select * from supplier where $request->where");
        }

        $supplier = $supplier->get();

        return response()->json([
            "success" => true,
            'data' => $supplier
        ]);
    }

    public function store(Request $request)
    {
        $requestData = json_decode($request->all()['data'], true);

        if (!count($requestData['supplier_varians'])) {
            $validator = Validator::make($requestData, [
                'nama' => 'required|string|max:40|unique:supplier,nama',
                'supplier_kategori_id' => 'required',
                'supplier_satuan_id' => 'required',
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
        } elseif (count($requestData['supplier_varians'])) {
            $validator = Validator::make($requestData, [
                'nama' => 'required|string|max:40',
                'supplier_kategori_id' => 'required',
                'supplier_varians.namaVarian.*' => 'required|distinct',
                'supplier_varians.hargaJual.*' => 'required',
                'supplier_varians.stokTersedia.*' => 'required',
                'supplier_varians.hargaModal.*' => 'required',
                'supplier_varians.supplierSatuanId.*' => 'required',
                'supplier_varians.satuan.*' => 'required',
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
            if (!count($requestData['supplier_varians'])) {
                $supplierCreate = Supplier::create([
                    'nama' => $requestData['nama'],
                    'supplier_kategori_id' => $requestData['supplier_kategori_id'],
                    'supplier_satuan_id' => $requestData['supplier_satuan_id'],
                    'hargaJual' => $requestData['hargaJual'],
                    'hargaBeli' => $requestData['hargaBeli'],
                    'stok' => $requestData['stok'],
                    'barcode' => $requestData['barcode'],
                ]);
            }

            if (count($requestData['supplier_varians'])) {
                $supplierCreate = Supplier::create([
                    'nama' => $requestData['nama'],
                    'supplier_kategori_id' => $requestData['supplier_kategori_id'],
                    'barcode' => $requestData['barcode'],
                ]);
            }

            if (count($requestData['share_revenues'])) {
                foreach ($requestData['share_revenues'] as $item) {

                    SupplierShareRevenue::create([
                        'supplier_id' => $supplierCreate->id,
                        'kas_rekening_id' => $item['kasRekeningId'],
                        'dalam' => $item['jumlahRevenueSatuan'],
                        'jumlah' => $item['jumlahRevenue'],
                    ]);
                }
            }

            if (count($requestData['supplier_varians'])) {
                foreach ($requestData['supplier_varians'] as $item) {
                    SupplierVarian::create([
                        'supplier_id' => $supplierCreate->id,
                        'supplier_satuan_id' => $item['supplierSatuanId'],
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

                    SupplierGambar::create([
                        'supplier_id' => $supplierCreate->id,
                        'gambar' => $gambar
                    ]);
                }
            }

            foreach ($requestData['unit_usaha_ids'] as $item) {
                SupplierUnitUsaha::create([
                    'supplier_id' => $supplierCreate->id,
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