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
                                    <li><span class="bread-blod">Pengembalian</span>
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
                                        <th>Peminjaman Id</th>
                                        <th>Tanggal</th>
                                        <th>Denda Terlambat</th>
                                        <th>Tanggal Peminjaman</th>
                                        <th>Tanggal Jatuh Tempo</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $__currentLoopData = $pengembalian; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr data-id='<?php echo e($item->id); ?>'>
                                            <td>
                                                <?php echo e($loop->iteration); ?>

                                            </td>

                                            <td><?php echo e($item->peminjaman->anggota->nama); ?></td>
                                            <td><?php echo e($item->tanggal); ?></td>
                                            <td><?php echo e(toIdr($item->denda_terlambat)); ?></td>
                                            <td><?php echo e($item->peminjaman->tanggal); ?></td>
                                            <td><?php echo e($item->peminjaman->tanggal_pengembalian); ?></td>

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
        const locationHrefHapusSemua = "<?php echo e(url('pengembalian/hapus_semua')); ?>";
        const locationHrefAktifkanSemua = "<?php echo e(url('pengembalian/aktifkan_semua')); ?>";
        const locationHrefCreate = "<?php echo e(url('pengembalian/create')); ?>";
        var columnOrders = [<?php echo e($pengembalian_count - 2); ?>];
        var urlSearch = "<?php echo e(url('pengembalian')); ?>";
        var q = "<?php echo e($_GET['q'] ?? ''); ?>";
        var placeholder = "Filter...";
        var tampilkan_buttons = false;
        var button_manual = false;


    </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\bikinaplikasi\project\setup_server_default\sites\perpustakaan-hendra.bikinaplikasi.dev\resources\views/pengembalian/index.blade.php ENDPATH**/ ?>