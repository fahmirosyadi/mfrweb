@extends('layouts/userlayout1')

@section('container2')
<div class="row">
    <div class="col-lg-8">
        <div class="blog_left_sidebar">
            <div id="content">
                
            </div>
            <nav class="blog-pagination justify-content-center d-flex">
                <ul class="pagination">
                    <li class="page-item">
                        <button id="prevlink" class="page-link" aria-label="Previous">
                            <span aria-hidden="true">
                                <i class="ti-angle-left"></i>
                            </span>
                        </button>
                    </li>
                    <?php for ($i=0; $i < $count; $i++) { ?> 
                        <li class="page-item"><button id="{{ $i + 1 }}" class="page-link">{{$i + 1}}</button></li>
                    <?php } ?>
                    <li class="page-item">
                        <button id="nextlink" class="page-link" aria-label="Next">
                            <span aria-hidden="true">
                                <i class="ti-angle-right"></i>
                            </span>
                        </button>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="blog_right_sidebar">
            <aside class="single_sidebar_widget search_widget">
                <div class="input-group">
                    <input type="text" id="cari" class="form-control" placeholder="Search Posts">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button"><i class="ti-search"></i></button>
                    </span>
                </div><!-- /input-group -->
                <div class="br"></div>
            </aside>
            <aside class="single_sidebar_widget popular_post_widget">
                <h3 class="widget_title">Berita Populer</h3>
                @foreach($popular as $row)
                <div class="media post_item">
                    <img style="height: 100px;" src="{{url('/storage/'.$row->foto)}}" alt="post">
                    <div class="media-body">
                        <a href="blog-details.html">
                            <h3>{{ $row->judul }}</h3>
                        </a>
                        <p>{{ $row->created_at->isoFormat('DD-MM-YYYY') }}</p>
                    </div>
                </div>
                @endforeach
                <div class="br"></div>
            </aside>
            <aside class="single_sidebar_widget ads_widget">
                <a href="#"><img class="img-fluid" src="img/blog/add.jpg" alt=""></a>
                <div class="br"></div>
            </aside>
            <aside class="single_sidebar_widget popular_post_widget">
                <h3 class="widget_title">Berita Terbaru</h3>
                @foreach($berita as $row)
                <div class="media post_item">
                    <img style="height: 100px;" src="{{url('/storage/'.$row->foto)}}" alt="post">
                    <div class="media-body">
                        <a href="blog-details.html">
                            <h3>{{ $row->judul }}</h3>
                        </a>
                        <p>{{ $row->created_at->isoFormat('DD-MM-YYYY') }}</p>
                    </div>
                </div>
                @endforeach
                <div class="br"></div>
            </aside>
        </div>
    </div>
</div>
<script type="text/javascript">
  let cari = document.getElementById('cari');
  let content = document.getElementById('content');
  let mf = new MyFetch();

  function isi(data){
    content.innerHTML = data;
  }

  async function loadData(){
    let hasil = await mf.getHTML('/api/berita/limitHTML/1');
    isi(hasil);
  }

  loadData();

  cari.addEventListener('keyup',async function() {
    if (cari.value == '') {
      loadData();
    }else{
      let hasil = await mf.getHTML('/api/berita/searchHTML/' + cari.value);
      isi(hasil);
    }
  });

  document.addEventListener('click', async function(e){
    if (e.target.classList.contains('page-link')) {
        cari.value = '';
        let hasil = await mf.getHTML('/api/berita/limitHTML/' + e.target.id);
        isi(hasil);
        window.scroll({top:0,behavior:'smooth'});
    }
  });

</script>
@endsection