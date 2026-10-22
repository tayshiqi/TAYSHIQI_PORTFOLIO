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
		<title>Premium Fruits</title>
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
		
		p.productlink {
			text-align:center;
			margin:0px;
			padding:10px;
			background-color:#f9f9f9;
		}
		
		p.productlink a{
			font-weight:bold;
			padding:15px 20px;
			color:#e0555a;
			background-color:#fff;
			text-decoration:none;
			outline:none;
			border:none;
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

		<!-- Banner -->
			<section id="banner">
				<div class="inner">
					<h2>Indulge in Japan’s Finest Flavors</h2>
					<p>Experience the unparalleled flavors of Japan with handpicked fruits, <br>naturally sweet and delivered fresh to your doorstep.</p>
					<ul class="actions">
						<li><a href="customer_view_product_list.php" class="button big scrolly"><span class="explore"></span>Explore Our Fruits</a></li>
					</ul>
				</div>
			</section>
		
		<!-- Product Link-->	
			<p class="productlink">
				<span style="background-color:#e0555a; color:#fff; font-weight:bold; padding:15px 20px; cursor:pointer;">Premium Fruits</span>
				<a href="seasonal_fruit.php">Seasonal Fruits</a>
				<a href="citrus_fruit.php">Citrus Fruits</a>
				<a href="stone_fruit.php">Stone Fruits</a>
			</p>
			
		<!-- Three -->
			<section id="three" class="wrapper style1">
			
			<div class="container">
					<header class="major">
						<h2>Premium Fruits</h2>
					</header>
					<div class="row">
						<div class="4u 6u(2) 12u$(3)">
							<article class="box post">
								<a href="#" class="image fit"><img src="images/yubari_king_melon.jpg" alt="" /></a>
								<h3>Yubari King Melons</h3>
								<p>
									Region: Yubari City, Hokkaido, Japan.<br>
									Season: Late spring to early summer (April to June). <br>
									Nutritional Benefits: Rich in vitamins A and C, providing antioxidants and promoting skin health.
								</p>
								<ul class="actions">
									<li><a href="customer_view_product_list1.php" class="button">Shop Now</a></li>
								</ul>
							</article>
						</div>
						<div class="4u 6u$(2) 12u$(3)">
							<article class="box post">
								<a href="#" class="image fit"><img src="images/Kyoho_Grapes.jpg" alt="" /></a>
								<h3>Kyoho Grapes</h3>
								<p>
									Region: Nagano and Yamanashi Prefectures.<br>
									Season: Late summer to early fall (August to September).<br>
									Nutritional Benefits: Packed with antioxidants and vitamin K, supporting heart and bone health.
								</p>
								<ul class="actions">
									<li><a href="customer_view_product_list1.php" class="button">Shop Now</a></li>
								</ul>
							</article>
						</div>
						<div class="4u$ 6u(2) 12u$(3)">
							<article class="box post">
								<a href="#" class="image fit"><img src="images/Shine_Muscat_Grapes.webp" alt="" /></a>
								<h3>Shine Muscat Grapes</h3>
								<p>
									Region: Okayama and Nagano Prefectures.<br>
									Season: Late summer to early fall (August to September).<br>
									Nutritional Benefits: Low in calories but high in natural sugars, making them a healthier dessert option.
								</p>
								<ul class="actions">
									<li><a href="customer_view_product_list1.php" class="button">Shop Now</a></li>
								</ul>
							</article>
						</div>
						<div class="4u 6u(2) 12u$(3)">
							<article class="box post">
								<a href="#" class="image fit"><img src="images/Ruby_Roman_Grapes.jpg" alt="" /></a>
								<h3>Ruby Roman Grapes</h3>
								<p>
									Region: Ishikawa Prefecture.<br>
									Season: Late summer to early fall (July to September).<br>
									Nutritional Benefits: A good source of resveratrol, known for its anti-aging and heart-health properties.
								</p>
								<ul class="actions">
									<li><a href="customer_view_product_list1.php" class="button">Shop Now</a></li>
								</ul>
							</article>
						</div>
						
						<div class="4u 6u(2) 12u$(3)">
							<article class="box post">
								<a href="#" class="image fit"><img src="images/Densuke Watermelon.jpg" alt="" /></a>
								<h3>Densuke Watermelon</h3>
								<p>
									Region: Hokkaido, Japan.<br>
									Season: Summer months in Japan from June to August.<br>
									Nutritional Benefits: Rich in lycopene, an antioxidant linked to heart health and cancer prevention.
								</p>
								<ul class="actions">
									<li><a href="customer_view_product_list1.php" class="button">Shop Now</a></li>
								</ul>
							</article>
						</div>
						
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