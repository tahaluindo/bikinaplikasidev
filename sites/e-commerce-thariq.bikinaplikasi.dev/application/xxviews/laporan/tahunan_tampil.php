<?php if($tahundata->num_rows() > 0) { ?>

<div class="row">
    <div class="col-md-12">
        <a href="<?php echo site_url('laporan/tahunan_cetak/'.$tahun) ?>" class="btn btn-primary" target="_blank">Cetak</a>
    </div>
</div>
<hr>
<table class="table table-striped table-hover table-bordered">
    <thead>
        <th width="5%">No.</th>
        <th width="30%">Bulan</th>
        <th width="20%">Total</th>
    </thead>
    <tbody>
        <?php 
        $no = 1;
        $total = 0;
        foreach($tahundata->result() as $rstahun) {
        ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $rstahun->bulan ?></td>
            <td align="right">Rp. <?php echo number_format($rstahun->total,0,',','.') ?></td>
        </tr>
        <?php 
            $total = $total + $rstahun->total; 
        } 
        ?>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="2">Total</td>
            <td align="right">Rp. <?php echo number_format($total,0,',','.') ?></td>
        </tr>
    </tfoot>
</table>
<?php } else { ?>

<p class="alert alert-danger">Belum Ada Pemesanan</p>
<?php } ?>