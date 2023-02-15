<div id="page-wrapper" >
    <div class="header"> 
        <h3 class="page-header">
            UBAH DATA TRACKING
        </h3>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>">Home</a></li>
            <li><a href="#">PEMESANAN</a></li>
            <li class="active">UBAH DATA TRACKING</li>
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
                                    <div class="title">UBAH DATA TRACKING</div>
                                </div>
                            </div>
                            <div class="col-md-6 text-right">
                                <a href="<?php echo site_url('pemesanan/tracking/'.$trak->idpesanan) ?>" class="btn btn-primary btn-sm pull-right">Kembali</a> 
                            </div>
                        </div>
                        
                    </div>
                    <div class="panel-body">
                        <form method="post" action="<?php echo site_url('pemesanan/trackingedit/'.$trak->idtrack.'/'.$order->id_pesan) ?>">

                            <div class="form-group">
                                <label>Status</label>

                                <select class="form-control input-sm" name="status" required>
                                    <option value="">- Pilih Status -</option>
                                    <?php foreach(statustrack() as $ky => $vl) { ?>
                                    <option 
                                    value="<?php echo $ky ?>"
                                    <?php echo ($trak->status == $ky) ? 'selected' : '' ?>
                                    >
                                        <?php echo $vl ?>
                                    </option>
                                    <?php } ?>
                                </select>
                            </div>

                            
                            
                            <div class="form-group">
                                <label>Keterangan</label>
                                <textarea rows="5" name="keterangan" class="form-control" placeholder="Keterangan"><?php echo $trak->keterangan ?></textarea>
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