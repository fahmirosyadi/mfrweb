@extends('/user/template')

    @section('container')
    <!-- bradcam_area_start  -->
    <div class="bradcam_area" style="background-image: url({{url('/storage/'.$data->second_bg)}})">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text">
                        <h3>event details</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- bradcam_area_end  -->
    <div class="event_details_area pl-2 pr-2">
        <!-- <div class="container"> -->
			<div class="section-top-border">
				<h3 class="mb-30">Table</h3>
	        	<aside class="single_sidebar_widget search_widget">
	        		<div class="row">
		                <div class="form-group col-3">
		                   <div class="input-group mb-3">
		                    	<select class="form-control" id="select-periode">
		                      		
		                    	</select>
		                   </div>
		                </div>	
		                <div class="col-5"></div>
		                <div class="form-group col-4">
		                   <div class="input-group mb-3">
		                      <input type="text" id="cari" class="form-control" placeholder='Search Keyword'
		                         onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search Keyword'">
		                      <div class="input-group-append">
		                         <button class="btn" type="button"><i class="ti-search"></i></button>
		                      </div>
		                   </div>
		                </div>	
	        		</div>
		        </aside>
				<div class="progress-table-wrap">
					<table class="table table-strip" id="tabel-body">
						
					</table>
				</div>
			</div>
        <!-- </div> -->
    </div>

    <script type="text/javascript">

        let data = "";
        let id = document.getElementById('id');
        let nama = document.getElementById('nama');
        let alamat = document.getElementById('alamat');


        let myFetch = new MyFetch();

        async function loadPeriode() {
            let periode = document.getElementById('select-periode');
            let lPeriode = await myFetch.getData('/periode/all');
            periode.innerHTML = `<option value="">Periode</option>`;
            for (var i = 0; i < lPeriode.length; i++) {
                periode.innerHTML += `
                    <option value="` + lPeriode[i].id + `">` + lPeriode[i].periode + `</option>
                `;
                
            }
        }
          
        function isi(data2) {
            let tbody = document.getElementById('tabel-body');
            tbody.innerHTML = `
            	<tr class="table-head">
					<td class="serial">No</td>
					<td class="country">Nama</td>
					<td class="visit">Alamat</td>
					<td class="percentage">Detail</td>
				</tr>
            `;
            for (var i = 0; i < data2.length; i++) {
                tbody.innerHTML += `
                	<tr class="table-row">
						<td class="serial">${i + 1}</td>
						<td>${data2[i].nama}</td>
						<td>${data2[i].alamat}</td>
						<td class="percentage">
							<a class="btn btn-warning">Detail</a>
						</td>
					</tr>
                `;
            }
        }

        loadPeriode();

        async function loadData(status = true){
            if (status == true) {
                let periode = document.getElementById('select-periode');
                data = await myFetch.getData('/santri/all/' + periode.value);
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
                data = await myFetch.getData('/santri/like/'+ periode + '/' + this.value);
                isi(data)
            }
        })

    </script>
    @endsection
