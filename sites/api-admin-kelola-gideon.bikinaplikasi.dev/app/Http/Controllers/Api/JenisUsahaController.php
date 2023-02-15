<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Disukai;
use App\Models\JenisUsaha;
use App\Models\JenisUsahaFasilitas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class JenisUsahaController extends Controller
{
    public function index(Request $request)
    {
        $jenisUsaha = new JenisUsaha();

        if ($request->limit) {

            $jenisUsaha = $jenisUsaha->limit($request->limit)->get();
        }
        
        if ($request->where) {

            $jenisUsaha = DB::select("select * from jenis_usaha where $request->where");
        }
        
        else {
            $jenisUsaha = $jenisUsaha->get();
        }

        return response()->json([
            "success" => true,
            'data' => $jenisUsaha
        ]);
    }

}