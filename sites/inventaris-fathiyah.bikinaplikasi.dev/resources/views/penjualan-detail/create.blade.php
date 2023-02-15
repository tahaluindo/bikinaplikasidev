@extends('layouts.app')

@section('content')
    <div class="col-md-6">
                
        <form class="form-horizontal form-material" action="{{ url('/penjualan-detail') }}"
            method="post" enctype="multipart/form-data">
            @csrf

            @include ('penjualan-detail.form', ['formMode' => 'create'])
        </form>
    </div>
@endsection