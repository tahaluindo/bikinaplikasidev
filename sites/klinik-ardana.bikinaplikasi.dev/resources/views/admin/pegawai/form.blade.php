@extends('layout.app2')

@section('content')
    <div id="page-wrapper">
        <div class="header">
            <h1 class="page-header">
                Pegawai
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ url('') }}/">Home</a></li>
                <li><a href="{{ url('') }}/" class="active">Pegawai</a></li>
            </ol>

        </div>
        <div id="page-inner">

            <div class="row">
                <div class="col-sm-12 col-xs-12">
                    <div class="panel panel-default">
                        {{ Form::model($obj, ['action' => $action, 'method' => $method]) }}
                        <div class="panel-body">
                            <p>Data Pegawai</p>
                            <div class="form-group">
                                <input type="text" class="form-control" name="" id="" aria-describedby="helpId"
                                       placeholder="PG-{{$obj['id']}}" disabled>
                            </div>
                            <div class="form-group">
                                {{ Form::text('nama',null,['class' => 'form-control', 'placeholder' => 'Nama']) }}
                                <span class="text-danger">{{ $errors->first('nama') }}</span>
                            </div>
                            <div class="form-group">
                                {{ Form::select('jenis_kelamin', ['L' => 'Laki-Laki', 'P' => 'Perempuan'], null, ['class' => 'form-control','placeholder' => '- Pilih Jenis Kelamin -'])}}
                                <span class="text-danger">{{ $errors->first('jenis_kelamin') }}</span>
                            </div>
                            <div class="form-group">
                                {{ Form::text('alamat',null,['class' => 'form-control', 'placeholder' => 'Alamat']) }}
                                <span class="text-danger">{{ $errors->first('alamat') }}</span>
                            </div>
                            <div class="form-group">
                                {{ Form::text('tlpn',null,['class' => 'form-control', 'placeholder' => 'Nomor Telepon']) }}
                                <span class="text-danger">{{ $errors->first('tlpn') }}</span>
                            </div>
                            <div class="dropdown-divider"></div>
                            <p>Data Login <span class="text-muted text-sm"> ( Abaikan jika tidak ingin diubah )
                                </span></p>
                            <div class="form-group">
                                {{ Form::text('username',null,['class' => 'form-control', 'placeholder' => 'Username']) }}
                                <span class="text-danger">{{ $errors->first('username') }}</span>
                            </div>
                            <div class="form-group">
                                {{ Form::password('password',['class' => 'form-control','placeholder' => 'Password']) }}
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                        <div class="panel-footer bg-success text-right">
                            <button type="submit" class="btn btn-outline-light">Simpan</button>
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