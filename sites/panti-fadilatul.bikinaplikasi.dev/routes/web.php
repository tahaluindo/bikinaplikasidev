<?php


use App\Models\AnakAsuh;
use App\Models\BukuTamu;
use App\Models\Donatur;
use App\Models\Meja;
use App\Models\Menu;
use App\Models\Pengaturan;
use App\Models\Pengeluaran;
use App\Models\Penjual;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;

Route::get('/', function () {
    $data['visi'] = json_decode(Pengaturan::select('profil')->first()->profil)->visi;
    $data['misi'] = json_decode(json_decode(Pengaturan::select('profil')->first()->profil)->misi);
    $data['kegiatan_panti'] = json_decode(Pengaturan::select('kegiatan_panti')->first()->kegiatan_panti);
    $data['profil'] = json_decode(Pengaturan::select('profil')->first()->profil);
    $data['rekening_donasi'] = json_decode(Pengaturan::select('rekening_donasi')->first()->rekening_donasi);

    return view('index', $data);
});


    Route::get('laporan/donatur', ['App\Http\Controllers\DonaturController', 'laporan'])->name("laporan.donatur");
    Route::post('laporan/donatur/print', ['App\Http\Controllers\DonaturController', 'print'])->name("laporan.donatur.print");
    Route::get('donatur/{donatur}/konfirmasi', ['App\Http\Controllers\DonaturController', 'konfirmasi'])->name("donatur.konfirmasi");
    Route::get('donatur/hapus_semua', ['App\Http\Controllers\DonaturController', 'hapus_semua'])->name('donatur.hapus_semua');
    Route::resource('donatur', 'App\Http\Controllers\DonaturController');

Route::post('login_manual', [LoginController::class, 'authenticate'])->name('login_manual');

Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {

    Route::get('/dashboard', function () {
        $data['pengeluarans'] = Pengeluaran::all();
        $data['anak_asuhs'] = AnakAsuh::all();
        $data['donaturs'] = \App\Models\Donatur::all();
        $data['pengurus'] = \App\Models\Pengurus::all();

        $data['grafiks'] = [];

        $grafik_donatur = Donatur::whereBetween('tanggal', [now()->addDays(-14)->toDateString(), now()->toDateString()])->get();
        $grafik_pengeluaran = Pengeluaran::whereBetween('tanggal', [now()->addDays(-14)->toDateString(), now()->toDateString()])->get();

        foreach ($grafik_donatur as $key => $item) {
            $data['grafiks'][$key]['tanggal'] = $item->tanggal;

            $data['grafiks'][$key]['pemasukan'] = $grafik_donatur->where('tanggal', $item->tanggal)->sum('jumlah');
            $data['grafiks'][$key]['pengeluaran'] = $grafik_pengeluaran->where('tanggal', $item->tanggal)->sum('jumlah');
        }

        return view('dashboard', $data);

    })->name('dashboard');

    Route::get('user/profile', [UserController::class, 'profile'])->name('user.profile');
    Route::post('user/laporan/print', ['App\Http\Controllers\UserController', 'print'])->name('user.print');
    Route::get('user/{user}/profile', ['App\Http\Controllers\UserController', 'profile'])->name('user.profile');
    Route::put('user/{user}/profile/update', ['App\Http\Controllers\UserController', 'profileUpdate'])->name('user.profile.update');
    Route::get('user/laporan', ['App\Http\Controllers\UserController', 'laporan'])->name('user.laporan.index');
    Route::get('user/hapus_semua', ['App\Http\Controllers\UserController', 'hapus_semua'])->name('user.hapus_semua');
    Route::resource('user', 'App\Http\Controllers\UserController')->parameters(['user' => 'user']);

    Route::resource('pesanan', 'App\Http\Controllers\PesananController');
    Route::resource('pesanan-detail', 'App\Http\Controllers\PesananDetailController');
    Route::resource('pesanan-detail', 'App\Http\Controllers\PesananDetailController');

    Route::get('anak-asuh/hapus_semua', ['App\Http\Controllers\AnakAsuhController', 'hapus_semua'])->name('anak-asuh.hapus_semua');
    Route::get('laporan/anak-asuh', ['App\Http\Controllers\AnakAsuhController', 'laporan'])->name("laporan.anak-asuh");
    Route::post('laporan/anak-asuh/print', ['App\Http\Controllers\AnakAsuhController', 'print'])->name("anak-asuh.print");
    Route::resource('anak-asuh', 'App\Http\Controllers\AnakAsuhController');

    Route::get('pengurus/hapus_semua', ['App\Http\Controllers\PengurusController', 'hapus_semua'])->name('pengurus.hapus_semua');
    Route::resource('pengurus', 'App\Http\Controllers\PengurusController')->parameters([
        'pengurus' => 'pengurus'
    ]);

    Route::post('ckeditor/upload', ['App\Http\Controllers\CKEditorController', 'upload']);


    Route::get('pengeluaran/hapus_semua', ['App\Http\Controllers\PengeluaranController', 'hapus_semua'])->name('pengeluaran.hapus_semua');
    Route::get('laporan/pengeluaran', ['App\Http\Controllers\PengeluaranController', 'laporan'])->name("laporan.pengeluaran");
    Route::post('laporan/pengeluaran/print', ['App\Http\Controllers\PengeluaranController', 'print'])->name("laporan.pengeluaran.print");
    Route::resource('pengeluaran', 'App\Http\Controllers\PengeluaranController');

    Route::get('buku-tamu/hapus_semua', ['App\Http\Controllers\BukuTamuController', 'hapus_semua'])->name('buku-tamu.hapus_semua');
    Route::resource('buku-tamu', 'App\Http\Controllers\BukuTamuController');

    Route::get('pengaturan/visi', ['App\Http\Controllers\PengaturanController', 'visi'])->name("pengaturan.visi");
    Route::put('pengaturan/visi', ['App\Http\Controllers\PengaturanController', 'visiUpdate'])->name("pengaturan.visi-update");

    Route::get('pengaturan/misi', ['App\Http\Controllers\PengaturanController', 'misi'])->name("pengaturan.misi");
    Route::put('pengaturan/misi', ['App\Http\Controllers\PengaturanController', 'misiUpdate'])->name("pengaturan.misi-update");

    Route::get('pengaturan/kegiatan-panti/hapus_semua', ['App\Http\Controllers\PengaturanController', 'kegiatanPantiHapusSemua'])->name('pengaturan.kegiatan-panti.hapus_semua');
    Route::get('pengaturan/kegiatan-panti', ['App\Http\Controllers\PengaturanController', 'kegiatanPanti'])->name("pengaturan.kegiatan-panti");
    Route::get('pengaturan/kegiatan-panti/create', ['App\Http\Controllers\PengaturanController', 'kegiatanPantiCreate'])->name("pengaturan.kegiatan-panti-create");
    Route::get('pengaturan/kegiatan-panti/{kegiatan_panti}/edit', ['App\Http\Controllers\PengaturanController', 'kegiatanPantiEdit'])->name("pengaturan.kegiatan-panti-edit");
    Route::put('pengaturan/kegiatan-panti/{kegiatan_panti}', ['App\Http\Controllers\PengaturanController', 'kegiatanPantiUpdate'])->name("pengaturan.kegiatan-panti-update");
    Route::post('pengaturan/kegiatan-panti', ['App\Http\Controllers\PengaturanController', 'kegiatanPantiStore'])->name("pengaturan.kegiatan-panti-store");
    Route::delete('pengaturan/kegiatan-panti/{kegiatan_panti}', ['App\Http\Controllers\PengaturanController', 'kegiatanPantiDelete'])->name("pengaturan.kegiatan-panti-delete");

    Route::get('pengaturan/profil', ['App\Http\Controllers\PengaturanController', 'profil'])->name("pengaturan.profil");
    Route::put('pengaturan/profil', ['App\Http\Controllers\PengaturanController', 'profilUpdate'])->name("pengaturan.profil-update");

    Route::get('pengaturan/rekening-donasi/hapus_semua', ['App\Http\Controllers\PengaturanController', 'rekeningDonasiHapusSemua'])->name('pengaturan.rekening-donasi.hapus_semua');
    Route::get('pengaturan/rekening-donasi', ['App\Http\Controllers\PengaturanController', 'rekeningDonasi'])->name("pengaturan.rekening-donasi");
    Route::get('pengaturan/rekening-donasi/create', ['App\Http\Controllers\PengaturanController', 'rekeningDonasiCreate'])->name("pengaturan.rekening-donasi-create");
    Route::get('pengaturan/rekening-donasi/{kegiatan_panti}/edit', ['App\Http\Controllers\PengaturanController', 'rekeningDonasiEdit'])->name("pengaturan.rekening-donasi-edit");
    Route::put('pengaturan/rekening-donasi/{kegiatan_panti}', ['App\Http\Controllers\PengaturanController', 'rekeningDonasiUpdate'])->name("pengaturan.rekening-donasi-update");
    Route::post('pengaturan/rekening-donasi', ['App\Http\Controllers\PengaturanController', 'rekeningDonasiStore'])->name("pengaturan.rekening-donasi-store");
    Route::delete('pengaturan/rekening-donasi/{kegiatan_panti}', ['App\Http\Controllers\PengaturanController', 'rekeningDonasiDelete'])->name("pengaturan.rekening-donasi-delete");
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