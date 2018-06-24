<?php /*a:2:{s:68:"E:\wamp\www\adminTemplate\application\admin\view\article\create.html";i:1529393364;s:58:"E:\wamp\www\adminTemplate\application\admin\view\base.html";i:1529739355;}*/ ?>
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
                <a href="<?php echo url('Index/index'); ?>">控制中心</a>
            </li>
            <li>
                <a href="<?php echo url('index'); ?>">文章管理</a>
            </li>
            <li class="active">添加文章</li>
        </ul>
    </div>
    <!-- /Page Breadcrumb -->

    <!-- Page Body -->
    <div class="page-body">

        <div class="row">
            <div class="col-lg-12 col-sm-12 col-xs-12">
                <div class="widget">
                    <div class="widget-header bordered-bottom bordered-blue">
                        <span class="widget-caption">新增栏目</span>
                    </div>
                    <div class="widget-body">
                        <div id="horizontal-form">
                            <form class="form-horizontal" role="form" action="<?php echo url('save'); ?>" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="title" class="col-sm-2 control-label no-padding-right">文章标题</label>
                                    <div class="col-sm-6">
                                        <input class="form-control" id="title" placeholder="" name="title" required=""
                                               type="text">
                                    </div>
                                    <p class="help-block col-sm-4 red">* 必填</p>
                                </div>
                                <div class="form-group">
                                    <label for="keywords"
                                           class="col-sm-2 control-label no-padding-right">文章搜索关键字</label>
                                    <div class="col-sm-6">
                                        <input class="form-control" id="keywords" placeholder="多个关键字使用,(逗号)隔开" name="keywords"
                                               required="" type="text">
                                    </div>
                                    <p class="help-block col-sm-4 red">* 必填</p>
                                </div>
                                <div class="form-group">
                                    <label for="des" class="col-sm-2 control-label no-padding-right">文章描述</label>
                                    <div class="col-sm-6">
                                        <textarea class="form-control" id="des" placeholder="" name="des"
                                                  required="" style="resize:none;height:100px;font-size:2rem;"></textarea>
                                    </div>
                                    <p class="help-block col-sm-4 red">* 必填</p>
                                </div>
                                <div class="form-group">
                                    <label for="content" class="col-sm-2 control-label no-padding-right">文章内容</label>
                                    <div class="col-sm-6">
                                        <script id="container" name="content" type="text/plain"></script>
                                    </div>
                                    <p class="help-block col-sm-4 red">* 必填</p>
                                </div>
                                <div class="form-group">
                                    <label for="password" class="col-sm-2 control-label no-padding-right">所属栏目</label>
                                    <div class="col-sm-6">
                                        <select name="cid">
                                            <?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?>
                                            <option value="<?php echo htmlentities($list['id']); ?>">
                                                <?php echo str_repeat('-', $list['level']*2); ?><?php echo htmlentities($list['cate_name']); ?>
                                            </option>
                                            <?php endforeach; endif; else: echo "" ;endif; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-offset-2 col-sm-6">
                                        <label for="exampleInputFile">File input</label>
                                        <input type="file" id="exampleInputFile" name="thumb" required="">
                                        <img src="/public/static/common/images/placeholder.jpg" width="100px" height="100px">
                                    </div>
                                </div>
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
<script type="text/javascript" src="/public/static/common/ueditor/ueditor.config.js"></script><script type="text/javascript" src="/public/static/common/ueditor/ueditor.all.js"></script>
<script type="text/javascript">
    var ue = UE.getEditor('container', {initialFrameHeight:600}),
        fileImg = document.getElementById('exampleInputFile');
    fileImg.addEventListener('change', function () {
        var fileReader = new FileReader(),
            self = this;
        fileReader.readAsDataURL(this.files[0]);
        fileReader.onloadend = function () {
            self.nextElementSibling.src = this.result;
        }
    }, false);

</script>

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