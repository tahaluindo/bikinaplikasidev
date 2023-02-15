<!doctype html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="<?= base_url(); ?>assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="<?= base_url(); ?>assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/libs/css/style.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/vendor/vector-map/jqvmap.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/vendor/jvectormap/jquery-jvectormap-2.0.2.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/vendor/fonts/flag-icon-css/flag-icon.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    <title>Kependudukan Desa Kota Raja</title>

    <!-- Jquery -->
    <script src="<?= base_url(); ?>js/jquery.min.js"></script>

    <!-- sweetalert -->
    <script src='<?= base_url(); ?>js/sweetalert.min.js'></script>

    <!-- myscript -->
    <script src='<?= base_url(); ?>js/myscript.js'></script>

</head>

<body>

    <div class="dashboard-main-wrapper">
        <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-white fixed-top">
                <a class="navbar-brand" href="<?= base_url(); ?>index.html">Kependudukan Desa Kota Raja</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">
                        
                        <li class="nav-item dropdown nav-user">
                            <a class="nav-link nav-user-img" href="<?= base_url(); ?>#" id="navbarDropdownMenuLink2"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img
                                    src="<?= base_url(); ?>assets/images/avatar-1.jpg" alt=""
                                    class="user-avatar-md rounded-circle"></a>
                            <div class="dropdown-menu dropdown-menu-right nav-user-dropdown"
                                aria-labelledby="navbarDropdownMenuLink2">
                                
                                <a class="dropdown-item" href="<?= base_url(); ?>Auth/logout"><i
                                        class="fas fa-power-off mr-2"></i>Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>

        <div class="nav-left-sidebar sidebar-dark">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="d-xl-none d-lg-none" href="<?= base_url(); ?>#">Dashboard</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column">
                            <li data-icon-cls="fa fa-home" data-expanded="true">
                                <a class='text-white' href="<?php echo base_url(); ?>">
                                    <span>Home</span>
                                </a>
                            </li>

                            <?php 

                            $data_master = [
                              'DataUser',
                              'DataAgama',
                              'DataPekerjaan',
                              'DataLurah',
                              'DataPenduduk',
                              'DataPendidikan',
                              'DataKK',
                              'DataProfileDesa',
                              'DataGaleri',
                              'DataPanduanLayanan',
                            ];
                            
                            $data_penduduk = [
                              'DataPenduduk',
                              'DataPendudukTetap',
                              'DataPendudukMeninggal',
                              'DataPendudukPindah',
                              'DataPendudukDatang',
                              'DataPendudukLahir'
                            ];
                            
                            $data_laporan = [
                              'penduduk',
                              'penduduktetap',
                              'pendudukpindah',
                              'pendudukmeninggal',
                              'pendudukdatang',
                              'penduduklahir'
                            ];

                          ?>

                            <?php if($this->session->userdata('role') != "Kepala Desa"): ?>
                            <li class="nav-item"
                                data-expanded=<?php echo in_array($this->uri->segment(1), $data_master) ? 'true' : 'false'; ?>>

                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false"
                                    data-target="#submenu-1" aria-controls="submenu-1"><i
                                        class="fa fa-fw fa-rocket"></i>Data Master</a>

                                <div id="submenu-1" class="submenu collapse " style="">
                                    <ul class="nav flex-column">
                                        <?php if ($this->session->userdata('username')=='admin'): ?>
                                        <li class="nav-item">
                                            <a href="<?php echo site_url('DataBerita'); ?>" class="nav-link">
                                                <span>Data Berita</span>
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="<?php echo site_url('DataProfileDesa'); ?>" class="nav-link">
                                                <i class="ni ni-bullet-list-67 text-default"></i>
                                                <span>Data Profile Desa</span>
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="<?php echo site_url('DataGaleri'); ?>" class="nav-link">
                                                <i class="ni ni-bullet-list-67 text-default"></i>
                                                <span>Data Galeri</span>
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="<?php echo site_url('DataPanduanLayanan'); ?>" class="nav-link">
                                                <i class="ni ni-bullet-list-67 text-default"></i>
                                                <span>Data Panduan Layanan</span>
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="<?php echo site_url('DataUser'); ?>" class="nav-link">
                                                <i class="ni ni-bullet-list-67 text-default"></i>
                                                <span>Data User</span>
                                            </a>
                                        </li>
                                        <?php endif; ?>

                                        <li class="nav-item">
                                            <a href="<?php echo site_url('DataRt'); ?>" class="nav-link">
                                                <i class="ni ni-bullet-list-67 text-default"></i>
                                                <span>Data Rt</span>
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="<?php echo site_url('DataAgama'); ?>" class="nav-link">
                                                <i class="ni ni-bullet-list-67 text-default"></i>
                                                <span>Data Agama</span>
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="<?php echo site_url('DataPendidikan'); ?>" class="nav-link">
                                                <i class="ni ni-bullet-list-67 text-default"></i>
                                                <span>Data Pendidikan</span>
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="<?php echo site_url('DataPekerjaan'); ?>" class="nav-link">
                                                <i class="ni ni-bullet-list-67 text-default"></i>
                                                <span>Data Pekerjaan</span>
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="<?php echo site_url('DataLurah'); ?>" class="nav-link">
                                                <i class="ni ni-bullet-list-67 text-default"></i>
                                                <span>Data Lurah</span>
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="<?php echo site_url('DataPenduduk'); ?>" class="nav-link">
                                                <i class="ni ni-bullet-list-67 text-default"></i>
                                                <span>Data Penduduk</span>
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="<?php echo site_url('DataKK'); ?>" class="nav-link">
                                                <i class="ni ni-bullet-list-67 text-default"></i>
                                                <span>Data KK</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li
                                data-expanded=<?php echo in_array($this->uri->segment(1), $data_penduduk) ? 'true' : 'false'; ?>>
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false"
                                    data-target="#submenu-2" aria-controls="submenu-2"><i
                                        class="fa fa-fw fa-rocket"></i>Data Penduduk</a>

                                <div id="submenu-2" class="submenu collapse " style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a href="<?php echo site_url('DataPendudukTetap'); ?>" class="nav-link">
                                                <i class="ni ni-bullet-list-67 text-default"></i>
                                                <span>Penduduk Tetap</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="<?php echo site_url('DataPendudukMeninggal'); ?>" class="nav-link">
                                                <i class="ni ni-bullet-list-67 text-default"></i>
                                                <span>Penduduk Meninggal</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="<?php echo site_url('DataPendudukPindah'); ?>" class="nav-link">
                                                <i class="ni ni-bullet-list-67 text-default"></i>
                                                <span>Penduduk Pindah</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="<?php echo site_url('DataPendudukDatang'); ?>" class="nav-link">
                                                <i class="ni ni-bullet-list-67 text-default"></i>
                                                <span>Penduduk Datang</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="<?php echo site_url('DataPendudukLahir'); ?>" class="nav-link">
                                                <i class="ni ni-bullet-list-67 text-default"></i>
                                                <span>Penduduk Lahir</span>
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="<?php echo site_url('DataPendudukMiskin'); ?>" class="nav-link">
                                                <i class="ni ni-bullet-list-67 text-default"></i>
                                                <span>Penduduk Miskin</span>
                                            </a>
                                        </li>

                                    </ul>
                                </div>
                            </li>
                            <?php endif; ?>

                            <li
                                data-expanded=<?php echo in_array($this->uri->segment(3), $data_laporan) ? 'true' : 'false'; ?> class="nav flex-column">

                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false"
                                    data-target="#submenu-3" aria-controls="submenu-3"><i
                                        class="fa fa-fw fa-rocket"></i>Laporan</a>

                                <div id="submenu-3" class="submenu collapse " style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a href="<?php echo site_url('laporan/filter/penduduk'); ?>" class='nav-link'>
                                                <i class="ni ni-bullet-list-67 text-default"></i>
                                                <span>Penduduk</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="<?php echo site_url('laporan/filter/penduduktetap'); ?>" class='nav-link'>
                                                <i class="ni ni-bullet-list-67 text-default"></i>
                                                <span>Penduduk Tetap</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="<?php echo site_url('laporan/filter/pendudukpindah'); ?>" class='nav-link'>
                                                <i class="ni ni-bullet-list-67 text-default"></i>
                                                <span>Penduduk Pindah</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="<?php echo site_url('laporan/filter/pendudukmeninggal'); ?>" class='nav-link'>
                                                <i class="ni ni-bullet-list-67 text-default"></i>
                                                <span>Penduduk Meninggal</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="<?php echo site_url('laporan/filter/pendudukdatang'); ?>" class='nav-link'>
                                                <i class="ni ni-bullet-list-67 text-default"></i>
                                                <span>Penduduk Datang</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="<?php echo site_url('laporan/filter/penduduklahir'); ?>" class='nav-link'>
                                                <i class="ni ni-bullet-list-67 text-default"></i>
                                                <span>Penduduk Lahir</span>
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="<?php echo site_url('laporan/filter/kk'); ?>" class='nav-link'>
                                                <i class="ni ni-bullet-list-67 text-default"></i>
                                                <span>KK</span>
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="<?php echo site_url('laporan/filter/perkembanganpenduduk'); ?>" class='nav-link'>
                                                <i class="ni ni-bullet-list-67 text-default"></i>
                                                <span>Perkembangan Penduduk</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                        </ul>

                    </div>
                </nav>
            </div>
        </div>

        <div class="dashboard-wrapper">