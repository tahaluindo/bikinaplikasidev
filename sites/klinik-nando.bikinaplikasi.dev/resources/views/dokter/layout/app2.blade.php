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
                <li class="{{ Request::is('admin/index*') ? 'active' : ''}}"><a class="" href="{{ url('') }}/"><i
                                class="ti-home"></i> Dashboard</a>
                </li>

                <li class="label">Menu</li>
                <li>
                    <a class="{{Request::is('dokter/periksa/today') ? 'active-menu' : '' }}"
                       href="{{url('dokter/periksa/today')}}"><i class="fa fa-user"></i> Hari Ini</a>
                </li>

                <li>
                    <a class="{{Request::is('dokter/periksa/all') ? 'active-menu' : '' }}"
                       href="{{url('dokter/periksa/all')}}"><i class="fa fa-user"></i> Semua</a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- /# sidebar -->

<div class="header">
    <div class="pull-left">
        <div class="logo"><a href="index.html"><!-- <img src="{{ url('') }}/assets/images/logo.png" alt="" /> -->
                <span>{{ \str_replace("App\\", "", auth()->user()->user_type) }}</span></a>
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
