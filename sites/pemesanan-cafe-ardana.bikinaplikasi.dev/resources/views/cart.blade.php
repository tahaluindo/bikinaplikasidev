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
                                    <th>Produk</th>
                                    <th>Jumlah</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>

                                @forelse($cart->data as $key => $item)
                                    <input type="hidden" name="produk[{{ $key }}][id]"
                                           value="{{ $item->id }}">

                                    <tr>
                                        <td class="product__cart__item">
                                            <div class="product__cart__item__pic">
                                                <img src="{{ url($item->produk->gambar) }}" alt="">
                                            </div>
                                            <div class="product__cart__item__text">
                                                <h6>{{ $item->produk->nama }}</h6>
                                                <h5>{{ toIdr($item->produk->harga_jual) }}</h5>
                                            </div>
                                        </td>
                                        <td class="quantity__item">
                                            <div class="quantity">
                                                <div class="pro-qty">

                                                    <input type="text" name="produk[{{ $key }}][jumlah]"
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
                                        <td><strong>Belum membeli produk, <a href="{{ url('') }}">beli yuk!</a></strong>
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
                            <strong>Nama Pelanggan</strong><br>
                            <input type="text" placeholder="Nama Pelanggan" name="nama_pelanggan" required>
                            <p>
                            <p>

                                <strong>No Hp</strong><br>
                                <input type="text" placeholder="No HP" name="no_hp" required>

                            <p>
                                <strong>No Meja</strong><br>
                                <input type="hidden" placeholder="No Meja" name="meja_id" required readonly
                                       id="meja_id" value="{{ $meja->id }}">
                                
                                <input type="text" placeholder="No Meja" name="" required readonly
                                       id="meja_id" value="{{ $meja->no_meja }}" disabled>

                            <p>
                            
                            <p>
                                <textarea placeholder="Catatan" name="catatan"
                                          class="form-control"></textarea>
                        </div>

                        <div class="cart__total">
                            <h6>Cart Total</h6>
                            <ul>
                                <li>Total Pesanan: <span id="total-pesanan">{{ toIdr($cart->total) }}</span></li>
                                <li>Total Keseluruhan: <span id="total-keseluruhan">{{ toIdr($cart->total) }}</span></li>
                            </ul>
                            <button class="primary-btn" type="submit">Pesan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <script type="text/javascript"
            src="http://maps.google.com/maps/api/js?sensor=false&v=3&libraries=geometry"></script>

    <script async defer>
        function formatRupiah(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            // tambahkan titik jika yang di input sudah menjadi angka ribuan
            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
        }
		
        if (!navigator.geolocation) {
            alert("Gak support geolocation")
        } else {
            navigator.geolocation.getCurrentPosition((currentPosition) => {
                var latTitudeUser = currentPosition.coords.latitude;
                var longitudeUser = currentPosition.coords.longitude;
                var latTitudeMakananminumanMila = -1.6419386636239086;
                var longitudeMakananminumanMila = 103.62425866911005;

                var distance = google.maps.geometry.spherical.computeDistanceBetween(new google.maps.LatLng(latTitudeMakananminumanMila, longitudeMakananminumanMila), new google.maps.LatLng(latTitudeUser, longitudeUser));
                distance = Math.ceil(distance) / 1000;

                @if(!request()->distance)
                location.href = `?distance=${Math.ceil(distance) * 3000}&total-ongkir=${Math.ceil(distance) * 3000}&total-keseluruhan=${(Math.ceil(distance) * 3000)}`
                @endif
            })
        }
    </script>
@endsection