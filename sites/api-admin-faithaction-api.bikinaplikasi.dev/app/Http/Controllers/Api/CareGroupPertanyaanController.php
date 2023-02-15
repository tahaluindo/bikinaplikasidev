<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Disukai;
use App\Models\CareGroupPertanyaan;
use App\Models\CareGroupPertanyaanFasilitas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class CareGroupPertanyaanController extends Controller
{
    public function index(Request $request)
    {
        $careGroupPertanyaan = new CareGroupPertanyaan();
        
        if ($request->limit) {

            $careGroupPertanyaan = $careGroupPertanyaan->limit($request->limit)->get();
        }
        
        elseif ($request->where) {

            $careGroupPertanyaan = DB::select("select * from care_group_pertanyaan where $request->where");
        }
        
        else {
            $careGroupPertanyaan = $careGroupPertanyaan->all();
        }

        return response()->json([
            "success" => true,
            'data' => $careGroupPertanyaan
        ]);
    }

}