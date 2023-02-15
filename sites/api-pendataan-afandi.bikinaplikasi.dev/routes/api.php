<?php

use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('user/authenticate', [UserController::class, 'authenticate']);
Route::apiResource('anggota', 'Api\\AnggotaController')->parameters(['anggota' => 'anggota']);
Route::apiResource('anggota-aplikasi-program-lc', 'Api\\AnggotaController')->parameters(['anggotaAplikasiProgramListCheckbox' => 'anggotaAplikasiProgramListCheckbox']);
Route::apiResource('anggota-geografis', 'Api\\AnggotaGeografisController')->parameters(['anggotaGeografis' => 'anggotaGeografis']);
Route::apiResource('anggota-indikator-usaha', 'Api\\AnggotaIndikatorUsahaController');
Route::apiResource('anggota-pertanian', 'Api\\AnggotaPertanianController')->parameters(['anggotaPertanian' => 'anggotaPertanian']);
Route::apiResource('anggota-riwayat-kesehatan', 'Api\\AnggotaRiwayatKesehatanController')->parameters(['anggotaRiwayatKesehatan' => 'anggotaRiwayatKesehatan']);
Route::apiResource('anggota-usaha', 'Api\\AnggotaUsahaController')->parameters(['anggotaUsaha' => 'anggotaUsaha']);
Route::apiResource('anggota-workshop', 'Api\\AnggotaWorkshopController')->parameters(['anggotaWorkshop' => 'anggotaWorkshop']);
Route::apiResource('aplikasi-program', 'Api\\AplikasiProgramController')->parameters(['anggotaWorkshop' => 'anggotaWorkshop']);
Route::apiResource('aplikasi-program-list-checkbox', 'Api\\AplikasiProgramListCheckboxController')->parameters(['aplikasiProgramListCheckbox' => 'aplikasiProgramListCheckbox']);
Route::apiResource('aplikasi-program-list-pilihan', 'Api\\AplikasiProgramListPilihanController')->parameters(['aplikasiProgramListPilihan' => 'aplikasiProgramListPilihan']);
Route::apiResource('cabang', 'Api\\CabangController')->parameters(['cabang' => 'cabang']);
Route::apiResource('geografis', 'Api\\GeografisController')->parameters(['geografis' => 'geografis']);
Route::apiResource('keahlian', 'Api\\KeahlianController')->parameters(['keahlian' => 'keahlian']);
Route::apiResource('keahlian-detail', 'Api\\KeahlianDetailController')->parameters(['keahlianDetail' => 'keahlianDetail']);
Route::apiResource('keluarga', 'Api\\KeluargaController')->parameters(['keluarga' => 'keluarga']);
Route::apiResource('keluarga-detail', 'Api\\KeluargaDetailController')->parameters(['keluargaDetail' => 'keluargaDetail']);
Route::apiResource('keluarga-detail-keahlian', 'Api\\KeluargaDetailKeahlianController')->parameters(['keluargaDetailKeahlian' => 'keluargaDetailKeahlian']);
Route::apiResource('keluarga-detail-pekerjaan', 'Api\\KeluargaDetailPekerjaanController')->parameters(['keluargaDetailPekerjaan' => 'keluargaDetailPekerjaan']);
Route::apiResource('keluarga-detail-pendidikan-ta', 'Api\\KeluargaDetailPendidikanTerakhirAnakController')->parameters(['keluargaDetailPendidikanTerakhirAnak' => 'keluargaDetailPendidikanTerakhirAnak']);
Route::apiResource('keluarga-detail-pendidikan-tu', 'Api\\KeluargaDetailPendidikanTerakhirOrtuController')->parameters(['keluargaDetailPendidikanTerakhirOrtu' => 'keluargaDetailPendidikanTerakhirOrtu']);
Route::apiResource('koja', 'Api\\KojaController')->parameters(['koja' => 'koja']);
Route::apiResource('pekerjaan', 'Api\\PekerjaanController')->parameters(['pekerjaan' => 'pekerjaan']);
Route::apiResource('ranting', 'Api\\RantingController')->parameters(['ranting' => 'ranting']);

Route::apiResource('laporan', 'Api\\LaporanController')->parameters(['laporan' => 'ranting']);