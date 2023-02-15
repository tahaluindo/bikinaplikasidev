@extends('layouts.app')

@section('content')
    <div class="col-md-6">
        <form class="form-horizontal form-material" action="{{ url('/buku/' . $buku->id) }}"
            method="post" enctype="multipart/form-data">
            @method('put')
            @csrf

            @include ('buku.form', ['formMode' => 'edit'])
        </form>
    </div>
@endsection