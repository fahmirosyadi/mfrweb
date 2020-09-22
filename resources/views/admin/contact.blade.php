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
                <label for="nama" class="col-sm-3 text-right control-label col-form-label">Nama</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="nama" name="nama">
                </div>
            </div>
            <div class="form-group row">
                <label for="contact" class="col-sm-3 text-right control-label col-form-label">Contact</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="contact" name="contact">
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
    let nama = document.getElementById('nama');
    let contact = document.getElementById('contact');
    let notif = document.getElementById('notif');
    let cari = document.getElementById('cari');

      function isi(data2) {
        let thead = document.getElementById('tabel-head');
        thead.innerHTML = `
            <tr>
                <th style="text-align: center;" scope="col">No</th>
                <th style="text-align: center;" scope="col">Nama</th>
                <th style="text-align: center;" scope="col">Contact</th>
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
                    <td class="text-center">${data2[i].nama}</td>
                    <td class="text-center">${data2[i].contact}</td>
                    <td class="text-center">
                        <a data-toggle="modal" data-id="${data2[i].id}" data-target="#exampleModal" class="d-inline btn btn-sm btn-success text-white btn-ubah">Ubah</a>
                        <a data-id="${data2[i].id}" class="btn d-inline btn-sm btn-danger btn-hapus">Hapus</a>
                    </td>
                </tr>
            `;
        }
      }

    async function loadData() {
        let data = await mf.getData('/api/contact/');
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
            myForm.setAttribute('action', '/api/contact');
            id.value = "";
            nama.value = "";
            notif.innerHTML = "";
            contact.value = "";
        }
    });

    
    document.addEventListener('click', async function(e) {
        if (e.target.classList.contains('btn-hapus')) {
            let result = confirm('Hapus data?');
            let idContact = e.target.dataset.id;
            if (result == true) {
                let hapus = await mf.deleteData('/api/contact/delete/' + idContact);
                if (hapus) {
                    loadData();    
                }
            }
        }
    });

    document.addEventListener('click', async function(e) {
        if (e.target.classList.contains('btn-ubah')) {
            let idContact = e.target.dataset.id;
            let dataContact = await mf.getData('/api/contact/detail/' + idContact);
            id.value = dataContact.id;
            nama.value = dataContact.nama;
            notif.innerHTML = "";
            contact.value = dataContact.contact;
            let myForm = document.getElementById('myForm');
            myForm.setAttribute('action', '/api/contact/' + dataContact.id);
        }
    });

    cari.addEventListener('keyup',async function(){
        if (cari.value == '') {
            loadData();
        }else{
            let hasil = await mf.getData('/api/contact/search/' + cari.value,'loading2');
            isi(hasil);
        }
    });

</script>
@endsection

    