@extends('layouts.app2')

@section('page-info')
    <div class="breadcome-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="breadcome-list">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <ul class="breadcome-menu">
                                    <li><a href="{{ url('') }}/#">Home</a> <span class="bread-slash">/</span>
                                    </li>
                                    <li><span class="bread-blod">Dashboard</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="analytics-sparkle-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <div class="analytics-sparkle-line reso-mg-b-30">
                        <div class="analytics-content">
                            <h5>Kriteria</h5>
                            <h2><span class="counter">{{ $kriterias->count() }}</span> <span
                                    class="tuition-fees"></span></h2>
                            
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <div class="analytics-sparkle-line reso-mg-b-30 table-mg-t-pro dk-res-t-pro-30">
                        <div class="analytics-content">
                            <h5>Subkriteria</h5>
                            <h2><span class="counter">{{ $kriteria_details->count() }}</span> <span class="tuition-fees"></span>
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <div class="analytics-sparkle-line table-mg-t-pro dk-res-t-pro-30">
                        <div class="analytics-content">
                            <h5>Alternatif</h5>
                            <h2><span class="counter">{{ $alternatifs->count() }}</span> <span class="tuition-fees"></span>
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <div class="analytics-sparkle-line table-mg-t-pro dk-res-t-pro-30">
                        <div class="analytics-content">
                            <h5>Penilaian</h5>
                            <h2><span class="counter">{{ $alternatif_details->count() }}</span> <span class="tuition-fees"></span>
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <div class="analytics-sparkle-line table-mg-t-pro dk-res-t-pro-30">
                        <div class="analytics-content">
                            <h5>Perhitungan</h5>
                            <h2><span class="counter">{{ 1 }}</span> <span class="tuition-fees"></span>
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <div class="analytics-sparkle-line table-mg-t-pro dk-res-t-pro-30">
                        <div class="analytics-content">
                            <h5>Hasil Akhir</h5>
                            <h2><span class="counter">{{ 1 }}</span> <span class="tuition-fees"></span>
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="product-sales-area mg-tb-30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4 col-md-3 col-sm-3 col-xs-3">
                    <div class="library-book-area">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="single-cards-item">
                                        <div class="single-product-image">
                                            <a href="#"><img src="img/product/profile-bg.jpg" alt=""></a>
                                        </div>
                                        <div class="single-product-text">
                                            <img src="{{ url('avatar/png/001-man.png') }}" alt="">
                                            <h4><a class="cards-hd-dn" href="#">{{ auth()->user()->name }}</a></h4>
                                            <h5>{{ auth()->user()->level }}</h5>
                                            <p class="ctn-cards">{{ auth()->user()->email }}</p>
                                            <a class="follow-cards"
                                               href="{{ route('user.profile', auth()->user()->id) }}">Edit</a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
