<?php
//dd(\Hash::make('pemilik@gmail.com'));
use App\Models\Pemasok;
use App\Models\Pembelian;
use App\Models\PembelianDetail;
use App\Models\Penjualan;
use App\Models\PenjualanDetail;
use App\Models\Produk;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;

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
    $data['penjualans'] = Penjualan::all();
    $data['penjualan_details'] = PenjualanDetail::all();
    $data['produk'] = Produk::where('stok', '>', 0)->get();
    $data['users'] = User::all();

    return view('index', $data);
});

Route::post('login_manual', [LoginController::class, 'authenticate'])->name('login_manual');

Route::get('/cart', function (Request $request) {
    $cart = json_decode($request->cookie("cart"));

    if ($request->remove) {
        $cart = collect($cart->data)->reject(function ($item) use ($request) {

            return $item->id == $request->remove;
        });

        $cookie = [
            "data" => array_values($cart->toArray()),
            "jumlah" => $cart->count('jumlah'),
            "total" => $cart->sum('total')
        ];

        $response = new Illuminate\Http\Response("<script>location.href = '/cart'</script>");

        $response->withCookie(cookie()->forever('cart', collect($cookie)->toJson(), "/"));

        return $response;
    }

    $data['cart'] = $cart;

    return view('cart', $data);
});

Route::get('/add-to-cart', function (Request $request) {
    $produk = Produk::findOrFail($request->id);
    
    
    if($produk->stok < 1 || $produk->stok - $request->jumlah < 0) {
        
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
                if($item->produk->stok - $itemRequest['jumlah'] < 0) {
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
    
    $penjualan = Penjualan::create([
        'nama_pelanggan' => $request->nama_pelanggan,
        'status' => 'pending',
        'no_hp' => $request->no_hp,
        'alamat_pengiriman' => $request->alamat_pengiriman,
        'bukti_transfer' => $request->file('bukti_transfer') ? $request->file('bukti_transfer')->move('gambar') : null,
        'catatan' => $request->catatan,
        'ongkos_kirim' => $request->ongkos_kirim
    ]);
   
    foreach (json_decode($request->cookie('cart'))->data as $item) {

        $produk = Produk::findOrFail($item->produk->id);
        if ($produk->stok - $item->jumlah < 0) {
            return redirect('cart')->with('error', "stok produk {$item->produk->nama} tidak cukup");
        } else {
            $produk->decrement('stok', $item->jumlah);
        }

        PenjualanDetail::create([
            'penjualan_id' => $penjualan->id,
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

        $data['penjualan'] = Penjualan::get();
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

    Route::get('pembelian/laporan', ['App\Http\Controllers\PembelianController', 'laporan'])->name('pembelian.laporan.index');
    Route::post('pembelian/laporan/print', ['App\Http\Controllers\PembelianController', 'print'])->name('pembelian.print');
    Route::get('pembelian/hapus_semua', ['App\Http\Controllers\PembelianController', 'hapus_semua'])->name('pembelian.hapus_semua');
    Route::resource('pembelian', 'App\Http\Controllers\PembelianController');

    Route::get('pembelian-detail/laporan', ['App\Http\Controllers\PembelianDetailController', 'laporan'])->name('pembelian-detail.laporan.index');
    Route::post('pembelian/laporan/print', ['App\Http\Controllers\PembelianController', 'print'])->name('pembelian.print');
    Route::get('pembelian-detail/hapus_semua', ['App\Http\Controllers\PembelianDetailController', 'hapus_semua'])->name('pembelian-detail.hapus_semua');
    Route::resource('pembelian-detail', 'App\Http\Controllers\PembelianDetailController');

    Route::get('penjualan/laporan', ['App\Http\Controllers\PenjualanController', 'laporan'])->name('penjualan.laporan.index');
    Route::get('penjualan/nota/{penjualan}', ['App\Http\Controllers\PenjualanController', 'nota'])->name('penjualan.print-nota');
    Route::post('penjualan/laporan/print', ['App\Http\Controllers\PenjualanController', 'print'])->name('penjualan.print');
    Route::get('penjualan/hapus_semua', ['App\Http\Controllers\PenjualanController', 'hapus_semua'])->name('penjualan.hapus_semua');
    Route::resource('penjualan', 'App\Http\Controllers\PenjualanController');

    Route::get('penjualan-detail/laporan', ['App\Http\Controllers\PenjualanDetailController', 'laporan'])->name('penjualan-detail.laporan.index');
    Route::post('penjualan-detail/laporan/print', ['App\Http\Controllers\PenjualanDetailController', 'print'])->name('penjualan-detail.print');
    Route::get('penjualan-detail/hapus_semua', ['App\Http\Controllers\PenjualanDetailController', 'hapus_semua'])->name('penjualan-detail.hapus_semua');
    Route::resource('penjualan-detail', 'App\Http\Controllers\PenjualanDetailController');

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