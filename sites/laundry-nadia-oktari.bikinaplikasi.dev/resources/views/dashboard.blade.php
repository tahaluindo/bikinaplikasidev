@extends('layouts.app4')


@section('content')
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row mt-3">
                <div class="col-12 col-lg-6 col-xl-3">
                    <div class="card gradient-deepblue">
                        <div class="card-body">
                            <h5 class="text-white mb-0">{{ $pesanans->count() }} <span class="float-right"><i
                                        class="fa fa-shopping-cart"></i></span></h5>
                            <div class="progress my-3" style="height:3px;">
                                <div class="progress-bar" style="width:55%"></div>
                            </div>
                            <p class="mb-0 text-white small-font">Total Pesanan <span class="float-right">+{{ $pesanans->where('dipesan_pada', date('Y-m-d H:i:s'))->count() }} <i
                                        class="zmdi zmdi-long-arrow-up"></i></span></p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6 col-xl-3">
                    <div class="card gradient-orange">
                        <div class="card-body">
                            <h5 class="text-white mb-0">{{ $pelanggans->count() }} <span class="float-right"><i class="fa fa-user"></i></span>
                            </h5>
                            <div class="progress my-3" style="height:3px;">
                                <div class="progress-bar" style="width:55%"></div>
                            </div>
                            <p class="mb-0 text-white small-font">Total Pelanggan <span class="float-right">+{{ $pelanggans->whereBetween('created_at', [\Carbon\Carbon::now()->addDays(-1)->format("Y-m-d"), \Carbon\Carbon::now()->addDays(1)->format("Y-m-d")])->count() }} <i
                                        class="zmdi zmdi-long-arrow-up"></i></span></p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6 col-xl-3">
                    <div class="card gradient-ohhappiness">
                        <div class="card-body">
                            <h5 class="text-white mb-0">{{ $pengeluarans->count() }} <span class="float-right"><i class="fa fa-arrow-circle-o-right"></i></span>
                            </h5>
                            <div class="progress my-3" style="height:3px;">
                                <div class="progress-bar" style="width:55%"></div>
                            </div>
                            <p class="mb-0 text-white small-font">Total Pengeluaran <span class="float-right">+{{ $pengeluarans->where('tanggal', date('Y-m-d'))->count() }} <i
                                        class="zmdi zmdi-long-arrow-up"></i></span></p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6 col-xl-3">
                    <div class="card gradient-ibiza">
                        <div class="card-body">
                            <h5 class="text-white mb-0">{{ $pakets->count() }} <span class="float-right"><i
                                        class="fa fa-envira"></i></span></h5>
                            <div class="progress my-3" style="height:3px;">
                                <div class="progress-bar" style="width:55%"></div>
                            </div>
                            <p class="mb-0 text-white small-font">Total Paket <span class="float-right">+{{ $pakets->whereBetween('created_at', [\Carbon\Carbon::now()->addDays(-1)->format("Y-m-d"), \Carbon\Carbon::now()->addDays(1)->format("Y-m-d")])->count() }} <i
                                        class="zmdi zmdi-long-arrow-up"></i></span></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-lg-8 col-xl-8">
                    <div class="card">
                        <div class="card-header">Grafik Pesanan / Pengeluaran
                            <div class="card-action">
                                
                            </div>
                        </div>
                        <div class="card-body">
                            <ul class="list-inline">
                                <li class="list-inline-item"><i class="fa fa-circle mr-2 text-primary"></i>Pesanan
                                </li>
                                <li class="list-inline-item"><i class="fa fa-circle mr-2" style="color: #ade2f9"></i>Pengeluaran
                                </li>
                            </ul>
                            <canvas id="chart1" height="115"></canvas>
                        </div>

                    </div>
                </div>

                <div class="col-12 col-lg-4 col-xl-4">
                    <div class="card">
                        <div class="card-header">Pesanan Hari Ini
                            <div class="card-action">
                                
                            </div>
                        </div>
                        <div class="card-body">
                            <canvas id="chart2" height="180"></canvas>
                        </div>
                        <div class="table-responsive">
                            <table class="table align-items-center">
                                <tbody>
                                <tr>
                                    <td><i class="fa fa-circle text-primary mr-2"></i> Belum Diproses</td>
                                    <td>{{ $pesanans->where('status', 'Belum Diproses')->count() }}</td>
                                </tr>
                                <tr>
                                    <td><i class="fa fa-circle text-success mr-2"></i>Sedang Diproses</td>
                                    <td>{{ $pesanans->where('status', 'Sedang Diproses')->count() }}</td>
                                </tr>
                                <tr>
                                    <td><i class="fa fa-circle text-secondary mr-2"></i>Sudah Selesai</td>
                                    <td>{{ $pesanans->where('status', 'Selesai')->count() }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection