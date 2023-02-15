<div class="form-group <?php echo e($errors->has('user_id') ? 'has-error' : ''); ?>">
    <label for="user_id" class="control-label"><?php echo e('User Id'); ?></label>

    <div class="col-md-12">

        <input list="user_id" class="form-control form-control-line" name="user_id" value="<?php echo e(isset($pengiriman_paket->user_id) ? $pengiriman_paket->user_id : old('user_id')); ?>">

        <datalist id="user_id">
            <option value=""></option>
            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option
                    value="<?php echo e($user->id); ?>" <?php echo e((isset($pengiriman_paket->user_id) && $pengiriman_paket->user_id == $user->id) || old('user_id') == $user->id ? 'selected' : ''); ?>><?php echo e("$user->name"); ?></option>
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

<div class="form-group <?php echo e($errors->has('paket_id') ? 'has-error' : ''); ?>">
    <label for="paket_id" class="control-label"><?php echo e('Paket Id'); ?></label>

    <div class="col-md-12">

        <select name="paket_id" class="form-control">
            <?php $__currentLoopData = $pakets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $paket): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option
                    value="<?php echo e($paket->id); ?>" <?php echo e((isset($pengiriman_paket->paket_id) && $pengiriman_paket->paket_id == $paket->id) || old('paket_id') == $paket->id ? 'selected' : ''); ?>><?php echo e($paket->nama); ?> +<?php echo e(toIdr($paket->kenaikan_harga)); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>

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

<div class="form-group <?php echo e($errors->has('rute_id') ? 'has-error' : ''); ?>">
    <label for="rute_id" class="control-label"><?php echo e('Rute Id'); ?></label>

    <div class="col-md-12">

        <input list="rute_id" class="form-control form-control-line rute_id" required name="rute_id" value="<?php echo e(isset($pengiriman_paket->rute_id) ? $pengiriman_paket->rute_id : old('rute_id')); ?>">

        <datalist id="rute_id">
            <?php $__currentLoopData = $rutes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option
                    value="<?php echo e($rute->id); ?>" <?php echo e((isset($pengiriman_paket->rute_id) && $pengiriman_paket->rute_id == $rute->id) || old('rute_id') == $rute->id ? 'selected' : ''); ?>><?php echo e($rute->dari()->nama); ?> - <?php echo e($rute->ke()->nama); ?> | <?php echo e(toIdr($rute->biaya)); ?></option>
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

<div class="form-group <?php echo e($errors->has('jadwal_id') ? 'has-error' : ''); ?>">
    <label for="jadwal_id" class="control-label"><?php echo e('Jadwal Id'); ?></label>

    <div class="col-md-12">

        <input list="jadwal_id" class="form-control form-control-line jadwal_id" required name="jadwal_id" value="<?php echo e(isset($pengiriman_paket->jadwal_id) ? $pengiriman_paket->jadwal->id : old('jadwal_id')); ?>">

        <datalist id="jadwal_id">
            <?php $__currentLoopData = $jadwals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jadwal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option
                    value="<?php echo e($jadwal->id); ?>" <?php echo e((isset($pengiriman_paket->jadwal) && $pengiriman_paket->jadwal_id == $jadwal->id) || old('jadwal') == $jadwal->id ? 'selected' : ''); ?>><?php echo e($jadwal->hari); ?> - <?php echo e($jadwal->jam_mulai); ?>  - <?php echo e($jadwal->jam_akhir); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </datalist>

        <?php $__errorArgs = ['jadwal'];
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
               value="<?php echo e(isset($pengiriman_paket->jumlah) ? $pengiriman_paket->jumlah : (old('jumlah') == "" ? "1" : old('jumlah'))); ?>"
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

<div class="form-group <?php echo e($errors->has('diantar_pada') ? 'has-error' : ''); ?>">
    <label for="diantar_pada" class="control-label"><?php echo e('Diantar Pada'); ?></label>

    <div class="col-md-12">
        <input placeholder="diantar_pada"
               class="flatpickr form-control form-control-line <?php $__errorArgs = ['diantar_pada'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
               name="diantar_pada" type="text" id="diantar_pada"
               value="<?php echo e(isset($pengiriman_paket->diantar_pada) ? $pengiriman_paket->diantar_pada : (old('diantar_pada') == "" ? now()->addday(env('APP_WAKTU_TERLAMBAT'))->format('d-M-Y') : old('diantar_pada'))); ?>"
               required>

        <?php $__errorArgs = ['diantar_pada'];
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
               value="<?php echo e(isset($pengiriman_paket->total_bayar) ? $pengiriman_paket->total_bayar : (old('total_bayar') == "" ? 0 : old('total_bayar'))); ?>"
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
               name="refund" type="number" min="0" id="refund"
               value="<?php echo e(isset($rental_mobil->refund) ? $rental_mobil->refund : (old('refund') == "" ? 0 : old('refund'))); ?>">

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
            <?php $__currentLoopData = ['Baru','Dikirim','Dibatalkan','Refund', 'Diterima']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option
                    value="<?php echo e($status); ?>" <?php echo e((isset($pengiriman_paket->status) && $pengiriman_paket->status == $status) || old('status') == $status  ? 'selected' : ''); ?>><?php echo e($status); ?></option>
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

<div class="form-group <?php echo e($errors->has('catatan') ? 'has-error' : ''); ?>">
    <label for="catatan" class="control-label"><?php echo e('Catatan'); ?></label>

    <div class="col-md-12">
        <textarea placeholder="catatan" class="catatan form-control form-control-line <?php $__errorArgs = ['catatan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
               name="catatan" type="text" min="1" id="catatan"
               required><?php echo e(isset($pengiriman_paket->catatan) ? $pengiriman_paket->catatan : (old('catatan') == "" ? "-" : old('catatan'))); ?></textarea>

        <?php $__errorArgs = ['catatan'];
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


<?php /**PATH D:\bikinaplikasi\project\setup_server_default\sites\pengiriman-paket-yandi.bikinaplikasi.dev\resources\views/pengiriman-paket/form.blade.php ENDPATH**/ ?>