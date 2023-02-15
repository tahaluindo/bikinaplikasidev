@extends('layouts.app')

@section('content')
    <div class="col-md-6">
        <form class="form-horizontal form-material" action="{{ url('/pesanan-detail') }}"
            method="post" enctype="multipart/form-data">
            @csrf

            @include ('pesanan-detail.form', ['formMode' => 'create'])
        </form>
    </div>
@endsection