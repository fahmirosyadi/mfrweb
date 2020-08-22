@extends('/admin/template')
    <!-- Modal -->
    @section('modal')
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <form id="myForm" enctype="multipart/form-data" method="post" action="/api/alumni">
              @csrf
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <input type="hidden" id="id" name="id">
                <div class="form-group row">
                    <label for="nama" class="col-sm-3 text-right control-label col-form-label">Nama</label>
                    <div class="col-sm-9">
                        <input type="text" autocomplete="false" class="form-control" id="nama" name="nama">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="alamat" class="col-sm-3 text-right control-label col-form-label">Alamat</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="alamat" name="alamat">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Tahun" class="col-sm-3 text-right control-label col-form-label">Tahun</label>
                    <div class="col-sm-9">
                        <select id="tahun" name="tahun" class="form-control form-control-sm">
                        </select>
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
                        <img id="foto2" height="100" width="100" src="{{url('/storage/alumni/default.jpg')}}">
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
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Tables</h4>
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
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>


    

    <script type="text/javascript">

        let mf = new MyFetch();
        let id = document.getElementById('id');
        let nama = document.getElementById('nama');
        let alamat = document.getElementById('alamat');
        let foto = document.getElementById('foto');
        let foto2 = document.getElementById('foto2');
        let tahun = document.getElementById('tahun');

          function isi(data2) {
            let thead = document.getElementById('tabel-head');
            thead.innerHTML = `
                <tr>
                    <th style="text-align: center;" scope="col">No</th>
                    <th style="text-align: center;" scope="col">Nama</th>
                    <th style="text-align: center;" scope="col">Alamat</th>
                    <th style="text-align: center;" scope="col">Tahun</th>
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
                        <td>${data2[i].nama}</td>
                        <td>${data2[i].alamat}</td>
                        <td>${data2[i].tahun}</td>
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
            let data = await mf.getData('/api/alumni');
            isi(data);
          }

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
                let myForm = document.getElementById('myForm');
                myForm.setAttribute('action', '/api/alumni');
                id.value = "";
                nama.value = "";
                alamat.value = "";
                foto.value = "";
                let date = new Date();
                let th = date.getFullYear(); 
                tahun.innerHTML = "";
                for (let i = th; i > 1999; i--) {
                    tahun.innerHTML += `
                        <option>${i}</option>
                    `;
                }
                foto2.src = "/storage/alumni/default.jpg";
            }
        });

        
        document.addEventListener('click', async function(e) {
            if (e.target.classList.contains('btn-hapus')) {
                let result = confirm('Hapus data?');
                let idAlumni = e.target.dataset.id;
                if (result == true) {
                    let hapus = await mf.deleteData('/api/alumni/delete/' + idAlumni);
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
                let idAlumni = e.target.dataset.id;
                let dataAlumni = await mf.getData('/api/alumni/detail/' + idAlumni);
                id.value = dataAlumni.id;
                nama.value = dataAlumni.nama;
                alamat.value = dataAlumni.alamat;
                foto.value = "";
                if (dataAlumni.foto != null) {
                    foto2.src = '/storage/' + dataAlumni.foto;
                } else {
                    foto2.src = '/storage/alumni/default.jpg';
                }

                let date = new Date();
                let th = date.getFullYear(); 
                tahun.innerHTML = "";
                for (let i = th; i > 1999; i--) {
                    if (i == dataAlumni.tahun) {
                        tahun.innerHTML += `
                            <option selected>${i}</option>
                        `;    
                    } else {
                        tahun.innerHTML += `
                            <option>${i}</option>
                        `;
                    }
                    
                }
                let myForm = document.getElementById('myForm');
                myForm.setAttribute('action', '/api/alumni/' + dataAlumni.id);
            }
        });

    </script>

    @endsection


        