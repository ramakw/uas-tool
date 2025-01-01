<?php
include 'config.php';

$id_peminjaman = $_GET['id'];

// Update status peminjaman
$query = "UPDATE peminjaman SET status='Dikembalikan' WHERE id_peminjaman='$id_peminjaman'";
mysqli_query($conn, $query);

// Update status buku
$query = "UPDATE buku b 
          JOIN peminjaman p ON b.id_buku = p.id_buku 
          SET b.status='Tersedia' 
          WHERE p.id_peminjaman='$id_peminjaman'";
mysqli_query($conn, $query);

header("Location: peminjaman.php");
?>