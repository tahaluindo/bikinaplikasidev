<?php $__env->startSection('content'); ?>
    <div class="page">

        <div class="page-content container-fluid">
            <div class="row" data-plugin="matchHeight" data-by-row="true">
                <div class="col-xxl-12 col-xl-12">
                    <div class="card card-shadow">
                        <div class="card-block bg-white p-40">
                            <div class="col-md-6">
                                <form class="form-horizontal form-material"
                                      action="<?php echo e(url('/kode-buku/' . $kode_buku->id)); ?>"
                                      method="post" enctype="multipart/form-data">
                                    <?php echo method_field('put'); ?>
                                    <?php echo csrf_field(); ?>

                                    <?php echo $__env->make('kode-buku.form', ['formMode' => 'edit'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\bikinaplikasi\project\setup_server_default\sites\perpustakaan-andri.bikinaplikasi.dev\resources\views/kode-buku/edit.blade.php ENDPATH**/ ?>