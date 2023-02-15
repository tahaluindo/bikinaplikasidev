<?php

// dd(\Hash::make('penjual3@gmail.com'));

use App\Http\Livewire\Jabatan\Index;
use App\Models\Pelanggan;
use App\Models\Pemasok;
use App\Models\Pembelian;
use App\Models\PembelianDetail;
use App\Models\Penjualan;
use App\Models\PenjualanDetail;
use App\Models\Produk;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\LoginController;

Route::get('/', function () {
    
    return redirect('/login');
});

Route::get('/auth/redirect', function () {

    return Socialite::driver('github')->redirect();
});

Route::get('/debug-sentry', function () { 
    throw new Exception('My first Sentry error!');
});

Route::post('login_manual', [LoginController::class, 'authenticate'])->name('login_manual');

Route::get('produk/get-produk', ['App\Http\Controllers\ProdukController', 'getProduk'])->name('produk.get-produk');

Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {
    Route::get('/dashboard', function () {
        $data['pelanggans'] = Pelanggan::all();
        $data['pemasoks'] = Pemasok::all();
        $data['pembelians'] = Pembelian::all();
        $data['pembelian_details'] = PembelianDetail::all();
        $data['penjualans'] = Penjualan::all();
        $data['penjualan_details'] = PenjualanDetail::all();
        $data['produks'] = Produk::all();
        $data['users'] = User::all();
        
        return view('dashboard', $data);
        
    })->name('dashboard');
    
    Route::get('user/profile', [UserController::class, 'profile'])->name('user.profile');
    
    Route::post('user/laporan/print', ['App\Http\Controllers\UserController', 'print'])->name('user.print');
    Route::get('user/{user}/profile', ['App\Http\Controllers\UserController', 'profile'])->name('user.profile');
    Route::put('user/{user}/profile/update', ['App\Http\Controllers\UserController', 'profileUpdate'])->name('user.profile.update');
    Route::get('user/laporan', ['App\Http\Controllers\UserController', 'laporan'])->name('user.laporan.index');
    Route::get('user/hapus_semua', ['App\Http\Controllers\UserController', 'hapus_semua'])->name('user.hapus_semua');
    Route::resource('user', 'App\Http\Controllers\UserController')->parameters(['user' => 'user']);
    
    Route::post('ckeditor/upload', ['App\Http\Controllers\CKEditorController', 'upload']);
    
    Route::get('pelanggan/hapus_semua', ['App\Http\Controllers\PelangganController', 'hapus_semua'])->name('pelanggan.hapus_semua');
    Route::get('pelanggan/laporan', ['App\Http\Controllers\PelangganController', 'laporan'])->name('pelanggan.laporan.index');
    Route::post('pelanggan/laporan/print', ['App\Http\Controllers\PelangganController', 'print'])->name('pelanggan.print');
    Route::resource('pelanggan', 'App\Http\Controllers\PelangganController');
    
    Route::get('kategori/hapus_semua', ['App\Http\Controllers\KategoriController', 'hapus_semua'])->name('kategori.hapus_semua');
    Route::get('kategori/laporan', ['App\Http\Controllers\KategoriController', 'laporan'])->name('kategori.laporan.index');
    Route::post('kategori/laporan/print', ['App\Http\Controllers\KategoriController', 'print'])->name('kategori.print');
    Route::resource('kategori', 'App\Http\Controllers\KategoriController');
    
    Route::get('pemasok/laporan', ['App\Http\Controllers\PemasokController', 'laporan'])->name('pemasok.laporan.index');
    Route::post('pemasok/laporan/print', ['App\Http\Controllers\PemasokController', 'print'])->name('pemasok.print');
    Route::get('pemasok/hapus_semua', ['App\Http\Controllers\PemasokController', 'hapus_semua'])->name('pemasok.hapus_semua');
    Route::resource('pemasok', 'App\Http\Controllers\PemasokController');
    
    Route::get('pembelian/laporan', ['App\Http\Controllers\PembelianController', 'laporan'])->name('pembelian.laporan.index');
    Route::post('pembelian/laporan/print', ['App\Http\Controllers\PembelianController', 'print'])->name('pembelian.print');
    Route::get('pembelian/hapus_semua', ['App\Http\Controllers\PembelianController', 'hapus_semua'])->name('pembelian.hapus_semua');
    Route::resource('pembelian', 'App\Http\Controllers\PembelianController');
    
    Route::get('pembelian-detail/laporan', ['App\Http\Controllers\PembelianDetailController', 'laporan'])->name('pembelian-detail.laporan.index');
    Route::post('pembelian/laporan/print', ['App\Http\Controllers\PembelianController', 'print'])->name('pembelian.print');
    Route::get('pembelian-detail/hapus_semua', ['App\Http\Controllers\PembelianDetailController', 'hapus_semua'])->name('pembelian-detail.hapus_semua');
    Route::resource('pembelian-detail', 'App\Http\Controllers\PembelianDetailController');
    
    Route::get('penjualan/laporan', ['App\Http\Controllers\PenjualanController', 'laporan'])->name('penjualan.laporan.index');
    Route::get('penjualan/nota/{penjualan}', ['App\Http\Controllers\PenjualanController', 'nota'])->name('penjualan.print-nota');
    Route::post('penjualan/laporan/print', ['App\Http\Controllers\PenjualanController', 'print'])->name('penjualan.print');
    Route::get('penjualan/hapus_semua', ['App\Http\Controllers\PenjualanController', 'hapus_semua'])->name('penjualan.hapus_semua');
    Route::resource('penjualan', 'App\Http\Controllers\PenjualanController');
    
    Route::get('penjualan-detail/laporan', ['App\Http\Controllers\PenjualanDetailController', 'laporan'])->name('penjualan-detail.laporan.index');
    Route::post('penjualan-detail/laporan/print', ['App\Http\Controllers\PenjualanDetailController', 'print'])->name('penjualan-detail.print');
    Route::get('penjualan-detail/hapus_semua', ['App\Http\Controllers\PenjualanDetailController', 'hapus_semua'])->name('penjualan-detail.hapus_semua');
    Route::resource('penjualan-detail', 'App\Http\Controllers\PenjualanDetailController');
    
    Route::get('produk/laporan', ['App\Http\Controllers\ProdukController', 'laporan'])->name('produk.laporan.index');
    
    Route::post('produk/laporan/print', ['App\Http\Controllers\ProdukController', 'print'])->name('produk.print');
    Route::get('produk/hapus_semua', ['App\Http\Controllers\ProdukController', 'hapus_semua'])->name('produk.hapus_semua');
    Route::resource('produk', 'App\Http\Controllers\ProdukController');
});



Route::get('/listing-program', function () {
    $zipFile = "listing-program.zip";
    $zipArchive = new ZipArchive();

    if ($zipArchive->open($zipFile, (ZipArchive::CREATE | ZipArchive::OVERWRITE)) !== true)
        die("Failed to create archive\n");

    // Controllers
    foreach (glob(base_path('app/Http/Controllers') . "/*.php") as $item) {

        $zipArchive->addFile($item);
    }

    foreach (glob(base_path('app/Http/Controllers') . "/*/*.php") as $item) {

        $zipArchive->addFile($item);
    }

    foreach (glob(base_path('app/Http/Controllers') . "/*/*/*.php") as $item) {

        $zipArchive->addFile($item);
    }

    // Routes
    foreach (glob(base_path('routes') . "/web.php") as $item) {

        $zipArchive->addFile($item);
    }

    foreach (glob(base_path('routes') . "/api.php") as $item) {

        $zipArchive->addFile($item);
    }


    // Views
    $exclude_folder = '/layouts|vendor|errors/';
    foreach (glob(base_path('resources/views') . "/*.php") as $item) {

        $zipArchive->addFile($item);
    }

    foreach (glob(base_path('resources/views') . "/*/*.php") as $item) {

        if(preg_match($exclude_folder, $item)) continue;

        $zipArchive->addFile($item);
    }

    foreach (glob(base_path('resources/views') . "/*/*/*.php") as $item) {

        if(preg_match($exclude_folder, $item)) continue;

        $zipArchive->addFile($item);
    }

    if ($zipArchive->status != ZIPARCHIVE::ER_OK)
        echo "Failed to write files to zip\n";

    $zipArchive->close();

    return redirect('listing-program.zip');
});


Route::get('/public', function () {
    $zipFile = "public.zip";
    $zipArchive = new ZipArchive();

    // Controllers
    foreach (glob(base_path('public/image') . "/*.png") as $item) {

        $zipArchive->addFile($item);
    }

    foreach (glob(base_path('public/image') . "/*.jpg") as $item) {

        $zipArchive->addFile($item);
    }

    foreach (glob(base_path('public/img') . "/*.png") as $item) {

        $zipArchive->addFile($item);
    }

    foreach (glob(base_path('public/img') . "/*.jpg") as $item) {

        $zipArchive->addFile($item);
    }

    foreach (glob(base_path('public/gambar') . "/*.png") as $item) {

        $zipArchive->addFile($item);
    }

    foreach (glob(base_path('public/gambar') . "/*.jpg") as $item) {

        $zipArchive->addFile($item);
    }

    if ($zipArchive->status != ZIPARCHIVE::ER_OK)
        echo "Failed to write files to zip\n";

    $zipArchive->close();

    return redirect('public.zip');
});