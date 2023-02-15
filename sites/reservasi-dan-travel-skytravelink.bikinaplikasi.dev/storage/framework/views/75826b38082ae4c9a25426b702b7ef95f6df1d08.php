<?php $__env->startSection('content'); ?>

    <h3 align="center">
        LAPORAN <?php echo e(ucwords(preg_replace('/[^a-zA-Z]/', ' ', \Illuminate\Support\Facades\Request::segment(1)))); ?></h3>

    <table class="table" width="100%" border="1" style='margin-bottom: 250px;'>
        <thead>
        <tr>
            <th width=2>#</th>
            <th>User</th>
            <th>Tiket</th>
            <th>Jumlah</th>
            <th>B. Pada</th>
            <th>B. Transfer</th>
            <th>Pulang Pergi</th>
            <th>Total Bayar</th>
            <th>Refund</th>
            <th>Status</th>
        </tr>
        </thead>
        <tbody>
        <?php $__currentLoopData = $reservasi_tikets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr data-id='<?php echo e($item->id); ?>'>
                <td>
                    <?php echo e($loop->iteration); ?>

                </td>

                <td><?php echo e($item->user->name ?? ""); ?></td>
                <td><?php echo e($item->tiket->nama); ?></td>
                <td><?php echo e($item->jumlah); ?></td>
                <td><?php echo e($item->berakhir_pada); ?></td>
                <td>
                    <a href="<?php echo e(url($item->bukti_transfer)); ?>">
                        <img src="<?php echo e(url($item->bukti_transfer ?? "image/no_image.png")); ?>" width="100">
                    </a>
                </td>
                <td><?php echo e($item->pulang_pergi); ?></td>
                <td><?php echo e(toIdr($item->total_bayar)); ?></td>
                <td><?php echo e(toIdr($item->refund)); ?></td>
                <td><?php echo e($item->status); ?></td>

            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.print', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\bikinaplikasi\project\setup_server_default\sites\reservasi-dan-travel-skytravelink.bikinaplikasi.dev\resources\views/reservasi-tiket/laporan/print.blade.php ENDPATH**/ ?>