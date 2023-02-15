@extends('layouts.app')

@section('content')
    <div class="col-md-6">
        <form class="form-horizontal form-material" action="{{ url('/penjualan-detail/' . $penjualan_detail->id) }}"
            method="post" enctype="multipart/form-data">
            @method('put')
            @csrf

            @include ('penjualan-detail.form', ['formMode' => 'edit'])
        </form>
    </div>
@endsection