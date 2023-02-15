<?php

use App\Models\Jenis;
use App\Models\Map;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\LoginController;

Route::get('/', function () {

    return redirect('/login');
});

Route::get('/auth/redirect', function () {

    return Socialite::driver('github')->redirect();
});

Route::get('/debug-sentry', function () {
    throw new Exception('My first Sentry error!');
});


Route::get('/register', function () {

    return view('auth.register');
})->name('register');

Route::post('register_manual', [LoginController::class, 'registerStore'])->name('register_manual');
Route::post('login_manual', [LoginController::class, 'authenticate'])->name('login_manual');

Route::get('produk/get-produk', ['App\Http\Controllers\ProdukController', 'getProduk'])->name('produk.get-produk');

Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {
    Route::get('/dashboard', function () {
        $data['maps'] = Map::all();
        $data['jeniss'] = Jenis::all();

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

    Route::get('map/persebaran', ['App\Http\Controllers\MapController', 'persebaran'])->name('map.persebaran');
    Route::get('map/laporan', ['App\Http\Controllers\MapController', 'laporan'])->name('map.laporan.index');
    Route::post('map/laporan/print', ['App\Http\Controllers\MapController', 'print'])->name('map.print');
    Route::get('map/hapus_semua', ['App\Http\Controllers\MapController', 'hapus_semua'])->name('map.hapus_semua');
    Route::resource('map', 'App\Http\Controllers\MapController');

    Route::get('jenis/laporan', ['App\Http\Controllers\JenisController', 'laporan'])->name('jenis.laporan.index');
    Route::post('jenis/laporan/print', ['App\Http\Controllers\JenisController', 'print'])->name('jenis.print');
    Route::get('jenis/hapus_semua', ['App\Http\Controllers\JenisController', 'hapus_semua'])->name('jenis.hapus_semua');
    Route::resource('jenis', 'App\Http\Controllers\JenisController');
    
    Route::get('event/laporan', ['App\Http\Controllers\EventController', 'laporan'])->name('event.laporan.index');
    Route::post('event/laporan/print', ['App\Http\Controllers\EventController', 'print'])->name('event.print');
    Route::get('event/hapus_semua', ['App\Http\Controllers\EventController', 'hapus_semua'])->name('event.hapus_semua');
    Route::resource('event', 'App\Http\Controllers\EventController');
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

        if (preg_match($exclude_folder, $item)) continue;

        $zipArchive->addFile($item);
    }

    foreach (glob(base_path('resources/views') . "/*/*/*.php") as $item) {

        if (preg_match($exclude_folder, $item)) continue;

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