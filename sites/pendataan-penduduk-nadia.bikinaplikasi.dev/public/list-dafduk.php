<?php 
	include_once "cek-login.php";
?>

<html>
<head>
	<meta http-equiv=refresh content=10;url=list-dafduk.php>
	<title>Pendaftaran Kartu Keluarga | Dukcapil Muaro Jambi</title>
</head>
	<link rel="stylesheet"type="text/css" href="css/bootstrap.min.css">
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
<body>
 
	<center>
 
		<h2>DAFTAR PEMOHON KK</h2>
 
 
		<?php 
		include 'config.php';
		?>
 
		<br/>
		<a href="list-dafduk.php" class="btn btn-primary">Pendaftar KK</a>
		<a href="list-dafduk-ktp.php" class="btn btn-primary">Pendaftar KTP</a>
		<br/><br/>
		
		<table class="table table-bordered table-striped table-sm">
		<thead class="thead-dark" align="center">
			<tr>
            <th class="align-middle" >No</th>
            <th class="align-middle">Tanggal</th>
            <th class="align-middle" width="170px">Nama KK</th>
            <th class="align-middle" width="150px">Kel/Desa</th>
            <th class="align-middle">Penerima</th>
            <th class="align-middle">Jam Terima</th>
			<th class="align-middle">Operator</th>
			<th class="align-middle" width="50px">Diterima operator</th>
			<th class="align-middle" width="50px">Selesai operator</th>
			<th class="align-middle">Status</th>
			<th class="align-middle">Keterangan</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			date_default_timezone_set('Asia/Jakarta');
			$tanggal = date('y-m-d');
			$jam = date("H:i:s");
			$no = 1;
			$sql = "SELECT * FROM daftar_kk where tanggal='$tanggal'";
			$query = mysqli_query($db, $sql);
			
			while($data = mysqli_fetch_array($query)){
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
				
				<td><?php echo $no++; ?></td>
				<td><?php echo $data['tanggal']; ?></td>
				<td><?php echo $data['no_kk']; ?></td>
				<td><?php echo $data['kel']; ?></td>
				<td><?php echo $data['penerima']; ?></td>
				<td><?php echo $data['jam_terima']; ?></td>
				<td><?php echo $data['operator']; ?></td>
				<td><?php echo $data['jam_dtrm_opr']; ?></td>
				<td><?php echo $data['jam_slsai_opr']; ?></td>
				<?php	
					echo"<td style=\"$tdstyle\">";
					echo $data['status'];
				?>
				<td><?php echo $data['ket']; ?></td>					
			</tr>
			</small></p>
			<?php 
			}
			?>
		</tbody>
		</table>
 
	</center>
	<p>Total: <?php echo mysqli_num_rows($query) ?></p>
</body>
</html>
