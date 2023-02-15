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
                            <li class="breadcrumb-item active"><a href="{{ url('') }}/#" class="breadcrumb-link">Laporan Data Penduduk Pindah</a>
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
                    <?php echo form_open('laporan/cetak/penduduk_pindah', array("class"=>"form-horizontal" , "enctype" => 'multipart/form-data')); ?>
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

                                                <select name="rt_tujuan_pindah" class='form-control form-control-sm'>
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
                                                    class="text-danger">*</span>Desa Tujuan Pindah</label>
                                            <div class="col-md-10">

                                                <select name="desa_tujuan_pindah" class='form-control form-control-sm'>
                                                    <option value="">-- SEMUA --</option>
                                                    <?php foreach($desa_tujuan_pindah as $item): ?>
                                                    <option value="<?php echo $item->desa_tujuan_pindah; ?>"><?php echo $item->desa_tujuan_pindah; ?>
                                                    </option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="keterangan" class="control-label"><span
                                                    class="text-danger">*</span>Kecamatan Tujuan Pindah</label>
                                            <div class="col-md-10">

                                                <select name="kecamatan_tujuan_pindah" class='form-control form-control-sm'>
                                                    <option value="">-- SEMUA --</option>
                                                    <?php foreach($kecamatan_tujuan_pindah as $item): ?>
                                                    <option value="<?php echo $item->kecamatan_tujuan_pindah; ?>"><?php echo $item->kecamatan_tujuan_pindah; ?>
                                                    </option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="keterangan" class="control-label"><span
                                                    class="text-danger">*</span>Kabupaten Tujuan Pindah</label>
                                            <div class="col-md-10">

                                                <select name="kabupaten_tujuan_pindah" class='form-control form-control-sm'>
                                                    <option value="">-- SEMUA --</option>
                                                    <?php foreach($kabupaten_tujuan_pindah as $item): ?>
                                                    <option value="<?php echo $item->kabupaten_tujuan_pindah; ?>"><?php echo $item->kabupaten_tujuan_pindah; ?>
                                                    </option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="keterangan" class="control-label"><span
                                                    class="text-danger">*</span>Provinsi Tujuan Pindah</label>
                                            <div class="col-md-10">

                                                <select name="provinsi_tujuan_pindah" class='form-control form-control-sm'>
                                                    <option value="">-- SEMUA --</option>
                                                    <?php foreach($provinsi_tujuan_pindah as $item): ?>
                                                    <option value="<?php echo $item->provinsi_tujuan_pindah; ?>"><?php echo $item->provinsi_tujuan_pindah; ?>
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
                <div id="sparkline-1"></div>
            </div>
        </div>
    </div>
</div>

