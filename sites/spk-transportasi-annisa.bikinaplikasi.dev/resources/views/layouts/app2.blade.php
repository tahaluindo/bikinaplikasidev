<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{ env('APP_OBJECT_NAME') }} | {{ env('APP_OBJECT_LOCATION') }} </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ url('') }}/img/favicon.ico">
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="{{ url('') }}/css/bootstrap.min.css">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="{{ url('') }}/css/font-awesome.min.css">
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="{{ url('') }}/css/owl.carousel.css">
    <link rel="stylesheet" href="{{ url('') }}/css/owl.theme.css">
    <link rel="stylesheet" href="{{ url('') }}/css/owl.transitions.css">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="{{ url('') }}/css/animate.css">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="{{ url('') }}/css/normalize.css">
    <!-- meanmenu icon CSS
		============================================ -->
    <link rel="stylesheet" href="{{ url('') }}/css/meanmenu.min.css">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="{{ url('') }}/css/main.css">
    <!-- educate icon CSS
		============================================ -->
    <link rel="stylesheet" href="{{ url('') }}/css/educate-custon-icon.css">
    <!-- morrisjs CSS
		============================================ -->
    <link rel="stylesheet" href="{{ url('') }}/css/morrisjs/morris.css">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="{{ url('') }}/css/scrollbar/jquery.mCustomScrollbar.min.css">
    <!-- metisMenu CSS
		============================================ -->
    <link rel="stylesheet" href="{{ url('') }}/css/metisMenu/metisMenu.min.css">
    <link rel="stylesheet" href="{{ url('') }}/css/metisMenu/metisMenu-vertical.css">
    <!-- calendar CSS
		============================================ -->
    <link rel="stylesheet" href="{{ url('') }}/css/calendar/fullcalendar.min.css">
    <link rel="stylesheet" href="{{ url('') }}/css/calendar/fullcalendar.print.min.css">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="{{ url('') }}/style.css">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="{{ url('') }}/css/responsive.css">
    <!-- modernizr JS
		============================================ -->
    <script src="{{ url('') }}/js/vendor/modernizr-2.8.3.min.js"></script>


    <link rel="apple-touch-icon" href="{{ url('assets') }}/images/apple-touch-icon.png">
    <link rel="shortcut icon" href="{{ url('assets') }}/images/favicon.ico">

    <!-- Stylesheets -->
    {{--    <link rel="stylesheet" href="{{ url('global') }}/css/bootstrap.min599c.css?v4.0.2">--}}
    {{--    <link rel="stylesheet" href="{{ url('global') }}/css/bootstrap-extend.min599c.css?v4.0.2">--}}
    <link rel="stylesheet" href="{{ url('assets') }}/css/site.min599c.css?v4.0.2">

    <!-- Plugins -->
    <link rel="stylesheet" href="{{ url('global') }}/vendor/animsition/animsition.min599c.css?v4.0.2">
    <link rel="stylesheet" href="{{ url('global') }}/vendor/asscrollable/asScrollable.min599c.css?v4.0.2">
    <link rel="stylesheet" href="{{ url('global') }}/vendor/switchery/switchery.min599c.css?v4.0.2">
    <link rel="stylesheet" href="{{ url('global') }}/vendor/intro-js/introjs.min599c.css?v4.0.2">
    <link rel="stylesheet" href="{{ url('global') }}/vendor/slidepanel/slidePanel.min599c.css?v4.0.2">
    <link rel="stylesheet" href="{{ url('global') }}/vendor/flag-icon-css/flag-icon.min599c.css?v4.0.2">

    <!-- Plugins For This Page -->
    <link rel="stylesheet" href="{{ url('global') }}/vendor/chartist/chartist.min599c.css?v4.0.2">
    <link rel="stylesheet" href="{{ url('global') }}/vendor/aspieprogress/asPieProgress.min599c.css?v4.0.2">

    <!-- Page -->
    <link rel="stylesheet" href="{{ url('assets') }}/examples/css/dashboard/v2.min599c.css?v4.0.2">

    <!-- Fonts -->
    <link rel="stylesheet" href="{{ url('global') }}/fonts/web-icons/web-icons.min599c.css?v4.0.2">
    <link rel="stylesheet" href="{{ url('global') }}/fonts/brand-icons/brand-icons.min599c.css?v4.0.2">
    <link rel='stylesheet' href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic">

<!--[if lt IE 9]>
    <script src="{{ url('') }}/global/vendor/html5shiv/html5shiv.min.js?v4.0.2"></script>
    <![endif]-->

<!--[if lt IE 10]>
    <script src="{{ url('') }}/global/vendor/media-match/media.match.min.js?v4.0.2"></script>
    <script src="{{ url('') }}/global/vendor/respond/respond.min.js?v4.0.2"></script>
    <![endif]-->

    <!-- Scripts -->
    <script src="{{ url('') }}/global/vendor/breakpoints/breakpoints.min599c.js?v4.0.2"></script>
    <script>
        Breakpoints();
    </script>

    @if(!preg_match("/localhost/", $_SERVER['HTTP_HOST']))
        <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    @endif

<!-- BOOTSTRAP STYLES-->
    {{--    <link href="{{ url('assets') }}/css/bootstrap.css" rel="stylesheet"/>--}}
<!-- FONTAWESOME STYLES-->
    <link href="{{ url('assets') }}/css/font-awesome.css" rel="stylesheet"/>
    <!--CUSTOM BASIC STYLES-->
    <link href="{{ url('assets') }}/css/basic.css" rel="stylesheet"/>
    <!--CUSTOM MAIN STYLES-->
    <link href="{{ url('assets') }}/css/custom.css" rel="stylesheet"/>
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'/>

    {{--    font awesome--}}
    <link href="{{ url('lumino/css/font-awesome.min.css' ) }}" rel="stylesheet">

    {{--    datepicker3--}}
    <link href="{{ url('lumino/css/datepicker3.css' ) }}" rel="stylesheet">

    {{--    dropzone--}}
    <link href="{{ url('css') }}/dropzone.min.css" rel="stylesheet">

    <!--Custom Font-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i"
          rel="stylesheet">
    <link rel="stylesheet" href="{{ url('css') }}/select.dataTables.min.css">
    <link href="{{ url("vendor/datatables/dataTables.bootstrap4.css") }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('css') }}/pretty-checkbox.min.css">
    <link rel="stylesheet" href="{{ url('css') }}/flatpickr.min.css">
    <link rel="stylesheet" type="text/css" href="{{ url('css') }}//material_blue.css">

    <style>
        #snackbar {
            visibility: hidden;
            min-width: 250px;
            margin-left: -125px;

            color: #fff;
            text-align: center;
            border-radius: 25px;
            padding: 16px;
            position: fixed;
            z-index: 1;
            top: 30px;
            left: 47.5%;
            right: 40%;
            font-size: 17px;
        }

        #snackbar.hapus_semua {
            left: 46.5%;
            right: 39.5%;
        }

        #snackbar.success {
            background-color: #00CA79;
        }

        #snackbar.warning {
            background-color: #EC971F;
        }

        #snackbar.danger {
            background-color: #AC2925;
        }

        #snackbar.show {
            visibility: visible;
            -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
            animation: fadein 0.5s, fadeout 0.5s 2.5s;
        }

        @-webkit-keyframes fadein {
            from {
                top: 0;
                opacity: 0;
            }

            to {
                top: 30px;
                opacity: 1;
            }
        }

        @keyframes fadein {
            from {
                top: 0;
                opacity: 0;
            }

            to {
                top: 30px;
                opacity: 1;
            }
        }

        @-webkit-keyframes fadeout {
            from {
                top: 30px;
                opacity: 1;
            }

            to {
                top: 0;
                opacity: 0;
            }
        }

        @keyframes fadeout {
            from {
                top: 30px;
                opacity: 1;
            }

            to {
                top: 0;
                opacity: 0;
            }
        }
    </style>

    <style>
        ._3emE9--dark-theme .-S-tR--ff-downloader {
            background: rgba(30, 30, 30, .93);
            border: 1px solid rgba(82, 82, 82, .54);
            box-shadow: 0 4px 7px rgba(30, 30, 30, .55);
            color: #fff
        }

        ._3emE9--dark-theme .-S-tR--ff-downloader ._6_Mtt--header ._2VdJW--minimize-btn {
            background: #3d4b52
        }

        ._3emE9--dark-theme .-S-tR--ff-downloader ._6_Mtt--header ._2VdJW--minimize-btn:hover {
            background: #131415
        }

        ._3emE9--dark-theme .-S-tR--ff-downloader ._10vpG--footer {
            background: rgba(30, 30, 30, .93)
        }

        ._2mDEx--white-theme .-S-tR--ff-downloader {
            background: #fff;
            border: 1px solid rgba(82, 82, 82, .54);
            box-shadow: 0 4px 7px rgba(30, 30, 30, .55);
            color: #314c75
        }

        ._2mDEx--white-theme .-S-tR--ff-downloader ._6_Mtt--header {
            font-weight: 700
        }

        ._2mDEx--white-theme .-S-tR--ff-downloader ._2dFLA--container ._2bWNS--notice {
            border: 0;
            color: rgba(0, 0, 0, .88)
        }

        ._2mDEx--white-theme .-S-tR--ff-downloader ._10vpG--footer {
            background: #fff
        }

        .-S-tR--ff-downloader {
            display: block;
            overflow: hidden;
            position: fixed;
            bottom: 20px;
            right: 7.1%;
            width: 330px;
            height: 180px;
            background: rgba(30, 30, 30, .93);
            border-radius: 2px;
            color: #fff;
            z-index: 99999999;
            border: 1px solid rgba(82, 82, 82, .54);
            box-shadow: 0 4px 7px rgba(30, 30, 30, .55);
            transition: .5s
        }

        .-S-tR--ff-downloader._3M7UQ--minimize {
            height: 62px
        }

        .-S-tR--ff-downloader._3M7UQ--minimize .nxuu4--file-info,
        .-S-tR--ff-downloader._3M7UQ--minimize ._6_Mtt--header {
            display: none
        }

        .-S-tR--ff-downloader ._6_Mtt--header {
            padding: 10px;
            font-size: 17px;
            font-family: sans-serif
        }

        .-S-tR--ff-downloader ._6_Mtt--header ._2VdJW--minimize-btn {
            float: right;
            background: #f1ecec;
            height: 20px;
            width: 20px;
            text-align: center;
            padding: 2px;
            margin-top: -10px;
            cursor: pointer
        }

        .-S-tR--ff-downloader ._6_Mtt--header ._2VdJW--minimize-btn:hover {
            background: #e2dede
        }

        .-S-tR--ff-downloader ._13XQ2--error {
            color: red;
            padding: 10px;
            font-size: 12px;
            line-height: 19px
        }

        .-S-tR--ff-downloader ._2dFLA--container {
            position: relative;
            height: 100%
        }

        .-S-tR--ff-downloader ._2dFLA--container .nxuu4--file-info {
            padding: 6px 15px 0;
            font-family: sans-serif
        }

        .-S-tR--ff-downloader ._2dFLA--container .nxuu4--file-info div {
            margin-bottom: 5px;
            width: 100%;
            overflow: hidden
        }

        .-S-tR--ff-downloader ._2dFLA--container ._2bWNS--notice {
            margin-top: 21px;
            font-size: 11px
        }

        .-S-tR--ff-downloader ._10vpG--footer {
            width: 100%;
            bottom: 0;
            position: absolute;
            font-weight: 700
        }

        .-S-tR--ff-downloader ._10vpG--footer ._2V73d--loader {
            animation: n0BD1--rotation 3.5s linear forwards;
            position: absolute;
            top: -120px;
            left: calc(50% - 35px);
            border-radius: 50%;
            border: 5px solid #fff;
            border-top-color: #a29bfe;
            height: 70px;
            width: 70px;
            display: flex;
            justify-content: center;
            align-items: center
        }

        .-S-tR--ff-downloader ._10vpG--footer ._24wjw--loading-bar {
            width: 100%;
            height: 18px;
            background: #dfe6e9;
            border-radius: 5px
        }

        .-S-tR--ff-downloader ._10vpG--footer ._24wjw--loading-bar ._1FVu9--progress-bar {
            height: 100%;
            background: #8bc34a;
            border-radius: 5px
        }

        .-S-tR--ff-downloader ._10vpG--footer ._2KztS--status {
            margin-top: 10px
        }

        .-S-tR--ff-downloader ._10vpG--footer ._2KztS--status ._1XilH--state {
            float: left;
            font-size: .9em;
            letter-spacing: 1pt;
            text-transform: uppercase;
            width: 100px;
            height: 20px;
            position: relative
        }

        .-S-tR--ff-downloader ._10vpG--footer ._2KztS--status ._1jiaj--percentage {
            float: right
        }

        .comment-scrollbar, .timeline-scrollbar, .messages-scrollbar, .project-list-scrollbar {
            height: max-content !important;
        }

        .footer-copyright-area {
            margin-top: 40px !important;
        }

    </style>

    <link href="{{ url("css/style.css") }}" rel="stylesheet">
</head>

<body>

<!-- Start Left menu area -->
<div class="left-sidebar-pro">
    <nav id="sidebar" class="">
        <div class="left-custom-menu-adp-wrap comment-scrollbar">
            <nav class="sidebar-nav left-sidebar-menu-pro">
                <ul class="metismenu" id="menu1" style="padding-bottom: 20px !important;">
                    <li class="active">
                        <a class="" href="{{ url('') }}">
                            <span class="educate-icon educate-home icon-wrap"></span>
                            <span class="mini-click-non">Dashboard</span>
                        </a>
                    </li>

                    <li class="active">
                        <a class="has-arrow">
                            <span class="educate-icon educate-library icon-wrap"></span>
                            <span class="mini-click-non">Menu</span>
                        </a>
                        <ul class="submenu-angle" aria-expanded="true">


                            @if(in_array(auth()->user()->level, ['Admin']))
                                <li>
                                    <a href="{{ route('user.index') }}"
                                       class="">

                                        <span class="mini-sub-pro">User</span>
                                    </a>
                                </li>
                            @endif

                            @if(in_array(auth()->user()->level, ['Admin']))
                                <li>
                                    <a href="{{ route('kriteria.index') }}"
                                       class="">

                                        <span class="mini-sub-pro">Kriteria</span>
                                    </a>
                                </li>
                            @endif

                            @if(in_array(auth()->user()->level, ['Admin']))
                                <li>
                                    <a href="{{ route('alternatif.index') }}"
                                       class="">

                                        <span class="mini-sub-pro">Alternatif</span>
                                    </a>
                                </li>
                            @endif

                            @if(in_array(auth()->user()->level, ['Admin']))
                                <li>
                                    <a href="{{ route('perhitungan.index') }}"
                                       class="">

                                        <span class="mini-sub-pro">Perhitungan</span>
                                    </a>
                                </li>
                            @endif

                            @if(in_array(auth()->user()->level, ['Pengguna', 'Admin']))
                                <li>
                                    <a href="{{ route('survey.index') }}"
                                       class="">

                                        <span class="mini-sub-pro">Survey</span>
                                    </a>
                                </li>
                            @endif

                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </nav>
</div>
<!-- End Left menu area -->
<!-- Start Welcome area -->
<div class="all-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                {{--                <div class="logo-pro">--}}
                {{--                    <a href="{{ url('') }}/index.html"><img class="main-logo" src="{{ url('') }}/img/logo/logo.png"--}}
                {{--                                                            alt=""/></a>--}}
                {{--                </div>--}}
            </div>
        </div>
    </div>
    <div class="header-advance-area">
        <div class="header-top-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="header-top-wraper">
                            <div class="row">
                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                    <div class="menu-switcher-pro">
                                        <button type="button" id="sidebarCollapse"
                                                class="btn bar-button-pro header-drl-controller-btn btn-info navbar-btn">
                                            <i class="educate-icon educate-nav"></i>
                                        </button>

                                        <h4 style="display: inline-block; margin-top: 20px; margin-right: -100px; color: white;">

                                            {{ env('APP_NAME') }} - {{ env('APP_OBJECT_NAME') }}</h4>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                    <div class="header-right-info">
                                        <ul class="nav navbar-nav mai-top-nav header-right-menu">

                                            <li class="nav-item"><a href="{{ url('') }}/#" data-toggle="dropdown"
                                                                    role="button" aria-expanded="false"
                                                                    class="nav-link dropdown-toggle"><i
                                                        class="educate-icon educate-bell" aria-hidden="true"></i><span
                                                        class="indicator-nt"></span></a>
                                                <div role="menu"
                                                     class="notification-author dropdown-menu animated zoomIn">
                                                    <div class="notification-single-top">
                                                        <h1>Notifications</h1>
                                                    </div>
                                                    <ul class="notification-menu">
                                                        <li>
                                                            <a href="{{ url('') }}/#">
                                                                <div class="notification-icon">
                                                                    <i class="educate-icon educate-checked edu-checked-pro admin-check-pro"
                                                                       aria-hidden="true"></i>
                                                                </div>
                                                                <div class="notification-content">
                                                                    <span class="notification-date">16 Sept</span>
                                                                    <h2>Advanda Cro</h2>
                                                                    <p>Please done this project as soon possible.</p>
                                                                </div>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ url('') }}/#">
                                                                <div class="notification-icon">
                                                                    <i class="fa fa-cloud edu-cloud-computing-down"
                                                                       aria-hidden="true"></i>
                                                                </div>
                                                                <div class="notification-content">
                                                                    <span class="notification-date">16 Sept</span>
                                                                    <h2>Sulaiman din</h2>
                                                                    <p>Please done this project as soon possible.</p>
                                                                </div>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ url('') }}/#">
                                                                <div class="notification-icon">
                                                                    <i class="fa fa-eraser edu-shield"
                                                                       aria-hidden="true"></i>
                                                                </div>
                                                                <div class="notification-content">
                                                                    <span class="notification-date">16 Sept</span>
                                                                    <h2>Victor Jara</h2>
                                                                    <p>Please done this project as soon possible.</p>
                                                                </div>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ url('') }}/#">
                                                                <div class="notification-icon">
                                                                    <i class="fa fa-line-chart edu-analytics-arrow"
                                                                       aria-hidden="true"></i>
                                                                </div>
                                                                <div class="notification-content">
                                                                    <span class="notification-date">16 Sept</span>
                                                                    <h2>Victor Jara</h2>
                                                                    <p>Please done this project as soon possible.</p>
                                                                </div>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                    <div class="notification-view">
                                                        <a href="{{ url('') }}/#">View All Notification</a>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="nav-item">
                                                <a href="{{ url('') }}/#" data-toggle="dropdown" role="button"
                                                   aria-expanded="false" class="nav-link dropdown-toggle">
                                                    <img src="{{ url('') }}/img/product/pro4.jpg" alt=""/>
                                                    <span class="admin-name">{{ auth()->user()->name }}</span>
                                                    <i class="fa fa-angle-down edu-icon edu-down-arrow"></i>
                                                </a>
                                                <ul role="menu"
                                                    class="dropdown-header-top author-log dropdown-menu animated zoomIn">

                                                    <li><a href="{{ route('user.profile', auth()->user()->id) }}"><span
                                                                class="edu-icon edu-settings author-log-ic"></span>Settings</a>
                                                    </li>
                                                    <li>

                                                        <form method="POST" action="{{ route('logout') }}">
                                                            @csrf

                                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                                               onclick="event.preventDefault(); if(confirm('Yakin akan logout?')) this.closest('form').submit(); "><span
                                                                    class="edu-icon edu-locked author-log-ic"></span>
                                                                Logout
                                                            </a>
                                                        </form>

                                                    </li>
                                                </ul>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Mobile Menu start -->

        <!-- Mobile Menu end -->
        @yield('page-info')
    </div>

    @yield('content')

    <div class="footer-copyright-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer-copy-right">
                        <p>Copyright © {{ date("Y") }}. All rights reserved.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- jquery
    ============================================ -->
<script src="{{ url('') }}/js/vendor/jquery-1.12.4.min.js"></script>
<!-- bootstrap JS
    ============================================ -->
<script src="{{ url('') }}/js/bootstrap.min.js"></script>
<!-- wow JS
    ============================================ -->
<script src="{{ url('') }}/js/wow.min.js"></script>
<!-- price-slider JS
    ============================================ -->
<script src="{{ url('') }}/js/jquery-price-slider.js"></script>
<!-- meanmenu JS
    ============================================ -->
<script src="{{ url('') }}/js/jquery.meanmenu.js"></script>
<!-- owl.carousel JS
    ============================================ -->
<script src="{{ url('') }}/js/owl.carousel.min.js"></script>
<!-- sticky JS
    ============================================ -->
<script src="{{ url('') }}/js/jquery.sticky.js"></script>
<!-- scrollUp JS
    ============================================ -->
<script src="{{ url('') }}/js/jquery.scrollUp.min.js"></script>
<!-- counterup JS
    ============================================ -->
<script src="{{ url('') }}/js/counterup/jquery.counterup.min.js"></script>
<script src="{{ url('') }}/js/counterup/waypoints.min.js"></script>
<script src="{{ url('') }}/js/counterup/counterup-active.js"></script>
<!-- mCustomScrollbar JS
    ============================================ -->
<script src="{{ url('') }}/js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="{{ url('') }}/js/scrollbar/mCustomScrollbar-active.js"></script>
<!-- metisMenu JS
    ============================================ -->
<script src="{{ url('') }}/js/metisMenu/metisMenu.min.js"></script>
<script src="{{ url('') }}/js/metisMenu/metisMenu-active.js"></script>
<!-- morrisjs JS
    ============================================ -->
<script src="{{ url('') }}/js/morrisjs/raphael-min.js"></script>
<script src="{{ url('') }}/js/morrisjs/morris.js"></script>
<script src="{{ url('') }}/js/morrisjs/morris-active.js"></script>
<!-- morrisjs JS
    ============================================ -->
<script src="{{ url('') }}/js/sparkline/jquery.sparkline.min.js"></script>
<script src="{{ url('') }}/js/sparkline/jquery.charts-sparkline.js"></script>
<script src="{{ url('') }}/js/sparkline/sparkline-active.js"></script>
<!-- calendar JS
    ============================================ -->
<script src="{{ url('') }}/js/calendar/moment.min.js"></script>
<script src="{{ url('') }}/js/calendar/fullcalendar.min.js"></script>
<script src="{{ url('') }}/js/calendar/fullcalendar-active.js"></script>
<!-- plugins JS
    ============================================ -->
<script src="{{ url('') }}/js/plugins.js"></script>
<!-- main JS
    ============================================ -->
<script src="{{ url('') }}/js/main.js"></script>

<script src="{{ url('') }}/global/vendor/babel-external-helpers/babel-external-helpers599c.js?v4.0.2"></script>
<script src="{{ url('') }}/global/vendor/jquery/jquery.min599c.js?v4.0.2"></script>
<script src="{{ url('') }}/global/vendor/popper-js/umd/popper.min599c.js?v4.0.2"></script>
<script src="{{ url('') }}/global/vendor/bootstrap/bootstrap.min599c.js?v4.0.2"></script>
<script src="{{ url('') }}/global/vendor/animsition/animsition.min599c.js?v4.0.2"></script>
<script src="{{ url('') }}/global/vendor/mousewheel/jquery.mousewheel599c.js?v4.0.2"></script>
<script src="{{ url('') }}/global/vendor/asscrollbar/jquery-asScrollbar.min599c.js?v4.0.2"></script>
<script src="{{ url('') }}/global/vendor/asscrollable/jquery-asScrollable.min599c.js?v4.0.2"></script>
<script src="{{ url('') }}/global/vendor/ashoverscroll/jquery-asHoverScroll.min599c.js?v4.0.2"></script>

<!-- Plugins -->
<script src="{{ url('') }}/global/vendor/switchery/switchery.min599c.js?v4.0.2"></script>
<script src="{{ url('') }}/global/vendor/intro-js/intro.min599c.js?v4.0.2"></script>
<script src="{{ url('') }}/global/vendor/screenfull/screenfull599c.js?v4.0.2"></script>
<script src="{{ url('') }}/global/vendor/slidepanel/jquery-slidePanel.min599c.js?v4.0.2"></script>

<!-- Plugins For This Page -->
<script src="{{ url('') }}/global/vendor/chartist/chartist.min599c.js?v4.0.2"></script>
<script src="{{ url('') }}/global/vendor/gmaps/gmaps.min599c.js?v4.0.2"></script>
<script src="{{ url('') }}/global/vendor/matchheight/jquery.matchHeight-min599c.js?v4.0.2"></script>

<!-- Scripts -->
<script src="{{ url('') }}/global/js/Component.min599c.js?v4.0.2"></script>
<script src="{{ url('') }}/global/js/Plugin.min599c.js?v4.0.2"></script>
<script src="{{ url('') }}/global/js/Base.min599c.js?v4.0.2"></script>
<script src="{{ url('') }}/global/js/Config.min599c.js?v4.0.2"></script>

<script src="{{ url('assets') }}/js/Section/Menubar.min599c.js?v4.0.2"></script>
<script src="{{ url('assets') }}/js/Section/Sidebar.min599c.js?v4.0.2"></script>
<script src="{{ url('assets') }}/js/Section/PageAside.min599c.js?v4.0.2"></script>
<script src="{{ url('assets') }}/js/Plugin/menu.min599c.js?v4.0.2"></script>

<!-- Config -->
<script src="{{ url('') }}/global/js/config/colors.min599c.js?v4.0.2"></script>
<script src="{{ url('assets') }}/js/config/tour.min599c.js?v4.0.2"></script>
<script>
    Config.set('assets', '../assets');
</script>

<!-- Page -->
<script src="{{ url('assets') }}/js/Site.min599c.js?v4.0.2"></script>
<script src="{{ url('') }}/global/js/Plugin/asscrollable.min599c.js?v4.0.2"></script>
<script src="{{ url('') }}/global/js/Plugin/slidepanel.min599c.js?v4.0.2"></script>
<script src="{{ url('') }}/global/js/Plugin/switchery.min599c.js?v4.0.2"></script>
<script src="{{ url('') }}/global/js/Plugin/gmaps.min599c.js?v4.0.2"></script>
<script src="{{ url('') }}/global/js/Plugin/matchheight.min599c.js?v4.0.2"></script>
<script src="{{ url('') }}/global/js/Plugin/asscrollable.min599c.js?v4.0.2"></script>

<script src="{{ url('assets') }}/examples/js/dashboard/v2.min599c.js?v4.0.2"></script>

{{--dropzone--}}
<script src="{{ url('') }}/js/dropzone.min.js"></script>

<script src="{{ url('') }}/assets/js/jquery-1.10.2.js"></script>
<!-- BOOTSTRAP SCRIPTS -->
<script src="{{ url('') }}/assets/js/bootstrap.js"></script>
<!-- METISMENU SCRIPTS -->
<script src="{{ url('') }}/assets/js/jquery.metisMenu.js"></script>
<!-- CUSTOM SCRIPTS -->
<script src="{{ url('') }}/assets/js/custom.js"></script>


<script src="{{ url('monster-admin-lite/assets/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ url('lumino/js/bootstrap.min.js') }}"></script>
<script src="{{ url('lumino/js/bootstrap-datepicker.js') }}"></script>
<script src="{{ url('lumino/js/custom.js') }}"></script>

{{--datatable--}}
<script src="{{ url("vendor/datatables/jquery.dataTables.js") }}"></script>
<script src="{{ url("vendor/datatables/dataTables.bootstrap4.js") }}"></script>
<script src="{{ url('') }}/js/dataTables.buttons.min.js"></script>
<script src="{{ url('') }}/js/buttons.flash.min.js"></script>
<script src="{{ url('') }}/js/dataTables.select.min.js"></script>

{{--ckeditor--}}
<script src="https://cdn.ckeditor.com/ckeditor5/18.0.0/classic/ckeditor.js"></script>
<script src="{{ url('') }}/js/ckeditor.js"></script>

{{--flatpicker--}}
<script src="{{ url('') }}/js/flatpickr.js"></script>
<script src="{{ url('') }}/js/id.js"></script>

<script>
    $(document).ready(function () {
        $('#harga, #jumlah').keyup(function () {
            let harga = parseInt($('#harga_beli').val()) ? parseInt($('#harga_beli').val()) : parseInt($('#harga_jual').val());
            let jumlah = parseInt($('#jumlah').val());
            let total = harga * jumlah;

            $('#total').val(total)
        });

        $('#barang_id').on('change', () => {
            $.ajax({
                url: "{{ url('barang/get-barang') }}",
                data: {
                    barang_id: $('#barang_id').val(),
                    _token: ""
                }, headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': "{{ csrf_token() }}",
                },
                success: (response) => {
                    let responseJson = JSON.parse(response);

                    $('#harga_beli').val(responseJson.harga_beli)
                    $('#harga_jual').val(responseJson.harga_jual)
                }
            })
        })

        // untuk merubah position modal
        modalId = 0;
        $(document).on('click', '.lblHapus', function () {
            modalId = $(this).data('modal-id');

            $(`#modal-${modalId} .modal-dialog`).css({
                "position": 'absolute',
                'left': event.pageX - 170,
                "top": event.pageY - 170
            });

            $(`#modal-${modalId} .btn-modal`).click((e) => {

                $(`#modal-${modalId}`).modal('hide');
            });

            $(document).on('keypress', (e) => {
                if (e.which == 13) {
                    if (modalId > 0) {

                        $(`#modal-${modalId} .btn-modal`).click();
                    }

                    modalId = 0;
                }
            });
        });


        // dropzone
        Dropzone.options.imageUpload = {
            maxFilesize: 1,
            acceptedFiles: ".jpeg,.jpg,.png,.gif"
        };

        // menghilangkan alert
        $('.alert').fadeOut(5000);

        // flatpickr
        $(".flatpickr").flatpickr({
            enableTime: false,
            dateFormat: "Y-m-d",
            locale: 'id'
        });

        // flatpickr
        $(".flatpickr2").flatpickr({
            dateFormat: "Y-m-d H:i",
            locale: 'id',
            enableTime: true
        });

        $('[data-toggle="popover"]').popover({
            html: true
        });

        $('input[type="range"]').on("change mousemove", function () {
            $(this).next().html($(this).val());
        });

        // agar filter dari datatable bisa dipake buat nyari juga
        $('#dataTable_filter input').attr('name', 'q');
        $('#dataTable_filter input').val(q);
        $('#dataTable_filter input').attr('id', 'inputSearch');
        $('#dataTable_filter input').attr('placeholder', placeholder);

        var formHtml = `<form action="${urlSearch}">`;

        $('#dataTable_filter input').wrap(formHtml);

        $(document).keydown(function (e) {
            if (e.keyCode == 13 && $("#inputSearch").is(':focus')) {
                $('#dataTable_filter form').submit();
            }
        });

        function inArray(needle, haystack) {
            var length = haystack.length;
            for (var i = 0; i < length; i++) {
                if (typeof haystack[i] == 'object') {
                    if (arrayCompare(haystack[i], needle)) return true;
                } else {
                    if (haystack[i] == needle) return true;
                }
            }

            return false;
        }

        var selector_soal_ids = [];
        $('.mapel_detail_ids, .mode, .jenis_soal').change(function () {
            // hilangkan mapel yang tidak terkait
            $(`#modal-test-mode ul`).hide();

            $.each($(".mapel_detail_ids:checked"), (index, mapel_detail_id) => {
                const selector_soal =
                    `#modal-test-mode ul[data-mapel-detail_id='${mapel_detail_id.value}'][data-jenis='${$(".jenis_soal").val()}'][data-mode='${$(".mode").val()}']`;
                selector_soal_ids.push(selector_soal + " input[type='checkbox']");

                $(selector_soal).show();
            });
        });

        $('#mode').change(function (e) {
            if (inArray($(this).val(), ['Pilgan Normal', 'Essay Normal'])) {

                $('#modal-test-mode').modal();
            }
        });

        $('#form-test').submit(function (e) {
            // e.preventDefault()

            if (!inArray($('#soal_ids').val(), ['', '[]'])) {
                return;
            }

            var selector_soal_id_checkeds = [];
            $.each(selector_soal_ids, function (index, selector_soal_id) {
                $(`${selector_soal_id}:checked`).map(function () {
                    selector_soal_id_checkeds.push($(this).val());
                });
            })

            $('#soal_ids').val(JSON.stringify(selector_soal_id_checkeds));
        })


        // baris kode ini untuk menambahkan kelas dan juga guru ketika tombol tambah diklik (di maple create)
        $('#mapelBtnAdd').click(function () {
            const mapelFormKelasGuru = $('#mapelFormKelasGuru')
            const mapleFormKelasGuruAdd = $('#mapelFormKelasGuruAdd');

            mapelFormKelasGuru.append(mapleFormKelasGuruAdd.html());
        })


        // ini harus dibuat supaya ck editor bisa upload gambar
        CKEDITOR.config.filebrowserUploadMethod = 'form';

        // ini adalah inisialisasi setiap ck editor, dari id 0 sampai 3, jadi kalo perlu ckeditornya
        // kita tinggal pasang aja id yang tersedia dibawah ini, dan ck editor pun langsung tampil
        CKEDITOR.replace('editor-0', {
            height: 200,
            filebrowserUploadUrl: "{{ url('ckeditor/upload') }}"
        });
        CKEDITOR.replace('editor-1', {
            height: 200,
            filebrowserUploadUrl: "{{ url('ckeditor/upload') }}"
        });
        CKEDITOR.replace('editor-2', {
            height: 200,
            filebrowserUploadUrl: "{{ url('ckeditor/upload') }}"
        });
        CKEDITOR.replace('editor-3', {
            height: 200,
            filebrowserUploadUrl: "{{ url('ckeditor/upload') }}"
        });
        CKEDITOR.replace('editor-4', {
            height: 200,
            filebrowserUploadUrl: "{{ url('ckeditor/upload') }}"
        });

        function getIdOfRows(selector) {
            var ids = [];
            for (data of selector) {
                ids.push(data.dataset.id);
            }

            return ids;
        }

        // ini adalah baris kode untuk mengatur penambahan soal essay
        // jadi ketika button tambah diklik maka baris ini akan menambahkan bobot dan textbox soal
        var number = $(`form .btnHapusEditor`).length - 1;
        $('#listSoalEssayBtnAdd').on('click', function () {
            number++;

            $("#listSoalEssay").append($('#listSoalEssayToAdd').html())

            $('form #hapusEditor-x').attr('data-hapus', `hapusEditor_${number}`);
            $('form #hapusEditor-x').attr('id', '')
            $(`form .btnHapusEditor`).last().attr('data-target',
                `[data-hapus='hapusEditor_${number}'`);
            $(`form .btnHapusEditor`).last().attr('data-hapus', `hapusEditor_${number}`)

            $('form #editor-x').attr('id', `editor_${number}`);
            CKEDITOR.replace(`editor_${number}`, {
                height: 200,
                filebrowserUploadUrl: "{{ url('ckeditor/upload') }}"
            })
        })

        // ini adalah baris kode untuk mengatur kalo seandainy ada error di bagia create soalessay nya
        // bobot kita jadikan patokan karena jumlah bobot itu sama dengan jumlah soal
        @if(old('bobot') != "")
        @foreach(old('bobot') as $index => $bobot)
        CKEDITOR.replace(`editor-{{ $index }}`, {
            height: 200,
            filebrowserUploadUrl: "{{ url('ckeditor/upload') }}"
        })
        @endforeach
        @endif

        // baris kode ini untuk mengatur event ketika user mengklik tombol hapus di bagian create soal essay
        // numbernya harus kita kurangin setiap editornya berkurang
        // supaya penomoran ckeditornya tidak berantakan
        $(document).on('click', 'form .btnHapusEditor', function () {
            if (confirm("Yakin akan menghapus soal ini?")) {
                $($(this).data('target')).remove()

                number--;
            }
        })

        // dibaris ini kita mengatur datatable untuk semua halaman
        // ketika data dihalaman tersebut ditampilkan maka datatabel akan mengatur desain tablenya
        // dari mulai filter, tombol hapus semua, aktifkan, dll..
        // pengaturan ini tidak sama untuk beberapa halaman
        // sehingga kita perlu melakukan if conditional lagi
        $('#dataTable').DataTable({
            paging: true,
            pageLength: 25,
            dom: 'Blfrtip',
            "columnDefs": [{
                "orderable": false,
                "targets": columnOrders
            }],
            buttons: tampilkan_buttons === false ? (button_manual === false ? [] : button_manual) :
                [
                        @if(Route::current()->action['as'] != 'survey.index')
                    {
                        extend: 'selectAll',
                        text: 'Pilih Semua',
                        className: "btn btn-primary buttons-select-all btn-sm"
                    },
                        @endif
                        @if(Route::current()->action['as'] != 'survey.index')
                    {
                        extend: "selectNone",
                        text: 'Batal Pilih',
                        className: "btn btn-primary buttons-select-none  btn-sm"
                    },
                        @endif

                        @if(Route::current()->action['as'] != 'survey.index')
                    {
                        text: 'Hapus',
                        className: "btn btn-primary btn-sm",
                        action: function (e, dt, node, config) {
                            var ids = JSON.stringify(getIdOfRows($('tr.selected')));
                            if (confirm("Yakin akan menghapus semua data yang dipilih?")) {
                                // $(`#modal-hapus-semua .modal-dialog`).css({
                                //     "position": 'absolute',
                                //     'left' : event.pageX - 170,
                                //     "top": event.pageY - 170
                                // });

                                // $('#modal-hapus-semua').modal('show');

                                location.href = `${locationHrefHapusSemua}?ids=${ids}`;
                            }
                        }
                    },
                        @endif
                    {
                        text: 'Tambah',
                        className: "btn btn-primary btn-sm",
                        action: function (e, dt, node, config) {
                            location.href = locationHrefCreate
                        }
                    },
                    // khusus halaman user
                    // @if(Route::current()->action['as'] == 'user.index') {
                    //     text: 'Aktifkan User',
                    //     className: "btn btn-primary btn-sm",
                    //     action: function (e, dt, node, config) {
                    //         var ids = JSON.stringify(getIdOfRows($('tr.selected')));
                    //         if (confirm("Yakin akan mengaktifkan semua data yang dipilih?")) {
                    //             location.href = `${locationHrefAktifkanSemua}?ids=${ids}`;
                    //         }
                    //     }
                    // },
                    // @endif
                    // @if(Route::current()->action['as'] == 'user.index' && request()->kelas_id) {
                    //     text: 'Naik Kelas',
                    //     className: "btn btn-primary btn-sm",
                    //     action: function (e, dt, node, config) {
                    //         var ids = JSON.stringify(getIdOfRows($('tr.selected')));
                    //         if (confirm(
                    //             "Yakin akan menaikkan kelas untuk siswa yang dipilih?")) {
                    //             location.href = `${locationHrefNaikKelas}?ids=${ids}`;
                    //         }
                    //     }
                    // }
                    // @endif


                    ],
                    select
    :
        true,
    })
        ;
    });
</script>


</body>

</html>
