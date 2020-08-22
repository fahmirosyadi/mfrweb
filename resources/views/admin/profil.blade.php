@extends('/admin/template')
@section('container')

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
                        <form id="myForm" enctype="multipart/form-data" method="POST" action="{{url('/api/profil')}}"  class="card">
                            @csrf
                            <div class="card-body">
                                <h4 class="card-title">Profil</h4>
                                <div class="form-group">
                                    <label for="nama">Nama Pondok</label>
                                    <input type="text" id="nama" name="nama" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <input type="text" id="alamat" name="alamat" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Tahun Berdiri</label>
                                    <input type="text" id="tahun" name="tahun" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="narasi">Sejarah</label>
                                    <textarea type="text" id="sejarah" name="sejarah" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Foto</label>
                                    <img class="d-block mb-3" src="" height="100" width="100" id="foto2">
                                    <input type="file" id="foto" name="foto" class="form-control">
                                </div>
                            </div>
                            <div class="border-top">
                                <div class="card-body">
                                    <button type="button" id="btn-simpan" class="btn btn-success">Simpan</button>
                                    <button type="button" id="btn-reset" class="btn btn-primary">Reset</button>
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
@endsection

@section('js')
    <script src="{{url('admin/libs/inputmask/dist/min/jquery.inputmask.bundle.min.js')}}"></script>
    <script src="{{url('dist/js/pages/mask/mask.init.js')}}"></script>
    <script src="{{url('admin/libs/select2/dist/js/select2.full.min.js')}}"></script>
    <script src="{{url('admin/libs/select2/dist/js/select2.min.js')}}"></script>
    <script src="{{url('admin/libs/jquery-asColor/dist/jquery-asColor.min.js')}}"></script>
    <script src="{{url('admin/libs/jquery-asGradient/dist/jquery-asGradient.js')}}"></script>
    <script src="{{url('admin/libs/jquery-asColorPicker/dist/jquery-asColorPicker.min.js')}}"></script>
    <script src="{{url('admin/libs/jquery-minicolors/jquery.minicolors.min.js')}}"></script>
    <script src="{{url('admin/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{url('admin/libs/quill/dist/quill.min.js')}}"></script>
    <script>
        //***********************************//
        // For select 2
        //***********************************//
        $(".select2").select2();

        /*colorpicker*/
        $('.demo').each(function() {
        //
        // Dear reader, it's actually very easy to initialize MiniColors. For example:
        //
         $(selector).minicolors();
        //
        // The way I've done it below is just for the demo, so don't get confused
        // by it. Also, data- attributes aren't supported at this time...they're
        // only used for this demo.
        //
        $(this).minicolors({
                control: $(this).attr('data-control') || 'hue',
                position: $(this).attr('data-position') || 'bottom left',

                change: function(value, opacity) {
                    if (!value) return;
                    if (opacity) value += ', ' + opacity;
                    if (typeof console === 'object') {
                        console.log(value);
                    }
                },
                theme: 'bootstrap'
            });

        });
        // datwpicker
        jQuery('.mydatepicker').datepicker();
        jQuery('#datepicker-autoclose').datepicker({
            autoclose: true,
            todayHighlight: true
        });


        let mf = new MyFetch();

        let id = document.getElementById('id');
        let nama = document.getElementById('nama');
        let alamat = document.getElementById('alamat');
        let tahun = document.getElementById('tahun');
        let sejarah = document.getElementById('sejarah');
        let foto = document.getElementById('foto');
        let foto2 = document.getElementById('foto2');

        let btnSimpan = document.getElementById('btn-simpan');
        let btnReset = document.getElementById('btn-reset');

        btnSimpan.addEventListener('click', async function() {
            let mForm = document.getElementById('myForm');
            let dataForm = new FormData(myForm);
            console.log(dataForm);
            let update = await mf.postData(mForm.action, dataForm);
            if (update != null) {
                alert("Berhasil disimpan");
                loadData();
            }else {
                alert("Gagal diterapkan");
            }
        });


        function isi(data) {
            nama.value = data.nama;
            alamat.value = data.alamat;
            tahun.value = data.tahun;
            sejarah.value = data.sejarah;
            foto.value = "";
            foto2.src = "/storage/" + data.foto;
        }

        async function loadData() {
            let data = await mf.getData('/api/profil');
            isi(data);
        }
        loadData();

    </script>
@endsection