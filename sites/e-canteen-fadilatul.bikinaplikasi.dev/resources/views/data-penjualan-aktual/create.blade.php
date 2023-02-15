@extends('layouts.app')

@section('content')
    <div class="col-md-6">
        <form class="form-horizontal form-material" action="{{ url('/data-penjualan-aktual') }}"
            method="post" enctype="multipart/form-data">
            @csrf

            @include ('data-penjualan-aktual.form', ['formMode' => 'create'])
        </form>
    </div>
@endsection