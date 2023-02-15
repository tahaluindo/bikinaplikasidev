<div class="container-fluid  dashboard-content">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <h3 class="mb-2">Kependudukan</h3>
                <p class="pageheader-text">Lorem ipsum dolor sit ametllam fermentum ipsum eu porta
                    consectetur adipiscing
                    elit.Nullam vehicula nulla ut egestas rhoncus.</p>
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active"><a href="<?= base_url(); ?>#"
                                    class="breadcrumb-link">Penduduk Meninggal</a>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-header">
                    <?php if ($this->session->userdata('role')=='Bagian Pelayanan' OR $this->session->userdata('role')=='Admin'): ?>
                    <a href='<?php echo site_url('DataPendudukMeninggal/add'); ?>'
                        class="btn btn-primary btn-sm">Tambah</a>
                    <?php endif; ?>
                </div>

                <div class="card-body">
                    <?php echo form_open('DataPendudukMeninggal/add', array("class"=>"form-horizontal" , "enctype" => 'multipart/form-data')); ?>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="box box-info">
                                    <div class="box-header with-border">
                                        <?php echo $this->session->flashdata('msg'); ?>

                                        <h1 style='display: inline; margin-right: 10px;'>Data Penduduk Meninggal</h1>
                                        
                                    </div>
                                    <div class="box-body table-responsive" style='margin-top: 10px;'>
                                        <table id="datatable" class="table table-striped table-bordered table-sm">
											<thead>
												<tr>
													<th width=3>No.</th>
													<th>NIK</th>
													<th>Nama Lengkap</th>
													<th>Tanggal Meninggal</th>
													<th>Tempat Meninggal</th>
													<th>Penyebab Meninggal</th>
													<th>Jam Meninggal</th>
													<!-- <th>Surat Keterangan Meninggal</th> -->
													<th></th>
												</tr>
											</thead>
											<tbody>
											<?php
												$no=1;
												foreach($DataPendudukMeninggal as $t){ ?>
												<tr>
													<th><?php echo $no++; ?>.</th>
													<td><?php echo $t['nik']; ?></td>
													<td><?php echo $t['nama_lengkap']; ?></td>
													<td><?php echo $t['tanggal_meninggal']; ?></td>
													<td><?php echo $t['tempat_meninggal']; ?></td>
													<td><?php echo $t['penyebab_meninggal']; ?></td>
													<td><?php echo $t['jam_meninggal_dunia']; ?></td>
													<!-- <td>
														<a href="<?php echo base_url("assets/uploads/$t[surat_keterangan_meninggal]"); ?>" download><?php echo $t['surat_keterangan_meninggal']; ?></a>
													</td> -->
													<td>
														<a href="<?php echo site_url('DataPendudukMeninggal/edit/'.$t['nik']); ?>" class="badge badge-info badge-xs"><span class="fa fa-pencil"></span> Edit</a>
														<a onclick='return confirm("Yakin akan menghapus data ini?")' href="<?php echo site_url('DataPendudukMeninggal/remove/'.$t['nik']); ?>" class="badge badge-danger badge-xs"><span class="fa fa-trash"></span> Delete</a>
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
                <div id="sparkline-1"></div>
            </div>
        </div>
    </div>
</div>

<script>
    var placeholder = 'Cari keterangan...'
</script>
