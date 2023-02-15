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
                                    <li><span class="bread-blod">User</span>
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
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <div class="product-sales-chart">
                        <div style="padding: 20px !important;">


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
                                               name='password' id="password" required>
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
                                    class="form-group <?php echo e($errors->has('password_confirmation') ? 'has-error' : ''); ?>">
                                    <label for="password_confirmation"
                                           class="control-label"><?php echo e('Password Confirmation'); ?></label>

                                    <div class="col-md-12">
                                        <input type="password" class="form-control form-control-line"
                                               name='password_confirmation'
                                               id="password_confirmation" required>
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

                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <button class="btn btn-success" type="submit">Simpan</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\bikinaplikasi\project\setup_server_default\sites\perpustakaan-hendra.bikinaplikasi.dev\resources\views/user/profile.blade.php ENDPATH**/ ?>