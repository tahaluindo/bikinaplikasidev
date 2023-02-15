<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Disukai;
use App\Models\SekolahSabat;
use App\Models\SekolahSabatDilihat;
use App\Models\SekolahSabatDishare;
use App\Models\SekolahSabatDisukai;
use App\Models\SekolahSabatFasilitas;
use App\Models\SekolahSabatKomentar;
use App\Models\SekolahSabatMateri;
use App\Models\SekolahSabatMateriTanggal;
use App\Models\SekolahSabatMateriTanggalKomentar;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SekolahSabatController extends Controller
{
    public function index(Request $request)
    {
        $sekolahSabat = new SekolahSabat();

        if ($request->limit) {

            $sekolahSabat = $sekolahSabat->with(['sekolah_sabat_materis', 'sekolah_sabat_materis.sekolah_sabat_materi_tanggals', 'sekolah_sabat_materis.sekolah_sabat_materi_tanggals.sekolah_sabat_materi_tanggal_komentars', 'sekolah_sabat_materis.sekolah_sabat_materi_tanggals.sekolah_sabat_materi_tanggal_komentars.user'])->withCount(['sekolah_sabat_materis', 'sekolah_sabat_materis'])->limit($request->limit)->get();
        } elseif ($request->where) {

            $sekolahSabat = DB::select("select * from sekolah_sabat where $request->where");
        } else {
            $sekolahSabat = $sekolahSabat->with(['sekolah_sabat_materis', 'sekolah_sabat_materis.sekolah_sabat_materi_tanggals', 'sekolah_sabat_materis.sekolah_sabat_materi_tanggals.sekolah_sabat_materi_tanggal_komentars', 'sekolah_sabat_materis.sekolah_sabat_materi_tanggals.sekolah_sabat_materi_tanggal_komentars.user'])->withCount(['sekolah_sabat_materis', 'sekolah_sabat_materis'])->get();
        }

        return response()->json([
            "success" => true,
            'data' => $sekolahSabat
        ]);
    }

    public function show(SekolahSabat $sekolahSabat)
    {
        $sekolahSabat = $sekolahSabat->where('id', $sekolahSabat->id)->with(['sekolah_sabat_materis', 'sekolah_sabat_materis.sekolah_sabat_materi_tanggals', 'sekolah_sabat_materis.sekolah_sabat_materi_tanggals.sekolah_sabat_materi_tanggal_komentars', 'sekolah_sabat_materis.sekolah_sabat_materi_tanggals.sekolah_sabat_materi_tanggal_komentars.user'])->withCount(['sekolah_sabat_materis', 'sekolah_sabat_materis'])->first();

        return response()->json([
            "success" => true,
            'data' => $sekolahSabat
        ]);
    }

    public function getSekolahSabatMateri(Request $request, SekolahSabatMateri $sekolahSabatMateri)
    {
        $sekolahSabatMateri = new SekolahSabatMateri();

        if ($request->limit) {

            $sekolahSabatMateri = $sekolahSabatMateri->with(['sekolah_sabat_materi_tanggals', 'sekolah_sabat_materi_tanggals.sekolah_sabat_materi_tanggal_komentars', 'sekolah_sabat_materi_tanggals.sekolah_sabat_materi_tanggal_komentars.user'])->withCount(['sekolah_sabat_materi_tanggals',])->limit($request->limit)->first();
        } elseif ($request->where) {

            $sekolahSabatMateri = DB::select("select * from sekolahSabatMateri where $request->where");
        } else {
            $sekolahSabatMateri = $sekolahSabatMateri->with(['sekolah_sabat_materi_tanggals', 'sekolah_sabat_materi_tanggals.sekolah_sabat_materi_tanggal_komentars', 'sekolah_sabat_materi_tanggals.sekolah_sabat_materi_tanggal_komentars.user'])->withCount(['sekolah_sabat_materi_tanggals',])->first();
        }

        return response()->json([
            "success" => true,
            'data' => $sekolahSabatMateri
        ]);
    }


    public function addKomentar(Request $request)
    {
        $sekolahSabatMateriTanggal = SekolahSabatMateriTanggal::findOrFail($request->sekolah_sabat_materi_tanggal_id);
        $user = User::findOrFail($request->user_id);

        SekolahSabatMateriTanggalKomentar::create($request->all());

        return response()->json([
            "success" => true
        ]);

    }

    public function editKomentar(Request $request)
    {
        SekolahSabatMateriTanggalKomentar::findOrFail($request->id)->update([
            'isi' => $request->isi
        ]);

        return response()->json([
            "success" => true
        ]);
    }
}