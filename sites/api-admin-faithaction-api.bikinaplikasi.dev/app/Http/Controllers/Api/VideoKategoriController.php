<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Disukai;
use App\Models\VideoKategori;
use App\Models\VideoKategoriFasilitas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class VideoKategoriController extends Controller
{
    public function index(Request $request)
    {
        $videoKategori = new VideoKategori();
        
        if ($request->limit) {

            $videoKategori = $videoKategori->with(['video'])->limit($request->limit)->get();
        }
        
        if ($request->where) {

            $videoKategori = DB::select("select * from video_kategori where $request->where");
        }
        
        else {
            $videoKategori = $videoKategori->with(['video'])->all();
        }

        return response()->json([
            "success" => true,
            'data' => $videoKategori
        ]);
    }

}