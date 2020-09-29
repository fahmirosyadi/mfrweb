@extends('/layouts/adminlayout')

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
            <div class="card-body">
            	<div class="row">
                    <div class="col-sm-12 col-md-6">
                        <label>
                            Periode:<br>
                            <select id="select-periode" class="form-control form-control-sm">
                                <option value="">Pilih Periode</option>
                            </select>
                        </label>
                    </div>
                </div>
                <form enctype="multipart/form-data" method="post" id="editForm" style="display:none; text-align:center; position:absolute; border: 1px solid #aeaeae;width:300px;background-color:#F57C00;z-index:10000; ">
                    @csrf
                    <div style="padding: 10px 0 10px 0; background-color:#039BE5; color: #ffffff;">Edit Form</div>
                    <div>
                        <input type="hidden" name="id" id="id">
                        <div class="row" style="padding: 10px 0 5px 0;">
                            <label class="col-3" style="color:#ffffff; width:50px; display:inline-block;" for="name">Name</label>
                            <input class="col-7" style="background-color:#FFCA28" name="name" id="name" value="" />
                        </div>
                        <div class="row" style="padding: 5px 0 10px 0;">
                            <label class="col-3" style="color:#ffffff; width:50px; display:inline-block;" for="title">Title</label>
                            <input class="col-7" style="background-color:#FFCA28" name="title"  id="title" value="" />
                        </div>
                        <div class="row" style="padding: 5px 0 10px 0;">
                            <label class="col-3" style="color:#ffffff; width:50px; display:inline-block;" for="title">Level</label>
                            <select class="col-7" name="tags" id="tags">
                                
                            </select>
                        </div>
                        <div class="row" style="padding: 5px 0 10px 0;">
                            <label class="col-3" style="color:#ffffff; width:50px; display:inline-block;" for="title">Parent</label>
                            <select class="col-7" name="pid" id="pid">
                                
                            </select>
                        </div>
                        <div class="row" style="padding: 5px 0 10px 0;">
                            <label class="col-3" style="color:#ffffff; width:50px; display:inline-block;" for="title">Foto</label>
                            <input class="col" type="file" name="photo1" id="photo1"/>
                        </div>
                        <input type="checkbox" class="form-control" name="hapus">Hapus Foto
                        <input type="text" name="periode" id="periode">
                        <div style="padding: 5px 0 15px 0;">
                            <button type="button" style="width:108px;" id="cancel">Cancel</button>
                            <button type="button" style="width:108px;" id="save">Save</button>
                        </div>
                    </div>
                </form>
				<div style="background-color: #232637; width:100%; height:700px;" id="tree"/>                        	
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
    

    var editForm = function () {
        this.nodeId = null;
    };

    editForm.prototype.init = function (obj) {
        var that = this;
        this.obj = obj;
        this.editForm = document.getElementById("editForm");
        this.nameInput = document.getElementById("name");
        this.titleInput = document.getElementById("title");
        this.cancelButton = document.getElementById("cancel");
        this.saveButton = document.getElementById("save");

        this.cancelButton.addEventListener("click", function () {
            that.hide();
        });

        this.saveButton.addEventListener("click", async function () {
            let form = document.getElementById('editForm');
            let data = new FormData(form);
            if (data.get('name') == "" || data.get('title') == "") {
                alert('Nama dan Jabatan tidak boleh kosong');
            }
            let simpan = await mf.postData(form.action,data);
            try {
                if (simpan) {
            	    let ambil = await mf.getData('/api/organisasi/detail/' + that.nodeId);
                    let hasil = ambil;
            		var node = chart.get(that.nodeId);
                	node.name = hasil.name;
                	node.title = hasil.title;
                    if (hasil.pid == null) {
                        node.pid = "";
                        node.tags = "";
                    } else {
                       node.pid = hasil.pid;
                       node.tags = [hasil.tags];
                    }
                    if (hasil.photo1 == null) {
                        node.photo1 = '/organisasi/default.jpg';
                    } else {
                        node.photo1 = hasil.photo1;
                    }
                	chart.updateNode(node);
                	// try {
                 //        if (ambil == null) {
                 //            console.log('Ambil null!!!');
                 //        }else {
                 //        }
                	// } catch(e) {
                	// 	console.log('Gagal Load dari /api/organisasi/detail/' + that.nodeId + ' : ' + e)
                	// }
                }
            } catch (e){
            	console.log("Gagal Menyimpan");
            }
            that.hide();
        });
    };


    editForm.prototype.show = async function cobaShow(nodeId) {
        this.nodeId = nodeId;
        var left = document.body.offsetWidth / 2 - 150;
        this.editForm.style.display = "block";
        this.editForm.style.left = left + "px";
        var node = chart.get(nodeId);
        if (node.name == undefined) {
            node.name = "";
            node.title = "";
        }
        if (node.name == "") {
            document.getElementById('editForm').setAttribute('action','/api/organisasi');
        } else {
            document.getElementById('editForm').setAttribute('action','/api/organisasi/' + nodeId);
        }
        document.getElementById('id').value = node.id;
        this.nameInput.value = node.name;
        this.titleInput.value = node.title;
        let pp = document.getElementById('select-periode');
        document.getElementById('periode').value = pp.value;
        document.getElementById('photo1').value = "";
        if (node.pid == null) {
            document.getElementById('pid').innerHTML = "";
            document.getElementById('tags').innerHTML = "";
        } else {
            let parent = document.getElementById('pid');
            parent.innerHTML = "";
            let dataParent = await mf.getData('/api/organisasi/' + pp.value);
            for (var i = 0; i < dataParent.length; i++) {
            	if (dataParent[i].id == node.pid) {
            		parent.innerHTML += `<option selected value='${dataParent[i].id}'>${dataParent[i].name}</option>`;
            	} else {
            		parent.innerHTML += `<option value='${dataParent[i].id}'>${dataParent[i].name}</option>`;
            	}
            	
            }
            let pilTags = document.getElementById('tags');
            pilTags.innerHTML = "";
            let tags = ['subLevels0','subLevels1','subLevels2','subLevels3','assistant'];
            for (var i = 0; i < tags.length; i++) {
            	if (tags[i] == node.tags) {
            		pilTags.innerHTML += `<option selected value="${tags[i]}">${tags[i]}</option>`;	
            	} else {
            		pilTags.innerHTML += `<option value="${tags[i]}">${tags[i]}</option>`;
            	}
            }
        }
    };

    editForm.prototype.hide = function (showldUpdateTheNode) {
        this.editForm.style.display = "none";
    };

   

    OrgChart.templates.ana.img_0 = '<image preserveAspectRatio="xMidYMid slice" xlink:href="/storage/{val}" x="20" y="-15" width="80" height="80"></image>';

    let chart;
    async function loadChart(awal) {       	
        chart = new OrgChart(document.getElementById("tree"), {
        	mouseScrool: OrgChart.action.none,
            lazyLoading: true,
        	nodeMenu:{
            	edit: {text:"Edit"},
            	add: {text:"Add"},
            	remove: {text:"Remove"}
            },
            editUI: new editForm(),
            nodeBinding: {
                field_0: "name",
                field_1: "title",
                img_0: "photo1"
            },
	        tags: {
	            "subLevels0": {
	                subLevels: 0
	            },
	        	"subLevels1": {
	                subLevels: 1
	            },
	            "subLevels2": {
	                subLevels: 2
	            },
	            "subLevels3": {
	                subLevels: 3
	            }
	        }
        });
        chart.on('remove', function (sender, nodeId) {
            let yakin = confirm("Yakin ingin hapus?");
            if (yakin) {
                mf.deleteData('/api/organisasi/delete/' + nodeId);
            }
        });
    	let pilihPeriode = document.getElementById('select-periode');
    	let dataLoad = "";
        if (awal == true) {
            dataLoad = await mf.getData('/api/organisasi/' +  new Date().getFullYear());    
        }else{
            dataLoad = await mf.getData('/api/organisasi/' + pilihPeriode.value);
        }

    	for (let i = 0; i < dataLoad.length; i++) {
    		dataLoad[i].tags = [dataLoad[i].tags];
            let photo1 = "organisasi/default.jpg";
            if (dataLoad[i].photo1 != null) {
                photo1 = dataLoad[i].photo1;
            }
            let hasil = {
                id: dataLoad[i].id,
                name: dataLoad[i].name,
                title: dataLoad[i].title,
                pid: dataLoad[i].pid,
                photo1: photo1,
                tags: dataLoad[i].tags
            }
    		chart.add(hasil);
    	}

    	chart.draw(OrgChart.action.init);
    }

    let md = new MyCode();
    md.loadPeriode('select-periode');

    let pilihPeriode = document.getElementById('select-periode');
    pilihPeriode.addEventListener('change', function() {
        loadChart();
    })

    loadChart(true);
    
</script>
@endsection
        