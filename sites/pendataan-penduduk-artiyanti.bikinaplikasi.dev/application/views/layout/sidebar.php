<body class="g-sidenav-show g-sidenav-pinned" cz-shortcut-listen="true" style="min-height: 100vh;">
    <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-dark bg-dark" id="sidenav-main">
        <div class="scroll-wrapper scrollbar-inner" style="position: relative;">
            <div class="scrollbar-inner scroll-content"
                style="height: 381px; margin-bottom: -17px; margin-right: -17px; max-height: none;">
                <!-- Brand -->
                <div class="sidenav-header  align-items-center">
                    <a class="navbar-brand" href="javascript:void(0)">
                        <!-- <h2 class='text-white'>Data Kependudukan</h2> -->
                    </a>
                </div>
                <div class="navbar-inner">
                    <!-- Collapse -->
                    <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                        <ul class="navbar-nav" id="treeview">
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
                                  Data Master
                                  <ul>
                                      <?php if ($this->session->userdata('username')=='admin'): ?>
                                      <li>
                                          <a href="<?php echo site_url('DataBerita'); ?>">
                                              <i class="ni ni-bullet-list-67 text-default"></i>
                                              <span>Data Berita</span>
                                          </a>
                                      </li>

                                      <li>
                                          <a href="<?php echo site_url('DataProfileDesa'); ?>">
                                              <i class="ni ni-bullet-list-67 text-default"></i>
                                              <span>Data Profile Desa</span>
                                          </a>
                                      </li>

                                      <li>
                                          <a href="<?php echo site_url('DataGaleri'); ?>">
                                              <i class="ni ni-bullet-list-67 text-default"></i>
                                              <span>Data Galeri</span>
                                          </a>
                                      </li>

                                      <li>
                                          <a href="<?php echo site_url('DataPanduanLayanan'); ?>">
                                              <i class="ni ni-bullet-list-67 text-default"></i>
                                              <span>Data Panduan Layanan</span>
                                          </a>
                                      </li>

                                      <li>
                                          <a href="<?php echo site_url('DataUser'); ?>">
                                              <i class="ni ni-bullet-list-67 text-default"></i>
                                              <span>Data User</span>
                                          </a>
                                      </li>
                                      <?php endif; ?>

                                      <li>
                                          <a href="<?php echo site_url('DataRt'); ?>">
                                              <i class="ni ni-bullet-list-67 text-default"></i>
                                              <span>Data Rt</span>
                                          </a>
                                      </li>

                                      <li>
                                          <a href="<?php echo site_url('DataAgama'); ?>">
                                              <i class="ni ni-bullet-list-67 text-default"></i>
                                              <span>Data Agama</span>
                                          </a>
                                      </li>

                                      <li>
                                          <a href="<?php echo site_url('DataPendidikan'); ?>">
                                              <i class="ni ni-bullet-list-67 text-default"></i>
                                              <span>Data Pendidikan</span>
                                          </a>
                                      </li>

                                      <li>
                                          <a href="<?php echo site_url('DataPekerjaan'); ?>">
                                              <i class="ni ni-bullet-list-67 text-default"></i>
                                              <span>Data Pekerjaan</span>
                                          </a>
                                      </li>

                                      <li>
                                          <a href="<?php echo site_url('DataLurah'); ?>">
                                              <i class="ni ni-bullet-list-67 text-default"></i>
                                              <span>Data Lurah</span>
                                          </a>
                                      </li>

                                      <li>
                                          <a href="<?php echo site_url('DataPenduduk'); ?>">
                                              <i class="ni ni-bullet-list-67 text-default"></i>
                                              <span>Data Penduduk</span>
                                          </a>
                                      </li>

                                      <li>
                                          <a href="<?php echo site_url('DataKK'); ?>">
                                              <i class="ni ni-bullet-list-67 text-default"></i>
                                              <span>Data KK</span>
                                          </a>
                                      </li>
                                  </ul>
                              </li>
                              <li
                                  data-expanded=<?php echo in_array($this->uri->segment(1), $data_penduduk) ? 'true' : 'false'; ?>>
                                  Data Penduduk
                                  <ul>
                                      <li>
                                          <a href="<?php echo site_url('DataPendudukTetap'); ?>">
                                              <i class="ni ni-bullet-list-67 text-default"></i>
                                              <span>Penduduk Tetap</span>
                                          </a>
                                      </li>
                                      <li>
                                          <a href="<?php echo site_url('DataPendudukMeninggal'); ?>">
                                              <i class="ni ni-bullet-list-67 text-default"></i>
                                              <span>Penduduk Meninggal</span>
                                          </a>
                                      </li>
                                      <li>
                                          <a href="<?php echo site_url('DataPendudukPindah'); ?>">
                                              <i class="ni ni-bullet-list-67 text-default"></i>
                                              <span>Penduduk Pindah</span>
                                          </a>
                                      </li>
                                      <li>
                                          <a href="<?php echo site_url('DataPendudukDatang'); ?>">
                                              <i class="ni ni-bullet-list-67 text-default"></i>
                                              <span>Penduduk Datang</span>
                                          </a>
                                      </li>
                                      <li>
                                          <a href="<?php echo site_url('DataPendudukLahir'); ?>">
                                              <i class="ni ni-bullet-list-67 text-default"></i>
                                              <span>Penduduk Lahir</span>
                                          </a>
                                      </li>
                                  </ul>
                              </li>
                            <?php endif; ?>

                            <li
                                data-expanded=<?php echo in_array($this->uri->segment(3), $data_laporan) ? 'true' : 'false'; ?>>
                                Laporan
                                <ul>
                                    <li>
                                        <a href="<?php echo site_url('laporan/filter/penduduk'); ?>">
                                            <i class="ni ni-bullet-list-67 text-default"></i>
                                            <span>Penduduk</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo site_url('laporan/filter/penduduktetap'); ?>">
                                            <i class="ni ni-bullet-list-67 text-default"></i>
                                            <span>Penduduk Tetap</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo site_url('laporan/filter/pendudukpindah'); ?>">
                                            <i class="ni ni-bullet-list-67 text-default"></i>
                                            <span>Penduduk Pindah</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo site_url('laporan/filter/pendudukmeninggal'); ?>">
                                            <i class="ni ni-bullet-list-67 text-default"></i>
                                            <span>Penduduk Meninggal</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo site_url('laporan/filter/pendudukdatang'); ?>">
                                            <i class="ni ni-bullet-list-67 text-default"></i>
                                            <span>Penduduk Datang</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo site_url('laporan/filter/penduduklahir'); ?>">
                                            <i class="ni ni-bullet-list-67 text-default"></i>
                                            <span>Penduduk Lahir</span>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="<?php echo site_url('laporan/filter/kk'); ?>">
                                            <i class="ni ni-bullet-list-67 text-default"></i>
                                            <span>KK</span>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="<?php echo site_url('laporan/filter/perkembanganpenduduk'); ?>">
                                            <i class="ni ni-bullet-list-67 text-default"></i>
                                            <span>Perkembangan Penduduk</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            </ull>
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
                                        <span class="nav-link-text">Data Penduduk Tetap</span>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo site_url('DataPenduduk'); ?>">
                                        <i class="ni ni-bullet-list-67 text-default"></i>
                                        <span class="nav-link-text">Data Penduduk Meninggal</span>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo site_url('DataPenduduk'); ?>">
                                        <i class="ni ni-bullet-list-67 text-default"></i>
                                        <span class="nav-link-text">Data Penduduk Pindah</span>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo site_url('DataPenduduk'); ?>">
                                        <i class="ni ni-bullet-list-67 text-default"></i>
                                        <span class="nav-link-text">Data Penduduk Datang</span>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo site_url('DataPenduduk'); ?>">
                                        <i class="ni ni-bullet-list-67 text-default"></i>
                                        <span class="nav-link-text">Data Penduduk Lahir</span>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo site_url('DataPenduduk'); ?>">
                                        <i class="ni ni-bullet-list-67 text-default"></i>
                                        <span class="nav-link-text">Laporan Penduduk Tetap</span>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo site_url('DataPenduduk'); ?>">
                                        <i class="ni ni-bullet-list-67 text-default"></i>
                                        <span class="nav-link-text">Laporan Penduduk Meninggal</span>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo site_url('DataPenduduk'); ?>">
                                        <i class="ni ni-bullet-list-67 text-default"></i>
                                        <span class="nav-link-text">Laporan Penduduk Pindah</span>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo site_url('DataPenduduk'); ?>">
                                        <i class="ni ni-bullet-list-67 text-default"></i>
                                        <span class="nav-link-text">Laporan Penduduk Datang</span>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo site_url('DataPenduduk'); ?>">
                                        <i class="ni ni-bullet-list-67 text-default"></i>
                                        <span class="nav-link-text">Laporan Penduduk Lahir</span>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo site_url('DataKK'); ?>">
                                        <i class="ni ni-bullet-list-67 text-default"></i>
                                        <span class="nav-link-text">Laporan KK</span>
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