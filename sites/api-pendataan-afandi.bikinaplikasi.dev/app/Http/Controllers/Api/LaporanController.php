<?php

namespace App\Http\Controllers\Api;

use App\Anggota;
use App\AnggotaGeografis;
use App\AnggotaPertanian;
use App\Cabang;
use App\Geografis;
use App\Keahlian;
use App\KeahlianDetail;
use App\KeluargaDetail;
use App\KeluargaDetailPendidikanTerakhirAnak;
use App\KeluargaDetailPendidikanTerakhirOrtu;
use App\Koja;
use App\Pekerjaan;
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
            ->whereBetween('created_at', [$request->tanggal_awal, $request->tanggal_akhir]);

        if ($request->status != "Semua") {
            $anggota->where('status', 'like', "%" . $request->status . "%");
        }

        $anggota = $anggota->get();

        $cabang = [];
        $i = 0;
        foreach ($anggota->pluck('cabang')->unique("id")->groupBy("id") as $key => $item) {
            $cabang[$i] = $item->toArray();
            $cabang[$i][0]['jumlah'] = $key;
            $cabang[$i] = $cabang[$i][0];

            $i++;
        }

        $ranting = [];
        $i = 0;
        foreach ($anggota->pluck('ranting')->unique("id")->groupBy("id") as $key => $item) {
            $ranting[$i] = $item->toArray();
            $ranting[$i][0]['jumlah'] = $key;
            $ranting[$i] = $ranting[$i][0];

            $i++;
        }

        $koja = [];
        $i = 0;
        foreach ($anggota->pluck('koja')->unique("id")->groupBy("id") as $key => $item) {
            $koja[$i] = $item->toArray();
            $koja[$i][0]['jumlah'] = $key;
            $koja[$i] = $koja[$i][0];

            $i++;
        }

        return response()->json([
            'cabang' => $cabang,
            'ranting' => $ranting,
            'koja' => $koja,
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
