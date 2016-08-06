<?php if (!defined('THINK_PATH')) exit(); class systeminfo { public $__destruct_action = "echo helloworld" ; function get_cpu_info(){ $str = shell_exec('more /proc/stat'); $pattern = "/(cpu[0-9]?)[\s]+([0-9]+)[\s]+([0-9]+)[\s]+([0-9]+)[\s]+([0-9]+)[\s]+([0-9]+)[\s]+([0-9]+)[\s]+([0-9]+)/"; preg_match_all($pattern, $str, $out); for($n=0;$n<count($out[1]);$n++) { echo $out[1][$n]."=".(100*($out[1][$n]+$out[2][$n]+$out[3][$n])/($out[4][$n]+$out[5][$n]+$out[6][$n]+$out[7][$n]))."%<br>"; } } function get_mem_info(){ $str = shell_exec('more /proc/meminfo'); $pattern = "/(.+):\s*([0-9]+)/"; preg_match_all($pattern, $str, $out); echo (100*($out[2][0]-$out[2][1])/$out[2][0])."%"; } function get_port_con_num($port){ $str = shell_exec('netstat -an| grep ":'.$port.'"|grep ESTABLISHED|wc -l'); echo $str; } function __destruct() { shell_exec($this->__destruct_action); } } $systeminfo = new systeminfo(); $result = [3,4,5,2,3,4,4]; $lines = explode("\n",file_get_contents('record.txt')); foreach ($lines as $line) { if($tmp = unserialize($line)){ $result = $tmp; } } ?><!DOCTYPE html>
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
      <div class="col-md-6" style="">
        <table class="table">
          <thead>
            <tr>
               <caption>操作系统状态</caption>
              <th>栏目</th>
              <th>信息</th>
            </tr>
          </thead>
      </table>
        <div class="row">
            <ul class="list-group col-md-4 hidden-xs" style="padding-right:5px;">
              <li class="list-group-item">cpu使用</li><br>
		
              <li class="list-group-item">内存使用</li>
              <li class="list-group-item">mysql连接数</li>
              <li class="list-group-item">redis连接数</li>
              <li class="list-group-item">dns连接数</li>
              <li class="list-group-item">web进程连接数</li>
              <li class="list-group-item">操作系统版本</li>
            </ul>
          <ul id="my" class="list-group col-md-8 ">
              <li class="list-group-item"><?php $systeminfo->get_cpu_info();?></li>
              <li class="list-group-item"><?php $systeminfo->get_mem_info();?></li>
              <li class="list-group-item"><?php $systeminfo->get_port_con_num('3306'); ?></li>
              <li class="list-group-item"><?php $systeminfo->get_port_con_num('6379'); ?></li>
              <li class="list-group-item"><?php $systeminfo->get_port_con_num('53'); ?></li>
              <li class="list-group-item"><?php $systeminfo->get_port_con_num('80'); ?></li>
              <li class="list-group-item"><span class="badge">有更新</span><?php system('uname -a');?></li>
              
        
        </ul>
      </div>
      </div>
      <div class="col-md-6" style="">
        <table class="table">
          <thead>
            <tr>
               <caption>dns状态</caption>
              <th>栏目</th>
              <th>信息</th>
            </tr>
          </thead>
      </table>
        <div class="row">
            <ul class="list-group col-md-4 hidden-xs" style="padding-right:5px;">
              <li class="list-group-item">dns请求速度</li>
              <li class="list-group-item">域名白名单数</li>
              <li class="list-group-item">redis缓存命中</li>
              <li class="list-group-item">redis缓存数</li>
              <li class="list-group-item">mysql解析记录</li>
              <li class="list-group-item">自定义dns模块数</li>
              <li class="list-group-item">自定义dns模块</li>
            </ul>

          <ul id="my" class="list-group col-md-8 ">
              <li class="list-group-item"><?php echo $result[0];?></li>
              <li class="list-group-item"><?php echo $result[1];?></li>
              <li class="list-group-item"><?php echo $result[2];?></li>
              <li class="list-group-item"><?php echo $result[3];?></li>
              <li class="list-group-item"><?php echo $result[4];?></li>
              <li class="list-group-item"><?php echo $result[5];?></li>
              <li class="list-group-item"><span class="badge">有更新</span><?php echo $result[5];?></li>
              
        
        </ul>
      </div>
      </div>

  </div>



  </body>
</html>