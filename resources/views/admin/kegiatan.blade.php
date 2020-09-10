@extends('/layouts/adminlayout')

<!-- Modal -->
@section('modal')
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form id="myForm" method="post" enctype="multipart/form-data" action="/api/kegiatan">
          @csrf
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <input type="hidden" id="id" name="id">
            <input type="hidden" name="jenis" id="jenis">
            <div class="form-group row">
                <label for="kegiatan" class="col-sm-3 text-right control-label col-form-label">Kegiatan</label>
                <div class="col-sm-9">
                    <input type="text" autocomplete="false" class="form-control" id="kegiatan" name="kegiatan">
                </div>
            </div>
            <div class="form-group row">
                <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Keterangan</label>
                <div class="col-sm-9">
                    <textarea class="form-control" id="keterangan" name="keterangan"></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label for="foto" class="col-sm-3 text-right control-label col-form-label">Foto</label>
                <div class="col-sm-9">
                    <input type="file" autocomplete="false" class="form-control" id="foto" name="foto">
                </div>
            </div>
            <div class="form-group row">
                <label for="foto2" class="col-sm-3 text-right control-label col-form-label"></label>
                <div class="col-sm-9">
                    <img id="foto2" height="100" width="100" src="{{url('/storage/kegiatan/default.jpg')}}">
                </div>
            </div>
          </div>
          <div class="modal-footer">
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
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <label>
                            Jenis:<br>
                            <select id="select-jenis" class="form-control form-control-sm">
                                <option value="wajib">Wajib</option>
                                <option value="ekstra">Ekstrakurikuler</option>
                            </select>
                        </label>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <label>
                            Search:<br>
                            <input type="search" id="cari" class="form-control form-control-sm">
                        </label>
                    </div>
                </div>
                <table class="table table-striped table-bordered">
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
    let keterangan = document.getElementById('keterangan');
    let foto = document.getElementById('foto');
    let foto2 = document.getElementById('foto2');
    let jenis = document.getElementById('jenis');

      function isi(data2) {
        let thead = document.getElementById('tabel-head');
        thead.innerHTML = `
            <tr>
                <th style="text-align: center;" scope="col">No</th>
                <th style="text-align: center;" scope="col">Kegiatan</th>
                <th style="text-align: center;" scope="col">Foto</th>
                <th style="text-align: center;" scope="col">
                    <a data-toggle="modal" data-target="#exampleModal" id="btn-tambah" class="btn btn-primary text-white mt-2 btn-tambah">Tambah</a>
                </th>
            </tr>
        `;
        let tbody = document.getElementById('tabel-body');
        tbody.innerHTML = "";
        for (var i = 0; i < data2.length; i++) {
            let foto = '/storage/kegiatan/default.jpg';
            if (data2[i].foto != null) {
                foto = '/storage/' + data2[i].foto;
            }
            tbody.innerHTML += `
                <tr>
                    <td class="text-center">${i + 1}}</td>
                    <td class="text-center">${data2[i].kegiatan}</td>
                    <td class="text-center">
                        <img height="100" width="100" src="${foto}">
                    </td>
                    <td class="text-center">
                        <a data-toggle="modal" data-id="${data2[i].id}" data-target="#exampleModal" class="d-inline btn btn-sm btn-success text-white btn-ubah">Ubah</a>
                        <a data-id="${data2[i].id}" class="btn d-inline btn-sm btn-danger btn-hapus">Hapus</a>
                    </td>
                </tr>
            `;
        }
      }

      async function loadData() {
        let pilJenis = document.getElementById('select-jenis');
        let data = await mf.getData('/api/kegiatan/' + pilJenis.value);
        isi(data);
      }

      let pilJenis = document.getElementById('select-jenis');
      pilJenis.addEventListener('change', function() {
        loadData();
      });
      loadData();

    let btnSimpan = document.getElementById('btn-simpan');
    btnSimpan.addEventListener('click', async function() {
        let myForm = document.getElementById('myForm');
        let dataForm = new FormData(myForm);
        let simpan = await mf.postData(myForm.action, dataForm);
        if (simpan) {
            loadData();
        }else{
            alert('Gagal menyimpan');
        }
        $('#exampleModal').modal('hide');
    })

    document.addEventListener('click',async function(e) {
        if (e.target.classList.contains('btn-tambah')) {
            $('#exampleModal').modal('show');  
            let myForm = document.getElementById('myForm');
            myForm.setAttribute('action', '/api/kegiatan');
            id.value = "";
            kegiatan.value = "";
            keterangan.value = "";
            foto.value = "";
            foto2.src = "/storage/kegiatan/default.jpg";
            jenis.value = document.getElementById('select-jenis').value;
        }
    });

    
    document.addEventListener('click', async function(e) {
        if (e.target.classList.contains('btn-hapus')) {
            let result = confirm('Hapus data?');
            let idKegiatan = e.target.dataset.id;
            if (result == true) {
                let hapus = await mf.deleteData('/api/kegiatan/delete/' + idKegiatan);
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
            let idKegiatan = e.target.dataset.id;
            let dataKegiatan = await mf.getData('/api/kegiatan/detail/' + idKegiatan);
            id.value = dataKegiatan.id;
            kegiatan.value = dataKegiatan.kegiatan;
            keterangan.value = dataKegiatan.keterangan;
            jenis.value = dataKegiatan.jenis;
            foto.value = "";
            if (dataKegiatan.foto != null) {
                foto2.src = '/storage/' + dataKegiatan.foto;
            } else {
                foto2.src = '/storage/kegiatan/default.jpg';
            }
            let myForm = document.getElementById('myForm');
            myForm.setAttribute('action', '/api/kegiatan/' + dataKegiatan.id);
        }
    });

</script>
@endsection


        