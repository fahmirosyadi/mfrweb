@extends('/layouts/adminlayout')

@section('container')
<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
			    <form id="myForm" enctype="multipart/form-data" method="POST" action="{{url('/admin/berita/update/'.$berita->id)}}"  class="card">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="judul">Judul</label>
                            <input value="{{ $berita->judul }}" type="text" id="judul" name="judul" class="form-control">
                        </div>
                        <div class="form-group">
                            <textarea type="text" id="berita" name="berita" class="form-control">
                                {{ $berita->berita }}   
                            </textarea>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Foto</label>
                            <img class="d-block mb-3" src="{{url('/storage/'.$berita->foto)}}" height="100" width="100" id="foto2">
                            <input type="file" id="foto" name="foto" class="form-control">
                        </div>
                    </div>
                    <div class="border-top">
                        <div class="card-body">
                            <button type="submit" id="btn-simpan" class="btn btn-success">Simpan</button>
                            <!-- <button type="submit" class="btn btn-success">Simpan</button> -->
                            <button type="button" id="btn-reset" class="btn btn-primary">Reset</button>
                        </div>
                    </div>
                </form>
			</div>
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
    <script src="{{url('admin/ckeditor/ckeditor.js')}}"></script>
    <script type="text/javascript">
        CKEDITOR.replace( 'berita' );
    </script>
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
        let berita = document.getElementById('berita');
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
            let listBerita = document.getElementById('listBerita');
            listBerita.innerHTML = "";
            for (var i = 0; i < data.length; i++) {
	            listBerita.innerHTML += ``;
            }
        }

        async function loadData() {
            let data = await mf.getData('/api/berita');
            isi(data);
        }
        loadData();

        document.addEventListener('click', async function(e) {
        	if (e.target.classList.contains('btn-edit')) {
        		let data = await mf.getData('/api/berita/detail/' + e.target.dataset.id);
        		console.log(data);
        		id.value = data.id;
        		berita.innerHTML = data.berita;
        		foto2.src = "/storage/" + data.foto;
        	}
        });

    </script>
@endsection

