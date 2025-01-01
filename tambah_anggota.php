<?php
include 'config.php';

if(isset($_POST['submit'])) {
    $id_anggota = $_POST['id_anggota'];
    $nama = $_POST['nama'];
    $no_telp = $_POST['no_telp'];
    $email = $_POST['email'];

    $query = "INSERT INTO anggota VALUES ('$id_anggota', '$nama', '$no_telp', '$email')";
    if(mysqli_query($conn, $query)) {
        header("Location: anggota.php");
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Anggota</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h2>Tambah Anggota</h2>
        <form method="POST">
            <div class="mb-3">
                <label>ID Anggota</label>
                <input type="text" name="id_anggota" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Nama</label>
                <input type="text" name="nama" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Nomor Telepon</label>
                <input type="text" name="no_telp" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Email</label>
                <input type="text" name="email" class="form-control" required>
            </div>
            <div>
                <a href="anggota.php" class="btn btn-secondary mb-3">Kembali</a>
                <button type="submit" name="submit" class="btn btn-primary mb-3">Simpan</button>
            </div>
        </form>
    </div>
</body>
</html>
