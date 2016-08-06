<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>haozi-dns管理控制台</title>

	<!-- Bootstrap CSS -->
	 <link rel="stylesheet" type="text/css" href="/dns-web/Public/css/bootstrap.css" />
	
</head>
<script>
		function jump(url){
			//通过设置延迟来解决onclick的冲突
			window.setTimeout("document.location.href='"+url+"'",400);
		}
</script>
<link rel="stylesheet" type="text/css" href="/dns-web/Public/css/fileinput.css" />
<script type="text/javascript" src="/dns-web/Public/js/jquery.js"></script>
<script type="text/javascript" src="/dns-web/Public/js/bootstrap.js"></script>
<script type="text/javascript" src="/dns-web/Public/js/fileinput.js"></script>
<script type="text/javascript" src="/dns-web/Public/js/fileinput_locale_zh.js"></script>
<style type="text/css">
  #my>li.list-group-item:hover
  {background-color: #65D45E;}
</style>
  <body>
    		<nav class="navbar navbar-default"  style="background-color: #41AA4E" role="navigation">
			<div class="container-fluid">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="<?php echo U('/home/index');?>">主页</a>
				</div>
		
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse navbar-ex1-collapse">
					<ul class="nav navbar-nav">
						<li ><a href="<?php echo U('/home/index/system');?>">系统信息</a></li>
						<li ><a href="<?php echo U('/home/index/contact');?>">联系我们</a></li>
						<li><a href="<?php echo U('/home/index/donate');?>">捐助我们</a></li>
						<?php if($_SESSION['admin']==1){echo '<li><a href="/dns-web/home/Admindns/upload">自定义模块</a></li><li><a href="/dns-web/home/Admindns/modules">已安装模块</a></li><li><a href="/dns-web/home/Admindns/download">下载配置</a></li>';} ?>

					</ul>
					<form class="navbar-form navbar-left" role="search" method="post" action="<?php echo U('/home/index/search');?>">
						<div class="form-group">
							<input type="text" class="form-control" style="border-radius: 4px;height: 34px;" name="query" placeholder="Search">
						</div>
						<button type="submit" class="btn btn-default" style="border-radius: 4px;">GO</button>
					</form>
					<ul class="nav navbar-nav navbar-right">
						<li><a href="<?php echo U('/home/Admindns/login');?>"><?php if($_SESSION['admin']==1){echo "admin";}else{echo "游客";} ?>，您好！</a></li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">消息和通知 <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="#">Action</a></li>
								<li><a href="#">Another action</a></li>
								<li><a href="#">Something else here</a></li>
								<li><a href="#">Separated link</a></li>
								<li><a href="<?php echo U('/home/user/logout');?>">登出</a></li>
							</ul>
						</li>
					</ul>
				</div><!-- /.navbar-collapse -->
			</div>
		</nav>

    <div class="container">
      <div class="col-md-8 col-md-offset-2" style="">
    <div class="htmleaf-container col-md-12" >
    <table class="table"><thead><tr><caption>[*]模块上传</caption><th></th></tr></thead></table>

    <div class="container  col-md-12 visible-xs">
        <form enctype="multipart/form-data" method="post" action='<?php echo U("/Home/Admindns/upload/");?>'>
                <div class="col-md-6">
                <input type="domain" name="domain"  value="example.com">
                </div>
                <span class="col-md-3">
                <div class="col-md-6">
                <input id="file-0a" class="file" name='file' type="file" multiple data-min-file-count="1">
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="reset" class="btn btn-default">Reset</button>
            </form>
            <h4>请填写模块解析子域名，并上传模块文件</h4>
    </div>

        <form enctype="multipart/form-data" method="post" action='<?php echo U("/Home/Admindns/upload/");?>'>
      <div class="container  col-md-12 hidden-xs" >
        <form enctype="multipart/form-data">
  
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">[*]只能上传py格式哦</h4>
                </div>
                
                
                

                <div class="form-group ">

                     <span>

                    <input id="file-4" type="file" name="file" class="file" >
                    

                </div>
                <input  id="file-4" type="domain" name="domain"  value="example.com">
        </form>
        <h4>请填写模块解析子域名，并上传模块文件</h4>
                </div>
                <hr>
            </form>
        </div>
    
  </div>
      </div>

  </div>



  </body>
</html>