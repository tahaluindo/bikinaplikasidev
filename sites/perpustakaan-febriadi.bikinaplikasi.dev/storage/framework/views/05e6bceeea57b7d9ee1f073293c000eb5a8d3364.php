<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row">
            <!-- Stats -->
            <div class="outer-w3-agile col-xl">
                <div class="stat-grid p-3 d-flex align-items-center justify-content-between bg-primary">
                    <div class="s-l">
                        <h5>Peminjaman</h5>
                    </div>
                    <div class="s-r">
                        <h6><?php echo e($peminjamans->count()); ?>

                            <i class="far fa-edit"></i>
                        </h6>
                    </div>
                </div>
                <div class="stat-grid p-3 mt-3 d-flex align-items-center justify-content-between bg-success">
                    <div class="s-l">
                        <h5>Pengembalian</h5>
                    </div>
                    <div class="s-r">
                        <h6><?php echo e($pengembalians->count()); ?>

                            <i class="far fa-smile"></i>
                        </h6>
                    </div>
                </div>
                <div class="stat-grid p-3 mt-3 d-flex align-items-center justify-content-between bg-danger">
                    <div class="s-l">
                        <h5>User</h5>
                    </div>
                    <div class="s-r">
                        <h6><?php echo e($users->count()); ?>

                            <i class="fas fa-tasks"></i>
                        </h6>
                    </div>
                </div>
                <div class="stat-grid p-3 mt-3 d-flex align-items-center justify-content-between bg-warning">
                    <div class="s-l">
                        <h5>Anggota</h5>
                    </div>
                    <div class="s-r">
                        <h6><?php echo e($anggotas->count()); ?>

                            <i class="fas fa-users"></i>
                        </h6>
                    </div>
                </div>
            </div>
            <!--// Stats -->
            <!-- Pie-chart -->
            <div class="outer-w3-agile col-xl ml-xl-3 mt-xl-0 mt-3">
                <h4 class="tittle-w3-agileits mb-4">Grafik Peminjaman & Pengembalian</h4>
                <div id="chartdiv"></div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\bikinaplikasi\project\74debriadi\perpustakaan\resources\views/home.blade.php ENDPATH**/ ?>