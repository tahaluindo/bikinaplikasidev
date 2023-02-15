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
                                    class="breadcrumb-link">Penduduk Pindah</a>
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
                    <a href='<?php echo site_url('DataPendudukPindah/add'); ?>' class="btn btn-primary btn-sm">Tambah</a>
                </div>

                <div class="card-body">
                    <table id="datatable" class="table table-striped table-bordered table-sm">
                        <thead>
                            <tr>
                                <th width=3>No.</th>
                                <th>NIK</th>
                                <th>Nama Lengkap</th>
                                <th>Alasan Pindah</th>
                                <th>Alamat Tujuan Pindah</th>
                                <th>Rt Tujuan Pindah</th>
                                <th>Rw Tujuan Pindah</th>
                                <th>Desa Tujuan Pindah</th>
                                <th>Kode Pos Tujuan Pindah</th>
                                <th>No Telepon Tujuan Pindah</th>
                                <th>Kecamatan Tujuan Pindah</th>
                                <th>Kabupaten Tujuan Pindah</th>
                                <th>Provinsi Tujuan Pindah</th>
                                <th>Tanggal Pindah</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $no=1;
                                foreach($DataPendudukPindah as $t){ ?>
                            <tr>
                                <th><?php echo $no++; ?>.</th>
                                <td><?php echo $t['nik']; ?></td>
                                <td><?php echo $t['nama_lengkap']; ?></td>
                                <td><?php echo $t['alasan_pindah']; ?></td>
                                <td><?php echo $t['alamat_tujuan_pindah']; ?></td>
                                <td><?php echo $t['rt_tujuan_pindah']; ?></td>
                                <td><?php echo $t['rw_tujuan_pindah']; ?></td>
                                <td><?php echo $t['desa_tujuan_pindah']; ?></td>
                                <td><?php echo $t['kode_pos_tujuan_pindah']; ?></td>
                                <td><?php echo $t['no_telepon_tujuan_pindah']; ?></td>
                                <td><?php echo $t['kecamatan_tujuan_pindah']; ?></td>
                                <td><?php echo $t['kabupaten_tujuan_pindah']; ?></td>
                                <td><?php echo $t['provinsi_tujuan_pindah']; ?></td>
                                <td><?php echo $t['created_at']; ?></td>
                                <td>
                                    <a href="<?php echo site_url('DataPendudukPindah/edit/'.$t['nik']); ?>"
                                        class="badge badge-info badge-xs"><span
                                            class="fa fa-pencil"></span> Edit</a>
                                    <a onclick='return confirm("Yakin akan menghapus data ini?")'
                                        href="<?php echo site_url('DataPendudukPindah/remove/'.$t['nik']); ?>"
                                        class="badge badge-danger badge-xs"><span
                                            class="fa fa-trash"></span> Delete</a>
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
