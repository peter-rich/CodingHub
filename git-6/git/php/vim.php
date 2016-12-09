<?php
include "editor.php";


function select_Vim($project_id,$project_name){
	$conn=mysql_connect("localhost","root","123456") or die("The database connect fail");
	mysql_select_db("github");
	$exist = 0;
	$query = "SELECT file_location,file_type FROM file where file_id=$project_id";
	$result = mysql_query($query) or die("Query failed : " . mysql_error());
	$row = mysql_fetch_array($result, MYSQL_NUM);
	if($row[1]==1){
		$content=file_get_contents("../user/".$row[0]);
	
		echo'
			<td>
				<table align="right" border="0">

						<td height="20%" colspan="1" align="right">
					<div class="login-header"><input class="content2" type="button" onClick="msgbox2';
		echo $project_id;
		echo'(1)" value="Vim"><div>
		</td></table></td>';
		echo '
		<script>  
			function msgbox2';
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
		echo '\' class="box2" ><a class=\'x\' href=\'\'; onclick="msgbox2';
		echo $project_id;
		echo '(0); return false;"><h2>X</h2></a>';   
		edit_content($content,$project_id);
		echo '<input type="hidden" name="reid"  value="';
		echo $project_id;
		echo '"/></div></form>';}
}


?>