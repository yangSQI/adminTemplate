<?php /*a:1:{s:65:"E:\wamp\www\adminTemplate\application\admin\view\login\index.html";i:1529307449;}*/ ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml"><!--Head--><head>
    <meta charset="utf-8">
    <title>童老师ThinkPHP交流群：484519446</title>
    <meta name="description" content="login page">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!--Basic Styles-->
    <link href="/public/static/admin/style/bootstrap.css" rel="stylesheet">
    <link href="/public/static/admin/style/font-awesome.css" rel="stylesheet">
    <!--Beyond styles-->
    <link id="beyond-link" href="/public/static/admin/style/beyond.css" rel="stylesheet">
    <link href="/public/static/admin/style/demo.css" rel="stylesheet">
    <link href="/public/static/admin/style/animate.css" rel="stylesheet">
</head>
<!--Head Ends-->
<!--Body-->

<body>
<div class="login-container animated fadeInDown">
    <form action="<?php echo url('loginCheck'); ?>" method="post">
        <div class="loginbox bg-white">
            <div class="loginbox-title">后台登录</div>
            <div class="loginbox-textbox">
                <input class="form-control" placeholder="username" name="username" type="text">
            </div>
            <div class="loginbox-textbox">
                <input class="form-control" placeholder="password" name="password" type="password">
            </div>
            <div class="loginbox-textbox">
                <div><img src="<?php echo captcha_src(); ?>" alt="captcha" width="100%" onclick="this.src=this.src+'random='+Math.random();"/></div>
            </div>
            <div class="loginbox-textbox">
                <input class="form-control" placeholder="验证码" name="check" type="text" style="width:50%;font-size:20px;">
            </div>
            <div class="loginbox-submit">
                <input class="btn btn-primary btn-block" value="登录" type="submit">
            </div>
        </div>
    </form>
</div>
</body><!--Body Ends--></html>