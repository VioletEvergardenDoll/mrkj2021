@extends('common.front-layout')
@section('title','明日科技有限公司')
@section('content')
<!--banner-->
<div class="second_banner">
    <img src="/assets/front/img/3.gif" alt="">
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
				<span>当前位置：<a href="javascript:void(0)" id="a">
				<a href="#">公司新闻</a></a></span>
            <div class="brief" id="b">
                <a href="#">公司新闻</a>
            </div>
        </div>
        <div style="font-size: 14px; margin-top: 53px; line-height: 36px;">
            <div id="tab_con">
                <div id="tab_con_2" class="dis-n" style="display: none;">
                    <table style="margin-top: 70px">
                        <tbody>
                        <tr class="tt_bg">
                            <td>新闻标题</td>
                            <td>发布人</td>
                            <td>发布时间</td>
                            <td>详情</td>
                        </tr>
                        @foreach($news as $v)
                            <tr>
                                <td>{{$v->title}}</td>
                                <td>{{$v->publisher}}</td>
                                <td>{{$v->created_at}}</td>
                                <td><a style="color:#3F862E" target="_blank" href="/front/newsdetail/{{$v->id}}">详情</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{$news->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
<!--//新闻-->
@endsection

