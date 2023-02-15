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
                                    Pneduduk Lahir</a>
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
                    <?php echo form_open('DataPendudukLahir/add', array("class"=>"form-horizontal" , "enctype" => 'multipart/form-data')); ?>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="box box-info">
                                    <div class="box-header with-border">
                                        <?php echo $this->session->flashdata('msg'); ?>

                                        <h3>Input Data Penduduk Lahir</h3>
                                    </div>
                                    <div class="box-body">

                                        <div class="form-group">
                                            <label for="no_kk" class="control-label"><span
                                                    class="text-danger">*</span>No KK</label>
                                            <div class="col-md-10">
                                                <input type="text" name="no_kk"
                                                    value="<?php echo $this->input->post('no_kk'); ?>"
                                                    class="form-control form-control-sm" id="no_kk" />
                                                <span class="text-danger"><?php echo form_error('no_kk');?></span>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="nama_lengkap" class="control-label"><span
                                                    class="text-danger">*</span>Nama Lengkap</label>
                                            <div class="col-md-10">
                                                <input type="text" name="nama_lengkap"
                                                    value="<?php echo $this->input->post('nama_lengkap'); ?>"
                                                    class="form-control form-control-sm" id="nama_lengkap" />
                                                <span
                                                    class="text-danger"><?php echo form_error('nama_lengkap');?></span>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="nama_ibu" class="control-label"><span
                                                    class="text-danger">*</span>Nama Ibu</label>
                                            <div class="col-md-10">
                                                <input type="text" name="nama_ibu"
                                                    value="<?php echo $this->input->post('nama_ibu'); ?>"
                                                    class="form-control form-control-sm" id="nama_ibu" />
                                                <span class="text-danger"><?php echo form_error('nama_ibu');?></span>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="nama_ayah" class="control-label"><span
                                                    class="text-danger">*</span>Nama Ayah</label>
                                            <div class="col-md-10">
                                                <input type="text" name="nama_ayah"
                                                    value="<?php echo $this->input->post('nama_ayah'); ?>"
                                                    class="form-control form-control-sm" id="nama_ayah" />
                                                <span class="text-danger"><?php echo form_error('nama_ayah');?></span>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="nama_saksi" class="control-label"><span
                                                    class="text-danger">*</span>Nama Saksi</label>
                                            <div class="col-md-10">
                                                <input type="text" name="nama_saksi"
                                                    value="<?php echo $this->input->post('nama_saksi'); ?>"
                                                    class="form-control form-control-sm" id="nama_saksi" />
                                                <span class="text-danger"><?php echo form_error('nama_saksi');?></span>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="jenis_kelamin" class="control-label"><span
                                                    class="text-danger">*</span>Jenis Kelamin</label>
                                            <div class="col-md-10">
                                                <select class="form-control form-control-sm" id="sel1"
                                                    name="jenis_kelamin">
                                                    <option
                                                        <?php if($this->input->post('jenis_kelamin')=='Laki - Laki'){echo "selected";} ?>>
                                                        Laki - Laki</option>
                                                    <option
                                                        <?php if($this->input->post('jenis_kelamin')=='Perempuan'){echo "selected";} ?>>
                                                        Perempuan</option>
                                                </select>
                                                <span
                                                    class="text-danger"><?php echo form_error('jenis_kelamin');?></span>
                                            </div>
                                        </div>

                                        <div class="col-md-10">
                                            <label for="hari_kelahiran" class="control-label"><span
                                                    class="text-danger">*</span>Hari Kelahiran</label>
                                            <div class="form-group">
                                                <select class="form-control form-control-sm" id="sel1"
                                                    name="hari_kelahiran">
                                                    <option
                                                        <?php if ($DataPenduduk['hari_kelahiran'] = $this->input->post('hari_kelahiran') == 'Senin' ) {echo "selected";}?>>
                                                        Senin</option>
                                                    <option
                                                        <?php if ($DataPenduduk['hari_kelahiran'] = $this->input->post('hari_kelahiran') == 'Selasa' ) {echo "selected";}?>>
                                                        Selasa</option>
                                                    <option
                                                        <?php if ($DataPenduduk['hari_kelahiran'] = $this->input->post('hari_kelahiran') == 'Rabu' ) {echo "selected";}?>>
                                                        Rabu</option>
                                                    <option
                                                        <?php if ($DataPenduduk['hari_kelahiran'] = $this->input->post('hari_kelahiran') == 'Kamis' ) {echo "selected";}?>>
                                                        Kamis</option>
                                                    <option
                                                        <?php if ($DataPenduduk['hari_kelahiran'] = $this->input->post('hari_kelahiran') == 'Jumat' ) {echo "selected";}?>>
                                                        Jumat</option>
                                                    <option
                                                        <?php if ($DataPenduduk['hari_kelahiran'] = $this->input->post('hari_kelahiran') == 'Sabtu' ) {echo "selected";}?>>
                                                        Sabtu</option>
                                                    <option
                                                        <?php if ($DataPenduduk['hari_kelahiran'] = $this->input->post('hari_kelahiran') == 'Minggu' ) {echo "selected";}?>>
                                                        Minggu</option>

                                                </select>
                                                <span
                                                    class="text-danger"><?php echo form_error('golongan_darah'); ?></span>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="tanggal_kelahiran" class="control-label"><span
                                                    class="text-danger">*</span>Tanggal Kelahiran </label>
                                            <div class="col-md-10">
                                                <input type="date" name="tanggal_kelahiran"
                                                    value="<?php echo $this->input->post('tanggal_kelahiran'); ?>"
                                                    class="form-control form-control-sm" id="tanggal_kelahiran" />
                                                <span
                                                    class="text-danger"><?php echo form_error('tanggal_kelahiran');?></span>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="tempat_kelahiran" class="control-label"><span
                                                    class="text-danger">*</span>Tempat Kelahiran </label>
                                            <div class="col-md-10">
                                                <input type="text" name="tempat_kelahiran"
                                                    value="<?php echo $this->input->post('tempat_kelahiran'); ?>"
                                                    class="form-control form-control-sm" id="tempat_kelahiran" />
                                                <span
                                                    class="text-danger"><?php echo form_error('tempat_kelahiran');?></span>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="jam_kelahiran" class="control-label"><span
                                                    class="text-danger">*</span>Jam Kelahiran </label>
                                            <div class="col-md-10">
                                                <input type="text" name="jam_kelahiran"
                                                    value="<?php echo $this->input->post('jam_kelahiran'); ?>"
                                                    class="form-control form-control-sm" id="jam_kelahiran" />
                                                <span
                                                    class="text-danger"><?php echo form_error('jam_kelahiran');?></span>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="jenis_kelahiran" class="control-label"><span
                                                    class="text-danger">*</span>Jenis Kelahiran</label>
                                            <div class="col-md-10">
                                                <select class="form-control form-control-sm" id="sel1"
                                                    name="jenis_kelahiran">
                                                    <option
                                                        <?php if($this->input->post('jenis_kelahiran')=='Tunggal'){echo "selected";} ?>>
                                                        Tunggal</option>
                                                    <option
                                                        <?php if($this->input->post('jenis_kelahiran')=='Kembar'){echo "selected";} ?>>
                                                        Kembar</option>
                                                </select>
                                                <span
                                                    class="text-danger"><?php echo form_error('jenis_kelahiran');?></span>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="anak_ke" class="control-label"><span
                                                    class="text-danger">*</span>Anak Ke </label>
                                            <div class="col-md-10">
                                                <input type="number" name="anak_ke"
                                                    value="<?php echo $this->input->post('anak_ke'); ?>"
                                                    class="form-control form-control-sm" id="anak_ke" />
                                                <span class="text-danger"><?php echo form_error('anak_ke');?></span>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="berat_bayi" class="control-label"><span
                                                    class="text-danger">*</span>Berat Bayi </label>
                                            <div class="col-md-10">
                                                <input type="number" name="berat_bayi"
                                                    value="<?php echo $this->input->post('berat_bayi'); ?>"
                                                    class="form-control form-control-sm" id="berat_bayi" />
                                                <span class="text-danger"><?php echo form_error('berat_bayi');?></span>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="panjang_bayi" class="control-label"><span
                                                    class="text-danger">*</span>Panjang Bayi </label>
                                            <div class="col-md-10">
                                                <input type="number" name="panjang_bayi"
                                                    value="<?php echo $this->input->post('panjang_bayi'); ?>"
                                                    class="form-control form-control-sm" id="panjang_bayi" />
                                                <span
                                                    class="text-danger"><?php echo form_error('panjang_bayi');?></span>
                                            </div>
                                        </div>

                                        <div class="col-md-10">
                                            <label for="dusun" class="control-label"><span
                                                    class="text-danger">*</span>Dusun</label>
                                            <div class="form-group">
                                                <input type="text" name="dusun"
                                                    value="<?php echo $this->input->post('dusun'); ?>"
                                                    class="form-control form-control-sm" id="dusun" />
                                                <span class="text-danger"><?php echo form_error('dusun'); ?></span>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-10">
                                            <label for="rt" class="control-label"><span
                                                    class="text-danger">*</span>Rt</label>
                                            <div class="form-group">
                                                <input type="text" name="rt"
                                                    value="<?php echo $this->input->post('rt'); ?>"
                                                    class="form-control form-control-sm" id="rt" />
                                                <span class="text-danger"><?php echo form_error('rt'); ?></span>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="surat_keterangan_lahir" class="control-label"><span
                                                    class="text-danger"></span>Surat Keterangan Lahir</label>
                                            <div class="col-md-10">
                                                <input type="file" name="surat_keterangan_lahir" class="form-control form-control-sm" required/>
                                                <span class="text-danger"><?php echo form_error('surat_keterangan_lahir');?></span>
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
