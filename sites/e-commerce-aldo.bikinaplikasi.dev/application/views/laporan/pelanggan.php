<div id="page-wrapper">
    <div class="well">
    <div class="row" style="padding-top: 10px">
        <div class="col-lg-6">
            <p style="font-size: 24px">DATA PELANGGAN</p>
        </div>
        <div class="col-lg-6">
            <a href="<?php echo site_url('laporan/pelangganCetak') ?>" class="btn btn-primary btn-sm pull-right" target="_blank">Cetak</a>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-lg-12">
            
            <table class="table table-striped table-hover table-bordered">
                <thead>
                    <th width="5%">No.</th>
                    <th>Nama</th>
                    <th width="19%">Alamat</th>
                    <th width="15%">No Telp</th>
                    <th width="10%">Username</th>                    
                    <th width="10%">Status</th>                    
                    <th width="10%">Tgl Daftar</th>                    
                </thead>
                <tbody>
                <?php $no = 1; foreach($pelanggan->result() as $dtpelanggan): ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $dtpelanggan->nama; ?></td>
                        <td><?php echo $dtpelanggan->alamat; ?></td>
                        <td><?php echo $dtpelanggan->notelp; ?></td>
                        <td><?php echo ($dtpelanggan->username)  ?></td>
                        <td><?php echo ($dtpelanggan->status)  ?></td>
                        <td><?php echo ($dtpelanggan->tgl_daftar)  ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        
    </div>
    </div>
</div>
<!-- /#page-wrapper -->   