<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Disukai;
use App\Models\ProdukSatuan;
use App\Models\ProdukSatuanFasilitas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class ProdukSatuanController extends Controller
{
    public function model()
    {
        $produkSatuan = new ProdukSatuan();
        
        return $produkSatuan->first();
    }
    
    public function index(Request $request)
    {
        $produkSatuan = new ProdukSatuan();

        if ($request->limit) {

            $produkSatuan = $produkSatuan->limit($request->limit)->get();
        }
        
        if ($request->where) {

            $produkSatuan = DB::select("select * from produk_satuan where $request->where");
        }
        
        else {
            $produkSatuan = $produkSatuan->get();
        }

        return response()->json([
            "success" => true,
            'data' => $produkSatuan
        ]);
    }

}