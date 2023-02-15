<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Disukai;
use App\Models\LokasiUsaha;
use App\Models\LokasiUsahaFasilitas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class LokasiUsahaController extends Controller
{
    public function model()
    {
        $lokasiUsaha = new LokasiUsaha();
        
        return $lokasiUsaha->first();
    }
    
    public function index(Request $request)
    {
        $lokasiUsaha = new LokasiUsaha();

        if ($request->limit) {

            $lokasiUsaha = $lokasiUsaha->limit($request->limit)->get();
        }
        
        if ($request->where) {

            $lokasiUsaha = DB::select("select * from lokasi_usaha where $request->where");
        }
        
        else {
            $lokasiUsaha = $lokasiUsaha->get();
        }

        return response()->json([
            "success" => true,
            'data' => $lokasiUsaha
        ]);
    }

}