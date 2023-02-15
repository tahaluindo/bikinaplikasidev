@extends('layouts.pengunjung.app')

@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2"><span class="fa fa-clipboard-list fa-fw"></span> Pesan {{ $product->name }}</h1>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <form action='{{ route("pengunjung.product.order.store", $product->id) }}' method="post">
                {{ csrf_field() }}
                <input type="hidden" name="tgl_penjualan" value="{{ date('Y-m-d') }}">
                <input type="hidden" name="id_pelanggan" value="{{ auth()->user()->id }}">

                <input type="hidden" name="id_barang" value="{{ $product->id }}">
                <input type="hidden" name="harga_satuan" value="{{ $product->price }}">
                <table class="table">
                    <tbody>
                        <tr>
                            <td>Code</td>
                            <td>:</td>
                            <td>{{ $product->code }}</td>
                        </tr>
                        
                        <tr>
                            <td>Satuan</td>
                            <td>:</td>
                            <td>{{ $product->measure->name }}</td>
                        </tr>
                        
                        <tr>
                            <td>Harga Satuan</td>
                            <td>:</td>
                            <td>Rp{{ number_format( $product->price, 0, ',', '.') }}</td>
                        </tr>

                        <tr>
                            <td>Berat</td>
                            <td>:</td>
                            <td>{{ number_format( $product->berat, 0, ',', '.') }}</td>
                        </tr>
                        
                        <tr>
                            <td>Stok</td>
                            <td>:</td>
                            <td>{{ $product->transaction->total_stock() }}</td>
                        </tr>

                    </tbody>
                </table>

                <table class="table">
                    <tbody>
                        <tr>
                            <td>Qty</td>
                            <td>
                                <input type="number" value='{{ old('qty') }}' name='qty' class="form-control" required min=1>
                            </td>
                        </tr>

                        <tr>
                            <td>Alamat Kirim</td>
                            <td>
                                <textarea name='alamat_kirim' class="form-control" required>{{ old('alamat_kirim') }}</textarea>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <button class='btn btn-sm btn-info' min=1 type='submit'>Simpan</button>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection