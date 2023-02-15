@extends('layouts.app')

@section('content')
    <div class="col-md-6">
        <form class="form-horizontal form-material" action="{{ url('/data-penjualan-prediksi-detail/' . $data-penjualan-prediksi-detail->id) }}"
            method="post" enctype="multipart/form-data">
            @method('put')
            @csrf

            @include ('data-penjualan-prediksi-detail.form', ['formMode' => 'edit'])
        </form>
    </div>
@endsection