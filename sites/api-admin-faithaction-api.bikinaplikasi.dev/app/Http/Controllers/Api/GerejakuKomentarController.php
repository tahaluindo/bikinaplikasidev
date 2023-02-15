<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Disukai;
use App\Models\GerejakuKomentar;
use App\Models\GerejakuKomentarFasilitas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class GerejakuKomentarController extends Controller
{
    public function index(Request $request)
    {
        $gerejakuKomentar = new GerejakuKomentar();
        
        if ($request->limit) {

            $gerejakuKomentar = $gerejakuKomentar->with(['gerejaku'])->limit($request->limit)->get();
        }
        
        if ($request->where) {

            $gerejakuKomentar = DB::select("select * from gerejaku_komentar where $request->where");
        }
        
        else {
            $gerejakuKomentar = $gerejakuKomentar->with(['gerejaku'])->all();
        }

        return response()->json([
            "success" => true,
            'data' => $gerejakuKomentar
        ]);
    }

}