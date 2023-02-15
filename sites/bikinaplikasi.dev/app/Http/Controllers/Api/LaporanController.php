<?php

namespace App\Http\Controllers\Api;

use App\Anggota;
use App\Ranting;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        $anggota = Anggota::with([
            "anggota_pertanian", "anggota_usaha", "anggota_indikator_usaha", "anggota_workshop", "anggota_riwayat_kesehatan",
            "user", "user.keluarga_detail", "user.keluarga_detail.keluarga",
            "user.keluarga_detail.keluarga.keluarga_details",
            "user.keluarga_detail.keluarga.keluarga_details.keluarga_detail_pekerjaans",
            "user.keluarga_detail.keluarga.keluarga_details.keluarga_detail_keahlians",
            "user.keluarga_detail.keluarga.keluarga_details.keluarga_detail_pendidikan_terakhir_anak",
            "user.keluarga_detail.keluarga.keluarga_details.keluarga_detail_pendidikan_terakhir_ortu",
            "cabang", "ranting", "koja", "anggota_geografis"])
            ->withCount([
            "anggota_pertanian", "anggota_usaha", "anggota_indikator_usaha", "anggota_workshop", "anggota_riwayat_kesehatan",
            "user", "cabang", "ranting", "koja", "anggota_geografis"])
            ->whereBetween('created_at', [$request->tanggal_awal, $request->tanggal_akhir])
            ->limit($request->limit)
            ->get();

        return response()->json([
            'anggota' => $anggota,
            'cabang' => $anggota->pluck('cabang'),
            'ranting' => $anggota->pluck('ranting'),
            'koja' => $anggota->pluck('koja'),
            'anggota_pertanian' => $anggota->pluck('anggota_pertanian'),
            'anggota_usaha' => $anggota->pluck('anggota_usaha'),
            'anggota_indikator_usaha' => $anggota->pluck('anggota_indikator_usaha'),
            'anggota_workshop' => $anggota->pluck('anggota_workshop'),
            'anggota_riwayat_kesehatan' => $anggota->pluck('anggota_riwayat_kesehatan'),
            'anggota_geografis' => $anggota->pluck('anggota_geografis'),
        ]);
    }

    public function store(Request $request)
    {

        if (Ranting::where('nama', $request->nama)->first()) {
            return response()->json([
                'status' => 'Error',
            ], 422);
        }

        Ranting::create($request->all());

        return response()->json([
            'status' => 'Success',
        ]);
    }

    public function show(Ranting $ranting)
    {
        return response()->json([
            'status' => 'Success',
            'anggota' => Ranting::where('id', $ranting->id)->first()
        ]);
    }

    public function update(Request $request, Ranting $ranting)
    {
        $requestData = $request->all();

        $ranting->update($requestData);

        return response()->json([
            'status' => 'Success',
        ]);
    }

    public function destroy(Ranting $ranting)
    {
        $ranting->delete();

        return response()->json([
            'status' => 'Success',
        ], 200);
    }
}
