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
                                    class="breadcrumb-link">Data User</a>
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
                    <?php if ($this->session->userdata('role') == 'Bagian Pelayanan' or $this->session->userdata('role') == 'Admin'): ?>
                                        <a href='<?php echo site_url('DataUser/add'); ?>'
                                            class="btn btn-primary btn-sm">Tambah</a>
                                        <?php endif;?>
                </div>

                <div class="card-body">
                    <?php echo form_open('DataUser/add', array("class" => "form-horizontal", "enctype" => 'multipart/form-data')); ?>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="box box-info">
                                    <div class="box-header with-border">
                                        <?php echo $this->session->flashdata('msg'); ?>

                                        <h1 style='display: inline; margin-right: 10px;'>Data User</h1>
                                        
                                    </div>
                                    <div class="box-body table-responsive" style='margin-top: 10px;'>
                                        <table id="datatable" class="table table-striped table-bordered table-sm">
                                            <thead>
                                                <tr>
                                                    <th width=3>No.</th>
                                                    <th>Username</th>
                                                    <?php if($this->session->userdata('username')=='admin'): ?>
                                                    <th></th>
                                                    <?php endif; ?>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
													$no = 1;
													foreach ($DataUser as $t)  {?>
                                                <tr>
                                                    <td><?php echo $no; ?></td>
                                                    <td><?php echo $t['username']; ?></td>
                                                    <?php if($this->session->userdata('username')=='admin'): ?>
                                                        <td>
                                                        <?php if($t['username'] != "admin"): ?>
                                                            <a href="<?php echo site_url('DataUser/edit/' . $t['username']); ?>"
                                                                class="badge badge-info badge-xs"><span
                                                                    class="fa fa-pencil"></span> Edit</a>
                                                            <a onclick='return confirm("Yakin akan menghapus data ini?")'
                                                                href="<?php echo site_url('DataUser/remove/' . $t['username']); ?>"
                                                                class="badge badge-danger badge-xs"><span
                                                                    class="fa fa-trash"></span> Delete</a>
                                                        <?php endif; ?>
                                                        </td>
                                                    <?php endif; ?>
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
