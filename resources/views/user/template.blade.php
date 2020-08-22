<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title')</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <link rel="shortcut icon" type="image/x-icon" href="{{url('/user/img/favicon.png')}}">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="{{url('/user/css/bootstrap.min.css')}}" media="all"/>
    <link rel="stylesheet" href="{{url('/user/css/owl.carousel.min.css')}}" media="all"/>
    <link rel="stylesheet" href="{{url('/user/css/magnific-popup.css')}}" media="all"/>
    <link rel="stylesheet" href="{{url('/user/css/font-awesome.min.css')}}" media="all"/>
    <link rel="stylesheet" href="{{url('/user/css/themify-icons.css')}}" media="all"/>
    <link rel="stylesheet" href="{{url('/user/css/nice-select.css')}}" media="all"/>
    <link rel="stylesheet" href="{{url('/user/css/flaticon.css')}}" media="all"/>
    <link rel="stylesheet" href="{{url('/user/css/gijgo.css')}}" media="all"/>
    <link rel="stylesheet" href="{{url('/user/css/animate.css')}}" media="all"/>
    <link rel="stylesheet" href="{{url('/user/css/slicknav.css')}}" media="all"/>
    <!-- <link rel="stylesheet" href="user/style.css"> -->
    @if($tema->tema == 'tema1')
    <link href="{{url('/user/css/style.css')}}" rel="stylesheet" media="all">
    @else
    <link href="{{url('/user/css/style2.css')}}" rel="stylesheet" media="all">
    @endif
    <style type="text/css">
        #tree>svg {
            /*background-color: #2E2E2E;*/
        }
        [node-id] rect {
            fill: #f6d202;
        }
        body{
            /*background-color: #72d34f;*/
            /*background-color: #ecf0f5;*/
        }
        #navigation li a{
             /*color: #eecd1f;*/
             color: white;
        }
        .Appointment div{
            background-color: #eecd1f;    
        }

    </style>

    <!-- <link rel="stylesheet" href="@{assets/user/css/responsive.css}"> -->

    <script src="{{url('/orgchart.js')}}"></script>
    <script src="{{url('/admin/myJs/myJs.js')}}"></script>
</head>

<body>
    <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

    <!-- header-start -->
        
    </div>
    <header>
        <div class="header-area ">
            <div class="header-top_area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="header_top_wrap d-flex justify-content-between align-items-center">
                                <div class="text_wrap">
                                    <p><span>+880166 253 232</span> <span>info@domain.com</span></p>
                                </div>
                                <div class="text_wrap">
                                    <p><a href="{{url('/login')}}"> <i class="ti-user"></i>  Login</a> <a href="#">Register</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="sticky-header" class="main-header-area" style="background-color: #060664">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="header_wrap d-flex justify-content-between align-items-center">
                                <div class="header_left">
                                    <div class="logo">
                                        <a href="{{url('/')}}">
                                            <img height="100" width="100" src="{{url('/storage/tampilan/logo.jpeg')}}" alt="">
                                        </a>
                                    </div>
                                </div>
                                <div class="header_right d-flex align-items-center">
                                    <div class="main-menu  d-none d-lg-block">
                                        <nav>
                                            <ul id="navigation">
                                                <li><a href="index.html">home</a></li>
                                                <li><a href="#">Tentang Kami <i class="ti-angle-down"></i></a>
                                                    <ul class="submenu" style="background-color: #060664">
                                                        <li><a href="#">Sejarah Ponpes</a></li>
                                                        <li><a href="#">Profile Pengasuh</a></li>
                                                        <li><a href="{{url('/organisasi')}}">Struktur Organisasi</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="#">Santri <i class="ti-angle-down"></i></a>
                                                    <ul class="submenu">
                                                        <li><a href="#">Kegiatan Santri</a></li>
                                                        <li><a href="{{url('/prestasi')}}">Prestasi Santri</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="#">Kurikulum <i class="ti-angle-down"></i></a>
                                                    <ul class="submenu">
                                                        <li><a href="#">Resmi</a></li>
                                                        <li><a href="#">Umum</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="#">Sarana Prasarana</a></li>
                                                <li><a href="{{url('/alumni')}}">Alumni</a></li>
                                                <li><a href="{{url('/contact')}}">Contact</a></li>
                                            </ul>
                                        </nav>
                                    </div>
                                    <div class="Appointment">
                                        <div class="book_btn d-none d-lg-block">
                                            <a data-scroll-nav='1' style="background-color: #02023b" href="#">Daftar</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header-end -->

    @yield('container')

    <!-- footer start -->
    <footer class="footer" style="background-color: #03036b">
        <div class="footer_top">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-md-6 col-lg-3">
                        <div class="footer_widget">
                            <h3 class="footer_title">
                                About Us
                            </h3>
                            <ul>
                                <li><a href="#">Online Learning</a></li>
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Careers</a></li>
                                <li><a href="#">Press Center</a></li>
                                <li><a href="#">Become an Instructor</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 col-lg-3">
                        <div class="footer_widget">
                            <h3 class="footer_title">
                                Campus
                            </h3>
                            <ul>
                                <li><a href="#">Our Plans</a></li>
                                <li><a href="#">Free Trial</a></li>
                                <li><a href="#">Academic Solutions</a></li>
                                <li><a href="#">Business Solutions</a></li>
                                <li><a href="#">Government Solutions</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 col-lg-3">
                        <div class="footer_widget">
                            <h3 class="footer_title">
                                Study
                            </h3>
                            <ul>
                                <li><a href="#">Admissions Policy</a></li>
                                <li><a href="#">Getting Started</a></li>
                                <li><a href="#">Visa Information</a></li>
                                <li><a href="#">Tuition Calculator</a></li>
                                <li><a href="#">Request Information</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 col-lg-3">
                        <div class="footer_widget">
                            <h3 class="footer_title">
                                Support
                            </h3>
                            <ul>
                                <li><a href="#">Support</a></li>
                                <li><a href="#">Contact Us</a></li>
                                <li><a href="#">System Requirements</a></li>
                                <li><a href="#">Register Activation Key</a></li>
                                <li><a href="#">Site feedback</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copy-right_text" style="background-color: #02023b">
            <div class="container">
                <div class="footer_border"></div>
                <div class="row">
                    <div class="col-xl-12">
                        <p class="copy_right text-center">
                            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="ti-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer end  -->

    <script src="{{url('/user/js/vendor/modernizr-3.5.0.min.js')}}"></script>
    <script src="{{url('/user/js/vendor/jquery-1.12.4.min.js')}}"></script>
    <script src="{{url('/user/js/popper.min.js')}}"></script>
    <script src="{{url('/user/js/bootstrap.min.js')}}"></script>
    <script src="{{url('/user/js/owl.carousel.min.js')}}"></script>
    <script src="{{url('/user/js/isotope.pkgd.min.js')}}"></script>
    <script src="{{url('/user/js/ajax-form.js')}}"></script>
    <script src="{{url('/user/js/waypoints.min.js')}}"></script>
    <script src="{{url('/user/js/jquery.counterup.min.js')}}"></script>
    <script src="{{url('/user/js/imagesloaded.pkgd.min.js')}}"></script>
    <script src="{{url('/user/js/scrollIt.js')}}"></script>
    <script src="{{url('/user/js/jquery.scrollUp.min.js')}}"></script>
    <script src="{{url('/user/js/wow.min.js')}}"></script>
    <script src="{{url('/user/js/nice-select.min.js')}}"></script>
    <script src="{{url('/user/js/jquery.slicknav.min.js')}}"></script>
    <script src="{{url('/user/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{url('/user/js/plugins.js')}}"></script>
    <script src="{{url('/user/js/gijgo.min.js')}}"></script>

    <!--contact js-->
    <script src="{{url('/user/js/contact.js')}}"></script>
    <script src="{{url('/user/js/jquery.ajaxchimp.min.js')}}"></script>
    <script src="{{url('/user/js/jquery.form.js')}}"></script>
    <script src="{{url('/user/js/jquery.validate.min.js')}}"></script>
    <script src="{{url('/user/js/mail-script.js')}}"></script>

    <script src="{{url('/user/js/main.js')}}"></script>

</body>

</html>