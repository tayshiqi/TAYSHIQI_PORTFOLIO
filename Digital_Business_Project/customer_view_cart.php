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
		<title>My Cart</title>
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
			<section id="three" class="wrapper style1">
				<div class="container">
				<a href='customer_view_product_list.php' class='icon fa-chevron-left'></a>
					<header class="major">
						<h2>My Cart</h2>
					</header>
					
					<div class="mycart">
	
						<?php
		
						if(!isset($_SESSION["order"]))
						{
							echo "Your cart is empty.";
							
						}
						else
						{
							$order = $_SESSION["order"];
							$shipping_fee = 70;
							$overall_total = 0;
							
							echo "<table border='1px' class= 'my-cart'>";
							echo "<tr>";
							echo "<th style='padding-left:20px;'>Image</th>";
							echo "<th>Product</th>";
							echo "<th>Each (RM)</th>";
							echo "<th>Quantity</th>";
							echo "<th>Total (RM)</th>";
							echo "</tr>";
						
							for ($x=0; $x<count($order); $x++ )
							{
								$get_product = mysqli_query ($conn, "select * from producttbl where product_id =".$order[$x]["pid"]);
								$prod_rec = mysqli_fetch_assoc($get_product);
								
								if ($prod_rec["product_image"] == "None")
								{
									$filename = "product_image/default.png";
								}
								else
								{
									$filename = "product_image/".$prod_rec["product_image"];
								}
								
								$individual_total = $order[$x]["pprice"] * $order[$x]["pqty"];
								
								$overall_total = $overall_total + $individual_total + $shipping_fee;
								
								echo "<tr>";
								
								echo "<td style='width:200px;'><img src='".$filename."'><br><a href='customer_view_cart.php?delete=$x'>Remove</a></td>";
								
								echo "<td>".$prod_rec['product_name']."</td>";

								echo "<td>".$order[$x]["pprice"]."</td>";
								
								echo "<td>".$order[$x]["pqty"]."</td>";
								
								echo "<td>".number_format($individual_total,2)."</td>";
								
								echo "</tr>";
								
							}
							
							echo "</table>";
							
							echo "<br><p style='text-align:right; font-weight:bold;'> Shipping Fee : RM ".number_format($shipping_fee,2)."</p>";
							
							echo "<p style='text-align:right; font-weight:bold;'> Total Amount : RM ".number_format($overall_total,2)."</p>";
					
							echo "<p style='text-align:right;'><a href='customer_checkout.php'>Checkout</a></p>";	
						}
						
						?>
					
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

if (isset($_REQUEST["delete"])) 
{

	$x = $_REQUEST ["delete"];
	
	$order = $_SESSION["order"];
	
	unset($order[$x]);
	
	$order = array_values($order);
	
	$_SESSION["order"] = $order;
	
	echo "<script>
		window.location.href='customer_view_cart.php';
		</script>";
	
	//header("Location: customer_view_cart.php");
}


?>