<?php
// Memasukkan file koneksi.php untuk koneksi ke database
include '../koneksi.php';

// Mulai sesi
session_start();

// Proses form jika data dikirim melalui POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (!empty($username) && !empty($password)) {
        // Query untuk memeriksa apakah username ada di database
        $stmt = $conn->prepare("SELECT id_user, password FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($id_user, $hashed_password);
            $stmt->fetch();

            // Verifikasi password
            if (password_verify($password, $hashed_password)) {
                // Sukses login
                $_SESSION['id_user'] = $id_user;
                $_SESSION['username'] = $username;
                $_SESSION['logged_in'] = true; // Menandakan pengguna sudah login

                header("Location: ../index.php");
                exit();
            } else {
                // Password salah
                echo "<script>alert('Password salah!'); window.location.href='login.php';</script>";
            }
        } else {
            // Username tidak ditemukan
            echo "<script>alert('Username tidak ditemukan!'); window.location.href='login.php';</script>";
        }
        $stmt->close();
    } else {
        // Input kosong
        echo "<script>alert('Username dan password harus diisi!'); window.location.href='login.php';</script>";
    }
}
?>
