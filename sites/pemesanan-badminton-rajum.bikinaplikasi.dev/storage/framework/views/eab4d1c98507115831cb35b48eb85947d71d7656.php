<?php $__env->startSection('content'); ?>
    <!--about-us start -->
    <section id="home" class="about-us-2">


    </section>
    <!--about-us end -->


    <div  style="margin-top: 175px !important;"></div>
    <?php echo $__env->make('components.pencarian', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


    <section id="pack" class="packages">
        <div class="container">
            <div class="gallary-header text-center">
                <h2>
                    Hasil Pencarian
                </h2>
                <p>
                    <?php if($tikets->count()): ?>
                        Telah ditemukan sebanyak <?php echo e($tikets->count()); ?> data.
                    <?php else: ?>
                        Pencarianmu tidak ditemukan, gunakan pilihan yang lain pencarian yang lain.
                    <?php endif; ?>
                </p>
            </div>
            <div class="packages-content">
                <div class="row">

                    <?php $__currentLoopData = $tikets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-md-4 col-sm-6">
                            <div class="single-package-item">
                                <img src="<?php echo e(url($item->mobil->gambar ?? "image/no_image.png")); ?>" alt="package-place"
                                     width="370"
                                     height="300">
                                <div class="single-package-item-txt">
                                    <h3><?php echo e($item->mobil->nama); ?> <span
                                            class="pull-right"><?php echo e(toIdr($item->rute->biaya)); ?></span></h3>
                                    <div class="packages-para">
                                        <p>
											<span>
												<i class="fa fa-angle-right"></i> 4 Kursi tersisa
											</span>
                                            <i class="fa fa-angle-right"></i> Fasilitas 1, Fasilitas 2, Fasilitas 3.
                                        </p>
                                    </div>
                                    <div class="">
                                        <p>
                                            <i class="fa fa-clock-o"></i>
                                            <span><?php echo e($item->jadwal->hari); ?> <?php echo e($item->jadwal->jam_mulai); ?> - <?php echo e($item->jadwal->jam_akhir); ?></span>
                                        </p>
                                    </div>
                                    <div class="about-btn">
                                        <a href="<?php echo e(url("pembayaran-tiket/$item->id")); ?>">
                                            <button class="about-view packages-btn">
                                                Pesan
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp3\htdocs\reservasi-dan-travel-zaky.bikinaplikasi.dev\resources\views/cari-tiket.blade.php ENDPATH**/ ?>