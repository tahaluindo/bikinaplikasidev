<?php

use App\Models\Angsuran;
use App\Models\Kategori;
use App\Models\Kavling;
use App\Models\Pelanggan;
use App\Models\Pemasok;
use App\Models\Pembelian;
use App\Models\PembelianDetail;
use App\Models\Penjualan;
use App\Models\PenjualanDetail;
use App\Models\Barang;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;

Route::get('/', function (Request $request) {
    $data['kavling_termurah'] = Kavling::orderBy('harga')->get()->first();
    $data['kavling'] = Kavling::all();
    $data['kavling_penjualan'] = Kavling::whereHas('penjualan');

    return view('index', $data);
//    return redirect()->route('login');
});

Route::post('login_manual', [LoginController::class, 'authenticate'])->name('login_manual');


Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {

    Route::get('/dashboard', function () {

        $data['penjualan'] = Penjualan::get();
        $data['pelanggan'] = Pelanggan::get();
        $data['angsuran'] = Angsuran::get();
        $data['kategori'] = Kategori::get();
        $data['kavling'] = Kavling::get();

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

    Route::get('angsuran/hapus_semua', ['App\Http\Controllers\AngsuranController', 'hapus_semua'])->name('angsuran.hapus_semua');
    Route::get('angsuran/laporan', ['App\Http\Controllers\AngsuranController', 'laporan'])->name('angsuran.laporan.index');
    Route::post('angsuran/laporan/print', ['App\Http\Controllers\AngsuranController', 'print'])->name('angsuran.print');
    Route::resource('angsuran', 'App\Http\Controllers\AngsuranController');

    Route::get('kategori/hapus_semua', ['App\Http\Controllers\KategoriController', 'hapus_semua'])->name('kategori.hapus_semua');
    Route::get('kategori/laporan', ['App\Http\Controllers\KategoriController', 'laporan'])->name('kategori.laporan.index');
    Route::post('kategori/laporan/print', ['App\Http\Controllers\KategoriController', 'print'])->name('kategori.print');
    Route::resource('kategori', 'App\Http\Controllers\KategoriController');

    Route::get('kavling/hapus_semua', ['App\Http\Controllers\KavlingController', 'hapus_semua'])->name('kavling.hapus_semua');
    Route::get('kavling/laporan', ['App\Http\Controllers\KavlingController', 'laporan'])->name('kavling.laporan.index');
    Route::post('kavling/laporan/print', ['App\Http\Controllers\KavlingController', 'print'])->name('kavling.print');
    Route::resource('kavling', 'App\Http\Controllers\KavlingController');

    Route::get('penjualan/batalkan/{penjualan}', ['App\Http\Controllers\PenjualanController', 'batalkan'])->name('penjualan.batalkan');
    Route::get('penjualan/hapus_semua', ['App\Http\Controllers\PenjualanController', 'hapus_semua'])->name('penjualan.hapus_semua');
    Route::get('penjualan/laporan', ['App\Http\Controllers\PenjualanController', 'laporan'])->name('penjualan.laporan.index');
    Route::post('penjualan/laporan/print', ['App\Http\Controllers\PenjualanController', 'print'])->name('penjualan.print');
    Route::resource('penjualan', 'App\Http\Controllers\PenjualanController');
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