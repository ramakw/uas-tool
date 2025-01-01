<?php
include 'config.php';

if(isset($_POST['submit'])) {
    $id_buku = $_POST['id_buku'];
    $id_anggota = $_POST['id_anggota'];
    $tanggal_pinjam = $_POST['tanggal_pinjam'];
    $tanggal_kembali = $_POST['tanggal_kembali'];

    // Query untuk mengurangi stok buku
    $updateStokQuery = "UPDATE buku SET stok = stok - 1 WHERE id_buku = $id_buku";
    mysqli_query($conn, $updateStokQuery);

    // Query untuk menambahkan peminjaman baru
    $insertPeminjamanQuery = "INSERT INTO peminjaman (id_buku, id_anggota, tanggal_pinjam, tanggal_kembali, status) 
                              VALUES ('$id_buku', '$id_anggota', '$tanggal_pinjam', '$tanggal_kembali', 'Dipinjam')";
    if(mysqli_query($conn, $insertPeminjamanQuery)) {
        header("Location: peminjaman.php");
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Peminjaman</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h2>Tambah Peminjaman</h2>
        <form method="POST">
            <div class="mb-3">
                <label>Buku</label>
                <select name="id_buku" class="form-select" required>
                    <option value="">Pilih Buku</option>
                    <?php
                    $query = "SELECT * FROM buku WHERE status='Tersedia'";
                    $result = mysqli_query($conn, $query);
                    while($row = mysqli_fetch_assoc($result)) {
                        echo "<option value='".$row['id_buku']."'>".$row['judul']."</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label>Anggota</label>
                <select name="id_anggota" class="form-select" required>
                    <option value="">Pilih Anggota</option>
                    <?php
                    $query = "SELECT * FROM anggota";
                    $result = mysqli_query($conn, $query);
                    while($row = mysqli_fetch_assoc($result)) {
                        echo "<option value='".$row['id_anggota']."'>".$row['nama']."</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label>Tanggal Pinjam</label>
                <input type="date" name="tanggal_pinjam" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Tanggal Kembali</label>
                <input type="date" name="tanggal_kembali" class="form-control" required>
            </div>
            <a href="peminjaman.php" class="btn btn-secondary">Kembali</a>
            <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</body>
</html>
