<div class="form-group <?php echo e($errors->has('nama') ? 'has-error' : ''); ?>">
    <label for="nama" class="control-label"><?php echo e('Nama'); ?></label>

    <div class="col-md-12">
        <input placeholder="nama" class="form-control form-control-line <?php $__errorArgs = ['nama'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
               name="nama" type="text" id="nama"
               value="<?php echo e(isset($tiket->nama) ? $tiket->nama : old('nama')); ?>"
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

<div class="form-group <?php echo e($errors->has('status') ? 'has-error' : ''); ?>">
    <label for="status" class="control-label"><?php echo e('Status'); ?></label>

    <div class="col-md-12">

        <select name="status" class="form-control form-control-line status" id="status" required>
            <?php $__currentLoopData = ['Tersedia' => 'Tersedia', 'Tidak Tersedia' => 'Tidak Tersedia']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option
                    value="<?php echo e($status); ?>" <?php echo e((isset($tiket->status) && $tiket->status == $status) || old('status') == $status  ? 'selected' : ''); ?>><?php echo e($status); ?></option>
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
               value="<?php echo e(isset($tiket->jumlah) ? $tiket->jumlah : old('jumlah')); ?>"
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

<div class="form-group <?php echo e($errors->has('mobil_id') ? 'has-error' : ''); ?>">
    <label for="mobil_id" class="control-label"><?php echo e('Mobil'); ?></label>

    <div class="col-md-12">

        <input list="mobil_id" class="form-control form-control-line" required name="mobil_id" value="<?php echo e(isset($tiket->mobil_id) ? $tiket->mobil_id : old('mobil_id')); ?>">

        <datalist id="mobil_id">
            <option value=""></option>
            <?php $__currentLoopData = $mobils; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mobil): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option
                    value="<?php echo e($mobil->id); ?>" <?php echo e((isset($tiket->mobil_id) && $tiket->mobil_id == $mobil->id) || old('mobil_id') == $mobil->id ? 'selected' : ''); ?>><?php echo e("$mobil->nama"); ?></option>
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

<div class="form-group <?php echo e($errors->has('tujuan_id') ? 'has-error' : ''); ?>">
    <label for="tujuan_id" class="control-label"><?php echo e('Tujuan'); ?></label>

    <div class="col-md-12">

        <input list="tujuan_id" class="form-control form-control-line tujuan_id" required name="tujuan_id" value="<?php echo e(isset($tiket->tujuan_id) ? $tiket->tujuan_id : old('tujuan_id')); ?>">

        <datalist id="tujuan_id">
            <?php $__currentLoopData = $tujuans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tujuan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option
                    value="<?php echo e($tujuan->id); ?>" <?php echo e((isset($tujuan->tujuan_id) && $tujuan->tujuan_id == $tujuan->id) || old('tujuan_id') == $tujuan->id ? 'selected' : ''); ?>><?php echo e($tujuan->dari); ?> - <?php echo e($tujuan->ke); ?> (<?php echo e(toIdr($tujuan->biaya)); ?>)</option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </datalist>

        <?php $__errorArgs = ['tujuan_id'];
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
    <label for="jadwal_id" class="control-label"><?php echo e('Jadwal'); ?></label>

    <div class="col-md-12">

        <input list="jadwal_id" class="form-control form-control-line jadwal_id" required name="jadwal_id" value="<?php echo e(isset($tiket->jadwal_id) ? $tiket->jadwal_id : old('jadwal_id')); ?>">

        <datalist id="jadwal_id">
            <?php $__currentLoopData = $jadwals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jadwal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option
                    value="<?php echo e($jadwal->id); ?>" <?php echo e((isset($tiket->jadwal_id) && $tiket->jadwal_id == $jadwal->id) || old('jadwal_id') == $jadwal->id ? 'selected' : ''); ?>><?php echo e($jadwal->hari); ?> - <?php echo e($jadwal->jam); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </datalist>

        <?php $__errorArgs = ['jadwal_id'];
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
    <label for="supir_id" class="control-label"><?php echo e('Supir'); ?></label>

    <div class="col-md-12">

        <input list="supir_id" class="form-control form-control-line supir_id" required name="supir_id" value="<?php echo e(isset($tiket->supir_id) ? $tiket->supir_id : old('supir_id')); ?>">

        <datalist id="supir_id">
            <?php $__currentLoopData = $supirs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $supir): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option
                    value="<?php echo e($supir->id); ?>" <?php echo e((isset($tiket->supir_id) && $tiket->supir_id == $supir->id) || old('supir_id') == $supir->id ? 'selected' : ''); ?>><?php echo e($supir->name); ?></option>
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


<div class="form-group">
    <div class="col-sm-12">
        <button class="btn btn-primary" type="submit">Simpan</button>
    </div>
</div>


<?php /**PATH D:\bikinaplikasi\project\81zaky\reservasi_and_travel\resources\views/tiket/form.blade.php ENDPATH**/ ?>