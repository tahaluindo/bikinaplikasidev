<?php 

if(!(isset($_COOKIE['id']) && !empty($_COOKIE['id']))) {
    header('location: login.php');
}