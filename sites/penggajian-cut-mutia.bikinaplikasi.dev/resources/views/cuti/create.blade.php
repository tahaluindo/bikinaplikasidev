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

                    <form class="form-horizontal form-material" action="{{ url(route('cuti.store')) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label class="col-md-12">karyawan</label>
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
                            <label class="col-md-12">Nomor Permohonan</label>
                            <div class="col-md-12">
                                <input type="text" placeholder="Nomor PERMOHONAN"
                                    class="form-control form-control-line @error('nomor_permohonan') is-invalid @enderror"
                                    value='{{ old('nomor_permohonan') }}' name='nomor_permohonan'>

                                @error('nomor_permohonan')
                                <span class="invalid-feedback text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-12">Tanggal Mulai</label>
                            <div class="col-md-12">
                                <input type="text" placeholder="25-02-1980"
                                    class="form-control form-control-line flatpickr" value='{{ old('tanggal_mulai') }}'
                                    name='tanggal_mulai'>

                                @error('tanggal_mulai')
                                <span class="invalid-feedback text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-12">Tanggal Selesai</label>
                            <div class="col-md-12">
                                <input type="text" placeholder="25-02-1980"
                                    class="form-control form-control-line flatpickr" value='{{ old('tanggal_selesai') }}'
                                    name='tanggal_selesai'>

                                @error('tanggal_selesai')
                                <span class="invalid-feedback text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-12">Keterangan</label>
                            <div class="col-md-12">
                                <input type="text" placeholder="Keterangan"
                                    class="form-control form-control-line @error('keterangan') is-invalid @enderror"
                                    value='{{ old('keterangan') }}' name='keterangan'>

                                @error('keterangan')
                                <span class="invalid-feedback text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-md-12">Potongan (Per Hari)</label>
                            <div class="col-md-12">
                                <input type="number" placeholder="100000"
                                    class="form-control form-control-line @error('potongan') is-invalid @enderror"
                                    value='{{ old('potongan') }}' name='potongan' value="100000">

                                @error('potongan')
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