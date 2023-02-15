<?php $__env->startSection('content'); ?>
    <div class="main_content_iner ">
        <div class="container-fluid plr_30 pb_30 pt_30 body_white_bg">
            <div class="row justify-content-center">

                <div class="col-lg-12">
                    <h3 class="mb-0"><?php echo e(ucwords(preg_replace('/[^a-zA-Z]/', ' ', \Illuminate\Support\Facades\Request::segment(1)))); ?></h3>
                    <div class="mb-3"></div>
                    <table class="table" id='dataTable'>
                        <thead>
                            <tr>
                                <th width=2>#</th>
                                <th>User</th>
                                <th>Mobil</th>
                                <th>Dari Tanggal</th>
                                <th>Sampai Tanggal</th>
                                <th>B. Supir</th>
                                <th>No Hp</th>
                                <th>Diskon</th>
                                <th>Total Bayar</th>
                                <th>Refund</th>
                                <th>Bukti Transfer</th>
                                <th>Status</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $rental_mobil; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr data-id='<?php echo e($item->id); ?>'>
                                <td>
                                    <?php echo e($loop->iteration); ?>

                                </td>

                                <td><?php echo e($item->user->name); ?></td>
                                <td><?php echo e($item->mobil->nama); ?></td>
                                <td><?php echo e($item->dari_tanggal); ?></td>
                                <td><?php echo e($item->sampai_tanggal); ?></td>
                                <td><?php echo e($item->biaya_supir); ?></td>
                                <td><?php echo e($item->no_hp); ?></td>
                                <td><?php echo e(toIdr($item->diskon)); ?></td>
                                <td><?php echo e(toIdr($item->total_bayar)); ?></td>
                                <td><?php echo e(toIdr($item->refund)); ?></td>
                                <td><?php echo e($item->status); ?></td>
                                <td>
                                    <a href="<?php echo e(url($item->bukti_transfer)); ?>">
                                        <img src="<?php echo e(url($item->bukti_transfer)); ?>" height="240" width="180">
                                    </a>
                                </td>

                                <td class="text-center">
                                    <a class="badge badge-primary"
                                       href="<?php echo e(url('/rental-mobil/' . $item->id . '/edit')); ?>">Edit</a>
                                    <form action="<?php echo e(url('/rental-mobil' . '/' . $item->id)); ?>"
                                          method='post' style='display: inline;'
                                          onsubmit="return confirm('Yakin akan menghapus data ini?')">
                                        <?php echo method_field('DELETE'); ?>
                                        <?php echo csrf_field(); ?>
                                        <label class="badge badge-danger" href=""
                                               for='btnSubmit-<?php echo e($item->id); ?>'
                                               style='cursor: pointer;'>Hapus</label>
                                        <button type="submit" id='btnSubmit-<?php echo e($item->id); ?>'
                                                style="display: none;"></button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>

                    <script>
                        const locationHrefHapusSemua = "<?php echo e(url('rental-mobil/hapus_semua')); ?>";
                        const locationHrefAktifkanSemua = "<?php echo e(url('rental-mobil/aktifkan_semua')); ?>";
                        const locationHrefCreate = "<?php echo e(url('rental-mobil/create')); ?>";

                        var columnOrders = [<?php echo e($rental_mobil_count - 4); ?>];
                        var urlSearch = "<?php echo e(url('rental-mobil')); ?>";
                        var q = "<?php echo e($_GET['q'] ?? ''); ?>";
                        var placeholder = "Filter...";

                        var tampilkan_buttons = true;
                        var button_manual = true;
                    </script>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app3', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\bikinaplikasi\project\81zaky\reservasi_and_travel\resources\views/rental-mobil/index.blade.php ENDPATH**/ ?>