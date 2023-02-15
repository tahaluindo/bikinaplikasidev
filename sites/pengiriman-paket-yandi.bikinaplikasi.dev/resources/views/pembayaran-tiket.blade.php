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
                    Isi data pemesanan tiket
                </h2>
                <p>
                    Mohon inputkan data pesanan sesuai dengan identitas asli anda (KTP / SIM / Kartu Pelajar)
                </p>
            </div>
            <div class="packages-content">
                <div class="row">

                    <div class="col-md-4 col-md-offset-4">
                        <div class="single-package-item">
                            <img src="{{ url($tiket->gambar ?? "image/no_image.png") }}" alt="package-place" width="370"
                                 height="300">
                            <div class="single-package-item-txt">
                                <h3>{{ $tiket->mobil->nama }} <span
                                        class="pull-right">{{ toIdr($tiket->rute->biaya) }}</span></h3>
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
                                        <span>{{ $tiket->jadwal->hari }} {{ $tiket->jadwal->jam_mulai }} - {{ $tiket->jadwal->jam_akhir }}</span>
                                    </p>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

                <form method="post" action="{{ url("pembayaran-tiket/$tiket->id") }}" id="form-pembayaran-tiket"
                      enctype="multipart/form-data">
                    <div class="row" style="margin-top: 33px;">
                        <div class="col-md-6 col-md-offset-3">


                            <div class="single-tab-select-box  {{ $errors->has('name') ? 'has-error' : ''}}">
                                <h2>Jumlah Tiket</h2>
                                <div class="travel-check-icon">
                                    <div class="travel-select-icon">
                                        <select class="form-control " id="jumlah-tiket" required name="jumlah_tiket">
                                            @foreach(range(1, 20) as $item)
                                                <option value="{{ $item }}">{{ $item }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    @error('name')
                                    <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="single-tab-select-box  {{ $errors->has('name') ? 'has-error' : ''}}">
                                <h2>Pulang Pergi (Diskon: {{ toIdr($tiket->rute->diskon_pulang_pergi) }}</h2>
                                <div class="travel-check-icon">
                                    <div class="travel-select-icon">
                                        <select class="form-control" id="pulang-pergi" required name="pulang_pergi">
                                            <option value="Ya">Ya</option>
                                            <option value="Tidak">Tidak</option>
                                        </select>
                                    </div>

                                    @error('name')
                                    <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="single-tab-select-box  {{ $errors->has('name') ? 'has-error' : ''}}">
                                <h2>Total Bayar</h2>
                                <div class="travel-check-icon">
                                    <input id="total-bayar" type="text" name="total_bayar"
                                           class="form-control flatpickr-input  @error('name') is-invalid @enderror"
                                           placeholder="Total Bayar"
                                           value="{{ isset($user->name) ? $user->name : old('name') }}" required
                                           disabled>

                                    @error('name')
                                    <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="single-tab-select-box  {{ $errors->has('name') ? 'has-error' : ''}}">
                                <h2>Bukti Transfer</h2>


                                @foreach($rekenings as $item)
                                    <div>{{ $item->nama_penyedia }} - {{ $item->atas_nama }}
                                        - {{ $item->nomor_rekening }}</div>
                                @endforeach
                                <div style="margin-top: 10px;"></div>

                                <div class="travel-check-icon">
                                    <input type="file" name="bukti_transfer"
                                           class="form-control flatpickr-input  @error('name') is-invalid @enderror"
                                           placeholder="Nama pemesan"
                                           value="{{ isset($user->name) ? $user->name : old('name') }}" required>

                                    @error('name')
                                    <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="single-tab-select-box ">
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
