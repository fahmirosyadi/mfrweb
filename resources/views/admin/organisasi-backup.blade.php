<!DOCTYPE html>
<html dir="ltr" lang="en">

<head th:replace="template::head"></head>

<body>

    <!-- Modal -->
    <div class="modal fade" th:id="@{'exampleModal'}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <form id="myForm" th:method="post" th:action="@{'/organisasi/simpan'}">
              <div class="modal-header">
                <h5 class="modal-title" th:id="@{'exampleModalLabel'}">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <input type="hidden" th:id="id" th:name="id">
                <div class="form-group row">
                    <label for="nama" class="col-sm-3 text-right control-label col-form-label">Nama</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" th:id="nama" th:name="nama">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="jabatan" class="col-sm-3 text-right control-label col-form-label">Jabatan</label>
                    <div class="col-sm-9">
                        <select class="form-control" th:id="jabatan" th:name="jabatan">
                            
                        </select>
                    </div>
                </div>
                <input type="hidden" th:name="foto" th:id="foto">
                <div class="form-group row">
                    <label for="file" class="col-sm-3 text-right control-label col-form-label">Foto</label>
                    <div class="col-sm-9">
                        <input type="file" class="form-control" th:id="file" th:name="file">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 text-right control-label col-form-label"></label>
                    <div class="col-sm-9">
                        <label>
                            <input type="checkbox" class="form-control" th:name="hapus">Hapus Foto
                        </label>
                    </div>
                </div>
                <input type="hidden" name="periode" id="periode">
                <input type="hidden" id="csrf1" th:name="${_csrf.parameterName}" th:value="${_csrf.token}">
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                <button type="button" th:id="btn-simpan" class="btn btn-primary">Simpan</button>
              </div>
          </form>
        </div>
      </div>
    </div>
    
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header th:replace="template::header"></header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside th:replace="template::sidebar"></aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
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
                                        Periode:<br>
                                        <select id="select-periode" class="form-control form-control-sm">
                                            
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



    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <div th:replace="template::foot"></div>

    <script type="text/javascript">
        
        let data = "";
        let id = document.getElementById('id');
        let nama = document.getElementById('nama');
        let file = document.getElementById('file');
        let hapus = document.getElementById('hapus');
        

        let myFetch = new MyFetch();  

        async function loadPeriode() {
            let periode = document.getElementById('select-periode');
            let lPeriode = await myFetch.getData('/periode/all');
            for (var i = 0; i < lPeriode.length; i++) {
                periode.innerHTML += `
                    <option value="` + lPeriode[i].id + `">` + lPeriode[i].periode + `</option>
                `;
                
            }
        }
      
        function isi(data) {
            let thead = document.getElementById('tabel-head');
            let tbody = document.getElementById('tabel-body');
            thead.innerHTML = `
                <tr>
                    <th style="text-align: center;" scope="col">No</th>
                    <th style="text-align: center;" scope="col">Nama</th>
                    <th style="text-align: center;" scope="col">Jabatan</th>
                    <th style="text-align: center;" scope="col">Foto</th>
                    <th id="tbh" style="text-align: center;" scope="col">
                        <a id="btn-tambah" class="btn btn-primary text-white mt-2 btn-tambah">Tambah</a>
                    </th>
                </tr>
            `;
            tbody.innerHTML = "";
            for (var i = 0; i < data.length; i++) {
                tbody.innerHTML += `
                    <tr role="row" class="odd">
                        <td style="text-align: center;">` + (i + 1) + `</td>
                        <td style="text-align: center;">` + data[i].nama + `</td>
                        <td style="text-align: center;">` + data[i].jabatan + `</td>
                        <td style="text-align: center;">
                            <img height="100" width="100" src="/uploads/` + data[i].foto + `">
                        </td>
                        <td style="text-align: center;">
                            <a data-toggle="modal" data-id="` + data[i].id + `" data-target="#exampleModal" class="btn btn-sm btn-success text-white btn-ubah">Ubah</a>
                            <a data-id="` + data[i].id + `" class="btn btn-sm btn-danger btn-hapus">Hapus</a>
                        </td>
                    </tr>
                `;
            }
        }

        loadPeriode();

        async function loadData(status = true){
            if (status == true) {
                let periode = document.getElementById('select-periode');
                data = await myFetch.getData('/organisasi/all/' + periode.value);
            }
            isi(data);
        }

        let pilihPeriode = document.getElementById('select-periode');
        pilihPeriode.addEventListener('change', function() {
            loadData();
        })

        let cari = document.getElementById('cari');
        cari.addEventListener('keyup', async function() {
            let periode = document.getElementById('select-periode').value;
            if (this.value == "") {
                loadData();
            }else{
                data = await myFetch.getData('/organisasi/like/'+ periode + '/' + this.value);
                isi(data)
            }
        })

        let btnSimpan = document.getElementById('btn-simpan');
        btnSimpan.addEventListener('click', async function() {
            let periode = document.getElementById('periode');
            periode.value = document.getElementById('select-periode').value;
            let mf = document.getElementById('myForm');
            let dataForm = new FormData(mf);
            let simpan = await myFetch.postData('/organisasi/simpan',dataForm);
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
                id.value = "";
                nama.value = "";
                file.value = "";
                let lJabatan = await myFetch.getData('/jabatan/all');
                let jabatan = document.getElementById('jabatan');
                jabatan.innerHTML = "";
                for (var i = 0; i < lJabatan.length; i++) {
                    jabatan.innerHTML += `
                        <option value="` + lJabatan[i].id + `">` + lJabatan[i].nama + `</option>
                    `;
                }
            }
        });

        
        document.addEventListener('click', async function(e) {
            if (e.target.classList.contains('btn-hapus')) {
                let result = confirm('Hapus data?');
                let id = e.target.dataset.id;
                if (result == true) {
                    let hapus = await myFetch.deleteData('/organisasi/hapus/' + id);
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
                let idOrg = e.target.dataset.id;
                let anggota = await myFetch.getData('/organisasi/detail/' + idOrg);
                
                id.value = anggota.id;
                nama.value = anggota.nama;
                file.value = "";
                foto.value = anggota.foto
                $('#hapus').prop('checked',false);  

                let jabatan = document.getElementById('jabatan');
                let lJabatan = await myFetch.getData('/jabatan/all');
                jabatan.innerHTML = "";
                for (let i = 0; i < lJabatan.length; i++) {
                    if (lJabatan[i].nama == anggota.jabatan) {
                        jabatan.innerHTML += `
                            <option selected value="` + lJabatan[i].id + `">` + lJabatan[i].nama + `</option>
                        `;    
                    }else{
                        jabatan.innerHTML += `
                            <option value="` + lJabatan[i].id + `">` + lJabatan[i].nama + `</option>
                        `;
                    }
                }
            }
        });


    </script>

</body>
</html>


        