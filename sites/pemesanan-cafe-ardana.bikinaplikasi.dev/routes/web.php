<?php
//dd(\Hash::make('pemilik@gmail.com'));
use App\Models\Pemasok;
use App\Models\Pembelian;
use App\Models\PembelianDetail;
use App\Models\Pemesanan;
use App\Models\PemesananDetail;
use App\Models\Produk;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use Endroid\QrCode\Color\Color;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelLow;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Label\Label;
use Endroid\QrCode\Logo\Logo;
use Endroid\QrCode\RoundBlockSizeMode\RoundBlockSizeModeMargin;
use Endroid\QrCode\Writer\PngWriter;

Route::get('/qrcode-meja', function (Request $request) {
    echo \qrCode(url('set-no-meja?no_meja=' . $request->no_meja));
});

Route::get('/set-no-meja', function (Request $request) {
    $response = new Illuminate\Http\Response("<script>location.href = '/'</script>");
    $response->withCookie(cookie()->forever('no_meja', $request->no_meja, "/"));

    return $response;
});

Route::get('/qrcode', function (Request $request) {


    $writer = new PngWriter();

// Create QR code
    $qrCode = QrCode::create(env('APP_URL'))
        ->setEncoding(new Encoding('UTF-8'))
        ->setErrorCorrectionLevel(new ErrorCorrectionLevelLow())
        ->setSize(500)
        ->setMargin(10)
        ->setRoundBlockSizeMode(new RoundBlockSizeModeMargin())
        ->setForegroundColor(new Color(0, 0, 0))
        ->setBackgroundColor(new Color(255, 255, 255));

// Create generic logo
    $logo = Logo::create(public_path('image/logo.png'))
        ->setResizeToWidth(50);

// Create generic label //
    $label = Label::create(env('APP_URL'))
        ->setTextColor(new Color(255, 0, 0));

    $result = $writer->write($qrCode, $logo, $label);

    // Directly output the QR code
    header('Content-Type: ' . $result->getMimeType());
    echo $result->getString();
});

Route::get('/', function (Request $request) {

    if (!Illuminate\Support\Facades\Cookie::get("cart")) {
        $cookie = [
            'data' => [],
            "jumlah" => 0,
            'total' => 0
        ];

        $response = new Illuminate\Http\Response("<script>location.href = '/'</script>");
        $response->withCookie(cookie()->forever('cart', json_encode($cookie), "/"));

        return $response;
    }

//    $data['pemasoks'] = Pemasok::all();
//    $data['pembelians'] = Pembelian::all();
//    $data['pembelian_details'] = PembelianDetail::all();
    $data['pemesanans'] = Pemesanan::all();
    $data['pemesanan_details'] = PemesananDetail::all();
    $data['produk'] = Produk::where('stok', '>', 0)->get();
    $data['users'] = User::all();

    return view('index', $data);
});

Route::post('login_manual', [LoginController::class, 'authenticate'])->name('login_manual');

Route::get('/cart', function (Request $request) {
    $cart = json_decode($request->cookie("cart"));
    $no_meja = $request->cookie("no_meja");

    if (!$no_meja) {
        die("Kamu belum memilih no meja!");

    }
    
    $meja = \App\Models\Meja::where('no_meja', $no_meja)->first();

    if ($request->remove) {
        $cart = collect($cart->data)->reject(function ($item) use ($request) {

            return $item->id == $request->remove;
        });

        $cookie = [
            "data" => array_values($cart->toArray()),
            "jumlah" => $cart->count('jumlah'),
            "total" => $cart->sum('total'),
            "no_meja" => $cart->sum('no_meja'),
        ];

        $response = new Illuminate\Http\Response("<script>location.href = '/cart'</script>");

        $response->withCookie(cookie()->forever('cart', collect($cookie)->toJson(), "/"));

        return $response;
    }

    $data['cart'] = $cart;
    $data['meja'] = $meja;

    return view('cart', $data);
});

Route::get('/add-to-cart', function (Request $request) {
    $produk = Produk::findOrFail($request->id);


    if ($produk->stok < 1 || $produk->stok - $request->jumlah < 0) {

        return new Illuminate\Http\Response([
            'error' => true,
            'message' => 'Stok produk tidak cukup!'
        ]);
    }

    $data = collect(json_decode(Illuminate\Support\Facades\Cookie::get("cart"))->data);

    $data->add([
        "id" => uuid_create(),
        'produk' => $produk->toArray(),
        'jumlah' => $request->jumlah,
        'total' => $produk->harga_jual * $request->jumlah
    ]);

    $cookie = [
        "data" => $data->toArray(),
        "jumlah" => $data->count(),
        "total" => $data->sum('total'),
        "cart_total" => toIdr($data->sum('total'))
    ];

    $response = new Illuminate\Http\Response($cookie);

    $response->withCookie(cookie()->forever('cart', collect($cookie)->toJson(), "/"));

    return $response;
});

Route::get('/update-cart', function (Request $request) {

    $data = collect(json_decode(Illuminate\Support\Facades\Cookie::get("cart"))->data)->map(function ($item) use ($request) {
        foreach ($request->all()['produk'] as $itemRequest) {

            if ($itemRequest['id'] == $item->id) {
                if ($item->produk->stok - $itemRequest['jumlah'] < 0) {
                    die("Stok produk {$item->produk->nama} tidak cukup!");
                }

                $item->jumlah = $itemRequest['jumlah'];
                $item->total = $itemRequest['jumlah'] * $item->produk->harga_jual;
            }
        }

        return $item;
    });

    $cookie = [
        "data" => $data->toArray(),
        "jumlah" => $data->count(),
        "total" => $data->sum('total'),
        "cart_total" => toIdr($data->sum('total'))
    ];

    $response = new Illuminate\Http\Response("<script>location.href = '/cart'</script>");

    $response->withCookie(cookie()->forever('cart', collect($cookie)->toJson(), "/"));

    return $response;
});

Route::get('/get-cart', function (Request $request) {

    $data = collect(json_decode(Illuminate\Support\Facades\Cookie::get("cart"))->data);

    $cookie = [
        "data" => $data->toArray(),
        "jumlah" => $data->count(),
        "total" => $data->sum('total'),
        "cart_total" => toIdr($data->sum('total'))
    ];

    $response = new Illuminate\Http\Response($cookie);

    return $response;
});

Route::post('/bayar-cart', function (Request $request) {
    $requestData = $request->all();

    if (!count(json_decode($request->cookie('cart'))->data)) {
        $response = new Illuminate\Http\Response("<script>alert('Belum memesan produk!'); location.href = '/'</script>");

        return $response->withCookie(cookie()->forget('cart'));
    }

    $pemesanan = Pemesanan::create([
        'meja_id' => $request->meja_id,
        'no_hp' => $request->no_hp,
        'nama_pelanggan' => $request->nama_pelanggan,
        'status' => 'pending',
        'catatan' => $request->catatan,
    ]);

    foreach (json_decode($request->cookie('cart'))->data as $item) {

        $produk = Produk::findOrFail($item->produk->id);
        
        if ($produk->stok + $item->jumlah - $item->jumlah < 0) {
            return die("stok produk {$item->produk->nama} tidak cukup");
        } else {
            $produk->decrement('stok', $item->jumlah);
        }

        PemesananDetail::create([
            'pemesanan_id' => $pemesanan->id,
            'produk_id' => $item->produk->id,
            'harga' => $item->produk->harga_jual,
            'jumlah' => $item->jumlah,
            'total' => $item->jumlah * $item->produk->harga_jual
        ]);
    }

    $response = new Illuminate\Http\Response("<script>alert('Berhasil melakukan pembelian, silakan tunggu!'); location.href = '/'</script>");

    return $response->withCookie(cookie()->forget('cart'));
});

Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {

    Route::get('/dashboard', function () {

        $data['pemesanan'] = Pemesanan::get();
//        $data['pembelian'] = Pembelian::get();
        $data['produk'] = Produk::get();
//        $data['pemasok'] = Pemasok::get();

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

    Route::get('pengaturan/tentang', ['App\Http\Controllers\PengaturanController', 'tentang'])->name("pengaturan.tentang.index");
    Route::put('pengaturan/tentang', ['App\Http\Controllers\PengaturanController', 'tentangUpdate'])->name("pengaturan.tentang-update");

    Route::get('pengaturan/batas-akhir-registrasi', ['App\Http\Controllers\PengaturanController', 'batasAkhirRegistrasi'])->name("pengaturan.batas-akhir-registrasi.index");
    Route::put('pengaturan/batas-akhir-registrasi', ['App\Http\Controllers\PengaturanController', 'batasAkhirRegistrasiUpdate'])->name("pengaturan.batas-akhir-registrasi-update");

    Route::get('pemasok/laporan', ['App\Http\Controllers\PemasokController', 'laporan'])->name('pemasok.laporan.index');
    Route::post('pemasok/laporan/print', ['App\Http\Controllers\PemasokController', 'print'])->name('pemasok.print');
    Route::get('pemasok/hapus_semua', ['App\Http\Controllers\PemasokController', 'hapus_semua'])->name('pemasok.hapus_semua');
    Route::resource('pemasok', 'App\Http\Controllers\PemasokController');

    Route::get('meja/laporan', ['App\Http\Controllers\MejaController', 'laporan'])->name('meja.laporan.index');
    Route::post('meja/laporan/print', ['App\Http\Controllers\MejaController', 'print'])->name('meja.print');
    Route::get('meja/hapus_semua', ['App\Http\Controllers\MejaController', 'hapus_semua'])->name('meja.hapus_semua');
    Route::resource('meja', 'App\Http\Controllers\MejaController');
    
    Route::get('barang/laporan', ['App\Http\Controllers\BarangController', 'laporan'])->name('barang.laporan.index');
    Route::post('barang/laporan/print', ['App\Http\Controllers\BarangController', 'print'])->name('barang.print');
    Route::get('barang/hapus_semua', ['App\Http\Controllers\BarangController', 'hapus_semua'])->name('barang.hapus_semua');
    Route::resource('barang', 'App\Http\Controllers\BarangController');
    
    Route::get('kategori/laporan', ['App\Http\Controllers\KategoriController', 'laporan'])->name('kategori.laporan.index');
    Route::post('kategori/laporan/print', ['App\Http\Controllers\KategoriController', 'print'])->name('kategori.print');
    Route::get('kategori/hapus_semua', ['App\Http\Controllers\KategoriController', 'hapus_semua'])->name('kategori.hapus_semua');
    Route::resource('kategori', 'App\Http\Controllers\KategoriController');

    Route::get('pembelian/laporan', ['App\Http\Controllers\PembelianController', 'laporan'])->name('pembelian.laporan.index');
    Route::post('pembelian/laporan/print', ['App\Http\Controllers\PembelianController', 'print'])->name('pembelian.print');
    Route::get('pembelian/hapus_semua', ['App\Http\Controllers\PembelianController', 'hapus_semua'])->name('pembelian.hapus_semua');
    Route::resource('pembelian', 'App\Http\Controllers\PembelianController');

    Route::get('pembelian-detail/laporan', ['App\Http\Controllers\PembelianDetailController', 'laporan'])->name('pembelian-detail.laporan.index');
    Route::post('pembelian/laporan/print', ['App\Http\Controllers\PembelianController', 'print'])->name('pembelian.print');
    Route::get('pembelian-detail/hapus_semua', ['App\Http\Controllers\PembelianDetailController', 'hapus_semua'])->name('pembelian-detail.hapus_semua');
    Route::resource('pembelian-detail', 'App\Http\Controllers\PembelianDetailController');

    Route::get('pemesanan/{laporanPemesanan}/print-from-laporan-pemesanan', ['App\Http\Controllers\PemesananController', 'printFromLaporanPemesanan'])->name('pemesanan.laporan.print-from-laporan-pemesanan');
    Route::get('pemesanan/laporan', ['App\Http\Controllers\PemesananController', 'laporan'])->name('pemesanan.laporan.index');
    Route::get('pemesanan/{pemesanan}/selesaikan', ['App\Http\Controllers\PemesananController', 'selesaikan'])->name('pemesanan.selesaikan');
    Route::put('pemesanan/{pemesanan}/selesaikan-update', ['App\Http\Controllers\PemesananController', 'selesaikanUpdate'])->name('pemesanan.selesaikan-update');
    Route::get('pemesanan/nota/{pemesanan}', ['App\Http\Controllers\PemesananController', 'nota'])->name('pemesanan.print-nota');
    Route::post('pemesanan/laporan/print', ['App\Http\Controllers\PemesananController', 'print'])->name('pemesanan.print');
    Route::get('pemesanan/hapus_semua', ['App\Http\Controllers\PemesananController', 'hapus_semua'])->name('pemesanan.hapus_semua');
    Route::resource('pemesanan', 'App\Http\Controllers\PemesananController');

    Route::get('pemesanan-detail/laporan', ['App\Http\Controllers\PemesananDetailController', 'laporan'])->name('pemesanan-detail.laporan.index');
    Route::post('pemesanan-detail/laporan/print', ['App\Http\Controllers\PemesananDetailController', 'print'])->name('pemesanan-detail.print');
    Route::get('pemesanan-detail/hapus_semua', ['App\Http\Controllers\PemesananDetailController', 'hapus_semua'])->name('pemesanan-detail.hapus_semua');
    Route::resource('pemesanan-detail', 'App\Http\Controllers\PemesananDetailController');

    Route::get('produk/laporan', ['App\Http\Controllers\ProdukController', 'laporan'])->name('produk.laporan.index');

    Route::get('produk/get-produk', ['App\Http\Controllers\ProdukController', 'getProduk'])->name('produk.get-produk');
    Route::post('produk/laporan/print', ['App\Http\Controllers\ProdukController', 'print'])->name('produk.print');
    Route::get('produk/hapus_semua', ['App\Http\Controllers\ProdukController', 'hapus_semua'])->name('produk.hapus_semua');
    Route::resource('produk', 'App\Http\Controllers\ProdukController');
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