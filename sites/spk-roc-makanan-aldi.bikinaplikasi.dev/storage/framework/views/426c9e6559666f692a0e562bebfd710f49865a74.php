<input type="hidden" name="alternatif_id" value="<?php echo e(request()->alternatif_id); ?>">

<div class="form-group <?php echo e($errors->has('kriteria_detail_id') ? 'has-error' : ''); ?>">
    <label for="status" class="control-label"><?php echo e('Kriteria Detail Id'); ?></label>

    <div class="col-md-12">
        <select name="kriteria_detail_id" class="form-control form-control-line" id="kriteria_detail_id">
            <?php $__currentLoopData = $kriteria->sortBy('urutan_prioritas')->values(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $itemKriteria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <optgroup label="<?php echo e($itemKriteria->nama); ?>">
                    <?php $__currentLoopData = $itemKriteria->kriteria_details->sortBy('urutan_prioritas')->values(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option
                            value="<?php echo e($item->id); ?>" <?php echo e((isset($alternatif_detail->kriteria_detail) && $alternatif_detail->kriteria_detail_id == $item->id) || old('kriteria_detail_id') == $item->id ? 'selected' : ''); ?>><?php echo e($item->keterangan); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </optgroup>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>

        <?php $__errorArgs = ['kriteria_detail_id'];
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
<?php /**PATH D:\bikinaplikasi\project\setup_server_default\sites\spk-roc-makanan-aldi.bikinaplikasi.dev\resources\views/alternatif-detail/form.blade.php ENDPATH**/ ?>