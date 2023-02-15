<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Cake Template">
    <meta name="keywords" content="Cake, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME') }} - {{ env('APP_OBJECT_NAME') }}</title>

    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700;800;900&amp;display=swap"
          rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&amp;display=swap"
          rel="stylesheet">

    <link rel="stylesheet"
          href="css/index.css"
          type="text/css"/>
</head>
<body>
<div id="preloder">

    <div class="loader"></div>
</div>

<div class="offcanvas-menu-overlay"></div>
<div class="offcanvas-menu-wrapper">
    <div class="offcanvas__cart">
        <div class="offcanvas__cart__links">
            <a href="#" class="search-switch"><img src="img/icon/xsearch.png.pagespeed.ic.NrSaEUKi1m.png" alt=""></a>
            <a href="#"><img src="img/icon/xheart.png.pagespeed.ic.B5dSdwmEBE.png" alt=""></a>
        </div>
        <div class="offcanvas__cart__item">
            <a href="{{ url('cart') }}"><img src="img/icon/xcart.png.pagespeed.ic.WikqAOP_Xe.png" alt=""> <span
                    class="cart-jumlah">0</span></a>
            <div class="cart__price">Cart: <span class="cart-total-rupiah">Rp0</span></div>
        </div>
    </div>
    <div class="offcanvas__logo">
        <a href="{{ url('/') }}">
            <h4 style="color: #5c332d !important;">{{ env('APP_OBJECT_NAME') }}</h4>
        </a>
    </div>
    <div id="mobile-menu-wrap"></div>
    <div class="offcanvas__option">
        <ul>
            <li><a href="{{ url('login') }}">Login</a> <span class="arrow_carrot-down"></span></li>
        </ul>
    </div>
</div>


<header class="header">
    <div class="header__top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="header__top__inner">
                        <div class="header__top__left">
                            <ul>
                                <li><a href="{{ route('login') }}">Login</a></li>
                            </ul>
                        </div>
                        <div class="header__logo">
                            <a href="{{ url('/') }}"><h4 style="color: #5c332d !important;">{{ env('APP_OBJECT_NAME') }}</h4></a>
                        </div>
                        <div class="header__top__right">
                            <div class="header__top__right__cart">
                                <a href="{{ url('cart') }}"><img src="img/icon/xcart.png.pagespeed.ic.WikqAOP_Xe.png"
                                                                 alt="">
                                    <span class="cart-jumlah">0</span></a>
                                <div class="cart__price">Cart: <span class="cart-total-rupiah">Rp0</span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="canvas__open"><i class="fa fa-bars"></i></div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <nav class="header__menu mobile-menu">
                    <ul>
                        <li class="active"><a href="{{ url('') }}/#">Home</a></li>
                        <li><a href="{{ url('') }}/#tentang">Tentang</a></li>

                        <li><a href="{{ url('') }}/#kontak">Kontak</a></li>
                        <li><a href="{{ url('qrcode') }}">Qr Code</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</header>


@yield('content')

<footer class="footer set-bg" data-setbg="img/footer-bg.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="footer__widget">
                    <h6>JAM KERJA</h6>
                    <ul>
                        <li>Senin - Jumat: 08:00 – 16:00</li>
                        <li>Sabtu: 08:00 - 16:30</li>
                        <li>Minggu: <strong>Libur</strong></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="footer__about" id="kontak">
                    <div class="footer__logo">
                        <a  href="{{ url('/') }}"><h4 style="color: white;">{{ env('APP_OBJECT_NAME') }}</h4></a>
                    </div>
                    <p>{{ env('APP_OBJECT_DESCRIPTION') }}</p>
                    <div class="footer__social">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-instagram"></i></a>
                        <a href="#"><i class="fa fa-youtube-play"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="footer__newslatter">
                    <h6>Subscribe</h6>
                    <p>Dapatkan berita terbaru tentang kami.</p>
                    <form action="#">
                        <input type="text" placeholder="Email">
                        <button type="submit"><i class="fa fa-send-o"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <p class="copyright__text text-white">
                        Copyright &copy;<script data-cfasync="false"
                                                src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
                        <script>document.write(new Date().getFullYear());</script>
                        All rights reserved | Made with <i class="fa fa-heart" aria-hidden="true"></i>
                    </p>
                </div>
                <div class="col-lg-5">
                    <div class="copyright__widget">
                        <ul>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Terms & Conditions</a></li>
                            <li><a href="#">Site Map</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>


<div class="search-model">
    <div class="h-100 d-flex align-items-center justify-content-center">
        <div class="search-close-switch">+</div>
        <form class="search-model-form">
            <input type="text" id="search-input" placeholder="Search here.....">
        </form>
    </div>
</div>


<script src="js/jquery-3.3.1.min.js"></script>
<script
    src="js/bootstrap.min.js%2bjquery.nice-select.min.js%2bjquery.barfiller.js%2bjquery.magnific-popup.min.js.pagespeed.jc.2i8oRofkTE.js"></script>
<script>eval(mod_pagespeed_bn_O6PYOiT);</script>
<script>eval(mod_pagespeed_rlBdYap1O3);</script>
<script>eval(mod_pagespeed_4nsqOyHz4N);</script>
<script>eval(mod_pagespeed_MzGhsBPcyU);</script>
<script src="js/jquery.slicknav.js%2bowl.carousel.min.js.pagespeed.jc.ZkW2f5-xTF.js"></script>
<script>eval(mod_pagespeed_mUtJ3IVbac);</script>
<script>eval(mod_pagespeed_VQycfQPz1E);</script>
<script src="js/jquery.nicescroll.min.js"></script>
<script src="js/main.js"></script>

<script src="{{ url('') }}/js/sweetalert.min.js" type="text/javascript"></script>

<style>
    .swal-button.swal-button--confirm {
        background-color: #5c332d !important;
    }
</style>

@if(session()->has('error'))
    <script>
        swal({
            type: 'error',
            timer: 3000,
            icon: 'error',
            showConfirmButton: false,
            text: "{{ session()->get('error') }}"
        });
    </script>
@endif

@if(session()->has('success'))
    <script>
        swal({
            type: 'success',
            timer: 3000,
            icon: 'success',
            showConfirmButton: false,
            text: "{{ session()->get('success') }}"
        });
    </script>
@endif

<script>
    $(document).ready(function () {

        $('#update-cart').click(function () {
            $.ajax({
                url: "{{ url('update-cart') }}",
                data: $('#cart').serialize(),
                success: (response) => {
                    ''
                }
            });
        });


        $.ajax({
            url: "{{ url('get-cart') }}",
            success: (response) => {
                $('.cart-total-rupiah').text(response.cart_total);
                $('.cart-jumlah').text(response.jumlah);
            }
        })

        $('.cart_add').click(function () {

            This = $(this);

            swal({
                content: {
                    element: "input",
                    attributes: {
                        placeholder: "Jumlah",
                        type: "number",
                        max: 10,
                        min: 1,
                        required: 'required',
                        value: 1,
                        id: "jumlah-pilih"
                    }, cancel: {
                        text: "Batal",
                        value: null,
                        visible: true,
                        className: "",
                        closeModal: true,
                    }
                }
            }).then((data) => {

                data = {
                    id: This.data('id'),
                    jumlah: $('#jumlah-pilih').val()
                };

                if (parseInt($('#jumlah-pilih').val()) < 1) {
                    swal({
                        type: 'error',
                        timer: 1000,
                        icon: 'error',
                        showConfirmButton: false,
                        text: "Jumlah kurang!"
                    });
                } else if (parseInt($('#jumlah-pilih').val()) > 0) {

                    $.ajax({
                        url: "{{ url('add-to-cart') }}",
                        data: data,
                        success: (response) => {

                            if (response.error) {
                                swal({
                                    type: 'error',
                                    timer: 1000,
                                    icon: 'error',
                                    showConfirmButton: false,
                                    text: response.message
                                });

                                return;
                            }

                            swal({
                                type: 'success',
                                timer: 1000,
                                icon: 'success',
                                showConfirmButton: false,
                                showCancelButton: false,
                                text: "Berhasil ditambahkan"
                            });

                            $('.cart-total-rupiah').text(response.cart_total);
                            $('.cart-jumlah').text(response.jumlah);
                        }
                    })

                }
            });
        });
    })

</script>

</body>

</html>
