<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Disukai;
use App\Models\WeCareVideo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class WeCareVideoController extends Controller
{
    public function checkUser()
    {
        if (in_array(auth()->video()->level, ['Admin'])) {

        } else {
            die('Tidak ada hak akses!');
        }
    }

    public function index(Request $request)
    {
        $this->checkUser();
        $weCareVideo = new WeCareVideo();

        if ($request->limit) {

            $weCareVideo = $weCareVideo->with(['video'])->limit($request->limit)->get();
        } elseif ($request->where) {

            $weCareVideo = DB::select("select * from we_care_video where $request->where");
        } else {
            $weCareVideo = $weCareVideo->with(['video'])->get();
        }

        return response()->json([
            "success" => true,
            'data' => $weCareVideo
        ]);
    }

}