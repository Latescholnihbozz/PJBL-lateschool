<?php

$host = "localhost";
$user = "username";
$password = "password"; 
$db = "pks";

$kon = mysqli_connect($host, $user, $password, $db);    
if(!$kon){
    die("Koneksi Gagal:". mysqli_connect_error());    
}
?>