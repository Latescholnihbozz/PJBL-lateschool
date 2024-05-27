<?php
require 'koneksiadmin.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["user_admin"]) && isset($_POST["password"])) {
        $user_admin = $_POST["user_admin"];
        $password = $_POST["password"];
        
        // Prepared statement untuk menghindari SQL Injection
        $stmt = $kon->prepare("SELECT * FROM loginadmin WHERE user_admin = ? AND password = ?");
        $stmt->bind_param("ss", $user_admin, $password);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            header("Location: ../admin/admin.php");
            exit;
        } else {
            $error = "Username atau Password salah.";
        }
        
        $stmt->close();
    } else {
        $error = "Data yang diperlukan tidak tersedia.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PKS login WEB</title>
    <link rel="stylesheet" href="../admin/loginadmin.css" />
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
</head>

<body>
    <div class="wrapper">
        <header class="header">
            <img src="../img/smk8-removebg-preview.png" class="logo" />
            <h1 class="judul">PKS SMK N 8 SEMARANG</h1>
        </header>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="input-box">
                <input type="text" placeholder="Admin" required name="user_admin" />
                <i class="bx bxs-user"></i>
            </div>

            <div class="input-box">
                <input type="password" placeholder="Password" required name="password" />
                <i class="bx bxs-lock-alt"></i>
            </div>
            <button class="btn" type="submit" name="login">Login</button>
            <?php if(isset($error)) { echo "<p class='error'>$error</p>"; } ?>
        </form>
    </div>
</body>

</html>