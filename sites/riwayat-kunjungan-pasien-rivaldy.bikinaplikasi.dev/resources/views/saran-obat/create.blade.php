@extends('layouts.app')

@section('content')
    <div class="col-md-6">
        <form class="form-horizontal form-material" action="{{ url("/saran-obat") }}"
            method="post" enctype="multipart/form-data">
            @csrf

            @include ('saran-obat.form', ['formMode' => 'create'])
        </form>
    </div>
@endsection