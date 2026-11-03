<?php
// koneksi ke database
$host = "localhost";
$user = "root";
$pass = "";
$db   = "data";

$dbconnect = mysqli_connect($host, $user, $pass, $db);

if (!$dbconnect) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

// bikin tabel produk1 otomatis kalau belum ada
mysqli_query($dbconnect, "CREATE TABLE IF NOT EXISTS produk1 (
    id_barang   INT AUTO_INCREMENT PRIMARY KEY,
    nama_barang VARCHAR(100) NOT NULL,
    harga       INT NOT NULL,
    stok        INT NOT NULL
)");
?>
