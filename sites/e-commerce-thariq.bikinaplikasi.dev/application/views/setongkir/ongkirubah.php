<h3>Ubah Ongkir : <?php echo $ongkir->provinsi ?></h3>

<form method="post" action="<?php echo site_url('ongkir/save') ?>">
	<table>
		<tr>
			<td>Provinsi</td>
			<td>:</td>
			<td>
				<input type="text" name="prov" value="<?php echo $ongkir->provinsi ?>">
			</td>
		</tr>
		<tr>
			<td>Biaya</td>
			<td>:</td>
			<td>
				<input type="text" name="biaya" value="<?php echo $ongkir->biaya ?>">
			</td>
		</tr>
		<tr>
			<td colspan="3">
				<button type="submit">Simpan</button>
			</td>
		</tr>
	</table>
</form>