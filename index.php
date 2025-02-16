<?php 
session_start();
include 'koneksi.php';

$query = "SELECT * FROM paket ORDER BY id_paket ASC";
$result = mysqli_query($conn, $query);

$paket_data = [];
while ($row = mysqli_fetch_assoc($result)) {
    $paket_data[] = $row;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <script src="script.js" defer></script>
    <title>HOME</title>
    
</head>
<body>
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg  fixed-top" style="background-color: #F8F8FF">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">
          <img src="assets/logo.png" alt="Desa-Wisata-Pulesari" width="80px" height="30">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav " style="font-family: Georgia, 'Times New Roman', Times, serif;">
            <li class="nav-item">
<<<<<<< HEAD:index.php
              <a class="nav-link active" aria-current="page" href="#">Beranda</a>
=======
              <a class="nav-link active" aria-current="page" href="index.html">Beranda</a>
>>>>>>> 32834e00b34cde8246a878ef18364a9682a63e67:index.html
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about/">Tentang Kami</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#paketWisata">Paket Wisata</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="history-pemesanan/">History Pemesanan</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Other
              </a>
              <ul class="dropdown-menu">
<<<<<<< HEAD:index.php
                <li><a class="dropdown-item" href="obyek-wisata/">Objek Wisata</a></li>
=======
              <li><a class="dropdown-item" href="obyek-wisata/">Objek Wisata</a></li>
>>>>>>> 32834e00b34cde8246a878ef18364a9682a63e67:index.html
                <li><a class="dropdown-item" href="fasilitas/">Fasilitas</a></li>
                <li><a class="dropdown-item" href="gallery/">Galeri</a></li>
              </ul>
            </li>

            <!-- TOMBOL LOGIN DAN LOGOUT -->
            <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true): ?>
              <!-- Jika sudah login -->
              <li><a href="logout/logout.php"  class="btn btn-lg button-login">Logout</a></li>
            <?php else: ?>
              <!-- Jika belum login -->
              <li><a href="login/login.php"  class="btn btn-lg button-login">Login</a></li>
              <li><a href="registrasi/registrasi.php" class="btn btn-lg button-regis">Register</a></li>
            <?php endif; ?>
           <!-- END TOMBOL LOGIN LOGOUT -->

          </ul>
        </div>
      </div>
    </nav>
  <!-- END NAVBAR -->
  
  <!-- CAROUSEL -->
<div id="carouselExampleIndicators" class="carousel slide">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
        <div style="position: relative; cursor: pointer;" id="videoPlaceholder">
      <img src="https://images.unsplash.com/photo-1579804152190-ba7a74a8cc3c?q=80&w=1472&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="d-block w-100 img-fluid" alt="slide1"style="height: auto; max-height: 550px;">
      <div class="play-button" id="playButton"> &#9658; </div>
      <div class="carousel-caption d-none d-md-block fixed">
    </div>
      </div>
    </div>
    <div class="carousel-item">
      <img src="https://images.unsplash.com/photo-1682686581030-7fa4ea2b96c3?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="d-block w-100 img-fluid" alt="..."style="height: auto; max-height: 550px;">
    </div>
    <div class="carousel-item">
      <img src="https://images.pexels.com/photos/6130145/pexels-photo-6130145.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" class="d-block w-100 img-fluid" alt="..."style="height: auto; max-height: 550px;">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
<!-- END CAROUSEL -->

     <!-- LAYOUT -->
     <div class="container-fluid text-center " style="height: 100%">

      <div class="row align-items-center">
        <div class="col-12 mt-4 p-0">
          <h1 style="font-family: 'Montserrat', sans-serif;" class="mt-5">SELAMAT DATANG DI DESA WISATA PULESARI</h1>
        </div>
      </div>
      <div class="row mt-3 p-4">
        <div class="col-sm-6 mb-3 mb-sm-0">
          <div class="card border-0">
            <div class="card-body" style="text-align: left;">
              <h5 class="card-title fw-bold" >Eksplorasi Keindahan Alam dan Kearifan Lokal</h5>
              <hr>
              <p class="card-text">Desa wisata pulosari adalah tempat tempat di mana keindahan alam bertemu dengan kearifan lokal yang tak ternilai. Terletak di tengah-tengah perbukitan hijau yang memanjakan mata, Desa Pulesari menawarkan pengalaman wisata yang autentik dan mendalam. Rasakan kesejukan udara pegunungan, nikmati keindahan alam yang masih asri, dan temukan kehidupan pedesaan yang hangat dan bersahabat.</p>
            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="card border-0">
            <div class="card-body" style="text-align: left;">
              <h5 class="card-title fw-bold">Aktivitas Wisata yang Beragam</h5>
              <hr>
              <p class="card-text">Desa Wisata Pulesari menawarkan berbagai aktivitas wisata yang menarik untuk semua kalangan. Anda dapat mengikuti workshop kerajinan tangan, berpartisipasi dalam pertunjukan seni tradisional, atau menikmati berbagai festival lokal yang diadakan secara berkala. Setiap aktivitas dirancang untuk memberikan pengalaman yang tak terlupakan.</p>
              <!-- button -->
                <div class="text-start mt-5">
                  <!-- <button type="button" class="btn  btn-lg" style="background-color: #3CB371; color: #F8F8FF;">Lihat Paket Wisata</button> -->
                  <a href="#paketWisata"  class="btn btn-lg" style="background-color: #3CB371; color: #F8F8FF;">Lihat Paket Wisata</a>
                </div>
              <!-- end button -->
            </div>
          </div>
        </div>
      </div>
    </div>
      <!-- END LAYOUT -->

      <!-- COSTUM CAROUSEL -->
      <h3 class="judul-destinasi mt-5 mb-4">DESTINASI FAVORIT</h3>
      <div class="container-costume">
        <div class="wrapper">
          <i id="left" class="fa-solid fa-angle-left"></i>
          <div class="costume-carousel">
            <img src="assets/slick1.png" alt="imgSlick" draggable="false">
            <img src="assets/slick2.png" alt="imgSlick" draggable="false">
            <img src="assets/slick3.png" alt="imgSlick" draggable="false">
            <img src="assets/slick4.png" alt="imgSlick" draggable="false">
            <img src="assets/slick5.png" alt="imgSlick" draggable="false">
            <img src="assets/slick2.png" alt="imgSlick" draggable="false">
          </div>
          <i id="right" class="fa-solid fa-angle-right"></i>
        </div>
    </div>
    
    <!-- END COSTUM CAROUSEL -->

    <div class="text-center mt-5" style="text-align: center;">
<<<<<<< HEAD:index.php
      
      <a href="obyek-wisata/index.php"  class="btn btn-lg mb-5 mt-0" style="background-color: #3CB371; color: #F8F8FF;">Lihat Destinasi Lainnya</a>
    </div>

    <!-- DAFTAR PAKET WISATA -->
    <div class="container overflow-hidden text-center mt-5" id="paketWisata">
      <div class="row">
        <div class="col-11" >
          <h3 class="card-title fw-bold" style="text-align: center; padding-left: 5rem;"> PAKET WISATA </h3>
        </div>
    </div>
  
    <div class="row ">

    <?php 
        foreach ($paket_data as $paket): 
        ?>
      <div class="col-sm-4 g-4 p-5">
        <div class="card card-wisata" id="card1">
          <img src="<?= htmlspecialchars($paket['img']) ?>" class="card-img-top" alt="<?= htmlspecialchars($paket['nama_paket']) ?>">
          <div class="card-body">
            <h5 class="card-title" id="booking1"> <?php echo htmlspecialchars($paket['nama_paket']); ?> </h5>
            <ul>
              <li>Akses penuh ke River Serenity Park</li>
              <li>Sewa perahu</li>
              <li>Peralatan memancing</li>
              <li>Akses ke area bersantai di tepi sungai</li>
              <li>Fasilitas seperti meja piknik dan tempat duduk di tepi sungai</li>
            </ul>
            <p class="card-price">Harga: <span class="price-value">Rp150.000</span>/orang</p> 
            <a href="pemesanan/?id=<?= ($paket['id_paket']) ?>" class="btn btn-costum fw-bold">Booking Sekarang</a>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
    </div>
    <!-- END DAFTAR PAKET WISATA -->

=======
      <!-- <button type="button" class="btn  btn-lg" style="background-color: #3CB371; color: #F8F8FF;">Lihat Paket Wisata</button> -->
      <a href="objek-wisata/index.html"  class="btn btn-lg mb-5 mt-0" style="background-color: #3CB371; color: #F8F8FF;">Lihat Destinasi Lainnya</a>
    </div>

>>>>>>> 32834e00b34cde8246a878ef18364a9682a63e67:index.html
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
    <!-- SCRIPT CAROUSEL VIDEO -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>