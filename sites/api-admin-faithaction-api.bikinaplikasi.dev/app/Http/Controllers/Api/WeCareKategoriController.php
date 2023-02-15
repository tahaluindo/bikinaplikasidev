<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Disukai;
use App\Models\WeCareKategori;
use App\Models\WeCareKategoriFasilitas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class WeCareKategoriController extends Controller
{
    public function index(Request $request)
    {
        $weCareKategori = new WeCareKategori();
                
        if ($request->limit) {

            $weCareKategori = $weCareKategori->with([])->limit($request->limit)->get();
        }
        
        if ($request->where) {

            $weCareKategori = DB::select("select * from we_care_kategori where $request->where");
        }
        
        else {
            $weCareKategori = $weCareKategori->with([])->get();
        }

        return response()->json([
            "success" => true,
            'data' => $weCareKategori
        ]);
    }

}