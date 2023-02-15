<div class="main-content" id="panel">
    <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav align-items-start  mr-auto ">
                    <li class="nav-item d-xl-none">
                        <div class="pr-3 sidenav-toggler sidenav-toggler-dark active" data-action="sidenav-pin"
                            data-target="#sidenav-main">
                            <div class="sidenav-toggler-inner">
                                <i class="sidenav-toggler-line"></i>
                                <i class="sidenav-toggler-line"></i>
                                <i class="sidenav-toggler-line"></i>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url(); ?>" data-action="search-show" data-target="#navbar-search-main">
                            <h1 class='text-white'>Data Kependudukan Kantor Desa Lubuk Terentang</h1>
                        </a>
                    </li>


                </ul>
                <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
                    <li class="nav-item dropdown">
                        <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <div class="media align-items-center">

                                <div class="media-body  ml-2  d-none d-lg-block">
                                <i class="fa fa-user fa-lg"></i>
                                    <span
                                        class="mb-0 text-sm  font-weight-bold"><?php echo ucwords($this->session->userdata('username')); ?></span>
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
                                <li class="breadcrumb-item active" aria-current="page">Data Penduduk Datang</li>
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
                        <?php echo form_open('DataPendudukDatang/add', array("class"=>"form-horizontal" , "enctype" => 'multipart/form-data')); ?>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="box box-info">
                                    <div class="box-header with-border">
                                        <?php echo $this->session->flashdata('msg'); ?>

                                        <h1 style='display: inline; margin-right: 10px;'>Data Penduduk Datang</h1>
                                        <?php if ($this->session->userdata('role')=='Bagian Pelayanan' OR $this->session->userdata('role')=='Admin'): ?>
                                        <a href='<?php echo site_url('DataPendudukDatang/add'); ?>'
                                            class="btn btn-primary btn-sm">Tambah</a>
                                        <?php endif; ?>
                                    </div>
                                    <div class="box-body table-responsive" style='margin-top: 10px;'>
                                        <table id="datatable" class="table table-striped table-bordered table-sm">
                                            <thead>
                                                <tr>
                                                    <th width=3>No.</th>
                                                    <th>NIK</th>
                                                    <th>Nama Lengkap</th>
                                                    <th>Tanggal</th>
                                                    <th>Desa Asal</th>
                                                    <th>Kecamatan Asal</th>
                                                    <th>Alamat Asal</th>
                                                    <th>Rt Asal</th>
                                                    <th>Rw Asal</th>
                                                    <th>Kode Pos Asal</th>
                                                    <th>No Telepon Asal</th>
                                                    <th>Kabupaten Asal</th>
                                                    <th>Provinsi Asal</th>
                                                    <th>Alasan</th>
                                                    <th>Dusun</th>
                                                    <th>Rt</th>
                                                    <th>J. Kelamin</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                  $no=1;
                                                  foreach($DataPendudukDatang as $t){ ?>
                                                <tr>
                                                    <th><?php echo $no++; ?>.</th>
                                                    <td><?php echo $t['nik']; ?></td>
                                                    <td><?php echo $t['nama_lengkap']; ?></td>
                                                    <td><?php echo $t['tanggal']; ?></td>
                                                    <td><?php echo $t['desa_asal']; ?></td>
                                                    <td><?php echo $t['kecamatan_asal']; ?></td>
                                                    <td><?php echo $t['alamat_asal']; ?></td>
                                                    <td><?php echo $t['rt_asal']; ?></td>
                                                    <td><?php echo $t['rw_asal']; ?></td>
                                                    <td><?php echo $t['kode_pos_asal']; ?></td>
                                                    <td><?php echo $t['no_telepon_asal']; ?></td>
                                                    <td><?php echo $t['kabupaten_asal']; ?></td>
                                                    <td><?php echo $t['provinsi_asal']; ?></td>
                                                    <td><?php echo $t['alasan']; ?></td>
                                                    <td><?php echo $t['dusun']; ?></td>
                                                    <td><?php echo $t['rt']; ?></td>
                                                    <td><?php echo $t['jenis_kelamin']; ?></td>
                                                    <td>
                                                        <a href="<?php echo site_url('DataPendudukDatang/edit/'.$t['nik']); ?>"
                                                            class="badge badge-info badge-xs"><span
                                                                class="fa fa-pencil"></span> Edit</a>
                                                        <a onclick='return confirm("Yakin akan menghapus data ini?")'
                                                            href="<?php echo site_url('DataPendudukDatang/remove/'.$t['nik']); ?>"
                                                            class="badge badge-danger badge-xs"><span
                                                                class="fa fa-trash"></span> Delete</a>
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