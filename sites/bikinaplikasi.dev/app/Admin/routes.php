<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('home');
    $router->resource('user', UserController::class);
    $router->resource('session', SessionController::class);
    $router->resource('pelanggan', PelangganController::class);
    $router->resource('karyawan', KaryawanController::class);
    $router->resource('rujukan', RujukanController::class);
    $router->resource('informasi', InformasiController::class);
    $router->resource('saran', SaranController::class);
    
    $router->get('pesanan/batalkan/{pesanan}', 'PesananController@batalkan')->name('pesanan.batalkan');
    $router->resource('pesanan', PesananController::class);
    $router->resource('pesanan-detail', PesananDetailController::class);
    
    $router->get('angsuran/pelunasan', 'AngsuranController@pelunasan')->name('angsuran.pelunasan');
    $router->resource('angsuran', AngsuranController::class);
    
    $router->resource('produk', ProdukController::class);
    $router->resource('akun-pembayaran', AkunPembayaranController::class);
    $router->resource('pembayaran', PembayaranController::class);
    $router->get('download/download', 'DownloadController@download')->name('download.download');
    $router->resource('download', DownloadController::class);
    $router->resource('notifikasi', NotifikasiController::class);
    $router->resource('notifikasi-detail', NotifikasiDetailController::class);
    $router->resource('pengaturan', PengaturanController::class);
    
    $router->get('video/view', 'VideoController@view')->name('video.view');
    $router->resource('video', VideoController::class);
    
    $router->get('sumber-kode/download', 'SumberKodeController@download')->name('sumber-kode.download');
    $router->resource('sumber-kode', SumberKodeController::class)->names('sumber-kode');
    
    $router->get('alat/view', 'AlatController@view')->name('alat.view');
    $router->resource('alat', AlatController::class);
});

