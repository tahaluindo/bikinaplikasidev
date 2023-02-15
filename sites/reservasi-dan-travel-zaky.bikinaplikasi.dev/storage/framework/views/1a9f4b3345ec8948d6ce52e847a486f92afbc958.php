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
                    Isi data pemesanan
                </h2>
                <p>
                    Mohon inputkan data pesanan sesuai dengan identitas asli anda (KTP / SIM / Kartu Pelajar)
                </p>
            </div>
            <div class="packages-content">
                <div class="row">

                    <div class="col-md-4 col-md-offset-4">

                        <div class="single-package-item">
                            <img src="<?php echo e(url($mobil->gambar != "" ? $mobil->gambar : "image/no_image.png")); ?>"
                                 alt="package-place"
                                 width="370"
                                 height="300">
                            <div class="single-package-item-txt">
                                <h3><?php echo e($mobil->nama); ?> <span
                                        class="pull-right"><?php echo e(toIdr($mobil->biaya_rental)); ?></span></h3>
                                <div class="packages-para">
                                    <p>
											<span>
												<i class="fa fa-angle-right"></i> <?php echo e($mobil->jumlah_kursi); ?> Kursi
											</span>

                                        <?php $__currentLoopData = $mobil->mobil_fasilitas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mobilMobilFasilitas): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <span>
												<i class="fa fa-angle-right"></i> <?php echo e($mobilMobilFasilitas->fasilitas->nama); ?>

											</span>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </p>
                                </div>
                                <div class="">
                                    <p>
                                        <i class="fa fa-check"></i>
                                        <span><?php echo e($mobil->status); ?></span>
                                    </p>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

                <form method="post" action="<?php echo e(url("pembayaran-rental/$mobil->id")); ?>" id="form-pembayaran-rental" enctype="multipart/form-data">
                <div class="row" style="margin-top: 33px;">
                    <div class="col-md-6 col-md-offset-3">

                        <div class="single-tab-select-box  <?php echo e($errors->has('dari_tanggal') ? 'has-error' : ''); ?>">
                            <h2>Dari Tggl</h2>
                            <div class="travel-check-icon">
                                <input type="text" name="dari_tanggal"
                                       class="flatpickr form-control"
                                       value="<?php echo e(old('dari_tanggal') == "" ? request()->dari_tanggal : old('dari_tanggal')); ?>" id="dari-tanggal">

                                <?php $__errorArgs = ['dari_tanggal'];
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

                        <div class="single-tab-select-box  <?php echo e($errors->has('sampai_tanggal') ? 'has-error' : ''); ?>">
                            <h2>Sampai Tggl</h2>
                            <div class="travel-check-icon">
                                <input type="text" name="sampai_tanggal"
                                       class="flatpickr form-control"
                                       value="<?php echo e(old('sampai_tanggal') == "" ? request()->sampai_tanggal : old('sampai_tanggal')); ?>" id="sampai-tanggal">

                                <?php $__errorArgs = ['sampai_tanggal'];
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

                        <div class="single-tab-select-box  <?php echo e($errors->has('pakai_supir') ? 'has-error' : ''); ?>">
                            <h2>Pakai Supir</h2>
                            <div class="travel-check-icon">
                                <div class="travel-select-icon">
                                    <select class="form-control " name="pakai_supir" id="pakai-supir">
                                        <option value="Ya">Ya</option>
                                        <option value="Tidak">Tidak</option>
                                    </select>
                                </div>

                                <?php $__errorArgs = ['pakai_supir'];
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

                        <div class="single-tab-select-box  <?php echo e($errors->has('total_bayar') ? 'has-error' : ''); ?>">
                            <h2>Total Bayar</h2>
                            <div class="travel-check-icon">
                                <input type="text" name="total_bayar"
                                       class="form-control flatpickr-input  <?php $__errorArgs = ['total_bayar'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                       placeholder="Total Bayar"
                                       value="<?php echo e(old('total_bayar') == "" ? request()->total_bayar : old('total_bayar')); ?>" id="total-bayar">

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


                        <div class="single-tab-select-box  <?php echo e($errors->has('bukti_transfer') ? 'has-error' : ''); ?>">
                            <h2>Bukti Transfer</h2>
                            <div class="travel-check-icon">
                                <input type="file" name="bukti_transfer"
                                       class="form-control flatpickr-input  <?php $__errorArgs = ['bukti_transfer'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">

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

                        <div class="single-tab-select-box ">
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
    <!--packages end-->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\bikinaplikasi\project\setup_server_default\sites\reservasi-dan-travel-zaky.bikinaplikasi.dev\resources\views/pembayaran-rental.blade.php ENDPATH**/ ?>