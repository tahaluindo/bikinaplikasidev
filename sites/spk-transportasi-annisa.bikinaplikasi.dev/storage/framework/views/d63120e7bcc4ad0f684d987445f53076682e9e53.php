<div class="form-group <?php echo e($errors->has('status') ? 'has-error' : ''); ?>">
    <label for="status" class="control-label"><?php echo e('Perhitungan'); ?></label>

    <div class="col-md-12">
        <select name="perhitungan_id" class="form-control form-control-line" id="perhitungan_id">
            <?php $__currentLoopData = $perhitungans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option
                    value="<?php echo e($item->id); ?>" <?php echo e((isset($alternatif->perhitungan) && $alternatif->perhitungan_id == $item->perhitungan_id) || old('perhitungan_id') == $item->id ? 'selected' : ''); ?>><?php echo e($item->nama); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>

        <?php $__errorArgs = ['perhitungan_id'];
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
            type="text" id="nama" value="<?php echo e(isset($alternatif->nama) ? $alternatif->nama : old('nama')); ?>" required>

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
    <label for="urutan_prioritas" class="control-label"><?php echo e('Urutan prioritas'); ?></label>

    <div class="col-md-12">
        <input placeholder="urutan_prioritas"
            class="form-control form-control-line <?php $__errorArgs = ['urutan_prioritas'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="urutan_prioritas"
            type="text" id="urutan_prioritas" value="<?php echo e(isset($alternatif->urutan_prioritas) ? $alternatif->urutan_prioritas : old('urutan_prioritas')); ?>"
            required>

        <?php $__errorArgs = ['urutan_prioritas'];
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
<?php /**PATH D:\bikinaplikasi\project\setup_server_default\sites\spk-transportasi-annisa.bikinaplikasi.dev\resources\views/alternatif/form.blade.php ENDPATH**/ ?>