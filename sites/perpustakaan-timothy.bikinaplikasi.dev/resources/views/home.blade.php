@extends('layouts.matrix-admin.app')

@section('content')
<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Home</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('') }}">Home</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            @if(in_array(auth()->user()->level, ['', 'Petugas']))
            <div class="col-md-3">
                <div class="card card-hover">
                    <div class="box bg-cyan text-center">
                        <h1 class="font-light text-white"><i class="fa fa-table"></i></h1>
                        <h6>
                            <a class="text-white" href="{{ url('anggota') }}">Anggota ({{ $anggotas->count() }})</a>
                        </h6>
                    </div>
                </div>
            </div>
            @endif

            @if(in_array(auth()->user()->level, ['Admin', 'Petugas']))
            <div class="col-md-3">
                <div class="card card-hover">
                    <div class="box bg-success text-center">
                        <h1 class="font-light text-white"><i class="fa fa-table"></i></h1>
                        <a class="text-white" href="{{ url('user') }}">User ({{ $bukus->count() }})</a>
                    </div>
                </div>
            </div>
            @endif

            @if(in_array(auth()->user()->level, ['', 'Petugas']))
            <div class="col-md-3">
                <div class="card card-hover">
                    <div class="box bg-warning text-center">
                        <h1 class="font-light text-white"><i class="fa fa-table"></i></h1>
                        <a class="text-white" href="{{ url('peminjaman') }}">Peminjaman ({{ $peminjamans->count() }})</a>
                    </div>
                </div>
            </div>
            @endif

            @if(in_array(auth()->user()->level, ['', 'Petugas']))
            <div class="col-md-3">
                <div class="card card-hover">
                    <div class="box bg-danger text-center">
                        <h1 class="font-light text-white"><i class="fa fa-table"></i></h1>
                        <a class="text-white" href="{{ url('pengembalian') }}">Pengembalian ({{ $pengembalians->count() }})</a>
                    </div>
                </div>
            </div>
            @endif

        </div>
    </div>

    <footer class="footer text-center">
        All Rights Reserved by Matrix-admin. Designed and Developed by <a
            href="https://wrappixel.com">WrapPixel</a>.
    </footer>
</div>

@endsection
