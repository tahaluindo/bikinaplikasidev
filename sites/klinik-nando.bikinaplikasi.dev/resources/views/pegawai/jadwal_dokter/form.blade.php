@extends('pegawai.layout.app2')

@section('content')
    <div class="row">
        <div class="col-lg-8 p-r-0 title-margin-right">
            <div class="page-header">
                <div class="page-title">
                    <h1>Jadwal Dokter</h1>
                </div>
            </div>
        </div>
        <div class="col-lg-4 p-l-0 title-margin-left">
            <div class="page-header">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="#">Jadwal Dokter</a></li>
                        <li class="active">Home</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- /# row -->
    <div class="main-content">
        <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header bg-success justify-content-between">
                            <h3 class="card-title font-weight-bold text-white">Pegawai</h3>
                        </div>
                        <!-- /.card-header -->
                        {{ Form::model($obj, ['action' => $action, 'method' => $method]) }}
                        <div class="card-body">
                            <p>Data Pasien</p>
                            <div class="form-group">
                                {{ Form::text('nama',null,['class' => 'form-control', 'placeholder' => 'Nama']) }}
                                <span class="text-danger">{{ $errors->first('nama') }}</span>
                            </div>
                            <div class="form-group">
                                {{ Form::select('jenis_kelamin', ['L' => 'Laki-Laki', 'P' => 'Perempuan'], null, ['class' => 'form-control','placeholder' => '- Pilih Jenis Kelamin -'])}}
                                <span class="text-danger">{{ $errors->first('jenis_kelamin') }}</span>
                            </div>
                            <div class="form-group">

                    <label for="tanggal_lahir">Tanggal Lahir</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                    </div>
                                    <input name="tanggal_lahir" type="date" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask placeholder="Tanggal Lahir" value="{{ $obj['tanggal_lahir'] }}">
                                </div>
                                <!-- /.input group -->
                            </div>
                            <div class="form-group">
                                {{ Form::text('alamat',null,['class' => 'form-control', 'placeholder' => 'Alamat']) }}
                                <span class="text-danger">{{ $errors->first('alamat') }}</span>
                            </div>
                            <div class="form-group">
                                {{ Form::text('tlpn',null,['class' => 'form-control', 'placeholder' => 'Nomor Telepon']) }}
                                <span class="text-danger">{{ $errors->first('tlpn') }}</span>
                            </div>
                            <div class="form-group">
                                {{ Form::text('alergi_obat',null,['class' => 'form-control', 'placeholder' => 'Alergi Obat']) }}
                                <span class="text-danger">{{ $errors->first('alergi_obat') }}</span>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer bg-success text-right">
                            <button type="submit" class="btn btn-default">Simpan</button>
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
                <!-- ./col -->
            </div>
    </div>

@endsection
