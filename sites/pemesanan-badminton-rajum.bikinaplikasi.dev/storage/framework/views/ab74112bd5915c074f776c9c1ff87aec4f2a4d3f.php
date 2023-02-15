<?php $__env->startSection('content'); ?>
    <!--about-us start -->
<section id="home" class="about-us-2">


</section>
<!--about-us end -->

    <!--packages start-->
    <section id="pack" class="packages">
        <div class="container">
            <div class="gallary-header text-center">
                <h2>
                    Login akun
                </h2>
                <p>
                    Pastikan email dan password kamu benar!
                </p>
            </div>
            <div class="packages-content">

                <form method="post" action="<?php echo e(url('pelanggan/login')); ?>">
                    <div class="row" style="margin-top: 33px;">
                        <div class="col-md-6 col-md-offset-3">

                            <div class="single-tab-select-box  <?php echo e($errors->has('email') ? 'has-error' : ''); ?>">
                                <h2>Email</h2>
                                <div class="travel-check-icon">
                                    <input type="email" name="email"
                                           class="form-control flatpickr-input  <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                           placeholder="Email"
                                           value="<?php echo e(isset($user->email) ? $user->email : old('email')); ?>">

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

                            <div class="single-tab-select-box  <?php echo e($errors->has('password') ? 'has-error' : ''); ?>">
                                <h2>Password</h2>
                                <div class="travel-check-icon">
                                    <input type="password" name="password"
                                           class="form-control"
                                           placeholder="password">

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

                            <div class="single-tab-select-box  <?php echo e($errors->has('register') ? 'has-error' : ''); ?>">
                                <div class="">
                                    <button class="book-btn">Login

                                    </button>

                                    <?php $__errorArgs = ['register'];
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

                        </div>
                    </div>
                </form>
            </div>
        </div>

    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\bikinaplikasi\project\setup_server_default\sites\pemesanan-badminton-rajum.bikinaplikasi.dev\resources\views/login.blade.php ENDPATH**/ ?>