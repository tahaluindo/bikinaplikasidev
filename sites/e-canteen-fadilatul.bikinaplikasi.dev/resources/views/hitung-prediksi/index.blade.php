@extends('layouts.app')

@section('content')

    <div class="col-md-offset-1 col-md-3">
        <div class="main-box mb-red">
            <a href="{{ route('hitung-prediksi-penjualan.index') }}">
                <i class="fa fa-opencart fa-5x"></i>
                <h5>Hitung Prediksi Penjualan</h5>
            </a>
        </div>
    </div>

    <div class="col-md-3">
        <div class="main-box mb-red">
            <a href="{{ route('hitung-prediksi-harga.index') }}">
                <i class="fa fa-money fa-5x"></i>
                <h5>Hitung Prediksi Harga</h5>
            </a>
        </div>
    </div>

    <div class="col-md-3">
        <div class="main-box mb-red">
            <a href="{{ route('hitung-prediksi-keseluruhan.index') }}">
                <i class="fa fa-certificate fa-5x"></i>
                <h5>Hitung Prediksi Keseluruhan</h5>
            </a>
        </div>
    </div>
            
@endsection
