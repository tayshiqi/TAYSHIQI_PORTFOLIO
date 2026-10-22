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
		<title>About Us</title>
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
	
	<style type="text/css">
	
	.aboutimg {
      display:block;
      margin:0;
      padding:0;
    }

	.teambox{
		text-align:center;
		width:100%;
		margin-top:2em;
	}
	
	.teambox .left{
		width:20%;
	}
	
	.teambox .left img{
		width:80%;
		height:210px;
		padding:20px;
		border-radius:100%;
	}

	.teambox .right{
		padding-top:2em;
		width:75%;
	}
	
	.teambox .left, .teambox .right{
		display:inline-block;
		vertical-align:top;
	}
	
	.teambox .right p img{
		width:2%;
		height:2%;
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
		<img src="images/banner2.jpg" alt="background" width="100%" class="aboutimg"/>
			<section id="main" class="wrapper style1">
				<header class="major">
					<h2>About Us</h2>
					<p>Kanso Fruit</p>
				</header>
				<div class="container">
						
					<!-- Content -->
						<section id="content">
							
							<h3>Company Background</h3>
							<p style="text-align: justify;">Kanso Fruits is founded in 2024, a Malaysian e-commerce company specializing in importing 
							premium Japanese fruits. Guided by the slogan "Authentic Flavors, Naturally Sweet," we deliver 
							high-quality, fresh fruits sourced from Japan's renowned agricultural farms. By connecting Japanese 
							farmers to global markets, we aim to expand access to Japan's finest produce. As importers of nature’s finest, 
							we bring the best seasonal harvests to discerning customers who value quality, freshness, and authenticity.</p>
							<h3>Mission</h3>
							<ul>
								<li>Offer unique fruit experiences through top-quality Japanese fruits from Japan’s best orchards.</li>
								<li>Showcase Japanese farmers’ expertise with premium, seasonal, citrus, and stone fruits.</li>
								<li>Ensure customer satisfaction with efficient online shopping and delivery services.</li>
							</ul>
							
							<h3>Vision</h3>
							<ul>
								<li>Become a leading online platform for Japanese fruits, emphasizing quality and specialty.</li>
								<li>Foster understanding of Japanese agriculture and its commitment to high-quality food.</li>
								<li>Promote a healthier lifestyle and culinary creativity through educational talks and expertise-sharing events.</li>
							</ul>
							
							<h3>Meet the Team</h3>
							<div class="team">
								
								<div class="teambox">
									<div class="left">
										<img src="images/shiqi.jpg" title="Tay Shi Qi" width="80%", height="210px";/>
									</div>
									<div class="right">
										<h4>Tay Shi Qi - Founder</h4>
										<p>"Oversees company strategy, farmer partnerships, and product quality"<br>
										Vision: To connect Japanese agricultural heritage with global markets, bringing authentic flavors to every home.<br>
										<img src="images/gmail.png" title="Email"/> <a href="mailto:shiqi@gmail.com" >shiqi@gmail.com</a><br>
										<img src="images/phone.png" title="Fax"/> +60197508983</p>
									</div>
								</div>

							</div>
							
						</section>
								
				</div>
			</section>
		
		<!-- CTA -->
			<section id="cta" class="wrapper style3">
				<h2>Experience Nature’s Sweetness Today!</h2>
				<ul class="actions">
					<li><a href="customer_view_product_list.php" class="button big">Browse Fruits</a></li>
				</ul>
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