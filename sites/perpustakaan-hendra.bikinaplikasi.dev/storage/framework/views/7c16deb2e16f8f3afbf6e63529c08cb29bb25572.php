<?php $__env->startSection('page-info'); ?>
    <div class="breadcome-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="breadcome-list">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <ul class="breadcome-menu">
                                    <li><a href="<?php echo e(url('')); ?>/#">Home</a> <span class="bread-slash">/</span>
                                    </li>
                                    <li><span class="bread-blod">Peminjaman</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="product-sales-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="product-sales-chart">
                        <div style="padding: 20px !important;">

                            <table class="table" id='dataTable'>
                                    <thead>
                                    <tr>
                                        <th width=2>#</th>
                                        <th>Nama anggota</th>
                                        <th>Nama petugas</th>
                                        <th>Tanggal Peminjaman</th>
                                        <th>Tanggal Pengembalian</th>
                                        <th>Status</th>
                                        <th>Hari Telat</th>
                                        <?php if(!in_array(auth()->user()->level, ['Siswa', 'Guru'])): ?>
                                            <th class="text-center">Aksi</th>
                                        <?php endif; ?>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $__currentLoopData = $peminjaman; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr data-id='<?php echo e($item->id); ?>'>
                                            <td>
                                                <?php echo e($loop->iteration); ?>

                                            </td>

                                            <td><?php echo e($item->anggota->nama); ?></td>
                                            <td><?php echo e($item->user_petugas->name); ?></td>
                                            <td><?php echo e(Carbon\Carbon::parse($item->created_at)->format('d-m-Y')); ?></td>
                                            <td><?php echo e(Carbon\Carbon::parse($item->tanggal_pengembalian)->format('d-m-Y')); ?></td>
                                            <td><?php echo e($item->status); ?></td>
                                            <td>
                                                <?php if($item->status == 'Berlangsung' && $item->tanggal_pengembalian < date("d-m-Y")): ?>
                                                <?php echo e(now()->diffInDays(Carbon\Carbon::parse($item->tanggal_pengembalian))); ?>

                                                <?php else: ?>
                                                    0
                                                <?php endif; ?>
                                            </td>

                                            <?php if(!in_array(auth()->user()->level, ['Siswa', 'Guru'])): ?>
                                                <td class="text-center">
                                                    <?php if(now()->lte(\Carbon\Carbon::parse($item->tanggal_pengembalian)) && (now()->diffInDays(Carbon\Carbon::parse($item->tanggal_pengembalian)) <= env('APP_MIN_HARI_KIRIM_PEMBERITAHUAN')) && $item->status == 'Berlangsung'): ?>
                                                        <a class="badge badge-success"
                                                           href="<?php echo e(str_replace('#no_telepon#', $item->anggota->no_telepon, env('APP_LINK_WA_PEMBERITAHUAN'))); ?>">Kirim
                                                            Pemberitahuan</a>
                                                    <?php endif; ?>

                                                    <a class="badge badge-warning"
                                                       href="<?php echo e(url("/peminjaman/cetak/$item->id")); ?>" target="_blank">Cetak</a>

                                                    <a class="badge badge-info"
                                                       href="<?php echo e(url('/peminjaman/' . $item->id)); ?>">Detail
                                                        / Pengembalian</a>
                                                    <a class="badge badge-primary"
                                                       href="<?php echo e(url('/peminjaman/' . $item->id . '/edit')); ?>">Edit</a>
                                                    <form action="<?php echo e(url('/peminjaman' . '/' . $item->id)); ?>"
                                                          method='post'
                                                          style='display: inline;'
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
                                            <?php endif; ?>
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

    <script>
        const locationHrefHapusSemua = "<?php echo e(url('peminjaman/hapus_semua')); ?>?anggota_id=<?php echo e(request('anggota_id')); ?>";
        const locationHrefAktifkanSemua = "<?php echo e(url('peminjaman/aktifkan_semua')); ?>?anggota_id=<?php echo e(request('anggota_id')); ?>";
        const locationHrefCreate = "<?php echo e(url('peminjaman/create')); ?>?anggota_id=<?php echo e(request('anggota_id')); ?>";
        var columnOrders = [<?php echo e($peminjaman_count - 2); ?>];
        var urlSearch = "<?php echo e(url('peminjaman')); ?>?anggota_id=<?php echo e(request('anggota_id')); ?>";
        var q = "<?php echo e($_GET['q'] ?? ''); ?>?anggota_id=<?php echo e(request('anggota_id')); ?>";
        var placeholder = "Filter...";
        var tampilkan_buttons = true;
        var button_manual = true;

        <?php if(in_array(auth()->user()->level, ['Siswa', 'Guru'])): ?>
        var tampilkan_buttons = false;
        var button_manual = false;
        <?php endif; ?>
    </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\bikinaplikasi\project\setup_server_default\sites\perpustakaan-hendra.bikinaplikasi.dev\resources\views/peminjaman/index.blade.php ENDPATH**/ ?>