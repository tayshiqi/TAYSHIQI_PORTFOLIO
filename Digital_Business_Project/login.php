<?php
include("config.php"); 
?>

<!DOCTYPE HTML>

<html>
	<head>
		<title>Log In</title>
		<link rel="icon" href="images/logo.png" type="images/png">
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
		<script src="js/jquery.min.js"></script>
		<script src="js/jquery.dropotron.min.js"></script>
		<script src="js/jquery.scrollgress.min.js"></script>
		<script src="js/jquery.scrolly.min.js"></script>
		<script src="js/jquery.slidertron.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-layers.min.js"></script>
		<script src="js/init.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-xlarge.css" />
		</noscript>
		<!--[if lte IE 9]><link rel="stylesheet" href="css/ie/v9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
		
		<script type="text/javascript">

		function check_form()
		{
			var no_error = true;
			var cust_email = document.signinfrm.cust_email.value;
			var cust_password = document.signinfrm.cust_password.value;

			if (cust_email == "")
			{
				document.getElementById("err_email").innerHTML="Please key-in your email address.";
				no_error = false;
			}
			else
			{
				document.getElementById("err_email").innerHTML="";
			}

			if (cust_password == "")
			{
				document.getElementById("err_password").innerHTML="Please key-in your password.";
				no_error = false;
			}
			else
			{
				document.getElementById("err_password").innerHTML="";
			}
			
			return no_error;
		}

		</script>

		<style type= "text/css">
		
		#background{
			width:100%;
			height:100vh;
			background-image:linear-gradient(rgba(0,0,0,0.55),rgba(0,0,0,0.55)),url(images/banner3.jpg);
			background-size:cover;
			background-position:center;
		}
		
		.lgf{
			border:1px solid transparent;
		}
		
		form{
			background-color:#FBF8EF;
			border-radius:20px;
			padding:1.2em;
			width:25%;
			margin:150px auto;
		}

		p input[type=submit]{
			border:none;
			border-radius:10px;
			font-weight:bold;
			color:white !important;
			background-color:#e0555a;
			width:100%;
		}

		p input[type=submit]:hover{
			color:#e0555a !important;
			background-color:transparent;
			border-color:#e0555a !important;
		}

		</style>
		
	</head>
	<body class="landing">

		<!-- Header -->
			<header id="header" class="alt skel-layers-fixed">
				<div id="logo"><a href="index.html" style="text-decoration:none; outline:none; border:none;"><img src="images/logo.png" title="Kanso Fruits" alt="Kanso Fruits Logo"/></a></div>
				<h1><a href="index.html"> KANSO FRUIT</a></h1>
				<nav id="nav">
					<ul>
						<li><a href="index.html">Home</a></li>
						<li><a href="about_us.html">About Us</a></li>
						<li>
							<a href="" class="icon fa-angle-down">Products</a>
							<ul>
								<li><a href="premium_fruit.html">Premium Fruits</a></li>
								<li><a href="seasonal_fruit.html">Seasonal Fruits</a></li>
								<li><a href="citrus_fruit.html">Citrus Fruits</a></li>
								<li><a href="stone_fruit.html">Stone Fruits</a></li>
							</ul>
						</li> &nbsp;&nbsp;&nbsp;
						<li class="dot"><a href="login.php">Log In</a></li>
						<li class="dot"><a href="signup.php">Sign Up</a></li>
					</ul>
				</nav>
			</header>

		<!-- Background -->
		
		<div id="background">
		
			<div class="lgf">
			
			<form name="signinfrm" action="" method="post" onsubmit="return check_form();">
				<h3 style="text-align:center;">User Login</h3>
				
				<div class="12u">
					<input type="email" name="cust_email" placeholder="Enter Your Email Address" class="details"/>
					<span id="err_email" style="color:red; font-style:italic; font-size:0.8em;"></span><br>
				</div>
				
				<div class="12u"> 
					<input type="password" name="cust_password" placeholder="Enter Your Password" class="details"/>
					<span id="err_password" style="color:red; font-style:italic; font-size:0.8em;"></span><br>
				</div>
				
				<p>
					<input type="submit" name="loginbtn" value="Sign-In" />	
				</p>

				<span style="text-align: center; display: block;">Don't have an account?  
				<a href="signup.php">Register</a></span>

			</form>
			
			</div>
			
		</div>

	</body>
</html>

<?php

if (isset($_POST["loginbtn"]))
{
	$cemail = $_POST["cust_email"];
	$cpass = md5($_POST["cust_password"]);
	
	$check_login = mysqli_query($conn, "select * from customertbl where cust_email='$cemail' and cust_password = '$cpass'");
	
	if (mysqli_num_rows($check_login) == 1)
	{
		$cust_rec = mysqli_fetch_assoc($check_login);
		$_SESSION["sess_cid"] = $cust_rec["cust_id"]; 
		
		echo "<script>
		window.location.href='customer_view_product_list.php';
		</script>";
		//header("Location:customer_view_product_list.php");
	}
	else
	{
		echo 
		"<script type='text/JavaScript'>
			alert('Invalid email or password');
		</script>";
	}
}

?>