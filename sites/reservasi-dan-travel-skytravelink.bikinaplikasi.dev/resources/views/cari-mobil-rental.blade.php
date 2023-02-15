@extends('layouts.index')
@section('content')
    <!--about-us start -->
    <section id="home" class="about-us-2">


    </section>
    <!--about-us end -->

    <div style="margin-top: 175px !important;"></div>

    @include('components.pencarian')


    <section id="pack" class="packages">
        <div class="container">
            <div class="gallary-header text-center">
                <h2>
                    Hasil Pencarian
                </h2>
                <p>
                    @if($mobils->count())
                        Telah ditemukan sebanyak {{ $mobils->count() }} data.
                    @else
                        Pencarianmu tidak ditemukan, gunakan pilihan yang lain pencarian yang lain.
                    @endif
                </p>
            </div>
            <div class="packages-content">
                <div class="row">

                    @foreach($mobils as $item)
                        <div class="col-md-4 col-sm-6">
                            <div class="single-package-item">
                                <img src="{{ url($item->gambar != "" ? $item->gambar : "image/no_image.png") }}"
                                     alt="package-place"
                                     width="370"
                                     height="300">
                                <div class="single-package-item-txt">
                                    <h3>{{ $item->nama }} <span
                                            class="pull-right">{{ toIdr($item->biaya_rental) }}</span></h3>
                                    <div class="packages-para">
                                        <p>
											<span>
												<i class="fa fa-angle-right"></i> {{ $item->jumlah_kursi }} Kursi
											</span>

                                            @foreach($item->mobil_fasilitas as $itemMobilFasilitas)
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
                                    <div class="about-btn">
                                        <a href="{{ url("pembayaran-rental/$item->id?" . $query) }}">
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
