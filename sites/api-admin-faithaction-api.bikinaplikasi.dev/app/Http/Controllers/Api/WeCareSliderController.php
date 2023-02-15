<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Disukai;
use App\Models\WeCareSlider;
use App\Models\WeCareSliderFasilitas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class WeCareSliderController extends Controller
{
    public function index(Request $request)
    {
        $weCareSlider = new WeCareSlider();

        $weCareSlider = $weCareSlider->where('status', 'Aktif');

        if ($request->limit) {

            $weCareSlider = $weCareSlider->limit($request->limit)->get();
        } elseif ($request->where) {

            $weCareSlider = DB::select("select * from we_care_slider where $request->where");
        } else {
            $weCareSlider = $weCareSlider->all();
        }

        return response()->json([
            "success" => true,
            'data' => $weCareSlider
        ]);
    }

}