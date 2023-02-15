<?php $__env->startSection('judul-laporan'); ?>
    <h3 align="center">LAPORAN PEMINJAMAN BUKU</h3>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('periode-laporan'); ?>
    <h3 align="center"><?php echo e(\Carbon\Carbon::parse($tanggal_awal)->format("d-F-Y")); ?>

        S/d <?php echo e(\Carbon\Carbon::parse($tanggal_akhir)->format("d-F-Y")); ?></h3>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <table width="100%" border="1" style='margin-bottom: 250px;'>
        <thead>
        <tr>
            <th width=3>No.</th>
            <th>Nama anggota</th>
            <th>Nama petugas</th>
            <th>Tanggal Peminjaman</th>
            <th>Tanggal Pengembalian</th>
            <th>Hari Telat</th>
            <th>Status</th>
        </tr>
        </thead>

        <tbody>
        <?php $__currentLoopData = $peminjamans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $peminjaman): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <th><?php echo e($loop->iteration); ?>.</th>
                <td>
                    <?php echo e($peminjaman->anggota->nama); ?> <br>

                    <?php $__currentLoopData = $peminjaman->detail_peminjaman; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <ul style="margin: 5px 0;">
                            <li> <?php echo e($item->buku->judul); ?> </li>
                        </ul>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </td>

                <td><?php echo e($peminjaman->user_petugas->name); ?></td>
                <td><?php echo e(Carbon\Carbon::parse($peminjaman->created_at)->format('d-m-Y')); ?></td>
                <td><?php echo e(Carbon\Carbon::parse($peminjaman->tanggal_pengembalian)->format('d-m-Y')); ?></td>

                <td>
                    <?php if($peminjaman->status == 'Berlangsung' && $peminjaman->tanggal_pengembalian < date("d-m-Y")): ?>
                        <?php echo e(now()->diffInDays(Carbon\Carbon::parse($peminjaman->tanggal_pengembalian))); ?>

                    <?php else: ?>
                        0
                    <?php endif; ?>
                </td>
                <td><?php echo e($peminjaman->status); ?></td>

            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.print', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\bikinaplikasi\project\setup_server_default\sites\perpustakaan-hendra.bikinaplikasi.dev\resources\views/peminjaman/laporan/print.blade.php ENDPATH**/ ?>