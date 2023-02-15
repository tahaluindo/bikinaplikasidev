<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Struk Transaksi</title>
    <link rel="stylesheet" type="text/css" href="./asset/css/bootstrap.min.css">
    <style media="screen">
        table, th, td, tr {
            border: 1px solid black;
            border-collapse: collapse;
        }

        th, td {
            padding: 5px;
            text-align: left;
        }

        hr {
            border: 1px solid black;
        }
    </style>
</head>
<body>
<center><h1><?php echo e(env('APP_OBJECT_NAME')); ?></h1>
    <h3>Nota Peminjaman Buku</h3>
    <h3>Hp : <?php echo e(env('APP_OBJECT_PHONE')); ?></h3>
</center>
<hr>

<div class="row">
    <div class="col-sm-6 col-xs-6">
        <p>Nama : <?php echo e($anggota->nama); ?> <br>
            Jenis Kelamin : <?php echo e($anggota->jenis_kelamin); ?> <br>
            Alamat : <?php echo e($anggota->alamat); ?> <br>
            No Telpon : <?php echo e($anggota->no_telpon); ?> <br>
            Status : <?php echo e($anggota->status); ?> <br>
    </div>
    <div class="col-sm-6 col-xs-6">
        <p>Tgl Terima : <?php echo e($peminjaman->tanggal); ?> <br>
            Tgl Harus Dikembalikan : <?php echo e($peminjaman->tanggal_pengembalian); ?> </p>
    </div>
</div>
<hr>
<p>No. Order : <?php echo e($peminjaman->id); ?></p>
<p>

<table>
    <thead>
        <tr>
            <th>NO.</th>
            <th>Buku</th>
        </tr>
    </thead>

    <tbody>
        <?php $__currentLoopData = $peminjaman->detail_peminjaman; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($loop->iteration); ?></td>
            <td><?php echo e($item->buku->judul); ?></td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>

<div>
    <p style="float:right">Total Buku : <?php echo e($peminjaman->detail_peminjaman->count()); ?></p>
</div>

</body>

<script>
    window.print();
    window.close();
</script>

</html>
<?php /**PATH D:\bikinaplikasi\project\setup_server_default\sites\perpustakaan-hendra.bikinaplikasi.dev\resources\views/peminjaman/cetak.blade.php ENDPATH**/ ?>