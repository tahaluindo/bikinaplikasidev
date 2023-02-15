@extends("layouts.monster-admin-lite.app")

@section("content")
<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Informasi</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item">Informasi</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-7">
            <div class="card">
                <div class="card-block">
                    <div class="card-header">
                        <h5>{{ $informasi->user->nama }}: {{ $informasi->judul }}</h5>
                    </div>
                    <div class="card-body pt-3">
                        <div class='row'>
                            @php $fotos = json_decode($informasi->foto); @endphp
                            <div class="col-12">
                                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                    <ol class="carousel-indicators">
                                        @foreach($fotos ?? [] as $index => $foto)
                                        <li data-target="#carouselExampleIndicators" data-slide-to="{{ $index }}"
                                            class="@if($index == 0 ) active @endif"></li>
                                        @endforeach
                                    </ol>
                                    <div class="carousel-inner">
                                        @foreach($fotos ?? [] as $index => $foto)
                                        <div class="carousel-item @if($index ==0 ) active @endif">
                                            <img class="d-block w-100" src="{{ url($foto) }}" alt="{{ $index }} slide">
                                        </div>
                                        @endforeach
                                    </div>

                                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"
                                        data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button"
                                        data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-5">
                            <div class="col-md-12">
                                {!! $informasi->deskripsi !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xs-12  col-sm-12 col-md-5">
            <div class="card">
                <div class="card-block">
                    <div class="card-header">
                        <h5>Komentar ({{ $informasi->komentars->count() }})</h5>
                    </div>
                    <div class="card-body pt-3">
                        <div class="row">
                            <div class="col-12">
                                <form class="form-horizontal form-material" action="{{ url(route('komentar.store')) }}"
                                    method="post" enctype="multipart/form-data">
                                    @csrf

                                    <input type="hidden" value="{{ $informasi->id }}" name='informasi_id'>

                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <textarea style="height: 100px !important;"
                                                class="form-control form-control-line @error('isi') is-invalid @enderror"
                                                name='isi' @if(in_array(auth()->user()->level, ['admin', ''])) disabled @endif>{{ old('isi') }}</textarea>

                                            @error('isi')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button class="btn btn-primary btn-block" type="submit" @if(in_array(auth()->user()->level, ['admin', ''])) disabled @endif>
                                                <i class='fa fa-comment'></i>
                                                Beri Komentar
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            @foreach($informasi->komentars as $komentar)
                            <div class="col-12">
                                <div class="comment-widgets">
                                    <div class="d-flex flex-row comment-row m-t-0">
                                        <div class="p-2"><img src="{{ url(auth()->user()->foto) }}" alt="user"
                                                width="100" class="rounded-circle"></div>
                                        <div class="comment-text w-100">
                                            <h6 class="font-medium">{{ $komentar->user->nama }}</h6> <span
                                                class="m-b-15 d-block">{{ $komentar->isi }}</span>
                                            <div class="comment-footer">
                                                <span class="text-muted float-right">
                                                {{ date('d F Y h:i:s', strtotime($komentar->created_at)) }}</span>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection