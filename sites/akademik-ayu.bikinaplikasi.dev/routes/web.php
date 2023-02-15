<?php

use Illuminate\Support\Facades\Route;
// die(\Hash::make('kepalasekolah123'));
/*dd()
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */
// die(\Hash::make('p'));
// login / logout

// dd($_SERVER);

Auth::routes(['register' => true]);

// halaman utama adalah login
Route::get('/', function () {
    return view('auth.login');
});

Route::middleware('auth')->group(function () {
    // home
    Route::get('/home', 'HomeController@index')->name('home');

    // failed_job
    Route::resource('failed_job', 'FailedJobController');

    // reset password
    Route::resource('password_reset', 'PasswordResetController');

    // informasi
    Route::get('informasi/hapus_semua', 'InformasiController@hapus_semua')->name('informasi.hapus_semua');
    Route::resource('informasi', 'InformasiController');

    // kelas
    Route::get('kelas/hapus_semua', 'KelasController@hapus_semua')->name('kelas.hapus_semua');
    Route::resource('kelas', 'KelasController');

    // mapel
    Route::get('mapel/hapus_semua', 'MapelController@hapus_semua')->name('mapel.hapus_semua');
    Route::resource('mapel', 'MapelController');

    // Materi
    Route::get('materi/{materi}/{file}/hapus_file', 'MateriController@hapus_file')->name('materi.hapus_file');
    Route::get('materi/hapus_semua', 'MateriController@hapus_semua')->name('materi.hapus_semua');
    Route::resource('materi', 'MateriController');

    // sekolah
    Route::resource('sekolah', 'SekolahController');

    // soal essay
    Route::post('soal_essay/koreksi', 'SoalEssayController@koreksi')->name('soal_essay.koreksi');
    Route::get('soal_essay/download_format', 'SoalEssayController@download_format')->name('soal_essay.download_format');
    Route::get('soal_essay/export', 'SoalEssayController@export')->name('soal_essay.export');
    Route::get('soal_essay/hapus_semua', 'SoalEssayController@hapus_semua')->name('soal_essay.hapus_semua');
    Route::get('soal_essay/import', 'SoalEssayController@import')->name('soal_essay.import');
    Route::post('soal_essay/import', 'SoalEssayController@importStore')->name('soal_essay.store');
    Route::post('soal_essay/upload', 'SoalEssayController@upload');
    Route::resource('soal_essay', 'SoalEssayController');

    // soal pilgan
    Route::get('soal_pilgan/download_format', 'SoalPilganController@download_format')->name('soal_pilgan.download_format');
    Route::get('soal_pilgan/export', 'SoalPilganController@export')->name('soal_pilgan.export');
    Route::get('soal_pilgan/hapus_semua', 'SoalPilganController@hapus_semua')->name('soal_pilgan.hapus_semua');
    Route::get('soal_pilgan/import', 'SoalPilganController@import')->name('soal_pilgan.import');
    Route::post('soal_pilgan/import', 'SoalPilganController@importStore')->name('soal_pilgan.store');
    Route::resource('soal_pilgan', 'SoalPilganController');

    // Kuis Detail
    Route::get('test_detail/{test_detail}/batalkan', 'TestDetailController@batalkan')->name('test_detail.batalkan');
    Route::get('test_detail/{test_detail}/timer', 'TestDetailController@timer')->name('test_detail.timer');
    Route::resource('test_detail', 'TestDetailController');

    // test
    Route::get('test/hapus_semua', 'TestController@hapus_semua')->name('test.hapus_semua');
    Route::resource('test', 'TestController');

    // user
    Route::post('user/naik_kelas_store', 'UserController@naik_kelas_store')->name('user.naik_kelas_store');
    Route::get('user/naik_kelas', 'UserController@naik_kelas')->name('user.naik_kelas');
    Route::get('user/aktifkan_semua', 'UserController@aktifkan_semua')->name('user.aktifkan_semua');
    Route::get('user/aktifkan/{user}', 'UserController@aktifkan')->name('user.aktifkan');
    Route::get('user/download_format', 'UserController@download_format')->name('user.download_format');
    Route::get('user/export', 'UserController@export')->name('user.export');
    Route::get('user/hapus_semua', 'UserController@hapus_semua')->name('user.hapus_semua');
    Route::get('user/import', 'UserController@import')->name('user.import');
    Route::get('user/nonaktifkan/{user}', 'UserController@nonaktifkan')->name('user.nonaktifkan');
    Route::post('user/import', 'UserController@importStore')->name('user.store');
    Route::resource('user', 'UserController');

    // test
    Route::get('perekapan', 'PerekapanController@index')->name('perekapan.index');
    Route::get('perekapan/show', 'PerekapanController@show')->name('perekapan.show');
    Route::get('perekapan/print', 'PerekapanController@print')->name('perekapan.print');

    // Tugas
    Route::get('tugas/{tugas}/kumpul', 'TugasController@kumpul')->name('tugas.kumpul');
    Route::get('tugas/hapus_semua', 'TugasController@hapus_semua')->name('tugas.hapus_semua');
    Route::post('tugas/{tugas}/kumpul', 'TugasController@kumpulStore')->name('tugas.kumpul_store');
    Route::resource('tugas', 'TugasController')->parameters(['tugas' => 'tugas']);

    // TugasDetail
    Route::get('tugasDetail/{tugasDetail}/{file}/hapus_file', 'TugasDetailController@hapus_file')->name('tugasDetail.hapus_file');
    Route::resource('tugasDetail', 'TugasDetailController');

    // Jadwal
    Route::get('jadwal/hapus_semua', 'JadwalController@hapus_semua')->name('jadwal.hapus_semua');
    Route::resource('jadwal', 'JadwalController');

    // nilai
    Route::resource('nilai', 'NilaiController');

    // nilai detail
    Route::resource('nilai_detail', 'NilaiDetailController');
    
    // komentar
    Route::resource('komentar', 'KomentarController');

    // raport
    Route::get('raport/{raport}/updateStatus', 'RaportController@updateStatus')->name('raport.updateStatus');
    Route::get('raport/{raport}/print', 'RaportController@print')->name('raport.print');
    Route::get('raport/pilih_semester', 'RaportController@pilih_semester')->name('raport.pilih_semester');
    Route::resource('raport', 'RaportController');

    // ckeditor
    Route::post('ckeditor/upload', 'CkEditorController@upload');
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
