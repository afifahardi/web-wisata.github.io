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
      <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/business-frontpage.css" rel="stylesheet">
    <title>TENTANG KAMI</title>
</head>
<body>
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg  fixed-top" style="background-color: #F8F8FF">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">
        <a class="navbar-brand" href="../index.html">
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
              <a class="nav-link active" href="index.php">Tentang Kami</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../index.php#paketWisata">Paket Wisata</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../history-pemesanan/">History Pemesanan</a>
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
 <div class="container">

  <div class="row">

   <div class="aboutus-section">
         <div class="container">
             <div class="row" style="margin: 30px">
                 <div class="col-md-3 col-sm-6 col-xs-12">
                     <div class="aboutus">
                         <h2 class="aboutus-title card-title fw-bold">Tentang Kami</h2> <br>
                         <p class="aboutus-text">Di kaki perbukitan yang hijau dan diapit oleh aliran sungai yang jernih, terletak Desa Wisata Pulesari, sebuah surga tersembunyi yang menawarkan keindahan alam yang memukau dan kekayaan budaya yang mendalam. Desa Wisata Pulesari adalah destinasi wisata yang sempurna bagi Anda yang ingin merasakan kesejukan udara pegunungan, menjelajahi keindahan alam, serta mendalami kearifan lokal yang autentik.</p>
                         <!-- <p class="aboutus-text">This is Photoshop's version of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem</p> -->
                         <!-- <a class="aboutus-more" href="#">read more</a> -->
                     </div>
                 </div>
                 <div class="col-md-3 col-sm-6 col-xs-12">
                     <div class="aboutus-banner">
                         <img src="img/aboutus.jpg" alt="">
                     </div>
                 </div>
                 <div class="col-md-5 col-sm-6 col-xs-12">
                     <div class="feature">
                         <div class="feature-box">
                             <div class="clearfix">
                                 <div class="iconset">
                                     <span class="glyphicon glyphicon-cog icon"></span>
                                 </div>
                                 <div class="feature-content">
                                     <h4 class="card-title fw-bold">Visi Kami</h4>
                                     <p>Menciptakan sebuah wujud Desa Wisata Pulesari yang bersih, aman, nyaman, tentram, dinamis serta seni dan berbudaya religius yang berkualitas untuk menjadikan Desa Wisata Edukasi masyarakat tradisional.</p><br>
                                 </div>
                             </div>
                         </div>
                         <div class="feature-box">
                             <div class="clearfix">
                                 <div class="iconset">
                                     <span class="glyphicon glyphicon-cog icon"></span>
                                 </div>
                                 <div class="feature-content">
                                     <h4 class="card-title fw-bold">Misi Kami</h4>
                                     <dl>
                                      <dt>Melestarikan Keindahan Alam</dt>
                                      <dd>Kami berkomitmen untuk menjaga dan melestarikan keindahan alam Desa Pulesari. Melalui program-program konservasi dan edukasi lingkungan, kami berusaha menjaga keseimbangan ekosistem alam desa kami.</dd>
                                      <dt>Mempromosikan Budaya Lokal</dt>
                                      <dd>Kami berupaya untuk memperkenalkan dan melestarikan budaya serta tradisi lokal. Melalui berbagai kegiatan dan acara, pengunjung dapat merasakan dan belajar tentang kehidupan sehari-hari, seni, dan adat istiadat masyarakat Pulesari.</dd>
                                      <dt>Memberdayakan Masyarakat</dt>
                                      <dd>Kami percaya bahwa pemberdayaan masyarakat lokal adalah kunci untuk pembangunan desa yang berkelanjutan. Melalui pelatihan dan dukungan, kami membantu warga desa untuk meningkatkan keterampilan mereka dan berpartisipasi aktif dalam industri pariwisata.</dd>
                                     </dl>
                                 </div>
                             </div>
                         </div>
                         <div class="feature-box">
                             <div class="clearfix">
                                 <div class="iconset">
                                     <span class="glyphicon glyphicon-cog icon"></span>
                                 </div>
                                 <div class="feature-content">
                                     <h4 class="card-title fw-bold">Hubungi Kami</h4>
                                     <p>Jika Anda memiliki pertanyaan atau ingin melakukan reservasi, jangan ragu untuk menghubungi kami melalui kontak berikut:</p>
                                     <ul>
                                      <li><strong>Telepon/WA:</strong> 0812-3456-7890</li>
                                      <li><strong>Email:</strong> info@pulesari.com</li>
                                      <li><strong>Alamat:</strong> Desa Pulesari Kecamatan Lemah Abang, Kabupaten Jonggol, Jawa Barat</li>
                                     </ul>
                                     <p>Atau atau melalui link <a href="https://tinyurl.com/bookingWisata">Kontak Kami</a> untuk informasi lebih lanjut.</p>
                                     <p>Terima kasih telah memilih Desa Wisata Pulesari sebagai destinasi wisata Anda. Kami berharap dapat menyambut Anda di desa kami dan memberikan pengalaman yang tak terlupakan.</p>
                                 </div>
                             </div>
                         </div>
                     </div>
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