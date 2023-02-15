@extends('dokter.layout.app2')

@section('content')
    <div class="row">
        <div class="col-lg-8 p-r-0 title-margin-right">
            <div class="page-header">
                <div class="page-title">
                    <h1>Dashboard</h1>
                </div>
            </div>
        </div>
        <!-- /# column -->
        <div class="col-lg-4 p-l-0 title-margin-left">
            <div class="page-header">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="#">Dashboard</a></li>
                        <li class="active">Home</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- /# column -->
    </div>
    <!-- /# row -->
    <div class="main-content">
        <div class="row">
                <div class="col-sm-12 col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-body">

                            <section class="content">
                                <div class="container-fluid">
                                    <!-- Small boxes (Stat box) -->

                                    <div class="row">
                                        <div class="col">
                                            <div class="jumbotron shadow border bg-white">
                                                <h1 class="display-4">Hello, <b>{{ $user['nama'] }}!</b></h1>
                                                <span class="lead">Selamat datang di sistem {{ env('APP_NAME') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- /.container-fluid -->
                            </section>

                        </div>
                    </div>
                </div>
            </div>
    </div>


@endsection