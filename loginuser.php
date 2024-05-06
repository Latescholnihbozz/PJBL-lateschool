<?php
require 'koneksi.php';
$user = query("SELECT * FROM user");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=, initial-scale=1.0" />
    <title>PKS login WEB</title>
    <link rel="stylesheet" href="loginuser.css" />
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
</head>

<body>
    <div class="wrapper">
        <header class="header">
            <img src="smk8-removebg-preview.png" />
            <h1 class="judul">PKS SMK N 8 SEMARANG</h1>
        </header>

        <form action="">
            <div class="input-box">
                <input type="text" placeholder="Username" required />
                <i class="bx bxs-user"></i>
            </div>

            <div class="input-box">
                <input type="password" placeholder="Password" required />
                <i class="bx bxs-lock-alt"></i>
            </div>
            <!-- <a type="submit" class="btn">Login</a> -->
            <a href="userpks.php" type="submit" class="btn" role="button">Login</a>
        </form>
    </div>
</body>

</html>