<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\CareGroup;
use App\Models\CareGroupLokasi;
use App\Models\Disukai;
use App\Models\Pendeta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class CareGroupLokasiController extends Controller
{
    public function index(Request $request)
    {
        $careGroupLokasi = new CareGroupLokasi();

        $pendeta_ids = Pendeta::where('gereja_id', $request->gereja_id)->pluck('user_id');

        if ($request->kategori_id) {
            $careGroupLokasiIds = CareGroup::whereIn('user_id', $pendeta_ids)->where(['care_group_kategori_id' => $request->kategori_id])->pluck('care_group_lokasi_id')->toArray();

            $careGroupLokasi = $careGroupLokasi->whereIn('id', $careGroupLokasiIds);
        }

        if ($request->limit) {

            $careGroupLokasi = $careGroupLokasi->limit($request->limit)->get();
        } elseif ($request->where) {

            $careGroupLokasi = DB::select("select * from care_group_lokasi where $request->where");
        } else {
            $careGroupLokasi = $careGroupLokasi->get();
        }

        return response()->json([
            "success" => true,
            'data' => $careGroupLokasi
        ]);
    }

}