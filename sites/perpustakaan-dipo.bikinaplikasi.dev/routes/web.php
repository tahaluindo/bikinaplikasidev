<?php

use App\Models\Rak;
use App\Models\Buku;
use App\Models\User;
use App\Models\Anggotum;
use App\Models\Peminjaman;
use App\Models\Pengembalian;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
// dd(\Hash::make('p'));
Route::get('/', function () {

    return redirect()->route('login');
});

Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {
    Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
        
        $data['anggotas'] = Anggotum::get();
        $data['bukus'] = Buku::get();
        $data['peminjamans'] = Peminjaman::get();
        $data['pengembalians'] = Pengembalian::get();
        $data['users'] = User::get();

        return view('dashboard', $data);
    })->name('dashboard');

    Route::get('user/profile', [UserController::class, 'profile'])->name('user.profile');

    Route::post('anggota/laporan/print', ['App\Http\Controllers\AnggotaController', 'print'])->name('anggota.print');
        Route::get('anggota/laporan', ['App\Http\Controllers\AnggotaController', 'laporan'])->name('anggota.laporan.index');
        Route::get('anggota/hapus_semua', ['App\Http\Controllers\AnggotaController', 'hapus_semua'])->name('anggota.hapus_semua');
        Route::resource('anggota', 'App\Http\Controllers\AnggotaController')->parameters(['anggota' => 'anggota']);


    Route::post('buku/laporan/print', ['App\Http\Controllers\BukuController', 'print'])->name('buku.print');
        Route::get('buku/laporan', ['App\Http\Controllers\BukuController', 'laporan'])->name('buku.laporan.index');
        Route::get('buku/hapus_semua', ['App\Http\Controllers\BukuController', 'hapus_semua'])->name('buku.hapus_semua');
        Route::resource('buku', 'App\Http\Controllers\BukuController')->parameters(['buku' => 'buku']);

    Route::post('peminjaman/laporan/print', ['App\Http\Controllers\PeminjamanController', 'print'])->name('peminjaman.print');
        Route::get('peminjaman/laporan', ['App\Http\Controllers\PeminjamanController', 'laporan'])->name('peminjaman.laporan.index');
        Route::get('peminjaman/hapus_semua', ['App\Http\Controllers\PeminjamanController', 'hapus_semua'])->name('peminjaman.hapus_semua');
        Route::resource('peminjaman', 'App\Http\Controllers\PeminjamanController');

    Route::post('detail_peminjaman/laporan/print', ['App\Http\Controllers\DetailPeminjamanController', 'print'])->name('detail_peminjaman.print');
        Route::get('detail_peminjaman/laporan', ['App\Http\Controllers\DetailPeminjamanController', 'laporan'])->name('detail_peminjaman.laporan.index');
        Route::get('detail_peminjaman/hapus_semua', ['App\Http\Controllers\DetailPeminjamanController', 'hapus_semua'])->name('detail_peminjaman.hapus_semua');
        Route::resource('detail_peminjaman', 'App\Http\Controllers\DetailPeminjamanController')->parameters(['detail_peminjaman' => 'detail_peminjaman']);

    Route::post('pengembalian/laporan/print', ['App\Http\Controllers\PengembalianController', 'print'])->name('pengembalian.print');
            Route::get('pengembalian/laporan', ['App\Http\Controllers\PengembalianController', 'laporan'])->name('pengembalian.laporan.index');
            Route::get('pengembalian/hapus_semua', ['App\Http\Controllers\PengembalianController', 'hapus_semua'])->name('pengembalian.hapus_semua');
            Route::resource('pengembalian', 'App\Http\Controllers\PengembalianController')->parameters(['pengembalian' => 'pengembalian']);

    Route::post('user/laporan/print', ['App\Http\Controllers\UserController', 'print'])->name('user.print');
            Route::get('user/laporan', ['App\Http\Controllers\UserController', 'laporan'])->name('user.laporan.index');
            Route::get('user/hapus_semua', ['App\Http\Controllers\UserController', 'hapus_semua'])->name('user.hapus_semua');
            Route::resource('user', 'App\Http\Controllers\UserController')->parameters(['user' => 'user']);
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