<?php

use App\Http\Controllers\Api\AyatBookmarkController;
use App\Http\Controllers\BeritaKategoriController;
use App\Http\Controllers\QrCodeController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\AyatController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\SekolahSabatController;
use App\Http\Controllers\SekolahSabatMateriController;
use App\Http\Controllers\SekolahSabatMateriTanggalController;
use App\Http\Controllers\BibleController;
use App\Http\Controllers\BibleReadingController;
use App\Http\Controllers\BibleReadingJudulController;
use App\Http\Controllers\CareGroupController;
use App\Http\Controllers\CareGroupKategoriController;
use App\Http\Controllers\CareGroupLokasiController;
use App\Http\Controllers\CareGroupPertanyaanController;
use App\Http\Controllers\CareGroupUserController;
use App\Http\Controllers\CareGroupVideoController;
use App\Http\Controllers\EbookController;
use App\Http\Controllers\GerejaController;
use App\Http\Controllers\GerejakuController;
use App\Http\Controllers\GerejakuDilihatController;
use App\Http\Controllers\GerejakuDisukaiController;
use App\Http\Controllers\GerejakuKategoriController;
use App\Http\Controllers\GerejakuKomentarController;
use App\Http\Controllers\JemaatController;
use App\Http\Controllers\LaguSionController;
use App\Http\Controllers\JudulController;
use App\Http\Controllers\PendetaController;
use App\Http\Controllers\RenunganController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\VideoKategoriController;
use App\Http\Controllers\WeCareController;
use App\Http\Controllers\WeCareHeroController;
use App\Http\Controllers\WeCareKategoriController;
use App\Http\Controllers\WeCareSliderController;
use App\Http\Controllers\WeCareUserController;
use App\Models\Rumah;
use App\Models\Tentang;
use App\Models\Disukai;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;

//dd(Hash::make('jemaat'));
// dd("Aplikasi di suspend!");

Route::get('/', function () {

    return redirect('login');
});

Route::post('login_manual', [LoginController::class, 'authenticate'])->name('login_manual');

Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {

    Route::get('/dashboard', function () {

        $data['users_baru'] = User::where(User::CREATED_AT, 'like', '%' . \Carbon\Carbon::today()->toDateString() . '%')->get();
        $data['users'] = User::all();

        $data['tentangs'] = Tentang::all();

        $data['grafiks'] = [];

        $grafik_user = User::whereBetween('tanggal', [now()->addDays(-15)->toDateString(), now()->toDateString()]);

        for ($i = 0; $i < 15; $i++) {
            $tanggal = now()->addDays(-($i))->format("Y-m-d");

            $data['grafiks']['tanggals'][] = $tanggal;
            $data['grafiks']['users'][] = User::where('created_at', 'like', '%' . $tanggal . '%')->get()->count();
        }

        return view('dashboard', $data);
    })->name('dashboard');
    Route::resource('fasilitas', 'App\Http\Controllers\FasilitasController')->parameters(['fasilitas' => 'fasilitas']);

    Route::get('user/profile', [UserController::class, 'profile'])->name('user.profile');
    Route::get('user/set-pemilik-gerejaku/{user}', [UserController::class, 'setPemilikRumah'])->name('user.set-pemilik-gerejaku');
    Route::post('user/laporan/print', ['App\Http\Controllers\UserController', 'print'])->name('user.print');
    Route::get('user/{user}/profile', ['App\Http\Controllers\UserController', 'profile'])->name('user.profile');
    Route::put('user/{user}/profile/update', ['App\Http\Controllers\UserController', 'profileUpdate'])->name('user.profile.update');
    Route::get('user/laporan', ['App\Http\Controllers\UserController', 'laporan'])->name('user.laporan.index');
    Route::get('user/hapus_semua', ['App\Http\Controllers\UserController', 'hapus_semua'])->name('user.hapus_semua');
    Route::resource('user', 'App\Http\Controllers\UserController')->parameters(['user' => 'user']);

    Route::post('ckeditor/upload', ['App\Http\Controllers\CKEditorController', 'upload']);
    Route::get('tentang', [\App\Http\Controllers\TentangController::class, 'index'])->name('tentang.index');

    Route::resource('gerejaku', GerejakuController::class)->parameters(['gerejaku' => 'gerejaku']);
    Route::resource('gerejaku-komentar', GerejakuKomentarController::class)->parameters(['gerejaku_komentar' => 'gerejaku_komentar']);
    Route::resource('gerejaku-disukai', GerejakuDisukaiController::class)->parameters(['gerejaku_disukai' => 'gerejaku_disukai']);
    Route::resource('gerejaku-dilihat', GerejakuDilihatController::class)->parameters(['gerejaku_dilihat' => 'gerejaku_dilihat']);
    Route::resource('gerejaku-kategori', GerejakuKategoriController::class)->parameters(['gerejaku_kategori' => 'gerejaku_kategori']);
    Route::resource('berita', BeritaController::class)->parameters(['berita' => 'berita']);
    Route::resource('sekolah-sabat-materi-tanggal', SekolahSabatMateriTanggalController::class)->parameters(['sekolahSabatMateriTanggal' => 'sekolahSabatMateriTanggal']);
    Route::resource('sekolah-sabat-materi', SekolahSabatMateriController::class)->parameters(['sekolahSabatMateri' => 'sekolahSabatMateri']);
    Route::resource('sekolah-sabat', SekolahSabatController::class)->parameters(['sekolahSabat' => 'sekolahSabat']);
    Route::resource('berita-kategori', BeritaKategoriController::class)->parameters(['berita_kategori' => 'berita_kategori']);
    Route::resource('slider', SliderController::class)->parameters(['slider' => 'slider']);
    Route::resource('care-group-pertanyaan', CareGroupPertanyaanController::class)->parameters(['care_group_pertanyaan' => 'care_group_pertanyaan']);
    Route::resource('care-group-lokasi', CareGroupLokasiController::class)->parameters(['care_group_lokasi' => 'care_group_lokasi']);
    Route::resource('care-group-user', CareGroupUserController::class)->parameters(['care_group_user' => 'care_group_user']);
    Route::resource('care-group-kategori', CareGroupKategoriController::class)->parameters(['care_group_kategori' => 'care_group_kategori']);
    Route::resource('care-group-video', CareGroupVideoController::class)->parameters(['care_group_video' => 'care_group_video']);
    Route::resource('care-group', CareGroupController::class)->parameters(['care_group' => 'care_group']);

    
    Route::get('bible-reading/reset', [BibleReadingController::class, 'reset']);
    Route::resource('bible-reading', BibleReadingController::class)->parameters(['bible_reading' => 'bible_reading']);
    Route::resource('bible/judul/ayat', AyatController::class, ['as' => 'bible.judul'])->parameters(['ayat' => 'ayat']);
    Route::resource('bible/judul', JudulController::class, ['as' => 'bible'])->parameters(['judul' => 'judul']);
    Route::resource('bible', BibleController::class)->parameters(['bible' => 'bible']);
    Route::resource('judul', JudulController::class)->parameters(['judul' => 'judul']);
    Route::resource('bible-reading', BibleReadingController::class)->parameters(['bible_reading' => 'bible_reading']);
    Route::resource('bible-reading-judul', BibleReadingJudulController::class)->parameters(['bible_reading_judul' => 'bible_reading_judul']);
    Route::resource('lagu-sion', LaguSionController::class)->parameters(['lagu_sion' => 'lagu_sion']);

    Route::resource('gereja', GerejaController::class)->parameters(['gereja' => 'gereja']);
    Route::resource('jemaat', JemaatController::class)->parameters(['jemaat' => 'jemaat']);
    Route::resource('pendeta', PendetaController::class)->parameters(['pendeta' => 'pendeta']);
    Route::resource('ebook', EbookController::class)->parameters(['ebook' => 'ebook']);
    Route::resource('ebook-kategori', \App\Http\Controllers\EbookKategoriController::class)->parameters(['ebook-kategori' => 'ebook-kategori']);
    Route::resource('renungan', RenunganController::class)->parameters(['renungan' => 'renungan']);
    Route::resource('renungan-kategori', \App\Http\Controllers\RenunganKategoriController::class)->parameters(['renungan-kategori' => 'renungan-kategori']);
    Route::resource('we-care-slider', WeCareSliderController::class)->parameters(['we_care_slider' => 'we_care_slider']);
    Route::resource('we-care-kategori', WeCareKategoriController::class)->parameters(['we_care_kategori' => 'we_care_kategori']);
    Route::resource('we-care-hero', WeCareHeroController::class)->parameters(['we_care_hero' => 'we_care_hero']);
    Route::resource('we-care-user', WeCareUserController::class)->parameters(['we_care_user' => 'we_care_user']);
    Route::get('we-care/{weCare}/terima', [WeCareController::class, 'terima']);
    Route::get('we-care/{weCare}/tolak', [WeCareController::class, 'tolak']);
    Route::resource('we-care', WeCareController::class)->parameters(['we_care' => 'we_care']);
    Route::resource('video', VideoController::class)->parameters(['video_kategori' => 'video_kategori']);
    Route::resource('video-kategori', VideoKategoriController::class)->parameters(['video_kategori' => 'video_kategori']);
    Route::resource('live-streaming', \App\Http\Controllers\LiveStreamingController::class)->parameters(['live_streaming' => 'live_streaming']);
    Route::resource('settings', SettingsController::class)->parameters(['video_kategori' => 'video_kategori']);
    
    Route::resource('qrcode', QrCodeController::class)->parameters(['qrcode' => 'qrcode']);
});
