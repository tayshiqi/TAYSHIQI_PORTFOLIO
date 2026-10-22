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

	$ordid = $_REQUEST["order_id"];
}

?>

<!DOCTYPE HTML>

<html>
	<head>
		<title>Order Details</title>
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
				<a href='customer_order_list.php' class='icon fa-chevron-left'></a>
					<header class="major">
						<h2>Order Details - Order # <?php echo $ordid; ?></h2>
					</header>
					
					<div class="mycart">
	
						<?php
		
						$get_item = mysqli_query($conn, "select * from itemtbl,producttbl,ordertbl where 
						itemtbl.product_id=producttbl.product_id and ordertbl.order_id=itemtbl.order_id and itemtbl.order_id = $ordid");
						
						$count = mysqli_num_rows($get_item);
						
						if ($count == 0) 
						{
							echo "<p>No order records found.</p>";
						}
						else
						{
							echo "<table border='1px' class='product-table'>";
							
							echo "<tr>";
							echo "<th style='padding-left:20px;'>Image</th>";
							echo "<th>Product</th>";
							echo "<th>Price</th>";
							echo "<th>Quantity Ordered</th>";
							echo "<th>Total</th>";
							echo "<th>Delivery Date</th>";
							echo "<th>Rate</th>";
							echo "</tr>";
							
							$shipping_fee = 70;
							$overall_total = 0;
							
							while($rec = mysqli_fetch_assoc($get_item))
							{
								$item_id = $rec['item_id'];
								
								if ($rec["product_image"] == "None")
								{
									$filename = "product_image/default.png";
								}
								else
								{
									$filename = "product_image/".$rec["product_image"];
								}

								$pid = $rec["product_id"];
								
								$item_total = $rec["product_price"] * $rec["item_quantity"];
								$overall_total = $overall_total + $item_total + $shipping_fee;
									
								echo "<tr>";
								echo "<td><img src='".$filename."' style='width:200px;'></td>";
								echo "<td>".$rec["product_name"]."</td>";
								echo "<td>RM ".number_format($rec["product_price"],2)."</td>";
								echo "<td>".$rec["item_quantity"]."</td>";
								echo "<td>RM ".number_format($item_total,2)."</td>";
								echo "<td>";
									
									if ($rec["order_delivery_date"] == "0000-00-00") 
									{
										echo "Order has not been delivered yet.";
									} 
									else 
									{
										echo $rec["order_delivery_date"];
									}
								
								
								echo "</td>";
								
								if($rec["order_status"] == "Received")
								{
									echo "<td><a href = 'customer_rate_comment.php?item_id=$item_id' style='margin:0px;'>Rate This Item</a></td>";
								}
								else
								{
									echo "<td>Not allowed</td>";
								}
								
								echo "</tr>";
								
							}
							
							echo "</table>";
							
							echo "<br>";
							
							echo "<p><b>Total Product : ".$count."</b></p>";
							
							echo "<p><b>Shipping Fee : RM ".number_format($shipping_fee,2)."</b></p>";
						
							echo "<p><b>Total Payment : RM ".number_format($overall_total,2)."</b></p>";
							
							
						}
						
						
							$get_status = mysqli_query($conn, "select * from ordertbl where order_id =$ordid");
							$rec = mysqli_fetch_assoc($get_status);
							
							if ($rec["order_status"] != "Received")
							{
							
							?>
							
							<div class="rev-info">
							
								<h2>Update Your Order Status </h2>
							
								<p>We hope you're enjoying your recent purchase from us! If you've already received your items, 
								please take a moment to update the order status. Updating your order status will allow you to leave a rating 
								and comment about the items, helping us refine and improve our products and services. If you have any 
								questions or concerns regarding your order, feel free to reach out to us. Thank You.</p>
						
								
								<form name="deliverfrm" action="" method="post">
									
									<p style="margin: 0; padding: 0;">Delivery Status :
									<div class="select-wrapper">
									<select name="delivery_status">
										<option value="<?php echo $rec["order_status"]; ?>"><?php echo $rec["order_status"]; ?></option>
										<option value="Received">Received</option>
									</select>
									</div>
									</p>
									<input type="submit" name="submitbtn" value="Update Status" />
									
								</form>
								
								<?php
								
								}
								
								?>	
							
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

<?php

if (isset($_POST["submitbtn"]))
{
	$status = $_POST ["delivery_status"];

	mysqli_query ($conn, "update ordertbl set order_status ='$status' where order_id = $ordid");
	
	echo "<script type='text/javascript'>
		alert('Delivery status updated successfully');
		window.location.href='customer_view_order_details.php?order_id=" . $ordid . "';
	</script>";
	
	//header("Location: customer_view_order_details.php?order_id=$ordid");

}

?>