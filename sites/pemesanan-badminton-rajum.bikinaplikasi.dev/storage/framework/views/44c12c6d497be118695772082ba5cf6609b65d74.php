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
                                            <h3>Rp <span class="counter">9,150,0000</span></h3>
                                            <p>4 Reservasi</p>
                                        </div>
                                        <div class="single_quick_activity">
                                            <h4>Pemasukan Rental</h4>
                                            <h3>Rp <span class="counter">9,150,0000</span></h3>
                                            <p>5 Rental</p>
                                        </div>
                                        <div class="single_quick_activity">
                                            <h4>Jumlah Tiket</h4>
                                            <h3><span class="counter">10</span></h3>
                                            <p>4 Aktif</p>
                                        </div>
                                        <div class="single_quick_activity">
                                            <h4>Jumlah Mobil</h4>
                                            <h3><span class="counter">10</span></h3>
                                            <p>4 Tersedia</p>
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
                                    <p>15</p>
                                </div>
                                <div class="left_footer">
                                    <h5><span style="background-color: #A4A1FB;"></span> Bulan Ini</h5>
                                    <p>100</p>
                                </div>
                            </div>
                            <div class="radial_bottom">
                                <p><a href="<?php echo e(url('')); ?>/#">Lihat Laporan</a></p>
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
                                    <p>15</p>
                                </div>
                                <div class="left_footer">
                                    <h5><span style="background-color: #A4A1FB;"></span> Bulan Ini</h5>
                                    <p>17</p>
                                </div>
                            </div>
                            <div class="radial_bottom">
                                <p><a href="<?php echo e(url('')); ?>/#">Lihat Laporan</a></p>
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
                            <li class="d-block"><span style="background-color: #DF67C1;"></span> Disputed Invoices</li>
                            <li class="d-block"><span style="background-color: #6AE0BD;"></span> Avarage</li>
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
                            <li class="d-block"><span style="background-color: #FF7B36;"></span> 30 Days</li>
                            <li class="d-block"><span style="background-color: #E8205E;"></span> 60 Days</li>
                            <li class="d-block"><span style="background-color: #3B76EF"></span> 90 Days</li>
                            <li class="d-block"><span style="background-color:#00BFBF;"></span> 90+Days</li>
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
                                <p>1 Jan 2020 to 31 Dec 2020</p>
                            </div>
                        </div>
                        <div id="area_active"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app3', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\bikinaplikasi\project\81zaky\reservasi_and_travel\resources\views/index.blade.php ENDPATH**/ ?>