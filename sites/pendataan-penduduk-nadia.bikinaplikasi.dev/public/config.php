<?php

error_reporting(0);

$server = "localhost";
$user = "root";
$password = "";
$nama_database = "pendaftaran";

// $server = "uc13jynhmkss3nve.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
// $user = "xm9oyloqj89ee0rn";
// $password = "zzoij1jjx8inwzow";
// $nama_database = "y0rsxk96mjz1pbu7";

$db = mysqli_connect($server, $user, $password, $nama_database);

if( !$db ){
    die("Gagal terhubung dengan database: " . mysqli_connect_error());
}

?>