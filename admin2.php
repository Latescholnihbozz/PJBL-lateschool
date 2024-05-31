<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data User</title>
    <link rel="stylesheet" href="../admin/admin.css">
</head>

<body>
    <header class="header">
        <div class="judul">
            <img src="../img/smk8-removebg-preview.png" alt="Logo SMK N 8 Semarang">
            <p class="namasmk"><span class="span">PKS</span> <br> SMKN 8 SEMARANG</p>
        </div>
        <form class="headermencari" method="post" action="">
            <div class="boxcari">
                <input type="text" name="search" class="search" placeholder="Cari" value="<?php echo isset($_POST['search']) ? htmlspecialchars($_POST['search']) : ''; ?>">
                <input type="date" name="search_date" class="search" placeholder="Tanggal">
                <input type="week" name="search_week" class="search" placeholder="Minggu">
                <input type="month" name="search_month" class="search" placeholder="Bulan">
                <div class="input-group-append">
                    <button type="submit" class="mencari">Cari</button>
                </div>
            </div>
        </form>
    </header>
    <div class="container mt-5">
        <?php
        include "koneksiadmin.php";

        // Inisialisasi variabel pencarian
        $search = '';
        $search_date = '';
        $search_week = '';
        $search_month = '';

        // Cek apakah ada kiriman form dari method post untuk pencarian data
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $search = htmlspecialchars($_POST['search']);
            $search_date = htmlspecialchars($_POST['search_date']);
            $search_week = htmlspecialchars($_POST['search_week']);
            $search_month = htmlspecialchars($_POST['search_month']);
        }

        // Buat query pencarian berdasarkan input yang diterima
        $conditions = [];
        if ($search) {
            $conditions[] = "(jam LIKE '%$search%' OR tanggal LIKE '%$search%' OR nama_lengkap LIKE '%$search%' OR kelas LIKE '%$search%' OR pelanggaran LIKE '%$search%' OR alasan LIKE '%$search%')";
        }
        if ($search_date) {
            $conditions[] = "tanggal = '$search_date'";
        }
        if ($search_week) {
            $start_week = date("Y-m-d", strtotime($search_week));
            $end_week = date("Y-m-d", strtotime($search_week . ' +6 days'));
            $conditions[] = "tanggal BETWEEN '$start_week' AND '$end_week'";
        }
        if ($search_month) {
            $conditions[] = "DATE_FORMAT(tanggal, '%Y-%m') = '$search_month'";
        }

        $where_clause = !empty($conditions) ? 'WHERE ' . implode(' AND ', $conditions) : '';
        $sql = "SELECT * FROM user $where_clause ORDER BY id_user DESC";
        $hasil = mysqli_query($kon, $sql);

        // Cek apakah ada kiriman form untuk menghapus data
        if (isset($_POST['delete_id'])) {
            $delete_id = htmlspecialchars($_POST['delete_id']);
            $sql_delete = "DELETE FROM user WHERE id_user='$delete_id'";
            mysqli_query($kon, $sql_delete);
            header("Location: admin.php");
        }
        ?>

        <table class="table">
            <thead class="thead" cellspacing="0">
                <tr>
                    <th scope="col">Jam</th>
                    <th scope="col">Tanggal</th>
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
                    <td><?php echo htmlspecialchars($data["jam"]); ?></td>
                    <td><?php echo htmlspecialchars($data["tanggal"]); ?></td>
                    <td><?php echo htmlspecialchars($data["nama_lengkap"]); ?></td>
                    <td><?php echo htmlspecialchars($data["kelas"]); ?></td>
                    <td><?php echo htmlspecialchars($data["pelanggaran"]); ?></td>
                    <td><?php echo htmlspecialchars($data["alasan"]); ?></td>
                    <td>
                        <form method="post" action="" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                            <input type="hidden" name="delete_id" value="<?php echo htmlspecialchars($data['id_user']); ?>">
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
                <?php
                    }
                } else {
                    echo "<tr><td colspan='7' class='text-center'>Data tidak ditemukan</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>
