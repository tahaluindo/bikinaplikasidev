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
                                    class="breadcrumb-link">Penduduk</a>
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
                    <a href='<?php echo site_url('DataPenduduk?jenis_kelamin=Perempuan'); ?>' class="btn btn-primary btn-sm">Perempuan</a>
                    <a href='<?php echo site_url('DataPenduduk?jenis_kelamin=Laki - Laki'); ?>' class="btn btn-primary btn-sm">Laki - Laki</a>
                </div>

                <div class="card-body table-responsive">
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
                <div id="sparkline-1"></div>
            </div>
        </div>
    </div>
</div>

<script>
    var placeholder = 'Cari keterangan...'
</script>
