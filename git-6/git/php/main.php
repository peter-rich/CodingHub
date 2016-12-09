<?php
include 'fun.php';
include 'finished.php';
include 'upload_file.php';
include 'zip.php';

function List_function($user_id){
	$father_id=$_SESSION['user_id'];
	$_SESSION['file_level']=0;
	$conn=mysql_connect("localhost","root","123456") or die("The database connect fail");
	mysql_select_db("github");
	$exist = 0;
	//所有与该用户相关的project找出来,因为是根目录.
	$query = "SELECT project.project_name,project.project_introduce,project.if_public,project.initial_time,project.last_time,project.project_id,project.user_id,project.location 
	FROM project inner join cooperate on (project.project_id=cooperate.project_id) where cooperate.user_id=$father_id ORDER BY project.last_time";
	$result = mysql_query($query) or die("Query failed : " . mysql_error());
	echo'<ul class="timeline">';	
	$section=-1;
	
	while ($row = mysql_fetch_array($result, MYSQL_NUM)) { 
		$download=$row[7];
		$section=$section+1;
		$project_name=$row[0];
		$project_introduce=$row[1];
		$if_public=$row[2];
		$initial_time=$row[3];
		$last_time=$row[4];
		$project_id=$row[5];
		$father_id=$row[6];
		$time=time_elapsed_string($last_time);
		$file_level=0;
		
		List_head($project_id,$project_name,$time,$father_id,$file_level,$project_introduce,$if_public,$section%5,$download);
	}
	echo '</ul>';
}

function main_List($user_id){
	$_SESSION['search_type']=1;
	main_File_up();
	main_section("TimeList");
	List_function($user_id);
	main_File_down();
	
}

function delete_normal_file($file_id,$file_level){//删除不包本含根目录以下的数据库内的文件/文件夹...(实文件已删除...)
	$if_project=0;
	if($file_level==1){
		$if_project=1;
	}
	$query = "SELECT child_id FROM file_relation WHERE father_id=$file_id and if_father_item=$if_project";
	$result=mysql_query($query) or die("Query failed : " . mysql_error());
	while($row = mysql_fetch_array($result, MYSQL_NUM)){		
		$this_id=$row[0];
		$this_level=$file_level+1;
		$query = "DELETE FROM file WHERE $this_id=file_id";
		mysql_query($query) or die("Query failed : " . mysql_error());
		delete_normal_file($this_id,$this_level);
		
	}
	$query = "DELETE FROM file_relation WHERE father_id=$file_id and if_father_item=$if_project";
	mysql_query($query) or die("Query failed : " . mysql_error());
}

function delete_file($file_id,$file_level,$father_id){
	echo $file_id;echo $father_id;echo $file_level;
	if($file_level==0){
		//删除project的情况...同时删除project下面的所有文件...
		$conn=mysql_connect("localhost","root","123456") or die("The database connect fail");
		mysql_select_db("github");
		$query = "SELECT location FROM project WHERE project_id=$file_id";
		$result=mysql_query($query) or die("Query failed : " . mysql_error());
		$row = mysql_fetch_array($result, MYSQL_NUM);
		$path=$row[0];
		$path="../user/".$path;
		delfile($path);
		echo "a";
		$query = "DELETE FROM cooperate WHERE project_id=$file_id";
		mysql_query($query) or die("Query failed : " . mysql_error());
		$query = "DELETE FROM project WHERE project_id=$file_id";	
		mysql_query($query) or die("Query failed : " . mysql_error());
		$file_level=$file_level+1;
		delete_normal_file($file_id,$file_level);
		
	}elseif($file_level==1){
		$conn=mysql_connect("localhost","root","123456") or die("The database connect fail");
		mysql_select_db("github");
		$query = "SELECT file_location,file_type FROM file WHERE file_id=$file_id";
		$result=mysql_query($query) or die("Query failed : " . mysql_error());
		$row = mysql_fetch_array($result, MYSQL_NUM);
		$path=$row[0];
		$type=$row[1];
		$path="../user/".$path;
		echo "<p>test->one</p><br>";
		echo $path;
		delfile($path);
		$query = "DELETE FROM file_relation WHERE child_id=$file_id and if_father_item=1";
		mysql_query($query) or die("Query failed : " . mysql_error());
		$query = "DELETE FROM file WHERE file_id=$file_id";	
		mysql_query($query) or die("Query failed : " . mysql_error());
		if($type==0){
			$file_level=$file_level+1;
			delete_normal_file($file_id,$file_level);
		}		
	}
	else{
		//删除其他文件的情况...若为文件夹，同时删除其下的子文件...
		$conn=mysql_connect("localhost","root","123456") or die("The database connect fail");
		mysql_select_db("github");
		$query = "SELECT file_location,file_type FROM file WHERE file_id=$file_id";
		$result=mysql_query($query) or die("Query failed : " . mysql_error());
		$row = mysql_fetch_array($result, MYSQL_NUM);	
		$path = $row[0];
		$path="../user/".$path;
		delfile($path);
		
		$query = "DELETE FROM file WHERE file_id=$file_id";
		mysql_query($query) or die("Query failed : " . mysql_error());
		$query = "DELETE FROM file_relation WHERE child_id=$file_id";
		mysql_query($query) or die("Query failed : " . mysql_error());
		if($row[1]==0){
			delete_normal_file($file_id,$file_level+1);
		}
	}
}
function create_file($father_id,$file_level){
	$father_id_id=$father_id;
	$exist = 1;
	$file_id=NULL;
	$query = "SELECT file.file_name,file.file_id FROM file inner join file_relation on(file.file_id=file_relation.child_id) where file_relation.father_id=$father_id;";
	$result = mysql_query($query) or die("Query failed : " . mysql_error());
	$num=0;
	$if_father;
	$path=NULL;
	while($exist==1){
		$num=$num+1;
		$path="newFolder".$num;
		$exist=0;
		$result = mysql_query($query) or die("Query failed : " . mysql_error());
		while ($row = mysql_fetch_array($result, MYSQL_NUM)) { 
			if($row[0] == $path){
				$exist = 1;
				$file_id=$row[1];
				break;
			}
		}
	}
	$file_real_name=$path;
	$file_level_1=$file_level;
	if($file_level==1){
		$project_id=$_SESSION['id'];
		$query = "SELECT project_name,project_id,location FROM project where project_id=$project_id;";
		$result = mysql_query($query) or die("Query failed : " . mysql_error());
		$row=mysql_fetch_array($result, MYSQL_NUM);
	}
	else{
		$project_id=$_SESSION['id'];
		$query = "SELECT file_name,file_id,file_location FROM file where file_id=$project_id;";
		$result = mysql_query($query) or die("Query failed : " . mysql_error());
		$row=mysql_fetch_array($result, MYSQL_NUM);
	}
	
	$path=$row[2]."/".$path;
	$now=date('Y-m-d H:i:s');
	$query = "insert into file(file_name,file_type,file_time,file_location)values('{$file_real_name}','0','{$now}','{$path}')";
	mysql_query($query) or die("Query failed : " . mysql_error());
	$nid=mysql_insert_id ();
	//合作关系上加上一个用户.
	$stype=0;
	if($file_level==1){
		$stype=1;
	}
	$query = "insert into file_relation(child_id,father_id,if_father_item)values('{$nid}','{$father_id_id}','{$stype}')";
	mysql_query($query) or die("Query failed : " . mysql_error());
	
	$path="../user/".$path;
	echo $path;
	//仅创建新的item目录(实际创建)
	createFolder($path);
	//将item/root/内部展示出来
}
function show_file(){
			$father_id=$_SESSION['id'];
			echo "this id:";
			echo $father_id;
			$file_level=$_SESSION['file_level'];
			echo "file_level:";
			echo $file_level;
			$query;
			if($file_level==1){
				$if_project=1;
				$query = "SELECT file.file_id,file.file_name,file.file_type,file.file_time,file_relation.if_father_item 
				FROM file inner join file_relation on (file.file_id=file_relation.child_id) where file_relation.father_id=$father_id and file_relation.if_father_item=$if_project";
			}
			else{
				$if_project=0;
				$query = "SELECT file.file_id,file.file_name,file.file_type,file.file_time,file_relation.if_father_item 
				FROM file inner join file_relation on (file.file_id=file_relation.child_id) where file_relation.father_id=$father_id and file_relation.if_father_item=$if_project";
			}
			$result = mysql_query($query) or die("Query failed : " . mysql_error());
			project_head($_SESSION['id'],$father_id,$file_level);
			while ($row = mysql_fetch_array($result, MYSQL_NUM)) { 
			
				$project_name=$row[1];
				$last_time=$row[3];
				$project_id=$row[0];
				$file_type=$row[2];
				$time=time_elapsed_string($last_time);
				table_input($file_type,$project_id,$project_name,$time,$father_id,$file_level);
				
			}
			add_file($_SESSION['id'],$father_id,$file_level);
}
//此处需要修改...
//对于一般文件,假如type为0则是Folder目录文件,假如1->txt文件,2->bash文件,3->c/c++,4->...
function project_List(){
		
		$conn=mysql_connect("localhost","root","123456") or die("The database connect fail");
		mysql_select_db("github");
		
		echo "Project...";
		echo $_SESSION['id'];
		$father_id=$_SESSION['id'];
		if(isset($_POST['select'])){
			$select=$_SESSION['select'];
			$file_level=$_SESSION['file_level'];
			$conn=mysql_connect("localhost","root","123456") or die("The database connect fail");
			mysql_select_db("github");
			if($select==5){
				create_file($father_id,$file_level);
			}
			elseif($select==3){
				delete_file($_POST['file_id'],$_POST['file_level'],$_SESSION['father_id']);
			}

			//所有与该用户相关的file找出来,因为是project目录.
			//echo "Project_list continue";
			if($select==4){
				if($file_level>=1){
					$query = "SELECT father_id,if_father_item FROM file_relation WHERE child_id=$father_id";
					$result = mysql_query($query) or die("Query failed : " . mysql_error());
					$row = mysql_fetch_array($result, MYSQL_NUM);
					$child_id=$row[0];
					$if_father_item=$row[1];
					
					$query = "SELECT file.file_id,file.file_name,file.file_type,file.file_time,file_relation.if_father_item
					FROM file inner join file_relation on (file.file_id=file_relation.child_id) 
					where file_relation.father_id=$child_id and file_relation.if_father_item=$if_father_item";
					$result = mysql_query($query) or die("Query failed : " . mysql_error());
					
					project_head($_SESSION['id'],$father_id,$file_level);
					while ($row = mysql_fetch_array($result, MYSQL_NUM)) { 
						$project_name=$row[1];
						$last_time=$row[3];
						$project_id=$row[0];
						$file_type=$row[2];
						$time=time_elapsed_string($last_time);
						if($file_level==1){
							if($row[4]==1){
								table_input($file_type,$project_id,$project_name,$time,$father_id,$file_level);
							}
						}
						else{
							if($row[4]==0){
								table_input($file_type,$project_id,$project_name,$time,$father_id,$file_level);
							}
						}
					}
					add_file($_SESSION['id'],$father_id,$file_level);
				}			
			}//father非project的情况...	
			else{
				echo "in the show file...";
				show_file();
			}
		}
		else{//father为project的情况...
		
			show_file();
		}
}

function root_List(){
		$_SESSION['search_type']=1;
		echo "Root";
		if(isset($_SESSION["select"])&&$_SESSION["select"]==3){
			delete_file($_POST['file_id'],0,$_SESSION['father_id']);
		}
		$father_id=$_SESSION['user_id'];
		$_SESSION['file_level']=0;
		$conn=mysql_connect("localhost","root","123456") or die("The database connect fail");
		mysql_select_db("github");
		$exist = 0;
		//所有与该用户相关的project找出来,因为是根目录.
		$query = "SELECT project.project_name,project.project_introduce,project.if_public,project.initial_time,project.last_time,project.project_id,project.user_id 
		FROM project inner join cooperate on (project.project_id=cooperate.project_id) where cooperate.user_id=$father_id";
		$result = mysql_query($query) or die("Query failed : " . mysql_error());
		
		while ($row = mysql_fetch_array($result, MYSQL_NUM)) { 
			
			$project_name=$row[0];
			$project_introduce=$row[1];
			$if_public=$row[2];
			$initial_time=$row[3];
			$last_time=$row[4];
			$project_id=$row[5];
			$father_id=$row[6];
			$time=time_elapsed_string($last_time);
			$file_level=0;
			$file_type=0;
			table_input($file_type,$project_id,$project_name,$time,$father_id,$file_level,$project_introduce,$if_public);

		}
}

function find_path(){
	$father_id=$_SESSION["id"];
	$file_level=$_SESSION["file_level"];
	$conn=mysql_connect("localhost","root","123456") or die("The database connect fail");
	mysql_select_db("github");
	if($file_level==1){
	$query = "SELECT project_name,project_id,location FROM project where project_id=$father_id";
	$result = mysql_query($query) or die("Query failed : " . mysql_error());
	$row=mysql_fetch_array($result, MYSQL_NUM);
	}
	else{
	$query = "SELECT file_name,file_id,file_location FROM file where file_id=$father_id";
	$result = mysql_query($query) or die("Query failed : " . mysql_error());
	$row=mysql_fetch_array($result, MYSQL_NUM);		
	}
	$path=$row[2]."/";
	$_SESSION["path"]=$path;
	echo $path;
}

//if root, type is 0, project is 1, other is 2;
//可能还要提供下载zip的功能，以方便我们进行下载zip进行相关的代码学习和阅读...
function List_project(){
	$id;
	if(isset($_POST['rename'])){
		$reintroduce=NULL;
		if(isset($_POST['reintroduce'])){
			$reintroduce=$_POST['reintroduce'];
		}
		rename_file($_POST['reid'],$_SESSION['id'],$_POST['rename'],$_SESSION['file_level'],$reintroduce);
	}
	//echo $_GET['act'];
	//echo "<script>alert('1');</script>";
	if(isset($_POST['select'])){
		$select = $_POST['select'];
		$_SESSION['select']=$select;
		if($select!=3){
			$_SESSION['id']=$_POST['file_id'];
		}
		$_SESSION['file_level']=$_POST['file_level'];
		$_SESSION['father_id']=$_POST['father_id'];
	}elseif(isset($_GET['act'])){
		//echo "1";
		$_SESSION['file_level']=1;
		$_SESSION['id']=$_GET['act'];
		$_SESSION['select']=0;
	}
	elseif(isset($_FILES["file"]["name"])){
		find_path();
		upload();
		
	}
	
	//假如有id这个东西，说明我们需要打印出该目录的id值.假如没有，我们就需要进行根目录的打印.
	if(isset($_SESSION['id'])&&isset($_SESSION['file_level'])&&$_SESSION['file_level']>=1){
		
		$file_id=$_SESSION['id'];
		$file_level=$_SESSION['file_level'];//这个filk_type指的是文件的层数
		//假如是普通文件，我们需要进行检查，假如是非目录文件，我们需要打开...
		//if($file_level==2){
			//1.有了这个id我要检查文件类型访问数据库
			//2.假如是普通文件夹,同理.else,先简单打印出来.
		//	project_List();
		//}
		//else{//Project类型就进行正常访问.
		//echo "<<<<<<<<>>>>>>>";
		project_List();
		//}
	}
	else{//一般情况下是这个
		//而且根目录无法后退因为本目录已经是最后一个目录了.
		//echo ">>>>>><<<<<";
		root_List();
	}
	$_SESSION['select']=0;
}

function main_About($user_id){
	main_File_up();
	main_section("About us");
	about_test();
	main_File_down();
}

function main_File(){
	main_File_up();
	main_section("Files");
	List_project();
	main_File_down();
}
//搜索引擎部分把它的功能限制在search里面可能比较好？
function search_function($user_id){
	$_SESSION['search_type']=0;
	$search=NULL;
	if(isset($_GET['download'])){
		if(isset($_POST['search-content'])){
			$search=$_POST['search-content'];
		}
	}
	else{
		if(isset($_POST['search-content'])){
			$search=$_POST['search-content'];
		}
	}

	$father_id=$_SESSION['user_id'];
	$_SESSION['file_level']=0;
	$conn=mysql_connect("localhost","root","123456") or die("The database connect fail");
	mysql_select_db("github");
	$exist = 0;
	//所有与该用户相关的project找出来,因为是根目录.
	$query = "SELECT project_name,project_introduce,if_public,initial_time,last_time,project_id,user_id ,location
	FROM project where (project.if_public=1 and 
	(project_name Like '%$search%'  or project_introduce Like '%$search%') ) ORDER BY last_time";
	$result = mysql_query($query) or die("Query failed : " . mysql_error());
	echo'<ul class="timeline">';	
	$section=-1;
	
	while ($row = mysql_fetch_array($result, MYSQL_NUM)) { 
		$section=$section+1;
		$project_name=$row[0];
		$project_introduce=$row[1];
		$if_public=$row[2];
		$initial_time=$row[3];
		$last_time=$row[4];
		$project_id=$row[5];
		$father_id=$row[6];
		$time=time_elapsed_string($last_time);
		$file_level=0;
		$query2 = "SELECT user_name FROM information where user_id=$father_id";
		$result2 = mysql_query($query2) or die("Query failed : " . mysql_error());	
		$row2 = mysql_fetch_array($result2, MYSQL_NUM);
		$user_name=$row2[0];
		$download=$row[7];
		List_head($project_id,$project_name,$time,$father_id,$file_level,$project_introduce,$if_public,$section%5,$download,$user_name);
	}
	echo '</ul>';	
}

function main_Search($user_id){
	main_File_up();
	main_section("Search Result: Only public you can search");
	search_function($user_id);
	main_File_down();
}

function main($user_id,$type,$judge=0,$user_name=NULL,$project_name=NULL,$description=NULL,$if_public=NULL){

	//操作数据库
	//for project_type->0 is C/C++, 1 is python,2 is R, 3 is bash, 4 is html/javascript/css, 5 is other.
	head();
	if($type == 1){
		main_List($user_id);
	}
	elseif($type == 2){
		main_New($user_id);
	}
	elseif($type == 3){//Files
		if($project_name!=NULL){
			create_item($description,$user_name,$if_public,$project_name,$user_id);
			main_File();
		}
		else{
			main_File();
		}
	}
	elseif($type == 5){
		main_About($user_id);
	}
	elseif($type == 6){
		main_Search($user_id);
	}
	last();
}
?>