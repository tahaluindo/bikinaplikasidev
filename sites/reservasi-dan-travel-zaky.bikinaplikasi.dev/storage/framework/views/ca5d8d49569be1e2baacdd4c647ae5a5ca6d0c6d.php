
<div class="form-group <?php echo e($errors->has('rute_id') ? 'has-error' : ''); ?>">
    <label for="rute_id" class="control-label"><?php echo e('Rute'); ?></label>

    <div class="col-md-12">

        <input list="rute_id" class="form-control form-control-line rute_id" required name="rute_id" value="<?php echo e(isset($tiket->rute_id) ? $tiket->rute_id : old('rute_id')); ?>">

        <datalist id="rute_id">
            <?php $__currentLoopData = $rutes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option
                    value="<?php echo e($rute->id); ?>" <?php echo e((isset($rute->rute_id) && $rute->rute_id == $rute->id) || old('rute_id') == $rute->id ? 'selected' : ''); ?>><?php echo e($rute->dari()->nama); ?> - <?php echo e($rute->ke()->nama); ?> (<?php echo e(toIdr($rute->biaya)); ?>, Diskon pulang pergi: <?php echo e(toIdr($rute->biaya)); ?>)</option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </datalist>

        <?php $__errorArgs = ['rute_id'];
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


<div class="form-group <?php echo e($errors->has('nama') ? 'has-error' : ''); ?>">
    <label for="nama" class="control-label"><?php echo e('Nama'); ?></label>

    <div class="col-md-12">
        <input placeholder="nama" class="nama form-control form-control-line <?php $__errorArgs = ['nama'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
               name="nama" type="text" min="0" id="nama"
               value="<?php echo e(isset($lokasi_tujuan->nama) ? $lokasi_tujuan->nama : (old('nama') == "" ? "" : old('nama'))); ?>"
               required>

        <?php $__errorArgs = ['nama'];
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


<div class="form-group <?php echo e($errors->has('deskripsi') ? 'has-error' : ''); ?>">
    <label for="deskripsi" class="control-label"><?php echo e('Deskripsi'); ?></label>

    <div class="col-md-12">
        <input placeholder="deskripsi" class="deskripsi form-control form-control-line <?php $__errorArgs = ['deskripsi'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
               name="deskripsi" type="text" min="0" id="deskripsi"
               value="<?php echo e(isset($lokasi_tujuan->deskripsi) ? $lokasi_tujuan->deskripsi : (old('deskripsi') == "" ? "" : old('deskripsi'))); ?>"
               required>

        <?php $__errorArgs = ['deskripsi'];
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

<div class="form-group <?php echo e($errors->has('foto') ? 'has-error' : ''); ?>">
    <label for="gambar" class="control-label"><?php echo e('Gambar'); ?></label>

    <div class="col-md-12">
        <input placeholder="gambar" class="gambar form-control form-control-line <?php $__errorArgs = ['gambar'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
               name="gambar" type="file" id="gambar"
               value="<?php echo e(isset($lokasi_tujuan_tujuan->gambar) ? $lokasi_tujuan_tujuan->gambar : old('gambar')); ?>">

        <?php $__errorArgs = ['gambar'];
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
<?php /**PATH D:\bikinaplikasi\project\setup_server_default\sites\reservasi-dan-travel-zaky.bikinaplikasi.dev\resources\views/lokasi-tujuan/form.blade.php ENDPATH**/ ?>