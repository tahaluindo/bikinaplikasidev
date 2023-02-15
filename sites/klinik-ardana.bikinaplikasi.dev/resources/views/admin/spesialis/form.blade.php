@extends('layout.app2')

@section('content')
    <div id="page-wrapper" >
        <div class="header">
            <h1 class="page-header">
                Spesialis
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ url('') }}/">Home</a></li>
                <li><a href="{{ url('') }}/" class="active">Spesialis</a></li>
            </ol>
        </div>
        <div id="page-inner" >

            <div class="row">
                <div class="col-sm-6 col-xs-6">
                    <div class="panel panel-default" >
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
                            <button type="submit" class="btn btn-info">Simpan</button>
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