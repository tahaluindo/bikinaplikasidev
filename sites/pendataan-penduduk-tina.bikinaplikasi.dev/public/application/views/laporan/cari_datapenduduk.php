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
                            <li class="breadcrumb-item active"><a href="{{ url('') }}/#" class="breadcrumb-link">Laporan Data Penduduk</a>
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
                    <?php echo form_open('laporan/cetak/penduduk', array("class"=>"form-horizontal" , "enctype" => 'multipart/form-data')); ?>
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
                                                    class="text-danger">*</span>Rt</label>
                                            <div class="col-md-10">

                                                <select name="rt" class='form-control form-control-sm'>
                                                    <option value="">-- SEMUA --</option>
                                                    <?php foreach($rt as $item): ?>
                                                    <option value="<?php echo $item->rt; ?>"><?php echo $item->rt; ?>
                                                    </option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="keterangan" class="control-label"><span
                                                    class="text-danger">*</span>Jenis Kelamin</label>
                                            <div class="col-md-10">
                                                <select name="jenis_kelamin" class='form-control form-control-sm'>
                                                    <option value="">-- SEMUA --</option>
                                                    <option value="Laki - Laki">Laki - Laki</option>
                                                    <option value="Perempuan">Perempuan</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="keterangan" class="control-label"><span
                                                    class="text-danger">*</span>Agama</label>
                                            <div class="col-md-10">
                                                <select class="form-control form-control-sm" id="sel1" name="agama">
                                                    <option value="">-- SEMUA --</option>
                                                    <?php foreach($agama as $agama): ?>
                                                    <option
                                                        <?php if($this->input->post('agama')== $agama->keterangan){echo "selected";} ?>>
                                                        <?php echo $agama->keterangan; ?></option>
                                                    <?php endforeach; ?>
                                                </select>

                                                <span class="text-danger"><?php echo form_error('keterangan');?></span>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="keterangan" class="control-label"><span
                                                    class="text-danger">*</span>Status</label>
                                            <div class="col-md-10">
                                                <select class="form-control form-control-sm" id="sel1" name="status">
                                                    <option value="">-- SEMUA --</option>
                                                    <?php foreach(['Kawin' => 'Kawin', 'Belum' => 'Belum Kawin', 'Cerai Hidup' => 'Cerai', 'Cerai Mati' => 'Cerai Mati'] as $key => $status): ?>
                                                    <option
                                                        <?php if($this->input->post('status')== $key){echo "selected";} ?>>
                                                        <?php echo $status; ?></option>
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
                <div id="sparkline-1"></div>
            </div>
        </div>
    </div>
</div>
