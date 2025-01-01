<?php
include 'config.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Data Buku</title>
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
        <h2>Data Buku</h2>
        <div class="d-flex justify-content-between mb-3">
        <a href="index.php" class="btn btn-primary mb-3">Kembali</a>
        <a href="tambah_buku.php" class="btn btn-primary mb-3">Tambah Buku</a>
        </div>
        
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID Buku</th>
                    <th>Judul</th>
                    <th>Pengarang</th>
                    <th>Penerbit</th>
                    <th>Tahun</th>
                    <th>Stok</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT * FROM buku";
                $result = mysqli_query($conn, $query);
                
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>".$row['id_buku']."</td>";
                    echo "<td>".$row['judul']."</td>";
                    echo "<td>".$row['pengarang']."</td>";
                    echo "<td>".$row['penerbit']."</td>";
                    echo "<td>".$row['tahun_terbit']."</td>";
                    echo "<td>".$row['stok']."</td>";
                    echo "<td>".$row['status']."</td>";
                    echo "<td>
                            <a href='edit_buku.php?id_buku=".$row['id_buku']."' class='btn btn-warning btn-sm'>Edit</a>
                            <a href='hapus_buku.php?id=".$row['id_buku']."' class='btn btn-danger btn-sm' onclick='return confirm(\"Yakin ingin menghapus?\")'>Hapus</a>
                          </td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>