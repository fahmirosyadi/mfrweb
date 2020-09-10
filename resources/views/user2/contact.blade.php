@extends('layouts/userlayout1')

@section('container2')
<div
  id="mapBox"
  class="mapBox"
  data-lat="1.611050"
  data-lon="99.247860"
  data-zoom="13"
  data-info="Pondok Pesantren KH. Ahmad Dahlan Sipirok"
  data-mlat="1.611050"
  data-mlon="99.247860"
></div>
<div class="row">
  <div class="col-lg-3">
    <div class="contact_info">
      <div class="info_item">
        <i class="ti-home"></i>
        <h6>California, United States</h6>
        <p>Santa monica bullevard</p>
      </div>
      <div class="info_item">
        <i class="ti-headphone"></i>
        <h6><a href="#">00 (440) 9865 562</a></h6>
        <p>Mon to Fri 9am to 6 pm</p>
      </div>
      <div class="info_item">
        <i class="ti-email"></i>
        <h6><a href="#">support@colorlib.com</a></h6>
        <p>Send us your query anytime!</p>
      </div>
    </div>
  </div>
  <div class="col-lg-9">
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