@extends('layouts.app')

@section('content')


    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="mb-0">Dashboard</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Minible</a></li>
                                    <li class="breadcrumb-item active">Dashboard</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-md-6 col-xl-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="float-right mt-2">
                                    <div id="total-revenue-chart"></div>
                                </div>
                                <div>
                                    <h4 class="mb-1 mt-1">{{ toIdr($penjualan->sum('total')) }}</h4>
                                    <p class="text-muted mb-0">Total Penjualan</p>
                                </div>
                                <p class="text-muted mt-3 mb-0"><span class="text-success mr-1"><i
                                            class="mdi mdi-arrow-up-bold ml-1"></i>2.65%</span> dari minggu lalu
                                </p>
                            </div>
                        </div>
                    </div> <!-- end col-->

                    <div class="col-md-6 col-xl-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="float-right mt-2">
                                    <div id="orders-chart"></div>
                                </div>
                                <div>
                                    <h4 class="mb-1 mt-1"><span data-plugin="counterup">{{ $pelanggan->count() }}</span>
                                    </h4>
                                    <p class="text-muted mb-0">Pelanggan</p>
                                </div>
                                <p class="text-muted mt-3 mb-0"><span class="text-danger mr-1"><i
                                            class="mdi mdi-arrow-down-bold ml-1"></i>0.82%</span> dari minggu lalu
                                </p>
                            </div>
                        </div>
                    </div> <!-- end col-->

                    <div class="col-md-6 col-xl-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="float-right mt-2">
                                    <div id="customers-chart"></div>
                                </div>
                                <div>
                                    <h4 class="mb-1 mt-1"><span data-plugin="counterup">{{ $kavling->count() }}</span>
                                    </h4>
                                    <p class="text-muted mb-0">Kavling</p>
                                </div>
                                <p class="text-muted mt-3 mb-0"><span class="text-danger mr-1"><i
                                            class="mdi mdi-arrow-down-bold ml-1"></i>6.24%</span> dari minggu lalu
                                </p>
                            </div>
                        </div>
                    </div> <!-- end col-->

                    <div class="col-md-6 col-xl-3">

                        <div class="card">
                            <div class="card-body">
                                <div class="float-right mt-2">
                                    <div id="growth-chart"></div>
                                </div>
                                <div>
                                    <h4 class="mb-1 mt-1">+ {{ $angsuran->count() }}</h4>
                                    <p class="text-muted mb-0">Angsuran</p>
                                </div>
                                <p class="text-muted mt-3 mb-0"><span class="text-success mr-1"><i
                                            class="mdi mdi-arrow-up-bold ml-1"></i>10.51%</span> dari minggu lalu
                                </p>
                            </div>
                        </div>
                    </div> <!-- end col-->
                </div> <!-- end row-->

                <div class="row">
                    <div class="col-xl-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="float-right">
                                    <div class="dropdown">
                                        <a class="dropdown-toggle text-reset" href="#" id="dropdownMenuButton5"
                                           data-toggle="dropdown" aria-haspopup="true"
                                           aria-expanded="false">
                                            <span class="font-weight-semibold">Sort By:</span> <span class="text-muted">Yearly<i
                                                    class="mdi mdi-chevron-down ml-1"></i></span>
                                        </a>

                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton5">
                                            <a class="dropdown-item" href="#">Monthly</a>
                                            <a class="dropdown-item" href="#">Yearly</a>
                                            <a class="dropdown-item" href="#">Weekly</a>
                                        </div>
                                    </div>
                                </div>
                                <h4 class="card-title mb-4">Grafik Penjualan</h4>

                                <div class="mt-1">
                                    <ul class="list-inline main-chart mb-0">
                                        <li class="list-inline-item chart-border-left mr-0 border-0">
                                            <h3 class="text-primary">{{ toIdr($penjualan->sum('total')) }}<span
                                                    class="text-muted d-inline-block font-size-15 ml-3">Pendapatan</span>
                                            </h3>
                                        </li>
                                        <li class="list-inline-item chart-border-left mr-0">
                                            <h3><span data-plugin="counterup">{{ $pelanggan->count() }}</span><span
                                                    class="text-muted d-inline-block font-size-15 ml-3">Pelanggan</span>
                                            </h3>
                                        </li>
                                        <li class="list-inline-item chart-border-left mr-0">
                                            <h3><span data-plugin="counterup">3.6</span>%<span
                                                    class="text-muted d-inline-block font-size-15 ml-3">Conversation Ratio</span>
                                            </h3>
                                        </li>
                                    </ul>
                                </div>

                                <div class="mt-3">
                                    <div id="sales-analytics-chart" class="apex-charts" dir="ltr"></div>
                                </div>
                            </div> <!-- end card-body-->
                        </div> <!-- end card-->
                    </div> <!-- end col-->

                    <div class="col-xl-4">
                        <div class="card bg-primary">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-sm-8">
                                        <p class="text-white font-size-18">Lihat Laporan <b>Penjualan</b><i
                                                class="mdi mdi-arrow-right"></i></p>
                                        <div class="mt-4">
                                            <a href="{{ route('penjualan.laporan.index') }}"
                                               class="btn btn-success waves-effect waves-light">Lihat Laporan</a>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="mt-4 mt-sm-0">
                                            <img src="{{ url('') }}/assets/images/setup-analytics-amico.svg"
                                                 class="img-fluid" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end card-body-->
                        </div> <!-- end card-->

                        <div class="card">
                            <div class="card-body">
                                <div class="float-right">
                                    <div class="dropdown">
                                        <a class="dropdown-toggle text-reset" href="#" id="dropdownMenuButton1"
                                           data-toggle="dropdown" aria-haspopup="true"
                                           aria-expanded="false">
                                            <span class="font-weight-semibold">Sort By:</span> <span class="text-muted">Yearly<i
                                                    class="mdi mdi-chevron-down ml-1"></i></span>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right"
                                             aria-labelledby="dropdownMenuButton1">
                                            <a class="dropdown-item" href="#">Monthly</a>
                                            <a class="dropdown-item" href="#">Yearly</a>
                                            <a class="dropdown-item" href="#">Weekly</a>
                                        </div>
                                    </div>
                                </div>

                                <h4 class="card-title mb-4">Top Kavling Terjual</h4>


                                @foreach($kavling as $key => $item)
                                    <div class="row align-items-center no-gutters mt-3">
                                        <div class="col-sm-3">
                                            <p class="text-truncate mt-1 mb-0"><i
                                                    class="mdi mdi-circle-medium text-primary mr-2"></i> {{ $item->nomor_kavling }}
                                            </p>
                                        </div>

                                        <div class="col-sm-9">
                                            <div class="progress mt-1" style="height: 6px;">
                                                <div class="progress-bar progress-bar bg-primary" role="progressbar"
                                                     style="width: 52%" aria-valuenow="{{ ($key + 1) * 10 }}"
                                                     aria-valuemin="0"
                                                     aria-valuemax="{{ ($key + 1) * 10 }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach


                            </div> <!-- end card-body-->
                        </div> <!-- end card-->
                    </div> <!-- end Col -->
                </div> <!-- end row-->


                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-4">Penjualan Terakhir</h4>
                                <div class="table-responsive">
                                    <table class="table table-centered table-nowrap mb-0">
                                        <thead class="thead-light">
                                        <tr>
                                            
                                            <th>Pelanggan Id</th>
                                            <th>Kavling Id</th>
                                            <th>Lama Angsuran</th>
                                            <th>Batas Pembayaran</th>
                                            <th>Dp</th>
                                            <th>Biaya PPJB</th>
                                            <th>Biaya SHM</th>
                                            <th>Cara Pembayaran</th>
                                            <th>Total</th>
                                            <th>Catatan</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($penjualan as $item)
                                        <tr>
                                            <td>{{ $item->pelanggan->nama }}</td>
                                            <td>{{ $item->kavling->nomor_kavling }}</td>
                                            <td>{{ $item->lama_angsuran }}</td>
                                            <td>{{ $item->batas_pembayaran }}</td>
                                            <td>{{ toIdr($item->dp) }}</td>
                                            <td>{{ toIdr($item->biaya_ppjb) }}</td>
                                            <td>{{ toIdr($item->biaya_shm) }}</td>
                                            <td>{{ $item->cara_pembayaran }}</td>
                                            <td>{{ toIdr($item->total) }}</td>
                                            <td>{{ $item->catatan }}</td>
                                            <td>
                                                <!-- Button trigger modal -->
                                                <a type="button" href="{{ route('angsuran.index') }}?penjualan_id={{ $item->id }}"
                                                        class="btn btn-primary btn-sm btn-rounded waves-effect waves-light">
                                                    Lihat Angsuran
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                        
                                        </tbody>
                                    </table>
                                </div>
                                <!-- end table-responsive -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->


            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->


        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <script>document.write(new Date().getFullYear())</script>
                        © Minible.
                    </div>
                    <div class="col-sm-6">
                        <div class="text-sm-right d-none d-sm-block">
                            Crafted with <i class="mdi mdi-heart text-danger"></i> by <a href="https://themesbrand.com/"
                                                                                         target="_blank"
                                                                                         class="text-reset">Themesbrand</a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
@endsection