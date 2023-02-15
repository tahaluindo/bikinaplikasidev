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
                                    <li><span class="bread-blod">Dashboard</span>
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
    <div class="analytics-sparkle-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="analytics-sparkle-line reso-mg-b-30">
                        <div class="analytics-content">
                            <h5>Peminjaman</h5>
                            <h2><span class="counter"><?php echo e($peminjamans->count()); ?></span> <span
                                    class="tuition-fees"></span></h2>
                            <span class="text-success">20%</span>
                            <div class="progress m-b-0">
                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50"
                                     aria-valuemin="0" aria-valuemax="100" style="width:20%;"><span
                                        class="sr-only">20%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="analytics-sparkle-line reso-mg-b-30">
                        <div class="analytics-content">
                            <h5>Pengembalian</h5>
                            <h2><span class="counter"><?php echo e($peminjamans->count()); ?></span> <span
                                    class="tuition-fees"></span></h2>
                            <span class="text-danger">30%</span>
                            <div class="progress m-b-0">
                                <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="50"
                                     aria-valuemin="0" aria-valuemax="100" style="width:30%;"><span
                                        class="sr-only">230%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="analytics-sparkle-line reso-mg-b-30 table-mg-t-pro dk-res-t-pro-30">
                        <div class="analytics-content">
                            <h5>User</h5>
                            <h2><span class="counter"><?php echo e($users->count()); ?></span> <span class="tuition-fees"></span>
                            </h2>
                            <span class="text-info">60%</span>
                            <div class="progress m-b-0">
                                <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="50"
                                     aria-valuemin="0" aria-valuemax="100" style="width:60%;"><span class="sr-only">20% Complete</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="analytics-sparkle-line table-mg-t-pro dk-res-t-pro-30">
                        <div class="analytics-content">
                            <h5>Anggota</h5>
                            <h2><span class="counter"><?php echo e($anggotas->count()); ?></span> <span class="tuition-fees"></span>
                            </h2>
                            <span class="text-inverse">80%</span>
                            <div class="progress m-b-0">
                                <div class="progress-bar progress-bar-inverse" role="progressbar" aria-valuenow="50"
                                     aria-valuemin="0" aria-valuemax="100" style="width:80%;"><span class="sr-only">230% Complete</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="product-sales-area mg-tb-30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                    <div class="product-sales-chart">
                        <div class="portlet-title">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="caption pro-sl-hd">
                                        <span class="caption-subject"><b>Grafik Peminjaman</b></span>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="actions graph-rp actions-graph-rp">
                                        <a href="<?php echo e(url('')); ?>/#" class="btn btn-dark btn-circle active tip-top"
                                           data-toggle="tooltip" title="Refresh">
                                            <i class="fa fa-reply" aria-hidden="true"></i>
                                        </a>
                                        <a href="<?php echo e(url('')); ?>/#" class="btn btn-blue-grey btn-circle active tip-top"
                                           data-toggle="tooltip" title="Delete">
                                            <i class="fa fa-trash-o" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <ul class="list-inline cus-product-sl-rp">
                            <li>
                                <h5><i class="fa fa-circle" style="color: #540375;"></i>Peminjaman</h5>
                            </li>
                            <li>
                                <h5><i class="fa fa-circle" style="color: #933EC5;"></i>Pengembalian</h5>
                            </li>
                            <li>
                                <h5><i class="fa fa-circle" style="color: #65b12d;"></i>Buku</h5>
                            </li>
                        </ul>
                        <div id="morris-area-chart"></div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                    <div class="library-book-area">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="single-cards-item">
                                        <div class="single-product-image">
                                            <a href="#"><img src="img/product/profile-bg.jpg" alt=""></a>
                                        </div>
                                        <div class="single-product-text">
                                            <img src="<?php echo e(url('avatar/png/001-man.png')); ?>" alt="">
                                            <h4><a class="cards-hd-dn" href="#"><?php echo e(auth()->user()->name); ?></a></h4>
                                            <h5><?php echo e(auth()->user()->level); ?></h5>
                                            <p class="ctn-cards"><?php echo e(auth()->user()->email); ?></p>
                                            <a class="follow-cards"
                                               href="<?php echo e(route('user.profile', auth()->user()->id)); ?>">Edit</a>

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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\bikinaplikasi\project\75hendra\perpustakaan\resources\views/home.blade.php ENDPATH**/ ?>
