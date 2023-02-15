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
                                    Pneduduk Meninggal</a>
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
                                            
                                      </div>

                                        <div class="form-group">
                                            <label for="nik" class="control-label"><span
                                                    class="text-danger">*</span>NIK</label>
                                            <div class="col-md-10">
                                                <select class="form-control form-control-sm selectpicker" data-live-search="true"  name="nik" id='nik'>
                                                    <?php foreach($data_penduduk as $item): ?>
                                                    <option value="<?= $item->nik ?>"><?= "$item->nama_lengkap ({$item->nik})" ?></option>
                                                    <?php endforeach ?>
                                                </select>

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
<!-- 
                                        <div class="form-group">
                                            <label for="surat_keterangan_meninggal" class="control-label"><span
                                                    class="text-danger">*</span>Surat Keterangan Meninggal</label>
                                            <div class="col-md-10">
                                                <input type="file" name="surat_keterangan_meninggal" class="form-control form-control-sm" />
                                                <span class="text-danger"><?php echo form_error('surat_keterangan_meninggal');?></span>
                                            </div>
                                        </div> -->

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
