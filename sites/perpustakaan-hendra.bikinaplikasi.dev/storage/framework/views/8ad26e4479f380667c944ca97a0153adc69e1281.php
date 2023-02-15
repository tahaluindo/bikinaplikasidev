<div class='row'>
    <div class='col-md-12'>
        <form class="form-horizontal form-material" action="<?php echo e(url(route('peminjaman.print'))); ?>" method="post"
            enctype="multipart/form-data">
            <?php echo csrf_field(); ?>

            <div class="form-group <?php echo e($errors->has('tanggal_awal') ? 'has-error' : ''); ?>">
                <label class="col-md-12"><?php echo e('Tanggal Awal'); ?></label>

                <div class="col-md-12">
                    <input placeholder="tanggal_awal"
                        class="flatpickr form-control form-control-line <?php $__errorArgs = ['tanggal_awal'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                        name="tanggal_awal" type="text" id="tanggal_awal" value="<?php echo e(old('tanggal_awal') == "" ? now()->format('d-m-Y') : old('tanggal_awal')); ?>" required>

                    <?php $__errorArgs = ['tanggal_awal'];
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

            <div class="form-group <?php echo e($errors->has('tanggal_akhir') ? 'has-error' : ''); ?>">
                <label class="col-md-12"><?php echo e('Tanggal Akhir'); ?></label>

                <div class="col-md-12">
                    <input placeholder="tanggal_akhir"
                        class="flatpickr form-control form-control-line <?php $__errorArgs = ['tanggal_akhir'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                        name="tanggal_akhir" type="text" id="tanggal_akhir" value="<?php echo e(old('tanggal_akhir')); ?>" required>

                    <?php $__errorArgs = ['tanggal_akhir'];
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
                <label class="col-md-12">Petugas</label>
                <div class="col-md-12">
                    <select class="form-control form-control-line" name='user_petugas_id'>
                        <option value=""></option>
                        <?php $__currentLoopData = $petugass; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $petugas): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($petugas->id); ?>" <?php if(old('user_petugas_id')==$petugas->id): ?>
                            selected <?php endif; ?>><?php echo e(ucwords($petugas->name)); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>

                    <?php $__errorArgs = ['user_petugas_id'];
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
                <label class="col-md-12">Status</label>
                <div class="col-md-12">
                    <select class="form-control form-control-line" name='status'>
                        <?php $__currentLoopData = ['', 'Selesai', 'Belum Selesai']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($status); ?>" <?php if(old('status')==$status): ?> selected <?php endif; ?>><?php echo e($status); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>

                    <?php $__errorArgs = ['status'];
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
                    <button name='preview' value='true' class="btn btn-info" type="submit">Preview</button>
                    <button class="btn btn-success" type="submit">Print</button>
                </div>
            </div>
        </form>
    </div>
</div>

<?php /**PATH D:\bikinaplikasi\project\setup_server_default\sites\perpustakaan-hendra.bikinaplikasi.dev\resources\views/layouts/peminjaman/laporan/index.blade.php ENDPATH**/ ?>