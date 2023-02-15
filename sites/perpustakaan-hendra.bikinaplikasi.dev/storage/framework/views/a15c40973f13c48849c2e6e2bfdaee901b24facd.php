<div class='row'>
    <div class='col-md-12'>
        <form class="form-horizontal form-material" action="<?php echo e(url(route('pengembalian.print'))); ?>" method="post"
            enctype="multipart/form-data">
            <?php echo csrf_field(); ?>

            <div class="form-group <?php echo e($errors->has('tanggal_awal') ? 'has-error' : ''); ?>">
                <label class="col-md-12"><?php echo e('Tanggal Awal'); ?></label>

                <div class="col-md-12">
                    <input placeholder="tanggal_awal"
                        class="flatpickr form-control form-control-line <?php $__errorArgs = ['tanggal_awal'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                        name="tanggal_awal" type="text" id="tanggal_awal" value="<?php echo e(old('tanggal_awal') == "" ? now()->format('d-m-Y') : old('tanggal_awal')); ?>" required>

                    <?php $__errorArgs = ['tanggal_awal'];
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

            <div class="form-group <?php echo e($errors->has('tanggal_akhir') ? 'has-error' : ''); ?>">
                <label class="col-md-12"><?php echo e('Tanggal Akhir'); ?></label>

                <div class="col-md-12">
                    <input placeholder="tanggal_akhir"
                        class="flatpickr form-control form-control-line <?php $__errorArgs = ['tanggal_akhir'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                        name="tanggal_akhir" type="text" id="tanggal_akhir" value="<?php echo e(old('tanggal_akhir')); ?>" required>

                    <?php $__errorArgs = ['tanggal_akhir'];
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
                    <button name='preview' value='true' class="btn btn-info" type="submit">Preview</button>
                    <button class="btn btn-success" type="submit">Print</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!--
<div class="row">
    <div class="col-md-12">
        <h3 align="center">LAPORAN PENGEMBALIAN</h3>

        <table width="100%" border="1" style='margin-bottom: 250px;'>
            <thead>
                <tr>
                    <th width=3>No.</th>
                    <th>nama peminjam</th>
                    <th>Tanggal</th>
                    <th>Denda Terlambat</th>
                </tr>
            </thead>

            <tbody>
                <?php $__currentLoopData = $pengembalians; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pengembalian): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <th><?php echo e($loop->iteration); ?>.</th>
                    <td><?php echo e($pengembalian->peminjaman->anggota->nama); ?></td>

                    <td><?php echo e($pengembalian->tanggal); ?></td>

                    <td><?php echo e(toIdr($pengembalian->denda_terlambat)); ?></td>

                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
</div> -->
<?php /**PATH D:\bikinaplikasi\project\setup_server_default\sites\perpustakaan-hendra.bikinaplikasi.dev\resources\views/layouts/pengembalian/laporan/index.blade.php ENDPATH**/ ?>