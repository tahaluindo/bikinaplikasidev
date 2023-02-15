<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ env('APP_NAME') }}</title>
    <!-- ================= Favicon ================== -->
    <!-- Standard -->
    <link rel="shortcut icon" href="http://placehold.it/64.png/000/fff">
    <!-- Retina iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="144x144" href="http://placehold.it/144.png/000/fff">
    <!-- Retina iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="114x114" href="http://placehold.it/114.png/000/fff">
    <!-- Standard iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="72x72" href="http://placehold.it/72.png/000/fff">
    <!-- Standard iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="57x57" href="http://placehold.it/57.png/000/fff">
    <!-- Styles -->
    <link href="{{ url('') }}/assets/css/lib/chartist/chartist.min.css" rel="stylesheet">
    <link href="{{ url('') }}/assets/css/lib/font-awesome.min.css" rel="stylesheet">
    <link href="{{ url('') }}/assets/css/lib/themify-icons.css" rel="stylesheet">
    <link href="{{ url('') }}/assets/css/lib/owl.carousel.min.css" rel="stylesheet"/>
    <link href="{{ url('') }}/assets/css/lib/owl.theme.default.min.css" rel="stylesheet"/>
    <link href="{{ url('') }}/assets/css/lib/weather-icons.css" rel="stylesheet"/>
    <link href="{{ url('') }}/assets/css/lib/menubar/sidebar.css" rel="stylesheet">
    <link href="{{ url('') }}/assets/css/lib/bootstrap.min.css" rel="stylesheet">
    <link href="{{ url('') }}/assets/css/lib/unix.css" rel="stylesheet">
    <link href="{{ url('') }}/assets/css/style.css" rel="stylesheet">
</head>

<body class="sidebar-hide">

<div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures">
    <div class="nano">
        <div class="nano-content">
            <ul>
                <li  class="{{ Request::is('admin/index*') ? 'active' : ''}}"><a class="" href="{{ url('') }}/"><i class="ti-home"></i> Dashboard</a>
                </li>

                <li class="label">Menu</li>
                <li class="{{ Request::is('admin/dokter*') ? 'active' : ''}}">
                    <a href="{{url('admin/dokter')}}" ><i
                                class="fa fa-user-md"></i> Dokter</a>
                </li>

                <li class="{{ Request::is('admin/pegawai*') ? 'active' : ''}}">
                    <a href="{{url('admin/pegawai')}}"
                       ><i class="fa fa-user"></i>Pegawai</a>
                </li>

                <li class="{{ Request::is('admin/pasien*') ? 'active' : ''}}">
                    <a href="{{url('admin/pasien')}}" ><i
                                class="fa fa-users"></i> Pasien</a>
                </li>
                <li class="{{ Request::is('admin/periksa*') ? 'active' : ''}}">
                    <a href="{{url('admin/periksa')}}"
                       ><i
                                class="fa fa-stethoscope"></i> Rekam Medic </a>
                </li>
                <li class="{{ Request::is('admin/spesialis*') ? 'active' : ''}}">
                    <a href="{{url('admin/spesialis')}}"
                       ><i class="fa fa-star"></i> Poli
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- /# sidebar -->

<div class="header">
    <div class="pull-left">
        <div class="logo"><a href="index.html"><!-- <img src="{{ url('') }}/assets/images/logo.png" alt="" /> --><span>{{ \str_replace("App\\", "", auth()->user()->user_type) }}</span></a>
        </div>
        <div class="hamburger sidebar-toggle">
            <span class="line"></span>
            <span class="line"></span>
            <span class="line"></span>
        </div>
    </div>
    <div class="pull-right p-r-15">
        <ul>

            <li class="header-icon dib"><i class="ti-bell"></i>
                <div class="drop-down">
                    <div class="dropdown-content-heading">
                        <span class="text-left">Recent Notifications</span>
                    </div>
                    <div class="dropdown-content-body">
                        <ul>
                            <li>
                                <a href="#">
                                    <img class="pull-left m-r-10 avatar-img"
                                         src="{{ url('') }}/assets/images/avatar/3.jpg" alt=""/>
                                    <div class="notification-content">
                                        <small class="notification-timestamp pull-right">02:34 PM</small>
                                        <div class="notification-heading">Mr. Saifun</div>
                                        <div class="notification-text">5 members joined today</div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img class="pull-left m-r-10 avatar-img"
                                         src="{{ url('') }}/assets/images/avatar/3.jpg" alt=""/>
                                    <div class="notification-content">
                                        <small class="notification-timestamp pull-right">02:34 PM</small>
                                        <div class="notification-heading">Mariam</div>
                                        <div class="notification-text">likes a photo of you</div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img class="pull-left m-r-10 avatar-img"
                                         src="{{ url('') }}/assets/images/avatar/3.jpg" alt=""/>
                                    <div class="notification-content">
                                        <small class="notification-timestamp pull-right">02:34 PM</small>
                                        <div class="notification-heading">Tasnim</div>
                                        <div class="notification-text">Hi Teddy, Just wanted to let you ...</div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img class="pull-left m-r-10 avatar-img"
                                         src="{{ url('') }}/assets/images/avatar/3.jpg" alt=""/>
                                    <div class="notification-content">
                                        <small class="notification-timestamp pull-right">02:34 PM</small>
                                        <div class="notification-heading">Ishrat Jahan</div>
                                        <div class="notification-text">Hi Teddy, Just wanted to let you ...</div>
                                    </div>
                                </a>
                            </li>
                            <li class="text-center">
                                <a href="#" class="more-link">See All</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </li>

            <li class="header-icon dib"><img class="avatar-img" src="{{ url('') }}/assets/images/avatar/1.jpg" alt=""/>
                <span class="user-avatar">{{ auth()->user()->user->nama }} <i class="ti-angle-down f-s-10"></i></span>
                <div class="drop-down dropdown-profile">
                    <div class="dropdown-content-heading">
                        <span class="text-left">username: {{ auth()->user()->username }}</span>
                    </div>
                    <div class="dropdown-content-body">
                        <ul>
                            <li><a href="#"><i class="ti-user"></i> <span>Profile</span></a></li>
                            <li><a href="#"><i class="ti-settings"></i> <span>Setting</span></a></li>
                            <li><a href="{{ url('logout') }}/"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </ul>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</div>
<div class="content-wrap">
    <div class="main">
        <div class="container-fluid">

            @if(session()->get("type") == "error")
            <div class="alert alert-danger" role="alert">
                {{ session()->get("pesan") }}
            </div>
            @elseif(session()->get("type") == "success")
            <div class="alert alert-success" role="alert">
                {{ session()->get("pesan") }}
            </div>
            @elseif(session()->get("type") == "warning")
            <div class="alert alert-warning" role="alert">
                {{ session()->get("pesan") }}
            </div>
            @endif

            @yield('content')

        </div>
        <!-- /# container-fluid -->
    </div>
    <!-- /# main -->
</div>
<!-- /# content wrap -->

<!-- jquery vendor -->
<script src="{{ url('') }}/assets/js/lib/jquery.min.js"></script>
<script src="{{ url('') }}/assets/js/lib/jquery.nanoscroller.min.js"></script>
<!-- nano scroller -->
<script src="{{ url('') }}/assets/js/lib/menubar/sidebar.js"></script>
<script src="{{ url('') }}/assets/js/lib/preloader/pace.min.js"></script>
<!-- sidebar -->
<script src="{{ url('') }}/assets/js/lib/bootstrap.min.js"></script>
<!-- bootstrap -->
<script src="{{ url('') }}/assets/js/lib/mmc-common.js"></script>
<script src="{{ url('') }}/assets/js/lib/mmc-chat.js"></script>
<!--  Chart js -->
<script src="{{ url('') }}/assets/js/lib/chart-js/Chart.bundle.js"></script>
<script src="{{ url('') }}/assets/js/lib/chart-js/chartjs-init.js"></script>
<!-- // Chart js -->

<!--  Datamap -->
<script src="{{ url('') }}/assets/js/lib/datamap/d3.min.js"></script>
<script src="{{ url('') }}/assets/js/lib/datamap/topojson.js"></script>
<script src="{{ url('') }}/assets/js/lib/datamap/datamaps.world.min.js"></script>
<script src="{{ url('') }}/assets/js/lib/datamap/datamap-init.js"></script>
<!-- // Datamap -->-->
<script src="{{ url('') }}/assets/js/lib/weather/jquery.simpleWeather.min.js"></script>
<script src="{{ url('') }}/assets/js/lib/weather/weather-init.js"></script>
<script src="{{ url('') }}/assets/js/lib/owl-carousel/owl.carousel.min.js"></script>
<script src="{{ url('') }}/assets/js/lib/owl-carousel/owl.carousel-init.js"></script>
<script src="{{ url('') }}/assets/js/scripts.js"></script>
<!-- scripit init-->
</body>

</html>


{{--<!DOCTYPE html>--}}
{{--<html xmlns="http://www.w3.org/1999/xhtml">--}}

{{--<head>--}}
{{--    <meta charset="utf-8"/>--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>--}}
{{--    <meta content="" name="description"/>--}}
{{--    <meta content="Templateq" name="author"/>--}}
{{--    <title>{{ env('APP_NAME') }}</title>--}}
{{--    <!-- Bootstrap Styles-->--}}
{{--    <link href="{{ url('') }}/assets/css/bootstrap.css" rel="stylesheet"/>--}}
{{--    <!-- FontAwesome Styles-->--}}
{{--    <link href="{{ url('') }}/assets/css/font-awesome.css" rel="stylesheet"/>--}}
{{--    <!-- Morris Chart Styles-->--}}
{{--    <link href="{{ url('') }}/assets/js/morris/morris-0.4.3.min.css" rel="stylesheet"/>--}}
{{--    <!-- Custom Styles-->--}}
{{--    <link href="{{ url('') }}/assets/css/custom-styles.css" rel="stylesheet"/>--}}
{{--    <!-- Google Fonts-->--}}
{{--    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'/>--}}
{{--    <link rel="stylesheet" href="{{ url('') }}/assets/js/Lightweight-Chart/cssCharts.css">--}}
{{--</head>--}}

{{--<body>--}}
{{--<div id="wrapper">--}}
{{--    <nav class="navbar navbar-default top-navbar" role="navigation">--}}
{{--        <div class="navbar-header">--}}
{{--            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">--}}
{{--                <span class="sr-only">Toggle navigation</span>--}}
{{--                <span class="icon-bar"></span>--}}
{{--                <span class="icon-bar"></span>--}}
{{--                <span class="icon-bar"></span>--}}
{{--            </button>--}}
{{--            <a class="navbar-brand" href="{{ url('') }}"><strong><i class="icon fa fa-plane"></i>--}}
{{--                    {{ \str_replace("App\\", "", auth()->user()->user_type) }}</strong></a>--}}

{{--            <div id="sideNav" style="width: initial;">--}}
{{--                <i class=" fa fa-bars icon"></i>--}}
{{--                <h3 style="display: inline; margin: 0;">{{ env('APP_NAME') }}</h3>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <ul class="nav navbar-top-links navbar-right">--}}


{{--            <!-- /.dropdown -->--}}
{{--            <li class="dropdown">--}}
{{--                <a class="dropdown-toggle" data-toggle="dropdown" href="{{ url('') }}/" aria-expanded="false">--}}
{{--                    <i class="fa fa-bell fa-fw"></i> <i class="fa fa-caret-down"></i>--}}
{{--                </a>--}}
{{--                <ul class="dropdown-menu dropdown-alerts">--}}
{{--                    <li>--}}
{{--                        <a href="{{ url('') }}/">--}}
{{--                            <div>--}}
{{--                                <i class="fa fa-comment fa-fw"></i> New Comment--}}
{{--                                <span class="pull-right text-muted small">4 min</span>--}}
{{--                            </div>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class="divider"></li>--}}
{{--                    <li>--}}
{{--                        <a href="{{ url('') }}/">--}}
{{--                            <div>--}}
{{--                                <i class="fa fa-twitter fa-fw"></i> 3 New Followers--}}
{{--                                <span class="pull-right text-muted small">12 min</span>--}}
{{--                            </div>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class="divider"></li>--}}
{{--                    <li>--}}
{{--                        <a href="{{ url('') }}/">--}}
{{--                            <div>--}}
{{--                                <i class="fa fa-envelope fa-fw"></i> Message Sent--}}
{{--                                <span class="pull-right text-muted small">4 min</span>--}}
{{--                            </div>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class="divider"></li>--}}
{{--                    <li>--}}
{{--                        <a href="{{ url('') }}/">--}}
{{--                            <div>--}}
{{--                                <i class="fa fa-tasks fa-fw"></i> New Task--}}
{{--                                <span class="pull-right text-muted small">4 min</span>--}}
{{--                            </div>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class="divider"></li>--}}
{{--                    <li>--}}
{{--                        <a href="{{ url('') }}/">--}}
{{--                            <div>--}}
{{--                                <i class="fa fa-upload fa-fw"></i> Server Rebooted--}}
{{--                                <span class="pull-right text-muted small">4 min</span>--}}
{{--                            </div>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class="divider"></li>--}}
{{--                    <li>--}}
{{--                        <a class="text-center" href="{{ url('') }}/">--}}
{{--                            <strong>See All Alerts</strong>--}}
{{--                            <i class="fa fa-angle-right"></i>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--                <!-- /.dropdown-alerts -->--}}
{{--            </li>--}}
{{--            <!-- /.dropdown -->--}}
{{--            <li class="dropdown">--}}
{{--                <a class="dropdown-toggle" data-toggle="dropdown" href="{{ url('') }}/" aria-expanded="false">--}}
{{--                    <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>--}}
{{--                </a>--}}
{{--                <ul class="dropdown-menu dropdown-user">--}}
{{--                    <li><a href="{{ url('') }}/"><i class="fa fa-user fa-fw"></i> Profile</a>--}}
{{--                    </li>--}}
{{--                    <li><a href="{{ url('') }}/"><i class="fa fa-gear fa-fw"></i> Settings</a>--}}
{{--                    </li>--}}
{{--                    <li class="divider"></li>--}}
{{--                    <li><a href="{{ url('logout') }}/"><i class="fa fa-sign-out fa-fw"></i> Logout</a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--                <!-- /.dropdown-user -->--}}
{{--            </li>--}}
{{--            <!-- /.dropdown -->--}}
{{--        </ul>--}}
{{--    </nav>--}}
{{--    <!--/. NAV TOP  -->--}}
{{--    <nav class="navbar-default navbar-side" role="navigation">--}}
{{--        <div class="sidebar-collapse">--}}

{{--            <ul class="nav" id="main-menu">--}}

{{--                <li>--}}
{{--                    <a class="{{Request::is('admin/index') ? 'active-menu' : '' }}"--}}
{{--                       href="{{url('admin/index')}}"><i class="fa fa-dashboard"></i> Dashboard</a>--}}
{{--                </li>--}}

{{--                <li>--}}
{{--                    <a href="{{url('admin/dokter')}}" class="{{ Request::is('admin/dokter*') ? 'active-menu' : ''}}"><i--}}
{{--                                class="fa fa-user-md"></i> Dokter</a>--}}
{{--                </li>--}}

{{--                <li>--}}
{{--                    <a href="{{url('admin/pegawai')}}"--}}
{{--                       class="{{ Request::is('admin/pegawai*') ? 'active-menu' : ''}}"><i class="fa fa-user"></i>Pegawai</a>--}}
{{--                </li>--}}

{{--                <li>--}}
{{--                    <a href="{{url('admin/pasien')}}" class="{{ Request::is('admin/pasien*') ? 'active-menu' : ''}}"><i--}}
{{--                                class="fa fa-users"></i> Pasien</a>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <a href="{{url('admin/periksa')}}"--}}
{{--                       class="{{ Request::is('admin/periksa*') ? 'active-menu' : ''}}"><i--}}
{{--                                class="fa fa-stethoscope"></i> Rekam Medic </a>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <a href="{{url('admin/spesialis')}}"--}}
{{--                       class="{{ Request::is('admin/spesialis*') ? 'active-menu' : ''}}"><i class="fa fa-star"></i> Poli--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--            </ul>--}}

{{--        </div>--}}

{{--    </nav>--}}
{{--    <!-- /. NAV SIDE  -->--}}

{{--    @yield('content')--}}
{{--</div>--}}
{{--<!-- /. WRAPPER  -->--}}
{{--<!-- JS Scripts-->--}}
{{--<!-- jQuery Js -->--}}
{{--<script src="{{ url('') }}/assets/js/jquery-1.10.2.js"></script>--}}
{{--<!-- Bootstrap Js -->--}}
{{--<script src="{{ url('') }}/assets/js/bootstrap.min.js"></script>--}}

{{--<!-- Metis Menu Js -->--}}
{{--<script src="{{ url('') }}/assets/js/jquery.metisMenu.js"></script>--}}
{{--<!-- Morris Chart Js -->--}}
{{--<script src="{{ url('') }}/assets/js/morris/raphael-2.1.0.min.js"></script>--}}
{{--<script src="{{ url('') }}/assets/js/morris/morris.js"></script>--}}

{{--<script src="{{ url('') }}/assets/js/easypiechart.js"></script>--}}
{{--<script src="{{ url('') }}/assets/js/easypiechart-data.js"></script>--}}

{{--<script src="{{ url('') }}/assets/js/Lightweight-Chart/jquery.chart.js"></script>--}}

{{--<!-- Custom Js -->--}}
{{--<script src="{{ url('') }}/assets/js/custom-scripts.js"></script>--}}

{{--<!-- Chart Js -->--}}
{{--<script type="text/javascript" src="{{ url('') }}/assets/js/chart.min.js"></script>--}}
{{--<script type="text/javascript" src="{{ url('') }}/assets/js/chartjs.js"></script>--}}

{{--</body>--}}

{{--</html>--}}
