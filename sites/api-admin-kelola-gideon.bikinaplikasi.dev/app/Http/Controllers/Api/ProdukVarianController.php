<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Disukai;
use App\Models\ProdukVarian;
use App\Models\ProdukVarianFasilitas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class ProdukVarianController extends Controller
{
    public function model()
    {
        $produkVarian = new ProdukVarian();
        
        return $produkVarian->first();
    }
    
    public function index(Request $request)
    {
        $produkVarian = new ProdukVarian();

        if ($request->limit) {

            $produkVarian = $produkVarian->limit($request->limit)->get();
        }
        
        if ($request->where) {

            $produkVarian = DB::select("select * from produk_varian where $request->where");
        }
        
        else {
            $produkVarian = $produkVarian->get();
        }

        return response()->json([
            "success" => true,
            'data' => $produkVarian
        ]);
    }

}