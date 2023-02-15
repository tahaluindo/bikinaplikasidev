@extends('layouts.app')

@section('content')
    <div class="col-md-6">
        <form class="form-horizontal form-material" action="{{ url('/data-penjualan-prediksi/' . $data_penjualan_prediksi->id) }}"
            method="post" enctype="multipart/form-data">
            @method('put')
            @csrf

            @include ('data_penjualan_prediksi.form', ['formMode' => 'edit'])
        </form>
    </div>
@endsection