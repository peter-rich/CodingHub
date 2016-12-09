<?php
include 'main.php';
if(isset($_GET['download'])){
	download_zip($_GET['download']);
}
session_start();	
?>
<html>
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
	<head>
		<meta charset="utf-8">
		<title>CodingHub</title>
		<meta name="description" content="Worthy a Bootstrap-based, Responsive HTML5 Template">
		<meta name="author" content="htmlcoder.me">
		
		<link rel="stylesheet" href="../css/jquery-labelauty.css">
		<script src="../js/jquery-1.8.3.min.js"></script>
		<script src="../js/jquery-labelauty.js"></script>
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
		
		<!--section-->
		    <!-- Bootstrap Core CSS -->
		<link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

		<!-- MetisMenu CSS -->
		<link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

		<!-- Custom CSS -->
		<link href="../dist/css/sb-admin-2.css" rel="stylesheet">
	
		<!-- Morris Charts CSS -->
		<link href="../vendor/morrisjs/morris.css" rel="stylesheet">

		<!-- Custom Fonts -->
		<link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
		<!--section-->
	</head>
   
<div class="parent">
<style type="text/css">
body{background-repeat:no-repeat;background-image: url(<!--here is your body 's picture-->);background-position:center;background-attachment:fixed;
}
table {background-image: url(<!--here is your table 's picture-->);}
h2 {background-color: transparent}
p {background-color: no-color}

p.no2 {background-color: gray; padding: 20px;}

input[type=submit] {
    width: 100%;
    background-color: no-color;
    color: no_color;
    padding: 9px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}
input[type=submit]:hover {
    background-color: blue;
}
p.no2 {background-color: gray; padding: 20px;}
input[type=button] {
    width: 100%;
    background-color: no-color;
    color: no_color;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}
input[type=button]:hover {
    background-color: blue;
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
								<div class="site-slogan">Not only a Hub </div>
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
												<li class="active"><a href="../index.html" face=微软雅黑 >Home</a></li>
												<li><a href="club.php" face=微软雅黑 >Club</a></li>
												<li><a href="set.php" face=微软雅黑 >Setting</a></li>
												<li><a href="../index.html" face=微软雅黑>Log Out</a></li>
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
			<div class="banner-image"></div>
			<div class="banner-caption">
				<div class="container">
					<div class="row">
						<div class="col-md-8 col-md-offset-2 object-non-visible" data-animation-effect="fadeIn">
							<h1 class="text-center" face=微软雅黑  size=8 style="font-weight:bold;font-style:italic;" > log <span> in </span></h1>
							<br></br>
							<p class="text-center" style="font-weight:bold;font-style:italic;" size=4>Author: Zhanfu Yang, Haonan Zhang, Haieng Wang</p>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- banner end -->
</div>
<Br></Br>
<p class="text-center" style="font-weight:bold;font-style:italic;" size=8>
<!--section start-->
<?php
//php不报错的方法
//if (!ini_get('display_errors')) {
//    ini_set('display_errors', 'off');
//}
//获取表单数据
$user_id;
$no_need_identify=0;
if(isset($_POST['name'])&&isset($_POST['password'])){
	$name=$_POST['name'];
	$password=$_POST['password'];
}
else{
	$name=$_SESSION['name'];
	$password=$_SESSION['password'];
	$user_id=$_SESSION['user_id'];
	$no_need_identify=1;
}
$n=strlen($name);

$p=strlen($password);

$judge = 0;

//用户信息的基本判断操作
if($no_need_identify==0&&isset($_POST['val'])&&$_POST['val']==1){
	if($n==0){
		echo "Please input your user name";
	}elseif(!($n>=3 && $n<=16)){
	
		echo "the length of username is 3-16 bit";
		
	}elseif($p==0){

		echo "Please Input your password";

	}elseif(!($p>=5 && $p<=16)){

		echo "The length of password must be 5-16 bit";

	}else{  

		//连接数据库

		$conn=mysql_connect("localhost","root","123456") or die("The database connect fail");

		echo "Connected successfully\n";

		mysql_select_db("github");

		//设置数据库编码
	
		mysql_query("set user_name,user_pass,email utf8");

		//操作数据库
		$query = "SELECT user_id,user_name,email FROM information";
		$result = mysql_query($query) or die("Query failed : " . mysql_error());

		//echo mysql_result($result,0);
		$row;
	
		while ($row = mysql_fetch_array($result, MYSQL_NUM)) { 
			if(($row[1]==$name||$row[2]==$name) ){
				$user_id=$row[0];
				$query = "SELECT user_pass FROM sign WHERE user_id=$user_id";
				$result = mysql_query($query) or die("Query failed : " . mysql_error());
				$row=mysql_fetch_array($result);
				if($password==$row[0]){
					$judge=1;
				}
				else{
					echo "password incorrect!<br>";
				}
				break;
			}
		}
		//释放sql 语句
		mysql_free_result($result);
		/* 断开连接 */
		if($judge == 1){
			echo "Welcom  user: ";
			echo $name;
			echo '<input type="hidden" name="check" value="1"> ';
		}
		else{
			echo ",May be no such user,Failed logged!";
			echo '<input type="hidden" name="check" value="0"> ';
		}
	}
}
elseif(isset($_POST['val'])&&$_POST['val']!=1){
	echo "Not Finish identified";
}

?></p>
<?php
if($judge == 1||$no_need_identify==1){
$_SESSION['name']=$name;
$_SESSION['type']=1;
$_SESSION['password']=$password;
$_SESSION['user_id']=$user_id;

main($user_id,1);
}

	?>
	
		<!--section end-->

<Br></Br></Br>
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