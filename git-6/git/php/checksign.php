<?php
session_start();
?>
<html>
<!--<![endif]-->
	<head>
		<meta charset="utf-8">
		<title>CheckSign</title>
		<meta name="description" content="Worthy a Bootstrap-based, Responsive HTML5 Template">
		<meta name="author" content="htmlcoder.me">
		<!-- Mobile Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- Favicon -->
		<link rel="shortcut icon" href="../images/favicon.ico">
		<!-- Web Fonts -->
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,400,700,300&amp;subset=latin,latin-ext' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Raleway:700,400,300' rel='stylesheet' type='text/css'>
		<!-- Bootstrap core CSS -->
		<link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
		<!-- Font Awesome CSS -->
		<link href="../fonts/font-awesome/css/font-awesome.css" rel="stylesheet">
		<!-- Plugins -->
		<link href="../css/animations.css" rel="stylesheet">
		<!-- Worthy core CSS file -->
		<link href="../css/style.css" rel="stylesheet">
		<!-- Custom css --> 
		<link href="../css/custom.css" rel="stylesheet">
	</head>
<style type="text/css">
body{background-repeat:no-repeat;background-image: url(<!--your picture-->);background-position:center;background-attachment:fixed;
background-color:white;
}

h2 {background-color: transparent}

p {background-color: no-color<!--rgb(250,250,255)-->}

p.no2 {background-color: gray; padding: 20px;}

content2 {<!--input something here-->}

.file {
    position: relative;
    display: inline-block;
    background: #D0EEFE;
    border: 1px solid #99D3F5;
    border-radius: 4px;
    padding: 4px 12px;
    overflow: hidden;
    color: #1E82C5;
    text-decoration: none;
    text-indent: 0;
    line-height: 20px;
}
.file input {
    position: absolute;
    font-size: 100px;
    right: 0;
    top: 0;
    opacity: 0;
}
.file:hover {
    background: #AADFFB;
    border-color: #78C3F0;
    color: #004974;
    text-decoration: none;
}

input[type=text], select {
    width: 70%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}
input[type=password], select {
    width: 70%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}
input[type=submit] {
    width: 70%;
    background-color: #3CBF5A;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=submit]:hover {
    background-color: skyblue;
}
</style>
	<body class="no-trans">
		<!-- scrollToTop -->
		<!-- ================ -->
		<div class="scrollToTop"><i class="icon-up-open-big"></i></div>

		<!-- header start -->
		<!-- ================ --> 
		<header class="header fixed clearfix navbar navbar-fixed-top">
			<div class="container">
				<div class="row">
					<div class="col-md-4">
						<!-- header-left start -->
						<!-- ================ -->
						<div class="header-left clearfix">
							<!-- logo -->
							<div class="logo smooth-scroll">
								<a href="#banner"><img id="logo" src="images/logo.png" alt="Worthy"></a>
							</div>
							<!-- name-and-slogan -->
							<div class="site-name-and-slogan smooth-scroll">
								<div class="site-name"><a href="#banner">CodingHub</a></div>
								<div class="site-slogan">Free Code Storage Platform </div>
							</div>
						</div>
						<!-- header-left end -->
					</div>
					<div class="col-md-8">
						<!-- header-right start -->
						<!-- ================ -->
						<div class="header-right clearfix">
							<!-- main-navigation start -->
							<!-- ================ -->
							<div class="main-navigation animated">
								<!-- navbar start -->
								<!-- ================ -->
								<nav class="navbar navbar-default" role="navigation">
									<div class="container-fluid">
										<!-- Collect the nav links, forms, and other content for toggling -->
										<div class="collapse navbar-collapse scrollspy smooth-scroll" id="navbar-collapse-1">
											<ul class="nav navbar-nav navbar-right">
												<li class="active"><a href="../index.html">Home</a></li>
												<li class="active"><a href="../index.html#sign">Back</a></li>
											</ul>
										</div>
									</div>
								</nav>
								<!-- navbar end -->
							</div>
							<!-- main-navigation end -->
						</div>
						<!-- header-right end -->
					</div>
				</div>
			</div>
		</header>
		<!-- header end -->
		<!-- banner start -->
		<!-- ================ -->
		<div id="banner" class="banner">
			<div class="banner-image" herf="../images/banner.jpg"></div>
			<div class="banner-caption">
				<div class="container">
					<div class="row">
						<div class="col-md-8 col-md-offset-2 object-non-visible" data-animation-effect="fadeIn">
							<h1 class="text-center" face=微软雅黑  size=8 style="font-weight:bold;font-style:italic;" > Sign <span> in </span></h1>
							<br></br>
							<p class="text-center" style="font-weight:bold;font-style:italic;" size=4>Author: Zhanfu Yang, Haonan Zhang, Haieng Wang</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- banner end -->
<Br></Br>
<form name="frm" method="post" action = "checksign.php">
<br>
<table width="40%" border="0" align="center">

<?php
include 'fun.php';

//获取表单数据
$type=$_POST['type'];
$num=0;
if($type==1){
	
	$name=$_POST['name'];
	$password=$_POST['password'];
	$password2=$_POST['password2'];
	$year = $_POST['year'];
	$month = $_POST['month'];
	$day = $_POST['day'];
	$middle = "/";
	$birth = $year.$middle.$month.$middle.$day;
	$insitusion = $_POST['insitusion'];
	$email = $_POST['email'];

	$n=strlen($name);
	$p=strlen($password);
	if($n==0){
		echo '<p class="text-center" face=微软雅黑  size=8 style="font-weight:bold;font-style:italic;" >Please input your user name</p>';
	}elseif(!($n>=3 && $n<=16)){

		echo '<p class="text-center" face=微软雅黑  size=8 style="font-weight:bold;font-style:italic;" >the length of username is 3-16 bit</p>';  

	}elseif($p==0){

		echo '<p class="text-center" face=微软雅黑  size=8 style="font-weight:bold;font-style:italic;" >Please Input your password</p>';

	}elseif(!($p>=5 && $p<=16)){

		echo '<p class="text-center" face=微软雅黑  size=8 style="font-weight:bold;font-style:italic;" >The length of password must be 5-16 bit</p>';

	}elseif(!($password==$password2)){

		echo '<p class="text-center" face=微软雅黑  size=8 style="font-weight:bold;font-style:italic;" >Two password is not the same!';

	}else{
		$_SESSION['num']=$num;
		$_SESSION['name']=$name;
		$_SESSION['password']=$password;
		$_SESSION['birth']=$birth;
		$_SESSION['insitusion']=$insitusion;
		$_SESSION['email']=$email;
			
		//连接数据库
		$conn=mysql_connect("localhost","root","123456") or die("The database connected fail");
		//选择数据库

		mysql_select_db("github");

		//设置数据库编码
		//mysql_query("set name utf8");
		$admin = 1;//用于判断是否有重复用户
		//选择数据库用户数据
		$query = "SELECT user_name FROM information";
		$result = mysql_query($query) or die("Query failed : " . mysql_error());
		$row;
		while ($row = mysql_fetch_array($result, MYSQL_NUM)) { 
			if($row[0]==$name){
				$admin = 0; 
				echo "Have been the same username!";
				break;
			}
		}
		if($admin==1){
			$num=get_password();
			$title = "CodingHub Sign up identifying message";
			$content1 = "Lady/Gentment:\n you has been signed up and wirte the correct information and now, we are going to send you the identify nums ---> ";
			$content2 = "   \n\n Thanks for your sign, Let's learn together!";
			$content = $content1.$num.$content2;
			
			send_email($content,$email,$title);
			
			echo '<p class="text-center" face=微软雅黑  size=8 style="font-weight:bold;font-style:italic;" >Please write down your identifying num.</p>';
			echo '<tr>';
			echo '<td width="30%" height="35" align="left"></td>';
			echo '<td width="70%" height="35"><input type="hidden" name="type" value="2"> </td>';
			echo '</tr>';
			echo '<tr>';
			echo '<td width="30%" height="35" align="left" ><LI face=微软雅黑>Username:</td>';
			echo '<td width="70%" height="35"><p>';
			echo $name;
			echo '<p></td>';
			echo '</tr>';
			echo '</tr>';
			echo '<tr>';
			echo '<td width="30%" height="35" align="left" ><LI face=微软雅黑>Identify num:</td>';
			echo '<td width="70%" height="35"><input type="text" name="identify" /></td>';
			echo '</tr>';
			echo '</table>';
			echo '<table width="35%" border="0" align="center"><tr>';
			echo '<BR>';
			echo '<td height="35" colspan="2" align="left">';
			echo '<input type="submit" name="sub" value="submit" /></td>';
			echo '<input type="hidden" name="check" value="1"> ';			
		}
	}
}

//将表单获得的数据插入数据库
elseif($type==2){
	//连接数据库
	$conn=mysql_connect("localhost","root","123456") or die("The database connected fail");
	//选择数据库
	mysql_select_db("github");
	$num_real=$_SESSION['num'];
	$num=$_SESSION['num'];
	$name=$_SESSION['name'];
	$password=$_SESSION['password'];
	$birth=$_SESSION['birth'];
	$insitusion=$_SESSION['insitusion'];
	$email=$_SESSION['email'];
	session_destroy();
	
	$num=$_POST['identify'];
	if($num==$num_real){
			$sql22="insert into information(email,birth,insitusion,user_name)values('{$email}','{$birth}','{$insitusion}','{$name}')";
			mysql_query($sql22)or die("Query failed : " .mysql_error());
			$nid = mysql_insert_id ();
			//进行插入操作
			//根目录数据库创建
			$sql="insert into root(user_id)values('{$nid}')";
			mysql_query($sql);
			$sql="insert into sign(user_pass)values('{$password}')";
			mysql_query($sql);			
			$path="../user/"+$name;
			//仅创建新的根目录(实际创建)
			createFolder($path);
			$sql="insert into information(information_id,insitusion,birth)values('{$nid}','{$insitusion}','{$birth}')";
			$title = "CodingHub Sign up Successfully message";
			$content1 = "Lady/Gentment:\n you has been signed up successfully,your username is ";
			$content3 = " And your password is ";
			$content2 = "   \nThanks for your sign, Let's learn together!";
			$content = $content1.$name.$content3.$password.$content2;
		
			send_email($content,$email,$title);
				
			echo '<p class="text-center" face=微软雅黑  color=skyblue size=8 style="font-weight:bold;font-style:italic;" >Sign up successfully.</p>';
			
	}
	else{
			echo '<p class="text-center" face=微软雅黑  color=skyblue size=8 style="font-weight:bold;font-style:italic;" >Your identify num is not correct.</p>';
	}
	echo '<input type="hidden" name="check" value="1"> ';
}

?>


</table>
</form>
<Br></Br>
<Br></Br>
<!--页面跳转提示到注册界面-->



		<!-- section start -->
		<!-- ================ -->
		<div class="default-bg space blue">
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2">
						<h1 class="text-center">Let's Learn Together!</h1>
					</div>
				</div>
			</div>
		</div>
		<!-- section end -->

		
			<!-- .subfooter start -->
			<!-- ================ -->
			<div class="subfooter">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<p class="text-center">Copyright @ 2016 CodingHub.</p>
						</div>
					</div>
				</div>
			</div>
			<!-- .subfooter end -->
		</footer>
		<!-- footer end -->
				<!-- JavaScript files placed at the end of the document so the pages load faster
		================================================== -->
		<!-- Jquery and Bootstap core js files -->
		<script type="text/javascript" src="../plugins/jquery.min.js"></script>
		<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>

		<!-- Modernizr javascript -->
		<script type="text/javascript" src="../plugins/modernizr.js"></script>

		<!-- Isotope javascript -->
		<script type="text/javascript" src="../plugins/isotope/isotope.pkgd.min.js"></script>
		
		<!-- Backstretch javascript -->
		<script type="text/javascript" src="../plugins/jquery.backstretch.min.js"></script>

		<!-- Appear javascript -->
		<script type="text/javascript" src="../plugins/jquery.appear.js"></script>

		<!-- Initialization of Plugins -->
		<script type="text/javascript" src="../js/template.js"></script>

		<!-- Custom Scripts -->
		<script type="text/javascript" src="../js/custom.js"></script>

	</body>
</html>