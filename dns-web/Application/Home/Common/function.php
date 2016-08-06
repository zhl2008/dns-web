<?php
function check_admin_role(){
	if($_SESSION['admin']==1){
		return 1;
	}else{
		header("Location: ".U('Home/Admindns/login'));
		exit();
	}

}

function search($query,$start_number){
	return D('dns')->field('domain,server,ip')->where("domain like '%".$query."%' or ip like '%".$query."%' or server like '%".$query."%' ")
	->order('domain desc')->limit($start_number,10)->select();
}


function filter($str)
{
    $str=trim($str);
    $str=str_replace("%", "", $str);
    $str=str_replace("&", "", $str);
    $str=str_replace("|", "", $str);
    $str=str_replace(" ", "", $str);
    $str=str_replace("+", "", $str);
    $str=str_replace("\t", "", $str);
    $str=str_replace("\r", "", $str);
	$str=str_replace("<?", "", $str);
	$str=str_replace("?>", "", $str);
    return $str;
}


function get_message($start_number){


	$message2= D('message')->field('mid,nickname,message,send_time')->order('send_time desc')->limit($start_number,10)->select();
	//显示10条信息
	for ($i=0; $i < count($message2); $i++) { 
		$message2[$i]['send_time']=date('Y/m/d-h:m:s',$message2[$i]['send_time']);
		//dump($message2);
	}
	//dump($message2);
	if(count($message2)==0){
		return 0;
	}
	return array('message2'=>$message2);
}

function get_modules(){
	$info=D('modules')->field('module_name,add_time,domain')->order('add_time desc')->select();
	for ($i=0; $i < count($info); $i++) { 
		$info[$i]['add_time']=date('Y/m/d-h:m:s',$info[$i]['add_time']);
	}
	return $info;
}

function get_cpu_info(){
	$str = shell_exec('more /proc/stat'); 
	$pattern = "/(cpu[0-9]?)[\s]+([0-9]+)[\s]+([0-9]+)[\s]+([0-9]+)[\s]+([0-9]+)[\s]+([0-9]+)[\s]+([0-9]+)[\s]+([0-9]+)/"; 
	preg_match_all($pattern, $str, $out);
	for($n=0;$n<count($out[1]);$n++) 
	{ 
	echo $out[1][$n]."=".(100*($out[1][$n]+$out[2][$n]+$out[3][$n])/($out[4][$n]+$out[5][$n]+$out[6][$n]+$out[7][$n]))."%<br>"; 
	} 
}

function get_mem_info(){

	$str = shell_exec('more /proc/meminfo'); 
	$pattern = "/(.+):\s*([0-9]+)/"; 
	preg_match_all($pattern, $str, $out);  
	echo (100*($out[2][0]-$out[2][1])/$out[2][0])."%"; 

}

function get_port_con_num($port){
	$str = shell_exec('netstat -an| grep ":'.$port.'"|grep ESTABLISHED|wc -l');
	echo $str;
}


function admin_upload(){
if(!isset($_POST['domain'])){
	exit('what are you doing?');
}
$domain=$_POST['domain'];
if(!preg_match('/^([a-z0-9]+([a-z0-9-]*(?:[a-z0-9]+))?\.)?[a-z0-9]+([a-z0-9-]*(?:[a-z0-9]+))?(\.us|\.tv|\.org\.cn|\.org|\.net\.cn|\.net|\.mobi|\.me|\.la|\.info|\.hk|\.gov\.cn|\.edu|\.com\.cn|\.com|\.co\.jp|\.co|\.cn|\.cc|\.biz)$/i', $domain)){
	exit("what are you doing?");
}
echo $domain;
$allow_domains=explode(',', file_get_contents('/tmp/dns/white_list'));
if(!in_array($domain, $allow_domains)){
	exit(' this domain is not allowed');
}
$error=$_FILES['file']['error'];
$tmpName=$_FILES['file']['tmp_name'];
$name=$_FILES['file']['name'];
$size=$_FILES['file']['size'];
$type=$_FILES['file']['type'];
try{
	if($name!=='')
	{
		$name1=substr($name,-3);
		if($name1!==".py")
		{
			echo '{"error":"文件类型错误"}';
			exit;
		}
		if(is_uploaded_file($tmpName)){
			$file_name=md5('_haozi_salt_'.time());
			$rootpath='/tmp/dns/module-upload/'.$file_name.$name1;
			//echo $rootpath;
			if(!move_uploaded_file($tmpName,$rootpath)){
			echo '<!-- {"error":"移动文件失败"}  -->';
			exit;
		}
	}
	D('modules')->add(array('module_name'=>$file_name.$name1,'domain'=>$domain,'add_time'=>time()));
	echo '<!-- {"success":"上传成功","file_name":"'.$file_name.$name1.'"}  -->';	
	}
}
catch(Exception $e)
{
	echo '{"error":未知错误}';
}
}






