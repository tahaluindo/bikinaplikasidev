<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <div class="container-fluid">
            <!-- Breadcrumb-->
            <div class="row pt-2 pb-2">
                <div class="col-sm-9">
                    <h4 class="page-title">User</h4>
                    <ol class="breadcrumb">

                        <li class="breadcrumb-item"><a href="javaScript:void();">Halaman</a></li>
                        <li class="breadcrumb-item active" aria-current="page">User</li>
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
                                            <th width=2>#</th>
                                            <th>Nama</th>
                                            <th>Jenis Kelamin</th>
                                            <th>No Hp</th>
                                            <th>Email</th>
                                            <th>Level</th>
                                            <th>Is Verifikasi</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr data-id='<?php echo e($item->id); ?>'>
                                                <td>
                                                    <?php echo e($loop->iteration); ?>

                                                </td>

                                                <td><?php echo e($item->nama); ?></td>
                                                <td><?php echo e($item->jenis_kelamin); ?></td>
                                                <td><?php echo e($item->no_hp); ?></td>
                                                <td><?php echo e($item->email); ?></td>
                                                <td><?php echo e($item->level); ?></td>
                                                <td><?php echo e($item->is_verifikasi); ?></td>

                                                <td class="text-center">
                                                    <?php if($item->level != 'Admin'): ?>
                                                        <a class="label label-primary"
                                                           href="<?php echo e(url('/user/' . $item->id . '/edit')); ?>">Edit</a>
                                                        <form action="<?php echo e(url('/user' . '/' . $item->id)); ?>"
                                                              method='post'
                                                              style='display: inline;'
                                                              onsubmit="return confirm('Yakin akan menghapus data ini?')">
                                                            <?php echo method_field('DELETE'); ?>
                                                            <?php echo csrf_field(); ?>
                                                            <label class="label label-danger" href=""
                                                                   for='btnSubmit-<?php echo e($item->id); ?>'
                                                                   style='cursor: pointer;'>Hapus</label>
                                                            <button type="submit" id='btnSubmit-<?php echo e($item->id); ?>'
                                                                    style="display: none;"></button>
                                                        </form>
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
        const locationHrefHapusSemua = "<?php echo e(url('user/hapus_semua')); ?>";
        const locationHrefAktifkanSemua = "<?php echo e(url('user/aktifkan_semua')); ?>";
        const locationHrefCreate = "<?php echo e(url('user/create')); ?>";
        var columnOrders = [<?php echo e($user_count - 4); ?>];
        var urlSearch = "<?php echo e(url('user')); ?>";
        var q = "<?php echo e($_GET['q'] ?? ''); ?>";
        var placeholder = "Filter...";
        var tampilkan_buttons = true;
        var button_manual = true;
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\bikinaplikasi\project\setup_server_default\sites\api-admin-rumah-kevin.bikinaplikasi.dev\new\resources\views/user/index.blade.php ENDPATH**/ ?>