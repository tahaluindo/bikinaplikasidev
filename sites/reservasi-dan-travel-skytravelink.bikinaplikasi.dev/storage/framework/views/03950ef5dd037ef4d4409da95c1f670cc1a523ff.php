<?php $__env->startSection('content'); ?>
    <div class="main_content_iner ">
        <div class="container-fluid plr_30 pb_30 pt_30 body_white_bg">
            <div class="row">

                <div class="col-lg-6">
                    <h3 class="mb-0">
                        Edit <?php echo e(ucwords(preg_replace('/[^a-zA-Z]/', ' ', \Illuminate\Support\Facades\Request::segment(1)))); ?></h3>
                    <div class="mb-3"></div>

                    <form class="form-horizontal form-material" action="<?php echo e(url('/lokasi/' . $lokasi->id)); ?>"
                          method="post" enctype="multipart/form-data" id="form-submit">
                        <?php echo method_field('put'); ?>
                        <?php echo csrf_field(); ?>

                        <?php echo $__env->make('lokasi.form', ['formMode' => 'edit'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>




<?php echo $__env->make('layouts.app3', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\bikinaplikasi\project\setup_server_default\sites\reservasi-dan-travel-zaky.bikinaplikasi.dev\resources\views/lokasi/edit.blade.php ENDPATH**/ ?>