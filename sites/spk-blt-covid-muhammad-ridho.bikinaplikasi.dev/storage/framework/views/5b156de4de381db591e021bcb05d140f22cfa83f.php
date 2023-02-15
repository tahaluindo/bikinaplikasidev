<div class="form-group <?php echo e($errors->has('anggota_id') ? 'has-error' : ''); ?>">
    <label for="anggota_id" class="control-label"><?php echo e('Anggota Id'); ?></label>

    <div class="col-md-12">

        <input list="anggota_id" class="form-control form-control-line" required name="anggota_id">

        <datalist id="anggota_id" >
            <?php $__currentLoopData = $anggotas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $anggota): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($anggota->id); ?>" <?php echo e((isset($peminjaman->anggota_id) && $peminjaman->anggota_id == $anggota->id) || old('anggota_id') == $anggota->id ? 'selected' : ''); ?>><?php echo e("$anggota->nama (no induk: $anggota->no_induk)"); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </datalist>

        <?php $__errorArgs = ['anggota_id'];
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

<div class="form-group <?php echo e($errors->has('user_petugas_id') ? 'has-error' : ''); ?>">
    <label for="user_petugas_id" class="control-label"><?php echo e('User Petugas Id'); ?></label>

    <div class="col-md-12">

        <?php echo e(auth()->user()->name); ?>

        <input type="hidden" name="user_petugas_id" value="<?php echo e(auth()->user()->id); ?>">

        <?php $__errorArgs = ['user_petugas_id'];
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
<div class="form-group <?php echo e($errors->has('tanggal') ? 'has-error' : ''); ?>">
    <label for="tanggal" class="control-label"><?php echo e('Tanggal'); ?></label>

<div class="col-md-12">
    <input placeholder="tanggal" class="flatpickr form-control form-control-line <?php $__errorArgs = ['tanggal'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="tanggal" type="text" id="tanggal" value="<?php echo e(isset($peminjaman->tanggal) ? $peminjaman->tanggal : (old('tanggal') == "" ? date('d-M-Y') : old('tanggal'))); ?>" required>

    <?php $__errorArgs = ['tanggal'];
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
<div class="form-group <?php echo e($errors->has('tanggal_pengembalian') ? 'has-error' : ''); ?>">
    <label for="tanggal_pengembalian" class="control-label"><?php echo e('Tanggal Pengembalian'); ?></label>

<div class="col-md-12">
    <input placeholder="tanggal_pengembalian" class="flatpickr form-control form-control-line <?php $__errorArgs = ['tanggal_pengembalian'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="tanggal_pengembalian" type="text" id="tanggal_pengembalian" value="<?php echo e(isset($peminjaman->tanggal_pengembalian) ? $peminjaman->tanggal_pengembalian : (old('tanggal_pengembalian') == "" ? now()->addday(env('APP_WAKTU_TERLAMBAT'))->format('d-M-Y') : old('tanggal_pengembalian'))); ?>" required>

    <?php $__errorArgs = ['tanggal_pengembalian'];
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

<?php if(Route::current()->action['as'] == 'peminjaman.create'): ?>
<div class="form-group <?php echo e($errors->has('status') ? 'has-error' : ''); ?>">
    <label for="status" class="control-label"><?php echo e('Status'); ?></label>

    <div class="col-md-12">

        Berlangsung
        <input type="hidden" name="status" value="<?php echo e("Berlangsung"); ?>">

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
<?php else: ?>
<div class="form-group <?php echo e($errors->has('status') ? 'has-error' : ''); ?>">
    <label for="status" class="control-label"><?php echo e('Status'); ?></label>

    <div class="col-md-12">

        <select name="status" class="form-control form-control-line" id="status" required>
            <?php $__currentLoopData = ['Berlangsung', 'Selesai', 'Perpanjangan', 'Tidak Dikembalikan','Diganti']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if(!in_array($peminjaman->status, ['Selesai'])): ?>
                <option value="<?php echo e($status); ?>" <?php echo e((isset($peminjaman->status) && $peminjaman->status == $status) || old('status') == $status  ? 'selected' : ''); ?>><?php echo e($status); ?></option>
                <?php elseif($peminjaman->status == 'Selesai'): ?>
                <option value="<?php echo e('Selesai'); ?>" <?php echo e((isset($peminjaman->status) && $peminjaman->status == 'Selesai') || old('status') == 'Selesai'  ? 'selected' : ''); ?>><?php echo e('Selesai'); ?></option>
                <?php break; ?>
                <?php endif; ?>
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
<?php endif; ?>

<div class="form-group">
    <div class="col-sm-12">
        <button class="btn btn-success" type="submit">Simpan</button>
    </div>
</div>
<?php /**PATH D:\bikinaplikasi\project\40. ebi\perpustakaan\resources\views/peminjaman/form.blade.php ENDPATH**/ ?>