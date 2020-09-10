@extends('layouts/userlayout')

@section('container')
<section class="banner_area" style="background-size: 100%;background-image: url({{url('/storage/'.$tema->bg2)}});">
  <div class="banner_inner d-flex align-items-center">
    <div class="overlay"></div>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-6">
          <div class="banner_content text-center">
            <h2>{{ $title }}</h2>
            <div class="page_link">
              <a href="{{url('/')}}">Home</a>
              <a href="#">{{ $title }}</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="blog_area single-post-area section_gap">
    <div class="container">
        @yield('container2')
    </div>
</section>
@endsection
      