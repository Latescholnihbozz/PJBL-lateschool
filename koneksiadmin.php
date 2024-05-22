<?php
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "pks";

// Create connection
$kon = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($kon->connect_error) {
    die("Connection failed: " . $kon->connect_error);
}
?>