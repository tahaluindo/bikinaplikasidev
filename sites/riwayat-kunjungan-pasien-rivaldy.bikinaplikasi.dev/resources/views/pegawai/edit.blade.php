@extends('layouts.app')

@section('content')
    <div class="col-md-6">
        <form class="form-horizontal form-material" action="{{ url('/pegawai/' . $pegawai->id) }}"
            method="post" enctype="multipart/form-data">
            @method('put')
            @csrf

            @include ('pegawai.form', ['formMode' => 'edit'])
        </form>
    </div>
@endsection