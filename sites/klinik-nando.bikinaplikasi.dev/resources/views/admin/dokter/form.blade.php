@extends('layout.app2')

@section('content')
    <div class="row">
        <div class="col-lg-8 p-r-0 title-margin-right">
            <div class="page-header">
                <div class="page-title">
                    <h1>Dokter</h1>
                </div>
            </div>
        </div>
        <div class="col-lg-4 p-l-0 title-margin-left">
            <div class="page-header">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="#">Dokter</a></li>
                        <li class="active">Home</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- /# row -->
    <div class="main-content">
        <div class="row">
                <div class="col-sm-12 col-xs-12">
                    <div class="panel panel-default">
                        {{ Form::model($obj, ['action' => $action, 'method' => $method]) }}
                        <div class="panel-body">
                            <p>Data Dokter</p>
                            <div class="form-group">
                                <input type="text" class="form-control" name="" id="" aria-describedby="helpId"
                                       placeholder="DR-{{$obj['id']}}" disabled>
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

                            <div class="form-group">
                                {{ Form::text('jadwal',null,['class' => 'form-control', 'placeholder' => 'Jadwal']) }}
                                <span class="text-danger">{{ $errors->first('jadwal') }}</span>
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
                            <button type="submit" class="btn btn-default">Simpan</button>
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
    </div>

@endsection
