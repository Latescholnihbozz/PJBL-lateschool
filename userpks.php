<?php
// koneksi ke database
$conn=mysqli_connect("localhost","root","","pks");

// ambil data dari tabel mahasiswa / query data mahasiswa
$result =mysqli_query($conn,"SELECT * FROM user");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="userpks.css" />
    <!-- <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    /> -->
    <title>pks</title>
</head>

<body style="background-color: #0f1035">
    <nav class="navbar">
        <ul>
            <div class="container">
                <img class="logo" src="smk8-removebg-preview.png" alt="smk8-removebg-preview" />
                <a class="bd">PKS SMKN 8 SEMARANG</a>
                <img class="logo" src="profile-removebg-preview.png" alt="profile_pks-removebg-preview" />
            </div>
        </ul>
    </nav>
    <div class="form">
        <form action="" method="post" class="kiko">
            <input type="pass" placeholder="NAMA LENGKAP" required />
            <i class="bx bxs-lock-alt"></i>
            <input type="pass" placeholder="KELAS" required />
            <i class="bx bxs-lock-alt"></i>
            <select id="pelanggaran" name="PELANGGARAN">
                <option value="pelanggaran...">PELANGGARAN...</option>
                <option value="dasi">dasi</option>
                <option value="sepatu">sepatu</option>
                <option value="terlambat">terlambat</option>
                <option value="bed">bed</option>
            </select>
            <textarea class="box" type="pass" placeholder="ALASAN..." required></textarea>
        </form>
        <p></p>
        <form>
            <a href="" class="btn">Kembali</a>
            <!-- <button class="bx" type="submit">Submit</button><br /> -->
            <a href="index.php" class="btn" type="submit" role="button">Submit</a>
        </form>
    </div>
</body>

</html>