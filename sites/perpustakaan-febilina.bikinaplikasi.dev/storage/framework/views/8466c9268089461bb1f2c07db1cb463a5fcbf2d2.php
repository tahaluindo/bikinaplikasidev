<?php $__env->startSection('content'); ?>
    <div class="content-header sty-one">
        <h1>User</h1>
        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li><i class="fa fa-angle-right"></i> User</li>
        </ol>
    </div>

    <div class="content">
        <div class="row mb-2">
            <div class="col-xl-12">
                <a class="btn btn-outline-primary" href="?">Lihat Semua</a>
                <a class="btn btn-outline-primary" href="?level=Guru">Lihat Guru</a>
                <a class="btn btn-outline-primary" href="?level=Siswa">Lihat Siswa</a>
            </div>
        </div>

        <div class="row">

            <div class="col-xl-12">
                <div class="info-box">
                    <div class="table-responsive">
                        <table class="table" id='dataTable'>
                            <thead>
                            <tr>
                                <th width=2>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Level</th>
                                <?php if(auth()->user()->level == 'Admin'): ?>
                                    <th class="text-center">Aksi</th>
                                <?php endif; ?>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr data-id='<?php echo e($item->id); ?>'>
                                    <td>
                                        <?php echo e($loop->iteration); ?>

                                    </td>

                                    <td><?php echo e($item->name); ?></td>
                                    <td><?php echo e($item->email); ?></td>
                                    <td><?php echo e($item->level ? $item->level : ""); ?></td>

                                    <?php if(auth()->user()->level == 'Admin'): ?>
                                        <td class="text-center">
                                            <a class="badge badge-primary"
                                               href="<?php echo e(url('/user/' . $item->id . '/edit')); ?>">Edit</a>
                                            <form action="<?php echo e(url('/user' . '/' . $item->id)); ?>"
                                                  method='post' style='display: inline;'
                                                  onsubmit="return confirm('Yakin akan menghapus data ini?')">
                                                <?php echo method_field('DELETE'); ?>
                                                <?php echo csrf_field(); ?>
                                                <label class="badge badge-danger" href=""
                                                       for='btnSubmit-<?php echo e($item->id); ?>'
                                                       style='cursor: pointer;'>Hapus</label>
                                                <button type="submit" id='btnSubmit-<?php echo e($item->id); ?>'
                                                        style="display: none;"></button>
                                            </form>
                                        </td>
                                    <?php endif; ?>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const locationHrefHapusSemua = "<?php echo e(url('user/hapus_semua')); ?>";
        const locationHrefAktifkanSemua = "<?php echo e(url('user/aktifkan_semua')); ?>";
        const locationHrefCreate = "<?php echo e(url('user/create')); ?>";

        <?php if(auth()->user()->level == 'Admin'): ?>
        var columnOrders = [<?php echo e($user_count - 2); ?>];
        <?php else: ?>
        var columnOrders = [<?php echo e($user_count - 3); ?>];
        <?php endif; ?>

        var urlSearch = "<?php echo e(url('user')); ?>";
        var q = "<?php echo e($_GET['q'] ?? ''); ?>";
        var placeholder = "Filter...";

        <?php if(auth()->user()->level == 'Admin'): ?>
        var tampilkan_buttons = false;
        var button_manual = false;
        <?php else: ?>
        var tampilkan_buttons = false;
        var button_manual = false;
        <?php endif; ?>
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\bikinaplikasi\project\40. ebi\perpustakaan\resources\views/user/index.blade.php ENDPATH**/ ?>
