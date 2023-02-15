@extends('layouts.app')

@section('content')
    <div class="col-md-6">
        <form class="form-horizontal form-material" action="{{ url('/obat') }}"
            method="post" enctype="multipart/form-data">
            @csrf

            @include ('obat.form', ['formMode' => 'create'])
        </form>
    </div>
@endsection