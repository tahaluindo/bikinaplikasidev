@extends('layouts.app')

@section('content')
    <div class="col-md-6">
        <form class="form-horizontal form-material" action="{{ url('/data_penjualan_aktual') }}"
            method="post" enctype="multipart/form-data">
            @csrf

            @include ('data_penjualan_aktual.form', ['formMode' => 'create'])
        </form>
    </div>
@endsection