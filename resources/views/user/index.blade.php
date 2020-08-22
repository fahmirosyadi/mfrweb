@extends('/user/template')

    @section('container')
    <!-- slider_area_start -->
    <div class="slider_area">
        <div class="slider_active owl-carousel" id="background1">
            <div class="single_slider  d-flex align-items-center" style="height: 500px;background-image: url({{url('/storage/'.$tema->bg1)}})">
                <div class="container text-center">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="slider_text align-items-center">
                                <h4 style="color:white;">Selamat Datang di Website</h4>
                                <h3 style="color:white;">{{$tema->judul}}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single_slider  d-flex align-items-center" style="height: 500px;background-image: url({{url('/storage/'.$tema->bg2)}})">
                <div class="container text-center">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="slider_text align-items-center">
                                <h4 style="color:white;">Selamat Datang di Website</h4>
                                <h3 style="color:white;">{{$tema->judul}}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- coba -->
    <!-- slider_area_end -->

    <!-- service_area_start  -->
    
    <!--/ service_area_start  -->

    <!-- popular_program_area_start  -->
    <div class="popular_program_area section__padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section_title text-center">
                        <h3>Kegiatan</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <nav class="custom_tabs text-center">
                        <div class="nav" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Kegiatan Rutin</a>
                            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Ekstrakurikuler</a>
                        </div>
                    </nav>
                </div>
            </div>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <div class="row">
                        @foreach($wajib as $row)
                        <div class="col-lg-4 col-md-6">
                            <div class="single__program">
                                <div class="program_thumb">
                                    <img src="{{url('/storage/'.$row->foto)}}" alt="">
                                </div>
                                <div class="program__content">
                                    <!-- <span>Agriculture</span> -->
                                    <h4>{{$row->kegiatan}}</h4>
                                    <p>{{$row->keterangan}}</p>
                                    <!-- <a href="#" class="boxed-btn5">Apply NOw</a> -->
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                    <div class="row">
                        @foreach($ekstra as $row)
                        <div class="col-lg-4 col-md-6">
                            <div class="single__program">
                                <div class="program_thumb">
                                    <img src="{{url('/storage/'.$row->foto)}}" alt="">
                                </div>
                                <div class="program__content">
                                    <!-- <span>Agriculture</span> -->
                                    <h4>{{$row->kegiatan}}</h4>
                                    <p>{{$row->keterangan}}</p>
                                    <!-- <a href="#" class="boxed-btn5">Apply NOw</a> -->
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                                <div class="row">
                            <div class="col-lg-4 col-md-6">
                                <div class="single__program">
                                    <div class="program_thumb">
                                        <img src="@{'/assets/user/img/program/3.png'}" alt="">
                                    </div>
                                    <div class="program__content">
                                        <span>Agriculture</span>
                                        <h4>Chemical engneering</h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut</p>
                                        <a href="#" class="boxed-btn5">Apply NOw</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="single__program">
                                    <div class="program_thumb">
                                        <img src="@{'/assets/user/img/program/2.png'}" alt="">
                                    </div>
                                    <div class="program__content">
                                        <span>Agriculture</span>
                                        <h4>Mechanical engneering</h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut</p>
                                        <a href="#" class="boxed-btn5">Apply NOw</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="single__program">
                                    <div class="program_thumb">
                                        <img src="@{'/assets/user/img/program/1.png'}" alt="">
                                    </div>
                                    <div class="program__content">
                                        <span>Agriculture</span>
                                        <h4>Bio engneering</h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut</p>
                                        <a href="#" class="boxed-btn5">Apply NOw</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>

            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="course_all_btn text-center">
                        <a href="Courses.html" class="boxed-btn4">View All course</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- popular_program_area_end -->

    <!-- latest_coures_area_start  -->
    
    <!--/ latest_coures_area_end -->

    <!-- recent_event_area_strat  -->
    
    <!-- recent_event_area_end  -->

    <!-- latest_coures_area_start  -->
    <div data-scroll-index='1' class="admission_area">
        <div class="admission_inner">
            <div class="container">
                <div class="row justify-content-end">
                    <div class="col-lg-7">
                        <div class="admission_form">
                            <h3>Pendaftaran</h3>
                            <form action="#">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="single_input">
                                            <input type="text" placeholder="First Name" >
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="single_input">
                                            <input type="text" placeholder="Last Name" >
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="single_input">
                                            <input type="text" placeholder="Phone Number" >
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="single_input">
                                            <input type="text" placeholder="Email Address" >
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="single_input">
                                            <textarea cols="30" placeholder="Write an Application" rows="10"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="apply_btn">
                                            <button class="boxed-btn3" type="submit">Apply Now</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ latest_coures_area_end -->


    <!-- recent_news_area_start  -->
    <div class="recent_news_area section__padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-10">
                    <div class="section_title text-center mb-70">
                        <h3 class="mb-45">Berita Terbaru</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="single__news">
                        <div class="thumb">
                            <a href="@{'/berita'}">
                                <img src="@{'/assets/user/img/news/1.png'}" alt="">
                            </a>
                            <span class="badge">Group Study</span>
                        </div>
                        <div class="news_info">
                            <a href="@{'/berita'}">
                                <h4>Those Other College Expenses You
                                    Aren’t Thinking About</h4>
                            </a>
                            <p class="d-flex align-items-center"> <span><i class="flaticon-calendar-1"></i> May 10, 2020</span> 
                            
                            <span> <i class="flaticon-comment"></i> 01 comments</span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="single__news">
                        <div class="thumb">
                            <a href="@{'/berita'}">
                                <img src="@{'/assets/user/img/news/2.png'}" alt="">
                            </a>
                            <span class="badge bandge_2">Hall Life</span>
                        </div>
                        <div class="news_info">
                            <a href="@{'/berita'}">
                                <h4>Those Other College Expenses You
                                    Aren’t Thinking About</h4>
                            </a>
                            <p class="d-flex align-items-center"> <span><i class="flaticon-calendar-1"></i> May 10, 2020</span> 
                            
                            <span> <i class="flaticon-comment"></i> 01 comments</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection
    <!-- recent_news_area_end  -->
