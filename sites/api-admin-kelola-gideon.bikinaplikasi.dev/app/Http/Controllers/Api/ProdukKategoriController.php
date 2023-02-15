<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Disukai;
use App\Models\ProdukKategori;
use App\Models\ProdukKategoriFasilitas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class ProdukKategoriController extends Controller
{
    public function model()
    {
        $produkKategori = new ProdukKategori();
        
        return $produkKategori->first();
    }
    
    public function index(Request $request)
    {
        $produkKategori = new ProdukKategori();

        if ($request->limit) {

            $produkKategori = $produkKategori->limit($request->limit)->get();
        }
        
        if ($request->where) {

            $produkKategori = DB::select("select * from produk_kategori where $request->where");
        }
        
        else {
            $produkKategori = $produkKategori->get();
        }

        return response()->json([
            "success" => true,
            'data' => $produkKategori
        ]);
    }

}