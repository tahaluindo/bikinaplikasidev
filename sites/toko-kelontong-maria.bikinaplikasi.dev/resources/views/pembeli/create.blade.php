@extends('layouts.app')

@section('content')
    <div class="pcoded-main-container">
        <div class="pcoded-wrapper">
            <div class="pcoded-content">
                <div class="pcoded-inner-content">
                    <div class="main-body">
                        <div class="page-wrapper">
                            <div class="page-header" style="margin-bottom: 0px;">
                                <div class="page-block">
                                    <div class="row align-items-center">
                                        <div class="col-md-12">
                                            <ul class="breadcrumb">
                                                <li class="breadcrumb-item"><a href="{{ url('') }}"><i
                                                            class="feather icon-home"></i></a></li>
                                                <li class="breadcrumb-item"><a href="#!">Pembeli</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">

                                <div class="col-xl-6 col-md-6">
                                    <div class="card table-card">
                                        <div class="card-header">
                                            <h5>Pembeli</h5>
                                        </div>
                                        <div class="card-body px-3 py-3">
                                            <div class="table-stats order-table ov-h table-responsive"
                                                 style="padding-left: 28px; padding-top: 20px;">

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

                                                <form class="form-horizontal form-material"
                                                      action="{{ url('/pembeli') }}"
                                                      method="post" enctype="multipart/form-data">
                                                    @csrf

                                                    @include ('pembeli.form', ['formMode' => 'create'])
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

