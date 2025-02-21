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
    <title>GALLERY</title>
    <!-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet"> -->
    <style>
        .gallery-item {
            position: relative;
            overflow: hidden;
            border-radius: 10px;
        }
        .gallery-item img {
            width: 100%;
            height: auto;
            transition: transform 0.3s ease;
        }
        .gallery-item:hover img {
            transform: scale(1.1);
        }
        .gallery-item .overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.3s ease;
            text-align: center;
            padding: 10px;
        }
        .gallery-item:hover .overlay {
            opacity: 1;
        }
        .gallery-text {
            margin-top: 20px;
        }
    </style>
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
              <a class="nav-link" href="../about/">Tentang Kami</a>
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
                <li><a class="dropdown-item" href="../obyek-wisata/">Objek Wisata</a></li>
                <li><a class="dropdown-item" href="../fasilitas/">Fasilitas</a></li>
                <li><a class="dropdown-item active" href="index.php">Galeri</a></li>
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
<div class="container mt-5">
  <h1 class="text-center mb-4">Galeri Wisata Kami</h1>
  <div class="row">
      <!-- Foto di Balik Layar -->
      <div class="col-md-4 mb-4">
          <div class="gallery-item">
              <img src="https://images.pexels.com/photos/7551733/pexels-photo-7551733.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="Foto di Balik Layar">
              <div class="overlay">
                  <div class="text">
                      <h5>Foto di Balik Layar</h5>
                      <p>Intip bagaimana kami mempersiapkan setiap detail untuk pengalaman wisata Anda.</p>
                  </div>
              </div>
          </div>
      </div>
      <!-- Persiapan Acara Spesial -->
      <div class="col-md-4 mb-4">
          <div class="gallery-item">
              <img src="https://images.pexels.com/photos/2565708/pexels-photo-2565708.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="Persiapan Acara Spesial">
              <div class="overlay">
                  <div class="text">
                      <h5>Persiapan Acara Spesial</h5>
                      <p>Lihat bagaimana kami mempersiapkan acara spesial untuk momen yang tak terlupakan.</p>
                  </div>
              </div>
          </div>
      </div>
      <!-- Bergaya di Lokasi -->
      <div class="col-md-4 mb-4">
          <div class="gallery-item">
              <img src="https://plus.unsplash.com/premium_photo-1661274115636-3a93d4278dbf?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Bergaya di Lokasi">
              <div class="overlay">
                  <div class="text">
                      <h5>Bergaya di Lokasi</h5>
                      <p>Kamu juga bisa bergaya di lokasi-lokasi indah kami.</p>
                  </div>
              </div>
          </div>
      </div>
      <!-- Destinasi Wisata -->
      <div class="col-md-4 mb-4">
          <div class="gallery-item">
              <img src="https://plus.unsplash.com/premium_photo-1661695636682-6a788f36475e?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Destinasi Wisata">
              <div class="overlay">
                  <div class="text">
                      <h5>Destinasi Wisata</h5>
                      <p>Jelajahi berbagai destinasi wisata menarik kami.</p>
                  </div>
              </div>
          </div>
      </div>
      <!-- Keindahan Alam -->
      <div class="col-md-4 mb-4">
          <div class="gallery-item">
              <img src="https://images.pexels.com/photos/23910364/pexels-photo-23910364/free-photo-of-landscape-with-a-rocky-shore.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="Keindahan Alam">
              <div class="overlay">
                  <div class="text">
                      <h5>Keindahan Alam</h5>
                      <p>Rasakan keindahan alam yang menenangkan.</p>
                  </div>
              </div>
          </div>
      </div>
      <!-- Pengalaman Unik -->
      <div class="col-md-4 mb-4">
          <div class="gallery-item">
              <img src="https://images.pexels.com/photos/20173353/pexels-photo-20173353/free-photo-of-man-using-an-easel-during-a-painting-class.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="Pengalaman Unik">
              <div class="overlay">
                  <div class="text">
                      <h5>Pengalaman Unik</h5>
                      <p>Temukan pengalaman unik yang tidak akan Anda lupakan.</p>
                  </div>
              </div>
          </div>
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

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>