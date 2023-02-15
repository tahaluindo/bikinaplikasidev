@extends('layouts.app2')

@section('content')
    <div class="content-header sty-one">
        <h1>Detail Peminjaman</h1>
        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li><i class="fa fa-angle-right"></i> Detail Peminjaman</li>
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
                    <form class="form-horizontal form-material"
                          action="{{ url('/detail_peminjaman/' . $detail_peminjaman->id) }}"
                          method="post" enctype="multipart/form-data">
                        @method('put')
                        @csrf

                        @include ('detail_peminjaman.form', ['formMode' => 'edit'])
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

