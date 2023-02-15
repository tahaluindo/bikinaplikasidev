
















<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Data Kependudukan| <?php echo $title?></title>
  <base href="<?php echo base_url(); ?>">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<!-- footer -->
</div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2018.</strong> All rights
    reserved.
  </footer>

  
  <section class="content">
		 <div class="row">
			 <section class="col-lg-12 connectedSortable">
				 <?php
				 echo $this->session->flashdata('msg');
				 ?>
    <?php echo form_open('DataPenduduk/add',array("class"=>"form-horizontal" , "enctype" => 'multipart/form-data')); ?>

	<div class="row">
    <div class="col-md-12">
       <div class="box box-info">
            <div class="box-header with-border">
							<h3>Input Data Penduduk</h3>
            </div>
            <div class="box-body">
	<div class="form-group">
		<label for="nik" class="col-md-2 control-label"><span class="text-danger">*</span>NIK</label>
		<div class="col-md-10">
			<input type="text" name="nik" value="<?php echo $this->input->post('nik'); ?>" class="form-control" id="nik" />
			<span class="text-danger"><?php echo form_error('nik');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="no_kk" class="col-md-2 control-label"><span class="text-danger">*</span>No KK</label>
		<div class="col-md-10">
			<input type="text" name="no_kk" value="<?php echo $this->input->post('no_kk'); ?>" class="form-control" id="no_kk" />
			<span class="text-danger"><?php echo form_error('no_kk');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="nama_lengkap" class="col-md-2 control-label"><span class="text-danger">*</span>Nama Lengkap</label>
		<div class="col-md-10">
			<input type="text" name="nama_lengkap" value="<?php echo $this->input->post('nama_lengkap'); ?>" class="form-control" id="nama_lengkap" />
			<span class="text-danger"><?php echo form_error('nama_lengkap');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="alamat" class="col-md-2 control-label"><span class="text-danger">*</span>Alamat</label>
		<div class="col-md-10">
			<input type="text" name="alamat" value="<?php echo $this->input->post('alamat'); ?>" class="form-control" id="alamat" />
			<span class="text-danger"><?php echo form_error('alamat');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="rt" class="col-md-2 control-label"><span class="text-danger">*</span>RT</label>
		<div class="col-md-10">
			<input type="text" name="rt" value="<?php echo $this->input->post('rt'); ?>" class="form-control" id="rt" />
			<span class="text-danger"><?php echo form_error('rt');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="rw" class="col-md-2 control-label"><span class="text-danger">*</span>RW</label>
		<div class="col-md-10">
			<input type="text" name="rw" value="<?php echo $this->input->post('rw'); ?>" class="form-control" id="rw" />
			<span class="text-danger"><?php echo form_error('rw');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="jenis_kelamin" class="col-md-2 control-label"><span class="text-danger">*</span>Jenis Kelamin</label>
		<div class="col-md-10">
			<input type="radio" name="jenis_kelamin" value="Laki" <?php if($this->input->post('jenis_kelamin')=='Laki'){echo "checked";} ?>/>Laki-laki<br/>
             <input type="radio" name="jenis_kelamin" value="Perempuan" <?php if($this->input->post('jenis_kelamin')=='Perempuan'){echo "checked";} ?>/>Perempuan<br/>
			<span class="text-danger"><?php echo form_error('jenis_kelamin');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="tempat_lahir" class="col-md-2 control-label"><span class="text-danger">*</span>Tempat Lahir</label>
		<div class="col-md-10">
			<input type="text" name="tempat_lahir" value="<?php echo $this->input->post('tempat_lahir'); ?>" class="form-control" id="tempat_lahir" />
			<span class="text-danger"><?php echo form_error('tempat_lahir');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="tanggal_lahir" class="col-md-2 control-label"><span class="text-danger">*</span>Tanggal Lahir</label>
		<div class="col-md-10">
			<input type="date" name="tanggal_lahir" value="<?php echo $this->input->post('tanggal_lahir'); ?>" class="form-control" id="tanggal_lahir" />
			<span class="text-danger"><?php echo form_error('tanggal_lahir');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="no_telp" class="col-md-2 control-label"><span class="text-danger">*</span>No Telepon</label>
		<div class="col-md-10">
			<input type="text" name="no_telp" value="<?php echo $this->input->post('no_telp'); ?>" class="form-control" id="no_telp" />
			<span class="text-danger"><?php echo form_error('no_telp');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="agama" class="col-md-2 control-label"><span class="text-danger">*</span>Agama</label>
		<div class="col-md-10">
			<select class="form-control" id="sel1" name="agama">
    			<option <?php if($this->input->post('agama')=='Islam'){echo "selected";} ?>>Islam</option>
    			<option <?php if($this->input->post('agama')=='Kristen'){echo "selected";} ?>>Kristen</option>
    			<option <?php if($this->input->post('agama')=='Katholik'){echo "selected";} ?>>Katholik</option>
    			<option <?php if($this->input->post('agama')=='Hindu'){echo "selected";} ?>>Hindu</option>
    			<option <?php if($this->input->post('agama')=='Budha'){echo "selected";} ?>>Budha</option>
    			<option <?php if($this->input->post('agama')=='Konghucu'){echo "selected";} ?>>Konghucu</option>
    			<option <?php if($this->input->post('agama')=='Lainnya'){echo "selected";} ?>>Lainnya</option>
  			</select>
			<span class="text-danger"><?php echo form_error('agama');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="pendidikan" class="col-md-2 control-label"><span class="text-danger">*</span>Pendidikan</label>
		<div class="col-md-10">
			<select class="form-control" id="sel1" name="pendidikan">
    			<option <?php if($this->input->post('pendidikan')=='Belum/Tidak Sekolah'){echo "selected";} ?>>Belum/Tidak Sekolah</option>
    			<option <?php if($this->input->post('pendidikan')=='Sedang TK/Kelompok Bermain'){echo "selected";} ?>>Sedang TK/Kelompok Bermain</option>
    			<option <?php if($this->input->post('pendidikan')=='Sedang SD/Sederajat'){echo "selected";} ?>>Sedang SD/Sederajat</option>
    			<option <?php if($this->input->post('pendidikan')=='Sedang SMP/Sederajat'){echo "selected";} ?>>Sedang SMP/Sederajat</option>
    			<option <?php if($this->input->post('pendidikan')=='Sedang SMA/Sederajat'){echo "selected";} ?>>Sedang SMA/Sederajat</option>
    			<option <?php if($this->input->post('pendidikan')=='Sedang D-1/Sederajat'){echo "selected";} ?>>Sedang D-1/Sederajat</option>
    			<option <?php if($this->input->post('pendidikan')=='Sedang D-2/Sederajat'){echo "selected";} ?>>Sedang D-2/Sederajat</option>
    			<option <?php if($this->input->post('pendidikan')=='Sedang D-3/Sederajat'){echo "selected";} ?>>Sedang D-3/Sederajat</option>
    			<option <?php if($this->input->post('pendidikan')=='Sedang S-1/Sederajat'){echo "selected";} ?>>Sedang S-1/Sederajat</option>
    			<option <?php if($this->input->post('pendidikan')=='Sedang S-2/Sederajat'){echo "selected";} ?>>Sedang S-2/Sederajat</option>
    			<option <?php if($this->input->post('pendidikan')=='Sedang S-3/Sederajat'){echo "selected";} ?>>Sedang S-3/Sederajat</option>
    			<option <?php if($this->input->post('pendidikan')=='Tamat SD/Sederajat'){echo "selected";} ?>>Tamat SD/Sederajat</option>
    			<option <?php if($this->input->post('pendidikan')=='Tamat SMP/Sederajat'){echo "selected";} ?>>Tamat SMP/Sederajat</option>
    			<option <?php if($this->input->post('pendidikan')=='Tamat SMA/Sederajat'){echo "selected";} ?>>Tamat SMA/Sederajat</option>
    			<option <?php if($this->input->post('pendidikan')=='Tamat D-1/Sederajat'){echo "selected";} ?>>Tamat D-1/Sederajat</option>
    			<option <?php if($this->input->post('pendidikan')=='Tamat D-2/Sederajat'){echo "selected";} ?>>Tamat D-2/Sederajat</option>
    			<option <?php if($this->input->post('pendidikan')=='Tamat D-3/Sederajat'){echo "selected";} ?>>Tamat D-3/Sederajat</option>
    			<option <?php if($this->input->post('pendidikan')=='Tamat S-1/Sederajat'){echo "selected";} ?>>Tamat S-1/Sederajat</option>
    			<option <?php if($this->input->post('pendidikan')=='Tamat S-2/Sederajat'){echo "selected";} ?>>Tamat S-2/Sederajat</option>
    			<option <?php if($this->input->post('pendidikan')=='Tamat S-3/Sederajat'){echo "selected";} ?>>Tamat S-3/Sederajat</option>
    			<option <?php if($this->input->post('pendidikan')=='Tidak Pernah Sekolah'){echo "selected";} ?>>Tidak Pernah Sekolah</option>
    			<option <?php if($this->input->post('pendidikan')=='Tidak Tamat SD/Sederajat'){echo "selected";} ?>>Tidak Tamat SD/Sederajat</option>
  			</select>
			<span class="text-danger"><?php echo form_error('pendidikan');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="pekerjaan" class="col-md-2 control-label"><span class="text-danger">*</span>Pekerjaan</label>
		<div class="col-md-10">
			<select class="form-control" id="sel1" name="pekerjaan">
    			<option <?php if($this->input->post('pekerjaan')=='Akuntan'){echo "selected";} ?>>Akuntan</option>
    			<option <?php if($this->input->post('pekerjaan')=='Anggota Kabinet Kementrian'){echo "selected";} ?>>Anggota Kabinet Kementrian</option>
    			<option <?php if($this->input->post('pekerjaan')=='Anggota Legislatif'){echo "selected";} ?>>Anggota Legislatif</option>
    			<option <?php if($this->input->post('pekerjaan')=='Anggota Mahkamah Konstitusi'){echo "selected";} ?>>Anggota Mahkamah Konstitusi</option>
    			<option <?php if($this->input->post('pekerjaan')=='Apoteker'){echo "selected";} ?>>Apoteker</option>
    			<option <?php if($this->input->post('pekerjaan')=='Arsitektur/Desainer'){echo "selected";} ?>>Arsitektur/Desainer</option>
    			<option <?php if($this->input->post('pekerjaan')=='Belum Bekerja'){echo "selected";} ?>>Belum Bekerja</option>
    			<option <?php if($this->input->post('pekerjaan')=='Bidan Swasta'){echo "selected";} ?>>Bidan Swasta</option>
    			<option <?php if($this->input->post('pekerjaan')=='Bupati'){echo "selected";} ?>>Bupati</option>
    			<option <?php if($this->input->post('pekerjaan')=='Buruh Harian Lepas'){echo "selected";} ?>>Buruh Harian Lepas</option>
    			<option <?php if($this->input->post('pekerjaan')=='Buruh Jasa Perdagangan Hasil Bumi'){echo "selected";} ?>>Buruh Jasa Perdagangan Hasil Bumi</option>
    			<option <?php if($this->input->post('pekerjaan')=='Buruh Migran'){echo "selected";} ?>>Buruh Migran</option>
    			<option <?php if($this->input->post('pekerjaan')=='Buruh Tani'){echo "selected";} ?>>Buruh Tani</option>
    			<option <?php if($this->input->post('pekerjaan')=='Buruh Usaha Hotel dan Penginapan lainnya'){echo "selected";} ?>>Buruh Usaha Hotel dan Penginapan lainnya</option>
    			<option <?php if($this->input->post('pekerjaan')=='Buruh Usaha Jasa Hiburan dan Pariwisata'){echo "selected";} ?>>Buruh Usaha Jasa Hiburan dan Pariwisata</option>
    			<option <?php if($this->input->post('pekerjaan')=='Buruh Usaha Jasa Informasi dan Komunikasi'){echo "selected";} ?>>Buruh Usaha Jasa Informasi dan Komunikasi</option>
    			<option <?php if($this->input->post('pekerjaan')=='Buruh Usaha Jasa Transportasi dan Perhubungan'){echo "selected";} ?>>Buruh Usaha Jasa Transportasi dan Perhubungan</option>
    			<option <?php if($this->input->post('pekerjaan')=='Dokter Swasta'){echo "selected";} ?>>Dokter Swasta</option>
    			<option <?php if($this->input->post('pekerjaan')=='Dosen Swasta'){echo "selected";} ?>>Dosen Swasta</option>
    			<option <?php if($this->input->post('pekerjaan')=='Dukun Tradisional'){echo "selected";} ?>>Dukun Tradisional</option>
    			<option <?php if($this->input->post('pekerjaan')=='Dukun/Paranormal/Supranatural'){echo "selected";} ?>>Dukun/Paranormal/Supranatural</option>
    			<option <?php if($this->input->post('pekerjaan')=='Duta Besar'){echo "selected";} ?>>Duta Besar</option>
    			<option <?php if($this->input->post('pekerjaan')=='Gubernur'){echo "selected";} ?>>Gubernur</option>
    			<option <?php if($this->input->post('pekerjaan')=='Guru'){echo "selected";} ?>>Guru</option>
    			<option <?php if($this->input->post('pekerjaan')=='Ibu Rumah Tangga'){echo "selected";} ?>>Ibu Rumah Tangga</option>
    			<option <?php if($this->input->post('pekerjaan')=='Jasa Konsultasi'){echo "selected";} ?>>Jasa Konsultasi</option>
    			<option <?php if($this->input->post('pekerjaan')=='Jasa Pengobatan Alternatif'){echo "selected";} ?>>Jasa Pengobatan Alternatif</option>
    			<option <?php if($this->input->post('pekerjaan')=='Jasa Penyewaan Alat Pesta'){echo "selected";} ?>>Jasa Penyewaan Alat Pesta</option>
    			<option <?php if($this->input->post('pekerjaan')=='Juru Masak'){echo "selected";} ?>>Juru Masak</option>
    			<option <?php if($this->input->post('pekerjaan')=='Karyawan Honorer'){echo "selected";} ?>>Karyawan Honorer</option>
    			<option <?php if($this->input->post('pekerjaan')=='Karyawan Perusahaan Pemerintah'){echo "selected";} ?>>Karyawan Perusahaan Pemerintah</option>
    			<option <?php if($this->input->post('pekerjaan')=='Karyawan Swasta'){echo "selected";} ?>>Karyawan Swasta</option>
    			<option <?php if($this->input->post('pekerjaan')=='Kepala Daerah'){echo "selected";} ?>>Kepala Daerah</option>
    			<option <?php if($this->input->post('pekerjaan')=='Konsultan Manajemen dan Teknis'){echo "selected";} ?>>Konsultan Manajemen dan Teknis</option>
    			<option <?php if($this->input->post('pekerjaan')=='Kontraktor'){echo "selected";} ?>>Kontraktor</option>
    			<option <?php if($this->input->post('pekerjaan')=='Montir'){echo "selected";} ?>>Montir</option>
    			<option <?php if($this->input->post('pekerjaan')=='Nelayan'){echo "selected";} ?>>Nelayan</option>
    			<option <?php if($this->input->post('pekerjaan')=='Notaris'){echo "selected";} ?>>Notaris</option>
    			<option <?php if($this->input->post('pekerjaan')=='Pedagang barang kelontong'){echo "selected";} ?>>Pedagang barang kelontong</option>
    			<option <?php if($this->input->post('pekerjaan')=='Pedagang Keliling'){echo "selected";} ?>>Pedagang Keliling</option>
    			<option <?php if($this->input->post('pekerjaan')=='Pegawai Negeri Sipil'){echo "selected";} ?>>Pegawai Negeri Sipil</option>
    			<option <?php if($this->input->post('pekerjaan')=='Pelajar'){echo "selected";} ?>>Pelajar</option>
    			<option <?php if($this->input->post('pekerjaan')=='Pelaut'){echo "selected";} ?>>Pelaut</option>
    			<option <?php if($this->input->post('pekerjaan')=='Pembantu rumah tangga'){echo "selected";} ?>>Pembantu rumah tangga</option>
    			<option <?php if($this->input->post('pekerjaan')=='Pemilik perusahaan'){echo "selected";} ?>>Pemilik perusahaan</option>
    			<option <?php if($this->input->post('pekerjaan')=='Pemulung'){echo "selected";} ?>>Pemulung</option>
    			<option <?php if($this->input->post('pekerjaan')=='Pemuka Agama'){echo "selected";} ?>>Pemuka Agama</option>
    			<option <?php if($this->input->post('pekerjaan')=='Pemulung'){echo "selected";} ?>>Pemulung</option>
    			<option <?php if($this->input->post('pekerjaan')=='Pengacara'){echo "selected";} ?>>Pengacara</option>
    			<option <?php if($this->input->post('pekerjaan')=='Pengrajin'){echo "selected";} ?>>Pengrajin</option>
    			<option <?php if($this->input->post('pekerjaan')=='Pengrajin industri rumah tangga lainnya'){echo "selected";} ?>>Pengrajin industri rumah tangga lainnya</option>
    			<option <?php if($this->input->post('pekerjaan')=='Pengusaha kecil, menengah dan besar'){echo "selected";} ?>>Pengusaha kecil, menengah dan besar</option>
    			<option <?php if($this->input->post('pekerjaan')=='Penyiar radio'){echo "selected";} ?>>Penyiar radio</option>
    			<option <?php if($this->input->post('pekerjaan')=='Perangkat Desa'){echo "selected";} ?>>Perangkat Desa</option>
    			<option <?php if($this->input->post('pekerjaan')=='Perawat'){echo "selected";} ?>>Perawat</option>
    			<option <?php if($this->input->post('pekerjaan')=='Petani'){echo "selected";} ?>>Petani</option>
    			<option <?php if($this->input->post('pekerjaan')=='Peternak'){echo "selected";} ?>>Peternak</option>
    			<option <?php if($this->input->post('pekerjaan')=='Pilot'){echo "selected";} ?>>Pilot</option>
    			<option <?php if($this->input->post('pekerjaan')=='POLRI'){echo "selected";} ?>>POLRI</option>
    			<option <?php if($this->input->post('pekerjaan')=='Presiden'){echo "selected";} ?>>Presiden</option>
    			<option <?php if($this->input->post('pekerjaan')=='Pskiater/Psikolog'){echo "selected";} ?>>Pskiater/Psikolog</option>
    			<option <?php if($this->input->post('pekerjaan')=='Pensiunan'){echo "selected";} ?>>Pensiunan</option>
    			<option <?php if($this->input->post('pekerjaan')=='Satpam/Security'){echo "selected";} ?>>Satpam/Security</option>
    			<option <?php if($this->input->post('pekerjaan')=='Seniman/artis'){echo "selected";} ?>>Seniman/artis</option>
    			<option <?php if($this->input->post('pekerjaan')=='Sopir'){echo "selected";} ?>>Sopir</option>
    			<option <?php if($this->input->post('pekerjaan')=='Tidak Mempunyai Pekerjaan Tetap'){echo "selected";} ?>>Tidak Mempunyai Pekerjaan Tetap</option>
    			<option <?php if($this->input->post('pekerjaan')=='TNI'){echo "selected";} ?>>TNI</option>
    			<option <?php if($this->input->post('pekerjaan')=='Walikota'){echo "selected";} ?>>Walikota</option>
    			<option <?php if($this->input->post('pekerjaan')=='Wakil Walikota'){echo "selected";} ?>>Wakil Walikota</option>
    			<option <?php if($this->input->post('pekerjaan')=='Wakil bupati'){echo "selected";} ?>>Wakil bupati</option>
    			<option <?php if($this->input->post('pekerjaan')=='Wakil Gubernur'){echo "selected";} ?>>Wakil Gubernur</option>
    			<option <?php if($this->input->post('pekerjaan')=='Wakil Presiden'){echo "selected";} ?>>Wakil Presiden</option>
    			<option <?php if($this->input->post('pekerjaan')=='Wartawan'){echo "selected";} ?>>Wartawan</option>
    			<option <?php if($this->input->post('pekerjaan')=='Wiraswasta'){echo "selected";} ?>>Wiraswasta</option>
  			</select>
			<span class="text-danger"><?php echo form_error('pekerjaan');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="status" class="col-md-2 control-label"><span class="text-danger">*</span>Status Kawin</label>
		<div class="col-md-10">
			 <input type="radio" name="status" value="Kawin" <?php if($this->input->post('status')=='Kawin'){echo "checked";} ?>/>Kawin<br/>
             <input type="radio" name="status" value="Belum" <?php if($this->input->post('status')=='Belum'){echo "checked";} ?>/>Belum Kawin<br/>
			<span class="text-danger"><?php echo form_error('status');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="hubungan_keluarga" class="col-md-2 control-label"><span class="text-danger">*</span>Hubungan Keluarga</label>
		<div class="col-md-10">
			<select class="form-control" id="sel1" name="hubungan_keluarga">
    			<option <?php if($this->input->post('hubungan_keluarga')=='Kepala Keluarga'){echo "selected";} ?>>Kepala Keluarga</option>
    			<option <?php if($this->input->post('hubungan_keluarga')=='Istri'){echo "selected";} ?>>Istri</option>
    			<option <?php if($this->input->post('hubungan_keluarga')=='Suami'){echo "selected";} ?>>Suami</option>
    			<option <?php if($this->input->post('hubungan_keluarga')=='Anak Kandung'){echo "selected";} ?>>Anak Kandung</option>
    			<option <?php if($this->input->post('hubungan_keluarga')=='Adik'){echo "selected";} ?>>Adik</option>
    			<option <?php if($this->input->post('hubungan_keluarga')=='Kakak'){echo "selected";} ?>>Kakak</option>
    			<option <?php if($this->input->post('hubungan_keluarga')=='Ayah'){echo "selected";} ?>>Ayah</option>
    			<option <?php if($this->input->post('hubungan_keluarga')=='Ibu'){echo "selected";} ?>>Ibu</option>
    			<option <?php if($this->input->post('hubungan_keluarga')=='Mertua'){echo "selected";} ?>>Mertua</option>
    			<option <?php if($this->input->post('hubungan_keluarga')=='Menantu'){echo "selected";} ?>>Menantu</option>
    			<option <?php if($this->input->post('hubungan_keluarga')=='Famili Lain'){echo "selected";} ?>>Famili Lain</option>
  			</select>
			<span class="text-danger"><?php echo form_error('hubungan_keluarga');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="ket" class="col-md-2 control-label"><span class="text-danger">*</span>Keterangan</label>
		<div class="col-md-10">
			<input type="text" name="ket" value="<?php echo $this->input->post('ket'); ?>" class="form-control" id="ket" />
			<span class="text-danger"><?php echo form_error('ket');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="scan" class="col-md-2 control-label"><span class="text-danger">*</span>Scan</label>
		<div class="col-md-10">
			<input type="file" name="scan" value="" class="form-control" id="scan" required/>
			<span class="text-danger"><?php echo form_error('scan');?></span>
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-offset-11 col-sm-1">
			<button type="submit" class="btn btn-success">Save</button>
        </div>
	</div>
</div>
    </div>
</div>
<?php echo form_close(); ?>

				</section>
				<!-- right col -->
		</div>
		<!-- /.row (main row) -->

</section>
<!-- /.content -->