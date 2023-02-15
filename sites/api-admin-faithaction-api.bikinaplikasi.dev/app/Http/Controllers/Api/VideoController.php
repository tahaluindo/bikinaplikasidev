<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Disukai;
use App\Models\User;
use App\Models\Video;
use App\Models\VideoFasilitas;
use App\Models\VideoKategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class VideoController extends Controller
{
    public function index(Request $request)
    {
        $video = new Video();
        $video = $video->orderBy("id", "DESC");

        if ($request->videoKategori) {
            $videoKategori = VideoKategori::where('nama', $request->videoKategori)->first();
            if ($request->videoKategori != "Semua") {
                $video = $video->where('video_kategori_id', $videoKategori->id);
            }
        }

        if ($request->limit) {

            $video = $video->with(['video_kategori'])->limit($request->limit)->get();
        } elseif ($request->where) {

            $video = DB::select("select * from video where $request->where");
        } else {
            $video = $video->with(['video_kategori'])->get();
        }

        return response()->json([
            "success" => true,
            'data' => $video
        ]);
    }

}