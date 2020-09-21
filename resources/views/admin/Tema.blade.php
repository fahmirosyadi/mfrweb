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
            <form id="myForm" enctype="multipart/form-data" method="POST" action="{{url('/api/tema')}}"  class="card">
                @csrf
                <div class="card-body">
                    <h4 class="card-title">Tema</h4>
                    <div id="notif"></div>
                    <div class="form-group">
                        <label for="judul2">Judul Baris ke-1</label>
                        <input type="text" id="judul2" name="judul" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="judul3">Judul Baris ke-2 (Optional)</label>
                        <input type="text" id="judul3" name="judul2" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="logo">Logo</label>
                        <img src="" id="gambar-logo" height="100" width="100" class="d-block mb-3">
                        <input type="file" id="logo" name="logo" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="bg1">Background 1</label>
                        <img src="" id="gambar1" height="100" width="100" class="d-block mb-3">
                        <input type="file" id="bg1" name="bg1" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="bg2">Background 2</label>
                        <img src="" id="gambar2" height="100" width="100" class="d-block mb-3">
                        <input type="file" id="bg2" name="bg2" class="form-control">
                    </div>
                </div>
                <div class="border-top">
                    <div class="card-body">
                        <button type="button" id="btn-simpan" class="btn btn-success">Terapkan</button>
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
    let judul = document.getElementById('judul2');
    let judul2 = document.getElementById('judul3');
    let bg1 = document.getElementById('bg1');
    let bg2 = document.getElementById('bg2');
    let logo = document.getElementById('logo');
    let gambar1 = document.getElementById('gambar1');
    let gambar2 = document.getElementById('gambar2');
    let gambarLogo = document.getElementById('gambar-logo');
    let tema = document.getElementById('tema');
    let notif = document.getElementById('notif');

    let btnSimpan = document.getElementById('btn-simpan');
    let btnReset = document.getElementById('btn-reset');

    btnSimpan.addEventListener('click', async function() {
        let mForm = document.getElementById('myForm');
        let dataForm = new FormData(myForm);
        console.log(dataForm);
        let update = await mf.postData(mForm.action, dataForm);
        if (update == true) {
            notif.innerHTML = `
                <div class="alert alert-success" role="alert">Berhasil diterapkan</div>
            `
            window.scroll({top: 0, behavior: 'smooth'});
            loadData();
        }else {
            notif.innerHTML = "";
            for(let i = 0; i < update.length; i++){
                notif.innerHTML += `
                    <div class="alert alert-danger" role="alert">${update[i]}</div>
                `

            }
            window.scroll({top: 0,behavior: 'smooth'});
        }
    });

    function isi(data) {
        judul.value = data.judul;
        judul2.value = data.judul2;
        bg1.value = "";
        bg2.value = "";
        logo.value = "";
        gambar1.src = "/storage/" + data.bg1;
        gambar2.src = "/storage/" + data.bg2;
        gambarLogo.src = "/storage/" + data.logo;
    }

    async function loadData() {
        let data = await mf.getData('/api/tema');
        isi(data);
    }
    loadData();

</script>
@endsection