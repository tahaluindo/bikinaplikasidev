<?php $__env->startSection('content'); ?>
    <!--about-us start -->
    <section id="home" class="about-us">
        <div class="container">
            <div class="about-us-content">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="single-about-us">
                            <div class="about-us-txt">
                                <h2>
                                    <?php echo e(env('APP_OBJECT_NAME')); ?>


                                </h2>
                                <a href="#pesan-sekarang">
                                    <div class="about-btn">
                                        <button class="about-view">
                                            PESAN SEKARANG
                                        </button>
                                    </div>

                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-0">
                        <div class="single-about-us">

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!--about-us end -->

    <!--travel-box start-->
    <?php echo $__env->make('components.pencarian', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!--travel-box end-->

    <!--packages start-->
    <section id="paket" class="packages">
        <div class="container">
            <div class="gallary-header text-center">
                <h2>
                    Paket Spesial
                </h2>
                <p>
                    Paket terbaik sesuai kebutuhanmu!
                </p>
            </div>
            <div class="packages-content">
                <div class="row">

                    <?php $__currentLoopData = $pakets->where('spesial_offer', "Tidak"); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-md-4 col-sm-6">
                            <div class="single-package-item">
                                <img src="<?php echo e(url($item->gambar ?? "image/no_image.png")); ?>" alt="package-place">
                                <div class="single-package-item-txt">
                                    <h3><?php echo e($item->nama); ?> <span class="pull-right"><?php echo e(toIdr($item->harga)); ?></span></h3>
                                    <div class="packages-para">
                                        <p>
                                            <?php $__currentLoopData = explode('#', $item->benefit); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $itemBenefit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <span>
												    <i class="fa fa-angle-right"></i> <?php echo e($itemBenefit); ?>

											    </span>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </p>
                                    </div>
                                    <div class="">
                                        <p>
                                            <span><?php echo e($item->deskripsi); ?></span>
                                        </p>
                                    </div>
                                    <div class="about-btn">
                                        <a href="<?php echo e(url("pembayaran-paket/$item->id")); ?>">
                                            <button class="about-view packages-btn">
                                                PESAN !!!
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div>
            </div>
        </div>

    </section>
    <!--packages end-->

    <!--special-offer start-->
    <section id="promo" class="special-offer">
        <div class="container">
            <div class="special-offer-content">
                <div class="row">
                    <div class="col-sm-8">
                        <?php $__currentLoopData = $pakets->where('spesial_offer', "Ya"); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="single-special-offer">
                            <div class="single-special-offer-txt">
                                <h2 style="color: white;"><?php echo e($item->nama); ?></h2>
                                <div class="packages-review special-offer-review">
                                </div>
                                <div class="packages-para special-offer-para">
                                    <p>
                                        <?php $__currentLoopData = explode('#', $item->benefit); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $itemBenefit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <span>
												    <i class="fa fa-angle-right"></i> <?php echo e($itemBenefit); ?>

											    </span>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </p>
                                    <p class="offer-para">
                                        <?php echo e($item->deskripsi); ?>

                                    </p>
                                </div>
                                <div class="offer-btn-group">
                                    <div class="about-btn">
                                        <a href="<?php echo e(url("pembayaran-paket/$item->id")); ?>">
                                            <button class="about-view packages-btn">
                                                PESAN !!!
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <div class="col-sm-4">
                    <div class="single-special-offer">
                        <div class="single-special-offer-bg">
                            <img src="<?php echo e(url('')); ?>/assets/images/offer/offer-shape.png" alt="offer-shape">
                        </div>
                        <div class="single-special-shape-txt">
                            <h3>Promo Spesial</h3>
                            <h4><span><?php echo e($item->off); ?>%</span><br>off</h4>
                            <p style="display: inline-block; width: 100%; text-align: center; margin-left: -20px;"><span
                                    style="font-size: 48px !important;"><?php echo e(toIdr($item->harga)); ?></span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--special-offer end-->

    <!--subscribe start-->
    <section id="subs" class="subscribe">
        <div class="container">
            <div class="subscribe-title text-center">
                <h2>
                    Subscribe untuk mendapatkan penawaran spesial
                </h2>
                <p>
                    Subscribe sekarang. Kami akan mengirimkan penawaran terbaik setiap minggu
                </p>
            </div>
            <form>
                <div class="row">
                    <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                        <div class="custom-input-group">
                            <input type="email" class="form-control" placeholder="Masukkan emailmu disini">
                            <button class="appsLand-btn subscribe-btn">Subscribe</button>
                            <div class="clearfix"></div>
                            <i class="fa fa-envelope"></i>
                        </div>

                    </div>
                </div>
            </form>
        </div>

    </section>
    <!--subscribe end-->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\bikinaplikasi\project\setup_server_default\sites\reservasi-dan-travel-zaky.bikinaplikasi.dev\resources\views/index.blade.php ENDPATH**/ ?>