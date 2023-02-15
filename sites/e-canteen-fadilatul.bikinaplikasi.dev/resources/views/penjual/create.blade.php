@extends('layouts.app')

@section('content')
    <div class="col-md-6">
        <form class="form-horizontal form-material" action="{{ url('/penjual') }}"
            method="post" enctype="multipart/form-data">
            @csrf

            @include ('penjual.form', ['formMode' => 'create'])
        </form>
    </div>
@endsection