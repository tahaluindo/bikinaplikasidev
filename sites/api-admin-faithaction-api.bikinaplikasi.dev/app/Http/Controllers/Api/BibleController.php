<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Disukai;
use App\Models\Bible;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class BibleController extends Controller
{
    public function index(Request $request)
    {
        $bible = new Bible();
        
        if ($request->limit) {

            $bible = $bible->with(['juduls', 'juduls.bible', 'ayats.judul', 'juduls.ayats'])->limit($request->limit)->get();
        }
        
        elseif ($request->where) {

            $bible = DB::select("select * from bible where $request->where");
        }
        
        else {
            $bible = $bible->with(['juduls', 'juduls.bible', 'ayats.judul', 'juduls.ayats'])->get();
        }

        return response()->json([
            "success" => true,
            'data' => $bible
        ]);
    }

}