<?php
function deldir($dir) {
	//��ɾ��Ŀ¼�µ��ļ���
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
	//ɾ����ǰ�ļ��У�
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
    $str = substr(md5(time()), 0, $length);//md5���ܣ�time()��ǰʱ���
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
	* ע�����ʼ��඼�Ǿ����Ҳ��Գɹ��˵ģ������ҷ����ʼ���ʱ��������ʧ�ܵ����⣬������¼����Ų飺
	* 1. �û����������Ƿ���ȷ��
	* 2. ������������Ƿ�������smtp����
	* 3. �Ƿ���php���������⵼�£�
	* 4. ��26�е�$smtp->debug = false��Ϊtrue��������ʾ������Ϣ��Ȼ����Ը��Ʊ�����Ϣ��������һ�´����ԭ��
	* 5. ������ǲ��ܽ�������Է��ʣ�http://www.daixiaorui.com/read/16.html#viewpl 
	*   
	*/	
	//******************** ������Ϣ ********************************
	$smtpserver = "smtp.126.com";//SMTP������
	$smtpserverport =25;//SMTP�������˿�
	$smtpusermail = "yangzhanfu111@126.com";//SMTP���������û�����
	$smtpemailto = $email;//���͸�˭
	$smtpuser = "yangzhanfu111";//SMTP���������û��ʺ�
	$smtppass = "19960109yzf";//SMTP���������û�����
	$mailtitle = $title;//�ʼ�����
	$mailcontent = "<h1>".$content."</h1>";//�ʼ�����
	$mailtype = "HTML";//�ʼ���ʽ��HTML/TXT��,TXTΪ�ı��ʼ�
	//************************ ������Ϣ ****************************
	$smtp = new smtp($smtpserver,$smtpserverport,true,$smtpuser,$smtppass);//�������һ��true�Ǳ�ʾʹ�������֤,����ʹ�������֤.
	$smtp->debug = false;//�Ƿ���ʾ���͵ĵ�����Ϣ
	$state = $smtp->sendmail($smtpemailto, $smtpusermail, $mailtitle, $mailcontent, $mailtype);		
	//mysql_query("set username,institusion utf8");
}

?>