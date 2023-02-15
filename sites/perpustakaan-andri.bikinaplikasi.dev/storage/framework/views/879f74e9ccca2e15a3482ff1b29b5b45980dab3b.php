<?php $__env->startSection('judul-laporan'); ?>
<h3 align="center">LAPORAN BUKU</h3>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('periode-laporan'); ?>
<h3 align="center"><?php echo e(\Carbon\Carbon::parse($tanggal_awal)->format("Y-F-d")); ?> S/d <?php echo e(\Carbon\Carbon::parse($tanggal_akhir)->format("Y-F-d")); ?></h3>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<h3 align="center">LAPORAN BUKU</h3>

<table width="100%" border="1" style='margin-bottom: 250px;'>
    <thead>
        <tr>
            <th width=3>No.</th>
            <th>Kode Buku</th>
            <th>Judul</th>
            <th>Penulis</th>
            <th>Penerbit</th>
            <th>Tahun</th>
            <th>Kota</th>
            <th>Stok</th>
            <th>Ditambahkan</th>
        </tr>
    </thead>

    <tbody>
        <?php $__currentLoopData = $bukus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $buku): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <th><?php echo e($loop->iteration); ?>.</th>

            <td><?php echo e($buku->kode_buku); ?> <?php echo e($kode_buku->where('kode_start', "<=", $buku->kode_buku)->where('kode_end', ">=", $buku->kode_buku)->first() ? "(Ket: " . $kode_buku->where('kode_start', "<=", $buku->kode_buku)->where('kode_end', ">=", $buku->kode_buku)->first()->keterangan . ' | Rak: ' . $kode_buku->where('kode_start', "<=", $buku->kode_buku)->where('kode_end', ">=", $buku->kode_buku)->first()->lokasi_rak . ")" : ""); ?></td>
            <td><?php echo e($buku->judul); ?></td>

            <td><?php echo e($buku->penulis); ?></td>

            <td><?php echo e($buku->penerbit); ?></td>

            <td><?php echo e($buku->tahun); ?></td>

            <td><?php echo e($buku->kota); ?></td>

            <td><?php echo e($buku->stok); ?></td>

            <td><?php echo e($buku->ditambahkan); ?></td>

        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.print', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\bikinaplikasi\project\setup_server_default\sites\perpustakaan-andri.bikinaplikasi.dev\resources\views/buku/laporan/print.blade.php ENDPATH**/ ?>