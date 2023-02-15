<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <div class="container-fluid">
            <!-- Breadcrumb-->
            <div class="row pt-2 pb-2">
                <div class="col-sm-9">
                    <h4 class="page-title"><?php echo e(ucwords("tentang")); ?></h4>
                    <ol class="breadcrumb">

                        <li class="breadcrumb-item"><a href="javaScript:void();">Halaman</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo e(ucwords("tentang")); ?></li>
                    </ol>
                </div>
            </div>
            <!-- End Breadcrumb-->
            <div class="row">
                <div class="col-lg-12">
                    <div>
                        <div class="card px-1">
                            <div class="card-body">
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

                                <div class="table-stats order-table ov-h table-responsive">

                                    <table class="table" id='dataTable'>
                                        <thead>
                                        <tr>
                                            <th>Nama Developer</th>
                                            <th>Deskripsi</th>
                                            <th>Versi</th>
                                            <th>Email</th>
                                            <th>No Hp</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td><?php echo e($tentang->nama_developer); ?></td>
                                            <td><?php echo e($tentang->deskripsi); ?></td>
                                            <td><?php echo e($tentang->versi); ?></td>
                                            <td><?php echo e($tentang->email); ?></td>
                                            <td><?php echo e($tentang->no_hp); ?></td>

                                            <td class="text-center">
                                                <a class="label label-primary"
                                                   href="<?php echo e(url('/tentang/' . $tentang->id . '/edit')); ?>">Edit</a>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const locationHrefHapusSemua = "<?php echo e(url('tentang/hapus_semua')); ?>";
        const locationHrefAktifkanSemua = "<?php echo e(url('tentang/aktifkan_semua')); ?>";
        const locationHrefCreate = "<?php echo e(url('tentang/create')); ?>";
        var columnOrders = [<?php echo e($tentang_count); ?>];
        var urlSearch = "<?php echo e(url('tentang')); ?>";
        var q = "<?php echo e($_GET['q'] ?? ''); ?>";
        var placeholder = "Filter...";
        var tampilkan_buttons = false;
        var button_manual = false;
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\bikinaplikasi\project\setup_server_default\sites\api-admin-rumah-kevin.bikinaplikasi.dev\new\resources\views/tentang/index.blade.php ENDPATH**/ ?>