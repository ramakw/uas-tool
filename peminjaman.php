<?php
include 'config.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Data Peminjaman</title>
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
        <h2>Data Peminjaman</h2>
        <div class="d-flex justify-content-between mb-3">
        <a href="index.php" class="btn btn-primary mb-3">Kembali</a>
        <a href="tambah_peminjaman.php" class="btn btn-primary mb-3">Tambah Peminjaman</a>
        </div>
        
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID Peminjaman</th>
                    <th>Judul Buku</th>
                    <th>Peminjam</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT p.*, b.judul, a.nama 
                         FROM peminjaman p 
                         JOIN buku b ON p.id_buku = b.id_buku 
                         JOIN anggota a ON p.id_anggota = a.id_anggota";
                $result = mysqli_query($conn, $query);
                
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>".$row['id_peminjaman']."</td>";
                    echo "<td>".$row['judul']."</td>";
                    echo "<td>".$row['nama']."</td>";
                    echo "<td>".$row['tanggal_pinjam']."</td>";
                    echo "<td>".$row['tanggal_kembali']."</td>";
                    echo "<td>".$row['status']."</td>";
                    echo "<td>";
                    if($row['status'] == 'Dipinjam') {
                        echo "<a href='pengembalian.php?id=".$row['id_peminjaman']."' class='btn btn-success btn-sm'>Kembalikan</a>";
                    }
                    echo "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>