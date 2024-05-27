<?php
require 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["nama_lengkap"]) && isset($_POST["kelas"]) && isset($_POST["pelanggaran"]) && isset($_POST["alasan"])) {
        $nama_lengkap = $_POST["nama_lengkap"];
        $kelas = $_POST["kelas"];
        $pelanggaran = $_POST["pelanggaran"];
        $alasan = $_POST["alasan"];

        $query_sql = "INSERT INTO user (nama_lengkap, kelas, pelanggaran, alasan) VALUES ('$nama_lengkap', '$kelas', '$pelanggaran', '$alasan')";

        if (mysqli_query($kon, $query_sql)) {
            header("Location: tambahpel.php");
            exit;
        } else {
            echo "Error: " . mysqli_error($kon);
        }
    } else {
        echo "Data yang diperlukan tidak tersedia.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../user/userpks.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" />
    <title>pks</title>
</head>

<body style="background-color: #0f1035">
    <nav class="navbar">
        <div class="container">
            <img class="logo" src="../img/smk8-removebg-preview.png" alt="foto_logo_smk8" />
            <p class="bd mx-3" style="font-size: 25px;">PKS SMKN 8 SEMARANG</p>
            <!-- <img class="logo" src="../user/fotoperson-removebg-preview.png" alt="fotoperson" /> -->
        </div>
    </nav>
    <div class="container ">
        <div class="form">
            <form action="../user/userpks.php" method="post" class="kiko">
                <input type="text" name="nama_lengkap" placeholder="NAMA LENGKAP" class="form-control mb-2" required />
                <i class="bx bxs-lock-alt"></i>
                <input type="text" name="kelas" placeholder="KELAS" class="form-control mb-2" required />
                <i class="bx bxs-lock-alt"></i>
                <select id="pelanggaran" name="pelanggaran" class="form-control mb-2" required>
                    <option value="">PELANGGARAN...</option>
                    <option value="dasi">Dasi</option>
                    <option value="sepatu">Sepatu</option>
                    <option value="terlambat">Terlambat</option>
                    <option value="bed">Bed</option>
                </select>
                <textarea class="form-control" rows="4" name="alasan" placeholder="ALASAN..." required></textarea>
                <div class="d-flex justify-content-between">
                    <a href="loginuser.php" class="btn btn-secondary">Kembali</a>
                    <button href="tambahpel.php" type="submit" name="submit" class="btn btn-primary">Submit</button>
                </div>

            </form>
        </div>
    </div>
</body>

</html>