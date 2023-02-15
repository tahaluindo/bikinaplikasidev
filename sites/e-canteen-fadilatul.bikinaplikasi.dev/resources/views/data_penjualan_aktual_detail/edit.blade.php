@extends('layouts.app')

@section('content')
    <div class="col-md-6">
        <form class="form-horizontal form-material" action="{{ url('/data_penjualan_aktual_detail/' . $data_penjualan_aktual_detail->id) }}"
            method="post" enctype="multipart/form-data">
            @method('put')
            @csrf

            @include ('data_penjualan_aktual_detail.form', ['formMode' => 'edit'])
        </form>
    </div>
@endsection