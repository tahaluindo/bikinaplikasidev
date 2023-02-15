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
              <li class="breadcrumb-item active"><a href="{{ url('') }}/#" class="breadcrumb-link">Laporan Data Penduduk
                  Tetao</a>
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
          <?php echo form_open('laporan/cetak/perkembanganpenduduk', array("class"=>"form-horizontal" , "enctype" => 'multipart/form-data')); ?>
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
                                                    class="text-danger">*</span>Bulan</label>
                                            <div class="col-md-10">
                                                <select name="bulan" class='form-control form-control-sm'>
                                                    <option value="01">January</option>
                                                    <option value="02">Februari</option>
                                                    <option value="03">Maret</option>
                                                    <option value="04">April</option>
                                                    <option value="05">Mei</option>
                                                    <option value="06">Juni</option>
                                                    <option value="07">Juli</option>
                                                    <option value="08">Agustus</option>
                                                    <option value="09">September</option>
                                                    <option value="10">Oktober</option>
                                                    <option value="11">November</option>
                                                    <option value="12">Desember</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="keterangan" class="control-label"><span
                                                    class="text-danger">*</span>Tahun</label>
                                            <div class="col-md-10">
                                                <select name="tahun" class='form-control form-control-sm'>
                                                    <?php for($i = date('Y') - 4; $i <= date('Y'); $i++): ?>
                                                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                    <?php endfor; ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="keterangan" class="control-label"><span
                                                    class="text-danger">*</span>Dusun</label>
                                            <div class="col-md-10">

                                                <select name="dusun" class='form-control form-control-sm'>
                                                    <option value="">-- SEMUA --</option>
                                                    <?php foreach($dusun as $item): ?>
                                                    <option value="<?php echo $item->dusun; ?>"><?php echo $item->dusun; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="btn-group">
                                                <button type="submit" class="btn btn-success mr-2" name='print_1' value='1'>Print V1</button>
                                                <button type="submit" class="btn btn-success" name='print_2' value='2'>Print V2</button>
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