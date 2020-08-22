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
                        <form id="myForm" enctype="multipart/form-data" method="POST" action="{{url('/api/tema')}}"  class="card">
                            @csrf
                            <div class="card-body">
                                <h4 class="card-title">Tema</h4>
                                <div class="form-group">
                                    <label for="judul">Judul</label>
                                    <input type="text" id="judul" name="judul" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="judul">Background 1</label>
                                    <img src="" id="gambar1" height="100" width="100" class="d-block mb-3">
                                    <input type="file" id="bg1" name="bg1" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="judul">Background 2</label>
                                    <img src="" id="gambar2" height="100" width="100" class="d-block mb-3">
                                    <input type="file" id="bg2" name="bg2" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="judul">Style</label>
                                    <select id="tema" name="tema" class="form-control">
                                    </select>
                                </div>
                                <!-- <div class="form-group">
                                    <label for="hue-demo">Hue</label>
                                    <input type="text" id="hue-demo" class="form-control demo" data-control="hue" value="#ff6161">
                                </div>
                                <div class="form-group">
                                    <label for="position-bottom-left">Bottom left (default)</label>
                                    <input type="text" id="position-bottom-left" class="form-control demo" data-position="bottom left" value="#0088cc">
                                </div>
                                <div class="form-group">
                                    <label for="position-top-right">Top right</label>
                                    <input type="text" id="position-top-right" class="form-control demo" data-position="top right" value="#0088cc">
                                </div>
                                <label>Datepicker</label>
                                <div class="input-group">
                                    <input type="text" class="form-control mydatepicker" placeholder="mm/dd/yyyy">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                    </div>
                                </div>
                                <label class="m-t-15">Autoclose Datepicker</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="datepicker-autoclose" placeholder="mm/dd/yyyy">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                    </div>
                                </div> -->
                            </div>
                            <div class="border-top">
                                <div class="card-body">
                                    <button type="button" id="btn-simpan" class="btn btn-success">Terapkan</button>
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
        let judul = document.getElementById('judul');
        let bg1 = document.getElementById('bg1');
        let bg2 = document.getElementById('bg2');
        let gambar1 = document.getElementById('gambar1');
        let gambar2 = document.getElementById('gambar2');
        let tema = document.getElementById('tema');

        let btnSimpan = document.getElementById('btn-simpan');
        let btnReset = document.getElementById('btn-reset');

        btnSimpan.addEventListener('click', async function() {
            let mForm = document.getElementById('myForm');
            let dataForm = new FormData(myForm);
            console.log(dataForm);
            let update = await mf.postData(mForm.action, dataForm);
            if (update != null) {
                alert("Berhasil diterapkan");
                loadData();
            }else {
                alert("Gagal diterapkan");
            }
        });


        function isi(data) {
            judul.value = data.judul;
            bg1.value = "";
            bg2.value = "";
            gambar1.src = "/storage/" + data.bg1;
            gambar2.src = "/storage/" + data.bg2;
            tema.innerHTML = "";
            let temaDefault = ["tema1","tema2"];
            for (var i = 0; i < temaDefault.length; i++) {
                if (temaDefault[i] == data.tema) {
                    tema.innerHTML += `<option selected>${temaDefault[i]}</option>`;
                } else {
                    tema.innerHTML += `<option>${temaDefault[i]}</option>`;
                }
            }
        }

        async function loadData() {
            let data = await mf.getData('/api/tema');
            isi(data);
        }
        loadData();

    </script>
@endsection