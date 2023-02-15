@extends('layouts.app')

@section('content')
    <div class="col-md-6">
        <form class="form-horizontal form-material" action="{{ url('/event') }}"
            method="post" enctype="multipart/form-data">
            @csrf

            @include ('event.form', ['formMode' => 'create'])
        </form>
    </div>
@endsection