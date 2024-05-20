<?php
 session_start();
 include 'koneksi.php';

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = mysqli_query($kon, "SELECT * FROM loginpks 
             WHERE username = '$username' and password = '$password'");
             
    $row = mysqli_fetch_array($result);

if(is_array($row)){
    $_SESSION['username'] = $row['username'];
    $_SESSION['password'] = $row['password'];
    header('Location:../user/userpks.php');
}else{
    echo "Login GAGAL";
    }
}




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
            <img src="../user/smk8-removebg-preview.png" class="logo" />
            <h1 class=>PKS SMK N 8 SEMARANG</h1>
        </header>

        <form action="../user/userpks.php" method="post">
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