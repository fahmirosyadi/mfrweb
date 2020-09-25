<!DOCTYPE html>
<html dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{url('/storage/'.$tema->logo)}}">
    <title>@yield('judul')</title>
    <script src="{{url('/orgchart.js')}}"></script>
    <script src="{{url('/admin/myJs/myJs.js')}}"></script>
    <!-- Custom CSS -->
    <link href="{{url('/admin/assets/libs/flot/css/float-chart.css')}}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{url('/admin/dist/css/style.min.css')}}" rel="stylesheet">

    <style type="text/css">
        body{
            color: #232637;
        }
        #tree>svg {
            background-color: #2E2E2E;
        }
        [node-id] rect {
            fill: #f6d202;
        }
        .brand-text h6{
            margin-bottom: 3px;
            font-size: 10px;
            color: #002347;
            /*font-family: britannic bold;*/
        }
        .brand-text{
            margin-left: 22px;
        }
        .arrow{
            font-size: 10px;
            margin-left: 40px;
            margin-top: 10px;
            width: 170px;
            position: absolute;
            background-color: #ffc107;
            clip-path: polygon(0% 0%, 80% 0%, 100% 50%, 80% 100%, 0% 100%);
        }

        @media (min-width: 992px) {
            
        }

        @media (max-width: 767.98px) {
            .arrow{
                visibility: hidden;
            }
        }
    </style>

</head>
<body>


@yield('modal')
<div id="main-wrapper">

    <header class="topbar" data-navbarbg="skin5">
        <nav class="navbar top-navbar navbar-expand-md navbar-dark">
            <div class="navbar-header" style="background-color: #232637;" data-logobg="skin5">
                <!-- This is for the sidebar toggle which is visible on mobile only -->
                <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <a class="navbar-brand" href="{{ url('/home') }}">
                    <!-- Logo icon -->
                    
                    <!--End Logo icon -->
                    <!-- Logo text -->
                    <span class="logo-text">
                         <!-- dark Logo text -->
                        <img src="{{url('/storage/'.$tema->logo)}}" style="float:left; position: relative; z-index: 100;" height="70" alt="homepage" class="light-logo" />
                        <div class="arrow">
                            <div class="pl-2 mt-1 brand-text" id="judul" style="">
                              <h6 style="margin-top: 2px">PONDOK PESANTREN</h6>
                              <h6>KH. AHMAD DAHLAN</h6>
                              <h6>SIPIROK</h6>
                            </div>
                        </div>
                    </span>
                    <!-- Logo icon -->
                    <!-- <b class="logo-icon"> -->
                        <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                        <!-- Dark Logo icon -->
                        <!-- <img src="public/images/logo-text.png" alt="homepage" class="light-logo" /> -->
                        
                    <!-- </b> -->
                    <!--End Logo icon -->
                </a>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Toggle which is visible on mobile only -->
                <!-- ============================================================== -->
                <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
            </div>
            <!-- ============================================================== -->
            <!-- End Logo -->
            <!-- ============================================================== -->
            <div class="navbar-collapse collapse" id="navbarSupportedContent" style="background-color: #232637;" data-navbarbg="skin5">
                <!-- ============================================================== -->
                <!-- toggle and nav items -->
                <!-- ============================================================== -->
                <ul style="background-color: #232637;"  class="navbar-nav float-left mr-auto">
                    
                    <!-- ============================================================== -->
                    <!-- Search -->
                    <!-- ============================================================== -->
                    <li class="nav-item search-box"> <a class="nav-link waves-effect waves-dark" href="javascript:void(0)"><i class="ti-search"></i></a>
                        <form class="app-search position-absolute">
                            <input type="text" class="form-control" placeholder="Search &amp; enter"> <a class="srh-btn"><i class="ti-close"></i></a>
                        </form>
                    </li>
                </ul>
                <!-- ============================================================== -->
                <!-- Right side toggle and nav items -->
                <!-- ============================================================== -->
                <ul style="background-color: #232637;"  class="navbar-nav float-right">
                    <!-- ============================================================== -->
                    <!-- Comment -->
                    <!-- ============================================================== -->
        
                    <!-- ============================================================== -->
                    <!-- End Comment -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Messages -->
                    <!-- ============================================================== -->
                    
                    <!-- ============================================================== -->
                    <!-- End Messages -->
                    <!-- ============================================================== -->

                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            @if(Auth::user()->foto != "")
                            <img src="{{url('/storage/'.Auth::user()->foto)}}" alt="user" class="rounded-circle" width="31">
                            @else
                            <img src="{{url('/admin/images/users/1.jpg')}}" alt="user" class="rounded-circle" width="31">
                            @endif
                            
                        </a>
                        <div class="dropdown-menu dropdown-menu-right user-dd animated">
                            <a class="dropdown-item" href="javascript:void(0)"><i class="ti-user m-r-5 m-l-5"></i> <label>{{ Auth::user()->name }}</label></a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                <i class="ti-arrow-right m-r-5 m-l-5"></i>
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                            <a class="dropdown-item" href="{{ url('/admin/user/ubahPassword/'.auth()->user()->id) }}"><i class="ti-settings m-r-5 m-l-5"></i> <label>Ubah password</label></a>
                            <div class="dropdown-divider"></div>
                            <div class="row">
                                <div class="p-l-30 p-10 col-6"><a href="{{url('/admin/user/profile/'.auth()->user()->id)}}" class="btn btn-sm btn-success btn-rounded">View Profile</a></div>
                            </div>
                        </div>
                    </li>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                </ul>
            </div>
        </nav>
    </header>

    <aside class="left-sidebar" style="background-color: #232637;" data-sidebarbg="skin5">
                <!-- Sidebar scroll-->
        <div class="scroll-sidebar">
            <!-- Sidebar navigation-->
            <nav class="sidebar-nav" style="background-color: #232637;">
                <ul id="sidebarnav" class="p-t-30" style="background-color: #232637;">
                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{url('/home')}}" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard</span></a></li>
                    <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-receipt"></i><span class="hide-menu">Tentang </span></a>
                        <ul aria-expanded="false" class="collapse  first-level">
                            <li class="sidebar-item"><a href="{{url('/admin/profil')}}" class="sidebar-link"><i class="mdi mdi-receipt"></i><span class="hide-menu"> Pesantren </span></a></li>
                            <li class="sidebar-item"><a href="{{url('/admin/pengasuh')}}" class="sidebar-link"><i class="mdi mdi-receipt"></i><span class="hide-menu"> Pengasuh </span></a></li>
                            <li class="sidebar-item"><a href="{{url('/admin/organisasi')}}" class="sidebar-link"><i class="mdi mdi-receipt"></i><span class="hide-menu"> Organisasi </span></a></li>
                        </ul>
                    </li>
                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{url('/admin/alumni')}}" aria-expanded="false"><i class="mdi mdi-border-outside"></i><span class="hide-menu">Alumni</span></a></li>
                    <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-border-outside"></i><span class="hide-menu">Fasilitas </span></a>
                        <ul aria-expanded="false" class="collapse  first-level">
                            <li class="sidebar-item"><a href="{{url('/admin/program')}}" class="sidebar-link"><i class="mdi mdi-receipt"></i><span class="hide-menu"> Program </span></a></li>
                            <li class="sidebar-item"><a href="{{url('/admin/sarana')}}" class="sidebar-link"><i class="mdi mdi-receipt"></i><span class="hide-menu"> Sarana </span></a></li>
                            <li class="sidebar-item"><a href="{{url('/admin/kurikulum')}}" class="sidebar-link"><i class="mdi mdi-receipt"></i><span class="hide-menu"> Kurikulum </span></a></li>
                        </ul>
                    </li>
                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{url('/admin/prestasi')}}" aria-expanded="false"><i class="mdi mdi-border-outside"></i><span class="hide-menu">Prestasi</span></a></li>
                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{url('/admin/berita')}}" aria-expanded="false"><i class="mdi mdi-border-outside"></i><span class="hide-menu">Berita</span></a></li>
                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{url('/admin/contact')}}" aria-expanded="false"><i class="mdi mdi-border-outside"></i><span class="hide-menu">Contact</span></a></li>
                    @if(auth()->user()->role == "admin")
                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{url('/admin/user')}}" aria-expanded="false"><i class="mdi mdi-border-outside"></i><span class="hide-menu">Kelola User</span></a></li>
                    @endif
                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{url('/admin/tema')}}" aria-expanded="false"><i class="mdi mdi-receipt"></i><span class="hide-menu">Tema</span></a></li>
                </ul>
            </nav>
            <!-- End Sidebar navigation -->
        </div>
        <!-- End Sidebar scroll-->
    </aside>

    <!-- ============================================================== -->
    <div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
     <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">{{ $title }}</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $title }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->

    @yield('container')

    <!-- ============================================================== -->
    <!-- footer -->
    <!-- ============================================================== -->
    <footer class="footer text-center">
        All Rights Reserved by Matrix-admin. Designed and Developed by <a href="https://wrappixel.com">WrapPixel</a>.
    </footer>
    <!-- ============================================================== -->
    <!-- End footer -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Page wrapper  -->
<!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Page wrapper  -->
<!-- ============================================================== -->
</div>

   
<script src="{{url('/admin/assets/libs/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="{{url('/admin/assets/libs/popper.js/dist/umd/popper.min.js')}}"></script>
<script src="{{url('/admin/assets/libs/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- slimscrollbar scrollbar JavaScript -->
<script src="{{url('/admin/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js')}}"></script>
<script src="{{url('/admin/assets/extra-libs/sparkline/sparkline.js')}}"></script>
<!--Wave Effects -->
<script src="{{url('/admin/dist/js/waves.js')}}"></script>
<!--Menu sidebar -->
<script src="{{url('/admin/dist/js/sidebarmenu.js')}}"></script>
<!--Custom JavaScript -->
<script src="{{url('/admin/dist/js/custom.min.js')}}"></script>
<!-- this page js -->
<script src="{{url('/admin/assets/libs/flot/excanvas.js')}}"></script>
<script src="{{url('/admin/assets/libs/flot/jquery.flot.js')}}"></script>
<script src="{{url('/admin/assets/libs/flot/jquery.flot.pie.js')}}"></script>
<script src="{{url('/admin/assets/libs/flot/jquery.flot.time.js')}}"></script>
<script src="{{url('/admin/assets/libs/flot/jquery.flot.stack.js')}}"></script>
<script src="{{url('/admin/assets/libs/flot/jquery.flot.crosshair.js')}}"></script>
<script src="{{url('/admin/assets/libs/flot.tooltip/js/jquery.flot.tooltip.min.js')}}"></script>
<script src="{{url('/admin/dist/js/pages/chart/chart-page-init.js')}}"></script>



<!-- <script src="{{url('/admin/extra-libs/multicheck/datatable-checkbox-init.js')}}"></script>
<script src="{{url('/admin/extra-libs/multicheck/jquery.multicheck.js')}}"></script>
<script src="{{url('/admin/extra-libs/DataTables/datatables.min.js')}}"></script>
<script>
    /****************************************
     *       Basic Table                   *
     ****************************************/
    $('#zero_config').DataTable();
</script> -->

@yield('js')

</body>
</html>



