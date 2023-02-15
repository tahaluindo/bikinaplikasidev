<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Disukai;
use App\Models\Pendeta;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class PendetaController extends Controller
{
    public function index(Request $request)
    {
        $pendeta = new Pendeta();
        
        if ($request->limit) {

            $pendeta = $pendeta->with(['juduls', 'juduls.pendeta', 'juduls.ayats'])->limit($request->limit)->get();
        }
        
        elseif ($request->where) {

            $pendeta = DB::select("select * from pendeta where $request->where");
        }
        
        else {
            $pendeta = $pendeta->with(['juduls', 'juduls.pendeta', 'juduls.ayats'])->get();
        }

        return response()->json([
            "success" => true,
            'data' => $pendeta
        ]);
    }

}