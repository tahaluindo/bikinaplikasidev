<div class="form-group <?php echo e($errors->has('nama_penyedia') ? 'has-error' : ''); ?>">
    <label for="nama_penyedia" class="control-label"><?php echo e('Nama Penyedia'); ?></label>

    <div class="col-md-12">
        <input placeholder="nama_penyedia" class="nama_penyedia form-control form-control-line <?php $__errorArgs = ['nama_penyedia'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
               name="nama_penyedia" type="text" min="0" id="nama_penyedia"
               value="<?php echo e(isset($rekening->nama_penyedia) ? $rekening->nama_penyedia : (old('nama_penyedia') == "" ? "" : old('nama_penyedia'))); ?>"
               required>

        <?php $__errorArgs = ['nama_penyedia'];
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

<div class="form-group <?php echo e($errors->has('atas_nama') ? 'has-error' : ''); ?>">
    <label for="atas_nama" class="control-label"><?php echo e('Atas Nama'); ?></label>

    <div class="col-md-12">
        <input placeholder="atas_nama" class="atas_nama form-control form-control-line <?php $__errorArgs = ['atas_nama'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
               name="atas_nama" type="text" min="0" id="atas_nama"
               value="<?php echo e(isset($rekening->atas_nama) ? $rekening->atas_nama : (old('atas_nama') == "" ? "" : old('atas_nama'))); ?>"
               required>

        <?php $__errorArgs = ['atas_nama'];
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

<div class="form-group <?php echo e($errors->has('nomor_rekening') ? 'has-error' : ''); ?>">
    <label for="nomor_rekening" class="control-label"><?php echo e('Nomor Rekening'); ?></label>

    <div class="col-md-12">
        <input placeholder="nomor_rekening" class="nomor_rekening form-control form-control-line <?php $__errorArgs = ['nomor_rekening'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
               name="nomor_rekening" type="number" min="0" id="nomor_rekening"
               value="<?php echo e(isset($rekening->nomor_rekening) ? $rekening->nomor_rekening : (old('nomor_rekening') == "" ? "" : old('nomor_rekening'))); ?>"
               required>

        <?php $__errorArgs = ['nomor_rekening'];
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

<div class="form-group <?php echo e($errors->has('status') ? 'has-error' : ''); ?>">
    <label for="status" class="control-label"><?php echo e('Status'); ?></label>

    <div class="col-md-12">
        <select name="status" class="form-control form-control-line" id="status">
            <?php $__currentLoopData = ['Tersedia' => 'Tersedia', 'Tidak Tersedia' => 'Tidak Tersedia']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $optionKey => $optionValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option
                    value="<?php echo e($optionKey); ?>" <?php echo e((isset($rekening->status) && $rekening->status == $optionKey) || old('status') == $optionKey ? 'selected' : ''); ?>><?php echo e($optionValue); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>

        <?php $__errorArgs = ['status'];
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


<?php /**PATH D:\bikinaplikasi\project\81zaky\reservasi_and_travel\resources\views/rekening/form.blade.php ENDPATH**/ ?>