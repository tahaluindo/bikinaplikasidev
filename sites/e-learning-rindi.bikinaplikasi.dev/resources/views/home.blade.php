@extends("layouts.monster-admin-lite.app")

@section('content')
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="text-themecolor m-b-0 m-t-0">Dashboard</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>
        </div>

        <div class="row">
            @if(in_array(auth()->user()->level, ['guru', 'admin']))
                <div class="col-sm-3">
                    <a href="{{ url('user?user=siswa') }}">
                        <div class="card">
                            <div class="card-block">
                                <h4 class="card-title">Siswa</h4>
                                <div class="text-right">
                                    <h2 class="font-light m-b-0"><i
                                            class="fa fa-user-o text-success"></i> {{ $siswas->count() }}
                                    </h2>
                                    <span class="text-muted">Total</span>
                                </div>

                                <div class="progress">
                                    <div class="progress-bar bg-success" role="progressbar"
                                         style="width: 100%; height: 6px;"
                                         aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endif

            <div class="col-sm-3">
                <a href="{{ url('kelas') }}">
                    <div class="card">
                        <div class="card-block">
                            <h4 class="card-title">Kelas</h4>
                            <div class="text-right">
                                <h2 class="font-light m-b-0"><i class="fa fa-institution text-success"></i>
                                    {{ $kelass->count() }}</h2>
                                <span class="text-muted">Total</span>
                            </div>

                            <div class="progress">
                                <div class="progress-bar bg-success" role="progressbar"
                                     style="width: 100%; height: 6px;"
                                     aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-sm-3">
                <a href="{{ url('test') }}">
                    <div class="card">
                        <div class="card-block">
                            <h4 class="card-title">Latihan</h4>
                            <div class="text-right">
                                <h2 class="font-light m-b-0"><i
                                        class="fa fa-book text-success"></i> {{ $latihans->count() }}
                                </h2>
                                <span class="text-muted">Total</span>
                            </div>

                            <div class="progress">
                                <div class="progress-bar bg-success" role="progressbar"
                                     style="width: 100%; height: 6px;"
                                     aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-sm-3">
                <a href="{{ url('test') }}">
                    <div class="card">
                        <div class="card-block">
                            <h4 class="card-title">Ujian</h4>
                            <div class="text-right">
                                <h2 class="font-light m-b-0"><i
                                        class="fa fa-book text-success"></i> {{ $ujians->count() }}
                                </h2>
                                <span class="text-muted">Total</span>
                            </div>

                            <div class="progress">
                                <div class="progress-bar bg-success" role="progressbar"
                                     style="width: 100%; height: 6px;"
                                     aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        {{-- <h4 class="card-title">Graphic Nilai Siswa</h4> --}}
                        <h1 class="text-center">-- Informasi --</h1>
                        <div class="row">
                            @if($informasis->count())
                                @foreach($informasis as $informasi)
                                    @php $fotos = json_decode($informasi->foto); @endphp
                                    <div class="col-sm-6 mb-5">
                                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                            <ol class="carousel-indicators">
                                                @foreach($fotos ?? [] as $index => $foto)
                                                    <li data-target="#carouselExampleIndicators"
                                                        data-slide-to="{{ $index }}"
                                                        class="@if($index == 0 ) active @endif"></li>
                                                @endforeach
                                            </ol>
                                            <div class="carousel-inner">
                                                @foreach($fotos ?? [] as $index => $foto)
                                                    <div class="carousel-item @if($index ==0 ) active @endif">
                                                        <a href="{{ route('informasi.show', $informasi->id) }}"
                                                           class="w-100">
                                                            <img class="d-block w-100" src="{{ url($foto) }}"
                                                                 alt="{{ $index }} slide" height="400">
                                                            <div
                                                                class="carousel-caption d-none d-md-block bg-white text-black-50">
                                                                <h5>{{ $informasi->user->nama }}
                                                                    : {{ $informasi->judul }}</h5>
                                                            </div>
                                                        </a>
                                                    </div>
                                                @endforeach
                                            </div>

                                            <a class="carousel-control-prev" href="#carouselExampleIndicators"
                                               role="button"
                                               data-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Previous</span>
                                            </a>
                                            <a class="carousel-control-next" href="#carouselExampleIndicators"
                                               role="button"
                                               data-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Next</span>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="col-sm-12 mb-5">
                                    <h4 class='text-center'>Tidak ada informasi yang dibuat</h4>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection