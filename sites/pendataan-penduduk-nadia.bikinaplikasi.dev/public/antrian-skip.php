<?php 
	include_once "cek-login.php";
?>

<?php

include("config.php");
    // ambil data dari formulir
	 $id = $_GET['id'];

    // buat query update
    $sql = "UPDATE antrian SET status='Skip' where id = '$_GET[id]'";
    $query = mysqli_query($db, $sql);

    // apakah query update berhasil?
    if( $query ) {
        // kalau berhasil alihkan ke halaman list.php
        header('Location: perekaman-antrian.php');
    } else {
        // kalau gagal tampilkan pesan
        die("Gagal menyimpan perubahan...");
    }
?>