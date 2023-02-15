<?php

use App\Models\Obat;
use App\Models\Pasien;
use App\Models\Pegawai;
use App\Models\Penyakit;
use App\Models\RiwayatBerobat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;

Route::get('/', function (Request $request) {

    return redirect()->route('register');
});

Route::get('/register', function (Request $request) {
    $data['nomor_berobat'] = Pasien::orderBy('nomor_berobat', 'desc')->first()->nomor_berobat + 1;

    return view('auth.register', $data);
})->name("register");

Route::post('login_manual', [LoginController::class, 'authenticate'])->name('login_manual');

Route::get('pasien/hapus_semua', ['App\Http\Controllers\PasienController', 'hapus_semua'])->name('pasien.hapus_semua');
Route::resource('pasien', 'App\Http\Controllers\PasienController');

Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {

    Route::get('/dashboard', function () {

        $data['pasien'] = Pasien::all();
        $data['pegawai'] = Pegawai::all();
        $data['penyakit'] = Penyakit::all();
        $data['riwayat_berobat'] = RiwayatBerobat::all();

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

    Route::get('antrian/hapus_semua', ['App\Http\Controllers\AntrianController', 'hapus_semua'])->name('antrian.hapus_semua');
    Route::get('antrian/reset', ['App\Http\Controllers\AntrianController', 'reset'])->name('antrian.reset');
    Route::get('antrian/sebelumnya', ['App\Http\Controllers\AntrianController', 'sebelumnya'])->name('antrian.sebelumnya');
    Route::get('antrian/skip', ['App\Http\Controllers\AntrianController', 'skip'])->name('antrian.skip');
    Route::get('antrian/selanjutnya', ['App\Http\Controllers\AntrianController', 'selanjutnya'])->name('antrian.selanjutnya');
    Route::get('antrian/sudah', ['App\Http\Controllers\AntrianController', 'sudah'])->name('antrian.sudah');
    Route::resource('antrian', 'App\Http\Controllers\AntrianController');

    Route::get('pegawai/hapus_semua', ['App\Http\Controllers\PegawaiController', 'hapus_semua'])->name('pegawai.hapus_semua');
    Route::resource('pegawai', 'App\Http\Controllers\PegawaiController');

    Route::get('penyakit/hapus_semua', ['App\Http\Controllers\PenyakitController', 'hapus_semua'])->name('penyakit.hapus_semua');
    Route::resource('penyakit', 'App\Http\Controllers\PenyakitController');

    Route::get('riwayat_berobat/hapus_semua', ['App\Http\Controllers\RiwayatBerobatController', 'hapus_semua'])->name('riwayat_berobat.hapus_semua');
    Route::resource('riwayat_berobat', 'App\Http\Controllers\RiwayatBerobatController');

    Route::get('testing', ['App\Http\Controllers\TestingController', 'index']);
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