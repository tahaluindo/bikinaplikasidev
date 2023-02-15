<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Disukai;
use App\Models\Ayat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class AyatController extends Controller
{
    public function index(Request $request)
    {
        $ayat = new Ayat();
        
        if ($request->limit) {

            $ayat = $ayat->with(['bible'])->limit($request->limit)->get();
        }
        
        elseif ($request->where) {

            $ayat = DB::select("select * from ayat where $request->where");
        }
        
        else {
            $ayat = $ayat->with(['bible'])->get();
        }

        return response()->json([
            "success" => true,
            'data' => $ayat
        ]);
    }
}