<?php

use App\Http\Controllers\Api\PelangganController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//dd(\Illuminate\Support\Facades\Hash::make("karyawan"));

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('user/add-foto-profile', [UserController::class, 'addFotoProfile']);
Route::post('user/register-informasi-usaha', [UserController::class, 'registerInformasiUsaha']);
Route::get('user/model', [UserController::class, 'model']);
Route::get('user/kirim-ulang-kode-verifikasi', [UserController::class, 'kirimUlangKodeVerifikasi']);
Route::get('user/update-verifikasi-status', [UserController::class, 'updateVerifikasiStatus']);
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

Route::get('unit-usaha/model', [\App\Http\Controllers\Api\UnitUsahaController::class, 'model']);
Route::resource('unit-usaha', \App\Http\Controllers\Api\UnitUsahaController::class)->parameters(['unit_usaha' => 'unit_usaha']);

Route::get('lokasi-usaha/model', [\App\Http\Controllers\Api\LokasiUsahaController::class, 'model']);
Route::resource('lokasi-usaha', \App\Http\Controllers\Api\LokasiUsahaController::class)->parameters(['lokasi_usaha' => 'lokasi_usaha']);

Route::get('produk/model', [\App\Http\Controllers\Api\ProdukController::class, 'model']);
Route::resource('produk', \App\Http\Controllers\Api\ProdukController::class)->parameters(['produk' => 'produk']);
Route::resource('produk-gambar', \App\Http\Controllers\Api\ProdukGambarController::class)->parameters(['produk_gambar' => 'produk_gambar']);
Route::get('produk-kategori/model', [\App\Http\Controllers\Api\ProdukKategoriController::class, 'model']);
Route::resource('produk-kategori', \App\Http\Controllers\Api\ProdukKategoriController::class)->parameters(['produk_kategori' => 'produk_kategori']);
Route::get('produk-satuan/model', [\App\Http\Controllers\Api\ProdukSatuanController::class, 'model']);
Route::resource('produk-satuan', \App\Http\Controllers\Api\ProdukSatuanController::class)->parameters(['produk_satuan' => 'produk_satuan']);
Route::resource('produk-share-revenue', \App\Http\Controllers\Api\ProdukShareRevenueController::class)->parameters(['produk_share_revenue' => 'produk_share_revenue']);
Route::resource('produk-varian', \App\Http\Controllers\Api\ProdukVarianController::class)->parameters(['produk_varian' => 'produk_varian']);

Route::get('sewa/model', [\App\Http\Controllers\Api\SewaController::class, 'model']);
Route::resource('sewa', \App\Http\Controllers\Api\SewaController::class)->parameters(['sewa' => 'sewa']);
//Route::resource('sewa-gambar', \App\Http\Controllers\Api\SewaGambarController::class)->parameters(['sewa_gambar' => 'sewa_gambar']);
//Route::get('sewa-kategori/model', [\App\Http\Controllers\Api\SewaKategoriController::class, 'model']);
//Route::resource('sewa-kategori', \App\Http\Controllers\Api\SewaKategoriController::class)->parameters(['sewa_kategori' => 'sewa_kategori']);
//Route::get('sewa-satuan/model', [\App\Http\Controllers\Api\SewaSatuanController::class, 'model']);
//Route::resource('sewa-satuan', \App\Http\Controllers\Api\SewaSatuanController::class)->parameters(['sewa_satuan' => 'sewa_satuan']);
//Route::resource('sewa-share-revenue', \App\Http\Controllers\Api\SewaShareRevenueController::class)->parameters(['sewa_share_revenue' => 'sewa_share_revenue']);
//Route::resource('sewa-varian', \App\Http\Controllers\Api\SewaVarianController::class)->parameters(['sewa_varian' => 'sewa_varian']);

Route::get('custom/model', [\App\Http\Controllers\Api\CustomController::class, 'model']);
Route::resource('custom', \App\Http\Controllers\Api\CustomController::class)->parameters(['custom' => 'custom']);
//Route::resource('custom-gambar', \App\Http\Controllers\Api\CustomGambarController::class)->parameters(['custom_gambar' => 'custom_gambar']);
//Route::get('custom-kategori/model', [\App\Http\Controllers\Api\CustomKategoriController::class, 'model']);
//Route::resource('custom-kategori', \App\Http\Controllers\Api\CustomKategoriController::class)->parameters(['custom_kategori' => 'custom_kategori']);
//Route::get('custom-satuan/model', [\App\Http\Controllers\Api\CustomSatuanController::class, 'model']);
//Route::resource('custom-satuan', \App\Http\Controllers\Api\CustomSatuanController::class)->parameters(['custom_satuan' => 'custom_satuan']);
//Route::resource('custom-share-revenue', \App\Http\Controllers\Api\CustomShareRevenueController::class)->parameters(['custom_share_revenue' => 'custom_share_revenue']);
//Route::resource('custom-varian', \App\Http\Controllers\Api\CustomVarianController::class)->parameters(['custom_varian' => 'custom_varian']);


Route::get('keuangan/model', [\App\Http\Controllers\Api\KeuanganController::class, 'model']);
Route::resource('keuangan', \App\Http\Controllers\Api\KeuanganController::class)->parameters(['keuangan' => 'keuangan']);
//Route::resource('keuangan-gambar', \App\Http\Controllers\Api\KeuanganGambarController::class)->parameters(['keuangan_gambar' => 'keuangan_gambar']);
//Route::get('keuangan-kategori/model', [\App\Http\Controllers\Api\KeuanganKategoriController::class, 'model']);
//Route::resource('keuangan-kategori', \App\Http\Controllers\Api\KeuanganKategoriController::class)->parameters(['keuangan_kategori' => 'keuangan_kategori']);
//Route::get('keuangan-satuan/model', [\App\Http\Controllers\Api\KeuanganSatuanController::class, 'model']);
//Route::resource('keuangan-satuan', \App\Http\Controllers\Api\KeuanganSatuanController::class)->parameters(['keuangan_satuan' => 'keuangan_satuan']);
//Route::resource('keuangan-share-revenue', \App\Http\Controllers\Api\KeuanganShareRevenueController::class)->parameters(['keuangan_share_revenue' => 'keuangan_share_revenue']);
//Route::resource('keuangan-varian', \App\Http\Controllers\Api\KeuanganVarianController::class)->parameters(['keuangan_varian' => 'keuangan_varian']);


Route::get('kas-rekening/model', [\App\Http\Controllers\Api\KasRekeningController::class, 'model']);
Route::resource('kas-rekening', \App\Http\Controllers\Api\KasRekeningController::class)->parameters(['kas_rekening' => 'kas_rekening']);
Route::resource('metode-pembayaran', \App\Http\Controllers\Api\MetodePembayaranController::class)->parameters(['metode_pembayaran' => 'metode_pembayaran']);

Route::get('pelanggan/model', [\App\Http\Controllers\Api\PelangganController::class, 'model']);
Route::resource('pelanggan', PelangganController::class)->parameters(['pelanggan' => 'pelanggan']);

Route::get('pelanggan-unit-usaha/model', [\App\Http\Controllers\Api\PelangganUnitUsahaController::class, 'model']);
Route::resource('pelanggan-unit-usaha', \App\Http\Controllers\Api\PelangganUnitUsahaController::class)->parameters(['pelanggan_unit_usaha' => 'pelanggan_unit_usaha']);

Route::resource('notification', NotificationController::class)->parameters(['notification' => 'notification']);