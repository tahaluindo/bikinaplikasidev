<!doctype html>
<html class="no-js" lang="en">

<head>
    <!-- META DATA -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!--font-family-->
    <link href="https://fonts.googleapis.com/css?family=Rufina:400,700" rel="stylesheet"/>

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet"/>

    <!-- TITLE OF SITE -->
    <title>Travel</title>

    <!-- favicon img -->
    <link rel="shortcut icon" type="image/icon" href="<?php echo e(url('')); ?>/assets/logo/favicon.png"/>

    <!--font-awesome.min.css-->
    <link rel="stylesheet" href="<?php echo e(url('')); ?>/assets/css/font-awesome.min.css"/>

    <!--animate.css-->
    <link rel="stylesheet" href="<?php echo e(url('')); ?>/assets/css/animate.css"/>

    <!--hover.css-->
    <link rel="stylesheet" href="<?php echo e(url('')); ?>/assets/css/hover-min.css">

    <!--datepicker.css-->
    <link rel="stylesheet" href="<?php echo e(url('')); ?>/assets/css/datepicker.css">

    <!--owl.carousel.css-->
    <link rel="stylesheet" href="<?php echo e(url('')); ?>/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo e(url('')); ?>/assets/css/owl.theme.default.min.css"/>

    <!-- range css-->
    <link rel="stylesheet" href="<?php echo e(url('')); ?>/assets/css/jquery-ui.min.css"/>

    <!--bootstrap.min.css-->
    <link rel="stylesheet" href="<?php echo e(url('')); ?>/assets/css/bootstrap.min.css"/>

    <!-- bootsnav -->
    <link rel="stylesheet" href="<?php echo e(url('')); ?>/assets/css/bootsnav.css"/>

    <!--style.css-->
    <link rel="stylesheet" href="<?php echo e(url('')); ?>/assets/css/style.css"/>

    <!--responsive.css-->
    <link rel="stylesheet" href="<?php echo e(url('')); ?>/assets/css/responsive.css"/>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <link rel="stylesheet" href="<?php echo e(url('css')); ?>/flatpickr.min.css">
    <link href="<?php echo e(url("cute-alert.css")); ?>" rel="stylesheet">

    <style>
        .item-title a {
            width: max-content !important;
        }

        .logo a, .logo a:hover, .logo a:focus {
            width: max-content !important;
        }

        .travel-check-icon::after {
            position: absolute;
            content: initial;
        }

        .about-us-2 {
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            background-position-x: 0%;
            background-position-y: 0%;
            background-size: auto;
            background-size: cover;
            background-position: center;
            min-height: 150px;
            background-color: #4d4e54;
        }
    </style>

</head>

<body>
<!--[if lte IE 9]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade
    your browser</a> to improve your experience and security.</p>
<![endif]-->

<!-- main-menu Start -->
<header class="top-area">
    <div id="sticky-wrapper" class="sticky-wrapper" style="height: 78px;">
        <div class="header-area" style="width: 1920px; position: fixed; top: 0px; z-index: inherit;">
            <div class="header-area">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-2">
                            <div class="logo">
                                <a href="<?php echo e(url('')); ?>">
                                    Hikmah mujayen <span>Travel</span>
                                </a>
                            </div>
                        </div>
                        <div class="col-sm-10">
                            <div class="main-menu">

                                <!-- Brand and toggle get grouped for better mobile display -->
                                <div class="navbar-header">
                                    <button type="button" class="navbar-toggle" data-toggle="collapse"
                                            data-target=".navbar-collapse">
                                        <i class="fa fa-bars"></i>
                                    </button><!-- / button-->
                                </div>
                                <div class="collapse navbar-collapse">
                                    <ul class="nav navbar-nav navbar-right">
                                        <li class="smooth-menu"><a href="<?php echo e(url('/')); ?>">Home</a></li>
                                        <li class="smooth-menu"><a href="<?php echo e(url('#paket')); ?>"
                                                                   <?php if(request()->segment(1) != ''): ?> onclick="location.href = '<?php echo e(url('/#paket')); ?>'" <?php endif; ?>>Paket</a>
                                        </li>
                                        <li class="smooth-menu"><a href="<?php echo e(url('#promo')); ?>"
                                                                   <?php if(request()->segment(1) != ''): ?>  onclick="location.href = '<?php echo e(url('/#promo')); ?>'" <?php endif; ?>>Promo</a>
                                        </li>
                                        <?php if(auth()->user()): ?>
                                            <li class=""><a href="<?php echo e(url('/pelanggan/pesanan-saya')); ?>">Pesanan Saya</a>
                                            </li>
                                        <?php endif; ?>
                                        <li class="smooth-menu">
                                            <?php if(auth()->user()): ?>
                                                <button class="book-btn bg-danger"
                                                        onclick="location.href = '<?php echo e(url('/pelanggan/profile')); ?>'">
                                                    Profile
                                                </button>
                                            <?php else: ?>
                                                <button class="book-btn" style="background-color: transparent"
                                                        onclick="location.href = '<?php echo e(url('/pelanggan/register')); ?>'">
                                                    register
                                                </button>
                                            <?php endif; ?>
                                        </li>
                                        <li class="smooth-menu">

                                            <?php if(auth()->user()): ?>
                                                <button class="book-btn bg-danger" style="background-color: transparent"
                                                        onclick="location.href = '<?php echo e(url('/pelanggan/logout')); ?>'">
                                                    Logout
                                                </button>
                                            <?php else: ?>
                                                <button class="book-btn"
                                                        onclick="location.href = '<?php echo e(url('/pelanggan/login')); ?>'">
                                                    Login
                                                </button>
                                            <?php endif; ?>
                                        </li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="home-border"></div>
                </div>
            </div>
        </div>
    </div>
</header>

<?php echo $__env->yieldContent('content'); ?>


<!-- footer-copyright start -->
<footer class="footer-copyright">
    <div class="container">
        <div class="footer-content">
            <div class="row justify-content-center">

                <div class="col-sm-3">
                    <div class="single-footer-item">
                        <h2>link</h2>
                        <div class="single-footer-txt">
                            <p><a href="<?php echo e(url('login')); ?>">Login</a></p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="single-footer-item">
                        <h2>Lokasi terpopuler</h2>
                        <div class="single-footer-txt">
                            <?php $__empty_1 = true; $__currentLoopData = $lokasi_tujuans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <p><a href="#"><?php echo e($item->nama); ?></a></p>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <b>Tidak ada lokasi tujuan</b>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="single-footer-item text-center">
                        <h2 class="text-left">Kontak</h2>
                        <div class="single-footer-txt text-left">
                            <p>+6282282692489</p>
                            <p class="foot-email"><a href="#">yossymandiritravel@gmail.com</a></p>
                            <p><?php echo e(env('APP_OBJECT_LOCATION')); ?></p>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        <hr>
        <div class="foot-icons ">
            <ul class="footer-social-links list-inline list-unstyled">
                <li><a href="#" target="_blank" class="foot-icon-bg-1"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#" target="_blank" class="foot-icon-bg-2"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#" target="_blank" class="foot-icon-bg-3"><i class="fa fa-instagram"></i></a></li>
            </ul>
            <p>&copy; <?php echo e(date('Y')); ?> <a href="<?php echo e(url('')); ?>"><?php echo e(env('APP_OBJECT_NAME')); ?></a>. All Right Reserved</p>

        </div>
        <div id="scroll-Top">
            <i class="fa fa-angle-double-up return-to-top" id="scroll-top" data-toggle="tooltip" data-placement="top"
               title="" data-original-title="Back to Top" aria-hidden="true"></i>
        </div>
    </div>

</footer>
<!-- footer-copyright end -->


<script src="<?php echo e(url('')); ?>/assets/js/jquery.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->

<!--modernizr.min.js-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>


<!--bootstrap.min.js-->
<script src="<?php echo e(url('')); ?>/assets/js/bootstrap.min.js"></script>

<!-- bootsnav js -->
<script src="<?php echo e(url('')); ?>/assets/js/bootsnav.js"></script>

<!-- jquery.filterizr.min.js -->
<script src="<?php echo e(url('')); ?>/assets/js/jquery.filterizr.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>

<!--jquery-ui.min.js-->
<script src="<?php echo e(url('')); ?>/assets/js/jquery-ui.min.js"></script>

<!-- counter js -->
<script src="<?php echo e(url('')); ?>/assets/js/jquery.counterup.min.js"></script>
<script src="<?php echo e(url('')); ?>/assets/js/waypoints.min.js"></script>

<!--owl.carousel.js-->
<script src="<?php echo e(url('')); ?>/assets/js/owl.carousel.min.js"></script>

<!-- jquery.sticky.js -->
<script src="<?php echo e(url('')); ?>/assets/js/jquery.sticky.js"></script>

<!--datepicker.js-->
<script src="<?php echo e(url('')); ?>/assets/js/datepicker.js"></script>

<!--Custom JS-->
<script src="<?php echo e(url('')); ?>/assets/js/custom.js"></script>

<script src="<?php echo e(url('')); ?>/js/flatpickr.js"></script>
<script src="<?php echo e(url('')); ?>/js/id.js"></script>
<script src="<?php echo e(url('')); ?>/cute-alert.js"></script>


<script>
    <?php if(session()->has("error")): ?>
    cuteAlert({
        type: "error",
        title: "Kesalahan",
        message: "<?php echo e(session()->get("error")); ?>",
        confirmText: "Oke",
        cancelText: "Batal",
        img: "img/error.svg"
    })
    <?php elseif(session()->has("success")): ?>
    cuteAlert({
        type: "success",
        title: "Berhasil",
        message: "<?php echo e(session()->get("success")); ?>",
        confirmText: "Oke",
        cancelText: "Batal",
        img: "img/success.svg"
    })
    <?php endif; ?>

    <?php if(request()->segment(1) == 'cari-tiket' || request()->segment(1) == ''): ?>
    function getLokasiTujuan() {
        if ($('#pilih-rute').val().length) {
            $('#lokasi-tujuan>option:not(:first-child)').remove();

            $.ajax({
                url: "<?php echo e(url('pelanggan/lokasi-tujuan')); ?>/" + $('#pilih-rute').val(),
                success: function (response) {
                    if (response.data.length) {
                        response.data.forEach((item, index) => {
                            var lokasiTujuanId = new URLSearchParams(location.href).get("pulang_pergi");

                            if (lokasiTujuanId === item.id) {
                                $('#lokasi-tujuan').append(`<option value='${item.id}' selected>${item.nama}</option>`)

                                return;
                            }

                            $('#lokasi-tujuan').append(`<option value='${item.id}'>${item.nama}</option>`)
                        });
                    } else {
                        cuteAlert({
                            type: "error",
                            title: "Kesalahan",
                            message: "Tidak ada data!",
                            confirmText: "Oke",
                            cancelText: "Batal",
                            img: "img/error.svg"
                        })
                    }
                }
            })
        }
    }

    getLokasiTujuan();

    $('#pilih-rute').change((e) => {

        getLokasiTujuan();
    });
    <?php endif; ?>

    <?php if(request()->segment(1) == 'pembayaran-tiket'): ?>
    function getTotalBayarTiket() {
        $.ajax({
            url: "<?php echo e(url("pembayaran-tiket/$tiket->id/get-total-bayar")); ?>/?" + $('#form-pembayaran-tiket').serialize(),
            success: function (response) {
                $('#total-bayar').val(response.data)
            }
        })
    }

    $('#form-pembayaran-tiket #jumlah-tiket, #form-pembayaran-tiket #pulang-pergi').change((e) => {

        getTotalBayarTiket();
    });

    getTotalBayarTiket();

    <?php endif; ?>


    <?php if(request()->segment(1) == 'pembayaran-rental'): ?>
    function getTotalBayarRental() {
        $.ajax({
            url: "<?php echo e(url("pembayaran-rental/$mobil->id/get-total-bayar")); ?>/?" + $('#form-pembayaran-rental').serialize(),
            success: function (response) {
                $('#total-bayar').val(response.data)
            }
        })
    }

    $('#form-pembayaran-tiket #dari-tanggal, #form-pembayaran-tiket #sampai-tanggal, #form-pembayaran-tiket #pakai-supir').change((e) => {

        getTotalBayarRental();
    });

    getTotalBayarRental();

    <?php endif; ?>


    // flatpickr
    $(".flatpickr").flatpickr({
        enableTime: false,
        dateFormat: "Y-m-d",
        locale: 'id'
    });
</script>


</body>

</html>
<?php /**PATH D:\bikinaplikasi\project\setup_server_default\sites\reservasi-dan-travel-zaky.bikinaplikasi.dev\resources\views/layouts/index.blade.php ENDPATH**/ ?>