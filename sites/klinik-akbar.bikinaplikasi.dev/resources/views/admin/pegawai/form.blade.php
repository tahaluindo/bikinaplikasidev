@extends('admin.layout.app')
@section('content')


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark font-weight-bold">UBAH DATA</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{ url('admin/pegawai') }}" class="btn btn-primary m-0 text-white pt-1 pb-1 pr-3 pl-3"><i
                            class="fa fa-arrow-circle-left"></i> Back</a>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header bg-success justify-content-between">
                            <h3 class="card-title font-weight-bold text-white">Pegawai</h3>
                        </div>
                        <!-- /.card-header -->
                        {{ Form::model($obj, ['action' => $action, 'method' => $method]) }}
                        <div class="card-body">
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
                        <!-- /.card-body -->
                        <div class="card-footer bg-success text-right">
                            <button type="submit" class="btn btn-outline-light">Simpan</button>
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
                <!-- ./col -->
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

@endsection