
@extends('admin.layout.app')
@section("content")
    <div class="container-fluid  dashboard-content">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h3 class="mb-2">Dashboard</h3>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="text-muted">Dokter</h5>
                        <div class="metric-value d-inline-block">
                            <h1 class="mb-1 text-primary">{{$dokter_count}} </h1>
                        </div>
                        <div class="metric-label d-inline-block float-right text-success">
                            <i class="fa fa-fw fa-caret-up"></i><span>5.27%</span>
                        </div>
                    </div>
                    <div id="sparkline-1"></div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="text-muted">Pegawai</h5>
                        <div class="metric-value d-inline-block">
                            <h1 class="mb-1 text-primary">{{$pegawai_count}} </h1>
                        </div>
                        <div class="metric-label d-inline-block float-right text-danger">
                            <i class="fa fa-fw fa-caret-down"></i><span>1.08%</span>
                        </div>
                    </div>
                    <div id="sparkline-2"></div>
                </div>
            </div>


            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="text-muted">Pasien</h5>
                        <div class="metric-value d-inline-block">
                            <h1 class="mb-1 text-primary">{{$pegawai_count}}</h1>
                        </div>
                        <div class="metric-label d-inline-block float-right text-danger">
                            <i class="fa fa-fw fa-caret-down"></i><span>7.00%</span>
                        </div>
                    </div>
                    <div id="sparkline-3">
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="text-muted">Rekam Medic</h5>
                        <div class="metric-value d-inline-block">
                            <h1 class="mb-1 text-primary">{{$periksa_count}} </h1>
                        </div>
                        <div class="metric-label d-inline-block float-right text-success">
                            <i class="fa fa-fw fa-caret-up"></i><span>4.87%</span>
                        </div>
                    </div>
                    <div id="sparkline-4"></div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-8 col-lg-12 col-md-8 col-sm-12 col-12">
                <div class="card">
                    <h5 class="card-header">Pendapatan</h5>
                    <div class="card-body">
                        <canvas id="revenue" width="400" height="150"></canvas>
                    </div>
                    <div class="card-body border-top">
                        <div class="row">
                            <div class="offset-xl-1 col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 p-3">
                                <h4> Pendapatan Hari Ini: Rp2,800.30</h4>
                            </div>
                            <div class="offset-xl-1 col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12 p-3">
                                <h2 class="font-weight-normal mb-3"><span>Rp48,325</span> </h2>
                                <div class="mb-0 mt-3 legend-item">
                                    <span class="fa-xs text-primary mr-1 legend-title "><i
                                            class="fa fa-fw fa-square-full"></i></span>
                                    <span class="legend-text">Minggu Ini</span></div>
                            </div>
                            <div class="offset-xl-1 col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12 p-3">
                                <h2 class="font-weight-normal mb-3">
                                    <span>Rp59,567</span>
                                </h2>
                                <div class="text-muted mb-0 mt-3 legend-item"> <span
                                        class="fa-xs text-secondary mr-1 legend-title"><i
                                            class="fa fa-fw fa-square-full"></i></span><span class="legend-text">Minggu
                                        Lalu</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-lg-12 col-md-4 col-sm-12 col-12">
                <div class="card">
                    <h5 class="card-header">Total Rekam Medic ancd </h5>
                    <div class="card-body">
                        <canvas id="total-sale" width="220" height="155"></canvas>
                        <div class="chart-widget-list">
                            <p>
                                <span class="fa-xs text-primary mr-1 legend-title"><i
                                        class="fa fa-fw fa-square-full"></i></span><span class="legend-text">
                                    Direct</span>
                                <span class="float-right">Rp300.56</span>
                            </p>
                            <p>
                                <span class="fa-xs text-secondary mr-1 legend-title"><i
                                        class="fa fa-fw fa-square-full"></i></span>
                                <span class="legend-text">Affilliate</span>
                                <span class="float-right">Rp135.18</span>
                            </p>
                            <p>
                                <span class="fa-xs text-brand mr-1 legend-title"><i
                                        class="fa fa-fw fa-square-full"></i></span>
                                <span class="legend-text">Sponsored</span>
                                <span class="float-right">Rp48.96</span>
                            </p>
                            <p class="mb-0">
                                <span class="fa-xs text-info mr-1 legend-title"><i
                                        class="fa fa-fw fa-square-full"></i></span> <span class="legend-text">
                                    E-mail</span>
                                <span class="float-right">Rp154.02</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
