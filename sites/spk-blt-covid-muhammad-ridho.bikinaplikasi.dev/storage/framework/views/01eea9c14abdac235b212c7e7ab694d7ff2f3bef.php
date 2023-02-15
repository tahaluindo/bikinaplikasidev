<?php $__env->startSection('content'); ?>
    <div class="content-header sty-one">
        <h1>Peminjaman</h1>
        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li><i class="fa fa-angle-right"></i> Peminjaman</li>
        </ol>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <table class="table" style='margin-bottom: 50px;'>
                            <thead>
                            <tr>
                                <th>Anggota Id</th>
                                <th>User Petugas Id</th>
                                <th>Tanggal</th>
                                <th>Tanggal Pengembalian</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr data-id='<?php echo e($peminjaman->id); ?>'>
                                <td><?php echo e($item->anggota->nama); ?></td>
                                <td><?php echo e($item->user_petugas->name); ?></td>
                                <td><?php echo e($item->tanggal); ?></td>
                                <td><?php echo e($item->tanggal_pengembalian); ?></td>
                                <td><?php echo e($item->status); ?></td>
                            </tr>
                            </tbody>
                        </table>

                        <h1 class="page-head-line">Detail Peminjaman</h1>
                        <table class="table" id='dataTable' style='margin-bottom: 50px;'>
                            <thead>
                            <tr>
                                <th width=2>#</th>
                                <th>Buku Id</th>
                                <th>Status</th>
                                <?php if(in_array($peminjaman->status, ['Berlangsung', 'Perpanjangan'])): ?>
                                    <th class="text-center">Aksi</th>
                                <?php endif; ?>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $detail_peminjaman; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr data-id='<?php echo e($item->id); ?>'>
                                    <td>
                                        <?php echo e($loop->iteration); ?>

                                    </td>

                                    <td><?php echo e($item->buku->judul); ?></td>
                                    <td><?php echo e($item->status); ?></td>

                                    <?php if(in_array($peminjaman->status, ['Berlangsung', 'Perpanjangan'])): ?>
                                        <td class="text-center">
                                            <a class="badge badge-primary"
                                               href="<?php echo e(url('/detail_peminjaman/' . $item->id . "/edit?peminjaman_id=$peminjaman->id")); ?>">Edit</a>
                                            <form
                                                action="<?php echo e(url('/detail_peminjaman' . '/' . $item->id . "?peminjaman_id=$peminjaman->id")); ?>"
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
                                    <?php endif; ?>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                            <tfoot>
                            <tr>
                                <td>
                                    <strong>Jumlah</strong>
                                </td>
                                <td>
                                    <strong><?php echo e($detail_peminjaman->count()); ?></strong>
                                </td>
                                <td></td>
                                <?php if(in_array($peminjaman->status, ['Berlangsung', 'Perpanjangan'])): ?>
                                    <td></td>
                                <?php endif; ?>
                            </tr>
                            </tfoot>
                        </table>

                        <h1 class="page-head-line">
                            Pengembalian
                            <?php if($peminjaman->detail_peminjaman->count() && in_array($peminjaman->status, ['Berlangsung', 'Perpanjangan'])): ?>
                                <a class='btn btn-success'
                                   href="<?php echo e(route('pengembalian.create') . "?peminjaman_id=$peminjaman->id"); ?>">Proses
                                    Pengembalian
                                    (Denda: <?php echo e(toIdr(isset($pengembalian->denda_terlambat) ? $pengembalian->denda_terlambat : (now() > Carbon\Carbon::parse($peminjaman->tanggal_pengembalian) ? now()->diffInDays(Carbon\Carbon::parse($peminjaman->tanggal_pengembalian)) * env('APP_DENDA_TERLAMBAT_PER_HARI') : 0))); ?>

                                    )</a>
                                <a class='btn btn-success text-white'
                                   onclick='var waktu_perpanjangan = window.prompt("Masukkan jumlah perpanjangan, default <?php echo e(env("APP_WAKTU_PERPANJANGAN")); ?> hari?", <?php echo e(env("APP_WAKTU_PERPANJANGAN")); ?>); if (waktu_perpanjangan != null) location.href = "<?php echo e(route("peminjaman.perpanjangan", $peminjaman->id)); ?>?waktu_perpanjangan=" + waktu_perpanjangan'>Perpanjangan</a>
                            <?php else: ?>
                                <?php if(in_array($peminjaman->status, ['Berlangsung', 'Perpanjangan'])): ?>
                                    <a class='btn btn-success disabled'>Tidak Meminjam Buku</a>
                                <?php else: ?>
                                    <a class='btn btn-success disabled'>Sudah Dikembalikan</a>
                                <?php endif; ?>
                            <?php endif; ?>
                        </h1>

                        <table class="table">
                            <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>Denda Terlambat</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php if($peminjaman->pengembalian): ?>
                                <tr data-id='<?php echo e($pengembalian->id); ?>'>
                                    <td><?php echo e($pengembalian->tanggal); ?></td>
                                    <td><?php echo e(toIdr($pengembalian->denda_terlambat)); ?></td>
                                </tr>
                            <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        <?php if(in_array($peminjaman->status, ['Berlangsung', 'Perpanjangan'])): ?>
        const locationHrefHapusSemua = "<?php echo e(url('detail_peminjaman/hapus_semua')); ?>";
        const locationHrefAktifkanSemua = "<?php echo e(url('detail_peminjaman/aktifkan_semua')); ?>";
        const locationHrefCreate = '<?php echo e(url("detail_peminjaman/create?peminjaman_id=$peminjaman->id")); ?>';
        var columnOrders = [<?php echo e($detail_peminjaman_count - 1); ?>];
        var urlSearch = "<?php echo e(url('detail_peminjaman?peminjaman_id=$peminjaman->id')); ?>";
        var q = "<?php echo e($_GET['q'] ?? ''); ?>";
        var placeholder = "Filter...";
        var tampilkan_buttons = true;
        var button_manual = true;
        <?php endif; ?>
    </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\bikinaplikasi\project\40. ebi\perpustakaan\resources\views/peminjaman/show.blade.php ENDPATH**/ ?>