<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Login Page | Amaze UI Example</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="format-detection" content="telephone=no">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="alternate icon" type="image/png" href="/assets/admin/i/favicon.png">
    <link rel="stylesheet" href="/assets/admin/css/amazeui.min.css" />
    <script src="/assets/admin/js/jquery.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="/assets/admin/js/admin.js" type="text/javascript"></script>
    <style>
        .header {
            text-align: center;
        }

        .header h1 {
            font-size: 200%;
            color: #333;
            margin-top: 30px;
        }

        .header p {
            font-size: 14px;
        }
    </style>

</head>
<body>
<div class="header">
    <div class="am-g">
        <h1>明日科技后台管理</h1>
    </div>
    <hr />
</div>
<div class="am-g">
    <div class="am-u-lg-6 am-u-md-8 am-u-sm-centered">
        <h3>登录</h3>
        <hr>
        <br> <br>

        <form method="post" class="am-form">
            <input type="hidden" name="_token" value="{{csrf_token()}}" />
            <label for="username">用户名:</label>
            <input type="text" name="" id="username" value=""> <br>
            <label for="password">密码:</label>
            <input type="password" name="" id="password" value=""> <br>
            <label for="remember-me">
                <input id="remember-me" type="checkbox"> 记住密码
            </label> <br />
            <div class="am-cf">
                <input type="button" onclick="login()" name="" value="登 录" class="am-btn am-btn-primary am-btn-sm am-fl">
                <input type="button" onclick="forgetpwd()" name="" value="忘记密码 ^_^? " class="am-btn am-btn-default am-btn-sm am-fr">
            </div>
        </form>

        <hr>
        <p>© 2014 AllMobilize, Inc. Licensed under MIT license.</p>
    </div>
</div>
</body>
</html>
