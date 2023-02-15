@extends('layouts.index')
@section('content')

    <style>
    </style>

    <!--about-us start -->
    <section id="home" class="about-us-2">


    </section>
    <!--about-us end -->

    <!--travel-box start-->
    <section class="travel-box" id='pesan-sekarang' style="margin-top: 175px; margin-bottom: 175px;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="single-travel-boxes">
                        <div id="desc-tabs" class="desc-tabs">

                            <ul class="nav nav-tabs" role="tablist">

                                <li role="presentation" class="active">
                                    <a href="#tours" aria-controls="tours" role="tab" data-toggle="tab">
                                        <i class="fa fa-tree"></i>
                                        Reservasi Tiket
                                    </a>
                                </li>

                                <li role="presentation" class="">
                                    <a href="#pemesanan-paket" aria-controls="pemesanan-paket" role="tab"
                                       data-toggle="tab">
                                        <i class="fa fa-tree"></i>
                                        Pemesanan Paket
                                    </a>
                                </li>

                                <li role="presentation" class="">
                                    <a href="#rental-mobil" aria-controls="rental-mobil" role="tab" data-toggle="tab">
                                        <i class="fa fa-tree"></i>
                                        Rental Mobil
                                    </a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active fade in" id="tours">
                                    <div class="tab-para">

                                        <div class="row">
                                            @forelse($reservasi_tikets as $item)
                                                <div class="col-md-4 col-sm-4">
                                                    <div class="single-package-item"
                                                         style="font-size: 16px !important;">
                                                        <img
                                                            src="{{ url($item->tiket->mobil->gambar != null || $item->tiket->mobil->gambar != "" ? $item->tiket->mobil->gambar : "image/no_image.png") }}"
                                                            alt="package-place"
                                                            width="370"
                                                            height="300">
                                                        <div class="single-package-item-txt">
                                                            <h3>{{ $item->tiket->mobil->nama }} <span
                                                                    class="pull-right">{{ toIdr($item->total_bayar) }}</span>
                                                            </h3>
                                                            <div class="packages-para">
                                                                <p style="font-size: 12px !important;">
                                                                    <span>
                                                                        <i class="fa fa-angle-right"></i> 4 Kursi tersisa
                                                                    </span>
                                                                    <i class="fa fa-angle-right"></i> Fasilitas 1,
                                                                    Fasilitas 2, Fasilitas 3.
                                                                </p>
                                                            </div>
                                                            <div class="">
                                                                <p style="font-size: 16px !important;">
                                                                    <i class="fa fa-clock-o"></i>
                                                                    <span>{{ $item->tiket->jadwal->hari }} {{ $item->tiket->jadwal->jam_mulai }} - {{ $item->tiket->jadwal->jam_akhir }}</span>
                                                                <p>
                                                                <p style="font-size: 16px !important;">
                                                                    <span>Status: <b>{{ $item->status }}</b></span>
                                                                <p style="font-size: 16px !important;">
                                                                    <span class="" style="display: block; ">
                                                                        <strong class="text-danger float-right">
                                                                            Exp At: {{ $item->tiket->berakhir_pada }}
                                                                        </strong>
                                                                    </span>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @empty
                                                <h3>Belum ada tiket yang dibeli</h3>
                                            @endforelse
                                        </div>
                                    </div>
                                </div>

                                <div role="tabpanel" class="tab-pane fade in" id="pemesanan-paket">
                                    <div class="tab-para">

                                        @forelse($pemesanan_pakets as $item)
                                            <div class="row">
                                                <div class="col-md-4 col-sm-6">
                                                    <div class="single-package-item">
                                                        <img
                                                            src="{{ url($item->paket->gambar ?? "image/no_image.png") }}"
                                                            alt="package-place">
                                                        <div class="single-package-item-txt">
                                                            <h3>{{ $item->paket->nama }} <span
                                                                    class="pull-right">{{ toIdr($item->paket->harga) }}</span>
                                                            </h3>
                                                            <div class="packages-para">
                                                                <p>
                                                                    @foreach(explode('#', $item->paket->benefit) as $itemBenefit)
                                                                        <span>
                                                                            <i class="fa fa-angle-right"></i> {{ $itemBenefit }}
                                                                        </span>
                                                                    @endforeach
                                                                </p>

                                                                <p style="font-size: 16px !important;">
                                                                    <span>Status: <b>{{ $item->status }}</b></span>
                                                            </div>
                                                            <div class="">
                                                                <p>
                                                                    <span>{{ $item->paket->deskripsi }}</span>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        @empty
                                            <h3>Belum ada paket yang dibeli</h3>
                                        @endforelse
                                    </div>
                                </div>

                                <div role="tabpanel" class="tab-pane fade in" id="rental-mobil">
                                    <div class="tab-para">

                                        <div class="row">
                                            @forelse($rental_mobils as $item)

                                                <div class="col-md-4 col-sm-4">
                                                    <div class="single-package-item"
                                                         style="font-size: 16px !important;">
                                                        <img
                                                            src="{{ url($item->mobil->gambar != null || $item->mobil->gambar != "" ? $item->mobil->gambar : "image/no_image.png") }}"
                                                            alt="package-place"
                                                            width="370"
                                                            height="300">
                                                        <div class="single-package-item-txt">
                                                            <h3>{{ $item->mobil->nama }} <span
                                                                    class="pull-right">{{ toIdr($item->total_bayar) }}</span>
                                                            </h3>
                                                            <div class="packages-para">
                                                                <p style="font-size: 12px !important;">
                                                                    <span>
                                                                        <i class="fa fa-angle-right"></i> {{ $item->mobil->jumlah_kursi }} Kursi
                                                                    </span>

                                                                    @foreach($item->mobil->mobil_fasilitas as $itemMobilFasilitas)
                                                                        <span>
                                                                        <i class="fa fa-angle-right"></i> {{ $itemMobilFasilitas->fasilitas->nama }}
                                                                    </span>
                                                                    @endforeach
                                                                </p>
                                                            </div>
                                                            <div class="">
                                                                <p>
                                                                    <i class="fa fa-check"></i>
                                                                    <span>{{ $item->status }}</span>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @empty
                                                <h3>Belum ada mobil yang pernah dirental</h3>
                                            @endforelse
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

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
