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
                    Isi data pemesanan paket
                </h2>
                <p>
                    Mohon inputkan data pesanan sesuai dengan identitas asli anda (KTP / SIM / Kartu Pelajar)
                </p>
            </div>
            <div class="packages-content">
                <div class="row">

                    <div class="col-md-4 col-md-offset-4">
                        <div class="single-package-item">
                            <img src="<?php echo e(url($paket->gambar ?? "image/no_image.png")); ?>" alt="package-place">
                            <div class="single-package-item-txt">
                                <h3><?php echo e($paket->nama); ?> <span class="pull-right"><?php echo e(toIdr($paket->harga)); ?></span></h3>
                                <div class="packages-para">
                                    <p>
                                        <?php $__currentLoopData = explode('#', $paket->benefit); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $paketBenefit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <span>
												    <i class="fa fa-angle-right"></i> <?php echo e($paketBenefit); ?>

											    </span>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </p>
                                </div>
                                <div class="">
                                    <p>
                                        <span><?php echo e($paket->deskripsi); ?></span>
                                    </p>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

                <form method="post" action="<?php echo e(url("pembayaran-paket/$paket->id")); ?>" id="form-pembayaran-tiket"
                      enctype="multipart/form-data">
                    <div class="row" style="margin-top: 33px;">
                        <div class="col-md-6 col-md-offset-3">

                            <div class="single-tab-select-box">
                                <h2>Total Bayar</h2>
                                <div class="travel-check-icon">
                                    <input id="total-bayar" type="text" name="total_bayar"
                                           class="form-control flatpickr-input  <?php $__errorArgs = ['total_bayar'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                           placeholder="Total Bayar"
                                           value="<?php echo e(toIdr($paket->harga)); ?>" required
                                           disabled>

                                    <?php $__errorArgs = ['total_bayar'];
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


                            <div class="single-tab-select-box  <?php echo e($errors->has('name') ? 'has-error' : ''); ?>">
                                <h2>Bukti Transfer</h2>

                                <?php $__currentLoopData = $rekenings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div><?php echo e($item->nama_penyedia); ?> - <?php echo e($item->atas_nama); ?> - <?php echo e($item->nomor_rekening); ?></div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <div style="margin-top: 10px;"></div>

                                <div class="travel-check-icon">
                                    <input type="file" name="bukti_transfer"
                                           class="form-control flatpickr-input  <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                           placeholder="Nama pemesan"
                                           value="<?php echo e(isset($user->name) ? $user->name : old('name')); ?>" required>

                                    <?php $__errorArgs = ['bukti_transfer'];
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

                            <div class="single-tab-select-box">
                                <div class="travel-check-icon">
                                    <button class="book-btn">Bayar</button>

                                </div>
                            </div>

                        </div>
                    </div>
                </form>
            </div>
        </div>

    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\bikinaplikasi\project\setup_server_default\sites\reservasi-dan-travel-zaky.bikinaplikasi.dev\resources\views/pembayaran-paket.blade.php ENDPATH**/ ?>