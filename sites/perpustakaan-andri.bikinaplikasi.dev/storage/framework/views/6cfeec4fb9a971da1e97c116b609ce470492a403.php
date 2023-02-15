<?php $__env->startSection('judul-laporan'); ?>
<h3 align="center">LAPORAN PENGEMBALIAN BUKU</h3>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('periode-laporan'); ?>
<h3 align="center"><?php echo e(\Carbon\Carbon::parse($tanggal_awal)->format("d-F-Y")); ?> S/d <?php echo e(\Carbon\Carbon::parse($tanggal_akhir)->format("d-F-Y")); ?></h3>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<table width="100%" border="1" style='margin-bottom: 250px;'>
    <thead>
        <tr>
            <th width=3>No.</th>
            <th>Peminjaman Id</th>
            <th>Tanggal</th>
            <th>Denda Terlambat</th>
            <th>Tanggal Peminjaman</th>
            <th>Tanggal Jatuh Tempo</th>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $pengembalians; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr data-id='<?php echo e($item->id); ?>'>
            <td>
                <?php echo e($loop->iteration); ?>

            </td>

            <td>
                <?php echo e($item->peminjaman->anggota->nama); ?>


                <?php $__currentLoopData = $item->peminjaman->detail_peminjaman; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail_peminjaman_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <ul style="margin: 5px 0;">
                        <li> <?php echo e($detail_peminjaman_item->buku->judul); ?> </li>
                    </ul>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </td>

            <td><?php echo e($item->tanggal); ?></td>
            <td><?php echo e(toIdr($item->denda_terlambat ?? 0)); ?></td>
            <td><?php echo e($item->peminjaman->tanggal); ?></td>
            <td><?php echo e($item->peminjaman->tanggal_pengembalian); ?></td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.print', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\perpustakaan-andri.bikinaplikasi.dev\resources\views/pengembalian/laporan/print.blade.php ENDPATH**/ ?>