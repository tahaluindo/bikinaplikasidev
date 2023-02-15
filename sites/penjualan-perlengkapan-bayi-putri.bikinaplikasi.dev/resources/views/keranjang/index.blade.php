@extends('layouts.pengunjung.app')

@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2"><span class="fa fa-clipboard-list fa-fw"></span> {{ request()->checkout ? "Checkout" : "Pesanan" }}</h1>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <table class="table">
                    <tbody>
                        <thead>
                            <tr>
                                <th width=2>No</th>
                                <th>Nama Barang</th>
                                <th>Berat</th>
                                <th>Qty</th>
                                <th>Harga</th>
                                <th>Total</th>
                                @if(!request()->detail)
                                <th>Hapus</th>
                                @endif
                            </tr>
                        </thead>

                        <tbody>
                            @php
                                $total_berat = 0;
                            @endphp

                            @foreach($keranjang->detail_penjualans as $key => $detail_penjualan)
                            @php
                                $total_berat += $detail_penjualan->product->berat * $detail_penjualan->qty;
                            @endphp

                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $detail_penjualan->product->name }}</td>
                                <td>{{ number_format( $detail_penjualan->product->berat * $detail_penjualan->qty, 0, ',', '.') }}g</td>
                                <td>{{ $detail_penjualan->qty }}</td>
                                <td>Rp{{ number_format( $detail_penjualan->product->price, 0, ',', '.') }}</td>
                                <td>Rp{{ number_format( $detail_penjualan->harga_total, 0, ',', '.') }}</td>
                                @if(!request()->detail)
                                <td>
                                    <a href="{{ route('keranjang.delete', $detail_penjualan->id) }}" class='btn btn-sm btn-danger' onclick='return confirm("Yakin akan menghapus barang ini?")'>Hapus</a>
                                </td>
                                @endif
                            </tr>
                            @endforeach
                            <tr>
                                <td colspan="2"></td>
                                <td>{{ number_format( $total_berat, 0, ',', '.') }}g</td>
                                <td colspan="2"></td>
                                <td colspan="2">Rp{{ number_format( $keranjang->detail_penjualans->sum('harga_total')) }}</td>
                            </tr>
                        </tbody>
                    </tbody>
                </table>

                @if(!request()->checkout)
                @if(!request()->detail)
                <a href='{{ route('pengunjung') }}' class="btn btn-sm btn-info">Lanjut Belanja</a>
                <a href='{{ route('keranjang.index') }}?checkout=1' class="btn btn-sm btn-info">Checkout</a>
                @endif
                @endif

                @if(request()->checkout)
                @if(!request()->detail)
                <form action="{{ route('keranjang.checkout.store', $keranjang->id_penjualan) }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" name='berat' id='ongkir-berat' value='{{ $total_berat }}'>
                    <input type="hidden" name='ongkir_value' id='ongkir-value'>

                    <div class='form-group'>
                        <label for="">Cek Ongkir (Input Tujuan)</label> <br>
                        <input list="ongkir" id='ongkir-input' required> <button id='ongkir-btn' type="button">Cek</button> <span id='ongkir-cost'>Rp0</span>
                        <datalist id="ongkir" class="">
                            {{-- disini data ongkir akan diload dari javascript --}}
                        </datalist>
                    </div>

                    <div class='form-group'>
                        <label for="">Nama Pelanggan</label> <br>
                        <input name='nama_pelanggan' type="text" placeholder="Nama Pelanggan" value="{{ auth()->user()->name }}" required> 
                    </div>

                    <div class='form-group'>
                        <label for="">Alamat Kirim</label> <br>
                        <textarea name="alamat_kirim" id="" cols="43" rows="10">{{ $keranjang->alamat_kirim }}</textarea> <br>
                        <span>
                            {{ $errors->first('alamat_kirim') }}
                        </span>
                    </div>

                    <p>
                        Transfer Ke Salah 1 Rek Berikut: <br>
                        BCA: 1191828271 (Evawati)<br>
                        BRI: 0020-01-001290-56-1 (Evawati)<br>
                        MANDIRI 110-00-0435178-6 (Evawati)

                    <div class='form-group'>
                        <label for="">Bukti Transfer</label> <br>
                        <input name='bukti_transfer' type="file" required> <br>

                        <span>
                            {{ $errors->first('bukti_transfer') }}
                        </span>
                    </div>

                    <button type='submit' class="btn btn-sm btn-info">Checkout</button>
                </form>
                @endif
                @endif
            </div>
        </div>
    </div>
</main>
@endsection