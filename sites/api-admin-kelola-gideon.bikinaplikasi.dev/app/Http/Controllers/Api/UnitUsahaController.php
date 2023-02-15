<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Disukai;
use App\Models\UnitUsaha;
use App\Models\UnitUsahaFasilitas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class UnitUsahaController extends Controller
{
    public function model()
    {
        $unitUsaha = new UnitUsaha();
        
        return $unitUsaha->with(['lokasi_usaha', 'jenis_usaha'])->first();
    }
    
    public function index(Request $request)
    {
        $unitUsaha = new UnitUsaha();

        if ($request->limit) {

            $unitUsaha = $unitUsaha->with(['lokasi_usaha', 'jenis_usaha'])->limit($request->limit)->get();
        }
        
        if ($request->where) {

            $unitUsaha = DB::select("select * from unit_usaha where $request->where");
        }
        
        else {
            $unitUsaha = $unitUsaha->with(['lokasi_usaha', 'jenis_usaha'])->get();
        }

        return response()->json([
            "success" => true,
            'data' => $unitUsaha
        ]);
    }

}