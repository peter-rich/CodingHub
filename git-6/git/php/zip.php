<?php


function httpcopy($url,$filename,$timeout=60,$file=NULL) {
	
	header('content-disposition:attachment;filename='. basename($filename));
	header('content-length:'. filesize($filename)); 
	readfile($filename);
	
}

function addFileToZip($path, $zip , $name) {
	$handler = opendir($path); //�򿪵�ǰ�ļ�����$pathָ����
	echo $handler;
	/*
	ѭ���Ķ�ȡ�ļ����µ������ļ����ļ���
	����$filename = readdir($handler)��ÿ��ѭ����ʱ�򽫶�ȡ���ļ�����ֵ��$filename��
	Ϊ�˲�������ѭ�������Ի�Ҫ��$filename !== false��
	һ��Ҫ��!==����Ϊ���ĳ���ļ��������'0'������ĳЩ��ϵͳ��Ϊ�Ǵ���false����!=�ͻ�ֹͣѭ��
	*/
	while (($filename = readdir($handler)) !== false) {
		if ($filename != "." && $filename != ".."){//�ļ����ļ�����Ϊ'.'�͡�..������Ҫ�����ǽ��в���
			if (is_dir($path . "/" . $filename)) {// �����ȡ��ĳ���������ļ��У���ݹ�
				addFileToZip($path . "/" . $filename, $zip, $filename);
			} else { //���ļ�����zip����
				//$name=$name."/".$filename;
				$zip->addFile($path . "/" . $filename);
			}
		}
	}
	@closedir($path);
}

function download_zip($download){
	$project_id=$_GET['act'];
	$conn=mysql_connect("localhost","root","123456") or die("The database connect fail");
	mysql_select_db("github");
	$exist = 0;
	//��������û���ص�project�ҳ���,��Ϊ�Ǹ�Ŀ¼.
	$query = "SELECT location FROM project where project_id=$project_id";
	$result = mysql_query($query) or die("Query failed : " . mysql_error());
	$row = mysql_fetch_array($result, MYSQL_NUM);
	$download=$row[0];
	echo "----";
	$zip = new ZipArchive(); 
	$arr=explode("/", $download);
	$name=$arr[count($arr)-1];
	echo $name;
	echo $download;
	if ($zip->open($name.'.zip', ZipArchive::OVERWRITE) === TRUE) { 
		addFileToZip('../user/'.$download, $zip , $name); //���÷�������Ҫ����ĸ�Ŀ¼���в���������ZipArchive�Ķ��󴫵ݸ����� 
		$zip->close(); //�رմ����zip�ļ� 
	}
	httpcopy("localhost/git/user/".$download.".zip",$name.'.zip');
	delfile($name.".zip");
}
?>