<div class="form-group <?php echo e($errors->has('no_identitas') ? 'has-error' : ''); ?>">
    <label for="no_identitas" class="control-label"><?php echo e('Id anggota'); ?></label>

    <div class="col-md-12">
        <input placeholder="id_anggota"
            class="form-control form-control-line <?php $__errorArgs = ['no_identitas'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="no_identitas"
            type="text" id="no_identitas" value="<?php echo e(isset($anggotum->no_identitas) ? $anggotum->no_identitas : old('no_identitas')); ?>"
            required>

        <?php $__errorArgs = ['no_identitas'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <span class="invalid-feedback" role="alert">
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
        <input placeholder="nama" class="form-control form-control-line <?php $__errorArgs = ['nama'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="nama"
            type="text" id="nama" value="<?php echo e(isset($anggotum->nama) ? $anggotum->nama : old('nama')); ?>" required>

        <?php $__errorArgs = ['nama'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <span class="invalid-feedback" role="alert">
            <strong><?php echo e($message); ?></strong>
        </span>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>

</div>
<div class="form-group <?php echo e($errors->has('jenis_kelamin') ? 'has-error' : ''); ?>">
    <label for="jenis_kelamin" class="control-label"><?php echo e('Jenis Kelamin'); ?></label>

    <div class="col-md-12">

        <select name="jenis_kelamin" class="form-control form-control-line" id="jenis_kelamin" required>
            <?php $__currentLoopData = json_decode('{"Laki - Laki":"Laki - Laki","Perempuan":"Perempuan"}', true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $optionKey =>
            $optionValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($optionKey); ?>"
                <?php echo e(((isset($anggotum->jenis_kelamin) && $anggotum->jenis_kelamin == $optionKey) || $optionValue == old('jenis_kelamin')) ? 'selected' : ''); ?>>
                <?php echo e($optionValue); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>

        <?php $__errorArgs = ['jenis_kelamin'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <span class="invalid-feedback" role="alert">
            <strong><?php echo e($message); ?></strong>
        </span>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>

</div>
<div class="form-group <?php echo e($errors->has('alamat') ? 'has-error' : ''); ?>">
    <label for="alamat" class="control-label"><?php echo e('Alamat'); ?></label>

    <div class="col-md-12">

        <textarea class="form-control" rows="5" name="alamat" type="textarea" id="alamat" placeholder="alamat"
            required><?php echo e(isset($anggotum->alamat) ? $anggotum->alamat : old('alamat')); ?></textarea>

        <?php $__errorArgs = ['alamat'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <span class="invalid-feedback" role="alert">
            <strong><?php echo e($message); ?></strong>
        </span>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>

</div>
<div class="form-group <?php echo e($errors->has('no_telepon') ? 'has-error' : ''); ?>">
    <label for="no_telepon" class="control-label"><?php echo e('No Telepon'); ?></label>

    <div class="col-md-12">
        <input placeholder="no_telepon" class="form-control form-control-line <?php $__errorArgs = ['no_telepon'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
            name="no_telepon" type="text" id="no_telepon"
            value="<?php echo e(isset($anggotum->no_telepon) ? $anggotum->no_telepon : old('no_telepon')); ?>" required>

        <?php $__errorArgs = ['no_telepon'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <span class="invalid-feedback" role="alert">
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
        <select name="status" class="form-control form-control-line" id="status" required>
            <?php $__currentLoopData = json_decode('{"Aktif":"Aktif","Tidak Aktif":"Tidak Aktif"}', true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $optionKey => $optionValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($optionKey); ?>"
                <?php echo e((isset($anggotum->status) && $anggotum->status == $optionKey) || $optionValue == old('status') ? 'selected' : ''); ?>><?php echo e($optionValue); ?>

            </option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>

        <?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <span class="invalid-feedback" role="alert">
            <strong><?php echo e($message); ?></strong>
        </span>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>

</div>

<div class="form-group <?php echo e($errors->has('status') ? 'has-error' : ''); ?>">
    <label for="status" class="control-label"><?php echo e('Tipe Anggota'); ?></label>

    <div class="col-md-12">
        <select name="level" class="form-control form-control-line" id="level" required>
            <?php $__currentLoopData = json_decode('{"Siswa":"Siswa","Guru":"Guru"}', true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $optionKey => $optionValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($optionKey); ?>"
                <?php echo e((isset($anggotum->level) && $anggotum->level == $optionKey) || $optionValue == old('level') ? 'selected' : ''); ?>><?php echo e($optionValue); ?>

            </option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>

        <?php $__errorArgs = ['level'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <span class="invalid-feedback" role="alert">
            <strong><?php echo e($message); ?></strong>
        </span>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>

</div>



<div class="form-group">
    <div class="col-sm-6">
        <button class="btn btn-success" type="submit">Simpan</button>
        <button class="btn btn-secondary" type="submit" name="simpan_dan_cetak" value="xx">Simpan & Cetak</button>
    </div>

</div>
<?php /**PATH D:\bikinaplikasi\project\setup_server_default\sites\perpustakaan-hendra.bikinaplikasi.dev\resources\views/anggota/form.blade.php ENDPATH**/ ?>