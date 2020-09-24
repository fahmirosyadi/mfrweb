@extends('layouts/userlayout1')

@section('container2')
<!-- <div
  id="mapBox"
  class="mapBox"
  data-lat="1.5883284"
  data-lon="99.2894046"
  data-zoom="15"
  data-info="Pondok Pesantren KH. Ahmad Dahlan Sipirok"
  data-mlat="1.5883284"
  data-mlon="99.2894046"
></div> -->
<div class="row">
  <div class="col-lg-3">
    <div class="contact_info">
      <div class="info_item mb-5">
        <i class="ti-home"></i>
        <h6>{{ $profil->alamat }}</h6>
      </div>
      @foreach($contact as $row)
      <div class="info_item">
        <i class="ti-email"></i>
        <h6><a href="#">{{ $row->contact }}</a></h6>
        <p>{{ $row->nama }}</p>
      </div>
      @endforeach
    </div>
  </div>
  <div class="col-lg-9">
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger">{{$error}}</div>
        @endforeach
    @endif

    @if ($message = Session::get('success'))
      <div class="alert alert-success alert-block">
          {{ $message }}
      </div>
    @endif
    <form
      class="row contact_form"
      action="{{url('/send_email')}}"
      method="post"
      id="contactForm"
      novalidate="novalidate"
    >
      @csrf
      <div class="col-md-6">
        <div class="form-group">
          <input
            type="text"
            class="form-control"
            id="name"
            name="name"
            placeholder="Masukkan nama"
            onfocus="this.placeholder = ''"
            onblur="this.placeholder = 'Masukkan nama'"
            required=""
          />
        </div>
        <div class="form-group">
          <input
            type="email"
            class="form-control"
            id="email"
            name="email"
            placeholder="Masukkan email"
            onfocus="this.placeholder = ''"
            onblur="this.placeholder = 'Masukkan email'"
            required=""
          />
        </div>
        <div class="form-group">
          <input
            type="text"
            class="form-control"
            id="subject"
            name="subject"
            placeholder="Masukkan subject"
            onfocus="this.placeholder = ''"
            onblur="this.placeholder = 'Masukkan subject'"
            required=""
          />
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <textarea
            class="form-control"
            name="message"
            id="message"
            rows="1"
            placeholder="Tulis pesan"
            onfocus="this.placeholder = ''"
            onblur="this.placeholder = 'Tulis pesan'"
            required=""
          ></textarea>
        </div>
      </div>
      <div class="col-md-12 text-right">
        <button type="submit" value="submit" class="btn primary-btn">
          Kirim Pesan
        </button>
      </div>
    </form>
  </div>
</div>
@endsection