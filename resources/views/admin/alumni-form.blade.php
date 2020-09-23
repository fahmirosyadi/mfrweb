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
			    <form id="myForm" enctype="multipart/form-data" method="POST" action="{{ $action }}"  class="card">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input value="{{ $alumni->nama }}" type="text" id="nama" name="nama" class="form-control">
                        </div>
                        @error('nama')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label for="tahun">Tahun</label>
                            <select name="tahun" class="form-control" id="tahun"></select>
                        </div>
                        @error('tahun')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" value="{{ $alumni->alamat }}" id="alamat" name="alamat" class="form-control">
                        </div>
                        @error('alamat')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label for="job">Pekerjaan</label>
                            <input type="text" value="{{ $alumni->job }}" id="job" name="job" class="form-control">
                        </div>
                        @error('job')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label>Testimoni</label>
                            <textarea type="text" id="testimoni" name="testimoni" class="form-control">
                                {{ $alumni->testimoni }}   
                            </textarea>
                        </div>
                        @error('testimoni')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label for="alamat">Foto</label>
                            <img class="d-block mb-3" src="{{url('/storage/'.$alumni->foto)}}" height="100" width="100" id="foto2">
                            <input type="file" id="foto" name="foto" class="form-control">
                        </div>
                        @error('foto')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="border-top">
                        <div class="card-body">
                            <button type="submit" id="btn-simpan" class="btn btn-success">Simpan</button>
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
        CKEDITOR.replace( 'testimoni' );
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

        let md = new MyCode();
        md.loadPeriode('tahun');

    </script>
@endsection

