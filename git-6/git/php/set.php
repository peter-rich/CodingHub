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
								<a href="#banner"><img id="logo" src="../images/logo.png" alt="Worthy"></a>
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
												<li><a href="#password">Password</a></li>
												<li><a href="#birth2">Birth</a></li>
												<li><a href="#insitusion">Insitusion</a></li>
												<li><a href="checklog.php">Back</a></li>
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
<br><br>
<table width="40%" border="0" align="center">

<?php
include 'fun.php';
include 'background.php';
$user_id=$_SESSION['user_id'];
$name=$_SESSION['name'];
$password=$_SESSION['password'];
$num=0;
if($_SESSION['type']==1||!(isset($_POST['type2']))){
	$_SESSION['type']=2;
	information($user_id,$name);
}
//将表单获得的数据插入数据库
elseif($_SESSION['type']==2){
	$conn=mysql_connect("localhost","root","123456") or die("The database connected fail");
	//选择数据库
	mysql_select_db("github");
	$user_id=$_SESSION['user_id'];
	$type=$_POST['type2'];
	
	//只有在改变密码的情况下会发邮件提示
	$judge=1;
	if($type==1){
		$password=$_POST['password'];
		$password2=$_POST['password2'];	
		$p=strlen($password);
		if($p==0){
			$judge=0;
			echo '<p class="text-center" face=微软雅黑  size=8 style="font-weight:bold;font-style:italic;" >Please Input your password</p>';

		}elseif(!($p>=5 && $p<=16)){
			$judge=0;
			echo '<p class="text-center" face=微软雅黑  size=8 style="font-weight:bold;font-style:italic;" >The length of password must be 5-16 bit</p>';

		}elseif(!($password==$password2)){
			$judge=0;
			echo '<p class="text-center" face=微软雅黑  size=8 style="font-weight:bold;font-style:italic;" >Two password is not the same!';

		}else{
			
			//选择数据库用户数据
			$query = "UPDATE sign SET user_pass = '$password' where user_id=$user_id ";
			mysql_query($query) or die("Query failed : " . mysql_error());
			
			$title = "CodingHub Change password message";
			$content1 = "Lady/Gentment:\n you has been changge your password now, we are going to send you the message. \n,your name is :";
			$content2 = "Your new password is: ";
			$content3 = "   \n\n Thanks for your sign, Let's learn together!";
			$content = $content1.$name.$content2.$password.$content3;	
			send_email($content,$email,$title);
		}
	}
	elseif($type==2){
		$year = $_POST['year'];
		$month = $_POST['month'];
		$day = $_POST['day'];
		$middle = "/";
		$birth = $year.$middle.$month.$middle.$day;	
		//选择数据库用户数据
		if($year != NULL && $month != NULL &&  $day != NULL){
			$query = "UPDATE information SET birth = '$birth' where user_id=$user_id ";
			mysql_query($query) or die("Query failed : " . mysql_error());
		}
		else{
			$judge = 0;
		}
	}
	elseif($type==3){
		$insitusion = $_POST['insitusion'];
		//选择数据库用户数据
		$query = "UPDATE information SET insitusion = '$insitusion' where user_id=$user_id ";
		mysql_query($query) or die("Query failed : " . mysql_error());
	}
	if($judge==1){
		information($user_id,$name);
		$_SESSION['name']=$name;
		$_SESSION['password']=$password;
		$_SESSION['user_id']=$user_id;
	}
	
}
?>
<br><br>
</table>
</form>
<Br></Br>
<!--页面跳转提示到注册界面-->
		<!-- section start -->
		<form id="password" name="frm" method="post" action = "set.php">
		<br>
		<table width="40%" border="0" align="center">
		<tr>

				<td width="30%" height="35" align="left"></td>

			<td width="70%" height="35"><input type="hidden" name="type2" value="1"> </td>

		</tr>
		<tr>
			<td  width="30%" height="35" align="left"><LI>Password:</td>
			<td width="70%" height="35"><input type="password" name="password" /></td>
		</tr>
		<tr>
			<td  width="30%" height="35" align="left"><LI>Repeat password:</td>

			<td width="70%" height="35"><input type="password" name="password2" /></td>
		</tr>
		<BR><Br>


		</table>
		<BR>
		<table width="35%" border="0" align="center">


		<td height="35" colspan="2" align="left">
			<input type="submit" name="sub" value="submit" /></td>
		</table>
		</form>
		<Br></Br>
		<Br></Br>
		<Br></Br>

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
		<Br></Br>
		<Br></Br>
		<form id="birth2" name="frm" method="post" action = "set.php">
		<br>
		<table width="40%" border="0" align="center">		
		<tr>
		<tr>

				<td width="30%" height="35" align="left"></td>

			<td width="70%" height="35"><input type="hidden" name="type2" value="2"> </td>

		</tr>
			<td width="30%" height="35" align="left" ><LI>birth:</td>

			<td>  <select id="year" onchange="changeday()" name="year"> <option value="">year</option></select><select id="month" name="month"  onchange="changeday()"><option value="">month</option> </select><select id="day" name="day" ><option value="">day</option> </select>
					<script type="text/javascript" language="javascript">
                            var curdate = new Date();
                            var year = document.getElementById("year");
                            var month = document.getElementById("month");
                            var day = document.getElementById("day");
                            //绑定年份月分的默认
                            function add() {
                                var curyear = curdate.getFullYear();
                                var minyear = curyear - 80;
                                var maxyear = curyear ;
								for (maxyear; maxyear >= minyear; maxyear = maxyear - 1) {
                                    year.options.add(new Option(maxyear, maxyear));
                                }
                                for (var mindex = 1; mindex <= 12; mindex++) {
                                    month.options.add(new Option(mindex, mindex));
                                }
                            }

                            //判断是否是闰年
                            function leapyear(intyear) {
                                var result = false;
                                if (((intyear % 400 == 0) && (intyear % 100 != 0)) || (intyear % 4 == 0)) {
                                    result = true;
                                }
                                else {
                                    result = false;
                                }
                                return result;
                            }
                            //绑定天数
                            function addday(maxday) {
                                day.options.length = 1;
                                for (var dindex = 1; dindex <= maxday; dindex++) {
                                    day.options.add(new Option(dindex, dindex));
                                }
                            }
                            function changeday() {
                                if (year.value == null || year.value == "") {
                                    alert("请先选择年份！");
                                    return false;
                                }
                                else {
                                    if (month.value == 1 || month.value == 3 || month.value == 5 || month.value == 7 || month.value == 8 || month.value == 10 || month.value == 12) {
                                        addday(31);
                                    }
                                    else {
                                        if (month.value == 4 || month.value == 6 || month.value == 9 || month.value == 11) {
                                            addday(30);
                                        }
                                        else {
                                            if (leapyear(year.value)) {
                                                addday(29);
                                            }
                                            else {
                                                addday(28);
                                            }
                                        }
                                    }
                                }
                            }
                            window.onload = add;
						</script></td>

		</tr>
		</table>
		<BR>
		<table width="35%" border="0" align="center">
				<td height="35" colspan="2" align="left">
			<input type="submit" name="sub" value="submit" /></td>
		</table>
		</form>
		
		<Br></Br>
		<Br></Br>
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
		<Br></Br>
		<Br></Br>
		
		<form id="insitusion" name="frm" method="post" action = "set.php">
		<br>
		<table width="40%" border="0" align="center">
				<tr>

				<td width="30%" height="35" align="left"></td>

			<td width="70%" height="35"><input type="hidden" name="type2" value="3"> </td>

		</tr>
		
		<tr>

			<td width="30%" height="35" align="left"><LI>Company/Univers:</td>

			<td width="70%" height="35"><input type="text" name="insitusion" /></td>

		</tr>
		</table>
		<BR>
		<table width="35%" border="0" align="center">
						<td height="35" colspan="2" align="left">
			<input type="submit" name="sub" value="submit" /></td>
		</table>
		</form>
		<Br></Br>
		<Br></Br>
		<Br></Br>
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