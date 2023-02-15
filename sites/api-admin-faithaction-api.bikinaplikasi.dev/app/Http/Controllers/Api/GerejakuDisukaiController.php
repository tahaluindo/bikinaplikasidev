<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Disukai;
use App\Models\GerejakuDisukai;
use App\Models\GerejakuDisukaiFasilitas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class GerejakuDisukaiController extends Controller
{
    public function index(Request $request)
    {
        $gerejakuDisukai = new GerejakuDisukai();
        
        if ($request->limit) {

            $gerejakuDisukai = $gerejakuDisukai->with(['gerejaku'])->limit($request->limit)->get();
        }
        
        if ($request->where) {

            $gerejakuDisukai = DB::select("select * from gerejaku_disukai where $request->where");
        }
        
        else {
            $gerejakuDisukai = $gerejakuDisukai->with(['gerejaku'])->all();
        }

        return response()->json([
            "success" => true,
            'data' => $gerejakuDisukai
        ]);
    }

}