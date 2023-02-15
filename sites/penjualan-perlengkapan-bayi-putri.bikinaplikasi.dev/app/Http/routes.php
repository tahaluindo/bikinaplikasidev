<?php

Route::get('/', 'PengunjungController@index')->name('pengunjung');

Route::auth();

//Route::get('/home', 'HomeController@index');
Route::get('/home', 'HomeController@index')->name('home');

//Produk
Route::get('/product','Tokoku\ProductController@index')->name('pdIndex');
Route::get('/product/create','Tokoku\ProductController@create')->name('pdCreate');
Route::get('/product/edit/{id}','Tokoku\ProductController@edit')->name('pdEdit');
Route::post('/product/store','Tokoku\ProductController@store')->name('pdStore');
Route::put('/product/update/{id}','Tokoku\ProductController@update')->name('pdUpdate');
Route::delete('/product/delete','Tokoku\ProductController@delete')->name('pdDelete');
Route::post('/product/import','Tokoku\ProductController@import')->name('pdImport');
Route::post('/product/delete_all','Tokoku\ProductController@deleteAll')->name('pdDeleteAll');
Route::get('/product/export','Tokoku\ProductController@export')->name('pdExport');

//Supplier
Route::get('/supplier','Tokoku\SupplierController@index')->name('whIndex');
Route::get('/supplier/create','Tokoku\SupplierController@create')->name('whCreate');
Route::get('/supplier/edit/{id}','Tokoku\SupplierController@edit')->name('whEdit');
Route::post('/supplier/store','Tokoku\SupplierController@store')->name('whStore');
Route::put('/supplier/update/{id}','Tokoku\SupplierController@update')->name('whUpdate');
Route::delete('/supplier/delete','Tokoku\SupplierController@delete')->name('whDelete');

//Periode
Route::get('/periode','Tokoku\PeriodeController@index')->name('periodeIndex');
Route::get('/periode/create','Tokoku\PeriodeController@create')->name('periodeCreate');
Route::get('/periode/edit/{id}','Tokoku\PeriodeController@edit')->name('periodeEdit');
Route::post('/periode/store','Tokoku\PeriodeController@store')->name('periodeStore');
Route::put('/periode/update/{id}','Tokoku\PeriodeController@update')->name('periodeUpdate');
Route::delete('/periode/delete','Tokoku\PeriodeController@delete')->name('periodeDelete');

//Transaksi
Route::get('/transaction','Tokoku\TrController@index')->name('trIndex');
Route::get('/transaction/create','Tokoku\TrController@create')->name('trCreate');
Route::get('/transaction/{transaction}/edit','Tokoku\TrController@edit')->name('trEdit');
Route::post('/transaction/store','Tokoku\TrController@store')->name('trStore');
Route::delete('/transaction/delete','Tokoku\TrController@delete')->name('trDelete');

//Perhitungan Fisik
Route::get('/stockopname','Tokoku\SoController@index')->name('soIndex');
Route::get('/stockopname/create','Tokoku\SoController@create')->name('soCreate');
Route::get('/stockopname/edit/{id}','Tokoku\SoController@edit')->name('soEdit');
Route::post('/stockopname/store','Tokoku\SoController@store')->name('soStore');
Route::put('/stockopname/update/{id}','Tokoku\SoController@update')->name('soUpdate');
Route::delete('/stockopname/delete','Tokoku\SoController@delete')->name('soDelete');

//Laporan Stok
Route::get('/stockreport','Tokoku\WsController@index')->name('wsIndex');
Route::get('/stockreport/{id}','Tokoku\WsController@sortBySupplier')->name('wsSortByWh');
Route::get('/stockreport/{id}/export','Tokoku\WsController@export')->name('wsExport');

// Laporan Penjualan & Barang
Route::get('/laporan/penjualan/create','Tokoku\LaporanController@penjualanCreate')->name('laporanPenjualanCreate');
Route::get('/laporan/penjualan_online/create','Tokoku\LaporanController@penjualanOnlineCreate')->name('laporanPenjualanOnlineCreate');
Route::get('/laporan/penjualan_return/create','Tokoku\LaporanController@penjualanReturnCreate')->name('laporanPenjualanReturnCreate');
Route::get('/laporan/pembelian/create','Tokoku\LaporanController@pembelianCreate')->name('laporanPembelianCreate');
Route::get('/laporan/pembelian_retur/create','Tokoku\LaporanController@pembelianReturnCreate')->name('laporanPembelianReturnCreate');
Route::get('/laporan/barang/create','Tokoku\LaporanController@barangCreate')->name('laporanBarangCreate');
Route::post('/laporan/penjualan','Tokoku\LaporanController@penjualan')->name('laporanPenjualan');
Route::post('/laporan/penjualan_online','Tokoku\LaporanController@penjualanOnline')->name('laporanPenjualanOnline');
Route::post('/laporan/pembelian','Tokoku\LaporanController@pembelian')->name('laporanPembelian');
Route::post('/laporan/penjualan_return','Tokoku\LaporanController@penjualanReturn')->name('laporanPenjualanReturn');
Route::post('/laporan/pembelian_retur','Tokoku\LaporanController@pembelianReturn')->name('laporanPembelianReturn');
Route::post('/laporan/barang','Tokoku\LaporanController@barang')->name('laporanBarang');

//Ubah Sandi
Route::get('/password','Tokoku\PasswordController@index')->name('passwordChange');
Route::post('/password/update','Tokoku\PasswordController@update')->name('passwordChanged');

Route::get('daftar', function(){
    return view('daftar');
});

Route::post('daftar', 'DaftarController@store');

Route::get('/', 'PengunjungController@index')->name('pengunjung');


Route::get('product/{product}', 'Pengunjung\ProductController@show')->name('pengunjung.product.show');
Route::get('product/{product}/order', 'Pengunjung\ProductController@order')->name('pengunjung.product.order');
Route::post('product/{product}/order/store', 'Pengunjung\ProductController@store')->name('pengunjung.product.order.store');

Route::get('keranjang', 'KeranjangController@index')->name('keranjang.index');
Route::get('keranjang/delete/{detail_penjualan}', 'KeranjangController@delete')->name('keranjang.delete');
Route::post('keranjang/checkout/store/{penjualan}', 'KeranjangController@checkoutStore')->name('keranjang.checkout.store');

Route::get('pesanan', 'PesananController@index')->name('pesanan.index');
Route::get('penjualan/admin/index', 'PenjualanController@index')->name('penjualan.admin.index');
Route::get('penjualan/admin/{penjualan}/input_resi', 'PenjualanController@inputResi')->name('penjualan.admin.input_resi');
Route::get('penjualan/admin/{penjualan}/selesaikan_pesanan', 'PenjualanController@selesaikanPesanan')->name('penjualan.admin.selesaikan_pesanan');
Route::post('penjualan/admin/{penjualan}/input_resi_store', 'PenjualanController@inputResiStore')->name('penjualan.admin.input_resi_store');

Route::get('/', 'PengunjungController@index')->name('pengunjung');

Route::post('ongkir_cek', 'OngkirController@ongkirCek');