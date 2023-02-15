<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Login</title>

    <!-- Fontfaces CSS-->
    <link href="{{ url('') }}/css/font-face.css" rel="stylesheet" media="all">
    <link href="{{ url('') }}/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="{{ url('') }}/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="{{ url('') }}/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="{{ url('') }}/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{ url('') }}/css/theme.css" rel="stylesheet" media="all">

    <style>
        body {
            background-color: #F3EBF6;
            font-family: 'Ubuntu', sans-serif;
            background-image: url("{{ url(env('APP_BACKGROUND_IMAGE')) }}");
            background-size: cover;
        }
    </style>

</head>

<body>
<div class="page-wrapper">
    <div class="page-content--bge5">
        <div class="container">
            <div class="login-wrap">
                <div class="login-content">
                    <div class="login-logo">
                        <a href="#">
                            <img src="images/icon/logo.png" alt="CoolAdmin">
                        </a>

                        <p>
                    </div>
                    <div class="login-form">
                        <form action="" method="post" method="POST" action="{{ route('login') }}">
                            <div class="form-group">
                                <label>Email Address</label>
                                <input class="au-input au-input--full" type="email" name="email" placeholder="Email">

                                @error('email')
                                <span class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input class="au-input au-input--full" type="password" name="password"
                                       placeholder="Password">

                                @error('password')
                                <span class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="login-checkbox">
                                <label>
                                    <input type="checkbox">Remember Me
                                </label>

                            </div>
                            <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">Login</button>
                            <a class="au-btn au-btn--block m-b-20  au-btn--blue text-center" type="submit" href="{{ route('buku-tamu-pengunjung') }}">Buku Tamu</a>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- Jquery JS-->
{{--<script src="{{ url('') }}/vendor/jquery-3.2.1.min.js"></script>--}}
<!-- Bootstrap JS-->
{{--<script src="{{ url('') }}/vendor/bootstrap-4.1/popper.min.js"></script>--}}
{{--<script src="{{ url('') }}/vendor/bootstrap-4.1/bootstrap.min.js"></script>--}}
<!-- Vendor JS       -->
{{--<script src="{{ url('') }}/vendor/slick/slick.min.js"></script>--}}
{{--<script src="{{ url('') }}/vendor/wow/wow.min.js"></script>--}}
{{--<script src="{{ url('') }}/vendor/animsition/animsition.min.js"></script>--}}
{{--<script src="{{ url('') }}/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>--}}
{{--<script src="{{ url('') }}/vendor/counter-up/jquery.counterup.min.js"></script>--}}
{{--<script src="{{ url('') }}/vendor/circle-progress/circle-progress.min.js"></script>--}}
{{--<script src="{{ url('') }}/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>--}}
{{--<script src="{{ url('') }}/vendor/chartjs/Chart.bundle.min.js"></script>--}}
{{--<script src="{{ url('') }}/vendor/select2/select2.min.js"></script>--}}

<!-- Main JS-->
{{--<script src="js/main.js"></script>--}}


<!-- Main JS-->
<script>

    (function ($) {
        // USE STRICT
        "use strict";

        try {
            //WidgetChart 1
            var ctx = document.getElementById("widgetChart1");
            if (ctx) {
                ctx.height = 130;
                var myChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                        type: 'line',
                        datasets: [{
                            data: [78, 81, 80, 45, 34, 12, 40],
                            label: 'Dataset',
                            backgroundColor: 'rgba(255,255,255,.1)',
                            borderColor: 'rgba(255,255,255,.55)',
                        },]
                    },
                    options: {
                        maintainAspectRatio: true,
                        legend: {
                            display: false
                        },
                        layout: {
                            padding: {
                                left: 0,
                                right: 0,
                                top: 0,
                                bottom: 0
                            }
                        },
                        responsive: true,
                        scales: {
                            xAxes: [{
                                gridLines: {
                                    color: 'transparent',
                                    zeroLineColor: 'transparent'
                                },
                                ticks: {
                                    fontSize: 2,
                                    fontColor: 'transparent'
                                }
                            }],
                            yAxes: [{
                                display: false,
                                ticks: {
                                    display: false,
                                }
                            }]
                        },
                        title: {
                            display: false,
                        },
                        elements: {
                            line: {
                                borderWidth: 0
                            },
                            point: {
                                radius: 0,
                                hitRadius: 10,
                                hoverRadius: 4
                            }
                        }
                    }
                });
            }


            //WidgetChart 2
            var ctx = document.getElementById("widgetChart2");
            if (ctx) {
                ctx.height = 130;
                var myChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: ['January', 'February', 'March', 'April', 'May', 'June'],
                        type: 'line',
                        datasets: [{
                            data: [1, 18, 9, 17, 34, 22],
                            label: 'Dataset',
                            backgroundColor: 'transparent',
                            borderColor: 'rgba(255,255,255,.55)',
                        },]
                    },
                    options: {

                        maintainAspectRatio: false,
                        legend: {
                            display: false
                        },
                        responsive: true,
                        tooltips: {
                            mode: 'index',
                            titleFontSize: 12,
                            titleFontColor: '#000',
                            bodyFontColor: '#000',
                            backgroundColor: '#fff',
                            titleFontFamily: 'Montserrat',
                            bodyFontFamily: 'Montserrat',
                            cornerRadius: 3,
                            intersect: false,
                        },
                        scales: {
                            xAxes: [{
                                gridLines: {
                                    color: 'transparent',
                                    zeroLineColor: 'transparent'
                                },
                                ticks: {
                                    fontSize: 2,
                                    fontColor: 'transparent'
                                }
                            }],
                            yAxes: [{
                                display: false,
                                ticks: {
                                    display: false,
                                }
                            }]
                        },
                        title: {
                            display: false,
                        },
                        elements: {
                            line: {
                                tension: 0.00001,
                                borderWidth: 1
                            },
                            point: {
                                radius: 4,
                                hitRadius: 10,
                                hoverRadius: 4
                            }
                        }
                    }
                });
            }


            //WidgetChart 3
            var ctx = document.getElementById("widgetChart3");
            if (ctx) {
                ctx.height = 130;
                var myChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: ['January', 'February', 'March', 'April', 'May', 'June'],
                        type: 'line',
                        datasets: [{
                            data: [65, 59, 84, 84, 51, 55],
                            label: 'Dataset',
                            backgroundColor: 'transparent',
                            borderColor: 'rgba(255,255,255,.55)',
                        },]
                    },
                    options: {

                        maintainAspectRatio: false,
                        legend: {
                            display: false
                        },
                        responsive: true,
                        tooltips: {
                            mode: 'index',
                            titleFontSize: 12,
                            titleFontColor: '#000',
                            bodyFontColor: '#000',
                            backgroundColor: '#fff',
                            titleFontFamily: 'Montserrat',
                            bodyFontFamily: 'Montserrat',
                            cornerRadius: 3,
                            intersect: false,
                        },
                        scales: {
                            xAxes: [{
                                gridLines: {
                                    color: 'transparent',
                                    zeroLineColor: 'transparent'
                                },
                                ticks: {
                                    fontSize: 2,
                                    fontColor: 'transparent'
                                }
                            }],
                            yAxes: [{
                                display: false,
                                ticks: {
                                    display: false,
                                }
                            }]
                        },
                        title: {
                            display: false,
                        },
                        elements: {
                            line: {
                                borderWidth: 1
                            },
                            point: {
                                radius: 4,
                                hitRadius: 10,
                                hoverRadius: 4
                            }
                        }
                    }
                });
            }

            //WidgetChart 4
            var ctx = document.getElementById("widgetChart4");
            if (ctx) {
                ctx.height = 115;
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                        datasets: [
                            {
                                label: "Pengembalian",
                                data: [78, 81, 80, 65, 58, 75, 60, 75, 65, 60, 60, 75],
                                borderColor: "transparent",
                                borderWidth: "0",
                                backgroundColor: "rgba(255,255,255,.3)"
                            }
                        ]
                    },
                    options: {
                        maintainAspectRatio: true,
                        legend: {
                            display: false
                        },
                        scales: {
                            xAxes: [{
                                display: false,
                                categoryPercentage: 1,
                                barPercentage: 0.65
                            }],
                            yAxes: [{
                                display: false
                            }]
                        }
                    }
                });
            }

            // Recent Report
            const brandProduct = 'rgba(0,181,233,0.8)'
            const brandService = 'rgba(0,173,95,0.8)'

            var elements = 10
            var data1 = [52, 60, 55, 50, 65, 80, 57, 70, 105, 115]
            var data2 = [102, 70, 80, 100, 56, 53, 80, 75, 65, 90]

            var ctx = document.getElementById("recent-rep-chart");
            if (ctx) {
                ctx.height = 250;
                var myChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', ''],
                        datasets: [
                            {
                                label: 'Pengembalian',
                                backgroundColor: brandService,
                                borderColor: 'transparent',
                                pointHoverBackgroundColor: '#fff',
                                borderWidth: 0,
                                data: data1

                            },
                            {
                                label: 'Peminjaman',
                                backgroundColor: brandProduct,
                                borderColor: 'transparent',
                                pointHoverBackgroundColor: '#fff',
                                borderWidth: 0,
                                data: data2

                            }
                        ]
                    },
                    options: {
                        maintainAspectRatio: true,
                        legend: {
                            display: false
                        },
                        responsive: true,
                        scales: {
                            xAxes: [{
                                gridLines: {
                                    drawOnChartArea: true,
                                    color: '#f2f2f2'
                                },
                                ticks: {
                                    fontFamily: "Poppins",
                                    fontSize: 12
                                }
                            }],
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true,
                                    maxTicksLimit: 5,
                                    stepSize: 50,
                                    max: 150,
                                    fontFamily: "Poppins",
                                    fontSize: 12
                                },
                                gridLines: {
                                    display: true,
                                    color: '#f2f2f2'

                                }
                            }]
                        },
                        elements: {
                            point: {
                                radius: 0,
                                hitRadius: 10,
                                hoverRadius: 4,
                                hoverBorderWidth: 3
                            }
                        }


                    }
                });
            }

            // Percent Chart

            @if(request()->segment(1) == 'home')
            var ctx = document.getElementById("percent-chart");
            if (ctx) {
                ctx.height = 280;
                var myChart = new Chart(ctx, {
                    type: 'doughnut',
                    data: {
                        datasets: [
                            {
                                label: "Pengembalian",
                                data: [{{ $anggotas->where('jenis_kelamin', 'Laki - Laki')->count() }}, {{ $anggotas->where('jenis_kelamin', 'Perempuan')->count() }}],
                                backgroundColor: [
                                    '#00b5e9',
                                    '#fa4251'
                                ],
                                hoverBackgroundColor: [
                                    '#00b5e9',
                                    '#fa4251'
                                ],
                                borderWidth: [
                                    0, 0
                                ],
                                hoverBorderColor: [
                                    'transparent',
                                    'transparent'
                                ]
                            }
                        ],
                        labels: [
                            'Laki - Laki',
                            'Perempuan'
                        ]
                    },
                    options: {
                        maintainAspectRatio: false,
                        responsive: true,
                        cutoutPercentage: 55,
                        animation: {
                            animateScale: true,
                            animateRotate: true
                        },
                        legend: {
                            display: false
                        },
                        tooltips: {
                            titleFontFamily: "Poppins",
                            xPadding: 15,
                            yPadding: 10,
                            caretPadding: 0,
                            bodyFontSize: 16
                        }
                    }
                });
            }
            @endif
        } catch (error) {
            console.log(error);
        }


        try {

            // Recent Report 2
            const bd_brandProduct2 = 'rgba(0,181,233,0.9)'
            const bd_brandService2 = 'rgba(0,173,95,0.9)'
            const brandProduct2 = 'rgba(0,181,233,0.2)'
            const brandService2 = 'rgba(0,173,95,0.2)'

            var data3 = [52, 60, 55, 50, 65, 80, 57, 70, 105, 115]
            var data4 = [102, 70, 80, 100, 56, 53, 80, 75, 65, 90]

            var ctx = document.getElementById("recent-rep2-chart");
            if (ctx) {
                ctx.height = 230;
                var myChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', ''],
                        datasets: [
                            {
                                label: 'Pengembalian',
                                backgroundColor: brandService2,
                                borderColor: bd_brandService2,
                                pointHoverBackgroundColor: '#fff',
                                borderWidth: 0,
                                data: data3

                            },
                            {
                                label: 'Peminjaman',
                                backgroundColor: brandProduct2,
                                borderColor: bd_brandProduct2,
                                pointHoverBackgroundColor: '#fff',
                                borderWidth: 0,
                                data: data4

                            }
                        ]
                    },
                    options: {
                        maintainAspectRatio: true,
                        legend: {
                            display: false
                        },
                        responsive: true,
                        scales: {
                            xAxes: [{
                                gridLines: {
                                    drawOnChartArea: true,
                                    color: '#f2f2f2'
                                },
                                ticks: {
                                    fontFamily: "Poppins",
                                    fontSize: 12
                                }
                            }],
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true,
                                    maxTicksLimit: 5,
                                    stepSize: 50,
                                    max: 150,
                                    fontFamily: "Poppins",
                                    fontSize: 12
                                },
                                gridLines: {
                                    display: true,
                                    color: '#f2f2f2'

                                }
                            }]
                        },
                        elements: {
                            point: {
                                radius: 0,
                                hitRadius: 10,
                                hoverRadius: 4,
                                hoverBorderWidth: 3
                            },
                            line: {
                                tension: 0
                            }
                        }


                    }
                });
            }

        } catch (error) {
            console.log(error);
        }


        try {

            // Recent Report 3
            const bd_brandProduct3 = 'rgba(0,181,233,0.9)';
            const bd_brandService3 = 'rgba(0,173,95,0.9)';
            const brandProduct3 = 'transparent';
            const brandService3 = 'transparent';

            var data5 = [52, 60, 55, 50, 65, 80, 57, 115];
            var data6 = [102, 70, 80, 100, 56, 53, 80, 90];

            var ctx = document.getElementById("recent-rep3-chart");
            if (ctx) {
                ctx.height = 230;
                var myChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', ''],
                        datasets: [
                            {
                                label: 'Pengembalian',
                                backgroundColor: brandService3,
                                borderColor: bd_brandService3,
                                pointHoverBackgroundColor: '#fff',
                                borderWidth: 0,
                                data: data5,
                                pointBackgroundColor: bd_brandService3
                            },
                            {
                                label: 'Peminjaman',
                                backgroundColor: brandProduct3,
                                borderColor: bd_brandProduct3,
                                pointHoverBackgroundColor: '#fff',
                                borderWidth: 0,
                                data: data6,
                                pointBackgroundColor: bd_brandProduct3

                            }
                        ]
                    },
                    options: {
                        maintainAspectRatio: false,
                        legend: {
                            display: false
                        },
                        responsive: true,
                        scales: {
                            xAxes: [{
                                gridLines: {
                                    drawOnChartArea: true,
                                    color: '#f2f2f2'
                                },
                                ticks: {
                                    fontFamily: "Poppins",
                                    fontSize: 12
                                }
                            }],
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true,
                                    maxTicksLimit: 5,
                                    stepSize: 50,
                                    max: 150,
                                    fontFamily: "Poppins",
                                    fontSize: 12
                                },
                                gridLines: {
                                    display: false,
                                    color: '#f2f2f2'
                                }
                            }]
                        },
                        elements: {
                            point: {
                                radius: 3,
                                hoverRadius: 4,
                                hoverBorderWidth: 3,
                                backgroundColor: '#333'
                            }
                        }


                    }
                });
            }

        } catch (error) {
            console.log(error);
        }

        try {
            //WidgetChart 5
            var ctx = document.getElementById("widgetChart5");
            if (ctx) {
                ctx.height = 220;
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                        datasets: [
                            {
                                label: "Pengembalian",
                                data: [78, 81, 80, 64, 65, 80, 70, 75, 67, 85, 66, 68],
                                borderColor: "transparent",
                                borderWidth: "0",
                                backgroundColor: "#ccc",
                            }
                        ]
                    },
                    options: {
                        maintainAspectRatio: true,
                        legend: {
                            display: false
                        },
                        scales: {
                            xAxes: [{
                                display: false,
                                categoryPercentage: 1,
                                barPercentage: 0.65
                            }],
                            yAxes: [{
                                display: false
                            }]
                        }
                    }
                });
            }

        } catch (error) {
            console.log(error);
        }

        try {

            // Percent Chart 2
            var ctx = document.getElementById("percent-chart2");
            if (ctx) {
                ctx.height = 209;
                var myChart = new Chart(ctx, {
                    type: 'doughnut',
                    data: {
                        datasets: [
                            {
                                label: "Pengembalian",
                                data: [60, 40],
                                backgroundColor: [
                                    '#00b5e9',
                                    '#fa4251'
                                ],
                                hoverBackgroundColor: [
                                    '#00b5e9',
                                    '#fa4251'
                                ],
                                borderWidth: [
                                    0, 0
                                ],
                                hoverBorderColor: [
                                    'transparent',
                                    'transparent'
                                ]
                            }
                        ],
                        labels: [
                            'Products',
                            'Services'
                        ]
                    },
                    options: {
                        maintainAspectRatio: false,
                        responsive: true,
                        cutoutPercentage: 87,
                        animation: {
                            animateScale: true,
                            animateRotate: true
                        },
                        legend: {
                            display: false,
                            position: 'bottom',
                            labels: {
                                fontSize: 14,
                                fontFamily: "Poppins,sans-serif"
                            }

                        },
                        tooltips: {
                            titleFontFamily: "Poppins",
                            xPadding: 15,
                            yPadding: 10,
                            caretPadding: 0,
                            bodyFontSize: 16,
                        }
                    }
                });
            }

        } catch (error) {
            console.log(error);
        }

        try {
            //Sales chart
            var ctx = document.getElementById("sales-chart");
            if (ctx) {
                ctx.height = 150;
                var myChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: ["2010", "2011", "2012", "2013", "2014", "2015", "2016"],
                        type: 'line',
                        defaultFontFamily: 'Poppins',
                        datasets: [{
                            label: "Foods",
                            data: [0, 30, 10, 120, 50, 63, 10],
                            backgroundColor: 'transparent',
                            borderColor: 'rgba(220,53,69,0.75)',
                            borderWidth: 3,
                            pointStyle: 'circle',
                            pointRadius: 5,
                            pointBorderColor: 'transparent',
                            pointBackgroundColor: 'rgba(220,53,69,0.75)',
                        }, {
                            label: "Electronics",
                            data: [0, 50, 40, 80, 40, 79, 120],
                            backgroundColor: 'transparent',
                            borderColor: 'rgba(40,167,69,0.75)',
                            borderWidth: 3,
                            pointStyle: 'circle',
                            pointRadius: 5,
                            pointBorderColor: 'transparent',
                            pointBackgroundColor: 'rgba(40,167,69,0.75)',
                        }]
                    },
                    options: {
                        responsive: true,
                        tooltips: {
                            mode: 'index',
                            titleFontSize: 12,
                            titleFontColor: '#000',
                            bodyFontColor: '#000',
                            backgroundColor: '#fff',
                            titleFontFamily: 'Poppins',
                            bodyFontFamily: 'Poppins',
                            cornerRadius: 3,
                            intersect: false,
                        },
                        legend: {
                            display: false,
                            labels: {
                                usePointStyle: true,
                                fontFamily: 'Poppins',
                            },
                        },
                        scales: {
                            xAxes: [{
                                display: true,
                                gridLines: {
                                    display: false,
                                    drawBorder: false
                                },
                                scaleLabel: {
                                    display: false,
                                    labelString: 'Month'
                                },
                                ticks: {
                                    fontFamily: "Poppins"
                                }
                            }],
                            yAxes: [{
                                display: true,
                                gridLines: {
                                    display: false,
                                    drawBorder: false
                                },
                                scaleLabel: {
                                    display: true,
                                    labelString: 'Value',
                                    fontFamily: "Poppins"

                                },
                                ticks: {
                                    fontFamily: "Poppins"
                                }
                            }]
                        },
                        title: {
                            display: false,
                            text: 'Normal Legend'
                        }
                    }
                });
            }


        } catch (error) {
            console.log(error);
        }

        try {

            //Team chart
            var ctx = document.getElementById("team-chart");
            if (ctx) {
                ctx.height = 150;
                var myChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: ["2010", "2011", "2012", "2013", "2014", "2015", "2016"],
                        type: 'line',
                        defaultFontFamily: 'Poppins',
                        datasets: [{
                            data: [0, 7, 3, 5, 2, 10, 7],
                            label: "Expense",
                            backgroundColor: 'rgba(0,103,255,.15)',
                            borderColor: 'rgba(0,103,255,0.5)',
                            borderWidth: 3.5,
                            pointStyle: 'circle',
                            pointRadius: 5,
                            pointBorderColor: 'transparent',
                            pointBackgroundColor: 'rgba(0,103,255,0.5)',
                        },]
                    },
                    options: {
                        responsive: true,
                        tooltips: {
                            mode: 'index',
                            titleFontSize: 12,
                            titleFontColor: '#000',
                            bodyFontColor: '#000',
                            backgroundColor: '#fff',
                            titleFontFamily: 'Poppins',
                            bodyFontFamily: 'Poppins',
                            cornerRadius: 3,
                            intersect: false,
                        },
                        legend: {
                            display: false,
                            position: 'top',
                            labels: {
                                usePointStyle: true,
                                fontFamily: 'Poppins',
                            },


                        },
                        scales: {
                            xAxes: [{
                                display: true,
                                gridLines: {
                                    display: false,
                                    drawBorder: false
                                },
                                scaleLabel: {
                                    display: false,
                                    labelString: 'Month'
                                },
                                ticks: {
                                    fontFamily: "Poppins"
                                }
                            }],
                            yAxes: [{
                                display: true,
                                gridLines: {
                                    display: false,
                                    drawBorder: false
                                },
                                scaleLabel: {
                                    display: true,
                                    labelString: 'Value',
                                    fontFamily: "Poppins"
                                },
                                ticks: {
                                    fontFamily: "Poppins"
                                }
                            }]
                        },
                        title: {
                            display: false,
                        }
                    }
                });
            }


        } catch (error) {
            console.log(error);
        }

        try {
            //bar chart
            var ctx = document.getElementById("barChart");
            if (ctx) {
                ctx.height = 200;
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    defaultFontFamily: 'Poppins',
                    data: {
                        labels: ["January", "February", "March", "April", "May", "June", "July"],
                        datasets: [
                            {
                                label: "Pengembalian",
                                data: [65, 59, 80, 81, 56, 55, 40],
                                borderColor: "rgba(0, 123, 255, 0.9)",
                                borderWidth: "0",
                                backgroundColor: "rgba(0, 123, 255, 0.5)",
                                fontFamily: "Poppins"
                            },
                            {
                                label: "Peminjaman",
                                data: [28, 48, 40, 19, 86, 27, 90],
                                borderColor: "rgba(0,0,0,0.09)",
                                borderWidth: "0",
                                backgroundColor: "rgba(0,0,0,0.07)",
                                fontFamily: "Poppins"
                            }
                        ]
                    },
                    options: {
                        legend: {
                            position: 'top',
                            labels: {
                                fontFamily: 'Poppins'
                            }

                        },
                        scales: {
                            xAxes: [{
                                ticks: {
                                    fontFamily: "Poppins"

                                }
                            }],
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true,
                                    fontFamily: "Poppins"
                                }
                            }]
                        }
                    }
                });
            }


        } catch (error) {
            console.log(error);
        }

        try {

            //radar chart
            var ctx = document.getElementById("radarChart");
            if (ctx) {
                ctx.height = 200;
                var myChart = new Chart(ctx, {
                    type: 'radar',
                    data: {
                        labels: [["Eating", "Dinner"], ["Drinking", "Water"], "Sleeping", ["Designing", "Graphics"], "Coding", "Cycling", "Running"],
                        defaultFontFamily: 'Poppins',
                        datasets: [
                            {
                                label: "Pengembalian",
                                data: [65, 59, 66, 45, 56, 55, 40],
                                borderColor: "rgba(0, 123, 255, 0.6)",
                                borderWidth: "1",
                                backgroundColor: "rgba(0, 123, 255, 0.4)"
                            },
                            {
                                label: "Peminjaman",
                                data: [28, 12, 40, 19, 63, 27, 87],
                                borderColor: "rgba(0, 123, 255, 0.7",
                                borderWidth: "1",
                                backgroundColor: "rgba(0, 123, 255, 0.5)"
                            }
                        ]
                    },
                    options: {
                        legend: {
                            position: 'top',
                            labels: {
                                fontFamily: 'Poppins'
                            }

                        },
                        scale: {
                            ticks: {
                                beginAtZero: true,
                                fontFamily: "Poppins"
                            }
                        }
                    }
                });
            }

        } catch (error) {
            console.log(error)
        }

        try {

            //line chart
            var ctx = document.getElementById("lineChart");
            if (ctx) {
                ctx.height = 150;
                var myChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: ["January", "February", "March", "April", "May", "June", "July"],
                        defaultFontFamily: "Poppins",
                        datasets: [
                            {
                                label: "Pengembalian",
                                borderColor: "rgba(0,0,0,.09)",
                                borderWidth: "1",
                                backgroundColor: "rgba(0,0,0,.07)",
                                data: [22, 44, 67, 43, 76, 45, 12]
                            },
                            {
                                label: "Peminjaman",
                                borderColor: "rgba(0, 123, 255, 0.9)",
                                borderWidth: "1",
                                backgroundColor: "rgba(0, 123, 255, 0.5)",
                                pointHighlightStroke: "rgba(26,179,148,1)",
                                data: [16, 32, 18, 26, 42, 33, 44]
                            }
                        ]
                    },
                    options: {
                        legend: {
                            position: 'top',
                            labels: {
                                fontFamily: 'Poppins'
                            }

                        },
                        responsive: true,
                        tooltips: {
                            mode: 'index',
                            intersect: false
                        },
                        hover: {
                            mode: 'nearest',
                            intersect: true
                        },
                        scales: {
                            xAxes: [{
                                ticks: {
                                    fontFamily: "Poppins"

                                }
                            }],
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true,
                                    fontFamily: "Poppins"
                                }
                            }]
                        }

                    }
                });
            }


        } catch (error) {
            console.log(error);
        }


        try {

            //doughut chart
            var ctx = document.getElementById("doughutChart");
            if (ctx) {
                ctx.height = 150;
                var myChart = new Chart(ctx, {
                    type: 'doughnut',
                    data: {
                        datasets: [{
                            data: [45, 25, 20, 10],
                            backgroundColor: [
                                "rgba(0, 123, 255,0.9)",
                                "rgba(0, 123, 255,0.7)",
                                "rgba(0, 123, 255,0.5)",
                                "rgba(0,0,0,0.07)"
                            ],
                            hoverBackgroundColor: [
                                "rgba(0, 123, 255,0.9)",
                                "rgba(0, 123, 255,0.7)",
                                "rgba(0, 123, 255,0.5)",
                                "rgba(0,0,0,0.07)"
                            ]

                        }],
                        labels: [
                            "Green",
                            "Green",
                            "Green",
                            "Green"
                        ]
                    },
                    options: {
                        legend: {
                            position: 'top',
                            labels: {
                                fontFamily: 'Poppins'
                            }

                        },
                        responsive: true
                    }
                });
            }


        } catch (error) {
            console.log(error);
        }


        try {

            //pie chart
            var ctx = document.getElementById("pieChart");
            if (ctx) {
                ctx.height = 200;
                var myChart = new Chart(ctx, {
                    type: 'pie',
                    data: {
                        datasets: [{
                            data: [45, 25, 20, 10],
                            backgroundColor: [
                                "rgba(0, 123, 255,0.9)",
                                "rgba(0, 123, 255,0.7)",
                                "rgba(0, 123, 255,0.5)",
                                "rgba(0,0,0,0.07)"
                            ],
                            hoverBackgroundColor: [
                                "rgba(0, 123, 255,0.9)",
                                "rgba(0, 123, 255,0.7)",
                                "rgba(0, 123, 255,0.5)",
                                "rgba(0,0,0,0.07)"
                            ]

                        }],
                        labels: [
                            "Green",
                            "Green",
                            "Green"
                        ]
                    },
                    options: {
                        legend: {
                            position: 'top',
                            labels: {
                                fontFamily: 'Poppins'
                            }

                        },
                        responsive: true
                    }
                });
            }


        } catch (error) {
            console.log(error);
        }

        try {

            // polar chart
            var ctx = document.getElementById("polarChart");
            if (ctx) {
                ctx.height = 200;
                var myChart = new Chart(ctx, {
                    type: 'polarArea',
                    data: {
                        datasets: [{
                            data: [15, 18, 9, 6, 19],
                            backgroundColor: [
                                "rgba(0, 123, 255,0.9)",
                                "rgba(0, 123, 255,0.8)",
                                "rgba(0, 123, 255,0.7)",
                                "rgba(0,0,0,0.2)",
                                "rgba(0, 123, 255,0.5)"
                            ]

                        }],
                        labels: [
                            "Green",
                            "Green",
                            "Green",
                            "Green"
                        ]
                    },
                    options: {
                        legend: {
                            position: 'top',
                            labels: {
                                fontFamily: 'Poppins'
                            }

                        },
                        responsive: true
                    }
                });
            }

        } catch (error) {
            console.log(error);
        }

        try {

            // single bar chart
            var ctx = document.getElementById("singelBarChart");
            if (ctx) {
                ctx.height = 150;
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ["Sun", "Mon", "Tu", "Wed", "Th", "Fri", "Sat"],
                        datasets: [
                            {
                                label: "Pengembalian",
                                data: [40, 55, 75, 81, 56, 55, 40],
                                borderColor: "rgba(0, 123, 255, 0.9)",
                                borderWidth: "0",
                                backgroundColor: "rgba(0, 123, 255, 0.5)"
                            }
                        ]
                    },
                    options: {
                        legend: {
                            position: 'top',
                            labels: {
                                fontFamily: 'Poppins'
                            }

                        },
                        scales: {
                            xAxes: [{
                                ticks: {
                                    fontFamily: "Poppins"

                                }
                            }],
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true,
                                    fontFamily: "Poppins"
                                }
                            }]
                        }
                    }
                });
            }

        } catch (error) {
            console.log(error);
        }

    })(jQuery);

</script>


</body>

</html>
