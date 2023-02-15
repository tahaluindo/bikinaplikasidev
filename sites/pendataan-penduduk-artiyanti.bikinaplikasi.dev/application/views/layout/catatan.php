<body class="g-sidenav-show g-sidenav-pinned" cz-shortcut-listen="true" style="min-height: 100vh;">
    <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
        <div class="scroll-wrapper scrollbar-inner" style="position: relative;">
            <div class="scrollbar-inner scroll-content"
                style="height: 381px; margin-bottom: -17px; margin-right: -17px; max-height: none;">
                <!-- Brand -->
                <div class="sidenav-header  align-items-center">
                    <a class="navbar-brand" href="javascript:void(0)">
                        <h2>Data Kependudukan</h2>
                    </a>
                </div>
                <div class="navbar-inner">
                    <!-- Collapse -->
                    <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                        <!-- Nav items -->
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link active" href="<?php echo base_url(); ?>">
                                    <i class="ni ni-tv-2 text-primary"></i>
                                    <span class="nav-link-text">Dashboard</span>
                                </a>
                            </li>

                            <?php if ($this->session->userdata('role')=='Bagian Pelayanan' OR $this->session->userdata('role')=='Admin'): ?>
                            <!-- <li class="nav-item">
              <a class="nav-link" href="<?php echo site_url('DataUser'); ?>">
                <i class="ni ni-bullet-list-67 text-default"></i>
                <span class="nav-link-text">Data User</span>
              </a>
            </li> -->
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo site_url('DataPendidikan'); ?>">
                                    <i class="ni ni-bullet-list-67 text-default"></i>
                                    <span class="nav-link-text">Data Pendidikan</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo site_url('DataPekerjaan'); ?>">
                                    <i class="ni ni-bullet-list-67 text-default"></i>
                                    <span class="nav-link-text">Data Pekerjaan</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo site_url('DataAgama'); ?>">
                                    <i class="ni ni-bullet-list-67 text-default"></i>
                                    <span class="nav-link-text">Data Agama</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo site_url('DataLurah'); ?>">
                                    <i class="ni ni-bullet-list-67 text-default"></i>
                                    <span class="nav-link-text">Data Lurah</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo site_url('DataPenduduk'); ?>">
                                    <i class="ni ni-bullet-list-67 text-default"></i>
                                    <span class="nav-link-text">Data Penduduk</span>
                                </a>
                            </li>
                            <!-- <li class="nav-item">
              <a class="nav-link" href="<?php echo site_url('Domisili'); ?>">
                <i class="ni ni-bullet-list-67 text-default"></i>
                <span class="nav-link-text">Data Domisili</span>
              </a>
            </li> -->

                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo site_url('DataPenduduk'); ?>">
                                    <i class="ni ni-bullet-list-67 text-default"></i>
                                    <span class="nav-link-text">Data Penduduk</span>
                                </a>
                            </li>
                            <?php endif; ?>
                        </ul>
                        <ul class="navbar-nav mb-md-3">
                            <?php if ($this->session->userdata('role')=='Bagian Pelayanan' OR $this->session->userdata('role')=='Admin'): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo site_url('Laporan/add'); ?>">
                                    <i class="ni ni-bullet-list-67 text-default"></i>
                                    <span class="nav-link-text">Tambah Laporan</span>
                                </a>
                            </li>
                            <?php endif; ?>

                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo site_url('Laporan'); ?>">
                                    <i class="ni ni-bullet-list-67 text-default"></i>
                                    <span class="nav-link-text">Lihat Laporan</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="laporan/cetak/penduduk">
                                    <i class="ni ni-bullet-list-67 text-default"></i>
                                    <span class="nav-link-text">Laporan Data Penduduk</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="laporan/cetak/domisili">
                                    <i class="ni ni-bullet-list-67 text-default"></i>
                                    <span class="nav-link-text">Laporan Data Domisili</span>
                                </a>
                            </li>
                        </ul>

                    </div>
                </div>
            </div>
            <div class="scroll-element scroll-x">
                <div class="scroll-element_outer">
                    <div class="scroll-element_size"></div>
                    <div class="scroll-element_track"></div>
                    <div class="scroll-bar" style="width: 0px; left: 0px;"></div>
                </div>
            </div>
            <div class="scroll-element scroll-y">
                <div class="scroll-element_outer">
                    <div class="scroll-element_size"></div>
                    <div class="scroll-element_track"></div>
                    <div class="scroll-bar" style="height: 0px; top: 0px;"></div>
                </div>
            </div>
        </div>
    </nav>