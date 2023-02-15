<?php $__env->startSection('content'); ?>
    <div class="main_content_iner ">
        <div class="container-fluid  plr_30 pb_30 pt_30 body_white_bg">
            <div class="row">

                <div class="col-lg-6">
                    <h3 class="mb-0">
                        Lihat Laporan <?php echo e(ucwords(preg_replace('/[^a-zA-Z]/', ' ', \Illuminate\Support\Facades\Request::segment(1)))); ?></h3>
                    <div class="mb-3"></div>

                    <?php echo $__env->make('layouts.reservasi-tiket.laporan.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app3', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\bikinaplikasi\project\setup_server_default\sites\reservasi-dan-travel-skytravelink.bikinaplikasi.dev\resources\views/reservasi-tiket/laporan/index.blade.php ENDPATH**/ ?>