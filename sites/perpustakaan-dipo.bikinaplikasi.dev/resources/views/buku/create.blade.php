@extends('layouts.app')

@section('content')
    <div class="col-md-6">
        <form class="form-horizontal form-material" action="{{ url('/buku') }}"
            method="post" enctype="multipart/form-data">
            @csrf

            @include ('buku.form', ['formMode' => 'create'])
        </form>
    </div>
@endsection