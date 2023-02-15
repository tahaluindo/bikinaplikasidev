@extends('layouts.admin-lte.app')

@section('page') Dashboard @endsection

@section('content')
<div class="row">
    @if(in_array(auth()->user()->level, ['guru', 'tu']))
    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-green">
            <div class="inner">
                <h3>
                    {{ $siswas->count() }}
                </h3>
                <p>
                    Siswa
                </p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href="{{ url('user') }}" class="small-box-footer">
                Lihat <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
    @endif

    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3>
                    {{ $kelass->count() }}</h2>
                </h3>
                <p>
                    Kelas
                </p>
            </div>
            <div class="icon">
                <i class="ion ion-egg"></i>
            </div>
            <a href="{{ url('kelas') }}" class="small-box-footer">
                Lihat <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>

    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-red">
            <div class="inner">
                <h3>
                    {{ $mapels->count() }}
                </h3>
                <p>
                    Mapel
                </p>
            </div>
            <div class="icon">
                <i class="ion ion-pie-graph"></i>
            </div>
            <a href="{{ url('mapel') }}" class="small-box-footer">
                Lihat <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>

    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-yellow">
            <div class="inner">
                <h3>
                    {{ $jadwals->count() }}
                </h3>
                <p>
                    Jadwal
                </p>
            </div>
            <div class="icon">
                <i class="ion ion-bookmark"></i>
            </div>
            <a href="{{ url('jadwal') }}" class="small-box-footer">
                Lihat <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                {{-- <h4 class="card-title">Graphic Nilai Siswa</h4> --}}
                <h1 class="text-center">-- Informasi --</h1>
                <div class="row" style='height: 330px !important'>
                    @if($informasis->count())
                    @foreach($informasis as $informasi)
                    @php $fotos = json_decode($informasi->foto); @endphp
                    <div class="col-sm-6 mb-5" style='margin-bottom: 20px !important;'>
                        <div id="carouselExampleIndicators-{{ $informasi->id }}" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                @foreach($fotos ?? [] as $index => $foto)
                                <li data-target="#carouselExampleIndicators-{{ $informasi->id }}" data-slide-to="{{ $index }}"
                                    class="@if($index == 0 ) active @endif"></li>
                                @endforeach
                            </ol>
                            <div class="carousel-inner">
                                @foreach($fotos ?? [] as $index => $foto)
                                <div class="item @if($index ==0 ) active @endif">
                                    <a href="{{ route('informasi.show', $informasi->id) }}">
                                        <img class="d-block w-100" src="{{ url($foto) }}" alt="{{ $index }} slide" style='width: 100%; height: 330px !important'>
                                        <div class="carousel-caption d-none d-md-block bg-white text-black-50">
                                            <h5>{{ $informasi->user->nama }}: {{ $informasi->judul }}</h5>
                                        </div>
                                    </a>
                                </div>
                                @endforeach
                            </div>

                            <a class="left carousel-control" href="#carouselExampleIndicators-{{ $informasi->id }}" role="button"
                                data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="right carousel-control" href="#carouselExampleIndicators" role="button"
                                data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                    @endforeach
                    @else
                    <h4>Tidak ada informasi yang dibuat</h4>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection