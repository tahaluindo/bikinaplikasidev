<?php


use App\Models\Guru;
use App\Models\Mapel;
use App\Models\Siswa;
use App\Models\User;
use App\Models\Kelas;
use App\Models\Fasilitas;
use App\Models\Jenjang;
use App\Models\Pengaturan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;

Route::post('siswa/laporan/print', ['App\Http\Controllers\SiswaController', 'print'])->name('siswa.print');
Route::get('siswa/laporan', ['App\Http\Controllers\SiswaController', 'laporan'])->name('siswa.laporan.index');
Route::get('siswa/hapus_semua', ['App\Http\Controllers\SiswaController', 'hapus_semua'])->name('siswa.hapus_semua');
Route::resource('siswa', 'App\Http\Controllers\SiswaController');

Route::get('/logout', function () {
    auth()->logout();
    
    return redirect('/');
});

Route::get('/register', function (Request $request) {
    if ($request->from_cek == "Ya") {
        $siswa = Siswa::where('nomor_registrasi', $request->nomor_registrasi)->first();

        $request->validate([
            'nomor_registrasi' => "required|exists:siswa,nomor_registrasi"
        ]);

        if ($siswa->status == 'Pendaftaran Diterima') {

            return redirect('/register')->with('success', "Selamat, anda diterima.");
        } else {
            return redirect('/register')->with('error', "Ma'af, Status Kamu: " . $siswa->status);
        }
    }
        
    $data['mapel'] = Mapel::get();
    $data['kelas'] = Kelas::get();
    $data['jenjang'] = Jenjang::get();
    $data['pengaturan'] = Pengaturan::first();

    return view('auth.register', $data);
});

Route::get('/update-nomor-registrasi', function (Request $request) {
    foreach (Siswa::all() as $item) {
        $siswa = Siswa::where('nomor_registrasi', null)->first();
        $siswaAkhir = Siswa::whereNotNull('nomor_registrasi')->get()->last();

        $no_jenjang = rand(1, 2);

        $jenjang = Jenjang::findOrFail($no_jenjang);

        $siswa->update([
            'jenjang_id' => $no_jenjang,
            'nomor_registrasi' => $jenjang->nama . preg_replace("/[A-Za-z]/", "", ++$siswaAkhir->nomor_registrasi)
        ]);
    }
});
//////////////
Route::get('/', function (Request $request) {


    $data['guru'] = Guru::get();
    $data['mapel'] = Mapel::get();
    $data['kelass'] = Kelas::get();

    $data['siswa'] = Siswa::get()->map(function ($item) {
        $item->tahun = date('Y', strtotime($item->created_at));

        return $item;
    });

    $data['jenjang'] = Jenjang::get();
    $data['fasilitas'] = Fasilitas::get();
    $data['pengaturan'] = Pengaturan::first();

    return view('index', $data);
});

Route::post('login_manual', [LoginController::class, 'authenticate'])->name('login_manual');

Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {

    Route::get('/dashboard', function () {

        if(auth()->user()->level == 'Siswa') {
            return redirect('pembayaran');
        }

        if(auth()->user()->level == 'Guru') {
            return redirect('progress');
        }

        $data['users_baru'] = User::where('created_at', 'like', '%' . \Carbon\Carbon::today()->toDateString() . '%')->get();
        $data['siswa'] = Siswa::get();
        $data['guru'] = Guru::get();
        $data['mapel'] = Mapel::get();
        $data['kelas'] = Kelas::get();


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

    Route::post('mapel/laporan/print', ['App\Http\Controllers\MapelController', 'print'])->name('mapel.print');
    Route::get('mapel/laporan', ['App\Http\Controllers\MapelController', 'laporan'])->name('mapel.laporan.index');
    Route::get('mapel/hapus_semua', ['App\Http\Controllers\MapelController', 'hapus_semua'])->name('mapel.hapus_semua');
    Route::resource('mapel', 'App\Http\Controllers\MapelController');

    Route::post('guru/laporan/print', ['App\Http\Controllers\GuruController', 'print'])->name('guru.print');
    Route::get('guru/laporan', ['App\Http\Controllers\GuruController', 'laporan'])->name('guru.laporan.index');
    Route::get('guru/hapus_semua', ['App\Http\Controllers\GuruController', 'hapus_semua'])->name('guru.hapus_semua');
    Route::resource('guru', 'App\Http\Controllers\GuruController');

    Route::post('jenjang/laporan/print', ['App\Http\Controllers\JenjangController', 'print'])->name('jenjang.print');
    Route::get('jenjang/laporan', ['App\Http\Controllers\JenjangController', 'laporan'])->name('jenjang.laporan.index');
    Route::get('jenjang/hapus_semua', ['App\Http\Controllers\JenjangController', 'hapus_semua'])->name('jenjang.hapus_semua');
    Route::resource('jenjang', 'App\Http\Controllers\JenjangController');

    Route::post('pembayaran/laporan/print', ['App\Http\Controllers\PembayaranController', 'print'])->name('pembayaran.print');
    Route::get('pembayaran/laporan', ['App\Http\Controllers\PembayaranController', 'laporan'])->name('pembayaran.laporan.index');
    Route::get('pembayaran/hapus_semua', ['App\Http\Controllers\PembayaranController', 'hapus_semua'])->name('pembayaran.hapus_semua');
    Route::resource('pembayaran', 'App\Http\Controllers\PembayaranController');
    
    Route::post('progress/laporan/print', ['App\Http\Controllers\ProgressController', 'print'])->name('progress.print');
    Route::get('progress/laporan', ['App\Http\Controllers\ProgressController', 'laporan'])->name('progress.laporan.index');
    Route::get('progress/hapus_semua', ['App\Http\Controllers\ProgressController', 'hapus_semua'])->name('progress.hapus_semua');
    Route::resource('progress', 'App\Http\Controllers\ProgressController');

    Route::post('kelas/laporan/print', ['App\Http\Controllers\KelasController', 'print'])->name('kelas.print');
    Route::get('kelas/laporan', ['App\Http\Controllers\KelasController', 'laporan'])->name('kelas.laporan.index');
    Route::get('kelas/hapus_semua', ['App\Http\Controllers\KelasController', 'hapus_semua'])->name('kelas.hapus_semua');
    Route::resource('kelas', 'App\Http\Controllers\KelasController')->parameter("kelas", "kelas");

    Route::post('mapel-detail/laporan/print', ['App\Http\Controllers\MapelDetailController', 'print'])->name('mapel-detail.print');
    Route::get('mapel-detail/laporan', ['App\Http\Controllers\MapelDetailController', 'laporan'])->name('mapel-detail.laporan.index');
    Route::get('mapel-detail/hapus_semua', ['App\Http\Controllers\MapelDetailController', 'hapus_semua'])->name('mapel-detail.hapus_semua');
    Route::resource('mapel-detail', 'App\Http\Controllers\MapelDetailController');

    Route::post('pembayaran-detail/laporan/print', ['App\Http\Controllers\PembayaranDetailController', 'print'])->name('pembayaran-detail.print');
    Route::get('pembayaran-detail/laporan', ['App\Http\Controllers\PembayaranDetailController', 'laporan'])->name('pembayaran-detail.laporan.index');
    Route::get('pembayaran-detail/hapus_semua', ['App\Http\Controllers\PembayaranDetailController', 'hapus_semua'])->name('pembayaran-detail.hapus_semua');
    Route::resource('pembayaran-detail', 'App\Http\Controllers\PembayaranDetailController');

    Route::resource('kelas-detail', 'App\Http\Controllers\KelasDetailController');

    Route::post('fasilitas/laporan/print', ['App\Http\Controllers\FasilitasController', 'print'])->name('fasilitas.print');
    Route::get('fasilitas/laporan', ['App\Http\Controllers\FasilitasController', 'laporan'])->name('fasilitas.laporan.index');
    Route::get('fasilitas/hapus_semua', ['App\Http\Controllers\FasilitasController', 'hapus_semua'])->name('fasilitas.hapus_semua');
    Route::resource('fasilitas', 'App\Http\Controllers\FasilitasController')->parameter('fasilitas', 'fasilitas');

    Route::post('progress/laporan/print', ['App\Http\Controllers\ProgressController', 'print'])->name('progress.print');
    Route::get('progress/laporan', ['App\Http\Controllers\ProgressController', 'laporan'])->name('progress.laporan.index');
    Route::get('progress/hapus_semua', ['App\Http\Controllers\ProgressController', 'hapus_semua'])->name('progress.hapus_semua');
    Route::resource('progress', 'App\Http\Controllers\ProgressController')->parameter('progress', 'progress');

    Route::get('pengaturan/hero-section/hapus_semua', ['App\Http\Controllers\PengaturanController', 'heroSectionHapusSemua'])->name('pengaturan.hero-section.hapus_semua');
    Route::get('pengaturan/hero-section', ['App\Http\Controllers\PengaturanController', 'heroSection'])->name("pengaturan.hero-section.index");
    Route::get('pengaturan/hero-section/create', ['App\Http\Controllers\PengaturanController', 'heroSectionCreate'])->name("pengaturan.hero-section-create");
    Route::get('pengaturan/hero-section/{hero_section}/edit', ['App\Http\Controllers\PengaturanController', 'heroSectionEdit'])->name("pengaturan.hero-section-edit");
    Route::put('pengaturan/hero-section/{hero_section}', ['App\Http\Controllers\PengaturanController', 'heroSectionUpdate'])->name("pengaturan.hero-section-update");
    Route::post('pengaturan/hero-section', ['App\Http\Controllers\PengaturanController', 'heroSectionStore'])->name("pengaturan.hero-section-store");
    Route::delete('pengaturan/hero-section/{hero_section}', ['App\Http\Controllers\PengaturanController', 'heroSectionDelete'])->name("pengaturan.hero-section-delete");

    Route::get('pengaturan/tentang', ['App\Http\Controllers\PengaturanController', 'tentang'])->name("pengaturan.tentang.index");
    Route::put('pengaturan/tentang', ['App\Http\Controllers\PengaturanController', 'tentangUpdate'])->name("pengaturan.tentang-update");

    Route::get('pengaturan/batas-akhir-registrasi', ['App\Http\Controllers\PengaturanController', 'batasAkhirRegistrasi'])->name("pengaturan.batas-akhir-registrasi.index");
    Route::put('pengaturan/batas-akhir-registrasi', ['App\Http\Controllers\PengaturanController', 'batasAkhirRegistrasiUpdate'])->name("pengaturan.batas-akhir-registrasi-update");

    Route::get('pengaturan/prestasi/hapus_semua', ['App\Http\Controllers\PengaturanController', 'prestasiHapusSemua'])->name('pengaturan.prestasi.hapus_semua');
    Route::get('pengaturan/prestasi', ['App\Http\Controllers\PengaturanController', 'prestasi'])->name("pengaturan.prestasi.index");
    Route::get('pengaturan/prestasi/create', ['App\Http\Controllers\PengaturanController', 'prestasiCreate'])->name("pengaturan.prestasi-create");
    Route::get('pengaturan/prestasi/{prestasi}/edit', ['App\Http\Controllers\PengaturanController', 'prestasiEdit'])->name("pengaturan.prestasi-edit");
    Route::put('pengaturan/prestasi/{prestasi}', ['App\Http\Controllers\PengaturanController', 'prestasiUpdate'])->name("pengaturan.prestasi-update");
    Route::post('pengaturan/prestasi', ['App\Http\Controllers\PengaturanController', 'prestasiStore'])->name("pengaturan.prestasi-store");
    Route::delete('pengaturan/prestasi/{prestasi}', ['App\Http\Controllers\PengaturanController', 'prestasiDelete'])->name("pengaturan.prestasi-delete");

    Route::get('pengaturan/review/hapus_semua', ['App\Http\Controllers\PengaturanController', 'reviewHapusSemua'])->name('pengaturan.review.hapus_semua');
    Route::get('pengaturan/review', ['App\Http\Controllers\PengaturanController', 'review'])->name("pengaturan.review.index");
    Route::get('pengaturan/review/create', ['App\Http\Controllers\PengaturanController', 'reviewCreate'])->name("pengaturan.review-create");
    Route::get('pengaturan/review/{review}/edit', ['App\Http\Controllers\PengaturanController', 'reviewEdit'])->name("pengaturan.review-edit");
    Route::put('pengaturan/review/{review}', ['App\Http\Controllers\PengaturanController', 'reviewUpdate'])->name("pengaturan.review-update");
    Route::post('pengaturan/review', ['App\Http\Controllers\PengaturanController', 'reviewStore'])->name("pengaturan.review-store");
    Route::delete('pengaturan/review/{review}', ['App\Http\Controllers\PengaturanController', 'reviewDelete'])->name("pengaturan.review-delete");

    Route::get('pengaturan/logo', ['App\Http\Controllers\PengaturanController', 'logo'])->name("pengaturan.logo.index");
    Route::get('pengaturan/logo/{logo}/edit', ['App\Http\Controllers\PengaturanController', 'logoEdit'])->name("pengaturan.logo-edit");
    Route::put('pengaturan/logo/{logo}', ['App\Http\Controllers\PengaturanController', 'logoUpdate'])->name("pengaturan.logo-update");
    Route::delete('pengaturan/logo/{logo}', ['App\Http\Controllers\PengaturanController', 'logoDelete'])->name("pengaturan.logo-delete");

    Route::get('pengaturan/logo-kerjasama/hapus_semua', ['App\Http\Controllers\PengaturanController', 'logoKerjasamaHapusSemua'])->name('pengaturan.logo-kerjasama.hapus_semua');
    Route::get('pengaturan/logo-kerjasama', ['App\Http\Controllers\PengaturanController', 'logoKerjasama'])->name("pengaturan.logo-kerjasama.index");
    Route::get('pengaturan/logo-kerjasama/create', ['App\Http\Controllers\PengaturanController', 'logoKerjasamaCreate'])->name("pengaturan.logo-kerjasama-create");
    Route::get('pengaturan/logo-kerjasama/{hero_section}/edit', ['App\Http\Controllers\PengaturanController', 'logoKerjasamaEdit'])->name("pengaturan.logo-kerjasama-edit");
    Route::put('pengaturan/logo-kerjasama/{hero_section}', ['App\Http\Controllers\PengaturanController', 'logoKerjasamaUpdate'])->name("pengaturan.logo-kerjasama-update");
    Route::post('pengaturan/logo-kerjasama', ['App\Http\Controllers\PengaturanController', 'logoKerjasamaStore'])->name("pengaturan.logo-kerjasama-store");
    Route::delete('pengaturan/logo-kerjasama/{hero_section}', ['App\Http\Controllers\PengaturanController', 'logoKerjasamaDelete'])->name("pengaturan.logo-kerjasama-delete");


    Route::get('pengaturan/angkatan-registrasi', ['App\Http\Controllers\PengaturanController', 'angkatanRegistrasi'])->name("pengaturan.angkatan-registrasi.index");
    Route::put('pengaturan/angkatan-registrasi', ['App\Http\Controllers\PengaturanController', 'angkatanRegistrasiUpdate'])->name("pengaturan.angkatan-registrasi-update");
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