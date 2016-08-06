<?php
$copyright='<!--
 * Create this project as a simple example for dns-web to download file with php
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @howtoget  haozigege/dns-downloader@github.com
 * @author Haozi Zhang <zhl2008vvvss@gmail.com>
 * @version 1.0
-->';

$module_dir='/tmp/dns/module-upload/';
$allow_files=['/tmp/dns/dns.py','/tmp/dns/config.py','/tmp/dns/dns.doc'];
$files=scandir('/tmp/dns/module-upload/');

foreach ($files as $key => $value) {
	array_push($allow_files, $module_dir.$value);
}

if(!isset($_REQUEST['filename'])||!isset($_REQUEST['token'])){
	echo $copyright;
	exit('please input filename or token');
}

$filename=$_REQUEST['filename'];
$token=$_REQUEST['token'];

if(!in_array($filename,$allow_files)){
	exit('invalid filename');
}

if(check($filename,$token)){
	echo file_get_contents($filename);
}else{
	exit('invalid token');
}

function check($filename,$token){
	if($filename==decrypt($token,'haozihaozihaozizzzz')){
		return 1;
	}
	return 0;
}


function decrypt($info, $key,$salt="_haozi_")
{
	$key = md5($key);
    $x = 0;
    $info = base64_decode($info);
    $len = strlen($info);
    $g  =  strlen($salt);
    $l = strlen($key);
    $str1   =   '';
    $str    =   '';
    for ($j = 0; $j < $len; $j++)
    {
        if ($x == $l) 
        {
        	$x = 0;
        }
        $str1 .= substr($key, $x, 1);
        $x++;
    }
    for ($j = 0; $j < $len; $j++)
    {
        if (ord(substr($info, $j, 1)) < ord(substr($str1, $j, 1)))
        {
            $str .= chr((ord(substr($info, $j, 1)) + 256) - ord(substr($str1, $j, 1)));
        }
        else
        {
            $str .= chr(ord(substr($info, $j, 1)) - ord(substr($str1, $j, 1)));
        }
    }
    return substr($str,0,strlen($str)-7);
}

?>
