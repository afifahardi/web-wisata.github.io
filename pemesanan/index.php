<?php
session_start();
include '../koneksi.php'; // Pastikan Anda memasukkan file konfigurasi database

// Cek apakah pengguna sudah login
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
  // Jika belum login, arahkan ke halaman login
  header("Location: ../login/login.php");
  exit();
}

// ambil data username dan id
$username = isset($_SESSION['username']) ? $_SESSION['username'] : '';
$id_user = isset($_SESSION['id_user']) ? $_SESSION['id_user'] : '';

// Query untuk mendapatkan data pengguna berdasarkan username
$query = "SELECT email, no_telp FROM users WHERE username = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param('s', $username);
$stmt->execute();
$result = $stmt->get_result();

// Ambil data pengguna
if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    $email = $user['email'];
    $no_telp = $user['no_telp'];
} else {
    $email = '';
    $no_telp = '';
}

$id_paket = isset($_GET['id']) ? $_GET['id'] : 0; // Ambil ID paket dari query string

// Query untuk mendapatkan data paket wisata berdasarkan ID
$query = "SELECT * FROM paket WHERE id_paket = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param('i', $id_paket);
$stmt->execute();
$result = $stmt->get_result();

// Ambil data paket wisata
if ($result->num_rows > 0) {
    $paket = $result->fetch_assoc();
} else {
    echo "Paket wisata tidak ditemukan.";
    exit();
}
?><

!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../style.css">
    <title>BOOKING</title>
</head>
<body>
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg  fixed-top" style="background-color: #F8F8FF">
      <div class="container-fluid">
        <a class="navbar-brand" href="../index.php">
          <img src="../assets/logo.png" alt="Desa-Wisata-Pulesari" width="80px" height="30">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav " style="font-family: Georgia, 'Times New Roman', Times, serif;">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="../index.php">Beranda</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../about/index.php">Tentang Kami</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../paket-wisata/index.php">Paket Wisata</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="../pemesanan/index.php">Pemesanan</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Other
              </a>
              <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="../obyek-wisata/index.php">Objek Wisata</a></li>
                <li><a class="dropdown-item" href="../fasilitas/index.php">Fasilitas</a></li>
                <li><a class="dropdown-item" href="../gallery/index.php">Galeri</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  <!-- END NAVBAR -->



<!-- CONTENT -->
 <!-- Main Container -->
  <!-- Formulir Pemesanan -->
  <div class="container my-5">
    <h1 class="text-center mb-4" style="margin-top: 5rem;">Pesan Paket Wisata</h1>
    <div class="form-container">
      <div class="form-header">
        <h2>Form Pemesanan</h2>
        <p>Isi formulir di bawah ini untuk memesan paket wisata Anda</p><br>
      </div>
      <form method="POST" action="simpan-pesanan.php">
        <div class="form-row">
          <div class="form-group">
            <label for="nama_pemesan" class="form-label">Nama Pemesan</label>
            <input type="text" value="<?php echo htmlspecialchars($username); ?>" id="nama_pemesan" name="nama_pemesan" class="form-control" readonly>
          </div>

          <div class="form-group">
            <label for="id_user" class="form-label">ID Pemesan</label>
            <input type="text" value="<?php echo htmlspecialchars($id_user); ?>" id="id_user" name="id_user" class="form-control" readonly>
          </div>

          <div class="form-group">
            <label for="email" class="form-label">Email Kontak</label>
            <input type="email" value="<?php echo htmlspecialchars($email); ?>" id="email" name="email" class="form-control" required>
          </div>
  
          <div class="form-group">
            <label for="no_telp" class="form-label">Telepon Kontak</label>
            <input type="tel" value="<?php echo htmlspecialchars($no_telp); ?>" id="no_telp" name="no_telp" class="form-control">
          </div>

          <br><div class="form-group">
            <label for="nama_paket" class="form-label">Nama Destinasi</label>
            <input type="text" value="<?php echo htmlspecialchars($paket['nama_paket']); ?>" id="nama_paket" name="nama_paket" class="form-control" readonly>
          </div>
  
          <div class="form-group">
            <label for="tgl_perjalanan" class="form-label">Tanggal Perjalanan</label>
            <input type="date" id="tgl_perjalanan" name="tgl_perjalanan" class="form-control" required>
          </div>
  
          <div class="form-group">
            <label for="jumlah_hari" class="form-label">jumlah hari Pelaksanaan</label>
            <input type="number" id="jumlah_hari" name="jumlah_hari" class="form-control" min="1" required>
          </div>
  
          <div class="form-group">
            <label for="jumlah_peserta" class="form-label">Jumlah Peserta</label>
            <input type="number" id="jumlah_peserta" name="jumlah_peserta" class="form-control" min="1" required>
          </div>
  
          <div class="form-group">
            <label for="services" class="form-label">Pelayanan Paket Perjalanan</label><br>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="akomodasi" name="akomodasi" value="<?php echo htmlspecialchars($paket['harga_tambahan1']); ?>">
              <label class="form-check-label" for="akomodasi"><?php echo htmlspecialchars($paket['paket_tambahan1']); ?> (<?php echo htmlspecialchars($paket['harga_tambahan1']); ?>)</label>
              <input type="hidden" name="akomodasi_default" value="N"> <!-- Default value jika checkbox tidak dicentang -->
           </div>
          <div class="form-check">
              <input class="form-check-input" type="checkbox" id="transport" name="transport" value="<?php echo htmlspecialchars($paket['harga_tambahan2']); ?>">
              <label class="form-check-label" for="transport"><?php echo htmlspecialchars($paket['paket_tambahan2']); ?> (<?php echo htmlspecialchars($paket['harga_tambahan2']); ?>)</label>
              <input type="hidden" name="transport_default" value="N"> <!-- Default value jika checkbox tidak dicentang -->
          </div>
          <div class="form-check">
              <input class="form-check-input" type="checkbox" id="service" name="service" value="<?php echo htmlspecialchars($paket['harga_tambahan3']); ?>">
              <label class="form-check-label" for="service"><?php echo htmlspecialchars($paket['paket_tambahan3']); ?> (<?php echo htmlspecialchars($paket['harga_tambahan3']); ?>)</label>
              <input type="hidden" name="services_default" value="N"> <!-- Default value jika checkbox tidak dicentang -->
          </div>

        </div>
  
        <div class="form-group">
          <label for="harga_paket" class="form-label">Harga Paket Perjalanan</label>
          <input type="text" value="<?php echo htmlspecialchars($paket['harga_paket']); ?>" id="harga_paket" name="harga_paket" class="form-control" readonly>
      </div>
          
          <div class="form-group">
            <!-- yang terlihat oleh user -->
            <label for="jumlah_tagihan" class="form-label">Jumlah Tagihan</label>
            <input type="text" id="jumlah_tagihan" name="jumlah_tagihan" class="form-control" readonly>

            <!-- Input tersembunyi yang akan dikirim ke PHP -->
            <input type="hidden" id="jumlah_tagihan_hidden" name="jumlah_tagihan" />
        </div>
        </div>
        <button type="submit" class="btn btn-custom w-100">Kirim Pemesanan</button>
      </form>
    </div>
  </div>

  <!-- Informasi Pemesanan -->
  <!-- Informasi Pemesanan, Kebijakan, dan Dukungan Pelanggan -->
  <div class="row" style="margin-right: 0%;">
    <div class="col-md-4 mb-4">
      <div class="info-section p-4">
        <h2 class="h5 mb-3">Informasi Pemesanan</h2>
        <ul class="list-unstyled mb-0">
          <li><strong>Langkah 1:</strong> Pilih destinasi dan paket wisata yang diinginkan.</li>
          <li><strong>Langkah 2:</strong> Isi formulir dengan detail yang diperlukan.</li>
          <li><strong>Langkah 3:</strong>  Klik "Kirim Pemesanan" untuk mengirim data ke WhatsApp admin.</li>
          <li><strong>Langkah 4:</strong> Terima konfirmasi melalui WhatsApp atau email.</li>
        </ul>
      </div>
    </div>

    <div class="col-md-4 mb-4">
      <div class="info-section p-4">
        <h2 class="h5 mb-3">Kebijakan Pembatalan</h2>
        <p>Pembatalan dapat dilakukan hingga 48 jam sebelum jadwal tur dengan pengembalian dana penuh. Untuk informasi lebih lanjut, kunjungi <a href="#">kebijakan pembatalan</a>.</p>
        
        <h2 class="h5 mt-3 mb-3">Syarat dan Ketentuan</h2>
        <p>Silakan baca syarat dan ketentuan kami untuk memahami peraturan yang berlaku untuk pemesanan.</p>
      </div>
    </div>

    <div class="col-md-4 mb-">
      <div class="info-section p-4">
        <h2 class="h5 mb-3">Butuh Bantuan?</h2>
        <p>Hubungi tim layanan pelanggan kami di <a href="mailto:support@example.com">support@example.com</a> atau telepon <a href="tel:+621234567890">+62 123 4567 890</a> jika Anda memiliki pertanyaan atau memerlukan bantuan tambahan.</p>
      </div>
    </div>
  </div>
</div>

  <!-- END CONTENT -->

  <!-- FOOTER -->
  <footer
  class="text-center text-lg-start text-dark"
  style="background-color: #DCDCDC">
    <!-- Grid container -->
    <div class="container p-4 pb-0">
      <!-- Section: Links -->
      <section class="">
        <!--Grid row-->
        <div class="row">
          <!-- Grid column -->
          <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
            <h6 class="text-uppercase mb-4 font-weight-bold">
              Desa Wisata Pulesari
            </h6>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nam voluptatem aliquid a id corrupti optio itaque inventore eum placeat dolorum debitis, non consequuntur odio ducimus alias sunt atque, vel ipsum!
            </p>
          </div>
          <!-- Grid column -->

          <hr class="w-100 clearfix d-md-none" />

          
          <!-- Grid column -->

          <hr class="w-100 clearfix d-md-none" />

          <!-- Grid column -->
          <hr class="w-100 clearfix d-md-none" />

          <!-- Grid column -->
          <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
            <h6 class="text-uppercase mb-4 font-weight-bold">Contact</h6>
            <p><i class="fas fa-home mr-3"></i> Bekasi, indonesia</p>
            <p><i class="fas fa-envelope mr-3"></i> pulesari@gmail.com</p>
            <p><i class="fas fa-phone mr-3"></i> +628888888</p>
            <p><i class="fas fa-print mr-3"></i> +628888888</p>
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
            <h6 class="text-uppercase mb-4 font-weight-bold">Follow us</h6>

            <!-- Facebook -->
            <a
              class="btn btn-primary btn-floating m-1"
              style="background-color: #3b5998"
              href="#!"
              role="button"
              ><i class="fab fa-facebook-f"></i
              ></a>

            <!-- Twitter -->
            <a
              class="btn btn-primary btn-floating m-1"
              style="background-color: #55acee"
              href="#!"
              role="button"
              ><i class="fab fa-twitter"></i
              ></a>

            <!-- Google -->
            <a
              class="btn btn-primary btn-floating m-1"
              style="background-color: #dd4b39"
              href="#!"
              role="button"
              ><i class="fab fa-google"></i
              ></a>

            <!-- Instagram -->
            <a
              class="btn btn-primary btn-floating m-1"
              style="background-color: #ac2bac"
              href="#!"
              role="button"
              ><i class="fab fa-instagram"></i
              ></a>

            <!-- Linkedin -->
            <a
              class="btn btn-primary btn-floating m-1"
              style="background-color: #0082ca"
              href="#!"
              role="button"
              ><i class="fab fa-linkedin-in"></i
              ></a>
            <!-- Github -->
            <a
              class="btn btn-primary btn-floating m-1"
              style="background-color: #333333"
              href="#!"
              role="button"
              ><i class="fab fa-github"></i
              ></a>
          </div>
        </div>
        <!--Grid row-->
      </section>
      <!-- Section: Links -->
    </div>
    <!-- Grid container -->

    <!-- Copyright -->
    <div
        class="text-center p-3"
        style="background-color: rgba(0, 0, 0, 0.2)"
        >
      © 2020 Copyright:
      <a class="text-white" href="#"
        >desa pule sari</a
        >
    </div>
    <!-- Copyright -->
    </footer>
   <!-- END FOOTER -->


   <!-- SCRIPT CAROUSEL VIDEO -->
   <script>
    document.addEventListener('DOMContentLoaded', () => {
const playButton = document.getElementById('playButton');
const videoPlaceholder = document.getElementById('videoPlaceholder');

const videoURL = 'https://www.youtube.com/embed/tnjxdlcNgjc?autoplay=1'; // Tambahkan autoplay=1 agar video langsung diputar

playButton.addEventListener('click', () => {
  // Ganti gambar dengan video
  videoPlaceholder.innerHTML = `
    <iframe width="100%" height="550" src="${videoURL}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
  `;
});
});

  </script>  

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
  <!-- SCRIPT CAROUSEL VIDEO -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
     <!-- Bootstrap JS and dependencies -->
     <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js"></script>

     <!-- SCRIPT FORMULIR -->
      <!-- JavaScript to handle form submission -->
    <script>
      document.getElementById('bookingForm').addEventListener('submit', function(event) {
          event.preventDefault();
          
          const destination = document.getElementById('destination').value;
          const date = document.getElementById('date').value;
          const time = document.getElementById('time').value;
          const participants = document.getElementById('participants').value;
          const specialRequests = document.getElementById('special-requests').value;
          const contactName = document.getElementById('contact-name').value;
          const contactEmail = document.getElementById('contact-email').value;
          const contactPhone = document.getElementById('contact-phone').value;

          const message = `Halo, saya ingin melakukan pemesanan paket wisata dengan rincian sebagai berikut:\n\n` +
                          `*Destinasi:* ${destination}\n` +
                          `*Tanggal Perjalanan:* ${date}\n` +
                          `*Waktu Perjalanan:* ${time}\n` +
                          `*Jumlah Peserta:* ${participants}\n` +
                          `*Permintaan Khusus:* ${specialRequests ? specialRequests : 'Tidak ada'}\n\n` +
                          `*Nama Kontak:* ${contactName}\n` +
                          `*Email Kontak:* ${contactEmail}\n` +
                          `*Telepon Kontak:* ${contactPhone ? contactPhone : 'Tidak ada'}\n\n` +
                          `Terima kasih!`;

          const whatsappUrl = `https://api.whatsapp.com/send?phone=+6281231236880&text=${encodeURIComponent(message)}`;
          window.open(whatsappUrl, '_blank');
      });
  </script>
  <!-- END SCRIPT FORMULIR -->
</body>
</html>