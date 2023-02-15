<?php 
	include_once "cek-login.php";
?>

<!DOCTYPE html>
<html>
<head>
    <title> Pendaftaran KTP | Dukcapil Muaro Jambi</title>
</head>
<link rel="stylesheet"type="text/css" href="css/bootstrap.min.css">
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<body>
<?php
	#koneksi ke database
    include("config.php");
?>
    <header>
        
    </header>

<!--  ------------------------------------------ -->  

		
		
<form action="proses-pendaftaran-ktp.php" method="POST">
<div class="container">
  <div class="panel bg-primary text-white">
    <div class="panel panel-success" ><H3>Pendaftaran KTP</h3></div>
  </div>

    <table class="table  table-sm">
        <tr>
            <th width="200px">NIK:</th>
            <th><input type="text" required maxlength="16" class="form-control form-control-sm" name="nik" placeholder="NIK"  ></th>
        </tr> 
		<tr>
            <th width="200px">Nama:</th>
            <th><input type="text" required maxlength="30" class="form-control form-control-sm" name="nama" placeholder="Nama"  ></th>
        </tr>
		<tr>
            <th>Kecamatan:</th>
            <th>
			<select class="form-control" name="kec" id="kecamatan">
                <?php
						include "config.php";
						//Perintah sql untuk menampilkan semua data pada tabel jurusan
						$sql="select * from kecamatan";
						$hasil=mysqli_query($db,$sql);
						while ($data = mysqli_fetch_array($hasil)) {
                    ?>
                    <option  value="<?php echo $data['id_kec'];?>"><?php echo $data['kecamatan'];?></option>
                    <?php
                }
                ?>
            </select>
			</th>
        </tr>
		<tr>
            <th>Kel/Desa:</th>
            <th>
					<select class="form-control" name="desa" id="desa">
					<!-- Nama dea akan diload menggunakan ajax, dan ditampilkan disini -->
					</select>
			</th>
        </tr>
		<!--<tr>
            <th>Penerima Bahan:</th>
            <th>
					<select required name="penerima" id="penerima" class="form-control form-control-sm" >
					<option value="">Pilih Penerima</option>
					<option>Nando</option>
					<option>Yanti</option>
					<option>Widya</option>
					<option>May</option>
					<option>Mita</option>
					<option>Komar</option>
					<option>Satri</option>
					<option>Febi</option>
					<option>Yeni</option>
					</select>
					</select>
			</th>
        </tr>
			<tr>
            <th>Jenis:</th>
            <th>
					<select required name="jenis" id="jenis" class="form-control form-control-sm" >
					<option value="">Pilih Pemohon</option>
					<option>W</option>
					<option>P</option>
					</select>
			</th>
        </tr>
		<tr>
            <th>Operator:</th>
            <th>
					<select required name="operator" id="operator" class="form-control form-control-sm" >
					<option value="">Pilih Operator</option>
					<option>Widya</option>
					<option>May</option>
					<option>Mita</option>
					<option>Komar</option>
					<option>Satri</option>
					<option>Febi</option>
					<option>Yeni</option>
					</select>
					</select>
			</th>
        </tr>-->
		<tr>
            <th>Tgl/Jam Terima:</th>
            <th><input type="text" required class="form-control form-control-sm" id="alamat" placeholder="<?php date_default_timezone_set('Asia/Jakarta'); echo date('d-m-Y     H:i:s');?>" disabled ></th>
        </tr>
	
    </table>
<input type="submit" value="Daftar" name="daftar"class="btn btn-success btn-md" />

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


  



