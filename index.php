<?php
include 'config.php';
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Rental Buku Igu</title>
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
    <div class="row">
        <div class="col-md-4">
            <a href="buku.php" class="text-decoration-none text-dark">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Total Buku</h5>
                        <?php
                        $query = mysqli_query($conn, "SELECT COUNT(*) as total FROM buku");
                        $data = mysqli_fetch_assoc($query);
                        echo "<h2>".$data['total']."</h2>";
                        ?>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4">
            <a href="anggota.php" class="text-decoration-none text-dark">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Total Anggota</h5>
                        <?php
                        $query = mysqli_query($conn, "SELECT COUNT(*) as total FROM anggota");
                        $data = mysqli_fetch_assoc($query);
                        echo "<h2>".$data['total']."</h2>";
                        ?>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4">
            <a href="peminjaman.php" class="text-decoration-none text-dark">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Buku Dipinjam</h5>
                        <?php
                        $query = mysqli_query($conn, "SELECT COUNT(*) as total FROM peminjaman WHERE status='Dipinjam'");
                        $data = mysqli_fetch_assoc($query);
                        echo "<h2>".$data['total']."</h2>";
                        ?>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
</body>
</html>