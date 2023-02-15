<?php

// dd(\Hash::make('penjual3@gmail.com'));

use App\Http\Livewire\Jabatan\Index;
use App\Models\Pelanggan;
use App\Models\Pemasok;
use App\Models\Pembelian;
use App\Models\PembelianDetail;
use App\Models\Pemesanan;
use App\Models\PemesananDetail;
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
Route::get('bahan/get-bahan', ['App\Http\Controllers\BahanController', 'getBahan'])->name('bahan.get-bahan');

Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {
    Route::get('/dashboard', function () {
        
        if(auth()->user()->level == 'Pelanggan') {
            return redirect('produk');
        }
        
        $data['pelanggans'] = Pelanggan::all();
        $data['pemasoks'] = Pemasok::all();
        $data['pembelians'] = Pembelian::all();
        $data['pembelian_details'] = PembelianDetail::all();
        $data['pemesanans'] = Pemesanan::all();
        $data['pemesanan_details'] = PemesananDetail::all();
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
    
    Route::get('pemesanan/laporan', ['App\Http\Controllers\PemesananController', 'laporan'])->name('pemesanan.laporan.index');
    Route::get('pemesanan/nota/{pemesanan}', ['App\Http\Controllers\PemesananController', 'nota'])->name('pemesanan.print-nota');
    Route::post('pemesanan/laporan/print', ['App\Http\Controllers\PemesananController', 'print'])->name('pemesanan.print');
    Route::get('pemesanan/hapus_semua', ['App\Http\Controllers\PemesananController', 'hapus_semua'])->name('pemesanan.hapus_semua');
    Route::resource('pemesanan', 'App\Http\Controllers\PemesananController');
    
    Route::get('pemesanan-detail/laporan', ['App\Http\Controllers\PemesananDetailController', 'laporan'])->name('pemesanan-detail.laporan.index');
    Route::post('pemesanan-detail/laporan/print', ['App\Http\Controllers\PemesananDetailController', 'print'])->name('pemesanan-detail.print');
    Route::get('pemesanan-detail/hapus_semua', ['App\Http\Controllers\PemesananDetailController', 'hapus_semua'])->name('pemesanan-detail.hapus_semua');
    Route::resource('pemesanan-detail', 'App\Http\Controllers\PemesananDetailController');
    
    Route::get('produk/laporan', ['App\Http\Controllers\ProdukController', 'laporan'])->name('produk.laporan.index');
    Route::post('produk/laporan/print', ['App\Http\Controllers\ProdukController', 'print'])->name('produk.print');
    Route::get('produk/hapus_semua', ['App\Http\Controllers\ProdukController', 'hapus_semua'])->name('produk.hapus_semua');
    Route::resource('produk', 'App\Http\Controllers\ProdukController');
    
    Route::get('bahan/laporan', ['App\Http\Controllers\BahanController', 'laporan'])->name('bahan.laporan.index');
    Route::post('bahan/laporan/print', ['App\Http\Controllers\BahanController', 'print'])->name('bahan.print');
    Route::get('bahan/hapus_semua', ['App\Http\Controllers\BahanController', 'hapus_semua'])->name('bahan.hapus_semua');
    Route::resource('bahan', 'App\Http\Controllers\BahanController');
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

