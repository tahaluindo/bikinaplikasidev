@extends('layouts.app')

@section('content')
    <div class="col-md-6">
        <form class="form-horizontal form-material" action="{{ url('/saran-obat/' . $saran_obat->id) }}"
            method="post" enctype="multipart/form-data">
            @method('put')
            @csrf

            @include ('saran-obat.form', ['formMode' => 'edit'])
        </form>
    </div>
@endsection