<div class="form-group <?php echo e($errors->has('nama') ? 'has-error' : ''); ?>">
    <label for="nama" class="control-label"><?php echo e('Nama'); ?></label>

    <div class="col-md-12">
        <input placeholder="nama" class="form-control form-control-line <?php $__errorArgs = ['nama'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="nama"
            type="text" id="nama" value="<?php echo e(isset($perhitungan->nama) ? $perhitungan->nama : old('nama')); ?>" required>

        <?php $__errorArgs = ['nama'];
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

<div class="form-group <?php echo e($errors->has('urutan_prioritas') ? 'has-error' : ''); ?>">
    <label for="keterangan" class="control-label"><?php echo e('Keterangan'); ?></label>

    <div class="col-md-12">
        <input placeholder="keterangan"
            class="form-control form-control-line <?php $__errorArgs = ['keterangan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="keterangan"
            type="text" id="keterangan" value="<?php echo e(isset($perhitungan->keterangan) ? $perhitungan->keterangan : old('keterangan')); ?>"
            required>

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

<div class="form-group">
    <div class="col-sm-12">
        <button class="btn btn-success" type="submit">Simpan</button>
    </div>
</div>
<?php /**PATH D:\bikinaplikasi\project\setup_server_default\sites\spk-roc-makanan-aldi.bikinaplikasi.dev\resources\views/perhitungan/form.blade.php ENDPATH**/ ?>