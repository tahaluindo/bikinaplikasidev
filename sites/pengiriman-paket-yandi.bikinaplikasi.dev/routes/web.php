<?php

//dd(\Illuminate\Support\Facades\Hash::make('supir'));

use App\Lokasi;
use App\Mobil;
use App\Paket;
use App\PemesananPaket;
use App\RentalMobil;
use App\PengirimanPaket;
use App\Rute;
use App\Tiket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Anggotum;
use App\Buku;
use App\Peminjaman;
use App\Pengembalian;
use App\User;

// matikan fiture register karena memang tidak ada fiture register
Auth::routes(['register' => false]);

Route::get('/', function () {
    return redirect('login');
});

// semua halaman di dalam group ini harus diakses setelah login
Route::middleware('auth')->group(function () {
    Route::get('/home', function () {

        $data = [];
        $data['pengiriman_paket'] = \App\PengirimanPaket::all()->map(function ($item) {
            $item->year_month = $item->created_at->format('Y-m');

            return $item;
        });

        $data['mobil'] = \App\Mobil::get();
        $data['lokasi'] = \App\Lokasi::get();
        $data['paket'] = \App\Paket::get();

        return view('home', $data);
    })->name('home');



    Route::put('user/{user}/profile/update', ['App\Http\Controllers\UserController', 'profileUpdate'])->name('user.profile.update');
    Route::get('user/profile', 'UserController@profile')->name('user.profile');
    Route::post('user/laporan/print', 'UserController@print')->name('user.print');
    Route::get('user/laporan', 'UserController@laporan')->name('user.laporan.index');
    Route::get('user/hapus_semua', 'UserController@hapus_semua')->name('user.hapus_semua');
    Route::resource('user', 'UserController')->parameters(['user' => 'user']);

    Route::get('pengiriman-paket/hitung-total-bayar', 'PengirimanPaketController@hitungTotalBayar')->name('pengiriman-paket.hitung_total_bayar');
    Route::post('pengiriman-paket/laporan/print', 'PengirimanPaketController@print')->name('pengiriman-paket.print');
    Route::get('pengiriman-paket/laporan', 'PengirimanPaketController@laporan')->name('pengiriman-paket.laporan.index');
    Route::get('pengiriman-paket/hapus_semua', 'PengirimanPaketController@hapus_semua')->name('pengiriman-paket.hapus_semua');
    Route::resource('pengiriman-paket', 'PengirimanPaketController')->parameters(['pengiriman_paket' => 'pengiriman_paket']);

    Route::get('pemesanan-paket/hitung-total-bayar', 'PemesananPaketController@hitungTotalBayar')->name('pemesanan-paket.hitung_total_bayar');
    Route::post('pemesanan-paket/laporan/print', 'PemesananPaketController@print')->name('pemesanan-paket.print');
    Route::get('pemesanan-paket/laporan', 'PemesananPaketController@laporan')->name('pemesanan-paket.laporan.index');
    Route::get('pemesanan-paket/hapus_semua', 'PemesananPaketController@hapus_semua')->name('pemesanan-paket.hapus_semua');
    Route::resource('pemesanan-paket', 'PemesananPaketController')->parameters(['pemesanan-paket' => 'pemesanan-paket']);

    Route::get('rental-mobil/hitung-total-bayar', 'RentalMobilController@hitungTotalBayar')->name('rental-mobil.hitung_total_bayar');
    Route::post('rental-mobil/laporan/print', 'RentalMobilController@print')->name('rental-mobil.print');
    Route::get('rental-mobil/laporan', 'RentalMobilController@laporan')->name('rental-mobil.laporan.index');
    Route::get('rental-mobil/hapus_semua', 'RentalMobilController@hapus_semua')->name('rental-mobil.hapus_semua');
    Route::resource('rental-mobil', 'RentalMobilController')->parameters(['mobil' => 'mobil']);

    Route::post('jadwal/laporan/print', 'JadwalController@print')->name('jadwal.print');
    Route::get('jadwal/laporan', 'JadwalController@laporan')->name('jadwal.laporan.index');
    Route::get('jadwal/hapus_semua', 'JadwalController@hapus_semua')->name('jadwal.hapus_semua');
    Route::resource('jadwal', 'JadwalController')->parameters(['jadwal' => 'jadwal']);

    Route::post('tiket/laporan/print', 'TiketController@print')->name('tiket.print');
    Route::get('tiket/laporan', 'TiketController@laporan')->name('tiket.laporan.index');
    Route::get('tiket/hapus_semua', 'TiketController@hapus_semua')->name('tiket.hapus_semua');
    Route::resource('tiket', 'TiketController')->parameters(['tiket' => 'tiket']);

    Route::post('rekening/laporan/print', 'RekeningController@print')->name('rekening.print');
    Route::get('rekening/laporan', 'RekeningController@laporan')->name('rekening.laporan.index');
    Route::get('rekening/hapus_semua', 'RekeningController@hapus_semua')->name('rekening.hapus_semua');
    Route::resource('rekening', 'RekeningController')->parameters(['rekening' => 'rekening']);

    Route::post('lokasi/laporan/print', 'LokasiController@print')->name('lokasi.print');
    Route::get('lokasi/laporan', 'LokasiController@laporan')->name('lokasi.laporan.index');
    Route::get('lokasi/hapus_semua', 'LokasiController@hapus_semua')->name('lokasi.hapus_semua');
    Route::resource('lokasi', 'LokasiController')->parameters(['lokasi' => 'lokasi']);

    Route::post('lokasi-tujuan/laporan/print', 'LokasiTujuanController@print')->name('lokasi-tujuan.print');
    Route::get('lokasi-tujuan/laporan', 'LokasiTujuanController@laporan')->name('lokasi-tujuan.laporan.index');
    Route::get('lokasi-tujuan/hapus_semua', 'LokasiTujuanController@hapus_semua')->name('lokasi-tujuan.hapus_semua');
    Route::resource('lokasi-tujuan', 'LokasiTujuanController')->parameters(['lokasi_tujuan' => 'lokasi_tujuan']);

    Route::post('rute/laporan/print', 'RuteController@print')->name('rute.print');
    Route::get('rute/laporan', 'RuteController@laporan')->name('rute.laporan.index');
    Route::get('rute/hapus_semua', 'RuteController@hapus_semua')->name('rute.hapus_semua');
    Route::resource('rute', 'RuteController')->parameters(['rute' => 'rute']);

    Route::post('paket/laporan/print', 'PaketController@print')->name('paket.print');
    Route::get('paket/laporan', 'PaketController@laporan')->name('paket.laporan.index');
    Route::get('paket/hapus_semua', 'PaketController@hapus_semua')->name('paket.hapus_semua');
    Route::resource('paket', 'PaketController')->parameters(['paket' => 'paket']);

    Route::post('mobil/laporan/print', 'MobilController@print')->name('mobil.print');
    Route::get('mobil/laporan', 'MobilController@laporan')->name('mobil.laporan.index');
    Route::get('mobil/hapus_semua', 'MobilController@hapus_semua')->name('mobil.hapus_semua');
    Route::resource('mobil', 'MobilController')->parameters(['mobil' => 'mobil']);

    Route::post('fasilitas/laporan/print', 'FasilitasController@print')->name('fasilitas.print');
    Route::get('fasilitas/laporan', 'FasilitasController@laporan')->name('fasilitas.laporan.index');
    Route::get('fasilitas/hapus_semua', 'FasilitasController@hapus_semua')->name('fasilitas.hapus_semua');
    Route::resource('fasilitas', 'FasilitasController')->parameters(['fasilitas' => 'fasilitas']);
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
