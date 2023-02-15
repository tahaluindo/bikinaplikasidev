<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta content="" name="description"/>
    <meta content="Templateq" name="author"/>
    <title>{{ env('APP_NAME') }}</title>
    <!-- Bootstrap Styles-->
    <link href="{{ url('') }}/assets/css/bootstrap.css" rel="stylesheet"/>
    <!-- FontAwesome Styles-->
    <link href="{{ url('') }}/assets/css/font-awesome.css" rel="stylesheet"/>
    <!-- Morris Chart Styles-->
    <link href="{{ url('') }}/assets/js/morris/morris-0.4.3.min.css" rel="stylesheet"/>
    <!-- Custom Styles-->
    <link href="{{ url('') }}/assets/css/custom-styles.css" rel="stylesheet"/>
    <!-- Google Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'/>
    <link rel="stylesheet" href="{{ url('') }}/assets/js/Lightweight-Chart/cssCharts.css">

    @yield('style')
</head>

<body>
<div id="wrapper">
    <nav class="navbar navbar-default top-navbar" role="navigation">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ url('') }}"><strong><i class="icon fa fa-plane"></i>
                    {{ \str_replace("App\\", "", auth()->user()->user_type) }}</strong></a>

            <div id="sideNav" style="width: initial;">
                <i class=" fa fa-bars icon"></i>
                <h3 style="display: inline; margin: 0;">{{ env('APP_NAME') }}</h3>
            </div>
        </div>

        <ul class="nav navbar-top-links navbar-right">


            <!-- /.dropdown -->
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="{{ url('') }}/" aria-expanded="false">
                    <i class="fa fa-bell fa-fw"></i> <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-alerts">
                    <li>
                        <a href="{{ url('') }}/">
                            <div>
                                <i class="fa fa-comment fa-fw"></i> New Comment
                                <span class="pull-right text-muted small">4 min</span>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="{{ url('') }}/">
                            <div>
                                <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                <span class="pull-right text-muted small">12 min</span>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="{{ url('') }}/">
                            <div>
                                <i class="fa fa-envelope fa-fw"></i> Message Sent
                                <span class="pull-right text-muted small">4 min</span>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="{{ url('') }}/">
                            <div>
                                <i class="fa fa-tasks fa-fw"></i> New Task
                                <span class="pull-right text-muted small">4 min</span>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="{{ url('') }}/">
                            <div>
                                <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                <span class="pull-right text-muted small">4 min</span>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a class="text-center" href="{{ url('') }}/">
                            <strong>See All Alerts</strong>
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </li>
                </ul>
                <!-- /.dropdown-alerts -->
            </li>
            <!-- /.dropdown -->
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="{{ url('') }}/" aria-expanded="false">
                    <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="{{ url('') }}/"><i class="fa fa-user fa-fw"></i> Profile</a>
                    </li>
                    <li><a href="{{ url('') }}/"><i class="fa fa-gear fa-fw"></i> Settings</a>
                    </li>
                    <li class="divider"></li>
                    <li><a href="{{ url('logout') }}/"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                    </li>
                </ul>
                <!-- /.dropdown-user -->
            </li>
            <!-- /.dropdown -->
        </ul>
    </nav>
    <!--/. NAV TOP  -->
    <nav class="navbar-default navbar-side" role="navigation">
        <div class="sidebar-collapse">

            <ul class="nav" id="main-menu">

                <li>
                    <a class="{{Request::is('bidan/periksa/today') ? 'active-menu' : '' }}"
                       href="{{url('bidan/periksa/today')}}"><i class="fa fa-user"></i> Hari Ini</a>
                </li>

                <li>
                    <a class="{{Request::is('bidan/periksa/all') ? 'active-menu' : '' }}"
                       href="{{url('bidan/periksa/all')}}"><i class="fa fa-user"></i> Semua</a>
                </li>

            </ul>

        </div>

    </nav>
    <!-- /. NAV SIDE  -->

    @yield('content')
</div>
<!-- /. WRAPPER  -->
<!-- JS Scripts-->
<!-- jQuery Js -->
<script src="{{ url('') }}/assets/js/jquery-1.10.2.js"></script>
<!-- Bootstrap Js -->
<script src="{{ url('') }}/assets/js/bootstrap.min.js"></script>

<!-- Metis Menu Js -->
<script src="{{ url('') }}/assets/js/jquery.metisMenu.js"></script>
<!-- Morris Chart Js -->
<script src="{{ url('') }}/assets/js/morris/raphael-2.1.0.min.js"></script>
<script src="{{ url('') }}/assets/js/morris/morris.js"></script>

<script src="{{ url('') }}/assets/js/easypiechart.js"></script>
<script src="{{ url('') }}/assets/js/easypiechart-data.js"></script>

<script src="{{ url('') }}/assets/js/Lightweight-Chart/jquery.chart.js"></script>

<!-- Custom Js -->
<script src="{{ url('') }}/assets/js/custom-scripts.js"></script>

<!-- Chart Js -->
<script type="text/javascript" src="{{ url('') }}/assets/js/chart.min.js"></script>
<script type="text/javascript" src="{{ url('') }}/assets/js/chartjs.js"></script>

@yield("script")

</body>

</html>
