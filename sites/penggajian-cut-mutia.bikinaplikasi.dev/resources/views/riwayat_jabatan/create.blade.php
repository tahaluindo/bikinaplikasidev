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
        <h1 class="page-header">Tambah {{ ucwords(preg_replace("/_/", " ", Request::segment(1))) }}</h1>
    </div>
</div>

<div class="row">
    <div class="col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading">Tambah {{ ucwords(preg_replace("/_/", " ", Request::segment(1))) }}</div>
            <div class="panel-body">
                <div class="col-md-12">

                    <form class="form-horizontal form-material" action="{{ url(route('riwayat_jabatan.store')) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label class="col-md-12">Karyawan</label>
                            <div class="col-md-12">
                                <select class="form-control form-control-line" name='karyawan_id'>
                                    @foreach($karyawans as $karyawan)
                                    <option value="{{ $karyawan->id }}" @if(old('karyawan_id')==$karyawan->id) selected
                                        @endif>{{ $karyawan->nama }}
                                    </option>
                                    @endforeach
                                </select>

                                @error('karyawan_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-12">Jabatan</label>
                            <div class="col-md-12">
                                <select class="form-control form-control-line" name='jabatan_id'>
                                    @foreach($jabatans as $jabatan)
                                    <option value="{{ $jabatan->id }}" @if(old('jabatan_id')==$jabatan->id) selected
                                        @endif>{{ $jabatan->nama }}
                                    </option>
                                    @endforeach
                                </select>

                                @error('jabatan_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-12">Tanggal</label>
                            <div class="col-md-12">
                                <input type="text" placeholder="25-02-1980"
                                    class="form-control form-control-line flatpickr" value='{{ old('tanggal') }}'
                                    name='tanggal'>

                                @error('tanggal')
                                <span class="invalid-feedback text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-12">Status</label>
                            <div class="col-md-12">
                                <select class="form-control form-control-line" name='status'>
                                    @foreach(['Aktif', 'Tidak Aktif'] as $status)
                                    <option value="{{ $status }}" @if(old('status')==$status)
                                        selected @endif>{{ $status }}</option>
                                    @endforeach
                                </select>

                                @error('status')
                                <span class="invalid-feedback" role="alert">
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