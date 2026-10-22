<?php
include("config.php"); 

if (!isset($_SESSION["sess_cid"])) 
{
	header("Location: login.php"); 
}
else
{
	$sess_cid = $_SESSION["sess_cid"];
	
	$get_customer = mysqli_query($conn, "select * from customertbl where cust_id=$sess_cid");
	
	$cust_rec = mysqli_fetch_assoc($get_customer );

}

?>

<!DOCTYPE HTML>

<html>
	<head>
		<title>Contact Us </title>
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
		var user_name = document.contactfrm.user_name.value;
		var user_email = document.contactfrm.user_email.value;
		var user_message = document.contactfrm.user_message.value;

		if (user_name == "")
		{
			document.getElementById("user_name_error").innerHTML="Please enter your name.";
			no_error = false;
		}
		else
		{
			document.getElementById("user_name_error").innerHTML="";
		}

		if (user_email == "")
		{
			document.getElementById("user_email_error").innerHTML="Please enter your email.";
			no_error = false;
		}
		else
		{
			document.getElementById("user_email_error").innerHTML="";
		}

		if (user_message == "")
		{
			document.getElementById("user_message_error").innerHTML="Please enter the message.";
			no_error = false;
		}
		else
		{
			document.getElementById("user_message_error").innerHTML="";
		}
		
		return no_error;

	}

	</script>
	
	<style type="text/css">
	
	.container{
		box-sizing:border-box;
	}

	.flex-container{
		border:none;
		background-color:#EEEEEE;
		border-radius:20px;
		width:100%;
		margin-bottom:2em;
	}
	
	.map iframe {
		width:100%;
		height:500px;
		padding:1em;
	}
	
	.map h4{
		padding:1em 0 0 1em;
	}

	.map {
		width:100%; 
	}
	
	.contactform {
		width:100%; 
		padding:1em;
		overflow:hidden;
	}
	
	form input.details, form textarea{
		background-color:white;
		resize:none;
	}
	
	ul li input[type=submit]{
		border:none;
		border-radius:10px;
		font-weight:bold;
		color:white !important;
		background-color:#e0555a;
	}

	ul li input[type=submit]:hover{
		color:#e0555a !important;
		background-color:transparent;
		border-color:#e0555a !important;
	}
	
	.info{
		border:none;
		background-color:#FEFAE0;
		border-radius:20px;
		padding:1em;
		margin-bottom:2em;
		text-align:center;
	}
	
	.info-detail{
		padding:2em;
		display:inline-block;
		width:24%;
		vertical-align:top;
	}
	
		
	.info-detail img{
		width:20%;
		height:20%;
	}
	
	</style>
	
	</head>
	<body>

		<!-- Header -->
			<header id="header" class="skel-layers-fixed">
				<div id="logo"><img src="images/logo.png" title="Kanso Fruits" alt="Kanso Fruits Logo"/></div>
				<h1><a href="index.html"> KANSO FRUIT</a></h1>
				<nav id="nav">
					<ul>
						<li><a href="index.php">Home</a></li>
						<li><a href="about_us.php">About Us</a></li>
						<li>
							<a href="" class="icon fa-angle-down">Products</a>
							<ul>
								<li><a href="premium_fruit.php">Premium Fruits</a></li>
								<li><a href="seasonal_fruit.php">Seasonal Fruits</a></li>
								<li><a href="citrus_fruit.php">Citrus Fruits</a></li>
								<li><a href="stone_fruit.php">Stone Fruits</a></li>
							</ul>
						</li>
						<li><a href="customer_view_cart.php" class="icon fa-shopping-cart"></a></li>
						<li>
							<a href="" class="icon fa-list"></a>
							<ul>
								<li><a href="customer_profile.php" class="icon fa-user">&nbsp;&nbsp;&nbsp;Account</a></li>
								<li><a href="customer_view_product_list.php" class="icon fa-th">&nbsp;&nbsp;&nbsp;Product List</a></li>
								<li><a href="customer_order_list.php" class="icon fa-history">&nbsp;&nbsp;&nbsp;Order List</a></li>
								<li><a href="user_logout.php" class="icon fa-sign-out">&nbsp;&nbsp;&nbsp;Sign Out</a></li>
							</ul>
						</li>
					</ul>
				</nav>
			</header>

		<!-- Main -->
			<section id="main" class="wrapper style1">
	
				<div class="container">
					<h2>Contact Us</h2>	
					
					<p><b>We’d Love to Hear From You!</b><br>
					Whether you have a question about our premium fruits, seasonal offerings, or a special order, 
					feel free to reach out. We’re here to help.</p>
					
					<!-- Content -->
					
					<div class="flex-container">	
						
						<section id="content">

									<div class="map">
									
									<h4>Find Us on the Map</h4>
									
									<iframe src=
									"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3986.593848669125!2d102.24637867496803!3d2.30
									3666497676171!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d1fb33a4aa09f1%3A0x3954c655095e1b73!2sT
									aman%20Satu%20Krubong%2C%2075260%20Krubong%2C%20Malacca!5e0!3m2!1sen!2smy!4v1732423931517!5m2!1sen!2smy" 
									style="border:0;" allowfullscreen="" loading="lazy" 
									referrerpolicy="no-referrer-when-downgrade"></iframe>

									</div>
						</section>
					
					</div>
					
					<div class="info">
						
							<div class="info-detail">
								<img src="images/address.png" title="Business Address"/>
								<p><b>Office Address</b><br><br> Taman Satu Krubong, 75260 Krubong, Melaka, Malaysia</p>
							</div>
							
							<div class="info-detail">
								<img src="images/gmail.png" title="Email"/>
								<p><b>Email</b><br><br> kansofruit@gmail.com</p>
							</div>
							
							<div class="info-detail">
								<img src="images/phone.png" title="Fax"/>
								<p><b>Fax</b><br><br> 06-3312345</p>
							</div>
							
							<div class="info-detail">
								<img src="images/customer-service.png" title="Customer Support"/>
								<p><b>Customer Support</b><br> Common Hours: 9.00 AM to 6.00 PM (GMT+8),<br>Monday to Friday</p>
							</div>
						
						</div>
						
							<!-- Form -->
							
					<div class="flex-container">	
							
						<section id="content">
							
								<div class="contactform">
									<h4>Get in Touch</h4> 
									<p>You can also use the form below to contact us directly:</p>
									<form name="contactfrm" action="" method="post" onsubmit="return check_form();">
										<div class="row uniform">
											<div class="6u 12u(3)">
												Full Name: 
												<input type="text" name="user_name" placeholder="Enter Your Name" class="details" />
												<span id="user_name_error" style="color:red; font-style:italic; font-size:0.8em;"></span>
											</div>
											<div class="6u 12u(3)">
												Email Address:
												<input type="email" name="user_email" placeholder="Enter Your Email" class="details" />
												<span id="user_email_error" style="color:red; font-style:italic; font-size:0.8em;"></span>
											</div>
										</div>

										<div class="row uniform">
											<div class="12u">
												Message: 
												<textarea name="user_message" placeholder="Enter your message" rows="4"></textarea>
												<span id="user_message_error" style="color:red; font-style:italic; font-size:0.8em;"></span>
											</div>
										</div>
										<div class="row uniform">
											<div class="12u">
												<ul class="actions">
													<li><input type="submit" name="submitbtn" value="Submit" /></li>
												</ul>
											</div>
										</div>
									</form>
									
								</div>	

						</section>
						</div>
						
						
						
						
				</div>
			</section>
			
		<!-- Footer -->
			<footer id="footer">
				<ul class="icons">
					<li><a href="https://x.com/KansoFruit123" target="_blank" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
					<li><a href="https://www.instagram.com/kansofruit/" target="_blank" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
					<li><a href="mailto:kansofruit@gmail.com" class="icon fa-envelope"><span class="label">Envelope</span></a></li>
				</ul>
				<ul class="menu">
					<li><a href="faqs.php">FAQs</a></li>
					<li><a href="terms_of_use.php">Terms of Use</a></li>
					<li><a href="privacy_policy.php">Privacy</a></li>
					<li><a href="contactus.php">Contact</a></li>
				</ul>
				<span class="copyright">
					&copy; Copyright Kanso Fruits 2024. All rights reserved. 
				</span>
			</footer>

	</body>
</html>

<?php

if(isset($_POST["submitbtn"]))
{
	$name = $_POST["user_name"];
	$email = $_POST["user_email"];
	$message = $_POST["user_message"];
	$current_date = date("Y-m-d");
	
	$check_duplicate_name = mysqli_query($conn,"select * from feedbacktbl where feedback_name = '$name'");
	$check_duplicate_email = mysqli_query($conn,"select * from feedbacktbl where feedback_email = '$email'");
	
	if(mysqli_num_rows($check_duplicate_name) > 0)
	{
		echo
		"<script type='text/javascript'>
			alert('A record with this user name already exists.');
			history.go(-1);
		</script>";
	}
	else
		if(mysqli_num_rows($check_duplicate_email) > 0)
		{
			echo
			"<script type='text/javascript'>
				alert('A record with this user email already exists.');
				history.go(-1);
			</script>";
		}

		else	
		{
			mysqli_query($conn, "insert into feedbacktbl (feedback_name, feedback_email, feedback_message, feedback_date)
			values('$name','$email','$message','$current_date')");
			
			echo
			"<script type='text/javascript'>
				alert('Your feedback has been saved.');
			</script>";
		}
}


?>