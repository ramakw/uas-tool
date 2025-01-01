<?php
include 'config.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Data Anggota</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php">Rental Manga Igu</a>
            <div class="navbar-nav">
                <a class="nav-link" href="buku.php">Data Buku</a>
                <a class="nav-link" href="anggota.php">Data Anggota</a>
                <a class="nav-link" href="peminjaman.php">Peminjaman</a>
                <a class="nav-link" href="about.php">About</a>
            </div>
        </div>
    </nav>
    <div class="container mt-4">
        <h2>Data Anggota</h2>
        <div class="d-flex justify-content-between mb-3">
        <a href="index.php" class="btn btn-primary mb-3">Kembali</a>
        <a href="tambah_anggota.php" class="btn btn-primary mb-3">Tambah Anggota</a>
        </div>
        
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID Anggota</th>
                    <th>Nama</th>
                    <th>Nomor Telepon</th>
                    <th>Email</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT * FROM anggota";
                $result = mysqli_query($conn, $query);
                
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>".$row['id_anggota']."</td>";
                    echo "<td>".$row['nama']."</td>";
                    echo "<td>".$row['no_telp']."</td>";
                    echo "<td>".$row['email']."</td>";
                    echo "<td>
                            <a href='edit_anggota.php?id=".$row['id_anggota']."' class='btn btn-warning btn-sm'>Edit</a>
                            <a href='hapus_anggota.php?id=".$row['id_anggota']."' class='btn btn-danger btn-sm'>Hapus</a>
                          </td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>