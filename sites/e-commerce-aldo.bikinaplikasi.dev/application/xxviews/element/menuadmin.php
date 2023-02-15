<nav class="navbar navbar-default top-navbar" role="navigation">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="<?php echo site_url('dashboard')?>"><strong style="font-size: 15px"><i class="icon fa fa-cogx"></i> <?php echo namaApp() ?></strong></a>
        
<div id="sideNav" href="">
<i class="fa fa-bars icon"></i> 
</div>
    </div>

    <ul class="nav navbar-top-links navbar-right">
        <li><a href="<?php echo site_url('aplikasi') ?>" target="_blank"><i class="fa fa-share fa-fw"></i></a>
        </li>
                
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                
                <li><a href="<?php echo site_url('dashboard/settings') ?>"><i class="fa fa-gear fa-fw"></i> Settings</a>
                </li>
                <li class="divider"></li>
                <li><a href="<?php echo site_url('dashboard/logout') ?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                </li>
            </ul>
            <!-- /.dropdown-user -->
        </li>

                <!-- /.dropdown -->
        
    </ul>
</nav>

<nav class="navbar-default navbar-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">

            <li>
                <a class="active-menu" href="<?php echo site_url('dashboard') ?>"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
            </li>
            <li>
                <a href="<?php echo site_url('users') ?>"><i class="fa fa-users fa-fw"></i> Users</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-shopping-cart fa-fw"></i> Pemesanan User<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="<?php echo site_url('pemesanan/sudahdikirim') ?>">Pemesanan Sudah Dikirim</a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('pemesanan/sudahkonfirmasi') ?>">Pemesanan Sudah Konfirmasi</a>
                    </li>

                    <li>
                        <a href="<?php echo site_url('pemesanan/belumkonfirmasi') ?>">Pemesanan Belum Konfirmasi</a>
                    </li>
                    
                </ul>
            </li> 
            <li>
                <a href="#"><i class="fa fa-database fa-fw"></i> Master Data<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="<?php echo site_url('barang') ?>">Barang</a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('kategori') ?>">Kategori</a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('ongkoskirim') ?>">Ongkos Kirim</a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('informasi') ?>">Informasi</a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('administrator') ?>">Administrator</a>
                    </li> 
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="#"><i class="fa fa-print fa-fw"></i> Laporan<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="<?php echo site_url('laporan/barang') ?>">Barang</a>
                    </li>
                  
                    <li>
                        <a href="<?php echo site_url('laporan/harian') ?>">Transaksi Harian</a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('laporan/bulanan') ?>">Transaksi Bulanan</a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('laporan/tahunan') ?>">Transaksi Tahunan</a>
                    </li>
                </ul>
            </li>        
        </ul>
    </div>
</nav>