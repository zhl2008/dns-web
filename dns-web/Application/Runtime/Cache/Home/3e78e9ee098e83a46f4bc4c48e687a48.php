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

		   

    <!-- MetisMenu CSS -->
    <link href="/dns-web/Public/css/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="/dns-web/Public/css/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/dns-web/Public/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="/dns-web/Public/css/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="/dns-web/Public/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <style type="text/css">
    .pagination {display:inline;}
    .pagination>li>a {padding: 10px 12px;margin-left: 10px;margin-right: 10px}
    .pagination>li:last-child>a{float:right;margin-right: 0px}
    </style>
<!-- /.panel -->
                
                <ul class="pagination">
                <li><a href="<?php echo U('Home/Index/contact?'.$info2['query_previous']);?>">&laquo;</a></li>
                <li><a href="<?php echo U('Home/Index/contact?'.$info2['query_next']);?>">&raquo;</a></li>
                </ul>
                
                    <div class="chat-panel panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-comments fa-fw"></i>
                            留言墙
                            <div class="btn-group pull-right">
                                <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-chevron-down"></i>
                                </button>
                                <ul class="dropdown-menu slidedown">
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-refresh fa-fw"></i> 刷新
                                        </a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="<?php echo U('/Home/User/logout');?>">
                                            <i class="fa fa-sign-out fa-fw"></i> 登出
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <ul class="chat">
                                <?php if(is_array($message2)): $i = 0; $__LIST__ = $message2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="left clearfix">
                                    <span class="chat-img pull-<?php if($i%2==1){echo 'left';}else{echo 'right';}?>">
                                        <img src="/dns-web/Public/img/1.png" alt="User Avatar" style="height:50px" class="img-circle" />
                                    </span>
                                    <div class="chat-body clearfix">
                                        <div class="header">
                                            <strong class="primary-font"><?php echo ($vo["nickname"]); ?></strong>
                                            <small class="pull-right text-muted">
                                                <i class="fa fa-clock-o fa-fw"></i><?php echo ($vo["send_time"]); ?>
                                            </small>
                                        </div>
                                        <p>
                                            <?php echo ($vo["message"]); ?>
                                        </p>
                                
                                        <div style="visibility:<?php if(!isset($_SESSION['admin'])){echo 'hidden'; } ?>">
                                        <button class="btn btn-warning btn-sm" style="float:<?php if($i%2==1){echo 'right';}else{echo 'left';}?>;margin:5px;" onclick="document.location.href='<?php echo U('Home/Admindns/message_admin/mid/'.$vo['mid'].'/action/del');?>';">删除</button>
                                        </div>
                                        
                                    </div>
                                </li><?php endforeach; endif; else: echo "" ;endif; ?>
                            </ul>
                        </div>
                        <!-- /.panel-body -->

                        <div class="panel-footer">
                        <form method="post" action="<?php echo U('/Home/Index/send_message');?>">
                            <div class="input-group">
                                <input id="btn-input" name="message" type="text" class="form-control input-sm" placeholder="Type your message here..." />
                                <input type="hidden" name="biaobaiqiang" value="1">
                                <input type="hidden" name="to_uid" value="0">
                                <span class="input-group-btn">
                                    <button class="btn btn-warning btn-sm" id="btn-chat">
                                        Send
                                    </button>
                                </span>
                            </div>
                        </form>
                        </div>

                        <!-- /.panel-footer -->
                    </div>
                    <!-- /.panel .chat-panel -->


		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   			<div class="modal-dialog">
      			<div class="modal-content" >
         			<div class="modal-header">
         				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            		</div>
		     		<div class="modal-body">
		       			<div class="container  col-md-12">
		            			 <form  method="post" action="<?php echo U('/Home/user/send_message');?>">
                            <div class="input-group">
                                <input id="btn-input" name="message" type="text" class="form-control input-sm" placeholder="Type your message here..." />
                                <input type="hidden" name="biaobaiqiang" value="1">
                                <input type="hidden" name="to_uid" value="0">
                                <input id="myInput" type="hidden" name="photos" value="">
                                <span class="input-group-btn">
                                    <button class="btn btn-warning btn-sm" id="btn-chat">
                                        Send
                                    </button>
                                </span>
                            </div>
                        </form>
		            	</div>
		     		</div>
         			<div class="modal-footer">
         			</div>
      			</div><!-- /.modal-content -->
			</div><!-- /.modal -->
		</div>
	</body>
	
</html>