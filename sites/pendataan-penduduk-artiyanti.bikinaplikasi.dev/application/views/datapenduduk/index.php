<div class="main-content" id="panel">
	<nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav align-items-start  mr-auto ">
            <li class="nav-item d-xl-none">
              <div class="pr-3 sidenav-toggler sidenav-toggler-dark active" data-action="sidenav-pin" data-target="#sidenav-main">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </div>
            </li>
            <li class="nav-item d-sm-none">
              <a class="nav-link" href="#" data-action="search-show" data-target="#navbar-search-main">
                <i class="ni ni-zoom-split-in"></i>
              </a>
            </li>


          </ul>
          <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
            <li class="nav-item dropdown">
              <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="media align-items-center">

                  <div class="media-body  ml-2  d-none d-lg-block">
                                <i class="fa fa-user fa-lg"></i>
                    <span class="mb-0 text-sm  font-weight-bold"><?php echo ucwords($this->session->userdata('username')); ?></span>
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
            <div class="col-lg-6 col-6">
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item active" aria-current="page">Data Penduduk</li>
                </ol>
              </nav>
            </div>

          </div>
        </div>
      </div>
    </div>

    <div class="container-fluid mt--6">
      	<div class="row">
        	<div class="col-12">
          		<div class="card">
					<div class='card-body'>
						<?php echo form_open('DataPenduduk/add', array("class"=>"form-horizontal" , "enctype" => 'multipart/form-data')); ?>
						<div class="row">
							<div class="col-md-12">
								<div class="box box-info">
									<div class="box-header with-border">
										<?php echo $this->session->flashdata('msg'); ?>

										<h1 style='display: inline; margin-right: 10px;'>Data Penduduk</h1>
										<?php if ($this->session->userdata('role')=='Bagian Pelayanan' OR $this->session->userdata('role')=='Admin'): ?>
										<a href='<?php echo site_url('DataPenduduk/add'); ?>' class="btn btn-primary btn-sm">Tambah</a>
										<?php endif; ?>
									</div>
									<div class="box-body table-responsive" style='margin-top: 10px;'>
										<table id="datatable" class="table table-striped table-bordered table-sm">
											<thead>
												<tr>
													<th width=3>No.</th>
													<th>NIK</th>
													<th>No KK</th>
													<th>Nama Lengkap</th>
													<th>Alamat</th>
													<th>RT</th>
													<th>RW</th>
													<th>Jenis Kelamin</th>
													<th>Tempat Tanggal Lahir</th>
													<th>No Telp</th>
													<th>Agama</th>
													<th>Pendidikan</th>
													<th>Pekerjaan</th>
													<th>Dusun</th>
													<th>Lurah</th>
													<th>Kecamatan</th>
													<th>Kabupaten</th>
													<th>Provinsi</th>
													<th>Negara</th>
													<th>Status</th>
													<th>Hubungan Keluarga</th>
													<!-- <th>Keterangan</th>
													<th>Scan</th> -->
													<th>G. Darah</th>
													<th>Desa</th>
													<th></th>
												</tr>
											</thead>
											<tbody>
											<?php
												$no=1;
												foreach($DataPenduduk as $t){ ?>
												<tr>
													<th><?php echo $no++; ?>.</th>
													<td><?php echo $t['nik']; ?></td>
													<td><?php echo $t['no_kk']; ?></td>
													<td><?php echo $t['nama_lengkap']; ?></td>
													<td><?php echo $t['alamat']; ?></td>
													<td><?php echo $t['rt']; ?></td>
													<td><?php echo $t['rw']; ?></td>
													<td><?php echo $t['jenis_kelamin']; ?></td>
													<td><?php echo $t['tempat_lahir']; ?>, <?php echo $t['tanggal_lahir']; ?></td>
													<td><?php echo $t['no_telp']; ?></td>
													<td><?php echo $t['agama']; ?></td>
													<td><?php echo $t['pendidikan']; ?></td>
													<td><?php echo $t['pekerjaan']; ?></td>
													<td><?php echo $t['dusun']; ?></td>
													<td><?php echo $t['lurah']; ?></td>
													<td><?php echo $t['kecamatan']; ?></td>
													<td><?php echo $t['kabupaten']; ?></td>
													<td><?php echo $t['provinsi']; ?></td>
													<td><?php echo $t['negara']; ?></td>
													<td><?php echo $t['status']; ?></td>
													<td><?php echo $t['hubungan_keluarga']; ?></td>
													<!-- <td><?php echo $t['ket']; ?></td> -->
													<!-- <td>
														<a href="<?php echo base_url("assets/uploads/$t[scan]"); ?>"><?php echo $t['scan']; ?></a>
													</td> -->
													<td><?php echo $t['golongan_darah']; ?></td>
													<td><?php echo $t['desa']; ?></td>
													<td>
														<a href="<?php echo site_url('DataPenduduk/edit/'.$t['nik']); ?>" class="badge badge-info badge-xs"><span class="fa fa-pencil"></span> Edit</a>
														<a  onclick='return confirm("Yakin akan menghapus data ini?")' href="<?php echo site_url('DataPenduduk/remove/'.$t['nik']); ?>" class="badge badge-danger badge-xs"><span class="fa fa-trash"></span> Delete</a>
													</td>
												</tr>
												<?php } ?>
												
											<?php
												foreach($DataPendudukLahir ?? [] as $t){ ?>
												<tr>
													<th><?php echo $no++; ?>.</th>
													<td><?php echo ''; ?></td>
													<td><?php echo $t['no_kk']; ?></td>
													<td><?php echo $t['nama_lengkap']; ?></td>
													<td><?php echo ''; ?></td>
													<td><?php echo ''; ?></td>
													<td><?php echo ''; ?></td>
													<td><?php echo ''; ?></td>
													<td><?php echo '' ?></td>
													<td><?php echo '' ?></td>
													<td><?php echo '' ?></td>
													<td><?php echo '' ?></td>
													<td><?php echo '' ?></td>
													<td><?php echo $t['dusun']; ?></td>
													<td><?php echo ''; ?></td>
													<td><?php echo ''; ?></td>
													<td><?php echo ''; ?></td>
													<td><?php echo ''; ?></td>
													<td><?php echo ''; ?></td>
													<td><?php echo 'Belum Kawin'; ?></td>
													<td><?php echo 'Anak Kandung'; ?></td>
													<!-- <td><?php echo $t['ket']; ?></td> -->
													<!-- <td>
														<a href="<?php echo base_url("assets/uploads/$t[scan]"); ?>"><?php echo $t['scan']; ?></a>
													</td> -->
													<td><?php echo ''; ?></td>
													<td><?php echo ''; ?></td>
													<td>
														<a href="<?php echo site_url('DataPendudukLahir/tambahkan/'.$t['id']); ?>" class="badge badge-primary badge-xs"><span class="fa fa-pencil"></span> Tambahkan</a>
														<a href="<?php echo site_url('DataPendudukLahir/edit/'.$t['id']); ?>" class="badge badge-info badge-xs"><span class="fa fa-pencil"></span> Edit</a>
														<a  onclick='return confirm("Yakin akan menghapus data ini?")' href="<?php echo site_url('DataPendudukLahir/remove/'.$t['id']); ?>" class="badge badge-danger badge-xs"><span class="fa fa-trash"></span> Delete</a>
													</td>
												</tr>
												<?php } ?>
											</tbody>
										</table>
									</div>
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

<script>
    var placeholder = 'Cari Nik...'
</script>