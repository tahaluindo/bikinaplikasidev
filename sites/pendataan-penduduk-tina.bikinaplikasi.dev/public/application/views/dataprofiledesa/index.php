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
                    <!-- <a href='<?php echo site_url('DataPenduduk/add'); ?>' class="btn btn-primary btn-sm">Tambah</a> -->
                </div>

                <div class="card-body">
                    <?php echo form_open('DataProfileDesa/add', array("class" => "form-horizontal", "enctype" => 'multipart/form-data')); ?>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="box box-info">
                                    <div class="box-header with-border">
                                        <?php echo $this->session->flashdata('msg'); ?>

                                        <h1 style='display: inline; margin-right: 10px;'>Data Profile Desa</h1>
                                    </div>
                                    <div class="box-body table-responsive" style='margin-top: 10px;'>
                                        <table id="" class="table table-striped table-bordered table-sm">
                                            <thead>
                                                <tr>
                                                    <th width=3>No.</th>
                                                    <th>Sejarah</th>
                                                    <th>Visi</th>
                                                    <th>Misi</th>
                                                    <th>Struktur Desa</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
													$no = 1;
													foreach ($DataProfileDesa as $t) {?>
                                                <tr>
                                                    <td><?php echo $no; ?></td>
                                                    <td><?php echo $t['sejarah']; ?></td>
                                                    <td><?php echo $t['visi']; ?></td>
                                                    <td><?php echo $t['misi']; ?></td>
                                                    <td>
                                                        <a href="<?php echo base_url("assets/uploads/$t[struktur_desa]"); ?>">Lihat</a>
                                                    </td>
                                                    <td>
                                                        <a href="<?php echo site_url('DataProfileDesa/edit/' . $t['id']); ?>"
                                                            class="badge badge-info badge-xs"><span
                                                                class="fa fa-pencil"></span> Edit</a>
                                                    </td>
                                                </tr>
                                                <?php $no++; }?>
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
