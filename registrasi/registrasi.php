
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RESGISTRASI</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>
<body>
<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-sm-center h-100">
				<div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
					<div class="text-center my-4">
						<img src="../assets/logo.png" alt="logo" width="200">
					</div>
					<div class="card shadow-lg">
						<div class="card-body p-5">
							<h1 class="fs-4 card-title fw-bold mb-4">REGISTRASI</h1>
							<form action="cek-registrasi.php" method="POST" class="needs-validation" autocomplete="off">
								<div class="mb-3">
									<label class="mb-2 text-muted" for="nama">Nama</label>
									<input id="nama" type="text" class="form-control" name="nama" value="" required autofocus>
								</div>
                                <div class="mb-3">
									<label class="mb-2 text-muted" for="username">Username</label>
									<input id="username" type="text" class="form-control" name="username" value="" required autofocus>
								</div>
                                <div class="mb-3">
									<label class="mb-2 text-muted" for="email">E-Mail</label>
									<input id="email" type="email" class="form-control" name="email" value="" required autofocus>
									<div class="invalid-feedback">
										Email is invalid
									</div>
                                    <div class="mb-3">
									<label class="mb-2 text-muted" for="no_telp">Nomor Telepon</label>
									<input id="no_telp" type="number" class="form-control" name="no_telp" value="" required autofocus>
								</div>

								<div class="mb-3">
									<div class="mb-2 w-100">
										<label class="text-muted" for="password">Password</label>
									</div>
									<input id="password" type="password" class="form-control" name="password" required>
								    <div class="invalid-feedback">
								    	Password is required
							    	</div>
								</div>
                                <div class="mb-3">
									<div class="mb-2 w-100">
										<label class="text-muted" for="password">Konfirmasi Password</label>
									</div>
									<input id="password" type="password" class="form-control" name="password2" required>
								    <div class="invalid-feedback">
								    	Password is required
							    	</div>
								</div>
								<div class="d-flex align-items-center">
									<button type="submit" class="btn ms-auto btn-custom" style="background-color: #3CB371; color: white;">
										REGISTRASI
									</button>
								</div>
							</form>
						</div>
						<div class="card-footer py-3 border-0">
                        <div class="text-center">
								Sudah punya akun? <a href="../login/login.php" class="text-dark">Login</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

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

	<script src="js/login.js"></script>
</body>
</html>