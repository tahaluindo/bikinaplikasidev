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
                                            <h4>Pemasukan Pengiriman</h4>
                                            <h3>Rp<span
                                                    class="counter">{{ toIdr($pengiriman_paket->sum('total_bayar'), ",", "") }}</span>
                                            </h3>
                                            <p>{{toIdr($pengiriman_paket->count(), ",", "") }} Pengiriman</p>
                                        </div>
                                        <div class="single_quick_activity">
                                            <h4>Jumlah Lokasi</h4>
                                            <h3><span class="counter">{{ $lokasi->count() }}</span>
                                            </h3>
                                            <p>{{ toIdr($lokasi->count(), ",", "") }} Lokasi</p>
                                        </div>
                                        <div class="single_quick_activity">
                                            <h4>Paket</h4>
                                            <h3><span class="counter">{{ $paket->count() }}</span></h3>
                                            <p>{{ $paket->count() }}
                                                Tersedia</p>
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

            </div>
        </div>
    </div>
@endsection

