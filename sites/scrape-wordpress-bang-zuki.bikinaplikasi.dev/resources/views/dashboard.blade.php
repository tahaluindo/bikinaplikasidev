@extends('layouts.app')

@section('content')

    <div id="content" class="app-content">
        <h1 class="page-header mb-3">
            Dashboard
        </h1>

        <div class="row">

            <div class="col-xl-6">

                <div class="card text-white-transparent-7 mb-3 overflow-hidden">

                    <div class="card-img-overlay d-block d-lg-none bg-blue rounded"></div>


                    <div class="card-img-overlay d-none d-md-block bg-blue rounded"
                         style="background-image: url(assets/img/bg/wave-bg.png); background-position: right bottom; background-repeat: no-repeat; background-size: 100%;"></div>


                    <div class="card-img-overlay d-none d-md-block bottom-0 top-auto">
                        <div class="row">
                            <div class="col-md-8 col-xl-6"></div>
                            <div class="col-md-4 col-xl-6 mb-n2">
                                <img src="{{ url('') }}/assets/img/page/dashboard.svg" alt="" class="d-block ml-n3 mb-5"
                                     style="max-height: 310px"/>
                            </div>
                        </div>
                    </div>


                    <div class="card-body position-relative">

                        <div class="row">

                            <div class="col-md-8">

                                <div class="d-flex">
                                    <div class="mr-auto">
                                        <h5 class="text-white-transparent-8 mb-3">Penjualan Mingguan</h5>
                                        <h3 class="text-white mt-n1 mb-1">{{ toIdr($penjualan_detail_weekly->sum('total')) }}</h3>
                                        <p class="mb-1 text-white-transparent-6 text-truncate">
                                            <i class="fa fa-caret-up"></i> <b>32%</b> naik dibandingkan minggu lalu
                                        </p>
                                    </div>
                                </div>
                                <hr class="hr-transparent bg-white-transparent-2 mt-3 mb-3"/>

                                <div class="row">
                                    <div class="col-6 col-lg-5">
                                        <div class="mt-1">
                                            <i class="fa fa-fw fa-shopping-bag fs-28px text-black-transparent-5"></i>
                                        </div>
                                        <div class="mt-1">
                                            <div>Penjualan Toko</div>
                                            <div
                                                class="font-weight-600 text-white">{{ toIdr($penjualan_detail->sum('total')) }}</div>
                                        </div>
                                    </div>
                                    <div class="col-6 col-lg-5">
                                        <div class="mt-1">
                                            <i class="fa fa-fw fa-retweet fs-28px text-black-transparent-5"></i>
                                        </div>
                                        <div class="mt-1">
                                            <div>Pembelian Toko</div>
                                            <div
                                                class="font-weight-600 text-white">{{ toIdr($pembelian_detail->sum('total')) }}</div>
                                        </div>
                                    </div>
                                </div>
                                <hr class="hr-transparent bg-white-transparent-2 mt-3 mb-3"/>
                                <div class="mt-3 mb-2">
                                    <a href="{{ route('penjualan.laporan.index') }}"
                                       class="btn btn-yellow btn-rounded btn-sm pl-5 pr-5 pt-2 pb-2 fs-14px font-weight-600"><i
                                            class="fa fa-wallet mr-2 ml-n2"></i> Laporan Minggu Ini</a>
                                </div>
                            </div>


                            <div class="col-md-4 d-none d-md-block" style="min-height: 380px;"></div>

                        </div>

                    </div>

                </div>

            </div>


            <div class="col-xl-6">

                <div class="row">

                    <div class="col-sm-6">

                        <div class="card mb-3 overflow-hidden fs-13px border-0 bg-gradient-custom-orange"
                             style="min-height: 202px;">

                            <div class="card-img-overlay mb-n4 mr-n4 d-flex" style="bottom: 0; top: auto;">
                                <img src="{{ url('') }}/assets/img/icon/order.svg" alt="" class="ml-auto d-block mb-n3"
                                     style="max-height: 105px"/>
                            </div>


                            <div class="card-body position-relative">
                                <h5 class="text-white-transparent-8 mb-3 fs-16px">Total Barang Terjual</h5>
                                <h3 class="text-white mt-n1">{{ $penjualan->count() }}</h3>
                                <div class="progress bg-black-transparent-5 mb-2" style="height: 6px">
                                    <div class="progrss-bar progress-bar-striped bg-white" style="width: 80%"></div>
                                </div>
                                <div class="text-white-transparent-8 mb-4"><i class="fa fa-caret-up"></i> 16% increase
                                    <br/>bandingkan dengan minggu lalu
                                </div>
                                <div><a href="#" class="text-white d-flex align-items-center text-decoration-none">Lihat
                                        Semua<i class="fa fa-chevron-right ml-2 text-white-transparent-5"></i></a>
                                </div>
                            </div>

                        </div>


                        <div class="card mb-3 overflow-hidden fs-13px border-0 bg-gradient-custom-teal"
                             style="min-height: 202px;">

                            <div class="card-img-overlay mb-n4 mr-n4 d-flex" style="bottom: 0; top: auto;">
                                <img src="{{ url('') }}/assets/img/icon/visitor.svg" alt=""
                                     class="ml-auto d-block mb-n3"
                                     style="max-height: 105px"/>
                            </div>


                            <div class="card-body position-relative">
                                <h5 class="text-white-transparent-8 mb-3 fs-16px">Total Pembelian</h5>
                                <h3 class="text-white mt-n1">{{ $pembelian->count() }}</h3>
                                <div class="progress bg-black-transparent-5 mb-2" style="height: 6px">
                                    <div class="progrss-bar progress-bar-striped bg-white" style="width: 50%"></div>
                                </div>
                                <div class="text-white-transparent-8 mb-4"><i class="fa fa-caret-up"></i> 33% increase
                                    <br/>bandingkan dengan minggu lalu
                                </div>
                                <div><a href="#" class="text-white d-flex align-items-center text-decoration-none">Lihat
                                        Semua <i class="fa fa-chevron-right ml-2 text-white-transparent-5"></i></a>
                                </div>
                            </div>

                        </div>

                    </div>


                    <div class="col-sm-6">

                        <div class="card mb-3 overflow-hidden fs-13px border-0 bg-gradient-custom-pink"
                             style="min-height: 202px;">

                            <div class="card-img-overlay mb-n4 mr-n4 d-flex" style="bottom: 0; top: auto;">
                                <img src="{{ url('') }}/assets/img/icon/email.svg" alt="" class="ml-auto d-block mb-n3"
                                     style="max-height: 105px"/>
                            </div>


                            <div class="card-body position-relative">
                                <h5 class="text-white-transparent-8 mb-3 fs-16px">Total Barang</h5>
                                <h3 class="text-white mt-n1">{{ $barang->count() }}</h3>
                                <div class="progress bg-black-transparent-5 mb-2" style="height: 6px">
                                    <div class="progrss-bar progress-bar-striped bg-white" style="width: 80%"></div>
                                </div>
                                <div class="text-white-transparent-8 mb-4"><i class="fa fa-caret-down"></i> 5% decrease
                                    <br/>bandingkan dengan minggu lalu
                                </div>
                                <div><a href="#" class="text-white d-flex align-items-center text-decoration-none">Lihat
                                        Semua<i class="fa fa-chevron-right ml-2 text-white-transparent-5"></i></a>
                                </div>
                            </div>
                        </div>


                        <div class="card mb-3 overflow-hidden fs-13px border-0 bg-gradient-custom-indigo"
                             style="min-height: 202px;">

                            <div class="card-img-overlay mb-n4 mr-n4 d-flex" style="bottom: 0; top: auto;">
                                <img src="{{ url('') }}/assets/img/icon/browser.svg" alt=""
                                     class="ml-auto d-block mb-n3"
                                     style="max-height: 105px"/>
                            </div>


                            <div class="card-body position-relative">
                                <h5 class="text-white-transparent-8 mb-3 fs-16px">Pemasok</h5>
                                <h3 class="text-white mt-n1">{{ $pemasok->count() }}</h3>
                                <div class="progress bg-black-transparent-5 mb-2" style="height: 6px">
                                    <div class="progrss-bar progress-bar-striped bg-white" style="width: 80%"></div>
                                </div>
                                <div class="text-white-transparent-8 mb-4"><i class="fa fa-caret-up"></i> 20% increase
                                    <br/>bandingkan dengan minggu lalu
                                </div>
                                <div><a href="#" class="text-white d-flex align-items-center text-decoration-none">Lihat
                                        Semua<i class="fa fa-chevron-right ml-2 text-white-transparent-5"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-xl-6">

                <div class="card">

                    <div class="card-body">
                        <div class="d-flex align-items-center mb-2">
                            <div class="flex-grow-1">
                                <h5 class="mb-1">Transaksi</h5>
                                <div class="fs-13px">Transaksi Terakhir</div>
                            </div>
                            <a href="#">Lihat Semua</a>
                        </div>

                        <div class="table-responsive mb-n2">
                            <table class="table table-borderless mb-0">
                                <thead>
                                <tr class="text-dark">
                                    <th class="pl-0">No</th>
                                    <th>Order Details</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-right pr-0">Amount</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="pl-0">1.</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="width-40 height-40">
                                                <img src="{{ url('') }}/assets/img/icon/paypal2.svg" alt=""
                                                     class="mw-100 mh-100"/>
                                            </div>
                                            <div class="ml-3 flex-grow-1">
                                                <div class="font-weight-600 text-dark">Macbook Pro 15 inch</div>
                                                <div class="fs-13px">5 minutes ago</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center"><span class="badge bg-success-transparent-2 text-success"
                                                                  style="min-width: 60px;">Success</span></td>
                                    <td class="text-right pr-0">Rp1.699.000</td>
                                </tr>
                                <tr>
                                    <td class="pl-0">2.</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="width-40 height-40 rounded">
                                                <img src="{{ url('') }}/assets/img/icon/mastercard.svg" alt=""
                                                     class="mw-100 mh-100"/>
                                            </div>
                                            <div class="ml-3 flex-grow-1">
                                                <div class="font-weight-600 text-dark">Apple Watch 5 Series</div>
                                                <div class="fs-13px">5 minutes ago</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center"><span class="badge bg-success-transparent-2 text-success"
                                                                  style="min-width: 60px;">Success</span></td>
                                    <td class="text-right pr-0">Rp1.099.000</td>
                                </tr>
                                <tr>
                                    <td class="pl-0">3.</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="width-40 height-40 rounded">
                                                <img src="{{ url('') }}/assets/img/icon/visa.svg" alt=""
                                                     class="mw-100 mh-100"/>
                                            </div>
                                            <div class="ml-3 flex-grow-1">
                                                <div class="font-weight-600 text-dark">iPhone 11 Pro Max</div>
                                                <div class="fs-13px">12 minutes ago</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center"><span class="badge bg-warning-transparent-2 text-warning"
                                                                  style="min-width: 60px;">Pending</span></td>
                                    <td class="text-right pr-0">Rp1.099.000</td>
                                </tr>
                                <tr>
                                    <td class="pl-0">4.</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="width-40 height-40 rounded">
                                                <img src="{{ url('') }}/assets/img/icon/paypal2.svg" alt=""
                                                     class="mw-100 mh-100"/>
                                            </div>
                                            <div class="ml-3 flex-grow-1">
                                                <div class="font-weight-600 text-dark">Apple Magic Keyboard</div>
                                                <div class="fs-13px">15 minutes ago</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center"><span class="badge text-dark-transparent-5"
                                                                  style="min-width: 60px;">Cancelled</span></td>
                                    <td class="text-right pr-0">Rp1.099.000</td>
                                </tr>
                                <tr>
                                    <td class="pl-0">5.</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="width-40 height-40 rounded">
                                                <img src="{{ url('') }}/assets/img/icon/mastercard.svg" alt=""
                                                     class="mw-100 mh-100"/>
                                            </div>
                                            <div class="ml-3 flex-grow-1">
                                                <div class="font-weight-600 text-dark">iPad Pro 15 inch</div>
                                                <div class="fs-13px">15 minutes ago</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center"><span class="badge bg-success-transparent-2 text-success"
                                                                  style="min-width: 60px;">Cancelled</span></td>
                                    <td class="text-right pr-0">Rp1.099.000</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>

            </div>


            <div class="col-xl-6">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="d-flex mb-3">
                            <div class="flex-grow-1">
                                <h5 class="mb-1">Analisis Penjualan</h5>
                                <div class="fs-13px">Performa penjualan mingguan</div>
                            </div>
                            <a href="#" data-toggle="dropdown" class="text-muted"><i class="fa fa-redo"></i></a>
                        </div>
                        <div id="chart"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
