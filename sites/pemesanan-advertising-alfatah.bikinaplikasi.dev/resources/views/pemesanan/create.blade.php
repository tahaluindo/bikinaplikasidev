@extends('layouts.app')

@section('content')
    <div class="col-md-6">
        <form class="form-horizontal form-material" action="{{ url('/pemesanan') }}"
            method="post" enctype="multipart/form-data">
            @csrf

            @include ('pemesanan.form', ['formMode' => 'create'])
        </form>
    </div>
@endsection