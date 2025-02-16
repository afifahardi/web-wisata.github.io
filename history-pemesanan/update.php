<?php
include '../koneksi.php';

// Ambil data dari form
$id_booking = $_POST['id_booking'];
$nama_pemesan = $_POST['nama_pemesan'];
$id_user = $_POST['id_user'];
$nama_paket = $_POST['nama_paket'];
$jumlah_peserta = $_POST['jumlah_peserta'];
$jumlah_hari = $_POST['jumlah_hari'];
$email = $_POST['email'];
$no_telp = $_POST['no_telp'];
$tgl_perjalanan = $_POST['tgl_perjalanan'];
$harga_paket = $_POST['harga_paket'];
$jumlah_tagihan = $_POST['jumlah_tagihan'];

// Mengambil data paket
$paket_query = "SELECT * FROM paket WHERE nama_paket = ?";
$paket_stmt = $conn->prepare($paket_query);
$paket_stmt->bind_param('s', $nama_paket);
$paket_stmt->execute();
$paket_result = $paket_stmt->get_result();
$paket = $paket_result->fetch_assoc();

// Ambil checkbox dari form
$akomodasi = isset($_POST['akomodasi']) ? $_POST['akomodasi'] : 'N';
$transport = isset($_POST['transport']) ? $_POST['transport'] : 'N';
$service = isset($_POST['service']) ? $_POST['service'] : 'N';

// Tentukan harga berdasarkan checkbox
$akomodasi_harga = ($akomodasi != 'N') ? $akomodasi : 'N';
$transport_harga = ($transport != 'N') ? $transport : 'N';
$service_harga = ($service != 'N') ? $service : 'N';

/// Query update
$query = "UPDATE bookings SET nama_pemesan = ?, id_user = ?, nama_paket = ?, jumlah_peserta = ?, jumlah_hari = ?, akomodasi = ?, transport = ?, service = ?, email = ?, no_telp = ?, tgl_perjalanan = ?, harga_paket = ?, jumlah_tagihan = ? WHERE id_booking = ?";
$stmt = $conn->prepare($query);

if (!$stmt) {
    // Debugging error jika prepare gagal
    die('Query failed: ' . $conn->error);
}

$stmt->bind_param("sisiissssisddi", 
    $nama_pemesan, 
    $id_user, 
    $nama_paket, 
    $jumlah_peserta, 
    $jumlah_hari, 
    $akomodasi, 
    $transport, 
    $service, 
    $email, 
    $no_telp, 
    $tgl_perjalanan, 
    $harga_paket, 
    $jumlah_tagihan, 
    $id_booking
);



if ($stmt->execute()) {
    echo "<script>alert('Data berhasil diupdate.'); window.location.href='index.php';</script>";
} else {
    echo "<script>alert('Gagal mengupdate data.'); window.location.href='index.php';</script>";
}
?>
