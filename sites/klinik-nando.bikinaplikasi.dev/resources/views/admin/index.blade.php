@extends('layout.app2')

@section('content')
    <div class="row">
        <div class="col-lg-8 p-r-0 title-margin-right">
            <div class="page-header">
                <div class="page-title">
                    <h1>Hello, <strong>{{ auth()->user()->user->nama }}</strong></h1>
                </div>
            </div>
        </div>
        <!-- /# column -->
        <div class="col-lg-4 p-l-0 title-margin-left">
            <div class="page-header">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="#">Dashboard</a></li>
                        <li class="active">Home</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- /# column -->
    </div>
    <!-- /# row -->
    <div class="main-content">
        <div class="row">
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card p-0">
                            <div class="stat-widget-three">
                                <div  class="stat-icon bg-primary">
                                    <i  class="fa fa-user-md"></i>
                                </div>
                                <div  class="stat-content">
                                    <div  class="stat-text">Dokter</div>
                                    <div class="stat-digit">{{ $dokter_count }}</div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="card p-0">
                            <div class="stat-widget-three">
                                <div class="stat-icon bg-success">
                                    <i class="fa fa-user"></i>
                                </div>
                                <div class="stat-content">
                                    <div class="stat-text">Pegawai</div>
                                    <div class="stat-digit">{{ $pegawai_count }}</div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="card p-0">
                            <div class="stat-widget-three">
                                <div class="stat-icon bg-warning">
                                    <i class="fa fa-users"></i>
                                </div>
                                <div class="stat-content">
                                    <div class="stat-text">Pasien</div>
                                    <div class="stat-digit">{{ $pasien_count }}</div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="card p-0">
                            <div class="stat-widget-three">
                                <div class="stat-icon bg-danger">
                                    <i class="fa fa-stethoscope"></i>
                                </div>
                                <div class="stat-content">
                                    <div class="stat-text">Rekam Medic</div>
                                    <div class="stat-digit">{{ $periksa_count }}</div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div  class="card bg-success">
                            <div class="stat-widget-six">
                                <div class="stat-icon p-15">
                                    <i class="ti-stats-up"></i>
                                </div>
                                <div class="stat-content p-t-12 p-b-12">
                                    <div class="text-left dib">
                                        <div  class="stat-heading">Selesai</div>
                                        <div class="stat-text">
                                            Total: {{ $periksa->where('status_periksa', 2)->count() }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="card bg-primary">
                            <div class="stat-widget-six">
                                <div class="stat-icon p-15">
                                    <i class="ti-stats-down"></i>
                                </div>
                                <div class="stat-content p-t-12 p-b-12">
                                    <div class="text-left dib">
                                        <div class="stat-heading">Belum Selesai</div>
                                        <div class="stat-text">
                                            Total: {{ $periksa->where('status_periksa', 0)->count() }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /# column -->
            <div class="col-lg-6">
                <div class="card alert">
                    <div class="card-header">
                        <h4>Jenis Kelamin</h4>
                        <div class="card-header-right-icon">
                            <ul>
                                <li class="card-close" data-dismiss="alert"><i class="ti-close"></i></li>
                                <li class="doc-link"><a href="#"><i class="ti-link"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="sales-chart">
                        <canvas id="team-chart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection