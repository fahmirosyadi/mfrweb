<!DOCTYPE html>
<html dir="ltr" lang="en">

<head th:replace="template::head"></head>

<body>

    <!-- Modal -->
    
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header th:replace="template::header"></header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside th:replace="template::sidebar"></aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Form</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Library</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-md-12">
                        <!-- Untuk form insert dan update bisa pakai satu form -->
                        <!-- Jadi 2 controller menuju form yang sama -->
                        <!-- bedanya yang satu ngirim objek kosong, yang satu ngirim objek yang udah ada isinya -->
                        <!-- object nya disamain sama object yang dikirim di controller -->
                        <form th:method="post" th:object="${user}" enctype="multipart/form-data" th:action="@{'/admin/user/save'}">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Form Data</h4>
                                    <!-- th:field="*{id}" itu sama kaya id="id" name="id" -->
                                    <!-- Disesuaikan sama attribut objek nya -->
                                    <!-- <input type="hidden" th:field="*{id}"> -->
                                    <div class="form-group row">
                                        <label for="nama" class="col-sm-3 text-right control-label col-form-label">Username</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" th:field="*{username}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="nama" class="col-sm-3 text-right control-label col-form-label">Password</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" th:field="*{pass}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="nama" class="col-sm-3 text-right control-label col-form-label">Active</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" th:field="*{active}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="nama" class="col-sm-3 text-right control-label col-form-label">Foto</label>
                                        <div class="col-sm-9">
                                            <input type="file" class="form-control" id="file" name="file">
                                        </div>
                                    </div>
                                </div>
                                <!-- Untuk csrf gak usah dipakai dulu, ini dipake kalau udah sampai security -->
                                <input type="hidden" th:name="${_csrf.parameterName}" th:value="${_csrf.token}">
                                <div class="border-top">
                                    <div class="card-body">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
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
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <div th:replace="template::foot"></div>
</body>
</html>


