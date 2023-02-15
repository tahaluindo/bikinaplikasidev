<div class="form-group <?php echo e($errors->has('user_id') ? 'has-error' : ''); ?>">
    <label for="user_id" class="control-label"><?php echo e('User Id'); ?></label>

    <div class="col-md-12">

        <input list="user_id" class="form-control form-control-line" name="user_id" value="<?php echo e(isset($pemesanan_paket->user_id) ? $pemesanan_paket->user_id : old('user_id')); ?>">

        <datalist id="user_id">
            <option value=""></option>
            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option
                    value="<?php echo e($user->id); ?>" <?php echo e((isset($pemesanan_paket->user_id) && $pemesanan_paket->user_id == $user->id) || old('user_id') == $user->id ? 'selected' : ''); ?>><?php echo e("$user->name"); ?></option>
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
    <label for="paket_id" class="control-label"><?php echo e('Paket Id'); ?></label>

    <div class="col-md-12">

        <input list="paket_id" class="form-control form-control-line paket_id" required name="paket_id" value="<?php echo e(isset($pemesanan_paket->paket_id) ? $pemesanan_paket->paket_id : old('paket_id')); ?>">

        <datalist id="paket_id">
            <?php $__currentLoopData = $pakets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $paket): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option
                    value="<?php echo e($paket->id); ?>" <?php echo e((isset($pemesanan_paket->paket_id) && $pemesanan_paket->paket_id == $paket->id) || old('paket_id') == $paket->id ? 'selected' : ''); ?>><?php echo e($paket->nama); ?> - <?php echo e(toIdr($paket->harga)); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </datalist>

        <?php $__errorArgs = ['paket_id'];
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
               name="bukti_transfer" type="file" min="1" id="bukti_transfer">

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
               value="<?php echo e(isset($pemesanan_paket->total_bayar) ? $pemesanan_paket->total_bayar : (old('total_bayar') == "" ? 0 : old('total_bayar'))); ?>"
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
               class="refund form-control form-control-line <?php $__errorArgs = ['refund'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
               name="refund" type="number" min="0" id="refund"
               value="<?php echo e(isset($pemesanan_paket->refund) ? $pemesanan_paket->refund : (old('refund') == "" ? 0 : old('refund'))); ?>">

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

        <select name="status" class="form-control form-control-line status" id="status" required>
            <?php $__currentLoopData = ['Baru','Dikonfirmasi','Dibatalkan','Refund']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option
                    value="<?php echo e($status); ?>" <?php echo e((isset($pemesanan_paket->status) && $pemesanan_paket->status == $status) || old('status') == $status  ? 'selected' : ''); ?>><?php echo e($status); ?></option>
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


<?php /**PATH D:\bikinaplikasi\project\setup_server_default\sites\reservasi-dan-travel-zaky.bikinaplikasi.dev\resources\views/pemesanan-paket/form.blade.php ENDPATH**/ ?>