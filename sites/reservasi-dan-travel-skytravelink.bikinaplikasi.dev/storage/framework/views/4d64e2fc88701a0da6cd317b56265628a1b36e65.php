

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

<div class="form-group <?php echo e($errors->has('jadwal_id') ? 'has-error' : ''); ?>">
    <label for="jadwal_id" class="control-label"><?php echo e('Jadwal'); ?></label>

    <div class="col-md-12">

        <input list="jadwal_id" class="form-control form-control-line jadwal_id" required name="jadwal_id" value="<?php echo e(isset($tiket->jadwal_id) ? $tiket->jadwal_id : old('jadwal_id')); ?>">

        <datalist id="jadwal_id">
            <?php $__currentLoopData = $jadwals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jadwal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option
                    value="<?php echo e($jadwal->id); ?>" <?php echo e((isset($tiket->jadwal_id) && $tiket->jadwal_id == $jadwal->id) || old('jadwal_id') == $jadwal->id ? 'selected' : ''); ?>><?php echo e($jadwal->hari); ?>, <?php echo e($jadwal->jam_mulai); ?> - <?php echo e($jadwal->jam_akhir); ?></option>
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

<div class="form-group <?php echo e($errors->has('dimulai_pada') ? 'has-error' : ''); ?>">
    <label for="dimulai_pada" class="control-label"><?php echo e('Dimulai pada'); ?></label>

    <div class="col-md-12">
        <input placeholder="dimulai_pada"
               class="dimulai_pada flatpickr form-control form-control-line <?php $__errorArgs = ['dimulai_pada'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
               name="dimulai_pada" type="text" id="dimulai_pada"
               value="<?php echo e(isset($tiket->dimulai_pada) ? $tiket->dimulai_pada : (old('dimulai_pada') == "" ? now()->format('d-M-Y') : old('dimulai_pada'))); ?>"
               required>

        <?php $__errorArgs = ['dimulai_pada'];
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
    <label for="berakhir_pada" class="berakhir_pada control-label"><?php echo e('Berakhir Pada'); ?></label>

    <div class="col-md-12">
        <input placeholder="berakhir_pada"
               class="berakhir_pada flatpickr form-control form-control-line <?php $__errorArgs = ['berakhir_pada'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
               name="berakhir_pada" type="text" id="berakhir_pada"
               value="<?php echo e(isset($tiket->berakhir_pada) ? $tiket->berakhir_pada : (old('berakhir_pada') == "" ? now()->addDays(env('APP_WAKTU_PERPANJANGAN'))->format('d-M-Y') : old('berakhir_pada'))); ?>"
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


<div class="form-group <?php echo e($errors->has('pulang_pergi') ? 'has-error' : ''); ?>">
    <label for="pulang_pergi" class="control-label"><?php echo e('Pulang Pergi'); ?></label>

    <div class="col-md-12">

        <select name="pulang_pergi" class="form-control form-control-line pulang_pergi" id="pulang_pergi" required>
            <?php $__currentLoopData = ['Ya' => 'Ya', 'Tidak' => 'Tidak']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pulang_pergi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option
                    value="<?php echo e($pulang_pergi); ?>" <?php echo e((isset($tiket->pulang_pergi) && $tiket->pulang_pergi == $pulang_pergi) || old('pulang_pergi') == $pulang_pergi  ? 'selected' : ''); ?>><?php echo e($pulang_pergi); ?></option>
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

<div class="form-group">
    <div class="col-sm-12">
        <button class="btn btn-primary" type="submit">Simpan</button>
    </div>
</div>


<?php /**PATH D:\bikinaplikasi\project\setup_server_default\sites\reservasi-dan-travel-zaky.bikinaplikasi.dev\resources\views/tiket/form.blade.php ENDPATH**/ ?>