<?php


use App\Models\AnakAsuh;
use App\Models\Barang;
use App\Models\BukuTamu;
use App\Models\Donatur;
use App\Models\Jenis;
use App\Models\Meja;
use App\Models\Menu;
use App\Models\Pembelian;
use App\Models\Pengaturan;
use App\Models\Pengeluaran;
use App\Models\Penjual;
use App\Models\Penyusutan;
use App\Models\Satuan;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;

Route::get('/', function () {

    return redirect('login');
});

Route::post('login_manual', [LoginController::class, 'authenticate'])->name('login_manual');

Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {

    Route::get('/dashboard', function () {
        $data['pembelians'] = Pembelian::all();
        $data['penyusutans'] = Penyusutan::all();
        $data['barangs'] = Barang::all();
        $data['users'] = User::all();
        $data['jenis'] = Jenis::all();
        $data['satuans'] = Satuan::all();

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

    Route::post('barang/laporan/print', ['App\Http\Controllers\BarangController', 'print'])->name('barang.print');
    Route::get('barang/hapus_semua', ['App\Http\Controllers\BarangController', 'hapus_semua'])->name('barang.hapus_semua');
    Route::get('laporan/barang', ['App\Http\Controllers\BarangController', 'laporan'])->name("laporan.barang");
    Route::post('laporan/barang/print', ['App\Http\Controllers\BarangController', 'print'])->name("laporan.barang.print");
    Route::resource('barang', 'App\Http\Controllers\BarangController');

    Route::post('jenis/laporan/print', ['App\Http\Controllers\JenisController', 'print'])->name('jenis.print');
    Route::get('jenis/hapus_semua', ['App\Http\Controllers\JenisController', 'hapus_semua'])->name('jenis.hapus_semua');
    Route::get('laporan/jenis', ['App\Http\Controllers\JenisController', 'laporan'])->name("laporan.jenis");
    Route::post('laporan/jenis/print', ['App\Http\Controllers\JenisController', 'print'])->name("laporan.jenis.print");
    Route::resource('jenis', 'App\Http\Controllers\JenisController')->parameters([
        'jenis' => 'jenis'
    ]);

    Route::post('pembelian/laporan/print', ['App\Http\Controllers\PembelianController', 'print'])->name('pembelian.print');
    Route::get('pembelian/hapus_semua', ['App\Http\Controllers\PembelianController', 'hapus_semua'])->name('pembelian.hapus_semua');
    Route::get('laporan/pembelian', ['App\Http\Controllers\PembelianController', 'laporan'])->name("laporan.pembelian");
    Route::post('laporan/pembelian/print', ['App\Http\Controllers\PembelianController', 'print'])->name("laporan.pembelian.print");
    Route::resource('pembelian', 'App\Http\Controllers\PembelianController');

    Route::post('penyusutan/laporan/print', ['App\Http\Controllers\PenyusutanController', 'print'])->name('penyusutan.print');
    Route::get('penyusutan/hapus_semua', ['App\Http\Controllers\PenyusutanController', 'hapus_semua'])->name('penyusutan.hapus_semua');
    Route::get('laporan/penyusutan', ['App\Http\Controllers\PenyusutanController', 'laporan'])->name("laporan.penyusutan");
    Route::post('laporan/penyusutan/print', ['App\Http\Controllers\PenyusutanController', 'print'])->name("laporan.penyusutan.print");
    Route::resource('penyusutan', 'App\Http\Controllers\PenyusutanController');

    Route::post('satuan/laporan/print', ['App\Http\Controllers\SatuanController', 'print'])->name('satuan.print');
    Route::get('satuan/hapus_semua', ['App\Http\Controllers\SatuanController', 'hapus_semua'])->name('satuan.hapus_semua');
    Route::get('laporan/satuan', ['App\Http\Controllers\SatuanController', 'laporan'])->name("laporan.satuan");
    Route::post('laporan/satuan/print', ['App\Http\Controllers\SatuanController', 'print'])->name("laporan.satuan.print");
    Route::resource('satuan', 'App\Http\Controllers\SatuanController');

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