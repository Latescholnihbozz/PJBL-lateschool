<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../admin/admin.css" />
    <style>
    .header {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        align-items: center;
        padding: 20px;
        background-color: #0f1035;
        color: white;
    }

    .header img {
        width: 110px;
        height: 100px;
        margin-bottom: 10px;
    }

    .judul {
        font-family: "Poppins", sans-serif;
        flex: 1;
        text-align: center;
    }

    .search-form {
        display: flex;
        align-items: center;
        flex-wrap: wrap;
    }

    .search-form input {
        margin-right: 10px;
        margin-bottom: 10px;
    }

    .container {
        margin-top: 30px;
    }

    .table {
        background-color: #dcf2f1;
        color: #021918;
    }
    </style>
</head>

<body>
    <header class="header">
        <img src="../img/smk8-removebg-preview.png" alt="Logo SMK N 8 Semarang">
        <div class="judul">
            <h1 class="pks">PKS</h1>
            <h1 class="nama">SMK N 8 SEMARANG</h1>
        </div>
        <form class="search-form" method="post" action="">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Cari..."
                    value="<?php echo isset($_POST['search']) ? htmlspecialchars($_POST['search']) : ''; ?>">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-info">Cari</button>
                </div>
            </div>
        </form>

    </header>
    <div class="container mt-5">
        <?php
        include "koneksiadmin.php";

        // Inisialisasi variabel $search
        $search = '';

        // Cek apakah ada kiriman form dari method post untuk pencarian data
        if (isset($_POST['search'])) {
            $search = htmlspecialchars($_POST['search']);
        }

        // Cek apakah ada kiriman form dari method get untuk penghapusan data
        if (isset($_GET['id_user'])) {
            $id_user = htmlspecialchars($_GET['id_user']);

            $sql = "DELETE FROM user WHERE id_user='$id_user'";
            $hasil = mysqli_query($kon, $sql);

            // Kondisi apakah berhasil atau tidak
            if ($hasil) {
                echo "<div class='alert alert-success'>Data berhasil dihapus. Mengalihkan...</div>";
                echo "<meta http-equiv='refresh' content='2;url=admin.php'>";
            } else {
                echo "<div class='alert alert-danger'>Data gagal dihapus.</div>";
            }
        }

        $sql = "SELECT * FROM user WHERE nama_lengkap LIKE '%$search%' OR kelas LIKE '%$search%' OR pelanggaran LIKE '%$search%' OR alasan LIKE '%$search%' ORDER BY id_user DESC";
        $hasil = mysqli_query($kon, $sql);
        ?>

        <table class="table table-bordered mt-3">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Nama Lengkap</th>
                    <th scope="col">Kelas</th>
                    <th scope="col">Pelanggaran Atribut</th>
                    <th scope="col">Alasan Terlambat</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (mysqli_num_rows($hasil) > 0) {
                    while ($data = mysqli_fetch_array($hasil)) {
                ?>
                <tr>
                    <td><?php echo htmlspecialchars($data["nama_lengkap"]); ?></td>
                    <td><?php echo htmlspecialchars($data["kelas"]); ?></td>
                    <td><?php echo htmlspecialchars($data["pelanggaran"]); ?></td>
                    <td><?php echo htmlspecialchars($data["alasan"]); ?></td>
                    <td>
                        <div class="btn-group">
                            <a href="editadmin.php?id_user=<?php echo htmlspecialchars($data['id_user']); ?>"
                                class="btn btn-warning">Edit</a>
                            &nbsp;&nbsp;&nbsp;
                            <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>?id_user=<?php echo htmlspecialchars($data['id_user']); ?>"
                                class="btn btn-danger"
                                onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">Hapus</a>
                        </div>
                    </td>
                </tr>
                <?php
                    }
                } else {
                    echo "<tr><td colspan='5' class='text-center'>Data tidak ditemukan</td></tr>";
                }
                ?>
            </tbody>
        </table>
        <a href="../admin/haladmin.php" class="btn btn-primary" role="button">Submit</a>
    </div>
</body>

</html>