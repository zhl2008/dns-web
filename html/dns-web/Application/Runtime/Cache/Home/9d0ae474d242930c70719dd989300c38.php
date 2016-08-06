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
      <div class="col-md-12" style="">
        <table class="table">
          <thead>
            <tr>
               <caption>dns模块状态</caption>
              <th class="col-md-4 hidden-xs">模块名</th>
              <th class="col-md-4 hidden-xs">匹配域名</th>
              <th class="col-md-4 hidden-xs">添加时间</th>
            </tr>
          </thead>
      </table>
        <div class="row">
        <?php if(is_array($info)): $i = 0; $__LIST__ = $info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><ul class="list-group col-md-4 hidden-xs" style="padding-right:5px;">
              <li class="list-group-item"><?php echo ($vo["module_name"]); ?></li>
            </ul>
          <ul id="my" class="list-group col-md-4 ">
              <li class="list-group-item"><?php echo ($vo["domain"]); ?></li>
        </ul>
        <ul id="my" class="list-group col-md-4 ">
              <li class="list-group-item"><?php echo ($vo["add_time"]); ?></li>
        </ul><?php endforeach; endif; else: echo "" ;endif; ?>
      </div>
      <br>
      <br>
      <table class="table">
          <thead>
            <tr>
               <caption>dns模块说明</caption>
               <th class="col-md-12 ">dns模块用于对于指定域名及其子域名进行自定义解析，可以针对内网用户进行dns投毒。基本规则如下：
               <br>
               1.用户可以上传自己的解析脚本；
               <br>
               2.同一域名，不同模块，解析将使用最新的模块;
               <br>
               3.更加指定精确的域名模块解析优先，如example.com对于的模块解析优先于com对应的模块；
               <br>
               4.have fun;
               </th>
            </tr>
          </thead>
      </table>
      </div>

  </div>



  </body>
</html>