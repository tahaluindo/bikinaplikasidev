<?php $__env->startSection('content'); ?>
    <!--about-us start -->
    <section id="home" class="about-us-2">


    </section>
    <!--about-us end -->


    <section class="travel-box" id='pesan-sekarang'>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="single-travel-boxes" style="margin-top: 120px !important;">
                        <div id="desc-tabs" class="desc-tabs">

                            <ul class="nav nav-tabs" role="tablist">

                                <li role="presentation" class="active">
                                    <a href="#tours" aria-controls="tours" role="tab" data-toggle="tab">
                                        <i class="fa fa-tree"></i>
                                        Tour
                                    </a>
                                </li>

                                <li role="presentation" class="">
                                    <a href="#rental-mobil" aria-controls="rental-mobil" role="tab" data-toggle="tab">
                                        <i class="fa fa-tree"></i>
                                        Rental Mobil
                                    </a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active fade in" id="tours">
                                    <div class="tab-para">

                                        <div class="row">
                                            <form action="<?php echo e(url('cari-mobil')); ?>" id="form-cari-mobil">
                                                <div class="col-lg-6 col-md-6 col-sm-6">
                                                    <div class="single-tab-select-box">

                                                        <h2>Ke lokasi mana?</h2>

                                                        <div class="travel-select-icon">
                                                            <select class="form-control " id="pilih-rute" name="rute_id"
                                                                    required>

                                                                <option value="">-- PILIH RUTE --</option>

                                                                <?php $__currentLoopData = $rutes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <option <?php echo e($rute->id == request()->rute_id ? "selected" : ""); ?>

                                                                        value="<?php echo e($rute->id); ?>"><?php echo e($rute->dari()->nama); ?>

                                                                        - <?php echo e($rute->ke()->nama); ?>

                                                                        (<?php echo e(toIdr($rute->biaya)); ?>

                                                                        )
                                                                    </option>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                            </select>
                                                        </div>

                                                        <div class="travel-select-icon">
                                                            <select class="form-control " id="lokasi-tujuan"
                                                                    name="lokasi_tujuan_id" required>

                                                                <option value="" >-- PILIH LOKASI TUJUAN --
                                                                </option>
                                                            </select>


                                                        </div>

                                                    </div>

                                                </div>

                                                <div class="col-lg-2 col-md-2 col-sm-2">
                                                    <div class="single-tab-select-box">
                                                        <h2>Tanggal</h2>
                                                        <div class="travel-check-icon">
                                                            <input type="text" name="tanggal"
                                                                   class="flatpickr form-control"
                                                                   placeholder="<?php echo e(old('tanggal') == "" ? date('Y-m-d') : old('tanggal')); ?>" required>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-2 col-md-2 col-sm-2">
                                                    <div class="single-tab-select-box">
                                                        <h2>Jumlah tiket</h2>
                                                        <div class="travel-select-icon">
                                                            <select class="form-control" name="jumlah_tiket" required>
                                                                <?php $__currentLoopData = range(1, 20); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <option  <?php echo e($item == request()->jumlah_tiket ? "selected" : ""); ?>  value="<?php echo e($item); ?>"><?php echo e($item); ?></option>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-2 col-md-2 col-sm-2">
                                                    <div class="single-tab-select-box">
                                                        <h2>Pulang Pergi</h2>
                                                        <div class="travel-select-icon">
                                                            <select class="form-control" name="pulang_pergi" required>
                                                                <option value="Ya" <?php echo e(request()->pulang_pergi == "Ya" ? "selected" : ""); ?>>Ya</option>
                                                                <option value="Tidak"  <?php echo e(request()->pulang_pergi == "Tidak" ? "selected" : ""); ?>>Tidak</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                        <div class="row">
                                            <div class="clo-sm-7">
                                                <div class="about-btn travel-mrt-0 pull-right">
                                                    <button class="about-view travel-btn" form="form-cari-mobil">
                                                        Cari Mobil
                                                    </button>
                                                </div>
                                            </div>

                                        </div>

                                    </div>

                                </div>

                                <div role="tabpanel" class="tab-pane fade in" id="rental-mobil">
                                    <div class="tab-para">

                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <div class="single-tab-select-box">

                                                    <h2>Jumlah kursi mobil?</h2>

                                                    <div class="travel-select-icon">

                                                        <select class="form-control ">
                                                            <option value="">-- Pilih jumlah kursi --</option>

                                                            <?php $__currentLoopData = range(4, 20, 2); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <option value="<?php echo e($item); ?>"><?php echo e($item); ?></option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </select>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="col-lg-2 col-md-2 col-sm-2">
                                                <div class="single-tab-select-box">
                                                    <h2>Dari Tggl</h2>
                                                    <div class="travel-check-icon">
                                                        <form action="#">
                                                            <input type="text" name="check_in"
                                                                   class="flatpickr form-control"
                                                                   placeholder="<?php echo e(date('Y-m-d')); ?>">
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-2 col-md-2 col-sm-2">
                                                <div class="single-tab-select-box">
                                                    <h2>Sampai Tggl</h2>
                                                    <div class="travel-check-icon">
                                                        <form action="#">
                                                            <input type="text" name="check_in"
                                                                   class="flatpickr form-control"
                                                                   placeholder="<?php echo e(date('Y-m-d')); ?>">
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-2 col-md-2 col-sm-2">
                                                <div class="single-tab-select-box">
                                                    <h2>Sama Supir</h2>
                                                    <div class="travel-select-icon">
                                                        <select class="form-control">
                                                            <option value="Ya">Ya</option>
                                                            <option value="Tidak">Tidak</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="clo-sm-7">
                                                <div class="about-btn travel-mrt-0 pull-right">
                                                    <button class="about-view travel-btn">
                                                        Cari
                                                    </button>
                                                </div>
                                            </div>

                                        </div>

                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <section id="pack" class="packages">
        <div class="container">
            <div class="gallary-header text-center">
                <h2>
                    Hasil Pencarian
                </h2>
                <p>
                    Telah ditemukan sebanyak 1500 data untuk <b>"ini kunci pencariannya"</b>
                </p>
            </div>
            <div class="packages-content">
                <div class="row">

                    <div class="col-md-4 col-sm-6">
                        <div class="single-package-item">
                            <img src="<?php echo e(url('')); ?>/assets/images/packages/p1.jpg" alt="package-place" width="370"
                                 height="300">
                            <div class="single-package-item-txt">
                                <h3>Nama Mobil <span class="pull-right">Rp300.000</span></h3>
                                <div class="packages-para">
                                    <p>
											<span>
												<i class="fa fa-angle-right"></i> 4 Kursi tersisa
											</span>
                                        <i class="fa fa-angle-right"></i> Fasilitas 1, Fasilitas 2, Fasilitas 3.
                                    </p>
                                </div>
                                <div class="">
                                    <p>
                                        <i class="fa fa-clock-o"></i>
                                        <span>Jam 8:00 - Jam 9:00</span>
                                    </p>
                                </div>
                                <div class="about-btn">
                                    <a href="<?php echo e(url('pembayaran')); ?>">
                                        <button class="about-view packages-btn">
                                            Pesan
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>


                    <div class="col-md-4 col-sm-6">
                        <div class="single-package-item">
                            <img src="<?php echo e(url('')); ?>/assets/images/packages/p1.jpg" alt="package-place" width="370"
                                 height="300">
                            <div class="single-package-item-txt">
                                <h3>Nama Mobil <span class="pull-right">Rp300.000</span></h3>
                                <div class="packages-para">
                                    <p>
											<span>
												<i class="fa fa-angle-right"></i> 4 Kursi tersisa
											</span>
                                        <i class="fa fa-angle-right"></i> Fasilitas 1, Fasilitas 2, Fasilitas 3.
                                    </p>
                                </div>
                                <div class="">
                                    <p>
                                        <i class="fa fa-clock-o"></i>
                                        <span>Jam 8:00 - Jam 9:00</span>
                                    </p>
                                </div>
                                <div class="about-btn">
                                    <button class="about-view packages-btn">
                                        Pesan
                                    </button>
                                </div>
                            </div>
                        </div>

                    </div>


                    <div class="col-md-4 col-sm-6">
                        <div class="single-package-item">
                            <img src="<?php echo e(url('')); ?>/assets/images/packages/p1.jpg" alt="package-place" width="370"
                                 height="300">
                            <div class="single-package-item-txt">
                                <h3>Nama Mobil <span class="pull-right">Rp300.000</span></h3>
                                <div class="packages-para">
                                    <p>
											<span>
												<i class="fa fa-angle-right"></i> 4 Kursi tersisa
											</span>
                                        <i class="fa fa-angle-right"></i> Fasilitas 1, Fasilitas 2, Fasilitas 3.
                                    </p>
                                </div>
                                <div class="">
                                    <p>
                                        <i class="fa fa-clock-o"></i>
                                        <span>Jam 8:00 - Jam 9:00</span>
                                    </p>
                                </div>
                                <div class="about-btn">
                                    <button class="about-view packages-btn">
                                        Pesan
                                    </button>
                                </div>
                            </div>
                        </div>

                    </div>


                </div>
            </div>
        </div>

    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\bikinaplikasi\project\setup_server_default\sites\reservasi-dan-travel-zaky.bikinaplikasi.dev\resources\views/cari-mobil.blade.php ENDPATH**/ ?>