<?php $__env->startSection('content'); ?>

    <style>
    </style>

    <!--about-us start -->
    <section id="home" class="about-us-2">


    </section>
    <!--about-us end -->

    <!--travel-box start-->
    <section class="travel-box" id='pesan-sekarang' style="margin-top: 175px; margin-bottom: 175px;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="single-travel-boxes">
                        <div id="desc-tabs" class="desc-tabs">

                            <ul class="nav nav-tabs" role="tablist">

                                <li role="presentation" class="active">
                                    <a href="#tours" aria-controls="tours" role="tab" data-toggle="tab">
                                        <i class="fa fa-tree"></i>
                                        Reservasi Tiket
                                    </a>
                                </li>

                                <li role="presentation" class="">
                                    <a href="#pemesanan-paket" aria-controls="pemesanan-paket" role="tab"
                                       data-toggle="tab">
                                        <i class="fa fa-tree"></i>
                                        Pemesanan Paket
                                    </a>
                                </li>

                                <li role="presentation" class="">
                                    <a href="#rental-mobil" aria-controls="rental-mobil" role="tab" data-toggle="tab">
                                        <i class="fa fa-tree"></i>
                                        Rental Mobil
                                    </a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active fade in" id="tours">
                                    <div class="tab-para">

                                        <div class="row">
                                            <?php $__empty_1 = true; $__currentLoopData = $reservasi_tikets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                <div class="col-md-4 col-sm-4">
                                                    <div class="single-package-item"
                                                         style="font-size: 16px !important;">
                                                        <img
                                                            src="<?php echo e(url($item->tiket->mobil->gambar != null || $item->tiket->mobil->gambar != "" ? $item->tiket->mobil->gambar : "image/no_image.png")); ?>"
                                                            alt="package-place"
                                                            width="370"
                                                            height="300">
                                                        <div class="single-package-item-txt">
                                                            <h3><?php echo e($item->tiket->mobil->nama); ?> <span
                                                                    class="pull-right"><?php echo e(toIdr($item->total_bayar)); ?></span>
                                                            </h3>
                                                            <div class="packages-para">
                                                                <p style="font-size: 12px !important;">
                                                                    <span>
                                                                        <i class="fa fa-angle-right"></i> 4 Kursi tersisa
                                                                    </span>
                                                                    <i class="fa fa-angle-right"></i> Fasilitas 1,
                                                                    Fasilitas 2, Fasilitas 3.
                                                                </p>
                                                            </div>
                                                            <div class="">
                                                                <p style="font-size: 16px !important;">
                                                                    <i class="fa fa-clock-o"></i>
                                                                    <span><?php echo e($item->tiket->jadwal->hari); ?> <?php echo e($item->tiket->jadwal->jam_mulai); ?> - <?php echo e($item->tiket->jadwal->jam_akhir); ?></span>
                                                                <p>
                                                                <p style="font-size: 16px !important;">
                                                                    <span>Status: <b><?php echo e($item->status); ?></b></span>
                                                                <p style="font-size: 16px !important;">
                                                                    <span class="" style="display: block; ">
                                                                        <strong class="text-danger float-right">
                                                                            Exp At: <?php echo e($item->tiket->berakhir_pada); ?>

                                                                        </strong>
                                                                    </span>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                <h3>Belum ada tiket yang dibeli</h3>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>

                                <div role="tabpanel" class="tab-pane fade in" id="pemesanan-paket">
                                    <div class="tab-para">

                                        <?php $__empty_1 = true; $__currentLoopData = $pemesanan_pakets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                            <div class="row">
                                                <div class="col-md-4 col-sm-6">
                                                    <div class="single-package-item">
                                                        <img
                                                            src="<?php echo e(url($item->paket->gambar ?? "image/no_image.png")); ?>"
                                                            alt="package-place">
                                                        <div class="single-package-item-txt">
                                                            <h3><?php echo e($item->paket->nama); ?> <span
                                                                    class="pull-right"><?php echo e(toIdr($item->paket->harga)); ?></span>
                                                            </h3>
                                                            <div class="packages-para">
                                                                <p>
                                                                    <?php $__currentLoopData = explode('#', $item->paket->benefit); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $itemBenefit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <span>
                                                                            <i class="fa fa-angle-right"></i> <?php echo e($itemBenefit); ?>

                                                                        </span>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                </p>

                                                                <p style="font-size: 16px !important;">
                                                                    <span>Status: <b><?php echo e($item->status); ?></b></span>
                                                            </div>
                                                            <div class="">
                                                                <p>
                                                                    <span><?php echo e($item->paket->deskripsi); ?></span>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                            <h3>Belum ada paket yang dibeli</h3>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div role="tabpanel" class="tab-pane fade in" id="rental-mobil">
                                    <div class="tab-para">

                                        <div class="row">
                                            <?php $__empty_1 = true; $__currentLoopData = $rental_mobils; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                                                <div class="col-md-4 col-sm-4">
                                                    <div class="single-package-item"
                                                         style="font-size: 16px !important;">
                                                        <img
                                                            src="<?php echo e(url($item->mobil->gambar != null || $item->mobil->gambar != "" ? $item->mobil->gambar : "image/no_image.png")); ?>"
                                                            alt="package-place"
                                                            width="370"
                                                            height="300">
                                                        <div class="single-package-item-txt">
                                                            <h3><?php echo e($item->mobil->nama); ?> <span
                                                                    class="pull-right"><?php echo e(toIdr($item->total_bayar)); ?></span>
                                                            </h3>
                                                            <div class="packages-para">
                                                                <p style="font-size: 12px !important;">
                                                                    <span>
                                                                        <i class="fa fa-angle-right"></i> <?php echo e($item->mobil->jumlah_kursi); ?> Kursi
                                                                    </span>

                                                                    <?php $__currentLoopData = $item->mobil->mobil_fasilitas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $itemMobilFasilitas): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <span>
                                                                        <i class="fa fa-angle-right"></i> <?php echo e($itemMobilFasilitas->fasilitas->nama); ?>

                                                                    </span>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                </p>
                                                            </div>
                                                            <div class="">
                                                                <p>
                                                                    <i class="fa fa-check"></i>
                                                                    <span><?php echo e($item->status); ?></span>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                <h3>Belum ada mobil yang pernah dirental</h3>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

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

<?php echo $__env->make('layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\reservasi-dan-travel-zaky.bikinaplikasi.dev\resources\views/pesanan-saya.blade.php ENDPATH**/ ?>