<?php $__env->startSection('page-info'); ?>
    <div class="breadcome-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="breadcome-list">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <ul class="breadcome-menu">
                                    <li><a href="<?php echo e(url('')); ?>/#">Home</a> <span class="bread-slash">/</span>
                                    </li>
                                    <li><span class="bread-blod">Kriteria</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="product-sales-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="product-sales-chart">
                        <div style="padding: 20px !important;">

                            <table class="table" id='dataTable'>
                                <thead>
                                <tr>
                                    <th width=2>#</th>
                                    <th>Nama</th>
                                    <th>Urutan Prioritas</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $kriteria->sortBy('urutan_prioritas')->values(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr data-id='<?php echo e($item->id); ?>'>
                                        <td>
                                            <?php echo e($loop->iteration); ?>

                                        </td>

                                        <td><?php echo e($item->nama); ?></td>
                                        <td><?php echo e($item->urutan_prioritas); ?></td>
                                        <td class="text-center">

                                            <a class="badge badge-primary"
                                               href="<?php echo e(url('/kriteria-detail?kriteria_id=' . $item->id)); ?>">Detail</a>

                                            <a class="badge badge-primary"
                                               href="<?php echo e(url('/kriteria/' . $item->id . '/edit')); ?>">Edit</a>

                                            <form action="<?php echo e(url('/kriteria' . '/' . $item->id)); ?>" method='post'
                                                  style='display: inline;'
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

    <script>
        const locationHrefHapusSemua = "<?php echo e(url('kriteria/hapus_semua')); ?>";
        const locationHrefAktifkanSemua = "<?php echo e(url('kriteria/aktifkan_semua')); ?>";
        const locationHrefCreate = "<?php echo e(url('kriteria/create')); ?>";
        var columnOrders = [<?php echo e($kriteria_count - 5); ?>];
        var urlSearch = "<?php echo e(url('kriteria')); ?>";
        var q = "<?php echo e($_GET['q'] ?? ''); ?>";
        var placeholder = "Filter...";
        var tampilkan_buttons = true;
        var button_manual = true;
    </script>
<?php $__env->stopSection(); ?>





<?php echo $__env->make('layouts.app2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\bikinaplikasi\project\setup_server_default\sites\spk-ahp-beasiswa-as.bikinaplikasi.dev\resources\views/kriteria/index.blade.php ENDPATH**/ ?>