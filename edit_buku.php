<?php
include 'config.php';

$id_buku = $_GET['id_buku'];
$query = "SELECT * FROM buku WHERE id_buku='$id_buku'";
$result = mysqli_query($conn, $query);
$data = mysqli_fetch_assoc($result);

if(isset($_POST['submit'])) {
    $judul = $_POST['judul'];
    $pengarang = $_POST['pengarang'];
    $penerbit = $_POST['penerbit'];
    $tahun_terbit = $_POST['tahun_terbit'];
    $stok = $_POST['stok'];
    $status = $_POST['status'];


    $query = "UPDATE buku SET judul='$judul', pengarang='$pengarang', penerbit='$penerbit', tahun_terbit='$tahun_terbit', stok='$stok', status='$status' WHERE id_buku='$id_buku'";

    if(mysqli_query($conn, $query)) {
        header("Location: buku.php");
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Data Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h2>Edit Data Buku</h2>
        <form method="POST">
            <div class="mb-3">
                <label>ID Buku</label>
                <input type="text" value="<?php echo $data['id_buku']; ?>" class="form-control" readonly>
            </div>
            <div class="mb-3">
                <label>Judul</label>
                <input type="text" name="judul" value="<?php echo $data['judul']; ?>" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Pengarang</label>
                <input type="text" name="pengarang" value="<?php echo $data['pengarang']; ?>" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Penerbit</label>
                <input type="text" name="penerbit" value="<?php echo $data['penerbit']; ?>" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Tahun Terbit</label>
                <input type="text" name="tahun_terbit" value="<?php echo $data['tahun_terbit']; ?>" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Stok</label>
                <input type="number" name="stok" value="<?php echo $data['stok']; ?>" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Status</label>
                <select name="status" class="form-control" required>
                    <option value="Tersedia" <?php echo ($data['status'] == 'Tersedia') ? 'selected' : ''; ?>>Tersedia</option>
                    <option value="Tidak Tersedia" <?php echo ($data['status'] == 'Tidak Tersedia') ? 'selected' : ''; ?>>Tidak Tersedia</option>
                </select>
            </div>
            <div class="d-flex justify-content-between">
            <a href="buku.php" class="btn btn-primary">Kembali</a>
            <button type="submit" name="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
</div>
        </form>
    </div>
</body>
</html>
