<?php
include '../koneksi.php'; // Ganti dengan path yang sesuai ke file koneksi Anda


// Periksa apakah id_booking ada di URL
if (!isset($_GET['id_booking'])) {
  echo "ID booking tidak ditemukan.";
  exit;
}

// Ambil id_booking dari URL
$id_booking = $_GET['id_booking'];

// Ambil data booking dari database
$query = "SELECT * FROM bookings WHERE id_booking = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param('i', $id_booking);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $booking = $result->fetch_assoc();
} else {
    echo "Data tidak ditemukan.";
    exit;
}

// Ambil data paket untuk harga tambahan
$paket_query = "SELECT * FROM paket WHERE nama_paket = ?";
$paket_stmt = $conn->prepare($paket_query);
$paket_stmt->bind_param('s', $booking['nama_paket']);
$paket_stmt->execute();
$paket_result = $paket_stmt->get_result();
$paket = $paket_result->fetch_assoc();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDIT BOOKING</title>
    <link rel="stylesheet" href="../style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../style.css">
</head>
<body>
<div class="container my-5">
    <h1 class="text-center mb-4" style="margin-top: 5rem;">Edit Booking</h1>
    <div class="form-container">
      <div class="form-header">
        <h2>Form Edit Pemesanan</h2>
        <p>Isi formulir di bawah ini untuk mengedit paket wisata Anda</p><br>
      </div>
      <form method="POST" action="update.php">
        <div class="form-row">
          <div class="form-group">

          <input type="hidden" name="id_booking" value="<?php echo $booking['id_booking']; ?>">

            <label for="nama_pemesan" class="form-label">Nama Pemesan</label>
            <input type="text" value="<?php echo htmlspecialchars($booking['nama_pemesan']); ?>" id="nama_pemesan" name="nama_pemesan" class="form-control" readonly>
          </div>

          <div class="form-group">
            <label for="id_user" class="form-label">ID Pemesan</label>
            <input type="text" value="<?php echo htmlspecialchars($booking['id_user']); ?>" id="id_user" name="id_user" class="form-control" readonly>
          </div>

          <div class="form-group">
            <label for="email" class="form-label">Email Kontak</label>
            <input type="email" value="<?php echo htmlspecialchars($booking['email']); ?>" id="email" name="email" class="form-control" required>
          </div>
  
          <div class="form-group">
            <label for="no_telp" class="form-label">Telepon Kontak</label>
            <input type="tel" value="<?php echo htmlspecialchars($booking['no_telp']); ?>" id="no_telp" name="no_telp" class="form-control">
          </div>

          <br><div class="form-group">
            <label for="nama_paket" class="form-label">Nama Destinasi</label>
            <input type="text" value="<?php echo htmlspecialchars($booking['nama_paket']); ?>" id="nama_paket" name="nama_paket" class="form-control" readonly>
          </div>
  
          <div class="form-group">
            <label for="tgl_perjalanan" class="form-label">Tanggal Perjalanan</label>
            <input type="date" value="<?php echo htmlspecialchars($booking['tgl_perjalanan']); ?>" id="tgl_perjalanan" name="tgl_perjalanan" class="form-control" required>
          </div>
  
          <div class="form-group">
            <label for="jumlah_hari" class="form-label">jumlah hari Pelaksanaan</label>
            <input type="number" value="<?php echo htmlspecialchars($booking['jumlah_hari']); ?>" id="jumlah_hari" name="jumlah_hari" class="form-control" min="1" required>
          </div>
  
          <div class="form-group">
            <label for="jumlah_peserta" class="form-label">Jumlah Peserta</label>
            <input type="number" value="<?php echo htmlspecialchars($booking['jumlah_peserta']); ?>" id="jumlah_peserta" name="jumlah_peserta" class="form-control" min="1" required>
          </div>
  
          <div class="form-group">
            <label for="services" class="form-label">Pelayanan Paket Perjalanan</label><br>
            <div class="form-check">
                <!-- value nya menampilkan harga dari paket tambahan -->
              <input class="form-check-input" type="checkbox" id="akomodasi" name="akomodasi" value="<?php echo htmlspecialchars($paket['harga_tambahan1']); ?>" <?php echo ($booking['akomodasi'] != 'N') ? 'checked' : ''; ?>>
              <!-- ini nama paket tambahan -->
              <label class="form-check-label" for="akomodasi"><?php echo htmlspecialchars($paket['paket_tambahan1']); ?> (<?php echo htmlspecialchars($paket['harga_tambahan1']); ?>) </label>
              <input type="hidden" name="akomodasi_default" value="N"> <!-- Default value jika checkbox tidak dicentang -->
           </div>
          <div class="form-check">
              <input class="form-check-input" type="checkbox" id="transport" name="transport" value="<?php echo htmlspecialchars($paket['harga_tambahan2']); ?>" <?php echo ($booking['transport'] != 'N') ? 'checked' : ''; ?>>
              <label class="form-check-label" for="transport"><?php echo htmlspecialchars($paket['paket_tambahan2']); ?> (<?php echo htmlspecialchars($paket['harga_tambahan2']); ?>)</label>
              <input type="hidden" name="transport_default" value="N"> <!-- Default value jika checkbox tidak dicentang -->
          </div>
          <div class="form-check">
              <input class="form-check-input" type="checkbox" id="service" name="services" value="<?php echo htmlspecialchars($paket['harga_tambahan3']); ?>" <?php echo ($booking['service'] != 'N') ? 'checked' : ''; ?>>
              <label class="form-check-label" for="service"><?php echo htmlspecialchars($paket['paket_tambahan3']); ?> (<?php echo htmlspecialchars($paket['harga_tambahan3']); ?>)</label>
              <input type="hidden" name="services_default" value="N"> <!-- Default value jika checkbox tidak dicentang -->
          </div>

        </div>
  
        <div class="form-group">
          <label for="harga_paket" class="form-label">Harga Paket Perjalanan</label>
          <input type="text" value="<?php echo htmlspecialchars($paket['harga_paket']); ?>" id="harga_paket" name="harga_paket" class="form-control" required>
      </div>
          
          <div class="form-group">
            <label for="jumlah_tagihan" class="form-label">Jumlah Tagihan</label>
            <input type="text" value="<?php echo htmlspecialchars($booking['jumlah_tagihan']); ?>" id="jumlah_tagihan" name="jumlah_tagihan" class="form-control" readonly>

             <!-- Input tersembunyi yang akan dikirim ke PHP -->
             <input type="hidden" id="jumlah_tagihan_hidden" name="jumlah_tagihan" />
        </div>
        </div>
        <button type="submit" class="btn btn-custom w-100">Update Pemesanan</button>
      </form>
    </div>
  </div>




   <!-- SCRIPT PERHITUNGAN TOTAL -->
   <script>
function updateTotal() {
    // Ambil harga awal paket
    let harga_paket = parseFloat(document.getElementById('harga_paket').value) || 0;
    // Ambil jumlah hari dan peserta
    let jumlah_hari = parseInt(document.getElementById('jumlah_hari').value) || 1;
    let jumlah_peserta = parseInt(document.getElementById('jumlah_peserta').value) || 1;

    // Hitung total biaya pelayanan tambahan
    let harga_total = harga_paket;
    let checkboxes = document.querySelectorAll('input[type=checkbox]:checked');
    checkboxes.forEach(checkbox => {
        harga_total += parseFloat(checkbox.value) || 0;
    });

    // Hitung jumlah tagihan
    let jumlah_tagihan = harga_total * jumlah_hari * jumlah_peserta;

    // Format jumlah_tagihan dengan pemisah ribuan dan simbol Rupiah
    let formattedTagihan = jumlah_tagihan.toLocaleString('id-ID', { style: 'currency', currency: 'IDR' });

    // Set nilai format ke elemen
    document.getElementById('jumlah_tagihan').value = formattedTagihan;

    // Hilangkan format sebelum dikirim ke server (hanya angka)
    let jumlah_tagihan_unformatted = jumlah_tagihan.toString().replace(/[^0-9.]/g, ''); // Hanya menyisakan angka dan titik desimal
    document.getElementById('jumlah_tagihan_hidden').value = jumlah_tagihan_unformatted; // Simpan ke input tersembunyi
}

// Tambahkan event listener untuk perubahan input
document.querySelectorAll('input[type=checkbox], input[type=number]').forEach(el => el.addEventListener('change', updateTotal));
</script>


  <!-- END SCRIPT PERHITUNGAN TOTAL -->
</body>
</html>