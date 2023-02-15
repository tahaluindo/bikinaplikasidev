<?php 
	include_once "cek-login.php";
?>

<?php

include("config.php");

// cek apakah tombol simpan sudah diklik atau blum?
if(isset($_GET['id'])){

    // ambil data dari formulir
	 $id = $_GET['id'];

    // buat query update
    $sql = "UPDATE antrian SET status='sudah' WHERE id=$id";
    $query = mysqli_query($db, $sql);

    // apakah query update berhasil?
    if( $query ) {
        // kalau berhasil alihkan ke halaman list.php
        header('Location: perekaman-antrian.php');
    } else {
        // kalau gagal tampilkan pesan
        die("Gagal menyimpan perubahan...");
    }


} else {
    die("Akses dilarang...");
}

?>