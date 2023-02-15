<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Disukai;
use App\Models\CareGroupVideo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class CareGroupVideoController extends Controller
{
    public function index(Request $request)
    {
        $careGroupVideo = new CareGroupVideo();
        
        $careGroupVideo = $careGroupVideo->where('status', 'Aktif');
        
        if ($request->limit) {

            $careGroupVideo = $careGroupVideo->limit($request->limit)->get();
        }
        
        elseif ($request->where) {

            $careGroupVideo = DB::select("select * from care_group_video where $request->where");
        }
        
        else {
            $careGroupVideo = $careGroupVideo->get();
        }

        return response()->json([
            "success" => true,
            'data' => $careGroupVideo
        ]);
    }

}