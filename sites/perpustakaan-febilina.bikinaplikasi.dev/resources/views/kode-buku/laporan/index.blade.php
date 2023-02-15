@extends('layouts.app2')

@section('content')
    <div class="content-header sty-one">
        <h1>Buku</h1>
        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li><i class="fa fa-angle-right"></i> Buku</li>
        </ol>
    </div>

    <div class="content">
        <div class="row">

            <div class="col-xl-6">

                @if(session()->has("error"))
                    <div class="alert alert-danger" role="alert">
                        {{ session()->get("error") }}
                    </div>
                @elseif(session()->has("success"))
                    <div class="alert alert-success" role="alert">
                        {{ session()->get("success") }}
                    </div>
                @elseif(session()->has("warning"))
                    <div class="alert alert-warning" role="alert">
                        {{ session()->get("warning") }}
                    </div>
                @endif

                <div class="info-box p-3">
                    @include('layouts.buku.laporan.index')
                </div>
            </div>
        </div>
    </div>
@endsection
