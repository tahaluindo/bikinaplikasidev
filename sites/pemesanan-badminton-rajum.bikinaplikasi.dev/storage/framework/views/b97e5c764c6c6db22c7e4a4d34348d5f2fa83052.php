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
               value="<?php echo e(isset($mobil->nama) ? $mobil->nama : (old('nama') == "" ? "" : old('nama'))); ?>"
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

<div class="form-group <?php echo e($errors->has('jumlah_kursi') ? 'has-error' : ''); ?>">
    <label for="jumlah_kursi" class="control-label"><?php echo e('Jumlah Kursi'); ?></label>

    <div class="col-md-12">
        <input placeholder="jumlah_kursi" class="jumlah_kursi form-control form-control-line <?php $__errorArgs = ['jumlah_kursi'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
               name="jumlah_kursi" type="number" min="0" id="jumlah_kursi"
               value="<?php echo e(isset($mobil->jumlah_kursi) ? $mobil->jumlah_kursi : (old('jumlah_kursi') == "" ? "" : old('jumlah_kursi'))); ?>"
               required>

        <?php $__errorArgs = ['jumlah_kursi'];
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

<div class="form-group <?php echo e($errors->has('biaya_rental') ? 'has-error' : ''); ?>">
    <label for="biaya_rental" class="control-label"><?php echo e('Biaya Rental'); ?></label>

    <div class="col-md-12">
        <input placeholder="biaya_rental" class="biaya_rental form-control form-control-line <?php $__errorArgs = ['biaya_rental'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
               name="biaya_rental" type="number" min="0" id="biaya_rental"
               value="<?php echo e(isset($mobil->biaya_rental) ? $mobil->biaya_rental : (old('biaya_rental') == "" ? "" : old('biaya_rental'))); ?>"
               required>

        <?php $__errorArgs = ['biaya_rental'];
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

<div class="form-group <?php echo e($errors->has('biaya_supir') ? 'has-error' : ''); ?>">
    <label for="biaya_supir" class="control-label"><?php echo e('Biaya Supir'); ?></label>

    <div class="col-md-12">
        <input placeholder="biaya_supir" class="biaya_supir form-control form-control-line <?php $__errorArgs = ['biaya_supir'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
               name="biaya_supir" type="number" min="0" id="biaya_supir"
               value="<?php echo e(isset($mobil->biaya_supir) ? $mobil->biaya_supir : (old('biaya_supir') == "" ? "" : old('biaya_supir'))); ?>"
               required>

        <?php $__errorArgs = ['biaya_supir'];
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


<div class="form-group <?php echo e($errors->has('ke') ? 'has-error' : ''); ?>">
    <label for="ke" class="control-label"><?php echo e('Status'); ?></label>

    <div class="col-md-12">

        <input list="status" class="form-control form-control-line status" required name="status" value="<?php echo e(isset($mobil->status) ? $mobil->status : old('status')); ?>">

        <datalist id="status">
            <option value=""></option>
            <?php $__currentLoopData = ['Tersedia', 'Tidak Tersedia']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $optionValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option
                    value="<?php echo e($optionValue); ?>" <?php echo e((isset($mobil->status) && $optionValue == $mobil->status) || old('status') == $optionValue ? 'selected' : ''); ?>><?php echo e($optionValue); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </datalist>

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
               value="<?php echo e(isset($mobil->gambar) ? $mobil->gambar : old('gambar')); ?>">

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



<div class="form-group <?php echo e($errors->has('foto') ? 'has-error' : ''); ?>">
    <label for="fasilitas_ids" class="control-label"><?php echo e('Fasilitas'); ?></label>

    <div class="col-md-12">
        <?php $__empty_1 = true; $__currentLoopData = $fasilitas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $itemFasilitas): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <input placeholder="fasilitas_ids" class="fasilitas_ids form-control-line <?php $__errorArgs = ['fasilitas_ids'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
               name="fasilitas_ids[]" type="checkbox" id="fasilitas_ids"
               value="<?php echo e($itemFasilitas->id); ?>"> <?php echo e($itemFasilitas->nama); ?> (<?php echo e($itemFasilitas->deskripsi); ?>)<br>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <strong>Tidak ada fasilitas</strong>
        <?php endif; ?>

        <?php $__errorArgs = ['fasilitas_ids'];
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
<?php /**PATH C:\xampp\htdocs\reservasi-dan-travel-zaky.bikinaplikasi.dev\resources\views/mobil/form.blade.php ENDPATH**/ ?>