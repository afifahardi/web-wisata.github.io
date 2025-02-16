<?php
include '../koneksi.php';
session_start();
session_unset(); // Menghapus semua session
session_destroy(); // Menghancurkan sesi

header("Location: ../index.php"); // Arahkan ke halaman utama setelah logout
exit();
?>