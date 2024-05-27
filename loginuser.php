<?php
require 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["username"]) && isset($_POST["password"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];
        
        $stmt = $kon->prepare("SELECT * FROM loginuser WHERE username = ? AND password = ?");
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            header("Location: ../user/userpks.php");
            exit;
        } else {
            echo "Username atau Password salah.";
        }
        
        $stmt->close();
    } else {
        echo "Data yang diperlukan tidak tersedia.";
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=, initial-scale=1.0" />
    <title>PKS login WEB</title>
    <link rel="stylesheet" href="../user/loginuser.css" />

    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />


</head>

<body>
    <div class="wrapper">
        <header class="header">
            <img src="../img/smk8-removebg-preview.png" class="logo" />
            <h1 class="judul">PKS SMK N 8 SEMARANG</h1>
        </header>

        <form action="../user/loginuser.php" method="post">
            <div class="input-box">
                <input type="text" placeholder="Username" required name="username" />
                <i class="bx bxs-user"></i>
            </div>

            <div class="input-box">
                <input type="password" placeholder="Password" required name="password" />
                <i class="bx bxs-lock-alt"></i>
            </div>
            <button class="btn" type="submit" name="login">Login</button>

        </form>
    </div>
</body>

</html>