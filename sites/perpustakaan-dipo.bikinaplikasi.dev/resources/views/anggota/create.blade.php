@extends('layouts.app')

@section('content')
    <div class="col-md-6">
        <form class="form-horizontal form-material" action="{{ url('/anggota') }}"
            method="post" enctype="multipart/form-data">
            @csrf

            @include ('anggota.form', ['formMode' => 'create'])
        </form>
    </div>
@endsection