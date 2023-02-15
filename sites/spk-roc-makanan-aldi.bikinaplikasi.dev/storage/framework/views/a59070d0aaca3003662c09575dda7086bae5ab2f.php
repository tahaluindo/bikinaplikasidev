<input type="hidden" name="kriteria_id" value="<?php echo e(request()->kriteria_id); ?>">

<div class="form-group <?php echo e($errors->has('keterangan') ? 'has-error' : ''); ?>">
    <label for="keterangan" class="control-label"><?php echo e('Keterangan'); ?></label>

    <div class="col-md-12">
        <input placeholder="keterangan" class="form-control form-control-line <?php $__errorArgs = ['keterangan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="keterangan"
            type="text" id="keterangan" value="<?php echo e(isset($kriteria_detail->keterangan) ? $kriteria_detail->keterangan : old('keterangan')); ?>" required>

        <?php $__errorArgs = ['keterangan'];
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


<div class="form-group <?php echo e($errors->has('nilai_bobot') ? 'has-error' : ''); ?>">
    <label for="nilai_bobot" class="control-label"><?php echo e('nilai bobot'); ?></label>

    <div class="col-md-12">
        <input placeholder="nilai_bobot" class="form-control form-control-line <?php $__errorArgs = ['nilai_bobot'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="nilai_bobot"
            type="text" id="nilai_bobot" value="<?php echo e(isset($kriteria_detail->nilai_bobot) ? $kriteria_detail->nilai_bobot : old('nilai_bobot')); ?>" required>

        <?php $__errorArgs = ['nilai_bobot'];
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
<?php /**PATH D:\bikinaplikasi\project\setup_server_default\sites\spk-roc-makanan-aldi.bikinaplikasi.dev\resources\views/kriteria-detail/form.blade.php ENDPATH**/ ?>