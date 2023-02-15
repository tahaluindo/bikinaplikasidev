<?php

// dd(\Hash::make('penjual3@gmail.com'));

use App\Models\DataPenjualanAktual;
use App\Models\DataPenjualanPrediksi;
use App\Models\Produk;
use App\Models\Tahun;

use App\Models\Meja;
use App\Models\Menu;
use App\Models\Penjual;
use App\Models\Pasien;
use App\Models\Pegawai;
use App\Models\Obat;
use App\Models\Penyakit;
use App\Http\Livewire\Jabatan\Index;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\LoginController;

Route::get('/', function () {
    
    // return view('index', $data);
    return redirect('/login');
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
Route::resource('pesanan', 'App\Http\Controllers\PesananController');

Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {
    Route::get('/dashboard', function () {
        $data['pasiens']    = Pasien::all();
        $data['pegawais']    = Pegawai::all();
        $data['obats']  = Obat::all();
        $data['penyakits'] = Penyakit::all();
        
        return view('dashboard', $data);
        
    })->name('dashboard');
    
    Route::get('obat/hapus_semua', ['App\Http\Controllers\ObatController', 'hapus_semua'])->name('obat.hapus_semua');
    Route::resource('obat', 'App\Http\Controllers\ObatController');
    
    Route::get('pasien/hapus_semua', ['App\Http\Controllers\PasienController', 'hapus_semua'])->name('pasien.hapus_semua');
    Route::resource('pasien', 'App\Http\Controllers\PasienController');
    
    Route::get('pegawai/hapus_semua', ['App\Http\Controllers\PegawaiController', 'hapus_semua'])->name('pegawai.hapus_semua');
    Route::resource('pegawai', 'App\Http\Controllers\PegawaiController');
    
    Route::get('penyakit/hapus_semua', ['App\Http\Controllers\PenyakitController', 'hapus_semua'])->name('penyakit.hapus_semua');
    Route::resource('penyakit', 'App\Http\Controllers\PenyakitController');
    
    Route::get('riwayat_berobat/hapus_semua', ['App\Http\Controllers\RiwayatBerobatController', 'hapus_semua'])->name('riwayat_berobat.hapus_semua');
    Route::resource('riwayat_berobat', 'App\Http\Controllers\RiwayatBerobatController');
    
    Route::get('saran_obat/hapus_semua', ['App\Http\Controllers\SaranObatController', 'hapus_semua'])->name('saran_obat.hapus_semua');
    Route::resource('saran_obat', 'App\Http\Controllers\SaranObatController');
        
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

Route::resource('pesanan-detail', 'App\Http\Controllers\PesananDetailController');
Route::resource('pesanan-detail', 'App\Http\Controllers\PesananDetailController');
Route::resource('pasien', 'App\Http\Controllers\PasienController');
Route::resource('pegawai', 'App\Http\Controllers\PegawaiController');
Route::resource('penyakit', 'App\Http\Controllers\PenyakitController');
Route::resource('riwayat-berobat', 'App\Http\Controllers\RiwayatBerobatController');
Route::resource('saran-obat', 'App\Http\Controllers\SaranObatController');
Route::resource('obat', 'App\Http\Controllers\ObatController');
Route::resource('obat', 'App\Http\Controllers\ObatController');
Route::resource('pegawai', 'App\Http\Controllers\PegawaiController');
Route::resource('pegawai', 'App\Http\Controllers\PegawaiController');


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