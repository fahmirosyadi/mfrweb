@extends('/layouts/adminlayout')

@section('modal')
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form id="myForm" method="post" action="@{'/save'}">
        @csrf
          <div class="modal-header">
            <h5 class="modal-title" id="@{'exampleModalLabel'}">Tambah Data</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div id="notif"></div>
            <input type="hidden" id="id" name="id">
            <div class="form-group row">
                <label for="nama" class="col-sm-3 text-right control-label col-form-label">Kegiatan</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="kegiatan" name="kegiatan">
                </div>
            </div>
            <div class="form-group row">
                <label for="tahun" class="col-sm-3 text-right control-label col-form-label">Tahun</label>
                <div class="col-sm-9">
                    <select id="tahun" class="form-control" name="tahun">
                        
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="prestasi" class="col-sm-3 text-right control-label col-form-label">Prestasi</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="prestasi" name="prestasi">
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
<div class="container-fluid" id="tabel">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Data</h5>
            <div class="table-responsive">
                <div class="col-sm-12 col-md-6">
                    <label>
                        Search:<br>
                        <input type="search" id="cari" class="form-control form-control-sm">
                    </label>
                    <img id="loading2" style="visibility: hidden;" height="40" src="{{ url('/images/loading.gif') }}">
                </div>
                <table id="zero_config" class="table table-striped table-bordered">
                    <thead id="tabel-head">
                        
                    </thead>
                    <tbody id="tabel-body">
                        
                    </tbody>    
                </table>
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

<script type="text/javascript">

    let mf = new MyFetch();
    let id = document.getElementById('id');
    let kegiatan = document.getElementById('kegiatan');
    let tahun = document.getElementById('tahun');
    let prestasi = document.getElementById('prestasi');
    let notif = document.getElementById('notif');
    let cari = document.getElementById('cari');

      function isi(data2) {
        let thead = document.getElementById('tabel-head');
        thead.innerHTML = `
            <tr>
                <th style="text-align: center;" scope="col">No</th>
                <th style="text-align: center;" scope="col">Kegiatan</th>
                <th style="text-align: center;" scope="col">Tahun</th>
                <th style="text-align: center;" scope="col">Prestasi</th>
                <th style="text-align: center;" scope="col">
                    <a data-toggle="modal" data-target="#exampleModal" id="btn-tambah" class="btn btn-primary text-white mt-2 btn-tambah">Tambah</a>
                </th>
            </tr>
        `;
        let tbody = document.getElementById('tabel-body');
        tbody.innerHTML = "";
        for (var i = 0; i < data2.length; i++) {
            tbody.innerHTML += `
                <tr>
                    <td class="text-center">${i + 1}}</td>
                    <td class="text-center">${data2[i].kegiatan}</td>
                    <td class="text-center">${data2[i].tahun}</td>
                    <td class="text-center">${data2[i].prestasi}</td>
                    <td class="text-center">
                        <a data-toggle="modal" data-id="${data2[i].id}" data-target="#exampleModal" class="d-inline btn btn-sm btn-success text-white btn-ubah">Ubah</a>
                        <a data-id="${data2[i].id}" href="/admin/prestasi/gallery/${data2[i].id}" class="btn d-inline btn-sm btn-warning">Gallery</a>
                        <a data-id="${data2[i].id}" class="btn d-inline btn-sm btn-danger btn-hapus">Hapus</a>
                    </td>
                </tr>
            `;
        }
      }

    async function loadData() {
        let data = await mf.getData('/api/prestasi/');
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

    document.addEventListener('click', function(e) {
        if (e.target.classList.contains('btn-tambah')) {
            $('#exampleModal').modal('show');  
            let myForm = document.getElementById('myForm');
            myForm.setAttribute('action', '/api/prestasi');
            id.value = "";
            kegiatan.value = "";
            notif.innerHTML = "";
            let date = new Date();
            let th = date.getFullYear();
            for (var i = th; i > 1999; i--) {
                tahun.innerHTML += `
                    <option>${i}</option>
                `;
            }
            prestasi.value = "";
        }
    });

    
    document.addEventListener('click', async function(e) {
        if (e.target.classList.contains('btn-hapus')) {
            let result = confirm('Hapus data?');
            let idPrestasi = e.target.dataset.id;
            if (result == true) {
                let hapus = await mf.deleteData('/api/prestasi/delete/' + idPrestasi);
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
            let idPrestasi = e.target.dataset.id;
            let dataPrestasi = await mf.getData('/api/prestasi/detail/' + idPrestasi);
            id.value = dataPrestasi.id;
            kegiatan.value = dataPrestasi.kegiatan;
            notif.innerHTML = "";
            let date = new Date();
            let th = date.getFullYear();
            for (var i = th; i > 1999; i--) {
                if (i == dataPrestasi.tahun) {
                    tahun.innerHTML += `
                        <option selected>${i}</option>
                    `;  
                } else {
                    tahun.innerHTML += `
                        <option>${i}</option>
                    `;
                }
            }
            prestasi.value = dataPrestasi.prestasi;
            let myForm = document.getElementById('myForm');
            myForm.setAttribute('action', '/api/prestasi/' + dataPrestasi.id);
        }
    });

    cari.addEventListener('keyup',async function(){
        if (cari.value == '') {
            loadData();
        }else{
            let hasil = await mf.getData('/api/prestasi/search/' + cari.value,'loading2');
            isi(hasil);
        }
    });

</script>
@endsection

    