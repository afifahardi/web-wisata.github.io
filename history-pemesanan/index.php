<?php
session_start(); // Memulai sesi
include '../koneksi.php';

// Cek apakah pengguna sudah login
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    // Jika belum login, arahkan ke halaman login
    header("Location: ../login/login.php");
    exit();
} 

$id_user = $_SESSION['id_user']; 

// 2. Query data dari tabel bookings
$sql = "SELECT * FROM bookings WHERE id_user = $id_user ORDER BY id_booking";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="../style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&family=Montserrat:wght@400;700&display=swap" rel="stylesheet">

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <title>History Pemesanan</title>
    <!-- Bootstrap CSS -->
    <style>
        /* Custom CSS for better table appearance */
        .table th, .table td {
            vertical-align: middle;
        }
        .btn-group {
            margin-top: 5px;
        }
        /* Effect to highlight row on hover */
        .table-hover tbody tr:hover {
            background-color: #f8f9fa; /* Light grey background on hover */
            cursor: pointer; /* Change cursor to pointer on hover */
        }
    </style>
    <!-- SCRIPT HAPUS -->
    <script>
      function confirmDelete() {
          return confirm("Apakah Anda yakin ingin menghapus data ini?");
      }
    </script>
<!-- END SCRIPT HAPUS -->
</head>
<body>
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg  fixed-top" style="background-color: #F8F8FF">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">
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
              <a class="nav-link" href="../index.php">Tentang Kami</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../index.php#paketWisata">Paket Wisata</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="index.php">History Pemesanan</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Other
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="../obyek-wisata/">Objek Wisata</a></li>
                <li><a class="dropdown-item" href="../fasilitas/">Fasilitas</a></li>
                <li><a class="dropdown-item" href="../gallery/">Galeri</a></li>
              </ul>
            </li>

            <!-- TOMBOL LOGIN DAN LOGOUT -->
            <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true): ?>
              <!-- Jika sudah login -->
              <li><a href="../logout/logout.php"  class="btn btn-lg button-login">Logout</a></li>
            <?php else: ?>
              <!-- Jika belum login -->
              <li><a href="../login/login.php"  class="btn btn-lg button-login">Login</a></li>
              <li><a href="../registrasi/register.php" class="btn btn-lg button-regis">Register</a></li>
            <?php endif; ?>
           <!-- END TOMBOL LOGIN LOGOUT -->

          </ul>
        </div>
      </div>
    </nav>
  <!-- END NAVBAR -->

    <div class="container my-5">
        <h1 class="mb-4">Data Bookings</h1>
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>ID Booking</th>
                        <th>Nama Pemesan</th>
                        <th>ID User</th>
                        <th>Nama Paket</th>
                        <th>Jumlah Peserta</th>
                        <th>Jumlah Hari</th>
                        <th>Akomodasi</th>
                        <th>Transport</th>
                        <th>Service</th>
                        <th>Email</th>
                        <th>No. Telp</th>
                        <th>Tanggal Perjalanan</th>
                        <th>Harga Paket</th>
                        <th>Jumlah Tagihan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        // Menampilkan data setiap baris
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["id_booking"] . "</td>";
                            echo "<td>" . $row["nama_pemesan"] . "</td>";
                            echo "<td>" . $row["id_user"] . "</td>";
                            echo "<td>" . $row["nama_paket"] . "</td>";
                            echo "<td>" . $row["jumlah_peserta"] . "</td>";
                            echo "<td>" . $row["jumlah_hari"] . "</td>";
                            echo "<td>" . $row["akomodasi"] . "</td>";
                            echo "<td>" . $row["transport"] . "</td>";
                            echo "<td>" . $row["service"] . "</td>";
                            echo "<td>" . $row["email"] . "</td>";
                            echo "<td>" . $row["no_telp"] . "</td>";
                            echo "<td>" . $row["tgl_perjalanan"] . "</td>";
                            // Memformat harga_paket dengan pemisah ribuan
                            echo "<td>" . number_format($row["harga_paket"], 0, ',', '.') . "</td>";
                            // Memformat jumlah_tagihan dengan pemisah ribuan
                            echo "<td>" . number_format($row["jumlah_tagihan"], 0, ',', '.') . "</td>";
                            echo "<td>
                                    <div class='btn-group'>
                                        <a href='edit.php?id_booking=" . $row["id_booking"] . "' class='btn btn-warning btn-sm'>Edit</a>
                                        <a href='hapus.php?id=" . $row["id_booking"] . "' class='btn btn-danger btn-sm' onclick='return confirmDelete();'>Hapus</a>
                                    </div>
                                  </td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='15'>Anda Belum Melakukan Pemesanan</td></tr>";
                    }

                    // Menutup koneksi
                    $conn->close();
                    ?>
                </tbody>
            </table>
        </div>
    </div>


  

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js"></script>

</body>
</html>
