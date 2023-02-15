@extends('layout.app2')

@section('content')
    <div class="row">
        <div class="col-lg-8 p-r-0 title-margin-right">
            <div class="page-header">
                <div class="page-title">
                    <h1>Spesialis</h1>
                </div>
            </div>
        </div>
        <div class="col-lg-4 p-l-0 title-margin-left">
            <div class="page-header">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="#">Spesialis</a></li>
                        <li class="active">Home</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- /# row -->
    <div class="main-content">
        <div class="row">
            <div class="col-sm-6 col-xs-6">
                <div class="panel panel-default">
                    {{ Form::model($obj, ['action' => $action, 'method' => $method]) }}
                    <div class="card-body" style="padding: 25px !important;">
                        <p>Data Poli</p>
                        <div class="form-group">
                            <input type="text" class="form-control" name="" id="" aria-describedby="helpId"
                                   placeholder="SP-{{ $obj['id'] }}" disabled>
                        </div>
                        <div class="form-group">
                            {{ Form::text('nama',null,['class' => 'form-control', 'placeholder' => 'Nama']) }}
                            <span class="text-danger">{{ $errors->first('nama') }}</span>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer bg-success text-right">
                        <button type="submit" class="btn btn-default">Simpan</button>
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>

@endsection