@extends('layouts.app3')

@section('content')
    <div class="main_content_iner ">
        <div class="container-fluid  plr_30 pb_30 pt_30 body_white_bg">
            <div class="row">

                <div class="col-lg-6">
                    <h3 class="mb-0">
                        Lihat Laporan {{ ucwords(preg_replace('/[^a-zA-Z]/', ' ', \Illuminate\Support\Facades\Request::segment(1))) }}</h3>
                    <div class="mb-3"></div>

                    @include('layouts.reservasi-tiket.laporan.index')
                </div>
            </div>
        </div>
    </div>
@endsection
