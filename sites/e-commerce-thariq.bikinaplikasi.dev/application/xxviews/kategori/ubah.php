<div id="page-wrapper" >
    <div class="header"> 
        <h3 class="page-header">
            UBAH DATA KATEGORI
        </h3>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>">Home</a></li>
            <li><a href="#">KATEGORI</a></li>
            <li class="active">UBAH DATA KATEGORI</li>
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
                                    <div class="title">UBAH DATA KATEGORI</div>
                                </div>
                            </div>
                            <div class="col-md-6 text-right">
                                <a href="<?php echo site_url('kategori') ?>" class="btn btn-primary btn-sm pull-right">Kembali</a>
                            </div>
                        </div>
                        
                    </div>
                    <div class="panel-body">
                        <form method="post" action="<?php echo site_url('kategori/edit/'.$kategori->id) ?>">
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" name="nmkategori" value="<?php echo $kategori->nmkategori ?>" class="form-control input-sm" placeholder="Nama" required <?php echo hanyaHuruf() ?>/>
                            </div>
                            <div class="form-group">
                                <label>Keterangan</label>
                                <textarea class="form-control" cols="3" name="keterangan"><?php echo $kategori->keterangan ?></textarea>
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