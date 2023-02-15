<?php $__env->startSection('content'); ?>

    <h3 align="center">
        LAPORAN <?php echo e(ucwords(preg_replace('/[^a-zA-Z]/', ' ', \Illuminate\Support\Facades\Request::segment(1)))); ?></h3>
    <h3 align="center">Periode <?php echo e($tanggal_awal); ?> - <?php echo e($tanggal_akhir); ?></h3>
    
    <table class="table" width="100%" border="1" style='margin-bottom: 250px;'>
        <thead>
        <tr>
            <th width=2>#</th>
            <th>User Id</th>
            <th>Paket Id</th>
            <th>Rute Id</th>
            <th>Jadwal Id</th>
            <th>Jumlah (KG)</th>
            <th>Total Bayar</th>
            <th>Refund</th>
            <th>Status</th>
            <th>Catatan</th>
        </tr>
        </thead>
        <tbody>
        <?php $__currentLoopData = $pengiriman_pakets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr data-id='<?php echo e($item->id); ?>'>
                <td>
                    <?php echo e($loop->iteration); ?>

                </td>

                <td><?php echo e($item->user->name ?? ""); ?></td>
                <td><?php echo e($item->paket->nama); ?></td>
                <td><?php echo e($item->rute->dari()->nama); ?> - <?php echo e($item->rute->ke()->nama); ?></td>
                <td><?php echo e($item->jadwal->hari); ?> - <?php echo e($item->jadwal->jam_mulai); ?> - <?php echo e($item->jadwal->jam_akhir); ?> </td>
                <td><?php echo e($item->jumlah); ?></td>
                <td><?php echo e(toIdr($item->total_bayar)); ?></td>
                <td><?php echo e(toIdr($item->refund)); ?></td>
                <td><?php echo e($item->status); ?></td>
                <td><?php echo e($item->catatan); ?></td>

            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.print', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\bikinaplikasi\project\setup_server_default\sites\pengiriman-paket-yandi.bikinaplikasi.dev\resources\views/pengiriman-paket/laporan/print.blade.php ENDPATH**/ ?>