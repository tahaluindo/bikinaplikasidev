@extends('layouts.app')

@section('content')
    <div class="col-md-6">
        <form class="form-horizontal form-material" action="{{ url('/pemesanan-detail/' . $pemesanan_detail->id) }}"
            method="post" enctype="multipart/form-data">
            @method('put')
            @csrf

            @include ('pemesanan-detail.form', ['formMode' => 'edit'])
        </form>
    </div>
@endsection