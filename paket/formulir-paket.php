<?php
include '../koneksi.php'; // Include file yang berisi fungsi

// // Proses form jika data dikirim melalui POST
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     // Panggil fungsi untuk menambahkan paket wisata
//     if (tambahPaketWisata($_POST)) {
//         echo "<script>
//                 alert('Paket wisata berhasil ditambahkan!');
//                 window.location.href='list-paket.php'; // Arahkan ke halaman daftar paket (sesuaikan URL)
//               </script>";
//     } else {
//         echo "<script>alert('Gagal menambahkan paket wisata!');</script>";
//     }
// }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Paket Wisata</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Input Paket Wisata</h2>
        <form action="upload.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nama_paket">Nama Paket:</label>
                <input type="text" class="form-control" id="nama_paket" name="nama_paket" required>
            </div>
            <div class="form-group">
                <label for="deskripsi">Deskripsi:</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required></textarea>
            </div>
            <div class="form-group">
                <label for="benefit">Benefit:</label>
                <textarea class="form-control" id="benefit" name="benefit" rows="3" required></textarea>
            </div>
            <div class="form-group">
                <label for="img">Gambar:</label>
                <input type="file" class="form-control-file" id="img" name="img" required>
            </div>
            <div class="form-group">
                <label for="harga_paket">Harga Paket:</label>
                <input type="text" class="form-control" id="harga_paket" name="harga_paket" step="0.01" required>
            </div>
            <div class="form-group">
                <label for="paket_tambahan1">Paket Tambahan 1:</label>
                <input type="text" class="form-control" id="paket_tambahan1" name="paket_tambahan1">
            </div>
            <div class="form-group">
                <label for="harga_tambahan1">Harga Tambahan 1:</label>
                <input type="text" class="form-control" id="harga_tambahan1" name="harga_tambahan1" step="0.01">
            </div>
            <div class="form-group">
                <label for="paket_tambahan2">Paket Tambahan 2:</label>
                <input type="text" class="form-control" id="paket_tambahan2" name="paket_tambahan2">
            </div>
            <div class="form-group">
                <label for="harga_tambahan2">Harga Tambahan 2:</label>
                <input type="text" class="form-control" id="harga_tambahan2" name="harga_tambahan2" step="0.01">
            </div>
            <div class="form-group">
                <label for="paket_tambahan3">Paket Tambahan 3:</label>
                <input type="text" class="form-control" id="paket_tambahan3" name="paket_tambahan3">
            </div>
            <div class="form-group">
                <label for="harga_tambahan3">Harga Tambahan 3:</label>
                <input type="text" class="form-control" id="harga_tambahan3" name="harga_tambahan3" step="0.01">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <!-- script format-harga.js -->
    <script src="format-harga.js"></script>
</body>
</html>

