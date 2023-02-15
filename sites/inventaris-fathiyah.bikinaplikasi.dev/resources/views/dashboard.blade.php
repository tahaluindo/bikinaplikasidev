@extends('layouts.app3')

@section('content')
    <div class="page-header">
        <div class="row">
            <div class="col-md-4">
                <div class="media">
                    <div class="media-body">
                        <h4 class="page-header-title">Dashboard</h4>
                    </div>
                </div>
            </div>

        </div>
    </div>
    
    <div class="container-fluid">
        <div class="row panel-wrapper js-grid-wrapper">
            <div class="col-xs-12 col-sm-6 col-md-3 js-grid"><a href="">
                    <div class="widget widget-v bg-primary">
                        <div class="w-main w-center bg-primary-lighten"><i class="fa fa-user"></i></div>
                        <div class="w-section">
                            <div class="small">USERS</div>
                            <div class="display-6">{{ $users->count() }}</div>
                            <div class="small">KESELURUHAN</div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-3 js-grid js-sizer"><a href="">
                    <div class="widget widget-v bg-aqua">
                        <div class="w-main w-center bg-aqua-lighten"><i class="fa fa-shopping-cart"></i></div>
                        <div class="w-section">
                            <div class="small">Barang</div>
                            <div class="display-6">{{ $barangs->count() }}</div>
                            <div class="small">KESELURUHAN</div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-3 js-grid"><a href="">
                    <div class="widget widget-v bg-success">
                        <div class="w-main w-center bg-success-lighten"><i class="fa fa-cart-plus"></i></div>
                        <div class="w-section">
                            <div class="small">PEMBELIAN</div>
                            <div class="display-6">{{ toIdr($barangs->sum('nilai_perolehan')) }}</div>
                            <div class="small">KESELURUHAN</div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-3 js-grid"><a href="">
                    <div class="widget widget-v bg-warning">
                        <div class="w-main w-center bg-warning-lighten"><i class="fa fa-arrow-circle-down"></i></div>
                        <div class="w-section">
                            <div class="small">PENYUSUTAN</div>
                            <div class="display-6">{{ toIdr($penyusutans->sum('jumlah')) }}</div>
                            <div class="small">KESELURUHAN</div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-xs-12 col-md-6 js-grid">
                <div class="panel">
                    <div class="panel-body">
                        <div class="legend legend-inline" id="demo-bar-chart-legend"></div>
                        <canvas id="demo-bar-chart"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-md-6 js-grid">
                <div class="panel">
                    <div class="panel-body">
                        <div class="legend legend-inline" id="demo-bar-chart-legend"></div>
                        <canvas id="demo-doughnut-chart" style="width: 766px; height: 383px;" width="766"
                                height="383"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('dashboardchart')
    <script>
        $(document).ready(function () {
            var data = {
                labels: ['User', 'Jenis', 'Satuan', 'Barang', 'Pembelian'],
                datasets: [
                    {
                        label: "New",
                        fillColor: "#66BAB7",
                        strokeColor: "#66BAB7",
                        highlightFill: "rgba(102, 186, 183,.5)",
                        highlightStroke: "rgba(102, 186, 183,.5)",
                        data: [{{ $users->count() }}, {{ $jenis->count() }}, {{ $satuans->count() }}, {{ $barangs->count() }}, {{ $pembelians->count() }}]
                    }
                ]
            };
            var options =
                {
                    //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
                    scaleBeginAtZero: true,

                    //Boolean - Whether grid lines are shown across the chart
                    scaleShowGridLines: true,

                    //String - Colour of the grid lines
                    scaleGridLineColor: "rgba(0,0,0,.05)",

                    //Number - Width of the grid lines
                    scaleGridLineWidth: 1,

                    //Boolean - Whether to show horizontal lines (except X axis)
                    scaleShowHorizontalLines: true,

                    //Boolean - Whether to show vertical lines (except Y axis)
                    scaleShowVerticalLines: true,

                    //Boolean - If there is a stroke on each bar
                    barShowStroke: false,

                    //Number - Pixel width of the bar stroke
                    barStrokeWidth: 0,

                    //Number - Spacing between each of the X value sets
                    barValueSpacing: 5,

                    //Number - Spacing between data sets within X values
                    barDatasetSpacing: 1,

                    legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].fillColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>"
                }
            var ctx = document.getElementById("demo-bar-chart").getContext("2d");
            var myNewChart = new Chart(ctx).Bar(data, options);
            if ($('#demo-bar-chart-legend').length) {
                $('#demo-bar-chart-legend').innerHTML = myNewChart.generateLegend();
                $('#demo-bar-chart-legend').innerHTML = myNewChart.generateLegend();
            }

        });


        $(document).ready(function () {
            var data = [
                {
                    value: {{ $barangs->count() }},
                    color: "#2EC6C7",
                    highlight: "#ccc",
                    label: "Barang"
                },
                {
                    value: {{ $pembelians->count() }},
                    color: "#54C27B",
                    highlight: "#ccc",
                    label: "Pembelian"
                },
                {
                    value: {{ $penyusutans->count() }},
                    color: "#FF5287",
                    highlight: "#ccc",
                    label: "Penyusutan"
                }
            ]
            var options =
                {
                    //Boolean - Whether we should show a stroke on each segment
                    segmentShowStroke: true,

                    //String - The colour of each segment stroke
                    segmentStrokeColor: "#fff",

                    //Number - The width of each segment stroke
                    segmentStrokeWidth: 2,

                    //Number - The percentage of the chart that we cut out of the middle
                    percentageInnerCutout: 50, // This is 0 for Pie charts

                    //Number - Amount of animation steps
                    animationSteps: 100,

                    //String - Animation easing effect
                    animationEasing: "easeOutBounce",

                    //Boolean - Whether we animate the rotation of the Doughnut
                    animateRotate: true,

                    //Boolean - Whether we animate scaling the Doughnut from the centre
                    animateScale: false,

                    //String - A legend template
                    legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>"

                }
            var ctx = document.getElementById("demo-doughnut-chart").getContext("2d");
            var myNewChart = new Chart(ctx).Doughnut(data, options);
            if ($('.demo-doughnut-chart-legend').length) {
                document.getElementById('demo-doughnut-chart-legend').innerHTML = myNewChart.generateLegend();
            }
        });

    </script>
@endsection