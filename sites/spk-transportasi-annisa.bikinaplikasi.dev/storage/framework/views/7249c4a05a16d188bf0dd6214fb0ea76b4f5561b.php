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
                                    <li><span class="bread-blod">survey</span>
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
            <form class="form-horizontal form-material" action="<?php echo e(url('/survey')); ?>"
                  method="post" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <div class="product-sales-chart">
                            <div style="padding: 20px !important;">

                                <div class="form-group <?php echo e($errors->has('nama') ? 'has-error' : ''); ?>">
                                    <strong>Dalam pemilihan kriteria mana yang lebih penting bagi responden dari
                                        perbandingan
                                        kriteria-kriteria dibawah dalam
                                        penggunaan Aplikasi Transportasi Roda Dua berbasis Online ?</strong>
                                </div>

                                <?php $__currentLoopData = $kriteria->sortBy('urutan_prioritas')->values(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $kriteriaItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="form-group <?php echo e($errors->has('status') ? 'has-error' : ''); ?>">

                                        <div class="col-md-12">
                                            <select name="kriteria_id[<?php echo e($kriteriaItem->id); ?>]"
                                                    class="form-control form-control-line"
                                                    id="kriteria_id[<?php echo e($kriteriaItem->id); ?>]" required>
                                                <option
                                                    value="">-- PILIH RANKING <?php echo e($key + 1); ?> --
                                                </option>

                                                <?php $__currentLoopData = $kriteria->sortBy('urutan_prioritas')->values(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key2 => $kriteriaItem2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option
                                                        value="<?php echo e($key2 + 1); ?>" <?php echo e(old("kriteria_id.$kriteriaItem->id") == $key2 + 1 ? 'selected' : ''); ?>><?php echo e($kriteriaItem2->nama); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>

                                            <?php $__errorArgs = ["kriteria_id." . ($kriteriaItem->id)];
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
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <div class="product-sales-chart">
                            <div style="padding: 20px !important;">


                                <?php $__currentLoopData = $kriteria->sortBy('urutan_prioritas')->values(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keyKriteria => $itemKriteria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="form-group <?php echo e($errors->has('nama') ? 'has-error' : ''); ?>">
                                        <strong><?php echo e($itemKriteria->nama); ?> Siapa yang terbaik?</strong>
                                    </div>
                                    <?php $__currentLoopData = $alternatif->sortBy('urutan_prioritas')->values(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keyAlternatif => $itemAlternatif): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="form-group <?php echo e($errors->has('status') ? 'has-error' : ''); ?>">

                                            <div class="col-md-12">
                                                <select
                                                    name="alternatif_id[<?php echo e($itemKriteria->id); ?>][<?php echo e($itemAlternatif->id); ?>]"
                                                    class="form-control form-control-line"
                                                    id="alternatif_id[<?php echo e($itemKriteria->id); ?>][<?php echo e($itemAlternatif->id); ?>]"
                                                    required>
                                                    <option
                                                        value="">-- PILIH RANKING <?php echo e($keyAlternatif + 1); ?> --
                                                    </option>

                                                    <?php $__currentLoopData = $alternatif->sortBy('urutan_prioritas')->values(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keyAlternatif2 => $itemAlternatif2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option
                                                            value="<?php echo e($keyAlternatif2 + 1); ?>" <?php echo e(old("alternatif_id.$itemKriteria->id." . ($itemAlternatif->id)) ==  $keyAlternatif2 + 1 ? 'selected' : ''); ?>><?php echo e($itemAlternatif2->nama); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>

                                                <?php $__errorArgs = ["alternatif_id.$itemKriteria->id."  . ($itemAlternatif->id)];
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
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <button class="btn btn-success" type="submit">Dapatkan Rekomendasi >>></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\bikinaplikasi\project\setup_server_default\sites\spk-transportasi-annisa.bikinaplikasi.dev\resources\views/survey/create.blade.php ENDPATH**/ ?>