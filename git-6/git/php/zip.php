<?php


function httpcopy($url,$filename,$timeout=60,$file=NULL) {
	
	header('content-disposition:attachment;filename='. basename($filename));
	header('content-length:'. filesize($filename)); 
	readfile($filename);
	
}

function addFileToZip($path, $zip , $name) {
	$handler = opendir($path); //打开当前文件夹由$path指定。
	echo $handler;
	/*
	循环的读取文件夹下的所有文件和文件夹
	其中$filename = readdir($handler)是每次循环的时候将读取的文件名赋值给$filename，
	为了不陷于死循环，所以还要让$filename !== false。
	一定要用!==，因为如果某个文件名如果叫'0'，或者某些被系统认为是代表false，用!=就会停止循环
	*/
	while (($filename = readdir($handler)) !== false) {
		if ($filename != "." && $filename != ".."){//文件夹文件名字为'.'和‘..’，不要对他们进行操作
			if (is_dir($path . "/" . $filename)) {// 如果读取的某个对象是文件夹，则递归
				addFileToZip($path . "/" . $filename, $zip, $filename);
			} else { //将文件加入zip对象
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
	//所有与该用户相关的project找出来,因为是根目录.
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
		addFileToZip('../user/'.$download, $zip , $name); //调用方法，对要打包的根目录进行操作，并将ZipArchive的对象传递给方法 
		$zip->close(); //关闭处理的zip文件 
	}
	httpcopy("localhost/git/user/".$download.".zip",$name.'.zip');
	delfile($name.".zip");
}
?>