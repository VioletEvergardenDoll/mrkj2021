<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>@yield('title')</title>
    <link href="/assets/front/css/main.css" rel="stylesheet" type="text/css" media="all">
    <link rel="stylesheet" href="/assets/front/css/fwslider.css" media="all">
    <link href="/assets/front/css/container.css" rel="stylesheet" type="text/css">
    <link href="/assets/front/css/reset.css" rel="stylesheet" type="text/css">
    <link href="/assets/front/css/screen.css" rel="stylesheet" type="text/css">
    <script src="/assets/front/js/jquery.min.js"></script>
    <script src="/assets/front/js/tab.js"></script>
    <script src="/assets/front/js/jquery.min.js"></script>
    <script src="/assets/front/js/jquery-ui.min.js"></script>
    <script src="/assets/front/js/fwslider.js"></script>
</head>
<body>
<!--头部-->
<div class="header_bg">
    <div class="wrap">
        <div class="header">
            <div class="logo">
                <a href="/"><img src="/assets/front/img/logo.png" alt=""></a>
            </div>
            <div class="pull-icon">
                <a id="pull"></a>
            </div>
            <div class="cssmenu">
                <ul>
                    <li><a href="/">首页</a></li>
                    <li><a href="/front/about">企业简介</a></li>
                    <li><a href="/front/newslist">新闻</a></li>
                    <li><a href="/front/content">核心竞争力</a></li>
                    <li class="last"><a href="/front/contact">联系我们</a></li>
                </ul>
            </div>
            <!--清除浮动-->
            <div class="clear"></div>
        </div>
    </div>
</div>
<!--头部-->


<!--企业简介-->
    @yield('content')
<!--//企业简介-->

<!--页面底部开始-->
<div class="bottom">
    <div class="footer">
        <div class="gulid">
            <p>Copyright 2016 明日科技有限公司 All Rights.</p>
            <p>
                <a href="http://www.mingrisoft.com">明日科技</a> 技术支持
                <a href="/adm">后台</a>
            </p>
            <p>吉ICP备 10002740号-2 吉公网安备22010202000132号</p>
        </div>
    </div>
</div>
<!--页面底部结束-->
</body>
<script>
    tabs("#tab", "active", "#tab_con");
</script>
</html>
