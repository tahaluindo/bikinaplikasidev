<?php $__env->startSection('judul-laporan'); ?>
    <h3 align="center">LAPORAN perhitungan <?php echo e($perhitungan->nama); ?></h3>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <table width="100%" border="1" style='margin-bottom: 250px;'>
        <thead>
        <thead>
        <tr>
            <th width=2>#</th>
            <th>Nama</th>
            <?php $__currentLoopData = $kriteria->sortBy('urutan_prioritas')->values(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <th title="<?php echo e($item->nama); ?>"><?php echo e($item->nama); ?></th>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <th>Total</th>
            <th>Ranking</th>
        </tr>
        </thead>
        <tbody>
        <?php $__currentLoopData = $alternatif->sortByDesc('nilai_kriteria_total')->values(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr data-id='<?php echo e($item->id); ?>'>
                <td>
                    <?php echo e($loop->iteration); ?>

                </td>

                <td><?php echo e($item->nama); ?></td>

                <?php $__currentLoopData = $item->nilai_kriteria; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $itemNilaiKriteria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <td><?php echo e($itemNilaiKriteria); ?></td>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <td><?php echo e($item->nilai_kriteria_total); ?></td>
                <th><?php echo e($loop->iteration); ?></th>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.print', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\bikinaplikasi\project\setup_server_default\sites\spk-transportasi-annisa.bikinaplikasi.dev\resources\views/perhitungan/laporan/print.blade.php ENDPATH**/ ?>