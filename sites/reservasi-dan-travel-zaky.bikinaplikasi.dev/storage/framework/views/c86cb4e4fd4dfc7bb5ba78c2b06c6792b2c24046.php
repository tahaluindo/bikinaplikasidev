<?php $__env->startSection('content'); ?>
    <!--about-us start -->
    <section id="home" class="about-us-2">


    </section>
    <!--about-us end -->

    <div style="margin-top: 175px !important;"></div>

    <?php echo $__env->make('components.pencarian', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


    <section id="pack" class="packages">
        <div class="container">
            <div class="gallary-header text-center">
                <h2>
                    Hasil Pencarian
                </h2>
                <p>
                    <?php if($mobils->count()): ?>
                        Telah ditemukan sebanyak <?php echo e($mobils->count()); ?> data.
                    <?php else: ?>
                        Pencarianmu tidak ditemukan, gunakan pilihan yang lain pencarian yang lain.
                    <?php endif; ?>
                </p>
            </div>
            <div class="packages-content">
                <div class="row">

                    <?php $__currentLoopData = $mobils; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-md-4 col-sm-6">
                            <div class="single-package-item">
                                <img src="<?php echo e(url($item->gambar != "" ? $item->gambar : "image/no_image.png")); ?>"
                                     alt="package-place"
                                     width="370"
                                     height="300">
                                <div class="single-package-item-txt">
                                    <h3><?php echo e($item->nama); ?> <span
                                            class="pull-right"><?php echo e(toIdr($item->biaya_rental)); ?></span></h3>
                                    <div class="packages-para">
                                        <p>
											<span>
												<i class="fa fa-angle-right"></i> <?php echo e($item->jumlah_kursi); ?> Kursi
											</span>

                                            <?php $__currentLoopData = $item->mobil_fasilitas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $itemMobilFasilitas): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                                    <div class="about-btn">
                                        <a href="<?php echo e(url("pembayaran-rental/$item->id?" . $query)); ?>">
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

<?php echo $__env->make('layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\reservasi-dan-travel-zaky.bikinaplikasi.dev\resources\views/cari-mobil-rental.blade.php ENDPATH**/ ?>