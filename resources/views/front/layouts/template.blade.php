<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Rumah Sakit Islam Siti Aisyah Madiun</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  @include('front.layouts.sc_header')
</head>

<body>

  @include('front.layouts.header')
      {{-- @include('front.layouts.navbar') --}}

      <!-- <a href="#appointment" class="appointment-btn scrollto"><span class="d-none d-md-inline">Make an</span> Appointment</a> -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container">
      {{-- <h1>RUMAH SAKIT ISLAM SITI AISYAH MADIUN</h1>
      <h2>Jl.Mayjend Sungkono No.38 40 Madiun</h2>
      <h2>Telp : (0351) 464822, 462212 Fax. 0351 464009</h2>
      <h2>Email : rsimadiun@yahoo.com</h2>
      <a href="#about" class="btn-get-started scrollto"></a> --}}
    </div>
  </section><!-- End Hero -->

  {{-- @yield('content') --}}

  <main id="main">
    <!-- ======= Why Us Section ======= -->
    <section id="services" class="services">
      <div class="container">
        @yield('content')
      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->
  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>RSI Siti Aisyah</h3>
            <p>
              Jl. Mayjen Sungkono No.38, RW.40 <br>
              Nambangan Lor,Kec.Manguharjo,Kota Madiun<br>
              Jawa Timur 63129 <br><br>
              <strong>Telpon:</strong> (0351) 464822<br>
              <strong>Website:</strong> rsimadiun.com<br>
            </p>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            
           
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4></h4>
           
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Berlangganan berita</h4>
            <p>masukan email anda untuk update berita kami</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>
          </div>

        </div>
      </div>
    </div>

    <div class="container d-md-flex py-4">

      <div class="me-md-auto text-center text-md-start">
        <div class="copyright">
          &copy; Copyright <strong><span>RSI Siti Aisyah</span></strong>. All Rights Reserved
        </div>
     
      </div>
      <div class="social-links text-center text-md-right pt-3 pt-md-0">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>
  @include('front.layouts.sc_footer')
</body>

</html>