<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', function () {
    return view('auth.login');
});

Route::get('alternatif/register/{project}', 'AlternatifController@register')->name('alternatif.register');
Route::post('alternatif/register/{project}', 'AlternatifController@store')->name('alternatif.registerStore');

// die(\Hash::make('admin'));
Route::middleware('auth')->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');

    // alternatif detail
    Route::resource('project/{project}/alternatif/alternatif_detail', 'AlternatifDetailController');

    // alternatif
    Route::get('project/{project}/alternatif/hapus_semua', 'AlternatifController@hapus_semua')->name('kriteria.hapus_semua');
    Route::get('project/{project}/alternatif/{alternatif}/setujui', 'AlternatifController@setujui')->name('alternatif.setujui');
    Route::get('project/{project}/alternatif/{alternatif}/batalkan', 'AlternatifController@batalkan')->name('alternatif.batalkan');
    Route::resource('project/{project}/alternatif', 'AlternatifController');

    // kelas
    Route::get('rumah/hapus_semua', 'RumahController@hapus_semua')->name('rumah.hapus_semua');
    Route::resource('rumah', 'RumahController')->parameters([
        'rumah' => 'rumah',
    ]);

    // aspek
    Route::get('aspek/hapus_semua', 'AspekController@hapus_semua')->name('aspek.hapus_semua');
    Route::resource('aspek', 'AspekController');

    // bobot
    Route::resource('bobot', 'BobotController');

    // failed_job
    Route::resource('failed_job', 'FailedJobController');

    // kriteria
    Route::get('kriteria/hapus_semua', 'KriteriaController@hapus_semua')->name('kriteria.hapus_semua');
    Route::resource('kriteria', 'KriteriaController')->parameters([
        'kriteria' => 'kriteria',
    ]);

    // kriteria detail
    Route::get('kriteria/{kriteria}/kriteria_detail/hapus_semua', 'KriteriaDetailController@hapus_semua')->name('kriteria_detail.hapus_semua');
    Route::resource('kriteria/{kriteria}/kriteria_detail', 'KriteriaDetailController');

    // password reset
    Route::resource('password_reset', 'PasswordResetController');

    // project
    Route::get('project/register/{project}', 'ProjectController@register')->name('project.register');
    Route::get('project/hapus_semua', 'ProjectController@hapus_semua')->name('project.hapus_semua');
    Route::resource('project', 'ProjectController');

    // lokasi
    Route::get('lokasi/hapus_semua', 'LokasiController@hapus_semua')->name('lokasi.hapus_semua');
    Route::resource('lokasi', 'LokasiController');

    // type
    Route::get('type/hapus_semua', 'TypeController@hapus_semua')->name('type.hapus_semua');
    Route::resource('type', 'TypeController');

    // user
    Route::resource('user', 'UserController');

    Route::get('project/{project}/alternatif/{alternatif}/edit', 'AlternatifController@edit')->name('alternatif.edit');
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