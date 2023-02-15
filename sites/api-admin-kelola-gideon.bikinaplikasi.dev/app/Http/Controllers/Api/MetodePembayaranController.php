<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Disukai;
use App\Models\MetodePembayaran;
use App\Models\MetodePembayaranFasilitas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class MetodePembayaranController extends Controller
{
    public function model()
    {
        $metodePembayaran = new MetodePembayaran();
        
        return $metodePembayaran->first();
    }
    
    public function index(Request $request)
    {
        $metodePembayaran = new MetodePembayaran();

        if ($request->limit) {

            $metodePembayaran = $metodePembayaran->limit($request->limit)->get();
        }
        
        if ($request->where) {

            $metodePembayaran = DB::select("select * from metode_pembayaran where $request->where");
        }
        
        else {
            $metodePembayaran = $metodePembayaran->get();
        }

        return response()->json([
            "success" => true,
            'data' => $metodePembayaran
        ]);
    }

}