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
                                    class="breadcrumb-link">Domisili</a>
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
                    <a href='<?php echo site_url('DataPenduduk/add'); ?>' class="btn btn-primary btn-sm">Tambah</a>
                </div>

                <div class="card-body">
                    <table id="datatable" class="table table-striped table-bordered table-sm">
                    					<thead>
											<tr>
												<th width=3>No.</th>
												<th>Nama Penduduk</th>
												<th>NIK</th>
												<th>Jenis Kelamin</th>
												<th>Tempat Tanggal Lahir</th>
												<th>Agama</th>
												<th>Kependuduknegaraan</th>
												<th>Status</th>
												<th>Pekerjaan</th>
												<th>Pendidikan</th>
												<th>Alamat Asal</th>
												<th>Pindah Ke-</th>
												<th>Alasan Pindah</th>
												<th>Pengikut</th>
												<th>Tanggal Surat Dibuat</th>
												<th>Tanggal Surat Masuk</th>
												<th>Keterangan</th>
												<th>Scan</th>
												<th></th>
	                    					</tr>
                    					</thead>

                    					<tbody>
											<?php
											$no=1;
											foreach($domisili as $t){ ?>
	                   						<tr>
												<th><?php echo $no++; ?>.</th>
												<td><?php echo $t['nama_penduduk']; ?></td>
												<td><?php echo $t['nik']; ?></td>
												<td><?php echo $t['jenis_kelamin']; ?></td>
												<td><?php echo $t['tempat_lahir']; ?>, <?php echo $t['tanggal_lahir']; ?></td>
												<td><?php echo $t['agama']; ?></td>
												<td><?php echo $t['kependuduknegaraan']; ?></td>
												<td><?php echo $t['status']; ?></td>
												<td><?php echo $t['pekerjaan']; ?></td>
												<td><?php echo $t['pendidikan']; ?></td>
												<td><?php echo $t['alamat_asal']; ?></td>
												<td><?php echo $t['pindah_ke']; ?></td>
												<td><?php echo $t['alasan_pindah']; ?></td>
												<td><?php echo $t['pengikut']; ?></td>
												<td><?php echo $t['tgl_surat_dibuat']; ?></td>
												<td><?php echo $t['tgl_surat_masuk']; ?></td>
												<td><?php echo $t['keterangan']; ?></td>
												<td>
													<a href="<?php echo base_url("assets/uploads/$t[scan]"); ?>"><?php echo $t['scan']; ?></a>
												</td>
										    	<td>
													<a href="<?php echo site_url('domisili/edit/'.$t['nik']); ?>" class="badge badge-info badge-xs"><span class="fa fa-pencil"></span> Edit</a>
													<a onclick='return confirm("Yakin akan menghapus data ini?")' href="<?php echo site_url('domisili/remove/'.$t['nik']); ?>" class="badge badge-danger badge-xs"><span class="fa fa-trash"></span> Delete</a>
												</td>
											</tr>
											<?php } ?>
										</tbody>
									</table>
                </div>
                <div id="sparkline-1"></div>
            </div>
        </div>
    </div>
</div>

<script>
    var placeholder = 'Cari keterangan...'
</script>
