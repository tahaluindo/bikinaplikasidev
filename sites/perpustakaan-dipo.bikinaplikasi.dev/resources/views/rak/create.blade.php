@extends('layouts.app')

@section('content')
    <div class="col-md-6">
        <form class="form-horizontal form-material" action="{{ url('/rak') }}"
            method="post" enctype="multipart/form-data">
            @csrf

            @include ('rak.form', ['formMode' => 'create'])
        </form>
    </div>
@endsection