<?php 
	include_once "cek-login.php";
?>

<!DOCTYPE html>
<html>
<head>
    <title> Pendaftaran Surat Pindah Cari KK</title>
</head>
<link rel="stylesheet"type="text/css" href="css/bootstrap.min.css">
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<body>
    <?php include("config.php"); ?>

    <header>
        
    </header>
		
<form action="form-daftar-surat-pindah.php" method="POST">
    <div class="container">
        <div class="panel bg-primary text-white">
            <div class="panel panel-success" ><H3>Pencarian No KK Untuk Pendaftaran Surat Pindah</h3></div>
        </div>

        <table class="table  table-sm">
            <tr>
                <th width="200px">No KK:</th>
                <th><input type="text" required maxlength="16" class="form-control form-control-sm" name="no_kk" placeholder="No KK"  ></th>
            </tr> 	
        </table>

        <input type="submit" value="Cari" name="daftar"class="btn btn-success btn-md" />
  </form>
</div>
    </body>
</html>