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
		<title>Order List</title>
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
		
		<script type="text/javascript">
	
		function check_form()
		{
			var no_error = true;
			var receiver_name = document.checkoutfrm.receiver_name.value;
			var receiver_contact = document.checkoutfrm.receiver_contact.value;
			var delivery_address = document.checkoutfrm.delivery_address.value;
			var payment_method = document.checkoutfrm.payment_method.value;

			if (receiver_name == "")
			{
				document.getElementById("err_receiver_name").innerHTML="Please key-in the Receiver's Name.";
				no_error = false;
			}
			else
			{
				document.getElementById("err_receiver_name").innerHTML="";
			}
			
			if (receiver_contact == "")
			{
				document.getElementById("err_receiver_contact").innerHTML="Please key-in the Receiver's Contact.";
				no_error = false;
			}
			else
			{
				document.getElementById("err_receiver_contact").innerHTML="";
			}
			
			if (delivery_address == "")
			{
				document.getElementById("err_delivery_address").innerHTML="Please key-in Delivery Address.";
				no_error = false;
			}
			else
			{
				document.getElementById("err_delivery_address").innerHTML="";
			}
			
			if (payment_method == "S0")
			{
				document.getElementById("err_payment_method").innerHTML="Please select a Payment Method.";
				no_error = false;
			}
			else
			{
				document.getElementById("err_payment_method").innerHTML="";
			}
		
			return no_error;
		}
		
	</script>
		
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
				<a href='customer_view_cart.php' class='icon fa-chevron-left'></a>
					<header class="major">
						<h2>Order List</h2>
					</header>
					
					<div class="myorderlist">
					
					<?php
						
						$get_order = mysqli_query($conn, "select * from ordertbl where cust_id=$sess_cid");
						
						$count = mysqli_num_rows($get_order);
						
						if ($count == 0)
						{
							echo "<p>No order records found.</p>";
						}
						else
						{
							echo "<table border='1px'>";
							echo "<tr>";
							echo "<th>Receiver's Name</th>";
							echo "<th>Receiver's Contact</th>";
							echo "<th>Delivery Address</th>";
							echo "<th>Payment Method</th>";
							echo "<th>Order Date</th>";
							echo "<th>Delivery Status</th>";
							echo "<th>More Info</th>";
							echo "</tr>";

							while($rec = mysqli_fetch_assoc($get_order))
							{
								$ordid = $rec["order_id"];
								echo "<tr>";
								echo "<td>".$rec["order_receiver_name"]."</td>";
								echo "<td>".$rec["order_receiver_contact"]."</td>";
								echo "<td>".$rec["order_delivery_address"]."</td>";
								echo "<td>".$rec["order_payment_method"]."</td>";
								echo "<td>".$rec["order_date"]."</td>";
								echo "<td>".$rec["order_status"]."</td>";
								echo "<td><a href='customer_view_order_details.php?order_id=$ordid'>More</a></td>";
								
								echo "</tr>";

							}
						}
						echo "</table>";
						
						echo "<br>";
					
						echo "<p><b>Total Order : $count</b></p>";
					
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

