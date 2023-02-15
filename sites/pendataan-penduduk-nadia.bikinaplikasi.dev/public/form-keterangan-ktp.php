<?php 
	include_once "cek-login.php";
?>

<?php

include("config.php");
date_default_timezone_set('Asia/Jakarta');
$tanggal = date('y-m-d');
$jam = date("H:i:s");

// kalau tidak ada id di query string
if( !isset($_GET['id']) ){
    header('Location: list-ktp.php');
}

//ambil id dari query string
$id = $_GET['id'];

// buat query untuk ambil data dari database
$sql = "SELECT * FROM daftar_ktp WHERE id=$id";
$query = mysqli_query($db, $sql);
$warga = mysqli_fetch_assoc($query);

// jika data yang di-edit tidak ditemukan
if( mysqli_num_rows($query) < 1 ){
    die("data tidak ditemukan...");
}

?>


<!DOCTYPE html>
<html>
<head>
    <title>Keterangan</title>
	<link rel="stylesheet"type="text/css" href="css/bootstrap.min.css">
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
</head>

<body>
<form action="proses-keterangan-ktp.php" method="POST">
 <input type="hidden" name="id" value="<?php echo $warga['id'] ?>" />
<div class="container">
  <div class="panel bg-primary text-white">
    <div class="panel panel-success" ><H3>keterangan</h3></div>
  </div>


    <table class="table  table-sm">
        <tr>
            <th width="200px">NIK:</th>
            <th><?php echo $warga['nik'] ?></th>
        </tr> 
		<tr>
            <th>Nama:</th>
            <th><?php echo $warga['nama'] ?></th>
        </tr>
		<tr>
            <th>Kel/Desa:</th>
            <th><?php echo $warga['desa'] ?></th>
        </tr>
		<tr>
            <th>Jam Terima:</th>
            <th><?php echo $warga['jam_terima'] ?></th>
        </tr>

		<tr>
            <th>Keterangan:</th>
            <th><textarea name="ket"><?php echo $warga['ket'] ?></textarea></th>
        </tr>
    </table>
<input type="submit" value="Simpan" name="simpan"class="btn btn-success btn-md" />
  </form>


    </body>
</html>