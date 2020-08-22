@extends('/admin/template')        
    @section('modal')
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <form id="myForm" method="post" action="{{url('/kurikulum')}}">
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
                    <label for="nama" class="col-sm-3 text-right control-label col-form-label">Mapel</label>
                    <div class="col-sm-9">
                        <input type="text" autocomplete="false" class="form-control" id="mapel" name="mapel">
                    </div>
                </div>
                <input type="hidden" id="jenis" name="jenis">
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

    <!-- Main wrapper - style you can find in pages.scss -->

    @section('container')
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
                                        Jenis:<br>
                                        <select id="select-jenis" class="form-control form-control-sm">
                                            <option>resmi</option>
                                            <option>umum</option>
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
        let mapel = document.getElementById('mapel');
        let jenis = document.getElementById('jenis');

        function isi(data2) {
            let thead = document.getElementById('tabel-head');
            thead.innerHTML = `
                <tr>
                    <th style="text-align: center;" scope="col">No</th>
                    <th style="text-align: center;" scope="col">Mapel</th>
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
                        <td style="text-align: center;">` + (i + 1) + `</td>
                        <td style="text-align: center;">` + data2[i].mapel + `</td>
                        <td style="text-align: center;">
                            <a data-toggle="modal" data-id="` + data2[i].id + `" data-target="#exampleModal" class="btn btn-sm btn-success text-white btn-ubah">Ubah</a>
                            <a data-id="` + data2[i].id + `" class="btn btn-sm btn-danger btn-hapus">Hapus</a>
                        </td>
                    </tr>
                `;
            }
        }

        async function loadData() {
            let pilJenis = document.getElementById('select-jenis');
            let data = await mf.getData('/api/kurikulum/' + pilJenis.value);
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
                myForm.setAttribute('action', '/api/kurikulum');
                id.value = "";
                mapel.value = "";
                jenis.value = document.getElementById('select-jenis').value;
            }
        });

        document.addEventListener('click', async function(e) {
            if (e.target.classList.contains('btn-hapus')) {
                let result = confirm('Hapus data?');
                let idKurikulum = e.target.dataset.id;
                if (result == true) {
                    let hapus = await mf.deleteData('/api/kurikulum/delete/' + idKurikulum);
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
                let idKurikulum = e.target.dataset.id;
                let dataKurikulum = await mf.getData('/api/kurikulum/detail/' + idKurikulum);
                id.value = dataKurikulum.id;
                mapel.value = dataKurikulum.mapel;
                jenis.value = dataKurikulum.jenis;
                let myForm = document.getElementById('myForm');
                myForm.setAttribute('action', '/api/kurikulum/' + dataKurikulum.id);
            }
        });

    </script>
    @endsection


        