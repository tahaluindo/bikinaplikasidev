<?php
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
// die(date('Y-m-d\Th:i:sA', strtotime('+24 Hour', strtotime(date('Y-m-d\Th:i:s')))));
use App\Kamar;
use App\Penyewa;

Route::get('test', function () {
    return url('loha');
});

Auth::routes();

Route::get('/', function () {
    $data['datas'] = Penyewa::orderBy('id', 'desc')->paginate(10);
    $data['kamars'] = Kamar::where('status', '=', 'Kosong')->get();

    if(auth()->user()) {
        return redirect()->to('/dashboard');
    }

    return view('index', $data);
});

Route::post('/penyewa/register-from-booking', 'PenyewaController@registerFromBooking');

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', 'DashboardController@index');

    //type
    Route::resource('type', 'TypeController');

    // transaksi
    Route::resource('transaksi', 'TransaksiController');

    // kamar
    //menampilkan kamar berdasarkan lokasi
    Route::get('kamar/show_from_lokasi/{lokasi_id}', 'KamarController@showFromLokasi');
    //merubah lokasi kamar
    Route::get('kamar/ubah_lokasi', 'KamarController@ubahLokasi');
    Route::resource('kamar', 'KamarController');

    // penyewa
    Route::resource('penyewa', 'PenyewaController');

    // tagihan
    Route::resource('tagihan', 'TagihanController');
    // dapatkan data penyewa
    Route::get('getPenyewa/{penyewa}', 'TagihanController@getPenyewa');
    Route::get('getTagihanId/{penyewa?}', 'TagihanController@getTagihanId')->name('getTagihanId');
    Route::get('getTotalTagihan/{invoice_id?}', 'TransaksiController@getTotalTagihan')->name('getTotalTagihan');

    // perpanjangan sewa
    Route::resource('perpanjangan_sewa', 'PerpanjanganSewaController');
    Route::get('perpanjangan_sewa/{tagihan_id}/renew', 'PerpanjanganSewaController@renew')->name('perpanjanganSewaRenew');
    Route::get('getBiaya/{tagihan_id?}/{jenis_perpanjangan?}', 'PerpanjanganSewaController@getBiaya')->name('getBiaya');
    Route::get('getNota/{perpanjanganSewa?}', 'PerpanjanganSewaController@getNota')->name('getNota');

    //laporan
    Route::get('laporanTerLambatBayar', 'LaporanController@terlambatBayar')->name('laporanTerLambatBayar');
    //manmpilkan laporan terlambat bayar berdasarkan periode
    Route::post('laporanTerLambatBayar/show_from_periode', 'LaporanController@showFromPeriode')->name('showFromPeriode');

    Route::get('laporan', 'LaporanController@laporan')->name('laporan');
    // menampilkan laporan laba rugi berdasarkan periode
    Route::post('laporan/show_from_periode', 'LaporanController@laporanShowFromPeriode');
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
