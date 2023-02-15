<?php $__env->startSection('content'); ?>

    <h3 align="center">
        LAPORAN <?php echo e(ucwords(preg_replace('/[^a-zA-Z]/', ' ', \Illuminate\Support\Facades\Request::segment(1)))); ?></h3>

    <table class="table" width="100%" border="1" style='margin-bottom: 250px;'>
        <thead>
        <tr>
            <th width=2>#</th>
            <th>User</th>
            <th>Mobil</th>
            <th>Supir</th>
            <th>Dari Tanggal</th>
            <th>Sampai Tanggal</th>
            <th>B. Supir</th>
            <th>Total Bayar</th>
            <th>B. Transfer</th>
            <th>Refund</th>
            <th>Status</th>
        </tr>
        </thead>
        <tbody>
        <?php $__currentLoopData = $rental_mobils; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr data-id='<?php echo e($item->id); ?>'>
                <td>
                    <?php echo e($loop->iteration); ?>

                </td>

                <td><?php echo e($item->user->name ?? ""); ?></td>
                <td><?php echo e($item->mobil->nama); ?></td>
                <td><?php echo e($item->supir->name ?? ""); ?></td>
                <td><?php echo e($item->dari_tanggal); ?></td>
                <td><?php echo e($item->sampai_tanggal); ?></td>
                <td><?php echo e($item->biaya_supir); ?></td>
                <td><?php echo e(toIdr($item->total_bayar)); ?></td>
                <td>
                    <a href="<?php echo e(url($item->bukti_transfer)); ?>">
                        <img src="<?php echo e(url($item->bukti_transfer)); ?>" width="100">
                    </a>
                </td>
                <td><?php echo e(toIdr($item->refund)); ?></td>
                <td><?php echo e($item->status); ?></td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.print', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\bikinaplikasi\project\setup_server_default\sites\reservasi-dan-travel-skytravelink.bikinaplikasi.dev\resources\views/rental-mobil/laporan/print.blade.php ENDPATH**/ ?>