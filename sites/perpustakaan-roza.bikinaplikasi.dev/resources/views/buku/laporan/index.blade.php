@extends('layouts.app3')

@section('content')
    <div class="container-fluid card">
        <div class="row">
            <div class="col-md-12">
                <div class="overview-wrap mt-3">
                    <h2 class="title-1">Buku</h2>
                </div>
            </div>
        </div>

        <div class="row ">
            <div class="col-lg-6  mt-3">
                <div class="m-b-40">
                    @include('layouts.buku.laporan.index')
                </div>
            </div>
        </div>
    </div>
@endsection

