@extends('layouts/userlayout1')

@section('container2')
<div class="section_gap">
  <div class="container">
    <div class="row">
      <div class="col-lg-4 col-md-4 col-sm-12 single-trainer">
        <div class="meta-text" style="background-color: rgba(0,0,0,0);">
			<center>
				<h3 class="mb-30 title_color">Biografi Alumni</h3>
			</center>
			<hr>
	        <div class="thumb d-flex justify-content-center mb-3">
	          <img class="img-fluid" style="width: 100%" src="{{url('/storage/'.$alumni->foto)}}" alt="" />
	        </div>
	        <table>
	        	<tr>
	        		<td valign="top" style="width: 100px"><h5>Nama</h5></td>
	        		<!-- <td><h5>:</h5></td> -->
	        		<td valign="top"><label>{{ $alumni->nama }}</label></td>
	        	</tr>
	        	<tr>
	        		<td valign="top"><h5>Tahun</h5></td>
	        		<!-- <td><h5>:</h5></td> -->
	        		<td valign="top"><label>{{ $alumni->tahun }}</label></td>
	        	</tr>
	        	<tr>
	        		<td valign="top"><h5>Pekerjaan</h5></td>
	        		<!-- <td><h5>:</h5></td> -->
	        		<td valign="top"><label>{{ $alumni->job }}</label></td>
	        	</tr>
	        	<tr>
	        		<td valign="top"><h5>Alamat</h5></td>
	        		<!-- <td><h5>:</h5></td> -->
	        		<td valign="top"><label>{{ $alumni->alamat }}</label></td>
	        	</tr>
	        </table>
        </div>
      </div>
      <div class="col-lg-8 col-md-8 col-sm-12 single-trainer">
        <div class="meta-text" style="background-color: rgba(0,0,0,0);">
			<h3 class="mb-30 title_color">Testimoni</h3>
			<hr>
        	<div class="mb-4">
            	<p><?= $alumni->testimoni ?></p>
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


