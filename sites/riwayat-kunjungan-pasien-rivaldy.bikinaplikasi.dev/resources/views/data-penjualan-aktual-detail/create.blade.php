@extends('layouts.app')

@section('content')
    <div class="col-md-6">
        <form class="form-horizontal form-material" action="{{ url('/data-penjualan-aktual-detail') }}"
            method="post" enctype="multipart/form-data">
            @csrf

            @include ('data-penjualan-aktual-detail.form', ['formMode' => 'create'])
        </form>
    </div>
@endsection