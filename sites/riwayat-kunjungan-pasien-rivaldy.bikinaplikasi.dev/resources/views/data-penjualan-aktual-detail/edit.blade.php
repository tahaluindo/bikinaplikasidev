@extends('layouts.app')

@section('content')
    <div class="col-md-6">
        <form class="form-horizontal form-material" action="{{ url('/data-penjualan-aktual-detail/' . $data-penjualan-aktual-detail->id) }}"
            method="post" enctype="multipart/form-data">
            @method('put')
            @csrf

            @include ('data-penjualan-aktual-detail.form', ['formMode' => 'edit'])
        </form>
    </div>
@endsection