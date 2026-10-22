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
		<title>Frequently Asked Questions</title>
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
				<header class="major">
					<h2>Frequently Asked Questions (FAQs)</h2>
				</header>
				<div class="container">
						
					<!-- Content -->
						<section id="content" style="text-align:justify;">
						
						<ol>
						
						<b><li><h3>What categories of Japanese fruits do you sell?</h3></li></b>
								<p>We offer a variety of Japanese fruits across several categories, including:</p>
								<ul>
									<li>Premium Fruits (e.g., Kyoho Grapes and Shine Muscat Grapes)</li>
									<li>Seasonal Fruits (e.g., Sato Nishiki and Kaki)</li>
									<li>Citrus Fruits (e.g., Yuzu and Dekopon)</li>
									<li>Stone Fruits (e.g., Ume and Ruby Sakuranbo)</li>
								</ul>
								<p>All our fruits are carefully sourced from Japan and delivered to you fresh.</p>
						
						<b><li><h3>How do I know the fruits are fresh?</h3></li></b>
								<p>We take great pride in sourcing fruits directly from trusted Japanese farms and suppliers. 
								All our fruits are handpicked at peak ripeness, packed with care, and shipped promptly to 
								ensure maximum freshness. We also use special packaging to maintain quality during transit.</p>
						
						<b><li><h3>Are your fruits organic?</h3></li></b>
								<p>While most of our Japanese fruits are grown with minimal use of chemicals, not all of them 
								are certified organic. However, we prioritize working with trusted Japanese farms that follow 
								sustainable and responsible farming practices.</p>						
						
						<b><li><h3>How can I store my Japanese fruit to keep it fresh?</h3></li></b>
								<p>To maintain the freshness of your Japanese fruit:</p>
								<ul>
									<li><b>Soft fruits </b> like peaches, strawberries, and grapes should be kept in the fridge
									after purchase.</li>
									<li><b>Melons </b> can be kept at room temperature until they ripen, then transferred 
									to the fridge.</li>
									<li><b>Citrus fruits </b> should be stored in a cool, dry place or in the fridge to 
									extend freshness.</li>
								</ul>
								
						<b><li><h3>Do you offer returns or refunds?</h3></li></b>
								<p>Due to the perishable nature of our products, we do not accept returns or refunds once 
								the fruit has been delivered. However, if you receive damaged or defective products, 
								please contact us within 24 hours of delivery, and we will arrange for a replacement or refund.</p>
							
						<b><li><h3>Can I track my order?</h3></li></b>
								<p>Yes, you will receive an order confirmation email with a tracking link once your order 
								has shipped. You can use this link to monitor your delivery status in real-time.</p>
								
						<b><li><h3>Do you sell any Japanese fruit in season?</h3></li></b>
								<p>Yes, we offer seasonal Japanese fruits depending on availability. For example, Yubari 
								King Melons are available in summer, and Shine Muscat Grapes are typically available 
								in late summer to early fall. Be sure to sign up for our newsletter to get the latest updates
								on seasonal fruits.</p>
							
						<b><li><h3>Do you ship internationally?</h3></li></b>
								<p>Currently, we only deliver within Malaysia. However, we are looking to expanding to 
								other regions in the future. Please follow us on social media or subscribe to our newsletter 
								for updates.</p>
							
						<b><li><h3>How can I contact customer support?</h3></li></b>
								<p>If you have any questions or need assistance, our customer service team is here to help! 
								You can reach us via <a href="contactus.php"> contact us page</a>.</p>
						
						</ol>
						
						</section>
								
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