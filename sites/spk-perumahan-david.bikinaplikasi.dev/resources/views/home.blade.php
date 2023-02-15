@extends('layouts.admin-lte.app')

@section('page') Dashboard @endsection

@section('content')
<div class="row">
    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-green">
            <div class="inner">
                <h3>
                    {{ $aspek_count }}
                </h3>
                <p>
                    Aspek
                </p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href="{{ url('aspek') }}" class="small-box-footer">
                Lihat <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>

    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3>
                    {{ $bobot_count }}
                </h3>
                <p>
                    Bobot
                </p>
            </div>
            <div class="icon">
                <i class="ion ion-egg"></i>
            </div>
            <a href="{{ url('bobot') }}" class="small-box-footer">
                Lihat <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>

    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-red">
            <div class="inner">
                <h3>
                    {{ $kriteria_count }}
                </h3>
                <p>
                    Kriteria
                </p>
            </div>
            <div class="icon">
                <i class="ion ion-pie-graph"></i>
            </div>
            <a href="{{ url('kriteria') }}" class="small-box-footer">
                Lihat <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>

    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-yellow">
            <div class="inner">
                <h3>
                    {{ $project_count }}
                </h3>
                <p>
                    Data Permilih Rumah
                </p>
            </div>
            <div class="icon">
                <i class="ion ion-bookmark"></i>
            </div>
            <a href="{{ url('project') }}" class="small-box-footer">
                Lihat <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
</div>
@endsection
