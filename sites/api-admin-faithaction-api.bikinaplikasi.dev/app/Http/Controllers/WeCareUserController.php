<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Disukai;
use App\Models\WeCareUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class WeCareUserController extends Controller
{
    public function checkUser()
    {
        if (in_array(auth()->user()->level, ['Admin'])) {

        } else {
            die('Tidak ada hak akses!');
        }
    }

    public function index(Request $request)
    {
        $this->checkUser();
        $weCareUser = new WeCareUser();

        if ($request->limit) {

            $weCareUser = $weCareUser->with(['user'])->limit($request->limit)->get();
        } elseif ($request->where) {

            $weCareUser = DB::select("select * from we_care_user where $request->where");
        } else {
            $weCareUser = $weCareUser->with(['user'])->get();
        }

        return response()->json([
            "success" => true,
            'data' => $weCareUser
        ]);
    }

}