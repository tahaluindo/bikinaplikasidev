<?php

use App\Models\Tagihan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;

Route::get('/', function () {

    return redirect('login');
});

Route::post('login_manual', [LoginController::class, 'authenticate'])->name('login_manual');

Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {

    Route::get('/dashboard', function () {

        return redirect('tagihan');

//        $data['pembeli'] = \App\Models\Pembeli::all();
//
//        return view('dashboard.index', $data);

    })->name('dashboard.index');

    Route::get('user/profile', [UserController::class, 'profile'])->name('user.profile');
    Route::post('user/laporan/print', ['App\Http\Controllers\UserController', 'print'])->name('user.print');
    Route::get('user/laporan', ['App\Http\Controllers\UserController', 'laporan'])->name('user.laporan.index');
    Route::get('user/{user}/profile', ['App\Http\Controllers\UserController', 'profile'])->name('user.profile');
    Route::put('user/{user}/profile/update', ['App\Http\Controllers\UserController', 'profileUpdate'])->name('user.profile.update');
    Route::get('user/hapus_semua', ['App\Http\Controllers\UserController', 'hapus_semua'])->name('user.hapus_semua');
    Route::resource('user', 'App\Http\Controllers\UserController')->parameters(['user' => 'user']);

    Route::post('ckeditor/upload', ['App\Http\Controllers\CKEditorController', 'upload']);

    Route::get('tagihan/{pembeli}/lunaskan-semua', ['App\Http\Controllers\TagihanController', 'lunaskanSemua']);
    Route::get('tagihan/{tagihan}/lunaskan', ['App\Http\Controllers\TagihanController', 'lunaskan'])->name('tagihan.lunaskan');
    Route::get('tagihan/hitung', ['App\Http\Controllers\TagihanController', 'hitung']);
    Route::get('tagihan/{pembeli}/tambah', ['App\Http\Controllers\TagihanController', 'tambah'])->name('tagihan.pembeli.tambah');
    Route::post('tagihan/{pembeli}/tambah/store', ['App\Http\Controllers\TagihanController', 'tambahStore']);
    Route::resource('tagihan', 'App\Http\Controllers\TagihanController');

    Route::resource('detail', 'App\Http\Controllers\DetailController');

    Route::get('produk/hapus_semua', ['App\Http\Controllers\ProdukController', 'hapus_semua'])->name('produk.hapus_semua');
    Route::resource('produk', 'App\Http\Controllers\ProdukController');
    Route::resource('cicilan', 'App\Http\Controllers\CicilanController');

    Route::post('produk-detail/laporan/print', ['App\Http\Controllers\ProdukDetailController', 'print'])->name('produk-detail.print');
    Route::get('produk-detail/laporan', ['App\Http\Controllers\ProdukDetailController', 'laporan'])->name('produk-detail.laporan.index');
    Route::resource('produk-detail', 'App\Http\Controllers\ProdukDetailController');

    Route::get('pembeli/hapus_semua', ['App\Http\Controllers\PembeliController', 'hapus_semua'])->name('pembeli.hapus_semua');
    Route::resource('pembeli', 'App\Http\Controllers\PembeliController');
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