<?php
session_start();
?>
<html>
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
	<head>
		<!--this is the end of the project-->
		<meta charset="utf-8">
		<!-- load ace -->
		<meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
		
		<!---->
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta charset="utf-8">
		<title>CodingHub</title>
		<meta name="description" content="Worthy a Bootstrap-based, Responsive HTML5 Template">
		<meta name="author" content="htmlcoder.me">
		<!--File Rename start-->
		
		<script type="text/javascript" src="../js/jquery-1.11.2.min.js"></script>
		<script type="text/javascript" src="../js/login.js"></script>
		
		
        <!--File Rename end-->
		<link href="http://www.jq22.com/jquery/bootstrap-3.3.4.css" rel="stylesheet">
        <link href="../css/fileinput.css" media="all" rel="stylesheet" type="text/css" />
        <script src="http://www.jq22.com/jquery/1.11.1/jquery.min.js"></script>
        <script src="../js/fileinput.js" type="text/javascript"></script>
        <script src="http://www.jq22.com/jquery/bootstrap-3.3.4.js" type="text/javascript"></script>
        <script src="../js/fileinput_locale_fr.js" type="text/javascript"></script>
        <script src="../js/fileinput_locale_es.js" type="text/javascript"></script>
		
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
    padding: 9px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}
input[type=button]:hover {
    background-color: blue;
}
td {border:1px;border-color:skyblue}

.box{
width:600px;position:fixed;border:#ebebeb solid 1px;height:350px;top:50%;left:50%;display:none;background:#ffffff;box-shadow:0px 0px 20px #ddd;z-index:9999;margin-left:-300px;margin-top:-160px;
    display:none;            /* Ä¬ÈÏ¶Ô»°¿òÒþ²Ø */
}
.box .x{ font-size:18px; text-align:right; display:block;}
.box input[type="text"]{width:80%;font-size:25px; margin-top:40px;margin:8px 8px 35px 10px;}
.box input[type="submit"]{width:70%;font-size:25px; margin-top:40px;margin:8px 8px 50px 80px;}
.box label{width:90px;padding-right:10px;text-align:right;line-height:10px;height:50px;font-size:18px;}

.box2{
width:1400px;position:fixed;border:#ebebeb solid 1px;height:630px;top:31%;left:25%;display:none;background:#ffffff;box-shadow:0px 0px 20px #ddd;z-index:9999;margin-left:-300px;margin-top:-160px;
    display:none;            /* Ä¬ÈÏ¶Ô»°¿òÒþ²Ø */
}
.box2 .x{ font-size:18px; text-align:right; display:block;}
.box2 input[type="text"]{width:80%;font-size:25px; margin-top:40px;margin:8px 8px 35px 10px;}
.box2 input[type="submit"]{width:70%;font-size:25px; margin-top:40px;margin:8px 8px 50px 80px;}
.box2 label{width:90px;padding-right:10px;text-align:right;line-height:10px;height:50px;font-size:18px;}




ul{
    list-style: none;

}
.hide{
    display: none;
}

.tabPlugin{
    width:100%;
    height:547px;
    position: relative;
    padding-top: 40px;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
}
.tabPlugin.full{
    height:100%;
    position: fixed;
    z-index:10;
    top:0;
    left:0;
    width: 100%;
}

.tabPlugin ul{
    padding: 0;
    margin: 0;
    width:100%;
    background: #ccc;
    height: 40px;
    margin-top:-40px;
}
.tabPlugin li{
    width:100px;
    height:40px;
    text-align: center;
    background: #ccc;
    float: left;
    line-height: 40px;
    cursor: pointer;
}
.tabPlugin li.active{
    background: #272822;
    color: #fff;
}


.tabPlugin .tabContainer{
    position: absolute;
    top: 40px;
    left: 0 ;
    z-index: 0;
    width:100%;
    height:100%;
    -webkit-transition: opacity .3s;
       -moz-transition: opacity .3s;
        -ms-transition: opacity .3s;
         -o-transition: opacity .3s;
            transition: opacity .3s;
    opacity: 0;
}

.tabPlugin .tabContainer.dockMode{
    opacity: 1;
    z-index: 1;
    right: 0;
    left: auto;
    width: 300px;
}

.tabPlugin .tabContainer.current{
    z-index:1;
    opacity:1;
}

.tabPlugin .tabContainer.dockMode .split-line{
    position: absolute;
    width:20px;
    height:100%;
    left: -10px;
    text-align: center;
}

.tabPlugin .tabContainer.dockMode .split-line:after{
    content:"";
    width:2px;
    height:100%;
    background: #fff;
    display: inline-block;
}

.tabPlugin .tabContainer.dockMode .split-line:hover{
    cursor: e-resize;
}

.tabContainer pre{
    width:100%;
    height:100%;
    margin:0;
}

.button{
    position: absolute;
    right: 10px ;
    display: inline-block;
    padding:0px 15px;
    height:30px;
    line-height: 30px;
    text-align: center;
    top:5px;
    background: #272822;
    color:#fff;
    z-index:1;
    cursor: pointer;
}
.button:hover{
    background: #44463d;
}

.button.active{
    background: #717368;
}

.save{
    right:80px;
}
.full{
    right:160px;
}
.dock{
    right:295px;
}

.live{
    right:396px;
    height:25px;
    line-height: 25px;
    top: 8px;
}
.live.hide{
    display: none;
}

.iframe.fullScreen{
    position: fixed;
    width:100%;
    height: 100%;
    top: 0;
    left: 0;
}

.iframe{
    width:100%;height: 100%;background: #272822;
}


select{
    position: absolute;
    top: -37px;
    right: 0;
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
												<li class="active"><a href="../index.html">Home</a></li>
												<li><a href="club.php" face=Î¢ÈíÑÅºÚ >Club</a></li>
												<li><a href="set.php">Setting</a></li>
												<li><a href="../index.html">Log Out</a></li>
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
							<h1 class="text-center" face=Î¢ÈíÑÅºÚ  size=8 style="font-weight:bold;font-style:italic;" > log <span> in </span></h1>
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
$judge = 0;
$name;
$password;
$user_id;
$project_name=NULL;
$description=NULL;
$if_public=NULL;
if(isset($_SESSION['name'])&&isset($_SESSION['user_id'])){
	$name=$_SESSION['name'];
	$password=$_SESSION['password'];
	$user_id=$_SESSION['user_id'];
	
	if(isset($_POST['project_name'])&&$_POST['project_name']!=NULL){
		$project_name = $_POST['project_name'];
		$description = $_POST['description'];
		$if_public = $_POST['if_public'];
		$judge=1;
		
	}
	else{
		$judge=2;
	}
	echo '<input type="hidden" name="check" value="1"> ';
		
}


?></p>
<?php
include 'main.php';
if($judge != 0){
	main($user_id,3,$judge,$name,$project_name,$description,$if_public);
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

	
		<script src="../js/jquery-1.8.3.min.js"></script>
		<script src="../js/jquery-labelauty.js"></script>
		<script>
		$(function(){
			$(':input').labelauty();
		});
		</script>
		<script>
		$(document).on('ready', function() {
			$("#file").fileinput({
				uploadUrl: '',
				maxFilePreviewSize: 10240
		
			});
		});
		</script>
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