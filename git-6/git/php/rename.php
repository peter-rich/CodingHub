<?php
function rename_file($project_id,$father_id,$project_name,$file_level,$project_introduce=NULL,$new_level=NULL){
	$conn=mysql_connect("localhost","root","123456") or die("The database connect fail");
	mysql_select_db("github");
	if($file_level==0&&$new_level==NULL){
		//先检查,否存在类似名字的.
		$exist=0;
		$user_id=$_SESSION['user_id'];
		$query = "SELECT project_name FROM project where user_id=$user_id and project_id!=$project_id";
		$result = mysql_query($query) or die("Query failed : " . mysql_error());
		while($row=mysql_fetch_array($result, MYSQL_NUM)){
			if($row[0] == $project_name){
				$exist = 1;
				break;
			}			
		}
		if($exist==0){//root的情况,仔仔细细...
			$query = "SELECT location FROM project where project_id=$project_id";
			$result = mysql_query($query) or die("Query failed : " . mysql_error());
			$row=mysql_fetch_array($result, MYSQL_NUM);
			$old_location=$row[0];
			
			//echo "explode:";
			//echo $father_id;
			//echo "-->";
			$arr=explode("/",$old_location);

			if(isset($arr[1])&&$arr[1]!=$project_name){
				$location=$arr[0]."/".$project_name;
				$path="../user/".$location;
				rename("../user/".$old_location, $path);
				$new_level=$file_level+1;
				echo $location;
				$query = "UPDATE project SET  project_name='$project_name',project_introduce='$project_introduce',location='$location' where project_id=$project_id";
				mysql_query($query) or die("Query failed : " . mysql_error());
				$query = "SELECT child_id FROM file_relation where father_id=$project_id and if_father_item=1";
				$result = mysql_query($query) or die("Query failed : " . mysql_error());
				

				while($row=mysql_fetch_array($result, MYSQL_NUM)){
					
					rename_file($row[0],$father_id,$project_name,$file_level,NULL,$new_level);
				}
			}
		}
		else{
			echo '<script>alert("there is the same name item!");</script>';
		}
	}//normal file的情况下没我要怎么进行处理，慢慢来还是怎么样呢？
	else{
		//echo "debug1";
		if($new_level!=$file_level){//子目录的情况，文件名不需要改变...
			$query = "SELECT file_location,file_type FROM file where file_id=$project_id";
			$result = mysql_query($query) or die("Query failed : " . mysql_error());
			$row=mysql_fetch_array($result, MYSQL_NUM);
			$location=$row[0];
			$file_type=$row[1];
			
	        $arr=explode("/",$location);
			$arr[$file_level+1]=$project_name;
			$file_location=implode("/",$arr);
			echo $file_location;echo" <---> ";
			$query = "UPDATE file SET  file_location='$file_location' where file_id=$project_id";
			mysql_query($query) or die("Query failed : " . mysql_error());
			if($file_type==0){
				$query = "SELECT child_id FROM file_relation where father_id=$project_id and if_father_item=0";
				$result = mysql_query($query) or die("Query failed : " . mysql_error());
				$new_level=$new_level+1;
				while($row=mysql_fetch_array($result, MYSQL_NUM)){
					rename_file($row[0],$father_id,$project_name,$file_level,NULL,$new_level);
				}
			}
		}
		else{//要改变的是子目录的情况.....
			//先检查,否存在类似名字的.
			$exist=0;
			$query = "SELECT file.file_name FROM file inner join file_relation on (file.file_id=file_relation.child_id) where file_relation.father_id=$father_id and file.file_id!=$project_id";
			$result = mysql_query($query) or die("Query failed : " . mysql_error());
			while($row=mysql_fetch_array($result, MYSQL_NUM)){
				if($row[0] == $project_name){
					$exist = 1;
					break;
				}			
			}
			if($exist==0){//root的情况,仔仔细细...
				$query = "SELECT file_location FROM file where file_id=$project_id";
				$result = mysql_query($query) or die("Query failed : " . mysql_error());
				$row=mysql_fetch_array($result, MYSQL_NUM);
				$old_location=$row[0];
			
				//echo "explode:";
				//echo $father_id;
				//echo "-->";
				$arr=explode("/",$location);
			
				if($arr[$file_level+1]!=$project_name){
					$new_level=$file_level+1;
					$arr[$new_level]=$project_name;
					$location=implode("/",$arr);
					$path="../user/".$location;
					rename("../user/".$old_location, $path);
					echo $location;echo"--->>>";
					$query = "UPDATE file SET  file_name='$project_name',file_location='$location' where file_id=$project_id";
					mysql_query($query) or die("Query failed : " . mysql_error());
					$query = "SELECT child_id FROM file_relation where father_id=$project_id and if_father_item=0";
					$result = mysql_query($query) or die("Query failed : " . mysql_error());
					while($row=mysql_fetch_array($result, MYSQL_NUM)){
						rename_file($row[0],$father_id,$project_name,$file_level,NULL,$new_level);
					}
				}
			}
			else{
				echo '<script>alert("there is the same name file!");</script>';
			}
		}
	}
}

function select_Rename($project_id,$project_name,$project_introduce){
	//echo"id:";
	//echo $project_id;
	echo'
	<td>
<table align="right" border="0">

						<td height="20%" colspan="1" align="right">
	<div class="login-header"><input class="content2" type="button" onClick="msgbox';
	echo $project_id;
	echo'(1)" value="Rename"><div>
</td></table></td>';
	echo '
    <script>  
        function msgbox';
	echo $project_id;
	echo'(n){
            document.getElementById(\'';
	echo $project_id;
	echo'\').style.display=n?\'block\':\'none\';     /* 点击按钮打开/关闭 对话框 */
        }
     </script>  
     <form name="frm" method="post" action = "file.php" >
     <div id=\'';
	 echo $project_id;
	 echo '\' class="box" ><a class=\'x\' href=\'\'; onclick="msgbox';
	 echo $project_id;
	 echo '(0); return false;"><h2>X</h2></a><h2 align="center"><span>Rename</span></h2>';   
	 echo '<input type="hidden" name="reid" value="';
	 echo $project_id;
	 echo '"/>
        <label>&nbsp;NewName</label><input type="text" name="rename" value="';
	 echo $project_name;
	 echo '">';
	 if($_SESSION['file_level']==0){
	 echo '
        <label>&nbsp;Introduce</label><input type="text" name="reintroduce" value="';
	 echo $project_introduce;
	 echo '">';
	 }
	 echo '	<input align="right" type="submit" value="submit">
	 </div></form>';
}
?>