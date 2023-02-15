<div class="form-group <?php echo e($errors->has('user_id') ? 'has-error' : ''); ?>">
    <label for="user_id" class="control-label"><?php echo e('User Id'); ?></label>

    <div class="col-md-12">

        <input list="user_id" class="form-control form-control-line" required name="user_id" value="<?php echo e(isset($rental_mobil->user_id) ? $rental_mobil->user_id : old('user_id')); ?>">

        <datalist id="user_id">
            <option value=""></option>
            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option
                    value="<?php echo e($user->id); ?>" <?php echo e((isset($rental_mobil->user_id) && $rental_mobil->user_id == $user->id) || old('user_id') == $user->id ? 'selected' : ''); ?>><?php echo e("$user->name"); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </datalist>

        <?php $__errorArgs = ['user_id'];
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

<div class="form-group <?php echo e($errors->has('mobil_id') ? 'has-error' : ''); ?>">
    <label for="mobil_id" class="control-label"><?php echo e('Mobil Id'); ?></label>

    <div class="col-md-12">

        <input list="mobil_id" class="form-control form-control-line mobil_id" required name="mobil_id" value="<?php echo e(isset($rental_mobil->mobil_id) ? $rental_mobil->mobil_id : old('mobil_id')); ?>">

        <datalist id="mobil_id">
            <?php $__currentLoopData = $mobils; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mobil): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option
                    value="<?php echo e($mobil->id); ?>" <?php echo e((isset($rental_mobil->mobil_id) && $rental_mobil->mobil_id == $mobil->id) || old('mobil_id') == $mobil->id ? 'selected' : ''); ?>><?php echo e($mobil->nama); ?> - <?php echo e(toIdr($mobil->biaya_rental)); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </datalist>

        <?php $__errorArgs = ['mobil_id'];
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

<div class="form-group <?php echo e($errors->has('supir_id') ? 'has-error' : ''); ?>">
    <label for="supir_id" class="control-label"><?php echo e('Supir Id'); ?></label>

    <div class="col-md-12">

        <input list="supir_id" class="form-control form-control-line supir_id" required name="supir_id" value="<?php echo e(isset($rental_mobil->supir_id) ? $rental_mobil->supir_id : old('supir_id')); ?>">

        <datalist id="supir_id">
            <option value=""></option>
            <?php $__currentLoopData = $supirs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $supir): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option
                    value="<?php echo e($supir->id); ?>" <?php echo e((isset($rental_supir->supir_id) && $rental_supir->supir_id == $supir->id) || old('supir_id') == $supir->id ? 'selected' : ''); ?>><?php echo e($supir->name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </datalist>

        <?php $__errorArgs = ['supir_id'];
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

<div class="form-group <?php echo e($errors->has('dari_tanggal') ? 'has-error' : ''); ?>">
    <label for="dari_tanggal" class="control-label"><?php echo e('Dari Tanggal'); ?></label>

    <div class="col-md-12">
        <input placeholder="dari_tanggal"
               class="dari_tanggal flatpickr form-control form-control-line <?php $__errorArgs = ['dari_tanggal'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
               name="dari_tanggal" type="text" id="dari_tanggal"
               value="<?php echo e(isset($rental_mobil->dari_tanggal) ? $rental_mobil->dari_tanggal : (old('dari_tanggal') == "" ? now()->format('d-M-Y') : old('dari_tanggal'))); ?>"
               required>

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

<div class="form-group <?php echo e($errors->has('sampai_tanggal') ? 'has-error' : ''); ?>">
    <label for="sampai_tanggal" class="sampai_tanggal control-label"><?php echo e('Sampai Tanggal'); ?></label>

    <div class="col-md-12">
        <input placeholder="sampai_tanggal"
               class="sampai_tanggal flatpickr form-control form-control-line <?php $__errorArgs = ['sampai_tanggal'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
               name="sampai_tanggal" type="text" id="sampai_tanggal"
               value="<?php echo e(isset($rental_mobil->sampai_tanggal) ? $rental_mobil->sampai_tanggal : (old('sampai_tanggal') == "" ? now()->addDays(env('APP_WAKTU_PERPANJANGAN'))->format('d-M-Y') : old('sampai_tanggal'))); ?>"
               required>

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

<div class="form-group <?php echo e($errors->has('biaya_transfer') ? 'has-error' : ''); ?>">
    <label for="bukti_transfer" class="control-label"><?php echo e('Bukti Transfer'); ?></label>

    <div class="col-md-12">
        <input placeholder="bukti_transfer"
               class="form-control form-control-line <?php $__errorArgs = ['bukti_transfer'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
               name="bukti_transfer" type="file" min="1" id="bukti_transfer"
               value="<?php echo e(isset($rental_mobil->bukti_transfer) ? $rental_mobil->bukti_transfer : old('bukti_transfer')); ?>">

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


<div class="form-group <?php echo e($errors->has('no_hp') ? 'has-error' : ''); ?>">
    <label for="no_hp" class="control-label"><?php echo e('No Hp'); ?></label>

    <div class="col-md-12">
        <input placeholder="no_hp" class="form-control form-control-line <?php $__errorArgs = ['no_hp'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
               name="no_hp" type="number" min="1" id="no_hp"
               value="<?php echo e(isset($rental_mobil->no_hp) ? $rental_mobil->no_hp : old('no_hp')); ?>"
               required>

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

<div class="form-group <?php echo e($errors->has('biaya_supir') ? 'has-error' : ''); ?>">
    <label for="biaya_supir" class="control-label"><?php echo e('Biaya Supir (Per Hari)'); ?></label>

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
               value="<?php echo e(isset($rental_mobil->biaya_supir) ? $rental_mobil->biaya_supir : old('biaya_supir')); ?>"
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

<div class="form-group <?php echo e($errors->has('diskon') ? 'has-error' : ''); ?>">
    <label for="diskon" class="control-label"><?php echo e('Diskon (Dalam Rupiah)'); ?></label>

    <div class="col-md-12">
        <input placeholder="diskon" class="diskon form-control form-control-line <?php $__errorArgs = ['diskon'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
               name="diskon" type="number" min="0" id="diskon"
               value="<?php echo e(isset($rental_mobil->diskon) ? $rental_mobil->diskon : (old('diskon') == "" ? 0 : old('diskon'))); ?>"
               required>

        <?php $__errorArgs = ['diskon'];
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

<div class="form-group <?php echo e($errors->has('total_bayar') ? 'has-error' : ''); ?>">
    <label for="total_bayar" class="control-label"><?php echo e('Total Bayar'); ?></label>

    <div class="col-md-12">
        <input placeholder="total_bayar"
               class="form-control form-control-line <?php $__errorArgs = ['total_bayar'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
               name="total_bayar" type="number" min="1" id="total_bayar"
               value="<?php echo e(isset($rental_mobil->total_bayar) ? $rental_mobil->total_bayar : (old('total_bayar') == "" ? 0 : old('total_bayar'))); ?>"
               required readonly>

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

<div class="form-group <?php echo e($errors->has('refund') ? 'has-error' : ''); ?>">
    <label for="refund" class="control-label"><?php echo e('Refund'); ?></label>

    <div class="col-md-12">
        <input placeholder="refund"
               class="form-control form-control-line <?php $__errorArgs = ['refund'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
               name="refund" type="number" min="1" id="refund"
               value="<?php echo e(isset($rental_mobil->refund) ? $rental_mobil->refund : (old('refund') == "" ? 0 : old('refund'))); ?>"
               required readonly>

        <?php $__errorArgs = ['refund'];
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

        <input list="status" class="form-control form-control-line status" required name="status" value="<?php echo e(isset($rental_mobil->status) ? $rental_mobil->status : old('status')); ?>">

        <datalist id="status">
            <option value=""></option>
            <?php $__currentLoopData = ['Baru','Dikirim','Dibatalkan','Refund']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $optionValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option
                    value="<?php echo e($optionValue); ?>" <?php echo e((isset($rental_mobil->status) && $rental_mobil->status == $optionValue) || old('status') == $optionValue ? 'selected' : ''); ?>><?php echo e($optionValue); ?></option>
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

<div class="form-group">
    <div class="col-sm-12">
        <button class="btn btn-primary" type="submit">Simpan</button>
    </div>
</div>


<?php /**PATH D:\bikinaplikasi\project\81zaky\reservasi_and_travel\resources\views/rental-mobil/form.blade.php ENDPATH**/ ?>
