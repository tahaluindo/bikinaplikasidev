<?php 
	include_once "cek-login.php";
?>

<?php

    include("config.php");
    $password = md5($_POST['password']);

	// buat query
    $sql = "UPDATE `users` SET nama = '$_POST[nama]', `password`='$password' where username='$_POST[username]'";
    $query = mysqli_query($db, $sql);

    if($query) {
        echo ('<script>alert("Berhasil mengupdate profile"); location.href = "index.php"; </script>');
    } else {
        echo ('<script>alert("Gagal mengupdate profile"); location.href = "form-ubah-profile-admin.php"; </script>');
    }