<?php
include 'config.php';

if(isset($_POST['submit'])) {
    $id_buku = $_POST['id_buku'];
    $judul = $_POST['judul'];
    $pengarang = $_POST['pengarang'];
    $penerbit = $_POST['penerbit'];
    $tahun = $_POST['tahun'];
    $stok = $_POST['stok'];
    
    $query = "INSERT INTO buku VALUES ('$id_buku', '$judul', '$pengarang', '$penerbit', '$tahun', '$stok', 'Tersedia')";
    if(mysqli_query($conn, $query)) {
        header("Location: buku.php");
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h2>Tambah Buku</h2>
        <form method="POST">
            <div class="mb-3">
                <label>ID Buku</label>
                <input type="text" name="id_buku" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Judul</label>
                <input type="text" name="judul" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Pengarang</label>
                <input type="text" name="pengarang" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Penerbit</label>
                <input type="text" name="penerbit" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Tahun Terbit</label>
                <input type="number" name="tahun" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Stok</label>
                <input type="number" name="stok" class="form-control" required>
            </div>
            <div>
                <a href="buku.php" class="btn btn-secondary mb-3">Kembali</a>
                <button type="submit" name="submit" class="btn btn-primary mb-3">Simpan</button>
            </div>
        </form>
    </div>
</body>
</html>

