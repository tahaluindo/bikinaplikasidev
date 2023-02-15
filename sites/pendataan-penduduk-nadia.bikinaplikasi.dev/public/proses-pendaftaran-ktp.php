<?php 
	include_once "cek-login.php";
?>

<?php

include("config.php");
date_default_timezone_set('Asia/Jakarta');
$tanggal = date('y-m-d');
$jam = date("H:i:s");
$ip_num = $_SERVER['REMOTE_ADDR']; //untuk mendeteksi alamat IP
$host_name = gethostbyaddr($_SERVER['REMOTE_ADDR']); //untuk mendeteksi computer name

// cek apakah tombol daftar sudah diklik atau blum?
if(isset($_POST['daftar'])){

    // ambil data dari formulir
    $nik = $_POST['nik'];
    $nama = $_POST['nama'];
	$kec = $_POST['kec'];
    $desa = $_POST['desa'];

    // buat query
    $sql = "INSERT INTO daftar_ktp (tanggal,    nik,    nama,     kec,    desa,    jam_terima,  status,   ket, ip,        nama_pc) 
    						VALUE ('$tanggal', '$nik', '$nama',  '$kec', '$desa', '$jam',       '-',      '-', '$ip_num',  '$host_name')";
    $query = mysqli_query($db, $sql);

    // apakah query simpan berhasil?
    // if( $query ) {
    //     // kalau berhasil alihkan ke halaman index.php dengan status=sukses
    //     header('Location: index.php?status=sukses');
    // } else {
    //     // kalau gagal alihkan ke halaman indek.php dengan status=gagal
    //     header('Location: index.php?status=gagal');
    // }

    if($query) {
        echo ('<script>alert("Berhasil menambah data"); location.href = "list-ktp.php"; </script>');
    } else {
        echo ('<script>alert("Gagal menambah data"); window.history.back(); </script>');
    }



} else {
    die("Akses dilarang...");
}

?>