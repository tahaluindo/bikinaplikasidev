@extends('layouts.app')

@section('content')
    <div class="col-md-6">
        <form class="form-horizontal form-material" action="{{ url('/riwayat-berobat') }}"
            method="post" enctype="multipart/form-data">
            @csrf

            @include ('riwayat-berobat.form', ['formMode' => 'create'])
        </form>
    </div>
@endsection