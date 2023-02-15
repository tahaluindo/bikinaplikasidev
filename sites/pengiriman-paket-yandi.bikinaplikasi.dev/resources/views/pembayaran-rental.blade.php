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
                    Isi data pemesanan
                </h2>
                <p>
                    Mohon inputkan data pesanan sesuai dengan identitas asli anda (KTP / SIM / Kartu Pelajar)
                </p>
            </div>
            <div class="packages-content">
                <div class="row">

                    <div class="col-md-4 col-md-offset-4">

                        <div class="single-package-item">
                            <img src="{{ url($mobil->gambar != "" ? $mobil->gambar : "image/no_image.png") }}"
                                 alt="package-place"
                                 width="370"
                                 height="300">
                            <div class="single-package-item-txt">
                                <h3>{{ $mobil->nama }} <span
                                        class="pull-right">{{ toIdr($mobil->biaya_rental) }}</span></h3>
                                <div class="packages-para">
                                    <p>
											<span>
												<i class="fa fa-angle-right"></i> {{ $mobil->jumlah_kursi }} Kursi
											</span>

                                        @foreach($mobil->mobil_fasilitas as $mobilMobilFasilitas)
                                            <span>
												<i class="fa fa-angle-right"></i> {{ $mobilMobilFasilitas->fasilitas->nama }}
											</span>
                                        @endforeach

                                    </p>
                                </div>
                                <div class="">
                                    <p>
                                        <i class="fa fa-check"></i>
                                        <span>{{ $mobil->status }}</span>
                                    </p>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

                <form method="post" action="{{ url("pembayaran-rental/$mobil->id") }}" id="form-pembayaran-rental" enctype="multipart/form-data">
                <div class="row" style="margin-top: 33px;">
                    <div class="col-md-6 col-md-offset-3">

                        <div class="single-tab-select-box  {{ $errors->has('dari_tanggal') ? 'has-error' : ''}}">
                            <h2>Dari Tggl</h2>
                            <div class="travel-check-icon">
                                <input type="text" name="dari_tanggal"
                                       class="flatpickr form-control"
                                       value="{{ old('dari_tanggal') == "" ? request()->dari_tanggal : old('dari_tanggal') }}" id="dari-tanggal">

                                @error('dari_tanggal')
                                <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                @enderror
                            </div>
                        </div>

                        <div class="single-tab-select-box  {{ $errors->has('sampai_tanggal') ? 'has-error' : ''}}">
                            <h2>Sampai Tggl</h2>
                            <div class="travel-check-icon">
                                <input type="text" name="sampai_tanggal"
                                       class="flatpickr form-control"
                                       value="{{ old('sampai_tanggal') == "" ? request()->sampai_tanggal : old('sampai_tanggal') }}" id="sampai-tanggal">

                                @error('sampai_tanggal')
                                <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                @enderror
                            </div>
                        </div>

                        <div class="single-tab-select-box  {{ $errors->has('pakai_supir') ? 'has-error' : ''}}">
                            <h2>Pakai Supir</h2>
                            <div class="travel-check-icon">
                                <div class="travel-select-icon">
                                    <select class="form-control " name="pakai_supir" id="pakai-supir">
                                        <option value="Ya">Ya</option>
                                        <option value="Tidak">Tidak</option>
                                    </select>
                                </div>

                                @error('pakai_supir')
                                <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                @enderror
                            </div>
                        </div>

                        <div class="single-tab-select-box  {{ $errors->has('total_bayar') ? 'has-error' : ''}}">
                            <h2>Total Bayar</h2>
                            <div class="travel-check-icon">
                                <input type="text" name="total_bayar"
                                       class="form-control flatpickr-input  @error('total_bayar') is-invalid @enderror"
                                       placeholder="Total Bayar"
                                       value="{{ old('total_bayar') == "" ? request()->total_bayar : old('total_bayar') }}" id="total-bayar">

                                @error('total_bayar')
                                <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                @enderror
                            </div>
                        </div>


                        <div class="single-tab-select-box  {{ $errors->has('bukti_transfer') ? 'has-error' : ''}}">
                            <h2>Bukti Transfer</h2>


                                @foreach($rekenings as $item)
                                    <div>{{ $item->nama_penyedia }} - {{ $item->atas_nama }} - {{ $item->nomor_rekening }}</div>
                                @endforeach
                            <div style="margin-top: 10px;"></div>

                            <div class="travel-check-icon">
                                <input type="file" name="bukti_transfer"
                                       class="form-control flatpickr-input  @error('bukti_transfer') is-invalid @enderror">

                                @error('bukti_transfer')
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
    <!--packages end-->
@endsection
