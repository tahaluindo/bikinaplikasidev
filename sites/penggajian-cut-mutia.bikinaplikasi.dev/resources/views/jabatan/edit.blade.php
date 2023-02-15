@extends('layouts.app')

@section('content')
<div class="row">
    <ol class="breadcrumb">
        <li>
            <a href="#">
                <em class="fa fa-home"></em>
            </a>
        </li>

        <li class="active">{{ ucwords(preg_replace("/_/", " ", Request::segment(1))) }}</li>
    </ol>
</div>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Edit {{ ucwords(preg_replace("/_/", " ", Request::segment(1))) }}</h1>
    </div>
</div>

<div class="row">
    <div class="col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading">Edit {{ ucwords(preg_replace("/_/", " ", Request::segment(1))) }}</div>
            <div class="panel-body">
                <div class="col-md-12">

                    <form class="form-horizontal form-material" action="{{ url(route('jabatan.update', $jabatan->id)) }}"
                        method="post" enctype="multipart/form-data">
                        @method('put')
                        @csrf

                        <div class="form-group">
                            <label class="col-md-12">Nama</label>
                            <div class="col-md-12">
                                <input type="text" placeholder="Johnathan Doe"
                                    class="form-control form-control-line @error('nama') is-invalid @enderror"
                                    value='{{ old('nama') == "" ? $jabatan->nama : old('nama') }}' name='nama'>

                                @error('nama')
                                <span class="invalid-feedback text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        
                        
                        <div class="form-group">
                            <label class="col-md-12">Gaji pokok</label>
                            <div class="col-md-12">
                                <input type="number" placeholder="1000000"
                                    class="form-control form-control-line" id="example-gaji"
                                    value='{{ old('gaji_pokok') == "" ? $jabatan->gaji_pokok : old('gaji_pokok') }}' name='gaji_pokok'>

                                @error('gaji_pokok')
                                <span class="invalid-feedback text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-12">Bpjs</label>
                            <div class="col-md-12">
                                <input type="number" placeholder="1000000"
                                    class="form-control form-control-line" id="example-bpjs"
                                    value='{{ old('bpjs') == "" ? $jabatan->bpjs : old('bpjs') }}' name='bpjs'>

                                @error('bpjs')
                                <span class="invalid-feedback text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-12">
                                <button class="btn btn-success" type="submit">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection