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
                            <li class="breadcrumb-item active"><a href="{{ url('') }}/#" class="breadcrumb-link">Tambah
                                    Rt</a>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
            <div class="card">
                <div class="card-body">
                    <?php echo form_open('DataRt/add', array("class"=>"form-horizontal" , "enctype" => 'multipart/form-data')); ?>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="box box-info">
                                    <div class="box-header with-border">
                                        <?php echo $this->session->flashdata('msg'); ?>
                                        <h3>Input Data Rt</h3>
                                    </div>
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="nama_rt" class="control-label"><span
                                                    class="text-danger">*</span>Nama Rt</label>
                                            <div class="col-md-10">
                                                <input type="text" name="nama_rt"
                                                    value="<?php echo $this->input->post('nama_rt'); ?>"
                                                    class="form-control form-control-sm" id="nama_rt" />
                                                <span class="text-danger"><?php echo form_error('nama_rt');?></span>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="ketua_rt" class="control-label"><span
                                                    class="text-danger">*</span>Ketua Rt</label>
                                            <div class="col-md-10">
                                                <input type="text" name="ketua_rt"
                                                    value="<?php echo $this->input->post('ketua_rt'); ?>"
                                                    class="form-control form-control-sm" id="ketua_rt" />
                                                <span class="text-danger"><?php echo form_error('ketua_rt');?></span>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="dusun" class="control-label"><span
                                                    class="text-danger">*</span>Dusun</label>
                                            <div class="col-md-10">
                                                <input type="text" name="dusun"
                                                    value="<?php echo $this->input->post('dusun'); ?>"
                                                    class="form-control form-control-sm" id="dusun" />
                                                <span class="text-danger"><?php echo form_error('dusun');?></span>
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
                <div id="sparkline-1"></div>
            </div>
        </div>
    </div>
</div>
