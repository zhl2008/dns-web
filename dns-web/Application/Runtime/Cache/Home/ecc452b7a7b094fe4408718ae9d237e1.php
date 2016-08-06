<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>BIT素颜女神</title>

	<!-- Bootstrap CSS -->
	 <link rel="stylesheet" type="text/css" href="/dns-web/Public/css/bootstrap.css" />
	
</head>
<script>
		function jump(url){
			//通过设置延迟来解决onclick的冲突
			window.setTimeout("document.location.href='"+url+"'",400);
		}
</script>
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
					</ul>
					<form class="navbar-form navbar-left" role="search" method="post" action="<?php echo U('/home/index/search');?>">
						<div class="form-group">
							<input type="text" class="form-control" style="border-radius: 4px;height: 34px;" name="query" placeholder="Search">
						</div>
						<button type="submit" class="btn btn-default" style="border-radius: 4px;">GO</button>
					</form>
					<ul class="nav navbar-nav navbar-right">
						<li><a href="<?php echo U('/home/index/login');?>"><?php if(isset($_SESSION['uid'])){if($_SESSION['admin']==1){echo "admin";}else{echo query_user_exist($_SESSION['uid']);}}else{echo "游客";} ?>，您好！</a></li>
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
		<div class="container-fluid">
			<table class="table table-hover">
				<thead>
					<tr>
						<th>domain name</th>
						<th>dns server</th>
						<th>ip address</th>
					</tr>
				</thead>
				<tbody>
				 <?php if(is_array($info)): $i = 0; $__LIST__ = $info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
						<td><?php echo ($vo["domain"]); ?></td>
						<td><?php echo ($vo["server"]); ?></td>
						<td><?php echo ($vo["ip"]); ?></td>
					</tr><?php endforeach; endif; else: echo "" ;endif; ?>

<ul class="pagination">
  <li ><a href="<?php echo U('Home/Index/search?'.$info2['query_previous']);?>">&laquo;</a></li>
  <li ><a href="<?php echo U('Home/Index/search?'.$info2['query_next']);?>">&raquo;</a></li>
</ul>
				</tbody>
			</table>
		</div>

<style type="text/css">
	.pagination {display:inline;}
	.pagination>li:last-child>a{float:right;}
</style>


</body>
</html>