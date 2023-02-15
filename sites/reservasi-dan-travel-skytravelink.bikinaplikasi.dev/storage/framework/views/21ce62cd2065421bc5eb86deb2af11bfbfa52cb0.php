<div class="form-group <?php echo e($errors->has('user_id') ? 'has-error' : ''); ?>">
    <label for="user_id" class="control-label"><?php echo e('User Id'); ?></label>

    <div class="col-md-12">

        <input list="user_id" class="form-control form-control-line" required name="user_id" value="<?php echo e(isset($reservasi_tiket->user_id) ? $reservasi_tiket->user_id : old('user_id')); ?>">

        <datalist id="user_id">
            <option value=""></option>
            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option
                    value="<?php echo e($user->id); ?>" <?php echo e((isset($reservasi_tiket->user_id) && $reservasi_tiket->user_id == $user->id) || old('user_id') == $user->id ? 'selected' : ''); ?>><?php echo e("$user->name"); ?></option>
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

<div class="form-group <?php echo e($errors->has('tiket_id') ? 'has-error' : ''); ?>">
    <label for="tiket_id" class="control-label"><?php echo e('Tiket Id'); ?></label>

    <div class="col-md-12">

        <input list="tiket_id" class="form-control form-control-line tiket_id" required name="tiket_id" value="<?php echo e(isset($reservasi_tiket->tiket_id) ? $reservasi_tiket->tiket_id : old('tiket_id')); ?>">

        <datalist id="tiket_id">
            <?php $__currentLoopData = $tikets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tiket): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option
                    value="<?php echo e($tiket->id); ?>" <?php echo e((isset($reservasi_tiket->tiket_id) && $reservasi_tiket->tiket_id == $tiket->id) || old('tiket_id') == $tiket->id ? 'selected' : ''); ?>><?php echo e($tiket->nama); ?> - <?php echo e(toIdr($tiket->tujuan->biaya)); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </datalist>

        <?php $__errorArgs = ['tiket_id'];
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

<div class="form-group <?php echo e($errors->has('jumlah') ? 'has-error' : ''); ?>">
    <label for="jumlah" class="control-label"><?php echo e('Jumlah'); ?></label>

    <div class="col-md-12">
        <input placeholder="jumlah" class="jumlah form-control form-control-line <?php $__errorArgs = ['jumlah'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
               name="jumlah" type="number" min="1" id="jumlah"
               value="<?php echo e(isset($reservasi_tiket->jumlah) ? $reservasi_tiket->jumlah : old('jumlah')); ?>"
               required>

        <?php $__errorArgs = ['jumlah'];
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

<div class="form-group <?php echo e($errors->has('berakhir_pada') ? 'has-error' : ''); ?>">
    <label for="berakhir_pada" class="control-label"><?php echo e('Berakhir Pada'); ?></label>

    <div class="col-md-12">
        <input placeholder="berakhir_pada"
               class="flatpickr form-control form-control-line <?php $__errorArgs = ['berakhir_pada'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
               name="berakhir_pada" type="text" id="berakhir_pada"
               value="<?php echo e(isset($reservasi_tiket->berakhir_pada) ? $reservasi_tiket->berakhir_pada : (old('berakhir_pada') == "" ? now()->addday(env('APP_WAKTU_TERLAMBAT'))->format('d-M-Y') : old('berakhir_pada'))); ?>"
               required>

        <?php $__errorArgs = ['berakhir_pada'];
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
               value="<?php echo e(isset($reservasi_tiket->bukti_transfer) ? $reservasi_tiket->bukti_transfer : old('bukti_transfer')); ?>">

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
               value="<?php echo e(isset($reservasi_tiket->no_hp) ? $reservasi_tiket->no_hp : old('no_hp')); ?>"
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

<div class="form-group <?php echo e($errors->has('pulang_pergi') ? 'has-error' : ''); ?>">
    <label for="pulang_pergi" class="control-label"><?php echo e('Pulang Pergi'); ?></label>

    <div class="col-md-12">

        <select name="pulang_pergi" class="form-control form-control-line pulang_pergi" id="pulang_pergi" required>
            <?php $__currentLoopData = ['Ya' => 'Ya', 'Tidak' => 'Tidak']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pulang_pergi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option
                    value="<?php echo e($pulang_pergi); ?>" <?php echo e((isset($reservasi_tiket->pulang_pergi) && $reservasi_tiket->pulang_pergi == $pulang_pergi) || old('pulang_pergi') == $pulang_pergi  ? 'selected' : ''); ?>><?php echo e($pulang_pergi); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>

        <?php $__errorArgs = ['pulang_pergi'];
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
               value="<?php echo e(isset($reservasi_tiket->diskon) ? $reservasi_tiket->diskon : (old('diskon') == "" ? 0 : old('diskon'))); ?>"
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
               value="<?php echo e(isset($reservasi_tiket->total_bayar) ? $reservasi_tiket->total_bayar : (old('total_bayar') == "" ? 0 : old('total_bayar'))); ?>"
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
            <?php $__currentLoopData = ['Baru','Dikonfirmasi','Dibatalkan','Refund']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $optionValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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


<?php /**PATH D:\bikinaplikasi\project\81zaky\reservasi_and_travel\resources\views/reservasi-tiket/form.blade.php ENDPATH**/ ?>