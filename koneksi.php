<?php
$servername = "localhost";
$username = "root";
$password = "";
$pulosari_wisata = "pulosari_wisata";

$conn = mysqli_connect($servername, $username, $password, $pulosari_wisata);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


//FUNCTION REGISTRASI
function registrasi($data){
    global $conn;

    // Mengambil data dari array $data
    $nama = strtolower(stripcslashes($data["nama"]));
    $username = strtolower(stripcslashes($data["username"]));
    $email = $data["email"];
    $password = $data["password"];
    $password2 = $data["password2"];
    $no_telp = $data["no_telp"];

    // Validasi username dan email
    $stmt = $conn->prepare("SELECT email FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        echo "<script>
                alert('Email sudah terdaftar!');
                window.location.href='registrasi.php'; // Arahkan ke halaman registrasi lagi untuk mengisi ulang
              </script>";
        $stmt->close();
        return false;
    }
    $stmt->close();

    $stmt = $conn->prepare("SELECT username FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        echo "<script>
                alert('Username sudah terdaftar!');
                window.location.href='registrasi.php'; // Arahkan ke halaman registrasi lagi untuk mengisi ulang
              </script>";
        $stmt->close();
        return false;
    }
    $stmt->close();

    // Validasi konfirmasi password
    if ($password !== $password2) {
        echo "<script>alert('Konfirmasi password tidak sesuai.');</script>";
        return false;
    }

    // Hash password
    $password_hashed = password_hash($password, PASSWORD_DEFAULT);

    // Menambahkan user baru ke database
    $stmt = $conn->prepare("INSERT INTO users (nama, username, email, password, no_telp) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssi", $nama, $username, $email, $password_hashed, $no_telp);

    if ($stmt->execute()) {
        echo "<script>
                alert('Akun berhasil ditambahkan!');
                window.location.href='../login/login.php'; // Arahkan ke halaman login setelah registrasi berhasil
              </script>";
        return true;
    } else {
        echo "<script>
                alert('Registrasi gagal: " . $stmt->error . "');
                window.location.href='registrasi.html';
              </script>";
        return false;
    }
}
//END FUNCTION REGISTRASI


?>
