<?php
function deldir($dir) {
	//先删除目录下的文件：
	$dh=opendir($dir);
	while ($file=readdir($dh)) {
		if($file!="." && $file!="..") {
			$fullpath=$dir."/".$file;
			if(!is_dir($fullpath)) {
				unlink($fullpath);
			} else {
				deldir($fullpath);
			}
		}
	}  
	closedir($dh);
	//删除当前文件夹：
	if(rmdir($dir)) {
		return true;
	} else {
		return false;
	}
}

function delfile($dir){
	if(!is_dir($dir)) {
		unlink($dir);
	} else {
		deldir($dir);
	}
}
function time_elapsed_string($datetime, $full = false) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}
function get_password( $length = 8 ) 
{
    $str = substr(md5(time()), 0, $length);//md5加密，time()当前时间戳
    return $str;
}
function createFolder($path)
{
	if (!file_exists($path))
	{
		createFolder(dirname($path));
		mkdir($path, 0777);
	}
}
 
require_once "../email/email.class.php";
function send_email($content,$email,$title)
{
	/**
	* 注：本邮件类都是经过我测试成功了的，如果大家发送邮件的时候遇到了失败的问题，请从以下几点排查：
	* 1. 用户名和密码是否正确；
	* 2. 检查邮箱设置是否启用了smtp服务；
	* 3. 是否是php环境的问题导致；
	* 4. 将26行的$smtp->debug = false改为true，可以显示错误信息，然后可以复制报错信息到网上搜一下错误的原因；
	* 5. 如果还是不能解决，可以访问：http://www.daixiaorui.com/read/16.html#viewpl 
	*   
	*/	
	//******************** 配置信息 ********************************
	$smtpserver = "smtp.126.com";//SMTP服务器
	$smtpserverport =25;//SMTP服务器端口
	$smtpusermail = "yangzhanfu111@126.com";//SMTP服务器的用户邮箱
	$smtpemailto = $email;//发送给谁
	$smtpuser = "yangzhanfu111";//SMTP服务器的用户帐号
	$smtppass = "19960109yzf";//SMTP服务器的用户密码
	$mailtitle = $title;//邮件主题
	$mailcontent = "<h1>".$content."</h1>";//邮件内容
	$mailtype = "HTML";//邮件格式（HTML/TXT）,TXT为文本邮件
	//************************ 配置信息 ****************************
	$smtp = new smtp($smtpserver,$smtpserverport,true,$smtpuser,$smtppass);//这里面的一个true是表示使用身份验证,否则不使用身份验证.
	$smtp->debug = false;//是否显示发送的调试信息
	$state = $smtp->sendmail($smtpemailto, $smtpusermail, $mailtitle, $mailcontent, $mailtype);		
	//mysql_query("set username,institusion utf8");
}

?>