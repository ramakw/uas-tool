<?php
include 'config.php';

if (isset($_GET['id'])) {
    $id_buku = $_GET['id'];

    // Menghapus buku dari database
    $query = "DELETE FROM buku WHERE id_buku = '$id_buku'";
    if (mysqli_query($conn, $query)) {
        header("Location: buku.php");
        exit;
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    echo "ID buku tidak ditemukan.";
}
?>
