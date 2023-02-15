<?php

//dd(\Illuminate\Support\Facades\Hash::make('supir'));

use App\Lokasi;
use App\Mobil;
use App\Paket;
use App\PemesananPaket;
use App\RentalMobil;
use App\ReservasiTiket;
use App\Rute;
use App\Tiket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Anggotum;
use App\Buku;
use App\Peminjaman;
use App\Pengembalian;
use App\User;


Route::get('/', function () {
    $data['rutes'] = Rute::all();
    $data['lokasis'] = Lokasi::all();
    $data['pakets'] = Paket::all();

    return view('index', $data);
});

Route::get('/pelanggan/register', function () {
    $data['rutes'] = Rute::all();
    $data['lokasis'] = Lokasi::all();

    return view('register', $data);
});

Route::post('/pelanggan/register', function (Request $request) {

    $validator = $request->validate([
        'name' => "required|max:40",
        'email' => 'required|unique:user,email|email',
        'no_hp' => 'required|numeric|unique:user,no_hp|digits_between:12,13',
        'password' => 'required|confirmed',
    ]);

    $requestData = $request->except(['password_confirmation']);

    if ($request->hasFile('foto')) {
        $requestData['foto'] = "uploads/" . time() . $request->foto->getClientOriginalName();
        $request->foto->move("uploads", $requestData['foto']);
    }

    User::create($requestData);

    return redirect('pelanggan/login')->with('success', 'Berhasil register');
});

Route::get('/pelanggan/login', function (Request $request) {

    return view('login');
});

Route::post('/pelanggan/login', function (Request $request) {
    if (!auth()->attempt([
        'email' => $request->email,
        'password' => $request->password
    ])) {
        return redirect('pelanggan/login')->with('error', 'Login gagal');
    }

    return redirect('pelanggan/pesanan-saya');
});

Route::get('/pelanggan/logout', function (Request $request) {
    auth()->logout();

    return redirect('');
});

Route::get('/cari-tiket', function (Request $request) {
    $data['mobils'] = Mobil::where([]);
    $data['rutes'] = Rute::all();
    $data['lokasis'] = Lokasi::all();
    $data['tikets'] = Tiket::where([
        'rute_id' => $request->rute_id,
        'pulang_pergi' => $request->pulang_pergi,
        'status' => 'Tersedia'
    ])->where('jumlah', '>=', $request->jumlah_tiket)
        ->whereBetween('dimulai_pada', [$request->tanggal ?? date('Y-m-d'), now()->addDays(7)->format('Y-m-d')])
        ->get()->map(function ($item) use ($request) {
            $item->lokasi_tujuan = $item->rute->where('id', $request->lokasi_tujuan_id)->first();

            return $item;
        });

    return view('cari-tiket', $data);
});

Route::get('/pelanggan/pesanan-saya', function () {
    if (!auth()->user()) {
        return redirect('/')->with('error', 'Kamu harus login / registrasi dulu!');
    }

    $data['reservasi_tikets'] = ReservasiTiket::where('user_id', auth()->user()->id)->get()->take(9);
    $data['rental_mobils'] = RentalMobil::where('user_id', auth()->user()->id)->get()->take(9);
    $data['pemesanan_pakets'] = PemesananPaket::where('user_id', auth()->user()->id)->get()->take(9);

    return view('pesanan-saya', $data);
});

Route::get('/cari-mobil-rental', function (Request $request) {

    $data['query'] = http_build_query($request->all());
    $data['rutes'] = Rute::all();
    $data['lokasis'] = Lokasi::all();
    $data['mobils'] = Mobil::with(['mobil_fasilitas'])
        ->where('jumlah_kursi', '>=', $request->jumlah_kursi_mobil)
        ->get()->map(function ($item) use ($request) {
            $item->biaya_rental += $item->biaya_supir;
            $item->biaya_rental *= (new Illuminate\Support\Carbon)->parse($request->dari_tanggal)->diffInDays(\Illuminate\Support\Carbon::parse($request->sampai_tanggal));

            return $item;
        });

    return view('cari-mobil-rental', $data);
});

Route::get('/pembayaran-tiket/{tiket}', function (Tiket $tiket) {
    if (!auth()->user()) {
        return redirect('/')->with('error', 'Kamu harus login / registrasi dulu!');
    }

    $data['tiket'] = $tiket;

    return view('pembayaran-tiket', $data);
});

Route::post('/pembayaran-tiket/{tiket}', function (Request $request, Tiket $tiket) {
    if (!auth()->user()) {
        return redirect('/')->with('error', 'Kamu harus login / registrasi dulu!');
    }

    if ($request->pulang_pergi == "Ya") {
        $total_bayar = ($tiket->rute->biaya - $tiket->rute->diskon_pulang_pergi) * $request->jumlah_tiket;
    } else {
        $total_bayar = ($tiket->rute->biaya - $tiket->rute->diskon_pulang_pergi) * $request->jumlah_tiket;
    }

    $requestData = [
        'user_id' => auth()->id() ?? null,
        'tiket_id' => $tiket->id,
        'jumlah' => $request->jumlah_tiket,
        'berakhir_pada' => $tiket->berakhir_pada,
        'pulang_pergi' => $request->pulang_pergi,
        'total_bayar' => $total_bayar,
        'status' => 'Baru'
    ];

    if ($request->hasFile('bukti_transfer')) {
        $requestData['bukti_transfer'] = "uploads/" . time() . $request->bukti_transfer->getClientOriginalName();
        $request->bukti_transfer->move("uploads", $requestData['bukti_transfer']);
    }

    ReservasiTiket::create($requestData);

    return redirect('/pelanggan/pesanan-saya')->with('success', 'Berhasil melakukan pemesanan!');
});


Route::get('/pembayaran-paket/{paket}', function (Paket $paket) {
    if (!auth()->user()) {
        return redirect('/')->with('error', 'Kamu harus login / registrasi dulu!');
    }

    $data['paket'] = $paket;

    return view('pembayaran-paket', $data);
});

Route::get('/pelanggan/profile', function () {
    if (!auth()->user()) {
        return redirect('/')->with('error', 'Kamu harus login / registrasi dulu!');
    }

    return view('profile');
});

Route::post('/pelanggan/profile', function (Request $request) {

    if (!request()->password || !$request->password_confirmation) {
        $request->validate([
            'name' => "required|max:40",
            'email' => "required|unique:user,email,$request->email,email|email",
            'no_hp' => "required|numeric|unique:user,no_hp,$request->no_hp,no_hp|digits_between:12,13",
        ]);

        $requestData = $request->except(['password_confirmation', 'password']);
    } else {
        $request->validate([
            'name' => "required|max:40",
            'email' => "required|unique:user,email,$request->email,email|email",
            'no_hp' => "required|numeric|unique:user,no_hp,$request->no_hp,no_hp|digits_between:12,13",
            'password' => "required|confirmed",
        ]);

        $requestData = $request->except(['password_confirmation']);
    }

    if ($request->hasFile('foto')) {
        $requestData['foto'] = "uploads/" . time() . $request->foto->getClientOriginalName();
        $request->foto->move("uploads", $requestData['foto']);
    }

    User::find(auth()->id())->update($requestData);

    return redirect('pelanggan/profile')->with('success', 'Berhasil mengupdate profile');
});

Route::post('/pembayaran-paket/{paket}', function (Request $request, Paket $paket) {
    if (!auth()->user()) {
        return redirect('/')->with('error', 'Kamu harus login / registrasi dulu!');
    }

    $requestData = [
        'user_id' => auth()->id() ?? null,
        'paket_id' => $paket->id,
        'total_bayar' => $paket->harga,
        'status' => 'Baru'
    ];

    if ($request->hasFile('bukti_transfer')) {
        $requestData['bukti_transfer'] = "uploads/" . time() . $request->bukti_transfer->getClientOriginalName();
        $request->bukti_transfer->move("uploads", $requestData['bukti_transfer']);
    }

    PemesananPaket::create($requestData);

    return redirect('/pelanggan/pesanan-saya')->with('success', 'Berhasil melakukan pemesanan!');
});

Route::get('/pembayaran-tiket/{tiket}/get-total-bayar', function (Request $request, Tiket $tiket) {
    if ($request->pulang_pergi == "Ya") {
        return response()->json([
            'data' => toIdr(($tiket->rute->biaya - $tiket->rute->diskon_pulang_pergi) * $request->jumlah_tiket)
        ]);
    } else {
        return response()->json([
            'data' => toIdr(($tiket->rute->biaya) * $request->jumlah_tiket)
        ]);
    }
});

Route::get('/pembayaran-rental/{mobil}/get-total-bayar', function (Request $request, Mobil $mobil) {
    $total_bayar = $mobil->biaya_rental;

    if ($request->pakai_supir == "Ya") {
        $total_bayar += $mobil->biaya_supir;
    }

    $total_bayar *= (new Illuminate\Support\Carbon)->parse($request->dari_tanggal)->diffInDays(\Illuminate\Support\Carbon::parse($request->sampai_tanggal));

    return response()->json([
        'data' => toIdr($total_bayar)
    ]);
});

Route::get('/pembayaran-rental/{mobil}', function (Request $request, Mobil $mobil) {

    if (!auth()->user()) {
        return redirect('/')->with('error', 'Kamu harus login / registrasi dulu!');
    }

    $mobil->biaya_rental += $mobil->biaya_supir;
    $mobil->biaya_rental *= (new Illuminate\Support\Carbon)->parse($request->dari_tanggal)->diffInDays(\Illuminate\Support\Carbon::parse($request->sampai_tanggal));

    $data['mobil'] = $mobil;

//    $mobil->biaya

    return view('pembayaran-rental', $data);
});


Route::post('/pembayaran-rental/{mobil}', function (Request $request, Mobil $mobil) {
    if (!auth()->user()) {
        return redirect('/')->with('error', 'Kamu harus login / registrasi dulu!');
    }

    $data['mobil'] = $mobil;

    $requestData = [
        'user_id' => auth()->user()->id ?? null,
        'mobil_id' => $mobil->id,
        'dari_tanggal' => $request->dari_tanggal,
        'sampai_tanggal' => $request->sampai_tanggal,
        'biaya_supir' => $mobil->biaya_supir,
        'total_bayar' => fromIdr($request->total_bayar),
        'status' => 'Baru'
    ];
    if ($request->hasFile('bukti_transfer')) {
        $requestData['bukti_transfer'] = "uploads/" . time() . $request->bukti_transfer->getClientOriginalName();
        $request->bukti_transfer->move("uploads", $requestData['bukti_transfer']);
    }

    \App\RentalMobil::create($requestData);

    return redirect('/pelanggan/pesanan-saya')->with('success', 'Berhasil melakukan pemesanan!');
});

Route::get('pelanggan/lokasi-tujuan/{rute}', function (Rute $rute) {

    return response()->json([
        'data' => \App\LokasiTujuan::where('rute_id', $rute->id)->get()
    ]);
});

// matikan fiture register karena memang tidak ada fiture register
Auth::routes(['register' => false]);

// semua halaman di dalam group ini harus diakses setelah login
Route::middleware('auth')->group(function () {
    Route::get('/home', function () {

        $data = [];
        $data['reservasi_tiket'] = \App\ReservasiTiket::all()->map(function ($item) {
            $item->year_month = $item->created_at->format('Y-m');

            return $item;
        });

        $data['rental_mobil'] = \App\RentalMobil::all()->map(function ($item) {
            $item->year_month = $item->created_at->format('Y-m');

            return $item;
        });

        $data['mobil'] = \App\Mobil::with(['rental_mobils'])->withCount(['rental_mobils'])->get();
        $data['tiket'] = \App\Tiket::with(['reservasi_tikets'])->withCount(['reservasi_tikets'])->get();

        $data['backgroundColor1'] = ["#7d3865", "#c1a7b0", "#f8b703", "#949217", "#0fa2a9", "#3B76EF", "#00B382", "#79A9F7", "#FF7B36", "#E8205E", "#E8205E","#E8205E","#E8205E","#E8205E","#E8205E","#E8205E","#E8205E","#E8205E","#E8205E",];
        $data['backgroundColor2'] = ["#3B76EF", "#00B382", "#79A9F7", "#FF7B36", "#E8205E", "#7d3865", "#c1a7b0", "#f8b703", "#949217", "#0fa2a9", "#0fa2a9", "#0fa2a9", "#0fa2a9", "#0fa2a9", "#0fa2a9", "#0fa2a9", "#0fa2a9", "#0fa2a9"];

        shuffle($data['backgroundColor1']);
        shuffle($data['backgroundColor2']);

        return view('home', $data);
    })->name('home');

    Route::put('user/{user}/profile/update', ['App\Http\Controllers\UserController', 'profileUpdate'])->name('user.profile.update');
    Route::get('user/profile', 'UserController@profile')->name('user.profile');
    Route::post('user/laporan/print', 'UserController@print')->name('user.print');
    Route::get('user/laporan', 'UserController@laporan')->name('user.laporan.index');
    Route::get('user/hapus_semua', 'UserController@hapus_semua')->name('user.hapus_semua');
    Route::resource('user', 'UserController')->parameters(['user' => 'user']);

    Route::get('reservasi-tiket/hitung-total-bayar', 'ReservasiTiketController@hitungTotalBayar')->name('reservasi-tiket.hitung_total_bayar');
    Route::post('reservasi-tiket/laporan/print', 'ReservasiTiketController@print')->name('reservasi-tiket.print');
    Route::get('reservasi-tiket/laporan', 'ReservasiTiketController@laporan')->name('reservasi-tiket.laporan.index');
    Route::get('reservasi-tiket/hapus_semua', 'ReservasiTiketController@hapus_semua')->name('reservasi-tiket.hapus_semua');
    Route::resource('reservasi-tiket', 'ReservasiTiketController')->parameters(['reservasi_tiket' => 'reservasi_tiket']);

    Route::get('pemesanan-paket/hitung-total-bayar', 'PemesananPaketController@hitungTotalBayar')->name('pemesanan-paket.hitung_total_bayar');
    Route::post('pemesanan-paket/laporan/print', 'PemesananPaketController@print')->name('pemesanan-paket.print');
    Route::get('pemesanan-paket/laporan', 'PemesananPaketController@laporan')->name('pemesanan-paket.laporan.index');
    Route::get('pemesanan-paket/hapus_semua', 'PemesananPaketController@hapus_semua')->name('pemesanan-paket.hapus_semua');
    Route::resource('pemesanan-paket', 'PemesananPaketController')->parameters(['pemesanan-paket' => 'pemesanan-paket']);

    Route::get('rental-mobil/hitung-total-bayar', 'RentalMobilController@hitungTotalBayar')->name('rental-mobil.hitung_total_bayar');
    Route::post('rental-mobil/laporan/print', 'RentalMobilController@print')->name('rental-mobil.print');
    Route::get('rental-mobil/laporan', 'RentalMobilController@laporan')->name('rental-mobil.laporan.index');
    Route::get('rental-mobil/hapus_semua', 'RentalMobilController@hapus_semua')->name('rental-mobil.hapus_semua');
    Route::resource('rental-mobil', 'RentalMobilController')->parameters(['mobil' => 'mobil']);

    Route::post('jadwal/laporan/print', 'JadwalController@print')->name('jadwal.print');
    Route::get('jadwal/laporan', 'JadwalController@laporan')->name('jadwal.laporan.index');
    Route::get('jadwal/hapus_semua', 'JadwalController@hapus_semua')->name('jadwal.hapus_semua');
    Route::resource('jadwal', 'JadwalController')->parameters(['jadwal' => 'jadwal']);

    Route::post('tiket/laporan/print', 'TiketController@print')->name('tiket.print');
    Route::get('tiket/laporan', 'TiketController@laporan')->name('tiket.laporan.index');
    Route::get('tiket/hapus_semua', 'TiketController@hapus_semua')->name('tiket.hapus_semua');
    Route::resource('tiket', 'TiketController')->parameters(['tiket' => 'tiket']);

    Route::post('rekening/laporan/print', 'RekeningController@print')->name('rekening.print');
    Route::get('rekening/laporan', 'RekeningController@laporan')->name('rekening.laporan.index');
    Route::get('rekening/hapus_semua', 'RekeningController@hapus_semua')->name('rekening.hapus_semua');
    Route::resource('rekening', 'RekeningController')->parameters(['rekening' => 'rekening']);

    Route::post('lokasi/laporan/print', 'LokasiController@print')->name('lokasi.print');
    Route::get('lokasi/laporan', 'LokasiController@laporan')->name('lokasi.laporan.index');
    Route::get('lokasi/hapus_semua', 'LokasiController@hapus_semua')->name('lokasi.hapus_semua');
    Route::resource('lokasi', 'LokasiController')->parameters(['lokasi' => 'lokasi']);

    Route::post('lokasi-tujuan/laporan/print', 'LokasiTujuanController@print')->name('lokasi-tujuan.print');
    Route::get('lokasi-tujuan/laporan', 'LokasiTujuanController@laporan')->name('lokasi-tujuan.laporan.index');
    Route::get('lokasi-tujuan/hapus_semua', 'LokasiTujuanController@hapus_semua')->name('lokasi-tujuan.hapus_semua');
    Route::resource('lokasi-tujuan', 'LokasiTujuanController')->parameters(['lokasi_tujuan' => 'lokasi_tujuan']);

    Route::post('rute/laporan/print', 'RuteController@print')->name('rute.print');
    Route::get('rute/laporan', 'RuteController@laporan')->name('rute.laporan.index');
    Route::get('rute/hapus_semua', 'RuteController@hapus_semua')->name('rute.hapus_semua');
    Route::resource('rute', 'RuteController')->parameters(['rute' => 'rute']);

    Route::post('paket/laporan/print', 'PaketController@print')->name('paket.print');
    Route::get('paket/laporan', 'PaketController@laporan')->name('paket.laporan.index');
    Route::get('paket/hapus_semua', 'PaketController@hapus_semua')->name('paket.hapus_semua');
    Route::resource('paket', 'PaketController')->parameters(['paket' => 'paket']);

    Route::post('mobil/laporan/print', 'MobilController@print')->name('mobil.print');
    Route::get('mobil/laporan', 'MobilController@laporan')->name('mobil.laporan.index');
    Route::get('mobil/hapus_semua', 'MobilController@hapus_semua')->name('mobil.hapus_semua');
    Route::resource('mobil', 'MobilController')->parameters(['mobil' => 'mobil']);

    Route::post('fasilitas/laporan/print', 'FasilitasController@print')->name('fasilitas.print');
    Route::get('fasilitas/laporan', 'FasilitasController@laporan')->name('fasilitas.laporan.index');
    Route::get('fasilitas/hapus_semua', 'FasilitasController@hapus_semua')->name('fasilitas.hapus_semua');
    Route::resource('fasilitas', 'FasilitasController')->parameters(['fasilitas' => 'fasilitas']);
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



