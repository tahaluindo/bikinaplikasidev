<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8"/><!-- /Added by HTTrack -->
<head>

    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <title><?php echo e(env('APP_NAME')); ?> - <?php echo e(env('APP_OBJECT_NAME')); ?></title>
    <link rel="icon" href="<?php echo e(url('')); ?>/img/logo.png" type="image/png">

    <link rel="stylesheet" href="<?php echo e(url('')); ?>/css/bootstrap1.min.css"/>

    <link rel="stylesheet" href="<?php echo e(url('')); ?>/vendors/themefy_icon/themify-icons.css"/>

    <link rel="stylesheet" href="<?php echo e(url('')); ?>/vendors/swiper_slider/css/swiper.min.css"/>

    <link rel="stylesheet" href="<?php echo e(url('')); ?>/vendors/select2/css/select2.min.css"/>

    <link rel="stylesheet" href="<?php echo e(url('')); ?>/vendors/niceselect/css/nice-select.css"/>

    <link rel="stylesheet" href="<?php echo e(url('')); ?>/vendors/owl_carousel/css/owl.carousel.css"/>

    <link rel="stylesheet" href="<?php echo e(url('')); ?>/vendors/gijgo/gijgo.min.css"/>

    <link rel="stylesheet" href="<?php echo e(url('')); ?>/vendors/font_awesome/css/all.min.css"/>
    <link rel="stylesheet" href="<?php echo e(url('')); ?>/vendors/tagsinput/tagsinput.css"/>

    <link rel="stylesheet" href="<?php echo e(url('')); ?>/vendors/text_editor/summernote-bs4.css"/>

    <link rel="stylesheet" href="<?php echo e(url('')); ?>/vendors/morris/morris.css">

    <link rel="stylesheet" href="<?php echo e(url('')); ?>/vendors/material_icon/material-icons.css"/>

    <link rel="stylesheet" href="<?php echo e(url('')); ?>/css/metisMenu.css">

    <link rel="stylesheet" href="<?php echo e(url('')); ?>/css/style1.css"/>
    <link rel="stylesheet" href="<?php echo e(url('')); ?>/css/colors/default.css" id="colorSkinCSS">

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
    <link rel="stylesheet" type="text/css" href="<?php echo e(url('css')); ?>/material_blue.css">

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

    <link href="<?php echo e(url("cute-alert.css")); ?>" rel="stylesheet">
    <link href="<?php echo e(url("css/style.css")); ?>" rel="stylesheet">
</head>
<body class="crm_body_bg">


<nav class="sidebar">
    <div class="logo d-flex justify-content-center">
        <h3><?php echo e(auth()->user()->level); ?></h3>
        <div class="sidebar_close_icon d-lg-none">
            <i class="ti-close"></i>
        </div>
    </div>
    <ul id="sidebar_menu">
        <li class="mm-active">
            <a class="" href="<?php echo e(url('')); ?>/#">

                <img src="<?php echo e(url('')); ?>/img/menu-icon/1.svg" alt="">
                <span>Dashboard</span>
            </a>
        </li>
        <li class="mm-active">
            <a class="has-arrow" aria-expanded="false">
                <img src="<?php echo e(url('')); ?>/img/menu-icon/2.svg" alt="">
                <span>Menu</span>
            </a>
            <ul>
                <li><a href="<?php echo e(url('user')); ?>">User</a></li>
                <li><a href="<?php echo e(url('reservasi-tiket')); ?>">Reservasi Tiket</a></li>
                <li><a href="<?php echo e(url('rental-mobil')); ?>">Rental Mobil</a></li>
                <li><a href="<?php echo e(url('jadwal')); ?>">Jadwal</a></li>
                <li><a href="<?php echo e(url('tiket')); ?>">Tiket</a></li>
                <li><a href="<?php echo e(url('rekening')); ?>">Rekening</a></li>
                <li><a href="<?php echo e(url('lokasi')); ?>">Lokasi</a></li>
                <li><a href="<?php echo e(url('tujuan')); ?>">Tujuan</a></li>
            </ul>
        </li>
        <li class="mm-active">
            <a class="has-arrow" href="<?php echo e(url('')); ?>/#" aria-expanded="false">
                <img src="<?php echo e(url('')); ?>" alt="">
                <span>Laporan</span>
            </a>
            <ul>
                <li><a href="<?php echo e(url(route('reservasi-tiket.laporan.index'))); ?>">Reservasi Tiket</a></li>
                <li><a href="<?php echo e(url(route('reservasi-tiket.laporan.index'))); ?>">Rental Mobil</a></li>
            </ul>
        </li>
    </ul>
</nav>

<section class="main_content dashboard_part">

    <div class="container-fluid g-0">
        <div class="row">
            <div class="col-lg-12 p-0">
                <div class="header_iner d-flex justify-content-between align-items-center">
                    <div class="sidebar_icon d-lg-none">
                        <i class="ti-menu"></i>
                    </div>
                    <div class="">
                        <a href="<?php echo e(url('')); ?>/"><img src="<?php echo e(url(env('APP_LOGO_VERTICAL'))); ?>" alt="" height="72"></a>
                    </div>
                    <div class="header_right d-flex justify-content-between align-items-center">
                        <div class="header_notification_warp d-flex align-items-center">

                            <div class="profile_info">

                                <div
                                    style="margin-right: 16px !important; background-size: cover; cursor: pointer;">
                                    <svg width="40" height="43" viewBox="0 0 40 43" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M12.7986 36.7956V35.7227H4.80004C3.5286 35.7216 2.30945 35.2165 1.40973 34.3181C0.510008 33.4197 0.00309096 32.2013 5.06466e-05 30.9299V30.1213C-0.00433349 29.1067 0.275994 28.1112 0.809172 27.2479C1.34235 26.3847 2.107 25.6883 3.0162 25.238C3.42574 25.0354 3.77619 24.7308 4.03379 24.3535C4.29139 23.9761 4.44745 23.5388 4.48694 23.0836L5.43918 12.6089C5.61946 10.634 6.23968 8.72449 7.25432 7.02056C8.26897 5.31664 9.65228 3.86154 11.3027 2.76206C12.9532 1.66259 14.8289 0.946634 16.7922 0.666756C18.7555 0.386878 20.7565 0.550177 22.6485 1.14467C22.064 2.05449 21.6087 3.04104 21.2955 4.07608C20.4366 3.84823 19.5515 3.73332 18.6629 3.73425C16.1447 3.7235 13.7146 4.66042 11.8554 6.35888C9.99625 8.05734 8.84403 10.393 8.62768 12.9019L7.67544 23.3708C7.5876 24.3679 7.24508 25.3257 6.68072 26.1524C6.11636 26.9791 5.34908 27.6469 4.45247 28.0918C4.07457 28.2788 3.7568 28.5682 3.53536 28.927C3.31393 29.2859 3.19775 29.6997 3.20005 30.1213V30.9356C3.20042 31.3598 3.36887 31.7664 3.6685 32.0666C3.96812 32.3668 4.37449 32.5359 4.79861 32.5371H32.5285C32.9532 32.5367 33.3603 32.3679 33.6605 32.0676C33.9608 31.7674 34.1296 31.3603 34.13 30.9356V30.1213C34.1314 29.7013 34.0151 29.2893 33.7942 28.9321C33.5734 28.5749 33.2568 28.2868 32.8804 28.1005C31.982 27.6553 31.2133 26.9863 30.6484 26.1579C30.0834 25.3296 29.7411 24.3698 29.6546 23.3708L29.2323 18.7217C30.2899 19.0321 31.3861 19.1912 32.4883 19.1942L32.8416 23.0822C32.8846 23.5341 33.0414 23.9678 33.2973 24.3428C33.5532 24.7178 33.9 25.0218 34.3052 25.2265C35.215 25.6768 35.9805 26.3729 36.5148 27.236C37.0492 28.0991 37.3311 29.0947 37.3285 30.1098V30.9242C37.3274 32.1967 36.8213 33.4168 35.9213 34.3165C35.0213 35.2162 33.8011 35.7219 32.5285 35.7227H24.53V36.7899C24.53 38.3455 23.912 39.8375 22.812 40.9375C21.7119 42.0376 20.22 42.6556 18.6643 42.6556C17.1086 42.6556 15.6166 42.0376 14.5166 40.9375C13.4166 39.8375 12.7986 38.3455 12.7986 36.7899V36.7956ZM15.9972 36.7956C16.0133 37.4921 16.3013 38.1546 16.7996 38.6414C17.2979 39.1283 17.9669 39.4008 18.6636 39.4008C19.3602 39.4008 20.0292 39.1283 20.5275 38.6414C21.0258 38.1546 21.3138 37.4921 21.33 36.7956V35.7227H15.9972V36.7956ZM32.0962 14.9184C30.9329 14.8524 29.8013 14.514 28.7928 13.9303L28.6995 12.9019C28.4707 10.2622 27.2073 7.82014 25.1849 6.10839C25.3884 5.01639 25.833 3.98353 26.4862 3.08506C28.0121 4.19743 29.2831 5.62268 30.2141 7.26556C31.1452 8.90844 31.7149 10.7311 31.8851 12.6118L32.0948 14.917L32.0962 14.9184Z"
                                            fill="#929BB5"/>

                                        <path id="notifikasi-bell-color"
                                              d="M32.5314 14.9371C31.0542 14.9371 29.6103 14.4991 28.3821 13.6785C27.1539 12.8578 26.1966 11.6914 25.6313 10.3267C25.066 8.96197 24.9181 7.46029 25.2063 6.01153C25.4945 4.56277 26.2058 3.232 27.2503 2.1875C28.2948 1.143 29.6256 0.431686 31.0743 0.14351C32.5231 -0.144667 34.0248 0.00323602 35.3895 0.568514C36.7542 1.13379 37.9206 2.09106 38.7413 3.31926C39.5619 4.54746 39.9999 5.99143 39.9999 7.46857C39.9999 9.44936 39.2131 11.349 37.8125 12.7496C36.4118 14.1503 34.5122 14.9371 32.5314 14.9371V14.9371Z"
                                              fill="<?php echo e($notifications->where('dibaca', 0)->count() ? "#FF6359" : "#929bb5"); ?>"/>
                                    </svg>


                                </div>

                                <div class="profile_info_iner custom-list-menu-dropdown">
                                    <div class="profile_info_details">

                                        <ul class="list-group">
                                            <?php if($notifications->whereNotNull('reservasi_tiket_id')->where('dibaca', 0)->where('type', 'Transaksi Baru')->count()): ?>
                                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                                    Reservasi Tiket Baru
                                                    <span
                                                        class="badge bg-danger rounded-pill"><?php echo e($notifications->whereNotNull('reservasi_tiket_id')->where('dibaca', 0)->where('type', 'Transaksi Baru')->count()); ?></span>
                                                </li>
                                            <?php endif; ?>

                                            <?php if($notifications->whereNotNull('reservasi_tiket_id')->where('dibaca', 0)->where('type', 'Refund')->count()): ?>
                                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                                    Refund Reservasi Tiket Baru
                                                    <span
                                                        class="badge bg-danger rounded-pill"><?php echo e($notifications->whereNotNull('reservasi_tiket_id')->where('dibaca', 0)->where('type', 'Refund')->count()); ?></span>
                                                </li>
                                            <?php endif; ?>

                                            <?php if($notifications->whereNotNull('rental_mobil_id')->where('dibaca', 0)->where('type', 'Transaksi Baru')->count()): ?>
                                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                                    Rental Mobil Baru
                                                    <span
                                                        class="badge bg-danger rounded-pill"><?php echo e($notifications->whereNotNull('rental_mobil_id')->where('dibaca', 0)->where('type', 'Transaksi Baru')->count()); ?></span>
                                                </li>
                                            <?php endif; ?>

                                            <?php if($notifications->whereNotNull('rental_mobil_id')->where('dibaca', 0)->where('type', 'Refund')->count()): ?>
                                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                                    Refund Rental Mobil Baru
                                                    <span
                                                        class="badge bg-danger rounded-pill"><?php echo e($notifications->whereNotNull('rental_mobil_id')->where('dibaca', 0)->where('type', 'Refund')->count()); ?></span>
                                                </li>
                                            <?php endif; ?>
                                        </ul>

                                    </div>
                                </div>
                            </div>

                            <div class="profile_info">
                                <img src="<?php echo e(url('')); ?>/img/client_img.png" alt="#" width="48" height="48">
                                <div class="profile_info_iner">
                                    <p>Selamat Datang, <?php echo e(auth()->user()->username); ?>!</p>
                                    <h5><?php echo e(auth()->user()->name); ?>!</h5>
                                    <div class="profile_info_details">
                                        <a href="<?php echo e(route('user.profile', auth()->user()->id)); ?>">My Profile <i
                                                class="ti-user"></i></a>
                                        <a href="<?php echo e(url('')); ?>/#">Settings <i class="ti-settings"></i></a>

                                        <form method="POST" action="<?php echo e(route('logout')); ?>">
                                            <?php echo csrf_field(); ?>

                                            <a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); if(confirm('Yakin akan logut?'))
                                        this.closest('form').submit(); ">
                                                Logout <i class="ti-shift-right"></i>
                                            </a>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-12">
            <?php if(session()->has("error")): ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo e(session()->get("error")); ?>

                </div>
            <?php elseif(session()->has("success")): ?>
                <div class="alert alert-success" role="alert">
                    <?php echo e(session()->get("success")); ?>

                </div>
            <?php elseif(session()->has("warning")): ?>
                <div class="alert alert-warning" role="alert">
                    <?php echo e(session()->get("warning")); ?>

                </div>
            <?php endif; ?>
        </div>
    </div>

    <?php echo $__env->yieldContent('content'); ?>

    <div class="footer_part">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-sm-12">
                    <div class="footer_iner text-center">
                        <p><?php echo e(date("Y")); ?> © <?php echo e(env('APP_NAME')); ?> - <?php echo e(env('APP_OBJECT_NAME')); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<script src="<?php echo e(url('')); ?>/js/jquery1-3.4.1.min.js"></script>

<script src="<?php echo e(url('')); ?>/js/popper1.min.js"></script>

<script src="<?php echo e(url('')); ?>/js/bootstrap1.min.js"></script>

<script src="<?php echo e(url('')); ?>/js/metisMenu.js"></script>

<script src="<?php echo e(url('')); ?>/vendors/count_up/jquery.waypoints.min.js"></script>

<script src="<?php echo e(url('')); ?>/vendors/chartlist/Chart.min.js"></script>

<script src="<?php echo e(url('')); ?>/vendors/count_up/jquery.counterup.min.js"></script>

<script src="<?php echo e(url('')); ?>/vendors/swiper_slider/js/swiper.min.js"></script>

<script src="<?php echo e(url('')); ?>/vendors/niceselect/js/jquery.nice-select.min.js"></script>

<script src="<?php echo e(url('')); ?>/vendors/owl_carousel/js/owl.carousel.min.js"></script>

<script src="<?php echo e(url('')); ?>/vendors/gijgo/gijgo.min.js"></script>

<script src="<?php echo e(url('')); ?>/vendors/datatable/js/jquery.dataTables.min.js"></script>
<script src="<?php echo e(url('')); ?>/vendors/datatable/js/dataTables.responsive.min.js"></script>
<script src="<?php echo e(url('')); ?>/vendors/datatable/js/dataTables.buttons.min.js"></script>
<script src="<?php echo e(url('')); ?>/vendors/datatable/js/buttons.flash.min.js"></script>
<script src="<?php echo e(url('')); ?>/vendors/datatable/js/jszip.min.js"></script>
<script src="<?php echo e(url('')); ?>/vendors/datatable/js/pdfmake.min.js"></script>
<script src="<?php echo e(url('')); ?>/vendors/datatable/js/vfs_fonts.js"></script>
<script src="<?php echo e(url('')); ?>/vendors/datatable/js/buttons.html5.min.js"></script>
<script src="<?php echo e(url('')); ?>/vendors/datatable/js/buttons.print.min.js"></script>
<script src="<?php echo e(url('')); ?>/js/chart.min.js"></script>

<script src="<?php echo e(url('')); ?>/vendors/progressbar/jquery.barfiller.js"></script>

<script src="<?php echo e(url('')); ?>/vendors/tagsinput/tagsinput.js"></script>

<script src="<?php echo e(url('')); ?>/vendors/text_editor/summernote-bs4.js"></script>
<script src="<?php echo e(url('')); ?>/vendors/apex_chart/apexcharts.js"></script>

<script src="<?php echo e(url('')); ?>/js/custom.js"></script>

<script src="<?php echo e(url('')); ?>/js/active_chart.js"></script>
<script src="<?php echo e(url('')); ?>/vendors/apex_chart/radial_active.js"></script>
<script src="<?php echo e(url('')); ?>/vendors/apex_chart/stackbar.js"></script>
<script src="<?php echo e(url('')); ?>/vendors/apex_chart/area_chart.js"></script>

<script src="<?php echo e(url('')); ?>/vendors/apex_chart/bar_active_1.js"></script>
<script src="<?php echo e(url('')); ?>/vendors/chartjs/chartjs_active.js"></script>



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
<script src="<?php echo e(url('')); ?>/cute-alert.js"></script>

<script>
    $(document).ready(function () {
        // Create WebSocket connection.
        const socket = new WebSocket('ws://127.0.0.1:4001');

        // Connection opened
        socket.addEventListener('open', function (event) {
            socket.send("<?php echo e(auth()->user()->id . password_hash("Bikin Aplikasi Dev" . date("Y-m-d h:i"), PASSWORD_BCRYPT)); ?>");
        });

        // Listen for messages
        socket.addEventListener('message', function (event) {
            cuteAlert({
                type: "question",
                title: "Transaksi Terbaru",
                message: event.data,
                confirmText: "Oke",
                cancelText: "Batal",
                img: "img/info.svg"
            })
        });

        <?php if(Request::segment(1) == 'reservasi-tiket'): ?>
        function getTotalBayar() {
            $.ajax({
                url: "<?php echo e(route('reservasi-tiket.hitung_total_bayar')); ?>" + "?" + $('#form-submit').serialize(),
                success: function (response) {

                    $('#total_bayar').val(response.data);
                }
            });
        }

        getTotalBayar();

        $('.tiket_id, .jumlah, .pulang_pergi, .diskon').change(() => {
            getTotalBayar();
        });
        <?php endif; ?>

        <?php if(Request::segment(1) == 'rental-mobil'): ?>
        function getTotalBayar() {
            $.ajax({
                url: "<?php echo e(route('rental-mobil.hitung_total_bayar')); ?>" + "?" + $('#form-submit').serialize(),
                success: function (response) {

                    $('#total_bayar').val(response.data);
                }
            });
        }

        getTotalBayar();

        $('.mobil_id, .diskon, .dari_tanggal, .sampai_tanggal, .biaya_supir').change(() => {
            getTotalBayar();
        });
        <?php endif; ?>

        // navigation click actions
        $('.scroll-link').on('click', function (event) {
            event.preventDefault();
            var sectionID = $(this).attr("data-id");
            scrollToID('#' + sectionID, 750);
        });
        // scroll to top action
        $('.scroll-top').on('click', function (event) {
            event.preventDefault();
            $('html, body').animate({
                scrollTop: 0
            }, 'slow');
        });
        // mobile nav toggle
        $('#nav-toggle').on('click', function (event) {
            event.preventDefault();
            $('#main-nav').toggleClass("open");
        });

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
<?php /**PATH D:\bikinaplikasi\project\81zaky\reservasi_and_travel\resources\views/layouts/app3.blade.php ENDPATH**/ ?>