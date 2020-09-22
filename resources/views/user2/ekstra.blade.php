




@extends('layouts/userlayout2')

@section('content')
<div class="row" id="content">

</div>
@endsection

@section('js')
<script type="text/javascript">
  let cari = document.getElementById('cari');
  let content = document.getElementById('content');
  let mf = new MyFetch();

  function isi(data){
    content.innerHTML = "";
    for(let i = 0; i < data.length; i++){
      content.innerHTML += `
        <div class="col-md-6 mb-4">
          <div class="card" style="width: 100%;">
            <img style="height: 200px" src="{{url('/storage/${data[i].foto}')}}" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">${data[i].kegiatan}</h5>
              <a href="/ekstra/${data[i].id}" class="btn btn-warning">Lihat Detail</a>
            </div>
          </div>
        </div>
      `;
    }
  }

  async function loadData(){
    let hasil = await mf.getData('/api/kegiatan/ekstra');
    isi(hasil);
  }

  loadData();

  cari.addEventListener('keyup',async function() {
    if (cari.value == '') {
      loadData();
    }else{
      let hasil = await mf.getData('/api/kegiatan/search/ekstra/' + cari.value,'loading');
      isi(hasil);
    }
  });

</script>
@endsection      
      