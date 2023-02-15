<?php

use App\Models\Paket;
use App\Models\Pelanggan;
use App\Models\Pengeluaran;
use App\Models\Pesanan;
use App\Models\PesananDetail;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\URL;

Route::get('/', function () {

    return redirect('login');
});

Route::post('login_manual', [LoginController::class, 'authenticate'])->name('login_manual');



Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {

    Route::get('/dashboard', function () {

        $data['pakets'] = Paket::all();
        $data['pelanggans'] = Pelanggan::all();
        $data['pengeluarans'] = Pengeluaran::all();
        $data['pesanans'] = Pesanan::all();
        $data['pesanan_details'] = PesananDetail::all();
        $data['users'] = User::all();

        $data['grafiks'] = [];

        $grafik_pengeluarans = Pengeluaran::whereBetween('tanggal', [now()->addDays(-500)->toDateString(), now()->toDateString()]);

        for ($i = 0; $i < 15; $i++) {
            $tanggal = now()->addDays(-($i))->format("Y-m-d");

            $data['grafiks']['tanggals'][] = $tanggal;
            $data['grafiks']['pesanans'][] = Pesanan::all()->whereBetween('dipesan_pada', [now()->addDays(-($i))->toDateTimeString(), now()->addDays(1)->toDateString()])->count();
            $data['grafiks']['pengeluarans'][] = $grafik_pengeluarans->where('tanggal', $tanggal)->count();
        }

        return view('dashboard', $data);

    })->name('dashboard');

    Route::put('user/{user}/profile/update', ['App\Http\Controllers\UserController', 'profileUpdate'])->name('user.profile.update');
    Route::get('user/profile', [UserController::class, 'profile'])->name('user.profile');
    Route::post('user/laporan/print', ['App\Http\Controllers\UserController', 'print'])->name('user.print');
    Route::get('user/{user}/profile', ['App\Http\Controllers\UserController', 'profile'])->name('user.profile');
    Route::get('user/laporan', ['App\Http\Controllers\UserController', 'laporan'])->name('user.laporan.index');
    Route::get('user/hapus_semua', ['App\Http\Controllers\UserController', 'hapus_semua'])->name('user.hapus_semua');
    Route::resource('user', 'App\Http\Controllers\UserController')->parameters(['user' => 'user']);

    Route::post('ckeditor/upload', ['App\Http\Controllers\CKEditorController', 'upload']);

    Route::get('paket/hapus_semua', ['App\Http\Controllers\PaketController', 'hapus_semua'])->name('paket.hapus_semua');
    Route::get('laporan/paket', ['App\Http\Controllers\PaketController', 'laporan'])->name("laporan.paket");
    Route::post('laporan/paket/print', ['App\Http\Controllers\PaketController', 'print'])->name("paket.print");
    Route::resource('paket', 'App\Http\Controllers\PaketController');

    Route::get('pelanggan/hapus_semua', ['App\Http\Controllers\PelangganController', 'hapus_semua'])->name('pelanggan.hapus_semua');
    Route::get('laporan/pelanggan', ['App\Http\Controllers\PelangganController', 'laporan'])->name("laporan.pelanggan");
    Route::post('laporan/pelanggan/print', ['App\Http\Controllers\PelangganController', 'print'])->name("pelanggan.print");
    Route::resource('pelanggan', 'App\Http\Controllers\PelangganController');

    Route::get('pengeluaran/hapus_semua', ['App\Http\Controllers\PengeluaranController', 'hapus_semua'])->name('pengeluaran.hapus_semua');
    Route::get('laporan/pengeluaran', ['App\Http\Controllers\PengeluaranController', 'laporan'])->name("laporan.pengeluaran");
    Route::post('laporan/pengeluaran/print', ['App\Http\Controllers\PengeluaranController', 'print'])->name("pengeluaran.print");
    Route::resource('pengeluaran', 'App\Http\Controllers\PengeluaranController');

    Route::get('pesanan/hitung_pesanan', ['App\Http\Controllers\PesananController', 'hitung_pesanan'])->name('pesanan.hitung_pesanan');
    Route::get('pesanan/hapus_semua', ['App\Http\Controllers\PesananController', 'hapus_semua'])->name('pesanan.hapus_semua');
    Route::get('laporan/pesanan', ['App\Http\Controllers\PesananController', 'laporan'])->name("laporan.pesanan");
    Route::post('laporan/pesanan/print', ['App\Http\Controllers\PesananController', 'print'])->name("pesanan.print");
    Route::get('pesanan/auto-update-denda', ['App\Http\Controllers\PesananController', 'autoUpdateDenda'])->name('pesanan.auto-update-biaya-admin');
    Route::get('pesanan/{pesanan}/print-nota', ['App\Http\Controllers\PesananController', 'printNota'])->name('pesanan.print-nota');
    Route::get('pesanan/{pesanan}/proses', ['App\Http\Controllers\PesananController', 'proses'])->name('pesanan.proses');
    Route::get('pesanan/{pesanan}/selesai', ['App\Http\Controllers\PesananController', 'selesai'])->name('pesanan.selesai');
    Route::resource('pesanan', 'App\Http\Controllers\PesananController');

    Route::get('pesanan-detail/hapus_semua', ['App\Http\Controllers\PesananDetailController', 'hapus_semua'])->name('pesanan-detail.hapus_semua');
    Route::get('laporan/pesanan-detail', ['App\Http\Controllers\PesananDetailController', 'laporan'])->name("laporan.pesanan-detail");
    Route::post('laporan/pesanan-detail/print', ['App\Http\Controllers\PesananDetailController', 'print'])->name("pesanan-detail.print");
    Route::resource('pesanan-detail', 'App\Http\Controllers\PesananDetailController');

    Route::get('laporan/laba-rugi', ['App\Http\Controllers\LabaRugiController', 'index'])->name("laporan.laba-rugi");
    Route::post('laporan/laba-rugi/print', ['App\Http\Controllers\LabaRugiController', 'print'])->name("laporan.laba-rugi.print");
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