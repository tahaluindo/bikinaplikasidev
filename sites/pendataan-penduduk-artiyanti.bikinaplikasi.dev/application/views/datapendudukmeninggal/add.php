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
                    <div class="col-lg-6 col-7">
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item active" aria-current="page">Tambah Data Penduduk Meninggal
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class='card-body'>
                        <?php echo form_open('DataPendudukMeninggal/add', array("class"=>"form-horizontal" , "enctype" => 'multipart/form-data')); ?>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="box box-info">
                                    <div class="box-header with-border">
                                        <?php echo $this->session->flashdata('msg'); ?>

                                        <h3>Input Data Penduduk Meninggal</h3>
                                    </div>
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="nik" class="control-label"><span
                                                    class="text-danger">*</span>NIK</label>
                                            <div class="col-md-10">
                                                <input type="text" name="nik"
                                                    value="<?php echo $this->input->post('nik'); ?>"
                                                    class="form-control form-control-sm" id="nik" />
                                                <span class="text-danger"><?php echo form_error('nik');?></span>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="tanggal_meninggal" class="control-label"><span
                                                    class="text-danger">*</span>Tanggal Meninggal</label>
                                            <div class="col-md-10">
                                                <input type="date" name="tanggal_meninggal"
                                                    value="<?php echo $this->input->post('tanggal_meninggal'); ?>"
                                                    class="form-control form-control-sm" id="tanggal_meninggal" />
                                                <span
                                                    class="text-danger"><?php echo form_error('tanggal_meninggal');?></span>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="tempat_meninggal" class="control-label"><span
                                                    class="text-danger">*</span>Tempat Meninggal</label>
                                            <div class="col-md-10">
                                                <input type="text" name="tempat_meninggal"
                                                    value="<?php echo $this->input->post('tempat_meninggal'); ?>"
                                                    class="form-control form-control-sm" id="tempat_meninggal" />
                                                <span
                                                    class="text-danger"><?php echo form_error('tempat_meninggal');?></span>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="penyebab_meninggal" class="control-label"><span
                                                    class="text-danger">*</span>Penyebab Meninggal</label>
                                            <div class="col-md-10">
                                                <input type="text" name="penyebab_meninggal"
                                                    value="<?php echo $this->input->post('penyebab_meninggal'); ?>"
                                                    class="form-control form-control-sm" id="penyebab_meninggal" />
                                                <span
                                                    class="text-danger"><?php echo form_error('penyebab_meninggal');?></span>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="jam_meninggal_dunia" class="control-label"><span
                                                    class="text-danger">*</span>Jam Meninggal Dunia</label>
                                            <div class="col-md-10">
                                                <input type="text" name="jam_meninggal_dunia"
                                                    value="<?php echo $this->input->post('jam_meninggal_dunia'); ?>"
                                                    class="form-control form-control-sm" id="jam_meninggal_dunia" />
                                                <span
                                                    class="text-danger"><?php echo form_error('jam_meninggal_dunia');?></span>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="surat_keterangan_meninggal" class="control-label"><span
                                                    class="text-danger">*</span>Surat Keterangan Meninggal</label>
                                            <div class="col-md-10">
                                                <input type="file" name="surat_keterangan_meninggal" class="form-control form-control-sm" />
                                                <span class="text-danger"><?php echo form_error('surat_keterangan_meninggal');?></span>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-sm-offset-11 col-sm-1">
                                                <button type="submit" class="btn btn-success">Save</button>
                                            </div>
                                        </div>
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