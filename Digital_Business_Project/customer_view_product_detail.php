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
		<title>User Product Details</title>
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
					
					<div class="custpro">
					
					<?php
					
					$pid = $_REQUEST["view_pk"];
					$get_product_list = mysqli_query($conn,"select * from producttbl, categorytbl WHERE product_id = $pid AND producttbl.category_id = categorytbl.category_id ");
					$prod_rec= mysqli_fetch_assoc($get_product_list);
					
					$get_average = mysqli_query ($conn, "select avg(item_rating) as average_rating from itemtbl where product_id =$pid AND item_rating !=0");
						
					$rec = mysqli_fetch_assoc ($get_average);
		
						
						if ($prod_rec["product_image"] == "None")
							{
								$filename = "product_image/default.png";
							}
							else
							{
								$filename = "product_image/".$prod_rec["product_image"];
							}
							
					echo "<h3><a href='customer_view_product_list.php' class='icon fa-angle-left'></a>&nbsp;&nbsp;&nbsp;".$prod_rec['product_name']."</h3>";
					
					echo "<div class='custprobox1'>";
					
					echo "<img src='".$filename."'>";
						
					echo "<p><i>'".$prod_rec['product_description']."'</i></p>";	
					
					echo "</div>";
				
					echo "<div class='custprobox2'>";
					
					echo "<h4 style='text-decoration:underline;'>Product Details</h4>";
				
					echo "<p style='color:red; font-size:2em; font-weight:bold;'>RM ".$prod_rec['product_price']." per kg</p>";
					
					echo "<p>Stock : ".$prod_rec['product_stock_level']. "</p>";
					
					echo "<p>Category : ".$prod_rec['category_name']."</p>"; 
					
					echo "<p>Shipping: <img src='images/dhl.jpg' title='DHL Logistics' alt='DHL Logistics' style='width:60px; height:15px; border-radius:0px;'/>&nbsp;&nbsp;DHL Temperature Controlled Logistics (3-5 days)</p>";
					
					echo "<p>Shipping Fee: RM 70.00</p>";
					
					echo "<p>Packaging: <img src='images/packaging.png' title='Be Green Packaging' alt='Be Green Packaging' style='width:50px; height:20px; border-radius:0px; '/>[Eco-friendly Materials]</p>";
					
					for ($x = 1; $x <=5 ; $x++)
					{
						if ($x <= number_format($rec["average_rating"],0))
						{
							echo "&#11088;"; 
						}
						else 
						{
							echo "&#9734;"; 
						}
					}
					
					?>
					
					<br>
					
					<form name="orderfrm" action="" method="post" class="order">
		
						<p class="quantity"><b>Quantity: </b>&nbsp;&nbsp;&nbsp;<input type="number" name="prodqty">
						<input type="hidden" name="prodid" value="<?php echo $prod_rec['product_id']; ?>">
						<input type="hidden" name="prodprice" value="<?php echo $prod_rec['product_price']; ?>">
						<input type="hidden" name="prodstock" value="<?php echo $prod_rec['product_stock_level']; ?>">
						
						<br><br>
						
						<input type="submit" name="orderbtn" value="Add to Cart">
						
						</p>
						
					</form>
					
					</div>
					
					<hr>
					
					<h3>Product Ratings</h3>
					
					<div class="formfilter">
	
					<form name="ratefilter" action="" method="post">
						<p>Filter Rating :&nbsp;&nbsp;&nbsp;&nbsp;
						<input type="radio" name="rating" value="1" <?php if (isset($_POST['rating']) &&
						$_POST['rating'] == 1) echo "checked"; ?> onchange="this.form.submit()" /> 1 Star
						&nbsp;&nbsp;&nbsp;&nbsp;
						<input type="radio" name="rating" value="2" <?php if (isset($_POST['rating']) &&
						$_POST['rating'] == 2) echo "checked"; ?> onchange="this.form.submit()" /> 2 Star
						&nbsp;&nbsp;&nbsp;&nbsp;
						<input type="radio" name="rating" value="3" <?php if (isset($_POST['rating']) &&
						$_POST['rating'] == 3) echo "checked"; ?> onchange="this.form.submit()" /> 3 Star
						&nbsp;&nbsp;&nbsp;&nbsp;
						<input type="radio" name="rating" value="4" <?php if (isset($_POST['rating']) &&
						$_POST['rating'] == 4) echo "checked"; ?> onchange="this.form.submit()" /> 4 Star
						&nbsp;&nbsp;&nbsp;&nbsp;
						<input type="radio" name="rating" value="5" <?php if (isset($_POST['rating']) &&
						$_POST['rating'] == 5) echo "checked"; ?> onchange="this.form.submit()" /> 5 Star
					</form>
					
					</div>
					
						<?php 
	
						if (isset($_POST["rating"]))
							{
								$rate = $_POST["rating"];
								$get_info = mysqli_query($conn, "select * from customertbl, ordertbl, itemtbl where 
								customertbl.cust_id=ordertbl.cust_id AND ordertbl.order_id = itemtbl.order_id AND product_id = $pid and item_rating = $rate");
							
							}
							else 
							{
								$get_info = mysqli_query($conn, "select * from customertbl, ordertbl, itemtbl where 
								customertbl.cust_id=ordertbl.cust_id AND ordertbl.order_id = itemtbl.order_id AND product_id = $pid and item_rating != 0");
							}
						
						
						$count = mysqli_num_rows($get_info);
						
						if ($count == 0)
						{
							echo "No records of comments or ratings found for this product.";
						}
						else
						{
							while($rec = mysqli_fetch_assoc($get_info))
							{
								if ($rec["cust_image"] == "")
									{
										$filename = "customer_image/user.png";
									}
									else
									{
										$filename = "customer_image/".$rec["cust_image"];
									}
									
									
									$cid = $rec["cust_id"];
									
								echo "<div class='ratingbox'>";
								
									echo "<div class='ratingbox1'>";
										echo "<img src='".$filename."'>";
									echo "</div>";
									
									echo "<div class='ratingbox2'>";
										echo "<p>";
										echo "<b>".$rec["cust_name"]."</b>";
										echo "<br>";
										
											for ($x = 1; $x <=5 ; $x++)
											{
												if ($x <= number_format($rec["item_rating"],0))
												{
													echo "&#11088;"; 
												}
												else 
												{
													echo "&#9734;"; 
												}
											}
											
										echo "</p>";
										
									echo "</div>";
									
									echo "<div class='ratingbox3' style='font-size:0.8em;'>";
										echo "[".$rec["item_rating_date"]."]";
									echo "</div>";
									
								echo "</div>";
								echo "<p><b>Comment : </b>".$rec["item_comment"]."</p>";
						
							}
						
							echo "<b>Total comments and ratings found : ".$count."</b>";
					
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

if (isset($_POST["orderbtn"])) 
{
	if($_POST["prodqty"]=="")
	{
		echo
		"<script type='text/javascript'>
			alert('Please fill the quantity required');
		</script>
		";
	}
	else
		if($_POST["prodqty"] > $prod_rec['product_stock_level'])
		{
			echo
			"<script type='text/javascript'>
				alert('The ordered quantity cannot be fulfilled. It is more than the availabe stock level.');
			</script>
			";
				
		}
		else if($_POST["prodqty"] < 1 )
		{
			echo
			"<script type='text/javascript'>
				alert('The ordered quantity cannot be less than one.');
			</script>
			";
		}
		else
		{
			if(isset($_SESSION["order"]))
			{
				$order = $_SESSION["order"];
			}
			
			$item = array(
			"pid" => $_POST["prodid"],
			"pprice" => $_POST["prodprice"],
			"pqty" => $_POST["prodqty"],
			"pstock" => $_POST["prodstock"]
			);
			
			$order[] = $item;
			
			$_SESSION["order"] = $order;
			
			echo
			"<script type='text/javascript'>
				alert('Item added to cart.');
			</script>
			";
		}
}


?>