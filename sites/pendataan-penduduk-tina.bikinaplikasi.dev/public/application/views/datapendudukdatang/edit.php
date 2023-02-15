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
                                    Penduduk Datang</a>
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
                    <?php echo form_open('DataPendudukDatang/edit/' . $DataPendudukDatang['nik'], array("class"=>"form-horizontal" , "enctype" => 'multipart/form-data')); ?>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="box box-info">
                                    <div class="box-header with-border">
                                        <?php echo $this->session->flashdata('msg'); ?>

                                        <h3>Input Data Penduduk Datang</h3>
                                    </div>
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="nik" class="control-label"><span
                                                    class="text-danger">*</span>NIK</label>
                                            <div class="col-md-10">
                                                <select class="form-control form-control-sm selectpicker" data-live-search="true"  name="nik" id='nik'>

                                                    <?php foreach($data_penduduk as $item): ?>
                                                    <option value="<?= $item->nik ?>" <?= $DataPendudukDatang['nik'] == $item->nik ? "selected" : "" ?>><?= "$item->nama_lengkap ({$item->nik})" ?></option>
                                                    <?php endforeach ?>
                                                </select>
                                                <span class="text-danger"><?php echo form_error('nik');?></span>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="tanggal" class="control-label"><span
                                                    class="text-danger">*</span>Tanggal</label>
                                            <div class="col-md-10">
                                                <input type="date" name="tanggal"
                                                    value="<?php echo $this->input->post('tanggal') == "" ? $DataPendudukDatang['tanggal'] : $this->input->post('tanggal'); ?>"
                                                    class="form-control form-control-sm" id="tanggal" />
                                                <span class="text-danger"><?php echo form_error('tanggal');?></span>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="desa_asal" class="control-label"><span
                                                    class="text-danger">*</span>Desa Asal</label>
                                            <div class="col-md-10">
                                                <input type="text" name="desa_asal"
                                                    value="<?php echo $this->input->post('desa_asal') == "" ? $DataPendudukDatang['desa_asal'] : $this->input->post('desa_asal'); ?>"
                                                    class="form-control form-control-sm" id="desa_asal" />
                                                <span class="text-danger"><?php echo form_error('desa_asal');?></span>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="kecamatan_asal" class="control-label"><span
                                                    class="text-danger">*</span>Kecamatan Asal</label>
                                            <div class="col-md-10">
                                                <input type="text" name="kecamatan_asal"
                                                    value="<?php echo $this->input->post('kecamatan_asal') == "" ? $DataPendudukDatang['kecamatan_asal'] : $this->input->post('kecamatan_asal'); ?>"
                                                    class="form-control form-control-sm" id="kecamatan_asal" />
                                                <span class="text-danger"><?php echo form_error('kecamatan_asal');?></span>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="alamat_asal" class="control-label"><span
                                                    class="text-danger">*</span>Alamat Asal</label>
                                            <div class="col-md-10">
                                                <input type="text" name="alamat_asal"
                                                    value="<?php echo $this->input->post('alamat_asal') == "" ? $DataPendudukDatang['alamat_asal'] : $this->input->post('alamat_asal'); ?>"
                                                    class="form-control form-control-sm" id="alamat_asal" />
                                                <span class="text-danger"><?php echo form_error('alamat_asal');?></span>
                                            </div>
                                        </div>

                                        
                                        <div class="form-group">
                                            <label for="alasan" class="control-label"><span
                                                    class="text-danger">*</span>Alasan</label>
                                            <div class="col-md-10">
                                                <input type="text" name="alasan"
                                                    value="<?php echo $this->input->post('alasan') == "" ? $DataPendudukDatang['alasan'] : $this->input->post('alasan'); ?>"
                                                    class="form-control form-control-sm" id="alasan" />
                                                <span class="text-danger"><?php echo form_error('alasan');?></span>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="rt_asal" class="control-label"><span
                                                    class="text-danger">*</span>Rt Asal</label>
                                            <div class="col-md-10">
                                                <input type="text" name="rt_asal"
                                                    value="<?php echo $this->input->post('rt_asal') == "" ? $DataPendudukDatang['rt_asal'] : $this->input->post('rt_asal'); ?>"
                                                    class="form-control form-control-sm" id="rt_asal" />
                                                <span class="text-danger"><?php echo form_error('rt_asal');?></span>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="rw_asal" class="control-label"><span
                                                    class="text-danger">*</span>Rw Asal</label>
                                            <div class="col-md-10">
                                                <input type="text" name="rw_asal"
                                                    value="<?php echo $this->input->post('rw_asal') == "" ? $DataPendudukDatang['rw_asal'] : $this->input->post('rw_asal'); ?>"
                                                    class="form-control form-control-sm" id="rw_asal" />
                                                <span class="text-danger"><?php echo form_error('rw_asal');?></span>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="kode_pos_asal" class="control-label"><span
                                                    class="text-danger">*</span>Kode Pos Asal</label>
                                            <div class="col-md-10">
                                                <input type="text" name="kode_pos_asal"
                                                    value="<?php echo $this->input->post('kode_pos_asal') == "" ? $DataPendudukDatang['kode_pos_asal'] : $this->input->post('kode_pos_asal'); ?>"
                                                    class="form-control form-control-sm" id="kode_pos_asal" />
                                                <span class="text-danger"><?php echo form_error('kode_pos_asal');?></span>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="no_telepon_asal" class="control-label"><span
                                                    class="text-danger">*</span>No Telepon Asal</label>
                                            <div class="col-md-10">
                                                <input type="text" name="no_telepon_asal"
                                                    value="<?php echo $this->input->post('no_telepon_asal') == "" ? $DataPendudukDatang['no_telepon_asal'] : $this->input->post('no_telepon_asal'); ?>"
                                                    class="form-control form-control-sm" id="no_telepon_asal" />
                                                <span class="text-danger"><?php echo form_error('no_telepon_asal');?></span>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="kecamatan_asal" class="control-label"><span
                                                    class="text-danger">*</span>Kecamatan Asal</label>
                                            <div class="col-md-10">
                                                <input type="text" name="kecamatan_asal"
                                                    value="<?php echo $this->input->post('kecamatan_asal') == "" ? $DataPendudukDatang['kecamatan_asal'] : $this->input->post('kecamatan_asal'); ?>"
                                                    class="form-control form-control-sm" id="kecamatan_asal" />
                                                <span class="text-danger"><?php echo form_error('kecamatan_asal');?></span>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="kabupaten_asal" class="control-label"><span
                                                    class="text-danger">*</span>Kabupaten Asal</label>
                                            <div class="col-md-10">
                                                <input type="text" name="kabupaten_asal"
                                                    value="<?php echo $this->input->post('kabupaten_asal') == "" ? $DataPendudukDatang['kabupaten_asal'] : $this->input->post('kabupaten_asal'); ?>"
                                                    class="form-control form-control-sm" id="kabupaten_asal" />
                                                <span class="text-danger"><?php echo form_error('kabupaten_asal');?></span>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="provinsi_asal" class="control-label"><span
                                                    class="text-danger">*</span>Provinsi Asal</label>
                                            <div class="col-md-10">
                                                <input type="text" name="provinsi_asal"
                                                    value="<?php echo $this->input->post('provinsi_asal') == "" ? $DataPendudukDatang['provinsi_asal'] : $this->input->post('provinsi_asal'); ?>"
                                                    class="form-control form-control-sm" id="provinsi_asal" />
                                                <span class="text-danger"><?php echo form_error('provinsi_asal');?></span>
                                            </div>
                                        </div>

                                        <div class="col-md-10">
                                            <label for="dusun" class="control-label"><span
                                                    class="text-danger">*</span>Dusun</label>
                                            <div class="form-group">
                                                <input type="text" name="dusun"
                                                    value="<?php echo $this->input->post('dusun') == "" ? $DataPendudukDatang['dusun'] : $this->input->post('dusun'); ?>"
                                                    class="form-control form-control-sm" id="dusun" />
                                                <span class="text-danger"><?php echo form_error('dusun'); ?></span>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-10">
                                            <label for="rt" class="control-label"><span
                                                    class="text-danger">*</span>Rt</label>
                                            <div class="form-group">
                                                <input type="text" name="rt"
                                                    value="<?php echo $this->input->post('rt') == "" ? $DataPendudukDatang['rt'] : $this->input->post('rt'); ?>"
                                                    class="form-control form-control-sm" id="rt" />
                                                <span class="text-danger"><?php echo form_error('rt'); ?></span>
                                            </div>
                                        </div>

                                        <div class="form-group">
											<label for="jenis_kelamin" class="control-label"><span class="text-danger">*</span>Jenis Kelamin</label>
											<div class="col-md-10">
												<select class='form-control' name='jenis_kelamin' required>
                                                <option value='Laki - Laki' <?php if($DataPendudukDatang['jenis_kelamin']=='Laki - Laki'){echo "selected";} ?>>Laki - Laki</option>
                                                <option value='Perempuan' <?php if($DataPendudukDatang['jenis_kelamin']=='Perempuan'){echo "selected";} ?>>Perempuan</option>
                                            </select>
												<span class="text-danger"><?php echo form_error('jenis_kelamin');?></span>
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
