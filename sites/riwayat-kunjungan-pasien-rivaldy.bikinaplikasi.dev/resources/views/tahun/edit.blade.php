@extends('layouts.app')

@section('content')
    <div class="col-md-6">
        <form class="form-horizontal form-material" action="{{ url('/tahun/' . $tahun->id) }}"
            method="post" enctype="multipart/form-data">
            @method('put')
            @csrf

            @include ('tahun.form', ['formMode' => 'edit'])
        </form>
    </div>
@endsection