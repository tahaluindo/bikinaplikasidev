<?php 
	include_once "cek-login.php";
?>

<?php

    include("config.php");

	// buat query
    $sql = "DELETE FROM daftar_ktp where id = '$_GET[id]'";
    $query = mysqli_query($db, $sql);

    if($query) {
        echo ('<script>alert("Berhasil menghapus data ktp"); location.href = "index.php"; </script>');
    } else {
        echo ('<script>alert("Gagal menghapus data ktp"); location.href = "list-ktp.php"; </script>');
    }