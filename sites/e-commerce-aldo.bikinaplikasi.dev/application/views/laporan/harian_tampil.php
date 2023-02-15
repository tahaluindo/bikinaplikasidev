<?php if($harian->num_rows() > 0) { ?>

<div class="row">
    <div class="col-md-12">
        <a href="<?php echo site_url('laporan/harian_cetak/'.$tanggal) ?>" class="btn btn-primary" target="_blank">Cetak</a>
    </div>
</div>
<hr>
<table class="table table-striped table-hover table-bordered">
    <thead>
        <th width="5%">Cetak</th>
        <th width="5%">No.</th>
        <th>Nama</th>
        <th width="20%">Bank Transfer</th>
        <th width="20%">Tanggal Transfer</th>
        <th width="20%">Total</th>
        
    </thead>
    <tbody>
        <?php
        $no = 1;
        $total = 0;
        foreach($harian->result() as $rs) {
        ?>
        <tr>
            <td>
                <a href="<?php echo site_url('laporan/transaksiCetak/'.$rs->id_pesan) ?>" target="_blank">
                    <i class="fa fa-print"></i>
                </a>
            </td>
            <td><?php echo $no++ ?></td>
            <td><?php echo $rs->nama ?></td>
            <td><?php echo $rs->banktransfer ?></td>
            <td align="right">Rp. <?php echo $rs->tgltransfer ?></td>
            <td align="right">Rp. <?php echo number_format($rs->total,0,',','.') ?></td>
            
        </tr>
        <?php 
            $total = $total + $rs->total;
        } 
        ?>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="5">Total</td>
            <td align="right">Rp. <?php echo number_format($total,0,',','.')?></td>
            
        </tr>
    </tfoot>
</table>
<?php } else { ?>

<p class="alert alert-danger">Belum Ada Pemesanan</p>
<?php } ?>