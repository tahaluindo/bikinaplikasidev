@extends('layouts.app2')

@section('content')

    <!-- Page -->
    <div class="page">
        <div class="page-header h-300 mb-30">
            <div class="text-center blue-grey-800 mt-50 m-xs-0">
                <div class="font-size-50 mb-30 blue-grey-800">{{ env('APP_OBJECT_NAME') }}</div>
                <ul class="list-inline font-size-14">
                    <li class="list-inline-item">
                        <i class="icon wb-map mr-5" aria-hidden="true"></i> {{ env('APP_OBJECT_DESCRIPTION') }}
                    </li>
                </ul>
            </div>
        </div>


        <div class="page-content container-fluid">
            <div class="row" data-plugin="matchHeight" data-by-row="true">
                <div class="col-xxl-3 col-xl-4">
                    <!-- Panel Web Designer -->
                    <div class="card card-shadow">
                        <div class="card-block text-center bg-white p-40">
                            <div class="avatar avatar-100 mb-20">
                                <img src="{{ url('') }}/avatar/png/001-man.png" alt="">
                            </div>
                            <p class="font-size-20 blue-grey-700">{{ auth()->user()->name }}</p>
                            <p class="blue-grey-400 mb-20">{{ auth()->user()->level }}</p>
                            <ul class="list-inline font-size-18 mb-35">
                                <li class="list-inline-item">
                                    <a class="blue-grey-400" href="javascript:void(0)">
                                        <i class="icon bd-twitter" aria-hidden="true"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item ml-10">
                                    <a class="blue-grey-400" href="javascript:void(0)">
                                        <i class="icon bd-facebook" aria-hidden="true"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item ml-10">
                                    <a class="blue-grey-400" href="javascript:void(0)">
                                        <i class="icon bd-dribbble" aria-hidden="true"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item ml-10">
                                    <a class="blue-grey-400" href="javascript:void(0)">
                                        <i class="icon bd-instagram" aria-hidden="true"></i>
                                    </a>
                                </li>
                            </ul>
                            <a href="{{ route('user.profile', auth()->user()->id) }}"
                               class="btn btn-primary px-40">Edit</a>
                        </div>
                    </div>
                    <!-- End Panel Web Designer -->
                </div>

                <div class="col-xxl-6 col-xl-8">
                    <!-- Panel Traffic -->
                    <div class="card card-shadow example-responsive" id="widgetLinearea">
                        <div class="card-block p-30" style="min-width:480px;">
                            <div class="row pb-20" style="height:calc(100% - 322px);">
                                <div class="col-md-8 col-sm-6">
                                    <div class="blue-grey-700">TRAFFIC PEMINJAMAN</div>
                                </div>
                                <div class="col-md-4 col-sm-6">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="counter counter-md">
                                                <div class="counter-number-group text-nowrap">
                                                    <span class="counter-number">76</span>
                                                    <span class="counter-number-related">%</span>
                                                </div>
                                                <div class="counter-label blue-grey-400">Peminjaman</div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="counter counter-md">
                                                <div class="counter-number-group text-nowrap">
                                                    <span class="counter-number">24</span>
                                                    <span class="counter-number-related">%</span>
                                                </div>
                                                <div class="counter-label blue-grey-400">Pengembalian</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="ct-chart mb-30" style="height:270px;"></div>
                            <ul class="list-inline text-center mb-0">
                                <li class="list-inline-item">
                                    <i class="icon wb-large-point blue-200 mr-10" aria-hidden="true"></i> Peminjaman
                                </li>
                                <li class="list-inline-item ml-35">
                                    <i class="icon wb-large-point teal-200 mr-10" aria-hidden="true"></i> Pengembalian
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- End Panel Traffic -->
                </div>

                <div class="col-xxl-3">
                    <div class="row h-full">
                        <div class="col-xxl-12 col-lg-6 h-p50 h-only-lg-p100 h-only-xl-p100">
                            <!-- Panel Overall Sales -->
                            <div class="card card-shadow card-inverse bg-blue-600 white">
                                <div class="card-block p-30">
                                    <div class="counter counter-lg counter-inverse text-left">
                                        <div class="counter-label mb-20">
                                            <div>TOTAL BUKU</div>
                                        </div>
                                        <div class="counter-number-group mb-15">
                                            <span class="counter-number-related">></span>
                                            <span class="counter-number">14</span>
                                        </div>
                                        <div class="counter-label">
                                            <div class="progress progress-xs mb-10 bg-blue-800">
                                                <div class="progress-bar progress-bar-info bg-white" style="width: 42%"
                                                     aria-valuemax="100"
                                                     aria-valuemin="0" aria-valuenow="42" role="progressbar">
                                                    <span class="sr-only">42%</span>
                                                </div>
                                            </div>
                                            <div class="counter counter-sm text-left">
                                                <div class="counter-number-group">
                                                    <span class="counter-number font-size-14">42%</span>
                                                    <span
                                                        class="counter-number-related font-size-14">LEBIH TINGGI DARI BULAN SEBELUMNYA</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Panel Overall Sales -->
                        </div>

                        <div class="col-xxl-12 col-lg-6 h-p50 h-only-lg-p100 h-only-xl-p100">
                            <!-- Panel Today's Sales -->
                            <div class="card card-shadow card-inverse bg-red-600 white">
                                <div class="card-block p-30">
                                    <div class="counter counter-lg counter-inverse text-left">
                                        <div class="counter-label mb-20">
                                            <div>TOTAL KODE BUKU</div>
                                        </div>
                                        <div class="counter-number-group mb-10">
                                            <span class="counter-number-related">></span>
                                            <span class="counter-number">10</span>
                                        </div>
                                        <div class="counter-label">
                                            <div class="progress progress-xs mb-10 bg-red-800">
                                                <div class="progress-bar progress-bar-info bg-white" style="width: 70%"
                                                     aria-valuemax="100"
                                                     aria-valuemin="0" aria-valuenow="70" role="progressbar">
                                                    <span class="sr-only">70%</span>
                                                </div>
                                            </div>
                                            <div class="counter counter-sm text-left">
                                                <div class="counter-number-group">
                                                    <span class="counter-number font-size-14">70%</span>
                                                    <span
                                                        class="counter-number-related font-size-14">LEBIH TINGGI DARI BULAN SEBELUMNYA</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Panel Today's Sales -->
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
    <!-- End Page -->
@endsection

