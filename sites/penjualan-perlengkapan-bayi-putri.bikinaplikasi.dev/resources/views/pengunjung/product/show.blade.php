@extends('layouts.pengunjung.app')

@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2"><span class="fa fa-clipboard-list fa-fw"></span> Detail Product {{ $product->name }}</h1>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <figure class="card card-product">
                    <div class="img-wrap">
                        <img src="{{ url($product->gambar ?? "") }}" width="500" height='500'>
                    </div>
                    <div class="bottom-wrap">
                        <a href="{{ route('pengunjung.product.order', $product->id) }}" class="btn btn-sm btn-info float-right">Tambah Pesanan</a>
                        <div class="price-wrap h5 text-center">
                            <span class="price-new">{{ $product->name }}</span>
                            {{-- <span class="price-new">Rp{{ number_format( $product->price, 0, ',', '.') }}</span> --}}
                        </div>
                    </div> 
                </figure>

                <table class="table">
                    <tbody>
                        <tr>
                            <td>Kode</td>
                            <td>:</td>
                            <td>{{ $product->code }}</td>
                        </tr>
                        
                        <tr>
                            <td>Satuan</td>
                            <td>:</td>
                            <td>{{ $product->measure->name }}</td>
                        </tr>
                        
                        <tr>
                            <td>Harga</td>
                            <td>:</td>
                            <td>Rp{{ number_format( $product->price, 0, ',', '.') }}</td>
                        </tr>
                        
                        <tr>
                            <td>Berat</td>
                            <td>:</td>
                            <td>{{ number_format( $product->berat, 0, ',', '.') }} Gr</td>
                        </tr>
                        
                        <tr>
                            <td>Stok</td>
                            <td>:</td>
                            <td>{{ $product->transaction->total_stock() }}</td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
@endsection