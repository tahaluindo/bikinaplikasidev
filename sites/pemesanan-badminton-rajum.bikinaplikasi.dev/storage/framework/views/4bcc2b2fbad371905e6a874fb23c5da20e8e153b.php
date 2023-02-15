<div class="form-group <?php echo e($errors->has('atas_nama') ? 'has-error' : ''); ?>">
    <label for="atas nama" class="control-label"><?php echo e(ucwords('Atas Nama')); ?></label>
    <div class="col-md-12">
        <input type="text" class="form-control form-control-line <?php $__errorArgs = ['nama'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
            placeholder="Atas Nama" name="atas_nama"
            value="<?php echo e(old('atas_nama') == '' && isset($pemesanan) ? $pemesanan->atas_nama : old('atas_nama')); ?>">

        <?php $__errorArgs = ['atas_nama'];
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

<div class="form-group <?php echo e($errors->has('lapangan') ? 'has-error' : ''); ?>">
    <label for="lapangan" class="control-label"><?php echo e(ucwords('lapangan')); ?></label>
    <div class="col-md-12">
        <select name='lapangan_id' class="form-control form-control-line <?php $__errorArgs = ['nama'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
            <option value="">-- Pilih Lapangan Yang Tersedia --</option>
            <?php $__currentLoopData = $lapangan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($item->id); ?>" <?php echo e($item->id == (isset($pemesanan) ?  $pemesanan->lapangan_id : "")  ? 'selected' : ''); ?>>
                    <?php echo e($item->nama); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
        <?php $__errorArgs = ['lapangan_id'];
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

<div class="form-group <?php echo e($errors->has('atas_nama') ? 'has-error' : ''); ?>">
    <label for="atas_nama" class="control-label"><?php echo e(ucwords('Waktu Mulai')); ?></label>
    <div class="col-md-12">
        <input type="datetime-local" placeholder="Waktu Mulai" name="waktu_mulai"
            value="<?php echo e(old('waktu_mulai') == ''  && isset($pemesanan) ? $pemesanan->waktu_mulai : old('waktu_mulai')); ?>"
            class="form-control form-control-line <?php $__errorArgs = ['nama'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
        <div style="color: white !important;">Waktu Mulai</div>
        <?php $__errorArgs = ['waktu_mulai'];
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

<div class="form-group <?php echo e($errors->has('jumlah_jam') ? 'has-error' : ''); ?>">
    <label for="jumlah_jam" class="control-label"><?php echo e(ucwords('Jumlah Jam')); ?></label>
    <div class="col-md-12">
        <input type="number" placeholder="Jumlah jam" name="jumlah_jam" min="0" max="6"
            value="<?php echo e(old('jumlah_jam') == ''  && isset($pemesanan) ? $pemesanan->jumlah_jam : old('jumlah_jam')); ?>"
            class="form-control form-control-line <?php $__errorArgs = ['nama'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
        <div style="color: white !important;">Jumlah jam</div>
        <?php $__errorArgs = ['jumlah_jam'];
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
    <label for="catatan" class="control-label"><?php echo e(ucwords('Catatan')); ?></label>
    <div class="col-md-12">
        <textarea placeholder="Catatan" rows="5" id="catatan" name="catatan"
            class="form-control form-control-line <?php $__errorArgs = ['nama'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"><?php echo e(old('catatan') == ''  && isset($pemesanan) ? $pemesanan->catatan : old('catatan')); ?></textarea>
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

<div class="form-group <?php echo e($errors->has('metode pembayaran') ? 'has-error' : ''); ?>">
    <label for="metode pembayaran" class="control-label"><?php echo e(ucwords('metode pembayaran')); ?></label>
    <div class="col-md-12">
        <select name='metode_pembayaran' class="form-control form-control-line <?php $__errorArgs = ['metode pembayaran'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
            <option value="">-- Pilih Metode Pembayaran Yang Tersedia --</option>
            <?php $__currentLoopData = ['COD', 'Transfer']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($item); ?>" <?php echo e($item == (isset($pemesanan) ?  $pemesanan->metode_pembayaran : "") ? 'selected' : ''); ?>>
                    <?php echo e($item); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
        <?php $__errorArgs = ['metode_pembayaran'];
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

<div class="form-group <?php echo e($errors->has('no_hp') ? 'has-error' : ''); ?>">
    <label for="No Hp" class="control-label"><?php echo e(ucwords('No Hp')); ?></label>
    <div class="col-md-12">
        <input type="text" class="form-control form-control-line <?php $__errorArgs = ['nama'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
            placeholder="No Hp" name="no_hp"
            value="<?php echo e(old('no_hp') == ''  && isset($pemesanan) ? $pemesanan->no_hp : old('no_hp')); ?>">

        <?php $__errorArgs = ['no_hp'];
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

<div class="form-group <?php echo e($errors->has('bukti_transfer') ? 'has-error' : ''); ?>">
    <label for="bukti transfer" class="control-label"><?php echo e(ucwords('Bukti transfer')); ?></label>
    <div class="col-md-12">
        <input type="file" class="form-control form-control-line <?php $__errorArgs = ['bukti_transfer'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
            placeholder="Bukti transfer" name="bukti_transfer"
            value="<?php echo e(old('bukti_transfer') == '' && isset($pemesanan) ? $pemesanan->bukti_transfer : old('bukti_transfer')); ?>">

        <?php $__errorArgs = ['bukti_transfer'];
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
</div><?php /**PATH D:\bikinaplikasi\project\setup_server_default\sites\pemesanan-badminton-rajum.bikinaplikasi.dev\resources\views/pemesanan/form.blade.php ENDPATH**/ ?>