<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\CareGroup;
use App\Models\CareGroupAnggota;
use App\Models\Disukai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class CareGroupController extends Controller
{
    public function index(Request $request)
    {
        $careGroup = new CareGroup();

        if ($request->kategori_id && $request->lokasi_id && $request->user_id) {
            $careGroup = $careGroup->where([
                'care_group_kategori_id' => $request->kategori_id,
                'care_group_lokasi_id' => $request->lokasi_id
            ])->with('care_group_anggotas.user')->with('care_group_anggotas', function ($query) use ($request) {
                $query->where("user_id", $request->user_id);
            });
        } elseif ($request->user_id) {
            $careGroupAnggotaIds = CareGroupAnggota::where('user_id', $request->user_id)->pluck('care_group_id')->toArray();

            $careGroup = $careGroup->whereIn('id', $careGroupAnggotaIds);
        }

        if ($request->limit) {

            $careGroup = $careGroup->with(['care_group_kategori', 'care_group_lokasi'])->limit($request->limit)->get();
        } elseif ($request->where) {

            $careGroup = DB::select("select * from care_group_kategori where $request->where");
        } else {
            $careGroup = $careGroup->with(['care_group_kategori', 'care_group_lokasi'])->get();
        }

        return response()->json([
            "success" => true,
            'data' => $careGroup
        ]);
    }

    public function join(Request $request)
    {
        if (!CareGroupAnggota::where($request->all())->first()) {
            CareGroupAnggota::create($request->all());

            return response()->json([
                "success" => true,
                'message' => 'Berhasil join CareGroup'
            ]);
        }

        return response()->json([
            "success" => false,
            'message' => 'Gagal join CareGroup'
        ]);
    }

    public function cancel(Request $request)
    {
        if ($careGroupAnggota = CareGroupAnggota::where($request->all())->first()) {
            $careGroupAnggota->delete();

            return response()->json([
                "success" => true,
                'message' => 'Berhasil membatalkan keanggotaan'
            ]);
        }

        return response()->json([
            "success" => false,
            'message' => 'Gagal membatalkan keanggotaan'
        ]);
    }

}