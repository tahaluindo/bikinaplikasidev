<div class="form-group <?php echo e($errors->has('peminjaman_id') ? 'has-error' : ''); ?>">
    <label for="peminjaman_id" class="control-label"><?php echo e('Peminjaman Id'); ?></label>

    <div class="col-md-12">

        ID: <?php echo e($peminjaman->id); ?> (<?php echo e($peminjaman->anggota->nama); ?> | <?php echo e($peminjaman->user_petugas->name); ?> |
        <?php echo e($peminjaman->tanggal); ?> s/d <?php echo e($peminjaman->tanggal_pengembalian); ?>)
        <input type="hidden" name="peminjaman_id" value="<?php echo e($peminjaman->id); ?>">

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

<div class="form-group">
    <label for="peminjaman_id" class="control-label"><?php echo e('Buku Belum Dikembalikan'); ?>

        <?php echo e($peminjaman->detail_peminjaman->count()); ?> Buku, Total
        <?php echo e($peminjaman->detail_peminjaman->sum('jumlah')); ?></label>

    <div class="col-md-12">

        <ul>
            <?php $__currentLoopData = $peminjaman->detail_peminjaman; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail_peminjaman): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><?php echo e($detail_peminjaman->buku->judul); ?> x <?php echo e($detail_peminjaman->jumlah); ?>

                (<?php echo e($detail_peminjaman->status); ?>)</li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>

    </div>
</div>

<div class="form-group <?php echo e($errors->has('tanggal') ? 'has-error' : ''); ?>">
    <label for="tanggal" class="control-label"><?php echo e('Tanggal'); ?></label>

    <div class="col-md-12">
        <input placeholder="tanggal"
            class="flatpickr form-control form-control-line <?php $__errorArgs = ['tanggal'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="tanggal"
            type="text" id="tanggal" value="<?php echo e(isset($pengembalian->tanggal) ? $pengembalian->tanggal : now()->format('d-M-Y')); ?>"
            required>

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
<div class="form-group <?php echo e($errors->has('denda_terlambat') ? 'has-error' : ''); ?>">
    <label for="denda_terlambat" class="control-label"><?php echo e('Denda Terlambat'); ?></label>

    <div class="col-md-12">
        <input min="0" placeholder="denda_terlambat"
            class="form-control form-control-line <?php $__errorArgs = ['denda_terlambat'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="denda_terlambat"
            type="number" id="denda_terlambat"
            value="<?php echo e(isset($pengembalian->denda_terlambat) ? $pengembalian->denda_terlambat : (now() > Carbon\Carbon::parse($peminjaman->tanggal_pengembalian) ? now()->diffInDays(Carbon\Carbon::parse($peminjaman->tanggal_pengembalian)) * env('APP_DENDA_TERLAMBAT_PER_HARI') : 0)); ?>" required>

        <?php $__errorArgs = ['denda_terlambat'];
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
<?php /**PATH D:\bikinaplikasi\project\71andri\perpustakaan\resources\views/pengembalian/form.blade.php ENDPATH**/ ?>