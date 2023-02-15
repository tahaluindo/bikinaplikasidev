<?php 
	include_once "cek-login.php";
?>

<?php

	include("config.php");

	// buat query
	for ($i=3; $i < 500; $i++) { 
		
	    $sql = "INSERT INTO antrian (no) values ('$i')";
	    $query = mysqli_query($db, $sql);
	}