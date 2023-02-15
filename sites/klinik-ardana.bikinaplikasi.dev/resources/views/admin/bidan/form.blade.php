@extends('layout.app2')

@section('content')
    <div id="page-wrapper">
        <div class="header">
            <h1 class="page-header">
                Bidan
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ url('') }}/">Home</a></li>
                <li><a href="{{ url('') }}/" class="active">Bidan</a></li>
            </ol>

        </div>
        <div id="page-inner">

            <div class="row">
                <div class="col-sm-12 col-xs-12">
                    <div class="panel panel-default">
                        {{ Form::model($obj, ['action' => $action, 'method' => $method]) }}
                        <div class="panel-body">
                            <input type="hidden" value="P" name="jenis_kelamin">

                            <p>Data Bidan</p>
                            <div class="form-group">
                            <label for="tanggal_lahir">Id</label>
                                <input type="text" class="form-control" name="" id="" aria-describedby="helpId"
                                       placeholder="DR-{{$obj['id']}}" disabled>
                            </div>
                            <div class="form-group">
                            <label for="tanggal_lahir">Nama</label>
                                {{ Form::text('nama',null,['class' => 'form-control', 'placeholder' => 'Nama']) }}
                                <span class="text-danger">{{ $errors->first('nama') }}</span>
                            </div>
                            <div cl ass="form-group">
                            <label for="tanggal_lahir">Alamat</label>
                                {{ Form::text('alamat',null,['class' => 'form-control', 'placeholder' => 'Alamat']) }}
                                <span class="text-danger">{{ $errors->first('alamat') }}</span>
                            </div>

                            <div class="form-group" style="margin-top: 15px;">
                            <label for="tanggal_lahir">Tlpn</label>
                                {{ Form::text('tlpn',null,['class' => 'form-control', 'placeholder' => 'Nomor Telepon']) }}
                                <span class="text-danger">{{ $errors->first('tlpn') }}</span>
                            </div>

                            <div class="form-group">
                            <label for="tanggal_lahir">Jadwal</label>
                                {{ Form::text('jadwal',null,['class' => 'form-control', 'placeholder' => 'Jadwal']) }}
                                <span class="text-danger">{{ $errors->first('jadwal') }}</span>
                            </div>

                            <div class="dropdown-divider"></div>
                            <p>Data Login <span class="text-muted text-sm"> ( Abaikan jika tidak ingin diubah )
                                </span></p>
                            <div class="form-group">
                            <label for="tanggal_lahir">Username</label>
                                {{ Form::text('username',null,['class' => 'form-control', 'placeholder' => 'Username']) }}
                                <span class="text-danger">{{ $errors->first('username') }}</span>
                            </div>
                            <div class="form-group">
                            <label for="tanggal_lahir">Password</label>
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