@extends('layouts/userlayout1')

@section('container2')
<div class="row">
    <div class="col-lg-8">
        <div class="blog_left_sidebar">
            @foreach($berita as $row)
            <article class="row blog_item">
                <div class="col-md-3">
                    <div class="blog_info text-right">
                        <div class="post_tag">
                            <a href="#">Food,</a>
                            <a class="active" href="#">Technology,</a>
                            <a href="#">Politics,</a>
                            <a href="#">Lifestyle</a>
                        </div>
                        <ul class="blog_meta list">
                            <li><a href="#">{{ $row->created_at->isoFormat('DD-MM-YYYY') }}<i class="ti-calendar"></i></a></li>
                            <li><a href="#">{{ $row->views }} Views<i class="ti-eye"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="blog_post">
                        <img src="{{url('/storage/'.$row->foto)}}" alt="">
                        <div class="blog_details">
                            <a href="single-blog.html">
                                <h2>{{ $row->judul }}</h2>
                            </a>
                            <?= substr($row->berita, 0, 250)."..." ?>
                            <div>
                                <a href="{{url('/berita/'.$row->id)}}" class="blog_btn">View More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </article>
            @endforeach
            <nav class="blog-pagination justify-content-center d-flex">
                <ul class="pagination">
                    <li class="page-item">
                        <a href="#" class="page-link" aria-label="Previous">
                            <span aria-hidden="true">
                                <i class="ti-angle-left"></i>
                            </span>
                        </a>
                    </li>
                    <li class="page-item"><a href="#" class="page-link">01</a></li>
                    <li class="page-item active"><a href="#" class="page-link">02</a></li>
                    <li class="page-item"><a href="#" class="page-link">03</a></li>
                    <li class="page-item"><a href="#" class="page-link">04</a></li>
                    <li class="page-item"><a href="#" class="page-link">09</a></li>
                    <li class="page-item">
                        <a href="#" class="page-link" aria-label="Next">
                            <span aria-hidden="true">
                                <i class="ti-angle-right"></i>
                            </span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="blog_right_sidebar">
            <aside class="single_sidebar_widget search_widget">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search Posts">
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
@endsection