<?php 
	include_once "cek-login.php";
?>

<html>
<head>
	<!--<meta http-equiv=refresh content=10;url=list-operator.php>-->
	<title>Pendaftaran Akte | Dukcapil Muaro Jambi</title>
</head>
	<link rel="stylesheet"type="text/css" href="css/bootstrap.min.css">
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
<body>
 
	<center>
 
		<h2>DAFTAR PEMOHON Akte Perkawinan</h2>
 </center>
 
		<?php 
		include 'config.php';
		?>
 
		<br>
 
		<!--
		<form action="" method="get">  
			<input type="radio" name="jenis" value="warga" checked>Warga<br/>  
			<input type="radio" name="jenis" value="pasien">Pasien<br/> 
			<input type="radio" name="jenis" value="semua">Galonyo<br/> 
			<input type="submit" name="tampilkan" value="Tampilkan">  
		</form>
		-->
		<table class=" table-sm">
		<tr>
			<td>
					<a href="form-daftar-akte-perkawinan.php" class="btn btn-primary">Daftar Baru</a>
					<a href="cetak-pra-akte-perkawinan.php" class="btn btn-primary">Cetak</a>
			</td>
			<td class="align-top">
				<form method="get">
				<label>PILIH TANGGAL : </label>
				<input type="date" name="tanggal">
				<input type="submit" value="FILTER" name="filter" class="btn btn-success btn-md" >
				</form>
				<!--<select required name="operator" id="operator" >
					<option value="">Pilih Operator</option>
					<option>Widya</option>
					<option>May</option>
					<option>Mita</option>
					<option>Komar</option>
					<option>Satri</option>
					<option>Febi</option>
					<option>Yeni</option>
				--></select>
			</td>
		</tr>
		</table>
		<br>

		<table class="table table-bordered table-striped table-sm">
		<thead class="thead-dark" align="center">
			<tr>
            <th class="align-middle" ><small>No</small></th>
            <th class="align-middle"><small>Tanggal</small></th>
            <th class="align-middle" width="170px"><small>No KK</small></th>
            <th class="align-middle" width="170px"><small>Nama Suami</small></th>
            <th class="align-middle" width="170px"><small>Nama Istri</small></th>
            <th class="align-middle" width="170px"><small>Kepala Keluarga</small></th>
            <th class="align-middle" width="150px"><small>Kel/Desa</small></th>
            <th class="align-middle"><small>Penerima</small></th>
            <th class="align-middle"><small>Jam Terima</small></th>
			<th class="align-middle"><small>Diterima operator</small></th>
			<th class="align-middle"><small>Selesai operator</small></th>
			<th class="align-middle"><small>Status</small></th>
			<!--<th class="align-middle">Jns</th>-->
			<th class="align-middle"><small>Keterangan</small></th>
			<th class="align-middle"><small>Operator</small></th>
			<th class="align-middle" width="140px"><small>Operasi</small></th>
			</tr>
		</thead>
		<tbody>
			<?php 
			$no = 1;
			date_default_timezone_set('Asia/Jakarta');
			$tanggal_skrg = date('y-m-d');
			$jam = date("H:i:s");

			//deteksi jika tombol tampilkan di klik
			if(isset($_GET['tanggal']))
			{
				$tgl = $_GET['tanggal'];
				$sql = mysqli_query($db,"select * from daftar_akte_perkawinan where tanggal='$tgl'");
			}else
			{
				$sql = mysqli_query($db,"select * from daftar_akte_perkawinan where tanggal='$tanggal_skrg'");
			}
			
			while($data = mysqli_fetch_array($sql)){
			?>
			<?php if ($data['status']=='Sudah diajukan')
				{
					$tdstyle='background-color:#40E0D0;';
				}
					else if ($data['status']=='Sudah dicetak')
				{
					$tdstyle='background-color:#9ACD32;';
				}
					else
				{
					$tdstyle='background-color:#80000000;';
				}
				?>
				<p><small
			<tr>
				
				<td><small><?php echo $no++; ?></small></td>
				<td><small><?php echo $data['tanggal']; ?></small></td>
				<td><small><?php echo $data['no_kk']; ?></small></td>
				<td><small><?php echo $data['nama_suami']; ?></small></td>
				<td><small><?php echo $data['nama_istri']; ?></small></td>
				<td><small><?php echo $data['kepala_keluarga']; ?></small></td>
				<td><small><?php echo $data['kel']; ?></small></td>
				<td><small><?php echo $data['penerima']; ?></small></td>
				<td><small><?php echo $data['jam_terima']; ?></small></td>
				<td><small><?php echo $data['jam_dtrm_opr']; ?></small></td>
				<td><small><?php echo $data['jam_slsai_opr']; ?></small></td>
				<?php	
					echo"<td style=\"$tdstyle\">";
					echo $data['status'];
				?>
				<!--<td><?php echo $data['jenis']; ?></td>-->
				<td><small><?php echo $data['ket']; ?></small></td>
				<td><small><?php echo $data['operator']; ?></small></td>
				<td class="block"><small>
					<?php 
					//if ($data['jam_dtrm_opr']=='00:00:00')
				    //if ($data['jam_dtrm_opr']=='00:00:00')
					//{
						//echo "<a href='form-terima-opr.php?id=".$data['id']." '>Terima</a> | Status |";
						echo "<a href='form-terima-opr-akte-perkawinan.php?id=".$data['id']." '>Terima</a> |";
					//}else{
							//echo  "Terima | <a href='form-selesai-opr.php?id=".$data['id']."'>Status</a> | "; 
							echo  "<a href='form-selesai-opr-akte-perkawinan.php?id=".$data['id']."'>Status</a> | ";
					//}
					echo "<a href='form-keterangan-akte-perkawinan.php?id=".$data['id']."'> Ket</a>  | ";

						
					echo "<a onclick=\"return confirm('Yakin akan hapus data ini?')\" href='hapus-keterangan-akte-perkawinan.php?id=".$data['id']."'> Hapus </a> ";
					?>
				</small></td>
					
			</tr>
			</small></p>
			<?php 
			}
			?>
		</tbody>
		</table>
 
	</center>
</body>
</html>
