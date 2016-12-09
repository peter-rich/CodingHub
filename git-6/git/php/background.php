<?php
function main_File_up(){
	echo '
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-14">
                    <h1 class="page-header">CodingHub</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->


            <!-- /.row -->
            <div class="row">
                <div class="col-lg-10">

                    <div class="panel panel-default">';
}

function main_section($section){
	echo '<div class="panel-heading">';
	//echo '<i class="fa fa-clock-o fa-fw">';
    echo '&nbsp&nbsp&nbsp&nbsp</i>';
	echo $section;
    echo '</div>';
	echo '<div class="panel-body">';
	//Add in this section
}
function notuse(){
echo'
	<!-- /.col-lg-8 -->
                <div class="col-lg-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bell fa-fw"></i> Top 10 users
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="list-group">
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-tasks fa-fw"></i> 1.peter-rich
                                    <span class="pull-right text-muted small">
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-tasks fa-fw"></i> 2.peter-peter
                                    <span class="pull-right text-muted small">
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-tasks fa-fw"></i> 3.NULL
                                    <span class="pull-right text-muted small">
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-tasks fa-fw"></i> 4.NULL
                                    <span class="pull-right text-muted small">
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-tasks fa-fw"></i> 5.NULL
                                    <span class="pull-right text-muted small">
                                    </span>
                                 <a href="#" class="list-group-item">
                                    <i class="fa fa-tasks fa-fw"></i> 6.NULL
                                    <span class="pull-right text-muted small">
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-tasks fa-fw"></i> 7.NULL
                                    <span class="pull-right text-muted small">
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-tasks fa-fw"></i> 8.NULL
                                    <span class="pull-right text-muted small">
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-tasks fa-fw"></i> 9.NULL
                                    <span class="pull-right text-muted small">
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-tasks fa-fw"></i> 10.NULL
                                    <span class="pull-right text-muted small">
                                    </span>
                                </a>
                            </div>

                        </div>
                        <!-- /.panel-body -->
                    </div>                   
                    <!-- /.panel .chat-panel -->
                </div>
                <!-- /.col-lg-4 -->';
}
function main_File_down(){
	echo'
                        <!-- /.panel-heading -->
						</div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->';
}

function head(){
	echo '
<div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">

            <!-- /.navbar-header -->
           <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
				<form name="frm" method="post" action = "search.php">
					<table width="40%" border="0" align="right">
					
						<div class="input-group custom-search-form">
							<tr>
                                
								<td width="90%" height="45" align="left"><input type="text" name="search-content" class="form-control" placeholder="Search..."></td>
								<td width="0%" height= "25" align="right"/><input type="submit" name="sub" value="submit" /></td>
									
							</tr>
						</div>
					
                    </table>
				</form>
                    <!-- /.dropdown-messages -->
			</ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">

                        <li>
                            <a href="checklog.php#">List</a>
                        </li>
						<li>
                            <a href="newproject.php">New Project</a>
                        </li>
                        <li>
                            <a href="file.php">Files</a>
                        </li>
                        <li>
                            <a href="about.php">About/PDF Reader</a>
                        </li>
                        
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>';
}

function last(){
	echo '
    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../vendor/raphael/raphael.min.js"></script>
    <script src="../vendor/morrisjs/morris.min.js"></script>
    <script src="../data/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>';
}
function information($user_id,$name){
		//开启数据库
	$conn=mysql_connect("localhost","root","123456") or die("The database connected fail");
	//选择数据库
	mysql_select_db("github");
	//获取表单数据
	//echo $user_id;
	
	$query = "SELECT insitusion, birth from information WHERE user_id=$user_id ";
	$result = mysql_query($query) or die("Query failed : " . mysql_error());
	$result=mysql_fetch_array($result);
	$insitusion=$result[0];
	$birth = $result[1];
	echo '
		<tr>

				<td width="30%" height="35" align="left"></td>

			<td width="70%" height="35"><input type="hidden" name="type2" value="1"> </td>

		</tr>
		<tr>
			<td  width="30%" height="35" align="left"><LI>Username:</td>
			<td width="70%" height="35">';
	echo $name;		
	echo '</td>
		</tr>
		<tr>
			<td  width="30%" height="35" align="left"><LI>Inisitusion:</td>
			<td width="70%" height="35">';
	echo $insitusion;
	echo '</td>
		</tr>
		<tr>
			<td  width="30%" height="35" align="left"><LI>Birth:</td>
			<td width="70%" height="35">';
	echo $birth;
	echo '</td>
		</tr>';
}
?>