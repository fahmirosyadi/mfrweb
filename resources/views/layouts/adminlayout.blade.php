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
    <link rel="icon" type="image/png" sizes="16x16" href="{{url('/storage/tampilan/logo.png')}}">
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
            font-size: 10px;
            position: absolute; 
            margin-left: 65px;
            margin-top: 30px;
            padding-top: 2px;
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
                <a class="navbar-brand" href="index.html">
                    <!-- Logo icon -->
                    
                    <!--End Logo icon -->
                    <!-- Logo text -->
                    <span class="logo-text">
                         <!-- dark Logo text -->
                        <img src="{{url('/storage/tampilan/brand.png')}}" style="float:left; position: relative;" height="70" alt="homepage" class="light-logo" />
                        <div class="p-2 mt-2 brand-text" style="">
                            <h6>PONDOK PESANTREN</h6>
                            <h6>KH. AHMAD DAHLAN</h6>
                            <h6>SIPIROK</h6>
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
            <div class="navbar-collapse collapse" style="background-color: #232637;" data-navbarbg="skin5">
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
                        <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="{{url('/admin/images/users/1.jpg')}}" alt="user" class="rounded-circle" width="31"></a>
                        <div class="dropdown-menu dropdown-menu-right user-dd animated">
                            <a class="dropdown-item" href="javascript:void(0)"><i class="ti-user m-r-5 m-l-5"></i> <label>{{ Auth::user()->name }}</label></a>
                            <!-- <form method="post" action="{{url('/logout')}}">    
                                <button class="dropdown-item" type="submit"><i class="fa fa-power-off m-r-5 m-l-5"></i> Logout</button>
                            </form> -->
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                            <div class="dropdown-divider"></div>
                            <div class="p-l-30 p-10"><a href="javascript:void(0)" class="btn btn-sm btn-success btn-rounded">View Profile</a></div>
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
                            <li class="sidebar-item"><a href="{{url('/admin/profil')}}" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu"> Pesantren </span></a></li>
                            <li class="sidebar-item"><a href="{{url('/admin/pengasuh')}}" class="sidebar-link"><i class="mdi mdi-note-plus"></i><span class="hide-menu"> Pengasuh </span></a></li>
                            <li class="sidebar-item"><a href="{{url('/admin/organisasi')}}" class="sidebar-link"><i class="mdi mdi-note-plus"></i><span class="hide-menu"> Organisasi </span></a></li>
                        </ul>
                    </li>
                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{url('/admin/alumni')}}" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Alumni</span></a></li>
                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{url('/admin/kegiatan')}}" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Kegiatan</span></a></li>
                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{url('/admin/prestasi')}}" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Prestasi</span></a></li>
                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{url('/admin/sarana')}}" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Sarana</span></a></li>
                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{url('/admin/kurikulum')}}" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Kurikulum</span></a></li>
                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{url('/admin/berita')}}" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Berita</span></a></li>
                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{url('/admin/user')}}" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Kelola User</span></a></li>
                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{url('/admin/tema')}}" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Tema</span></a></li>
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
                <h4 class="page-title">Form Basic</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Berita</li>
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



