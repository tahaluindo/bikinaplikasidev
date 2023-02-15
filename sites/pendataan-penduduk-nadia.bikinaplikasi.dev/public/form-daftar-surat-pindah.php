<?php 
	include_once "cek-login.php";
    include "config.php";

    $sql="select * from daftar_kk where no_kk='$_POST[no_kk]'";
    $hasil=mysqli_query($db,$sql);
    $data = mysqli_fetch_array($hasil);

    if(!$data) {
        echo ('<script>alert("No KK Tidak Ditemukan"); location.href = "form-daftar-surat-pindah-cari-kk.php"; </script>');
    }
    
?>

<!DOCTYPE html>
<html>
<head>
    <title> Pendaftaran Surat Pindah | Dukcapil Muaro Jambi</title>
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
		
<form action="proses-pendaftaran-surat-pindah.php" method="POST">
<div class="container">
  <div class="panel bg-primary text-white">
    <div class="panel panel-success" ><H3>Pendaftaran Surat Pindah</h3></div>
  </div>

    <table class="table  table-sm"  id="form-daftar-surat-pindah">
        <tr>
            <th width="200px">No KK:</th>
            <th>
                <?php echo $_POST['no_kk']; ?>
                <input type="hidden" maxlength="16" class="form-control form-control-sm" name="no_kk" placeholder="No KK" value='<?php echo $_POST["no_kk"]; ?>' >
            </th>
        </tr> 

        <tr>
            <th width="200px">Kepala Keluarga:</th>
            <th>
                <?php echo $data['kepala_keluarga']; ?>
                <input type="hidden" maxlength="16" class="form-control form-control-sm" name="kepala_keluarga" placeholder="Kepala Keluarga" value='<?php echo $data["kepala_keluarga"]; ?>' >
            </th>
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
		<tr>
            <th>Penerima Bahan:</th>
            <th>
					<select required name="penerima" id="penerima" class="form-control form-control-sm" >
					<option value="">Pilih Penerima</option>
					<option>Devy</option>
					
					</select>
					</select>
			</th>
        </tr>
			<!-- <tr>
                <th>Jenis:</th>
                <th>
    					<select required name="jenis" id="jenis" class="form-control form-control-sm" >
    					<option value="">Pilih Pemohon</option>
    					<option>W</option>
    					<option>P</option>
    					</select>
    			</th>
            </tr> -->
		<tr>
            <th>Operator:</th>
            <th>
					<select required name="operator" id="operator" class="form-control form-control-sm" >
					<option value="">Pilih Operator</option>
					<option>Devy</option>
					<option>Mery</option>
					<option>Tati</option>
					
					</select>
					</select>
			</th>
        </tr>
		<tr>
            <th>Tgl/Jam Terima:</th>
            <th><input type="text" required class="form-control form-control-sm" id="alamat" placeholder="<?php date_default_timezone_set('Asia/Jakarta'); echo date('d-m-Y H:i:s');?>" disabled ></th>
        </tr>

        <tr>
           <td colspan="2">
               
           </td> 
        </tr>

        <tr>
           <td colspan="2">
               <button class="btn btn-sm btn-primary" id='add' type="button">+ Tambah Anggota Pindah</button>
           </td> 
        </tr>

        <tr data-index='0'>
            <th>Nama Anggota 1:</th>
            <th>
                <div class="row">
                    <div class="col-md-10">
                        <input name='nama_anggota[]' type="text" class="nama_anggota form-control form-control-sm" style="display: inline;">
                    </div>
                    <div class="col-md-2">
                        <button data-index='0' type='button' class='btn_hapus_nama_anggota btn btn-sm btn-danger btn-block' style="display: inline;" onclick='return confirm("Yakin akan menghapus data ini?")'>Hapus</button>
                    </div>
                </div>
            </th>
        </tr>
	
    </table>
<input type="submit" value="Daftar" name="daftar"class="btn btn-success btn-md" />

<script>
        $(document).on('click', '.btn_hapus_nama_anggota', function(e) {
            var index = $(this).data('index');

            $(`tr[data-index='${index}']`).remove();
        });

        //when the Add Field button is clicked
        var index = 1;
        $("#add").click(function (e) {
            //Append a new row of code to the "#items" div
            $("#form-daftar-surat-pindah").append(`
                <tr data-index='${index}'>
                    <th>Nama Anggota ${index + 1}:</th>
                    <th>
                        <div class="row">
                            <div class="col-md-10">
                                <input name='nama_anggota[]' type="text" class="nama_anggota form-control form-control-sm" style="display: inline;">
                            </div>
                            <div class="col-md-2">
                                <button type='button' class='btn_hapus_nama_anggota btn btn-sm btn-danger btn-block' style="display: inline;" data-index='${index}'  onclick='return confirm("Yakin akan menghapus data ini?")'>Hapus</button>
                            </div>
                        </div>
                    </th>
                </tr>
            `);

            index++;
        });

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