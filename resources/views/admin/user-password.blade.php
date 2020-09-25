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
            <form id="myForm" enctype="multipart/form-data" method="POST" action="{{url('/api/user/updatePassword/'. auth()->user()->id )}}"  class="card">
                @csrf
                <div class="card-body">
                    <h4 class="card-title">Ubah Password</h4>
                    <div id="notif"></div>
                    <input type="hidden" id="idUser" value="{{ $idUser }}">
                    <div class="form-group">
                        <label for="old-password">Password Lama</label>
                        <input type="password" id="old-password" name="old-password" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="password">Password Baru</label>
                        <input type="password" id="password" name="password" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">Konfirmasi Password Baru</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control">
                    </div>
                </div>
                <div class="border-top">
                    <div class="card-body">
                        <button type="button" id="btn-simpan" class="btn btn-success">Simpan</button>
                        <img id="loading" style="visibility: hidden;" height="40" src="{{ url('/images/loading.gif') }}">
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
<script src="{{url('admin/ckeditor/ckeditor.js')}}"></script>
<script type="text/javascript">
    CKEDITOR.replace( 'sambutan' );
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
    let idUser = document.getElementById('idUser');
    let oldPassword = document.getElementById('old-password');
    let password = document.getElementById('password');
    let passwordConfirmation = document.getElementById('password_confirmation');
    let notif = document.getElementById('notif');

    let btnSimpan = document.getElementById('btn-simpan');
    let btnReset = document.getElementById('btn-reset');

    btnSimpan.addEventListener('click', async function() {
        let mForm = document.getElementById('myForm');
        let dataForm = new FormData(myForm);
        let status = await mf.postData(myForm.action, dataForm,'loading');
        if (status == true) {
            notif.innerHTML = `
                <div class="alert alert-success">Berhasil disimpan</div>
            `;
            window.scroll({top:0,behavior: 'smooth'});
            oldPassword.value = '';
            password.value = '';
            passwordConfirmation.value = '';
            loadData();
        }else{
            notif.innerHTML = "";
            for(let i = 0; i < status.length; i++){
                notif.innerHTML += `
                    <div class="alert alert-danger">${status[i]}</div>
                `;
            }
            window.scroll({top:0,behavior: 'smooth'});
        }
    });


    function isi(data) {
        nama.value = data.name;
        email.value = data.email;
        foto.value = "";
        foto2.src = "/storage/" + data.foto;
    }

    async function loadData() {
        let data = await mf.getData('/api/user/detail/' + idUser.value);
        isi(data);
    }
    loadData();

</script>
@endsection