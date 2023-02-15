<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Disukai;
use App\Models\Gereja;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class GerejaController extends Controller
{
    public function index(Request $request)
    {
        $gereja = new Gereja();
        
        $gereja = $gereja->orderBy("nama", "ASC");
        
        if ($request->limit) {

            $gereja = $gereja->limit($request->limit)->get();
        }
        
        elseif ($request->where) {

            $gereja = DB::select("select * from gereja where $request->where");
        }
        
        else {
            $gereja = $gereja->get();
        }

        return response()->json([
            "success" => true,
            'data' => $gereja
        ]);
    }

}