@extends('layouts.app')

@section('content')
    <div class="col-md-6">
        <form class="form-horizontal form-material" action="{{ url('/data_penjualan_aktual/' . $data_penjualan_aktual->id) }}"
            method="post" enctype="multipart/form-data">
            @method('put')
            @csrf

            @include ('data_penjualan_aktual.form', ['formMode' => 'edit'])
        </form>
    </div>
@endsection