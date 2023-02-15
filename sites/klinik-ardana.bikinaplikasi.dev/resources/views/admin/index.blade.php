@extends('layout.app2')

@section('content')
    <div id="page-wrapper">
        <div class="header">
            <h1 class="page-header">
                Dashboard <small>Selamat Datang, <strong>{{ auth()->user()->user->nama }}</strong></small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ url('') }}/">Home</a></li>
                <li><a href="{{ url('') }}/" class="active">Dashboard</a></li>
            </ol>

        </div>
        <div id="page-inner">
            <div class="row">
                <div class="col-md-3 col-sm-12 col-xs-12">
                    <div class="board">
                        <div class="panel panel-primary">
                            <div class="number">
                                <h3>
                                    <h3>{{ $bidan_count }}</h3>
                                    <small>Bidan</small>
                                </h3>
                            </div>
                            <div class="icon">
                                <i class="fa fa-user-md fa-5x red"></i>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-12 col-xs-12">
                    <div class="board">
                        <div class="panel panel-primary">
                            <div class="number">
                                <h3>
                                    <h3>{{ $pegawai_count }}</h3>
                                    <small>Pegawai</small>
                                </h3>
                            </div>
                            <div class="icon">
                                <i class="fa fa-user fa-5x blue"></i>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-12 col-xs-12">
                    <div class="board">
                        <div class="panel panel-primary">
                            <div class="number">
                                <h3>
                                    <h3>{{ $pasien_count }}</h3>
                                    <small>Pasien</small>
                                </h3>
                            </div>
                            <div class="icon">
                                <i class="fa fa-users fa-5x green"></i>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-12 col-xs-12">
                    <div class="board">
                        <div class="panel panel-primary">
                            <div class="number">
                                <h3>
                                    <h3>{{ $periksa_count }}</h3>
                                    <small>Rekam Medic</small>
                                </h3>
                            </div>
                            <div class="icon">
                                <i class="fa fa-stethoscope fa-5x yellow"></i>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-sm-6 col-xs-12">
                    <div class="panel panel-default chartJs">
                        <div class="panel-heading">
                            <div class="card-title">
                                <div class="title">Periksa</div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <canvas id="line-chart" class="chart"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xs-12">
                    <div class="panel panel-default chartJs">
                        <div class="panel-heading">
                            <div class="card-title">
                                <div class="title">Jenis Kelamin</div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div id="morris-bar-chart"></div>
                        </div>
                    </div>
                </div>
            </div>

            <footer><p>Copyright © 2021 {{ env('APP_NAME') }}. All right reserved.

            </footer>
        </div>
    </div>
@endsection