@extends('layouts.app')

@section('content')
    <div class="col-md-6">
        <form class="form-horizontal form-material" action="{{ url('/pelanggan/' . $pelanggan->id) }}"
            method="post" enctype="multipart/form-data">
            @method('put')
            @csrf

            @include ('pelanggan.form', ['formMode' => 'edit'])
        </form>
    </div>
@endsection