@extends('layouts.app3')

@section('content')
    <div class="main_content_iner ">
        <div class="container-fluid plr_30 body_white_bg pt_30">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="single_element">
                        <div class="quick_activity">
                            <div class="row">
                                <div class="col-12">
                                    <div class="quick_activity_wrap">
                                        <div class="single_quick_activity">
                                            <h4>Pemasukan Tiket</h4>
                                            <h3>Rp<span
                                                    class="counter">{{ toIdr($reservasi_tiket->sum('total_bayar'), ",", "") }}</span>
                                            </h3>
                                            <p>{{toIdr($reservasi_tiket->count(), ",", "") }} Reservasi</p>
                                        </div>
                                        <div class="single_quick_activity">
                                            <h4>Pemasukan Rental</h4>
                                            <h3>Rp<span
                                                    class="counter">{{ toIdr($rental_mobil->sum('total_bayar'), ",", "") }}</span>
                                            </h3>
                                            <p>{{ toIdr($rental_mobil->count(), ",", "") }} Rental</p>
                                        </div>
                                        <div class="single_quick_activity">
                                            <h4>Jumlah Tiket</h4>
                                            <h3><span class="counter">{{ $tiket->count() }}</span></h3>
                                            <p>{{ toIdr($tiket->where('status', 'Tersedia')->count(), ",", "") }}
                                                Aktif</p>
                                        </div>
                                        <div class="single_quick_activity">
                                            <h4>Jumlah Mobil</h4>
                                            <h3><span class="counter">{{ $mobil->count() }}</span></h3>
                                            <p>{{ toIdr($mobil->where('status', 'Tersedia')->count(), ",", "") }}
                                                Tersedia</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-xl-6">
                    <div class="white_box mb_30 min_430">
                        <div class="box_header ">
                            <div class="main-title">
                                <h3 class="mb-0">Rekapan Per Quartal</h3>
                            </div>
                        </div>

                        <div id="stackbar_active"></div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3 ">
                    <div class="white_box mb_30 min_430">
                        <div class="box_header  box_header_block">
                            <div class="main-title">
                                <h3 class="mb-0">% Penjualan Tiket</h3>
                            </div>
                        </div>
                        <div id="radial_2"></div>
                        <div class="radial_footer">
                            <div class="radial_footer_inner d-flex justify-content-between">
                                <div class="left_footer">
                                    <h5><span style="background-color: #EDECFE;"></span> Bulan Lalu</h5>
                                    <p>{{ toIdr($reservasi_tiket->whereBetween('created_at', [now()->addMonths(-1)->format("Y-m-01"), now()->addMonths(-1)->format("Y-m-31")])->sum('jumlah'), '.', "") }}</p>
                                </div>
                                <div class="left_footer">
                                    <h5><span style="background-color: #A4A1FB;"></span> Bulan Ini</h5>
                                    <p>{{ toIdr($reservasi_tiket->whereBetween('created_at', [now()->format("Y-m-01"), now()->format("Y-m-31")])->sum('jumlah'), '.', "") }}</p>
                                </div>
                            </div>
                            <div class="radial_bottom">
                                <p><a href="{{ url(route('reservasi-tiket.laporan.index')) }}">Lihat Laporan</a></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="white_box min_430">
                        <div class="box_header  box_header_block">
                            <div class="main-title">
                                <h3 class="mb-0">% Rental Mobil</h3>
                            </div>
                        </div>
                        <div id="radial_1"></div>
                        <div class="radial_footer">
                            <div class="radial_footer_inner d-flex justify-content-between">
                                <div class="left_footer">
                                    <h5><span style="background-color: #EDECFE;"></span> Bulan Lalu</h5>
                                    <p>{{ toIdr($rental_mobil->whereBetween('created_at', [now()->addMonths(-1)->format("Y-m-01"), now()->addMonths(-1)->format("Y-m-31")])->count(), '.', "") }}</p>
                                </div>
                                <div class="left_footer">
                                    <h5><span style="background-color: #A4A1FB;"></span> Bulan Ini</h5>
                                    <p>{{ toIdr($rental_mobil->whereBetween('created_at', [now()->format("Y-m-01"), now()->format("Y-m-31")])->count(), '.', "") }}</p>
                                </div>
                            </div>
                            <div class="radial_bottom">
                                <p><a href="{{ url(route('rental-mobil.laporan.index')) }}">Lihat Laporan</a></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-xl-6">
                    <div class="white_box mb_30 min_400 ">
                        <div class="box_header  box_header_block">
                            <div class="main-title">
                                <h3 class="mb-0">Grafik Pengembalian</h3>
                            </div>
                            <div class="legend_style mt-10">
                                <li><span></span> This Month</li>
                                <li class="inactive"><span></span> Avarage</li>
                            </div>
                        </div>
                        <div class="title_btn">
                            <ul>
                                <li><a class="active" href="{{ url('') }}/#">All time</a></li>
                                <li><a href="{{ url('') }}/#">This year</a></li>
                                <li><a href="{{ url('') }}/#">This week</a></li>
                                <li><a href="{{ url('') }}/#">Today</a></li>
                            </ul>
                        </div>
                        <canvas height="120px" id="sales-chart"></canvas>
                    </div>
                </div>

                <div class="col-lg-6 col-xl-3">
                    <div class="white_box mb_30 min_400">
                        <div class="box_header ">
                            <div class="main-title">
                                <h3 class="mb-0">Jenis Tiket Terjual</h3>
                            </div>
                        </div>
                        <canvas height="220px" id="doughutChart"></canvas>
                        <div class="legend_style mt_10px ">
                            @foreach($tiket as $key => $item)
                            <li class="d-block"><span style="background-color: {{ $backgroundColor1[$key] }};"></span> {{ $item->nama }}</li>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-xl-3">
                    <div class="white_box mb_30 min_400">
                        <div class="box_header  box_header_block">
                            <div class="main-title">
                                <h3 class="mb-0">Jenis Mobil Dirental</h3>
                            </div>
                        </div>
                        <canvas height="220px" id="doughutChart2"></canvas>
                        <div class="legend_style legend_style_grid mt_10px">
                            @foreach($mobil as $key => $item)
                            <li class="d-block"><span style="background-color: {{ $backgroundColor2[$key] }};"></span> {{ $item->nama }}</li>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="white_box min_400">
                        <div class="box_header  box_header_block">
                            <div class="main-title">
                                <h3 class="mb-0">Grafik Laba Bersih (Tiket + Rental Mobil) per Bulan</h3>
                            </div>
                            <div class="title_info">
                                <p>{{ now()->addMonths(-6)->format("Y-M-01") }} s/d {{ now()->format("Y-M-01") }}</p>
                            </div>
                        </div>
                        <div id="area_active"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        var rental_mobil_persen = {{ toIdr($rental_mobil->whereBetween('created_at', [now()->format("Y-m-01"), now()->format("Y-m-31")])->count() / ($mobil->count() / 100), '.', "") }}
        var penjualan_tiket_persen = {{ toIdr($reservasi_tiket->whereBetween('created_at', [now()->format("Y-m-01"), now()->format("Y-m-31")])->sum('jumlah') / ($tiket->sum('jumlah') / 100), '.', "") }}

        var rekapan_per_kuartal = [{
            name: 'Reservasi Tiket',
            data: [{{ $reservasi_tiket->whereBetween('created_at', [now()->addDays(-12)->format("Y-m-01"), now()->addDays(-6)->format("Y-m-01")])->sum('jumlah') }}, {{ $reservasi_tiket->whereBetween('created_at', [now()->addDays(-6)->format("Y-m-01"), now()->format("Y-m-01")])->sum('jumlah') }}]
        }, {
            name: 'Rental Mobil',
            data: [{{ $rental_mobil->whereBetween('created_at', [now()->addDays(-12)->format("Y-m-01"), now()->addDays(-6)->format("Y-m-01")])->count() }}, {{ $reservasi_tiket->whereBetween('created_at', [now()->addDays(-6)->format("Y-m-01"), now()->format("Y-m-01")])->count() }}]
        }]

        @php
            $years = range(now()->addYears(-6)->format("Y"), now()->format("Y"));
            $grafikLabaBersihData = [];
        @endphp


        @foreach($reservasi_tiket->groupBy('year_month') as $key => $item)
        @php
            $grafikLabaBersihData[] = $item->whereBetween('created_at', [date("$key-01"), date("$key-31")])->sum('total_bayar') + $rental_mobil->whereBetween('created_at', [date("$key-01"), date("$key-31")])->sum('total_bayar');
        @endphp

        @endforeach

        @php
            $grafik_pengembalian_reservasi_tiket = [];
        @endphp

        @foreach($years as $item)
        @php
            $grafik_pengembalian_reservasi_tiket[] = $reservasi_tiket->whereBetween('created_at', [date("$item-01-01"), date("$item-12-31")])->where('refund', '>', 0)->sum('jumlah');
            $grafik_pengembalian_rental_mobil[] = $rental_mobil->whereBetween('created_at', [date("$item-01-01"), date("$item-12-31")])->where('refund', '>', '0')->count();
        @endphp

        @endforeach

        var grafik_pengembalian_reservasi_tiket = [{{ implode(",", $grafik_pengembalian_reservasi_tiket) }}]
        var grafik_pengembalian_rental_mobil = [{{ implode(",", $grafik_pengembalian_rental_mobil) }}]
        var jenis_tiket_terjual_count = [{{ implode(",", $tiket->pluck('reservasi_tikets_count')->toArray()) }}]
        var jenis_mobil_dirental_count = [{{ implode(",", $mobil->pluck('rental_mobils_count')->toArray()) }}]

        var jenis_tiket_terjual = {!! $tiket->pluck('nama')->toJson() !!}
        var jenis_mobil_dirental = {!! $mobil->pluck('nama')->toJson() !!}

        var grafik_pengembalian_tahun = {!!collect($years)->toJson()!!}

        var backgroundColor1 = {!!collect($backgroundColor1)->toJson()!!};
        var backgroundColor2 = {!!collect($backgroundColor2)->toJson()!!};

        var grafikLabaBersihData = {!!collect($grafikLabaBersihData)->toJson()!!}
        var grafikLabaBersihBulan = {!!$reservasi_tiket->groupBy('year_month')->keys()->toJson()!!}
    </script>
@endsection

