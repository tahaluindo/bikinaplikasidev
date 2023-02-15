<?php $__env->startSection('content'); ?>
    <div class="content-header sty-one">
        <h1>Anggota</h1>
        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li><i class="fa fa-angle-right"></i> Anggota</li>
        </ol>
    </div>

    <div class="content">
        <div class="row mb-2">
            <div class="col-xl-12">
                <a class="btn btn-outline-primary" href="?">Lihat Semua</a>
                <a class="btn btn-outline-primary" href="?level=Guru">Lihat Guru</a>
                <a class="btn btn-outline-primary" href="?level=Siswa">Lihat Siswa</a>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12">
                <div class="info-box">
                    <div class="table-responsive">
                        <table class="table" id='dataTable'>
                            <thead>
                            <tr>
                                <th width=2>#</th>
                                <th>No identitas</th>
                                <th>Nama</th>
                                <th>Jenis Kelamin</th>
                                <th>Alamat</th>
                                <th>No Telepon</th>
                                <th>Status</th>
                                <th>Level</th>
                                <th>Dibuat</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $anggota; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr data-id='<?php echo e($item->id); ?>'>
                                    <td>
                                        <?php echo e($loop->iteration); ?>

                                    </td>

                                    <td><?php echo e($item->no_identitas); ?></td>
                                    <td><?php echo e($item->nama); ?></td>
                                    <td><?php echo e($item->jenis_kelamin); ?></td>
                                    <td><?php echo e($item->alamat); ?></td>
                                    <td><?php echo e($item->no_telepon); ?></td>
                                    <td><?php echo e($item->status); ?></td>
                                    <td><?php echo e($item->user ? $item->user->level : ""); ?></td>
                                    <td><?php echo e(\Carbon\Carbon::parse($item->dibuat)->format('d-M-Y')); ?></td>

                                    <td class="text-center">

                                        <a class="badge badge-info"
                                           href="<?php echo e(url("/peminjaman?anggota_id=$item->id")); ?>">Peminjaman</a>
                                        <a class="badge badge-primary"
                                           href="<?php echo e(url('/anggota/' . $item->id . '/edit')); ?>">Edit</a>

                                        <form action="<?php echo e(url('/peminjaman' . '/' . $item->id)); ?>" method='post'
                                              style='display: inline;'
                                              onsubmit="return confirm('Yakin akan menghapus data ini?')">
                                            <?php echo method_field('DELETE'); ?>
                                            <?php echo csrf_field(); ?>
                                            <label class="badge badge-danger" href="" for='btnSubmit-<?php echo e($item->id); ?>'
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


    <script>
        const locationHrefHapusSemua = "<?php echo e(url('anggota/hapus_semua')); ?>";
        const locationHrefAktifkanSemua = "<?php echo e(url('anggota/aktifkan_semua')); ?>";
        const locationHrefCreate = "<?php echo e(url('anggota/create')); ?>";
        var columnOrders = [<?php echo e($anggota_count - 5); ?>];
        var urlSearch = "<?php echo e(url('anggota')); ?>";
        var q = "<?php echo e($_GET['q'] ?? ''); ?>";
        var placeholder = "Filter...";
        var tampilkan_buttons = true;
        var button_manual = true;
    </script>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.app2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\bikinaplikasi\project\40. ebi\perpustakaan\resources\views/anggota/index.blade.php ENDPATH**/ ?>
