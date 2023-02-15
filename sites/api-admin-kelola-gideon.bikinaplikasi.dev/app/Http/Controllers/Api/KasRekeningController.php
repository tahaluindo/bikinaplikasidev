<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Disukai;
use App\Models\KasRekening;
use App\Models\KasRekeningFasilitas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class KasRekeningController extends Controller
{
    public function model()
    {
        $kasRekening = new KasRekening();
        
        $kasRekening = $kasRekening->with(['metode_pembayaran']);
        
        return $kasRekening->first();
    }
    
    public function index(Request $request)
    {
        $kasRekening = new KasRekening();
        
        $kasRekening = $kasRekening->with(['metode_pembayaran']);

        if ($request->limit) {

            $kasRekening = $kasRekening->limit($request->limit)->get();
        }
        
        if ($request->where) {

            $kasRekening = DB::select("select * from kas_rekening where $request->where");
        }
        
        else {
            $kasRekening = $kasRekening->get();
        }

        return response()->json([
            "success" => true,
            'data' => $kasRekening
        ]);
    }

}