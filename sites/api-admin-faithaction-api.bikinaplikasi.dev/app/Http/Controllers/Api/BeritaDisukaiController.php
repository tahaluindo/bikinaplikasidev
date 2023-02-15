<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Disukai;
use App\Models\BeritaDisukai;
use App\Models\BeritaDisukaiFasilitas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class BeritaDisukaiController extends Controller
{
    public function index(Request $request)
    {
        $beritaDisukai = new BeritaDisukai();
        
        if ($request->limit) {

            $beritaDisukai = $beritaDisukai->with(['berita_disukai', 'user'])->limit($request->limit)->get();
        }
        
        elseif ($request->where) {

            $beritaDisukai = DB::select("select * from berita_disukai where $request->where");
        }
        
        else {
            $beritaDisukai = $beritaDisukai->with(['berita_disukai', 'user'])->get();
        }

        return response()->json([
            "success" => true,
            'data' => $beritaDisukai
        ]);
    }

}