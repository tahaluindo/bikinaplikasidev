@extends('layouts.app')

@section('content')
    <div class="col-md-6">
        <form class="form-horizontal form-material" action="{{ url('/produk') }}"
            method="post" enctype="multipart/form-data">
            @csrf

            @include ('produk.form', ['formMode' => 'create'])
        </form>
    </div>
@endsection