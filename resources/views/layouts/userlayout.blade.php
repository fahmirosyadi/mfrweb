<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <link rel="icon" href="{{ url('/storage/tampilan/logo.png') }}" type="image/png" />
    <title>Ponpes KH. Ahmad Dahlan : {{ $title }}</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{url('/user2/css/bootstrap.css')}}" />
    <link rel="stylesheet" href="{{url('/user2/css/flaticon.css')}}" />
    <link rel="stylesheet" href="{{url('/user2/css/themify-icons.css')}}" />
    <link rel="stylesheet" href="{{url('/user2/vendors/owl-carousel/owl.carousel.min.css')}}" />
    <link rel="stylesheet" href="{{url('/user2/vendors/nice-select/css/nice-select.css')}}" />
    <!-- main css -->
    <link rel="stylesheet" href="{{url('/user2/css/style.css')}}" />
    <script src="{{url('/orgchart.js')}}"></script>
    <script src="{{url('/admin/myJs/myJs.js')}}"></script>
    <style type="text/css">
    </style>
    <style type="text/css">
      .brand-text h6{
        margin-bottom: 3px;
        font-size: 12px;
        color: #002347;
        /*font-family: britannic bold;*/
      }
      .brand-text{
        font-size: 10px;
        position: absolute; 
        margin-left: 70px;
        margin-top: 30px;
        padding-top: 2px;
      }

      }
    </style>
    
  </head>

  <body>


    <!--================ Start Header Menu Area =================-->
    <header class="header_area white-header" id="header">
      <div class="main_menu">
        <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #002347">
          <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <a class="navbar-brand" style="width: 240px;" href="index.html">
              <img src="{{url('/storage/tampilan/brand.png')}}" style="float:left; position: relative;" height="80" alt=""/>
              <div class="p-2 mt-2 brand-text" style="">
                <h6 style="margin-top: 2px">PONDOK PESANTREN</h6>
                <h6>KH. AHMAD DAHLAN</h6>
                <h6>SIPIROK</h6>
              </div>
            </a>
            <button
              class="navbar-toggler"
              type="button"
              data-toggle="collapse"
              data-target="#navbarSupportedContent"
              aria-controls="navbarSupportedContent"
              aria-expanded="false"
              aria-label="Toggle navigation"
            >
              <span class="icon-bar"></span> <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div
              class="collapse navbar-collapse offset"
              id="navbarSupportedContent"
            >
              <ul class="nav navbar-nav menu_nav ml-auto">
                <li class="nav-item active">
                  <a class="nav-link" href="{{url('/')}}">Home</a>
                </li>
                <li class="nav-item submenu dropdown">
                  <a
                    href="#"
                    class="nav-link dropdown-toggle"
                    data-toggle="dropdown"
                    role="button"
                    aria-haspopup="true"
                    aria-expanded="false"
                    >Tentang</a
                  >
                  <ul class="dropdown-menu">
                    <li class="nav-item">
                      <a class="nav-link" href="{{url('/sejarah')}}">Sejarah Ponpes</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="{{url('/pengasuh')}}"
                        >Pengasuh</a
                      >
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="{{url('/organisasi')}}">Struktur Organisasi</a>
                    </li>
                  </ul>
                </li>
                <li class="nav-item submenu dropdown">
                  <a
                    href="#"
                    class="nav-link dropdown-toggle"
                    data-toggle="dropdown"
                    role="button"
                    aria-haspopup="true"
                    aria-expanded="false"
                    >Fasilitas</a
                  >
                  <ul class="dropdown-menu">
                    <li class="nav-item">
                      <a class="nav-link" href="{{url('/sarana')}}">Sarana Prasarana</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="{{url('/kurikulum')}}"
                        >Kurikulum</a
                      >
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="{{url('/program')}}">Program</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="{{url('/ekstra')}}">Ekstrakurikuler</a>
                    </li>
                  </ul>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{url('/prestasi')}}">Prestasi</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{url('/berita')}}">Berita</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{url('/daftar')}}">Daftar</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{url('/contact')}}">Contact</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
      </div>
    </header>
    <!--================ End Header Menu Area =================-->

    <!--================ Start Home Banner Area =================-->
    @yield('container')
    <!--================ End Testimonial Area =================-->

    <!--================ Start footer Area  =================-->
    <footer class="footer-area section_gap">
      <div class="container">
        <div class="row">
          <div class="col-lg-3 col-md-6 single-footer-widget">
            <h4>Tentang</h4>
            <ul>
              <li><a href="#">Sejarah</a></li>
              <li><a href="#">Pengasuh</a></li>
              <li><a href="#">Organisasi</a></li>
            </ul>
          </div>
          <div class="col-lg-3 col-md-6 single-footer-widget">
            <h4>Link Pintasan</h4>
            <ul>
              <li><a href="#">Jobs</a></li>
              <li><a href="#">Brand Assets</a></li>
              <li><a href="#">Investor Relations</a></li>
              <li><a href="#">Terms of Service</a></li>
            </ul>
          </div>
          <div class="col-lg-3 col-md-6 single-footer-widget">
            <h4>Features</h4>
            <ul>
              <li><a href="#">Jobs</a></li>
              <li><a href="#">Brand Assets</a></li>
              <li><a href="#">Investor Relations</a></li>
              <li><a href="#">Terms of Service</a></li>
            </ul>
          </div>
          <div class="col-lg-3 col-md-6 single-footer-widget">
            <h4>Contact</h4>
            <ul>
              <li>
                <i class="ti-home"></i>
                <a href="#">00 (440) 9865 562</a>
              </li>
              <li>
                <i class="ti-email"></i>
                <a href="#">00 (440) 9865 562</a>
              </li>
              <li>
                <i class="ti-headphone"></i>
                <a href="#">00 (440) 9865 562</a>
              </li>
              <li>
                <i class="ti-whatsapp"></i>
                <a href="#">00 (440) 9865 562</a>
              </li>
            </ul>
          </div>
        </div>
        <div class="row footer-bottom d-flex justify-content-between">
          <p class="col-lg-8 col-sm-12 footer-text m-0 text-white">
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="ti-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
          </p>
          <div class="col-lg-4 col-sm-12 footer-social">
            <a href="#"><i class="ti-facebook"></i></a>
            <a href="#"><i class="ti-twitter"></i></a>
            <a href="#"><i class="ti-dribbble"></i></a>
            <a href="#"><i class="ti-linkedin"></i></a>
          </div>
        </div>
      </div>
    </footer>
    <!--================ End footer Area  =================-->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{url('/user2/js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{url('/user2/js/popper.js')}}"></script>
    <script src="{{url('/user2/js/bootstrap.min.js')}}"></script>
    <script src="{{url('/user2/vendors/nice-select/js/jquery.nice-select.min.js')}}"></script>
    <script src="{{url('/user2/vendors/owl-carousel/owl.carousel.min.js')}}"></script>
    <script src="{{url('/user2/js/owl-carousel-thumb.min.js')}}"></script>
    <script src="{{url('/user2/js/jquery.ajaxchimp.min.js')}}"></script>
    <script src="{{url('/user2/js/mail-script.js')}}"></script>
    <!--gmaps Js-->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
    <script src="{{url('/user2/js/gmaps.min.js')}}"></script>
    <script src="{{url('/user2/js/theme.js')}}"></script>
    <script type="text/javascript">
      let panah = document.getElementsByClassName('owl-nav');
      for (let i = 0; i < panah.length; i++) {
        panah[i].innerHTML = "";
      }
    </script>

    @yield('pageJs')

  </body>
</html>
