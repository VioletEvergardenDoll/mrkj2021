@extends('common.front-layout')
@section('title','明日科技有限公司')
@section('content')
    <!--轮播-->
    <div id="fwslider" style="height: 554px;">
        <div class="slider_container">
            <div class="slide" style="opacity: 1; z-index: 0; display: none;"><img id="img1" src="/assets/front/img/img1.jpg"></div>
            <div class="slide" style="opacity: 1; z-index: 1; display: block;"><img id="img2" src="/assets/front/img/img2.jpg"></div>
            <div class="slide" style="opacity: 1; z-index: 1; display: block;"><img id="img3" src="/assets/front/img/img3.jpg"></div>
            <div class="slide" style="opacity: 1; z-index: 0; display: none;"><img id="img4" src="/assets/front/img/img4.jpg"></div>
            <div class="slide" style="opacity: 1; z-index: 0; display: none;"><img id="img5" src="/assets/front/img/img5.jpg"></div>
        </div>
        <div class="timers" style="width: 180px;"></div>
        <div class="slidePrev" style="left: 0px; top: 252px;">
            <span></span>
        </div>
        <div class="slideNext" style="right: 0px; top: 252px; opacity: 0.5;">
            <span></span>
        </div>
    </div>
    <!--轮播-->

    <!-- start mian -->
    <div class="main_bg">
        <div class="business">业务领域 BUSINESS</div>
        <div class="wrap w_72">
            <div class="grids_1_of_3">
                <div class="grid_1_of_3 images_1_of_3"><img src="/assets/front/img/pic1.png"></div>
                <div class="grid_1_of_3 images_1_of_3"><img src="/assets/front/img/pic2.png"></div>
                <div class="grid_1_of_3 images_1_of_3"><img src="/assets/front/img/pic3.png"></div>
                <div class="grid_1_of_3 images_1_of_3"><img src="/assets/front/img/pic4.png"></div>
                <div class="grid_1_of_3 images_1_of_3" style="background: none"><img src="/assets/front/img/pic5.png"></div>
                <div class="clear"></div>
            </div>
        </div>
    </div>
    <!-- start mian -->
@endsection
