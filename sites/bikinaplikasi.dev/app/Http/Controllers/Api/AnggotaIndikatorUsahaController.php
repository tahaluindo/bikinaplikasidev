<?php

namespace App\Http\Controllers\Api;

use App\AnggotaIndikatorUsaha;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Anggota;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AnggotaIndikatorUsahaController extends Controller
{
    public function index(Request $request)
    {
        return response()->json(AnggotaIndikatorUsaha::with(['anggota', 'geografis'])
            ->where('anggota_id', "like", "%" . $request->anggota_id . "%")
            ->where('tahun', "like", "%" . $request->tahun . "%")
            ->where('modal_sendiri', "like", "%" . $request->modal_sendiri . "%")
            ->where('asset', "like", "%" . $request->asset . "%")
            ->where('volume', "like", "%" . $request->volume . "%")
            ->limit($request->limit)
            ->get());
    }

    public function store(Request $request)
    {
        AnggotaIndikatorUsaha::create($request->all());

        return response()->json([
            'status' => 'Success',
        ]);
    }

    public function show(AnggotaIndikatorUsaha $anggotaIndikatorUsaha)
    {
        return response()->json([
            'status' => 'Success',
            'indikator_usaha' => AnggotaIndikatorUsaha::where('id', $anggotaIndikatorUsaha->id)->first()
        ]);
    }

    public function update(Request $request, AnggotaIndikatorUsaha $anggotaIndikatorUsaha)
    {
        $requestData = $request->all();

        $anggotaIndikatorUsaha->update($requestData);

        return response()->json([
            'status' => 'Success',
        ]);
    }

    public function destroy(AnggotaIndikatorUsaha $anggotaIndikatorUsaha)
    {
        $anggotaIndikatorUsaha->delete();

        return response()->json([
            'status' => 'Success',
        ], 200);
    }
}
