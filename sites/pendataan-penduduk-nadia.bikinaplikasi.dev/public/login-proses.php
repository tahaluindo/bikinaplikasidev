<?php 

error_reporting(0);

include "config.php";

$password = md5($_POST['password']);
$sql="select * from users where username = '$_POST[username]' and password = '$password'";

$hasil=mysqli_query($db,$sql);
$data = mysqli_fetch_array($hasil);

if(!$data) {
    echo ('<script>alert("Username atau password salah"); location.href = "login.php"; </script>');
    
} else {
    setcookie("id", $data['id'], time() + 7200); 
    setcookie("nama", $data['nama'], time() + 7200);
    setcookie("username", $data['username'], time() + 7200);

    header('location: index.php');
}

