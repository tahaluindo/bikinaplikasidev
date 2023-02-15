<?php $__env->startSection('content'); ?>
    <div class="content-header sty-one">
        <h1>Pengembalian</h1>
        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li><i class="fa fa-angle-right"></i> Pengembalian</li>
        </ol>
    </div>

    <div class="content">
        <div class="row">

            <div class="col-xl-12">
                <div class="info-box">
                    <div class="table-responsive">
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


<?php echo $__env->make('layouts.app2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/perpustakaan-febriadi.bikinaplikasi.dev/resources/views/pengembalian/index.blade.php ENDPATH**/ ?>