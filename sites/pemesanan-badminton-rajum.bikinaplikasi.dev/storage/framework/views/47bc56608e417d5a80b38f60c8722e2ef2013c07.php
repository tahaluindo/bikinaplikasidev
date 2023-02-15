<!DOCTYPE html>
<html lang="en">

<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>CoBsine</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- bootstrap css -->
    <link rel="stylesheet" type="text/css" href="<?php echo e(url('home')); ?>/css/bootstrap.min.css">
    <!-- style css -->
    <link rel="stylesheet" type="text/css" href="<?php echo e(url('home')); ?>/css/style.css">
    <!-- Responsive-->
    <link rel="stylesheet" href="<?php echo e(url('home')); ?>/css/responsive.css">
    <!-- fevicon -->
    <link rel="icon" href="images/fevicon.png" type="image/gif" />
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="<?php echo e(url('home')); ?>/css/jquery.mCustomScrollbar.min.css">
    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <!-- fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700|Roboto:400,700&display=swap" rel="stylesheet">
    <!-- owl stylesheets -->
    <link rel="stylesheet" href="<?php echo e(url('home')); ?>/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo e(url('home')); ?>/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css"
        media="screen">

        <style>
            .invalid-feedback {
                display: block !important;
            }
        </style>
</head>

<body>
    <!--header section start -->
    <div class="header_section">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="logo"><a href="index.html">
                    <h2><?php echo e(env('APP_OBJECT_NAME')); ?></h2>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="<?php echo e(url('')); ?>">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(url('login')); ?>">Login</a>
                    </li>

                </ul>
            </div>
        </nav>
        <!--banner section start -->
        <div class="banner_section layout_padding">
            <div class="container-fluid">
                <section class="slide-wrapper">
                    <div class="container-fluid">
                        <div id="myCarousel" class="carousel slide" data-ride="carousel">
                            <!-- Indicators -->
                            <ol class="carousel-indicators">
                                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                <li data-target="#myCarousel" data-slide-to="1"></li>
                                <li data-target="#myCarousel" data-slide-to="2"></li>
                                <li data-target="#myCarousel" data-slide-to="3"></li>
                                <li data-target="#myCarousel" data-slide-to="4"></li>
                            </ol>
                            <!-- Wrapper for slides -->
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <div class="container">
                                        <div class="banner_main">
                                            <h1 class="banner_taital">Pemesanan Lapangan Badminton</h1>
                                            <p class="banner_text">Dapatkan informasi lebih lengkap dan lebih cepat
                                                mengenai lapangan</p>
                                            <div class="btn_main">
                                                <div class="contact_bt active "><a href="#contact-main">Pesan
                                                        Sekarang</a></div>
                                                <div class="readmore_bt"><a href="#">Read More</a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="container">
                                        <div class="banner_main">
                                            <h1 class="banner_taital">Pemesanan Lapangan Badminton</h1>
                                            <p class="banner_text">It is a long established fact that a reader will be
                                                distracted by the readable content of a page when</p>
                                            <div class="btn_main">
                                                <div class="contact_bt active "><a href="#">Contact Us</a></div>
                                                <div class="readmore_bt"><a href="#">Read More</a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="container">
                                        <div class="banner_main">
                                            <h1 class="banner_taital">Pemesanan Lapangan Badminton</h1>
                                            <p class="banner_text">It is a long established fact that a reader will be
                                                distracted by the readable content of a page when</p>
                                            <div class="btn_main">
                                                <div class="contact_bt active "><a href="#">Contact Us</a></div>
                                                <div class="readmore_bt"><a href="#">Read More</a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="container">
                                        <div class="banner_main">
                                            <h1 class="banner_taital">Pemesanan Lapangan Badminton</h1>
                                            <p class="banner_text">It is a long established fact that a reader will be
                                                distracted by the readable content of a page when</p>
                                            <div class="btn_main">
                                                <div class="contact_bt active "><a href="#">Contact Us</a></div>
                                                <div class="readmore_bt"><a href="#">Read More</a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="container">
                                        <div class="banner_main">
                                            <h1 class="banner_taital">Pemesanan Lapangan Badminton</h1>
                                            <p class="banner_text">It is a long established fact that a reader will be
                                                distracted by the readable content of a page when</p>
                                            <div class="btn_main">
                                                <div class="contact_bt active "><a href="#">Contact Us</a></div>
                                                <div class="readmore_bt"><a href="#">Read More</a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <!--banner section end -->
    </div>
    <!--header section end -->
    <!--about section start -->
    <div class="about_section layout_padding">
        <div class="container">
            <h1 class="about_taital">Tentang Kami</h1>
            <p class="about_text">Kami adalah penyedia lapangan badminton berkualitas dengan terdiri dari beberapa
                lapangan yang selalu di jaga kualitas lantai, net, dan bolanya.</p>
            <div class="about_section_2">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="about_image"><img src="<?php echo e(url('home')); ?>/images/about-img.png"></div>
                    </div>
                    <div class="col-lg-6">
                        <div class="about_taital_main">
                            <p class="lorem_text">Disana ada berbagai fasilitas juga seperti kantint, wc, dan tempat
                                istirahat.</p>
                            <div class="read_bt"><a href="#">Read More</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--about section end -->
    <!-- services section start -->
    <div class="services_section layout_padding">
        <div class="container">
            <h1 class="services_taital">Mengapa Harus Kami?</h1>
            <p class="about_text">Ada beberapa alasan kenapa kalian harus memilih kami.</p>
            <div class="services_section_2">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="icon_box">
                            <div class="icon_1"><img src="<?php echo e(url('home')); ?>/images/icon-1.png"></div>
                        </div>
                        <h4 class="selection_text">Manajemen pesanan yang baik</h4>
                        <p class="ipsum_text">Kami selalu siap sedia untuk memanajemen setiap pesanan.</p>
                        <div class="icon_box">
                            <div class="icon_1"><img src="<?php echo e(url('home')); ?>/images/icon-4.png"></div>
                        </div>
                        <h4 class="selection_text">Membuka bisnis lebih pagi</h4>
                        <p class="ipsum_text">Kami selalu membuka bisnis lebih pagi, dari jam 8.</p>
                    </div>
                    <div class="col-lg-4">
                        <div class="icon_box">
                            <div class="icon_1"><img src="<?php echo e(url('home')); ?>/images/icon-2.png"></div>
                        </div>
                        <h4 class="selection_text">Evaluasi</h4>
                        <p class="ipsum_text">Kami selalu siap mengevaluasi bilamana terjadi kesalahan.</p>
                        <div class="icon_box">
                            <div class="icon_1"><img src="<?php echo e(url('home')); ?>/images/icon-5.png"></div>
                        </div>
                        <h4 class="selection_text">Pengembalian Dana</h4>
                        <p class="ipsum_text">Apabila lapangan tidak berhasil di pesan maka dana akan dikembalikan</p>
                    </div>
                    <div class="col-lg-4">
                        <div class="icon_box">
                            <div class="icon_1"><img src="<?php echo e(url('home')); ?>/images/icon-3.png"></div>
                        </div>
                        <h4 class="selection_text">Rencana Bisnis</h4>
                        <p class="ipsum_text">Kami juga selalu merencanakan yang terbaik untuk kedepan</p>
                        <div class="icon_box">
                            <div class="icon_1"><img src="<?php echo e(url('home')); ?>/images/icon-6.png"></div>
                        </div>
                        <h4 class="selection_text">Penyelesaian</h4>
                        <p class="ipsum_text">Memastikan pesanan berhasil dipesan</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- services section end -->

    <!-- blog section end -->

    <!-- events section end -->
    <!-- contact section start -->
    <div class="contact_section layout_padding">
        <div class="container">
            <h1 class="contact_taital " style="text-align: center !important; width: 100%;">Pesan Sekarang</h1>
            <p class="contact_text text-center">Pastikan data yang kamu inputkan benar! <?php echo e($errors); ?></p>
            <div class="contact_section_1 layout_padding">
                <div class="row">
                    <div class="col-md-6">
                        <div class="contact_main" id='contact-main'>
                            <?php if(session()->has('error')): ?>
                                <div class="alert alert-danger" role="alert">
                                    <?php echo e(session()->get('error')); ?>

                                </div>
                            <?php elseif(session()->has('success')): ?>
                                <div class="alert alert-success" role="alert">
                                    <?php echo session()->get('success'); ?>

                                </div>
                            <?php elseif(session()->has('warning')): ?>
                                <div class="alert alert-warning" role="alert">
                                    <?php echo e(session()->get('warning')); ?>

                                </div>
                            <?php endif; ?>

                            <form action="<?php echo e(url('pemesanan')); ?>" method="post" enctype="multipart/form-data">

                                <?php echo e(csrf_field()); ?>


                                <input type="hidden" class="mail_text" placeholder="Atas Nama" name="from_register"
                                    value="Ya">
                                <input type="text" class="mail_text" placeholder="Atas Nama" name="atas_nama">

                                <?php $__errorArgs = ['atas_nama'];
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

                                <input type="text" class="mail_text" placeholder="No Hp" name="no_hp">
                                <?php $__errorArgs = ['no_hp'];
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

                                <select name='lapangan_id' class="mail_text">
                                    <option value="">-- Pilih Lapangan Yang Tersedia --</option>
                                    <?php $__currentLoopData = $lapangan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($item->id); ?>"><?php echo e($item->nama); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php $__errorArgs = ['lapangan_id'];
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

                                <input type="datetime-local" class="mail_text" placeholder="Waktu Mulai"
                                    name="waktu_mulai">
                                <div style="color: white !important;">Waktu Mulai</div>
                                <?php $__errorArgs = ['waktu_mulai'];
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

                                <input type="number" class="mail_text" placeholder="Jumlah jam"
                                    name="jumlah_jam" min="0" max="6">
                                <div style="color: white !important;">Jumlah jam</div>
                                <?php $__errorArgs = ['jumlah_jam'];
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

                                <textarea class="massage-bt" placeholder="Catatan" rows="5" id="catatan" name="catatan"></textarea>
                                <?php $__errorArgs = ['catatan'];
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

                                <button class="send_bt" type='submit'><a
                                        style="color: white !important;">PESAN</a></button>
                                <div style="width: 20px;"></div>
                                
                                </div>
                            </form>
                        </div>
                    </div>

                    
                    <div class="col-md-6" style="background-color: white; margin-top: 100px;">
                        <div class="contact_main" id='contact-main'>
                            <h2 style="color: black;">List Jam Yang Kosong Hari Ini</h2>
                            <table class="table" id='dataTable'>
                                <thead>
                                <tr>
                                    <th width=2>#</th>
                                    <th>Jam</th>
                                    <th>Lapangan</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $lapangan_tersedia_view; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr data-id=''>
                                        <td>
                                            <?php echo e($loop->iteration); ?>

                                        </td>
        
                                        <td><?php echo e($item['jam']); ?></td>
                                        <td><?php echo e($item['lapangan']); ?></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- contact section end -->

    <!-- footer section start -->
    <div class="footer_section layout_padding">
        <div class="container">
            <div class="location_main">
                <div class="location_text"><img src="<?php echo e(url('home')); ?>/images/map-icon.png"><span
                        class="padding_left_10"><a href="#">Location</a></span></div>
                <div class="location_text center"><img src="<?php echo e(url('home')); ?>/images/call-icon.png"><span
                        class="padding_left_10"><a href="#">Call ; 01 1234567890</a></span></div>
                <div class="location_text right"><img src="<?php echo e(url('home')); ?>/images/mail-icon.png"><span
                        class="padding_left_10"><a href="#">demo@gmail.com</a></span></div>
            </div>
            <div class="footer_section_2">
                <div class="row">
                    <div class="col-lg-4">
                        <h2 class="footer_taital">About</h2>
                        <p class="footer_text">There are many variations of passages of Lorem Ipsum available, but the
                            majority havThere are many variations of passages of Lorem Ipsum available, but the majority
                            hav</p>
                    </div>
                    <div class="col-lg-4">
                        <h2 class="footer_taital">Services Link</h2>
                        <p class="footer_text">There are many variations of passages of Lorem Ipsum available, but the
                            majority havThere are many variations of passages of Lorem Ipsum available, but the majority
                            hav</p>
                    </div>
                    <div class="col-lg-4">
                        <h2 class="footer_taital">Subscribe</h2>
                        <input type="text" class="Enter_text" placeholder="Enter Your Email"
                            name="Enter Your Email">
                        <div class="subscribe_bt"><a href="#">Subscribe</a></div>
                        <div class="social_icon">
                            <ul>
                                <li><a href="#"><img src="<?php echo e(url('home')); ?>/images/fb-icon.png"></a></li>
                                <li><a href="#"><img src="<?php echo e(url('home')); ?>/images/twitter-icon.png"></a>
                                </li>
                                <li><a href="#"><img src="<?php echo e(url('home')); ?>/images/linkedin-icon.png"></a>
                                </li>
                                <li><a href="#"><img src="<?php echo e(url('home')); ?>/images/instagram-icon.png"></a>
                                </li>
                                <li><a href="#"><img src="<?php echo e(url('home')); ?>/images/youtub-icon.png"></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- footer section end -->
    <!-- copyright section start -->
    <div class="copyright_section">
        <div class="container">
            <p class="copyright_text">Copyright 2020 All Rights Reserved.<a href="https://html.design"> Free html
                    Templates</a></p>
        </div>
    </div>
    <!-- copyright section end -->
    <!-- Javascript files-->
    <script src="<?php echo e(url('home')); ?>/js/jquery.min.js"></script>
    <script src="<?php echo e(url('home')); ?>/js/popper.min.js"></script>
    <script src="<?php echo e(url('home')); ?>/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo e(url('home')); ?>/js/jquery-3.0.0.min.js"></script>
    <script src="<?php echo e(url('home')); ?>/js/plugin.js"></script>
    <!-- sidebar -->
    <script src="<?php echo e(url('home')); ?>/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="<?php echo e(url('home')); ?>/js/custom.js"></script>
    <!-- javascript -->
    <script src="<?php echo e(url('home')); ?>/js/owl.carousel.js"></script>
    <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
</body>

</html>
<?php /**PATH D:\bikinaplikasi\project\setup_server_default\sites\pemesanan-badminton-rajum.bikinaplikasi.dev\resources\views/index.blade.php ENDPATH**/ ?>