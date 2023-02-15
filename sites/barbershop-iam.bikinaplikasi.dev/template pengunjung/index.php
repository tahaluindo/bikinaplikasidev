<!doctype html>
<html class="no-js" lang="zxx" style="overflow-x:hidden">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title> Barber HTML-5 Template </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

	<!-- CSS here -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/owl.carousel.min.css">
	<link rel="stylesheet" href="assets/css/slicknav.css">
    <link rel="stylesheet" href="assets/css/flaticon.css">
    <link rel="stylesheet" href="assets/css/gijgo.css">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/animated-headline.css">
	<link rel="stylesheet" href="assets/css/magnific-popup.css">
	<link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
	<link rel="stylesheet" href="assets/css/themify-icons.css">
	<link rel="stylesheet" href="assets/css/slick.css">
	<link rel="stylesheet" href="assets/css/nice-select.css">
	<link rel="stylesheet" href="assets/css/style.css">
</head>
<body style="overflow:hidden">
    <!-- ? Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="assets/img/logo/loder.png" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader Start -->
    <Style>
         

                @import url(https://fonts.googleapis.com/css?family=Lato:300,400,700);

                @import url(https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css);

                *, *:before, *:after {
                box-sizing: border-box;
                }

                .lighter-text {
                color: #ABB0BE;
                }

                .main-color-text {
                color: $main-color;
                }

                nav {
                padding: 20px 0 20px 0; 
                font-size: 16px;
                
                .navbar-left {
                    float: left;
                }
                
                .navbar-right {
                    float: right;
                }
                ul {
                    
                    li {
                    display: inline;
                    padding-left: 20px;
                    a {
                        color: #777777;
                        text-decoration: none;
                        
                        &:hover {
                        color: black;
                        }
                    }
                    }
                }
                }

                .container {
                margin: auto;
                width: 80%;
                }

                .badge {
                    background-color: #6394F8;
                    border-radius: 10px;
                    color: white;
                    display: inline-block;
                    font-size: 12px;
                    line-height: 1;
                    padding: 3px 7px;
                    text-align: center;
                    vertical-align: middle;
                    white-space: nowrap;
                }

                .shopping-cart {
                margin: 20px 0;
                float: right;
                background: white;
                width: 320px;
                position: relative;
                border-radius: 3px;
                padding: 20px;
                
                
                .shopping-cart-header {
                    border-bottom: 1px solid #E8E8E8;
                    padding-bottom: 15px;
                    
                    .shopping-cart-total {
                    float: right;
                    }
                }
                
                .shopping-cart-items {
                    
                    padding-top: 20px;

                    li {
                        margin-bottom: 18px;
                    }

                    img {
                    float: left;
                    margin-right: 12px;
                    }
                    
                    .item-name {
                    display: block;
                    padding-top: 10px;
                    font-size: 16px;
                    }
                    
                    .item-price {
                    color: $main-color;
                    margin-right: 8px;
                    }
                    
                    .item-quantity {
                    color: $light-text;
                    }
                }
                
                }

                .shopping-cart:after {
                    bottom: 100%;
                    left: 89%;
                    border: solid transparent;
                    content: " ";
                    height: 0;
                    width: 0;
                    position: absolute;
                    pointer-events: none;
                    border-bottom-color: white;
                    border-width: 8px;
                    margin-left: -8px;
                }

                .cart-icon {
                color: #515783;
                font-size: 24px;
                margin-right: 7px;
                float: left;
                }

                .button {
                background: $main-color;
                color:white;
                text-align: center;
                padding: 12px;
                text-decoration: none;
                display: block;
                border-radius: 3px;
                font-size: 16px;
                margin: 25px 0 15px 0;
                
                &:hover {
                    background: lighten($main-color, 3%);
                }
                }

                .clearfix:after {
                content: "";
                display: table;
                clear: both;
                }



    </Style>
    <header>
        <!--? Header Start -->
        <div class="header-area header-transparent pt-20">
            <div class="main-header header-sticky">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <!-- Logo -->
                        <div class="col-xl-2 col-lg-2 col-md-1">
                            <div class="logo">
                                <a href="index.html"><img src="assets/img/logo/logo.png" alt=""></a>
                            </div>
                        </div>
                        <div class="col-xl-10 col-lg-10 col-md-10">
                            <div class="menu-main d-flex align-items-center justify-content-end">
                                <!-- Main-menu -->
                                <div class="main-menu f-right d-none d-lg-block">
                                    <nav>
                                        <ul id="navigation">
                                            <li class="active"><a href="index.html">Home</a></li>
                                            <li><a href="about.html">About Us</a></li>
                                            <li><a href="services.html">Services</a></li>
                                            <li><a href="portfolio.html">Product</a></li>
                                           <!-- <li><a href="blog.html">Blog</a>
                                                <ul class="submenu">
                                                    <li><a href="blog.html">Blog</a></li>
                                                    <li><a href="blog_details.html">Blog Details</a></li>
                                                    <li><a href="elements.html">Element</a></li>
                                                </ul>
                                            </li>-->
                                            <li><a href="contact.html">Login</a></li>
                                            <li><a href="keranjang.html" id="cart"><i class="fa fa-shopping-cart"></i> <span class="badge">3</span></a></li>

                                               
                                        </ul>
                                    </nav>
                                </div>
                                <div class="header-right-btn f-right d-none d-lg-block ml-30">
                                    <a href="from.html" class="btn header-btn">became a member</a>
                                </div>
                            </div>
                        </div>   
                        <!-- Mobile Menu -->
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header End -->
    </header>
    <main style="display:grid">
        <!--? slider Area Start-->
<Style>
        .figcaption, figure, footer, header, main, nav, section {
            display: block;
        }
        .mb-5 {
            margin-bottom: 3rem !important;
            font-size: 1.5vw; width:500px; word-spacing: 7px;
    color: rgba(255,255,255,.9);
    font-family: "Poppins", Arial, sans-serif;
    line-height: 1.8;
    font-weight: 400;
    width: auto;
        }
        .justify-content-center {
            -webkit-box-pack: center !important;
            -ms-flex-pack: center !important;
            justify-content: center !important;
        }
        .ftco-animate {
            
    visibility: visible;
    opacity: 1;

        }
        .slider-text .text:after {
        position: absolute;
        top: 0;
        left: -100px;
        bottom: -12px;
        content: '';
        width: 2px;
        background: #bf925b;
        }
        .heading-section .subheading {
            font-size: 20px;
            display: block;
            margin-bottom: 0px;
            font-weight: 600;
            color: #bf925b;
            font-family: "Barlow Condensed", Arial, sans-serif;
            text-transform: uppercase;
        }
        .heading-section h2 {
            font-size: 50px;
            font-weight: 700;
            line-height: 1.2;
            text-transform: uppercase;
        }

        .btn1 {
            padding:17px 34px;
             
            background: #d19f68;
            font-family: "Oswald",sans-serif;
            text-transform: uppercase; 
            color: #000000;
            cursor: pointer;
            display: inline-block;
            font-size: 15px;
            font-weight: 400;
            border-radius: 0px;
            line-height: 1;
            -moz-user-select: none;
            letter-spacing: 1px;
            line-height: 0;
            margin-bottom: 0;
            margin: 10px;
            cursor: pointer;
            transition: color 0.4s linear;
            position: relative;
            z-index: 1;
            border: 0;
            overflow: hidden;
            margin: 0; 
        } 
        .fadeInUp {
            -webkit-animation-name: fadeInUp;
            animation-name: fadeInUp;
        }
        .block-7 {
            border-radius: 4px;
            margin-bottom: 30px;
            padding: 0;
            background: #fff;
            -webkit-box-shadow: 0px 24px 48px -13px rgba(0, 0, 0, 0.05);
            -moz-box-shadow: 0px 24px 48px -13px rgba(0, 0, 0, 0.05);
            box-shadow: 0px 24px 48px -13px rgba(0, 0, 0, 0.05);
            -moz-transition: all 0.3s ease;
            -o-transition: all 0.3s ease;
            -webkit-transition: all 0.3s ease;
            -ms-transition: all 0.3s ease;
            transition: all 0.3s ease;
        }
        .block-7 .img {
            height: 280px;
            width: 100%;
        }
        .img, .blog-img, .user-img {
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center center;
        }
        .p-4 {
            padding: 1.5rem !important;
        }
        .bg-light {
            background: #ebe8de !important;
        }
        .pl-4, .px-4 {
            padding-left: 1.5rem !important;
        }
        .pr-4, .px-4 {
            padding-right: 1.5rem !important;
        }
        .py-2 {
            padding-top: 0.5rem !important;
        }
        .w-100 {
            width: 100% !important;
        }
        .align-items-center {
            -webkit-box-align: center !important;
            -ms-flex-align: center !important;
            align-items: center !important;
        }
        .col-lg-6 {
            -webkit-box-flex: 0;
            -ms-flex: 0 0 50%;
            flex: 0 0 50%;
            max-width: 50%;
        }
        .pt-md-5 {
            padding-top: 3rem!important;

            
        }
         
        .slick-slider .slick-track, .slick-slider .slick-list {
            -webkit-transform: translate3d(0, 0, 0);
            -moz-transform: translate3d(0, 0, 0);
            -ms-transform: translate3d(0, 0, 0);
            -o-transform: translate3d(0, 0, 0);
            transform: translate3d(0, 0, 0);
        }
        .slick-list {
            position: relative;
            display: block;
            overflow: hidden;
            margin: 0;
            padding: 0;
        }
        .hero-wrap {
            width: 100%;
            height: 850px;
            position: inherit;
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center center;
            background-attachment: fixed;
            position: relative;
            z-index: 0;
        }
        .hero-wrap .overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            content: '';
            opacity: 1;
            background: #090601;
            z-index: -2;
            background: rgba(1,2,18,.44);
            background: -moz-radial-gradient(center,ellipse cover,rgba(1,2,18,.44) 0%,rgba(9,6,1,.96) 93%,#090601 100%);
            background: -webkit-gradient(radial,center center,0,center center,100%,color-stop(0%,rgba(1,2,18,.44)),color-stop(93%,rgba(9,6,1,.96)),color-stop(100%,#090601));
            background: -webkit-radial-gradient(center,ellipse cover,rgba(1,2,18,.44) 0%,rgba(9,6,1,.96) 93%,#090601 100%);
            background: -o-radial-gradient(center,ellipse cover,rgba(1,2,18,.44) 0%,rgba(9,6,1,.96) 93%,#090601 100%);
            background: -ms-radial-gradient(center,ellipse cover,rgba(1,2,18,.44) 0%,rgba(9,6,1,.96) 93%,#090601 100%);
            background: -webkit-radial-gradient(center,ellipse,rgba(1,2,18,.44) 0%,rgba(9,6,1,.96) 93%,#090601 100%);
            background: -o-radial-gradient(center,ellipse,rgba(1,2,18,.44) 0%,rgba(9,6,1,.96) 93%,#090601 100%);
            background: radial-gradient(ellipse at center,rgba(1,2,18,.44) 0%,rgba(9,6,1,.96) 93%,#090601 100%);
            filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#010212', endColorstr='#090601', GradientType=1 );
        }
        .slider-text {
            position: relative;
            height: 850px;
        }
        .align-items-center {
            -webkit-box-align: center!important;
            -ms-flex-align: center!important;
            align-items: center!important;
        }
        .justify-content-end {
            -webkit-box-pack: end!important;
            -ms-flex-pack: end!important;
            justify-content: flex-end!important;
        }
        .no-gutters {
            margin-right: 0;
            margin-left: 0;
        }
        .no-gutters>.col, .no-gutters>[class*="col-"] {
            padding-right: 0;
            padding-left: 0;
        }
         
        .slider-text .subheading {
            font-size: 17px;
            color: #bf925b;
            font-weight: 600;
            margin-bottom: 0;
            text-transform: uppercase;
            font-family: "Poppins",Arial,sans-serif;
        }
        .slider-text h1 {
            font-size: 4vw;
            margin-top: 0px;
            color: #fff;
            line-height: 1.1;
            font-weight: 700;
            text-transform: uppercase;
        }
        .mb-4 {
            margin-bottom: 1.5rem!important;
            font-family: 'Oswald';
            width: auto;
        }
        h1, h2, h3, h4, h5, .h1, .h2, .h3, .h4, .h5 {
            line-height: 1.5;
            color: rgba(0,0,0,.8);
            font-weight: 400;
            font-family: "Barlow Condensed",Arial,sans-serif;
        }
        .ml-auto {
            margin-left: auto!important;
        } 
        .text-center {
            text-align: center !important;
        }
        .heading-section.heading-section-white h2 {
            color: #fff;
        }
        .heading-section h2 {
            font-size: 50px;
            font-weight: 700;
            line-height: 1.2;
            text-transform: uppercase;
        }
        .ftco-intro h2 {
            font-size: 30px !important;
        }
        .ftco-intro {
            color: rgba(255, 255, 255, 0.8);
            z-index: 0;
            overflow: hidden;
            position: relative;
            padding: 4em 0;
        }
        .ftco-intro:after {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            content: '';
            background: rgba(1, 2, 18, 0.44);
            background: -moz-radial-gradient(center, ellipse cover, rgba(1, 2, 18, 0.44) 0%, rgba(9, 6, 1, 0.96) 93%, #090601 100%);
            background: -webkit-gradient(radial, center center, 0px, center center, 100%, color-stop(0%, rgba(1, 2, 18, 0.44)), color-stop(93%, rgba(9, 6, 1, 0.96)), color-stop(100%, #090601));
            background: -webkit-radial-gradient(center, ellipse cover, rgba(1, 2, 18, 0.44) 0%, rgba(9, 6, 1, 0.96) 93%, #090601 100%);
            background: -o-radial-gradient(center, ellipse cover, rgba(1, 2, 18, 0.44) 0%, rgba(9, 6, 1, 0.96) 93%, #090601 100%);
            background: -ms-radial-gradient(center, ellipse cover, rgba(1, 2, 18, 0.44) 0%, rgba(9, 6, 1, 0.96) 93%, #090601 100%);
            background: -webkit-radial-gradient(center, ellipse, rgba(1, 2, 18, 0.44) 0%, rgba(9, 6, 1, 0.96) 93%, #090601 100%);
            background: -o-radial-gradient(center, ellipse, rgba(1, 2, 18, 0.44) 0%, rgba(9, 6, 1, 0.96) 93%, #090601 100%);
            background: radial-gradient(ellipse at center, rgba(1, 2, 18, 0.44) 0%, rgba(9, 6, 1, 0.96) 93%, #090601 100%);
            filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#010212', endColorstr='#090601', GradientType=1 );
            z-index: -1;
            opacity: .9;
        }
        .heading-section.heading-section-white h2 {
            color: #fff;
        }
        .heading-section h2 {
            font-size: 50px;
            font-weight: 700;
            line-height: 1.2;
            text-transform: uppercase;
        }
        .ftco-intro h2 {
            font-size: 30px !important;
        }
        .element.style {
            background-image: url(Doc/img/bg_3.jpg);
        }
        .img, .blog-img, .user-img {
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center center;
        }
        .justify-content-center {
            -webkit-box-pack: center !important;
            -ms-flex-pack: center !important;
            justify-content: center !important;
        }
        .text-center {
            text-align: center !important;
        } 
        .video-image .icon-video {
            margin: 0 auto;
            width: 90px;
            height: 90px;
            border-radius: 50%;
            position: relative;
            background: #bf925b;
            -webkit-animation: pulse 2s infinite;
            animation: pulse 2s infinite;
        }
        .video-image .icon-video:after {
            position: absolute;
            top: 7px;
            bottom: 7px;
            left: 7px;
            right: 7px;
            content: '';
            border: 1px dashed rgba(255, 255, 255, 0.5);
            border-radius: 50%;
        }
        .h3 {
            display: block;
            font-size: 1.17em;
            margin-block-start: 1em;
            margin-block-end: 1em;
            margin-inline-start: 0px;
            margin-inline-end: 0px;
            font-weight: bold;
        }
        .h1, h2, h3, h4, h5, .h1, .h2, .h3, .h4, .h5 {
            line-height: 1.5;
            color: rgba(0, 0, 0, 0.8);
            font-weight: 400;
            font-family: "Barlow Condensed", Arial, sans-serif;
        }
        .video-image h3 {
            font-weight: 700;
            font-size: 50px;
            color: #fff;
            line-height: 1.2;
            text-transform: uppercase;
        }
        .col-12, .col, .col-sm-12, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-md-12, .col-md, .col-lg-4, .col-lg-6, .col-lg-8 {
            position: relative;
            width: 100%;
            padding-right: 15px;
            padding-left: 15px;
        }
        .video-image:after {
            z-index: -1;
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            content: '';
            opacity: .8;
            background: rgba(1, 2, 18, 0.44);
            background: -moz-radial-gradient(center, ellipse cover, rgba(1, 2, 18, 0.44) 0%, rgba(9, 6, 1, 0.96) 93%, #090601 100%);
            background: -webkit-gradient(radial, center center, 0px, center center, 100%, color-stop(0%, rgba(1, 2, 18, 0.44)), color-stop(93%, rgba(9, 6, 1, 0.96)), color-stop(100%, #090601));
            background: -webkit-radial-gradient(center, ellipse cover, rgba(1, 2, 18, 0.44) 0%, rgba(9, 6, 1, 0.96) 93%, #090601 100%);
            background: -o-radial-gradient(center, ellipse cover, rgba(1, 2, 18, 0.44) 0%, rgba(9, 6, 1, 0.96) 93%, #090601 100%);
            background: -ms-radial-gradient(center, ellipse cover, rgba(1, 2, 18, 0.44) 0%, rgba(9, 6, 1, 0.96) 93%, #090601 100%);
            background: -webkit-radial-gradient(center, ellipse, rgba(1, 2, 18, 0.44) 0%, rgba(9, 6, 1, 0.96) 93%, #090601 100%);
            background: -o-radial-gradient(center, ellipse, rgba(1, 2, 18, 0.44) 0%, rgba(9, 6, 1, 0.96) 93%, #090601 100%);
            background: radial-gradient(ellipse at center, rgba(1, 2, 18, 0.44) 0%, rgba(9, 6, 1, 0.96) 93%, #090601 100%);
            filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#010212', endColorstr='#090601', GradientType=1 );
        }
        .video-image {
            width: 100%;
            height: 500px;
            position: relative;
            z-index: 0;
        }
        .figcaption, figure, footer, header, main, nav, section {
            display: block;
        }
        .video-image .wrap-video {
            height: 500px;
        }
        .align-items-center {
            -webkit-box-align: center !important;
            -ms-flex-align: center !important;
            align-items: center !important;
        }
        /* Custom normalize.css */

        .html *, html *:before, html *:after, html *::before, html *::after {
        box-sizing: inherit;
        }

       .h1,
        .h2,
        .h3,
        .h4,
       .h5,
        .h6,
        .p {
        font-weight: normal;
        font-size: 100%;
        padding: 0;
        margin: 0;
        }

        dl,
        dd,
        menu,
        ul {
        padding: 0;
        margin: 0;
        list-style: none;
        }
        ol {
        list-style-type: decimal;
        }
        img {
        max-width: 100%;
        height: auto;
        border-style: none;
        }
        a {
        text-decoration: none;
        color: inherit;
        }
        #mains {
        height: 100vh;
        width: 100vw;
        display: flex;
        justify-content: space-around;
        align-itemms: center;
        }
        #prev,
        #next {
        font-size: 4rem;
        color: ##ffffff;
        }
        #sliderr {
        position: relative;
        width: 15rem;
        height: 22rem;
        }
        .cardd {
        width: max-content;
        font-family: "Questrial", sans-serif;
        position: absolute;
        box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16), 0 3px 6px rgba(0, 0, 0, 0.23);
        transition: all 0.5s;
        }
        .cardd-header {
        text-align: center;
        padding: 2rem 1.5rem;
        }
        .cardd-header .title {
        color: white;
        text-transform: uppercase;
        font-size: 1.7rem;
        font-weight: 200;
        margin-bottom: 0.25rem;
        }
        .cardd-header .time {
        color: #D6D5D5;
        font-size: 1.2rem;
        }
        .itemm-list {
        text-align: center;
        }
        .itemm-list .itemm {
        padding: 0.7rem 0;
        font-size: 0.8rem;
        color: #757575;
        }
        .itemm-list .itemm:nth-child(odd) {
        background-color: white;
        }
        .itemm-list .itemm:nth-child(even) {
        background-color: #fff;
        }
        .btnn {
        display: inline-block;
        color: white;
        text-transform: uppercase;
        padding: 0.5rem 0.9rem;
        }
        .blue {
        background-color: #d19f68;
        }
        .gold {
        background-color: #d19f68;
        }
        .brown {
        background-color: #d19f68;
        }
        .front {
        transform: translateX(-10rem) scale(1.3);
        z-index: 20;
        }
        .left {
        transform: translateX(-40rem);
        z-index: 10;
        }
        .right {
        transform: translateX(20rem);
        z-index: 10;
        }
        .slider-text h1 span {
        color: transparent;
        -webkit-text-fill-color: transparent;
        -webkit-text-stroke-width: 1px;
        -webkit-text-stroke-color: #fff;
        }
        .slider-text .btn-custom {
        text-transform: uppercase;
        font-weight: 600;
        font-size: 14px;
        letter-spacing: 1px;
        border: 2px solid #bf925b;
        padding: 10px 15px;
        }
        a, button {
        -webkit-transition: .3s all ease;
        -o-transition: .3s all ease;
        transition: .3s all ease;
        color: #bf925b;
                }


            /*--------------------------------------------------------------
            >>> TABLE OF CONTENTS:
            ----------------------------------------------------------------
            1.0 Config
            2.0 General
            3.0 Slider
            4.0 All Tutorials
            --------------------------------------------------------------*/
            /*--------------------------------------------------------------
            1.0 Config
            --------------------------------------------------------------*/
            /*! sanitize.css | CC0 Public Domain | github.com/jonathantneal/sanitize.css */
            pre, textarea {
            overflow: auto;
            }

            [hidden], audio:not([controls]), template {
            display: none;
            }

            details, main, summary {
            display: block;
            }

            input[type=number] {
            width: auto;
            }

            input[type=search], input[type=text], input[type=email] {
            -webkit-appearance: none;
            }

            input[type="*"] {
            -webkit-appearance: none;
            }

            input[type=search]::-webkit-search-cancel-button, input[type=search]::-webkit-search-decoration {
            -webkit-appearance: none;
            }

            progress {
            display: inline-block;
            }

            small {
            font-size: 100%;
            }

            textarea {
            resize: vertical;
            }

            [unselectable] {
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            }

            *, ::after, ::before {
            box-sizing: inherit;
            border-style: solid;
            border-width: 0;
            }

            * {
            font-size: inherit;
            line-height: inherit;
            margin: 0;
            padding: 0;
            }

            ::after, ::before {
            text-decoration: inherit;
            vertical-align: inherit;
            }

            :root {
            -ms-overflow-style: -ms-autohiding-scrollbar;
            overflow-y: scroll;
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
            text-size-adjust: 100%;
            box-sizing: border-box;
            cursor: default;
            font: 16px/1.5 sans-serif;
            text-rendering: optimizeLegibility;
            }

            a {
            text-decoration: none;
            }

            audio, canvas, iframe, img, svg, video {
            vertical-align: middle;
            }

            button, input, select, textarea {
            background-color: transparent;
            color: inherit;
            font-family: inherit;
            font-style: inherit;
            font-weight: inherit;
            min-height: 1.5em;
            }

            code, kbd, pre, samp {
            font-family: monospace,monospace;
            }

            nav ol, nav ul {
            list-style: none;
            }

            ul li {
            list-style: none;
            }

            select {
            -moz-appearance: none;
            -webkit-appearance: none;
            }

            select::-ms-expand {
            display: none;
            }

            select::-ms-value {
            color: currentColor;
            }

            table {
            border-collapse: collapse;
            border-spacing: 0;
            }

            ::-moz-selection {
            background-color: #B3D4FC;
            text-shadow: none;
            }

            ::selection {
            background-color: #B3D4FC;
            text-shadow: none;
            }

            @media screen {
            [hidden~=screen] {
                display: inherit;
            }

            [hidden~=screen]:not(:active):not(:focus):not(:target) {
                clip: rect(0 0 0 0) !important;
                position: absolute !important;
            }
            }
            /*--------------------------------------------------------------
            >>> TABLE OF CONTENTS:
            ----------------------------------------------------------------
            1.0 Font
            2.0 Trasnitions
            3.0 Number of Slides
            --------------------------------------------------------------*/
            /*--------------------------------------------------------------
            1.0 Font
            --------------------------------------------------------------*/
            /*--------------------------------------------------------------
            2.0 Transitions
            --------------------------------------------------------------*/
            /*--------------------------------------------------------------
            >>> TABLE OF CONTENTS:
            ----------------------------------------------------------------
            1.0 Config
            2.0 Translate
            --------------------------------------------------------------*/
            /*--------------------------------------------------------------
            1.0 Transition
            --------------------------------------------------------------*/
            /*--------------------------------------------------------------
            2.0 Translate
            --------------------------------------------------------------*/
            /*--------------------------------------------------------------
            >>> TABLE OF CONTENTS:
            ----------------------------------------------------------------
            1.0 Neutral
            2.0 Main Colors
            3.0 Color Pallete
            3.0 Grey Scale
            --------------------------------------------------------------*/
            /*--------------------------------------------------------------
            1.0 Neutral
            --------------------------------------------------------------*/
            /*--------------------------------------------------------------
            2.0 Main color
            --------------------------------------------------------------*/
            /*--------------------------------------------------------------
            3.0 Color Pallete
            --------------------------------------------------------------*/
            /*--------------------------------------------------------------
            4.0 Grey Scale
            --------------------------------------------------------------*/
            /*--------------------------------------------------------------
            >>> TABLE OF CONTENTS:
            ----------------------------------------------------------------
            1.0 HTML Settings
            2.0 General Settings
            3.0 Heading 2
            4.0 Serif
            5.0 Heading 3
            6.0 Text
            7.0 Links
            --------------------------------------------------------------*/
            /*--------------------------------------------------------------
            1.0 HTML settings
            --------------------------------------------------------------*/
            html {
            -webkit-overflow-scrolling: touch;
            box-sizing: border-box;
            -webkit-tap-highwhite-color: transparent;
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            text-rendering: optimizeLegibility;
            }

            /*--------------------------------------------------------------
            2.0 General Settings
            --------------------------------------------------------------*/
            h1,
            h2,
            h3,
            h4,
            h5,
            h6,
            p,
            a,
            li {
            display: block;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", "Roboto", "Oxygen", "Ubuntu", "Cantarell", "Fira Sans", "Droid Sans", "Helvetica Neue", sans-serif;
            }

            /*--------------------------------------------------------------
            3.0 Heading 2
            --------------------------------------------------------------*/
            .heading-2 {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", "Roboto", "Oxygen", "Ubuntu", "Cantarell", "Fira Sans", "Droid Sans", "Helvetica Neue", sans-serif;
            font-size: 24px;
            font-weight: 500;
            line-height: 40px;
            color: #000;
            letter-spacing: 0.3px;
            }

            .heading-2--white {
            color: #FFF;
            }

            /*--------------------------------------------------------------
            4.0 Serif
            --------------------------------------------------------------*/
            .serif {
            font-family: "Arnhem";
            font-size: 24px;
            font-weight: 100;
            line-height: 38px;
            color: #3E4954;
            }

            @media (max-width: 400px) {
            .serif {
                font-size: 20px;
                line-height: 32px;
            }
            }
            /*--------------------------------------------------------------
            5.0 Heading-3
            --------------------------------------------------------------*/
            .heading-3 {
            font-size: 18px;
            font-weight: 600;
            line-height: 25px;
            color: #3E4954;
            letter-spacing: 0.3px;
            }

            .heading-3 + .heading-3 {
            margin-top: 5px;
            }

            .heading-3--white {
            color: #FFF;
            }

            .heading-3--light {
            color: #848995;
            }

            /*--------------------------------------------------------------
            6.0 Text
            --------------------------------------------------------------*/
            .text {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", "Roboto", "Oxygen", "Ubuntu", "Cantarell", "Fira Sans", "Droid Sans", "Helvetica Neue", sans-serif;
            font-size: 18px;
            font-weight: 400;
            line-height: 30px;
            color: #848995;
            letter-spacing: 0px;
            }

            @media (max-width: 600px) {
            .text {
                font-size: 16px;
                line-height: 30px;
            }
            }
            .text--light-white {
            color: rgba(255, 255, 255, 0.7);
            }

            /*--------------------------------------------------------------
            7.0 Links
            --------------------------------------------------------------*/
            .link {
            position: relative;
            display: inline-block;
            font-weight: 600;
            color: #5050FF;
            }

            .link:after {
            position: absolute;
            top: 50%;
            right: -32px;
            display: block;
            width: 24px;
            height: 14px;
            background-image: url("../images/slider/arrow__right--blue.svg");
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            content: '';
            transform: translateY(-50%);
            transition: all 0.2s ease;
            cubic-bezier(0.4, 0.0, 0.2, 1);
            }

            .link:hover:after {
            right: -48px;
            }

            /*--------------------------------------------------------------
            2.0 General
            --------------------------------------------------------------*/
            /*--------------------------------------------------------------
            >>> TABLE OF CONTENTS:
            ----------------------------------------------------------------
            1.0 General
            --------------------------------------------------------------*/
            /*--------------------------------------------------------------
            1.0 General
            --------------------------------------------------------------*/
            

            /*--------------------------------------------------------------
            3.0 Slider
            --------------------------------------------------------------*/
            /*--------------------------------------------------------------
            >>> TABLE OF CONTENTS:
            ----------------------------------------------------------------
            1.0 Variables
            2.0 Cards
            3.0 Bullets
            --------------------------------------------------------------*/
            /*--------------------------------------------------------------
            1.0 Variables
            --------------------------------------------------------------*/
            /*--------------------------------------------------------------
            2.0 Cards
            --------------------------------------------------------------*/
            .slider__item {
            transition: all 0.3s ease;
            -webkit-transition-timing-function: 
                cubic-bezier(0.4, 0.0, 0.2, 1);
                    transition-timing-function: 
                cubic-bezier(0.4, 0.0, 0.2, 1);
            }

            #slide-1:checked ~ .slider__holder .slider__item--1 {
            position: relative;
            z-index: 2;
            transform: translate(0) scale(1);
            }

            #slide-2:checked ~ .slider__holder .slider__item--1 {
            z-index: 1;
            transform: translateX(-20VW) scale(0.85);
            }

            @media (max-width: 768px) {
            #slide-2:checked ~ .slider__holder .slider__item--1 {
                opacity: 0.6;
            }
            }
            #slide-3:checked ~ .slider__holder .slider__item--1 {
            z-index: 0;
            transform: translateX(-210px) scale(0.65);
            }

            @media (max-width: 900px) {
            #slide-3:checked ~ .slider__holder .slider__item--1 {
                transform: translateX(-170px) scale(0.65);
            }
            }
            @media (max-width: 768px) {
            #slide-3:checked ~ .slider__holder .slider__item--1 {
                opacity: 0;
            }
            }
            #slide-4:checked ~ .slider__holder .slider__item--1 {
            z-index: -1;
            opacity: 0;
            transform: translateX(-210px) scale(0.65);
            }

            #slide-5:checked ~ .slider__holder .slider__item--1 {
            z-index: -1;
            opacity: 0;
            transform: translateX(-210px) scale(0.65);
            }

            #slide-1:checked ~ .slider__holder .slider__item--2 {
            z-index: 1;
            transform: translateX(100px) scale(0.85);
            }

            @media (max-width: 768px) {
            #slide-1:checked ~ .slider__holder .slider__item--2 {
                opacity: 0.6;
            }
            }
            #slide-2:checked ~ .slider__holder .slider__item--2 {
            position: relative;
            z-index: 2;
            transform: translate(0) scale(1);
            }

            #slide-3:checked ~ .slider__holder .slider__item--2 {
            z-index: 1;
            transform: translateX(-100px) scale(0.85);
            }

            @media (max-width: 768px) {
            #slide-3:checked ~ .slider__holder .slider__item--2 {
                opacity: 0.6;
            }
            }
            #slide-4:checked ~ .slider__holder .slider__item--2 {
            z-index: 0;
            transform: translateX(-210px) scale(0.65);
            }

            @media (max-width: 900px) {
            #slide-4:checked ~ .slider__holder .slider__item--2 {
                transform: translateX(-170px) scale(0.65);
            }
            }
            @media (max-width: 768px) {
            #slide-4:checked ~ .slider__holder .slider__item--2 {
                opacity: 0;
            }
            }
            #slide-5:checked ~ .slider__holder .slider__item--2 {
            z-index: -1;
            opacity: 0;
            transform: translateX(-210px) scale(0.65);
            }

            #slide-1:checked ~ .slider__holder .slider__item--3 {
            z-index: 0;
            transform: translateX(210px) scale(0.65);
            }

            @media (max-width: 900px) {
            #slide-1:checked ~ .slider__holder .slider__item--3 {
                transform: translateX(170px) scale(0.65);
            }
            }
            @media (max-width: 768px) {
            #slide-1:checked ~ .slider__holder .slider__item--3 {
                opacity: 0;
            }
            }
            #slide-2:checked ~ .slider__holder .slider__item--3 {
            z-index: 1;
            transform: translateX(20VW) scale(0.85);
            }

            @media (max-width: 768px) {
            #slide-2:checked ~ .slider__holder .slider__item--3 {
                opacity: 0.6;
            }
            }
            #slide-3:checked ~ .slider__holder .slider__item--3 {
            position: relative;
            z-index: 2;
            transform: translate(0) scale(1);
            }

            #slide-4:checked ~ .slider__holder .slider__item--3 {
            z-index: 1;
            transform: translateX(-100px) scale(0.85);
            }

            @media (max-width: 768px) {
            #slide-4:checked ~ .slider__holder .slider__item--3 {
                opacity: 0.6;
            }
            }
            #slide-5:checked ~ .slider__holder .slider__item--3 {
            z-index: 0;
            transform: translateX(-210px) scale(0.65);
            }

            @media (max-width: 900px) {
            #slide-5:checked ~ .slider__holder .slider__item--3 {
                transform: translateX(-170px) scale(0.65);
            }
            }
            @media (max-width: 768px) {
            #slide-5:checked ~ .slider__holder .slider__item--3 {
                opacity: 0;
            }
            }
            #slide-1:checked ~ .slider__holder .slider__item--4 {
            z-index: -1;
            opacity: 0;
            transform: translateX(210px) scale(0.65);
            }

            #slide-2:checked ~ .slider__holder .slider__item--4 {
            z-index: 0;
            transform: translateX(210px) scale(0.65);
            }

            @media (max-width: 900px) {
            #slide-2:checked ~ .slider__holder .slider__item--4 {
                transform: translateX(170px) scale(0.65);
            }
            }
            @media (max-width: 768px) {
            #slide-2:checked ~ .slider__holder .slider__item--4 {
                opacity: 0;
            }
            }
            #slide-3:checked ~ .slider__holder .slider__item--4 {
            z-index: 1;
            transform: translateX(100px) scale(0.85);
            }

            @media (max-width: 768px) {
            #slide-3:checked ~ .slider__holder .slider__item--4 {
                opacity: 0.6;
            }
            }
            #slide-4:checked ~ .slider__holder .slider__item--4 {
            position: relative;
            z-index: 2;
            transform: translate(0) scale(1);
            }

            #slide-5:checked ~ .slider__holder .slider__item--4 {
            z-index: 1;
            transform: translateX(-100px) scale(0.85);
            }

            @media (max-width: 768px) {
            #slide-5:checked ~ .slider__holder .slider__item--4 {
                opacity: 0.6;
            }
            }
            #slide-1:checked ~ .slider__holder .slider__item--5 {
            z-index: -1;
            opacity: 0;
            transform: translateX(210px) scale(0.65);
            }

            #slide-2:checked ~ .slider__holder .slider__item--5 {
            z-index: -1;
            opacity: 0;
            transform: translateX(210px) scale(0.65);
            }

            #slide-3:checked ~ .slider__holder .slider__item--5 {
            z-index: 0;
            transform: translateX(210px) scale(0.65);
            }

            @media (max-width: 900px) {
            #slide-3:checked ~ .slider__holder .slider__item--5 {
                transform: translateX(170px) scale(0.65);
            }
            }
            @media (max-width: 768px) {
            #slide-3:checked ~ .slider__holder .slider__item--5 {
                opacity: 0;
            }
            }
            #slide-4:checked ~ .slider__holder .slider__item--5 {
            z-index: 1;
            transform: translateX(100px) scale(0.85);
            }

            @media (max-width: 768px) {
            #slide-4:checked ~ .slider__holder .slider__item--5 {
                opacity: 0.6;
            }
            }
            #slide-5:checked ~ .slider__holder .slider__item--5 {
            position: relative;
            z-index: 2;
            transform: translate(0) scale(1);
            }

            /*--------------------------------------------------------------
            3.0 Bullets
            --------------------------------------------------------------*/
            .bullets__item {
            transition: all 0.2s ease;
            }

            #slide-1:checked ~ .bullets .bullets__item--1 {
            background: #FFF;
            }

            #slide-2:checked ~ .bullets .bullets__item--2 {
            background: #FFF;
            }

            #slide-3:checked ~ .bullets .bullets__item--3 {
            background: #FFF;
            }

            #slide-4:checked ~ .bullets .bullets__item--4 {
            background: #FFF;
            }

            #slide-5:checked ~ .bullets .bullets__item--5 {
            background: #FFF;
            }

            /*--------------------------------------------------------------
            >>> TABLE OF CONTENTS:
            ----------------------------------------------------------------
            1.0 Card
            2.0 Slider
            3.0 Bullets
            4.0 Section
            5.0 Button
            --------------------------------------------------------------*/
            /*--------------------------------------------------------------
            1.0 Card
            --------------------------------------------------------------*/
            .card {
            position: relative;
            display: block;
            border-radius: 8px;
            background: #FFF;
            box-shadow: 0 5px 20px 0 rgba(0, 0, 0, 0.05), 0 2px 4px 0 rgba(0, 0, 0, 0.1);
            }

            /*--------------------------------------------------------------
            2.0 Slider
            --------------------------------------------------------------*/
            .slider {
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            }

            .slider__radio {
            display: none;
            }

            .slider__holder {
            position: relative;
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            margin-top: 80px;
            text-align: left;
            }

            @media (max-width: 900px) {
            .slider__holder {
                max-width: min-content;
            }
            }
            @media (max-width: 600px) {
            .slider__holder {
                margin-top: 60px;
            }
            }
            .slider__item {
            position: absolute;
            top: 0;
            left: 0;
            display: block;
            overflow: hidden;
            width: 100%;
            opacity: 1;
            cursor: pointer;
            }

            .slider__item-content {
            padding: 0px;
            }

            @media (max-width: 600px) {
            .slider__item-content {
                padding: 0;
            }
            }
            @media (max-width: 375px) {
            .slider__item-content {
                padding: 40px 24px;
            }
            }
            .slider__item-text {
            padding: 60px 0;
            }


            4.0 Section
            --------------------------------------------------------------*/
            .section {
            position: relative;
            width: 100%;
            padding: 120px 24px;
            text-align: center;
            }

            .section__entry {
            width: 100%;
            max-width: 380px;
            margin: 0 auto;
            }

            .section__entry--center {
            text-align: center;
            }

            .section__title {
            display: block;
            padding-bottom: 12px;
            }

            .section__text {
            display: block;
            }

            /*--------------------------------------------------------------
            5.0 Button
            --------------------------------------------------------------*/
            .button {
            display: inline-block;
            height: 44px;
            padding: 12px 16px;
            font-weight: 500;
            line-height: 20px;
            color: #FFF;
            border-radius: 3px;
            background: rgba(0, 0, 0, 0.2);
            }

            .button:hover {
            background: rgba(0, 0, 0, 0.1);
            }
            
            /*--------------------------------------------------------------
            4.0 All Tutorials
            --------------------------------------------------------------*/
            /*--------------------------------------------------------------
            */

</style>






<section class="hero-wrap" style="background-image:url(assets/img/hero/h1_hero.png)">

  <div class="overlay"><a href="from.html" class="btn header-btn" style="DISPLAY:FLEX;  WIDTH: fit-content; bottom:-792px;">became a member</a></div>
  
  <div class="container">
    <div class="row no-gutters slider-text align-items-center justify-content-end" data-scrollax-parent="true">
        
      <div class="col-lg-6 ftco-animate pt-md-5 fadeInUp ftco-animated">
        <span class="subheading">Welcome to Barbero</span>
        <h1 class="mb-4">We Will Make <span>Your</span>
          
          <span>Style</span> of Your Dreams
        </h1>
        <div class="ml-auto text" style="
    position: relative;
    width: 100%;
    font-family: 'FontAwesome';
">
          <p class="mb-5" style="
    ">
    A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
          <p>
            <a href="#" class="btn-custom">Learn More About Us</a>
          </p>
        </div>
      </div>
    </div>
  </div>
</section>
 
<section class="about-area section-padding30 position-relative" style="padding-bottom:50px; padding-top: 50px;; z-index:0">
    <section class="section slider">

        <div class="section__entry section__entry--center">
        </div>

        <input type="radio" name="slider" id="slide-1" class="slider__radio">
        <input type="radio" name="slider" id="slide-2" class="slider__radio" checked>
        <input type="radio" name="slider" id="slide-3" class="slider__radio">
        <input type="radio" name="slider" id="slide-4" class="slider__radio">
        <input type="radio" name="slider" id="slide-5" class="slider__radio">

        <div class="slider__holder">


            <label for="slide-1" class="slider__item slider__item--1 card">
                <div class="slider__item-content">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th colspan="4" style="text-transform: uppercase; text-align: center;padding-top : 20px">
                                    <p style="font-size:2vw;color:White; font-family: open-sans;">Hair Stylis |  Gilbert Indira</p>

                                 <p style="color:White;margin-bottom:0px; font-size:1.7vw">Jumat, 20 Juli 2022</p>
                                </th>
                            </tr>
                        </thead>
                        <tbody style="text-align:center">
                            <tr>
                                <td></td>
                                <td>08.00 - 09.00</td>
                                <td>FULL</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>09.00 - 10.00</td>
                                <td>
                                    <a href="services2.html" class="btn1">BOOK</a>
                                </td>
                                <td></td>
                            </tr>

                            <tr>
                                <td></td>
                                <td>10.00 - 11.00</td>
                                <td>
                                    <a href="services2.html" class="btn1">BOOK</a>
                                </td>
                            </tr>

                            <tr>
                                <td></td>
                                <td>11.00 - 12.00</td>
                                <td>
                                    FULL
                                </td>
                            </tr>

                            <tr>
                                <td></td>
                                <td>12.00 - 13.00</td>
                                <td>
                                    <a href="services2.html" class="btn1">BOOK</a>
                                </td>
                            </tr>

                            <tr>
                                <td></td>
                                <td>13.00 - 14.00</td>
                                <td>
                                    <a href="services2.html" class="btn1">BOOK</a>
                                </td>
                            </tr>

                            <tr>
                                <td></td>
                                <td>15.00 - 16.00</td>
                                <td>
                                    <a href="services2.html" class="btn1">BOOK</a>
                                </td>
                            </tr>

                            <tr>
                                <td></td>
                                <td>16.00 - 17.00</td>
                                <td>
                                    <a href="services2.html" class="btn1">BOOK</a>
                                </td>
                            </tr>


                            <tr>
                                <td></td>
                                <td>16.00 - 17.00</td>
                                <td>
                                    FULL
                                </td>
                            </tr>


                            <tr>
                                <td></td>
                                <td>18.00 - 19.00</td>
                                <td>
                                    FULL
                                </td>
                            </tr>

                            <tr>
                                <td></td>
                                <td>19.00 - 20.00</td>
                                <td>
                                    FULL
                                </td>
                            </tr>


                        </tbody>
                    </table>
                </div>
            </label> <!-- Slider__item -->

            <label for="slide-2" class="slider__item slider__item--2 card">
                <div class="slider__item-content">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th colspan="4" style="text-transform: uppercase; text-align: center;padding-top : 20px">
                                <p style="font-size:2vw;color:White; font-family: open-sans;">Hair Stylis | Wira Adinata</p>

                                    Jumat, 20 Juli 2022
                                </th>
                            </tr>
                        </thead>
                        <tbody style="text-align:center">
                            <tr>
                                <td></td>
                                <td>08.00 - 09.00</td>
                                <td>FULL</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>09.00 - 10.00</td>
                                <td>
                                    <a href="services2.html" class="btn1">BOOK</a>
                                </td>
                                <td></td>
                            </tr>

                            <tr>
                                <td></td>
                                <td>10.00 - 11.00</td>
                                <td>
                                    <a href="services2.html" class="btn1">BOOK</a>
                                </td>
                            </tr>

                            <tr>
                                <td></td>
                                <td>11.00 - 12.00</td>
                                <td>
                                    FULL
                                </td>
                            </tr>

                            <tr>
                                <td></td>
                                <td>12.00 - 13.00</td>
                                <td>
                                    <a href="services2.html" class="btn1">BOOK</a>
                                </td>
                            </tr>

                            <tr>
                                <td></td>
                                <td>13.00 - 14.00</td>
                                <td>
                                    <a href="services2.html" class="btn1">BOOK</a>
                                </td>
                            </tr>

                            <tr>
                                <td></td>
                                <td>15.00 - 16.00</td>
                                <td>
                                    <a href="services2.html" class="btn1">BOOK</a>
                                </td>
                            </tr>

                            <tr>
                                <td></td>
                                <td>16.00 - 17.00</td>
                                <td>
                                    <a href="services2.html" class="btn1">BOOK</a>
                                </td>
                            </tr>


                            <tr>
                                <td></td>
                                <td>16.00 - 17.00</td>
                                <td>
                                    FULL
                                </td>
                            </tr>


                            <tr>
                                <td></td>
                                <td>18.00 - 19.00</td>
                                <td>
                                    FULL
                                </td>
                            </tr>

                            <tr>
                                <td></td>
                                <td>19.00 - 20.00</td>
                                <td>
                                    FULL
                                </td>
                            </tr>


                        </tbody>
                    </table>


                </div>
            </label> <!-- Slider__item -->

            <label for="slide-3" class="slider__item slider__item--3 card">
                <div class="slider__item-content">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th colspan="4" style="text-transform: uppercase; text-align: center;padding-top : 20px">
                                <p style="font-size:2vw;color:White; font-family: open-sans;">Hair Stylis | Andrean Louis</p>

                                    Jumat, 20 Juli 2022
                                </th>
                            </tr>
                        </thead>
                        <tbody style="text-align:center">
                            <tr>
                                <td></td>
                                <td>08.00 - 09.00</td>
                                <td>FULL</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>09.00 - 10.00</td>
                                <td>
                                    <a href="services2.html" class="btn1">BOOK</a>
                                </td>
                                <td></td>
                            </tr>

                            <tr>
                                <td></td>
                                <td>10.00 - 11.00</td>
                                <td>
                                    <a href="services2.html" class="btn1">BOOK</a>
                                </td>
                            </tr>

                            <tr>
                                <td></td>
                                <td>11.00 - 12.00</td>
                                <td>
                                    FULL
                                </td>
                            </tr>

                            <tr>
                                <td></td>
                                <td>12.00 - 13.00</td>
                                <td>
                                    <a href="services2.html" class="btn1">BOOK</a>
                                </td>
                            </tr>

                            <tr>
                                <td></td>
                                <td>13.00 - 14.00</td>
                                <td>
                                    <a href="services2.html" class="btn1">BOOK</a>
                                </td>
                            </tr>

                            <tr>
                                <td></td>
                                <td>15.00 - 16.00</td>
                                <td>
                                    <a href="services2.html" class="btn1">BOOK</a>
                                </td>
                            </tr>

                            <tr>
                                <td></td>
                                <td>16.00 - 17.00</td>
                                <td>
                                    <a href="services2.html" class="btn1">BOOK</a>
                                </td>
                            </tr>


                            <tr>
                                <td></td>
                                <td>16.00 - 17.00</td>
                                <td>
                                    FULL
                                </td>
                            </tr>


                            <tr>
                                <td></td>
                                <td>18.00 - 19.00</td>
                                <td>
                                    FULL
                                </td>
                            </tr>

                            <tr>
                                <td></td>
                                <td>19.00 - 20.00</td>
                                <td>
                                    FULL
                                </td>
                            </tr>


                        </tbody>
                    </table>
                </div>
            </label> <!-- Slider__item -->

            

        </div> <!-- Slider Holder -->



    </section> <!-- Section Slider -->

</section>

        <!--? About Area Start -->
        <section class="about-area section-padding30 position-relative" style="padding-top:50px">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-11">
                        <!-- about-img -->
                        <div class="about-img ">
                            <img src="assets/img/gallery/about.png" alt="">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="about-caption">
                            <!-- Section Tittle -->
                            <div class="section-tittle section-tittle3 mb-35">
                                <span>About Our company</span>
                                <h2>52 Years Of Experience In Hair cut!</h2>
                            </div>
                            <p class="mb-30 pera-bottom">Brook presents your services with flexible, convenient and cdpoe layouts. You can select your favorite layouts & elements for cular ts with unlimited ustomization possibilities. Pixel-perfreplication of the designers is intended.</p>
                            <p class="pera-top mb-50">Brook presents your services with flexible, convefnient and ent anipurpose layouts. You can select your favorite.</p> 
                        </div>
                    </div>
                </div>
            </div>
            <!-- About Shape -->
            <div class="about-shape">
                <div class="header-right-btn f-right d-none d-lg-block ml-30">
                                    <a href="from.html" class="btn header-btn">Book Now</a>
                                </div>
            </div>
        </section>
        <!-- About-2 Area End -->
        <!--? Services Area Start -->
        <section class="service-area pb-170" style="background-color:black">
            <div class="container">
                <!-- Section Tittle -->
                <div class="row d-flex justify-content-center">
                    <div class="col-xl-7 col-lg-8 col-md-11 col-sm-11">
                        <div class="section-tittle text-center mb-90">
                            <span style="color:#d19f68; padding-top:50px">Professional Services</span>
                            <h3 style="color:white; font-size:30px">Our Best services that  we offering to you</h3>
                        </div>
                    </div>
                </div>
                <!-- Section caption -->
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="services-caption text-center mb-30">
                            <div class="service-icon">
                                <i class="flaticon-healthcare-and-medical"></i>
                            </div> 
                            <div class="service-cap">
                                <h4><a href="#">Stylish Hair Cut</a></h4>
                                <p>Sorem spsum dolor sit amsectetur adipisclit, seddo eiusmod tempor incididunt ut laborea.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="services-caption active text-center mb-30">
                            <div class="service-icon">
                                <i class="flaticon-fitness"></i>
                            </div> 
                            <div class="service-cap">
                                <h4><a href="#">Body Massege</a></h4>
                                <p>Sorem spsum dolor sit amsectetur adipisclit, seddo eiusmod tempor incididunt ut laborea.</p>
                            </div>
                        </div>
                    </div> 
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="services-caption text-center mb-30">
                            <div class="service-icon">
                                <i class="flaticon-clock"></i>
                            </div> 
                            <div class="service-cap">
                                <h4><a href="#">Breard Style</a></h4>
                                <p>Sorem spsum dolor sit amsectetur adipisclit, seddo eiusmod tempor incididunt ut laborea.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Services Area End -->
		
	 
		<section class="video-image img" style="background-image: url(Doc/img/bg_3.jpg);">
<div class="overlay-2"></div>
<div class="overlay"></div>
<div class="container">
<div class="row justify-content-center align-items-center wrap-video">
<div class="col-md-6 text-center">
<a href="https://vimeo.com/45830194" class="icon-video popup-vimeo d-flex align-items-center justify-content-center mb-4">
<span class="fa fa-play"></span>
</a>
<h3>Watch Our Video <br><span>Popular</span> Hair Style</h3>
</div>
</div>
</div>
</section>


        <!--? Team Start -->
        <div class="team-area pb-180" style="padding-top:50px">
            <div class="container">
                <!-- Section Tittle -->
                <div class="row justify-content-center">
                    <div class="col-xl-8 col-lg-8 col-md-11 col-sm-11">
                        <div class="section-tittle text-center mb-100">
                            <span>Professional Teams</span>
                            <h2>Our award winner hair cut exparts for you</h2>
                        </div>
                    </div>
                </div>
                <div class="row team-active dot-style">
                    <!-- single Tem -->
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-">
                        <div class="single-team mb-80 text-center">
                            <div class="team-img">
                                <img src="assets/img/gallery/team1.png" alt="">
                            </div>
                            <div class="team-caption">
                                <span>Master Barber</span>
                                <h3><a href="#">Guy C. Pulido bks</a></h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-">
                        <div class="single-team mb-80 text-center">
                            <div class="team-img">
                                <img src="assets/img/gallery/team2.png" alt="">
                            </div>
                            <div class="team-caption">
                                <span>Color Expart</span>
                                <h3><a href="#">Steve L. Nolan</a></h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-">
                        <div class="single-team mb-80 text-center">
                            <div class="team-img">
                                <img src="assets/img/gallery/team3.png" alt="">
                            </div>
                            <div class="team-caption">
                                <span>Master Barber</span>
                                <h3><a href="#">Edgar P. Mathis</a></h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-">
                        <div class="single-team mb-80 text-center">
                            <div class="team-img">
                                <img src="assets/img/gallery/team2.png" alt="">
                            </div>
                            <div class="team-caption">
                                <span>Master Barber</span>
                                <h3><a href="#">Edgar P. Mathis</a></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Team End -->
		
		
		
		
			<section class="video-image img" style="height:300px; background-image: url(Doc/img/bg_3.jpg);">
<div class="overlay-2"></div>
<div class="overlay"></div>
<div class="container">
<div style="height:300px;" class="row justify-content-center align-items-center wrap-video">
<div class="col-md-6 text-center">
 
<h4 style="font-family:MedievalSharp; font-size:25px; color:white">Lets Get Our Product</h4>
<br>
<h3 style="font-family:Microsoft Tai Le">Our Product<hr style="margin:auto; border-bottom:4px solid #eceff8; width:150px"></h3>
</div>
</div>
</div>
</section>


  <style>
				@import url('https://fonts.googleapis.com/css?family=Raleway|Roboto&display=swap');
 

                .container{
                margin-top: 50px;
                }

                h1, .card-title, a, #toast{
                font-family: 'Roboto', sans-serif;
                }

                h1{
                color: #5C7CFA;
                }

                .card{
                box-shadow: 0px 15px 35px -5px rgba(50, 88, 130, 0.32);
                border-radius: 15px;
                transition: transform .2s;
                }

                .card-body{
                padding: 10px;
                margin-top: -50px;
                -webkit-transition: all 1s ease;
                -moz-transition: all 1s ease;
                -o-transition: all 1s ease;
                transition: all 1s ease-in-out;
                }

                .heart{
                color: #989898;
                margin-top: 15px;
                margin-left: 230px;
                font-size: 30px;
                position: absolute;
                width: 40px;
                height: 40px;
                border-radius: 30px;
                padding: 0px;
                text-align: center;
                cursor: pointer;
                }

                .heart-active{
                color: #C50707;
                }

                .heart:hover{
                color: red;
                background-color: #f9f9f9;
                -webkit-transition: all 1s ease;
                -moz-transition: all 1s ease;
                -o-transition: all 1s ease;
                transition: all 1s ease-in-out;
                }

                .card-body a{
                visibility: hidden;
                }

                .card:hover > .card-body{
                margin-top: -0px;
                -webkit-transition: all 1s ease;
                -moz-transition: all 1s ease;
                -o-transition: all 1s ease;
                transition: all 1s ease;
                }

                .card:hover{
                transform: scale(1.02);
                }

                .card:hover > .card-body > a{
                visibility: visible;
                }

                .first-image{
                width: 100%;
                border-top-left-radius: 15px;
                border-top-right-radius: 15px;
                }

                .cart, .wish{
                padding: 5px;
                width: 50px;
                height: 50px;
                margin-left: -24px;
                margin-top: 0px;
                margin-right: 3px;
                background-color: #fff;
                color: #5C7CFA;
                border-top-left-radius: 8px;
                border-bottom-left-radius: 8px;
                text-align: center;
                -ms-display: flex;
                display: flex;
                align-items: center;
                justify-content: center;
                }

                .wish{
                color: #C50707;
                }

                #toast, #toast-cart{
                padding: 10px;
                padding-left: 5px;
                position: fixed;
                width: 230px;
                height: 50px;
                top: 0;
                left: 80%;
                transform:translate(-50%);
                background-color: #EFF2FF;
                color: #76777E;
                padding: 1px;
                border-radius: 8px;
                text-align:center;
                z-index: 1;
                box-shadow: 0 0 20px rgba(0,0,0,0.3);
                visibility: hidden;
                opacity: 0;
                -ms-display: flex;
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 18px;
                }
                #toast.show, #toast-cart.show{
                visibility:visible;
                animation:fadeInOut 3s;
                }

                @keyframes fadeInOut{
                5%,95%{opacity:1;top:50px}
                15%,85%{opacity:1;top:30px}
                }

                a{
                z-index: -1;
                }
				</style>

                

<section class="blog_area section-padding">
  <div class="container">
    <div class="row">


    <div class="col">
    <div class="card">
      
  <img src="https://images.unsplash.com/photo-1565208565380-02138793c3b0?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=634&q=80" class="first-image">
      <div class="card-body" style="margin-left: 20px;">
        <a href="detail_product.html" style="color:black" onclick="addCart()">
          <center>View More</center>
        </a>
        <hr>
      
      
        <h5 style="font-size:18px; text-align:left; margin-left:15px; margin-bottom:10px" class="card-title"><b>NUTRI CARE
            SHAMPOO</b> <B style="background:GREEN; Color:white ;border-radius:10%;padding-left:10px; 
                  padding-right:10px; padding-top: 5px; padding-bottom: 5px;">new</B></h5>
        <p style="font-size:12px; text-align:left; margin-left:15px; line-height:18px; margin-bottom:0px">SHAMPOO CATEGORY
        </p>
        <p style="font-size:12px; text-align:left; margin-left:15px; line-height:18px;margin-bottom:0px">
          <span>&#10024;</span>
          <span>&#10024;</span>
          <span>&#10024;</span>
        </p>
      
        <p style="font-size:12px; text-align:left; margin-left:15px;">STOCK <B style="background:red;color:white; margin-left : 10px; border-radius:100%;padding-left:10px; 
        padding-right:10px; padding-top: 5px; padding-bottom: 5px;">3</B></p>
        </center>
        <div class="row" style="margin-bottom:10px">
          <div class="col-md-6"  style="margin-bottom:30px">
            <b
              style="background-color: #11E95B; padding: 10px 20px 10px; margin-top: 10px; border-radius: 0px 20px 0px 20px; color:white;">Rp.
              27.000</b>
          </div>

          <br>
          <div class="col-md-6">
            <a href="#" style="visibility: visible;" onclick="addCart()">
              <b style="background-color: #C50707; padding: 10px 50px 10px; margin-top: 10px; color:white;">
                Beli</b>
            </a>
          </div>
        </div>
      </div>
</div>

</div>


 <div class="col">
    <div class="card">
      
  <img src="https://images.unsplash.com/photo-1565208565380-02138793c3b0?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=634&q=80" class="first-image">
      <div class="card-body" style="margin-left: 20px;">
        <a href="detail_product.html" style="color:black" onclick="addCart()">
          <center>View More</center>
        </a>
        <hr>
      
      
        <h5 style="font-size:18px; text-align:left; margin-left:15px; margin-bottom:10px" class="card-title"><b>NUTRI CARE
            SHAMPOO</b> <B style="background:GREEN; Color:white ;border-radius:10%;padding-left:10px; 
                  padding-right:10px; padding-top: 5px; padding-bottom: 5px;">new</B></h5>
        <p style="font-size:12px; text-align:left; margin-left:15px; line-height:18px; margin-bottom:0px">SHAMPOO CATEGORY
        </p>
        <p style="font-size:12px; text-align:left; margin-left:15px; line-height:18px;margin-bottom:0px">
          <span>&#10024;</span>
          <span>&#10024;</span>
          <span>&#10024;</span>
        </p>
      
        <p style="font-size:12px; text-align:left; margin-left:15px;">STOCK <B style="background:red;color:white; margin-left : 10px; border-radius:100%;padding-left:10px; 
        padding-right:10px; padding-top: 5px; padding-bottom: 5px;">3</B></p>
        </center>
        <div class="row" style="margin-bottom:10px">
          <div class="col-md-6" style="margin-bottom:30px">
            <b
              style="background-color: #11E95B; padding: 10px 20px 10px; margin-top: 10px; border-radius: 0px 20px 0px 20px; color:white;">Rp.
              27.000</b>
          </div>
          <div class="col-md-6">
            <a href="#" style="visibility: visible;" onclick="addCart()">
              <b style="background-color: #C50707; padding: 10px 50px 10px; margin-top: 10px; color:white;">
                Beli</b>
            </a>
          </div>
        </div>
      </div>
</div>

</div>


       
	  
	      
	</div>
	<br>
	<br>
	<br>
	<center><a href="from.html" class="btn header-btn">More</a>
            </center>
  </div>
    
</section>


 
        <!-- Cut Details Start -->
        <div class="cut-details section-bg section-padding2" data-background="assets/img/gallery/section_bg02.png">
           <div class="container">
            <div class="cut-active dot-style">
                <div class="single-cut">
                    <div class="cut-icon mb-20">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="50px" height="50px">
                            <image  x="0px" y="0px" width="50px" height="50px"  xlink:href="data:img/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAQAAAC0NkA6AAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAAAAmJLR0QA/4ePzL8AAAAHdElNRQfkBQ4MDDIERuyfAAADc0lEQVRYw7WYXWxTZRjH/+e0ikhh7QgfiYJZZ7bhBC6mU0LQ6DBADNGYLEaNJGpi4jTEQczYjQG8EL2ThAUTvTRGBwmECyBA+XRKHJpUL1yXFseWbe1ixgZCSAg/Lmo9bXe+up0+/5vT//Oc9/ee8z7nqwbyGbVqUL2iiuiurmtMKf2tu/52DXtW1OhVtekFRZTSkCY1rYcV0VI1arl+VULH9JvnGLhpHT/wD728z+M22QVs5ksyJOlkgds4zqlWEgzSQQ3uEzF4ju8ZpZsHK4NEOcgo7xL2AFhq4CgDtPmHPEWGg0R9AwrayjD77CY2s/RtsrRXDMhrCSc5wyIvyE6GaJ4lQogQB/idZW6QjxlkxRwQee0lWdoupec0a9uqlauHM8VrYyXqyLIuEIQIcYLPZ0JC/EJnQIh8C4xYDV0wO0hgBAgRm0kxrxhSS46mQBFCHKa7GLKbbwNHiCayRAqQCBMBdVW5etlRgGzjWFUQYgMDGHnIaZfbSIxTWNFP3MGzl0GaViQWMVXoAhv9SGn0O3hO+oLPkHiZ4y5FacrD3nPSJn5GptbrJ7+P+VnERa3VA6bWKFlFyC0NqdFUXOkqQqS06kwt1XhVIeNaZiqqSZeS0z4955jWwrBCuudSskvSRklSTDEXzznuaJ74l/m+rt4Wm3Zt8WxhcYAOU5Na7OuwJ3165RHTlKlhrfQFaZckXfH0ymOFhsNKaZX6POYSU7v2SZJ6XTz7aFJKbKfH9ZxuLLp9pIk5evaKM4ZMndXzrjOJ/7+V0Uv/rYKdZx9tOi8Jg3HqPY+kn66iGdt59jrMe/nnyX52V+mhVcsNFuchLWQqeH+vRB9xCBVeJC7xZhUQYTKstyBb+JNQ4JB3OJvfKhgJPggYEeEaz5ZCmpgI4H2+WD18Xdi2zG4uBbj8r5GxvtUs2+AE+wNCrCZHq/W7OBUlya4AEI9yjbeKnfL0VbrmiIgzyCelXnnJI/zBV3NYm6cZoaPcnVkW4yQXZtVpBp1keWVmxq7YpIsc2ys8nmbOc5k6u5zTLqtIkOQNn/eBer4hx4eY9nm3XbdwkTSfun67PEQ7R8ixh1rnKsPj/64WbdPrmtI5XdGAruqGrmu+IlquBj2hDXpGl/WdDumm2yBeEEky9KRe1Go16jFFFNVt3dSEUvpLfbqgae8B7gNdcvnkrRzZ4gAAAABJRU5ErkJggg==" />
                        </svg>
                    </div>
                    <div class="cut-descriptions">
                        <p>Vestibulum varius, velit sit amet tempor efficitur, ligula mi lacinia libero, vehicula dui nisi eget purus. Integer cursus nibh non risus maximus dictum. Suspendis.</p>
                        <span>JONT NICOLIN KOOK</span>
                    </div>
                </div>
                <div class="single-cut">
                    <div class="cut-icon mb-20">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="50px" height="50px">
                            <image  x="0px" y="0px" width="50px" height="50px"  xlink:href="data:img/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAQAAAC0NkA6AAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAAAAmJLR0QA/4ePzL8AAAAHdElNRQfkBQ4MDDIERuyfAAADc0lEQVRYw7WYXWxTZRjH/+e0ikhh7QgfiYJZZ7bhBC6mU0LQ6DBADNGYLEaNJGpi4jTEQczYjQG8EL2ThAUTvTRGBwmECyBA+XRKHJpUL1yXFseWbe1ixgZCSAg/Lmo9bXe+up0+/5vT//Oc9/ee8z7nqwbyGbVqUL2iiuiurmtMKf2tu/52DXtW1OhVtekFRZTSkCY1rYcV0VI1arl+VULH9JvnGLhpHT/wD728z+M22QVs5ksyJOlkgds4zqlWEgzSQQ3uEzF4ju8ZpZsHK4NEOcgo7xL2AFhq4CgDtPmHPEWGg0R9AwrayjD77CY2s/RtsrRXDMhrCSc5wyIvyE6GaJ4lQogQB/idZW6QjxlkxRwQee0lWdoupec0a9uqlauHM8VrYyXqyLIuEIQIcYLPZ0JC/EJnQIh8C4xYDV0wO0hgBAgRm0kxrxhSS46mQBFCHKa7GLKbbwNHiCayRAqQCBMBdVW5etlRgGzjWFUQYgMDGHnIaZfbSIxTWNFP3MGzl0GaViQWMVXoAhv9SGn0O3hO+oLPkHiZ4y5FacrD3nPSJn5GptbrJ7+P+VnERa3VA6bWKFlFyC0NqdFUXOkqQqS06kwt1XhVIeNaZiqqSZeS0z4955jWwrBCuudSskvSRklSTDEXzznuaJ74l/m+rt4Wm3Zt8WxhcYAOU5Na7OuwJ3165RHTlKlhrfQFaZckXfH0ymOFhsNKaZX6POYSU7v2SZJ6XTz7aFJKbKfH9ZxuLLp9pIk5evaKM4ZMndXzrjOJ/7+V0Uv/rYKdZx9tOi8Jg3HqPY+kn66iGdt59jrMe/nnyX52V+mhVcsNFuchLWQqeH+vRB9xCBVeJC7xZhUQYTKstyBb+JNQ4JB3OJvfKhgJPggYEeEaz5ZCmpgI4H2+WD18Xdi2zG4uBbj8r5GxvtUs2+AE+wNCrCZHq/W7OBUlya4AEI9yjbeKnfL0VbrmiIgzyCelXnnJI/zBV3NYm6cZoaPcnVkW4yQXZtVpBp1keWVmxq7YpIsc2ys8nmbOc5k6u5zTLqtIkOQNn/eBer4hx4eY9nm3XbdwkTSfun67PEQ7R8ixh1rnKsPj/64WbdPrmtI5XdGAruqGrmu+IlquBj2hDXpGl/WdDumm2yBeEEky9KRe1Go16jFFFNVt3dSEUvpLfbqgae8B7gNdcvnkrRzZ4gAAAABJRU5ErkJggg==" />
                        </svg>
                    </div>
                    <div class="cut-descriptions">
                        <p>Vestibulum varius, velit sit amet tempor efficitur, ligula mi lacinia libero, vehicula dui nisi eget purus. Integer cursus nibh non risus maximus dictum. Suspendis.</p>
                        <span>JONT NICOLIN KOOK</span>
                    </div>
                </div>
                <div class="single-cut">
                    <div class="cut-icon mb-20">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="50px" height="50px">
                            <image  x="0px" y="0px" width="50px" height="50px"  xlink:href="data:img/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAQAAAC0NkA6AAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAAAAmJLR0QA/4ePzL8AAAAHdElNRQfkBQ4MDDIERuyfAAADc0lEQVRYw7WYXWxTZRjH/+e0ikhh7QgfiYJZZ7bhBC6mU0LQ6DBADNGYLEaNJGpi4jTEQczYjQG8EL2ThAUTvTRGBwmECyBA+XRKHJpUL1yXFseWbe1ixgZCSAg/Lmo9bXe+up0+/5vT//Oc9/ee8z7nqwbyGbVqUL2iiuiurmtMKf2tu/52DXtW1OhVtekFRZTSkCY1rYcV0VI1arl+VULH9JvnGLhpHT/wD728z+M22QVs5ksyJOlkgds4zqlWEgzSQQ3uEzF4ju8ZpZsHK4NEOcgo7xL2AFhq4CgDtPmHPEWGg0R9AwrayjD77CY2s/RtsrRXDMhrCSc5wyIvyE6GaJ4lQogQB/idZW6QjxlkxRwQee0lWdoupec0a9uqlauHM8VrYyXqyLIuEIQIcYLPZ0JC/EJnQIh8C4xYDV0wO0hgBAgRm0kxrxhSS46mQBFCHKa7GLKbbwNHiCayRAqQCBMBdVW5etlRgGzjWFUQYgMDGHnIaZfbSIxTWNFP3MGzl0GaViQWMVXoAhv9SGn0O3hO+oLPkHiZ4y5FacrD3nPSJn5GptbrJ7+P+VnERa3VA6bWKFlFyC0NqdFUXOkqQqS06kwt1XhVIeNaZiqqSZeS0z4955jWwrBCuudSskvSRklSTDEXzznuaJ74l/m+rt4Wm3Zt8WxhcYAOU5Na7OuwJ3165RHTlKlhrfQFaZckXfH0ymOFhsNKaZX6POYSU7v2SZJ6XTz7aFJKbKfH9ZxuLLp9pIk5evaKM4ZMndXzrjOJ/7+V0Uv/rYKdZx9tOi8Jg3HqPY+kn66iGdt59jrMe/nnyX52V+mhVcsNFuchLWQqeH+vRB9xCBVeJC7xZhUQYTKstyBb+JNQ4JB3OJvfKhgJPggYEeEaz5ZCmpgI4H2+WD18Xdi2zG4uBbj8r5GxvtUs2+AE+wNCrCZHq/W7OBUlya4AEI9yjbeKnfL0VbrmiIgzyCelXnnJI/zBV3NYm6cZoaPcnVkW4yQXZtVpBp1keWVmxq7YpIsc2ys8nmbOc5k6u5zTLqtIkOQNn/eBer4hx4eY9nm3XbdwkTSfun67PEQ7R8ixh1rnKsPj/64WbdPrmtI5XdGAruqGrmu+IlquBj2hDXpGl/WdDumm2yBeEEky9KRe1Go16jFFFNVt3dSEUvpLfbqgae8B7gNdcvnkrRzZ4gAAAABJRU5ErkJggg==" />
                        </svg>
                    </div>
                    <div class="cut-descriptions">
                        <p>Vestibulum varius, velit sit amet tempor efficitur, ligula mi lacinia libero, vehicula dui nisi eget purus. Integer cursus nibh non risus maximus dictum. Suspendis.</p>
                        <span>JONT NICOLIN KOOK</span>
                    </div>
                </div>
            </div>
           </div>
        </div>
        <!-- Cut Details End -->
        <!--? Blog Area Start -->
 


 <!-- Blog Area End -->
    </main>
    <footer>
        <!--? Footer Start-->
        <div class="footer-area section-bg" data-background="assets/img/gallery/footer_bg.png">
            <div class="container">
                <div class="footer-top footer-padding">
                    <div class="row d-flex justify-content-between">
                        <div class="col-xl-3 col-lg-4 col-md-5 col-sm-8">
                            <div class="single-footer-caption mb-50">
                                <!-- logo -->
                                <div class="footer-logo">
                                    <a href="index.html"><img src="assets/img/logo/logo2_footer.png" alt=""></a>
                                </div>
                                <div class="footer-tittle">
                                    <div class="footer-pera">
                                        <p class="info1">Receive updates and latest news direct from Simply enter.</p>
                                    </div>
                                </div>
                                <div class="footer-number">
                                    <h4><span>+564 </span>7885 3222</h4>
                                    <p>youremail@gmail.com</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-3 col-sm-5">
                            <div class="single-footer-caption mb-50">
                                <div class="footer-tittle">
                                    <h4>Location </h4>
                                    <ul>
                                        <li><a href="#">Advanced</a></li>
                                        <li><a href="#"> Management</a></li>
                                        <li><a href="#">Corporate</a></li>
                                        <li><a href="#">Customer</a></li>
                                        <li><a href="#">Information</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-3 col-sm-5">
                            <div class="single-footer-caption mb-50">
                                <div class="footer-tittle">
                                    <h4>Explore</h4>
                                    <ul>
                                        <li><a href="#">Cookies</a></li>
                                        <li><a href="#">About</a></li>
                                        <li><a href="#">Privacy Policy</a></li>
                                        <li><a href="#">Proparties</a></li>
                                        <li><a href="#">Licenses</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-8">
                            <div class="single-footer-caption mb-50">
                                <div class="footer-tittle">
                                    <h4>Location</h4>
                                    <div class="footer-pera">
                                        <p class="info1">Subscribe now to get daily updates</p>
                                    </div>
                                </div>
                                <!-- Form -->
                                <div class="footer-form">
                                    <div id="mc_embed_signup">
                                        <form target="_blank" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01" method="get" class="subscribe_form relative mail_part" novalidate="true">
                                            <input type="email" name="EMAIL" id="newsletter-form-email" placeholder=" Email Address " class="placeholder hide-on-focus" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your email address'">
                                            <div class="form-icon">
                                                <button type="submit" name="submit" id="newsletter-submit" class="email_icon newsletter-submit button-contactForm">Send</button>
                                            </div>
                                            <div class="mt-10 info"></div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer-bottom">
                    <div class="row d-flex justify-content-between align-items-center">
                        <div class="col-xl-9 col-lg-8">
                            <div class="footer-copy-right">
                                <p><!-- Link back to bikinaplikasi can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://bikinaplikasi.com" target="_blank">bikinaplikasi</a>
  <!-- Link back to bikinaplikasi can't be removed. Template is licensed under CC BY 3.0. --></p>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4">
                            <!-- Footer Social -->
                            <div class="footer-social f-right">
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="https://www.facebook.com/sai4ull"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fas fa-globe"></i></a>
                                <a href="#"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End-->
    </footer>
    <!-- Scroll Up -->
    <div id="back-top" >
        <a title="Go to Top" href="#"> <i style="color:White" class="fas fa-level-up-alt"></i></a>
    </div>

    <style>
        .float{
            position:fixed;
            width:60px;
            height:60px;
            bottom:60px;
            right:auto;
            background-color:#25d366;
            color:#FFF;
            border-radius:50px;
            text-align:center;
        font-size:30px;
            box-shadow: 2px 2px 3px #999;
        z-index:100;
        }

        .my-float{
            margin-top:16px;
        }
    </style>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <a href="https://api.whatsapp.com/send?phone=51955081075&text=Hola%21%20Quisiera%20m%C3%A1s%20informaci%C3%B3n%20sobre%20Varela%202."
        class="float" target="_blank">
        <i class="fa fa-whatsapp my-float"></i>
    </a>

    <!-- JS here -->

    
<Script>
    $(document).ready(function () {
    var index = 1;

    $("#next").click(function () {
        if (index == 0) {
        $(".card").eq(0).removeClass("left").addClass("right");
        $(".card").eq(1).removeClass("right").addClass("front");
        $(".card").eq(2).removeClass("front").addClass("left");

        index = 2;
        } else if (index == 1) {
        $(".card").eq(0).removeClass("front").addClass("left");
        $(".card").eq(1).removeClass("left").addClass("right");
        $(".card").eq(2).removeClass("right").addClass("front");

        index = 0;
        } else if (index == 2) {
        $(".card").eq(0).removeClass("right").addClass("front");
        $(".card").eq(1).removeClass("front").addClass("left");
        $(".card").eq(2).removeClass("left").addClass("right");

        index = 1;
        }
    });

    $("#prev").click(function () {
        if (index == 0) {
        $(".card").eq(0).removeClass("left").addClass("front");
        $(".card").eq(1).removeClass("right").addClass("left");
        $(".card").eq(2).removeClass("front").addClass("right");

        index = 1;
        } else if (index == 1) {
        $(".card").eq(0).removeClass("front").addClass("right");
        $(".card").eq(1).removeClass("left").addClass("front");
        $(".card").eq(2).removeClass("right").addClass("left");

        index = 2;
        } else if (index == 2) {
        $(".card").eq(0).removeClass("right").addClass("left");
        $(".card").eq(1).removeClass("front").addClass("right");
        $(".card").eq(2).removeClass("left").addClass("front");

        index = 0;
        }
    });
    });

</script> 
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="./assets/js/vendor/modernizr-3.5.0.min.js"></script>
    <!-- Jquery, Popper, Bootstrap -->
    <script src="./assets/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="./assets/js/popper.min.js"></script>
    <script src="./assets/js/bootstrap.min.js"></script>
    <!-- Jquery Mobile Menu -->
    <script src="./assets/js/jquery.slicknav.min.js"></script>

    <!-- Jquery Slick , Owl-Carousel Plugins -->
    <script src="./assets/js/owl.carousel.min.js"></script>
    <script src="./assets/js/slick.min.js"></script>
    <!-- One Page, Animated-HeadLin -->
    <script src="./assets/js/wow.min.js"></script>
    <script src="./assets/js/animated.headline.js"></script>
    <script src="./assets/js/jquery.magnific-popup.js"></script>

    <!-- Date Picker -->
    <script src="./assets/js/gijgo.min.js"></script>
    <!-- Nice-select, sticky -->
    <script src="./assets/js/jquery.nice-select.min.js"></script>
    <script src="./assets/js/jquery.sticky.js"></script>
    
    <!-- counter , waypoint,Hover Direction -->
    <script src="./assets/js/jquery.counterup.min.js"></script>
    <script src="./assets/js/waypoints.min.js"></script>
    <script src="./assets/js/jquery.countdown.min.js"></script>
    <script src="./assets/js/hover-direction-snake.min.js"></script>

    <!-- contact js -->
    <script src="./assets/js/contact.js"></script>
    <script src="./assets/js/jquery.form.js"></script>
    <script src="./assets/js/jquery.validate.min.js"></script>
    <script src="./assets/js/mail-script.js"></script>
    <script src="./assets/js/jquery.ajaxchimp.min.js"></script>
    
    <!-- Jquery Plugins, main Jquery -->	
    <script src="./assets/js/plugins.js"></script>
    <script src="./assets/js/main.js"></script>

    <Script>(function () {

            $("#cart").on("click", function () {
                $(".shopping-cart").fadeToggle("fast");
            });

        })();</Script>
    
    </body>
</html>