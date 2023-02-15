<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Disukai;
use App\Models\GerejakuDilihat;
use App\Models\GerejakuDilihatFasilitas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class GerejakuDilihatController extends Controller
{
    public function index(Request $request)
    {
        $gerejakuDilihat = new GerejakuDilihat();
        
        if ($request->limit) {

            $gerejakuDilihat = $gerejakuDilihat->with(['gerejaku'])->limit($request->limit)->get();
        }
        
        if ($request->where) {

            $gerejakuDilihat = DB::select("select * from gerejaku_dilihat where $request->where");
        }
        
        else {
            $gerejakuDilihat = $gerejakuDilihat->with(['gerejaku'])->all();
        }

        return response()->json([
            "success" => true,
            'data' => $gerejakuDilihat
        ]);
    }

}