@extends('layouts.app')

@section('content')
    <div class="col-md-6">
        <form class="form-horizontal form-material" action="{{ url('/pemesanan/' . $pemesanan->id) }}"
            method="post" enctype="multipart/form-data">
            @method('put')
            @csrf

            @include ('pemesanan.form', ['formMode' => 'edit'])
        </form>
    </div>
@endsection