<?php

use Illuminate\Support\Facades\Auth;
use App\Anggotum;
use App\Buku;
use App\Peminjaman;
use App\Pengembalian;
use App\User;
// dd(\Hash::make('p'));
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

// tidak perlu ke halaman welcome, langsung login saja, g penting soalny
Route::get('/', function () {
    return redirect()->route('login');
});

// matikan fiture register karena memang tidak ada fiture register
Auth::routes(['register' => false]);

// semua halaman di dalam group ini harus diakses setelah login
Route::middleware('auth')->group(function () {
    Route::get('/home', function () {

        $data['anggotas'] = Anggotum::get();
        $data['bukus'] = Buku::get();
        $data['peminjamans'] = Peminjaman::get();
        $data['pengembalians'] = Pengembalian::get();
        $data['users'] = User::get();

        return view('home', $data);
    })->name('home');

    Route::get('user/profile', 'UserController@profile')->name('user.profile');
    Route::post('anggota/laporan/print', 'AnggotaController@print')->name('anggota.print');
    Route::get('anggota/laporan', 'AnggotaController@laporan')->name('anggota.laporan.index');
    Route::get('anggota/hapus_semua', 'AnggotaController@hapus_semua')->name('anggota.hapus_semua');
    Route::resource('anggota', 'AnggotaController')->parameters(['anggota' => 'anggota']);

    Route::post('buku/laporan/print', 'BukuController@print')->name('buku.print');
    Route::get('buku/laporan', 'BukuController@laporan')->name('buku.laporan.index');
    Route::get('buku/hapus_semua', 'BukuController@hapus_semua')->name('buku.hapus_semua');
    Route::resource('buku', 'BukuController')->parameters(['buku' => 'buku']);

    Route::get('peminjaman/{peminjaman}/perpanjangan', 'PeminjamanController@perpanjangan')->name('peminjaman.perpanjangan');
    Route::post('peminjaman/laporan/print', 'PeminjamanController@print')->name('peminjaman.print');
    Route::get('peminjaman/laporan', 'PeminjamanController@laporan')->name('peminjaman.laporan.index');
    Route::get('peminjaman/hapus_semua', 'PeminjamanController@hapus_semua')->name('peminjaman.hapus_semua');
    Route::resource('peminjaman', 'PeminjamanController');

    Route::post('detail_peminjaman/laporan/print', 'DetailPeminjamanController@print')->name('detail_peminjaman.print');
    Route::get('detail_peminjaman/laporan', 'DetailPeminjamanController@laporan')->name('detail_peminjaman.laporan.index');
    Route::get('detail_peminjaman/hapus_semua', 'DetailPeminjamanController@hapus_semua')->name('detail_peminjaman.hapus_semua');
    Route::resource('detail_peminjaman', 'DetailPeminjamanController')->parameters(['detail_peminjaman' => 'detail_peminjaman']);

    Route::post('pengembalian/laporan/print', 'PengembalianController@print')->name('pengembalian.print');
    Route::get('pengembalian/laporan', 'PengembalianController@laporan')->name('pengembalian.laporan.index');
    Route::get('pengembalian/hapus_semua', 'PengembalianController@hapus_semua')->name('pengembalian.hapus_semua');
    Route::resource('pengembalian', 'PengembalianController')->parameters(['pengembalian' => 'pengembalian']);

    Route::post('user/laporan/print', 'UserController@print')->name('user.print');
    Route::get('user/laporan', 'UserController@laporan')->name('user.laporan.index');
    Route::get('user/hapus_semua', 'UserController@hapus_semua')->name('user.hapus_semua');
    Route::resource('user', 'UserController')->parameters(['user' => 'user']);


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