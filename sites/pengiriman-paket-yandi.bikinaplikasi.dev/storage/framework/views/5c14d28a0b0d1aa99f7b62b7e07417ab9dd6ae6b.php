<?php $__env->startSection('content'); ?>
    <div class="main_content_iner ">
        <div class="container-fluid plr_30 body_white_bg pt_30">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="single_element">
                        <div class="quick_activity">
                            <div class="row">
                                <div class="col-12">
                                    <div class="quick_activity_wrap">
                                        <div class="single_quick_activity">
                                            <h4>Pemasukan Pengiriman</h4>
                                            <h3>Rp<span
                                                    class="counter"><?php echo e(toIdr($pengiriman_paket->sum('total_bayar'), ",", "")); ?></span>
                                            </h3>
                                            <p><?php echo e(toIdr($pengiriman_paket->count(), ",", "")); ?> Pengiriman</p>
                                        </div>
                                        <div class="single_quick_activity">
                                            <h4>Jumlah Lokasi</h4>
                                            <h3><span class="counter"><?php echo e($lokasi->count()); ?></span>
                                            </h3>
                                            <p><?php echo e(toIdr($lokasi->count(), ",", "")); ?> Lokasi</p>
                                        </div>
                                        <div class="single_quick_activity">
                                            <h4>Paket</h4>
                                            <h3><span class="counter"><?php echo e($paket->count()); ?></span></h3>
                                            <p><?php echo e($paket->count()); ?>

                                                Tersedia</p>
                                        </div>
                                        <div class="single_quick_activity">
                                            <h4>Jumlah Mobil</h4>
                                            <h3><span class="counter"><?php echo e($mobil->count()); ?></span></h3>
                                            <p><?php echo e(toIdr($mobil->where('status', 'Tersedia')->count(), ",", "")); ?>

                                                Tersedia</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app3', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\bikinaplikasi\project\setup_server_default\sites\pengiriman-paket-yandi.bikinaplikasi.dev\resources\views/home.blade.php ENDPATH**/ ?>