<section class="travel-box" id='pesan-sekarang'>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="single-travel-boxes">
                    <div id="desc-tabs" class="desc-tabs">

                        <ul class="nav nav-tabs" role="tablist">

                            <li role="presentation" class="active">
                                <a href="#tours" aria-controls="tours" role="tab" data-toggle="tab">
                                    <i class="fa fa-tree"></i>
                                    Tour
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
                                        <form action="{{ url('cari-tiket') }}" id="form-cari-tiket">
                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <div class="single-tab-select-box">

                                                    <h2>Ke lokasi mana?</h2>

                                                    <div class="travel-select-icon">
                                                        <select class="form-control " id="pilih-rute" name="rute_id"
                                                                required>

                                                            <option value="">-- PILIH RUTE --</option>

                                                            @foreach($rutes as $rute)
                                                                <option
                                                                    {{ $rute->id == request()->rute_id ? "selected" : "" }}
                                                                    value="{{ $rute->id }}">{{ $rute->dari()->nama }}
                                                                    - {{ $rute->ke()->nama }}
                                                                    ({{ toIdr($rute->biaya) }}
                                                                    )
                                                                </option>
                                                            @endforeach

                                                        </select>
                                                    </div>

                                                    <div class="travel-select-icon">
                                                        <select class="form-control " id="lokasi-tujuan"
                                                                name="lokasi_tujuan_id" required>

                                                            <option value="">-- PILIH LOKASI TUJUAN --
                                                            </option>
                                                        </select>


                                                    </div>

                                                </div>

                                            </div>

                                            <div class="col-lg-2 col-md-2 col-sm-2">
                                                <div class="single-tab-select-box">
                                                    <h2>Tanggal</h2>
                                                    <div class="travel-check-icon">
                                                        <input type="text" name="tanggal"
                                                               class="flatpickr form-control"
                                                               placeholder="{{ old('tanggal') == "" ? date('Y-m-d') : old('tanggal') }}"
                                                               required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-2 col-md-2 col-sm-2">
                                                <div class="single-tab-select-box">
                                                    <h2>Jumlah tiket</h2>
                                                    <div class="travel-select-icon">
                                                        <select class="form-control" name="jumlah_tiket" required>
                                                            @foreach(range(1, 20) as $item)
                                                                <option
                                                                    {{ $item == request()->jumlah_tiket ? "selected" : "" }}  value="{{ $item }}">{{ $item }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-2 col-md-2 col-sm-2">
                                                <div class="single-tab-select-box">
                                                    <h2>Pulang Pergi</h2>
                                                    <div class="travel-select-icon">
                                                        <select class="form-control" name="pulang_pergi" required>
                                                            <option
                                                                value="Ya" {{ request()->pulang_pergi == "Ya" ? "selected" : "" }}>
                                                                Ya
                                                            </option>
                                                            <option
                                                                value="Tidak" {{ request()->pulang_pergi == "Tidak" ? "selected" : "" }}>
                                                                Tidak
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                    <div class="row">
                                        <div class="clo-sm-7">
                                            <div class="about-btn travel-mrt-0 pull-right">
                                                <button class="about-view travel-btn" type="submit"
                                                        form="form-cari-tiket">
                                                    Cari Tiket
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div role="tabpanel" class="tab-pane fade in" id="rental-mobil">
                                <div class="tab-para">

                                    <div class="row">
                                        <form action="{{ url('cari-mobil-rental') }}" id="form-cari-rental-mobil">
                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <div class="single-tab-select-box">

                                                    <h2>Jumlah kursi mobil?</h2>

                                                    <div class="travel-select-icon">

                                                        <select class="form-control" name="jumlah_kursi_mobil">
                                                            <option value="">-- Pilih jumlah kursi --</option>

                                                            @foreach(range(4, 20, 2) as $item)
                                                                <option value="{{ $item }}">{{ $item }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="col-lg-2 col-md-2 col-sm-2">
                                                <div class="single-tab-select-box">
                                                    <h2>Dari Tggl</h2>
                                                    <div class="travel-check-icon">
                                                        <input type="text" name="dari_tanggal"
                                                               class="flatpickr form-control"
                                                               placeholder="{{ date('Y-m-d') }}"
                                                               value="{{ date('Y-m-d') }}">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-2 col-md-2 col-sm-2">
                                                <div class="single-tab-select-box">
                                                    <h2>Sampai Tggl</h2>
                                                    <div class="travel-check-icon">
                                                        <input type="text" name="sampai_tanggal"
                                                               class="flatpickr form-control"
                                                               placeholder="{{ date('Y-m-d') }}"
                                                               value="{{ now()->addDays(7)->format('Y-m-d') }}">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-2 col-md-2 col-sm-2">
                                                <div class="single-tab-select-box">
                                                    <h2>Sama Supir</h2>
                                                    <div class="travel-select-icon">
                                                        <select class="form-control" name="sama_supir">
                                                            <option value="Ya">Ya</option>
                                                            <option value="Tidak">Tidak</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                    <div class="row">
                                        <div class="clo-sm-7">
                                            <div class="about-btn travel-mrt-0 pull-right">
                                                <button class="about-view travel-btn" form="form-cari-rental-mobil">
                                                    Cari Mobil
                                                </button>
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
    </div>

</section>
