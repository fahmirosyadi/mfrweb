@extends('layouts/userlayout1')

@section('container2')
<div class="row">
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

<script type="text/javascript">
	let header = document.getElementById('header');
    let attrLama = header.getAttribute('class');
    let attrBaru = attrLama + " white-header";
    header.setAttribute('class',attrBaru);
</script>
@endsection


