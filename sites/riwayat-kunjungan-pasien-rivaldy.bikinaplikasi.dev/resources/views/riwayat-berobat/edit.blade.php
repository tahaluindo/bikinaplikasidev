@extends('layouts.app')

@section('content')
    <div class="col-md-6">
        <form class="form-horizontal form-material" action="{{ url('/riwayat-berobat/' . $riwayat_berobat->id) }}"
            method="post" enctype="multipart/form-data">
            @method('put')
            @csrf

            @include ('riwayat-berobat.form', ['formMode' => 'edit'])
        </form>
    </div>
@endsection