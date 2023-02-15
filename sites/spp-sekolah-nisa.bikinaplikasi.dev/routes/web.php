<?php
// dd(\Hash::make('admin@gmail.com'));
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

// tidak perlu ke halaman welcome, langsung login saja, g penting soalny
Route::get('/', function () {
    return redirect()->route('login');
});

// matikan fiture register karena memang tidak ada fiture register
Auth::routes(['register' => false]);

// semua halaman di dalam group ini harus diakses setelah login
Route::middleware('auth')->group(function () {
    // halaman awal setelah login
    Route::get('home', 'HomeController@index')->name('home');

    // sekolah (cuman bisa edit dan update aja, krena datanya cuman 1)
    Route::resource('sekolah', 'SekolahController')->only(['edit', 'update']);

    // kelas
    Route::get('kelas/hapus_semua', 'KelasController@hapus_semua')->name('kelas.hapus_semua');
    Route::resource('kelas', 'KelasController')->parameters([
        'kelas' => 'kelas',
    ]);

    // user
    Route::get('user/kwitansi', 'UserController@kwitansi')->name('user.kwitansi');
    Route::get('user/ubah_kelas', 'UserController@ubah_kelas')->name('user.ubah_kelas');
    Route::get('user/import_or_export', 'UserController@import_or_export')->name('user.import_or_export');
    Route::post('user/export_excel', 'UserController@export_excel')->name('user.export_excel');
    Route::get('user/download_format_import_excel', 'UserController@download_format_import_excel')->name('user.download_format_import_excel');
    Route::post('user/import_excel', 'UserController@import_excel')->name('user.import_excel');
    Route::get('user/hapus_semua', 'UserController@hapus_semua')->name('user.hapus_semua');
    Route::resource('user', 'UserController');

    // pembayaran_santri
    Route::get('pembayaran_santri/import_or_export', 'PembayaranSantriController@import_or_export')->name('pembayaran_santri.import_or_export');
    Route::post('pembayaran_santri/export_excel', 'PembayaranSantriController@export_excel')->name('pembayaran_santri.export_excel');
    Route::get('pembayaran_santri/download_format_import_excel', 'PembayaranSantriController@download_format_import_excel')->name('pembayaran_santri.download_format_import_excel');
    Route::post('pembayaran_santri/import_excel', 'PembayaranSantriController@import_excel')->name('pembayaran_santri.import_excel');
    Route::get('pembayaran_santri/hapus_semua', 'PembayaranSantriController@hapus_semua')->name('pembayaran_santri.hapus_semua');
    Route::resource('pembayaran_santri', 'PembayaranSantriController');

    // pembayaran_santri_bulan
    Route::get('pembayaran_santri_bulan/hapus_semua', 'PembayaranSantriBulanController@hapus_semua')->name('pembayaran_santri_bulan.hapus_semua');
    Route::resource('pembayaran_santri_bulan', 'PembayaranSantriBulanController');

    // pembayaran_santri_detail
    Route::get('pembayaran_santri_detail/hapus_semua', 'PembayaranSantriDetailController@hapus_semua')->name('pembayaran_santri_detail.hapus_semua');
    Route::get('pembayaran_santri_detail/get_users', 'PembayaranSantriDetailController@get_users')->name('pembayaran_santri_detail.get_users');
    Route::get('pembayaran_santri/{pembayaran_santri}/pembayaran_santri_detail/{pembayaran_santri_detail}/lunaskan', 'PembayaranSantriDetailController@lunaskan')->name('pembayaran_santri_detail.lunaskan');
    Route::put('pembayaran_santri/{pembayaran_santri}/pembayaran_santri_detail/{pembayaran_santri_detail}/lunaskan_update', 'PembayaranSantriDetailController@lunaskanUpdate')->name('pembayaran_santri_detail.lunaskan_update');
    Route::resource('pembayaran_santri/{pembayaran_santri}/pembayaran_santri_detail', 'PembayaranSantriDetailController');

    // pembayaran_infaq
    Route::get('pembayaran_infaq/import_or_export', 'PembayaranInfaqController@import_or_export')->name('pembayaran_infaq.import_or_export');
    Route::post('pembayaran_infaq/export_excel', 'PembayaranInfaqController@export_excel')->name('pembayaran_infaq.export_excel');
    Route::get('pembayaran_infaq/download_format_import_excel', 'PembayaranInfaqController@download_format_import_excel')->name('pembayaran_infaq.download_format_import_excel');
    Route::post('pembayaran_infaq/import_excel', 'PembayaranInfaqController@import_excel')->name('pembayaran_infaq.import_excel');
    Route::get('pembayaran_infaq/hapus_semua', 'PembayaranInfaqController@hapus_semua')->name('pembayaran_infaq.hapus_semua');
    Route::resource('pembayaran_infaq', 'PembayaranInfaqController');

    // pembayaran_infaq_detail
    Route::get('pembayaran_infaq_detail/hapus_semua', 'PembayaranInfaqDetailController@hapus_semua')->name('pembayaran_infaq_detail.hapus_semua');
    Route::resource('pembayaran_infaq/{pembayaran_infaq}/pembayaran_infaq_detail', 'PembayaranInfaqDetailController');

    // transaksi_lainnya
    Route::get('transaksi_lainnya/import_or_export', 'TransaksiLainnyaController@import_or_export')->name('transaksi_lainnya.import_or_export');
    Route::post('transaksi_lainnya/export_excel', 'TransaksiLainnyaController@export_excel')->name('transaksi_lainnya.export_excel');
    Route::get('transaksi_lainnya/download_format_import_excel', 'TransaksiLainnyaController@download_format_import_excel')->name('transaksi_lainnya.download_format_import_excel');
    Route::post('transaksi_lainnya/import_excel', 'TransaksiLainnyaController@import_excel')->name('transaksi_lainnya.import_excel');
    Route::get('transaksi_lainnya/hapus_semua', 'TransaksiLainnyaController@hapus_semua')->name('transaksi_lainnya.hapus_semua');
    Route::resource('transaksi_lainnya', 'TransaksiLainnyaController');

    // transaksi_lainnya_detail
    Route::get('transaksi_lainnya_detail/hapus_semua', 'TransaksiLainnyaDetailController@hapus_semua')->name('transaksi_lainnya_detail.hapus_semua');
    Route::resource('transaksi_lainnya/{transaksi_lainnya}/transaksi_lainnya_detail', 'TransaksiLainnyaDetailController');

    // laporan
    Route::get('laporan', 'LaporanController@index')->name('laporan.index');
    Route::post('laporan/pembayaran_santri', 'LaporanController@pembayaran_santri')->name('laporan.pembayaran_santri');
    Route::post('laporan/pembayaran_infaq', 'LaporanController@pembayaran_infaq')->name('laporan.pembayaran_infaq');
    Route::post('laporan/transaksi_lainnya', 'LaporanController@transaksi_lainnya')->name('laporan.transaksi_lainnya');
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