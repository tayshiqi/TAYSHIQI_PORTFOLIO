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
		<title>Checkout</title>
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
						<h2>Confirm Your Order</h2>
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
								
								echo "<td style='width:200px;'><img src='".$filename."'></td>";
								
								echo "<td>".$prod_rec['product_name']."</td>";

								echo "<td>".$order[$x]["pprice"]."</td>";
								
								echo "<td>".$order[$x]["pqty"]."</td>";
								
								echo "<td>".number_format($individual_total,2)."</td>";
								
								echo "</tr>";
								
							}
							
							echo "</table>";
							
							echo "<br><p style='text-align:right; font-weight:bold;'> Shipping Fee : RM ".number_format($shipping_fee,2)."</p>";
							
							echo "<p style='text-align:right; font-weight:bold;'> Total Amount : RM ".number_format($overall_total,2)."</p>";
						
						}
						
						?>
					
					</div>
					
					<div class="rev-info">
			
					<h2>Receiver's Information</h2>
			
					<form name="checkoutfrm" action="" method="post" class="checkout" onsubmit="return check_form();">
						<p>Receiver's Name : <input type="text" name="receiver_name" placeholder="Enter Your Name"/>
						<span id="err_receiver_name" style="color:red; font-style:italic; font-size:0.8em;"></span>
						</p>
						<p>Receiver's Contact : <input type="text" name="receiver_contact" placeholder="Enter Your Contact"/>
						<span id="err_receiver_contact" style="color:red; font-style:italic; font-size:0.8em;"></span>
						</p>
						<p>Delivery Address : <textarea name="delivery_address" placeholder="Enter Your Delivery Address" rows="4"></textarea>
						<span id="err_delivery_address" style="color:red; font-style:italic; font-size:0.8em;"></span>
						</p>
						
						<p style="margin: 0; padding: 0;">Payment Method : 
						<div class="select-wrapper">
							<select name="payment_method" >
								<option value="S0">--Select Payment Method--</option>
								<option value="Online Banking">Online Banking</option>
								<option value="Pay-Pal">Pay-Pal</option>
								<option value="Debit Card">Debit Card</option>
								<option value="Credit Card">Credit Card</option>
								<option value="Touch n Go eWallet">Touch n Go eWallet</option>
							</select>
							<span id="err_payment_method" style="color:red; font-style:italic; font-size:0.8em;"></span>
						</div>	
						</p>
						
										
						<p><input type="submit" name="checkoutbtn" value="Place Order" /></p>
						
					</form>
					
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

if (isset($_POST["checkoutbtn"])) 
{

	$receiver_name = $_POST["receiver_name"];

	$receiver_contact = $_POST["receiver_contact"];
	
	$delivery_address = $_POST["delivery_address"];

	$payment_method = $_POST["payment_method"];

	$curr_date = date("Y-m-d");

	$sess_cid = $_SESSION["sess_cid"];
	

	if (isset($_SESSION["order"]))
	{
		$order = $_SESSION["order"];

		mysqli_query($conn, "insert into ordertbl (cust_id, order_date, order_receiver_name, order_receiver_contact, 
		order_delivery_address, order_payment_method, order_status ) values ($sess_cid, '$curr_date', '$receiver_name', 
		'$receiver_contact', '$delivery_address', '$payment_method' , 'Pending')");
		
		$last_order_id = mysqli_insert_id($conn);
		

		for($x=0; $x < count($order); $x++)
		{
			$pid = $order[$x]["pid"];
			$price = $order[$x]["pprice"];
			$quantity = $order[$x]["pqty"];
			$stock = $order[$x]["pstock"];
			
			mysqli_query($conn, "insert into itemtbl (item_quantity,product_id,item_product_price,order_id) 
			values ($quantity,$pid,$price,$last_order_id)");
		
			$balance = $stock - $quantity;

			mysqli_query($conn, "update producttbl set product_stock_level=$balance where product_id=$pid");
		}
		
	unset($_SESSION["order"]);
	}
	
	echo "<script>
		alert('Payment is successful.');
		window.location.href='customer_view_cart.php';
		</script>";

	//header("Location: customer_view_cart.php");
}


?>
