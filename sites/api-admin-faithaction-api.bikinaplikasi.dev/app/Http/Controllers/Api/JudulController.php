<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Disukai;
use App\Models\Judul;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class JudulController extends Controller
{
    public function index(Request $request)
    {
        $judul = new Judul();
        
        if ($request->limit) {

            $judul = $judul->with(['bible'])->limit($request->limit)->get();
        }
        
        elseif ($request->where) {

            $judul = DB::select("select * from judul where $request->where");
        }
        
        else {
            $judul = $judul->with(['bible'])->get();
        }

        return response()->json([
            "success" => true,
            'data' => $judul
        ]);
    }

}