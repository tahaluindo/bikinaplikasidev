<?php 

setcookie("id", $data['id'], time() - 7200); 
setcookie("nama", $data['nama'], time() - 7200);
setcookie("username", $data['username'], time() - 7200);

header('location: login.php');