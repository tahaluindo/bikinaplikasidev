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
                                <li class="breadcrumb-item active" aria-current="page">Filter Laporan Penduduk</li>
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
                        <?php echo form_open('laporan/cetak/penduduk_lahir', array("class"=>"form-horizontal" , "enctype" => 'multipart/form-data')); ?>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="box box-info">
                                    <div class="box-header with-border">
                                        <?php echo $this->session->flashdata('msg'); ?>
                                        <h3><?php echo $title; ?></h3>
                                    </div>
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="keterangan" class="control-label"><span
                                                    class="text-danger">*</span>Tempat Kelahiran</label>
                                            <div class="col-md-10">

                                                <select name="tempat_kelahiran" class='form-control form-control-sm'>
                                                    <option value="">-- SEMUA --</option>
                                                    <?php foreach($tempat_kelahiran as $item): ?>
                                                    <option value="<?php echo $item->tempat_kelahiran; ?>"><?php echo $item->tempat_kelahiran; ?>
                                                    </option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="keterangan" class="control-label"><span
                                                    class="text-danger">*</span>Hari Kelahiran</label>
                                            <div class="col-md-10">

                                                <select name="hari_kelahiran" class='form-control form-control-sm'>
                                                    <option value="">-- SEMUA --</option>
                                                    <?php foreach($hari_kelahiran as $item): ?>
                                                    <option value="<?php echo $item->hari_kelahiran; ?>"><?php echo $item->hari_kelahiran; ?>
                                                    </option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="keterangan" class="control-label"><span
                                                    class="text-danger">*</span>Jenis Kelahiran</label>
                                            <div class="col-md-10">

                                                <select name="jenis_kelahiran" class='form-control form-control-sm'>
                                                    <option value="">-- SEMUA --</option>
                                                    <?php foreach($jenis_kelahiran as $item): ?>
                                                    <option value="<?php echo $item->jenis_kelahiran; ?>"><?php echo $item->jenis_kelahiran; ?>
                                                    </option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <div class="col-sm-offset-11 col-sm-1">
                                                <button type="submit" class="btn btn-success">Print</button>
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