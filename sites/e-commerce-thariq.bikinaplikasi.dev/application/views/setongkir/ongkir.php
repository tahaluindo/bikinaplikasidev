<h3>Set Ongkir Perprovinsi</h3>

<table border="1" width="100%">
	<tr>
		<td>No</td>
		<td>Prov</td>
		<td>Biaya</td>
		<td>Edit</td>
	</tr>
	<?php $no=1; foreach($ongkir->result() as $rs) { ?>
	<tr>
		<td><?php echo $no++ ?></td>
		<td><?php echo $rs->provinsi ?></td>
		<td><?php echo number_format($rs->biaya,0,',','.') ?></td>
		<td>
			<?php 
			$prov = str_replace(" ", '_', $rs->provinsi);
			?>
			<a href="<?php echo site_url('ongkir/editOngkir/'.$prov) ?>">Edit</a>
		</td>
	</tr>
	<?php } ?>
</table>