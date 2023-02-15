<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Disukai;
use App\Models\Slider;
use App\Models\SliderFasilitas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class SliderController extends Controller
{
    public function index(Request $request)
    {
        $slider = new Slider();
        
         $slider = $slider->where('status', 'Aktif');
        
        if ($request->limit) {

            $slider = $slider->limit($request->limit)->get();
        }
        
        elseif ($request->where) {

            $slider = DB::select("select * from slider where $request->where");
        }
        
        else {
            $slider = $slider->all();
        }

        return response()->json([
            "success" => true,
            'data' => $slider
        ]);
    }

}