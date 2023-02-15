<div class="form-group <?php echo e($errors->has('peminjaman_id') ? 'has-error' : ''); ?>">
    <label for="peminjaman_id" class="control-label"><?php echo e('Peminjaman Id'); ?></label>

    <div class="col-md-12">

        <input type="hidden" name="peminjaman_id" value="<?php echo e($peminjaman->id); ?>">
        <?php echo e($peminjaman->anggota->nama); ?>


        <?php $__errorArgs = ['peminjaman_id'];
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

<div class="form-group <?php echo e($errors->has('buku_id') ? 'has-error' : ''); ?>">
    <label for="buku_id" class="control-label"><?php echo e('Buku Id'); ?></label>

    <div class="col-md-12">

        <input list="buku_id" class="form-control form-control-line" required name="buku_id">

        <datalist id="buku_id" >
            <?php $__currentLoopData = $bukus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $buku): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($buku->id); ?>" <?php echo e((isset($detail_peminjaman->buku_id) && $detail_peminjaman->buku_id == $buku->id) ? 'selected' : ''); ?>><?php echo e($buku->judul . " (Stok: $buku->stok)"); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </datalist>

        <?php $__errorArgs = ['buku_id'];
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
        <button class="btn btn-success" type="submit">Simpan</button>
    </div>
</div>
<?php /**PATH D:\bikinaplikasi\project\40. ebi\perpustakaan\resources\views/detail_peminjaman/form.blade.php ENDPATH**/ ?>