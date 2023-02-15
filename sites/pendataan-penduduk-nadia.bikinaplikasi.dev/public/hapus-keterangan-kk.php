<?php 
	include_once "cek-login.php";
?>

<?php

    include("config.php");

	// buat query
    $sql = "DELETE FROM daftar_kk where id = '$_GET[id]'";
    $query = mysqli_query($db, $sql);

    if($query) {
        echo ('<script>alert("Berhasil menghapus kk"); location.href = "index.php"; </script>');
    } else {
        echo ('<script>alert("Gagal menghapus kk"); location.href = "list-kk.php"; </script>');
    }