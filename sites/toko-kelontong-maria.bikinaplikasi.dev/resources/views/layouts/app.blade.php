<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from html.phoenixcoded.net/dasho/bootstrap/default/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 30 Dec 2020 04:25:10 GMT -->
<head>

    <title>{{ env('APP_NAME') }} - {{ env('APP_OBJECT_DESCRIPTION') }}</title>
    <!-- HTML5 Shim and Respond.js IE11 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 11]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="description"
          content="Dasho Bootstrap admin template made using Bootstrap 4 and it has huge amount of ready made feature, UI components, pages which completely fulfills any dashboard needs."/>
    <meta name="keywords"
          content="admin templates, bootstrap admin templates, bootstrap 4, dashboard, dashboard templets, sass admin templets, html admin templates, responsive, bootstrap admin templates free download,premium bootstrap admin templates, Dasho, Dasho bootstrap admin template">
    <meta name="author" content="Phoenixcoded"/>

    <!-- Favicon icon -->
    <link rel="icon" href="{{ url('') }}/assets/images/favicon.svg" type="image/x-icon">
    <!-- fontawesome icon -->
    <link rel="stylesheet" href="{{ url('') }}/assets/fonts/fontawesome/css/fontawesome-all.min.css">
    <!-- animation css -->
    <link rel="stylesheet" href="{{ url('') }}/assets/plugins/animation/css/animate.min.css">


    <!-- notification css -->
    <link rel="stylesheet" href="{{ url('') }}/assets/plugins/notification/css/notification.min.css">

    <!-- vendor css -->
    <link rel="stylesheet" href="{{ url('') }}/assets/css/style.css">

    <link rel="stylesheet" href="{{ url('') }}/assets/plugins/modal-window-effects/css/md-modal.css">

    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i"
          rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.3.1/css/select.dataTables.min.css">
    <link href="{{ url("vendor/datatables/dataTables.bootstrap4.css") }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pretty-checkbox@3.0/dist/pretty-checkbox.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" type="text/css" href="https://npmcdn.com/flatpickr/dist/themes/material_blue.css">

    {{--select2--}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>


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
        #weatherWidget .currentDesc {
            color: #ffffff !important;
        }

        .traffic-chart {
            min-height: 335px;
        }

        #flotPie1 {
            height: 150px;
        }

        #flotPie1 td {
            padding: 3px;
        }

        #flotPie1 table {
            top: 20px !important;
            right: -10px !important;
        }

        .chart-container {
            display: table;
            min-width: 270px;
            text-align: left;
            padding-top: 10px;
            padding-bottom: 10px;
        }

        #flotLine5 {
            height: 105px;
        }

        #flotBarChart {
            height: 150px;
        }

        #cellPaiChart {
            height: 160px;
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
    </style>

    <link href="{{ url("css/style2.css") }}" rel="stylesheet">

</head>

<body class="">
<!-- [ Pre-loader ] start -->
<div class="loader-bg">
    <div class="loader-track">
        <div class="loader-fill"></div>
    </div>
</div>
<!-- [ Pre-loader ] End -->
<!-- [ navigation menu ] start -->
<nav class="pcoded-navbar menupos-fixed menu-dark menu-item-icon-style6 ">
    <div class="navbar-wrapper ">
        <div class="navbar-brand header-logo">
            <a href="{{ url('') }}" class="b-brand">
                <!-- <div class="b-bg">
                    <i class="fas fa-bolt"></i>
                </div>
                <span class="b-title">Dasho</span> -->
                <img src="{{ url('') }}/{{ env('APP_AVATAR_ADMIN') }}" alt="" class="logo images" width="32"
                     height="32"> {{ auth()->user()->level }}
            </a>
        </div>
        <div class="navbar-content scroll-div   ">

            <ul class="nav pcoded-inner-navbar ">
                <li class="nav-item pcoded-menu-caption">
                    <label>Menu</label>
                </li>
                <!--<li data-username="animations" class="nav-item"><a href="landing.html" class="nav-link"><span class="pcoded-micon"><i class="feather icon-aperture"></i></span><span class="pcoded-mtext">New front</span></a></li>-->
                <li data-username="dashboard default ecommerce sales Helpdesk ticket CRM analytics project"
                    class="nav-item pcoded-hasmenu active pcoded-trigger">
                    <ul class="pcoded-submenu">
                        <li class=""><a href="{{ route('tagihan.index') }}" class="">Tagihan</a></li>
                        <li class=""><a href="{{ route('produk.index') }}" class="">Produk</a></li>
                        <li class=""><a href="{{ route('pembeli.index') }}" class="">Pembeli</a></li>
                        
                        @if(auth()->user()->level == 'Admin')
                        <li class=""><a href="{{ route('user.index') }}" class="">User</a></li>
                        @endif
                    </ul>
                </li>
            </ul>

            <ul class="nav pcoded-inner-navbar ">
                <li class="nav-item pcoded-menu-caption">
                    <label>Laporan</label>
                </li>
                <!--<li data-username="animations" class="nav-item"><a href="landing.html" class="nav-link"><span class="pcoded-micon"><i class="feather icon-aperture"></i></span><span class="pcoded-mtext">New front</span></a></li>-->
                <li data-username="dashboard default ecommerce sales Helpdesk ticket CRM analytics project"
                    class="nav-item pcoded-hasmenu active pcoded-trigger">
                    <ul class="pcoded-submenu">
                        <li class=""><a href="{{ route('produk-detail.laporan.index') }}?type=produk_masuk" class="">Produk Masuk</a></li>
                        <li class=""><a href="{{ route('produk-detail.laporan.index') }}?type=produk_keluar" class="">Produk Keluar</a></li>
{{--                        <li class=""><a href="{{ route('produk-detail.laporan.index') }}" class="">Laba / Rugi</a></li>--}}
                    </ul>
                </li>
            </ul>

        </div>

    </div>
</nav>
<!-- [ navigation menu ] end -->


<!-- [ Header ] start -->
<header class="navbar pcoded-header navbar-expand-lg navbar-light headerpos-fixed">

    <div class="m-header">
        <a class="mobile-menu" id="mobile-collapse1" href="#!"><span></span></a>
        <a href="index.html" class="b-brand">
            <!-- <div class="b-bg">
                <i class="fas fa-bolt"></i>
            </div>
            <span class="b-title">Dasho</span> -->
            <img src="{{ url('') }}/assets/images/logo.svg" alt="" class="logo images">
            <img src="{{ url('') }}/assets/images/logo-icon.svg" alt="" class="logo-thumb images">
        </a>
    </div>
    <a class="mobile-menu" id="mobile-header" href="#!">
        <i class="feather icon-more-horizontal"></i>
    </a>
    <div class="collapse navbar-collapse">
        <a href="#!" class="mob-toggler"></a>
        
        <h2 class="ml-4" style="color: #39465C">{{ env('APP_OBJECT_NAME') }}</h2>
        <ul class="navbar-nav ml-auto">
            <li>
                <div class="dropdown drp-user">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="icon feather icon-user"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right profile-notification">
                        <div class="pro-head">
                            <img src="{{ url('') }}/{{ env('APP_AVATAR_ADMIN') }}" class="img-radius"
                                 alt="User-Profile-Image">
                            <span>
										<span class="text-muted">{{ auth()->user()->name }}</span>
										<span class="h6">{{ auth()->user()->email }}</span>
									</span>
                        </div>
                        <ul class="pro-body">
                            <li><a href="{{ route('user.profile', auth()->user()->id) }}" class="dropdown-item"><i
                                        class="feather icon-settings"></i> Profil</a>
                            </li>

                            <li>
                                <a href="#!" class="dropdown-item">
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf

                                        <i class="feather icon-power mr-2"
                                           onclick="event.preventDefault(); if(confirm('Yakin akan logout?')) this.closest('form').submit();"
                                           style="cursor:pointer;">Logout</i>
                                    </form>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </li>
        </ul>
    </div>

</header>
<!-- [ Header ] end -->


<!-- [ chat user list ] start -->
<section class="header-user-list">
    <a href="#!" class="h-close-text"><i class="feather icon-x"></i></a>
    <ul class="nav nav-tabs" id="chatTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active text-uppercase" id="chat-tab" data-toggle="tab" href="#chat" role="tab"
               aria-controls="chat" aria-selected="true"><i class="feather icon-message-circle mr-2"></i>Chat</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-uppercase" id="user-tab" data-toggle="tab" href="#user" role="tab"
               aria-controls="user" aria-selected="false"><i class="feather icon-users mr-2"></i>User</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-uppercase" id="setting-tab" data-toggle="tab" href="#setting" role="tab"
               aria-controls="setting" aria-selected="false"><i class="feather icon-settings mr-2"></i>Setting</a>
        </li>
    </ul>
    <div class="tab-content" id="chatTabContent">
        <div class="tab-pane fade show active" id="chat" role="tabpanel" aria-labelledby="chat-tab">
            <div class="h-list-header">
                <div class="input-group">
                    <input type="text" id="search-friends" class="form-control" placeholder="Search Friend . . .">
                </div>
            </div>
            <div class="h-list-body">
                <div class="main-friend-cont scroll-div">
                    <div class="main-friend-list">
                        <div class="media userlist-box" data-id="1" data-status="online" data-username="Josephin Doe">
                            <a class="media-left" href="#!"><img class="media-object img-radius"
                                                                 src="{{ url('') }}/assets/images/user/avatar-1.jpg"
                                                                 alt="Generic placeholder image ">
                                <div class="live-status">3</div>
                            </a>
                            <div class="media-body">
                                <h6 class="chat-header">Josephin Doe<small class="d-block text-c-green">Typing .
                                        . </small></h6>
                            </div>
                        </div>
                        <div class="media userlist-box" data-id="2" data-status="online" data-username="Lary Doe">
                            <a class="media-left" href="#!"><img class="media-object img-radius"
                                                                 src="{{ url('') }}/assets/images/user/avatar-2.jpg"
                                                                 alt="Generic placeholder image">
                                <div class="live-status">1</div>
                            </a>
                            <div class="media-body">
                                <h6 class="chat-header">Lary Doe<small class="d-block text-c-green">online</small></h6>
                            </div>
                        </div>
                        <div class="media userlist-box" data-id="3" data-status="online" data-username="Alice">
                            <a class="media-left" href="#!"><img class="media-object img-radius"
                                                                 src="{{ url('') }}/assets/images/user/avatar-3.jpg"
                                                                 alt="Generic placeholder image"></a>
                            <div class="media-body">
                                <h6 class="chat-header">Alice<small class="d-block text-c-green">online</small></h6>
                            </div>
                        </div>
                        <div class="media userlist-box" data-id="4" data-status="offline" data-username="Alia">
                            <a class="media-left" href="#!"><img class="media-object img-radius"
                                                                 src="{{ url('') }}/assets/images/user/avatar-1.jpg"
                                                                 alt="Generic placeholder image">
                                <div class="live-status">1</div>
                            </a>
                            <div class="media-body">
                                <h6 class="chat-header">Alia<small class="d-block text-muted">10 min ago</small></h6>
                            </div>
                        </div>
                        <div class="media userlist-box" data-id="5" data-status="offline" data-username="Suzen">
                            <a class="media-left" href="#!"><img class="media-object img-radius"
                                                                 src="{{ url('') }}/assets/images/user/avatar-4.jpg"
                                                                 alt="Generic placeholder image"></a>
                            <div class="media-body">
                                <h6 class="chat-header">Suzen<small class="d-block text-muted">15 min ago</small></h6>
                            </div>
                        </div>
                        <div class="media userlist-box" data-id="1" data-status="online" data-username="Josephin Doe">
                            <a class="media-left" href="#!"><img class="media-object img-radius"
                                                                 src="{{ url('') }}/assets/images/user/avatar-1.jpg"
                                                                 alt="Generic placeholder image ">
                                <div class="live-status">3</div>
                            </a>
                            <div class="media-body">
                                <h6 class="chat-header">Josephin Doe<small class="d-block text-c-green">Typing .
                                        . </small></h6>
                            </div>
                        </div>
                        <div class="media userlist-box" data-id="2" data-status="online" data-username="Lary Doe">
                            <a class="media-left" href="#!"><img class="media-object img-radius"
                                                                 src="{{ url('') }}/assets/images/user/avatar-2.jpg"
                                                                 alt="Generic placeholder image">
                                <div class="live-status">1</div>
                            </a>
                            <div class="media-body">
                                <h6 class="chat-header">Lary Doe<small class="d-block text-c-green">online</small></h6>
                            </div>
                        </div>
                        <div class="media userlist-box" data-id="3" data-status="online" data-username="Alice">
                            <a class="media-left" href="#!"><img class="media-object img-radius"
                                                                 src="{{ url('') }}/assets/images/user/avatar-3.jpg"
                                                                 alt="Generic placeholder image"></a>
                            <div class="media-body">
                                <h6 class="chat-header">Alice<small class="d-block text-c-green">online</small></h6>
                            </div>
                        </div>
                        <div class="media userlist-box" data-id="4" data-status="offline" data-username="Alia">
                            <a class="media-left" href="#!"><img class="media-object img-radius"
                                                                 src="{{ url('') }}/assets/images/user/avatar-1.jpg"
                                                                 alt="Generic placeholder image">
                                <div class="live-status">1</div>
                            </a>
                            <div class="media-body">
                                <h6 class="chat-header">Alia<small class="d-block text-muted">10 min ago</small></h6>
                            </div>
                        </div>
                        <div class="media userlist-box" data-id="5" data-status="offline" data-username="Suzen">
                            <a class="media-left" href="#!"><img class="media-object img-radius"
                                                                 src="{{ url('') }}/assets/images/user/avatar-4.jpg"
                                                                 alt="Generic placeholder image"></a>
                            <div class="media-body">
                                <h6 class="chat-header">Suzen<small class="d-block text-muted">15 min ago</small></h6>
                            </div>
                        </div>
                        <div class="media userlist-box" data-id="1" data-status="online" data-username="Josephin Doe">
                            <a class="media-left" href="#!"><img class="media-object img-radius"
                                                                 src="{{ url('') }}/assets/images/user/avatar-1.jpg"
                                                                 alt="Generic placeholder image ">
                                <div class="live-status">3</div>
                            </a>
                            <div class="media-body">
                                <h6 class="chat-header">Josephin Doe<small class="d-block text-c-green">Typing .
                                        . </small></h6>
                            </div>
                        </div>
                        <div class="media userlist-box" data-id="2" data-status="online" data-username="Lary Doe">
                            <a class="media-left" href="#!"><img class="media-object img-radius"
                                                                 src="{{ url('') }}/assets/images/user/avatar-2.jpg"
                                                                 alt="Generic placeholder image">
                                <div class="live-status">1</div>
                            </a>
                            <div class="media-body">
                                <h6 class="chat-header">Lary Doe<small class="d-block text-c-green">online</small></h6>
                            </div>
                        </div>
                        <div class="media userlist-box" data-id="3" data-status="online" data-username="Alice">
                            <a class="media-left" href="#!"><img class="media-object img-radius"
                                                                 src="{{ url('') }}/assets/images/user/avatar-3.jpg"
                                                                 alt="Generic placeholder image"></a>
                            <div class="media-body">
                                <h6 class="chat-header">Alice<small class="d-block text-c-green">online</small></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="user" role="tabpanel" aria-labelledby="user-tab">
            <div class="h-list-body">
                <div class="main-friend-cont scroll-div">
                    <div class="main-friend-list">
                        <div class="media px-3 d-flex align-items-center mt-3">
                            <a class="media-left m-r-15" href="#!">
                                <div
                                    class="hei-50 wid-50 bg-primary img-radius d-flex text-white f-22 align-items-center justify-content-center">
                                    <i class="icon feather icon-users"></i></div>
                            </a>
                            <div class="media-body">
                                <p class="chat-header f-w-600 mb-0">New Group</p>
                            </div>
                        </div>
                        <div class="media p-3 d-flex align-items-center">
                            <a class="media-left m-r-15" href="#!">
                                <div
                                    class="hei-50 wid-50 bg-primary img-radius d-flex text-white f-22 align-items-center justify-content-center">
                                    <i class="icon feather icon-user-plus"></i></div>
                            </a>
                            <div class="media-body">
                                <p class="chat-header f-w-600 mb-0">New Contact</p>
                            </div>
                        </div>
                        <div class="media userlist-box" data-id="1" data-status="online" data-username="Josephin Doe">
                            <a class="media-left" href="#!"><img class="media-object img-radius"
                                                                 src="{{ url('') }}/assets/images/user/avatar-1.jpg"
                                                                 alt="Generic placeholder image "></a>
                            <div class="media-body">
                                <p class="chat-header">Josephin Doe<small class="d-block">i am not what happened .
                                        .</small></p>
                            </div>
                        </div>
                        <div class="media userlist-box" data-id="2" data-status="online" data-username="Lary Doe">
                            <a class="media-left" href="#!"><img class="media-object img-radius"
                                                                 src="{{ url('') }}/assets/images/user/avatar-2.jpg"
                                                                 alt="Generic placeholder image"></a>
                            <div class="media-body">
                                <h6 class="chat-header">Lary Doe<small class="d-block">Avalable</small></h6>
                            </div>
                        </div>
                        <div class="media userlist-box" data-id="3" data-status="online" data-username="Alice">
                            <a class="media-left" href="#!"><img class="media-object img-radius"
                                                                 src="{{ url('') }}/assets/images/user/avatar-3.jpg"
                                                                 alt="Generic placeholder image"></a>
                            <div class="media-body">
                                <h6 class="chat-header">Alice<small class="d-block">hear using Dasho</small></h6>
                            </div>
                        </div>
                        <div class="media userlist-box" data-id="4" data-status="offline" data-username="Alia">
                            <a class="media-left" href="#!">
                                <div
                                    class="hei-50 wid-50 img-radius bg-success d-flex text-white f-22 align-items-center justify-content-center">
                                    A
                                </div>
                            </a>
                            <div class="media-body">
                                <h6 class="chat-header">Alia<small class="d-block text-muted">Avalable</small></h6>
                            </div>
                        </div>
                        <div class="media userlist-box" data-id="5" data-status="offline" data-username="Suzen">
                            <a class="media-left" href="#!"><img class="media-object img-radius"
                                                                 src="{{ url('') }}/assets/images/user/avatar-4.jpg"
                                                                 alt="Generic placeholder image"></a>
                            <div class="media-body">
                                <h6 class="chat-header">Suzen<small class="d-block text-muted">Avalable</small></h6>
                            </div>
                        </div>
                        <div class="media userlist-box" data-id="1" data-status="online" data-username="Josephin Doe">
                            <a class="media-left" href="#!">
                                <div
                                    class="hei-50 wid-50 bg-danger img-radius d-flex text-white f-22 align-items-center justify-content-center">
                                    JD
                                </div>
                            </a>
                            <div class="media-body">
                                <h6 class="chat-header">Josephin Doe<small class="d-block text-muted">Don't send me
                                        image</small></h6>
                            </div>
                        </div>
                        <div class="media userlist-box" data-id="2" data-status="online" data-username="Lary Doe">
                            <a class="media-left" href="#!"><img class="media-object img-radius"
                                                                 src="{{ url('') }}/assets/images/user/avatar-2.jpg"
                                                                 alt="Generic placeholder image"></a>
                            <div class="media-body">
                                <h6 class="chat-header">Lary Doe<small class="d-block text-muted">not send free
                                        msg</small></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="setting" role="tabpanel" aria-labelledby="setting-tab">
            <div class="p-4 main-friend-cont scroll-div">
                <h6 class="mt-2"><i class="feather icon-monitor mr-2"></i>Desktop settings</h6>
                <hr>
                <div class="form-group mb-0">
                    <div class="switch switch-primary d-inline m-r-10">
                        <input type="checkbox" id="cn-p-1" checked>
                        <label for="cn-p-1" class="cr"></label>
                    </div>
                    <label class="f-w-600">Allow desktop notification</label>
                </div>
                <p class="text-muted ml-5">You get latest content at a time when data will updated</p>
                <div class="form-group mb-0">
                    <div class="switch switch-primary d-inline m-r-10">
                        <input type="checkbox" id="cn-p-5">
                        <label for="cn-p-5" class="cr"></label>
                    </div>
                    <label class="f-w-600">Store Cookie</label>
                </div>
                <h6 class="mb-0 mt-5"><i class="feather icon-layout mr-2"></i>Application settings</h6>
                <hr>
                <div class="form-group mb-0">
                    <div class="switch switch-primary d-inline m-r-10">
                        <input type="checkbox" id="cn-p-3" checked>
                        <label for="cn-p-3" class="cr"></label>
                    </div>
                    <label class="f-w-600">Backup Storage</label>
                </div>
                <p class="text-muted mb-0 ml-5">Automaticaly take backup as par schedule</p>
                <div class="form-group mb-4">
                    <div class="switch switch-primary d-inline m-r-10">
                        <input type="checkbox" id="cn-p-4" checked>
                        <label for="cn-p-4" class="cr"></label>
                    </div>
                    <label class="f-w-600">Allow guest to print file</label>
                </div>
                <h6 class="mb-0 mt-5"><i class="feather icon-globe mr-2"></i>System settings</h6>
                <hr>
                <div class="form-group mb-0">
                    <div class="switch switch-primary d-inline m-r-10">
                        <input type="checkbox" id="cn-p-2">
                        <label for="cn-p-2" class="cr"></label>
                    </div>
                    <label class="f-w-600">View other user chat</label>
                </div>
                <p class="text-muted ml-5">Allow to show public user message</p>
            </div>
        </div>
    </div>
</section>
<!-- [ chat user list ] end -->

<!-- [ chat message ] start -->
<section class="header-chat">
    <div class="h-list-header">
        <h6>Josephin Doe</h6>
        <a href="#!" class="h-back-user-list"><i class="feather icon-chevron-left"></i></a>
    </div>
    <div class="h-list-body">
        <div class="main-chat-cont scroll-div">
            <div class="main-friend-chat">
                <div class="media chat-messages">
                    <a class="media-left photo-table" href="#!"><img class="media-object img-radius img-radius m-t-5"
                                                                     src="{{ url('') }}/assets/images/user/avatar-2.jpg"
                                                                     alt="Generic placeholder image"></a>
                    <div class="media-body chat-menu-content">
                        <div class="">
                            <p class="chat-cont">hello tell me something</p>
                            <p class="chat-cont">about yourself?</p>
                        </div>
                        <p class="chat-time">8:20 a.m.</p>
                    </div>
                </div>
                <div class="media chat-messages">
                    <div class="media-body chat-menu-reply">
                        <div class="">
                            <p class="chat-cont">Ohh! very nice</p>
                        </div>
                        <p class="chat-time">8:22 a.m.</p>
                    </div>
                    <a class="media-right photo-table" href="#!"><img class="media-object img-radius img-radius m-t-5"
                                                                      src="{{ url('') }}/assets/images/user/avatar-1.jpg"
                                                                      alt="Generic placeholder image"></a>
                </div>
                <div class="media chat-messages">
                    <a class="media-left photo-table" href="#!"><img class="media-object img-radius img-radius m-t-5"
                                                                     src="{{ url('') }}/assets/images/user/avatar-2.jpg"
                                                                     alt="Generic placeholder image"></a>
                    <div class="media-body chat-menu-content">
                        <div class="">
                            <p class="chat-cont">can you help me?</p>
                        </div>
                        <p class="chat-time">8:20 a.m.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="h-list-footer">
        <div class="input-group">
            <input type="file" class="chat-attach" style="display:none">
            <a href="#!" class="input-group-prepend btn btn-success btn-attach">
                <i class="feather icon-paperclip"></i>
            </a>
            <input type="text" name="h-chat-text" class="form-control h-send-chat" placeholder="Write hear . . ">
            <button type="submit" class="input-group-append btn-send btn btn-primary">
                <i class="feather icon-message-circle"></i>
            </button>
        </div>
    </div>
</section>
<!-- [ chat message ] end -->

<script src="{{ url('') }}/assets/js/jquery.min.js"></script>
@yield('content')

<!-- Required Js -->
<script src="{{ url('') }}/assets/js/vendor-all.min.js"></script>
<script src="{{ url('') }}/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="{{ url('') }}/assets/js/pcoded.min.js"></script>
<script src="{{ url('') }}/assets/js/menu-setting.min.js"></script>


<!-- am chart js -->
<script src="{{ url('') }}/assets/plugins/chart-am4/js/core.js"></script>
<script src="{{ url('') }}/assets/plugins/chart-am4/js/charts.js"></script>
<script src="{{ url('') }}/assets/plugins/chart-am4/js/animated.js"></script>
<script src="{{ url('') }}/assets/plugins/chart-am4/js/maps.js"></script>
<script src="{{ url('') }}/assets/plugins/chart-am4/js/worldLow.js"></script>
<script src="{{ url('') }}/assets/plugins/chart-am4/js/continentsLow.js"></script>

<!-- dashboard-custom js -->
<script src="{{ url('') }}/assets/js/pages/dashboard-analytics.js"></script>

<script src="{{ url('') }}/assets/plugins/modal-window-effects/js/classie.js"></script>
<script src="{{ url('') }}/assets/plugins/modal-window-effects/js/modalEffects.js"></script>


{{-- datatable --}}
<script src="{{ url("vendor/datatables/jquery.dataTables.js") }}"></script>
<script src="{{ url("vendor/datatables/dataTables.bootstrap4.js") }}"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.flash.min.js"></script>
<script src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js"></script>


{{-- dropzone --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/min/dropzone.min.js"></script>


{{-- flatpickr --}}
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://npmcdn.com/flatpickr/dist/l10n/id.js"></script>

@if(request()->segment(1) != 'dashboard')
    <script>
        $(document).ready(function () {


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
                dateFormat: "d-M-Y",
                locale: 'id'
            });

            // flatpickr
            $(".flatpickr2").flatpickr({
                enableTime: false,
                dateFormat: "d-M-Y H:i",
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
            {{--CKEDITOR.config.filebrowserUploadMethod = 'form';--}}

            {{--// ini adalah inisialisasi setiap ck editor, dari id 0 sampai 3, jadi kalo perlu ckeditornya--}}
            {{--// kita tinggal pasang aja id yang tersedia dibawah ini, dan ck editor pun langsung tampil--}}
            {{--CKEDITOR.replace('editor-0', {--}}
            {{--    height: 200,--}}
            {{--    filebrowserUploadUrl: "{{ url('ckeditor/upload') }}"--}}
            {{--});--}}
            {{--CKEDITOR.replace('editor-1', {--}}
            {{--    height: 200,--}}
            {{--    filebrowserUploadUrl: "{{ url('ckeditor/upload') }}"--}}
            {{--});--}}
            {{--CKEDITOR.replace('editor-2', {--}}
            {{--    height: 200,--}}
            {{--    filebrowserUploadUrl: "{{ url('ckeditor/upload') }}"--}}
            {{--});--}}
            {{--CKEDITOR.replace('editor-3', {--}}
            {{--    height: 200,--}}
            {{--    filebrowserUploadUrl: "{{ url('ckeditor/upload') }}"--}}
            {{--});--}}
            {{--CKEDITOR.replace('editor-4', {--}}
            {{--    height: 200,--}}
            {{--    filebrowserUploadUrl: "{{ url('ckeditor/upload') }}"--}}
            {{--});--}}

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
            {{--        @if(old('bobot') != "")--}}
            {{--        @foreach(old('bobot') as $index => $bobot)--}}
            {{--        CKEDITOR.replace(`editor-{{ $index }}`, {--}}
            {{--            height: 200,--}}
            {{--            filebrowserUploadUrl: "{{ url('ckeditor/upload') }}"--}}
            {{--        })--}}
            {{--        @endforeach--}}
            {{--        @endif--}}

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
                pageLength: 10,
                dom: 'Blfrtip',
                "columnDefs": [{
                    "orderable": false,
                    "targets": columnOrders
                }],
                buttons: tampilkan_buttons === false ? (button_manual === false ? [] : button_manual) :
                    [{
                        extend: 'selectAll',
                        text: 'Pilih Semua',
                        className: "btn btn-success-2 buttons-select-all btn-sm"
                    },
                        {
                            extend: "selectNone",
                            text: 'Batal Pilih',
                            className: "btn btn-success-2 buttons-select-none  btn-sm"
                        },
                        {
                            text: 'Hapus',
                            className: "btn btn-success-2 btn-sm",
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
                        {
                            text: 'Tambah',
                            className: "btn btn-success-2 btn-sm",
                            action: function (e, dt, node, config) {
                                location.href = locationHrefCreate
                            }
                        },
                        // khusus halaman user
                        // @if(Route::current()->action['as'] == 'user.index') {
                        //     text: 'Aktifkan User',
                        //     className: "btn btn-success-2 btn-sm",
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
                        //     className: "btn btn-success-2 btn-sm",
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
@endif

</body>
</html>
