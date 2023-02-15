<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Disukai;
use App\Models\WeCareHero;
use App\Models\WeCareHeroFasilitas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class WeCareHeroController extends Controller
{
    public function index(Request $request)
    {
        $weCareHero = new WeCareHero();

        $weCareHero = $weCareHero->where('status', 'Aktif');

        if ($request->limit) {

            $weCareHero = $weCareHero->limit($request->limit)->get();
        } elseif ($request->where) {

            $weCareHero = DB::select("select * from we_care_hero where $request->where");
        } else {
            $weCareHero = $weCareHero->get();
        }

        return response()->json([
            "success" => true,
            'data' => $weCareHero
        ]);
    }

}