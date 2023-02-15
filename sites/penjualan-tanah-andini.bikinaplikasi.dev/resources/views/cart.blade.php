@extends('layouts.index')

@section('content')

    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="breadcrumb__text">
                        <h2>Cart</h2>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="breadcrumb__links">
                        <a href="index-2.html">Home</a>
                        <span>Cart</span>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">

                <div class="col-lg-8">
                    <form id="update-cart" action="{{ url('update-cart') }}">
                        <div class="shopping__cart__table">
                            <table>
                                <thead>
                                <tr>
                                    <th>Barang</th>
                                    <th>Jumlah</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>

                                @forelse($cart->data as $key => $item)
                                    <input type="hidden" name="barang[{{ $key }}][id]"
                                           value="{{ $item->id }}">

                                    <tr>
                                        <td class="product__cart__item">
                                            <div class="product__cart__item__pic">
                                                <img src="{{ url($item->barang->gambar ?? "") }}" alt="">
                                            </div>
                                            <div class="product__cart__item__text">
                                                <h6>{{ $item->barang->nama }}</h6>
                                                <h5>{{ toIdr($item->barang->harga_jual) }}</h5>
                                            </div>
                                        </td>
                                        <td class="quantity__item">
                                            <div class="quantity">
                                                <div class="pro-qty">

                                                    <input type="text" name="barang[{{ $key }}][jumlah]"
                                                           value="{{ $item->jumlah }}">
                                                </div>
                                            </div>
                                        </td>
                                        <td class="cart__price">{{ toIdr($item->total) }}</td>
                                        <td class="cart__close"
                                            onclick="if(confirm('Yakin akan menghapus?')) { window.location.href = '?remove={{ $item->id }}' }">
                                            <span class="icon_close"></span></td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td><strong>Belum membeli barang, <a href="{{ url('') }}">beli yuk!</a></strong>
                                        </td>
                                    </tr>
                                @endforelse

                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="continue__btn">
                                    <a href="{{ url('/') }}">Lanjutkan Belanja</a>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="continue__btn update__btn">
                                    <button id="update-cart" type="submit" class="primary-btn"> Update cart</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="col-lg-4">
                    <form action="{{ url('bayar-cart') }}" enctype="multipart/form-data" method="post">
                        @csrf
                        <div class="cart__discount">
                            <h6>Detail Pengiriman</h6>
                            <input type="text" placeholder="No HP" name="no_hp" required>
                            <p>
                            <p>
                                <label>Bukti Transfer (kirim ke rek: BCA 8537209945 A/N Ninda Satya) / Kosongkan bila COD</label>
                                <input placeholder="Bukti Transfer" name="bukti_transfer" type="file">

                            <p>
                                <textarea placeholder="Alamat Pengiriman" name="alamat_pengiriman"
                                          class="form-control" required></textarea>
                            
                            
                            <p>
                                <textarea placeholder="Catatan" name="catatan"
                                          class="form-control"></textarea>
                        </div>
                        
                        <div class="cart__total">
                            <h6>Cart Total</h6>
                            <ul>
                                <li>Total <span>{{ toIdr($cart->total) }}</span></li>
                            </ul>
                            <button class="primary-btn" type="submit">Bayar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection