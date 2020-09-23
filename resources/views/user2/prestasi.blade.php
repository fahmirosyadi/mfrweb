@extends('layouts/userlayout2')
    <!--================ End Header Menu Area =================-->

@section('content')
<h3 class="mb-30 col-12">Prestasi Santri</h3>
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
	let nama = document.getElementById('nama');
	let alamat = document.getElementById('alamat');
	let cari = document.getElementById('cari');


	let mf = new MyFetch();
	  
	function isi(data2) {
	    let tbody = document.getElementById('tabel-body');
	    tbody.innerHTML = `
	    	<thead>
		    	<tr class="table-head">
					<th class="serial">No</th>
					<th class="country">Kegiatan</th>
					<th class="visit">Tahun</th>
					<th class="percentage">Prestasi</th>
					<th class="percentage">Action</th>
				</tr>
			</thead>
	    `;
	    tbody.innerHTML += `<tbody>`;
	    for (var i = 0; i < data2.length; i++) {
	        tbody.innerHTML += `
	        	<tr class="table-row">
					<td class="serial">${i + 1}</td>
					<td>${data2[i].kegiatan}</td>
					<td>${data2[i].tahun}</td>
					<td>${data2[i].prestasi}</td>
					<td>
						<a data-id="${data2[i].id}" href="/prestasi/gallery/${data2[i].id}" class="btn d-inline btn-sm btn-warning">Gallery</a>
					</td>	
				</tr>
	        `;
	    }
	    tbody.innerHTML += `</tbody>`;
	}


	async function loadData(){
        data = await mf.getData('/api/prestasi');
	    isi(data);
	}

	loadData();

	cari.addEventListener('keyup',async function(){
        if (cari.value == '') {
            loadData();
        }else{
            let hasil = await mf.getData('/api/prestasi/search/' + cari.value,'loading');
            isi(hasil);
        }
    });
</script>
@endsection
  
