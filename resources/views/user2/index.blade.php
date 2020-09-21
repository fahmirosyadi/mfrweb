@extends('layouts/userlayout')

    @section('container')
    <section class="home_banner_area" style="background-image: url({{url('/storage/'.$tema->bg1)}})">
      <div style="background-color: rgba(0,0,0,0.5); position: absolute;right: 0;left: 0;top: 0; bottom: 0;"></div>
      <div class="banner_inner" style="height: 100px;">
        <div class="container" style="height: 100px;">
          <div class="row" style="height: 100px;">
            <div class="col-lg-12" style="height: 100px;">
              <div id="container-judul" class="banner_content text-center">
                <p style="font-size: 1em" class="text-uppercase text-white">
                  Selamat Datang di
                </p>
                <h2 class="text-uppercase text-white" style="font-size: 3em;">
                  {{$tema->judul}}
                </h2>
                @if($tema->judul2 != null)
                <h2 class="text-uppercase text-white" style="font-size: 3em;">
                  {{$tema->judul2}}
                </h2>
                @endif
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="judul">
        
      </div>
    </section>
    <!--================ End Home Banner Area =================-->

    <!--================ Start Feature Area =================-->
    
    <!--================ End Feature Area =================-->

    <!--================ Start Popular Courses Area =================-->
    <div class="popular_courses" style="margin-top: 200px">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-5">
            <div class="main_title">
              <h2 class="mb-3">Program Kami</h2>
                <div class="text-center pl-2 pr-2 nav nav-fill" style="background-color: #002347" id="nav-tab" role="tablist">
                    <a class="d-inline text-white nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Program</a>
                    <a class="d-inline text-white nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Ekstrakurikuler</a>
                </div>
            </div>
          </div>
        </div>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                <div class="row">
                  <!-- single course -->
                  <div class="col-lg-12">
                    <div class="owl-carousel active_course">
                      @foreach($wajib as $row)
                      <div class="single_course">
                        <div class="course_head">
                          <img class="img-fluid" src="{{url('/storage/'.$row->foto)}}" alt="" />
                        </div>
                        <div class="course_content">
                          <h4 class="mb-3">
                            <a href="course-details.html">{{$row->kegiatan}}</a>
                          </h4>
                          <p>
                            {{$row->keterangan}}
                          </p>
                        </div>
                      </div>
                      @endforeach
                    </div>
                  </div>
                </div>
            </div>
            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
              <div class="row">
                <!-- single course -->
                <div class="col-lg-12">
                  <div class="owl-carousel active_course">
                    @foreach($ekstra as $row)
                    <div class="single_course">
                      <div class="course_head">
                        <img class="img-fluid" src="{{url('/storage/'.$row->foto)}}" alt="" />
                      </div>
                      <div class="course_content">
                        <h4 class="mb-3">
                          <a href="course-details.html">{{$row->kegiatan}}</a>
                        </h4>
                        <p>
                          {{$row->keterangan}}
                        </p>
                      </div>
                    </div>
                    @endforeach
                  </div>
                </div>
              </div>
            </div>
        </div>
        
      </div>
    </div>
    <!--================ End Popular Courses Area =================-->

    <!--================ Start Registration Area =================-->
    <div class="section_gap registration_area">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-md-6 col-sm-12 single-trainer">
            <div class="thumb d-flex justify-content-sm-center mb-3">
              <img class="img-fluid" style="height: 200px" src="{{url('/storage/'.$pengasuh->foto)}}" alt="" />
            </div>
            <div class="meta-text text-sm-center" style="background-color: rgba(0,0,0,0);">
              <h4 class="text-white">{{ $pengasuh->nama }}</h4>
              <p class="designation">Pengasuh Pondok Pesantren</p>
              <div class="mb-4">
                <p><?= $pengasuh->sambutan ?></p>
              </div>
            </div>
            <center>
              <a href="{{url('/pengasuh')}}" class="primary-btn rounded-0 mt-3">Lihat Detail</a>
            </center>
          </div>
        </div>
      </div>
    </div>
    <!--================ End Registration Area =================-->

    <!--================ Start Trainers Area =================-->
    <section class="trainer_area section_gap_top">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-5">
            <div class="main_title">
              <h2 class="mb-3">Sarana Prasarana</h2>
              <!-- <p>
                Replenish man have thing gathering lights yielding shall you
              </p> -->
            </div>
          </div>
        </div>
        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
            <div class="row">
              <!-- single course -->
              <div class="col-lg-12">
                <div class="owl-carousel active_course">
                  @foreach($sarana as $row)
                  <div class="single_course">
                    <div class="course_head">
                      <img class="img-fluid" src="{{url('/storage/'.$row->foto)}}" alt="" />
                    </div>
                    <div class="course_content">
                      <h4 class="mb-3">
                        <a href="course-details.html">{{$row->sarana}}</a>
                      </h4>
                      <p>
                        {{$row->keterangan}}
                      </p>
                    </div>
                  </div>
                  @endforeach
                </div>
              </div>
            </div>
        </div>
      </div>
    </section>
    <!--================ End Trainers Area =================-->

    <!--================ Start Events Area =================-->
    <div class="events_area">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-5">
            <div class="main_title">
              <h2 class="mb-3 text-white">Berita Terbaru</h2>
              <!-- <p>
                Replenish man have thing gathering lights yielding shall you
              </p> -->
            </div>
          </div>
        </div>
        <div class="row">
          @foreach($berita as $row)
          <div class="col-lg-6 col-md-6">
            <div class="single_event position-relative">
              <div class="event_thumb">
                <img style="width: 100%;" src="{{url('/storage/'.$row->foto)}}" alt="" />
              </div>
              <div class="event_details">
                <div class="d-flex mb-4">
                  <div class="date"><span>{{ $row->created_at->day }}</span> {{ $row->created_at->isoFormat('MMM') }}</div>

                  <div class="time-location">
                    <p>
                      <span class="ti-time mr-2"></span> {{ $row->created_at->hour }}:{{ $row->created_at->minute }} 
                    </p>
                    <h4 class="text-white">
                      {{ $row->judul }}
                    </h4>
                  </div>
                </div>
                <p>
                  <?= substr($row->berita, 0, 100)."..." ?>
                </p>
                <a href="{{url('/berita/'.$row->id)}}" class="primary-btn rounded-0 mt-3">Selengkapnya</a>
              </div>
            </div>
          </div>
          @endforeach

          <div class="col-lg-12">
            <div class="text-center pt-lg-5 pt-3">
              <a href="{{url('/berita')}}" class="event-link">
                Lihat semua berita<img src="{{('/user2/img/next.png')}}" alt="" />
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--================ End Events Area =================-->

    <!--================ Start Testimonial Area =================-->
    <div class="testimonial_area section_gap">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-5">
            <div class="main_title">
              <h2 class="mb-3">Testimoni Alumni</h2>
              <!-- <p>
                Replenish man have thing gathering lights yielding shall you
              </p> -->
            </div>
          </div>
        </div>

        <div class="row">
          <div class="testi_slider owl-carousel">
            @foreach($alumni as $row)
            <div class="testi_item">
              <div class="row">
                <div class="col-lg-4 col-md-6">
                  <img src="{{url('/storage/'.$row->foto)}}" alt="" />
                </div>
                <div class="col-lg-8">
                  <div class="testi_text">
                    <h4>{{$row->nama}}</h4>
                    <p>
                      {{ $row->testimoni }}
                    </p>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
    @endsection
    <!--================ End Testimonial Area =================-->

    <!--================ Start footer Area  =================-->
