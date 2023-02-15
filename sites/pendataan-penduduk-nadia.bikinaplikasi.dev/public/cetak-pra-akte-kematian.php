<?php 
	include_once "cek-login.php";
?>

<html>
<head>

	<title>Pendaftaran Akte Keluarga | Dukcapil Muaro Jambi</title>
</head>
	<link rel="stylesheet"type="text/css" href="css/bootstrap.min.css">
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
<body>
 
	<center>
 
		<h2>DAFTAR PEMOHON Akte Kematian</h2>		
		<?php 
		include 'config.php';
		?>
 
		<br/><br/><br/>

 
		<table class="table table-bordered table-striped table-sm">
		<thead class="thead-dark" align="center">
			<tr>
				<th class="align-middle" ><small>No</small></th>
				<th class="align-middle"><small>Tanggal</small></th>
				<th class="align-middle" width="170px"><small>No KK</small></th>
				<th class="align-middle" width="170px"><small>Nama Almarhum</small></th>
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
				$sql = mysqli_query($db,"select * from daftar_akte_kematian where tanggal='$tgl'");
			}else
			{
				$sql = mysqli_query($db,"select * from daftar_akte_kematian where tanggal='$tanggal_skrg'");
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
				<td><small><?php echo $data['nama_almarhum']; ?></small></td>
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
									
			</tr>
			</small></p>
			<?php 
			}
			?>
		</tbody>
		</table>
 
	</center>
	<script>
		window.print();
	</script>
</body>
</html>
