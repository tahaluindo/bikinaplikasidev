<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Disukai;
use App\Models\GerejakuKategori;
use App\Models\GerejakuKategoriFasilitas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class GerejakuKategoriController extends Controller
{
    public function index(Request $request)
    {
        $gerejakuKategori = new GerejakuKategori();
        
        if ($request->limit) {

            $gerejakuKategori = $gerejakuKategori->with(['gerejaku'])->limit($request->limit)->get();
        }
        
        if ($request->where) {

            $gerejakuKategori = DB::select("select * from gerejaku_kategori where $request->where");
        }
        
        else {
            $gerejakuKategori = $gerejakuKategori->with(['gerejaku'])->get();
        }

        return response()->json([
            "success" => true,
            'data' => $gerejakuKategori
        ]);
    }

}