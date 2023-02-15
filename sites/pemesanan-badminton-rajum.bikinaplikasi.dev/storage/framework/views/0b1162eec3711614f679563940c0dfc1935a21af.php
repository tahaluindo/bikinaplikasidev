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
        .travel-check-icon::after {
            position: absolute;
            content: initial;
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
                                <a href="index.html">
                                    tour<span>Nest</span>
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
                                        <li class="smooth-menu"><a href="<?php echo e(url('')); ?>">Home</a></li>
                                        <li class="smooth-menu"><a href="<?php echo e(url('')); ?>">Cek Pesanan</a></li>
                                        <li class="smooth-menu"><a href="<?php echo e(url('')); ?>">register</a></li>
                                        <li class="smooth-menu"><a href="<?php echo e(url('')); ?>">Masuk</a></li>
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

<!--packages start-->
<section id="pack" class="packages">
    <div class="container">
        <div class="gallary-header text-center">
            <h2>
                Isi data pemesanan
            </h2>
            <p>
                Mohon inputkan data pesanan sesuai dengan identitas asli anda (KTP / SIM / Kartu Pelajar)
            </p>
        </div>
        <div class="packages-content">
            <div class="row">

                <div class="col-md-4 col-md-offset-4">
                    <div class="single-package-item">
                        <img src="<?php echo e(url('')); ?>/assets/images/packages/p1.jpg" alt="package-place" width="370"
                             height="300">
                        <div class="single-package-item-txt">
                            <h3>Nama Mobil <span class="pull-right">Rp300.000</span></h3>
                            <div class="packages-para">
                                <p>
                                    <span>
                                        <i class="fa fa-angle-right"></i> 4 Kursi tersisa
                                    </span>
                                    <span>
                                        <i class="fa fa-angle-right"></i> Fasilitas 1, Fasilitas 2, Fasilitas 3.
                                    </span>
                                </p>
                            </div>
                            <div class="packages-para">
                                <p>

                                    <span> <i class="fa fa-clock-o"></i> 8:00 - 9:00</span>
                                    <span class="text-danger"><i
                                            class="fa fa-clock-o"></i><strong> Exp: 2022-05-15</strong></span>
                                </p>


                            </div>
                        </div>
                    </div>

                </div>

            </div>

            <div class="row" style="margin-top: 33px;">
                <div class="col-md-6 col-md-offset-3">
                    <div class="single-tab-select-box  <?php echo e($errors->has('name') ? 'has-error' : ''); ?>">
                        <h2>Atas Nama</h2>
                        <div class="travel-check-icon">
                            <input type="text" name="check_in"
                                   class="form-control flatpickr-input  <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                   placeholder="Nama pemesan"
                                   value="<?php echo e(isset($user->name) ? $user->name : old('name')); ?>">

                            <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="invalid-feedback text-danger" role="alert">
                                <strong><?php echo e($message); ?></strong>
                            </span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>


                    <div class="single-tab-select-box  <?php echo e($errors->has('name') ? 'has-error' : ''); ?>">
                        <h2>Jumlah Tiket</h2>
                        <div class="travel-check-icon">
                            <div class="travel-select-icon">
                                <select class="form-control ">
                                    <?php $__currentLoopData = range(1, 20); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($item); ?>"><?php echo e($item); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>

                            <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="invalid-feedback text-danger" role="alert">
                                <strong><?php echo e($message); ?></strong>
                            </span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>

                    <div class="single-tab-select-box  <?php echo e($errors->has('name') ? 'has-error' : ''); ?>">
                        <h2>Pulang Pergi</h2>
                        <div class="travel-check-icon">
                            <div class="travel-select-icon">
                                <select class="form-control ">
                                    <option value="Ya">Ya</option>
                                    <option value="Tidak">Tidak</option>
                                </select>
                            </div>

                            <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="invalid-feedback text-danger" role="alert">
                                <strong><?php echo e($message); ?></strong>
                            </span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>

                    <div class="single-tab-select-box  <?php echo e($errors->has('name') ? 'has-error' : ''); ?>">
                        <h2>No Hp</h2>
                        <div class="travel-check-icon">
                            <input type="text" name="check_in"
                                   class="form-control flatpickr-input  <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                   placeholder="Nama pemesan"
                                   value="<?php echo e(isset($user->name) ? $user->name : old('name')); ?>">

                            <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="invalid-feedback text-danger" role="alert">
                                <strong><?php echo e($message); ?></strong>
                            </span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>

                    <div class="single-tab-select-box  <?php echo e($errors->has('name') ? 'has-error' : ''); ?>">
                        <h2>Total Bayar</h2>
                        <div class="travel-check-icon">
                            <input type="text" name="check_in"
                                   class="form-control flatpickr-input  <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                   placeholder="Nama pemesan"
                                   value="<?php echo e(isset($user->name) ? $user->name : old('name')); ?>">

                            <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="invalid-feedback text-danger" role="alert">
                                <strong><?php echo e($message); ?></strong>
                            </span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>


                    <div class="single-tab-select-box  <?php echo e($errors->has('name') ? 'has-error' : ''); ?>">
                        <h2>Bukti Transfer</h2>
                        <div class="travel-check-icon">
                            <input type="file" name="check_in"
                                   class="form-control flatpickr-input  <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                   placeholder="Nama pemesan"
                                   value="<?php echo e(isset($user->name) ? $user->name : old('name')); ?>">

                            <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="invalid-feedback text-danger" role="alert">
                                <strong><?php echo e($message); ?></strong>
                            </span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>

                    <div class="single-tab-select-box  <?php echo e($errors->has('name') ? 'has-error' : ''); ?>">
                        <div class="travel-check-icon">
                            <button class="book-btn">book now</button>

                            <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="invalid-feedback text-danger" role="alert">
                                <strong><?php echo e($message); ?></strong>
                            </span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</section>
<!--packages end-->

<!-- footer-copyright start -->
<footer class="footer-copyright">
    <div class="container">
        <div class="footer-content">
            <div class="row">

                <div class="col-sm-3">
                    <div class="single-footer-item">
                        <div class="footer-logo">
                            <a href="index.html">
                                <img src="<?php echo e(url('image/logo.png')); ?>" style="height: 120px !important;">
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="single-footer-item">
                        <h2>link</h2>
                        <div class="single-footer-txt">
                            <p><a href="#">home</a></p>
                            <p><a href="#">destination</a></p>
                            <p><a href="#">spacial packages</a></p>
                            <p><a href="#">special offers</a></p>
                            <p><a href="#">blog</a></p>
                            <p><a href="#">contacts</a></p>
                        </div>
                    </div>

                </div>

                <div class="col-sm-3">
                    <div class="single-footer-item">
                        <h2>Lokasi terpopuler</h2>
                        <div class="single-footer-txt">
                            <p><a href="#">china</a></p>
                            <p><a href="#">venezuela</a></p>
                            <p><a href="#">brazil</a></p>
                            <p><a href="#">australia</a></p>
                            <p><a href="#">london</a></p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="single-footer-item text-center">
                        <h2 class="text-left">Kontak</h2>
                        <div class="single-footer-txt text-left">
                            <p>+1 (300) 1234 6543</p>
                            <p class="foot-email"><a href="#">info@tnest.com</a></p>
                            <p>North Warnner Park 336/A</p>
                            <p>Newyork, USA</p>
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
    $('#pilih-rute').change((e) => {
        if ($('#pilih-rute').val().length) {
            $('#lokasi-tujuan>option:not(:first-child)').remove();

            $.ajax({
                url: "<?php echo e(url('lokasi-tujuan')); ?>/" + $('#pilih-rute').val(),
                success: function (response) {
                    if (response.data.length) {
                        response.data.forEach((item, index) => {

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
    });

    // flatpickr
    $(".flatpickr").flatpickr({
        enableTime: false,
        dateFormat: "Y-m-d",
        locale: 'id'
    });
</script>


</body>

</html>
<?php /**PATH D:\bikinaplikasi\project\setup_server_default\sites\reservasi-dan-travel-zaky.bikinaplikasi.dev\resources\views/pembayaran.blade.php ENDPATH**/ ?>
