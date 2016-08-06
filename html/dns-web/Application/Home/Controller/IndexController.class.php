<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
         	if(isset($_REQUEST['start_number'])){
            	$start_number=I('start_number',0,'intval');
        	}else{
        		$start_number=0;
        	}
            $info=search($query='',$start_number);
            if(!$info){
                $this->error('无结果！',U('index'));
            }
            $previous_number=$start_number==0?0:$start_number-10;
            if($previous_number<0){
            	$previous_number=0;
            }
            $next_number=$start_number+10;
            $info2=array('query_previous'=>'/start_number/'.$previous_number,'query_next'=>'/start_number/'.$next_number);
            $info=array('info'=>$info,'info2'=>$info2);
            $this->assign($info);
            $this->display();
            //dump($info);
        
    }

    public function login(){
    	$this->show('haozi has mv the login page to somewhere, go and find it');
    }



    public function contact(){
    	$start_number=($_REQUEST['start_number'])?$_REQUEST['start_number']:0;
        $start_number=I('start_number',0,'intval');
        $info=get_message($start_number);
        #print_r($info);
        if(!$info){
                $this->error('无结果！',U('/Home/index'));
            }
        $this->assign($info);
        $previous_number=$start_number==0?0:$start_number-10;
        $next_number=$start_number+10;
        $info2=array('query_previous'=>'start_number='.$previous_number,'query_next'=>'start_number='.$next_number);
        $this->assign(array('info2'=>$info2));
        $this->display();
    }

    public function search(){
    	 if(isset($_REQUEST['query'])){
    	 
            $query=I('request.query',0,'strip_tags');
            $start_number=I('start_number',0,'intval');
            $info=search($query,$start_number);
            if(!$info){
                $this->error('无结果！',U('index'));
            }
            $previous_number=$start_number==0?0:$start_number-10;
            $next_number=$start_number+10;
            $info2=array('query_previous'=>'query='.$query.'&start_number='.$previous_number,'query_next'=>'query='.$query.'&start_number='.$next_number);
            $info=array('info'=>$info,'info2'=>$info2);
            $this->assign($info);
            $this->display();
            //dump($info);
        }
    }


    public function send_message(){
        if(isset($_POST['message']))
        {   

            $message=I('POST.message','','strip_tags');
       		if($_SESSION['admin']==1){$nickname='haozi';}else{$nickname='游客';}
            $message=array('nickname'=>$nickname,'message'=>$message,'send_time'=>time());
            D('message')->add($message);
            $this->success('发送成功！',U('Home/Index/contact'));
        }else{
             $this->error('发送失败！',U('index'));
        }

    }

    public function system(){
    	$this->display();
    }

    public function donate(){
    	$this->success('我们是土豪，不缺钱',U('index'));
    }

}