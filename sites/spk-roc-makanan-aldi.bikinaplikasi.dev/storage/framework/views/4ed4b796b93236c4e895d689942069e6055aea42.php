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
                            <label for="status" class="control-label"><?php echo e('Comunale Id'); ?></label>

                            <div class="col-md-12">
                                <select name="comunale_id" class="form-control form-control-line" id="comunale_id">
                                    <option value=""
                                        <?php echo e(old('comunale_id') == '' || request()->comunale_id == '' ? 'selected' : ''); ?>>--
                                        Semua --</option>
                                    <?php $__currentLoopData = $comunale; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($item->id); ?>"
                                            <?php echo e(old('comunale_id') == $item->id || request()->comunale_id == $item->id ? 'selected' : ''); ?>>
                                            <?php echo e($item->nama); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>

                                <?php $__errorArgs = ['comunale_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback text-danger" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>


                            </div>
                        </div>
                    </div>
                </div>
            </div>

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
                                            <?php if(request()->comunale_id ): ?>
                                            <?php if($itemPerangkingan['comunale_id'] == request()->comunale_id): ?>
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
                                            <?php endif; ?>
                                            <?php else: ?>
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
                                            <?php endif; ?>
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

<?php echo $__env->make('layouts.app2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\bikinaplikasi\project\setup_server_default\sites\spk-roc-makanan-aldi.bikinaplikasi.dev\resources\views/perhitungan/hasil_akhir_comunale.blade.php ENDPATH**/ ?>