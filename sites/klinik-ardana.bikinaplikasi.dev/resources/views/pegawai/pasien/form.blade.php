@extends('pegawai.layout.app2')

@section('content')
    <div id="page-wrapper">
        <div class="header">
            <h1 class="page-header">
                Pasien
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ url('') }}/">Home</a></li>
                <li><a href="{{ url('') }}/" class="active">Pasien</a></li>
            </ol>

        </div>
        <div id="page-inner">

            <div class="row">
                <div class="col-sm-12 col-xs-12">
                    <div class="panel panel-default" style="padding:25px;">
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
                                    <input name="tanggal_lahir" type="date" class="form-control"
                                           data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy"
                                           data-mask placeholder="Tanggal Lahir" value="{{ $obj['tanggal_lahir'] }}">
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

                            <div class="form-group">
                                {{ Form::text('riwayat_penyakit',null,['class' => 'form-control', 'placeholder' => 'Riwayat Penyakit']) }}
                                <span class="text-danger">{{ $errors->first('riwayat_penyakit') }}</span>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer btn-info text-right">
                            <button type="submit" class="btn btn-default">Simpan</button>
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>

            <footer><p>Copyright © 2021 {{ env('APP_NAME') }}. All right reserved.

            </footer>
        </div>
    </div>
@endsection
