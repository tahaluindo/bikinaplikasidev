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
            <div class="col-lg-6 col-7">
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item active" aria-current="page">Data Domisili</li>
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
						<div class="row">
							<div class="col-md-12">
								<div class="box box-info">
									<div class="box-header with-border">
										<?php echo $this->session->flashdata('msg'); ?>

										<h3>Laporan</h3>
									</div>
									<div class="box-body table-responsive">
									<table id="datatable" class="table table-striped table-bordered table-sm">
										<thead>
											<tr>
												<th>Data Penduduk</th>
												<th>Keterangan</th>
												<?php if ($this->session->userdata('role')=='Bagian Pelayanan' OR $this->session->userdata('role')=='Admin'): ?>
												<th width="100">Aksi</th>
												<?php endif; ?>
											</tr>
										</thead>
                    					<tbody>
											<?php foreach($laporan as $t){ ?>
												<tr>
													<td>
														<a href="<?php echo site_url('assets/uploads/'.$t['data_penduduk']); ?>" class="badge badge-info badge-xs"><span class="fa fa-pencil"></span> Unduh File </a><?php echo $t['data_penduduk']; ?>
													</td>

													<td><?php echo $t['keterangan']; ?></td>
													
													<?php if ($this->session->userdata('role')=='Bagian Pelayanan' OR $this->session->userdata('role')=='Admin'): ?>
													<td align="center">
													<?php if ($this->session->userdata('role')=='Bagian Pelayanan' OR $this->session->userdata('role')=='Admin'){ ?>
													<a href="<?php echo site_url('laporan/edit/'.$t['id_laporan']); ?>" class="badge badge-info badge-xs"><span class="fa fa-pencil"></span> Edit</a>
													<a  onclick='return confirm("Yakin akan menghapus data ini?")' href="<?php echo site_url('laporan/remove/'.$t['id_laporan']); ?>" class="badge badge-danger badge-xs"><span class="fa fa-trash"></span> Delete</a>
													<?php } elseif ($this->session->userdata('role')=='sekdes'){ if ($t['status']=='ACC') {?>
														<a href="<?php echo site_url('laporan/cek/'.$t['id_laporan']); ?>" class="badge badge-danger badge-xs"><span class="fa fa-close"></span> BATAL</a>
													<?php } else { ?>
														<a href="<?php echo site_url('laporan/cek/'.$t['id_laporan']); ?>" class="badge badge-success badge-xs"><span class="fa fa-check"></span> ACC?</a>
														<?php 	} } ?>
													</td>
													<?php endif; ?>
												</tr>
											<?php } ?>
											</tbody>
										</table>
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
