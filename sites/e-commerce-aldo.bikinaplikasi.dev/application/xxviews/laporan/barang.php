<div id="page-wrapper">
    <div class="well">
    <div class="row" style="padding-top: 10px">
        <div class="col-lg-6">
            <p style="font-size: 24px">DATA BARANG</p>
        </div>
        <div class="col-lg-6">
            <a href="<?php echo site_url('laporan/barangCetak') ?>" class="btn btn-primary btn-sm pull-right" target="_blank">Cetak</a>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-lg-12">
            
            <table class="table table-striped table-hover table-bordered">
                <thead>
                    <th width="5%">No.</th>
                    <th>Nama</th>
                    <th width="19%">Kategori</th>
                    <th width="15%">Berat (Gram)</th>
                    <th width="10%">Total Stok</th>                    
                </thead>
                <tbody>
                <?php 
                $no = 1;
                foreach($barang->result() as $dtbarang) {
                ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $dtbarang->nama_barang; ?></td>
                        <td><?php echo $dtbarang->nmkategori; ?></td>
                        <td><?php echo $dtbarang->berat ?></td>
                        <td><?php echo ($dtbarang->ukurans + $dtbarang->ukuranm + $dtbarang->ukuranl + $dtbarang->ukuranxl)  ?></td>
                        
                    </tr>
                <?php } ?>
                </tbody>
            </table>
            
        </div>
        
    </div>
    </div>
</div>
<!-- /#page-wrapper -->   