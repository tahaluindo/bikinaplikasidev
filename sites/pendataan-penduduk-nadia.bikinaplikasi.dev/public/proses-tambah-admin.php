<?php 
	include_once "cek-login.php";
?>

<?php

    include("config.php");
    $password = md5($_POST['password']);

	// buat query
    $sql = "INSERT INTO `users` (nama,username, password) values ('$_POST[nama]','$_POST[username]', '$password')";
    $query = mysqli_query($db, $sql);

    if($query) {
        echo ('<script>alert("Berhasil menambah admin"); location.href = "index.php"; </script>');
    } else {
        echo ('<script>alert("Gagal menambah admin"); location.href = "form-tambah-admin.php"; </script>');
    }