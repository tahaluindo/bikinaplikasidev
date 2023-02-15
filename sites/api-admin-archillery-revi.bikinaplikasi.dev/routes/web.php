<?php

use App\Http\Controllers\SettingsController;

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;


Route::get('/', function () {

    return redirect('login');
});

Route::post('login_manual', [LoginController::class, 'authenticate'])->name('login_manual');

Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {

    Route::get(
        '/dashboard',
        function () {

            $data['users'] = User::all();

            return view('dashboard', $data);
        }
    )->name('dashboard');

    

    Route::get('user/profile', [UserController::class, 'profile'])->name('user.profile');
    Route::get('user/set-pemilik-gerejaku/{user}', [UserController::class, 'setPemilikRumah'])->name('user.set-pemilik-gerejaku');
    Route::post('user/laporan/print', ['App\Http\Controllers\UserController', 'print'])->name('user.print');
    Route::get('user/{user}/profile', ['App\Http\Controllers\UserController', 'profile'])->name('user.profile');
    Route::put('user/{user}/profile/update', ['App\Http\Controllers\UserController', 'profileUpdate'])->name('user.profile.update');
    Route::get('user/laporan', ['App\Http\Controllers\UserController', 'laporan'])->name('user.laporan.index');
    Route::get('user/hapus_semua', ['App\Http\Controllers\UserController', 'hapus_semua'])->name('user.hapus_semua');
    Route::resource('user', 'App\Http\Controllers\UserController')->parameters(['user' => 'user']);

    Route::resource('spot', 'App\Http\Controllers\SpotController')->parameters(['spot' => 'spot']);

    Route::post('ckeditor/upload', ['App\Http\Controllers\CKEditorController', 'upload']);
    Route::get('tentang', [\App\Http\Controllers\TentangController::class, 'index'])->name('tentang.index');

    Route::resource('settings', SettingsController::class)->parameters(['video_kategori' => 'video_kategori']);

    Route::resource('qrcode', QrCodeController::class)->parameters(['qrcode' => 'qrcode']);
});