@extends('layouts.app2')

@section('content')
    <div class="content-header sty-one">
        <h1>Pengembalian</h1>
        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li><i class="fa fa-angle-right"></i> Pengembalian</li>
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
                    <form class="form-horizontal form-material" action="{{ url('/pengembalian') }}"
                          method="post" enctype="multipart/form-data">
                        @csrf

                        @include ('pengembalian.form', ['formMode' => 'create'])
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
