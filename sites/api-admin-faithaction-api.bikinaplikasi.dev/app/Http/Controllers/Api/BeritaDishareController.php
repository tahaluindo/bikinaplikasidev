<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Dishare;
use App\Models\BeritaDishare;
use App\Models\BeritaDishareFasilitas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class BeritaDishareController extends Controller
{
    public function index(Request $request)
    {
        $beritaDishare = new BeritaDishare();
        
        if ($request->limit) {

            $beritaDishare = $beritaDishare->with(['berita_dishare', 'user'])->limit($request->limit)->get();
        }
        
        elseif ($request->where) {

            $beritaDishare = DB::select("select * from berita_dishare where $request->where");
        }
        
        else {
            $beritaDishare = $beritaDishare->with(['berita_dishare', 'user'])->get();
        }

        return response()->json([
            "success" => true,
            'data' => $beritaDishare
        ]);
    }

}