<?php

use App\Http\Controllers\Api\DisukaiController;
use App\Http\Controllers\Api\RumahController;
use App\Http\Controllers\Api\TentangController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\FasilitasController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('user/forgot-password-done', ['\App\Http\Controllers\Api\UserController', 'forgotPasswordDone']);
Route::get('user/get-current-user-like', ['\App\Http\Controllers\Api\UserController', 'getCurrentUserLike']);
Route::get('user/set-current-user-like', ['\App\Http\Controllers\Api\UserController', 'setCurrentUserLike']);
Route::post('user/forgot-password', ['\App\Http\Controllers\Api\UserController', 'forgotPassword']);
Route::get('user/login', ['\App\Http\Controllers\Api\UserController', 'login']);
Route::get('user/profile/{user}', ['\App\Http\Controllers\Api\UserController', 'profile']);
Route::get('user/verifikasi', ['\App\Http\Controllers\Api\UserController', 'verifikasi']);
Route::get('user/check-verifikasi', ['\App\Http\Controllers\Api\UserController', 'checkVerifikasi']);
Route::resource('user', '\App\Http\Controllers\Api\UserController')->parameters(['user' => 'user']);

Route::get('rumah/{rumah}/disukai/{user}', ['\App\Http\Controllers\Api\RumahController', 'disukai']);
Route::resource('rumah', '\App\Http\Controllers\Api\RumahController')->parameters(['rumah' => 'rumah']);

Route::resource('fasilitas', '\App\Http\Controllers\Api\FasilitasController')->parameters(['fasilitas' => 'fasilitas']);

Route::get('tentang', ['\App\Http\Controllers\Api\TentangController', 'index']);
Route::get('disukai/{user}', ['\App\Http\Controllers\Api\DisukaiController', 'index']);
