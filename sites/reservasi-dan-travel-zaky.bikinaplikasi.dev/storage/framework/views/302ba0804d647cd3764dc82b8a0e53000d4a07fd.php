<div class="form-group <?php echo e($errors->has('name') ? 'has-error' : ''); ?>">
    <label for="name" class="control-label"><?php echo e('Name'); ?></label>

    <div class="col-md-12">
        <input placeholder="name" class="form-control form-control-line <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="name"
               type="text" id="name" value="<?php echo e(isset($user->name) ? $user->name : old('name')); ?>">

        <?php $__errorArgs = ['name'];
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
<div class="form-group <?php echo e($errors->has('email') ? 'has-error' : ''); ?>">
    <label for="email" class="control-label"><?php echo e('Email'); ?></label>

    <div class="col-md-12">
        <input placeholder="email" class="form-control form-control-line <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
               name="email" type="email" id="email" value="<?php echo e(isset($user->email) ? $user->email : old('email')); ?>"
               required>

        <?php $__errorArgs = ['email'];
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
<div class="form-group <?php echo e($errors->has('password') ? 'has-error' : ''); ?>">
    <label for="password" class="control-label"><?php echo e('Password'); ?></label>

    <div class="col-md-12">
        <input type="password" class="form-control form-control-line" name='password' id="password">
        <?php $__errorArgs = ['password'];
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
<div class="form-group <?php echo e($errors->has('password_confirmation') ? 'has-error' : ''); ?>">
    <label for="password_confirmation" class="control-label"><?php echo e('Password Confirmation'); ?></label>

    <div class="col-md-12">
        <input type="password" class="form-control form-control-line" name='password_confirmation'
               id="password_confirmation">
        <?php $__errorArgs = ['password_confirmation'];
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

<div class="form-group <?php echo e($errors->has('dokumen_penting') ? 'has-error' : ''); ?>">
    <label for="dokumen_penting" class="control-label"><?php echo e('Dokumen Penting'); ?></label>

    <div class="col-md-12">
        <input placeholder="dokumen_penting"
               class="form-control form-control-line <?php $__errorArgs = ['dokumen_penting'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
               name="dokumen_penting" type="file" id="dokumen_penting"
               value="<?php echo e(isset($menu->dokumen_penting) ? $menu->dokumen_penting : old('dokumen_penting')); ?>">

        <?php $__errorArgs = ['dokumen_penting'];
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

<div class="form-group <?php echo e($errors->has('level') ? 'has-error' : ''); ?>">
    <label for="level" class="control-label"><?php echo e('Level'); ?></label>

    <div class="col-md-12">
        <select name="level" class="form-control form-control-line" id="level">
            <?php $__currentLoopData = ['Supir' => 'Supir', 'Pelanggan' => 'Pelanggan']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $optionKey => $optionValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option
                    value="<?php echo e($optionKey); ?>" <?php echo e((isset($menu->level) && $menu->level == $optionKey) || old('level') == $optionKey ? 'selected' : ''); ?>><?php echo e($optionValue); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>

        <?php $__errorArgs = ['level'];
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
<?php /**PATH D:\bikinaplikasi\project\81zaky\reservasi_and_travel\resources\views/user/form.blade.php ENDPATH**/ ?>