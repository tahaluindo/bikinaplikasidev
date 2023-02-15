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
                            <li class="breadcrumb-item active"><a href="{{ url('') }}/#" class="breadcrumb-link">Edit
                                    KK</a>
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
                    <?php echo form_open('DataKK/edit/'.$DataKK['id'], array("enctype" => 'multipart/form-data')); ?>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="box box-info">
                                    <div class="box-header with-border">
                                        <?php echo $this->session->flashdata('msg'); ?>
                                        <h3>Input Data KK</h3>
                                    </div>
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="nik_kepala_keluarga" class="control-label"><span
                                                    class="text-danger">*</span>NIK Kepala Keluarga</label>
                                            <div class="col-md-10">
                                                <input type="number" name="nik_kepala_keluarga"
                                                    value="<?php echo $this->input->post('nik_kepala_keluarga') == "" ? $DataKK['nik_kepala_keluarga'] : $this->input->post('nik_kepala_keluarga'); ?>"
                                                    class="form-control form-control-sm" id="nik_kepala_keluarga" />
                                                <span
                                                    class="text-danger"><?php echo form_error('nik_kepala_keluarga');?></span>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="nik" class="control-label"><span
                                                    class="text-danger">*</span>NIK</label>
                                            <div class="col-md-10">
                                                <input type="number" name="nik"
                                                    value="<?php echo $this->input->post('nik') == "" ? $DataKK['nik'] : $this->input->post('nik'); ?>"
                                                    class="form-control form-control-sm" id="nik" />
                                                <span class="text-danger"><?php echo form_error('nik');?></span>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="hubungan_keluarga" class="control-label"><span
                                                    class="text-danger">*</span>Hubungan Keluarga</label>
                                            <div class="col-md-10">
                                                <select class="form-control form-control-sm" id="sel1"
                                                    name="hubungan_keluarga">
                                                    <option
                                                        <?php if($this->input->post('hubungan_keluarga')=='Istri' || $DataKK['hubungan_keluarga'] == 'Istri'){echo "selected";} ?>>
                                                        Istri</option>
                                                    <option
                                                        <?php if($this->input->post('hubungan_keluarga')=='Anak' || $DataKK['hubungan_keluarga'] == 'Anak'){echo "selected";} ?>>
                                                        Anak</option>
                                                    <option
                                                        <?php if($this->input->post('hubungan_keluarga')=='Kepala Keluarga' || $DataKK['hubungan_keluarga'] == 'Kepala Keluarga'){echo "selected";} ?>>
                                                        Kepala Keluarga</option>
                                                </select>
                                                <span
                                                    class="text-danger"><?php echo form_error('hubungan_keluarga');?></span>
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
                <div id="sparkline-1"></div>
            </div>
        </div>
    </div>
</div>