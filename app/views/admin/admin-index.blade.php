@extends('common.admin-layout')
@section('title','后台首页')
@section('content')
    <!-- content start -->
    <div class="admin-content">
        <div class="am-cf am-padding">
            <div class="am-fl am-cf">
                    <strong class="am-text-primary am-text-lg">首页</strong> / <small>一些常用模块</small></a>
            </div>
        </div>

        <ul
                class="am-avg-sm-1 am-avg-md-4 am-margin am-padding am-text-center admin-content-list ">
            <li><a href="/adm/user" class="am-text-success"><span
                            class="am-icon-btn am-icon-file-text"></span><br />用户管理<br /></a></li>
            <li><a href="/adm/news" class="am-text-warning"><span
                            class="am-icon-btn am-icon-briefcase"></span><br />新闻管理<br /></a></li>
        </ul>
    </div>
@endsection