@extends('layouts/userlayout2')

@section('content')
<div class="col-lg-12">
    <div class="feature-img">
        <img class="img-fluid" src="{{url('/storage/'.$detailProgram->foto)}}" alt="">
    </div>
</div>
<div class="col-lg-3  col-md-3">
    <div class="blog_info text-right">
        <ul class="blog_meta list">
            <li><a href="#">{{ $detailProgram->created_at->isoFormat('DD-MM-YYYY') }}<i class="ti-calendar"></i></a></li>
        </ul>
        <!-- <ul class="social-links">
            <li><a href="#"><i class="ti-facebook"></i></a></li>
            <li><a href="#"><i class="ti-twitter"></i></a></li>
            <li><a href="#"><i class="ti-github"></i></a></li>
            <li><a href="#"><i class="ti-linkedin"></i></a></li>
        </ul> -->
    </div>
</div>
<div class="col-lg-9 col-md-9 blog_details">
    <h2>{{ $detailProgram->kegiatan }}</h2>
    <?= $detailProgram->keterangan ?>
</div>
@endsection
      