<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="bootstrap admin template">
    <meta name="author" content="">

    <title><?php echo e(env('APP_OBJECT_NAME')); ?> | <?php echo e(env('APP_OBJECT_DESCRIPTION')); ?></title>


    <link rel="apple-touch-icon" href="<?php echo e(url('assets')); ?>/images/apple-touch-icon.png">
    <link rel="shortcut icon" href="<?php echo e(url('assets')); ?>/images/favicon.ico">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="<?php echo e(url('global')); ?>/css/bootstrap.min599c.css?v4.0.2">
    <link rel="stylesheet" href="<?php echo e(url('global')); ?>/css/bootstrap-extend.min599c.css?v4.0.2">
    <link rel="stylesheet" href="<?php echo e(url('assets')); ?>/css/site.min599c.css?v4.0.2">

    <!-- Skin tools (demo site only) -->
    <link rel="stylesheet" href="<?php echo e(url('global')); ?>/css/skintools.min599c.css?v4.0.2">
    <script src="<?php echo e(url('assets')); ?>/js/Plugin/skintools.min599c.js?v4.0.2"></script>

    <!-- Plugins -->
    <link rel="stylesheet" href="<?php echo e(url('global')); ?>/vendor/animsition/animsition.min599c.css?v4.0.2">
    <link rel="stylesheet" href="<?php echo e(url('global')); ?>/vendor/asscrollable/asScrollable.min599c.css?v4.0.2">
    <link rel="stylesheet" href="<?php echo e(url('global')); ?>/vendor/switchery/switchery.min599c.css?v4.0.2">
    <link rel="stylesheet" href="<?php echo e(url('global')); ?>/vendor/intro-js/introjs.min599c.css?v4.0.2">
    <link rel="stylesheet" href="<?php echo e(url('global')); ?>/vendor/slidepanel/slidePanel.min599c.css?v4.0.2">
    <link rel="stylesheet" href="<?php echo e(url('global')); ?>/vendor/flag-icon-css/flag-icon.min599c.css?v4.0.2">

    <!-- Plugins For This Page -->
    <link rel="stylesheet" href="<?php echo e(url('global')); ?>/vendor/chartist/chartist.min599c.css?v4.0.2">
    <link rel="stylesheet" href="<?php echo e(url('global')); ?>/vendor/aspieprogress/asPieProgress.min599c.css?v4.0.2">

    <!-- Page -->
    <link rel="stylesheet" href="<?php echo e(url('assets')); ?>/examples/css/dashboard/v2.min599c.css?v4.0.2">

    <!-- Fonts -->
    <link rel="stylesheet" href="<?php echo e(url('global')); ?>/fonts/web-icons/web-icons.min599c.css?v4.0.2">
    <link rel="stylesheet" href="<?php echo e(url('global')); ?>/fonts/brand-icons/brand-icons.min599c.css?v4.0.2">
    <link rel='stylesheet' href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic">

<!--[if lt IE 9]>
    <script src="<?php echo e(url('')); ?>/global/vendor/html5shiv/html5shiv.min.js?v4.0.2"></script>
    <![endif]-->

<!--[if lt IE 10]>
    <script src="<?php echo e(url('')); ?>/global/vendor/media-match/media.match.min.js?v4.0.2"></script>
    <script src="<?php echo e(url('')); ?>/global/vendor/respond/respond.min.js?v4.0.2"></script>
    <![endif]-->

    <!-- Scripts -->
    <script src="<?php echo e(url('')); ?>/global/vendor/breakpoints/breakpoints.min599c.js?v4.0.2"></script>
    <script>
        Breakpoints();
    </script>


    <?php if(!preg_match("/localhost/", $_SERVER['HTTP_HOST'])): ?>
        <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <?php endif; ?>

<!-- BOOTSTRAP STYLES-->
    
<!-- FONTAWESOME STYLES-->
    <link href="<?php echo e(url('assets')); ?>/css/font-awesome.css" rel="stylesheet"/>
    <!--CUSTOM BASIC STYLES-->
    <link href="<?php echo e(url('assets')); ?>/css/basic.css" rel="stylesheet"/>
    <!--CUSTOM MAIN STYLES-->
    <link href="<?php echo e(url('assets')); ?>/css/custom.css" rel="stylesheet"/>
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'/>

    
    <link href="<?php echo e(url('lumino/css/font-awesome.min.css' )); ?>" rel="stylesheet">

    
    <link href="<?php echo e(url('lumino/css/datepicker3.css' )); ?>" rel="stylesheet">

    
    <link href="<?php echo e(url('css')); ?>/dropzone.min.css" rel="stylesheet">

    <!--Custom Font-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i"
          rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(url('css')); ?>/select.dataTables.min.css">
    <link href="<?php echo e(url("vendor/datatables/dataTables.bootstrap4.css")); ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(url('css')); ?>/pretty-checkbox.min.css">
    <link rel="stylesheet" href="<?php echo e(url('css')); ?>/flatpickr.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo e(url('css')); ?>//material_blue.css">

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

        @keyframes  fadein {
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

        @keyframes  fadeout {
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

    </style>

    <link href="<?php echo e(url("css/style.css")); ?>" rel="stylesheet">
</head>
<body class="animsition dashboard">
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade
    your browser</a> to improve your experience.</p>
<![endif]-->

<nav class="site-navbar navbar navbar-default navbar-fixed-top navbar-mega navbar-inverse bg-indigo-600"
     role="navigation">

    <div class="navbar-header">
        <button type="button" class="navbar-toggler hamburger hamburger-close navbar-toggler-left hided"
                data-toggle="menubar">
            <span class="sr-only">Toggle navigation</span>
            <span class="hamburger-bar"></span>
        </button>
        <button type="button" class="navbar-toggler collapsed" data-target="#site-navbar-collapse"
                data-toggle="collapse">
            <i class="icon wb-more-horizontal" aria-hidden="true"></i>
        </button>
        <div class="navbar-brand navbar-brand-center">


            <span class="navbar-brand-text hidden-xs-down"> <img src="<?php echo e(url('image/logo.png')); ?>" height="40"
                                                                 style="margin-top: -10px;">  <?php echo e(env('APP_OBJECT_NAME')); ?></span>
        </div>
        <button type="button" class="navbar-toggler collapsed" data-target="#site-navbar-search"
                data-toggle="collapse">
            <span class="sr-only">Toggle Search</span>
            <i class="icon wb-search" aria-hidden="true"></i>
        </button>
    </div>

    <div class="navbar-container container-fluid">
        <!-- Navbar Collapse -->
        <div class="collapse navbar-collapse navbar-collapse-toolbar" id="site-navbar-collapse">
            <!-- Navbar Toolbar -->

            <!-- End Navbar Toolbar -->

            <!-- Navbar Toolbar Right -->
            <ul class="nav navbar-toolbar navbar-right navbar-toolbar-right">
                <li class="nav-item dropdown">
                    <a class="nav-link navbar-avatar" data-toggle="dropdown" href="#"
                       data-animation="scale-up" role="button">
              <span class="avatar avatar-online">
                <img src="<?php echo e(url('')); ?>/global/portraits/5.jpg" alt="...">
                <i></i>
              </span>
                    </a>
                    <div class="dropdown-menu" role="menu">
                        <a class="dropdown-item" href="<?php echo e(route('user.profile', auth()->user()->id)); ?>" role="menuitem"><i
                                class="icon wb-settings"
                                aria-hidden="true"></i>
                            Settings</a>
                        <div class="dropdown-divider" role="presentation"></div>


                        <form method="POST" action="<?php echo e(route('logout')); ?>">
                            <?php echo csrf_field(); ?>

                            <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                               onclick="event.preventDefault(); if(confirm('Yakin akan logut?')) this.closest('form').submit(); ">
                                <i class="icon wb-power"></i> Logout
                            </a>
                        </form>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="javascript:void(0)" title="Notifications"
                       data-animation="scale-up" role="button">
                        <i class="icon wb-bell" aria-hidden="true"></i>
                        <span class="badge badge-pill badge-danger up">5</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-media" role="menu">
                        <div class="dropdown-menu-header">
                            <h5>NOTIFICATIONS</h5>
                            <span class="badge badge-round badge-danger">New 5</span>
                        </div>

                        <div class="list-group">
                            <div data-role="container">
                                <div data-role="content">
                                    <a class="list-group-item dropdown-item" href="javascript:void(0)" role="menuitem">
                                        <div class="media">
                                            <div class="pr-10">
                                                <i class="icon wb-order bg-red-600 white icon-circle"
                                                   aria-hidden="true"></i>
                                            </div>
                                            <div class="media-body">
                                                <h6 class="media-heading">A new order has been placed</h6>
                                                <time class="media-meta" datetime="2018-06-12T20:50:48+08:00">5 hours
                                                    ago
                                                </time>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="list-group-item dropdown-item" href="javascript:void(0)" role="menuitem">
                                        <div class="media">
                                            <div class="pr-10">
                                                <i class="icon wb-user bg-green-600 white icon-circle"
                                                   aria-hidden="true"></i>
                                            </div>
                                            <div class="media-body">
                                                <h6 class="media-heading">Completed the task</h6>
                                                <time class="media-meta" datetime="2018-06-11T18:29:20+08:00">2 days
                                                    ago
                                                </time>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="list-group-item dropdown-item" href="javascript:void(0)" role="menuitem">
                                        <div class="media">
                                            <div class="pr-10">
                                                <i class="icon wb-settings bg-red-600 white icon-circle"
                                                   aria-hidden="true"></i>
                                            </div>
                                            <div class="media-body">
                                                <h6 class="media-heading">Settings updated</h6>
                                                <time class="media-meta" datetime="2018-06-11T14:05:00+08:00">2 days
                                                    ago
                                                </time>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="list-group-item dropdown-item" href="javascript:void(0)" role="menuitem">
                                        <div class="media">
                                            <div class="pr-10">
                                                <i class="icon wb-calendar bg-blue-600 white icon-circle"
                                                   aria-hidden="true"></i>
                                            </div>
                                            <div class="media-body">
                                                <h6 class="media-heading">Event started</h6>
                                                <time class="media-meta" datetime="2018-06-10T13:50:18+08:00">3 days
                                                    ago
                                                </time>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="list-group-item dropdown-item" href="javascript:void(0)" role="menuitem">
                                        <div class="media">
                                            <div class="pr-10">
                                                <i class="icon wb-chat bg-orange-600 white icon-circle"
                                                   aria-hidden="true"></i>
                                            </div>
                                            <div class="media-body">
                                                <h6 class="media-heading">Message received</h6>
                                                <time class="media-meta" datetime="2018-06-10T12:34:48+08:00">3 days
                                                    ago
                                                </time>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="dropdown-menu-footer">
                            <a class="dropdown-menu-footer-btn" href="javascript:void(0)" role="button">
                                <i class="icon wb-settings" aria-hidden="true"></i>
                            </a>
                            <a class="dropdown-item" href="javascript:void(0)" role="menuitem">
                                All notifications
                            </a>
                        </div>
                    </div>
                </li>
            </ul>
            <!-- End Navbar Toolbar Right -->
        </div>
        <!-- End Navbar Collapse -->

        <!-- Site Navbar Seach -->
        <div class="collapse navbar-search-overlap" id="site-navbar-search">
            <form role="search">
                <div class="form-group">
                    <div class="input-search">
                        <i class="input-search-icon wb-search" aria-hidden="true"></i>
                        <input type="text" class="form-control" name="site-search" placeholder="Search...">
                        <button type="button" class="input-search-close icon wb-close" data-target="#site-navbar-search"
                                data-toggle="collapse" aria-label="Close"></button>
                    </div>
                </div>
            </form>
        </div>
        <!-- End Site Navbar Seach -->
    </div>
</nav>
<div class="site-menubar site-menubar-light">
    <div class="site-menubar-body">
        <ul class="site-menu" data-plugin="menu">
            <li class="site-menu-item has-sub active open">
                <a href="<?php echo e(url("")); ?>">
                    <i class="site-menu-icon wb-dashboard" aria-hidden="true"></i>
                    <span class="site-menu-title">Dashboard</span>
                </a>
            </li>
            <li class="site-menu-item has-sub">
                <a href="javascript:void(0)">
                    <i class="site-menu-icon wb-layout" aria-hidden="true"></i>
                    <span class="site-menu-title">Menu</span>
                </a>
                <ul class="site-menu-sub">

                    <?php if(in_array(auth()->user()->level, ['Admin', ''])): ?>
                        <li class="site-menu-item">
                            <a href="<?php echo e(route('user.index')); ?>"
                               class="">

                                <span class="site-menu-title">User</span>
                            </a>
                        </li>
                    <?php endif; ?>

                    <?php if(in_array(auth()->user()->level, ['Admin', 'Petugas'])): ?>
                        <li class="site-menu-item">
                            <a href="<?php echo e(route('anggota.index')); ?>"
                               class="">

                                <span class="site-menu-title">Anggota</span>
                            </a>
                        </li>
                    <?php endif; ?>

                    <?php if(in_array(auth()->user()->level, ['Admin', 'Petugas', 'Siswa', 'Guru'])): ?>
                        <li class="site-menu-item">
                            <a href="<?php echo e(route('buku.index')); ?>"
                               class="">

                                <span class="site-menu-title">Buku</span>
                            </a>
                        </li>
                    <?php endif; ?>

                    <?php if(in_array(auth()->user()->level, ['Admin', 'Petugas', 'Siswa', 'Guru'])): ?>
                        <li class="site-menu-item">
                            <a href="<?php echo e(route('peminjaman.index')); ?>"
                               class="">

                                <span class="site-menu-title">Peminjaman</span>
                            </a>
                        </li>
                    <?php endif; ?>

                    <?php if(in_array(auth()->user()->level, ['Admin', 'Petugas', 'Siswa', 'Guru'])): ?>
                        <li class="site-menu-item">
                            <a href="<?php echo e(route('pengembalian.index')); ?>"
                               class="">


                                <span class="site-menu-title">Pengembalian</span>
                            </a>
                        </li>
                    <?php endif; ?>

                    <?php if(in_array(auth()->user()->level, ['Admin', 'Petugas', 'Siswa', 'Guru'])): ?>
                        <li class="site-menu-item">
                            <a href="<?php echo e(route('kode-buku.index')); ?>"
                               class="">

                                <span class="site-menu-title">Kode Buku</span>
                            </a>
                        </li>
                    <?php endif; ?>

                </ul>
            </li>
        </ul>

        <?php if(in_array(auth()->user()->level, ['Admin', 'Petugas'])): ?>
            <ul class="site-menu" data-plugin="menu">
                <li class="site-menu-item has-sub">
                    <a href="javascript:void(0)">
                        <i class="site-menu-icon wb-layout" aria-hidden="true"></i>
                        <span class="site-menu-title">Laporan</span>
                    </a>
                    <ul class="site-menu-sub">

                        <?php if(in_array(auth()->user()->level, ['Admin', 'Petugas'])): ?>
                            <li class="site-menu-item">
                                <a href="<?php echo e(route('anggota.laporan.index')); ?>"
                                   class="">

                                    <span class="site-menu-title">Anggota</span>
                                </a>
                            </li>
                        <?php endif; ?>


                        <?php if(in_array(auth()->user()->level, ['Admin', 'Petugas'])): ?>
                            <li class="site-menu-item">
                                <a href="<?php echo e(route('buku.laporan.index')); ?>"
                                   class="">

                                    <span class="site-menu-title">Buku</span>
                                </a>
                            </li>
                        <?php endif; ?>

                        <?php if(in_array(auth()->user()->level, ['Admin', 'Petugas'])): ?>
                            <li class="site-menu-item">
                                <a href="<?php echo e(route('peminjaman.laporan.index')); ?>"
                                   class="">

                                    <span class="site-menu-title">Peminjaman</span>
                                </a>
                            </li>
                        <?php endif; ?>

                        <?php if(in_array(auth()->user()->level, ['Admin', 'Petugas'])): ?>
                            <li class="site-menu-item">
                                <a href="<?php echo e(route('pengembalian.laporan.index')); ?>"
                                   class="">

                                    <span class="site-menu-title">Pengembalian</span>
                                </a>
                            </li>
                        <?php endif; ?>

                    </ul>
                </li>
            </ul>
        <?php endif; ?>
    </div>
</div>

<?php if(count(session()->all())): ?>

    <?php if(session()->has("error")): ?>
        <div class="alert alert-danger  text-center" role="alert">
            <?php echo e(session()->get("error")); ?>

        </div>
    <?php elseif(session()->has("success")): ?>
        <div class="alert alert-success  text-center" role="alert">
            <?php echo e(session()->get("success")); ?>

        </div>
    <?php elseif(session()->has("warning")): ?>
        <div class="alert alert-warning  text-center" role="alert">
            <?php echo e(session()->get("warning")); ?>

        </div>
    <?php endif; ?>

<?php endif; ?>


<?php echo $__env->yieldContent('content'); ?>

<script src="https://maps.google.com/maps/api/js?sensor=false"></script>

<!-- Footer -->
<footer class="site-footer">
    <div class="site-footer-legal">© <?php echo e(date('Y')); ?> <a
            href="https://themeforest.net/item/remark-responsive-bootstrap-admin-template/11989202"><?php echo e(env('APP_OBJECT_NAME')); ?></a>
    </div>
</footer>
<!-- Core  -->
<script
    src="<?php echo e(url('')); ?>/global/vendor/babel-external-helpers/babel-external-helpers599c.js?v4.0.2"></script>
<script src="<?php echo e(url('')); ?>/global/vendor/jquery/jquery.min599c.js?v4.0.2"></script>
<script src="<?php echo e(url('')); ?>/global/vendor/popper-js/umd/popper.min599c.js?v4.0.2"></script>
<script src="<?php echo e(url('')); ?>/global/vendor/bootstrap/bootstrap.min599c.js?v4.0.2"></script>
<script src="<?php echo e(url('')); ?>/global/vendor/animsition/animsition.min599c.js?v4.0.2"></script>
<script src="<?php echo e(url('')); ?>/global/vendor/mousewheel/jquery.mousewheel599c.js?v4.0.2"></script>
<script src="<?php echo e(url('')); ?>/global/vendor/asscrollbar/jquery-asScrollbar.min599c.js?v4.0.2"></script>
<script src="<?php echo e(url('')); ?>/global/vendor/asscrollable/jquery-asScrollable.min599c.js?v4.0.2"></script>
<script src="<?php echo e(url('')); ?>/global/vendor/ashoverscroll/jquery-asHoverScroll.min599c.js?v4.0.2"></script>

<!-- Plugins -->
<script src="<?php echo e(url('')); ?>/global/vendor/switchery/switchery.min599c.js?v4.0.2"></script>
<script src="<?php echo e(url('')); ?>/global/vendor/intro-js/intro.min599c.js?v4.0.2"></script>
<script src="<?php echo e(url('')); ?>/global/vendor/screenfull/screenfull599c.js?v4.0.2"></script>
<script src="<?php echo e(url('')); ?>/global/vendor/slidepanel/jquery-slidePanel.min599c.js?v4.0.2"></script>

<!-- Plugins For This Page -->
<script src="<?php echo e(url('')); ?>/global/vendor/chartist/chartist.min599c.js?v4.0.2"></script>
<script src="<?php echo e(url('')); ?>/global/vendor/gmaps/gmaps.min599c.js?v4.0.2"></script>
<script src="<?php echo e(url('')); ?>/global/vendor/matchheight/jquery.matchHeight-min599c.js?v4.0.2"></script>

<!-- Scripts -->
<script src="<?php echo e(url('')); ?>/global/js/Component.min599c.js?v4.0.2"></script>
<script src="<?php echo e(url('')); ?>/global/js/Plugin.min599c.js?v4.0.2"></script>
<script src="<?php echo e(url('')); ?>/global/js/Base.min599c.js?v4.0.2"></script>
<script src="<?php echo e(url('')); ?>/global/js/Config.min599c.js?v4.0.2"></script>

<script src="<?php echo e(url('assets')); ?>/js/Section/Menubar.min599c.js?v4.0.2"></script>
<script src="<?php echo e(url('assets')); ?>/js/Section/Sidebar.min599c.js?v4.0.2"></script>
<script src="<?php echo e(url('assets')); ?>/js/Section/PageAside.min599c.js?v4.0.2"></script>
<script src="<?php echo e(url('assets')); ?>/js/Plugin/menu.min599c.js?v4.0.2"></script>

<!-- Config -->
<script src="<?php echo e(url('')); ?>/global/js/config/colors.min599c.js?v4.0.2"></script>
<script src="<?php echo e(url('assets')); ?>/js/config/tour.min599c.js?v4.0.2"></script>
<script>
    Config.set('assets', '../assets');
</script>

<!-- Page -->
<script src="<?php echo e(url('assets')); ?>/js/Site.min599c.js?v4.0.2"></script>
<script src="<?php echo e(url('')); ?>/global/js/Plugin/asscrollable.min599c.js?v4.0.2"></script>
<script src="<?php echo e(url('')); ?>/global/js/Plugin/slidepanel.min599c.js?v4.0.2"></script>
<script src="<?php echo e(url('')); ?>/global/js/Plugin/switchery.min599c.js?v4.0.2"></script>
<script src="<?php echo e(url('')); ?>/global/js/Plugin/gmaps.min599c.js?v4.0.2"></script>
<script src="<?php echo e(url('')); ?>/global/js/Plugin/matchheight.min599c.js?v4.0.2"></script>
<script src="<?php echo e(url('')); ?>/global/js/Plugin/asscrollable.min599c.js?v4.0.2"></script>

<script src="<?php echo e(url('assets')); ?>/examples/js/dashboard/v2.min599c.js?v4.0.2"></script>


<script src="<?php echo e(url('')); ?>/js/dropzone.min.js"></script>

<script src="<?php echo e(url('')); ?>/assets/js/jquery-1.10.2.js"></script>
<!-- BOOTSTRAP SCRIPTS -->
<script src="<?php echo e(url('')); ?>/assets/js/bootstrap.js"></script>
<!-- METISMENU SCRIPTS -->
<script src="<?php echo e(url('')); ?>/assets/js/jquery.metisMenu.js"></script>
<!-- CUSTOM SCRIPTS -->
<script src="<?php echo e(url('')); ?>/assets/js/custom.js"></script>


<script src="<?php echo e(url('monster-admin-lite/assets/plugins/jquery/jquery.min.js')); ?>"></script>
<script src="<?php echo e(url('lumino/js/bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(url('lumino/js/bootstrap-datepicker.js')); ?>"></script>
<script src="<?php echo e(url('lumino/js/custom.js')); ?>"></script>


<script src="<?php echo e(url("vendor/datatables/jquery.dataTables.js")); ?>"></script>
<script src="<?php echo e(url("vendor/datatables/dataTables.bootstrap4.js")); ?>"></script>
<script src="<?php echo e(url('')); ?>/js/dataTables.buttons.min.js"></script>
<script src="<?php echo e(url('')); ?>/js/buttons.flash.min.js"></script>
<script src="<?php echo e(url('')); ?>/js/dataTables.select.min.js"></script>


<script src="https://cdn.ckeditor.com/ckeditor5/18.0.0/classic/ckeditor.js"></script>
<script src="<?php echo e(url('')); ?>/js/ckeditor.js"></script>


<script src="<?php echo e(url('')); ?>/js/flatpickr.js"></script>
<script src="<?php echo e(url('')); ?>/js/id.js"></script>

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
                url: "<?php echo e(url('barang/get-barang')); ?>",
                data: {
                    barang_id: $('#barang_id').val(),
                    _token: ""
                }, headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': "<?php echo e(csrf_token()); ?>",
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
        CKEDITOR.config.filebrowserUploadMethod = 'form';

        // ini adalah inisialisasi setiap ck editor, dari id 0 sampai 3, jadi kalo perlu ckeditornya
        // kita tinggal pasang aja id yang tersedia dibawah ini, dan ck editor pun langsung tampil
        CKEDITOR.replace('editor-0', {
            height: 200,
            filebrowserUploadUrl: "<?php echo e(url('ckeditor/upload')); ?>"
        });
        CKEDITOR.replace('editor-1', {
            height: 200,
            filebrowserUploadUrl: "<?php echo e(url('ckeditor/upload')); ?>"
        });
        CKEDITOR.replace('editor-2', {
            height: 200,
            filebrowserUploadUrl: "<?php echo e(url('ckeditor/upload')); ?>"
        });
        CKEDITOR.replace('editor-3', {
            height: 200,
            filebrowserUploadUrl: "<?php echo e(url('ckeditor/upload')); ?>"
        });
        CKEDITOR.replace('editor-4', {
            height: 200,
            filebrowserUploadUrl: "<?php echo e(url('ckeditor/upload')); ?>"
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
                filebrowserUploadUrl: "<?php echo e(url('ckeditor/upload')); ?>"
            })
        })

        // ini adalah baris kode untuk mengatur kalo seandainy ada error di bagia create soalessay nya
        // bobot kita jadikan patokan karena jumlah bobot itu sama dengan jumlah soal
        <?php if(old('bobot') != ""): ?>
        <?php $__currentLoopData = old('bobot'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $bobot): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        CKEDITOR.replace(`editor-<?php echo e($index); ?>`, {
            height: 200,
            filebrowserUploadUrl: "<?php echo e(url('ckeditor/upload')); ?>"
        })
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>

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
                [{
                    extend: 'selectAll',
                    text: 'Pilih Semua',
                    className: "btn btn-primary buttons-select-all btn-sm"
                },
                    {
                        extend: "selectNone",
                        text: 'Batal Pilih',
                        className: "btn btn-primary buttons-select-none  btn-sm"
                    },
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
                    {
                        text: 'Tambah',
                        className: "btn btn-primary btn-sm",
                        action: function (e, dt, node, config) {
                            location.href = locationHrefCreate
                        }
                    },
                    // khusus halaman user
                    // <?php if(Route::current()->action['as'] == 'user.index'): ?> {
                    //     text: 'Aktifkan User',
                    //     className: "btn btn-primary btn-sm",
                    //     action: function (e, dt, node, config) {
                    //         var ids = JSON.stringify(getIdOfRows($('tr.selected')));
                    //         if (confirm("Yakin akan mengaktifkan semua data yang dipilih?")) {
                    //             location.href = `${locationHrefAktifkanSemua}?ids=${ids}`;
                    //         }
                    //     }
                    // },
                    // <?php endif; ?>
                    // <?php if(Route::current()->action['as'] == 'user.index' && request()->kelas_id): ?> {
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
                    // <?php endif; ?>


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
<?php /**PATH D:\bikinaplikasi\project\setup_server_default\sites\perpustakaan-andri.bikinaplikasi.dev\resources\views/layouts/app2.blade.php ENDPATH**/ ?>