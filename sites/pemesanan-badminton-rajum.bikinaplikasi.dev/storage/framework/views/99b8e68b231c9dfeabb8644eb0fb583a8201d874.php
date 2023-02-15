<?php $__env->startSection('content'); ?>
    <div class="main_content_iner ">
        <div class="container-fluid plr_30 body_white_bg pt_30">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="single_element">
                        <div class="quick_activity">
                            <div class="row">
                                <div class="col-12">
                                    <div class="quick_activity_wrap">
                                        <div class="single_quick_activity">
                                            <h4>Pemasukan Tiket</h4>
                                            <h3>Rp<span
                                                    class="counter"><?php echo e(toIdr($reservasi_tiket->sum('total_bayar'), ",", "")); ?></span>
                                            </h3>
                                            <p><?php echo e(toIdr($reservasi_tiket->count(), ",", "")); ?> Reservasi</p>
                                        </div>
                                        <div class="single_quick_activity">
                                            <h4>Pemasukan Rental</h4>
                                            <h3>Rp<span
                                                    class="counter"><?php echo e(toIdr($rental_mobil->sum('total_bayar'), ",", "")); ?></span>
                                            </h3>
                                            <p><?php echo e(toIdr($rental_mobil->count(), ",", "")); ?> Rental</p>
                                        </div>
                                        <div class="single_quick_activity">
                                            <h4>Jumlah Tiket</h4>
                                            <h3><span class="counter"><?php echo e($tiket->count()); ?></span></h3>
                                            <p><?php echo e(toIdr($tiket->where('status', 'Tersedia')->count(), ",", "")); ?>

                                                Aktif</p>
                                        </div>
                                        <div class="single_quick_activity">
                                            <h4>Jumlah Mobil</h4>
                                            <h3><span class="counter"><?php echo e($mobil->count()); ?></span></h3>
                                            <p><?php echo e(toIdr($mobil->where('status', 'Tersedia')->count(), ",", "")); ?>

                                                Tersedia</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-xl-6">
                    <div class="white_box mb_30 min_430">
                        <div class="box_header ">
                            <div class="main-title">
                                <h3 class="mb-0">Rekapan Per Quartal</h3>
                            </div>
                        </div>

                        <div id="stackbar_active"></div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3 ">
                    <div class="white_box mb_30 min_430">
                        <div class="box_header  box_header_block">
                            <div class="main-title">
                                <h3 class="mb-0">% Penjualan Tiket</h3>
                            </div>
                        </div>
                        <div id="radial_2"></div>
                        <div class="radial_footer">
                            <div class="radial_footer_inner d-flex justify-content-between">
                                <div class="left_footer">
                                    <h5><span style="background-color: #EDECFE;"></span> Bulan Lalu</h5>
                                    <p><?php echo e(toIdr($reservasi_tiket->whereBetween('created_at', [now()->addMonths(-1)->format("Y-m-01"), now()->addMonths(-1)->format("Y-m-31")])->sum('jumlah'), '.', "")); ?></p>
                                </div>
                                <div class="left_footer">
                                    <h5><span style="background-color: #A4A1FB;"></span> Bulan Ini</h5>
                                    <p><?php echo e(toIdr($reservasi_tiket->whereBetween('created_at', [now()->format("Y-m-01"), now()->format("Y-m-31")])->sum('jumlah'), '.', "")); ?></p>
                                </div>
                            </div>
                            <div class="radial_bottom">
                                <p><a href="<?php echo e(url(route('reservasi-tiket.laporan.index'))); ?>">Lihat Laporan</a></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="white_box min_430">
                        <div class="box_header  box_header_block">
                            <div class="main-title">
                                <h3 class="mb-0">% Rental Mobil</h3>
                            </div>
                        </div>
                        <div id="radial_1"></div>
                        <div class="radial_footer">
                            <div class="radial_footer_inner d-flex justify-content-between">
                                <div class="left_footer">
                                    <h5><span style="background-color: #EDECFE;"></span> Bulan Lalu</h5>
                                    <p><?php echo e(toIdr($rental_mobil->whereBetween('created_at', [now()->addMonths(-1)->format("Y-m-01"), now()->addMonths(-1)->format("Y-m-31")])->count(), '.', "")); ?></p>
                                </div>
                                <div class="left_footer">
                                    <h5><span style="background-color: #A4A1FB;"></span> Bulan Ini</h5>
                                    <p><?php echo e(toIdr($rental_mobil->whereBetween('created_at', [now()->format("Y-m-01"), now()->format("Y-m-31")])->count(), '.', "")); ?></p>
                                </div>
                            </div>
                            <div class="radial_bottom">
                                <p><a href="<?php echo e(url(route('rental-mobil.laporan.index'))); ?>">Lihat Laporan</a></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-xl-6">
                    <div class="white_box mb_30 min_400 ">
                        <div class="box_header  box_header_block">
                            <div class="main-title">
                                <h3 class="mb-0">Grafik Pengembalian</h3>
                            </div>
                            <div class="legend_style mt-10">
                                <li><span></span> This Month</li>
                                <li class="inactive"><span></span> Avarage</li>
                            </div>
                        </div>
                        <div class="title_btn">
                            <ul>
                                <li><a class="active" href="<?php echo e(url('')); ?>/#">All time</a></li>
                                <li><a href="<?php echo e(url('')); ?>/#">This year</a></li>
                                <li><a href="<?php echo e(url('')); ?>/#">This week</a></li>
                                <li><a href="<?php echo e(url('')); ?>/#">Today</a></li>
                            </ul>
                        </div>
                        <canvas height="120px" id="sales-chart"></canvas>
                    </div>
                </div>

                <div class="col-lg-6 col-xl-3">
                    <div class="white_box mb_30 min_400">
                        <div class="box_header ">
                            <div class="main-title">
                                <h3 class="mb-0">Jenis Tiket Terjual</h3>
                            </div>
                        </div>
                        <canvas height="220px" id="doughutChart"></canvas>
                        <div class="legend_style mt_10px ">
                            <?php $__currentLoopData = $tiket; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="d-block"><span style="background-color: <?php echo e($backgroundColor1[$key]); ?>;"></span> <?php echo e($item->nama); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-xl-3">
                    <div class="white_box mb_30 min_400">
                        <div class="box_header  box_header_block">
                            <div class="main-title">
                                <h3 class="mb-0">Jenis Mobil Dirental</h3>
                            </div>
                        </div>
                        <canvas height="220px" id="doughutChart2"></canvas>
                        <div class="legend_style legend_style_grid mt_10px">
                            <?php $__currentLoopData = $mobil; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="d-block"><span style="background-color: <?php echo e($backgroundColor2[$key]); ?>;"></span> <?php echo e($item->nama); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="white_box min_400">
                        <div class="box_header  box_header_block">
                            <div class="main-title">
                                <h3 class="mb-0">Grafik Laba Bersih (Tiket + Rental Mobil) per Bulan</h3>
                            </div>
                            <div class="title_info">
                                <p><?php echo e(now()->addMonths(-6)->format("Y-M-01")); ?> s/d <?php echo e(now()->format("Y-M-01")); ?></p>
                            </div>
                        </div>
                        <div id="area_active"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        var rental_mobil_persen = <?php echo e(toIdr($rental_mobil->whereBetween('created_at', [now()->format("Y-m-01"), now()->format("Y-m-31")])->count() / ($mobil->count() / 100), '.', "")); ?>

        var penjualan_tiket_persen = <?php echo e(toIdr($reservasi_tiket->whereBetween('created_at', [now()->format("Y-m-01"), now()->format("Y-m-31")])->sum('jumlah') / ($tiket->sum('jumlah') / 100), '.', "")); ?>


        var rekapan_per_kuartal = [{
            name: 'Reservasi Tiket',
            data: [<?php echo e($reservasi_tiket->whereBetween('created_at', [now()->addDays(-12)->format("Y-m-01"), now()->addDays(-6)->format("Y-m-01")])->sum('jumlah')); ?>, <?php echo e($reservasi_tiket->whereBetween('created_at', [now()->addDays(-6)->format("Y-m-01"), now()->format("Y-m-01")])->sum('jumlah')); ?>]
        }, {
            name: 'Rental Mobil',
            data: [<?php echo e($rental_mobil->whereBetween('created_at', [now()->addDays(-12)->format("Y-m-01"), now()->addDays(-6)->format("Y-m-01")])->count()); ?>, <?php echo e($reservasi_tiket->whereBetween('created_at', [now()->addDays(-6)->format("Y-m-01"), now()->format("Y-m-01")])->count()); ?>]
        }]

        <?php
            $years = range(now()->addYears(-6)->format("Y"), now()->format("Y"));
            $grafikLabaBersihData = [];
        ?>


        <?php $__currentLoopData = $reservasi_tiket->groupBy('year_month'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php
            $grafikLabaBersihData[] = $item->whereBetween('created_at', [date("$key-01"), date("$key-31")])->sum('total_bayar') + $rental_mobil->whereBetween('created_at', [date("$key-01"), date("$key-31")])->sum('total_bayar');
        ?>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <?php
            $grafik_pengembalian_reservasi_tiket = [];
        ?>

        <?php $__currentLoopData = $years; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php
            $grafik_pengembalian_reservasi_tiket[] = $reservasi_tiket->whereBetween('created_at', [date("$item-01-01"), date("$item-12-31")])->where('refund', '>', 0)->sum('jumlah');
            $grafik_pengembalian_rental_mobil[] = $rental_mobil->whereBetween('created_at', [date("$item-01-01"), date("$item-12-31")])->where('refund', '>', '0')->count();
        ?>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        var grafik_pengembalian_reservasi_tiket = [<?php echo e(implode(",", $grafik_pengembalian_reservasi_tiket)); ?>]
        var grafik_pengembalian_rental_mobil = [<?php echo e(implode(",", $grafik_pengembalian_rental_mobil)); ?>]
        var jenis_tiket_terjual_count = [<?php echo e(implode(",", $tiket->pluck('reservasi_tikets_count')->toArray())); ?>]
        var jenis_mobil_dirental_count = [<?php echo e(implode(",", $mobil->pluck('rental_mobils_count')->toArray())); ?>]

        var jenis_tiket_terjual = <?php echo $tiket->pluck('nama')->toJson(); ?>

        var jenis_mobil_dirental = <?php echo $mobil->pluck('nama')->toJson(); ?>


        var grafik_pengembalian_tahun = <?php echo collect($years)->toJson(); ?>


        var backgroundColor1 = <?php echo collect($backgroundColor1)->toJson(); ?>;
        var backgroundColor2 = <?php echo collect($backgroundColor2)->toJson(); ?>;

        var grafikLabaBersihData = <?php echo collect($grafikLabaBersihData)->toJson(); ?>

        var grafikLabaBersihBulan = <?php echo $reservasi_tiket->groupBy('year_month')->keys()->toJson(); ?>

    </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app3', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp3\htdocs\reservasi-dan-travel-zaky.bikinaplikasi.dev\resources\views/home.blade.php ENDPATH**/ ?>