<?php

namespace App\Http\Controllers\Api;

use App\AnggotaRiwayatKesehatan;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Anggota;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AnggotaRiwayatKesehatanController extends Controller
{
    public function index(Request $request)
    {
        return response()->json(AnggotaRiwayatKesehatan::with(['anggota'])
            ->where('anggota_id', "like", "%" . $request->anggota_id . "%")
            ->where('berat_badan', "like", "%" . $request->berat_badan . "%")
            ->where('tinggi_badan', "like", "%" . $request->tinggi_badan . "%")
            ->where('golongan_darah', "like", "%" . $request->golongan_darah . "%")
            ->where('riwayat_penyakit_sekarang', "like", "%" . $request->riwayat_penyakit_sekarang . "%")
            ->where('riwayat_penyakit_dahulu', "like", "%" . $request->riwayat_penyakit_dahulu . "%")
            ->where('riwayat_penyakit_keluarga', "like", "%" . $request->riwayat_penyakit_keluarga . "%")
            ->limit($request->limit)
            ->get());
    }

    public function store(Request $request)
    {
        AnggotaRiwayatKesehatan::create($request->all());

        return response()->json([
            'status' => 'Success',
        ]);
    }

    public function show(AnggotaRiwayatKesehatan $anggotaRiwayatKesehatan)
    {
        return response()->json([
            'status' => 'Success',
            'anggota_riwayat_kesehatan' => AnggotaRiwayatKesehatan::where('id', $anggotaRiwayatKesehatan->id)->first()
        ]);
    }

    public function update(Request $request, AnggotaRiwayatKesehatan $anggotaRiwayatKesehatan)
    {
        $requestData = $request->all();

        $anggotaRiwayatKesehatan->update($requestData);

        return response()->json([
            'status' => 'Success',
        ]);
    }

    public function destroy(AnggotaRiwayatKesehatan $anggotaRiwayatKesehatan)
    {
        $anggotaRiwayatKesehatan->delete();

        return response()->json([
            'status' => 'Success',
        ], 200);
    }
}
