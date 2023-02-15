<div id="page-wrapper" >
    <div class="header"> 
        <h3 class="page-header">
            TAMBAH DATA ONGKOS KIRIM
        </h3>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>">Home</a></li>
            <li><a href="#">ONGKOS KIRIM</a></li>
            <li class="active">TAMBAH DATA ONGKOS KIRIM</li>
        </ol>                         
    </div>

    <div id="page-inner"> 
        <div class="row">
            <div class="col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card-title">
                                    <div class="title">TAMBAH DATA ONGKOS KIRIM</div>
                                </div>
                            </div>
                            <div class="col-md-6 text-right">
                                <a href="<?php echo site_url('ongkoskirim') ?>" class="btn btn-primary btn-sm pull-right">Kembali</a>
                            </div>
                        </div>
                        
                    </div>
                    <div class="panel-body">
                        <form method="post" action="<?php echo site_url('ongkoskirim/simpan') ?>">
                            <div class="form-group">
                                <label>Kode</label>
                                <input type="text" name="kode" class="form-control input-sm" placeholder="Kode" required />
                            </div>
                            <div class="form-group">
                                <label>Provinsi</label>
                                <input type="text" name="provinsi" class="form-control input-sm" placeholder="Provinsi" required <?php echo hanyaHuruf() ?>/>
                            </div>
                            <div class="form-group">
                                <label>Kabupaten</label>
                                <input type="text" name="kabupaten" class="form-control input-sm" placeholder="Kabupaten" required <?php echo hanyaHuruf() ?>/>
                            </div>
                            <div class="form-group">
                                <label>Biaya</label>
                                <input type="number" name="biaya" class="form-control input-sm" placeholder="Biaya" required />
                            </div>
                            
                            <div class="form-group">
                                <button type="submit" class="btn btn-success">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>