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
                            <th>Dari</th>
                            <th>Ke</th>
                            <th>Biaya</th>

                            <th class="text-center">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $tujuan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr data-id='<?php echo e($item->id); ?>'>
                                <td>
                                    <?php echo e($loop->iteration); ?>

                                </td>

                                <td><?php echo e(\App\Lokasi::find($item->dari)->nama); ?></td>
                                <td><?php echo e(\App\Lokasi::find($item->ke)->nama); ?></td>
                                <td><?php echo e(toIdr($item->biaya)); ?></td>

                                <td class="text-center">
                                    <a class="badge badge-primary"
                                       href="<?php echo e(url('/tujuan/' . $item->id . '/edit')); ?>">Edit</a>
                                    <form action="<?php echo e(url('/tujuan' . '/' . $item->id)); ?>"
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
                        const locationHrefHapusSemua = "<?php echo e(url('tujuan/hapus_semua')); ?>";
                        const locationHrefAktifkanSemua = "<?php echo e(url('tujuan/aktifkan_semua')); ?>";
                        const locationHrefCreate = "<?php echo e(url('tujuan/create')); ?>";

                        var columnOrders = [<?php echo e($tujuan_count - 2); ?>];
                        var urlSearch = "<?php echo e(url('tujuan')); ?>";
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

<?php echo $__env->make('layouts.app3', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\bikinaplikasi\project\setup_server_default\sites\reservasi-dan-travel-zaky.bikinaplikasi.dev\resources\views/tujuan/index.blade.php ENDPATH**/ ?>