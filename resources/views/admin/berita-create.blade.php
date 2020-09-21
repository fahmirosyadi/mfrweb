@extends('/layouts/adminlayout')

@section('container')

<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
			    <form id="myForm" enctype="multipart/form-data" method="POST" action="{{url('/admin/berita')}}"  class="card">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="judul">Judul</label>
                            <input type="text" id="judul" name="judul" class="form-control">
                        </div>
                        @error('judul')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <textarea type="text" id="berita" name="berita" class="form-control">
                                  
                            </textarea>
                        </div>
                        @error('berita')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label for="alamat">Foto</label>
                            <img class="d-block mb-3" src="" height="100" width="100" id="foto2">
                            <input type="file" id="foto" name="foto" class="form-control">
                        </div>
                        @error('foto')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="border-top">
                        <div class="card-body">
                            <button type="submit" id="btn-simpan" class="btn btn-success">Simpan</button>
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

    </script>
@endsection

