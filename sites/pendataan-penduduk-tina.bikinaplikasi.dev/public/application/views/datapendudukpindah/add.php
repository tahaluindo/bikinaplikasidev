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
                                    Penduduk Pindah</a>
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
                    <?php echo form_open('DataPendudukPindah/add', array("class"=>"form-horizontal" , "enctype" => 'multipart/form-data')); ?>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="box box-info">
                                    <div class="box-header with-border">
                                        <?php echo $this->session->flashdata('msg'); ?>

                                        <h3>Input Data Penduduk Pindah</h3>
                                    </div>
                                    <div class="box-body">
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
                                            <label for="alasan_pindah" class="control-label"><span
                                                    class="text-danger">*</span>Alasan Pindah</label>
                                            <div class="col-md-10">
                                                <input type="text" name="alasan_pindah"
                                                    value="<?php echo $this->input->post('alasan_pindah'); ?>"
                                                    class="form-control form-control-sm" id="alasan_pindah" />
                                                <span class="text-danger"><?php echo form_error('alasan_pindah');?></span>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="alamat_tujuan_pindah" class="control-label"><span
                                                    class="text-danger">*</span>Alamat Tujuan Pindah</label>
                                            <div class="col-md-10">
                                                <input type="text" name="alamat_tujuan_pindah"
                                                    value="<?php echo $this->input->post('alamat_tujuan_pindah'); ?>"
                                                    class="form-control form-control-sm" id="alamat_tujuan_pindah" />
                                                <span class="text-danger"><?php echo form_error('alamat_tujuan_pindah');?></span>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="rt_tujuan_pindah" class="control-label"><span
                                                    class="text-danger">*</span>Rt Tujuan Pindah</label>
                                            <div class="col-md-10">
                                                <input type="text" name="rt_tujuan_pindah"
                                                    value="<?php echo $this->input->post('rt_tujuan_pindah'); ?>"
                                                    class="form-control form-control-sm" id="rt_tujuan_pindah" />
                                                <span class="text-danger"><?php echo form_error('rt_tujuan_pindah');?></span>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="rw_tujuan_pindah" class="control-label"><span
                                                    class="text-danger">*</span>Rw Tujuan Pindah</label>
                                            <div class="col-md-10">
                                                <input type="text" name="rw_tujuan_pindah"
                                                    value="<?php echo $this->input->post('rw_tujuan_pindah'); ?>"
                                                    class="form-control form-control-sm" id="rw_tujuan_pindah" />
                                                <span class="text-danger"><?php echo form_error('rw_tujuan_pindah');?></span>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="desa_tujuan_pindah" class="control-label"><span
                                                    class="text-danger">*</span>Desa Tujuan Pindah</label>
                                            <div class="col-md-10">
                                                <input type="text" name="desa_tujuan_pindah"
                                                    value="<?php echo $this->input->post('desa_tujuan_pindah'); ?>"
                                                    class="form-control form-control-sm" id="desa_tujuan_pindah" />
                                                <span class="text-danger"><?php echo form_error('desa_tujuan_pindah');?></span>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="kode_pos_tujuan_pindah" class="control-label"><span
                                                    class="text-danger">*</span>Kode Pos Tujuan Pindah</label>
                                            <div class="col-md-10">
                                                <input type="text" name="kode_pos_tujuan_pindah"
                                                    value="<?php echo $this->input->post('kode_pos_tujuan_pindah'); ?>"
                                                    class="form-control form-control-sm" id="kode_pos_tujuan_pindah" />
                                                <span class="text-danger"><?php echo form_error('kode_pos_tujuan_pindah');?></span>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="no_telepon_tujuan_pindah" class="control-label"><span
                                                    class="text-danger">*</span>No Telepon Tujuan Pindah</label>
                                            <div class="col-md-10">
                                                <input type="text" name="no_telepon_tujuan_pindah"
                                                    value="<?php echo $this->input->post('no_telepon_tujuan_pindah'); ?>"
                                                    class="form-control form-control-sm" id="no_telepon_tujuan_pindah" />
                                                <span class="text-danger"><?php echo form_error('no_telepon_tujuan_pindah');?></span>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="kecamatan_tujuan_pindah" class="control-label"><span
                                                    class="text-danger">*</span>Kecamatan Tujuan Pindah</label>
                                            <div class="col-md-10">
                                                <input type="text" name="kecamatan_tujuan_pindah"
                                                    value="<?php echo $this->input->post('kecamatan_tujuan_pindah'); ?>"
                                                    class="form-control form-control-sm" id="kecamatan_tujuan_pindah" />
                                                <span class="text-danger"><?php echo form_error('kecamatan_tujuan_pindah');?></span>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="kabupaten_tujuan_pindah" class="control-label"><span
                                                    class="text-danger">*</span>Kabupaten Tujuan Pindah</label>
                                            <div class="col-md-10">
                                                <input type="text" name="kabupaten_tujuan_pindah"
                                                    value="<?php echo $this->input->post('kabupaten_tujuan_pindah'); ?>"
                                                    class="form-control form-control-sm" id="kabupaten_tujuan_pindah" />
                                                <span class="text-danger"><?php echo form_error('kabupaten_tujuan_pindah');?></span>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="provinsi_tujuan_pindah" class="control-label"><span
                                                    class="text-danger">*</span>Provinsi Tujuan Pindah</label>
                                            <div class="col-md-10">
                                                <input type="text" name="provinsi_tujuan_pindah"
                                                    value="<?php echo $this->input->post('provinsi_tujuan_pindah'); ?>"
                                                    class="form-control form-control-sm" id="provinsi_tujuan_pindah" />
                                                <span class="text-danger"><?php echo form_error('provinsi_tujuan_pindah');?></span>
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
                <div id="sparkline-1"></div>
            </div>
        </div>
    </div>
</div>