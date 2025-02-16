<?php
include '../koneksi.php'; // Menghubungkan ke file koneksi

if (isset($_GET['id'])) {
    $id_booking = $_GET['id'];

    // Menghapus data dari database
    $query = "DELETE FROM bookings WHERE id_booking = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $id_booking);

    if ($stmt->execute()) {
        // Menampilkan konfirmasi penghapusan berhasil
        echo "<script>alert('Data berhasil dihapus!'); window.location.href='index.php';</script>";
    } else {
        // Menampilkan konfirmasi penghapusan gagal
        echo "<script>alert('Gagal menghapus data!'); window.location.href='index.php';</script>";
    }

    $stmt->close();
}
$conn->close();
?>
