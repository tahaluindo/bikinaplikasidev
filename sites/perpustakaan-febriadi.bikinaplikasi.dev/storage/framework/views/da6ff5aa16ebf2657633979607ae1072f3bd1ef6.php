<?php $__env->startSection('content'); ?>
    <div class="content-header sty-one">
        <h1>Buku</h1>
        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li><i class="fa fa-angle-right"></i> Buku</li>
        </ol>
    </div>

    <div class="content">
        <div class="row">

            <div class="col-xl-6">

                <?php if(session()->has("error")): ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo e(session()->get("error")); ?>

                    </div>
                <?php elseif(session()->has("success")): ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo e(session()->get("success")); ?>

                    </div>
                <?php elseif(session()->has("warning")): ?>
                    <div class="alert alert-warning" role="alert">
                        <?php echo e(session()->get("warning")); ?>

                    </div>
                <?php endif; ?>

                <div class="info-box p-3">
                    <form class="form-horizontal form-material" action="<?php echo e(url('/buku')); ?>"
                            method="post" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>

                            <?php echo $__env->make('buku.form', ['formMode' => 'create'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\bikinaplikasi\project\setup_server_default\sites\perpustakaan-febriadi.bikinaplikasi.dev\resources\views/buku/create.blade.php ENDPATH**/ ?>