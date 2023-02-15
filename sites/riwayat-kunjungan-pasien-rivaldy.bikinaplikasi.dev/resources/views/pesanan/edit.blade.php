@extends('layouts.app')

@section('content')
    <div class="col-md-6">
        <form class="form-horizontal form-material" action="{{ url('/pesanan/' . $pesanan->id) }}"
            method="post" enctype="multipart/form-data">
            @method('put')
            @csrf

            @include ('pesanan.form', ['formMode' => 'edit'])
        </form>
    </div>
@endsection