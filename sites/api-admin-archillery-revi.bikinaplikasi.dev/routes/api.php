<?php

use App\Http\Controllers\Api\NotificationController;
use App\Http\Controllers\Api\TentangController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('user/user-location-history', [UserController::class, 'userLocationHistory']);
Route::get('user/model', [UserController::class, 'model']);
Route::post('user/add-foto-profile', [UserController::class, 'addFotoProfile']);
Route::get('user/forgot-password-done', [UserController::class, 'forgotPasswordDone']);
Route::get('user/get-current-user-like', [UserController::class, 'getCurrentUserLike']);
Route::get('user/set-current-user-like', [UserController::class, 'setCurrentUserLike']);
Route::post('user/forgot-password', [UserController::class, 'forgotPassword']);
Route::get('user/login', [UserController::class, 'login']);
Route::post('user/register-manual', [UserController::class, 'registerManual']);
Route::get('user/profile/{user}', [UserController::class, 'profile']);
Route::get('user/verifikasi', [UserController::class, 'verifikasi']);
Route::get('user/check-verifikasi', [UserController::class, 'checkVerifikasi']);
Route::resource('user', UserController::class)->parameters(['user' => 'user']);

Route::resource('notification', NotificationController::class)->parameters(['notification' => 'notification']);

Route::get('spot/check-user-spot-like', [\App\Http\Controllers\Api\SpotController::class, 'checkUserSpotLike']);
Route::get('spot/add-spot-like', [\App\Http\Controllers\Api\SpotController::class, 'addSpotLike']);
Route::get('spot/get-spot', [\App\Http\Controllers\Api\SpotController::class, 'getSpot']);
Route::post('spot/add-spot', [\App\Http\Controllers\Api\SpotController::class, 'addSpot']);
Route::post('spot/add-spot-review', [\App\Http\Controllers\Api\SpotController::class, 'addSpotReview']);
Route::get('spot/get-spot-history-review', [\App\Http\Controllers\Api\SpotController::class, 'getSpotHistoryReview']);
Route::get('spot/model', [\App\Http\Controllers\Api\SpotController::class, 'model']);
Route::get('spot/search', [\App\Http\Controllers\Api\SpotController::class, 'search']);
Route::resource('spot', \App\Http\Controllers\Api\SpotController::class)->parameters(['spot' => 'spot']);
