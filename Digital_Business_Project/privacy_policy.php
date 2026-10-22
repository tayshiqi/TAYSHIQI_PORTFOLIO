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
		<title>Privacy Policy </title>
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
					<h2>Privacy Policy</h2>
					<p style="font-size:1em;">Last Updated: 30th November 2024</p>
				</header>
				<div class="container">
						
					<!-- Content -->
						<section id="content" style="text-align:justify;">
							<p>At Kanso Fruits ("we", "our", "us"), we are committed to protecting your privacy. This Privacy 
							Policy explains how we collect, use, and protect your personal data when you visit our website 
							at <a href="index.php">Kanso Fruits</a> (the "Site") and make purchases through our platform. 
							By using our Site, you agree to the practices described in this policy.</p>
						
						<ol>
						
						<b><li><h3>Information We Collect</h3></li></b>
								<p>We collect personal data from you when you interact with our Site, including:</p>
								<ul>
									<li><b>Personal Identification Information:</b></li>
										<ul style="list-style-type:circle;">
											<li>Name</li>
											<li>Email address</li>
											<li>Phone number</li>
											<li>Delivery address</li>
											<li>Payment information (e.g., credit card, PayPal)</li>
										</ul>
										
									<li><b>Non-Personal Information:</b></li>
										<ul style="list-style-type:circle;">
											<li>Purchase history</li>
										</ul>
										
									<li><b>Cookies and Tracking Technologies: </b> We use cookies to improve your experience 
									on our Site. Cookies help us remember your preferences and track website usage for 
									analytical purposes.</li>
								</ul>
						
						<b><li><h3>How We Use Your Information</h3></li></b>
								<p>We use your personal data for the following purposes:</p>
								<ul>
									<li><b>Order Processing: </b> To process and fulfill your orders, including payment 
									processing and product delivery.</li>
									<li><b>Customer Service: </b> To respond to inquiries, provide order status updates, 
									and resolve any issues related to your purchase.</li>
									<li><b>Account Management: </b> To create and manage your account for a personalized 
									shopping experience, including storing your order history and preferences.</li>
									<li><b>Marketing and Promotions: </b> With your consent, we may send promotional emails, 
									offers, and newsletters related to our products. You can opt out at any time by clicking 
									the "unsubscribe" link in our emails or contacting us directly.</li>
									<li><b>Site Improvement: </b> To improve our website and services by analyzing user 
									behavior and interactions with the Site.</li>
									<li><b>Compliance with Legal Obligations: </b> To comply with legal obligations, such as 
									responding to government or law enforcement requests.</li>
								</ul>
								
								
						<b><li><h3>How We Protect Your Information</h3></li></b>
								<p>We take the security of your personal data seriously and implement reasonable measures 
								to protect it:</p>
								<ul>
									<li><b>Encryption: </b> We use secure socket layer (SSL) technology to encrypt sensitive data during transmission.</li>
									<li><b>Access Control: </b> Only authorized personnel can access your personal data for 
									order processing or customer support.</li>
									<li><b>Data Storage: </b> Your personal data is stored securely on our servers, protected 
									by industry-standard security practices.</li>
								</ul>
								<p>While we take reasonable precautions to protect your data, no method of data transmission 
								or storage is 100% secure. We cannot guarantee absolute security of your personal data.</p>		
								
						<b><li><h3>Sharing Your Information</h3></li></b>
								<p>We will not sell, trade, or rent your personal data to third parties. However, we may 
								share your data with trusted service providers and partners for the following purposes:</p>
								<ul>
									<li><b>Payment Processors: </b> To process payments securely (e.g., credit card companies, 
									PayPal).</li>
									<li><b>Shipping Partners: </b> To deliver your products 
									(e.g., courier companies, logistics providers).</li>
									<li><b>Legal Compliance: </b> We may disclose personal data if required by law, or in 
									response to lawful requests by public authorities, such as a court order or government 
									agency.</li>
								</ul>
								<p>These third-party service providers are contractually obligated to protect your data and 
								use it only for the purposes specified by us.</p>
							
						<b><li><h3>Data Retention</h3></li></b>
								<p>We retain your personal data only for as long as necessary to fulfill the purposes outlined 
								in this Privacy Policy or as required by law. If you wish to delete your personal data or 
								request its removal, please email us at <a href="mailto:kansofruit@gmail.com">
								kansofruit@gmail.com</a>.</p>
							
						<b><li><h3>Your Rights</h3></li></b>
								<p>Under Malaysia’s <b>Personal Data Protection Act 2010 (PDPA)</b>, you have the following 
								rights regarding your personal data:</p>
								<ul>
									<li><b>Right to Access: </b> You can request a copy of the personal data we hold about you.</li>
									<li><b>Right to Correct: </b> You can request corrections to any inaccurate or incomplete 
									personal data we hold about you.</li>
									<li><b>Right to Withdraw Consent: </b> You may withdraw your consent from us to process 
									your personal data at any time, including marketing communications.</li>
									<li><b>Right to Erasure: </b> You may request the deletion of your personal data, subject 
									to legal exceptions.</li>
								</ul>
								<p>To exercise any of these rights, please email us at <a href="mailto:kansofruit@gmail.com">
								kansofruit@gmail.com</a>. We will respond to your request in accordance with the PDPA.</p>
							
						<b><li><h3>Third-Party Websites</h3></li></b>
								<p>Our Site may contain links to third-party websites or services that are not operated by us. 
								We are not responsible for the content, privacy practices, or policies of these third-party 
								sites. We recommend reviewing their privacy policies before providing them with any personal 
								data.</p>
							
						<b><li><h3>Changes to This Privacy Policy</h3></li></b>
								<p>We may update this Privacy Policy from time to time to reflect changes in our practices 
								or for other operational, legal, or regulatory reasons. Any changes will be posted on this 
								page, and the updated policy will take effect immediately upon posting. We encourage you to 
								review this Privacy Policy periodically.</p>
							
						<b><li><h3>Contact Us</h3></li></b>
								<p>If you have any questions or concerns about this Privacy Policy, or if you wish to exercise 
								any of your rights under the PDPA, please <a href="contactus.php">contact us </a> through the form.</p>
						
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