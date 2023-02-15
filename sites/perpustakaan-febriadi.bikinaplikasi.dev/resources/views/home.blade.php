@extends('layouts.app2')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <!-- Stats -->
            <div class="outer-w3-agile col-xl">
                <div class="stat-grid p-3 d-flex align-items-center justify-content-between bg-primary">
                    <div class="s-l">
                        <h5>Peminjaman</h5>
                    </div>
                    <div class="s-r">
                        <h6>{{ $peminjamans->count() }}
                            <i class="far fa-edit"></i>
                        </h6>
                    </div>
                </div>
                <div class="stat-grid p-3 mt-3 d-flex align-items-center justify-content-between bg-success">
                    <div class="s-l">
                        <h5>Pengembalian</h5>
                    </div>
                    <div class="s-r">
                        <h6>{{ $pengembalians->count() }}
                            <i class="far fa-smile"></i>
                        </h6>
                    </div>
                </div>
                <div class="stat-grid p-3 mt-3 d-flex align-items-center justify-content-between bg-danger">
                    <div class="s-l">
                        <h5>User</h5>
                    </div>
                    <div class="s-r">
                        <h6>{{ $users->count() }}
                            <i class="fas fa-tasks"></i>
                        </h6>
                    </div>
                </div>
                <div class="stat-grid p-3 mt-3 d-flex align-items-center justify-content-between bg-warning">
                    <div class="s-l">
                        <h5>Anggota</h5>
                    </div>
                    <div class="s-r">
                        <h6>{{ $anggotas->count() }}
                            <i class="fas fa-users"></i>
                        </h6>
                    </div>
                </div>
            </div>
            <!--// Stats -->
            <!-- Pie-chart -->
            <div class="outer-w3-agile col-xl ml-xl-3 mt-xl-0 mt-3">
                <h4 class="tittle-w3-agileits mb-4">Grafik Peminjaman & Pengembalian</h4>
                <div id="chartdiv"></div>
            </div>
        </div>
    </div>
@endsection

@section('dashboard-script')
    <script>
        var d = new Date();
        simplyCountdown('simply-countdown-custom', {
            year: d.getFullYear(),
            month: d.getMonth() + 2,
            day: 25
        });
    </script>
    <!--// Count-down -->

    <!-- pie-chart -->
    <script src='js/amcharts.js'></script>
    <script>
        var chart;
        var legend;

        var chartData = [{
            country: "Peminjaman",
            value: {{ $peminjamans->count() }}
        },
            {
                country: "Pengembalian",
                value: {{ $pengembalians->count() }}
            },
        ];

        AmCharts.ready(function () {
            // PIE CHART
            chart = new AmCharts.AmPieChart();
            chart.dataProvider = chartData;
            chart.titleField = "country";
            chart.valueField = "value";
            chart.outlineColor = "";
            chart.outlineAlpha = 0.8;
            chart.outlineThickness = 2;
            // this makes the chart 3D
            chart.depth3D = 20;
            chart.angle = 30;

            // WRITE
            chart.write("chartdiv");
        });
    </script>
    <!--// pie-chart -->
@endsection
