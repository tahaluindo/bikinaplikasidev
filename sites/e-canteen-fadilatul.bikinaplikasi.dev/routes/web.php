<?php

// dd(\Hash::make('admin'));

use App\Models\DataPenjualanAktual;
use App\Models\DataPenjualanPrediksi;
use App\Models\Produk;
use App\Models\Tahun;

use App\Models\Meja;
use App\Models\Menu;
use App\Models\Penjual;
use App\Models\Pesanan;
use App\Http\Livewire\Jabatan\Index;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\LoginController;

Route::get('/', function () {
    // $menu_ids = Menu::pluck('penjual_id')->toArray();
    $data['penjuals'] = Penjual::with('menus')->get();
    $data['mejas'] = Meja::all();
    $data['menus'] = Menu::all();
    
    return view('index', $data);
});

Route::get('/auth/redirect', function () {

    return Socialite::driver('github')->redirect();
});

Route::get('/auth/callback', function () {
    $user = Socialite::driver('github')->user();

    //  // All providers...
    //  $user->getId();
    //  $user->getNickname();
    //  $user->getName();
    //  $user->getEmail();
    //  $user->getAvatar();
});

Route::get('/debug-sentry', function () { 
    throw new Exception('My first Sentry error!');
});

Route::post('login_manual', [LoginController::class, 'authenticate'])->name('login_manual');
Route::get('pesanan/hitung_pesanan', ['App\Http\Controllers\PesananController', 'hitung_pesanan'])->name('pesanan.hitung_pesanan');


Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {
    Route::get('/dashboard', function () {
        $data['mejas']    = Meja::all();
        $data['menus']    = Menu::all();
        $data['penjuals'] = Penjual::all();
        $data['pesanans']  = Pesanan::all();
        
        return view('dashboard', $data);
        
    })->name('dashboard');
    
    Route::post('pesanan/laporan/print', ['App\Http\Controllers\PesananController', 'print'])->name('pesanan.print');
    Route::get('pesanan/laporan', ['App\Http\Controllers\PesananController', 'laporan'])->name('pesanan.laporan.index');
    Route::get('pesanan/hapus_semua', ['App\Http\Controllers\PesananController', 'hapus_semua'])->name('pesanan.hapus_semua');
    Route::get('pesanan/{pesanan}/proses', ['App\Http\Controllers\PesananController', 'proses'])->name('pesanan.proses');
    Route::get('pesanan/{pesanan}/selesai', ['App\Http\Controllers\PesananController', 'selesai'])->name('pesanan.selesai');
    Route::get('pesanan/{pesanan}/batalkan', ['App\Http\Controllers\PesananController', 'batalkan'])->name('pesanan.batalkan');
    
    Route::get('meja/hapus_semua', ['App\Http\Controllers\MejaController', 'hapus_semua'])->name('meja.hapus_semua');
    Route::resource('meja', 'App\Http\Controllers\MejaController');
    
    Route::get('user/hapus_semua', ['App\Http\Controllers\UserController', 'hapus_semua'])->name('user.hapus_semua');
    Route::resource('user', 'App\Http\Controllers\UserController');
    
    Route::get('menu/hapus_semua', ['App\Http\Controllers\MenuController', 'hapus_semua'])->name('menu.hapus_semua');
    Route::resource('menu', 'App\Http\Controllers\MenuController');
    
    Route::get('penjual/hapus_semua', ['App\Http\Controllers\PenjualController', 'hapus_semua'])->name('penjual.hapus_semua');
    Route::resource('penjual', 'App\Http\Controllers\PenjualController');
    
    Route::get('pesanan_detail/hapus_semua', ['App\Http\Controllers\PesananDetailController', 'hapus_semua'])->name('pesanan_detail.hapus_semua');
    Route::resource('pesanan_detail', 'App\Http\Controllers\PesananDetailController');

    Route::get('user/profile', [UserController::class, 'profile'])->name('user.profile');
    
    Route::post('user/laporan/print', ['App\Http\Controllers\UserController', 'print'])->name('user.print');
    Route::get('user/{user}/profile', ['App\Http\Controllers\UserController', 'profile'])->name('user.profile');
    Route::put('user/{user}/profile/update', ['App\Http\Controllers\UserController', 'profileUpdate'])->name('user.profile.update');
    Route::get('user/laporan', ['App\Http\Controllers\UserController', 'laporan'])->name('user.laporan.index');
    Route::get('user/hapus_semua', ['App\Http\Controllers\UserController', 'hapus_semua'])->name('user.hapus_semua');
    Route::resource('user', 'App\Http\Controllers\UserController')->parameters(['user' => 'user']);
    
    Route::get('data_penjualan_aktual/laporan', ['App\Http\Controllers\DataPenjualanAktualController', 'laporan'])->name('data_penjualan_aktual.laporan.index');
    Route::get('data_penjualan_aktual/hapus_semua', ['App\Http\Controllers\DataPenjualanAktualController', 'hapus_semua'])->name('data_penjualan_aktual.hapus_semua');
    Route::resource('data_penjualan_aktual', 'App\Http\Controllers\DataPenjualanAktualController');
    
    Route::get('data_penjualan_aktual_detail/laporan', ['App\Http\Controllers\DataPenjualanAktualDetailController', 'laporan'])->name('data_penjualan_aktual_detail.laporan.index');
    Route::get('data_penjualan_aktual_detail/hapus_semua', ['App\Http\Controllers\DataPenjualanAktualDetailController', 'hapus_semua'])->name('data_penjualan_aktual_detail.hapus_semua');
    Route::resource('data_penjualan_aktual_detail', 'App\Http\Controllers\DataPenjualanAktualDetailController');
    
    Route::get('data_penjualan_prediksi/laporan', ['App\Http\Controllers\DataPenjualanPrediksiController', 'laporan'])->name('data_penjualan_prediksi.laporan.index');
    Route::get('data_penjualan_prediksi/hapus_semua', ['App\Http\Controllers\DataPenjualanPrediksiController', 'hapus_semua'])->name('data_penjualan_prediksi.hapus_semua');
    Route::resource('data_penjualan_prediksi', 'App\Http\Controllers\DataPenjualanPrediksiController');
    
    Route::get('data_penjualan_aktual_detail/laporan', ['App\Http\Controllers\DataPenjualanAktualDetailController', 'laporan'])->name('data_penjualan_aktual_detail.laporan.index');
    Route::get('data_penjualan_aktual_detail/hapus_semua', ['App\Http\Controllers\DataPenjualanAktualDetailController', 'hapus_semua'])->name('data_penjualan_aktual_detail.hapus_semua');
    Route::resource('data_penjualan_aktual_detail', 'App\Http\Controllers\DataPenjualanAktualDetailController');
    
    Route::get('tahun/laporan', ['App\Http\Controllers\TahunController', 'laporan'])->name('tahun.laporan.index');
    Route::get('tahun/hapus_semua', ['App\Http\Controllers\TahunController', 'hapus_semua'])->name('tahun.hapus_semua');
    Route::resource('tahun', 'App\Http\Controllers\TahunController');
    
    Route::get('produk/laporan', ['App\Http\Controllers\ProdukController', 'laporan'])->name('produk.laporan.index');
    Route::get('produk/hapus_semua', ['App\Http\Controllers\ProdukController', 'hapus_semua'])->name('produk.hapus_semua');
    Route::resource('produk', 'App\Http\Controllers\ProdukController');
    
    Route::get('hitung-prediksi', ['App\Http\Controllers\HitungPrediksiController', 'index'])->name('hitung-prediksi.index');

    Route::get('hitung-prediksi-penjualan', ['App\Http\Controllers\HitungPrediksiPenjualanController', 'index'])->name('hitung-prediksi-penjualan.index');
    Route::get('hitung-prediksi-harga', ['App\Http\Controllers\HitungPrediksiHargaController', 'index'])->name('hitung-prediksi-harga.index');
    Route::get('hitung-prediksi-keseluruhan', ['App\Http\Controllers\HitungPrediksiKeseluruhanController', 'index'])->name('hitung-prediksi-keseluruhan.index');

    Route::get('grafik', ['App\Http\Controllers\GrafikController', 'index'])->name('grafik.index');
    Route::get('data-prediksi', ['App\Http\Controllers\DataPrediksiController', 'index'])->name('data-prediksi.index');
    Route::get('info', ['App\Http\Controllers\InfoController', 'index'])->name('info.index');

    Route::post('ckeditor/upload', ['App\Http\Controllers\CKEditorController', 'upload']);
});
Route::resource('pesanan', 'App\Http\Controllers\PesananController');
Route::resource('pesanan-detail', 'App\Http\Controllers\PesananDetailController');
Route::resource('pesanan-detail', 'App\Http\Controllers\PesananDetailController');


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