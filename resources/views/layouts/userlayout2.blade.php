@extends('layouts/userlayout1')

@section('container2')
<div class="row">
  <div class="col-lg-8 posts-list">
      <div class="single-post row">
          @yield('content')
      </div>
  </div>
  <div class="col-lg-4">
      <div class="blog_right_sidebar">
          <aside class="single_sidebar_widget search_widget">
              <div class="input-group">
                  <input type="text" class="form-control" id="cari" placeholder="Cari">
                  <span class="input-group-btn">
                      <button class="btn btn-default" type="button"><i class="ti-search"></i></button>
                  </span>
              </div>
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
                      <p>02 Hours ago</p>
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
              @foreach($new as $row)
              <div class="media post_item">
                  <img style="height: 100px;" src="{{url('/storage/'.$row->foto)}}" alt="post">
                  <div class="media-body">
                      <a href="blog-details.html">
                          <h3>{{ $row->judul }}</h3>
                      </a>
                      <p>02 Hours ago</p>
                  </div>
              </div>
              @endforeach
              <div class="br"></div>
          </aside>
      </div>
  </div>
</div>
@yield('js')
@endsection

