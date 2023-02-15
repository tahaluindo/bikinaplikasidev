<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from admin.pixelstrap.com/poco/ltr/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 30 Dec 2020 03:51:29 GMT -->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Aplikasi Sekolah - {{ env('APP_OBJECT_NAME') }}</title>

    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ url('') }}/assets2/css/fontawesome.css">
    <link rel="stylesheet" type="text/css" href="{{ url('') }}/assets2/css/icofont.css">
    <link rel="stylesheet" type="text/css" href="{{ url('') }}/assets2/css/themify.css">
    <link rel="stylesheet" type="text/css" href="{{ url('') }}/assets2/css/flag-icon.css">
    <link rel="stylesheet" type="text/css" href="{{ url('') }}/assets2/css/feather-icon.css">
    <link rel="stylesheet" type="text/css" href="{{ url('') }}/assets2/css/animate.css">
    <link rel="stylesheet" type="text/css" href="{{ url('') }}/assets2/css/chartist.css">
    <link rel="stylesheet" type="text/css" href="{{ url('') }}/assets2/css/date-picker.css">
    <link rel="stylesheet" type="text/css" href="{{ url('') }}/assets2/css/prism.css">
    <link rel="stylesheet" type="text/css" href="{{ url('') }}/assets2/css/material-design-icon.css">
    <link rel="stylesheet" type="text/css" href="{{ url('') }}/assets2/css/pe7-icon.css">
    <link rel="stylesheet" type="text/css" href="{{ url('') }}/assets2/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="{{ url('') }}/assets2/css/style.css">
    <link id="color" rel="stylesheet" href="{{ url('') }}/assets2/css/color-1.css" media="screen">
    <link rel="stylesheet" type="text/css" href="{{ url('') }}/assets2/css/responsive.css">

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
<body>

<!-- Loader ends-->
<!-- page-wrapper Start-->
<div class="page-wrapper">
    <!-- Page Header Start-->
    <div class="page-main-header">
        <div class="main-header-right">
            <div class="main-header-left text-center">
                <div class="logo-wrapper"><a href="{{ url('/dashboard') }}"><h2
                            class="page-header">{{ auth()->user()->level }}</h2></a>
                </div>
            </div>
            <div class="vertical-mobile-sidebar"><i class="fa fa-bars sidebar-bar"> </i></div>
            <div class="nav-right col pull-right right-menu">
                <ul class="nav-menus pull-right ">

                    <li><a class="text-dark" href="#!" onclick="javascript:toggleFullScreen()"><i
                                data-feather="maximize"></i></a></li>

                    <li class="onhover-dropdown"><img style="width: 45px !important; height: 40px !important;"
                                                      class="img-fluid img-shadow-warning"
                                                      src="{{ url('') }}/assets2/images/dashboard/notification.png"
                                                      alt="">
                        <ul class="onhover-show-div notification-dropdown">
                            <li class="gradient-primary">
                                <h5 class="f-w-700">Notifikasi</h5><span>Kamu memiliki {{ $notifs->count() }} notifikasi pendaftaran</span>
                            </li>

                            @forelse($notifs as $item)
                                <li>
                                    <div class="media">
                                        <div class="notification-icons bg-success mr-3"><i class="mt-0"
                                                                                           data-feather="thumbs-up"></i>
                                        </div>
                                        <div class="media-body">

                                            <a href="{{ route('siswa.show', $item->id) }}">
                                                <h6>{{ $item->nama }}</h6>
                                            </a>

                                            <p class="mb-0"> {{ \Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</p>
                                        </div>
                                    </div>
                                </li>
                            @empty
                                <li>
                                    <strong>Belum ada notifikasi</strong>
                                </li>
                            @endforelse

                            <li class="bg-light txt-dark"><a href="{{ route('siswa.index') }}">Semua </a> notifikasi
                            </li>
                        </ul>
                    </li>

                    <li class="onhover-dropdown"><span class="media user-header"><img
                                style="width: 50px !important; height: 50px !important;" class="img-fluid"
                                src="{{ url('') }}/assets2/images/dashboard/user.png"
                                alt=""></span>
                        <ul class="onhover-show-div profile-dropdown">
                            <li class="gradient-primary">
                                <h5 class="f-w-600 mb-0">{{ auth()->user()->name }}</h5>
                                <span>{{ auth()->user()->level }}</span>
                            </li>
                            <li>
                                <a href="{{ route('user.profile', auth()->user()->id) }}">
                                    <i data-feather="user"></i>Profile
                                </a>
                            </li>
                            <li>

                                <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                                    @csrf
                                    <a onclick="event.preventDefault(); if(confirm('Yakin akan logout?')) this.closest('form').submit();"
                                       href="javascript:void(0)">

                                        <i data-feather="log-out" class="mr-2"

                                           style="cursor:pointer;"> </i> Logout</a>
                                </form>

                            </li>
                        </ul>
                    </li>
                </ul>
                <div class="d-lg-none mobile-toggle pull-right"><i data-feather="more-horizontal"></i></div>
            </div>
            <script id="result-template" type="text/x-handlebars-template">
                <div class="ProfileCard u-cf">
                    <div class="ProfileCard-avatar"><i class="pe-7s-home"></i></div>
                    <div class="ProfileCard-details">
                        <div class="ProfileCard-realName">Nama</div>
                    </div>
                </div>
            </script>
            <script id="empty-template" type="text/x-handlebars-template">
                <div class="EmptyMessage">Your search turned up 0 results. This most likely means the backend is down,
                    yikes!
                </div></script>
        </div>
    </div>
    <!-- Page Header Ends -->
    <!-- Page Body Start -->
    <div class="page-body-wrapper">
        <!-- Page Sidebar Start-->
        <div class="iconsidebar-menu">
            <div class="sidebar">
                <ul class="iconMenu-bar custom-scrollbar">
                    <li class="open">
                        <a class="bar-icons" href="{{ url('dashboard') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-thermometer">
                                <path d="M14 14.76V3.5a2.5 2.5 0 0 0-5 0v11.26a4.5 4.5 0 1 0 5 0z"></path>
                            </svg>
                            <span>Beranda</span>
                        </a>
                    </li>

                    <li class="">
                        <a class="bar-icons" href="javascript:void(0)">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-menu">
                                <line x1="3" y1="12" x2="21" y2="12"></line>
                                <line x1="3" y1="6" x2="21" y2="6"></line>
                                <line x1="3" y1="18" x2="21" y2="18"></line>
                            </svg>
                            <span>Menu</span>
                        </a>

                        <ul class="iconbar-mainmenu custom-scrollbar">
                            @if(in_array(auth()->user()->level, ['Admin']))
                                <li><a href="{{ route('mapel.index') }}">Mapel</a></li>
                            @endif

                            @if(in_array(auth()->user()->level, ['Admin']))
                                <li><a href="{{ route('guru.index') }}">Guru</a></li>
                            @endif

                            @if(in_array(auth()->user()->level, ['Admin', ]))
                                <li><a href="{{ route('siswa.index') }}">Siswa</a></li>
                            @endif

                            @if(in_array(auth()->user()->level, ['Guru']))
                                <li><a href="{{ route('siswa.index') }}">Progress</a></li>
                            @endif

                            @if(in_array(auth()->user()->level, ['Admin']))
                                <li><a href="{{ route('jenjang.index') }}">Jenjang</a></li>
                            @endif

                            @if(in_array(auth()->user()->level, ['Admin']))
                                <li><a href="{{ route('kelas.index') }}">Kelas</a></li>
                            @endif

                            @if(in_array(auth()->user()->level, ['Admin']))
                                <li><a href="{{ route('fasilitas.index') }}">Fasilitas</a></li>
                            @endif

                            @if(in_array(auth()->user()->level, ['Admin', 'Siswa']))
                                <li><a href="{{ route('pembayaran.index') }}">Pembayaran</a></li>
                            @endif

                            @if(in_array(auth()->user()->level, ['', 'Siswa', '']))
                                <li><a href="{{ route('progress.index') }}">Progress</a></li>
                            @endif

                        </ul>
                    </li>

                    @if(in_array(auth()->user()->level, ['Admin']))
                        <li>
                            <a class="bar-icons" href="javascript:void(0)">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" class="feather feather-printer">
                                    <polyline points="6 9 6 2 18 2 18 9"></polyline>
                                    <path
                                        d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"></path>
                                    <rect x="6" y="14" width="12" height="8"></rect>
                                </svg>
                                <span>Laporan    </span>
                            </a>
                            <ul class="iconbar-mainmenu custom-scrollbar">
                                <li><a href="{{ route('siswa.laporan.index') }}">Siswa</a></li>
                                <li><a href="{{ route('pembayaran.laporan.index') }}">Pembayaran</a></li>
                            </ul>
                        </li>
                    @endif

                    @if(in_array(auth()->user()->level, ['Admin']))
                        <li>
                            <a class="bar-icons" href="javascript:void(0)">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" class="feather feather-settings">
                                    <circle cx="12" cy="12" r="3"></circle>
                                    <path
                                        d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path>
                                </svg>
                                <span>Pengatur</span>
                            </a>
                            <ul class="iconbar-mainmenu custom-scrollbar">
                                <li><a href="{{ route('pengaturan.hero-section.index') }}">Hero Section</a></li>
                                <li><a href="{{ route('pengaturan.tentang.index') }}">Tentang</a></li>
                                {{-- <li><a href="{{ route('pengaturan.batas-akhir-registrasi.index') }}">Batas Akhir
                                        Registrasi</a></li> --}}
                                {{--                            <li><a href="{{ route('pengaturan.prestasi.index') }}">Prestasi</a></li>--}}
                                {{-- <li><a href="{{ route('pengaturan.review.index') }}">Review</a></li> --}}
                                <li><a href="{{ route('pengaturan.logo.index') }}">Logo</a></li>
                                {{-- <li><a href="{{ route('pengaturan.angkatan-registrasi.index') }}">Angkatan
                                        Registrasi</a>
                                </li> --}}
                                <li><a href="{{ route('pengaturan.logo-kerjasama.index') }}">Logo Kerjasama</a></li>
                            </ul>
                        </li>
                    @endif

                </ul>
            </div>
        </div>
        <!-- Page Sidebar Ends-->


        <!-- Right sidebar Start-->
        <div class="right-sidebar" id="right_side_bar">
            <div>
                <div class="container p-0">
                    <div class="modal-header p-l-20 p-r-20">
                        <div class="col-sm-8 p-0">
                            <h6 class="modal-title font-weight-bold">Contacts Status</h6>
                        </div>
                        <div class="col-sm-4 text-right p-0"><i class="mr-2" data-feather="settings"></i></div>
                    </div>
                </div>
                <div class="friend-list-search mt-0">
                    <input type="text" placeholder="search friend"><i class="fa fa-search"></i>
                </div>
                <div class="p-l-30 p-r-30">
                    <div class="chat-box">
                        <div class="people-list friend-list">
                            <ul class="list">
                                <li class="clearfix">
                                    <div class="status-circle away"></div>
                                    <div class="about">
                                        <div class="name">Ain Chavez</div>
                                        <div class="status"> 28 minutes ago</div>
                                    </div>
                                </li>
                                <li class="clearfix">
                                    <div class="status-circle online"></div>
                                    <div class="about">
                                        <div class="name">Kori Thomas</div>
                                        <div class="status"> Online</div>
                                    </div>
                                </li>
                                <li class="clearfix">
                                    <div class="status-circle online"></div>
                                    <div class="about">
                                        <div class="name">Erica Hughes</div>
                                        <div class="status"> Online</div>
                                    </div>
                                </li>
                                <li class="clearfix">
                                    <div class="status-circle offline"></div>
                                    <div class="about">
                                        <div class="name">Ginger Johnston</div>
                                        <div class="status"> 2 minutes ago</div>
                                    </div>
                                </li>
                                <li class="clearfix">
                                    <div class="status-circle away"></div>
                                    <div class="about">
                                        <div class="name">Prasanth Anand</div>
                                        <div class="status"> 2 hour ago</div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- latest jquery-->
        <script src="{{ url('') }}/assets2/js/jquery-3.5.1.min.js"></script>

        @yield('content')

        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 footer-copyright">
                        <p class="mb-0">Copyright © {{ date('Y') }} {{ env('APP_NAME') }}. All rights reserved.</p>
                    </div>
                    <div class="col-md-6">
                        <p class="pull-right mb-0">Hand-crafted & made with
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                                 fill="#fd517d" stroke="#fd517d" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-heart">
                                <path
                                    d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                            </svg>
                        </p>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>

<!-- Bootstrap js-->
<script src="{{ url('') }}/assets2/js/bootstrap/popper.min.js"></script>
<script src="{{ url('') }}/assets2/js/bootstrap/bootstrap.js"></script>
<!-- feather icon js-->
<script src="{{ url('') }}/assets2/js/icons/feather-icon/feather.min.js"></script>
<script src="{{ url('') }}/assets2/js/icons/feather-icon/feather-icon.js"></script>
<!-- Sidebar jquery-->
<script src="{{ url('') }}/assets2/js/sidebar-menu.js"></script>
<script src="{{ url('') }}/assets2/js/config.js"></script>
<!-- Plugins JS start-->
<script src="{{ url('') }}/assets2/js/typeahead/handlebars.js"></script>
<script src="{{ url('') }}/assets2/js/typeahead/typeahead.bundle.js"></script>
<script src="{{ url('') }}/assets2/js/typeahead/typeahead.custom.js"></script>
<script src="{{ url('') }}/assets2/js/typeahead-search/handlebars.js"></script>
<script src="{{ url('') }}/assets2/js/typeahead-search/typeahead-custom.js"></script>
<script src="{{ url('') }}/assets2/js/chart/chartist/chartist.js"></script>
<script src="{{ url('') }}/assets2/js/chart/chartist/chartist-plugin-tooltip.js"></script>
<script src="{{ url('') }}/assets2/js/chart/apex-chart/apex-chart.js"></script>
<script src="{{ url('') }}/assets2/js/chart/apex-chart/stock-prices.js"></script>
<script src="{{ url('') }}/assets2/js/prism/prism.min.js"></script>
<script src="{{ url('') }}/assets2/js/clipboard/clipboard.min.js"></script>
<script src="{{ url('') }}/assets2/js/counter/jquery.waypoints.min.js"></script>
<script src="{{ url('') }}/assets2/js/counter/jquery.counterup.min.js"></script>
<script src="{{ url('') }}/assets2/js/counter/counter-custom.js"></script>
<script src="{{ url('') }}/assets2/js/custom-card/custom-card.js"></script>

<script src="{{ url('') }}/assets2/js/dashboard/default.js"></script>

<script src="{{ url('') }}/assets2/js/datepicker/date-picker/datepicker.js"></script>
<script src="{{ url('') }}/assets2/js/datepicker/date-picker/datepicker.en.js"></script>
<script src="{{ url('') }}/assets2/js/datepicker/date-picker/datepicker.custom.js"></script>
<script src="{{ url('') }}/assets2/js/chat-menu.js"></script>
<!-- Plugins JS Ends-->
<!-- Theme js-->
<script src="{{ url('') }}/assets2/js/script.js"></script>
<!-- login js-->
<!-- Plugin used-->


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

{{--ck editor--}}
{{--<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>--}}

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


            {{--// ini harus dibuat supaya ck editor bisa upload gambar--}}
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
                        className: "btn buttons-select-all btn-sm"
                    },
                        {
                            extend: "selectNone",
                            text: 'Batal Pilih',
                            className: "btnbuttons-select-none  btn-sm"
                        },
                        {
                            text: 'Hapus',
                            className: "btn btn-sm",
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
                            className: "btn btn-sm",
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