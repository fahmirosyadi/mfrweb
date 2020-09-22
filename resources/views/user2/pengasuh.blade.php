@extends('layouts/userlayout1')

@section('container2')
<!-- <div class="row">
	<div class="col-lg-12 course_details_left">
	    <div class="main_image">
	        <img class="img-fluid" src="img/courses/course-details.jpg" alt="">
	    </div>
	    <div class="content_wrapper">
	        <div class="event_details_area pb-3 pt-3 mb-30">
	            <div class="section-top-border" id="containerSambutan">
					<h3 class="mb-30 title_color">Sambutan Pengasuh {{ $profil->nama }} {{ $pengasuh->nama }}</h3>
					<h3></h3>
					<img id="gambarPengasuh" src="{{url('/storage/'.$pengasuh->foto)}}" alt="" class="float-left mb-3 mr-3 img-fluid">
					<?= $pengasuh->sambutan ?>
				</div>
	        </div>
	    </div>
	</div>
</div>
 -->
<div class="section_gap">
  <div class="container" id="containerSambutan">
    <div class="row">
      <div class="col-lg-12 col-md-6 col-sm-12 single-trainer">
        <div class="meta-text text-sm-center" style="background-color: rgba(0,0,0,0);">
	<center>
		<h3 class="mb-30 title_color">Sambutan Pengasuh {{ $profil->nama }}</h3>
	</center>
	        <div class="thumb d-flex justify-content-center mb-3">
	          <img class="img-fluid" style="height: 200px" src="{{url('/storage/'.$pengasuh->foto)}}" alt="" />
	        </div>
	        <center>
	          <h4 class="">{{ $pengasuh->nama }}</h4>
	          <p class="designation">Pengasuh Pondok Pesantren</p>
	        	
	        </center>
          <div class="mb-4">
            <p><?= $pengasuh->sambutan ?></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
	let header = document.getElementById('header');
    let attrLama = header.getAttribute('class');
    let attrBaru = attrLama + " white-header";
    header.setAttribute('class',attrBaru);
</script>
@endsection


