<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Disukai;
use App\Models\User;
use App\Models\LiveStreaming;
use App\Models\LiveStreamingFasilitas;
use App\Models\LiveStreamingKategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class LiveStreamingController extends Controller
{
    public function index(Request $request)
    {
        $liveStreaming = new LiveStreaming();
        $liveStreaming = $liveStreaming->orderBy("id", "DESC");

        if ($request->limit) {

            $liveStreaming = $liveStreaming->limit($request->limit)->get();
        } elseif ($request->where) {

            $liveStreaming = DB::select("select * from live_streaming where $request->where");
        } else {
            $liveStreaming = $liveStreaming->get();
        }

        return response()->json([
            "success" => true,
            'data' => $liveStreaming
        ]);
    }

}