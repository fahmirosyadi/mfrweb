@extends('/layouts/adminlayout')

<!-- Modal -->
@section('modal')
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <form id="myForm" enctype="multipart/form-data" method="post" action="/api/gallery">
          @csrf
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div id="notif"></div>
            <input type="hidden" id="id" name="id">
            <input type="hidden" id="prestasiId" name="prestasiId" value="{{$prestasiId}}">
            <div class="col-sm-12">
                <img id="foto2" style="width: 100%" src="{{url('/storage/alumni/default.jpg')}}">
            </div>
            <div class="form-group row">
                <label for="foto" class="col-sm-3 text-right control-label col-form-label">Foto</label>
                <div class="col-sm-9">
                    <input type="file" autocomplete="false" class="form-control" id="foto" name="foto">
                </div>
            </div>
          	<div class="form-group row">
	            <label for="keterangan" class="col-sm-3 text-right control-label col-form-label">Keterangan</label>
	            <div class="col-sm-9">
	                <input type="text" autocomplete="false" class="form-control" id="keterangan" name="keterangan">
	            </div>
	        </div>
          </div>
          <div class="modal-footer">
            <img id="loading" style="visibility: hidden;" height="40" src="{{ url('/images/loading.gif') }}">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
            <button type="button" id="btn-simpan" class="btn btn-primary">Simpan</button>
          </div>
      </form>
    </div>
  </div>
</div>
@endsection

@section('container')
<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <a data-toggle="modal" data-target="#exampleModal" id="btn-tambah" class="btn btn-primary text-white mt-2 btn-tambah mb-3">Tambah Foto</a>
    <div class="row el-element-overlay" id="container-foto">

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





<script type="text/javascript">

    let mf = new MyFetch();
    let id = document.getElementById('id');
    let keterangan = document.getElementById('keterangan');
    let foto = document.getElementById('foto');
    let foto2 = document.getElementById('foto2');
    let notif = document.getElementById('notif');
    let cari = document.getElementById('cari');

      function isi(data2) {
        let tbody = document.getElementById('container-foto');
        tbody.innerHTML = "";
        for (var i = 0; i < data2.length; i++) {
            let foto = '/storage/gallery-prestasi/default.jpg';
            if (data2[i].foto != null) {
                foto = '/storage/' + data2[i].foto;
            }
            tbody.innerHTML += `
                <div class="col-lg-3 col-md-6">
		            <div class="card">
		                <div class="el-card-item">
		                    <div class="el-card-avatar el-overlay-1"> <img src="${foto}" alt="user" />
		                        <div class="el-overlay">
		                            <ul class="list-style-none el-info">
		                                <li class="el-item"><a class="btn default btn-outline image-popup-vertical-fit el-link" href="assets/images/big/img1.jpg"><i class="mdi mdi-magnify-plus"></i></a></li>
		                                <li class="el-item"><a class="btn default btn-outline el-link" href="javascript:void(0);"><i class="mdi mdi-link"></i></a></li>
		                            </ul>
		                        </div>
		                    </div>
		                	<a data-id="` + data2[i].id + `" class="btn btn-sm btn-danger btn-hapus mr-2 mt-2 float-right">Hapus</a>
		                	<a data-toggle="modal" data-target="#exampleModal" data-id="${data2[i].id}" id="btn-ubah" class="btn btn-sm btn-warning text-white mr-2 mt-2 btn-ubah float-right">Edit Foto</a>
		                </div>
		            </div>
		        </div>
            `;
        }
      }

      async function loadData() {
      	let prestasiId = document.getElementById('prestasiId').value;
        let data = await mf.getData('/api/gallery/' + prestasiId);
        isi(data);
      }

      loadData();

    let btnSimpan = document.getElementById('btn-simpan');
    btnSimpan.addEventListener('click', async function() {
        let myForm = document.getElementById('myForm');
        let dataForm = new FormData(myForm);
        let status = await mf.postData(myForm.action, dataForm,'loading');
        if (status == true) {
            loadData();
            $('#exampleModal').modal('hide');
        }else{
            notif.innerHTML = "";
            for(let i = 0; i < status.length; i++){
                notif.innerHTML += `
                    <div class="alert alert-danger">${status[i]}</div>
                `;
            }
        }
    })

    document.addEventListener('click',async function(e) {
        if (e.target.classList.contains('btn-tambah')) {
            let myForm = document.getElementById('myForm');
            myForm.setAttribute('action', '/api/gallery');
            id.value = "";
            keterangan.value = "";
            foto.value = "";
            foto2.src = "/storage/alumni/default.jpg";
            notif.innerHTML = "";
        }
    });

    
    document.addEventListener('click', async function(e) {
        if (e.target.classList.contains('btn-hapus')) {
            let result = confirm('Hapus data?');
            let idGallery = e.target.dataset.id;
            if (result == true) {
                let hapus = await mf.deleteData('/api/gallery/delete/' + idGallery);
                if (hapus) {
                    loadData();    
                }
            }else{
                alert('Data tidak ditemukan');
            }
        }
    });

    document.addEventListener('click', async function(e) {
        if (e.target.classList.contains('btn-ubah')) {
            let idGallery = e.target.dataset.id;
            let dataGallery = await mf.getData('/api/gallery/detail/' + idGallery);
            id.value = dataGallery.id;
            keterangan.value = dataGallery.keterangan;
            notif.innerHTML = "";
            foto.value = "";
            if (dataGallery.foto != null) {
                foto2.src = '/storage/' + dataGallery.foto;
            } else {
                foto2.src = '/storage/gallery/default.jpg';
            }
            let myForm = document.getElementById('myForm');
            myForm.setAttribute('action', '/api/gallery/' + dataGallery.id);
        }
    });

    cari.addEventListener('keyup', async function() {
        if (cari.value == '') {
            loadData();
        }else{
            let hasil = await mf.getData('/api/alumni/search/' + cari.value,'loading2');
            isi(hasil);
        }
    });

</script>

@endsection

            