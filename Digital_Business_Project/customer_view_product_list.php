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
		<title>User Product List</title>
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
		.product1{
			width:33.3333333333%;
			height:550px;
		}
		
		.product1 img{
			width:100%;
			height:250px;
		}
		
		.product1 a{
			text-decoration:none;
			outline:none;
			padding:0.8em 1.8em;
			border:1px solid #e0555a;
			border-radius:10px;
			font-weight:bold;
		}
		
		.product1 a:hover{
			color:#fff !important;
			background-color:#e0555a;
			border:none;
		}
		
		p.productlink {
			text-align:center;
			margin:0px 0px 20px 0px;
			padding:10px;
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
					
					<header class="major">
						<h2>Product List</h2>
					</header>
					<!-- Product Link-->	
					<p class="productlink">
						<span style="background-color:#e0555a; color:#fff; font-weight:bold; padding:15px 20px; cursor:pointer;">All</span>
						<a href="customer_view_product_list1.php">Premium Fruits</a>
						<a href="customer_view_product_list2.php">Seasonal Fruits</a>
						<a href="customer_view_product_list3.php">Citrus Fruits</a>
						<a href="customer_view_product_list4.php">Stone Fruits</a>
					</p>
					
					<div class="row">
					
					<?php
					
					$get_product_list = mysqli_query($conn,"select * from producttbl,categorytbl WHERE producttbl.category_id = categorytbl.category_id ");
					
					$count = mysqli_num_rows($get_product_list);

					while($prod_rec = mysqli_fetch_assoc($get_product_list))
					{
						if ($prod_rec["product_image"] == "None")
							{
								$filename = "product_image/default.png";
							}
							else
							{
								$filename = "product_image/".$prod_rec["product_image"];
							}
					
						$pid = $prod_rec["product_id"];
						
						$get_average = mysqli_query ($conn, "select avg(item_rating) as average_rating from itemtbl where product_id =$pid AND item_rating !=0");
						
						$rec = mysqli_fetch_assoc ($get_average);
						
						echo "<div class='product1'>";
							echo "<article class='box post'>";
								echo "<img src='".$filename."' class='image fit'>";
								echo "<h3>".$prod_rec['product_name']. "</h3>";
								echo "<p>";
								echo "<span style='color:red; font-weight:bold;'>RM".$prod_rec['product_price']." per kg</span>";
								
								echo "<br>";	
								
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
															
								echo "<br><br>";
								echo "<a href='customer_view_product_detail.php?view_pk=".$prod_rec['product_id']."'>View Details</a>";
								echo "</p>";
							echo "</article>";
						echo "</div>";
					
					}

					?>
												
					</div>
				<?php
					echo "<p>Total Products : ".$count. "</p>"; 
				
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