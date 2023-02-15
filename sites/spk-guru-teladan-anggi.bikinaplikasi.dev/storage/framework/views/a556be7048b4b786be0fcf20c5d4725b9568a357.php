<?php $__env->startSection('page-info'); ?>
    <div class="breadcome-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="breadcome-list">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <ul class="breadcome-menu">
                                    <li><a href="<?php echo e(url('')); ?>/#">Home</a> <span class="bread-slash">/</span>
                                    </li>
                                    <li><span class="bread-blod">perhitungan</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="product-sales-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" style="margin-bottom: 30px">
                    <div class="product-sales-chart">
                        <div style="padding: 20px !important;" class="table-responsive">

                            <h4 class="text-center"><u>Penilaian Guru</u>
                            </h4>

                            <table class="table" id='dataTable'>
                                <thead>
                                <tr>
                                    <th width=2>#</th>
                                    <th>Nama</th>
                                    <?php $__currentLoopData = $kriteria->sortByDesc('nilai')->values(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                        <th title="<?php echo e($item->nama); ?>">K<?php echo e($loop->iteration); ?></th>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $alternatif; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr data-id='<?php echo e($item->id); ?>'>
                                        <td>
                                            <?php echo e($loop->iteration); ?>

                                        </td>

                                        <td><?php echo e($item->nama); ?></td>

                                        <?php $__currentLoopData = $kriteria->sortByDesc('nilai')->values(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $itemKriteria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <td><?php echo e($item->alternatif_details->where('kriteria_detail.kriteria_id', $itemKriteria->id)->first()->kriteria_detail->nilai); ?></td>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" style="margin-bottom: 30px">
                    <div class="product-sales-chart">
                        <div style="padding: 20px !important;" class="table-responsive">

                            <h4 class="text-center"><u>Normalisasi Bobot</u>
                            </h4>

                            <table class="table" id='dataTable'>
                                <thead>
                                <tr>
                                    <th width=2>#</th>
                                    <th>Nama</th>
                                    <th>Nilai</th>
                                    <th>Normalisasi Bobot</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $kriteria->sortByDesc('nilai'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr data-id='<?php echo e($item->id); ?>'>
                                        <td>
                                            <?php echo e($loop->iteration); ?>

                                        </td>

                                        <td><?php echo e($item->nama); ?></td>
                                        <td><?php echo e($item->nilai); ?></td>
                                        <td><?php echo e($item->nilai / $kriteria->sum('nilai')); ?></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <tr data-id='<?php echo e($item->id); ?>'>
                                    <td>

                                    </td>

                                    <td></td>
                                    <td><b><?php echo e($kriteria->sum('nilai')); ?></b></td>
                                    <td></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" style="margin-bottom: 30px">
                    <div class="product-sales-chart">
                        <div style="padding: 20px !important;" class="table-responsive">

                            <h4 class="text-center"><u>Utility Matriks</u>
                            </h4>

                            <table class="table" id='dataTable'>
                                <thead>
                                <tr>
                                    <th width=2>#</th>
                                    <th>Nama</th>
                                    <?php $__currentLoopData = $kriteria->sortBy('nilai')->values(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <th title="<?php echo e($item->nama); ?>">K<?php echo e($loop->iteration); ?></th>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $alternatif; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr data-id='<?php echo e($item->id); ?>'>
                                        <td>
                                            <?php echo e($loop->iteration); ?>

                                        </td>

                                        <td><?php echo e($item->nama); ?></td>

                                        <?php $__currentLoopData = $kriteria->sortByDesc('nilai')->values(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $itemKriteria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <td><?php echo e(($item->alternatif_details->where('kriteria_detail.kriteria_id', $itemKriteria->id)->first()->kriteria_detail->nilai - $alternatif_details->where('kriteria_detail.kriteria_id', $itemKriteria->id)->min('kriteria_detail.nilai')) / ($alternatif_details->where('kriteria_detail.kriteria_id', $itemKriteria->id)->max('kriteria_detail.nilai') - $alternatif_details->where('kriteria_detail.kriteria_id', $itemKriteria->id)->min('kriteria_detail.nilai'))); ?></td>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" style="margin-bottom: 30px; margin-top: -420px;">
                    <div class="product-sales-chart">
                        <div style="padding: 20px !important;" class="table-responsive">

                            <h4 class="text-center"><u>Hasil</u>
                            </h4>

                            <table class="table" id='dataTable'>
                                <thead>
                                <tr>
                                    <th width=2>#</th>
                                    <th>Nama</th>
                                    <?php $__currentLoopData = $kriteria->sortBy('nilai')->values(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <th title="<?php echo e($item->nama); ?>">K<?php echo e($loop->iteration); ?></th>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <th>Total</th>
                                    <th>Ranking</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $alternatif->sortByDesc('total'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr data-id='<?php echo e($item->id); ?>'>
                                        <td>
                                            <?php echo e($loop->iteration); ?>

                                        </td>

                                        <td><?php echo e($item->nama); ?></td>

                                        <?php $__currentLoopData = $kriteria->sortByDesc('nilai')->values(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $itemKriteria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <td><?php echo e(($item->alternatif_details->where('kriteria_detail.kriteria_id', $itemKriteria->id)->first()->kriteria_detail->nilai - $alternatif_details->where('kriteria_detail.kriteria_id', $itemKriteria->id)->min('kriteria_detail.nilai')) / ($alternatif_details->where('kriteria_detail.kriteria_id', $itemKriteria->id)->max('kriteria_detail.nilai') - $alternatif_details->where('kriteria_detail.kriteria_id', $itemKriteria->id)->min('kriteria_detail.nilai')) * $alternatif_details->where('kriteria_detail.kriteria_id', $itemKriteria->id)->first()->kriteria_detail->kriteria->nilai / $kriteria->sum('nilai')); ?></td>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <td><?php echo e($item->total); ?></td>
                                        <td><?php echo e($loop->iteration); ?></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>





<?php echo $__env->make('layouts.app2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\bikinaplikasi\project\setup_server_default\sites\spk-guru-teladan-anggi.bikinaplikasi.dev\resources\views/perhitungan/show.blade.php ENDPATH**/ ?>