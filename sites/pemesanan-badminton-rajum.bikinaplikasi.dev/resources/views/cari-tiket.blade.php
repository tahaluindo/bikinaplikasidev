@extends('layouts.index')
@section('content')
    <!--about-us start -->
    <section id="home" class="about-us-2">


    </section>
    <!--about-us end -->


    <div  style="margin-top: 175px !important;"></div>
    @include('components.pencarian')


    <section id="pack" class="packages">
        <div class="container">
            <div class="gallary-header text-center">
                <h2>
                    Hasil Pencarian
                </h2>
                <p>
                    @if($tikets->count())
                        Telah ditemukan sebanyak {{ $tikets->count() }} data.
                    @else
                        Pencarianmu tidak ditemukan, gunakan pilihan yang lain pencarian yang lain.
                    @endif
                </p>
            </div>
            <div class="packages-content">
                <div class="row">

                    @foreach($tikets as $item)
                        <div class="col-md-4 col-sm-6">
                            <div class="single-package-item">
                                <img src="{{ url($item->mobil->gambar ?? "image/no_image.png") }}" alt="package-place"
                                     width="370"
                                     height="300">
                                <div class="single-package-item-txt">
                                    <h3>{{ $item->mobil->nama }} <span
                                            class="pull-right">{{ toIdr($item->rute->biaya) }}</span></h3>
                                    <div class="packages-para">
                                        <p>
											<span>
												<i class="fa fa-angle-right"></i> 4 Kursi tersisa
											</span>
                                            <i class="fa fa-angle-right"></i> Fasilitas 1, Fasilitas 2, Fasilitas 3.
                                        </p>
                                    </div>
                                    <div class="">
                                        <p>
                                            <i class="fa fa-clock-o"></i>
                                            <span>{{ $item->jadwal->hari }} {{ $item->jadwal->jam_mulai }} - {{ $item->jadwal->jam_akhir }}</span>
                                        </p>
                                    </div>
                                    <div class="about-btn">
                                        <a href="{{ url("pembayaran-tiket/$item->id") }}">
                                            <button class="about-view packages-btn">
                                                Pesan
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
@endsection
