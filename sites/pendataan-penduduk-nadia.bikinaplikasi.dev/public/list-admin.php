<?php 
	include_once "cek-login.php";
?>

<?php include("config.php"); ?>

<!DOCTYPE html>
<html>
<head>
	<meta http-equiv=refresh content=10;url=list-admin.php>
    <title>Pendaftaran Kartu Keluarga | Dukcapil Muaro Jambi</title>
</head>
<link rel="stylesheet"type="text/css" href="css/bootstrap.min.css">
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>


<body>
    <header>
        <h3>Warga yang sudah mendaftar</h3>
    </header>

    <nav>
		<a href="form-daftar.php" class="btn btn-primary">Daftar Baru</a>
    </nav>

    <br>


		<form method="get">
			<label>PILIH TANGGAL : </label>
			<input type="date" name="tanggal">
			<input type="submit" value="FILTER">
		</form>
		
		
    <table class="table table-bordered table-striped table-sm">
		<thead class="thead-dark">
        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Nama KK</th>
            <th>Kecamatan</th>
            <th>Kel/Desa</th>
            <th>Penerima</th>
            <th>Jam Terima</th>
			<th>Operator</th>
			<th>Diterima operator</th>
			<th >Selesai operator</th>
			<th>Status</th>
			<th>Keterangan</th>
			<th>Operasi</th>
        </tr>
		</thead>
		<tbody>


        <?php
		date_default_timezone_set('Asia/Jakarta');
		$tanggal = date('y-m-d');
		$jam = date("H:i:s");
		$no = 1;
        $sql = "SELECT * FROM daftar_kk where tanggal='$tanggal'";
		//$sql = "SELECT * FROM daftar_kk";
        $query = mysqli_query($db, $sql);
		
		
		
		

        while($warga = mysqli_fetch_array($query)){
            echo "<tr>";

            echo "<td>".$no++."</td>";
            echo "<td>".$warga['tanggal']."</td>";
            echo "<td>".$warga['no_kk']."</td>";
            echo "<td>".$warga['kec']."</td>";
            echo "<td>".$warga['kel']."</td>";
            echo "<td>".$warga['penerima']."</td>";
	    echo "<td>".$warga['jam_terima']."</td>";
            echo "<td>".$warga['operator']."</td>";
            echo "<td>".$warga['jam_dtrm_opr']."</td>";
            echo "<td>".$warga['jam_slsai_opr']."</td>";
            echo "<td>".$warga['status']."</td>";
	    echo "<td>".$warga['ket']."</td>";

            echo "<td>";
            echo "<a href='form-edit.php?id=".$warga['id']." '>Edit</a> | ";
			echo "<a href='form-keterangan.php?id=".$warga['id']."'>Ket</a> | ";
			echo "<a href='hapus.php?id=".$warga['id']."' onClick=\"return confirm('Yo nian nak dihapus ?')\">Hapus</a>";
            echo "</td>";

            echo "</tr>";
        }
        ?>

    </tbody>
    </table>

    <p>Total: <?php echo mysqli_num_rows($query) ?></p>
	
    </body>
</html>