<?php $__env->startSection('content'); ?>

    <div class="content">
        <div class="row">

            <?php if(in_array(auth()->user()->level, ['Admin', 'Petugas'])): ?>
                <div class="col-lg-3 col-sm-6 col-xs-12 m-b-3">
                    <div class="card">
                        <div class="card-body box-rounded box-gradient"><span
                                class="info-box-icon bg-transparent"><i
                                    class="ti-stats-up text-white"></i></span>
                            <div class="info-box-content">
                                <h6 class="info-box-text text-white">Peminjaman</h6>
                                <h1 class="text-white"><?php echo e($peminjamans->count()); ?></h1>
                                <span class="progress-description text-white"> Keseluruhan </span></div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <?php if(in_array(auth()->user()->level, ['Admin', 'Petugas'])): ?>
                <div class="col-lg-3 col-sm-6 col-xs-12 m-b-3">
                    <div class="card">
                        <div class="card-body box-rounded box-gradient-3"><span
                                class="info-box-icon bg-transparent"><i
                                    class="ti-stats-up text-white"></i></span>
                            <div class="info-box-content">
                                <h6 class="info-box-text text-white">Pengembalian</h6>
                                <h1 class="text-white"><?php echo e($pengembalians->count()); ?></h1>
                                <span class="progress-description text-white"> Keseluruhan </span></div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <?php if(in_array(auth()->user()->level, ['Admin', 'Petugas'])): ?>
                <div class="col-lg-3 col-sm-6 col-xs-12 m-b-3">
                    <div class="card">
                        <div class="card-body box-rounded box-gradient-4"><span
                                class="info-box-icon bg-transparent"><i
                                    class="ti-face-smile text-white"></i></span>
                            <div class="info-box-content">
                                <h6 class="info-box-text text-white">User</h6>
                                <h1 class="text-white"><?php echo e($users->count()); ?></h1>
                                <span class="progress-description text-white"> Keseluruhan </span></div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <?php if(in_array(auth()->user()->level, ['Admin', 'Petugas'])): ?>
                <div class="col-lg-3 col-sm-6 col-xs-12 m-b-3">
                    <div class="card">
                        <div class="card-body box-rounded box-gradient-2"><span
                                class="info-box-icon bg-transparent"><i
                                    class="ti-bar-chart text-white"></i></span>
                            <div class="info-box-content">
                                <h6 class="info-box-text text-white">Anggota</h6>
                                <h1 class="text-white"><?php echo e($anggotas->count()); ?></h1>
                                <span class="progress-description text-white"> Keseluruhan </span></div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>


        <div class="row">
            <div class="col-lg-6">
                <div class="card m-b-3">
                    <div class="card-body">
                        <h5 class="m-b-1">Grafik Peminjaman & Pengembalian</h5>
                        <canvas id="line-chart"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card m-b-3">
                    <div class="card-body">
                        <h5 class="m-b-1">Total data</h5>
                        <canvas id="bar-chart" height="150"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-xl-4 m-b-3">
                <div class="bg-aqua-gradient">
                    <div class="card-body">
                        <h5 class="text-white">Jumlah Buku</h5>
                        <h1 class="text-white font-weight-200"><?php echo e($bukus->count()); ?> Buku</h1>
                        <h5 class="text-white m-b-3"><?php echo e(date('Y m')); ?></h5>
                        <div id="spa-line-2"></div>
                        <p class="text-white m-t-2">Total keseluruhan buku hingga saat ini</p>
                    </div>
                </div>
            </div>

            <div class="col-xl-8">
                <div class="info-box">
                    <div class="card-header">
                        <h5 class="h5 card-title">Peminjaman Terakhir <a
                                class="btn btn-sm btn-primary pull-right text-white"
                                href="<?php echo e(route('peminjaman.index')); ?>">Lihat semua</a></h5>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th width=2>#</th>
                                <th>Nama anggota</th>
                                <th>Nama petugas</th>
                                <th>Tanggal</th>
                                <th>Tanggal Pengembalian</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $peminjamans->take(5); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr data-id='<?php echo e($item->id); ?>'>
                                    <td>
                                        <?php echo e($loop->iteration); ?>

                                    </td>

                                    <td><?php echo e($item->anggota->nama); ?></td>
                                    <td><?php echo e($item->user_petugas->name); ?></td>
                                    <td><?php echo e($item->tanggal); ?></td>
                                    <td><?php echo e($item->tanggal_pengembalian); ?></td>
                                    <td><?php echo e($item->status); ?></td>

                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('dashboard-script'); ?>

    <script>
        /*
    Template Name: Biz Admin
    Author: UXLiner
    */

        // ======
        // line chart
        // ======
        var tanggals = [];
        <?php
            foreach ($grafiks['tanggals'] as $item):
        ?>
        tanggals.push("<?php echo e($item); ?>");
        <?php
            endforeach;
        ?>
        console.log(tanggals)


        var peminjamans = [];
        <?php
            foreach ($grafiks['peminjamans'] as $item):
        ?>
        peminjamans.push("<?php echo e($item); ?>");
        <?php
            endforeach;
        ?>
        console.log(peminjamans)


        var pengembalians = [];
        <?php
            foreach ($grafiks['pengembalians'] as $item):
        ?>
        pengembalians.push("<?php echo e($item); ?>");
        <?php
            endforeach;
        ?>
        console.log(pengembalians)


        var ctx = document.getElementById('line-chart').getContext('2d');
        var chart = new Chart(ctx, {
            // The type of chart we want to create
            type: 'line',

            // The data for our dataset
            data: {
                labels: tanggals,
                datasets: [{
                    label: "Peminjaman",
                    //backgroundColor: 'rgb(255, 99, 132)',
                    borderColor: 'rgb(88, 103, 221)',
                    data: peminjamans,
                    fill: false,
                }, {
                    label: "Pengembalian",
                    //backgroundColor: 'rgb(255, 99, 132)',
                    borderColor: 'rgb(0, 140, 211)',
                    data: pengembalians,
                }]
            },
            options: {
                responsive: true
            }
        });

        // ======
        // Bar chart
        // ======
        var ctx = document.getElementById('bar-chart').getContext('2d');
        var chart = new Chart(ctx, {
            // The type of chart we want to create
            type: 'bar',

            // The data for our dataset
            data: {
                labels: ["Anggota", "Buku", "Peminjaman", "Pengembalian", "User", "Kelas", "Detail Peminjaman"],
                datasets: [{
                    label: " ",
                    backgroundColor: 'rgb(88, 103, 221)',
                    borderColor: 'rgb(88, 103, 221)',
                    data: [<?php echo e($anggotas->count()); ?>, <?php echo e($bukus->count()); ?>, <?php echo e($peminjamans->count()); ?>, <?php echo e($pengembalians->count()); ?>, <?php echo e($users->count()); ?>, <?php echo e($kelass->count()); ?>, <?php echo e($detail_peminjamans->count()); ?>],
                    fill: true,
                }]
            },
            options: {
                responsive: true
            }
        });

        // ======
        // Pie chart
        // ======
        new Chart(document.getElementById("pie-chart"), {
            type: 'pie',
            data: {
                labels:
                    ['Red', 'Blue', 'Yellow'],
                datasets:
                    [{
                        'label': 'My First Dataset',
                        data:
                            [300, 50, 100],
                        backgroundColor:
                            ['rgb(255, 99, 132)',
                                'rgb(54, 162, 235)',
                                'rgb(255, 205, 86)'],
                    }]
            },
            options: {
                responsive: true
            }
        });

        // ======
        // Doughnut chart
        // ======
        new Chart(document.getElementById('doughnut-chart'), {
            type: 'doughnut',
            data: {
                labels:
                    ['Red', 'Blue', 'Yellow'],
                datasets:
                    [{
                        'label': 'My First Dataset',
                        data:
                            [300, 50, 100],
                        backgroundColor:
                            ['rgb(255, 99, 132)',
                                'rgb(54, 162, 235)',
                                'rgb(255, 205, 86)'],
                    }]
            },
            options: {
                responsive: true
            }
        });


        // ======
        // PolarArea chart
        // ======
        new Chart(document.getElementById('polararea-chart'), {
            type: 'polarArea',
            data: {
                labels:
                    ['Red', 'Green', 'Yellow', 'Grey', 'Blue'],
                datasets:
                    [{
                        'label': 'My First Dataset',
                        data:
                            [11, 16, 7, 3, 14],
                        backgroundColor:
                            ['rgb(255, 99, 132)',
                                'rgb(75, 192, 192)',
                                'rgb(255, 205, 86)',
                                'rgb(201, 203, 207)',
                                'rgb(54, 162, 235)'],
                    }]
            },
            options: {
                responsive: true
            }
        });


        // ======
        // Radar chart
        // ======
        new Chart(document.getElementById('radar-chart'), {
            type: 'radar',
            data: {
                labels:
                    ['Eating', 'Drinking', 'Sleeping', 'Designing', 'Coding', 'Cycling', 'Running'],
                datasets:
                    [{
                        'label': 'My First Dataset',
                        data: [65, 59, 90, 81, 56, 55, 40],
                        fill: true,
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        borderColor: 'rgb(255, 99, 132)',
                        pointBackgroundColor: 'rgb(255, 99, 132)',
                        pointBorderColor: '#fff',
                        pointHoverBackgroundColor: '#fff',
                        pointHoverBorderColor: 'rgb(255, 99, 132)'
                    }, {
                        label: 'My Second Dataset',
                        data: [28, 48, 40, 19, 96, 27, 100],
                        fill: true,
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgb(54, 162, 235)',
                        pointBackgroundColor: 'rgb(54, 162, 235)',
                        pointBorderColor: '#fff',
                        pointHoverBackgroundColor: '#fff',
                        pointHoverBorderColor: 'rgb(54, 162, 235)'
                    }]
            },
            options: {
                elements: {
                    line: {
                        tension: 0,
                        borderWidth: 3,
                        responsive: true,
                    }
                }
            }
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\bikinaplikasi\project\40. ebi\perpustakaan\resources\views/home.blade.php ENDPATH**/ ?>
