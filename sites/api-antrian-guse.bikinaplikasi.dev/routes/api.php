<?php

//dump(\Hash::make('082282692489'));
//dump(\Hash::make('082282692488'));
//dump(\Hash::make('082282692486'));
//dump(\Hash::make('082282692485'));
//die;

use App\Http\Controllers\Api\BookingController;
use App\Http\Controllers\Api\LayananController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('booking/update-status', [BookingController::class, 'updateStatus']);
Route::apiResource('booking', 'Api\\BookingController');

Route::get('layanan/search', [LayananController::class, 'search']);
Route::get('layanan/get-from-user', [LayananController::class, 'getFromUser']);
Route::get('layanan/get-no-antrian', [LayananController::class, 'getNoAntrian']);
Route::get('layanan/is-booked', [LayananController::class, 'isBooked']);
Route::get('layanan/update-status', [LayananController::class, 'updateStatus']);
Route::apiResource('layanan', 'Api\\LayananController');
Route::get('user/authenticate', [UserController::class, 'authenticate']);
Route::apiResource('user', 'Api\\UserController');
