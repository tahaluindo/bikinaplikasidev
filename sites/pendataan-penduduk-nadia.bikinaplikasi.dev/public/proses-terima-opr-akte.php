<?php 
	include_once "cek-login.php";
?>

<?php

include("config.php");
date_default_timezone_set('Asia/Jakarta');
$tanggal = date('y-m-d');
$jam = date("H:i:s");
// cek apakah tombol simpan sudah diklik atau blum?
if(isset($_POST['simpan'])){

    // ambil data dari formulir
	$id = $_POST['id'];

    // buat query update
    $sql = "UPDATE daftar_akte SET jam_dtrm_opr='$jam', status='diterima' WHERE id=$id";
    $query = mysqli_query($db, $sql);

    // // apakah query update berhasil?
    // if( $query ) {
    //     // kalau berhasil alihkan ke halaman list.php
    //     header('Location: list-akte.php');
    // } else {
    //     // kalau gagal tampilkan pesan
    //     die("Gagal menyimpan perubahan...");
    // }

    if($query) {
        echo ('<script>alert("Berhasil menambah data"); location.href = "list-akte.php"; </script>');
    } else {
        echo ('<script>alert("Gagal menambah data"); window.history.back(); </script>');
    }


} else {
    die("Akses dilarang...");
}

?>