@foreach($berita as $row)
<article class="row blog_item">
    <div class="col-md-3">
        <div class="blog_info text-right">
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
                    <a href="{{url('/berita/'.$row->id)}}" class="blog_btn">Lihat selengkapnya</a>
                </div>
            </div>
        </div>
    </div>
</article>
@endforeach