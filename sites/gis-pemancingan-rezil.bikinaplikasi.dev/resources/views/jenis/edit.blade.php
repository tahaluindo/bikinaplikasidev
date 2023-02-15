@extends('layouts.app')

@section('content')
    <div class="col-md-6">
        <form class="form-horizontal form-material" action="{{ url('/jenis/' . $jenis->id) }}"
            method="post" enctype="multipart/form-data">
            @method('put')
            @csrf

            @include ('jenis.form', ['formMode' => 'edit'])
        </form>
    </div>
@endsection