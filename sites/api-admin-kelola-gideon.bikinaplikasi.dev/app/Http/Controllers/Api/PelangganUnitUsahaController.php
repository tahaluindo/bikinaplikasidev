<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Disukai;
use App\Models\PelangganUnitUsaha;
use App\Models\PelangganUnitUsahaFasilitas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class PelangganUnitUsahaController extends Controller
{
    public function model()
    {
        $pelangganUnitUsaha = new PelangganUnitUsaha();
        
        return $pelangganUnitUsaha->with(['pelanggan', 'unit_usaha'])->first();
    }
    
    public function index(Request $request)
    {
        $pelangganUnitUsaha = new PelangganUnitUsaha();

        if ($request->limit) {

            $pelangganUnitUsaha = $pelangganUnitUsaha->with(['pelanggan', 'unit_usaha'])->limit($request->limit)->get();
        }
        
        if ($request->where) {

            $pelangganUnitUsaha = DB::select("select * from pelanggan_unit_usaha where $request->where");
        }
        
        else {
            $pelangganUnitUsaha = $pelangganUnitUsaha->with(['pelanggan', 'unit_usaha'])->get();
        }

        return response()->json([
            "success" => true,
            'data' => $pelangganUnitUsaha
        ]);
    }

}