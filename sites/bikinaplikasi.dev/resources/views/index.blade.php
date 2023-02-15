{{--<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">--}}

{{--<style>--}}
{{--    .swal-modal {--}}
{{--        background-color: black !important;--}}
{{--    }--}}

{{--    .swal-button {--}}
{{--        background-color: transparent !important;--}}
{{--        border: none !important;--}}
{{--        border-radius: 5px;--}}
{{--    }--}}

{{--    .swall-button:hover {--}}
{{--        border: none !important;--}}
{{--    }--}}


{{--    .swall-button:visited {--}}
{{--        border: none !important;--}}
{{--    }--}}


{{--    .swall-button:click {--}}
{{--        border: none !important;--}}
{{--    }--}}

{{--    .swal-text {--}}
{{--        color: white !important;--}}
{{--    }--}}
{{--</style>--}}

{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>--}}
{{--<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>--}}
{{--<script>--}}
{{--    $(document).ready(function () {--}}
{{--        swal({--}}
{{--            text: "Kata Kata 1",--}}
{{--            button: {--}}
{{--                text: "Tutup"--}}
{{--            }--}}
{{--        })--}}

{{--        var i = 2;--}}
{{--        $(document).click(() => {--}}

{{--            if (i == 2) {--}}
{{--                swal({--}}
{{--                    text: "Kata Kata 2",--}}
{{--                    button: {--}}
{{--                        text: "Tutup"--}}
{{--                    }--}}
{{--                })--}}
{{--            }--}}
{{--                        --}}
{{--            if (i == 3) {--}}
{{--                swal({--}}
{{--                    text: "Kata Kata 3",--}}
{{--                    button: {--}}
{{--                        text: "Tutup"--}}
{{--                    }--}}
{{--                })--}}
{{--            }--}}
{{--            --}}
{{--                                   --}}
{{--            if (i == 4) {--}}
{{--                swal({--}}
{{--                    text: "Kata Kata 4",--}}
{{--                    button: {--}}
{{--                        text: "Tutup"--}}
{{--                    }--}}
{{--                })--}}
{{--            }--}}
{{--            --}}
{{--            i++;--}}
{{--        });--}}
{{--    });--}}
{{--</script>--}}

@php

    function getUserIP()
    {
        // Get real visitor IP behind CloudFlare network
        if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
                  $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
                  $_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
        }
        
        $client  = @$_SERVER['HTTP_CLIENT_IP'];
        $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
        $remote  = $_SERVER['REMOTE_ADDR'];
    
        if(filter_var($client, FILTER_VALIDATE_IP))
        {
            $ip = $client;
        }
        elseif(filter_var($forward, FILTER_VALIDATE_IP))
        {
            $ip = $forward;
        }
        else
        {
            $ip = $remote;
        }
    
        return $ip;
    }
    
    function total_pengunjung()
    {
        $cookie_ip = @$_COOKIE['cookie_ip'];
        $ip = getUserIP();
        if(!\DB::table('visitor')->where('ip', $ip)->first()) {
            
            if(!$cookie_ip) {
                
                cookie()->forever('cookie_ip', $ip);
                
                \DB::table('visitor')->insert([
                    'ip' => $ip,
                    'cookie_ip' => $ip
                ]);
            } else {
                if($cookie_ip != $ip) {
                    \DB::table('visitor')->where('ip', $cookie_ip)->update([
                        'ip' => $ip
                    ]);
                }
            }
            
        }
        
        return \DB::table('visitor')->count();
    }

@endphp

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description"
          content="{{ env('APP_OBJECT_DESCRIPTION') }}">
    <meta name="author" content="Bikin Aplikasi Dev">
    <meta name="google-site-verification" content="{{ env('APP_META_GOOGLE_SITE_VERIFICATION') }}"/>
    <meta name="msvalidate.01" content="{{ env('APP_META_MICROSOFT_EDGE') }}"/>
    <meta name="yandex-verification" content="{{ env('APP_META_YANDEX_VERIFICATION') }}"/>
    <meta name="keywords"
          content="{{ env('APP_META_KEYWORDS') }}"/>
    <title> {{ env('APP_OBJECT_NAME') }} </title>
    <!-- Favicon -->
    <link href="{{ url('') }}/img/brand/favicon.png" rel="icon" type="image/png">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,500,800" rel="stylesheet">
    <!-- Icons -->
    <link href="{{ url('') }}/vendor/nucleo/css/nucleo.css" rel="stylesheet">
    <link href="{{ url('') }}/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{ url('') }}/vendor/elegant/css/elegant-icons.css" rel="stylesheet">

    <!-- Vendor CSS -->
    <link type="text/css" href="{{ url('') }}/vendor/argon/css/argon.css?v=1.0.1" rel="stylesheet">
    <link type="text/css" href="{{ url('') }}/vendor/lightbox/css/lightbox.css" rel="stylesheet">
    <link type="text/css" href="{{ url('') }}/vendor/animate/css/animate.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('') }}/vendor/owlcarousel/owlcarousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="{{ url('') }}/vendor/owlcarousel/owlcarousel/assets/owl.theme.default.min.css">

    <!-- Theme CSS -->
    <link type="text/css" href="{{ url('') }}/css/theme.css" rel="stylesheet">
    <link type="text/css" href="{{ url('') }}/css/responsive.css" rel="stylesheet">

    <!-- Template CSS -->
    <link type="text/css" href="{{ url('') }}/demos/business/css/main.css" rel="stylesheet">
    <link type="text/css" href="{{ url('') }}/demos/business/css/fonts.css" rel="stylesheet">

    <!-- javascript -->
    <script src="{{ url('') }}/vendor/owlcarousel/vendors/jquery.min.js"></script>
    <script src="{{ url('') }}/vendor/owlcarousel/owlcarousel/owl.carousel.js"></script>

    <style>
        .pb-100 {
            padding-bottom: 100px;
        }

        .pt-100 {
            padding-top: 100px;
        }

        a {
            text-decoration: none;
        }

        .section-title h4 {
            font-size: 14px;
            font-weight: 500;
            color: #777;
        }

        .section-title h2 {
            font-size: 32px;
            text-transform: capitalize;
            margin: 15px 0;
            display: inline-block;
            position: relative;
            font-weight: 700;
            padding-bottom: 15px;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        .section-title p {
            font-weight: 300;
            font-size: 14px;
        }

        .black-bg .section-title h2, .black-bg .section-title h4, .black-bg .section-title p {
            color: #fff
        }

        .section-title h2:before {
            position: absolute;
            content: "";
            width: 150px;
            height: 1px;
            background-color: #777;
            bottom: 0;
            left: 50%;
            margin-left: -75px;
        }

        .section-title h2:after {
            position: absolute;
            content: "";
            width: 80px;
            height: 3px;
            background-color: #e16038;
            border: darkblue;
            bottom: -1px;
            left: 50%;
            margin-left: -40px;
        }

        .section-title {
            margin-bottom: 70px;
        }

        .single-price {
            text-align: center;
            padding: 30px;
            box-shadow: 0px 0px 2px rgba(0, 0, 0, 0.2);
        }

        .price-title h4 {
            font-size: 24px;
            text-transform: uppercase;
            font-weight: 600;
        }

        .price-tag {
            margin: 30px 0;
        }

        .price-tag {
            margin: 30px 0;
            background-color: #fafafa;
            color: #000;
            padding: 10px 0;
        }

        .center.price-tag {
            background-color: tomato;
            color: #fff
        }

        .price-tag h2 {
            font-size: 45px;
            font-weight: 600;
            font-family: poppins;
        }

        .price-tag h2 span {
            font-weight: 300;
            font-size: 16px;
            font-style: italic;
        }

        .price-item ul {
            margin: 0;
            padding: 0;
            list-style: none;
        }

        .price-item ul li {
            font-size: 14px;
            padding: 5px 0;
            border-bottom: 1px dashed #eee;
            margin: 5px 0;
        }

        .price-item ul li:last-child {
            border-bottom: 0;
        }

        .single-price a {
            margin-top: 15px;
        }

        a.box-btn {
            background-color: tomato;
            padding: 5px 20px;
            display: inline-block;
            color: #fff;
            text-transform: capitalize;
            border-radius: 3px;
            font-size: 15px;
            transition: .3s;
        }

        a.box-btn:hover, a.border-btn:hover {
            background-color: #d35400;
        }

        #btn-goto-top {
            display: inline-block;
            background-color: #FF9800;
            width: 60px;
            height: 58px;
            text-align: center;
            border-radius: 4px;
            position: fixed;
            bottom: 20px;
            right: 95px;
            transition: background-color .3s, opacity .5s, visibility .5s;
            opacity: 0;
            visibility: hidden;
            z-index: 1000;
            border-radius: 30px;
            box-shadow: 5px 5px 5px rgb(0 0 0 / 25%);
        }

        #btn-goto-top::after {
            content: "\f077";
            font-family: FontAwesome;
            font-weight: normal;
            font-style: normal;
            font-size: 2em;
            line-height: 50px;
            color: #fff;
        }

        #btn-goto-top:hover {
            cursor: pointer;
            background-color: #333;
        }

        #btn-goto-top:active {
            background-color: #555;
        }

        #btn-goto-top.show {
            opacity: 1;
            visibility: visible;
        }

        .counter {
            background-color: white;
            padding: 20px 0;
            border-radius: 5px;
            box-shadow: 5px 5px 5px rgb(0 0 0 / 15%);
        }

        .count-title {
            font-size: 40px;
            font-weight: normal;
            margin-top: 10px;
            margin-bottom: 0;
            text-align: center;
        }

        .count-text {
            font-size: 13px;
            font-weight: normal;
            margin-top: 10px;
            margin-bottom: 0;
            text-align: center;
        }

        .fa-2x {
            margin: 0 auto;
            float: none;
            display: table;
            color: #4ad1e5;
        }

        .filterDiv {
            /*float: left;*/
            /*background-color: #2196F3;*/
            /*color: #ffffff;*/
            /*width: 100px;*/
            /*line-height: 100px;*/
            /*text-align: center;*/
            /*margin: 2px;*/
            display: block;
        }

        /* The "show" class is added to the filtered elements */
        .show {
            display: block;
        }

        .hide {
            display: none;
        }

        /* Style the buttons */
        .btn-filter {
            border: none;
            outline: none;
            padding: 12px 16px;
            background-color: #f1f1f1;
            cursor: pointer;
            margin-bottom: 5px;
        }

        /* Add a light grey background on mouse-over */
        .btn-filter:hover {
            background-color: #ddd;
        }

        /* Add a dark background to the active button */
        .btn-filter.active {
            background-color: #66666675;
            color: white;
        }

        .eapp-popup-content-blocks-container-item.eapp-popup-content-blocks-container-free-link {
            display: none;
        }


        a[href*='https://static-v.tawk.to/a-v3/images/bubbles/168-r-br.svg'] {
            display: none !important;
        }

        .rc-anchor-normal-footer {
            display: none !important;
        }


        ::-webkit-scrollbar-track {
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
            background-color: #000000;
        }

        ::-webkit-scrollbar {
            width: 10px;
            background-color: #F5F5F5;
        }

        ::-webkit-scrollbar-thumb {
            background-color: #F5F5F5;
        }

        :root {
            scrollbar-color: #F5F5F5 #000000 !important;
            scrollbar-width: thin !important;
        }

        .input-group-prepend-password {
            margin-bottom: -43px;
            z-index: 1;
        }

        .form-control-password {
            /*padding-left: 40px !important;*/
        }

        .passtrengthMeter.weak::after {
            /*background-color: #EC644B;*/
            width: 0% !important;
        }

        .modal p {
            text-align: justify;
        }

        .carousel .caption-2 {
            margin: 0 auto !important;
            text-align: center !important;
            width: 70% !important;
        }

        .footer img {
            padding-bottom: initial;
            width: 100%;
            margin-top: 8px;
        }

        .form-control-password {
            padding-left: 0 !important;
        }


        @media only screen and (max-width: 375px) {
            .passtrengthMeter, .passtrengthMeter.weak, .passtrengthMeter.medium, .passtrengthMeter.strong, .very-strong {
                padding-left: 0 !important;
                width: 87.9% !important;
            }
        }

        @media only screen and (min-width: 420px) {
            .passtrengthMeter, .passtrengthMeter.weak, .passtrengthMeter.medium, .passtrengthMeter.strong, .very-strong {
                padding-left: 0 !important;
                width: 89.9% !important;
            }
        }

        @media only screen and (min-width: 480px) {
            .passtrengthMeter, .passtrengthMeter.weak, .passtrengthMeter.medium, .passtrengthMeter.strong, .very-strong {
                padding-left: 0 !important;
                width: 91.5% !important;
            }
        }

        @media only screen and (min-width: 960px) {
            .passtrengthMeter, .passtrengthMeter.weak, .passtrengthMeter.medium, .passtrengthMeter.strong, .very-strong {
                padding-left: 0 !important;
                width: 87.9% !important;
            }
        }

        @media only screen and (min-width: 768px) {
            .passtrengthMeter, .passtrengthMeter.weak, .passtrengthMeter.medium, .passtrengthMeter.strong, .very-strong {
                padding-left: 0 !important;
                width: 87.9% !important;
            }
        }

        @media only screen and (min-width: 320px) {
            .passtrengthMeter, .passtrengthMeter.weak, .passtrengthMeter.medium, .passtrengthMeter.strong, .very-strong {
                padding-left: 0 !important;
                width: 85.9% !important;
            }
        }

        @media only screen and (min-width: 1280px) {
            .passtrengthMeter, .passtrengthMeter.weak, .passtrengthMeter.medium, .passtrengthMeter.strong, .very-strong {
                padding-left: 0 !important;
                width: 91% !important;
            }
        }

        .shadow, .profile-page .card-profile .card-profile-image img {
            box-shadow: initial !important;
        }

        .footer {

            background: linear-gradient(#060606, #222) !important;
        }

        .guided-tour-step.active .guided-tour-step-tooltip .guided-tour-step-tooltip-inner .guided-tour-step-button-next {
            color: #172b4d !important;
        }

        .guided-tour-step.active .guided-tour-step-tooltip .guided-tour-step-tooltip-inner .guided-tour-step-button-prev, .guided-tour-step.active .guided-tour-step-tooltip .guided-tour-step-tooltip-inner .guided-tour-step-button-next, .guided-tour-step.active .guided-tour-step-tooltip .guided-tour-step-tooltip-inner .guided-tour-step-button-complete {
            border: none !important;
        }

        .guided-tour-step .guided-tour-step-tooltip .guided-tour-step-tooltip-inner .guided-tour-step-bullets ul li {
            background-color: #378ed2 !important;
        }

        .guided-tour-step .guided-tour-step-tooltip .guided-tour-step-tooltip-inner .guided-tour-step-bullets ul li.current {
            background-color: #172b4d !important;
        }

        .guided-tour-step.active .guided-tour-step-tooltip .guided-tour-step-tooltip-inner .guided-tour-step-button-prev {
            color: #378ed2 !important;
        }

        .guided-tour-step.active .guided-tour-step-tooltip .guided-tour-step-tooltip-inner .guided-tour-step-button-complete {
            color: #378ed2 !important;
        }


        @media only screen and (max-width: 768px) {
            div#carouselExampleIndicators {
                height: 80vh !important;
            }

            .carousel-item img {
                height: 80vh !important;
                width: 130vw !important;
                margin-left: -100px !important;
                margin-top: 0px !important;
            }

            .carousel-caption {
                bottom: 20%;
            }
        }


        @media only screen and (max-width: 425px) {

            div#carouselExampleIndicators {
                height: 65vh !important;
            }

            .carousel-item img {
                height: 65vh !important;
                width: 140vw !important;
                margin-left: -80px !important;
                margin-top: 0px !important;
            }

            .carousel-caption {
                bottom: 15% !important;
            }
        }


        @media only screen and (max-width: 320px) {

            div#carouselExampleIndicators {
                height: 65vh !important;
            }

            .carousel-item img {
                height: 65vh !important;
                width: 140vw !important;
                margin-left: -60px !important;
                margin-top: 0px !important;
            }

            .carousel-caption {
                bottom: 15% !important;
            }
        }

        @media only screen and (min-width: 1024px) {
            div#carouselExampleIndicators {
                height: 100vh;
            }

            .carousel-item img {
                height: 100vh;
                width: 115vw;
                margin-left: -60px;
                margin-top: 0px;
            }

            .carousel-caption {
                bottom: 32.5%;
            }
        }

        @media only screen and (min-width: 1440px) {
            .carousel-caption {
                bottom: 36.5%;
            }
        }

        @media only screen and (min-width: 2560px) {
            .carousel-caption {
                bottom: 46%;
            }
        }

        @media only screen and (max-width: 320px) {
            .rc-anchor-normal {
                width: 78% !important;
            }
        }

        @media only screen and (min-width: 321px) {
            .rc-anchor-normal {
                width: 90% !important;
            }
        }

        #footer {
            position: relative;
        }

        .particles-js-canvas-el {
            position: absolute;
            top: 0;
        }

        .display-1 span, .display-2 span, .display-3 span, .display-4 span {
            font-weight: initial !important;
            display: inline !important;
        }

        /*.carousel-inner, .carousel, .item, .container, .fill {*/
        /*    height: 65% !important;*/
        /*}*/

        /*.carousel-item::after {*/
        /*    content: "";*/
        /*    position: relative;*/
        /*    top: 0;*/
        /*    width: 100%;*/
        /*    height: 100%;*/
        /*    background-color: rgba(0,0,0,.5);*/
        /*}*/
    </style>

    <link rel="stylesheet" href="{{ url('') }}/css/passtrength.css" media="screen" title="no title">
    <link rel="stylesheet" type="text/css" href="{{ url('') }}/css/tourguide.css"/>
</head>

<body>

<header>
    <!-- NAVIGATION v.1 -->
    <nav id="navbar-main" class="navbar navbar-main navbar-expand-lg navbar-transparent navbar-light headroom">
        <div class="container" id="home"
             data-tour="step: 1; title: Hai, selamat datang!; content: Sepertinya kamu pengunjung baru? Baiklah kami akan menjelaskan beberapa menu di website kami agar kamu tidak bingung. Notifikasi ini akan muncul 2x."
             style="max-width: 1024px !important;">
            <a class="navbar-brand mr-lg-5" href="{{ url('') }}/#home">
                <img src="{{ url('') }}/demos/business/images/logo.png" alt="logo" style="height: 32px !important">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar_global"
                    aria-controls="navbar_global" aria-expanded="true" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse collapse show" id="navbar_global" style="">
                <div class="navbar-collapse-header">
                    <div class="row">
                        <div class="col-6 collapse-brand">
                            <a href="{{ url('') }}/#home">
                                <img src="{{ url('') }}/img/brand/blue.png" alt="logo lengkap">
                            </a>
                        </div>
                        <div class="col-6 collapse-close">
                            <button type="button" class="navbar-toggler" data-toggle="collapse"
                                    data-target="#navbar_global" aria-controls="navbar_global" aria-expanded="true"
                                    aria-label="Toggle navigation">
                                <span></span>
                                <span></span>
                            </button>
                        </div>
                    </div>
                </div>
                <ul class="navbar-nav navbar-nav-hover align-items-lg-center">
                    {{--                    <li class="nav-item"><a class="nav-link" href="{{ url('') }}/#home">Home</a></li>--}}
                    <li class="nav-item dropdown">
                        <a href="{{ url('') }}/#layanan" class="nav-link"
                           data-tour="step: 2; title: Layanan; content: Dimenu ini kamu dapat melihat berbagai layanan yang kami tawarkan, sehingga kamu yakin bahwa kami adalah pilihan tepat!">Layanan</a>

                    </li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('') }}/#teknologi"
                                            data-tour="step: 3; title: Teknologi; content: Dimenu ini kamu dapat melihat teknologi yang kami gunakan, tidak semuanya kami cantumkan. Kami akan menggunakan teknologi terbaik sesuai kebutuhanmu!">Teknologi</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="{{ url('') }}/#produk" class="nav-link"
                           data-tour="step: 4; title: Produk; content: Dimenu ini kamu dapat melihat contoh produk yang telah kami buat, kami sering memberikan diskon. Tunggu apalagi?!">Produk</a>
                    </li>

                    <li class="nav-item"><a class="nav-link" href="{{ url('') }}/#harga"
                                            data-tour="step: 5; title: Harga; content: Dimenu ini kamu dapat melihat harga yang kami tawarkan, sangat aman dikantong. Ditambah lagi kalo pakai voucher.">Harga</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('') }}/#pembayaran"
                                            data-tour="step: 6; title: Pembayaran; content: Dimenu ini kamu dapat melihat metode pembayaran yang tersedia. Sangat Beragam, pilihlah sesukamu!">Pembayaran</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('') }}/#testimoni"
                                            data-tour="step: 7; title: Testimoni; content: Dimenu ini kamu dapat melihat testimoni dari klien kami yang merasa puas terhadap layanan kami. Kami hanya menampilkan 10 testimoni terakhir, kamu akan jadi yang selanjutnya!">Testimoni</a>

                    {{--                    <li class="nav-item"><a class="nav-link" href="{{ url('') }}/#pertanyaan_umum_dan_jawaban"--}}
                    {{--                                            data-tour="step: 8; title: Q & A; content: Dimenu ini kamu dapat melihat pertanyaan umum beserta jawabannya.">Q--}}
                    {{--                            & A</a>--}}
                    {{--                    </li>--}}

                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item" style=""><a class="nav-link nav-link-icon" href="{{ url('') }}/#masuk_registrasi"
                                            data-tour="step: 8; title: Akun; content: Dimenu ini kamu dapat registrasi / masuk di website kami secara manual guna melakukan pesanan. Atau kamu bisa langsung masuk tanpa registrasi dengan akun google, github, dan facebook.">
                            <i class="fa fa-user-o"></i>
                            <span class="nav-link-inner--text d-lg-none">Akun</span>
                        </a></li>

                    <li class="nav-item">
                        <a class="nav-link nav-link-icon" href="https://wa.me/{{ env('APP_NO_WA', '6282282692489') }}"
                           target="_blank"
                           data-toggle="tooltip"
                           title="Wa">
                            <i class="fa fa-whatsapp"></i>
                            <span class="nav-link-inner--text d-lg-none">Whatsapp</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-icon"
                           href="https://instagram.com/{{ env('APP_USERNAME_IG', 'ramdanriawan') }}"
                           target="_blank"
                           data-toggle="tooltip"
                           title="Instagram">
                            <i class="fa fa-instagram"></i>
                            <span class="nav-link-inner--text d-lg-none">Instagram</span>
                        </a>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link nav-link-icon"
                           href="https://www.youtube.com/channel/{{ env('APP_YOUTUBE_CHANEL_ID', 'UC87yxnSppdHlI0E-Hh7VrOw') }}"
                           target="_blank"
                           data-toggle="tooltip"
                           title="Youtube">
                            <i class="fa fa-youtube"></i>
                            <span class="nav-link-inner--text d-lg-none">Youtube</span>
                        </a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
    <!-- end NAVIGATION -->

    <!-- MAIN CAROUSEL SLIDER V.1 -->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <!--            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>-->
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1" class=""></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2" class=""></li>
        </ol>
        <div class="carousel-inner">

            <!--            <div class="carousel-item carousel-item-next carousel-item-left">-->
        <!--                <img class="d-block " src="{{ url('') }}/demos/business/images/slider/3.jpg" alt="First slide">-->

            <!--                <div class="carousel-caption ">-->
            <!--                    <h5>SELAMAT DATANG</h5>-->
            <!--                    <p>Buat website untuk bisnismu sekarang juga! Website membuat bisnismu dapat menjangkau lebih banyak-->
            <!--                        pelanggan</p>-->
            <!--                    <button type="button" class="btn btn-default btn-lg text-white"> Segera Bikin Di Bikin Aplikasi-->
            <!--                        Dev-->
            <!--                    </button>-->
            <!--                </div>-->
            <!--            </div>-->


            <div class="carousel-item carousel-item-next carousel-item-left ">
                <img class="d-block " src="{{ url('') }}/demos/business/images/slider/1.jpg" alt="Harga Terjangkau">
                <div class="carousel-caption">
                    <h5 id="harga-terjangkau" style="text-shadow: 5px 5px 5px rgba(0, 0, 0, .5);" class="mb-5">Harga
                        Terjangkau</h5>
                    {{--                    <h3 style="color: white !important; text-shadow: 5px 5px 5px rgba(0, 0, 0, .5);">Miliki website impian dengan harga terjangkau, kami memiliki beberapa paket pembelian harga mulai--}}
                    {{--                        dari 1.3JT</h4>--}}
                    <a type="button" class="btn btn-default btn-lg " href="{{ url('') }}/#masuk_registrasi">Pesan
                        Sekarang!</a>

                </div>
            </div>

            <div class="carousel-item carousel-item-next carousel-item-left active">
                <img class="d-block " src="{{ url('') }}/demos/business/images/slider/3.jpg" alt="Rancangan Yang Rapih">
                <div class="carousel-caption caption-2">
                    <h5 id="rancangan-rapih" style="text-shadow: 5px 5px 5px rgba(0, 0, 0, .5);" class="mb-5">RANCANGAN
                        YANG RAPIH</h5>
                    {{--                    <h3 style="color: white !important; text-shadow: 5px 5px 5px rgba(0, 0, 0, .5);">Tidak hanya sesuai kebutuhan, tapi rapih juga dalam pengembangan!</h4>--}}
                    <a href="{{ url('') }}/#masuk_registrasi" type="button" class="btn btn-default btn-lg text-white">
                        Pesan Sekarang!
                    </a>

                </div>
            </div>

            <div class="carousel-item carousel-item-next carousel-item-left">
                <img class="d-block " src="{{ url('') }}/demos/business/images/slider/2.jpg" alt="Performa Terbaik">
                <div class="carousel-caption caption-3">
                    <h5 id="performa-terbaik" style="text-shadow: 5px 5px 5px rgba(0, 0, 0, .5);" class="mb-5">PERFORMA
                        TERBAIK</h5>
                    {{--                    <h3 style="color: white !important; text-shadow: 5px 5px 5px rgba(0, 0, 0, .5);">Miliki website dengan performa terbaik, 99.99% tanpa gangguan dan aman meskipun tidak--}}
                    {{--                        diawasi!</h4>--}}
                    <a href="{{ url('') }}/#masuk_registrasi" type="button" class="btn btn-default btn-lg text-white">
                        Pesan Sekarang!
                    </a>

                </div>
            </div>

            <a class="carousel-control-prev" href="{{ url('') }}/#carouselExampleIndicators" role="button"
               data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="{{ url('') }}/#carouselExampleIndicators" role="button"
               data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>

        </div>
    </div>
    <!-- end CAROUSEL -->

</header>
<!-- end header area -->

<main>

    <!-- CORE SERVICES v.1  -->
    <section class="section section-lg core-services">
        <div class="container" style="height: -webkit-fill-available; height: -moz-available; height: -moz-available;"
             id="layanan">
            <div class="row justify-content-center text-center mb-lg">
                <div class="col-lg-8">
                    <h2 class="display-3" id="layanan-text"></h2>
                    <p class="lead text-muted">Kami memiliki layanan terbaik dan harga pasaran yang terjangkau oleh
                        anda, tidak membuat kantong jebol</p>
                </div>
            </div>

            <div class="row row-grid">
                <div class="col-lg-4  col-sm-4 text-center">
                    <div class="card card-lift--hover shadow border-0 ">
                        <div class="card-body py-5">
                            <div class="icon mb-4">
                                <i class="icon_ribbon_alt "></i>
                            </div>
                            <h6 class="text-uppercase text-primary">Pengembangan Yang Baik</h6>
                            <p class="description mt-3">Setiap software yang kami buat dibuat dengan sangat teliti, dari
                                mulai keamanan serta fiture yang dinginkan pelanggan.</p>

                        </div>
                    </div>
                </div>

                <div class="col-lg-4  col-sm-4 text-center">
                    <div class="card card-lift--hover shadow border-0">
                        <div class="card-body py-5">
                            <div class="icon mb-4">
                                <i class="icon_briefcase "></i>
                            </div>
                            <h6 class="text-uppercase text-primary">Satu Halaman &amp; Banyak Halaman</h6>
                            <p class="description mt-3">Kami bisa membuatkan aplikasi dari yang simple hanya satu
                                halaman hingga banyak halaman sekaligus.</p>

                        </div>
                    </div>
                </div>

                <div class="col-lg-4  col-sm-4 text-center">
                    <div class="card card-lift--hover shadow border-0">
                        <div class="card-body py-5">
                            <div class="icon mb-4">
                                <i class="icon_clock_alt"></i>
                            </div>
                            <h6 class="text-uppercase text-primary">Terus Diperbarui</h6>
                            <p class="description mt-3">Website akan terus diperbarui untuk menjaga kualitas serta
                                kestabilannya. Karena setiap website itu berharga. Sehingga bisnis anda tetap
                                terjaga.</p>

                        </div>
                    </div>
                </div>
            </div>

            <div class="row row-grid">
                <div class="col-lg-4  col-sm-4 text-center">
                    <div class="card card-lift--hover shadow border-0 ">
                        <div class="card-body py-5">
                            <div class="icon mb-4">
                                <i class="icon_chat_alt "></i>
                            </div>
                            <h6 class="text-uppercase text-primary">Respon Chat Cepat</h6>
                            <p class="description mt-3">Kami selalu bekerja sesuai jadwal dan selalu mengutamakan chat
                                untuk menjawab pertanyaan para klien.</p>

                        </div>
                    </div>
                </div>

                <div class="col-lg-4  col-sm-4 text-center">
                    <div class="card card-lift--hover shadow border-0">
                        <div class="card-body py-5">
                            <div class="icon mb-4">
                                <i class="icon_cart_alt "></i>
                            </div>
                            <h6 class="text-uppercase text-primary">Kualitas Produk</h6>
                            <p class="description mt-3">Produk yang kami hasilkan bukanlah produk asal jadi yang tidak
                                dianalisa lebih matang. Bagi kami kualitas adalah segalanya!</p>

                        </div>
                    </div>
                </div>

                <div class="col-lg-4  col-sm-4 text-center">
                    <div class="card card-lift--hover shadow border-0">
                        <div class="card-body py-5">
                            <div class="icon mb-4">
                                <i class="icon_wallet"></i>
                            </div>
                            <h6 class="text-uppercase text-primary">Harga & Promo</h6>
                            <p class="description mt-3">Kami selalu memberikan harga dan promo menarik disetiap periode,
                                jadi tunggu apalagi? SEGERA PESAN!</p>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- end CORE SERVICES -->

    <!-- SERVICES -->
    <section class="section section-lg bg-gradient-default service">

        <div class="container " style="height: -webkit-fill-available; height: -moz-available;" id="teknologi">
            <div class="row text-center justify-content-center">
                <div class="col-lg-8">
                    <h2 class="text-white display-3 teknologi" id="teknologi-text"></h2>
                    <p class="lead text-muted">Kami membuat website dengan teknologi yang terkini dan paling cocok,
                        berikut adalah teknologi pembikinan aplikasi yang kami pakai</p>
                </div>
            </div>

            <div class="row row-grid mt-5">
                <div class="col-lg-4  col-sm-6 text-center">
                    <!--                    <div class="icon icon-lg ">-->
                    <i class="fa fa-laravel text-white"></i>
                    <img src="{{ url('') }}/demos/business/images/icon/laravel.png" width="64" height="64"
                         alt="Laravel Framework"/>
                    <!--                    </div>-->
                    <h5 class="text-white mt-2">Laravel</h5>
                    <p class="text-white">Framework paling banyak dipakai didunia, sudah dijamin kemanan,
                        kemudahan, kestabilan serta terus diperbarui.</p>

                </div>
                <div class="col-lg-4  col-sm-6   text-center">
                    <img src="{{ url('') }}/demos/business/images/icon/codeigniter.png" width="64" height="64"
                         alt="Codeigniter Framework">
                    <h5 class="text-white mt-2">Codeigniter</h5>
                    <p class="text-white">Codigniter adalah salah satu framework pengembangan website yang paling
                        banyak dipakai setelah Laravel</p>
                </div>

                <div class="col-lg-4  col-sm-6 mt-sm-5 mt-md-0 text-center">
                    <img src="{{ url('') }}/demos/business/images/icon/java.png" width="64" height="64" alt="Java"/>
                    <h5 class="text-white mt-2">Java</h5>
                    <p class="text-white">Bahasa pemrograman paling banyak dipakai karena kestabilan serta
                        keamananya untuk pengembangan sebuah aplikasi.</p>
                </div>

                <div class="col-lg-4  col-sm-6 mt-sm-5 text-center">
                    <img src="{{ url('') }}/demos/business/images/icon/bootstrap.png" width="64" height="64"
                         alt="Bootstrap"/>
                    <h5 class="text-white mt-2">Bootstrap</h5>
                    <p class="text-white">Adalah framework pengembangan aplikasi berbasis website untuk membuat
                        websitemu lebih responsive</p>
                </div>
                <div class="col-lg-4  col-sm-6 mt-sm-5 text-center">
                    <img src="{{ url('') }}/demos/business/images/icon/mysql.png" width="64" height="64" alt="MySql"/>
                    <h5 class="text-white mt-2">MySql</h5>
                    <p class="text-white">Setiap aplikasi yang kami buat selalu menggunakan database MySql</p>
                </div>
                <div class="col-lg-4  col-sm-6 mt-sm-5 text-center">
                    <img src="{{ url('') }}/demos/business/images/icon/nginx.png" width="64" height="64" alt="NGINX"/>
                    <h5 class="text-white mt-2">NginX</h5>
                    <p class="text-white">Kami menggunakan server NginX untuk server yang 2x lebih cepat ketimbang
                        apache</p>
                </div>


                <div class="col-lg-4  col-sm-6 mt-sm-5 text-center">
                    <img src="{{ url('') }}/demos/business/images/icon/awss3.png" width="128" height="64"
                         alt="Amazon AWS S3"/>
                    <h5 class="text-white mt-2">Amazon AWS S3</h5>
                    <p class="text-white">Adalah Tempat Penyimpanan cloud ternama, dengan berbagai server. Disini
                        kami menggunakan server singapore untuk projek yang memerlukan penyimpanan super aman!</p>
                </div>
                <div class="col-lg-4  col-sm-6 mt-sm-5 text-center">
                    <img src="{{ url('') }}/demos/business/images/icon/tripay.png" width="64" height="64" alt="Tripay"/>
                    <h5 class="text-white mt-2">Tripay</h5>
                    <p class="text-white">Adalah payment gateway yang mensupport berbagai methode pembayaran,
                        sehingga dalam bertransaksi anda bisa memilih banyak metode.</p>
                </div>
                <div class="col-lg-4  col-sm-6 mt-sm-5 text-center">
                    <img src="{{ url('') }}/demos/business/images/icon/dll.png" width="64" height="64"
                         alt="Dan lain lain"/>
                    <h5 class="text-white mt-2">Dll..</h5>
                    <p class="text-white">Dan banyak sekali teknologi terbaik yang kami gunakan untuk menciptakan
                        aplikasi berkualitas! Misal django, springbot, node js, react js, angular js, firebase, redis, flutter, vue js
                        dll! Jangan ragu memilih kami!</p>
                </div>


            </div>
    </section>
    <!-- end SERVICES -->

    <!-- SECTION: ABOUT v.1  -->
    <section class="section section-lg">
        <div class="container" style="height: -webkit-fill-available; height: -moz-available;">
            <div class="row row-grid align-items-center">
                <div class="col-md-6 order-md-2 shadow">
                    <img src="{{ url('') }}/demos/business/images/section/2.png" class="img-fluid floating"
                         alt="Pengalaman">
                </div>
                <div class="col-md-6 order-md-1">
                    <div class="pr-md-5">

                        <h3>Kami +6 tahun berpengalaman sebagai developer aplikasi</h3>
                        <p class="text-justify">Waktu selama itu membuat pengetahuan dan pengalaman kami semakin baik,
                            sehingga terhindar
                            dari kesalahan dan error yang menyebabkan aplikasi tidak berjalan, anda bersama developer
                            profesional.</p>
                        <ul class="list-unstyled mt-5">
                            <li class="py-2">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <div class="badge-circle badge-default text-white mr-3">
                                            <i class="ni ni-settings-gear-65"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <h6 class="mb-0">Respon yang sangat cepat</h6>
                                    </div>
                                </div>
                            </li>
                            <li class="py-2">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <div class="badge badge-circle badge-default text-white mr-3">
                                            <i class="ni ni-html5"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <h6 class="mb-0">Aplikasi yang sangat baik</h6>
                                    </div>
                                </div>
                            </li>
                            <li class="py-2">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <div class="badge badge-circle badge-default text-white mr-3">
                                            <i class="ni ni-satisfied"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <h6 class="mb-0">Pelayanan yang sangat ramah</h6>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end SECTION ABOUT-->

    <!-- Section: Blog v.1 -->
    <section id="blog" class="section-lg bg-gradient-secondary">
        <div class="container"
             style="height: -webkit-fill-available; height: -moz-available; overflow: hidden !important" id="produk">
            <div class="row text-center justify-content-center">
                <!-- Section heading -->
                <h2 class="display-3 mb-5 produk" style="width: 100%;" id="produk-text"></h2>
                <!-- Section description -->

                <script>
                    filterSelection("all")

                    function filterSelection(c) {
                        var x, i;
                        x = document.getElementsByClassName("filterDiv");
                        if (c == "all") c = "";
                        // Add the "show" class (display:block) to the filtered elements, and remove the "show" class from the elements that are not selected
                        for (i = 0; i < x.length; i++) {
                            w3AddClass(x[i], "hide");
                            if (x[i].className.indexOf(c) > -1) {

                                w3AddClass(x[i], "show");
                                w3RemoveClass(x[i], "hide");
                            }
                        }
                    }

                    // Show filtered elements
                    function w3AddClass(element, name) {
                        var i, arr1, arr2;
                        arr1 = element.className.split(" ");
                        arr2 = name.split(" ");
                        for (i = 0; i < arr2.length; i++) {
                            if (arr1.indexOf(arr2[i]) == -1) {
                                element.className += " " + arr2[i];
                            }
                        }
                    }

                    // Hide elements that are not selected
                    function w3RemoveClass(element, name) {
                        var i, arr1, arr2;
                        arr1 = element.className.split(" ");
                        arr2 = name.split(" ");
                        for (i = 0; i < arr2.length; i++) {
                            while (arr1.indexOf(arr2[i]) > -1) {
                                arr1.splice(arr1.indexOf(arr2[i]), 1);
                            }
                        }
                        element.className = arr1.join(" ");
                    }

                </script>

                <!-- Control buttons -->
                <div id="myBtnContainer" class="mb-5" style="display: block !important">
                    <button class="btn-filter active" onclick="filterSelection('all')"> Semua</button>
                    <button class="btn-filter" onclick="filterSelection('e-learning')"> E-learning</button>
                    <button class="btn-filter" onclick="filterSelection('akademik')"> Akademik</button>
                    <button class="btn-filter" onclick="filterSelection('kependudukan')"> Kependudukan</button>
                    <button class="btn-filter" onclick="filterSelection('penggajian')"> Penggajian</button>
                    <button class="btn-filter" onclick="filterSelection('perpustakaan')"> Perpustakaan</button>
                    <button class="btn-filter" onclick="filterSelection('stok-produk')"> Stok Produk</button>
                    <button class="btn-filter" onclick="filterSelection('spk')"> SPK</button>
                    <button class="btn-filter" onclick="filterSelection('spp')"> SPP</button>
                    <button class="btn-filter" onclick="filterSelection('pengarsipan')"> Pengarsipan</button>
                </div>

                <!-- Grid row -->
                <div class="row" style="margin-bottom: 50px !important;">

                    <!-- Grid column -->
                    <div class="col-lg-4 col-md-6 mb-4 filterDiv e-learning">
                        <!-- Featured image -->
                        <div class="mb-4">
                            <img class="img-fluid" src="{{ url('') }}/demos/business/images/blog/1.png"
                                 alt="Sistem Informasi Elearning">
                        </div>
                        <!-- Post title -->
                        <h4 class="mb-3"> Sistem Informasi E-Learning </h4>
                        <!-- Excerpt -->
                        <p>Adalah sebuah sistem informasi alternatif pembelajaran untuk membantu sekolah dalam
                            melaksanakan tugas pendidikan.</p>
                        <!-- Read more button -->
                        <a class="btn btn-default mt-2" data-toggle="modal" href="#modal-elearning">DEMO</a>

                        <div class="modal modal-info" id="modal-elearning">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <div class="row text-center justify-content-center">
                                            <div class="col-12">
                                                <h4>Akun Login</h4>

                                                Admin: admin@gmail.com, pw: admin <br>
                                                Siswa: siswa1@gmail.com, pw: siswa <br>
                                                Guru: guru@gmail.com, pw: guru <br>
                                            </div>
                                        </div>

                                        <div class="text-center">
                                            <a href="https://e-learning-rindi.bikinaplikasi.dev/"
                                               class="btn btn-outline-default mt-2" target="_blank">LANJUTKAN
                                                >>></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-lg-4 col-md-6 mb-md-0 mb-4 filterDiv akademik">
                        <!-- Featured image -->
                        <div class="mb-4">
                            <img class="img-fluid" src="{{ url('') }}/demos/business/images/blog/2.jpg"
                                 alt="Sistem Informasi Akademik">
                        </div>
                        <!-- Post title -->
                        <h4 class="mb-3">Sistem Informasi Akademik</h4>
                        <!-- Excerpt -->
                        <p>Adalah sebuah sistem informasi untuk mengelola data perkapan nilai per siswa setiap
                            semesternya, sistem ini menggunakan KTSP K13</p>
                        <!-- Read more button -->
                        <a class="btn btn-default mt-2" data-toggle="modal" href="#modal-akademik">DEMO</a>

                        <div class="modal modal-info" id="modal-akademik">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <div class="row text-center justify-content-center">
                                            <div class="col-12">
                                                <h4>Akun Login</h4>

                                                Tu: tu@gmail.com, pw: tu <br>
                                                Siswa: tita@gmai.com, pw: siswa <br>
                                                Guru: rika@gmail.com, pw: guru <br>
                                            </div>
                                        </div>

                                        <div class="text-center">
                                            <a href="https://akademik-agoy.bikinaplikasi.dev/"
                                               class="btn btn-outline-default mt-2" target="_blank">LANJUTKAN
                                                >>></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-lg-4 col-md-6 mb-0  filterDiv kependudukan">
                        <!-- Featured image -->
                        <div class="mb-4">
                            <img class="img-fluid" src="{{ url('') }}/demos/business/images/blog/3.jpg"
                                 alt="Sistem Informasi Kependudukan">
                        </div>
                        <!-- Post title -->
                        <h4>Sistem Informasi Kependudukan</h4>
                        <!-- Excerpt -->
                        <p>Adalah sebuah sistem informasi yang mengelola data penduduk mulai dari kelahiran, kematian,
                            kepindahan, kedatangan, dll.</p>
                        <!-- Read more button -->
                        <a class="btn btn-default mb-4" data-toggle="modal" href="#modal-kependudukan">DEMO</a>

                        <div class="modal modal-info" id="modal-kependudukan">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <div class="row text-center justify-content-center">
                                            <div class="col-12">
                                                <h4>Akun Login</h4>

                                                Admin: admin@gmail.com, pw: admin<br>
                                                Kepala Desa: kepaladesa@gmail.com, pw: kepaladesa
                                            </div>
                                        </div>

                                        <div class="text-center">
                                            <a href="https://pendataan-penduduk-tina.bikinaplikasi.dev"
                                               class="btn btn-outline-default mt-2" target="_blank">LANJUTKAN
                                                >>></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-lg-4 col-md-6 mb-4  mt-sm-5 mt-md-0 filterDiv penggajian">
                        <!-- Featured image -->
                        <div class="mb-4">
                            <img class="img-fluid" src="{{ url('') }}/demos/business/images/blog/4.jpg"
                                 alt="Sistem Informasi Penggajian">
                        </div>
                        <!-- Post title -->
                        <h4 class="mb-3"> Sistem Informasi Penggajian </h4>
                        <!-- Excerpt -->
                        <p>Adalah sebuah sistem informasi untuk mengelola data penggajian karyawan / pegawai, d mana
                            sistem penggajiannya dibayar perjam dan bisa ditentukan perjamnya berapa.</p>
                        <!-- Read more button -->
                        <a class="btn btn-default mt-2" data-toggle="modal" href="#modal-penggajian">DEMO</a>

                        <div class="modal modal-info" id="modal-penggajian">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <div class="row text-center justify-content-center">
                                            <div class="col-12">
                                                <h4>Akun Login</h4>

                                                Admin: admin@gmail.com, pw: admin <br>
                                            </div>
                                        </div>

                                        <div class="text-center">
                                            <a href="https://penggajian-cut-mutia.bikinaplikasi.dev/"
                                               class="btn btn-outline-default mt-2" target="_blank">LANJUTKAN
                                                >>></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-lg-4 col-md-6 mb-md-0 mb-4  filterDiv perpustakaan">
                        <!-- Featured image -->
                        <div class="mb-4">
                            <img class="img-fluid" src="{{ url('') }}/demos/business/images/blog/5.jpg"
                                 alt="Sistem Informasi Perpustakaan">
                        </div>
                        <!-- Post title -->
                        <h4 class="mb-3">Sistem Informasi Perpustakaan </h4>
                        <!-- Excerpt -->
                        <p>Adalah sebuah sistem informasi untuk mengelola data perpustakaan meliputi data peminjaman,
                            pengembalian, denda, petugas, dll.</p>
                        <!-- Read more button -->
                        <a class="btn btn-default mt-2" data-toggle="modal" href="#modal-perpustakaan">DEMO</a>

                        <div class="modal modal-info" id="modal-perpustakaan">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <div class="row text-center justify-content-center">
                                            <div class="col-12">
                                                <h4>Akun Login</h4>

                                                Admin: admin@gmail.com, pw: admin <br>
                                                Siswa: nisawinda@gmail.com, pw: siswa <br>
                                                Guru: patmawati@gmail.com, pw: guru <br>
                                            </div>
                                        </div>

                                        <div class="text-center">
                                            <a href="http://perpustakaan-andri.bikinaplikasi.dev"
                                               class="btn btn-outline-default mt-2" target="_blank">LANJUTKAN
                                                >>></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-lg-4 col-md-6  filterDiv stok-produk">
                        <!-- Featured image -->
                        <div class="mb-4">
                            <img class="img-fluid" src="{{ url('') }}/demos/business/images/blog/6.jpg"
                                 alt="Sistem Informasi Manajemen Stok Produk">
                        </div>
                        <!-- Post title -->
                        <h4>Sistem Informasi Manajemen Stok Produk</h4>
                        <!-- Excerpt -->
                        <p>Adalah sebuah sistem informasi yang mengelola data stok produk mulai dari masuk, keluar,
                            beserta laporan produk per periodenya.</p>
                        <!-- Read more button -->
                        <a class="btn btn-default mt-2 mt-4 mb-4" data-toggle="modal" href="#modal-stok-produk">DEMO</a>

                        <div class="modal modal-info" id="modal-stok-produk">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <div class="row text-center justify-content-center">
                                            <div class="col-12">
                                                <h4>Akun Login</h4>

                                                Admin: admin@gmail.com, pw: admin <br>
                                                Owner: owner@gmail.com, pw: owner <br>
                                                Pelanggan: ramdanriawan3@gmail.com, pw: pelanggan <br>
                                            </div>
                                        </div>

                                        <div class="text-center">
                                            <a href="http://penjualan-perlengkapan-bayi-putri.bikinaplikasi.dev"
                                               class="btn btn-outline-default mt-2" target="_blank">LANJUTKAN
                                                >>></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-lg-4 col-md-6 mb-md-0 mb-4 mt-sm-5 filterDiv spk">
                        <!-- Featured image -->
                        <div class="mb-4">
                            <img class="img-fluid" src="{{ url('') }}/demos/business/images/blog/7.jpg"
                                 alt="Sistem Informasi SPK Beasiswa">
                        </div>
                        <!-- Post title -->
                        <h4 class="mb-3">Sistem Informasi SPK Beasiswa </h4>
                        <!-- Excerpt -->
                        <p>Adalah sebuah sistem informasi untuk mengelola data pemberian beasiswa di sebuah sekolah
                            berdasarkan metode profile matching.</p>
                        <!-- Read more button -->
                        <a class="btn btn-default mt-2" data-toggle="modal" href="#modal-spk-beasiswa">DEMO</a>

                        <div class="modal modal-info" id="modal-spk-beasiswa">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <div class="row text-center justify-content-center">
                                            <div class="col-12">
                                                <h4>Akun Login</h4>

                                                Admin: admin@gmail.com, pw: admin <br>
                                            </div>
                                        </div>

                                        <div class="text-center">
                                            <a href="http://spk-profile-matching-nurina.bikinaplikasi.dev"
                                               class="btn btn-outline-default mt-2" target="_blank">LANJUTKAN
                                                >>></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-lg-4 col-md-6 mt-sm-5 mb-0  filterDiv spp">
                        <!-- Featured image -->
                        <div class="mb-4">
                            <img class="img-fluid" src="{{ url('') }}/demos/business/images/blog/8.jpg"
                                 alt="Sistem Informasi SPP">
                        </div>
                        <!-- Post title -->
                        <h4>Sistem Informasi SPP</h4>
                        <!-- Excerpt -->
                        <p>Adalah sebuah sistem informasi yang mengelola data SPP disebuah sekolah, misal data spp
                            persemester untuk setiap siswa baru, kakak beradik, atau berprestasi.</p>
                        <!-- Read more button -->
                        <a class="btn btn-default mt-2" data-toggle="modal" href="#modal-spp">DEMO</a>

                        <div class="modal modal-info" id="modal-spp">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <div class="row text-center justify-content-center">
                                            <div class="col-12">
                                                <h4>Akun Login</h4>

                                                Admin: admin@gmail.com, pw: admin <br>
                                            </div>
                                        </div>

                                        <div class="text-center">
                                            <a href="https://spp-sekolah-nisa.bikinaplikasi.dev"
                                               class="btn btn-outline-default mt-2" target="_blank">LANJUTKAN
                                                >>></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Grid column -->


                    <!-- Grid column -->
                    <div class="col-lg-4 col-md-6 mt-5 mb-4  filterDiv pengarsipan">
                        <!-- Featured image -->
                        <div class="mb-4">
                            <img class="img-fluid" src="{{ url('') }}/demos/business/images/blog/9.jpg"
                                 alt="Sistem Informasi Pengarsipan Surat">
                        </div>
                        <!-- Post title -->
                        <h4 class="mb-3"> Sistem Informasi Pengarsipan Surat </h4>
                        <!-- Excerpt -->
                        <p>Adalah sebuah sistem informasi untuk mengelola data penggajian karyawan / pegawai, d mana
                            sistem penggajiannya dibayar perjam dan bisa ditentukan perjamnya berapa.</p>
                        <!-- Read more button -->
                        <a class="btn btn-default mt-2" data-toggle="modal" href="#modal-pengarsipan-surat">DEMO</a>

                        <div class="modal modal-info" id="modal-pengarsipan-surat">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <div class="row text-center justify-content-center">
                                            <div class="col-12">
                                                <h4>Akun Login</h4>

                                                Admin: admin@gmail.com, pw: admin <br>
                                                Rekrutmen: ketua@gmail.com, pw: ketua <br>
                                                Rekrutmen: murniatiningsih@gmail.com, pw: unit kerja <br>
                                            </div>
                                        </div>

                                        <div class="text-center">
                                            <a href="https://pengarsipan-surat-fikri.bikinaplikasi.dev"
                                               class="btn btn-outline-default mt-2" target="_blank">LANJUTKAN
                                                >>></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Grid column -->

                </div>
                <!-- Grid row -->

                <script>

                    // Add active class to the current control button (highlight it)
                    $('.btn-filter').click(function () {
                        // Add active class to the current control button (highlight it)
                        $('.btn-filter').removeClass('active');
                        $(this).addClass('active');
                    })
                </script>
            </div>
        </div>
    </section>
    <!-- end SECTION: Blog v.1 -->


    <!-- Section: Blog v.1 -->
    <section id="blog" class="section-lg bg-gradient-secondary mb-5" style="margin-bottom: 50px !important;">
        <div class="container"
             style="height: -webkit-fill-available; height: -moz-available; overflow: hidden !important" id="produk-android">
            <div class="row text-center justify-content-center">
                <!-- Section heading -->
                <h2 class="display-3 mb-5 produk-android" style="width: 100%;" id="produk-text-android"></h2>
                <!-- Section description -->

                <script>
                    filterSelection("all")

                    function filterSelection(c) {
                        var x, i;
                        x = document.getElementsByClassName("filterDiv");
                        if (c == "all") c = "";
                        // Add the "show" class (display:block) to the filtered elements, and remove the "show" class from the elements that are not selected
                        for (i = 0; i < x.length; i++) {
                            w3AddClass(x[i], "hide");
                            if (x[i].className.indexOf(c) > -1) {

                                w3AddClass(x[i], "show");
                                w3RemoveClass(x[i], "hide");
                            }
                        }
                    }

                    // Show filtered elements
                    function w3AddClass(element, name) {
                        var i, arr1, arr2;
                        arr1 = element.className.split(" ");
                        arr2 = name.split(" ");
                        for (i = 0; i < arr2.length; i++) {
                            if (arr1.indexOf(arr2[i]) == -1) {
                                element.className += " " + arr2[i];
                            }
                        }
                    }

                    // Hide elements that are not selected
                    function w3RemoveClass(element, name) {
                        var i, arr1, arr2;
                        arr1 = element.className.split(" ");
                        arr2 = name.split(" ");
                        for (i = 0; i < arr2.length; i++) {
                            while (arr1.indexOf(arr2[i]) > -1) {
                                arr1.splice(arr1.indexOf(arr2[i]), 1);
                            }
                        }
                        element.className = arr1.join(" ");
                    }

                </script>

                <!-- Control buttons -->
                <div id="myBtnContainer" class="mb-5" style="display: block !important">
                    <button class="btn-filter active" onclick="filterSelection('all')"> Semua</button>
                    <button class="btn-filter" onclick="filterSelection('reservasi')">Reservasi Rumah & Kos</button>
                    <button class="btn-filter" onclick="filterSelection('pendataan')"> Pendataan Anggota</button>
                    <button class="btn-filter" onclick="filterSelection('travel')"> Aplikasi Travel</button>
                    <button class="btn-filter" onclick="filterSelection('keagamaan')"> Keagamaan & Donasi</button>
                    <button class="btn-filter" onclick="filterSelection('booking')"> Booking Antrian</button>
                    <button class="btn-filter" onclick="filterSelection('wisata')"> Aplikasi Wisata</button>
                </div>

                <!-- Grid row -->
                <div class="row" style="margin-bottom: 50px !important;">

                    <!-- Grid column -->
                    <div class="col-lg-4 col-md-6 mb-4 filterDiv reservasi">
                        <!-- Featured image -->
                        <div class="mb-4">
                            <img class="img-fluid" src="{{ url('') }}/demos/business/images/blog/android1.png"
                                 alt="Aplikasi Reservasi Rumah & Kos">
                        </div>
                        <!-- Post title -->
                        <h4 class="mb-3"> Aplikasi Reservasi Rumah & Kos </h4>
                        <!-- Excerpt -->
                        <p>Adalah sebuah sistem informasi untuk mencari kos kosan dan kontrakan di suatu daerah dengan menggunakan GIS untuk menentukan lokasid dan juga jarak dari si user.</p>
                        <!-- Read more button -->
{{--                        <a class="btn btn-default mt-2" data-toggle="modal" href="#modal-elearning">DEMO</a>--}}

                        <div class="modal modal-info" id="modal-elearning">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <div class="row text-center justify-content-center">
                                            <div class="col-12">
                                                <h4>Akun Login</h4>

                                                Admin: admin@gmail.com, pw: admin123 <br>
                                                Siswa: siswa1@gmail.com, pw: siswa <br>
                                                Guru: guru@gmail.com, pw: guru <br>
                                            </div>
                                        </div>

                                        <div class="text-center">
                                            <a href="https://e-learning.bikinaplikasi.dev"
                                               class="btn btn-outline-default mt-2" target="_blank">LANJUTKAN
                                                >>></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-lg-4 col-md-6 mb-md-0 mb-4 filterDiv pendataan">
                        <!-- Featured image -->
                        <div class="mb-4">
                            <img class="img-fluid" src="{{ url('') }}/demos/business/images/blog/android2.png"
                                 alt="Aplikasi Pendataan Anggota">
                        </div>
                        <!-- Post title -->
                        <h4 class="mb-3">Aplikasi Pendataan Anggota</h4>
                        <!-- Excerpt -->
                        <p>Adalah sebuah sistem informasi untuk data anggota di suatu instansi, dari mulai pendaftaran hingga di terima dan kemudian di rekap dalam bentuk laporan grafik</p>
                        <!-- Read more button -->
{{--                        <a class="btn btn-default mt-2" data-toggle="modal" href="#modal-akademik">DEMO</a>--}}

                        <div class="modal modal-info" id="modal-akademik">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <div class="row text-center justify-content-center">
                                            <div class="col-12">
                                                <h4>Akun Login</h4>

                                                Tu: tu@gmail.com, pw: tu@gmail.com <br>
                                                Siswa: siswa1@gmail.com, pw: siswa <br>
                                                Guru: guru9@gmail.com, pw: guru <br>
                                            </div>
                                        </div>

                                        <div class="text-center">
                                            <a href="https://akademik.bikinaplikasi.dev/"
                                               class="btn btn-outline-default mt-2" target="_blank">LANJUTKAN
                                                >>></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-lg-4 col-md-6 mb-0  filterDiv travel">
                        <!-- Featured image -->
                        <div class="mb-4">
                            <img class="img-fluid" src="{{ url('') }}/demos/business/images/blog/android3.png"
                                 alt="Aplikasi Travel">
                        </div>
                        <!-- Post title -->
                        <h4>Aplikasi Travel</h4>
                        <!-- Excerpt -->
                        <p>Adalah sebuah sistem informasi yang mengelola travel dari mulai booking tiket hingga penambahan penumpang ketika perjalanan sudah dimulai.</p>
                        <!-- Read more button -->
{{--                        <a class="btn btn-default mb-4" data-toggle="modal" href="#modal-kependudukan">DEMO</a>--}}

                        <div class="modal modal-info" id="modal-kependudukan">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <div class="row text-center justify-content-center">
                                            <div class="col-12">
                                                <h4>Akun Login</h4>

                                                Admin: admin, pw: admin
                                            </div>
                                        </div>

                                        <div class="text-center">
                                            <a href="https://kependudukan.bikinaplikasi.dev"
                                               class="btn btn-outline-default mt-2" target="_blank">LANJUTKAN
                                                >>></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-lg-4 col-md-6 mb-4  mt-sm-5 mt-md-0 filterDiv keagamaan">
                        <!-- Featured image -->
                        <div class="mb-4">
                            <img class="img-fluid" src="{{ url('') }}/demos/business/images/blog/android4.png"
                                 alt="Aplikasi Keagamaan & Donasi">
                        </div>
                        <!-- Post title -->
                        <h4 class="mb-3">Aplikasi Keagamaan & Donasi </h4>
                        <!-- Excerpt -->
                        <p>Adalah sebuah sistem informasi untuk mengelola hal hal yang berkaitan dengan keagamaan, seperti ibadah, donasi, surat surat, kitab, dll.</p>
                        <!-- Read more button -->
{{--                        <a class="btn btn-default mt-2" data-toggle="modal" href="#modal-penggajian">DEMO</a>--}}

                        <div class="modal modal-info" id="modal-penggajian">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <div class="row text-center justify-content-center">
                                            <div class="col-12">
                                                <h4>Akun Login</h4>

                                                Admin: admin@gmail.com, pw: admin@gmail.com <br>
                                                Guru: guru@gmail.com, pw: guru@gmail.com <br>
                                                Kepsek: kepsek@gmail.com, pw: kepsek@gmail.com <br>
                                            </div>
                                        </div>

                                        <div class="text-center">
                                            <a href="https://penggajian.bikinaplikasi.dev"
                                               class="btn btn-outline-default mt-2" target="_blank">LANJUTKAN
                                                >>></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-lg-4 col-md-6 mb-md-0 mb-4  filterDiv booking">
                        <!-- Featured image -->
                        <div class="mb-4">
                            <img class="img-fluid" src="{{ url('') }}/demos/business/images/blog/android5.png"
                                 alt="Aplikasi Booking Antrian">
                        </div>
                        <!-- Post title -->
                        <h4 class="mb-3">Aplikasi Booking Antrian</h4>
                        <!-- Excerpt -->
                        <p>Adalah sebuah sistem informasi untuk mengelola data booking antrian dari beberapa layanan yang digunakan.</p>
                        <!-- Read more button -->
{{--                        <a class="btn btn-default mt-2" data-toggle="modal" href="#modal-perpustakaan">DEMO</a>--}}

                        <div class="modal modal-info" id="modal-perpustakaan">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <div class="row text-center justify-content-center">
                                            <div class="col-12">
                                                <h4>Akun Login</h4>

                                                Admin: admin@gmail.com, pw: admin@gmail.com <br>
                                                Petugas: siswa1@gmail.com, pw: petugas@gmail.com <br>
                                            </div>
                                        </div>

                                        <div class="text-center">
                                            <a href="http://perpustakaan.bikinaplikasi.dev"
                                               class="btn btn-outline-default mt-2" target="_blank">LANJUTKAN
                                                >>></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-lg-4 col-md-6  filterDiv wisata">
                        <!-- Featured image -->
                        <div class="mb-4">
                            <img class="img-fluid" src="{{ url('') }}/demos/business/images/blog/android6.png"
                                 alt="Aplikasi Wisata">
                        </div>
                        <!-- Post title -->
                        <h4>Aplikasi Wisata</h4>
                        <!-- Excerpt -->
                        <p>Adalah sebuah sistem informasi yang mengelola data wisata dan perjalanan ke suatu tempat, hingga melakukan pembookingan tiket.</p>
                        <!-- Read more button -->
{{--                        <a class="btn btn-default mt-2 mt-4 mb-4" data-toggle="modal" href="#modal-stok-produk">DEMO</a>--}}

                        <div class="modal modal-info" id="modal-stok-produk">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <div class="row text-center justify-content-center">
                                            <div class="col-12">
                                                <h4>Akun Login</h4>

                                                Admin: admin@gmail.com, pw: admin@gmail.com <br>
                                                Owner: owner@gmail.com, pw: owner@gmail.com <br>
                                                Pelanggan: pelanggan@gmail.com, pw: pelanggan@gmail.com <br>
                                            </div>
                                        </div>

                                        <div class="text-center">
                                            <a href="http://stok-produk.bikinaplikasi.dev"
                                               class="btn btn-outline-default mt-2" target="_blank">LANJUTKAN
                                                >>></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Grid column -->

                </div>
                <!-- Grid row -->

                <script>

                    // Add active class to the current control button (highlight it)
                    $('.btn-filter').click(function () {
                        // Add active class to the current control button (highlight it)
                        $('.btn-filter').removeClass('active');
                        $(this).addClass('active');
                    })
                </script>
            </div>
        </div>
    </section>
    <!-- end SECTION: Blog v.1 -->


    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,800,900%7cRaleway:300,400,500,600,700"
          rel="stylesheet">
    <section class="pricing-area pt-100 pb-100"
             style="height: -webkit-fill-available; height: -moz-available;">
        <div class="container" id="harga" style="height: -webkit-fill-available; height: -moz-available;">
            <div class="row">
                <div class="col-xl-8 mx-auto text-center">
                    <div class="section-title">
                        <h2 class="harga" id="harga-text"></h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4 col-sm-6" style="margin-bottom: 20px !important">
                    <div class="single-price">
                        <div class="price-title">
                            <h4>KP</h4>
                        </div>
                        <div class="price-tag">
                            <h2>RP1.3 <span>JT</span></h2>
                        </div>
                        <div class="price-item">
                            <ul>
                                <li>+Laporan Full= 2.3JT</li>
                                <li>+Laporan 456 Saja= 1.8JT</li>
                                <li>Bisa Langsung Online</li>
                                <li>Full Revisi s/d Sidang</li>
                                <li>Diajarin Tips & Trik Sidang</li>
                                <li>Diskon 200rb untuk lanjut skripsi / jika bawa temen (Jika Full)</li>
                                <li>Diskon 100rb untuk lanjut skripsi  / jika bawa temen (Jika Tidak Full)</li>
                            </ul>
                        </div>
{{--                        <a href="{{ url('') }}/#masuk_registrasi" class="btn btn-default">PESAN</a>--}}
                    </div>
                </div>
                <div class="col-xl-4 col-sm-6" style="margin-bottom: 20px !important">
                    <div class="single-price">
                        <div class="price-title">
                            <h4>SKRIPSI</h4>
                        </div>
                        <div class="price-tag">
                            <h2>RP1.5 <span>JT</span></h2>
                        </div>
                        <div class="price-item">
                            <ul>
                                <li>+Laporan Full = 3JT</li>
                                <li>+Laporan 456 Saja = 2.5JT</li>
                                <li>Bisa Langsung Online</li>
                                <li>Full Revisi s/d Sidang</li>
                                <li>Diajarin Tips & Trik Sidang</li>
                                <li>Gratis Soal & Latihan Office</li>
                                <li>Diskon 200rb jika bawa temen (Jika Full)</li>
                                <li>Diskon 100rb jika bawa temen (Jika Tidak Full)</li>
                            </ul>
                        </div>
{{--                        <a href="{{ url('') }}/#masuk_registrasi" class="btn btn-default">PESAN</a>--}}
                    </div>
                </div>
                <div class="col-xl-4 col-sm-6" style="margin-bottom: 20px !important">
                    <div class="single-price">
                        <div class="price-title">
                            <h4>CUSTOM</h4>
                        </div>
                        <div class="price-tag">
                            <h2> >RP5 <span>JT</span></h2>
                        </div>
                        <div class="price-item">
                            <ul>
                                <li>Bisa langsung online</li>
                                <li>Siap pakai tanpa ribet</li>
                                <li>Maintenence dan update fiture</li>
                                <li>Bisa Custom Sesuai Alur Bisnis</li>
                                <li>Biaya Terjangkau</li>
                                <li>Gratis setup vps!</li>
                                <li>+Hosting / vps & Domain 1 tahun = 2jt (Pengunjung tidak terlalu ramai)</li>
                            </ul>
                        </div>
{{--                        <a href="{{ url('') }}/#masuk_registrasi" class="btn btn-default">PESAN</a>--}}
                    </div>
                </div>

                <div class="col-xl-4 col-sm-6  mb-4">
                    <div class="single-price">
                        <div class="price-title">
                            <h4>SCRAPE WEB</h4>
                        </div>
                        <div class="price-tag">
                            <h2> >RP 2<span>JT</span></h2>
                        </div>
                        <div class="price-item">
                            <ul>
                                <li>Tanpa authentikasi bisa!</li>
                                <li>Ribuan produk</li>
                                <li>Ribuan gambar</li>
                                <li>Simpan ke dataabse / ke excel</li>
                            </ul>
                        </div>
{{--                        <a href="{{ url('') }}/#masuk_registrasi" class="btn btn-default">PESAN</a>--}}
                    </div>
                </div>

                <div class="col-xl-4 col-sm-6 mb-4">
                    <div class="single-price">
                        <div class="price-title">
                            <h4>DESIGN UI / UX</h4>
                        </div>
                        <div class="price-tag">
                            <h2> >RP 2<span>JT</span></h2>
                        </div>
                        <div class="price-item">
                            <ul>
                                <li>Design aplikasi android</li>
                                <li>Design aplikasi website</li>
                                <li>Profesional dan berkualitas!</li>
                                <li>Buat bisnismu lebih dikenal!</li>
                            </ul>
                        </div>
{{--                        <a href="{{ url('') }}/#masuk_registrasi" class="btn btn-default">PESAN</a>--}}
                    </div>
                </div>

                <div class="col-xl-4 col-sm-6 ">
                    <div class="single-price">
                        <div class="price-title">
                            <h4>Robot Trading</h4>
                        </div>
                        <div class="price-tag">
                            <h2> >RP 36<span>JT</span></h2>
                        </div>
                        <div class="price-item">
                            <ul>
                                <li>Robot trading by indicator</li>
                                <li>Robot trading by meta trader</li>
                                <li>Robot trading by persentase buy</li>
                                <li>Robot trading by aplikasi android</li>
                                <li>Robot trading by website only</li>
                                <li>Gratis setup vps!</li>
                                <li>Gratis maintenance & perbaikan bug hingga 6 bulan!</li>
                            </ul>
                        </div>
{{--                        <a href="{{ url('') }}/#masuk_registrasi" class="btn btn-danger">Masuk!</a>--}}
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- CONTACT FORM -->
    <section class="section section-lg section-contact-us bg-gradient-default"
             style="height: -webkit-fill-available; height: -moz-available;">
                <div class="container" style="height: -webkit-fill-available; height: -moz-available;" id="masuk_registrasi">
                    <div class="row justify-content-center">
                        <div class="col-sm-6" style="margin-bottom: 50px !important">
                            <div class="card bg-gradient-secondary shadow">
                                <div class="card-body p-lg-5 text-center">
                                    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
{{--                                    <form action="{{ route('register_user') }}" method="post">--}}

                                        <input type="hidden" name="r" value="{{ request()->segment(2) }}">

                                        <h2 class="mb-1 display-3" id="registrasi-text"></h2>
                                        <p class="mt-0 ">Khusus Pelanggan Baru</p>
                                        <div class="form-group mt-5">
                                            <div class="input-group input-group-alternative"
                                                 style="margin-bottom: 10px !important;">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="ni ni-user-run"></i></span>
                                                </div>
                                                <input class="form-control" placeholder="Nama" type="text" name="name"
                                                       value="{{ old('name') }}">
                                            </div>

                                            @if($errors->has('name'))
                                                @foreach($errors->get('name') as $message)
                                                    <span class="control-label mt-3" for="inputError"><i
                                                            class="fa fa-times-circle-o"></i> {{ $message }}
                                                    </span>
                                                @endforeach
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <div class="input-group input-group-alternative"
                                                 style="margin-bottom: 10px !important;">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                                </div>
                                                <input class="form-control" placeholder="Email" type="email" name="email"
                                                       value="{{ old('email') }}">
                                            </div>

                                            @if($errors->has('email'))
                                                @foreach($errors->get('email') as $message)
                                                    <span class="control-label mt-3" for="inputError"><i
                                                            class="fa fa-times-circle-o"></i> {{ $message }}
                                                    </span>
                                                @endforeach
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <div class="input-group input-group-alternative"
                                                 style="margin-bottom: 10px !important;">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-user"></i></span>
                                                </div>
                                                <input class="form-control" placeholder="Username" type="text" name="username"
                                                       value="{{ old('username') }}">
                                            </div>

                                            @if($errors->has('username'))
                                                @foreach($errors->get('username') as $message)
                                                    <span class="control-label mt-3" for="inputError"><i
                                                            class="fa fa-times-circle-o"></i> {{ $message }}
                                                    </span>
                                                @endforeach
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <div class="input-group input-group-alternative"
                                                 style="margin-bottom: 10px !important;">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-phone"></i></span>
                                                </div>
                                                <input class="form-control" placeholder="No Hp / Wa" type="number" name="no_hp"
                                                       value="{{ old('no_hp') }}">
                                            </div>

                                            @if($errors->has('no_hp'))
                                                @foreach($errors->get('no_hp') as $message)
                                                    <span class="control-label mt-3" for="inputError"><i
                                                            class="fa fa-times-circle-o"></i> {{ $message }}
                                                    </span>
                                                @endforeach
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <div class="input-group input-group-alternative"
                                                 style="margin-bottom: 10px !important;">
                                                <div class="input-group-prepend input-group-prepend-password"
                                                     style="margin-bottom: 0">
                                                    <span class="input-group-text"><i class="fa fa-lock"></i></span>
                                                </div>
                                                <input class="form-control" placeholder="Password"
                                                       type="password"
                                                       name="password" value="{{ old('password') }}">
                                            </div>

                                            @if($errors->has('password'))
                                                @foreach($errors->get('password') as $message)
                                                    <span class="control-label mt-3" for="inputError"><i
                                                            class="fa fa-times-circle-o"></i> {{ $message }}
                                                    </span>
                                                @endforeach
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <div class="input-group input-group-alternative"
                                                 style="margin-bottom: 10px !important;">
                                                <div class="input-group-prepend input-group-prepend-password"
                                                     style="margin-bottom: 0">
                                                    <span class="input-group-text"><i class="fa fa-lock"></i></span>
                                                </div>
                                                <input class="form-control"
                                                       placeholder="Konfirmasi Password" type="password"
                                                       name="password_confirmation" value="{{ old('password_confirmation') }}">
                                            </div>

                                            @if($errors->has('password_confirmation'))
                                                @foreach($errors->get('password_confirmation') as $message)
                                                    <span class="control-label mt-3" for="inputError"><i
                                                            class="fa fa-times-circle-o"></i> {{ $message }}
                                                    </span>
                                                @endforeach
                                            @endif
                                        </div>

                                        <div class="form-group text-">
                                            <input required type="checkbox" name="syarat_dan_ketentuan"> <a data-toggle="modal"
                                                                                                            data-target="#modal-kebijakan-privasi"
                                                                                                            style="cursor: pointer">Baca
                                                Kebijakan Privasi</a>
                                        </div>

                                        <div class="g-recaptcha form-group"
                                             data-sitekey="6Le6F-MUAAAAAC16Y65VbeBkeYK3PDZaOi7FPdvi"></div>
                                        <div>

                                            <button type="submit"
                                                    class="g-recaptcha btn btn-default btn-round btn-block btn-lg  mb-3 disabled">
                                                <i class="fa fa-check"></i> Registrasi  (Chat admin!)
                                            </button>
                                        </div>
{{--                                    </form>--}}
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="card bg-gradient-secondary shadow">
                                <div class="card-body p-lg-5 text-center">
{{--                                    <form action="{{ url('admin/auth/login') }}" method="post">--}}
                                        <h2 class="mb-1 display-3" id="masuk-text">Masuk</h2>
                                        <p class="mt-0 ">Jika Sudah Punya Akun</p>
                                        <div class="form-group mt-5">
                                            <div class="input-group input-group-alternative"
                                                 style="margin-bottom: 10px !important;">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-user-circle"></i></span>
                                                </div>
                                                <input class="form-control" placeholder="Username" type="text"
                                                       name="username_login"
                                                       value="{{ old('username_login') }}" required>
                                            </div>

                                            @if($errors->has('username_login'))
                                                @foreach($errors->get('username_login') as $message)
                                                    <span class="control-label mt-3" for="inputError"><i
                                                            class="fa fa-times-circle-o"></i> {{ $message }}
                                                    </span>
                                                @endforeach
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group input-group-alternative"
                                                 style="margin-bottom: 10px !important;">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-lock"></i></span>
                                                </div>
                                                <input class="form-control  exclude" placeholder="Password" type="password"
                                                       name="password_login" value="{{ old('password_login') }}" required>
                                            </div>

                                            @if($errors->has('password_login'))
                                                @foreach($errors->get('password_login') as $message)
                                                    <span class="control-label mt-3" for="inputError"><i
                                                            class="fa fa-times-circle-o"></i> {{ $message }}
                                                    </span>
                                                @endforeach
                                            @endif
                                        </div>

                                        <button type="submit" class="btn btn-default btn-round btn-block btn-lg disabled">
                                            <i class="fa fa-arrow-right"></i>
                                            Masuk (Chat admin!)
                                        </button>
{{--                                    </form>--}}

                                    <div>

{{--                                        <a type="button" class="btn btn-outline-primary btn-round btn-block btn-lg mb-3"--}}
{{--                                           data-toggle="modal"--}}
{{--                                           data-target="#modelId"><i class="fa fa-lock"></i> Lupa Password?--}}

{{--                                        </a>--}}

{{--                                        <div class="text-left">--}}
{{--                                            <strong>Masuk dengan: </strong>--}}

{{--                                            <style>--}}
{{--                                                .btn-socialite {--}}
{{--                                                    margin: 3px !important;--}}
{{--                                                    padding: 3px !important;--}}
{{--                                                }--}}

{{--                                                .btn-socialite:hover {--}}
{{--                                                    margin: 3px !important;--}}
{{--                                                    padding: 3px !important;--}}
{{--                                                    background-color: initial;--}}
{{--                                                }--}}
{{--                                            </style>--}}

{{--                                            <a href="{{ url('auth/redirect/github') }}" type="button"--}}
{{--                                               class="btn-socialite btn btn-outline-info rounded-circle border-0"--}}
{{--                                               style="margin: 5px !important;">--}}
{{--                                                <i class="fa fa-2x fa-github"></i>--}}
{{--                                            </a>--}}

{{--                                            <a href="{{ url('auth/redirect/google') }}" type="button"--}}
{{--                                               class="btn-socialite btn btn-outline-info rounded-circle border-0"--}}
{{--                                               style="margin: 5px !important;">--}}
{{--                                                <i class="fa fa-2x fa-google"></i>--}}
{{--                                            </a>--}}

{{--                                            <a href="{{ url('auth/redirect/facebook') }}" type="button"--}}
{{--                                               class="btn-socialite btn btn-outline-info rounded-circle border-0"--}}
{{--                                               style="margin: 5px !important;">--}}
{{--                                                <i class="fa fa-2x fa-facebook"></i>--}}
{{--                                            </a>--}}
{{--                                                                                --}}
{{--                                                                                <a href="{{ url('auth/redirect/instagrambasic') }}"  type="button" class="btn-socialite btn btn-outline-info rounded-circle border-0" style="margin: 5px !important;">--}}
{{--                                                                                    <i class="fa fa-2x fa-instagram"></i>--}}
{{--                                                                                </a>--}}
{{--                                        </div>--}}

                                        <!-- Modal -->
                                        <div class="modal fade" id="modelId" tabindex="-1" role="dialog"
                                             aria-labelledby="modelTitleId" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-body">
                                                        <div class="container-fluid">
                                                            <strong>Klik reset lalu buka email anda, berlaku untuk 1 jam
                                                                kedepan.</strong>
                                                            <div class="form-group text-left mt-4">
                                                                <label for="">
                                                                    <strong>Email</strong>
                                                                </label>
                                                                <input type="email" name="email" id="email"
                                                                       placeholder="Masukkan Email Terdaftar..."
                                                                       style="border: none; width: 100%; height: 50px; padding: 10px;"
                                                                       required>
                                                            </div>

                                                            <div class="form-group text-left">
                                                                <label for="">
                                                                    <strong>Password Baru</strong>
                                                                </label>
                                                                <input type="password" name="password_baru" id="password_baru"
                                                                       placeholder="Masukkan Password Baru..."
                                                                       style="border: none; width: 100%; height: 50px; padding: 10px;"
                                                                       required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mb-4">
                                                        <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Batal
                                                        </button>

                                                        <button type="button" class="btn btn-primary text-white" id="btn-reset">
                                                            Reset
                                                        </button>

                                                        <script>
                                                            $(document).ready(function (event) {
                                                                var btnReset = $('#btn-reset');

                                                                btnReset.click(function () {
                                                                    var email = $('#email');
                                                                    var password_baru = $('#password_baru');

                                                                    $.ajax({
                                                                        url: '{{ secure_url("forgot_password?email=") }}' + email.val() + "&password_baru=" + password_baru.val()
                                                                    })

                                                                    email.val('')
                                                                    password_baru.val('')

                                                                    $('#modelId').modal('hide')
                                                                })
                                                            })
                                                        </script>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <script>

                                            $('#exampleModal').on('show.bs.modal', event => {
                                                var button = $(event.relatedTarget);
                                                var modal = $(this);

                                            });
                                        </script>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    </section>
    <!-- end CONTACT FORM -->

    <!-- PARTNER LOGO -->
    <style src="https://unpkg.com/aos@2.3.1/dist/aos.css"></style>
    <section class="section bg-gradient-secondary">
        <div class="container" style="height: -webkit-fill-available; height: -moz-available;" id="pembayaran">
            <h1 class="title text-center" style="margin-bottom: 25px !important" id="pembayaran-text">

            </h1>
            <div class="row custom-card-shadow">
                <div class="col-lg-4 col-md-6 col-12 aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="align-self-center">
                                    <img
                                        src="https://payment.tripay.co.id/images/payment-channel/szezRhAALB1583408731.png"
                                        alt="Bikinaplikasi - Bank Permata" style="width: 130px !important">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12 aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="align-self-center">
                                    <img
                                        src="https://payment.tripay.co.id/images/payment-channel/n22Qsh8jMa1583433577.png"
                                        alt="Bikinaplikasi - Bank BNI" style="width: 115px !important">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12 aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="align-self-center">
                                    <img
                                        src="https://payment.tripay.co.id/images/payment-channel/8WQ3APST5s1579461828.png"
                                        alt="Bikinaplikasi - Bank BRI" style="width: 135px !important">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12 aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="align-self-center">
                                    <img
                                        src="https://payment.tripay.co.id/images/payment-channel/T9Z012UE331583531536.png"
                                        alt="Bikinaplikasi - Bank Mandiri" style="width: 105px !important">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12 aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="align-self-center">
                                    <img
                                        src="https://payment.tripay.co.id/images/payment-channel/ytBKvaleGy1605201833.png"
                                        alt="Bikinaplikasi - Bank BCA" style="width: 100px !important">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12 aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="align-self-center">
                                    <img
                                        src="https://payment.tripay.co.id/images/payment-channel/KHcqcmqVFQ1607091889.png"
                                        alt="Bikinaplikasi - Bank Sinarmas" style="width: 170px !important">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12 aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="align-self-center">
                                    <img
                                        src="https://payment.tripay.co.id/images/payment-channel/GGwwcgdYaG1611929720.png"
                                        alt="Bikinaplikasi - Bank Muamalat" style="width: 140px !important">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12 aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="align-self-center">
                                    <img
                                        src="https://payment.tripay.co.id/images/payment-channel/WtEJwfuphn1614003973.png"
                                        alt="Bikinaplikasi - Bank CIMB Niaga" style="width: 140px !important">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-12 aos-init" data-aos="fade-up" data-aos-delay="100">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="align-self-center">
                                    <img
                                        src="https://payment.tripay.co.id/images/payment-channel/jiGZMKp2RD1583433506.png"
                                        alt="Bikinaplikasi - Alfamart" style="width: 140px !important">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row custom-card-shadow" style="margin-top: 5px !important">
                <div class="col-lg-4 col-md-6 col-12 aos-init" data-aos="fade-up" data-aos-delay="100">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="align-self-center">
                                    <img
                                        src="https://payment.tripay.co.id/images/payment-channel/BpE4BPVyIw1605597490.png"
                                        alt="Bikinaplikasi - QRIS" style="width: 100% !important">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <p></p>
        </div>
    </section>
    <!-- end PARTNER LOGO -->

    <style>

        img.testimoni {
            max-width: 100%;
        }

        .section-title {
            font-size: 28px;
            margin-bottom: 20px;
            padding-bottom: 20px;
            font-weight: 400;
            display: inline-block;
            position: relative;
        }

        .section-title:after,
        .section-title:before {
            content: '';
            position: absolute;
            bottom: 0;
        }

        .section-title:after {
            height: 2px;
            background-color: rgba(252, 92, 15, 0.46);
            left: 25%;
            right: 25%;
        }

        .section-title:before {
            width: 15px;
            height: 15px;
            border: 3px solid #fff;
            background-color: #fc5c0f;
            left: 50%;
            transform: translatex(-50%);
            bottom: -6px;
            z-index: 9;
            border-radius: 50%;
        }

        /* CAROUSEL STARTS */
        .customer-feedback .owl-item img.testimoni {
            width: 85px;
            height: 85px;
        }

        .feedback-slider-item {
            position: relative;
            padding: 60px;
            margin-top: -40px;
        }

        .customer-name {
            margin-top: 15px;
            margin-bottom: 25px;
            font-size: 20px;
            font-weight: 500;
        }

        .feedback-slider-item p {
            line-height: 1.875;
        }

        .customer-rating {
            background-color: #eee;
            border: 3px solid #fff;
            color: rgba(1, 1, 1, 0.702);
            font-weight: 700;
            border-radius: 50%;
            position: absolute;
            width: 47px;
            height: 47px;
            line-height: 44px;
            font-size: 15px;
            right: 0;
            top: 77px;
            text-indent: -3px;
        }

        .thumb-prev .customer-rating {
            top: -20px;
            left: 0;
            right: auto;
        }

        .thumb-next .customer-rating {
            top: -20px;
            right: 0;
        }

        .customer-rating i {
            color: rgb(251, 90, 13);
            position: absolute;
            top: 10px;
            right: 5px;
            font-weight: 600;
            font-size: 12px;
        }

        /* GREY BACKGROUND COLOR OF THE ACTIVE SLIDER */
        .feedback-slider-item:after {
            content: '';
            position: absolute;
            left: 20px;
            right: 20px;
            bottom: 0;
            top: 103px;
            background-color: #f6f6f6;
            border: 1px solid rgba(251, 90, 13, .1);
            border-radius: 10px;
            z-index: -1;
        }

        .thumb-prev,
        .thumb-next {
            position: absolute;
            z-index: 99;
            top: 45%;
            width: 98px;
            height: 98px;
            left: -90px;
            cursor: pointer;
            -webkit-transition: all .3s;
            transition: all .3s;
        }

        .thumb-next {
            left: auto;
            right: -90px;
        }

        .feedback-slider-thumb img.testimoni {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            overflow: hidden;
        }

        .feedback-slider-thumb:hover {
            opacity: .8;
            -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=80)";
        }

        .customer-feedback .owl-nav [class*="owl-"] {
            position: relative;
            display: inline-block;
            bottom: 45px;
            transition: all .2s ease-in;
        }

        .customer-feedback .owl-nav i {
            background-color: transparent;
            color: rgb(251, 90, 13);
            font-size: 25px;
        }

        .customer-feedback .owl-prev {
            left: -15px;
        }

        .customer-feedback .owl-prev:hover {
            left: -20px;
        }

        .customer-feedback .owl-next {
            right: -15px;
        }

        .customer-feedback .owl-next:hover {
            right: -20px;
        }

        /* DOTS */
        .customer-feedback .owl-dots {
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            bottom: 35px;
        }

        .customer-feedback .owl-dot {
            display: inline-block;
        }

        .customer-feedback .owl-dots .owl-dot span {
            width: 11px;
            height: 11px;
            margin: 0 5px;
            background: #fff;
            border: 1px solid rgb(251, 90, 13);
            display: block;
            -webkit-backface-visibility: visible;
            -webkit-transition: all 200ms ease;
            transition: all 200ms ease;
            border-radius: 50%;
        }

        .customer-feedback .owl-dots .owl-dot.active span {
            background-color: rgb(251, 90, 13);
        }

        /* RESPONSIVE */
        @media screen and (max-width: 767px) {
            .feedback-slider-item:after {
                left: 30px;
                right: 30px;
            }

            .customer-feedback .owl-nav [class*="owl-"] {
                position: absolute;
                top: 50%;
                transform: translateY(-50%);
                margin-top: 45px;
                bottom: auto;
            }

            .customer-feedback .owl-prev {
                left: 0;
            }

            .customer-feedback .owl-next {
                right: 0;
            }

        }

        .feedback-slider-item {
            background: white !important;
            color: #32325d !important;
        }

        .owl-carousel.feedback-slider.owl-loaded.owl-drag {
            background: white !important;
        }

        .customer-feedback .owl-dots {
            bottom: 25px !important;
        }

        .feedback-slider-item {
            padding: 25px !important;
        }

        button.owl-dot {
            margin-bottom: 5px !important;
        }

        #testimoni p {
            margin-bottom: 40px !important;
        }
    </style>

    <section class="section bg-gradient-secondary">
        <div class="customer-feedback">
            <div ID="testimoni" class="container text-center"
                 style="height: -webkit-fill-available; height: -moz-available;">
                <div class="row justify-content-md-center">
                    <div class="col-md-12">
                        <div>
                            <h1 class="title text-center" style="margin-bottom: 25px !important;" id="testimoni-text">
                            </h1>
                        </div>
                    </div><!-- /End col -->
                </div><!-- /End row -->

                <div class="row justify-content-md-center">
                    <div class="col-md-12">
                        <div class="owl-carousel feedback-slider">

                            <!-- slider item -->
                            <div class="feedback-slider-item">
                                <h3 class="customer-name">Irma Luki Annisa</h3>
                                <p>Testimony dari aku..
                                    Waktu pengerjaannya cepet banget...
                                    Adminnya sabar banget ngeladenin customer yg cerewet nan banyak maunya..
                                    Untuk program yg di hasilkan lumayan bagus...
                                    Rate dari aku sih 4 dari 1-5
                                    Harapan kedepannya semoga memiliki skill yg lebih luas lagi... semangat!</p>
                                <span class="light-bg customer-rating" data-rating="4">
								4<sub>/5</sub>
								<i class="fa fa-star"></i>
							</span>
                            </div>
                            <!-- /slider item -->

                            <!-- slider item -->
                            <div class="feedback-slider-item">
                                <h3 class="customer-name">Novi</h3>
                                <p>Orang yang buat ngeselin, tapi pengerjaan program lumayan bagus. harapan kedepannya
                                    jadi lebih baik.</p>
                                <span class="light-bg customer-rating" data-rating="4">
								4<sub>/5</sub>
								<i class="fa fa-star"></i>
							</span>
                            </div>
                            <!-- /slider item -->

                            <!-- slider item -->
                            <div class="feedback-slider-item">
                                <h3 class="customer-name">Apriliana</h3>
                                <p>dan mokasi yoh programnyo sesuai keinginan dan mantap kali lah desainnyo apknyo
                                    lancar jaya,, n yg ngerjoin jugo garcep. Bintang 5 lah buat yg bikin n program jgo
                                    👍🏻, lancar tros orderannyo 🤭</p>
                                <span class="light-bg customer-rating" data-rating="5">
								5<sub>/5</sub>
								<i class="fa fa-star"></i>
							</span>
                            </div>

                            <!-- slider item -->
                            <div class="feedback-slider-item">
                                <h3 class="customer-name">Thariq</h3>
                                <p>Pengerjaan nya cukup teliti dan baik. Admin selalu mendengarkan setiap permintaan
                                    dari saya atau apapun yang dirasa kurang saat proses pengerjaan program. Finalisasi
                                    program yang dirancang saya rasa cukup memuaskan dan sangat baik. Semoga jasa
                                    program ini lebih mudah didapatkan oleh mahasiswa dan orang
                                    umum lainnya...</p>
                                <span class="light-bg customer-rating" data-rating="4">
								4<sub>/5</sub>
								<i class="fa fa-star"></i>
							</span>
                            </div>

                            <!-- slider item -->
                            <div class="feedback-slider-item">
                                <h3 class="customer-name">Dipo Crisvandoli</h3>
                                <p>Waktu pengerjaan web dan laporan nya begitu cepat.. Admin yang mengerjakan baik dan
                                    sopan, Untuk program dan laporan yang dihasilkan bagus... Semoga kedepannya lebih
                                    memiliki skill yang lebih baik dan luas...</p>
                                <span class="light-bg customer-rating" data-rating="4">
								4<sub>/5</sub>
								<i class="fa fa-star"></i>
							</span>
                            </div>
                            <!-- /slider item -->

                            <!-- slider item -->
                            <div class="feedback-slider-item">
                                <h3 class="customer-name">Nadia Fildzah</h3>
                                <p>Terimakasih telah membantu saya, waktu pengerjaannya cepet banget walau bnyak job
                                    adminnya sabar kadang nadia banyak maunya kadang merasa ada aja yang kurang maafin
                                    yak 😝 programnya bagus malah dibantu dong laporan 5&6nya hehehe luv deh. Harapan
                                    kedepannya semoga wawasan dan skillnya lebih luas dan mantul yak......🎊
                                    semoga sukses!</p>
                                <span class="light-bg customer-rating" data-rating="5">
								5<sub>/5</sub>
								<i class="fa fa-star"></i>
							</span>
                            </div>
                            <!-- /slider item -->

                            <!-- slider item -->
                            <div class="feedback-slider-item">
                                <h3 class="customer-name">Timothy</h3>
                                <p>Orderan sesuai dengan yang kita inginkan dan proses pembuatan tepat waktu</p>
                                <span class="light-bg customer-rating" data-rating="3">
								3<sub>/5</sub>
								<i class="fa fa-star"></i>
							</span>
                            </div>
                            <!-- /slider item -->

                            <!-- slider item -->
                            <div class="feedback-slider-item">
                                <h3 class="customer-name">Putri Ramadhani</h3>
                                <p>Proses pengerjaan cepat, program aplikasi yg dibuat mudah digunakan, teruss abg nya
                                    juga mau ngajarin kita ampe bisa make program nya. Rate dari aku 5 👍🏻👍🏻👍🏻</p>
                                <span class="light-bg customer-rating" data-rating="5">
								5<sub>/5</sub>
								<i class="fa fa-star"></i>
							</span>
                            </div>
                            <!-- /slider item -->

                            <!-- slider item -->
                            <div class="feedback-slider-item">
                                <h3 class="customer-name">Indah Islamiyah</h3>
                                <p>Recomend banget buat program disini, pengerjaanya cepet terus sesuai sm yg di
                                    inginkan. Adminnya sabar banget ngeladenin customer yg cerewet krn revisi terus
                                    programnya. Program yg dihasilkan sesuai. Harapan kedepannya semoga lebih sabar lagi
                                    ngeladenin customer yg cerewet.</p>
                                <span class="light-bg customer-rating" data-rating="5">
								4<sub>/5</sub>
								<i class="fa fa-star"></i>
							</span>
                            </div>
                            <!-- /slider item -->

                            <!-- slider item -->
                            <div class="feedback-slider-item">
                                <h3 class="customer-name">Putri Ramadhani</h3>
                                <p>Proses pengerjaan cepat, program aplikasi yg dibuat mudah digunakan, teruss abg nya
                                    juga mau ngajarin kita ampe bisa make program nya. Rate dari aku 5 👍🏻👍🏻👍🏻</p>
                                <span class="light-bg customer-rating" data-rating="5">
                                    5<sub>/5</sub>
								<i class="fa fa-star"></i>
							</span>
                            </div>
                            <!-- /slider item -->

                        </div><!-- /End feedback-slider -->

                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        jQuery(document).ready(function ($) {

            var feedbackSlider = $('.feedback-slider');

            var perItem = 2;

            if (window.innerWidth <= 768) {
                perItem = 1;
            }

            feedbackSlider.owlCarousel({
                items: perItem,
                nav: true,
                dots: true,
                autoplay: true,
                loop: true,
                mouseDrag: true,
                touchDrag: true,
                navText: ["<i class='fa fa-long-arrow-left'></i>", "<i class='fa fa-long-arrow-right'></i>"],
                responsive: {

                    // breakpoint from 767 up
                    768: {
                        nav: true,
                        dots: false
                    }
                }
            });

            feedbackSlider.on("translate.owl.carousel", function () {
                $(".feedback-slider-item h3").removeClass("animated fadeIn").css("opacity", "0");
                $(".feedback-slider-item img, .feedback-slider-thumb img, .customer-rating").removeClass("animated zoomIn").css("opacity", "0");
            });

            feedbackSlider.on("translated.owl.carousel", function () {
                $(".feedback-slider-item h3").addClass("animated fadeIn").css("opacity", "1");
                $(".feedback-slider-item img, .feedback-slider-thumb img, .customer-rating").addClass("animated zoomIn").css("opacity", "1");
            });
            feedbackSlider.on('changed.owl.carousel', function (property) {
                var current = property.item.index;
                var prevThumb = $(property.target).find(".owl-item").eq(current).prev().find("img.testimoni").attr('src');
                var nextThumb = $(property.target).find(".owl-item").eq(current).next().find("img.testimoni").attr('src');
                var prevRating = $(property.target).find(".owl-item").eq(current).prev().find('span').attr('data-rating');
                var nextRating = $(property.target).find(".owl-item").eq(current).next().find('span').attr('data-rating');
                $('.thumb-prev').find('img.testimoni').attr('src', prevThumb);
                $('.thumb-next').find('img.testimoni').attr('src', nextThumb);
                $('.thumb-prev').find('span').next().html(prevRating + '<i class="fa fa-star"></i>');
                $('.thumb-next').find('span').next().html(nextRating + '<i class="fa fa-star"></i>');
            });
            $('.thumb-next').on('click', function () {
                feedbackSlider.trigger('next.owl.carousel', [300]);
                return false;
            });
            $('.thumb-prev').on('click', function () {
                feedbackSlider.trigger('prev.owl.carousel', [300]);
                return false;
            });

        });
    </script>

    {{-- counter --}}
    <section class="section bg-gradient-secondary">
        <div class="container" style="height: -webkit-fill-available; height: -moz-available;" id="pembayaran">
            <div class="row text-center" style="background-color: #f4f4f7;">
                <div class="col-md-offset-3 col-lg-3 col-xs-12 mt-3">
                    <div class="counter">
                        <i class="fa fa-code fa-2x" style="color: #191a4d"></i>
                        <h2 class="timer count-title count-number" data-to="70" data-speed="5000"></h2>
                        <p class="count-text ">Klien</p>
                    </div>
                </div>
                <div class=" col-lg-3 col-xs-12 mt-3">
                    <div class="counter">
                        <i class="fa fa-coffee fa-2x" style="color: #191a4d"></i>
                        <h2 class="timer count-title count-number" data-to="8" data-speed="5000"></h2>
                        <p class="count-text ">Partner</p>
                    </div>
                </div>
                <div class=" col-lg-3 col-xs-12 mt-3">
                    <div class="counter">
                        <i class="fa fa-lightbulb-o fa-2x" style="color: #191a4d"></i>
                        <h2 class="timer count-title count-number" data-to="66" data-speed="5000"></h2>
                        <p class="count-text ">Projek Selesai</p>
                    </div>
                </div>
                <div class=" col-lg-3 col-xs-12 mt-3">
                    <div class="counter">
                        <i class="fa fa-bug fa-2x" style="color: #191a4d"></i>
                        <h2 class="timer count-title count-number" data-to="{{ total_pengunjung() }}"
                            data-speed="5000"></h2>
                        <p class="count-text ">Pengunjung</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section bg-gradient-secondary">
        <div class="container" style="height: -webkit-fill-available; height: -moz-available;"
             id="pertanyaan_umum_dan_jawaban">
            <div class="row text-center" style="background-color: #f4f4f7;">
                <div class="col-md-offset-3 col">
                    <div class="elfsight-app-e70bd82a-f0ac-4ef1-8d3e-7fff9f17871c"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer "
            style="padding-top: 50px !important; height: -webkit-fill-available; height: -moz-available;" id="footer">

        <!-- Footer Links -->
        <div id="particles-js" class="container text-center text-md-left" style="height: auto !important">

            <!-- Grid row -->
            <div class="row">

                <!-- Grid column -->
                <div class="col-lg-3 mt-md-0 mt-3">

                    <!-- Content -->
                    <a href="{{ url('') }}"> <img
                            src="{{ url('') }}/img/brand/white.png"
                            alt="Logo Bikin Aplikasi"> </a>
                    <p style="text-align: left !important;">Adalah tempat pembikinan aplikasi berbasis mobile, website,
                        ataupun desktop</p>
                    <p style="text-align: left !important; margin-bottom: 20px !important;">
                        <a data-toggle="modal" data-target="#modal-kebijakan-privasi" href="kebijakan_privasi">Kebijakan
                            Privasi</a> | <a href="syarat_dan_ketentuan" data-toggle="modal"
                                             data-target="#modal-syarat-ketentuan">Syarat dan Ketentuan</a>
                    </p>


                    <!-- Modal -->
                    <div class="modal fade " id="modal-kebijakan-privasi" tabindex="-1" role="dialog"
                         aria-labelledby="modelTitleId"
                         aria-hidden="true" style="z-index: 99999 !important;">
                        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <div class="container-fluid text-justify">
                                        <h2>Kebijakan Privasi</h2>

                                        Di Bikin Aplikasi, dapat diakses dari https://bikinaplikasi.dev, salah satu
                                        prioritas utama kami adalah privasi pengunjung kami. Dokumen Kebijakan Privasi
                                        ini berisi jenis informasi yang dikumpulkan dan dicatat oleh Bikin Aplikasi dan
                                        bagaimana kami menggunakannya.

                                        <p>Jika Anda memiliki pertanyaan tambahan atau memerlukan informasi lebih lanjut
                                            tentang kami
                                            Kebijakan Privasi, jangan ragu untuk menghubungi kami.</p>

                                        <p>
                                        <h3>File Log</h3>

                                        Bikin Aplikasi mengikuti prosedur standar menggunakan file log. File-file ini
                                        mencatat pengunjung ketika mereka mengunjungi situs web. Semua perusahaan
                                        hosting melakukan ini dan
                                        bagian dari analitik layanan hosting. Informasi yang dikumpulkan oleh file log
                                        termasuk alamat protokol internet (IP), jenis browser, Layanan Internet
                                        Penyedia (ISP), cap tanggal dan waktu, halaman rujukan / keluar, dan mungkin
                                        jumlah klik. Ini tidak terkait dengan informasi apa pun yang bersifat pribadi
                                        dapat diidentifikasi. Tujuan informasi adalah untuk menganalisis tren,
                                        mengelola situs, melacak pergerakan pengguna di situs web, dan
                                        mengumpulkan informasi demografis.

                                        <p>
                                        <h3>Cookies dalam web</h3>

                                        Seperti situs web lainnya, Bikin Aplikasi menggunakan 'cookie'. Cookie ini
                                        digunakan
                                        untuk menyimpan informasi termasuk preferensi pengunjung, dan
                                        halaman-halaman di
                                        situs web yang diakses atau dikunjungi pengunjung. Informasi digunakan untuk
                                        mengoptimalkan pengalaman pengguna dengan menyesuaikan konten halaman web
                                        kami berdasarkan
                                        jenis browser pengunjung dan / atau informasi lainnya.

                                        <p>Untuk informasi lebih umum tentang cookie, silakan baca "Apa itu cookie"
                                            di link: <a
                                                href="https://www.privacypolicyonline.com/what-are-cookies/" style="color: teal !important;
    font-weight: bold;">Cookie
                                                Website</a>.</p>

                                        <p>Server iklan pihak ketiga atau jaringan iklan menggunakan teknologi seperti
                                            cookie,
                                            JavaScript yang digunakan dalam iklannya masing-masing
                                            dan tautan yang muncul di Bikin Aplikasi, yang dikirim langsung ke pengguna
                                            browser. Mereka secara otomatis menerima alamat IP Anda saat ini. Teknologi
                                            ini digunakan untuk mengukur keefektifan iklan mereka dan / atau untuk
                                            mempersonalisasi konten iklan yang Anda lihat di
                                            situs web yang Anda kunjungi.</p>

                                        <p>Perhatikan bahwa Bikin Aplikasi tidak memiliki akses atau kontrol, cookie ini
                                            digunakan oleh pengiklan pihak ketiga.</p>

                                        <p>
                                        <h3>Kebijakan Privasi Pihak Ketiga</h3>

                                        Kebijakan Privasi Bikin Aplikasi tidak berlaku untuk pengiklan lain atau
                                        situs web lain. Karena itu, kami menyarankan Anda untuk berkonsultasi dengan

                                        Kebijakan privasi masing-masing dari server iklan pihak ketiga ini untuk
                                        informasi yang lebih
                                        detail. Dapat mencakup praktik dan instruksi mereka tentang cara menggunakannya.

                                        <p>Anda dapat memilih untuk menonaktifkan cookie melalui opsi browser individual
                                            Anda. Untuk
                                            mengetahui informasi lebih rinci tentang manajemen cookie dengan web
                                            tertentu, dapat ditemukan di situs web masing-masing browser.</p>

                                        <p>

                                        <h3>Informasi Anak Kecil</h3>

                                        Bagian lain dari prioritas kami adalah menambahkan perlindungan untuk
                                        anak-anak saat menggunakan
                                        internet. Kami mendorong orang tua dan wali untuk mengamati, berpartisipasi
                                        dalam,
                                        dan / atau memantau dan memandu aktivitas online mereka.

                                        <p>Bikin Aplikasi tidak dengan sengaja mengumpulkan Identitas Pribadi apa pun
                                            dari anak-anak di bawah usia 13 tahun. Jika menurut Anda anak
                                            Anda
                                            memberikan informasi semacam ini di situs web kami, kami sangat menganjurkan
                                            Anda
                                            untuk segera menghubungi kami dan kami akan melakukan upaya terbaik kami
                                            untuk segera menghapus
                                            informasi tersebut dari catatan kami.</p>

                                        <p>
                                        <h3>Hanya Kebijakan Privasi Online</h3>

                                        Kebijakan Privasi ini hanya berlaku untuk aktivitas online kami dan berlaku
                                        untuk
                                        pengunjung situs web kami sehubungan dengan informasi yang mereka bagikan
                                        dan / atau kumpulkan di Bikin Aplikasi. Kebijakan ini tidak berlaku untuk
                                        siapa pun yang dikumpulkan secara offline atau melalui saluran selain situs
                                        web ini.

                                        <p>

                                        <h3>Persetujuan</h3>

                                        Dengan menggunakan situs web kami, Anda dengan ini menyetujui Kebijakan
                                        Privasi kami dan menyetujui Syarat dan Ketentuannya.
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="modal-syarat-ketentuan" tabindex="-1" role="dialog"
                         aria-labelledby="modelTitleId"
                         aria-hidden="true" style="z-index: 99999 !important;">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">

                                <div class="modal-body">
                                    <div class="container-fluid">
                                        <h2><strong>Syarat dan Ketentuan</strong></h2>

                                        <p>Selamat datang di Bikin Aplikasi!</p>

                                        <p>Syarat dan ketentuan ini menguraikan aturan dan regulasi untuk penggunaan
                                            Website Bikin Aplikasi, beralamat di https://bikinaplikasi.dev.</p>

                                        <p>Dengan mengakses situs web ini, kami menganggap Anda menerima syarat dan
                                            ketentuan ini.
                                            Jangan terus menggunakan Bikin Aplikasi jika Anda tidak setuju untuk
                                            mengambil semua
                                            syarat dan ketentuan yang tercantum di halaman ini.</p>

                                        <p>Terminologi berikut berlaku untuk Syarat dan Ketentuan, Privasi
                                            Pernyataan dan Pernyataan Sanggahan dan semua Perjanjian: "Klien", "Anda"
                                            dan
                                            "Milik Anda" mengacu pada Anda, orang yang masuk ke situs web ini dan
                                            mematuhi
                                            Persyaratan dan ketentuan perusahaan. "Perusahaan", "Diri Kami", "Kami",
                                            "Milik Kami" dan
                                            "Kami", mengacu pada Perusahaan kami. "Pihak", "Pihak", atau "Kami", mengacu
                                            pada kedua
                                            Klien dan diri kita sendiri. Semua istilah mengacu pada penawaran,
                                            penerimaan dan
                                            pertimbangan pembayaran yang diperlukan untuk melakukan proses kami
                                            kepada Klien dengan cara yang paling tepat untuk mengungkapkan
                                            tujuan memenuhi kebutuhan Klien sehubungan dengan penyediaan
                                            Layanan yang dinyatakan Perusahaan, sesuai dengan dan tunduk pada hukum yang
                                            berlaku
                                            dari Indonesia. Setiap penggunaan terminologi di atas atau kata lain di
                                            tunggal, jamak, kapitalisasi dan / atau dia, dianggap
                                            dipertukarkan dan karena itu mengacu pada yang sama.</p>

                                        <h3><strong>Cookies</strong></h3>

                                        <p>Kami menggunakan penggunaan cookie. Dengan mengakses Bikin Aplikasi, Anda
                                            setuju untuk menggunakan
                                            cookie sesuai dengan Kebijakan Privasi Bikin Aplikasi.</p>

                                        <p>Sebagian besar situs web interaktif menggunakan cookie untuk memungkinkan
                                            kami mengambil detail pengguna
                                            untuk setiap kunjungan. Cookie digunakan oleh situs web kami untuk
                                            mengaktifkan fungsionalitas tersebut
                                            untuk memudahkan orang mengunjungi situs web kami. Beberapa
                                            mitra kami juga dapat menggunakan cookie.</p>

                                        <h3><strong>Lisensi</strong></h3>

                                        <p>Kecuali dinyatakan lain, Bikin Aplikasi dan / atau pemberi lisensinya
                                            memiliki
                                            hak kekayaan intelektual untuk semua materi di Bikin Aplikasi. Semua
                                            hak kekayaan intelektual dilindungi. Anda dapat mengakses ini dari Bikin
                                            Aplikasi untuk penggunaan pribadi Anda dengan batasan yang ditetapkan di
                                            syarat dan Ketentuan ini.</p>

                                        <p>Anda tidak harus:</p>
                                        <ul>
                                            <li> Publikasikan ulang materi dari Bikin Aplikasi</li>
                                            <li> Menjual, menyewakan, atau mensublisensikan materi dari Bikin Aplikasi
                                            </li>
                                            <li> Mereproduksi, menggandakan, atau menyalin materi dari Bikin Aplikasi
                                            </li>
                                            <li> Mendistribusikan kembali konten dari Bikin Aplikasi</li>
                                        </ul>


                                        <p> Perjanjian ini akan dimulai pada tanggal Perjanjian ini. </p>

                                        <p> Bagian dari situs web ini menawarkan kesempatan bagi pengguna untuk
                                            memposting dan bertukar informasi
                                            pendapat dan informasi di area tertentu situs web. Bikin Aplikasi
                                            tidak memfilter, mengedit, menerbitkan, atau meninjau Komentar sebelum
                                            kehadirannya di
                                            situs web. Komentar tidak mencerminkan pandangan dan opini Bikin
                                            Aplikasi, agen dan / atau afiliasinya. Komentar mencerminkan pandangan dan
                                            opini dari orang yang mengeposkan pandangan dan pendapatnya. Sampai-sampai
                                            diizinkan oleh hukum yang berlaku, Bikin Aplikasi tidak bertanggung jawab
                                            atas
                                            Komentar atau untuk setiap kewajiban, kerusakan atau biaya yang disebabkan
                                            dan / atau diderita sebagai
                                            akibat dari penggunaan dan / atau posting dan / atau tampilan Komentar
                                            di situs web ini. </p>

                                        <p> Bikin Aplikasi berhak untuk memantau semua Komentar dan menghapus setiap
                                            Komentar yang dapat dianggap tidak pantas, menyinggung, atau menyebabkan
                                            pelanggaran
                                            Persyaratan dan Ketentuan ini. </p>

                                        <p> Anda menjamin dan menyatakan bahwa: </p>

                                        <ul>
                                            <li> Anda berhak memposting Komentar di situs web kami dan memiliki semua
                                                lisensi dan persetujuan yang diperlukan untuk melakukannya;
                                            </li>
                                            <li> Komentar tidak melanggar hak kekayaan intelektual apa pun, termasuk
                                                tanpa batasan hak cipta, paten, atau merek dagang pihak ketiga mana pun;
                                            </li>
                                            <li> Komentar tidak mengandung fitnah, menyinggung,
                                                materi tidak senonoh atau melanggar hukum yang merupakan pelanggaran
                                                privasi
                                            </li>
                                            <li> Komentar tidak akan digunakan untuk meminta atau mempromosikan bisnis
                                                atau kebiasaan
                                                atau menyajikan aktivitas komersial atau aktivitas yang melanggar hukum.
                                            </li>
                                        </ul>

                                        <p> Anda dengan ini memberi Bikin Aplikasi lisensi non-eksklusif untuk
                                            menggunakan, mereproduksi,
                                            mengedit dan mengizinkan orang lain untuk menggunakan, mereproduksi, dan
                                            mengedit setiap Komentar Anda di
                                            apapun dan semua bentuk, format atau media. </p>

                                        <h3><strong> Melakukan Hyperlink ke Konten kami </strong></h3>

                                        <p> Organisasi berikut dapat menautkan ke Situs web kami tanpa tertulis: </p>

                                        <ul>
                                            <li> Lembaga pemerintah</li>
                                            <li> Mesin telusur</li>
                                            <li> Distributor direktori daring dapat membuat tautan ke Situs web kami
                                                dengan cara yang sama
                                                karena mereka hyperlink ke Situs Web bisnis terdaftar lainnya; dan
                                            </li>
                                            <li> Bisnis Terakreditasi di seluruh sistem kecuali organisasi nirlaba,
                                                pusat perbelanjaan amal, dan grup penggalangan dana amal
                                                yang mungkin tidak hyperlink ke situs web kami.
                                            </li>
                                        </ul>

                                        <p> Organisasi-organisasi ini mungkin menautkan ke beranda kami, ke publikasi
                                            atau ke lainnya
                                            Informasi situs web selama tautannya: (a) sama sekali tidak menipu;
                                            (b) tidak secara tidak langsung menyiratkan sponsor, dukungan atau
                                            persetujuan dari
                                            pihak yang menghubungkan dan produk dan / atau layanannya; dan (c) cocok
                                            dengan
                                            konteks situs pihak yang menautkan. </p>

                                        <p> Kami dapat mempertimbangkan dan menyetujui permintaan tautan lain dari jenis
                                            berikut
                                            organisasi: </p>

                                        <ul>
                                            <li> sumber informasi konsumen dan / atau bisnis yang umum</li>
                                            <li> situs komunitas dot.com</li>
                                            <li> asosiasi atau grup lain yang mewakili badan amal</li>
                                            <li> distributor direktori daring</li>
                                            <li> portal internet</li>
                                            <li> firma akuntansi, hukum dan konsultasi dan</li>
                                            <li> institusi pendidikan dan asosiasi perdagangan.</li>
                                        </ul>

                                        <p> Kami akan menyetujui permintaan tautan dari organisasi-organisasi ini jika
                                            kami memutuskan bahwa: (a)
                                            tautan tersebut tidak akan membuat kita terlihat tidak menyenangkan bagi
                                            diri kita sendiri atau pada diri kita sendiri
                                            bisnis terakreditasi; (b) organisasi tidak memiliki negatif apapun
                                            catatan dengan kami; (c) keuntungan bagi kami dari visibilitas hyperlink
                                            mengkompensasi tidak adanya Bikin Aplikasi; dan (d) tautannya ada di
                                            konteks informasi sumber daya umum. </p>

                                        <p> Organisasi-organisasi ini boleh membuat tautan ke beranda kami selama
                                            tautannya: (a) bukan
                                            dengan cara apa pun menipu; (b) tidak secara tidak langsung menyiratkan
                                            sponsor, dukungan, atau
                                            persetujuan dari pihak yang menghubungkan dan produk atau layanannya; dan
                                            (c) cocok
                                            dalam konteks situs pihak yang menautkan. </p>

                                        <p> Jika Anda adalah salah satu organisasi yang tercantum pada paragraf 2 di
                                            atas dan adalah
                                            tertarik untuk menautkan ke situs web kami, Anda harus memberi tahu kami
                                            dengan mengirimkan
                                            e-mail ke Bikin Aplikasi. Harap sertakan nama Anda, nama organisasi Anda,
                                            informasi kontak serta URL situs Anda, daftar URL dari
                                            yang ingin Anda tautkan ke Situs web kami, dan daftar URL di situs kami
                                            yang ingin Anda tautkan. Tunggu 2-3 minggu untuk mendapatkan tanggapan. </p>

                                        <p> Organisasi yang disetujui dapat melakukan hyperlink ke Situs web kami
                                            sebagai berikut: </p>

                                        <ul>
                                            <li> Dengan menggunakan nama perusahaan kami; atau</li>
                                            <li> Dengan menggunakan pencari yang ditautkan ke; atau</li>
                                            <li> Dengan menggunakan deskripsi lain apa pun dari Situs web kami yang
                                                ditautkan ke sana
                                                masuk akal dalam konteks dan format konten.
                                            </li>
                                        </ul>

                                        <p> Penggunaan logo Bikin Aplikasi atau karya seni lain tidak akan diizinkan
                                            untuk ditautkan
                                            tidak ada perjanjian lisensi merek dagang. </p>

                                        <h3>
                                            <li>iFrames</i>
                                        </h3>

                                        <p> Tanpa persetujuan sebelumnya dan izin tertulis, Anda tidak boleh membuat
                                            bingkai
                                            di sekitar Halaman Web kami yang mengubah presentasi visual atau
                                            penampilan Situs Web kami. </p>

                                        <p> Penggunaan logo Bikin Aplikasi atau karya seni lain tidak akan diizinkan
                                            untuk ditautkan
                                            tidak ada perjanjian lisensi merek dagang. </p>

                                        <h3>
                                            <li>iFrames</i>
                                        </h3>

                                        <p> Tanpa persetujuan sebelumnya dan izin tertulis, Anda tidak boleh membuat
                                            bingkai
                                            di sekitar Halaman Web kami yang mengubah presentasi visual atau
                                            penampilan Situs Web kami. </p>

                                        <h3><strong> Reservasi Hak </strong></h3>

                                        <p> Kami berhak meminta Anda menghapus semua tautan ke Situs web kami. Anda
                                            setuju untuk segera menghapus semua tautan ke kami
                                            Situs web atas permintaan. Kami juga berhak untuk mengubah persyaratan ini
                                            dan
                                            kapan saja. Dengan terus menautkan ke
                                            Situs web kami, Anda setuju untuk terikat dan mengikuti persyaratan penautan
                                            ini. </p>

                                        <h3><strong> Penghapusan tautan dari situs web kami </strong></h3>

                                        <p> Jika Anda menemukan tautan apa pun di Situs Web kami yang menyinggung karena
                                            alasan apa pun, Anda benar
                                            bebas untuk menghubungi dan memberi tahu kami kapan saja. Kami akan
                                            mempertimbangkan permintaan untuk
                                            menghapus tautan tetapi kami tidak berkewajiban untuk atau lebih atau untuk
                                            menanggapi Anda
                                            secara langsung. </p>

                                        <h3><strong>Disclaimer</strong></h3>

                                        <p> Sejauh diizinkan oleh hukum yang berlaku, kami mengecualikan semua
                                            representasi, jaminan, dan ketentuan yang berkaitan dengan situs web kami
                                            dan
                                            penggunaan situs web ini. Tidak ada dalam penafian ini: </p>

                                        <ul>
                                            <li> batasi atau kecualikan tanggung jawab kami atau Anda atas kematian atau
                                                cedera
                                            </li>
                                            <li> batasi atau kecualikan tanggung jawab kami atau Anda atas penipuan atau
                                                penipuan
                                            </li>
                                            <li> batasi kewajiban kami atau Anda dengan cara apa pun yang tidak
                                                diizinkan
                                                di bawah hukum yang berlaku
                                            </li>
                                            <li> mengecualikan salah satu kewajiban kami atau Anda yang mungkin tidak
                                                dikecualikan
                                                hukum yang berlaku.
                                            </li>
                                        </ul>

                                        <p> Batasan dan larangan tanggung jawab yang ditetapkan dalam Bagian ini dan
                                            di bagian lain dalam pelepasan tanggung jawab hukum ini: (a) tunduk pada
                                            paragraf sebelumnya;
                                            dan (b) mengatur semua kewajiban yang timbul berdasarkan pelepasan tanggung
                                            jawab hukum, termasuk
                                            kewajiban yang timbul dalam kontrak, dalam wanprestasi dan karena
                                            pelanggaran undang-undang
                                            tugas. </p>

                                        <p> Selama situs web dan informasi serta layanan di situs web itu
                                            asalkan gratis, kami tidak akan bertanggung jawab atas kehilangan atau
                                            kerusakan apa pun. </p>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <script>
                        $('#exampleModal').on('show.bs.modal', event => {
                            var button = $(event.relatedTarget);
                            var modal = $(this);
                            // Use above variables to manipulate the DOM

                        });
                    </script>

                </div>
                <!-- Grid column -->

                <hr class="clearfix w-100 d-md-none pb-3">

                <!-- Grid column -->
                <div class="col-lg-4 mb-md-0 mb-3">

                    <!-- Links -->
                    <h5 style="padding-bottom: 20px !important; padding-top: 0 !important;">Tentang Kami</h5>

                    <div class="widget-quick-contact">
                        <div><i class="icon_mobile " aria-hidden="true"></i>+62 8228 2692 489</div>
                        <div><i class="icon_mail_alt" aria-hidden="true"></i> admin@bikinaplikasi.dev</div>
                        <div><i class="icon_map_alt"></i>JL. H. Ibrahim Rt 19 No 94 Kel. Rawasari Kota Baru jambi</div>


                        <div class="social-footer">
                            <a href="https://wa.me/6282282692489" target="_blank"
                               data-toggle="tooltip"
                               title="Wa">
                                <i class="fa fa-whatsapp"></i>
                                <span class="nav-link-inner--text d-lg-none">WhatsApp</span>
                            </a>
                            <a href="https://instagram.com/{{ env('APP_USERNAME_IG', 'ramdanriawan') }}" target="_blank"
                               data-toggle="tooltip" title="Instagram">
                                <i class="fa fa-instagram"></i>
                                <span class="nav-link-inner--text d-lg-none">Instagram</span>
                            </a>
                            <a href="https://youtube.com/chanel/{{ env('APP_YOUTUBE_CHANEL_ID', 'UC87yxnSppdHlI0E-Hh7VrOw') }}"
                               target="_blank"
                               data-toggle="tooltip" title="Youtube">
                                <i class="fa fa-youtube"></i>
                                <span class="nav-link-inner--text d-lg-none">Youtube</span>
                            </a>
                        </div>

                    </div>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-lg-5 mb-md-0 mb-3">
                    <div class="widget-quick-contact">
                        <div class="mapouter">
                            <div class="gmap_canvas">
                                <iframe width="100%" height="240" id="gmap_canvas"
                                        src="https://maps.google.com/maps?q=lorong%20sinarantara&t=&z=13&ie=UTF8&iwloc=&output=embed"
                                        frameborder="0" scrolling="no" marginheight="0"
                                        marginwidth="0"></iframe>
                                <style>.mapouter {
                                        position: relative;
                                        text-align: right;
                                        /*height: 240px;*/
                                        /*width: 480px;*/
                                    }</style>
                                <style>.gmap_canvas {
                                        overflow: hidden;
                                        background: none !important;
                                        /*height: 240px;*/
                                        /*width: 480px;*/
                                    }</style>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- Grid column -->


            </div>
            <!-- Grid row -->

        </div>
        <!-- Footer Links -->

        <!-- Copyright -->
        <div class="footer-copyright text-center py-3" style="margin-top: 50px;">© 2020 Copyright:
            <a href="https://www.bikinaplikasi.dev">
                bikinaplikasi.dev</a>
        </div>
        <!-- Copyright -->

    </footer>
    <!-- Footer -->
</main>

<style>

    .modal-header-promo {
        background: #ef715f;
        color: #fff
    }

    h5 {
        padding-top: 10px;
        padding-bottom: 10px;
        font-size: 33px;
        display: block;
        margin: 0 auto
    }

    .modal-header-promo .close {
        height: 50px;
        width: 50px;
        border-radius: 51%;
        font-size: 30px;
        padding: 0;
        color: #fff;
        position: absolute;
        left: auto;
        right: 8px;
        top: 5px
    }

    .btn-custom {
        background: #ef715f;
        border-radius: 5px;
        color: #fff;
        padding: 9px 42px;
        margin: 20px auto;
        display: block;
        font-size: 20px;
        font-weight: 700
    }

    .btn-custom:hover {
        color: #fff
    }

    h3 {
        text-align: center;
        font-size: 35px;
        padding-top: 20px;
        letter-spacing: 2px;
        line-height: 40px
    }

    p {
        text-align: center;
        font-size: 20px;
        padding-top: 20px;
        margin: 0
    }

    @media (max-width: 575px) {
        .modal-dialog-promo {
            margin: 1.5rem
        }

        h5 {
            padding-top: 20px;
            padding-bottom: 20px;
            font-size: 50px
        }

        h3 {
            font-size: 45px
        }
    }
</style>

{{--<div class="modal fade show" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"--}}
{{--     aria-hidden="true">--}}
{{--    <div class="modal-dialog modal-dialog-promo" role="document">--}}
{{--        <div class="modal-content">--}}
{{--            <div class="modal-header modal-header-promo">--}}
{{--                <h5 class="modal-title text-center" id="exampleModalLabel">Big Festival Sale</h5>--}}
{{--                <button type="button" class="close" data-dismiss="modal" aria-label="Tutup" data-toggle="modal"><span aria-hidden="true">&times;</span>--}}
{{--                </button>--}}
{{--            </div>--}}
{{--            <div class="modal-body">--}}
{{--                <h3>Get 60% discount on all products</h3>--}}
{{--                <p>@ BBBootstrap.com</p>--}}
{{--                <button type="button" class="btn btn-custom">Get Now</button>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}

@if(!preg_match('/localhost|192\.168\.43\.205/', $_SERVER['HTTP_HOST']))

    <script src="https://apps.elfsight.com/p/platform.js" defer></script>
    <div class="elfsight-app-e265fdc0-aadc-41c8-ba9a-43ecd366453a"></div>
@endif


<!-- Back to top button -->
<a id="btn-goto-top"></a>

<!-- JS -->
<script src="{{ url('') }}/vendor/jquery/jquery.min.js"></script>
<script src="{{ url('') }}/vendor/popper/popper.min.js"></script>
<script src="{{ url('') }}/vendor/bootstrap/bootstrap.min.js"></script>
<script src="{{ url('') }}/vendor/lightbox/js/lightbox.js"></script>
<script src="{{ url('') }}/vendor/argon/js/argon.js?v=1.0.1"></script>
<script src="https://apps.elfsight.com/p/platform.js" defer></script>
<script type="text/javascript" src="{{ url('') }}/js/jquery.passtrength.js"></script>
<script type="text/javascript" src="{{ url('') }}/js/tourguide.js"></script>
<script type="text/javascript" src="{{ url('') }}/js/particles.min.js"></script>
<script src="https://unpkg.com/typewriter-effect@latest/dist/core.js"></script>


<!-- Clarity tracking code for https://bikinaplikasi.dev -->
<script>
    (function (c, l, a, r, i, t, y) {
        c[a] = c[a] || function () {
            (c[a].q = c[a].q || []).push(arguments)
        };
        t = l.createElement(r);
        t.async = 1;
        t.src = "https://www.clarity.ms/tag/" + i + "?ref=bwt";
        y = l.getElementsByTagName(r)[0];
        y.parentNode.insertBefore(t, y);
    })(window, document, "clarity", "script", "6ml03qkrds");
</script>
<script type="text/javascript">
    $(document).ready(function ($) {

        // $("input[type*='password']:not(.exclude)").focus(function () {
        //     $("input[type*='password']:not(.exclude)").passtrength({
        //         minChars: false,
        //         passwordToggle: false,
        //         tooltip: false
        //     });
        // })

        $("input[type*='password']:not(.exclude)").passtrength({
            minChars: 4,
            passwordToggle: false,
            tooltip: false
        });
    });
</script>

<script>

    // type writter
    var layanan = 0;
    var layanan_text = ['Layanan Keunggulan Kami'];
    var teknologi = 0;
    var teknologi_text = ['Teknologi Yang Digunakan', "Kami akan memilihkan", "Yang terbaik!"];
    var produk = 0;
    var produk_text_website = ['Contoh Produk Website'];
    var produk_android = 0;
    var produk_text_android = ['Contoh Produk Android'];
    var harga = 0;
    var harga_text = ['Mau Bikin Aplikasi?', 'Tapi Mahal?!', 'Kamilah Solusinya!', 'Harga Terjangkau!'];
    var registrasi = 0;
    var registrasi_text = ['Belum Punya Akun?', 'Registrasi!', 'Atau Pakai Sosial Media', 'Langsung Klik Icon nya!'];
    var masuk = 0;
    var masuk_text = ['Masuk', 'Masuk Secara Mudah Pakai Akun Social Mediamu.'];
    var pembayaran = 0;
    var pembayaran_text = ['Metode Pembayaran', 'Sangat Beragam', 'Pilihlah Sesukamu!'];
    var testimoni = 0;
    var testimoni_text = ['Masih Ragu Dengan Kami?', 'LIST TESTIMONI'];
    var pertanyaan_umum_dan_jawaban = 0;
    var pertanyaan_umum_dan_jawaban_text = ['Ada Yang Mau Ditanyakan?', 'Pertanyaan Umum dan Jawaban', 'Kurang? Chat Kami!'];

    $(window).scroll(() => {
        if (($(window).scrollTop() >= $('#layanan').offset().top - 768) && layanan == 0) {
            var writter = new Typewriter('#layanan-text', {
                strings: layanan_text,
                autoStart: true,
                loop: false,
                deleteSpeed: 10000000,
                delay: 150
            });

            setTimeout(() => {
                writter.stop();
            }, ((layanan_text.join().length - layanan_text.length) * 150) - 150);

            layanan = 1;

        }

        if (($(window).scrollTop() >= $('#teknologi').offset().top - 768) && teknologi == 0) {
            var writter = new Typewriter('#teknologi-text', {
                strings: teknologi_text,
                autoStart: true,
                loop: false,
                deleteSpeed: 10000000,
                delay: 150
            });

            setTimeout(() => {
                writter.stop();
            }, ((teknologi_text.join().length - teknologi_text.length) * 150) + 8000);

            teknologi = 1;

        }

        if (($(window).scrollTop() >= $('#produk').offset().top - 768) && produk == 0) {
            var writter = new Typewriter('#produk-text', {
                strings: produk_text_website,
                autoStart: true,
                loop: false,
                deleteSpeed: 10000000,
                delay: 150
            });

            setTimeout(() => {
                writter.stop();
            }, ((produk_text_website.join().length - produk_text_website.length) * 150) + 2000);

            produk = 1;

        }


        if (($(window).scrollTop() >= $('#produk-android').offset().top - 768) && produk_android == 0) {
            var writter = new Typewriter('#produk-text-android', {
                strings: produk_text_android,
                autoStart: true,
                loop: false,
                deleteSpeed: 10000000,
                delay: 150
            });

            setTimeout(() => {
                writter.stop();
            }, ((produk_text_android.join().length - produk_text_android.length) * 150) + 2000);

            produk = 1;

        }

        if (($(window).scrollTop() >= $('#harga').offset().top - 768) && harga == 0) {
            var writter = new Typewriter('#harga-text', {
                strings: harga_text,
                autoStart: true,
                loop: false,
                // deleteSpeed: 10000000,
                delay: 150
            });

            setTimeout(() => {
                writter.stop();
            }, ((harga_text.join().length - harga_text.length) * 150) + 20000);

            harga = 1;

        }

        if (($(window).scrollTop() >= $('#masuk_registrasi').offset().top - 768) && registrasi == 0) {
            var writter = new Typewriter('#registrasi-text', {
                strings: registrasi_text,
                autoStart: true,
                loop: false,
                // deleteSpeed: 10000000,
                delay: 150
            });

            setTimeout(() => {
                writter.stop();
            }, ((registrasi_text.join().length - registrasi_text.length) * 150) + 10000);

            registrasi = 1;

        }
        //
        // if (($(window).scrollTop() >= $('#masuk_registrasi').offset().top - 768) && masuk == 0) {
        //     var writter = new Typewriter('#masuk-text', {
        //         strings: masuk_text,
        //         autoStart: true,
        //         loop: false,
        //         delay: 150
        //     });
        //
        //     setTimeout(() => {
        //         writter.stop();
        //     }, ((masuk_text.join().length - masuk_text.length) * 150) + 2000);
        //
        //     masuk = 1;
        // }

        if (($(window).scrollTop() >= $('#pembayaran').offset().top - 768) && pembayaran == 0) {
            var writter = new Typewriter('#pembayaran-text', {
                strings: pembayaran_text,
                autoStart: true,
                loop: false,
                // deleteSpeed: 10000000,
                delay: 150
            });

            setTimeout(() => {
                writter.stop();
            }, ((pembayaran_text.join().length - pembayaran_text.length) * 150) + 8000);

            pembayaran = 1;

        }

        if (($(window).scrollTop() >= $('#testimoni').offset().top - 768) && testimoni == 0) {
            var writter = new Typewriter('#testimoni-text', {
                strings: testimoni_text,
                autoStart: true,
                loop: false,
                // deleteSpeed: 10000000,
                delay: 150
            });

            setTimeout(() => {
                writter.stop();
            }, ((testimoni_text.join().length - testimoni_text.length) * 150) + 5000);

            testimoni = 1;

        }

        if (($(window).scrollTop() >= $('#pertanyaan_umum_dan_jawaban').offset().top - 768) && pertanyaan_umum_dan_jawaban == 0) {
            var writter = new Typewriter('.eui-widget-title', {
                strings: pertanyaan_umum_dan_jawaban_text,
                autoStart: true,
                loop: false,
                // deleteSpeed: 10000000,
                delay: 150
            });

            setTimeout(() => {
                writter.stop();
            }, ((pertanyaan_umum_dan_jawaban_text.join().length - pertanyaan_umum_dan_jawaban_text.length) * 150) + 5000);

            pertanyaan_umum_dan_jawaban = 1;

        }

        var writter = null;
    });

    // new Typewriter('#performa-terbaik', {
    //     strings: ['Performa Terbaik!!!', 'Server Sesuai Kebutuhanmu'],
    //     autoStart: true,
    //     loop: true  
    // })

    // 
    $(document).keydown(function (event) {
        if (event.keyCode == 123) { // Prevent F12
            return false;
        } else if (event.ctrlKey && event.shiftKey && event.keyCode == 67) { // Prevent Ctrl+Shift+C        
            return false;
        } else if (event.ctrlKey && event.shiftKey && event.keyCode == 73) { // Prevent Ctrl+Shift+I        
            return false;
        } else if (event.ctrlKey && event.keyCode == 85) { // Prevent Ctrl+Shift+U        
            return false;
        }

    });

    // untuk webtour (Dashboard setelah login)
    localStorage.hasTour = 0;

    // untuk webtour index
    if (!localStorage.hasTourIndex) {
        localStorage.hasTourIndex = 0;
    }

    if ((localStorage.hasTourIndex == 0 || localStorage.hasTourIndex == 1) && window.innerWidth >= 768) {
        // if (localStorage.hasTourIndex == 0 && window.innerWidth >= 768) {
        setTimeout(() => {
            var tourguide = new Tourguide();
            tourguide.start();
        }, 1000)


        if (localStorage.hasTourIndex == 1) {

            localStorage.hasTourIndex = 2;
        } else if (localStorage.hasTourIndex == 0) {
            localStorage.hasTourIndex = 1;
        }
    }

    <!--Start of Tawk.to Script-->
    var Tawk_API = Tawk_API || {}, Tawk_LoadStart = new Date();
    (function () {
        var s1 = document.createElement("script"), s0 = document.getElementsByTagName("script")[0];
        s1.async = true;
        s1.src = 'https://embed.tawk.to/606d1e78067c2605c0bfe981/1f2l3u2pe';
        s1.charset = 'UTF-8';
        s1.setAttribute('crossorigin', '*');
        s0.parentNode.insertBefore(s1, s0);
    })();
    <!--End of Tawk.to Script-->

    // Select all links with hashes
    $('a[href*="#"]')
        // Remove links that don't actually link to anything
        .not('[href="#"]')
        .not('[href="#0"]')
        .not('[href="#modal-elearning"]')
        .not('[href="#modal-akademik"]')
        .not('[href="#modal-kependudukan"]')
        .not('[href="#modal-penggajian"]')
        .not('[href="#modal-perpustakaan"]')
        .not('[href="#modal-stok-produk"]')
        .not('[href="#modal-spk-beasiswa"]')
        .not('[href="#modal-spp"]')
        .not('[href="#modal-pengarsipan-surat"]')
        .click(function (event) {
            // On-page links
            if (
                location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '')
                &&
                location.hostname == this.hostname
            ) {
                // Figure out element to scroll to
                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                // Does a scroll target exist?
                if (target.length) {
                    // Only prevent default if animation is actually gonna happen
                    event.preventDefault();
                    $('html, body').animate({
                        scrollTop: target.offset().top
                    }, 1000, function () {
                        // Callback after animation
                        // Must change focus!
                        var $target = $(target);
                        $target.focus();
                        if ($target.is(":focus")) { // Checking if the target was focused
                            return false;
                        } else {
                            $target.attr('tabindex', '-1'); // Adding tabindex for elements not focusable
                            $target.focus(); // Set focus again
                        }
                        ;
                    });
                }
            }
        });

    var btn = $('#btn-goto-top');

    $(window).scroll(function () {
        if ($(window).scrollTop() > 300) {
            btn.addClass('show');
        } else {
            btn.removeClass('show');
        }
    });

    btn.on('click', function (e) {
        e.preventDefault();
        $('html, body').animate({scrollTop: 0}, '300');
    });

    (function ($) {
        $.fn.countTo = function (options) {
            options = options || {};

            return $(this).each(function () {
                // set options for current element
                var settings = $.extend({}, $.fn.countTo.defaults, {
                    from: $(this).data('from'),
                    to: $(this).data('to'),
                    speed: $(this).data('speed'),
                    refreshInterval: $(this).data('refresh-interval'),
                    decimals: $(this).data('decimals')
                }, options);

                // how many times to update the value, and how much to increment the value on each update
                var loops = Math.ceil(settings.speed / settings.refreshInterval),
                    increment = (settings.to - settings.from) / loops;

                // references & variables that will change with each update
                var self = this,
                    $self = $(this),
                    loopCount = 0,
                    value = settings.from,
                    data = $self.data('countTo') || {};

                $self.data('countTo', data);

                // if an existing interval can be found, clear it first
                if (data.interval) {
                    clearInterval(data.interval);
                }
                data.interval = setInterval(updateTimer, settings.refreshInterval);

                // initialize the element with the starting value
                render(value);

                function updateTimer() {
                    value += increment;
                    loopCount++;

                    render(value);

                    if (typeof (settings.onUpdate) == 'function') {
                        settings.onUpdate.call(self, value);
                    }

                    if (loopCount >= loops) {
                        // remove the interval
                        $self.removeData('countTo');
                        clearInterval(data.interval);
                        value = settings.to;

                        if (typeof (settings.onComplete) == 'function') {
                            settings.onComplete.call(self, value);
                        }
                    }
                }

                function render(value) {
                    var formattedValue = settings.formatter.call(self, value, settings);
                    $self.html(formattedValue);
                }
            });
        };

        $.fn.countTo.defaults = {
            from: 0,               // the number the element should start at
            to: 0,                 // the number the element should end at
            speed: 10000,           // how long it should take to count between the target numbers
            refreshInterval: 1000,  // how often the element should be updated
            decimals: 0,           // the number of decimal places to show
            formatter: formatter,  // handler for formatting the value before rendering
            onUpdate: null,        // callback method for every time the element is updated
            onComplete: null       // callback method for when the element finishes updating
        };

        function formatter(value, settings) {
            return value.toFixed(settings.decimals);
        }
    }(jQuery));

    jQuery(function ($) {
        // custom formatting example
        $('.count-number').data('countToOptions', {
            formatter: function (value, options) {
                return value.toFixed(options.decimals).replace(/\B(?=(?:\d{3})+(?!\d))/g, ',');
            }
        });

        // start all the timers
        $('.timer').each(count);

        function count(options) {
            var $this = $(this);
            options = $.extend({}, options || {}, $this.data('countToOptions') || {});
            $this.countTo(options);
        }
    });

    // particle js
    particlesJS('footer',

        {
            "particles": {
                "number": {
                    "value": 50,
                    "density": {
                        "enable": true,
                        "value_area": 800
                    }
                },
                "color": {
                    "value": "#222"
                },
                "shape": {
                    "type": "circle",
                    "stroke": {
                        "width": 0,
                        "color": "#000000"
                    },
                    "polygon": {
                        "nb_sides": 5
                    },
                    "image": {
                        "src": "img/github.svg",
                        "width": 100,
                        "height": 100
                    }
                },
                "opacity": {
                    "value": 0.5,
                    "random": false,
                    "anim": {
                        "enable": false,
                        "speed": 1,
                        "opacity_min": 0.1,
                        "sync": false
                    }
                },
                "size": {
                    "value": 5,
                    "random": true,
                    "anim": {
                        "enable": false,
                        "speed": 40,
                        "size_min": 0.1,
                        "sync": false
                    }
                },
                "line_linked": {
                    "enable": true,
                    "distance": 150,
                    "color": "#ffffff",
                    "opacity": 0.4,
                    "width": 1
                },
                "move": {
                    "enable": true,
                    "speed": 6,
                    "direction": "none",
                    "random": false,
                    "straight": false,
                    "out_mode": "out",
                    "attract": {
                        "enable": false,
                        "rotateX": 600,
                        "rotateY": 1200
                    }
                }
            },
            "interactivity": {
                "detect_on": "canvas",
                "events": {
                    "onhover": {
                        "enable": true,
                        "mode": "repulse"
                    },
                    "onclick": {
                        "enable": true,
                        "mode": "push"
                    },
                    "resize": true
                },
                "modes": {
                    "grab": {
                        "distance": 400,
                        "line_linked": {
                            "opacity": 1
                        }
                    },
                    "bubble": {
                        "distance": 400,
                        "size": 40,
                        "duration": 2,
                        "opacity": 8,
                        "speed": 3
                    },
                    "repulse": {
                        "distance": 200
                    },
                    "push": {
                        "particles_nb": 4
                    },
                    "remove": {
                        "particles_nb": 2
                    }
                }
            },
            "retina_detect": true,
            "config_demo": {
                "hide_card": false,
                "background_color": "#b61924",
                "background_image": "",
                "background_position": "50% 50%",
                "background_repeat": "no-repeat",
                "background_size": "cover"
            }
        }
    );
</script>
</body>
</html>
