<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <div class="container-fluid">
            <!-- Breadcrumb-->
            <div class="row pt-2 pb-2">
                <div class="col-sm-9">
                    <h4 class="page-title"><?php echo e(ucwords("rumah")); ?></h4>
                    <ol class="breadcrumb">

                        <li class="breadcrumb-item"><a href="javaScript:void();">Halaman</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo e(ucwords("rumah")); ?></li>
                    </ol>
                </div>
            </div>
            <!-- End Breadcrumb-->
            <div class="row">
                <div class="col-lg-12">
                    <div>
                        <div class="card px-1">
                            <div class="card-body">
                                <?php if(session()->has("error")): ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?php echo e(session()->get("error")); ?>

                                    </div>
                                <?php elseif(session()->has("success")): ?>
                                    <div class="alert alert-success" role="alert">
                                        <?php echo e(session()->get("success")); ?>

                                    </div>
                                <?php elseif(session()->has("warning")): ?>
                                    <div class="alert alert-warning" role="alert">
                                        <?php echo e(session()->get("warning")); ?>

                                    </div>
                                <?php endif; ?>

                                <div class="table-stats order-table ov-h table-responsive">

                                    <table class="table" id='dataTable'>
                                        <thead>
                                        <tr>
                                            <th width=3>No.</th>
                                            <th>Pemilik</th>
                                            <th>Nama</th>
                                            <th>Alamat Lengkap</th>
                                            <th>Latitude</th>
                                            <th>Longitude</th>
                                            <th>Deskripsi</th>
                                            <th>Jumlah Kamar</th>
                                            <th>Gambar 1</th>
                                            <th>Gambar 2</th>
                                            <th>Gambar 3</th>
                                            <th>Gambar 4</th>
                                            <th>Gambar 5</th>
                                            <th>Harga Per Tahun</th>
                                            <th>Harga Per Bulan</th>
                                            <th>Status</th>
                                            <th>Alasan Penolakan</th>
                                            <th>Aksi</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $__currentLoopData = $rumahs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <th><?php echo e($loop->iteration); ?>.</th>
                                                <td><?php echo e($item->user->nama); ?></td>
                                                <td><?php echo e($item->nama); ?></td>
                                                <td><?php echo e($item->alamat_lengkap); ?></td>
                                                <td><?php echo e($item->latitude); ?></td>
                                                <td><?php echo e($item->longitude); ?></td>
                                                <td><?php echo e($item->deskripsi); ?></td>
                                                <td><?php echo e($item->jumlah_kamar); ?></td>
                                                <td>
                                                    <a href="<?php echo e(url($item->gambar1)); ?>">
                                                        <img src="<?php echo e(url($item->gambar1)); ?>" width="50" height="50">
                                                    </a>
                                                </td>
                                                <td>
                                                    <?php if($item->gambar2): ?>
                                                        <a href="<?php echo e(url($item->gambar2)); ?>">
                                                            <img src="<?php echo e(url($item->gambar2)); ?>" width="50" height="50">
                                                        </a>
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <?php if($item->gambar3): ?>
                                                        <a href="<?php echo e(url($item->gambar3)); ?>">
                                                            <img src="<?php echo e(url($item->gambar3)); ?>" width="50" height="50">
                                                        </a>
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <?php if($item->gambar4): ?>
                                                        <a href="<?php echo e(url($item->gambar4)); ?>">
                                                            <img src="<?php echo e(url($item->gambar4)); ?>" width="50" height="50">
                                                        </a>
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <?php if($item->gambar5): ?>
                                                        <a href="<?php echo e(url($item->gambar5)); ?>">
                                                            <img src="<?php echo e(url($item->gambar5)); ?>" width="50" height="50">
                                                        </a>
                                                    <?php endif; ?>
                                                </td>
                                                <td><?php echo e(toIdr($item->harga_per_tahun)); ?></td>
                                                <td><?php echo e(toIdr($item->harga_per_bulan)); ?></td>
                                                <td><?php echo e($item->status); ?></td>
                                                <td><?php echo e($item->alasan_penolakan); ?></td>

                                                <td class="text-center">
                                                    
                                                    <a class="label label-primary"
                                                       href="<?php echo e(url('/rumah/' . $item->id . '/edit')); ?>">Edit</a>

                                                    <form action="<?php echo e(url('/rumah' . '/' . $item->id)); ?>"
                                                          method='post' style='display: inline;'
                                                          onsubmit="return confirm('Yakin akan menghapus data ini?')">
                                                        <?php echo method_field('DELETE'); ?>
                                                        <?php echo csrf_field(); ?>
                                                        <label class="label label-danger" href=""
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const locationHrefHapusSemua = "<?php echo e(url('rumah/hapus_semua')); ?>";
        const locationHrefAktifkanSemua = "<?php echo e(url('rumah/aktifkan_semua')); ?>";
        const locationHrefCreate = "<?php echo e(url('rumah/create')); ?>";
        var columnOrders = [<?php echo e($rumah_count - 3); ?>];
        var urlSearch = "<?php echo e(url('rumah')); ?>";
        var q = "<?php echo e($_GET['q'] ?? ''); ?>";
        var placeholder = "Filter...";
        var tampilkan_buttons = false;
        var button_manual = false;
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\bikinaplikasi\project\setup_server_default\sites\api-admin-rumah-kevin.bikinaplikasi.dev\new\resources\views/rumah/index.blade.php ENDPATH**/ ?>