<div class="form-group <?php echo e($errors->has('hari') ? 'has-error' : ''); ?>">
    <label for="hari" class="control-label"><?php echo e('Hari'); ?></label>

    <div class="col-md-12">
        <select name="hari" class="form-control form-control-line" id="hari">
            <?php $__currentLoopData = ['Senin' => 'Senin', 'Selasa' => 'Selasa', 'Rabu' => 'Rabu', 'Kamis' => 'Kamis', 'Jum\'at' => 'Jum\'at', 'Sabtu' => 'Sabtu', 'Minggu' => 'Minggu']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $optionKey => $optionValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option
                    value="<?php echo e($optionKey); ?>" <?php echo e((isset($jadwal->hari) && $jadwal->hari == $optionKey) || old('hari') == $optionKey ? 'selected' : ''); ?>><?php echo e($optionValue); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>

        <?php $__errorArgs = ['hari'];
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

<div class="form-group <?php echo e($errors->has('jam') ? 'has-error' : ''); ?>">
    <label for="jam" class="control-label"><?php echo e('Jam'); ?></label>

    <div class="col-md-12">
        <input placeholder="jam" class="jam form-control form-control-line <?php $__errorArgs = ['jam'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
               name="jam" type="text" min="0" id="jam"
               value="<?php echo e(isset($jadwal->jam) ? $jadwal->jam : (old('jam') == "" ? 0 : old('jam'))); ?>"
               required>

        <?php $__errorArgs = ['jam'];
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

<div class="form-group">
    <div class="col-sm-12">
        <button class="btn btn-primary" type="submit">Simpan</button>
    </div>
</div>


<?php /**PATH D:\bikinaplikasi\project\81zaky\reservasi_and_travel\resources\views/jadwal/form.blade.php ENDPATH**/ ?>