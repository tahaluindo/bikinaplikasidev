<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Dilihat;
use App\Models\BeritaDilihat;
use App\Models\BeritaDilihatFasilitas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class BeritaDilihatController extends Controller
{
    public function index(Request $request)
    {
        $beritaDilihat = new BeritaDilihat();
        
        if ($request->limit) {

            $beritaDilihat = $beritaDilihat->with(['berita_dilihat', 'user'])->limit($request->limit)->get();
        }
        
        elseif ($request->where) {

            $beritaDilihat = DB::select("select * from berita_dilihat where $request->where");
        }
        
        else {
            $beritaDilihat = $beritaDilihat->with(['berita_dilihat', 'user'])->get();
        }

        return response()->json([
            "success" => true,
            'data' => $beritaDilihat
        ]);
    }

}