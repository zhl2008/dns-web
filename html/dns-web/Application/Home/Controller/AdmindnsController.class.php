<?php
namespace Home\Controller;
use Think\Controller;
class AdmindnsController extends Controller {
    public function index(){
        check_admin_role();
        $this->show('<script>window.location.href="/dns-web/Home/Admindns/modules";</script>');
        
        
	}

	public function message_admin(){
		check_admin_role();
		if(isset($_REQUEST['action'])&&isset($_REQUEST['mid'])){
			if($_REQUEST['action']=='del'){
				$mid=filter($_REQUEST['mid']);
				$query='delete from message where mid="'.$mid.'";';
				$result=D('message')->execute($query)[0];
				echo '<!--'.$result.'-->';
				$this->success('delete success!', U('/Home/Index/contact'),3);	
			}
		}
	}

    public function login(){
        if(isset($_POST['uname'])&&isset($_POST['passwd'])){
        	$uname=filter($_POST['uname']);
        	$passwd=filter($_POST['passwd']);
        	$query='select count(*) from admin where uname ="'.$uname.'" and passwd="'.$passwd.'" ;';
        	echo '<!--'.$query.'-->';
        	$count=D('admin')->query($query)[0]['count(*)'];
        	echo '<!-- the output is '.$count.'-->';
            if($count>=1){
                session_start();
                $_SESSION['admin']=1;
                $_SESSION['expire']=7200;
                 $this->success('login success!', U('/Home/Admindns/modules'),3);
            }else{
        $this->error('username or password error!',U('/Home/Admindns/login'),10);
        session_destroy();
       }
        }else{
            $this->display();
        }
    }

    public function modules(){
    	check_admin_role();
    	$info=get_modules();
    	//var_dump($info);
    	$info=array('info'=>$info);
    	$this->assign($info);
    	$this->display();
    }

    public function upload(){
    	check_admin_role();
    	if(isset($_POST['domain'])){
    		admin_upload();
            $this->success('upload success!',U('/Home/Admindns/modules'),3);
    	}else{
    		$this->display();
    	}
    	
    }

    public function download(){
    	check_admin_role();
    	$this->display();
    }

}
