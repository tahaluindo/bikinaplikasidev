<?php $__env->startSection('content'); ?>

    <h3 align="center">LAPORAN ANGGOTA</h3>

    <table width="100%" border="1" style='margin-bottom: 250px;'>
        <thead>
        <tr>
            <th width=3>No.</th>
            <th>No identitas</th>
            <th>Email</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Alamat</th>
            <th>No Telepon</th>
            <th>Status</th>
            <th>Level</th>
            <th>Dibuat</th>
        </tr>
        </thead>

        <tbody>
        <?php $__currentLoopData = $anggotas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $anggota): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td>
                    <?php echo e($loop->iteration); ?>

                </td>

                <td><?php echo e($item->no_identitas); ?></td>
                <td><?php echo e($item->user ? $item->user->email : ""); ?></td>
                <td><?php echo e($item->nama); ?></td>
                <td><?php echo e($item->jenis_kelamin); ?></td>
                <td><?php echo e($item->alamat); ?></td>
                <td><?php echo e($item->no_telepon); ?></td>
                <td><?php echo e($item->status); ?></td>
                <td><?php echo e($item->user ? $item->user->level : ""); ?></td>
                <td><?php echo e(\Carbon\Carbon::parse($item->dibuat)->format('d-M-Y')); ?></td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.print', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/perpustakaan-febriadi.bikinaplikasi.dev/resources/views/anggota/laporan/print.blade.php ENDPATH**/ ?>