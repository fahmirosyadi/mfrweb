<!doctype html>
<html class="no-js" lang="zxx">

<head th:replace="user/template::head"></head>

<body>
    <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

    <!-- header-start -->
    <header th:replace="user/template::header"></header>
    <!-- header-end -->

    <!-- bradcam_area_start  -->
    <div class="bradcam_area" th:style="'background-image: url(/uploads/ed_bg.jpeg)'">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text">
                        <h3>event details</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- bradcam_area_end  -->

    <div class="event_details_area section__padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="single_event d-flex align-items-center">
                        <div class="thumb">
                            <img th:src="@{'/assets/user/img/event/1.png'}" alt="">
                            <div class="date text-center">
                                <h4>02</h4>
                                <span>Dec, 2020</span>
                            </div>
                        </div>
                        <div class="event_details_info">
                            <div class="event_info">
                                <a href="#">
                                    <h4>How to speake like a nativespeaker?</h4>
                                 </a>
                                <p><span> <i class="flaticon-clock"></i> 10:30 pm</span> <span> <i class="flaticon-calendar"></i> 21 Nov 2020 </span> <span> <i class="flaticon-placeholder"></i> AH Oditoriam</span> </p>
                            </div>
                            <p class="event_info_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In rhoncus augue nibh, at ullamcorper orci ullamcorper ut. Integer vehicula iaculis risus, non consequat eros tincidunt ac. Morbi a aliquam tortor. Nam convallis vestibulum nisi, sit amet fermentum libero scelerisque id. Integer iaculis mollis justo, sed interdum ligula auctor in. Donec a vehicula nisi. Fusce quis mollis sem. Nam velit dolor, ultricies non mollis vel, sagittis sed leo. Morbi lorem justo, porta eu odio a, tincidunt pretium dui. In ac fringilla arcu.
                            </p>
                            <a href="#" class="boxed-btn3">Book a seat</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- footer start -->
    <footer th:replace="user/template::footer"></footer>
    <!-- footer end  -->


    <!-- JS here -->
    <div th:replace="user/template::foot"></div>

</body>

</html>