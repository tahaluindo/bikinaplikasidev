<div class="main-content" id="panel">
    <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav align-items-start  mr-auto ">
                    <li class="nav-item d-xl-none">
                        <div class="pr-3 sidenav-toggler sidenav-toggler-dark active" data-action="sidenav-pin"
                            data-target="#sidenav-main">
                            <div class="sidenav-toggler-inner">
                                <i class="sidenav-toggler-line"></i>
                                <i class="sidenav-toggler-line"></i>
                                <i class="sidenav-toggler-line"></i>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url(); ?>" data-action="search-show" data-target="#navbar-search-main">
                            <h1 class='text-white'>Data Kependudukan Kantor Desa Lubuk Terentang</h1>
                        </a>
                    </li>
                </ul>

                <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
                    <li class="nav-item dropdown">
                        <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <div class="media align-items-center">
                                <div class="media-body  ml-2  d-none d-lg-block">
                                <i class="fa fa-user fa-lg"></i>
                                    <span
                                        class="mb-0 text-sm  font-weight-bold"><?php echo ucwords($this->session->userdata('username')); ?></span>
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="home/profile" class="dropdown-item">
                                <i class="ni ni-single-02"></i>
                                <span>Profile</span>
                            </a>
                            <a href="<?php echo site_url('Auth/logout/'); ?>" class="dropdown-item">
                                <i class="fa fa-times"></i>
                                <span>Logout</span>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item active" aria-current="page">Edit Data Domisili</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class='card-body'>
                    <?php echo form_open('domisili/edit/'.$domisili['nik'], array("enctype" => 'multipart/form-data')); ?>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="nama_penduduk" class="control-label"><span class="text-danger">*</span>Nama
                                    Lengkap</label>
                                <div class="form-group">
                                    <input type="text" name="nama_penduduk"
                                        value="<?php echo ($this->input->post('nama_penduduk') ? $this->input->post('nama_penduduk') : $domisili['nama_penduduk']); ?>"
                                        class="form-control form-control-sm" id="nama_penduduk" />
                                    <span class="text-danger"><?php echo form_error('nama_penduduk');?></span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="nik" class="control-label"><span class="text-danger">*</span>NIK</label>
                                <div class="form-group">
                                    <input type="text" name="nik"
                                        value="<?php echo ($this->input->post('nik') ? $this->input->post('nik') : $domisili['nik']); ?>"
                                        class="form-control form-control-sm" id="nik" />
                                    <span class="text-danger"><?php echo form_error('nik');?></span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="jenis_kelamin" class="control-label"><span class="text-danger">*</span>Jenis
                                    Kelamin</label>
                                <div class="form-group">
                                    <input type="radio" name="jenis_kelamin" value="Laki"
                                        <?php if($domisili['jenis_kelamin']=='Laki'){echo "checked";} ?> /> Laki-laki<br />
                                    <input type="radio" name="jenis_kelamin" value="Perempuan"
                                        <?php if($domisili['jenis_kelamin']=='Perempuan'){echo "checked";} ?> /> Perempuan<br />
                                    <span class="text-danger"><?php echo form_error('jenis_kelamin');?></span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="tempat_lahir" class="control-label"><span class="text-danger">*</span>Tempat
                                    Lahir</label>
                                <div class="form-group">
                                    <input type="text" name="tempat_lahir"
                                        value="<?php echo ($this->input->post('tempat_lahir') ? $this->input->post('tempat_lahir') : $domisili['tempat_lahir']); ?>"
                                        class="form-control form-control-sm" id="tempat_lahir" />
                                    <span class="text-danger"><?php echo form_error('tempat_lahir');?></span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="tanggal_lahir" class="control-label"><span
                                        class="text-danger">*</span>Tanggal Lahir</label>
                                <div class="form-group">
                                    <input type="date" name="tanggal_lahir"
                                        value="<?php echo ($this->input->post('tanggal_lahir') ? $this->input->post('tanggal_lahir') : $domisili['tanggal_lahir']); ?>"
                                        class="form-control form-control-sm" id="tanggal_lahir" />
                                    <span class="text-danger"><?php echo form_error('tanggal_lahir');?></span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="agama" class="control-label"><span class="text-danger">*</span>Agama</label>
                                    <div class="form-group">
                                        <select class="form-control form-control-sm" id="sel1" name="agama">
                                            <option <?php ($this->input->post('agama') == "Islam" || $domisili['agama'] == "Islam") ? "selected" : "" ?>>
                                                Islam</option>
                                            <option <?php ($this->input->post('agama') == "Kristen" || $domisili['agama'] == "Kristen") ? "selected" : "" ?>>Kristen</option>
                                            
                                            <option <?php ($this->input->post('agama') == "Katholik" || $domisili['agama'] == "Katholik") ? "selected" : "" ?>>
                                                Katholik</option>

                                            <option <?php ($this->input->post('agama') == "Hindu" || $domisili['agama'] == "Hindu") ? "selected" : "" ?>>
                                                Hindu</option>

                                            <option <?php ($this->input->post('agama') == "Budha" || $domisili['agama'] == "Budha") ? "selected" : "" ?>>
                                                Budha</option>

                                            <option <?php ($this->input->post('agama') == "Konghucu" || $domisili['agama'] == "Konghucu") ? "selected" : "" ?>>
                                                Konghucu</option>
                                            <option <?php ($this->input->post('agama') == "Lainnya" || $domisili['agama'] == "Lainnya") ? "selected" : "" ?>>
                                                Lainnya</option>
                                        </select>
                                    </div>
                                <span class="text-danger"><?php echo form_error('agama');?></span>
                            </div>

                            <div class="col-md-12">
                                <label for="kependuduknegaraan" class="control-label"><span
                                        class="text-danger">*</span>Kependuduknegaraan</label>
                                <div class="form-group">
                                    <input type="text" name="kependuduknegaraan"
                                        value="<?php echo ($this->input->post('kependuduknegaraan') ? $this->input->post('kependuduknegaraan') : $domisili['kependuduknegaraan']); ?>"
                                        class="form-control form-control-sm" id="kependuduknegaraan" />
                                    <span class="text-danger"><?php echo form_error('kependuduknegaraan');?></span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="status" class="control-label"><span class="text-danger">*</span>Status
                                    Kawin</label>
                                <div class="form-group">
                                    <input type="radio" name="status" value="Kawin" <?php if($this->input->post('status')=='Kawin' || $domisili['status'] == "Kawin"){echo "checked";} ?>/> Kawin<br/>
                                    <input type="radio" name="status" value="Belum" <?php if($this->input->post('status')=='Belum' || $domisili['status'] == "Belum"){echo "checked";} ?>/> Belum Kawin<br/>
                                    <span class="text-danger"><?php echo form_error('status');?></span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="pekerjaan" class="control-label"><span
                                        class="text-danger">*</span>Pekerjaan</label>
                                <div class="form-group">
                                <select class="form-control form-control-sm" id="sel1" name="pekerjaan">
													<option <?php if($domisili['pekerjaan'] == 'Akuntan' || $this->input->post('pekerjaan')=='Akuntan'){echo "selected";} ?>>Akuntan</option>
													<option <?php if($domisili['pekerjaan'] == 'Anggota Kabinet Kementrian' || $this->input->post('pekerjaan')=='Anggota Kabinet Kementrian'){echo "selected";} ?>>Anggota Kabinet Kementrian</option>
													<option <?php if($domisili['pekerjaan'] == 'Anggota Legislatif' || $this->input->post('pekerjaan')=='Anggota Legislatif'){echo "selected";} ?>>Anggota Legislatif</option>
													<option <?php if($domisili['pekerjaan'] == 'Anggota Mahkamah Konstitusi' || $this->input->post('pekerjaan')=='Anggota Mahkamah Konstitusi'){echo "selected";} ?>>Anggota Mahkamah Konstitusi</option>
													<option <?php if($domisili['pekerjaan'] == 'Apoteker' || $this->input->post('pekerjaan')=='Apoteker'){echo "selected";} ?>>Apoteker</option>
													<option <?php if($domisili['pekerjaan'] == 'Arsitektur/Desainer' || $this->input->post('pekerjaan')=='Arsitektur/Desainer'){echo "selected";} ?>>Arsitektur/Desainer</option>
													<option <?php if($domisili['pekerjaan'] == 'Belum Bekerja' || $this->input->post('pekerjaan')=='Belum Bekerja'){echo "selected";} ?>>Belum Bekerja</option>
													<option <?php if($domisili['pekerjaan'] == 'Bidan Swasta' || $this->input->post('pekerjaan')=='Bidan Swasta'){echo "selected";} ?>>Bidan Swasta</option>
													<option <?php if($domisili['pekerjaan'] == 'Bupati' || $this->input->post('pekerjaan')=='Bupati'){echo "selected";} ?>>Bupati</option>
													<option <?php if($domisili['pekerjaan'] == 'Buruh Harian Lepas' || $this->input->post('pekerjaan')=='Buruh Harian Lepas'){echo "selected";} ?>>Buruh Harian Lepas</option>
													<option <?php if($domisili['pekerjaan'] == 'Buruh Jasa Perdagangan Hasil Bumi' || $this->input->post('pekerjaan')=='Buruh Jasa Perdagangan Hasil Bumi'){echo "selected";} ?>>Buruh Jasa Perdagangan Hasil Bumi</option>
													<option <?php if($domisili['pekerjaan'] == 'Buruh Migran' || $this->input->post('pekerjaan')=='Buruh Migran'){echo "selected";} ?>>Buruh Migran</option>
													<option <?php if($domisili['pekerjaan'] == 'Buruh Tani' || $this->input->post('pekerjaan')=='Buruh Tani'){echo "selected";} ?>>Buruh Tani</option>
													<option <?php if($domisili['pekerjaan'] == 'Buruh Usaha Hotel dan Penginapan lainnya' || $this->input->post('pekerjaan')=='Buruh Usaha Hotel dan Penginapan lainnya'){echo "selected";} ?>>Buruh Usaha Hotel dan Penginapan lainnya</option>
													<option <?php if($domisili['pekerjaan'] == 'Buruh Usaha Jasa Hiburan dan Pariwisata' || $this->input->post('pekerjaan')=='Buruh Usaha Jasa Hiburan dan Pariwisata'){echo "selected";} ?>>Buruh Usaha Jasa Hiburan dan Pariwisata</option>
													<option <?php if($domisili['pekerjaan'] == 'Buruh Usaha Jasa Informasi dan Komunikasi' || $this->input->post('pekerjaan')=='Buruh Usaha Jasa Informasi dan Komunikasi'){echo "selected";} ?>>Buruh Usaha Jasa Informasi dan Komunikasi</option>
													<option <?php if($domisili['pekerjaan'] == 'Buruh Usaha Jasa Transportasi dan Perhubungan' || $this->input->post('pekerjaan')=='Buruh Usaha Jasa Transportasi dan Perhubungan'){echo "selected";} ?>>Buruh Usaha Jasa Transportasi dan Perhubungan</option>
													<option <?php if($domisili['pekerjaan'] == 'Dokter Swasta' || $this->input->post('pekerjaan')=='Dokter Swasta'){echo "selected";} ?>>Dokter Swasta</option>
													<option <?php if($domisili['pekerjaan'] == 'Dosen Swasta' || $this->input->post('pekerjaan')=='Dosen Swasta'){echo "selected";} ?>>Dosen Swasta</option>
													<option <?php if($domisili['pekerjaan'] == 'Dukun Tradisional' || $this->input->post('pekerjaan')=='Dukun Tradisional'){echo "selected";} ?>>Dukun Tradisional</option>
													<option <?php if($domisili['pekerjaan'] == 'Dukun/Paranormal/Supranatural' || $this->input->post('pekerjaan')=='Dukun/Paranormal/Supranatural'){echo "selected";} ?>>Dukun/Paranormal/Supranatural</option>
													<option <?php if($domisili['pekerjaan'] == 'Duta Besar' || $this->input->post('pekerjaan')=='Duta Besar'){echo "selected";} ?>>Duta Besar</option>
													<option <?php if($domisili['pekerjaan'] == 'Gubernur' || $this->input->post('pekerjaan')=='Gubernur'){echo "selected";} ?>>Gubernur</option>
													<option <?php if($domisili['pekerjaan'] == 'Guru' || $this->input->post('pekerjaan')=='Guru'){echo "selected";} ?>>Guru</option>
													<option <?php if($domisili['pekerjaan'] == 'Ibu Rumah Tangga' || $this->input->post('pekerjaan')=='Ibu Rumah Tangga'){echo "selected";} ?>>Ibu Rumah Tangga</option>
													<option <?php if($domisili['pekerjaan'] == 'Jasa Konsultasi' || $this->input->post('pekerjaan')=='Jasa Konsultasi'){echo "selected";} ?>>Jasa Konsultasi</option>
													<option <?php if($domisili['pekerjaan'] == 'Jasa Pengobatan Alternatif' || $this->input->post('pekerjaan')=='Jasa Pengobatan Alternatif'){echo "selected";} ?>>Jasa Pengobatan Alternatif</option>
													<option <?php if($domisili['pekerjaan'] == 'Jasa Penyewaan Alat Pesta' || $this->input->post('pekerjaan')=='Jasa Penyewaan Alat Pesta'){echo "selected";} ?>>Jasa Penyewaan Alat Pesta</option>
													<option <?php if($domisili['pekerjaan'] == 'Juru Masak' || $this->input->post('pekerjaan')=='Juru Masak'){echo "selected";} ?>>Juru Masak</option>
													<option <?php if($domisili['pekerjaan'] == 'Karyawan Honorer' || $this->input->post('pekerjaan')=='Karyawan Honorer'){echo "selected";} ?>>Karyawan Honorer</option>
													<option <?php if($domisili['pekerjaan'] == 'Karyawan Perusahaan Pemerintah' || $this->input->post('pekerjaan')=='Karyawan Perusahaan Pemerintah'){echo "selected";} ?>>Karyawan Perusahaan Pemerintah</option>
													<option <?php if($domisili['pekerjaan'] == 'Karyawan Swasta' || $this->input->post('pekerjaan')=='Karyawan Swasta'){echo "selected";} ?>>Karyawan Swasta</option>
													<option <?php if($domisili['pekerjaan'] == 'Kepala Daerah' || $this->input->post('pekerjaan')=='Kepala Daerah'){echo "selected";} ?>>Kepala Daerah</option>
													<option <?php if($domisili['pekerjaan'] == 'Konsultan Manajemen dan Teknis' || $this->input->post('pekerjaan')=='Konsultan Manajemen dan Teknis'){echo "selected";} ?>>Konsultan Manajemen dan Teknis</option>
													<option <?php if($domisili['pekerjaan'] == 'Kontraktor' || $this->input->post('pekerjaan')=='Kontraktor'){echo "selected";} ?>>Kontraktor</option>
													<option <?php if($domisili['pekerjaan'] == 'Montir' || $this->input->post('pekerjaan')=='Montir'){echo "selected";} ?>>Montir</option>
													<option <?php if($domisili['pekerjaan'] == 'Nelayan' || $this->input->post('pekerjaan')=='Nelayan'){echo "selected";} ?>>Nelayan</option>
													<option <?php if($domisili['pekerjaan'] == 'Notaris' || $this->input->post('pekerjaan')=='Notaris'){echo "selected";} ?>>Notaris</option>
													<option <?php if($domisili['pekerjaan'] == 'Pedagang barang kelontong' || $this->input->post('pekerjaan')=='Pedagang barang kelontong'){echo "selected";} ?>>Pedagang barang kelontong</option>
													<option <?php if($domisili['pekerjaan'] == 'Pedagang Keliling' || $this->input->post('pekerjaan')=='Pedagang Keliling'){echo "selected";} ?>>Pedagang Keliling</option>
													<option <?php if($domisili['pekerjaan'] == 'Pegawai Negeri Sipil' || $this->input->post('pekerjaan')=='Pegawai Negeri Sipil'){echo "selected";} ?>>Pegawai Negeri Sipil</option>
													<option <?php if($domisili['pekerjaan'] == 'Pelajar' || $this->input->post('pekerjaan')=='Pelajar'){echo "selected";} ?>>Pelajar</option>
													<option <?php if($domisili['pekerjaan'] == 'Pelaut' || $this->input->post('pekerjaan')=='Pelaut'){echo "selected";} ?>>Pelaut</option>
													<option <?php if($domisili['pekerjaan'] == 'Pembantu rumah tangga' || $this->input->post('pekerjaan')=='Pembantu rumah tangga'){echo "selected";} ?>>Pembantu rumah tangga</option>
													<option <?php if($domisili['pekerjaan'] == 'Pemilik perusahaan' || $this->input->post('pekerjaan')=='Pemilik perusahaan'){echo "selected";} ?>>Pemilik perusahaan</option>
													<option <?php if($domisili['pekerjaan'] == 'Pemulung' || $this->input->post('pekerjaan')=='Pemulung'){echo "selected";} ?>>Pemulung</option>
													<option <?php if($domisili['pekerjaan'] == 'Pemuka Agama' || $this->input->post('pekerjaan')=='Pemuka Agama'){echo "selected";} ?>>Pemuka Agama</option>
													<option <?php if($domisili['pekerjaan'] == 'Pemulung' || $this->input->post('pekerjaan')=='Pemulung'){echo "selected";} ?>>Pemulung</option>
													<option <?php if($domisili['pekerjaan'] == 'Pengacara' || $this->input->post('pekerjaan')=='Pengacara'){echo "selected";} ?>>Pengacara</option>
													<option <?php if($domisili['pekerjaan'] == 'Pengrajin' || $this->input->post('pekerjaan')=='Pengrajin'){echo "selected";} ?>>Pengrajin</option>
													<option <?php if($domisili['pekerjaan'] == 'Pengrajin industri rumah tangga lainnya' || $this->input->post('pekerjaan')=='Pengrajin industri rumah tangga lainnya'){echo "selected";} ?>>Pengrajin industri rumah tangga lainnya</option>
													<option <?php if($domisili['pekerjaan'] == 'Pengusaha kecil, menengah dan besar' || $this->input->post('pekerjaan')=='Pengusaha kecil, menengah dan besar'){echo "selected";} ?>>Pengusaha kecil, menengah dan besar</option>
													<option <?php if($domisili['pekerjaan'] == 'Penyiar radio' || $this->input->post('pekerjaan')=='Penyiar radio'){echo "selected";} ?>>Penyiar radio</option>
													<option <?php if($domisili['pekerjaan'] == 'Perangkat Desa' || $this->input->post('pekerjaan')=='Perangkat Desa'){echo "selected";} ?>>Perangkat Desa</option>
													<option <?php if($domisili['pekerjaan'] == 'Perawat' || $this->input->post('pekerjaan')=='Perawat'){echo "selected";} ?>>Perawat</option>
													<option <?php if($domisili['pekerjaan'] == 'Petani' || $this->input->post('pekerjaan')=='Petani'){echo "selected";} ?>>Petani</option>
													<option <?php if($domisili['pekerjaan'] == 'Peternak' || $this->input->post('pekerjaan')=='Peternak'){echo "selected";} ?>>Peternak</option>
													<option <?php if($domisili['pekerjaan'] == 'Pilot' || $this->input->post('pekerjaan')=='Pilot'){echo "selected";} ?>>Pilot</option>
													<option <?php if($domisili['pekerjaan'] == 'POLRI' || $this->input->post('pekerjaan')=='POLRI'){echo "selected";} ?>>POLRI</option>
													<option <?php if($domisili['pekerjaan'] == 'Presiden' || $this->input->post('pekerjaan')=='Presiden'){echo "selected";} ?>>Presiden</option>
													<option <?php if($domisili['pekerjaan'] == 'Pskiater/Psikolog' || $this->input->post('pekerjaan')=='Pskiater/Psikolog'){echo "selected";} ?>>Pskiater/Psikolog</option>
													<option <?php if($domisili['pekerjaan'] == 'Pensiunan' || $this->input->post('pekerjaan')=='Pensiunan'){echo "selected";} ?>>Pensiunan</option>
													<option <?php if($domisili['pekerjaan'] == 'Satpam/Security' || $this->input->post('pekerjaan')=='Satpam/Security'){echo "selected";} ?>>Satpam/Security</option>
													<option <?php if($domisili['pekerjaan'] == 'Seniman/artis' || $this->input->post('pekerjaan')=='Seniman/artis'){echo "selected";} ?>>Seniman/artis</option>
													<option <?php if($domisili['pekerjaan'] == 'Sopir' || $this->input->post('pekerjaan')=='Sopir'){echo "selected";} ?>>Sopir</option>
													<option <?php if($domisili['pekerjaan'] == 'Tidak Mempunyai Pekerjaan Tetap' || $this->input->post('pekerjaan')=='Tidak Mempunyai Pekerjaan Tetap'){echo "selected";} ?>>Tidak Mempunyai Pekerjaan Tetap</option>
													<option <?php if($domisili['pekerjaan'] == 'TNI' || $this->input->post('pekerjaan')=='TNI'){echo "selected";} ?>>TNI</option>
													<option <?php if($domisili['pekerjaan'] == 'Walikota' || $this->input->post('pekerjaan')=='Walikota'){echo "selected";} ?>>Walikota</option>
													<option <?php if($domisili['pekerjaan'] == 'Wakil Walikota' || $this->input->post('pekerjaan')=='Wakil Walikota'){echo "selected";} ?>>Wakil Walikota</option>
													<option <?php if($domisili['pekerjaan'] == 'Wakil bupati' || $this->input->post('pekerjaan')=='Wakil bupati'){echo "selected";} ?>>Wakil bupati</option>
													<option <?php if($domisili['pekerjaan'] == 'Wakil Gubernur' || $this->input->post('pekerjaan')=='Wakil Gubernur'){echo "selected";} ?>>Wakil Gubernur</option>
													<option <?php if($domisili['pekerjaan'] == 'Wakil Presiden' || $this->input->post('pekerjaan')=='Wakil Presiden'){echo "selected";} ?>>Wakil Presiden</option>
													<option <?php if($domisili['pekerjaan'] == 'Wartawan' || $this->input->post('pekerjaan')=='Wartawan'){echo "selected";} ?>>Wartawan</option>
													<option <?php if($domisili['pekerjaan'] == 'Wiraswasta' || $this->input->post('pekerjaan')=='Wiraswasta'){echo "selected";} ?>>Wiraswasta</option>
												</select>
                                    <span class="text-danger"><?php echo form_error('pekerjaan');?></span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="pendidikan" class="control-label"><span
                                        class="text-danger">*</span>Pendidikan</label>
                                <div class="form-group">
                                <select class="form-control form-control-sm" id="sel1" name="pendidikan">
                                        <option
                                            <?php if($domisili['pekerjaan'] = 'Belum/Tidak Sekolah' || $this->input->post('pendidikan')=='Belum/Tidak Sekolah'){echo "selected";} ?>>
                                            Belum/Tidak Sekolah</option>
                                        <option
                                            <?php if($domisili['pekerjaan'] = 'Sedang TK/Kelompok Bermain' || $this->input->post('pendidikan')=='Sedang TK/Kelompok Bermain'){echo "selected";} ?>>
                                            Sedang TK/Kelompok Bermain</option>
                                        <option
                                            <?php if($domisili['pekerjaan'] = 'Sedang SD/Sederajat' || $this->input->post('pendidikan')=='Sedang SD/Sederajat'){echo "selected";} ?>>
                                            Sedang SD/Sederajat</option>
                                        <option
                                            <?php if($domisili['pekerjaan'] = 'Sedang SMP/Sederajat' || $this->input->post('pendidikan')=='Sedang SMP/Sederajat'){echo "selected";} ?>>
                                            Sedang SMP/Sederajat</option>
                                        <option
                                            <?php if($domisili['pekerjaan'] = 'Sedang SMA/Sederajat' || $this->input->post('pendidikan')=='Sedang SMA/Sederajat'){echo "selected";} ?>>
                                            Sedang SMA/Sederajat</option>
                                        <option
                                            <?php if($domisili['pekerjaan'] = 'Sedang D-1/Sederajat' || $this->input->post('pendidikan')=='Sedang D-1/Sederajat'){echo "selected";} ?>>
                                            Sedang D-1/Sederajat</option>
                                        <option
                                            <?php if($domisili['pekerjaan'] = 'Sedang D-2/Sederajat' || $this->input->post('pendidikan')=='Sedang D-2/Sederajat'){echo "selected";} ?>>
                                            Sedang D-2/Sederajat</option>
                                        <option
                                            <?php if($domisili['pekerjaan'] = 'Sedang D-3/Sederajat' || $this->input->post('pendidikan')=='Sedang D-3/Sederajat'){echo "selected";} ?>>
                                            Sedang D-3/Sederajat</option>
                                        <option
                                            <?php if($domisili['pekerjaan'] = 'Sedang S-1/Sederajat' || $this->input->post('pendidikan')=='Sedang S-1/Sederajat'){echo "selected";} ?>>
                                            Sedang S-1/Sederajat</option>
                                        <option
                                            <?php if($domisili['pekerjaan'] = 'Sedang S-2/Sederajat' || $this->input->post('pendidikan')=='Sedang S-2/Sederajat'){echo "selected";} ?>>
                                            Sedang S-2/Sederajat</option>
                                        <option
                                            <?php if($domisili['pekerjaan'] = 'Sedang S-3/Sederajat' || $this->input->post('pendidikan')=='Sedang S-3/Sederajat'){echo "selected";} ?>>
                                            Sedang S-3/Sederajat</option>
                                        <option
                                            <?php if($domisili['pekerjaan'] = 'Tamat SD/Sederajat' || $this->input->post('pendidikan')=='Tamat SD/Sederajat'){echo "selected";} ?>>
                                            Tamat SD/Sederajat</option>
                                        <option
                                            <?php if($domisili['pekerjaan'] = 'Tamat SMP/Sederajat' || $this->input->post('pendidikan')=='Tamat SMP/Sederajat'){echo "selected";} ?>>
                                            Tamat SMP/Sederajat</option>
                                        <option
                                            <?php if($domisili['pekerjaan'] = 'Tamat SMA/Sederajat' || $this->input->post('pendidikan')=='Tamat SMA/Sederajat'){echo "selected";} ?>>
                                            Tamat SMA/Sederajat</option>
                                        <option
                                            <?php if($domisili['pekerjaan'] = 'Tamat D-1/Sederajat' || $this->input->post('pendidikan')=='Tamat D-1/Sederajat'){echo "selected";} ?>>
                                            Tamat D-1/Sederajat</option>
                                        <option
                                            <?php if($domisili['pekerjaan'] = 'Tamat D-2/Sederajat' || $this->input->post('pendidikan')=='Tamat D-2/Sederajat'){echo "selected";} ?>>
                                            Tamat D-2/Sederajat</option>
                                        <option
                                            <?php if($domisili['pekerjaan'] = 'Tamat D-3/Sederajat' || $this->input->post('pendidikan')=='Tamat D-3/Sederajat'){echo "selected";} ?>>
                                            Tamat D-3/Sederajat</option>
                                        <option
                                            <?php if($domisili['pekerjaan'] = 'Tamat S-1/Sederajat' || $this->input->post('pendidikan')=='Tamat S-1/Sederajat'){echo "selected";} ?>>
                                            Tamat S-1/Sederajat</option>
                                        <option
                                            <?php if($domisili['pekerjaan'] = 'Tamat S-2/Sederajat' || $this->input->post('pendidikan')=='Tamat S-2/Sederajat'){echo "selected";} ?>>
                                            Tamat S-2/Sederajat</option>
                                        <option
                                            <?php if($domisili['pekerjaan'] = 'Tamat S-3/Sederajat' || $this->input->post('pendidikan')=='Tamat S-3/Sederajat'){echo "selected";} ?>>
                                            Tamat S-3/Sederajat</option>
                                        <option
                                            <?php if($domisili['pekerjaan'] = 'Tidak Pernah Sekolah' || $this->input->post('pendidikan')=='Tidak Pernah Sekolah'){echo "selected";} ?>>
                                            Tidak Pernah Sekolah</option>
                                        <option
                                            <?php if($domisili['pekerjaan'] = 'Tidak Tamat SD/Sederajat' || $this->input->post('pendidikan')=='Tidak Tamat SD/Sederajat'){echo "selected";} ?>>
                                            Tidak Tamat SD/Sederajat</option>
                                    </select>
                                    <span class="text-danger"><?php echo form_error('pendidikan');?></span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="alamat_asal" class="control-label"><span class="text-danger">*</span>Alamat
                                    Asal</label>
                                <div class="form-group">
                                    <input type="text" name="alamat_asal"
                                        value="<?php echo ($this->input->post('alamat_asal') ? $this->input->post('alamat_asal') : $domisili['alamat_asal']); ?>"
                                        class="form-control form-control-sm" id="alamat_asal" />
                                    <span class="text-danger"><?php echo form_error('alamat_asal');?></span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="pindah_ke" class="control-label"><span class="text-danger">*</span>Pindah
                                    Ke-</label>
                                <div class="form-group">
                                    <input type="text" name="pindah_ke"
                                        value="<?php echo ($this->input->post('pindah_ke') ? $this->input->post('pindah_ke') : $domisili['pindah_ke']); ?>"
                                        class="form-control form-control-sm" id="pindah_ke" />
                                    <span class="text-danger"><?php echo form_error('pindah_ke');?></span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="alasan_pindah" class="control-label"><span
                                        class="text-danger">*</span>Alasan Pindah</label>
                                <div class="form-group">
                                    <input type="text" name="alasan_pindah"
                                        value="<?php echo ($this->input->post('alasan_pindah') ? $this->input->post('alasan_pindah') : $domisili['alasan_pindah']); ?>"
                                        class="form-control form-control-sm" id="alasan_pindah" />
                                    <span class="text-danger"><?php echo form_error('alasan_pindah');?></span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="pengikut" class="control-label"><span
                                        class="text-danger">*</span>Pengikut</label>
                                <div class="form-group">
                                    <input type="text" name="pengikut"
                                        value="<?php echo ($this->input->post('pengikut') ? $this->input->post('pengikut') : $domisili['pengikut']); ?>"
                                        class="form-control form-control-sm" id="pengikut" />
                                    <span class="text-danger"><?php echo form_error('pengikut');?></span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="tgl_surat_dibuat" class="control-label"><span
                                        class="text-danger">*</span>Tanggal Surat Dibuat</label>
                                <div class="form-group">
                                    <input type="text" name="tgl_surat_dibuat"
                                        value="<?php echo ($this->input->post('tgl_surat_dibuat') ? $this->input->post('tgl_surat_dibuat') : $domisili['tgl_surat_dibuat']); ?>"
                                        class="form-control form-control-sm" id="tgl_surat_dibuat" />
                                    <span class="text-danger"><?php echo form_error('tgl_surat_dibuat');?></span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="tgl_surat_masuk" class="control-label"><span
                                        class="text-danger">*</span>Tanggal Surat Masuk</label>
                                <div class="form-group">
                                    <input type="text" name="tgl_surat_masuk"
                                        value="<?php echo ($this->input->post('tgl_surat_masuk') ? $this->input->post('tgl_surat_masuk') : $domisili['tgl_surat_masuk']); ?>"
                                        class="form-control form-control-sm" id="tgl_surat_masuk" />
                                    <span class="text-danger"><?php echo form_error('tgl_surat_masuk');?></span>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label for="ket" class="control-label"><span
                                        class="text-danger">*</span>Keterangan</label>
                                <div class="form-group">
                                    <input type="text" name="ket"
                                        value="<?php echo ($this->input->post('ket') ? $this->input->post('ket') : $domisili['keterangan']); ?>"
                                        class="form-control form-control-sm" id="ket" />
                                    <span class="text-danger"><?php echo form_error('ket');?></span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="scan" class="control-label"><span class="text-danger"></span>Scan (pdf|doc|docx|jpg)</label>
                                <div class="form-group">
                                    <input type="file" name="scan"
                                        value="<?php echo ($this->input->post('scan') ? $this->input->post('scan') : $domisili['scan']); ?>"
                                        class="form-control form-control-sm" id="scan" />
                                    <span class="text-danger"><?php echo form_error('scan');?></span>
                                </div>
                            </div>
                            <div class="box-footer">
                                <button type="submit" class="btn btn-success" >
                                    <i class="fa fa-check"></i> Save
                                </button>
                            </div>
                            <?php echo form_close(); ?>
                        </div>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>