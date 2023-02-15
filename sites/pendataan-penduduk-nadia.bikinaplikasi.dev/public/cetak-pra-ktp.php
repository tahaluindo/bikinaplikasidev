<?php 
	include_once "cek-login.php";
?>

<html>
<head>

	<title>Pendaftaran KTP | Dukcapil Muaro Jambi</title>
</head>
	<link rel="stylesheet"type="text/css" href="css/bootstrap.min.css">
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
<body>
 
	<center>
 
		<h2>DAFTAR PEMOHON KTP</h2>
 
		<form method="post"action="cetak-lap-ktp.php">
			<label>PILIH TANGGAL DATA YANG AKAN DICETAK : </label>
			<input type="date" name="tanggal" >
			<input type="submit" value="CETAK" name="cetak" class="btn btn-success btn-md" >
		</form>
		
		<?php 
		include 'config.php';
		?>
 
		<br/><br/><br/>

 
		<table class="table table-bordered table-striped table-sm">
		<thead class="thead-dark" align="center">
			<tr>
            <th class="align-middle" ><small>No</small></th>
            <th class="align-middle"width="100px" ><small>Tanggal</small></th>
            <th class="align-middle" width="170px"><small>NIK</small></th>
            <th class="align-middle" width="150px"><small>Nama</small></th>
            <th class="align-middle"><small>Kel/Desa</small></th>
            <th class="align-middle"><small>Jam Terima</small></th>
			<th class="align-middle"><small>Status</small></th>
			<th class="align-middle"><small >Ket</small></th>


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
				$sql = mysqli_query($db,"select * from daftar_ktp where tanggal='$tgl'");
			}else
			{
				$sql = mysqli_query($db,"select * from daftar_ktp where tanggal='$tanggal_skrg'");
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
				<td><small><?php echo $data['nik']; ?></small></td>
				<td><small><?php echo $data['nama']; ?></small></td>
				<td><small><?php echo $data['desa']; ?></small></td>
				<td><small><?php echo $data['jam_terima']; ?></small></td>
				<small><?php	
					echo"<td style=\"$tdstyle\">";
					echo $data['status'];
				?>
				<td><small><?php echo $data['ket']; ?></small></td>
				</small>
					
			</tr>
			</small></p>
			<?php 
			}
			?>
		</tbody>
		</table>
 
	</center>
	<script>
	//	window.print();
	</script>
</body>
</html>
