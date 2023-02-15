<?php

namespace App\Http\Controllers\Api;

use App\AnggotaUsaha;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Anggota;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AnggotaUsahaController extends Controller
{
    public function index(Request $request)
    {
        return response()->json(AnggotaUsaha::with(['anggota'])
            ->where('badan_hukum', "like", "%" . $request->badan_hukum . "%")
            ->where('tahun_berdiri', "like", "%" . $request->tahun_berdiri . "%")
            ->limit($request->limit)
            ->get());
    }

    public function store(Request $request)
    {
        AnggotaUsaha::create($request->all());

        return response()->json([
            'status' => 'Success',
        ]);
    }

    public function show(AnggotaUsaha $anggotaUsaha)
    {
        return response()->json([
            'status' => 'Success',
            'anggota_usaha' => AnggotaUsaha::where('id', $anggotaUsaha->id)->first()
        ]);
    }

    public function update(Request $request, AnggotaUsaha $anggotaUsaha)
    {
        $requestData = $request->all();

        $anggotaUsaha->update($requestData);

        return response()->json([
            'status' => 'Success',
        ]);
    }

    public function destroy(AnggotaUsaha $anggotaUsaha)
    {
        $anggotaUsaha->delete();

        return response()->json([
            'status' => 'Success',
        ], 200);
    }
}
