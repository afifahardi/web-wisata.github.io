<?php
// Memasukkan file koneksi.php untuk koneksi dan fungsi
include '../koneksi.php';

// Proses form jika data dikirim melalui POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    registrasi($_POST, $conn);
}
?>
