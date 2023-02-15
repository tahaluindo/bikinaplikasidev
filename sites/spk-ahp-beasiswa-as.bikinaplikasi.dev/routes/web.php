<?php

use Illuminate\Support\Facades\Auth;

use App\User;

// tidak perlu ke halaman welcome, langsung login saja, g penting soalny
Route::get('/', function () {
    return redirect()->route('login');
});

// matikan fiture register karena memang tidak ada fiture register
Auth::routes(['register' => false]);

// semua halaman di dalam group ini harus diakses setelah login
Route::middleware('auth')->group(function () {
    Route::get('/home', function () {
        $data['alternatifs'] = \App\Alternatif::all();
        $data['kriterias'] = \App\Kriteria::all();
        $data['perhitungans'] = \App\Perhitungan::all();
        $data['users'] = \App\User::all();

        return view('home', $data);
    })->name('home');

    Route::put('user/{user}/profile/update', ['App\Http\Controllers\UserController', 'profileUpdate'])->name('user.profile.update');
    Route::get('user/profile', 'UserController@profile')->name('user.profile');
    Route::post('user/laporan/print', 'UserController@print')->name('user.print');
    Route::get('user/laporan', 'UserController@laporan')->name('user.laporan.index');
    Route::get('user/hapus_semua', 'UserController@hapus_semua')->name('user.hapus_semua');
    Route::resource('user', 'UserController')->parameters(['user' => 'user']);

    Route::put('alternatif/{alternatif}/profile/update', ['App\Http\Controllers\AlternatifController', 'profileUpdate'])->name('alternatif.profile.update');
    Route::get('alternatif/profile', 'AlternatifController@profile')->name('alternatif.profile');
    Route::post('alternatif/laporan/print', 'AlternatifController@print')->name('alternatif.print');
    Route::get('alternatif/laporan', 'AlternatifController@laporan')->name('alternatif.laporan.index');
    Route::get('alternatif/hapus_semua', 'AlternatifController@hapus_semua')->name('alternatif.hapus_semua');
    Route::resource('alternatif', 'AlternatifController')->parameters(['alternatif' => 'alternatif']);

    Route::put('alternatif-detail/{alternatif-detail}/profile/update', ['App\Http\Controllers\AlternatifDetailController', 'profileUpdate'])->name('alternatif-detail.profile.update');
    Route::get('alternatif-detail/profile', 'AlternatifDetailController@profile')->name('alternatif-detail.profile');
    Route::post('alternatif-detail/laporan/print', 'AnggotaController@print')->name('alternatif-detail.print');
    Route::get('alternatif-detail/laporan', 'AlternatifDetailController@laporan')->name('alternatif-detail.laporan.index');
    Route::get('alternatif-detail/hapus_semua', 'AlternatifDetailController@hapus_semua')->name('alternatif-detail.hapus_semua');
    Route::resource('alternatif-detail', 'AlternatifDetailController')->parameters(['alternatif-detail' => 'alternatif-detail']);

    Route::put('kriteria/{kriteria}/profile/update', ['App\Http\Controllers\kriteriaController', 'profileUpdate'])->name('kriteria.profile.update');
    Route::get('kriteria/profile', 'kriteriaController@profile')->name('kriteria.profile');
    Route::post('kriteria/laporan/print', 'KriteriaController@print')->name('kriteria.print');
    Route::get('kriteria/laporan', 'KriteriaController@laporan')->name('kriteria.laporan.index');
    Route::get('kriteria/hapus_semua', 'KriteriaController@hapus_semua')->name('kriteria.hapus_semua');
    Route::resource('kriteria', 'KriteriaController')->parameters(['kriteria' => 'kriteria']);

    Route::put('kriteria-detail/{kriteria-detail}/profile/update', ['App\Http\Controllers\KriteriaDetailController', 'profileUpdate'])->name('kriteria-detail.profile.update');
    Route::get('kriteria-detail/profile', 'KriteriaDetailController@profile')->name('kriteria-detail.profile');
    Route::post('kriteria-detail/laporan/print', 'KriteriaDetailController@print')->name('kriteria-detail.print');
    Route::get('kriteria-detail/laporan', 'KriteriaDetailController@laporan')->name('kriteria-detail.laporan.index');
    Route::get('kriteria-detail/hapus_semua', 'KriteriaDetailController@hapus_semua')->name('kriteria-detail.hapus_semua');
    Route::resource('kriteria-detail', 'KriteriaDetailController')->parameters(['kriteria-detail' => 'kriteria-detail']);
//s;dkfl;sdjfls;djfkldshjfkldshfkjsdhfjkhsdgfjsdghfjhsdgfhjsdgfsf
    Route::post('perhitungan/{perhitungan}', ['App\Http\Controllers\PerhitunganController', 'hitung'])->name('perhitungan.hitung');
    Route::get('perhitungan/profile', 'PerhitunganController@profile')->name('perhitungan.profile');
    Route::post('perhitungan/laporan/print', 'PerhitunganController@print')->name('perhitungan.print');
    Route::get('perhitungan/laporan', 'PerhitunganController@laporan')->name('perhitungan.laporan.index');
    Route::get('perhitungan/hapus_semua', 'PerhitunganController@hapus_semua')->name('perhitungan.hapus_semua');
    Route::resource('perhitungan', 'PerhitunganController')->parameters(['perhitungan' => 'perhitungan']);


    Route::put('perhitungan-detail/{perhitungan-detail}/profile/update', ['App\Http\Controllers\PerhitunganDetailController', 'profileUpdate'])->name('perhitungan-detail.profile.update');
    Route::get('perhitungan-detail/profile', 'PerhitunganDetailController@profile')->name('perhitungan-detail.profile');
    Route::post('perhitungan-detail/laporan/print', 'PerhitunganDetailController@print')->name('perhitungan-detail.print');
    Route::get('perhitungan-detail/laporan', 'PerhitunganDetailController@laporan')->name('perhitungan-detail.laporan.index');
    Route::get('perhitungan-detail/hapus_semua', 'PerhitunganDetailController@hapus_semua')->name('perhitungan-detail.hapus_semua');
    Route::resource('perhitungan-detail', 'PerhitunganDetailController')->parameters(['perhitungan-detail' => 'perhitungan-detail']);
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