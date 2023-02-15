<div class="form-group <?php echo e($errors->has('nama') ? 'has-error' : ''); ?>">
    Dalam pemilihan kriteria mana yang lebih penting bagi responden dari perbandingan kriteria-kriteria dibawah dalam
    penggunaan Aplikasi Transportasi Roda Dua berbasis Online ?
</div>

<?php for($i = 1; $i <= 7; $i++): ?>
    <div class="form-group <?php echo e($errors->has('status') ? 'has-error' : ''); ?>">

        <div class="col-md-12">
            <select name="kriteria_id[<?php echo e($i); ?>]" class="form-control form-control-line" id="kriteria_id[<?php echo e($i); ?>]" required>
                <option
                    value="">-- PILIH RANKING <?php echo e($i); ?> --
                </option>

                <?php $__currentLoopData = $kriteria; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option
                        value="<?php echo e($item->id); ?>" <?php echo e(old("kriteria_id.$i") == $item->id ? 'selected' : ''); ?>><?php echo e($item->nama); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>

            <?php $__errorArgs = ["kriteria_id.$i"];
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
<?php endfor; ?>


<div class="form-group">
    <div class="col-sm-12">
        <button class="btn btn-success" type="submit">Simpan</button>
    </div>
</div>
<?php /**PATH D:\bikinaplikasi\project\setup_server_default\sites\spk-transportasi-annisa.bikinaplikasi.dev\resources\views/survey/form.blade.php ENDPATH**/ ?>