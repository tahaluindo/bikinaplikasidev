<?php $__env->startSection('content'); ?>
    <div class="main_content_iner ">
        <div class="container-fluid">
            <div class="row">

                <div class="col-lg-6  plr_30 pb_30 pt_30 body_white_bg">
                    <h3 class="mb-0">
                        Profile</h3>
                    <div class="mb-3"></div>

                    <form class="form-horizontal form-material"
                          action="<?php echo e(route('user.profile.update', auth()->id())); ?>" method="post"
                          enctype="multipart/form-data">
                        <?php echo method_field('put'); ?>
                        <?php echo csrf_field(); ?>

                        <div class="form-group <?php echo e($errors->has('name') ? 'has-error' : ''); ?>">
                            <label for="name" class="control-label"><?php echo e('Name'); ?></label>

                            <div class="col-md-12">
                                <input placeholder="name"
                                       class="form-control form-control-line <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                       name="name" type="text" id="name"
                                       value="<?php echo e(isset($user->name) ? $user->name : old('name')); ?>"
                                       required>

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
                                <input placeholder="email"
                                       class="form-control form-control-line <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                       name="email" type="email" id="email"
                                       value="<?php echo e(isset($user->email) ? $user->email : old('email')); ?>"
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
                                <input type="password" class="form-control form-control-line"
                                       name='password' id="password">
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

                        <div
                            class="mt-2 form-group <?php echo e($errors->has('password_confirmation') ? 'has-error' : ''); ?>">
                            <label for="password_confirmation"
                                   class="control-label"><?php echo e('Password Confirmation'); ?></label>

                            <div class="col-md-12">
                                <input type="password" class="form-control form-control-line"
                                       name='password_confirmation'
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

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Pelanggan')): ?>
                            <div class="form-group <?php echo e($errors->has('dokumen_penting') ? 'has-error' : ''); ?>">
                                <label for="dokumen_penting" class="control-label"><?php echo e('Dokumen Penting'); ?></label>

                                <div class="col-md-12">
                                    <input placeholder="dokumen_penting" class="form-control form-control-line <?php $__errorArgs = ['dokumen_penting'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                           name="dokumen_penting" type="file" id="dokumen_penting" value="<?php echo e(isset($menu->dokumen_penting) ? $menu->dokumen_penting : old('dokumen_penting')); ?>">

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
                        <?php endif; ?>


                        <div class="form-group">
                            <div class="col-sm-12">
                                <button class="btn btn-primary" type="submit">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app3', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\bikinaplikasi\project\setup_server_default\sites\reservasi-dan-travel-skytravelink.bikinaplikasi.dev\resources\views/user/profile.blade.php ENDPATH**/ ?>