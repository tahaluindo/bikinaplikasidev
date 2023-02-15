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
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="product-sales-chart">
                        <div style="padding: 20px !important;">

                            <h3>Matrix Pencocokan Kriteria</h3>
                            <table class="table" id='dataTable1'>
                                <thead>
                                    <tr>
                                        <th width=2>#</th>
                                        <th>Alternatif</th>

                                        <?php $__currentLoopData = $kriteria->sortBy('urutan_prioritas'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kriteriaItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <th><?php echo e($kriteriaItem->kode); ?></th>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $matrixPencocokanKriteria; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $itemMatrixPencocokanKriteria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr data-id=''>
                                            <td>
                                                <?php echo e($loop->iteration); ?>

                                            </td>

                                            <td><?php echo e($itemMatrixPencocokanKriteria['namaAlternatif']); ?></td>

                                            <?php $__currentLoopData = $kriteria->sortBy('urutan_prioritas'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kriteriaItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <td><?php echo e($itemMatrixPencocokanKriteria["$kriteriaItem->kode"]); ?></td>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>




            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="product-sales-chart">
                        <div style="padding: 20px !important;">

                            <h3>Matrix Normalisasi</h3>
                            <table class="table" id='dataTable2'>
                                <thead>
                                    <tr>
                                        <th width=2>#</th>
                                        <th>Alternatif</th>

                                        <?php $__currentLoopData = $kriteria->sortBy('urutan_prioritas'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kriteriaItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <th><?php echo e($kriteriaItem->kode); ?></th>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $matrixPencocokanKriteria; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $itemMatrixPencocokanKriteria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr data-id=''>
                                            <td>
                                                <?php echo e($loop->iteration); ?>

                                            </td>

                                            <td><?php echo e($itemMatrixPencocokanKriteria['namaAlternatif']); ?></td>

                                            <?php $__currentLoopData = $normalisasiMatrixKeputusan[$key]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $normalisasiMatrixKeputusanItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <td><?php echo e($normalisasiMatrixKeputusanItem); ?></td>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>



            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="product-sales-chart">
                        <div style="padding: 20px !important;">

                            <h3>Bobot Kriteria</h3>
                            <table class="table" id='dataTable3'>
                                <thead>
                                    <tr>
                                        <?php $__currentLoopData = $kriteria->sortBy('urutan_prioritas'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kriteriaItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <th><?php echo e($kriteriaItem->kode); ?></th>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr data-id=''>
                                        <?php $__currentLoopData = $pembobotanKriteria; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $itemPembobotanKriteria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <td>
                                                <?php echo e($itemPembobotanKriteria); ?>

                                            </td>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="product-sales-chart">
                        <div style="padding: 20px !important;">

                            <h3>Nilai Qi</h3>
                            <table class="table" id='dataTable4'>
                                <thead>
                                    <tr>
                                        <th width=2>#</th>
                                        <th>Keterangan</th>
                                        <th>Perkalian</th>
                                        <th>Exponential</th>
                                        <th>Nilai Qi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = collect($perangkingan); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $itemPerangkingan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr data-id=''>
                                            <td>
                                                <?php echo e($loop->iteration); ?>

                                            </td>

                                            <td><?php echo e($itemPerangkingan['namaAlternatif']); ?></td>
                                            <td><?php echo e($itemPerangkingan['perkalian']); ?></td>
                                            <td><?php echo e($itemPerangkingan['exponential']); ?></td>
                                            <td><?php echo e($itemPerangkingan['hasil']); ?></td>
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

    <script>
        const locationHrefHapusSemua = "<?php echo e(url('perhitungan/hapus_semua')); ?>";
        const locationHrefAktifkanSemua = "<?php echo e(url('perhitungan/aktifkan_semua')); ?>";
        const locationHrefCreate = "<?php echo e(url('perhitungan/create')); ?>";
        var columnOrders = [0];
        var urlSearch = "<?php echo e(url('perhitungan')); ?>";
        var q = "<?php echo e($_GET['q'] ?? ''); ?>";
        var placeholder = "Filter...";
        var tampilkan_buttons = false;
        var button_manual = false;
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\bikinaplikasi\project\setup_server_default\sites\spk-roc-makanan-aldi.bikinaplikasi.dev\resources\views/perhitungan/index.blade.php ENDPATH**/ ?>