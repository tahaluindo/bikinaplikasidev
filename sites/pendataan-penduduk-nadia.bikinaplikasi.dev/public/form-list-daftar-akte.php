<?php 
	include_once "cek-login.php";
?>

<!DOCTYPE html>
<html>
<head>
    <title> Pendaftaran Akte</title>
</head>
<link rel="stylesheet"type="text/css" href="css/bootstrap.min.css">
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<body>
    <?php include("config.php"); ?>

    <header>
        
    </header>
		
<form action="proses-pendaftaran-akte.php" method="POST">
<div class="container">
  <div class="panel bg-primary text-white">
    <div class="panel panel-success" ><H3>Pendaftaran Akte</h3></div>
  </div>

        <a class="btn btn-primary" href='form-daftar-akte.php'>Akte Kelahiran</a>
        <a class="btn btn-primary" href='form-daftar-akte-kematian.php'>Akte Kematian</a>
        <a class="btn btn-primary" href='form-daftar-akte-perkawinan.php'>Akte Perkawinan</a>
        <a class="btn btn-primary" href='form-daftar-akte-perceraian.php'>Akte Perceraian</a>
	
<script>

        $("#kecamatan").change(function(){
            // variabel dari nilai combo box kendaraan
            var id_kec = $("#kecamatan").val();

            // Menggunakan ajax untuk mengirim dan dan menerima data dari server
            $.ajax({
                type: "POST",
                dataType: "html",
                url: "ambil-desa.php",
                data: "kecamatan="+id_kec,
                success: function(data){
                   $("#desa").html(data);
                }
            });
        });
    </script>

  </form>
</div>














    </body>
</html>


  



