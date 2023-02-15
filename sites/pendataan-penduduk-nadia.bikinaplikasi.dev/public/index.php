<?php require_once "cek-login.php"; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Pendaftaran Kartu Keluarga | Dukcapil Muaro Jambi</title>
	<link rel="stylesheet"type="text/css" href="css/bootstrap.min.css">
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
</head>

<body>

<div class="card text-center">
  <div class="card-header">
    
  </div>
  <div class="card-body col-md-4 offset-md-4">
    <h5 class="card-title">Pelayanan Pendaftaran</h5>
    <p class="card-text">Dinas Kependudukan dan Pencatatan Sipil Kabupaten Muaro Jambi</p>

    <a href="form-daftar-kk.php" class="btn btn-primary btn-sm btn-block">Daftar KK</a>
	<a href="list-kk.php" class="btn btn-primary btn-sm btn-block">Sudah Daftar KK</a>

	<a href='form-daftar-ktp.php' class='btn btn-primary btn-sm btn-block'>Daftar Cetak KTP</a>
	<a href='list-ktp.php' class='btn btn-primary btn-sm btn-block'>Sudah Tercetak KTP</a>

	<a href='form-list-daftar-akte.php' class='btn btn-primary btn-sm btn-block'>Daftar AKTE</a>
	<a href='form-list-sudah-daftar-akte.php' class='btn btn-primary btn-sm btn-block'>Sudah Daftar AKTE</a>

	<a href='perekaman-antrian.php' class='btn btn-primary btn-sm btn-block'>Antrian</a>

	<a href='form-daftar-surat-pindah-cari-kk.php' class='btn btn-primary btn-sm btn-block'>Pendaftaran Surat Pindah</a>
	<a href='list-surat-pindah.php' class='btn btn-primary btn-sm btn-block'>Sudah Daftar Surat Pindah</a>

	<a href='form-tambah-admin.php' class='btn btn-primary btn-sm btn-block'>Tambah Admin</a>
	<a href='form-ubah-profile-admin.php' class='btn btn-primary btn-sm btn-block'>Ubah Profile</a>
	
	<a href='logout.php' class='btn btn-danger btn-sm btn-block' onclick='return confirm("Yakin akan logout?");'>LOGOUT</a>

	<?php
	$ip_num = $_SERVER['REMOTE_ADDR']; //untuk mendeteksi alamat IP
	$host_name = gethostbyaddr($_SERVER['REMOTE_ADDR']); //untuk mendeteksi computer name
	if ($host_name == "MASLUT-PC" or $host_name == "SEKRE1-PC")
	{
		echo "<a href='form-daftar-ktp.php' class='btn btn-warning'>Daftar KTP</a>
			  <a href='list-ktp.php' class='btn btn-warning'>Sudah Daftar KTP</a>";
		
			  echo "<a href='form-daftar-ktp.php' class='btn btn-warning'>Daftar AKTE</a>
			  <a href='list-ktp.php' class='btn btn-warning'>Sudah Daftar AKTE</a>";

			  echo "<a href='form-daftar-ktp.php' class='btn btn-warning'>PEREKAMAN ANTRIAN</a>";

			  echo "<a href='form-daftar-ktp.php' class='btn btn-warning'>PENDAFTARAN SURAT PINDAH</a>";

			  echo "<a href='form-daftar-ktp.php' class='btn btn-warning'>PERCETAKAN KTP</a>";
	}
	
	?>
  </div>
  <div class="card-footer text-muted">
    MS 2019
  </div>
</div>

<div class="text-center">
<h3><p class="text-success  ">
		<?php if(isset($_GET['status'])): ?>
			
				<?php
					if($_GET['status'] == 'sukses'){
						echo "Pendaftaran berhasil!";
					} else {
						echo "Pendaftaran gagal!";
					}
				?>
    
<?php endif; ?>
</p></h2>
</div>

    </body>
</html>