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

                    <form class="form-horizontal form-material" action="{{ url(route('karyawan.update', $karyawan->id)) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('put')

                        <div class="form-group">
                            <label class="col-md-12">Nama</label>
                            <div class="col-md-12">
                                <input type="text" placeholder="Nama"
                                    class="form-control form-control-line @error('nama') is-invalid @enderror"
                                    value='{{ old('nama') == "" ? $karyawan->nama : old('nama') }}' name='nama'>

                                @error('nama')
                                <span class="invalid-feedback text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-md-12">Alamat</label>
                            <div class="col-md-12">
                                <input type="text" placeholder="Alamat"
                                    class="form-control form-control-line @error('alamat') is-invalid @enderror"
                                    value='{{ old('alamat') == '' ? $karyawan->alamat : old('alamat') }}' name='alamat'>

                                @error('alamat')
                                <span class="invalid-feedback text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-md-12">Jenis Kelamin</label>
                            <div class="col-md-12">
                                <select class="form-control form-control-line" name='jenis_kelamin'>
                                    @foreach(['Laki - Laki', 'Perempuan'] as $jenis_kelamin)
                                    <option value="{{ $jenis_kelamin }}" @if(old('jenis_kelamin')==$jenis_kelamin) selected @endif>{{ $jenis_kelamin }}</option>
                                    @endforeach
                                </select>

                                @error('jenis_kelamin')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-md-12">Lokasi</label>
                            <div class="col-md-12">
                                <select class="form-control form-control-line" name='lokasi'>
                                    @foreach(['Afdeling 1' => 'Afdeling 1', 'Afdeling 2' => 'Afdeling 2', 'Afdeling 3' => 'Afdeling 3', 'Afdeling 4' => 'Afdeling 4'] as $lokasi)
                                    <option value="{{ $lokasi }}" @if(old('lokasi')==$lokasi || $karyawan->lokasi == $lokasi)
                                        selected @endif>{{ $lokasi }}</option>
                                    @endforeach
                                </select>

                                @error('lokasi')
                                <span class="invalid-feedback text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-md-12">Nik</label>
                            <div class="col-md-12">
                                <input type="text" placeholder="1571070901980002"
                                    class="form-control form-control-line" value='{{ old('nik')  == '' ? $karyawan->nik : old('nik')  }}'
                                    name='nik'>

                                @error('nik')
                                <span class="invalid-feedback text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-12">Tempat / Tanggal Lahir</label>
                            <div class="col-md-12">
                                <input type="text" placeholder="Tempat / Tanggal Lahir"
                                    class="form-control form-control-line @error('tempat_tanggal_lahir') is-invalid @enderror"
                                    value='{{ old('tempat_tanggal_lahir')  == '' ? $karyawan->tempat_tanggal_lahir : old('tempat_tanggal_lahir')  }}' name='tempat_tanggal_lahir'>

                                @error('tempat_tanggal_lahir')
                                <span class="invalid-feedback text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-12">Pendidikan</label>
                            <div class="col-md-12">
                                <select class="form-control form-control-line" name='pendidikan'>
                                    @foreach(['SD' => 'SD', 'SMP' => 'SMP', 'SMA' => 'SMA', 'D3' => 'D3', 'S1' => 'S1', 'S2' => 'S2', 'S3' => 'S3'] as $pendidikan)
                                        <option value="{{ $pendidikan }}" @if(old('pendidikan')==$pendidikan || $karyawan->pendidikan == $pendidikan) selected @endif>{{ $pendidikan }}</option>
                                    @endforeach
                                </select>

                                @error('pendidikan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-md-12">Agama</label>
                            <div class="col-md-12">
                                <select class="form-control form-control-line" name='agama'>
                                    @foreach(['Islam','Kristen Katolik','Kristen Protestan','Hindu','Budha'] as $agama)
                                    <option value="{{ $agama }}" @if(old('agama')==$agama || $karyawan->agama == $agama)
                                        selected @endif>{{ $agama }}</option>
                                    @endforeach
                                </select>

                                @error('agama')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-md-12">Status</label>
                            <div class="col-md-12">
                                <select class="form-control form-control-line" name='status'>
                                    @foreach(['Tetap','Tidak Tetap'] as $status)
                                    <option value="{{ $status }}" @if(old('status')==$status || $karyawan->status == $status)
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
                            <label class="col-md-12">Tanggungan</label>
                            <div class="col-md-12">
                                <input type="number" min="0" max="4" placeholder="Tanggungan"
                                    class="form-control form-control-line @error('tanggungan') is-invalid @enderror"
                                    value='{{ old('tanggungan') == "" ? $karyawan->tanggungan : old('tanggungan') }}' name='tanggungan'>

                                @error('tanggungan')
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