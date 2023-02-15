<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Disukai;
use App\Models\ProdukGambar;
use App\Models\ProdukGambarFasilitas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class ProdukGambarController extends Controller
{
    public function model()
    {
        $produkGambar = new ProdukGambar();
        
        return $produkGambar->first();
    }
    
    public function index(Request $request)
    {
        $produkGambar = new ProdukGambar();

        if ($request->limit) {

            $produkGambar = $produkGambar->limit($request->limit)->get();
        }
        
        if ($request->where) {

            $produkGambar = DB::select("select * from produk_gambar where $request->where");
        }
        
        else {
            $produkGambar = $produkGambar->get();
        }

        return response()->json([
            "success" => true,
            'data' => $produkGambar
        ]);
    }

}