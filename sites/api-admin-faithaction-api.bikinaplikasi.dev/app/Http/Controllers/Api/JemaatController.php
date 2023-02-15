<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Disukai;
use App\Models\Jemaat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class JemaatController extends Controller
{
    public function index(Request $request)
    {
        $jemaat = new Jemaat();
        
        if ($request->limit) {

            $jemaat = $jemaat->with(['gereja'])->limit($request->limit)->get();
        }
        
        elseif ($request->where) {

            $jemaat = DB::select("select * from jemaat where $request->where");
        }
        
        else {
            $jemaat = $jemaat->with(['gereja'])->get();
        }

        return response()->json([
            "success" => true,
            'data' => $jemaat
        ]);
    }

}