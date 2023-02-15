<?php

use Illuminate\Support\Facades\Route;

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

Route::get('contoh', 'Pegawai\PegawaiController@contoh');

Route::get('/', 'Auth\LoginController@showLoginForm');
Route::post('/login', 'Auth\LoginController@login');
Route::get('/logout', 'Auth\LoginController@logout');

//admin
Route::group(['middleware' => ['role:admin', 'auth']], function () {
    Route::get('/admin/index', 'Admin\DashboardController@index');
    // Route::get('/admin/admin', 'Admin\AdminController@index');
    // Route::get('/admin/admin/{id}', 'Admin\AdminController@ubah');
    // Route::put('/admin/admin/{id}', 'Admin\AdminController@update');
    // Route::post('/admin/admin', 'Admin\AdminController@simpan');
    // Route::delete('/admin/admin', 'Admin\AdminController@hapus');

    Route::get('/admin/bidan', 'Admin\BidanController@index');
    Route::post('/admin/bidan', 'Admin\BidanController@simpan');
    Route::delete('/admin/bidan', 'Admin\BidanController@hapus');
    Route::post('/admin/bidan/cari', 'Admin\BidanController@cari');
    Route::get('/admin/bidan/{id}', 'Admin\BidanController@ubah');
    Route::put('/admin/bidan/{id}', 'Admin\BidanController@update');
    Route::get('/admin/bidan/{id}/detail', 'Admin\BidanController@detail');
    Route::post('/admin/bidan/{id}/detail', 'Admin\BidanController@simpan_spesialis');
    Route::delete('/admin/bidan/{id}/detail', 'Admin\BidanController@hapus_spesialis');

    Route::get('/admin/pegawai', 'Admin\PegawaiController@index');
    Route::post('/admin/pegawai/cari', 'Admin\PegawaiController@cari');
    Route::get('/admin/pegawai/{id}', 'Admin\PegawaiController@ubah');
    Route::put('/admin/pegawai/{id}', 'Admin\PegawaiController@update');
    Route::post('/admin/pegawai', 'Admin\PegawaiController@simpan');
    Route::delete('/admin/pegawai', 'Admin\PegawaiController@hapus');

    Route::post('/admin/pasien/cari', 'Admin\PasienController@cari');
    Route::get('/admin/pasien', 'Admin\PasienController@index');
    Route::delete('/admin/pasien', 'Admin\PasienController@delete');
    Route::get('/admin/pasien/{id}', 'Admin\PasienController@detail');

    Route::post('/admin/periksa/cari', 'Admin\PeriksaController@cari');
    Route::get('/admin/periksa', 'Admin\PeriksaController@index');
    Route::get('/admin/periksa/{id}', 'Admin\PeriksaController@detail');
    Route::get('/admin/periksa/{id}/print', 'Admin\PeriksaController@print');


    Route::get('/admin/spesialis', 'Admin\SpesialisController@index');
    Route::get('/admin/spesialis/{id}', 'Admin\SpesialisController@ubah');
    Route::put('/admin/spesialis/{id}', 'Admin\SpesialisController@update');
    Route::post('/admin/spesialis', 'Admin\SpesialisController@simpan');
    Route::delete('/admin/spesialis', 'Admin\SpesialisController@hapus');
});

//bidan
Route::group(['middleware' => ['role:bidan', 'auth']], function () {
    Route::get('/bidan/index', 'Bidan\BidanController@index');
    Route::get('/bidan/periksa/today', 'Bidan\PeriksaController@today');
    Route::post('/bidan/periksa/today/cari', 'Bidan\PeriksaController@todayCari');
    Route::get('/bidan/periksa/all', 'Bidan\PeriksaController@all');
    Route::post('/bidan/periksa/all/cari', 'Bidan\PeriksaController@allCari');
    Route::get('/bidan/periksa/all', 'Bidan\PeriksaController@all');
    Route::get('/bidan/periksa/{id}', 'Bidan\PeriksaController@periksa');
    Route::put('/bidan/periksa/{id}', 'Bidan\PeriksaController@simpan_periksa');
    Route::get('/bidan/periksa/{id}/print', 'Bidan\PeriksaController@print');
});

//pegawai
Route::group(['middleware' => ['role:pegawai', 'auth']], function () {
    Route::get('/pegawai/bidan/jadwal', function() {

        $data = [
            'user' => auth()->user()->user->toArray(),
            'pegawai' => \App\Pegawai::all()->toArray(),
            'judul' => 'Tambah Data',
            'action' => 'Admin\PegawaiController@simpan',
            'method' => 'POST',
        ];

        return view('pegawai/bidan/jadwal/index', $data);
    });

    Route::get('/pegawai/index', 'Pegawai\PegawaiController@index');
    Route::get('/pegawai/pasien', 'Pegawai\PasienController@index');
    Route::post('/pegawai/pasien', 'Pegawai\PasienController@simpan');
    Route::post('/pegawai/pasien/cari', 'Pegawai\PasienController@cari');
    Route::get('/pegawai/pasien/{id}/ubah', 'Pegawai\PasienController@ubah');
    Route::put('/pegawai/pasien/{pasien}/update', 'Pegawai\PasienController@update');
    Route::get('/pegawai/pasien/{id}/periksa', 'Pegawai\PasienController@periksa');
    Route::post('/pegawai/pasien/{id}/periksa', 'Pegawai\PasienController@simpan_periksa');
    Route::get('/pegawai/pasien/{id1}/periksa/{id2}/ubah', 'Pegawai\PasienController@ubah_periksa');
    Route::get('/pegawai/pasien/{id1}/periksa/{id2}/hapus', 'Pegawai\PasienController@hapus_periksa');
    Route::put('/pegawai/pasien/{id1}/periksa/{id2}/update', 'Pegawai\PasienController@update_periksa');
    Route::get('/pegawai/periksa', 'Pegawai\PeriksaController@periksa');
    Route::post('/pegawai/periksa/cari', 'Pegawai\PeriksaController@cari');

    Route::put('/pegawai/periksa/{id}/bayar', 'Pegawai\PeriksaController@bayar');
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