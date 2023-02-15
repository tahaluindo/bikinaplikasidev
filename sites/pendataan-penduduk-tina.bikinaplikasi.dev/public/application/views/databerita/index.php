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
                                        class="breadcrumb-link">Berita</a>
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
                        <a href='<?php echo site_url('DataBerita/add'); ?>'
                                            class="btn btn-primary btn-sm">Tambah</a>
                    </div>

                    <div class="card-body">
                        <table id="datatable" class="table table-striped table-bordered table-sm">
                            <thead>
                                <tr>
                                    <th width=3>No.</th>
                                    <th>Foto</th>
                                    <th>Judul</th>
                                    <th>Keterangan</th>
                                    <th>Dibuat</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $no = 1;
                                    foreach ($DataBerita as $t) {?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td>
                                        <a href="<?php echo base_url("assets/uploads/$t[foto]"); ?>"><?php echo $t['foto']; ?></a>
                                    </td>
                                    <td>
                                        <a href="<?php echo base_url("Auth/Berita/$t[id]"); ?>">
                                            <?php echo $t['judul']; ?>
                                        </a>
                                    </td>
                                    <td><?php echo substr($t['keterangan'], 0, 100); ?>...</td>
                                    <td>
                                        <?php echo $t['created_at']; ?>
                                    </td>
                                    <td>
                                        <a href="<?php echo site_url('DataBerita/edit/' . $t['id']); ?>"
                                            class="badge badge-info badge-xs"><span
                                                class="fa fa-pencil"></span> Edit</a>

                                        <a onclick='return confirm("Yakin akan menghapus data ini?")'
                                    href="<?php echo site_url('DataBerita/remove/' . $t['id']); ?>"
                                    class="badge badge-danger badge-xs"><span
                                        class="fa fa-trash"></span> Delete</a>
                                    </td>
                                </tr>
                                <?php $no++; }?>
                            </tbody>
                        </table>
                    </div>
                    <div id="sparkline-1"></div>
                </div>
            </div>
        </div>
    </div>
