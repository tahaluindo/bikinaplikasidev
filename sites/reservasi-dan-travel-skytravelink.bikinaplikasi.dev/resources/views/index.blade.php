@extends('layouts.index')
@section('content')
    <!--about-us start -->
    <section id="home" class="about-us">
        <div class="container">
            <div class="about-us-content">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="single-about-us">
                            <div class="about-us-txt">
                                <h2>
                                    {{ env('APP_OBJECT_NAME') }}

                                </h2>
                                <a href="#pesan-sekarang">
                                    <div class="about-btn">
                                        <button class="about-view">
                                            PESAN SEKARANG
                                        </button>
                                    </div>

                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-0">
                        <div class="single-about-us">

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!--about-us end -->

    <!--travel-box start-->
    @include('components.pencarian')
    <!--travel-box end-->

    <!--packages start-->
    <section id="paket" class="packages">
        <div class="container">
            <div class="gallary-header text-center">
                <h2>
                    Paket Spesial
                </h2>
                <p>
                    Paket terbaik sesuai kebutuhanmu!
                </p>
            </div>
            <div class="packages-content">
                <div class="row">

                    @foreach($pakets->where('spesial_offer', "Tidak") as $item)
                        <div class="col-md-4 col-sm-6">
                            <div class="single-package-item">
                                <img src="{{ url($item->gambar ?? "image/no_image.png") }}" alt="package-place">
                                <div class="single-package-item-txt">
                                    <h3>{{ $item->nama }} <span class="pull-right">{{ toIdr($item->harga) }}</span></h3>
                                    <div class="packages-para">
                                        <p>
                                            @foreach(explode('#', $item->benefit) as $itemBenefit)
                                                <span>
												    <i class="fa fa-angle-right"></i> {{ $itemBenefit }}
											    </span>
                                            @endforeach
                                        </p>
                                    </div>
                                    <div class="">
                                        <p>
                                            <span>{{ $item->deskripsi }}</span>
                                        </p>
                                    </div>
                                    <div class="about-btn">
                                        <a href="{{ url("pembayaran-paket/$item->id") }}">
                                            <button class="about-view packages-btn">
                                                PESAN !!!
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    @endforeach

                </div>
            </div>
        </div>

    </section>
    <!--packages end-->

    <!--special-offer start-->
    <section id="promo" class="special-offer">
        <div class="container">
            <div class="special-offer-content">
                <div class="row">
                    <div class="col-sm-8">
                        @foreach($pakets->where('spesial_offer', "Ya") as $item)
                            <div class="single-special-offer"
                                 style="background-image: url("{{ url($item->gambar ?? "image/no_image.png") }}")">
                            <div class="single-special-offer-txt">
                                <h2>{{ $item->nama }}</h2>
                                <div class="packages-review special-offer-review">
                                </div>
                                <div class="packages-para special-offer-para">
                                    <p>
                                        @foreach(explode('#', $item->benefit) as $itemBenefit)
                                            <span>
												    <i class="fa fa-angle-right"></i> {{ $itemBenefit }}
											    </span>
                                        @endforeach
                                    </p>
                                    <p class="offer-para">
                                        {{ $item->deskripsi }}
                                    </p>
                                </div>
                                <div class="offer-btn-group">
                                    <div class="about-btn">
                                        <a href="{{ url("pembayaran-paket/$item->id") }}">
                                            <button class="about-view packages-btn">
                                                PESAN !!!
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                    </div>
                    @endforeach
                </div>
                <div class="col-sm-4">
                    <div class="single-special-offer">
                        <div class="single-special-offer-bg">
                            <img src="{{ url('') }}/assets/images/offer/offer-shape.png" alt="offer-shape">
                        </div>
                        <div class="single-special-shape-txt">
                            <h3>Promo Spesial</h3>
                            <h4><span>{{ $item->off }}%</span><br>off</h4>
                            <p style="display: inline-block; width: 100%; text-align: center; margin-left: -20px;"><span
                                    style="font-size: 48px !important;">{{ toIdr($item->harga) }}</span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--special-offer end-->

    <!--subscribe start-->
    <section id="subs" class="subscribe">
        <div class="container">
            <div class="subscribe-title text-center">
                <h2>
                    Subscribe untuk mendapatkan penawaran spesial
                </h2>
                <p>
                    Subscribe sekarang. Kami akan mengirimkan penawaran terbaik setiap minggu
                </p>
            </div>
            <form>
                <div class="row">
                    <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                        <div class="custom-input-group">
                            <input type="email" class="form-control" placeholder="Masukkan emailmu disini">
                            <button class="appsLand-btn subscribe-btn">Subscribe</button>
                            <div class="clearfix"></div>
                            <i class="fa fa-envelope"></i>
                        </div>

                    </div>
                </div>
            </form>
        </div>

    </section>
    <!--subscribe end-->
@endsection
