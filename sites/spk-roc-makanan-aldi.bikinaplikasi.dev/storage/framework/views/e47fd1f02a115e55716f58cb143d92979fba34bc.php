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

                            <div class="row">
                                <div class="col-md-6">
                                    <h3>Nilai Qi</h3>
                                </div>
                                <div class="col-md-6">
                                    <input class='btn btn-success btn-lg' type="button" onclick="printDiv('printableArea')"
                                        value="Cetak Data" style="float: right;">

                                </div>
                            </div>
                            <div id="printableArea">
                                <table class="table" id=''>
                                    <thead>
                                        <tr>
                                            <th width=2>Ranking</th>
                                            <th>Brand</th>
                                            <th>Genre</th>
                                            <th>Perkalian</th>
                                            <th>Exponential</th>
                                            <th>Nilai Qi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = collect($perangkingan)->sortByDesc('hasil'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $itemPerangkingan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr data-id=''>
                                                <td>
                                                    <?php echo e($loop->iteration); ?>

                                                </td>

                                                <td><?php echo e($itemPerangkingan['namaAlternatif']); ?></td>
                                                <td><?php echo e($itemPerangkingan['genre']); ?></td>
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

<?php echo $__env->make('layouts.app2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\bikinaplikasi\project\setup_server_default\sites\spk-roc-makanan-aldi.bikinaplikasi.dev\resources\views/perhitungan/hasil_akhir.blade.php ENDPATH**/ ?>