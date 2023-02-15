<?php require_once "cek-login.php"; ?>

<?php
	include "config.php";
	//Perintah sql untuk menampilkan semua data pada tabel
	$sql="select * from antrian";
	$hasilSkip=mysqli_query($db,$sql);
	$hasilSudah=mysqli_query($db,$sql);

	// untuk mengatur antrian
	$sqlCekAntrian="select * from antrian where status = 'Sudah' Order By id DESC";
	$hasilCekAntrian=mysqli_query($db,$sqlCekAntrian);
	$dataCekAntrian = mysqli_fetch_array($hasilCekAntrian);

	$sqlAntrian="select * from antrian where id > $dataCekAntrian[id] and status = 'Belum'";
	$sqlAntrianAll="select * from antrian where status = 'Belum'";
	$hasilAntrian=mysqli_query($db,$sqlAntrian) === false ? mysqli_query($db,$sqlAntrianAll) : mysqli_query($db,$sqlAntrian);
	$dataAntrian = mysqli_fetch_array($hasilAntrian);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Perekaman Antrian</title>
	<link rel="stylesheet"type="text/css" href="css/bootstrap.min.css">
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
</head>

<body>

<div class="card text-center">
  <div class="card-header">
    
  </div>
  <div class="card-body">
    <div class="row">
    	<div class="col-md-12 text-center">
    		<strong>
    			Skip: 
    			<?php while ($dataSkip = mysqli_fetch_array($hasilSkip)): ?>
    				<?php if($dataSkip['status'] == 'Skip'): ?>
    					<a href="antrian-prosess-sudah.php?id=<?php echo $dataSkip['id']; ?>" onclick='return confirm("Yakin akan memproses antrian?")'><?php echo $dataSkip['no']; ?></a>,
	    			<?php endif; ?>
	    		<?php endwhile; ?>

			</strong>

			<br>

    		<strong>
	    		Sudah: 
	    		<?php while ($dataSudah = mysqli_fetch_array($hasilSudah)): ?>
    				<?php if($dataSudah['status'] == 'Sudah'): ?>
    					<?php echo $dataSudah['no']; ?>,
	    			<?php endif; ?>
	    		<?php endwhile; ?>
	    	</strong>

    		<h1 style="font-size: 180px;"><?php echo $dataAntrian['no'] ?? 0; ?></h1>
    		<div class="btn-group">
	    		<a class="btn btn-lg btn-secondary" href="index.php">
					<i class="fa fa-arrow-right"></i>
					Home
				</a>

				<a class="btn btn-lg btn-warning" href="antrian-reset.php"  onclick='return confirm("Yakin akan mereset antrian?")'>
					<i class="fa fa-arrow-right"></i>
					Reset
				</a>
	    		<a href="antrian-sudah.php?id=<?php echo $dataAntrian['id']; ?>" class="btn btn-lg btn-success"   onclick='return confirm("Yakin akan melanjutkan antrian?")'>
					<i class="fa fa-arrow-right"></i>
					Next
				</a>
				<a href="antrian-skip.php?id=<?php echo $dataAntrian['id']; ?>" class="btn btn-lg btn-info"   onclick='return confirm("Yakin akan skip antrian?")'>
					<i class="fa fa-arrow-right"></i>
					Skip
				</a>
    			
    		</div>
    	</div>
    </div>
  </div>
  <div class="card-footer text-muted">
    MS 2019
  </div>
</div>

    </body>
</html>