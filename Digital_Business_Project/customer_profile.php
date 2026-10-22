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
		<title>My Profile</title>
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
		
		<link rel="stylesheet" href="css/customer_design.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="css/ie/v9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
		
	
		
		
	</head>
	<body>

		<!-- Header -->
			<header id="header" class="skel-layers-fixed">
				<div id="logo"><a href="index.html" style="text-decoration:none; outline:none; border:none;"><img src="images/logo.png" title="Kanso Fruits" alt="Kanso Fruits Logo"/></a></div>
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
		
		<div class="custprofile">
			<h3>My Profile</h3>
		</div>
			<section id="main" class="wrapper style1">
				<div class="custbox">
					<!-- Content -->
							<p>
								<a href="customer_profile.php" class="icon fas fa-user">&nbsp;&nbsp;Profile</a>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<a href="edit_customer_profile.php?edit_pk=$sess_cid" class="icon fas fa-pencil-square-o ">&nbsp;Edit Profile</a>
							</p>
							<hr>
							<h3>Hi, <?php  echo $cust_rec["cust_name"];?>! </h3>
						
							<?php
		
							if ($cust_rec["cust_image"] == "")
							{
								$filename = "customer_image/user.png";
							}
							else
							{
								$filename = "customer_image/".$cust_rec["cust_image"];
							}
							
							echo "<div class='custprofpic'>";
							
								echo "<img src='".$filename."'>";
							
							echo "</div>";
							
							echo "<div class='custprofdetail'>";

								echo"<label>Name </label><p>:&nbsp;".$cust_rec["cust_name"]."</p>";
								
								echo"<label>Email Address </label><p>:&nbsp;".$cust_rec["cust_email"]."</p>";
								
								echo"<label>Contact </label><p>:&nbsp;";
								
									if ($cust_rec['cust_contact'] == '' )
									{
										echo "Not Provided";
									}
									else
									{
										echo $cust_rec['cust_contact'];
									}
									
								echo "</p>";
								
								echo"<label>Gender </label><p>:&nbsp;";
								
									if ($cust_rec['cust_gender'] == '' )
									{
										echo "Not Specified";
									}
									else
									{
										echo $cust_rec["cust_gender"];
									}
								
								echo "</p>";
								
								echo"<label>Date of Birth  </label><p>:&nbsp;";
									
									if ($cust_rec['cust_dob'] == '0000-00-00' )
									{
										echo "Not Entered";
									}
									else
									{
										echo $cust_rec["cust_dob"];
									}
									
								echo "</p>";
								
								echo"<label>Join Date </label><p>:&nbsp;".$cust_rec["cust_join_date"]."</p>";
							
							echo "</div>";
					
							?>
								
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

