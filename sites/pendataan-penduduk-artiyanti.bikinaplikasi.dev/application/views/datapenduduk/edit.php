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
                        <a class="nav-link" href="<?php echo base_url(); ?>" data-action="search-show"
                            data-target="#navbar-search-main">
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
                                <li class="breadcrumb-item active" aria-current="page">Edit data penduduk</li>
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
                        <?php echo form_open('DataPenduduk/edit/' . $DataPenduduk['nik'], array("enctype" => 'multipart/form-data')); ?>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="nik" class="control-label"><span class="text-danger">*</span>NIK</label>
                                <div class="form-group">
                                    <input type="text" name="nik"
                                        value="<?php echo ($this->input->post('nik') ? $this->input->post('nik') : $DataPenduduk['nik']); ?>"
                                        class="form-control form-control-sm" id="nik" />
                                    <span class="text-danger"><?php echo form_error('nik'); ?></span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="no_kk" class="control-label"><span class="text-danger">*</span>No KK</label>
                                <div class="form-group">
                                    <input type="text" name="no_kk"
                                        value="<?php echo ($this->input->post('no_kk') ? $this->input->post('no_kk') : $DataPenduduk['no_kk']); ?>"
                                        class="form-control form-control-sm" id="no_kk" />
                                    <span class="text-danger"><?php echo form_error('no_kk'); ?></span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="nama_lengkap" class="control-label"><span class="text-danger">*</span>Nama
                                    Lengkap</label>
                                <div class="form-group">
                                    <input type="text" name="nama_lengkap"
                                        value="<?php echo ($this->input->post('nama_lengkap') ? $this->input->post('nama_lengkap') : $DataPenduduk['nama_lengkap']); ?>"
                                        class="form-control form-control-sm" id="nama_lengkap" />
                                    <span class="text-danger"><?php echo form_error('nama_lengkap'); ?></span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="alamat" class="control-label"><span
                                        class="text-danger">*</span>Alamat</label>
                                <div class="form-group">
                                    <input type="text" name="alamat"
                                        value="<?php echo ($this->input->post('alamat') ? $this->input->post('alamat') : $DataPenduduk['alamat']); ?>"
                                        class="form-control form-control-sm" id="alamat" />
                                    <span class="text-danger"><?php echo form_error('alamat'); ?></span>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label for="rt" class="control-label"><span class="text-danger">*</span>Rt</label>
                                <div class="form-group">
                                    <select class="form-control form-control-sm" id="sel1" name="rt" required>
                                        <option value=''>-- Pilih Rt--</option>
                                        <?php foreach ($rt as $rt): ?>
                                        <option
                                            <?php if ($this->input->post('rt') == $rt['nama_rt'] || $DataPenduduk['rt'] == $rt['nama_rt']) {echo "selected";}?>
                                            value='<?php echo $rt['nama_rt']; ?>'><?php echo $rt['nama_rt']; ?>
                                        </option>
                                        <?php endforeach;?>
                                    </select>
                                    <span class="text-danger"><?php echo form_error('rt'); ?></span>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label for="rw" class="control-label"><span class="text-danger">*</span>RW</label>
                                <div class="form-group">
                                    <input type="text" name="rw"
                                        value="<?php echo ($this->input->post('rw') ? $this->input->post('rw') : $DataPenduduk['rw']); ?>"
                                        class="form-control form-control-sm" id="rw" />
                                    <span class="text-danger"><?php echo form_error('rw'); ?></span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="jenis_kelamin" class="control-label"><span class="text-danger">*</span>Jenis
                                    Kelamin</label>
                                <div class="form-group">
                                    <input type="radio" name="jenis_kelamin" value="Laki - Laki"
                                        <?php if ($DataPenduduk['jenis_kelamin'] == 'Laki - Laki') {echo "checked";}?> />
                                    Laki-laki<br />
                                    <input type="radio" name="jenis_kelamin" value="Perempuan"
                                        <?php if ($DataPenduduk['jenis_kelamin'] == 'Perempuan') {echo "checked";}?> />
                                    Perempuan<br />
                                    <span class="text-danger"><?php echo form_error('jenis_kelamin'); ?></span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="tempat_lahir" class="control-label"><span class="text-danger">*</span>Tempat
                                    Lahir</label>
                                <div class="form-group">
                                    <input type="text" name="tempat_lahir"
                                        value="<?php echo ($this->input->post('tempat_lahir') ? $this->input->post('tempat_lahir') : $DataPenduduk['tempat_lahir']); ?>"
                                        class="form-control form-control-sm" id="tempat_lahir" />
                                    <span class="text-danger"><?php echo form_error('tempat_lahir'); ?></span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="tanggal_lahir" class="control-label"><span
                                        class="text-danger">*</span>Tanggal Lahir</label>
                                <div class="form-group">
                                    <input type="date" name="tanggal_lahir"
                                        value="<?php echo ($this->input->post('tanggal_lahir') ? $this->input->post('tanggal_lahir') : $DataPenduduk['tanggal_lahir']); ?>"
                                        class="form-control form-control-sm" id="tanggal_lahir" />
                                    <span class="text-danger"><?php echo form_error('tanggal_lahir'); ?></span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="no_telp" class="control-label"><span class="text-danger">*</span>No
                                    Telp</label>
                                <div class="form-group">
                                    <input type="text" name="no_telp"
                                        value="<?php echo ($this->input->post('no_telp') ? $this->input->post('no_telp') : $DataPenduduk['no_telp']); ?>"
                                        class="form-control form-control-sm" id="no_telp" />
                                    <span class="text-danger"><?php echo form_error('no_telp'); ?></span>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label for="agama" class="control-label"><span class="text-danger">*</span>Agama</label>
                                <div class="form-group">
                                    <select class="form-control form-control-sm" id="sel1" name="agama">
                                        <?php foreach ($agama as $agama): ?>
                                        <option
                                            <?php if ($this->input->post('agama') == $agama['keterangan'] || $DataPenduduk['agama'] == $agama['keterangan']) {echo "selected";}?>>
                                            <?php echo $agama['keterangan']; ?></option>
                                        <?php endforeach;?>
                                    </select>
                                    <span class="text-danger"><?php echo form_error('agama'); ?></span>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label for="pendidikan" class="control-label"><span
                                        class="text-danger">*</span>Pendidikan</label>
                                <div class="form-group">
                                    <select class="form-control form-control-sm" id="sel1" name="pendidikan">
                                        <?php foreach ($pendidikan as $pendidikan): ?>
                                        <option
                                            <?php if ($this->input->post('pendidikan') == $pendidikan['keterangan'] || $DataPenduduk['agama'] == $agama['keterangan']) {echo "selected";}?>>
                                            <?php echo $pendidikan['keterangan']; ?></option>
                                        <?php endforeach;?>
                                    </select>
                                    <span class="text-danger"><?php echo form_error('pendidikan'); ?></span>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label for="pekerjaan" class="control-label"><span
                                        class="text-danger">*</span>Pekerjaan</label>
                                <div class="form-group">
                                    <select class="form-control form-control-sm" name="pekerjaan" id='pekerjaan'>
                                        <?php foreach ($pekerjaan as $pekerjaan): ?>
                                        <option
                                            <?php if ($this->input->post('pekerjaan') == $pekerjaan['keterangan'] || $DataPenduduk['agama'] == $agama['keterangan']) {echo "selected";}?>>
                                            <?php echo $pekerjaan['keterangan']; ?></option>
                                        <?php endforeach;?>
                                        <option value="lain-lain" <?php echo $cekPekerjaanLainLain ? "selected" : ""; ?>>Lain - Lain</option>
                                    </select>
                                    <span class="text-danger"><?php echo form_error('pekerjaan'); ?></span>
                                </div>
                            </div>

                            <div class="col-md-12 <?php echo $cekPekerjaanLainLain ? "":"d-none"; ?>" id='pekerjaan_lain_lain'>
                                <label for="pekerjaan" class="control-label"><span class="text-danger"></span>Pekerjaan
                                    Lain - Lain</label>
                                <div class="form-group ">
                                    <input type="text" name="pekerjaan_lain_lain"
                                        value="<?php echo $this->input->post('pekerjaan') == "" ? ($cekPekerjaanLainLain ? $DataPenduduk['pekerjaan'] : "") : $this->input->post('pekerjaan'); ?>"
                                        class="form-control form-control-sm" id="pekerjaan_lain_lain" />
                                    <span class="text-danger"><?php echo form_error('pekerjaan');?></span>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label for="dusun" class="control-label"><span class="text-danger">*</span>Dusun</label>
                                <div class="form-group">
                                    <input type="text" name="dusun"
                                        value="<?php echo $this->input->post('dusun') == "" ? $DataPenduduk['dusun'] : $this->input->post('dusun'); ?>"
                                        class="form-control form-control-sm" id="dusun" />
                                    <span class="text-danger"><?php echo form_error('dusun'); ?></span>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label for="pekerjaan" class="control-label"><span
                                        class="text-danger">*</span>Lurah</label>
                                <div class="form-group">
                                    <select class="form-control form-control-sm" id="sel1" name="lurah">
                                        <?php foreach ($lurah as $lurah): ?>
                                        <option
                                            <?php if ($this->input->post('lurah') == $lurah['keterangan'] || $DataPenduduk['lurah'] == $lurah['keterangan']) {echo "selected";}?>>
                                            <?php echo $lurah['keterangan']; ?></option>
                                        <?php endforeach;?>
                                    </select>
                                    <span class="text-danger"><?php echo form_error('lurah'); ?></span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="kecamatan" class="control-label"><span
                                        class="text-danger">*</span>Kecamatan</label>
                                <div class="form-group">
                                    <input type="text" name="kecamatan"
                                        value="<?php echo ($this->input->post('kecamatan') ? $this->input->post('kecamatan') : $DataPenduduk['kecamatan']); ?>"
                                        class="form-control form-control-sm" id="kecamatan" />
                                    <span class="text-danger"><?php echo form_error('kecamatan'); ?></span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="desa" class="control-label"><span class="text-danger">*</span>Desa</label>
                                <div class="form-group">
                                    <input type="text" name="desa"
                                        value="<?php echo ($this->input->post('desa') ? $this->input->post('desa') : $DataPenduduk['desa']); ?>"
                                        class="form-control form-control-sm" id="desa" />
                                    <span class="text-danger"><?php echo form_error('desa'); ?></span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="kabupaten" class="control-label"><span
                                        class="text-danger">*</span>Kabupaten</label>
                                <div class="form-group">
                                    <input type="text" name="kabupaten"
                                        value="<?php echo ($this->input->post('kabupaten') ? $this->input->post('kabupaten') : $DataPenduduk['kabupaten']); ?>"
                                        class="form-control form-control-sm" id="kabupaten" />
                                    <span class="text-danger"><?php echo form_error('kabupaten'); ?></span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="provinsi" class="control-label"><span
                                        class="text-danger">*</span>Provinsi</label>
                                <div class="form-group">
                                    <input type="text" name="provinsi"
                                        value="<?php echo ($this->input->post('provinsi') ? $this->input->post('provinsi') : $DataPenduduk['provinsi']); ?>"
                                        class="form-control form-control-sm" id="provinsi" />
                                    <span class="text-danger"><?php echo form_error('provinsi'); ?></span>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label for="negara" class="control-label"><span
                                        class="text-danger">*</span>Negara</label>
                                <div class="form-group">
                                    <input type="text" name="negara"
                                        value="<?php echo ($this->input->post('negara') ? $this->input->post('negara') : $DataPenduduk['negara']); ?>"
                                        class="form-control form-control-sm" id="negara" />
                                    <span class="text-danger"><?php echo form_error('negara'); ?></span>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label for="status" class="control-label"><span class="text-danger">*</span>Status
                                    Kawin</label>

                                <div class="form-group">
                                    <input type="radio" name="status" value="Kawin"
                                        <?php if ($this->input->post('status') == 'Kawin' || $DataPenduduk['status'] == "Kawin") {echo "checked";}?> />
                                    Kawin<br />
                                    <input type="radio" name="status" value="Belum Kawin"
                                        <?php if ($this->input->post('status') == 'Belum Kawin' || $DataPenduduk['status'] == "Belum Kawin") {echo "checked";}?> />
                                    Belum Kawin<br />
                                    <input type="radio" name="status" value="Cerai Hidup"
                                        <?php if ($this->input->post('status') == 'Cerai Hidup' || $DataPenduduk['status'] == "Cerai Hidup") {echo "checked";}?> />
                                    Cerai Hidup<br />
                                    <input type="radio" name="status" value="Cerai Mati"
                                        <?php if ($this->input->post('status') == 'Cerai Mati' || $DataPenduduk['status'] == "Cerai Mati") {echo "checked";}?> />
                                    Cerai Mati<br />
                                    <span class="text-danger"><?php echo form_error('status'); ?></span>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label for="hubungan_keluarga" class="control-label"><span
                                        class="text-danger">*</span>Hubungan Keluarga</label>
                                <div class="form-group">
                                    <select class="form-control form-control-sm" id="sel1" name="hubungan_keluarga">
                                        <option
                                            <?php if ($DataPenduduk['hubungan_keluarga'] = $this->input->post('hubungan_keluarga') == 'Kepala Keluarga' || $DataPenduduk['status'] == "Kepala Keluarga") {echo "selected";}?>>
                                            Kepala Keluarga</option>
                                        <option
                                            <?php if ($DataPenduduk['hubungan_keluarga'] = $this->input->post('hubungan_keluarga') == 'Istri' || $DataPenduduk['status'] == "Istri") {echo "selected";}?>>
                                            Istri</option>
                                        <option
                                            <?php if ($DataPenduduk['hubungan_keluarga'] = $this->input->post('hubungan_keluarga') == 'Suami' || $DataPenduduk['status'] == "Suami") {echo "selected";}?>>
                                            Suami</option>
                                        <option
                                            <?php if ($DataPenduduk['hubungan_keluarga'] = $this->input->post('hubungan_keluarga') == 'Anak Kandung' || $DataPenduduk['status'] == "Anak Kandung") {echo "selected";}?>>
                                            Anak Kandung</option>
                                        <option
                                            <?php if ($DataPenduduk['hubungan_keluarga'] = $this->input->post('hubungan_keluarga') == 'Adik' || $DataPenduduk['status'] == "Adik") {echo "selected";}?>>
                                            Adik</option>
                                        <option
                                            <?php if ($DataPenduduk['hubungan_keluarga'] = $this->input->post('hubungan_keluarga') == 'Kakak' || $DataPenduduk['status'] == "Kakak") {echo "selected";}?>>
                                            Kakak</option>
                                        <option
                                            <?php if ($DataPenduduk['hubungan_keluarga'] = $this->input->post('hubungan_keluarga') == 'Ayah' || $DataPenduduk['status'] == "Ayah") {echo "selected";}?>>
                                            Ayah</option>
                                        <option
                                            <?php if ($DataPenduduk['hubungan_keluarga'] = $this->input->post('hubungan_keluarga') == 'Ibu' || $DataPenduduk['status'] == "Ibu") {echo "selected";}?>>
                                            Ibu</option>
                                        <option
                                            <?php if ($DataPenduduk['hubungan_keluarga'] = $this->input->post('hubungan_keluarga') == 'Mertua' || $DataPenduduk['status'] == "Mertua") {echo "selected";}?>>
                                            Mertua</option>
                                        <option
                                            <?php if ($DataPenduduk['hubungan_keluarga'] = $this->input->post('hubungan_keluarga') == 'Menantu' || $DataPenduduk['status'] == "Menantu") {echo "selected";}?>>
                                            Menantu</option>
                                        <option
                                            <?php if ($DataPenduduk['hubungan_keluarga'] = $this->input->post('hubungan_keluarga') == 'Famili Lain' || $DataPenduduk['status'] == "Famili Lain") {echo "selected";}?>>
                                            Famili Lain</option>
                                    </select>
                                    <span class="text-danger"><?php echo form_error('hubungan_keluarga'); ?></span>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label for="golongan_darah" class="control-label"><span
                                        class="text-danger">*</span>Golongan Darah</label>
                                <div class="form-group">
                                    <select class="form-control form-control-sm" id="sel1" name="golongan_darah">
                                        <option
                                            <?php if ($DataPenduduk['golongan_darah'] = $this->input->post('golongan_darah') == 'A' || $DataPenduduk['status'] == "A") {echo "selected";}?>>
                                            A</option>
                                        <option
                                            <?php if ($DataPenduduk['golongan_darah'] = $this->input->post('golongan_darah') == 'B' || $DataPenduduk['status'] == "B") {echo "selected";}?>>
                                            B</option>
                                        <option
                                            <?php if ($DataPenduduk['golongan_darah'] = $this->input->post('golongan_darah') == 'AB' || $DataPenduduk['status'] == "AB") {echo "selected";}?>>
                                            AB</option>
                                        <option
                                            <?php if ($DataPenduduk['golongan_darah'] = $this->input->post('golongan_darah') == 'O' || $DataPenduduk['status'] == "O") {echo "selected";}?>>
                                            O</option>
                                        <option
                                            <?php if ($DataPenduduk['golongan_darah'] = $this->input->post('golongan_darah') == 'A+' || $DataPenduduk['status'] == "A+") {echo "selected";}?>>
                                            A+</option>
                                        <option
                                            <?php if ($DataPenduduk['golongan_darah'] = $this->input->post('golongan_darah') == 'A-' || $DataPenduduk['status'] == "A-") {echo "selected";}?>>
                                            A-</option>
                                        <option
                                            <?php if ($DataPenduduk['golongan_darah'] = $this->input->post('golongan_darah') == 'B+' || $DataPenduduk['status'] == "B+") {echo "selected";}?>>
                                            B+</option>
                                        <option
                                            <?php if ($DataPenduduk['golongan_darah'] = $this->input->post('golongan_darah') == 'B-' || $DataPenduduk['status'] == "B-") {echo "selected";}?>>
                                            B-</option>
                                        <option
                                            <?php if ($DataPenduduk['golongan_darah'] = $this->input->post('golongan_darah') == 'AB+' || $DataPenduduk['status'] == "AB+") {echo "selected";}?>>
                                            AB+</option>
                                        <option
                                            <?php if ($DataPenduduk['golongan_darah'] = $this->input->post('golongan_darah') == 'AB-' || $DataPenduduk['status'] == "AB-") {echo "selected";}?>>
                                            AB-</option>
                                        <option
                                            <?php if ($DataPenduduk['golongan_darah'] = $this->input->post('golongan_darah') == 'O+' || $DataPenduduk['status'] == "O+") {echo "selected";}?>>
                                            O+</option>
                                        <option
                                            <?php if ($DataPenduduk['golongan_darah'] = $this->input->post('golongan_darah') == 'O-' || $DataPenduduk['status'] == "O-") {echo "selected";}?>>
                                            O-</option>
                                        <option
                                            <?php if ($DataPenduduk['golongan_darah'] = $this->input->post('golongan_darah') == 'Tidak Tahu' || $DataPenduduk['status'] == "Tidak Tahu") {echo "selected";}?>>
                                            Tidak Tahu</option>
                                    </select>
                                    <span class="text-danger"><?php echo form_error('golongan_darah'); ?></span>
                                </div>
                            </div>

                            <!-- <div class="col-md-12">
                                <label for="ket" class="control-label"><span
                                        class="text-danger">*</span>Keterangan</label>
                                <div class="form-group">
                                    <input type="text" name="ket"
                                        value="<?php echo ($this->input->post('ket') ? $this->input->post('ket') : $DataPenduduk['ket']); ?>"
                                        class="form-control form-control-sm" id="ket" />
                                    <span class="text-danger"><?php echo form_error('ket'); ?></span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="scan" class="control-label"><span class="text-danger"></span>Scan
                                    (pdf|doc|docx|jpg)</label>
                                <div class="form-group">
                                    <input type="file" name="scan"
                                        value="<?php echo ($this->input->post('scan') ? $this->input->post('scan') : $DataPenduduk['scan']); ?>"
                                        class="form-control form-control-sm" id="scan" />
                                    <span class="text-danger"><?php echo form_error('scan'); ?></span>
                                </div>
                            </div> -->

                            <div class="form-group">
                                <div class="col-sm-offset-11 col-sm-1">
                                    <button type="submit" class="btn btn-success">Save</button>
                                </div>
                            </div>
                        </div>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>