@extends('layouts/userlayout2')

@section('content')
<input type="hidden" id="prestasi-id" value="{{$prestasiId}}" name="">

@endsection

@section('js')
<script type="text/javascript">
  let cari = document.getElementById('cari');
  let content = document.getElementById('single-post');
  let prestasiId = document.getElementById('prestasi-id').value;
  let mf = new MyFetch();

  function isi(data){
    content.innerHTML = "";
    for(let i = 0; i < data.length; i++){
      let ket = "";
      if (data[i].keterangan != null) {
        ket = data[i].keterangan;
      }
      let foto = '/storage/gallery-prestasi/default.jpg';
      if (data[i].foto != null) {
          foto = '/storage/' + data[i].foto;
      }
      content.innerHTML += `
        <div class="col-md-4 mb-4" style="width:100%;">
          <div class="card">
            <img style="" src="${foto}" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">${ket}</h5>
            </div>
          </div>
        </div>
      `;
    }
  }

  async function loadData(){
    let data = await mf.getData('/api/gallery/' + prestasiId);
    isi(data);
  }

  loadData();

  cari.addEventListener('keyup',async function() {
    if (cari.value == '') {
      loadData();
    }else{
      let hasil = await mf.getData(`/api/gallery/search/${prestasiId}/${cari.value}`,"loading");
      isi(hasil);
    }
  });
</script>
@endsection      