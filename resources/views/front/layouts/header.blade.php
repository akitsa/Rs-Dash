<!-- ======= Top Bar ======= -->
<div id="topbar" class="d-flex align-items-center fixed-top">
    <div class="container d-flex justify-content-between">
        <div class="contact-info d-flex align-items-center">
            <i class="bi bi-envelope"></i> <a href="mailto:contact@example.com">rsisitiaisyah@gmail.com</a>
            <i class="bi bi-phone"></i> (0351) 464882
        </div>
        <div class="d-none d-lg-flex social-links align-items-center">
            <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
            <a href="https://www.youtube.com/rsi" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
            <a href="">Log in</a>
        </div>
    </div>
</div>
  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <!-- Uncomment below if you prefer to use an image logo -->
      <a href="{{('/')}}" class="logo "><img src="{{ asset ('front/assets/img/logo.jpg') }}" alt=""
          class="img-fluid"></a>
      <h1 class="logo me-auto"><a href="{{ ('/') }}">RSI Siti Aisyah</a></h1>

      @include('front.layouts.navbar')

      <!-- <a href="#appointment" class="appointment-btn scrollto"><span class="d-none d-md-inline">Make an</span> Appointment</a> -->

    </div>
  </header><!-- End Header -->