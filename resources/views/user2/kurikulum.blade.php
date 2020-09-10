@extends('layouts/userlayout2')
@section('content')
    <h3 class="mb-30 col-12">Prestasi Santri</h3>
    <div class="form-group col-3">
       <div class="input-group mb-3">
        	<select class="form-control" id="select-jenis">
          		<option value="resmi">Resmi</option>
          		<option value="umum">Umum</option>
        	</select>
       </div>
    </div>	
    <div class="col-5"></div>
    <div class="form-group col-4 float-right">
       <div class="input-group mb-3">
          <input type="text" id="cari" class="form-control" placeholder='Search Keyword'
             onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search Keyword'">
          <div class="input-group-append">
             <button class="btn" type="button"><i class="ti-search"></i></button>
          </div>
       </div>
    </div>	
    <div class="col-12"> 
		<table class="table table-striped table-bordered" id="tabel-body">
			
		</table>
    </div>
    <!--================Blog Area =================-->
	<script type="text/javascript">

		let data = "";
		let id = document.getElementById('id');
		let mapel = document.getElementById('mapel');


		let mf = new MyFetch();
		  
		function isi(data2) {
		    let tbody = document.getElementById('tabel-body');
		    tbody.innerHTML = `
		    	<thead>
			    	<tr class="table-head">
						<th class="serial text-center">No</th>
						<th class="country text-center">Kurikulum</th>
					</tr>
				</thead>
		    `;
		    tbody.innerHTML += `<tbody>`;
		    for (var i = 0; i < data2.length; i++) {
		        tbody.innerHTML += `
		        	<tr class="table-row">
						<td class="serial text-center">${i + 1}</td>
						<td>${data2[i].mapel}</td>\
					</tr>
		        `;
		    }
		    tbody.innerHTML += `</tbody>`;
		}


		async function loadData(){
			let pilJenis = document.getElementById('select-jenis')
	        data = await mf.getData('/api/kurikulum/' + pilJenis.value);
		    isi(data);
		}

		loadData();

		let pilihPeriode = document.getElementById('select-jenis');
		pilihPeriode.addEventListener('change', function() {
		    loadData();
		})

		let cari = document.getElementById('cari');
		cari.addEventListener('keyup', async function() {
		    let periode = document.getElementById('select-periode').value;
		    if (this.value == "") {
		        loadData();
		    }else{
		        data = await myFetch.getData('/santri/like/'+ periode + '/' + this.value);
		        isi(data)
		    }
		})

	</script>
@endsection