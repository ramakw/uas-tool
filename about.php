<?php

$nama = "I Gusti Bagus Rama Kusuma Vijaya";  
$nim = "2405551085";   
$foto = "foto-diri.jpeg"; 
?>

<!DOCTYPE html>
<html>
<head>
    <title>About</title>
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
        <div class="card">
            <div class="card-body text-center">
                <img src="<?php echo $foto; ?>" class="rounded-circle mb-3" style="width: 150px; height: 150px; object-fit: cover;">
                <h3><?php echo $nama; ?></h3>
                <p>NIM: <?php echo $nim; ?></p>
            </div>
        </div>
    </div>
    <div class="text-center">
        <p">Mohon maaf masih belum lengkap pak 🙏</p>
    </div>

</body>
</html>
