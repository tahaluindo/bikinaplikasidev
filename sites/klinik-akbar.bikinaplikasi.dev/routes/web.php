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

    Route::get('/admin/dokter', 'Admin\DokterController@index');
    Route::post('/admin/dokter', 'Admin\DokterController@simpan');
    Route::delete('/admin/dokter', 'Admin\DokterController@hapus');
    Route::post('/admin/dokter/cari', 'Admin\DokterController@cari');
    Route::get('/admin/dokter/{id}', 'Admin\DokterController@ubah');
    Route::put('/admin/dokter/{id}', 'Admin\DokterController@update');
    Route::get('/admin/dokter/{id}/detail', 'Admin\DokterController@detail');
    Route::post('/admin/dokter/{id}/detail', 'Admin\DokterController@simpan_spesialis');
    Route::delete('/admin/dokter/{id}/detail', 'Admin\DokterController@hapus_spesialis');

    Route::get('/admin/pegawai', 'Admin\PegawaiController@index');
    Route::post('/admin/pegawai/cari', 'Admin\PegawaiController@cari');
    Route::get('/admin/pegawai/{id}', 'Admin\PegawaiController@ubah');
    Route::put('/admin/pegawai/{id}', 'Admin\PegawaiController@update');
    Route::post('/admin/pegawai', 'Admin\PegawaiController@simpan');
    Route::delete('/admin/pegawai', 'Admin\PegawaiController@hapus');

    Route::get('/admin/pasien', 'Admin\PasienController@index');
    Route::delete('/admin/pasien', 'Admin\PasienController@delete');
    Route::get('/admin/pasien/{id}', 'Admin\PasienController@detail');

    Route::get('/admin/periksa', 'Admin\PeriksaController@index');
    Route::get('/admin/periksa/{id}', 'Admin\PeriksaController@detail');
    Route::get('/admin/periksa/{id}/print', 'Admin\PeriksaController@print');


    Route::get('/admin/spesialis', 'Admin\SpesialisController@index');
    Route::get('/admin/spesialis/{id}', 'Admin\SpesialisController@ubah');
    Route::put('/admin/spesialis/{id}', 'Admin\SpesialisController@update');
    Route::post('/admin/spesialis', 'Admin\SpesialisController@simpan');
    Route::delete('/admin/spesialis', 'Admin\SpesialisController@hapus');
});

//dokter
Route::group(['middleware' => ['role:dokter', 'auth']], function () {
    Route::get('/dokter/index', 'Dokter\DokterController@index');
    Route::get('/dokter/periksa/today', 'Dokter\PeriksaController@today');
    Route::get('/dokter/periksa/all', 'Dokter\PeriksaController@all');
    Route::get('/dokter/periksa/{id}', 'Dokter\PeriksaController@periksa');
    Route::put('/dokter/periksa/{id}', 'Dokter\PeriksaController@simpan_periksa');
    Route::get('/dokter/periksa/{id}/print', 'Dokter\PeriksaController@print');
});

//pegawai
Route::group(['middleware' => ['role:pegawai', 'auth']], function () {
    Route::get('/pegawai/dokter/jadwal', function() {

        $data = [
            'user' => auth()->user()->user->toArray(),
            'pegawai' => \App\Pegawai::all()->toArray(),
            'judul' => 'Tambah Data',
            'action' => 'Admin\PegawaiController@simpan',
            'method' => 'POST',
        ];

        return view('pegawai/dokter/jadwal/index', $data);
    });

    Route::get('/pegawai/index', 'Pegawai\PegawaiController@index');
    Route::get('/pegawai/pasien', 'Pegawai\PasienController@index');
    Route::post('/pegawai/pasien', 'Pegawai\PasienController@simpan');
    Route::get('/pegawai/pasien/{id}/ubah', 'Pegawai\PasienController@ubah');
    Route::put('/pegawai/pasien/{pasien}/update', 'Pegawai\PasienController@update');
    Route::get('/pegawai/pasien/{id}/periksa', 'Pegawai\PasienController@periksa');
    Route::post('/pegawai/pasien/{id}/periksa', 'Pegawai\PasienController@simpan_periksa');
    Route::get('/pegawai/pasien/{id1}/periksa/{id2}/ubah', 'Pegawai\PasienController@ubah_periksa');
    Route::get('/pegawai/pasien/{id1}/periksa/{id2}/hapus', 'Pegawai\PasienController@hapus_periksa');
    Route::put('/pegawai/pasien/{id1}/periksa/{id2}/update', 'Pegawai\PasienController@update_periksa');
    Route::get('/pegawai/periksa', 'Pegawai\PeriksaController@periksa');

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