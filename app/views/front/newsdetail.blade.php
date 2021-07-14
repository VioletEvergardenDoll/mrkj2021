@extends('common.front-layout')
@section('title','明日科技有限公司')
@section('content')
<!--banner-->
<div class="second_banner">
    <img src="/assets/front/img/4.gif" alt="">
</div>
<!--//banner-->
<!--新闻-->
<div class="container">
    <div class="left">
        <div class="menu_plan">
            <div class="menu_title">
                公司动态<br>
                <span>news of company</span>
            </div>
            <ul id="tab">
                <li><a href="#">公司新闻</a></li>
            </ul>
        </div>
    </div>
    <div class="right">
        <div class="location">
				<span>当前位置：<a href="javascript:void(0)" id="a"><a
                                href="#">公司新闻</a></a></span>
            <div class="brief" id="b">
                <a href="#">公司新闻</a>
            </div>
        </div>
        <div style="font-size: 14px; margin-top: 53px; line-height: 36px;">
            <div id="tab_con">
                <div id="tab_con_2" class="dis-n" style="display: none;">
                    <div class="content_main">
                        <br><h2 style="font-size:28px;margin-left:30%">{{$news->title}}</h2>
                        <p>{{$news->content}}</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<!--//新闻-->
@endsection