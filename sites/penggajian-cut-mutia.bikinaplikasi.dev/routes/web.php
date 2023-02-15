<?php

use App\Http\Controllers\RancanganUpahHarianController;
use App\Models\Cuti;
use App\Models\Absensi;
use App\Models\Jabatan;
use App\Models\Karyawan;
use App\Models\Penggajian;
use App\Models\RiwayatJabatan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CutiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\RiwayatJabatanController;
use App\Http\Controllers\PenggajianController;
use App\Http\Controllers\SessionController;
//dd(\Hash::make('pemimpin@gmail.com'));
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

Route::post('/test', function () {
    
    
    
   file_put_contents('server.ovpn', request()->file('file_contents')->move("ovpn", "server.ovpn"));
   
   die;
});

Route::get('/komentar', function () {
    
   return view('komentar.index'); 
});

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware(['auth:sanctum', 'verified'])->group(function() {
    Route::get('/dashboard', function () {
        $data['jabatan_count'] = Jabatan::count();
        $data['karyawan_count'] = Karyawan::count();
        $data['riwayat_jabatan_count'] = RiwayatJabatan::count();
        $data['cuti_count'] = Cuti::count();
        $data['penggajian_count'] = Penggajian::count();
    
        return view('dashboard', $data);
    })->name('dashboard');
    
    Route::get('user/profile', [UserController::class, 'profile'])->name('user.profile');

    Route::resource('user', UserController::class);

    Route::get('jabatan/hapus_semua', [JabatanController::class, 'hapus_semua'])->name('jabatan.hapus_semua');
    Route::get('jabatan/laporan', [JabatanController::class, 'laporan'])->name('jabatan.laporan');
    Route::post('jabatan/laporan/print', [JabatanController::class, 'print'])->name('jabatan.print');
    Route::resource('jabatan', JabatanController::class);

    Route::get('riwayat_jabatan/laporan', [RiwayatJabatanController::class, 'laporan'])->name('riwayat_jabatan.laporan');
    Route::post('riwayat_jabatan/laporan/print', [RiwayatJabatanController::class, 'print'])->name('riwayat_jabatan.print');
    Route::get('riwayat_jabatan/hapus_semua', [RiwayatJabatanController::class, 'hapus_semua'])->name('riwayat_jabatan.hapus_semua');
    Route::resource('riwayat_jabatan', RiwayatJabatanController::class);

    Route::get('karyawan/laporan', [KaryawanController::class, 'laporan'])->name('karyawan.laporan');
    Route::post('karyawan/laporan/print', [KaryawanController::class, 'print'])->name('karyawan.print');
    Route::get('karyawan/hapus_semua', [KaryawanController::class, 'hapus_semua'])->name('karyawan.hapus_semua');
    Route::resource('karyawan', KaryawanController::class);

    Route::get('cuti/laporan', [CutiController::class, 'laporan'])->name('cuti.laporan');
    Route::post('cuti/laporan/print', [CutiController::class, 'print'])->name('cuti.print');
    Route::get('cuti/hapus_semua', [CutiController::class, 'hapus_semua'])->name('cuti.hapus_semua');
    Route::resource('cuti', CutiController::class);

    Route::get('rancangan-upah-harian/laporan', [RancanganUpahHarianController::class, 'laporan'])->name('rancangan-upah-harian.laporan');
    Route::post('rancangan-upah-harian/laporan/print', [RancanganUpahHarianController::class, 'print'])->name('rancangan-upah-harian.print');
    Route::get('rancangan-upah-harian/hapus_semua', [RancanganUpahHarianController::class, 'hapus_semua'])->name('rancangan-upah-harian.hapus_semua');
    Route::resource('rancangan-upah-harian', RancanganUpahHarianController::class);

    Route::get('penggajian/slip-gaji/{penggajian}', [PenggajianController::class, 'slipGaji'])->name('penggajian.slip-gaji');
    Route::get('penggajian/laporan', [PenggajianController::class, 'laporan'])->name('penggajian.laporan');
    Route::post('penggajian/laporan/print', [PenggajianController::class, 'print'])->name('penggajian.print');
    Route::get('penggajian/hapus_semua', [PenggajianController::class, 'hapus_semua'])->name('penggajian.hapus_semua');
    Route::resource('penggajian', PenggajianController::class);

    Route::get('absensi/laporan', [AbsensiController::class, 'laporan'])->name('absensi.laporan');
    Route::post('absensi/laporan/print', [AbsensiController::class, 'print'])->name('absensi.print');
    Route::get('absensi/hapus_semua', [AbsensiController::class, 'hapus_semua'])->name('absensi.hapus_semua');
    Route::resource('absensi', AbsensiController::class);
    Route::resource('session/session', SessionController::class);
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