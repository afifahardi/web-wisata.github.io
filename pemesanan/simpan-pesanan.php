<?php
// Include file koneksi
include '../koneksi.php';

// Ambil data dari form
$nama_pemesan = $_POST['nama_pemesan'];
$id_user = $_POST['id_user'];
$nama_paket = $_POST['nama_paket'];
$jumlah_peserta = $_POST['jumlah_peserta'];
$jumlah_hari = $_POST['jumlah_hari'];
$akomodasi = isset($_POST['akomodasi']) ? $_POST['akomodasi'] : 'N';
$transport = isset($_POST['transport']) ? $_POST['transport'] : 'N';
$service = isset($_POST['service']) ? $_POST['service'] : 'N';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$no_telp = $_POST['no_telp'];
$tgl_perjalanan = $_POST['tgl_perjalanan'];
$harga_paket = $_POST['harga_paket'];
$jumlah_tagihan = $_POST['jumlah_tagihan'];



// Persiapkan query
$sql = "INSERT INTO bookings (nama_pemesan, id_user, nama_paket, jumlah_peserta, jumlah_hari, akomodasi, transport, service, email, no_telp, tgl_perjalanan, harga_paket, jumlah_tagihan)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sisiissssssii", $nama_pemesan, $id_user, $nama_paket, $jumlah_peserta, $jumlah_hari, $akomodasi, $transport, $service, $email, $no_telp, $tgl_perjalanan, $harga_paket, $jumlah_tagihan);
// Eksekusi query dan tampilkan pesan hasil
if ($stmt->execute()) {
    echo "<script>alert('Booking berhasil disimpan'); window.location.href='../history-pemesanan/';</script>";
} else {
    echo "<script>alert('Error: " . $stmt->error . "'); window.location.href='index.php';</script>";
}


?>
