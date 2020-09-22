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
<div class="col-12"> 
	<table class="table table-striped table-bordered" id="tabel-body">
		
	</table>
</div>
<!--================Blog Area =================-->
@endsection

@section('js')
<script type="text/javascript">

	let data = "";
	let id = document.getElementById('id');
	let mapel = document.getElementById('mapel');
	let cari = document.getElementById('cari');

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

	let pilihJenis = document.getElementById('select-jenis');
	pilihJenis.addEventListener('change', function() {
	    loadData();
	});

	cari.addEventListener('keyup',async function() {
	    if (cari.value == '') {
	      loadData();
	    }else{
			let pilihJenis = document.getElementById('select-jenis').value;
	        let hasil = await mf.getData('/api/kurikulum/search/' + pilihJenis + '/' + cari.value,'loading');
	      	isi(hasil);
	    }
	 });

</script>
@endsection