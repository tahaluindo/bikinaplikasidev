<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Disukai;
use App\Models\WeCareUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class WeCareUserController extends Controller
{
    public function index(Request $request)
    {
        $weCareUser = new WeCareUser();
        
        if ($request->limit) {

            $weCareUser = $weCareUser->with(['user'])->limit($request->limit)->get();
        }
        
        elseif ($request->where) {

            $weCareUser = DB::select("select * from we_care_user where $request->where");
        }
        
        else {
            $weCareUser = $weCareUser->with(['user'])->get();
        }

        return response()->json([
            "success" => true,
            'data' => $weCareUser
        ]);
    }

}