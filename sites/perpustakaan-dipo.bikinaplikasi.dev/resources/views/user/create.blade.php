@extends('layouts.app')

@section('content')
    <div class="col-md-6">
        <form class="form-horizontal form-material" action="{{ url('/user') }}"
            method="post" enctype="multipart/form-data">
            @csrf

            @include ('user.form', ['formMode' => 'create'])
        </form>
    </div>
@endsection