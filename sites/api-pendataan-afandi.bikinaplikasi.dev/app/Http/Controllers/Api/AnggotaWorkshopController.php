<?php

namespace App\Http\Controllers\Api;

use App\AnggotaWorkshop;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Anggota;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AnggotaWorkshopController extends Controller
{
    public function index(Request $request)
    {
        return response()->json(AnggotaWorkshop::with(['anggota'])
            ->where('anggota_id', "like", "%" . $request->anggota_id . "%")
            ->where('nama', "like", "%" . $request->nama . "%")
            ->where('penyelenggara', "like", "%" . $request->penyelenggara . "%")
            ->where('tahun', "like", "%" . $request->tahun . "%")
            ->limit($request->limit)
            ->get());
    }

    public function store(Request $request)
    {
        AnggotaWorkshop::create($request->all());

        return response()->json([
            'status' => 'Success',
        ]);
    }

    public function show(AnggotaWorkshop $anggotaWorkshop)
    {
        return response()->json([
            'status' => 'Success',
            'anggota_workshop' => AnggotaWorkshop::where('id', $anggotaWorkshop->id)->first()
        ]);
    }

    public function update(Request $request, AnggotaWorkshop $anggotaWorkshop)
    {
        $requestData = $request->all();

        $anggotaWorkshop->update($requestData);

        return response()->json([
            'status' => 'Success',
        ]);
    }

    public function destroy(AnggotaWorkshop $anggotaWorkshop)
    {
        $anggotaWorkshop->delete();

        return response()->json([
            'status' => 'Success',
        ], 200);
    }
}
