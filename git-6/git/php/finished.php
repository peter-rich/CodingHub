<?php

include 'background.php';
include 'rename.php';
include 'vim.php';
//<------------------------------------>
//	List
//<------------------------------------>
function List_head($project_id,$project_name,$time,$father_id,$file_level,$project_introduce,$if_public,$section,$download,$user_name=NULL){
	//echo $user_name;
	$left_right=' class="timeline-inverted" ';
	$color=NULL;
	switch($section){
		case 0:$color='timeline-badge';
		break;
		case 1:$color='timeline-badge warning';
		break;
		case 2:$color='timeline-badge danger';
		break;
		case 3:$color='timeline-badge info';
		break;
		case 4:$color='timeline-badge timeline-badge success';
		break;
	}
	echo'<li ';
	if($section%2==1){
		echo $left_right;
	}
	echo'>
         <div class="';
	echo $color;
	echo'">
          </div>
                <div class="timeline-panel">
                      <div class="timeline-heading">
                            <a href="file.php?act=';
	echo $project_id;
	echo '"><h4 class="timeline-title">';
	echo $project_name;
	echo '
							</h4></a>
                                  <p><small class="text-muted"><i class="fa fa-clock-o"></i>';
	echo $time; 
	echo '</small>&nbsp;&nbsp;&nbsp;<font color="blue">';
	echo $user_name;
	if(isset($_SESSION['search_type'])&&$_SESSION['search_type']==1){
		echo '</font>&nbsp;&nbsp;&nbsp<a href="checklog.php?download=';
	}
	else{
		echo '</font>&nbsp;&nbsp;&nbsp<a href="search.php?download=';
	}
	echo $download;
	echo '&&act=';
	echo $project_id;
	echo '">Download';
	echo '</a>
	</p>
                      </div>
                <div class="timeline-body">
                       <p>';
	echo $project_introduce;
	echo '.</p>
                </div>
          </div>
	  </li>';
}

function main_New($user_id){
	main_File_up();
	main_section("ADD New Project");
	echo '
						<!--section start-->
						<form name="frm" method="post" action = "file.php">
						<tr>
							<br>
							</br>
							<td>

                                    <td  height="36" align="right"><FONT face=微软雅黑  size=4 style="font-weight:bold;font-style:italic;">Project Name</FONT><FONT face=微软雅黑  size=4 color=white>U</FONT></td>
									<table width="60%" border="0" align="right">
										<td  width="20%" align="right"><input type="text" class="form-control" name="project_name"  /></td>
									</table>
								
								

							</td>
							<br>
							</br>
							<br>
							</br>
							<td>
								
									
									<td  height="36" align="right"><FONT face=微软雅黑  size=4 style="font-weight:bold;font-style:italic;">Description </FONT><FONT face=微软雅黑  size=4 color=white>U</FONT></td>
									<table width="60%" border="0" align="right">
										<td  width="20%" align="right"><input type="text" class="form-control" name="description"  /></td>
									</table>
                                
							</td>
							<br></br><br></br>
							<td>
								
									
									<td  height="36" align="right"><FONT face=微软雅黑  size=4 style="font-weight:bold;font-style:italic;">Public/Private </FONT><FONT face=微软雅黑  size=4 color=white>UUUUUUUUUUUUUUUUUUUUUUUUUUUUUU</FONT>
									</td>
									
											<div class="button-holder" align="center">
												<FONT face=微软雅黑  size=4 color=white>UUUUUU</FONT>
												<Li><input  align="center" type="radio"  name="if_public" value="0" data-labelauty="Private" checked/></Li>
												<Li><input  align="center" type="radio"  name="if_public" value="1" data-labelauty="Public"/></Li>
											</div>	
									
							</td>
							<br><br></br></br>
							<td height="37" colspan="2" align="right">
								<input class = "content2" type="submit" name="sub" value="ADD" />		  
							</td>
						</tr>
						</form>
						<br><br>
						<!--section end-->
						';
	main_File_down();
}



function submit_input($input,$file_level=0,$father_id=0,$project_id=NULL,$project_name=NULL,$project_introduce=NULL){

			echo '<form name="frm" method="post" action = "file.php" ><td>';
			echo '<input class = "content2" type="hidden" name="file_id" value="';
			echo $project_id;
			echo '" />';
			echo '<input class = "content2" type="hidden" name="file_level" value="';
			if($input==1){
				$file_level=$file_level+1;echo ($file_level);
			}
			elseif($input==4){
				$file_level=$file_level-1;echo ($file_level);
			}
			else{
				echo $file_level;
			}
			echo '" />';
			echo '<input class = "content2" type="hidden" name="father_id" value="';
			echo $father_id;
			echo '" />';
			echo '	<table align="right" border="0">
						<td height="20%" colspan="1" align="right">
							<input class = "content2" type="hidden" name="select" value="';
			echo $input;
			echo'" />';

			if($input==1)echo '<input class = "content2" type="submit" name="sub" value="GoIn"/>';		
			elseif($input==3)echo '<input class = "content2" type="submit" name="sub" value="Delete"/>';
			elseif($input==4)echo '<input class = "content2" type="submit" name="sub" value="Back"/>';
			elseif($input==5)echo '<input class = "content2" type="submit" name="sub" value="CreatFolder"/>';
			//elseif($input==6)echo '<input class = "content2" type="submit" name="sub" value="Vim"/>';
			echo' </td>
					</table></td>
				</form>';

			if($input==2){
				select_Rename($project_id,$project_name,$project_introduce);
				//echo '<input class = "content2" type="submit" name="sub" value="Rename"/>';
			}
			elseif($input==6){
				select_Vim($project_id,$project_name);
			}
}

function table_input($file_type,$project_id,$project_name,$time,$father_id,$file_level=0,$project_introduce=NULL,$if_public=2){
			echo '<table width="100%" height="13%" align="left" bordercolor=skyblue border="0"><td>';
			echo '<table width="45%" height="13%" border="0" align="left"><td><font size=6 style="position:relative; left:2%;">';
			echo $project_name;
			echo '</font><font class="text-muted" style="position:relative; left:5%;"><i class="fa fa-clock-o"></i>';
			echo $time;
			echo '</font>';
			echo '<p>';
			echo '<font size=3 style="position:relative;left:5%;word-break:break-all;">';
			echo $project_introduce;
			echo '</font></p></td></table>';
			
			echo '<table width="50%" height="13%" border="0" align="right"><td>';
			if($file_level==0){
				if($if_public){
					echo '<p><td align="right"><font color="blue" style="position:relative;left:4%;">Publicity</font></td></p>';
				}
				elseif($if_public==0){
					echo '<p><td align="right"><font color="red" style="position:relative;left:4%;">Privately</font></td></p>';
				}
			}
			elseif($file_type!=0){
				$color;$type;
				switch($file_type){
					case 1:$type="txt";$color="black";break;
					case 2:$type="pdf";$color="skyblue";break;
					case 3:$type="jpg";$color="green";break;
					case 4:$type="py";$color="blue";break;
					case 5:$type="c/c++/h";$color="red";break;
					case 6:$type="png";$color="yellow";break;
					default:$type="other";$color="grey";//other type
				}
				echo'<p><td align="right"><font color="';
				echo $color;
				echo'" style="position:relative;left:4%;">';
				echo $type;
				echo'</font></td></p>';
			}
			if($file_type==0){
				submit_input("1",$file_level,$father_id,$project_id);
				if(isset($_SESSION['search_type'])&&$_SESSION['search_type']==1){
					submit_input("2",$file_level,$father_id,$project_id,$project_name,$project_introduce);
				
					submit_input("3",$file_level,$father_id,$project_id);
				}
			}
			else{
				submit_input("6",$file_level,$father_id,$project_id);
				if(isset($_SESSION['search_type'])&&$_SESSION['search_type']==1){
					submit_input("3",$file_level,$father_id,$project_id);
				}
			}
			
			echo '</td></table>';
			echo '</td></table>';
			
}

function project_head($project_id,$father_id,$file_level){
	echo '<table width="100%" height="7%" align="left" bordercolor=skyblue border="0"><td>
	<table width="15%" height="7%" border="0" align="left"><td>';

	submit_input("4",$file_level,$father_id,$project_id);
	echo '</td></table><table width="55%" height="7%" border="0" align="left"><td>';
	if(isset($_SESSION['search_type'])&&$_SESSION['search_type']==1){
		submit_input("5",$file_level,$father_id,$project_id);
	}
	echo '</td></table></td></table>';

}


//This function is used to create the item.
function create_item($description,$user_name,$if_public,$project_name,$user_id){
	$conn=mysql_connect("localhost","root","123456") or die("The database connect fail");
	mysql_select_db("github");
	$exist = 0;
	$project_id=NULL;
	$query = "SELECT project_name,project_id FROM project where user_id=$user_id;";
	$result = mysql_query($query) or die("Query failed : " . mysql_error());
	while ($row = mysql_fetch_array($result, MYSQL_NUM)) { 
		if($row[0] == $project_name){
			$exist = 1;
			$project_id=$row[1];
			break;
		}
	}
	if($exist==0){
		
		$now=date('Y-m-d H:i:s');
		$path=$user_name."/".$project_name;
		$query = "insert into project(project_name,project_introduce,if_public,user_id,initial_time,last_time,location)
		values('{$project_name}','{$description}','{$if_public}','{$user_id}','{$now}','{$now}','{$path}')";
		mysql_query($query) or die("Query failed : " . mysql_error());
		$_SESSION['id']=mysql_insert_id ();
		$_SESSION['file_level']=1;
		//合作关系上加上一个用户.
		$_SESSION['father_id']=mysql_insert_id ();
		$query = "insert into cooperate(project_id,user_id,project_time)values('{$_SESSION['id']}','{$user_id}','{$now}')";
		mysql_query($query) or die("Query failed : " . mysql_error());
		$path="../user/".$path;
		//仅创建新的item目录(实际创建)
		createFolder($path);
		//将item/root/内部展示出来
	}
	else{
		echo'<Script>alert("The project have been existed!");</Script>';
		$_SESSION['id']=$project_id;
		$_SESSION['file_level']=0;
	}
}

function about_test(){
	echo'<table width="60%" length="60%" align="left" bordercolor=skyblue border="0"><td>
		<div data-animation-effect="fadeIn">		
			<div class="container">
				<div class="row">
					<div class="col-md-10">
						<h1 id="about" class="title text-center">About <span>CodingHub</span></h1>
						<p class="lead text-center">CodingHub is a free platform aim to those programer,coder and learner who feel like coding.</p>
						<div class="space"></div>
						<div class="row">
							<div class="col-md-4">
							<br></br>
								<img src="images/section-image-1.png" alt="">
								<div class="space"></div>
							</div>
							<div class="col-md-8">
							    <Br></br>
								<p>The author is Zhanfu Yang, Haonan Zhang and Haieng Huang</p>
								<p>Here is the tips you may need to know:</p>
								<ul class="list-unstyled">
								    <li></li>
									<li><i class="fa fa-caret-right pr-10 text-colored"></i> First: you need to sign a account so as to log in</li>
									<li><i class="fa fa-caret-right pr-10 text-colored"></i> Second: Help yourself when you use our platform</li>
									<li><i class="fa fa-caret-right pr-10 text-colored"></i> Third: This is the simple one which have limits function</li>
								</ul>
							</div>
						</div>
						<div class="space"></div>
					</div>
				</div>
			</div>
		</div>
		</td></table>
		<br><br>
	';
	echo'
		<div class="col-md-12">
						<h1 id="about" class="title text-center">PDF <span>Reader</span></h1>
						<p >You can use the pdf Reader use the following reader...By input your pdf or so on...</p>
		</div>
	';
	echo'';
	echo'
	<table width="100%" height="10%" align="left" bordercolor=skyblue border="0"><td>
	    <div style="width:100%; height:100%; border:none; overflow:hidden;>
            
            <form enctype="multipart/form-data">

                <div class="form-group">
                    <td><input id="file-5" class="file" type="file" multiple data-preview-file-type="any" data-upload-url="#" data-allowed-file-extensions=\'["pdf", "csv","txt"]\'></td>
                </div>
            </form> 
			
            <br>
        </div>
	</td></table>
	';
}

//finished->add_file...
function add_file($project_id,$father_id,$file_level){//
	echo'
	<table width="100%" height="80%" align="left" bordercolor=skyblue border="0"><td>
	<form action="file.php" method="post" enctype="multipart/form-data">
	<input id="file" name="file" type="file" class="file" data-allowed-file-extensions=\'["csv", "txt","jpg","png","pdf","c","h","py","zip"]\'>

	</form>
	</td></table>
	<script>
	$(document).on(\'ready\', function() {
		$("#file").fileinput({
			maxFilePreviewSize: 10240
		
		});
	});
	</script>

	';
}
?>