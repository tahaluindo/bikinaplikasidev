<?php $__env->startSection('judul-laporan'); ?>
<h3 align="center">LAPORAN ANGGOTA</h3>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<h3 align="center">LAPORAN ANGGOTA</h3>

<table width="100%" border="1" style='margin-bottom: 250px;'>
    <thead>
        <tr>
            <th width=3>No.</th>
            <th>No identitas</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Alamat</th>
            <th>No Telepon</th>
            <th>Status</th>
            <th>Dibuat</th>
        </tr>
    </thead>

    <tbody>
        <?php $__currentLoopData = $anggotas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $anggota): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <th><?php echo e($loop->iteration); ?>.</th>
            <td><?php echo e($anggota->no_identitas); ?></td>
            <td><?php echo e($anggota->nama); ?></td>
            <td><?php echo e($anggota->jenis_kelamin); ?></td>
            <td><?php echo e($anggota->alamat); ?></td>
            <td><?php echo e($anggota->no_telepon); ?></td>
            <td><?php echo e($anggota->status); ?></td>
            <td><?php echo e($anggota->dibuat); ?></td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.print', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\bikinaplikasi\project\setup_server_default\sites\perpustakaan-hendra.bikinaplikasi.dev\resources\views/anggota/laporan/print.blade.php ENDPATH**/ ?>