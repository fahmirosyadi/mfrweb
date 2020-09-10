@extends('layouts/userlayout1')
@section('container2')
<div class="row h_blog_item">
  <div class="col-lg-6">
    <div class="h_blog_img">
      <img class="img-fluid" style="" src="{{url('/storage/'.$profil->foto)}}" alt="" />
    </div>
  </div>
  <div class="col-lg-6">
    <div class="h_blog_text">
      <div class="h_blog_text_inner left right">
        <h4>Sejarah Pondok Pesantren</h4>
        <p>
          {{ $profil->sejarah }}
        </p>
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