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
                                    Data Profile Desa</a>
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
                    <?php echo form_open('DataProfileDesa/edit/'.$DataProfileDesa['id'], array("enctype" => 'multipart/form-data')); ?>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="sejarah" class="control-label"><span
                                        class="text-danger">*</span>Sejarah  (&lt;br&gt; Untuk Enter)</label>
                                <div class="form-group">
                                    <textarea name="sejarah"
                                        class="form-control form-control-sm" id="sejarah"><?php echo ($this->input->post('sejarah') ? $this->input->post('sejarah') : $DataProfileDesa['sejarah']); ?></textarea>

                                    <span class="text-danger"><?php echo form_error('sejarah');?></span>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label for="visi" class="control-label"><span class="text-danger">*</span>Visi (&lt;br&gt; Untuk Enter)</label>
                                <div class="form-group">
                                    <textarea name="visi" 
                                        class="form-control form-control-sm" id="visi"><?php echo ($this->input->post('visi') ? $this->input->post('visi') : $DataProfileDesa['visi']); ?></textarea>

                                    <span class="text-danger"><?php echo form_error('visi');?></span>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label for="misi" class="control-label"><span class="text-danger">*</span>Misi (&lt;br&gt; Untuk Enter)</label>
                                <div class="form-group">
                                    <textarea name="misi" 
                                        class="form-control form-control-sm" id="misi"><?php echo ($this->input->post('misi') ? $this->input->post('misi') : $DataProfileDesa['misi']); ?></textarea>

                                    <span class="text-danger"><?php echo form_error('misi');?></span>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label for="struktur_desa" class="control-label"><span
                                        class="text-danger">*</span>Struktur Desa (JPG | PNG | JPEG)</label>
                                <div class="form-group">

                                    <input type="file" name="struktur_desa" class="form-control form-control-sm" />
                                    <span class="text-danger"><?php echo form_error('struktur_desa');?></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-offset-11 col-sm-1">
                                    <button type="submit" class="btn btn-success">Save</button>
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
