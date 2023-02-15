<?php $__env->startSection('content'); ?>
    <!--packages start-->
    <section id="pack" class="packages">
        <div class="container">
            <div class="gallary-header text-center">
                <h2>
                    Isi data akun
                </h2>
                <p>
                    Mohon inputkan data pesanan sesuai dengan identitas asli anda (KTP / SIM / Kartu Pelajar)
                </p>
            </div>
            <div class="packages-content">

                <form method="post" action="<?php echo e(url('pelanggan/registern')); ?>" enctype="multipart/form-data">
                    <div class="row" style="margin-top: 33px;">
                        <div class="col-md-6 col-md-offset-3">
                            <div class="single-tab-select-box  <?php echo e($errors->has('name') ? 'has-error' : ''); ?>">
                                <h2>Nama</h2>
                                <div class="travel-check-icon">
                                    <input type="text" name="name"
                                           class="form-control flatpickr-input  <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                           placeholder="Nama"
                                           value="<?php echo e(isset($user->name) ? $user->name : old('name')); ?>" required>

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
                                           value="<?php echo e(isset($user->email) ? $user->email : old('email')); ?>" required>

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

                            <div class="single-tab-select-box  <?php echo e($errors->has('no_hp') ? 'has-error' : ''); ?>">
                                <h2>No Hp</h2>
                                <div class="travel-check-icon">
                                    <input type="number" name="no_hp"
                                           class="form-control flatpickr-input  <?php $__errorArgs = ['no_hp'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                           placeholder="No Hp"
                                           value="<?php echo e(isset($user->no_hp) ? $user->no_hp : old('no_hp')); ?>" required>

                                    <?php $__errorArgs = ['no_hp'];
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
                                class="single-tab-select-box  <?php echo e($errors->has('password') ? 'has-error' : ''); ?>">
                                <h2>Password</h2>
                                <div class="travel-check-icon">
                                    <input type="password" name="password"
                                           class="form-control"
                                           placeholder="password" required>

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
                                class="single-tab-select-box  <?php echo e($errors->has('konfirmasi_password') ? 'has-error' : ''); ?>">
                                <h2>Konfirmasi Password</h2>
                                <div class="travel-check-icon">
                                    <input type="password" name="password_confirmation"
                                           class="form-control"
                                           placeholder="konfirmasi password" required>

                                    <?php $__errorArgs = ['konfirmasi_password'];
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

                            <div class="single-tab-select-box  <?php echo e($errors->has('foto') ? 'has-error' : ''); ?>">
                                <h2>Foto (Tidak Wajib)</h2>
                                <div class="travel-check-icon">
                                    <input type="file" name="foto"
                                           class="form-control flatpickr-input  <?php $__errorArgs = ['foto'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                           placeholder="Nama pemesan"
                                           value="<?php echo e(isset($user->foto) ? $user->foto : old('foto')); ?>">

                                    <?php $__errorArgs = ['foto'];
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
                                    <button class="book-btn">Register</button>

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
    <!--packages end-->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\bikinaplikasi\project\setup_server_default\sites\reservasi-dan-travel-zaky.bikinaplikasi.dev\resources\views/register.blade.php ENDPATH**/ ?>
