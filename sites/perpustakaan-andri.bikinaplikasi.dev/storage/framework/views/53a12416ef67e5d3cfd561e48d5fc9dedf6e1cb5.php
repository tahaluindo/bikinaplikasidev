<?php $__env->startSection('content'); ?>
    <div class="page">

        <div class="page-content container-fluid">
            <div class="row" data-plugin="matchHeight" data-by-row="true">
                <div class="col-xxl-12 col-xl-12">
                    <div class="card card-shadow">
                        <div class="card-block bg-white p-40">
                            <div class="col-md-12">
                                <table class="table" id='dataTable'>
                                    <thead>
                                    <tr>
                                        <th width=2>#</th>
                                        <th>Kode Buku</th>
                                        <th>Judul</th>
                                        <th>Penulis</th>
                                        <th>Penerbit</th>
                                        <th>Tahun</th>
                                        <th>Kota</th>
                                        <th>Stok</th>
                                        <th>Ditambahkan</th>
                                        <?php if(!in_array(auth()->user()->level, ['Siswa', 'Guru'])): ?>
                                            <th class="text-center">Aksi</th>
                                        <?php endif; ?>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $__currentLoopData = $buku; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr data-id='<?php echo e($item->id); ?>'>
                                            <td>
                                                <?php echo e($loop->iteration); ?>

                                            </td>

                                            <td><?php echo e($item->kode_buku); ?> <?php echo e($kode_buku->where('kode_start', "<=", $item->kode_buku)->where('kode_end', ">=", $item->kode_buku)->first() ? "(Ket: " . $kode_buku->where('kode_start', "<=", $item->kode_buku)->where('kode_end', ">=", $item->kode_buku)->first()->keterangan . ' | Rak: ' . $kode_buku->where('kode_start', "<=", $item->kode_buku)->where('kode_end', ">=", $item->kode_buku)->first()->lokasi_rak . ")" : ""); ?></td>
                                            <td><?php echo e($item->judul); ?></td>
                                            <td><?php echo e($item->penulis); ?></td>
                                            <td><?php echo e($item->penerbit); ?></td>
                                            <td><?php echo e($item->tahun); ?></td>
                                            <td><?php echo e($item->kota); ?></td>
                                            <td><?php echo e($item->stok); ?></td>
                                            <td><?php echo e($item->ditambahkan); ?></td>

                                            <?php if(!in_array(auth()->user()->level, ['Siswa', 'Guru'])): ?>
                                                <td class="text-center">
                                                    <a class="badge badge-primary"
                                                       href="<?php echo e(url('/buku/' . $item->id . '/edit')); ?>">Edit</a>
                                                    <form action="<?php echo e(url('/buku' . '/' . $item->id)); ?>" method='post'
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
    </div>

    <script>
        const locationHrefHapusSemua = "<?php echo e(url('buku/hapus_semua')); ?>";
        const locationHrefAktifkanSemua = "<?php echo e(url('buku/aktifkan_semua')); ?>";
        const locationHrefCreate = "<?php echo e(url('buku/create')); ?>";
        var columnOrders = [<?php echo e($buku_count - 5); ?>];
        var urlSearch = "<?php echo e(url('buku')); ?>";
        var q = "<?php echo e($_GET['q'] ?? ''); ?>";
        var placeholder = "Filter...";
        var tampilkan_buttons = true;
        var button_manual = true;

        <?php if(in_array(auth()->user()->level, ['Siswa', 'Guru'])): ?>
        var tampilkan_buttons = false;
        var button_manual = false;
        <?php endif; ?>
    </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\bikinaplikasi\project\setup_server_default\sites\perpustakaan-andri.bikinaplikasi.dev\resources\views/buku/index.blade.php ENDPATH**/ ?>