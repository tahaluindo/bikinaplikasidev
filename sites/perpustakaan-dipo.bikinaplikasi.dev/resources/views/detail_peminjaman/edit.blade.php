@extends('layouts.app')

@section('content')
    <div class="col-md-6">
        <form class="form-horizontal form-material" action="{{ url('/detail_peminjaman/' . $detail_peminjaman->id) }}"
            method="post" enctype="multipart/form-data">
            @method('put')
            @csrf

            @include ('detail_peminjaman.form', ['formMode' => 'edit'])
        </form>
    </div>
@endsection