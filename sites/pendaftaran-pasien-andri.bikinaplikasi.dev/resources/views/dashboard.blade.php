@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Dashboard</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-4">
            <div class="card overflow-hidden">
                <div class="bg-soft-primary">
                    <div class="row">
                        <div class="col-7">
                            <div class="text-primary p-3">
                                <h5 class="text-primary">Selamat Datang!</h5>
                                <p>{{ now()->toDateString() }}</p>
                            </div>
                        </div>
                        <div class="col-5 align-self-end">
                            <img src="{{ url('') }}/assets/images/profile-img.png" alt="" class="img-fluid">
                        </div>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="avatar-md profile-user-wid mb-4">
                                <img src="{{ url('') }}/avatar/png/001-girl.png" alt=""
                                     class="img-thumbnail rounded-circle">
                            </div>
                            <h5 class="font-size-15 text-truncate">{{ auth()->user()->name }}</h5>
                            <p class="text-muted mb-0 text-truncate">{{ auth()->user()->level }}</p>
                        </div>

                        <div class="col-sm-8">
                            <div class="pt-4">

                                <div class="mt-4">
                                    <a href="{{ route('user.profile', auth()->id()) }}"
                                       class="btn btn-primary waves-effect waves-light btn-sm">Lihat
                                        Profile <i class="mdi mdi-arrow-right ml-1"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Riwayat Berobat</h4>
                    <div class="row">
                        <div class="col-sm-6">
                            <p class="text-muted">Bulan ini</p>
                            <h3>{{ $riwayat_berobat->count() }}</h3>
                            <p class="text-muted"><span class="text-success mr-2"> 12% <i
                                        class="mdi mdi-arrow-up"></i> </span> Dari periode sebelumnya</p>

                            <div class="mt-4">
                                <a href="{{ route('riwayat_berobat.index') }}"
                                   class="btn btn-primary waves-effect waves-light btn-sm">Lihat Semua <i
                                        class="mdi mdi-arrow-right ml-1"></i></a>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mt-4 mt-sm-0">
                                <div id="radialBar-chart" class="apex-charts"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-8">
            <div class="row">
                <div class="col-md-4">
                    <div class="card mini-stats-wid">
                        <div class="card-body">
                            <div class="media">
                                <div class="media-body">
                                    <p class="text-muted font-weight-medium">Pasien</p>
                                    <h4 class="mb-0">{{ $pasien->count() }}</h4>
                                </div>

                                <div
                                    class="mini-stat-icon avatar-sm rounded-circle bg-primary align-self-center">
                                                        <span class="avatar-title">
                                                            <i class="bx bx-copy-alt font-size-24"></i>
                                                        </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mini-stats-wid">
                        <div class="card-body">
                            <div class="media">
                                <div class="media-body">
                                    <p class="text-muted font-weight-medium">Pegawai</p>
                                    <h4 class="mb-0">{{ $pegawai->count() }}</h4>
                                </div>

                                <div
                                    class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
                                                        <span class="avatar-title rounded-circle bg-primary">
                                                            <i class="bx bx-archive-in font-size-24"></i>
                                                        </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mini-stats-wid">
                        <div class="card-body">
                            <div class="media">
                                <div class="media-body">
                                    <p class="text-muted font-weight-medium">Penyakit</p>
                                    <h4 class="mb-0">{{ $penyakit->count() }}</h4>
                                </div>

                                <div
                                    class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
                                                        <span class="avatar-title rounded-circle bg-primary">
                                                            <i class="bx bx-purchase-tag-alt font-size-24"></i>
                                                        </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4 float-sm-left">Grafik Berobat</h4>
                    <div class="float-sm-right">
                        <ul class="nav nav-pills">
                            <li class="nav-item">
                                <a class="nav-link" href="#">Minggu</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Bulan</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="#">Tahun</a>
                            </li>
                        </ul>
                    </div>
                    <div class="clearfix"></div>
                    <div id="stacked-column-chart" class="apex-charts" dir="ltr"></div>
                </div>
            </div>
        </div>
    </div>
@endsection