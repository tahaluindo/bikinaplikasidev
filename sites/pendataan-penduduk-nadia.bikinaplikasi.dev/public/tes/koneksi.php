<?php

$server = "localhost";
$user = "root";
$password = "";
$nama_database = "siakdb";

// $server = "10.15.5.24";
// $user = "siakoff";
// $password = "ora_off_05";
// $nama_database = "siakdb";

$db = mysqli_connect($server, $user, $password, $nama_database);

if( !$db ){
    die("Gagal terhubung dengan database: " . mysqli_connect_error());
}

?>