<!doctype html>
<html class="no-js">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <meta name="description" content="这是一个 index 页面">
    <meta name="keywords" content="index">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="icon" type="image/png" href="/assets/admin/i/favicon.png">
    <link rel="apple-touch-icon-precomposed" href="/assets/admin/i/app-icon72x72@2x.png">
    <meta name="apple-mobile-web-app-title" content="Amaze UI" />
    <link rel="stylesheet" href="/assets/admin/css/amazeui.min.css" />
    <link rel="stylesheet" href="/assets/admin/css/admin.css">
    <link rel="stylesheet" href="/assets/admin/css/bootstrap.css">
    <script src="/assets/admin/js/jquery.min.js"></script>
    <!--<![endif]-->
    <script src="/assets/admin/js/amazeui.min.js"></script>
    <script src="/assets/admin/js/app.js"></script>
    <script src="/assets/admin/js/admin.js"></script>
    <script src="/assets/admin/js/admin-user.js"></script>
    <script src="/assets/admin/js/admin-news.js"></script>
</head>
<body>
<!--[if lte IE 9]>
<p class="browsehappy">你正在使用<strong>过时</strong>的浏览器，Amaze UI 暂不支持。 请 <a href="http://browsehappy.com/" target="_blank">升级浏览器</a>
    以获得更好的体验！</p>
<![endif]-->

<header class="am-topbar admin-header">
    <div class="am-topbar-brand">
        <strong>Amaze UI</strong> <small>后台管理模板</small>
    </div>

    <button
            class="am-topbar-btn am-topbar-toggle am-btn am-btn-sm am-btn-success am-show-sm-only"
            data-am-collapse="{target: '#topbar-collapse'}">
        <span class="am-sr-only">导航切换</span> <span class="am-icon-bars"></span>
    </button>

    <div class="am-collapse am-topbar-collapse" id="topbar-collapse">

        <ul
                class="am-nav am-nav-pills am-topbar-nav am-topbar-right admin-header-list">
            <li><a href="javascript:;"><span class="am-icon-envelope-o"></span>
                    收件箱 <span class="am-badge am-badge-warning">5</span></a></li>
            <li class="am-dropdown" data-am-dropdown><a
                        class="am-dropdown-toggle" data-am-dropdown-toggle
                        href="javascript:;"> <span class="am-icon-users"></span> {{Auth::user()->username}}管理员 <span
                            class="am-icon-caret-down"></span>
                </a>
                <ul class="am-dropdown-content">
                    <li><a href="#"><span class="am-icon-user"></span> 资料</a></li>
                    <li><a href="#"><span class="am-icon-cog"></span> 设置</a></li>
                    <li><a href="/login"><span class="am-icon-power-off"></span>
                            退出</a></li>
                </ul></li>
            <li class="am-hide-sm-only"><a href="javascript:;"
                                           id="admin-fullscreen"><span class="am-icon-arrows-alt"></span>
                    <span class="admin-fullText">开启全屏</span></a></li>
        </ul>
    </div>
</header>

<div class="am-cf admin-main">
    <!-- sidebar start -->
    <div class="admin-sidebar am-offcanvas" id="admin-offcanvas">
        <div class="am-offcanvas-bar admin-offcanvas-bar">
            <ul class="am-list admin-sidebar-list">
                <li><a href="/adm"><span class="am-icon-home"></span>
                        首页</a></li>
                <li><a href="/adm/user"><span class="am-icon-table"></span>
                        用户管理</a></li>
                <li><a href="/adm/news"><span
                                class="am-icon-pencil-square-o"></span> 新闻管理</a></li>
                <li><a href="/logout"><span class="am-icon-sign-out"></span> 注销</a></li>
            </ul>

            <div class="am-panel am-panel-default admin-sidebar-panel">
                <div class="am-panel-bd">
                    <p>
                        <span class="am-icon-bookmark"></span> 公告
                    </p>
                    <p>时光静好，与君语；细水流年，与君同。—— Amaze UI</p>
                </div>
            </div>

            <div class="am-panel am-panel-default admin-sidebar-panel">
                <div class="am-panel-bd">
                    <p>
                        <span class="am-icon-tag"></span> wiki
                    </p>
                    <p>Welcome to the Amaze UI wiki!</p>
                </div>
            </div>
        </div>
    </div>
    <!-- sidebar end -->

    <!-- content start -->
    <div class="admin-content">
        @yield('content')
    </div>
    <!-- content end -->

<a href="#" class="am-show-sm-only admin-menu"data-am-offcanvas="{target: '#admin-offcanvas'}">
    <span class="am-icon-btn am-icon-th-list"></span>
</a>

<footer>
    <hr>
    <p class="am-padding-left">© 2014 AllMobilize, Inc. Licensed under MIT license.</p>
</footer>
@yield('operation')

<!--[if lt IE 9]>
<script src="http://libs.baidu.com/jquery/1.11.1/jquery.min.js"></script>
<script src="http://cdn.staticfile.org/modernizr/2.8.3/modernizr.js"></script>
<script src="/assets/admin/js/amazeui.ie8polyfill.min.js"></script>
<![endif]-->

<!--[if (gte IE 9)|!(IE)]><!-->
</body>
</html>
