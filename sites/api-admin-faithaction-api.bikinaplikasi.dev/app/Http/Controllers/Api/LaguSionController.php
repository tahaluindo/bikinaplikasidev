<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Disukai;
use App\Models\LaguSion;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class LaguSionController extends Controller
{
    public function index(Request $request)
    {
        $laguSion = new LaguSion();
        
        if($request->keyword) {
            $laguSion = $laguSion->where("judul", 'like', '%' . $request->keyword . '%');
        }
        
        if ($request->limit) {

            $laguSion = $laguSion->limit($request->limit)->get();
        }
        
        elseif ($request->where) {

            $laguSion = DB::select("select * from lagu_sion where $request->where");
        }
        
        else {
            $laguSion = $laguSion->all();
        }

        return response()->json([
            "success" => true,
            'data' => $laguSion
        ]);
    }

}