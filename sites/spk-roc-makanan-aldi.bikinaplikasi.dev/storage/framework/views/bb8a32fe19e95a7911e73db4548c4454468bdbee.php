<div class="form-group <?php echo e($errors->has('comunale_id') ? 'has-error' : ''); ?>">
    <label for="comunale_id" class="control-label"><?php echo e('Comunale Id'); ?></label>

    <div class="col-md-12">
        <select name="comunale_id" class="form-control form-control-line" id="comunale_id">
            <?php $__currentLoopData = $comunale; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($key); ?>"
                    <?php echo e((isset($alternatif->comunale) && $alternatif->comunale_id == $key) || old('comunale_id') == $key ? 'selected' : ''); ?>>
                    <?php echo e($item); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>

        <?php $__errorArgs = ['comunale_id'];
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

<div class="form-group <?php echo e($errors->has('genre_id') ? 'has-error' : ''); ?>">
    <label for="genre_id" class="control-label"><?php echo e('Genre Id'); ?></label>

    <div class="col-md-12">
        <select name="genre_id" class="form-control form-control-line" id="genre_id">
            <?php $__currentLoopData = $genre; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($key); ?>"
                    <?php echo e((isset($alternatif->genre) && $alternatif->genre_id == $key) || old('genre_id') == $key ? 'selected' : ''); ?>>
                    <?php echo e($item); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>

        <?php $__errorArgs = ['genre_id'];
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
            value="<?php echo e(isset($alternatif->nama) ? $alternatif->nama : old('nama')); ?>" required>

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

<div class="form-group <?php echo e($errors->has('instagram') ? 'has-error' : ''); ?>">
    <label for="instagram" class="control-label"><?php echo e('Instagram'); ?></label>

    <div class="col-md-12">
        <input placeholder="instagram" class="form-control form-control-line <?php $__errorArgs = ['instagram'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
            name="instagram" type="text" id="instagram"
            value="<?php echo e(isset($alternatif->instagram) ? $alternatif->instagram : old('instagram')); ?>" required>

        <?php $__errorArgs = ['instagram'];
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

<?php $__currentLoopData = $kriteria; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="form-group <?php echo e($errors->has("kriteria_detail[{$key}][id]") ? 'has-error' : ''); ?>">
    <label for="kriteria_detail[<?php echo e($key); ?>][id]" class="control-label"><?php echo e($item->nama); ?></label>

    <div class="col-md-12">
        <select name="kriteria_detail[<?php echo e($key); ?>][id]" class="form-control form-control-line" id="kriteria_detail[<?php echo e($key); ?>][id]">
            <?php $__currentLoopData = $item->kriteria_details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $itemKriteriaDetail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if(isset($alternatif->alternatif_details)): ?>
                    <?php if($alternatif->alternatif_details->where('kriteria_detail_id', $itemKriteriaDetail->id)->first()): ?>
                        <option value="<?php echo e($alternatif->alternatif_details->where('kriteria_detail_id', $itemKriteriaDetail->id)->first()->kriteria_detail_id); ?>" selected><?php echo e($itemKriteriaDetail->keterangan); ?> (<?php echo e($itemKriteriaDetail->nilai_bobot); ?>) </option>

                        <?php
                            continue;    
                        ?>
                    <?php endif; ?>
                <?php endif; ?>

                <option value="<?php echo e($itemKriteriaDetail->id); ?>">
                    <?php echo e($itemKriteriaDetail->keterangan); ?> (<?php echo e($itemKriteriaDetail->nilai_bobot); ?>)</option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>

        <?php $__errorArgs = ["kriteria_detail[$key][id]"];
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
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<div class="form-group">
    <div class="col-sm-12">
        <button class="btn btn-success" type="submit">Simpan</button>
    </div>
</div>
<?php /**PATH D:\bikinaplikasi\project\setup_server_default\sites\spk-roc-makanan-aldi.bikinaplikasi.dev\resources\views/alternatif/form.blade.php ENDPATH**/ ?>