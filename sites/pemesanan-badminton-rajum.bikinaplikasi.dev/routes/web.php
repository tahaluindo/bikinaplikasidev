<?php

use App\Lapangan;
use App\Lokasi;
use App\Mobil;
use App\Paket;
use App\Pemesanan;
use App\PemesananPaket;
use App\RentalMobil;
use App\ReservasiTiket;
use App\Rute;
use App\Tiket;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Anggotum;
use App\Buku;
use App\Peminjaman;
use App\Pengembalian;
use App\User;


Route::get('/', function (Request $request) {
    

    $lapangan = Lapangan::all();
    $pemesanan = Pemesanan::whereDate('waktu_mulai', date("Y-m-d"))->where('status', 'Diterima');
    DB::enableQueryLog();
    $data = [];
    foreach ($lapangan as $key => $itemLapangan) {

        for ($i = 8; $i <= 23; $i++) {
            $jam = $i < 10 ? "0$i" : $i;

            $pemesananFilter = Pemesanan::whereDate('waktu_mulai', date("Y-m-d"))->where('status', 'Diterima')->where('waktu_mulai', 'like', '%' . "$jam:00" . '%')->where('lapangan_id', $itemLapangan->id)->first();

            if ($pemesananFilter) {
                $jam_mulai = Carbon::parse($pemesananFilter->waktu_mulai)->hour;
                $jam_akhir = $jam_mulai + $pemesananFilter->jumlah_jam;

                for ($j = $jam_mulai; $j < $jam_akhir; $j++) {

                    $data[$key][$j]['itemLapangan'] = $itemLapangan;
                    $data[$key][$j]['lapangan'] = $itemLapangan->nama;
                    $data[$key][$j]['jam'] = ($j < 10 ? "0{$j}" : $j) . ":00 WIB - " . ($j + 1 < 10 ? ("0" . ($j + 1)) : $j + 1) . ":00 WIB";

                    $i = $jam_akhir;
                }
            }

            $data[$key][$i]['itemLapangan'] = $itemLapangan;
            $data[$key][$i]['lapangan'] = "";
            $data[$key][$i]['jam'] = ($i < 10 ? "0{$i}" : $i) . ":00 WIB - " . ($i + 1 < 10 ? ("0" . ($i + 1)) : $i + 1) . ":00 WIB";
        }
    }

    $listLapanganTersediaView = [];
    for ($i=8; $i <= 23; $i++) { 

        $listLapanganTersediaDiJamIni = [];
        foreach ($data as $key => $itemLapangan) {
            
            if($itemLapangan[$i]['lapangan'] == "") {
                $listLapanganTersediaDiJamIni[] = $itemLapangan[$i]['itemLapangan']->nama;
                
                $listLapanganTersediaView[$i]['lapangan'] = collect($listLapanganTersediaDiJamIni)->join(", ");
                $listLapanganTersediaView[$i]['jam'] = ($i < 10 ? "0{$i}" : $i) . ":00 WIB - " . ($i + 1 < 10 ? ("0" . ($i + 1)) : $i + 1) . ":00 WIB";
            }
        }
    }

    $data['lapangan'] = Lapangan::all();
    $data['lapangan_tersedia_view'] = $listLapanganTersediaView;

    return view('index', $data);
});

Route::get('pemesanan/{pemesanan}/terima', 'PemesananController@terima')->name('pemesanan.terima');
Route::get('pemesanan/{pemesanan}/batal', 'PemesananController@batal')->name('pemesanan.batal');
Route::get('pemesanan/{pemesanan}/pending', 'PemesananController@pending')->name('pemesanan.pending');

Route::post('pemesanan', 'PemesananController@store')->name('pemesanan.store');
Route::resource('pemesanan', 'PemesananController')->parameters(['pemesanan' => 'pemesanan']);

Route::resource('lapangan', 'LapanganController')->parameters(['lapangan' => 'lapangan']);

// matikan fiture register karena memang tidak ada fiture register
Auth::routes(['register' => false]);

// semua halaman di dalam group ini harus diakses setelah login
Route::middleware('auth')->group(function () {
    Route::get(
        '/dashboard',
        function () {

            $data['backgroundColor1'] = ["#7d3865", "#c1a7b0", "#f8b703", "#949217", "#0fa2a9", "#3B76EF", "#00B382", "#79A9F7", "#FF7B36", "#E8205E", "#E8205E", "#E8205E", "#E8205E", "#E8205E", "#E8205E", "#E8205E", "#E8205E", "#E8205E", "#E8205E",];
            $data['backgroundColor2'] = ["#3B76EF", "#00B382", "#79A9F7", "#FF7B36", "#E8205E", "#7d3865", "#c1a7b0", "#f8b703", "#949217", "#0fa2a9", "#0fa2a9", "#0fa2a9", "#0fa2a9", "#0fa2a9", "#0fa2a9", "#0fa2a9", "#0fa2a9", "#0fa2a9"];

            shuffle($data['backgroundColor1']);
            shuffle($data['backgroundColor2']);

            $data['lapangan'] = Lapangan::all();
            $data['pemesanan'] = Pemesanan::where(['status' => 'Diterima'])->get();

            return view('dashboard', $data);
        }
    )->name('dashboard');

    Route::put('user/{user}/profile/update', ['App\Http\Controllers\UserController', 'profileUpdate'])->name('user.profile.update');
    Route::get('user/profile', 'UserController@profile')->name('user.profile');
    Route::post('user/laporan/print', 'UserController@print')->name('user.print');
    Route::get('user/laporan', 'UserController@laporan')->name('user.laporan.index');
    Route::get('user/hapus_semua', 'UserController@hapus_semua')->name('user.hapus_semua');
    Route::resource('user', 'UserController')->parameters(['user' => 'user']);
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

        if (preg_match($exclude_folder, $item))
            continue;

        $zipArchive->addFile($item);
    }

    foreach (glob(base_path('resources/views') . "/*/*/*.php") as $item) {

        if (preg_match($exclude_folder, $item))
            continue;

        $zipArchive->addFile($item);
    }

    if ($zipArchive->status != ZIPARCHIVE::ER_OK)
        echo "Failed to write files to zip\n";

    $zipArchive->close();

    return redirect('listing-program.zip');
});