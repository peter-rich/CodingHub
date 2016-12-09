<?php
function upload_file($new_file_name,$new_file_type,$new_file_size,$new_file_position){
	$now=date('Y-m-d H:i:s');
	$father_id=$_SESSION["id"];
	$file_level=$_SESSION["file_level"];
	$conn=mysql_connect("localhost","root","123456") or die("The database connect fail");
	mysql_select_db("github");
	
	switch($new_file_type){
		case "txt":$new_file_type=1;break;
		case "pdf":$new_file_type=2;break;
		case "jpg":$new_file_type=3;break;
		case "py":$new_file_type=4;break;
		case "c":$new_file_type=5;break;
		case "h":$new_file_type=5;break;
		case "png":$new_file_type=6;break;
		default:$new_file_type=-1;//other type
	}
	$path=$_SESSION["path"].$new_file_name;
	
	$query = "insert into file(file_name,file_type,file_time,file_location)values('{$new_file_name}','{$new_file_type}','{$now}','{$path}')";
	mysql_query($query) or die("Query failed : " . mysql_error());
	$nid=mysql_insert_id ();
	$if_project=0;
	if($file_level==1){
		$if_project=1;
	}
    $query = "insert into file_relation(child_id,father_id,if_father_item)values('{$nid}','{$father_id}','{$if_project}')";
	mysql_query($query) or die("Query failed : " . mysql_error());
}

// 允许上传的图片后缀
//echo "1";
function upload(){
	$path=$_SESSION["path"];
	$path="../user/".$path;
	// 允许上传的图片后缀
	$allowedExts = array("gif", "jpeg", "jpg", "png","pdf","txt","c","py","h","zip");
	$temp = explode(".", $_FILES["file"]["name"]);
	//echo $_FILES["file"]["type"];
	$extension = end($temp);     // 获取文件后缀名
	if ((($_FILES["file"]["type"] == "image/gif")
	|| ($_FILES["file"]["type"] == "image/jpeg")
	|| ($_FILES["file"]["type"] == "image/jpg")
	|| ($_FILES["file"]["type"] == "application/pdf")//txt
	|| ($_FILES["file"]["type"] == "text/plain")
	|| ($_FILES["file"]["type"] == "image/pjpeg")
	|| ($_FILES["file"]["type"] == "application/x-zip-compressed")
	|| ($_FILES["file"]["type"] == "image/x-png")
	|| ($_FILES["file"]["type"] == "image/png"))
	&& ($_FILES["file"]["size"] < 2048000)   // 小于 2000 kb
	&& in_array($extension, $allowedExts))
	{

		if ($_FILES["file"]["error"] > 0)
		{
			echo "<script>alert('";
			echo "error:" . $_FILES["file"]["error"] . "<br>";
			echo "')</script>";
		}
		else
		{
			$new_file_name=$_FILES["file"]["name"];
			$new_file_type=$extension;
			$new_file_size=$_FILES["file"]["size"];
			$new_file_position=$_FILES["file"]["tmp_name"];		

			// 判断当期目录下的 upload 目录是否存在该文件
			// 如果没有 upload 目录，你需要创建它，upload 目录权限为 777

			if (file_exists($path . "/" . $_FILES["file"]["name"]))
			{
				echo "<script>alert('";
				echo $_FILES["file"]["name"] . "The file is exist:";
				echo "')</script>";
			}
			else
			{
				//如果 upload 目录不存在该文件则将文件上传到 upload 目录下
				move_uploaded_file($_FILES["file"]["tmp_name"], $path . "/" . $_FILES["file"]["name"]);
				upload_file($new_file_name,$new_file_type,$new_file_size,$new_file_position);
				echo "<script>alert('";
				echo "The file name:" . $_FILES["file"]["name"] . "\n";
				echo "The file style:" . $_FILES["file"]["type"] . "\n";
				echo "The file size" . ($_FILES["file"]["size"] / 1024) . " kB\n";
				echo "The file position:" . $_FILES["file"]["tmp_name"] . "\n";	
				echo "The file is storage in:" . $path."/". $_FILES["file"]["name"];
				echo "')</script>";
			}
			

	
		}
	}
	else	
	{
		echo "<script>alert('";
		echo "Not a correct style";
		echo "')</script>";
	}
	
}
?>