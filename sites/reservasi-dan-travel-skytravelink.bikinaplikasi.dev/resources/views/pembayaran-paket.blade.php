@extends('layouts.index')
@section('content')
    <!--about-us start -->
    <section id="home" class="about-us-2">


    </section>
    <!--about-us end -->

    <!--packages start-->
    <section id="pack" class="packages">
        <div class="container">
            <div class="gallary-header text-center">
                <h2>
                    Isi data pemesanan paket
                </h2>
                <p>
                    Mohon inputkan data pesanan sesuai dengan identitas asli anda (KTP / SIM / Kartu Pelajar)
                </p>
            </div>
            <div class="packages-content">
                <div class="row">

                    <div class="col-md-4 col-md-offset-4">
                        <div class="single-package-item">
                            <img src="{{ url($paket->gambar ?? "image/no_image.png") }}" alt="package-place">
                            <div class="single-package-item-txt">
                                <h3>{{ $paket->nama }} <span class="pull-right">{{ toIdr($paket->harga) }}</span></h3>
                                <div class="packages-para">
                                    <p>
                                        @foreach(explode('#', $paket->benefit) as $paketBenefit)
                                            <span>
												    <i class="fa fa-angle-right"></i> {{ $paketBenefit }}
											    </span>
                                        @endforeach
                                    </p>
                                </div>
                                <div class="">
                                    <p>
                                        <span>{{ $paket->deskripsi }}</span>
                                    </p>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

                <form method="post" action="{{ url("pembayaran-paket/$paket->id") }}" id="form-pembayaran-tiket"
                      enctype="multipart/form-data">
                    <div class="row" style="margin-top: 33px;">
                        <div class="col-md-6 col-md-offset-3">

                            <div class="single-tab-select-box">
                                <h2>Total Bayar</h2>
                                <div class="travel-check-icon">
                                    <input id="total-bayar" type="text" name="total_bayar"
                                           class="form-control flatpickr-input  @error('total_bayar') is-invalid @enderror"
                                           placeholder="Total Bayar"
                                           value="{{ toIdr($paket->harga) }}" required
                                           disabled>

                                    @error('total_bayar')
                                    <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="single-tab-select-box  {{ $errors->has('name') ? 'has-error' : ''}}">
                                <h2>Bukti Transfer</h2>

                                @foreach($rekenings as $item)
                                    <div>{{ $item->nama_penyedia }} - {{ $item->atas_nama }} - {{ $item->nomor_rekening }}</div>
                                @endforeach
                                <div style="margin-top: 10px;"></div>

                                <div class="travel-check-icon">
                                    <input type="file" name="bukti_transfer"
                                           class="form-control flatpickr-input  @error('name') is-invalid @enderror"
                                           placeholder="Nama pemesan"
                                           value="{{ isset($user->name) ? $user->name : old('name') }}" required>

                                    @error('bukti_transfer')
                                    <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="single-tab-select-box">
                                <div class="travel-check-icon">
                                    <button class="book-btn">Bayar</button>

                                </div>
                            </div>

                        </div>
                    </div>
                </form>
            </div>
        </div>

    </section>
@endsection
