<?php $__env->startSection('content'); ?>
    <div class="main_content_iner ">
        <div class="container-fluid plr_30 pb_30 pt_30 body_white_bg">
            <div class="row">

                <div class="col-lg-6">
                    <h3 class="mb-0">
                        Edit <?php echo e(ucwords(preg_replace('/[^a-zA-Z]/', ' ', \Illuminate\Support\Facades\Request::segment(1)))); ?></h3>
                    <div class="mb-3"></div>

                    <form class="form-horizontal form-material" action="<?php echo e(url('/pemesanan/' . $pemesanan->id)); ?>"
                          method="post" enctype="multipart/form-data" id="form-submit">
                        <?php echo method_field('put'); ?>
                        <?php echo csrf_field(); ?>

                        <?php echo $__env->make('pemesanan.form', ['formMode' => 'edit'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        <div class="form-group">
                            <div class="col-sm-12" style="margin-top: 15px;">
                                <button class="btn btn-primary" type="submit">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app3', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\bikinaplikasi\project\setup_server_default\sites\pemesanan-badminton-rajum.bikinaplikasi.dev\resources\views/pemesanan/edit.blade.php ENDPATH**/ ?>