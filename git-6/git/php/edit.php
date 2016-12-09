<?php

	echo "1";
	$file_id=$_GET['id'];
	$content=$_POST['content'];
	echo $file_id;
	$myfile = fopen("abc.txt", "w") or die("Unable to open file!");
	fwrite($myfile, "1");
	fclose($myfile);
	$conn=mysql_connect("localhost","root","123456") or die("The database connect fail");
	mysql_select_db("github");
	$exist = 0;
	$query = "SELECT file_location FROM file where file_id=$file_id";
	$result = mysql_query($query) or die("Query failed : " . mysql_error());	
	$row = mysql_fetch_array($result, MYSQL_NUM);
	$path="../user/".$row[0];
	$myfile = fopen($path, "w") or die("Unable to open file!");
	fwrite($myfile, $content);
	fclose($myfile);

?>