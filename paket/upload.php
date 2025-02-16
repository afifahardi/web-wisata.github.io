<?php
include '../koneksi.php'; // ini adalah path yang benar ke file koneksi
session_start(); // Mulai sesi jika diperlukan

function formatHarga($harga) {
    // Mengganti koma dengan titik jika ada
    $harga = str_replace(',', '.', $harga);
    // Menghapus semua karakter non-numeric kecuali titik
    $harga = preg_replace('/[^0-9.]/', '', $harga);
    return $harga;
}

function tambahPaketWisata($conn, $nama_paket, $deskripsi, $benefit, $img_url, $harga_paket, $paket_tambahan1, $harga_tambahan1, $paket_tambahan2, $harga_tambahan2, $paket_tambahan3, $harga_tambahan3) {
    $stmt = $conn->prepare("INSERT INTO paket (nama_paket, deskripsi, benefit, img, harga_paket, paket_tambahan1, harga_tambahan1, paket_tambahan2, harga_tambahan2, paket_tambahan3, harga_tambahan3) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssdsdsdsd", $nama_paket, $deskripsi, $benefit, $img_url, $harga_paket, $paket_tambahan1, $harga_tambahan1, $paket_tambahan2, $harga_tambahan2, $paket_tambahan3, $harga_tambahan3);

    return $stmt->execute();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_paket = $_POST['nama_paket'];
    $deskripsi = $_POST['deskripsi'];
    $benefit = $_POST['benefit'];
    $harga_paket = formatHarga($_POST['harga_paket']);
    $paket_tambahan1 = $_POST['paket_tambahan1'];
    $harga_tambahan1 = formatHarga($_POST['harga_tambahan1']);
    $paket_tambahan2 = $_POST['paket_tambahan2'];
    $harga_tambahan2 = formatHarga($_POST['harga_tambahan2']);
    $paket_tambahan3 = $_POST['paket_tambahan3'];
    $harga_tambahan3 = formatHarga($_POST['harga_tambahan3']);

    // Proses upload gambar
    if (isset($_FILES['img']) && $_FILES['img']['error'] == 0) {
        $target_dir = "../img/";
        $target_file = $target_dir . basename($_FILES["img"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Cek apakah file gambar
        $check = getimagesize($_FILES["img"]["tmp_name"]);
        if ($check === false) {
            echo "File bukan gambar.";
            $uploadOk = 0;
        }

        // Cek ukuran file
        if ($_FILES["img"]["size"] > 500000) { // 500KB max size
            echo "Ukuran file terlalu besar.";
            $uploadOk = 0;
        }

        // Cek format file
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            echo "Hanya file JPG, JPEG, PNG & GIF yang diperbolehkan.";
            $uploadOk = 0;
        }

        // Cek jika $uploadOk bernilai 0 karena error
        if ($uploadOk == 0) {
            echo "File tidak di-upload.";
        } else {
            if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
                $img_url = "img/" . basename($_FILES["img"]["name"]);
                if (tambahPaketWisata($conn, $nama_paket, $deskripsi, $benefit, $img_url, $harga_paket, $paket_tambahan1, $harga_tambahan1, $paket_tambahan2, $harga_tambahan2, $paket_tambahan3, $harga_tambahan3)) {
                    echo "<script>
                            alert('Paket wisata berhasil ditambahkan!');
                            window.location.href='index.php'; // Arahkan ke halaman lain setelah berhasil
                          </script>";
                } else {
                    echo "Error: " . $stmt->error;
                }
            } else {
                echo "Terjadi kesalahan saat meng-upload file.";
            }
        }
    } else {
        echo "Tidak ada file yang di-upload.";
    }
}
?>
