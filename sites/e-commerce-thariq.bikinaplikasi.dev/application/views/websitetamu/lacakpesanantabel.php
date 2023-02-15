<?php if($trak->num_rows()) { ?>
<table class="table table-bordered table-striped">
    <thead>
        <th width="10%">No.</th>
        <th width="19%">Status</th>
        <th>Keterangan</th>
        <th width="20%">Tanggal</th>
    </thead>
    <tbody>
    <?php 
    $no = 1;
    foreach($trak->result() as $rs) {
    ?>
        <tr>
            <td><?php echo $no++; ?></td>
            
            <td><?php echo $rs->status; ?></td>
            <td><?php echo $rs->keterangan ?></td>
            <td><?php echo $rs->tanggal; ?></td>
            
        </tr>
    <?php } ?>
    </tbody>
</table>
<?php } else { ?>
<p class="alert alert-info">No Resi anda tidak ditemukan</p>
<?php } ?>