<?php

//dump(\Hash::make('082282692489'));
//dump(\Hash::make('082282692488'));
//dump(\Hash::make('082282692486'));
//dump(\Hash::make('082282692485'));
//die;

use App\Http\Controllers\Api\BookingController;
use App\Http\Controllers\Api\SuratController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

try {
    Route::middleware('auth:api')->get('/user', function (Request $request) {
        return $request->user();
    });

    Route::get('booking/update-status', [BookingController::class, 'updateStatus']);
    Route::apiResource('booking', 'Api\\BookingController');

    Route::apiResource('surat', 'Api\\SuratController');
    Route::apiResource('surat-keluar', 'Api\\SuratKeluarController');
    Route::apiResource('mahasiswa', 'Api\\MahasiswaController');
    Route::apiResource('siswa', 'Api\\SiswaController');

    Route::get('user/authenticate', [UserController::class, 'authenticate']);
    Route::apiResource('user', 'Api\\UserController');

    Route::apiResource('klasifikasi', 'Api\\KlasifikasiController');

    Route::apiResource('disposisi', 'Api\\DisposisiController');

} catch (\Throwable $t) {
    file_put_contents("file_suratmasuk.json", $t->getMessage());
}
