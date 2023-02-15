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
                            <li class="breadcrumb-item active"><a href="{{ url('') }}/#" class="breadcrumb-link">Laporan Data Penduduk Lahir</a>
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
                <div id="sparkline-1"></div>
            </div>
        </div>
    </div>
</div>