<?php $__env->startSection('content'); ?>

<h3 align="center">LAPORAN PEMINJAMAN</h3>

<table width="100%" border="1" style='margin-bottom: 250px;'>
    <thead>
        <tr>
            <th width=3>No.</th>
            <th>Anggota Id</th>
            <th>User Petugas Id</th>
            <th>Tanggal</th>
            <th>Tanggal Pengembalian</th>
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

            <td><?php echo e($peminjaman->tanggal); ?></td>

            <td><?php echo e($peminjaman->tanggal_pengembalian); ?></td>

            <td><?php echo e($peminjaman->status); ?></td>

        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.print', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/perpustakaan-febriadi.bikinaplikasi.dev/resources/views/peminjaman/laporan/print.blade.php ENDPATH**/ ?>