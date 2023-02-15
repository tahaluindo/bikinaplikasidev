<div class="form-group <?php echo e($errors->has('alternatif_id') ? 'has-error' : ''); ?>">
    <label for="status" class="control-label"><?php echo e('perhitungan Id'); ?></label>

    <div class="col-md-12">
        <select name="alternatif_id" class="form-control form-control-line" id="alternatif_id">
            <?php $__currentLoopData = $perhitungans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option
                    value="<?php echo e($item->id); ?>" <?php echo e((isset($perhitungan_detail->perhitungan) && $perhitungan->alternatif_id == $item->alternatif_id) || old('alternatif_id') == $item->id ? 'selected' : ''); ?>><?php echo e($perhitungan->nama); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>

        <?php $__errorArgs = ['alternatif_id'];
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

<div class="form-group <?php echo e($errors->has('kriteria_detail_id') ? 'has-error' : ''); ?>">
    <label for="status" class="control-label"><?php echo e('Kriteria Detail Id'); ?></label>

    <div class="col-md-12">
        <select name="kriteria_detail_id" class="form-control form-control-line" id="kriteria_detail_id">
            <?php $__currentLoopData = $kriteria_details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option
                    value="<?php echo e($item->id); ?>" <?php echo e((isset($perhitungan_detail->perhitungan) && $perhitungan->kriteria_detail_id == $item->kriteria_detail_id) || old('kriteria_detail_id') == $item->id ? 'selected' : ''); ?>><?php echo e($perhitungan->nama); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>

        <?php $__errorArgs = ['kriteria_detail_id'];
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


<div class="form-group <?php echo e($errors->has('nilai') ? 'has-error' : ''); ?>">
    <label for="keterangan" class="control-label"><?php echo e('Nilai'); ?></label>

    <div class="col-md-12">
        <input placeholder="nilai"
            class="form-control form-control-line <?php $__errorArgs = ['nilai'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="nilai"
            type="text" id="nilai" value="<?php echo e(isset($perhitungan_detail->nilai) ? $perhitungan_detail->nilai : old('nilai')); ?>"
            required>

        <?php $__errorArgs = ['nilai'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <span class="invalid-feedback" role="alert">
            <strong><?php echo e($message); ?></strong>
        </span>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>

</div>


<div class="form-group">
    <div class="col-sm-12">
        <button class="btn btn-success" type="submit">Simpan</button>
    </div>
</div>
<?php /**PATH D:\bikinaplikasi\project\setup_server_default\sites\spk-blt-covid-muhammad-ridho.bikinaplikasi.dev\resources\views/perhitungan-detail/form.blade.php ENDPATH**/ ?>