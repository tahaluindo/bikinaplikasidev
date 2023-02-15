@extends('layouts.app')

@section('content')
    <div class="col-md-6">
        <form class="form-horizontal form-material" action="{{ url('/menu') }}"
            method="post" enctype="multipart/form-data">
            @csrf

            @include ('menu.form', ['formMode' => 'create'])
        </form>
    </div>
@endsection