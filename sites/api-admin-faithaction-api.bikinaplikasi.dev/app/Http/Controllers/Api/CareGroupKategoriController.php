<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Disukai;
use App\Models\CareGroupKategori;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class CareGroupKategoriController extends Controller
{
    public function index(Request $request)
    {
        $careGroupKategori = new CareGroupKategori();
        
        if ($request->limit) {

            $careGroupKategori = $careGroupKategori->limit($request->limit)->get();
        }
        
        elseif ($request->where) {

            $careGroupKategori = DB::select("select * from care_group_kategori where $request->where");
        }
        
        else {
            $careGroupKategori = $careGroupKategori->all();
        }

        return response()->json([
            "success" => true,
            'data' => $careGroupKategori
        ]);
    }

}