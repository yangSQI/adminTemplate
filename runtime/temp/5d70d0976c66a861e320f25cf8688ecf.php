<?php /*a:2:{s:63:"E:\wamp\www\adminTemplate\application\admin\view\conf\conf.html";i:1529819039;s:58:"E:\wamp\www\adminTemplate\application\admin\view\base.html";i:1529739355;}*/ ?>
<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="utf-8">
    <title>后台管理</title>

    <meta name="description" content="Dashboard">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!--Basic Styles-->
    <link href="/public/static/admin/style/bootstrap.css" rel="stylesheet">
    <link href="/public/static/admin/style/font-awesome.css" rel="stylesheet">
    <link href="/public/static/admin/style/weather-icons.css" rel="stylesheet">

    <!--Beyond styles-->
    <link id="beyond-link" href="/public/static/admin/style/beyond.css" rel="stylesheet" type="text/css">
    <link href="/public/static/admin/style/demo.css" rel="stylesheet">
    <link href="/public/static/admin/style/typicons.css" rel="stylesheet">
    <link href="/public/static/admin/style/animate.css" rel="stylesheet">
    
</head>

<body>
<!-- 头部 -->
<div class="navbar">
    <div class="navbar-inner">
        <div class="navbar-container">
            <!-- Navbar Barnd -->
            <div class="navbar-header pull-left">
                <a href="#" class="navbar-brand">
                    <small>
                        <img src="/public/static/admin/images/logo.png">
                    </small>
                </a>
            </div>
            <!-- /Navbar Barnd -->
            <!-- Sidebar Collapse -->
            <div class="sidebar-collapse" id="sidebar-collapse">
                <i class="collapse-icon fa fa-bars"></i>
            </div>
            <!-- /Sidebar Collapse -->
            <!-- Account Area and Settings -->
            <div class="navbar-header pull-right">
                <div class="navbar-account">
                    <ul class="account-area">
                        <li>
                            <a class="login-area dropdown-toggle" data-toggle="dropdown">
                                <div class="avatar" title="View your public profile">
                                    <img src="<?php echo db('admin')->where('id',session('admin_id'))->field('img')->find()['img']; ?>">
                                </div>
                                <section>
                                    <h2>
                                            <span class="profile">
                                                <span>admin</span>
                                            </span>
                                    </h2>
                                </section>
                            </a>
                            <!--Login Area Dropdown-->
                            <ul class="pull-right dropdown-menu dropdown-arrow dropdown-login-area">
                                <li class="username">
                                    <a>David Stevenson</a>
                                </li>
                                <li class="dropdown-footer">
                                    <a href="<?php echo url('Logout/logout'); ?>">
                                        退出登录
                                    </a>
                                </li>
                                <li class="dropdown-footer">
                                    <a href="<?php echo url('Admin/edit',['id'=>session('admin_id')]); ?>">
                                        修改密码
                                    </a>
                                </li>

                            </ul>
                            <!--/Login Area Dropdown-->
                        </li>
                        <!-- /Account Area -->
                        <!--Note: notice that setting div must start right after account area list.
                        no space must be between these elements-->
                        <!-- Settings -->
                    </ul>
                </div>
            </div>
            <!-- /Account Area and Settings -->
        </div>
    </div>
</div>

<!-- /头部 -->

<div class="main-container container-fluid">
    <div class="page-container">
        <!-- Page Sidebar -->
        <div class="page-sidebar" id="sidebar">
            <!-- Page Sidebar Header-->
            <div class="sidebar-header-wrapper">
                <input class="searchinput" type="text">
                <i class="searchicon fa fa-search"></i>
                <div class="searchhelper">此搜索仅搜索管理员</div>
            </div>
            <!-- /Page Sidebar Header -->
            <!-- Sidebar Menu -->
            <ul class="nav sidebar-menu">
                <li>
                    <a href="#" class="menu-dropdown">
                        <i class="menu-icon fa fa-user"></i>
                        <span class="menu-text">管理员</span>
                        <i class="menu-expand"></i>
                    </a>
                    <ul class="submenu">
                        <li>
                            <a href="<?php echo url('Admin/index'); ?>">
                                    <span class="menu-text">
                                        管理员列表 </span>
                                <i class="menu-expand"></i>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo url('Admin/create'); ?>">
                                    <span class="menu-text">
                                        管理员添加 </span>
                                <i class="menu-expand"></i>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#" class="menu-dropdown">
                        <i class="menu-icon fa fa-columns"></i>
                        <span class="menu-text">栏目</span>
                        <i class="menu-expand"></i>
                    </a>
                    <ul class="submenu">
                        <li>
                            <a href="<?php echo url('CateGory/index'); ?>">
                                    <span class="menu-text">
                                        栏目列表 </span>
                                <i class="menu-expand"></i>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo url('CateGory/create'); ?>">
                                    <span class="menu-text">
                                        栏目添加 </span>
                                <i class="menu-expand"></i>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#" class="menu-dropdown">
                        <i class="menu-icon fa fa-file-text"></i>
                        <span class="menu-text">文档</span>
                        <i class="menu-expand"></i>
                    </a>
                    <ul class="submenu">
                        <li>
                            <a href="<?php echo url('Article/index'); ?>">
                                    <span class="menu-text">
                                        文章列表 </span>
                                <i class="menu-expand"></i>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo url('Article/create'); ?>">
                                    <span class="menu-text">
                                        文章添加 </span>
                                <i class="menu-expand"></i>
                            </a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="#" class="menu-dropdown">
                        <i class="menu-icon fa fa-gear"></i>
                        <span class="menu-text">系统</span>
                        <i class="menu-expand"></i>
                    </a>
                    <ul class="submenu">
                        <li>
                            <a href="<?php echo url('Conf/index'); ?>">
                                    <span class="menu-text">
                                        配置列表 </span>
                                <i class="menu-expand"></i>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo url('Conf/conf'); ?>">
                                    <span class="menu-text">
                                        配置项 </span>
                                <i class="menu-expand"></i>
                            </a>
                        </li>
                    </ul>
                </li>


            </ul>
            <!-- /Sidebar Menu -->
        </div>
        <!-- /Page Sidebar -->
        <!-- Page Content -->
        
<div class="page-content">
    <!-- Page Breadcrumb -->
    <div class="page-breadcrumbs">
        <ul class="breadcrumb">
            <li>
                <i class="fa fa-home"></i>
                <a href="<?php echo url('index/index'); ?>">控制中心</a>
            </li>
            <li class="active">
                <i class="fa fa-columns"></i>
                <a href="<?php echo url('index'); ?>">栏目列表</a>
            </li>
            <li class="active">
                <i class="fa fa-edit"></i>
                配置项
            </li>
        </ul>
    </div>
    <!-- /Page Breadcrumb -->
    <!-- Page Header -->
    <div class="page-header position-relative">
        <div class="header-title">
            <h1>
                工具->
            </h1>
        </div>
        <!--Header Buttons-->
        <div class="header-buttons">
            <a class="sidebar-toggler" href="#">
                <i class="fa fa-arrows-h"></i>
            </a>
            <a class="refresh" id="refresh-toggler" href="">
                <i class="glyphicon glyphicon-refresh"></i>
            </a>
            <a class="fullscreen" id="fullscreen-toggler" href="#">
                <i class="glyphicon glyphicon-fullscreen"></i>
            </a>
        </div>
        <!--Header Buttons End-->
    </div>
    <!-- /Page Header -->
    <!-- Page Body -->
    <div class="page-body">

        <div class="row">
            <div class="col-lg-12 col-sm-12 col-xs-12">
                <div class="widget">
                    <div class="widget-header bordered-bottom bordered-blue">
                        <span class="widget-caption">配置项</span>
                    </div>
                    <div class="widget-body">
                        <div id="horizontal-form">
                            <form class="form-horizontal" role="form" action="<?php echo url('setConf'); ?>" method="post">
                                <?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?>
                                <div class="form-group">
                                    <?php if($list['type']==1): ?>
                                        <label for="<?php echo htmlentities($list['enname']); ?>" class="col-sm-2 control-label no-padding-right"><?php echo htmlentities($list['cnname']); ?></label>
                                        <div class="col-sm-6">
                                            <input class="form-control" id="<?php echo htmlentities($list['enname']); ?>" placeholder="" name="<?php echo htmlentities($list['enname']); ?>" type="text" value="<?php echo htmlentities($list['value']); ?>">
                                        </div>
                                    <?php elseif($list['type']==2): ?>
                                        <label class="col-sm-2 control-label no-padding-right"><?php echo htmlentities($list['cnname']); ?></label>
                                        <div class="col-sm-6">
                                            <?php foreach($list['value_s'] as $k => $v): ?>
                                            <div class="control-group">
                                                <div class="radio" style="float:left;margin-left:10px;">
                                                    <label for="<?php echo htmlentities($k); ?>">
                                                        <input name="<?php echo htmlentities($list['enname']); ?>" type="radio" class="colored-blue" id="<?php echo htmlentities($k); ?>" value="<?php echo htmlentities($k); ?>" <?php if($list['value']==$k): ?>checked="checked"<?php endif; ?>>
                                                        <span class="text"><?php echo htmlentities($v); ?></span>
                                                    </label>
                                                </div>
                                            </div>
                                            <?php endforeach; ?>
                                        </div>
                                    <?php elseif($list['type']==3): ?>
                                        <label class="col-sm-2 control-label no-padding-right"><?php echo htmlentities($list['cnname']); ?></label>
                                        <div class="col-sm-6">
                                            <select name="<?php echo htmlentities($list['enname']); ?>">
                                                <option value="">请选择</option>
                                                <?php foreach($list['value_s'] as $k => $v): ?>
                                                    <option value="<?php echo htmlentities($k); ?>" <?php if($list['value']==$k): ?>selected="selected"<?php endif; ?>><?php echo htmlentities($v); ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <?php endforeach; endif; else: echo "" ;endif; ?>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" class="btn btn-default">保存信息</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Page Body -->
</div>

    </div>
    <!-- /Page Content -->
</div>
</div>

<!--Basic Scripts-->
<script src="/public/static/admin/style/jquery_002.js"></script>
<script src="/public/static/admin/style/bootstrap.js"></script>
<script src="/public/static/admin/style/jquery.js"></script>
<!--Beyond Scripts-->
<script src="/public/static/admin/style/beyond.js"></script>


</body>

</html>