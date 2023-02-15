<div class="form-group <?php echo e($errors->has('judul') ? 'has-error' : ''); ?>">
    <label for="kode_buku" class="control-label"><?php echo e('Kode Buku'); ?></label>

    <div class="col-md-12">
        <input placeholder="kode_buku" class="form-control form-control-line <?php $__errorArgs = ['kode_buku'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
            name="kode_buku" type="text" id="kode_buku" value="<?php echo e(isset($kode_buku->kode_buku) ? $kode_buku->kode_buku : old('kode_buku')); ?>" required>

        <?php $__errorArgs = ['kode_buku'];
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
unset($__errorArgs, $__bag); ?>"
            name="keterangan" type="text" id="keterangan" value="<?php echo e(isset($kode_buku->keterangan) ? $kode_buku->keterangan : old('keterangan')); ?>" required>

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

<div class="form-group <?php echo e($errors->has('lokasi_rak') ? 'has-error' : ''); ?>">
    <label for="lokasi_rak" class="control-label"><?php echo e('Lokasi Rak'); ?></label>

    <div class="col-md-12">
        <input placeholder="lokasi_rak" class="form-control form-control-line <?php $__errorArgs = ['lokasi_rak'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
            name="lokasi_rak" type="text" id="lokasi_rak" value="<?php echo e(isset($kode_buku->lokasi_rak) ? $kode_buku->lokasi_rak : old('lokasi_rak')); ?>"
            required>

        <?php $__errorArgs = ['lokasi_rak'];
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
<?php /**PATH D:\bikinaplikasi\project\setup_server_default\sites\perpustakaan-andri.bikinaplikasi.dev\resources\views/kode-buku/form.blade.php ENDPATH**/ ?>