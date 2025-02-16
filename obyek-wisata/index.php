<?php
include '../koneksi.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>OBYEK WISATA</title>
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
              <a class="nav-link" href="../history-pemesanan/">History Pemesanan</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle active" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Other
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item active" href="index.php">Objek Wisata</a></li>
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
              <li><a href="../registrasi/registrasi.php" class="btn btn-lg button-regis">Register</a></li>
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
  <!-- <div class="carousel-caption d-md-block">
    <h1 class="fw-bold">SELAMAT DATANG DI DESA WISATA PULESARI!</h1>
    <p>Edukasi dan Tradisi dalam Kedamaian Desa</p>
  </div> -->
</div>
<!-- END CAROUSEL -->

    <!-- CONTENT -->
  <div class="container overflow-hidden text-center mt-5" >
    <div class="row">
      <div class="col-11" >
        <h3 style="text-align: center;"> OBJEK WISATA </h3>
      </div>
  </div>

  <div class="row ">
    <div class="col-sm-4 g-4 p-5">
      <div class="card card-wisata" id="card1">
        <img src="../assets/slick1.png" class="card-img-top" alt="card1">
        <div class="card-body">
          <h5 class="card-title" id="booking1">River Serenity Park</h5>
          <p class="card-text">Nikmati ketenangan dan keindahan sungai dengan aktivitas seperti berperahu, memancing, atau sekadar bersantai di tepiannya.</p>
          
        </div>
      </div>
    </div>
    <div class="col-sm-4 g-4 p-5">
      <div class="card card-wisata">
        <img src="../assets/slick2.png" class="card-img-top" alt="card2">
        <div class="card-body">
          <h5 class="card-title">Bloom Haven Garden</h5>
          <p class="card-text">Taman yang penuh warna dengan berbagai jenis bunga yang mekar sepanjang tahun, ideal untuk berjalan-jalan santai dan menikmati keindahan alam.</p>
          
        </div>
      </div>
    </div>
    <div class="col-sm-4 g-4 p-5">
      <div class="card card-wisata">
        <img src="../assets/slick3.png" class="card-img-top" alt="">
        <div class="card-body">
          <h5 class="card-title">Summit Vista Peak</h5>
          <p class="card-text">Tempat puncak gunung yang menawarkan pemandangan spektakuler dan jalur pendakian yang menantang, memberikan pengalaman petualangan dan ketenangan di ketinggian.</p>
          
        </div>
      </div>
    </div>
    <div class="col-sm-4 g-4 p-5">
      <div class="card card-wisata">
        <img src="../assets/slick4.png" class="card-img-top" alt="">
        <div class="card-body">
          <h5 class="card-title">Splash Paradise Waterpark</h5>
          <p class="card-text">Taman air yang menyenangkan dengan berbagai seluncuran, kolam renang, dan area bermain air untuk semua usia, menawarkan kesenangan dan kesegaran sepanjang hari.</p>
          
        </div>
      </div>
    </div>
    <div class="col-sm-4 g-4 p-5">
      <div class="card card-wisata">
        <img src="../assets/slick5.png" class="card-img-top" alt="">
        <div class="card-body">
          <h5 class="card-title">Campground</h5>
          <p class="card-text">Nikmati petualangan di alam dengan camping di area perkemahan kami. Rasakan kehangatan api unggun, tidur di bawah bintang, dan jelajahi keindahan alam sekitar.</p>
          
        </div>
      </div>
    </div>
    <div class="col-sm-4 g-4 p-5">
      <div class="card card-wisata">
        <img src="../assets/slick6.png" class="card-img-top" alt="">
        <div class="card-body">
          <h5 class="card-title">Creative Canvas Studio</h5>
          <p class="card-text">Ikuti workshop melukis dan ekspresikan kreativitas melalui berbagai teknik dan media seni, dengan bimbingan dari seniman berpengalaman.</p>
          
        </div>
      </div>
    </div>
    <div class="col-sm-4 g-4 p-5">
      <div class="card card-wisata">
        <img src="../assets/slick7.png" class="card-img-top" alt="">
        <div class="card-body">
          <h5 class="card-title">Berry Delight Farm</h5>
          <p class="card-text">Petik stroberi segar di kebun, nikmati produk olahan stroberi, dan rasakan suasana pedesaan yang menyegarkan.</p>
          
        </div>
      </div>
    </div>
    <div class="col-sm-4 g-4 p-5">
      <div class="card card-wisata">
        <img src="../assets/slick8.png" class="card-img-top" alt="">
        <div class="card-body">
          <h5 class="card-title">Luminous Lights Festival</h5>
          <p class="card-text">Saksikan keajaiban malam dengan instalasi lampu yang memukau dan pertunjukan cahaya yang menciptakan suasana magis.</p>
          
        </div>
      </div>
    </div>
    <div class="col-sm-4 g-4 p-5">
      <div class="card card-wisata">
        <img src="../assets/slick9.png" class="card-img-top" alt="">
        <div class="card-body">
          <h5 class="card-title">Heritage Village</h5>
          <p class="card-text"> Masuki kehidupan tradisional di Heritage Village. Temui budaya lokal, dan rasakan suasana kampung adat yang kaya akan tradisi dan sejarah.</p>
          
        </div>
      </div>
    </div>
    <div class="col-sm-4 g-4 p-5">
      <div class="card card-wisata">
        <img src="../assets/slick10.png" class="card-img-top" alt="">
        <div class="card-body">
          <h5 class="card-title">Stellar Discovery Center</h5>
          <p class="card-text">Jelajahi keajaiban alam semesta di Stellar Discovery Center. Amati bintang dan planet melalui teleskop canggih, dan ikuti sesi pendidikan astronomi yang mendalam.</p>
          
        </div>
      </div>
    </div>
    <div class="col-sm-4 g-4 p-5">
      <div class="card card-wisata">
        <img src="../assets/slick11.png" class="card-img-top" alt="">
        <div class="card-body">
          <h5 class="card-title">Creative Clay Studio</h5>
          <p class="card-text">Temukan seni kerajinan tanah liat di Creative Clay Studio. Ikuti workshop pembuatan karya tanah liat, dari pot hingga patung, dan bawa pulang kreasi unik Anda.</p>
          
        </div>
      </div>
    </div>
    <div class="col-sm-4 g-4 mb-4 p-5">
      <div class="card card-wisata">
        <img src="../assets/slick12.png" class="card-img-top" alt="">
        <div class="card-body">
          <h5 class="card-title">Aroma Bliss Studio</h5>
          <p class="card-text">Ciptakan keseimbangan dan relaksasi di Aroma Bliss Studio. Pelajari cara membuat campuran minyak esensial dan nikmati pengalaman aromaterapi yang menyegarkan dan menenangkan.</p>
         
        </div>
      </div>
    </div>
  </div>
  </div>

  
</div>
    <!-- END CONTENT -->

  <!-- FOOTER -->
    <footer class="text-center text-lg-start text-dark"
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
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
</body>
</html>