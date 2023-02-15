
<div class="form-group <?php echo e($errors->has('dari') ? 'has-error' : ''); ?>">
    <label for="dari" class="control-label"><?php echo e('Dari'); ?></label>

    <div class="col-md-12">

        <input list="dari" class="form-control form-control-line dari" required name="dari" value="<?php echo e(isset($rute->dari) ? $rute->dari : old('dari')); ?>">

        <datalist id="dari">
            <option value=""></option>
            <?php $__currentLoopData = $lokasis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lokasi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option
                    value="<?php echo e($lokasi->id); ?>" <?php echo e((isset($rute->dari) && $rute->dari == $lokasi->id) || old('dari') == $lokasi->id ? 'selected' : ''); ?>><?php echo e($lokasi->nama); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </datalist>

        <?php $__errorArgs = ['dari'];
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

<div class="form-group <?php echo e($errors->has('ke') ? 'has-error' : ''); ?>">
    <label for="ke" class="control-label"><?php echo e('Ke'); ?></label>

    <div class="col-md-12">

        <input list="ke" class="form-control form-control-line ke" required name="ke" value="<?php echo e(isset($rute->ke) ? $rute->ke : old('ke')); ?>">

        <datalist id="ke">
            <option value=""></option>
            <?php $__currentLoopData = $lokasis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lokasi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option
                    value="<?php echo e($lokasi->id); ?>" <?php echo e((isset($lokasi->ke) && $rute->ke == $lokasi->id) || old('ke') == $lokasi->id ? 'selected' : ''); ?>><?php echo e($lokasi->nama); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </datalist>

        <?php $__errorArgs = ['ke'];
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


<div class="form-group <?php echo e($errors->has('biaya') ? 'has-error' : ''); ?>">
    <label for="biaya" class="control-label"><?php echo e('Biaya'); ?></label>

    <div class="col-md-12">
        <input placeholder="biaya" class="biaya form-control form-control-line <?php $__errorArgs = ['biaya'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
               name="biaya" type="text" min="0" id="biaya"
               value="<?php echo e(isset($rute->biaya) ? $rute->biaya : (old('biaya') == "" ? "" : old('biaya'))); ?>"
               required>

        <?php $__errorArgs = ['biaya'];
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


<?php /**PATH D:\bikinaplikasi\project\setup_server_default\sites\reservasi-dan-travel-zaky.bikinaplikasi.dev\resources\views/rute/form.blade.php ENDPATH**/ ?>