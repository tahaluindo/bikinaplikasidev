<?php



use App\Http\Controllers\Api\AyatBookmarkController;
use App\Http\Controllers\Api\AyatController;
use App\Http\Controllers\Api\BeritaController;
use App\Http\Controllers\Api\NotificationController;
use App\Http\Controllers\Api\BeritaDilihatController;
use App\Http\Controllers\Api\BeritaDishareController;
use App\Http\Controllers\Api\BeritaDisukaiController;
use App\Http\Controllers\Api\BibleController;
use App\Http\Controllers\Api\BibleReadingAyatController;
use App\Http\Controllers\Api\BibleReadingController;
use App\Http\Controllers\Api\BibleReadingJudulController;
use App\Http\Controllers\Api\CareGroupController;
use App\Http\Controllers\Api\CareGroupKategoriController;
use App\Http\Controllers\Api\CareGroupLokasiController;
use App\Http\Controllers\Api\CareGroupPertanyaanController;
use App\Http\Controllers\Api\DisukaiController;
use App\Http\Controllers\Api\EbookController;
use App\Http\Controllers\Api\GerejaController;
use App\Http\Controllers\Api\GerejakuController;
use App\Http\Controllers\Api\GerejakuDilihatController;
use App\Http\Controllers\Api\GerejakuDisukaiController;
use App\Http\Controllers\Api\GerejakuKategoriController;
use App\Http\Controllers\Api\GerejakuKomentarController;
use App\Http\Controllers\Api\GivingController;
use App\Http\Controllers\Api\JemaatController;
use App\Http\Controllers\Api\LaguSionController;
use App\Http\Controllers\Api\LiveStreamingController;
use App\Http\Controllers\Api\JudulBookmarkController;
use App\Http\Controllers\Api\JudulController;
use App\Http\Controllers\Api\PendetaController;
use App\Http\Controllers\Api\RenunganController;
use App\Http\Controllers\Api\RumahController;
use App\Http\Controllers\Api\SekolahSabatController;
use App\Http\Controllers\Api\SliderController;
use App\Http\Controllers\Api\TentangController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\FasilitasController;
use App\Http\Controllers\Api\VideoController;
use App\Http\Controllers\Api\VideoKategoriController;
use App\Http\Controllers\Api\WeCareController;
use App\Http\Controllers\Api\WeCareKategoriController;
use App\Http\Controllers\Api\WeCareSliderController;
use App\Http\Controllers\Api\WeCareUserController;
use App\Http\Controllers\Api\CareGroupVideoController;
use App\Http\Controllers\WeCareHeroController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// dd("Aplikasi di suspend!");

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('user/add-foto-profile', [UserController::class, 'addFotoProfile']);
Route::get('user/forgot-password-done', [UserController::class, 'forgotPasswordDone']);
Route::get('user/get-current-user-like', [UserController::class, 'getCurrentUserLike']);
Route::get('user/set-current-user-like', [UserController::class, 'setCurrentUserLike']);
Route::post('user/forgot-password', [UserController::class, 'forgotPassword']);
Route::get('user/login', [UserController::class, 'login']);
Route::post('user/register-manual', [UserController::class, 'registerManual']);
Route::get('user/profile/{user}', [UserController::class, 'profile']);
Route::get('user/verifikasi', [UserController::class, 'verifikasi']);
Route::get('user/check-verifikasi', [UserController::class, 'checkVerifikasi']);
Route::resource('user', UserController::class)->parameters(['user' => 'user']);

Route::get('gerejaku/add-komentar', [GerejakuController::class, 'addKomentar']);
Route::get('gerejaku/add-dilihat', [GerejakuController::class, 'addDilihat']);
Route::get('gerejaku/add-disukai', [GerejakuController::class, 'addDisukai']);
Route::get('gerejaku/add-dishare', [GerejakuController::class, 'addDishare']);
Route::resource('gerejaku', GerejakuController::class)->parameters(['gerejaku' => 'gerejaku']);
Route::resource('gerejaku-komentar', GerejakuKomentarController::class)->parameters(['gerejaku_komentar' => 'gerejaku_komentar']);
Route::resource('gerejaku-disukai', GerejakuDisukaiController::class)->parameters(['gerejaku_disukai' => 'gerejaku_disukai']);
Route::resource('gerejaku-dilihat', GerejakuDilihatController::class)->parameters(['gerejaku_dilihat' => 'gerejaku_dilihat']);
Route::resource('gerejaku-kategori', GerejakuKategoriController::class)->parameters(['gerejaku_kategori' => 'gerejaku_kategori']);

Route::get('berita/add-komentar', [BeritaController::class, 'addKomentar']);
Route::get('berita/add-dilihat', [BeritaController::class, 'addDilihat']);
Route::get('berita/add-disukai', [BeritaController::class, 'addDisukai']);
Route::get('berita/add-dishare', [BeritaController::class, 'addDishare']);
Route::resource('berita-disukai', BeritaDisukaiController::class)->parameters(['berita' => 'berita']);
Route::resource('berita-dilihat', BeritaDilihatController::class)->parameters(['berita_disukai' => 'berita_disukai']);
Route::resource('berita-dishare', BeritaDishareController::class)->parameters(['berita_dilihat' => 'berita_dilihat']);
Route::resource('berita-komentar', BeritaKomentarController::class)->parameters(['berita_dishare' => 'berita_dishare']);
Route::resource('berita', BeritaController::class)->parameters(['berita' => 'berita']);

Route::resource('slider', SliderController::class)->parameters(['slider' => 'slider']);
Route::resource('care-group-pertanyaan', CareGroupPertanyaanController::class)->parameters(['care_group_pertanyaan' => 'care_group_pertanyaan']);
Route::resource('care-group-lokasi', CareGroupLokasiController::class)->parameters(['care_group_lokasi' => 'care_group_lokasi']);
Route::resource('care-group-kategori', CareGroupKategoriController::class)->parameters(['care_group_kategori' => 'care_group_kategori']);
Route::get('care-group/join', [CareGroupController::class, 'join']);
Route::get('care-group/cancel', [CareGroupController::class, 'cancel']);
Route::resource('care-group', CareGroupController::class)->parameters(['care_group' => 'care_group']);
Route::resource('care-group-video', CareGroupVideoController::class)->parameters(['care_group_video' => 'care_group_video']);

Route::resource('bible', BibleController::class)->parameters(['bible' => 'bible']);
Route::get('judul-bookmark/remove', [JudulBookmarkController::class, 'remove']);
Route::get('judul-bookmark/add', [JudulBookmarkController::class, 'add']);
Route::resource('judul-bookmark', JudulBookmarkController::class)->parameters(['judulBookmark' => 'judulBookmark']);
Route::resource('lokasi', AyatController::class)->parameters(['lokasi' => 'lokasi']);
Route::resource('judul', JudulController::class)->parameters(['judul' => 'judul']);
Route::get('bible-reading/bookmark', [BibleReadingController::class, 'bookmark']);
Route::resource('bible-reading', BibleReadingController::class)->parameters(['bible_reading' => 'bible_reading']);
Route::resource('bible-reading-judul', BibleReadingJudulController::class)->parameters(['bible_reading_judul' => 'bible_reading_judul']);
Route::resource('lagu-sion', LaguSionController::class)->parameters(['lagu_sion' => 'lagu_sion']);

Route::resource('gereja', GerejaController::class)->parameters(['gereja' => 'gereja']);
Route::resource('jemaat', JemaatController::class)->parameters(['jemaat' => 'jemaat']);
Route::resource('pendeta', PendetaController::class)->parameters(['pendeta' => 'pendeta']);
Route::get('ebook/add-komentar', [EbookController::class, 'addKomentar']);
Route::get('ebook/add-dilihat', [EbookController::class, 'addDilihat']);
Route::get('ebook/add-disukai', [EbookController::class, 'addDisukai']);
Route::get('ebook/add-dishare', [EbookController::class, 'addDishare']);
Route::resource('ebook-disukai', EbookDisukaiController::class)->parameters(['ebook' => 'ebook']);
Route::resource('ebook-dilihat', EbookDilihatController::class)->parameters(['ebook_disukai' => 'ebook_disukai']);
Route::resource('ebook-dishare', EbookDishareController::class)->parameters(['ebook_dilihat' => 'ebook_dilihat']);
Route::resource('ebook-komentar', EbookKomentarController::class)->parameters(['ebook_dishare' => 'ebook_dishare']);
Route::resource('ebook', EbookController::class)->parameters(['ebook' => 'ebook']);

Route::get('renungan/edit-komentar', [RenunganController::class, 'editKomentar']);
Route::get('renungan/add-komentar', [RenunganController::class, 'addKomentar']);
Route::get('renungan/add-dilihat', [RenunganController::class, 'addDilihat']);
Route::get('renungan/add-disukai', [RenunganController::class, 'addDisukai']);
Route::get('renungan/add-dishare', [RenunganController::class, 'addDishare']);
Route::resource('renungan-disukai', RenunganDisukaiController::class)->parameters(['renungan' => 'renungan']);
Route::resource('renungan-dilihat', RenunganDilihatController::class)->parameters(['renungan_disukai' => 'renungan_disukai']);
Route::resource('renungan-dishare', RenunganDishareController::class)->parameters(['renungan_dilihat' => 'renungan_dilihat']);
Route::resource('renungan-komentar', RenunganKomentarController::class)->parameters(['renungan_dishare' => 'renungan_dishare']);
Route::resource('renungan', RenunganController::class)->parameters(['renungan' => 'renungan']);
Route::post('we-care/create-campaign', [WeCareController::class, 'createCampaign']);
Route::get('we-care/update-status', [WeCareController::class, 'updateStatus']);
Route::get('we-care/detail-transaksi', [WeCareController::class, 'detailTransaksi']);
Route::get('we-care/request-transaksi', [WeCareController::class, 'requestTransaksi']);
Route::get('we-care/kategori', [WeCareController::class, 'kategori']);
Route::resource('we-care', WeCareController::class)->parameters(['we_care' => 'we_care']);
Route::resource('we-care-hero', WeCareHeroController::class)->parameters(['we_care_hero' => 'we_care_hero']);
Route::resource('we-care-user', WeCareUserController::class)->parameters(['we_care_user' => 'we_care_user']);
Route::resource('we-care-slider', WeCareSliderController::class)->parameters(['we_care_slider' => 'we_care_slider']);
Route::resource('we-care-kategori', WeCareKategoriController::class)->parameters(['we_care_kategori' => 'we_care_kategori']);
Route::resource('live-streaming', LiveStreamingController::class)->parameters(['live_streaming' => 'live_streaming']);
Route::resource('video', VideoController::class)->parameters(['video' => 'video']);
Route::resource('video-kategori', VideoKategoriController::class)->parameters(['video_kategori' => 'video_kategori']);
Route::get('giving/update-status', [GivingController::class, 'updateStatus']);
Route::get('giving/detail-transaksi', [GivingController::class, 'detailTransaksi']);
Route::get('giving/get-giving-jenis-persembahan', [GivingController::class, 'getGivingJenisPersembahan']);
Route::get('giving/redirect', [GivingController::class, 'redirect']);
Route::get('giving/request-transaksi', [GivingController::class, 'requestTransaksi']);
Route::resource('giving', VideoKategoriController::class)->parameters(['giving' => 'giving']);
Route::get('sekolah-sabat/add-komentar', [SekolahSabatController::class, 'addKomentar']);
Route::get('sekolah-sabat/edit-komentar', [SekolahSabatController::class, 'editKomentar']);
Route::get('sekolah-sabat/get-sekolah-sabat-materi/{sekolahSabatMateri}', [SekolahSabatController::class, 'getSekolahSabatMateri']);
Route::resource('sekolah-sabat', SekolahSabatController::class)->parameters(['sekolah_sabat' => 'sekolah_sabat']);

Route::resource('notification', NotificationController::class)->parameters(['notification' => 'notification']);