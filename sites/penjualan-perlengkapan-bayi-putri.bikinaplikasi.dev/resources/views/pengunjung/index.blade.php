@extends('layouts.pengunjung.app')

@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2"><span class="fa fa-clipboard-list fa-fw"></span> List Barang</h1>
    </div>
    <div class="container">
        <div class="row">
            @foreach($products as $product)
            <div class="col-md-3">
                <figure class="card card-product">
                    <div class="img-wrap">
                        <img src="{{ url($product->gambar ?? "") }}" width="240" height='240'>
                    </div>
                    <figcaption class="info-wrap">
                        <h4 class="title">{{ $product->name }}</h4>
                    </figcaption>
                    <div class="bottom-wrap">
                        <a href="{{ route('pengunjung.product.show', $product->id) }}" class="btn btn-sm btn-info float-right">Lihat</a>
                        <div class="price-wrap h5">
                            <span class="price-new">Rp{{ number_format( $product->price, 0, ',', '.') }}</span>
                        </div>
                    </div> 
                </figure>
            </div>
            @endforeach
            
        </div>
    </div>
</main>
@endsection