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
	
	$itemid= $_REQUEST["item_id"];

}

?>

<!DOCTYPE HTML>

<html>
	<head>
		<title>Rate and Comment</title>
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
			var rating = document.ratefrm.rating.value;
			var comment = document.ratefrm.comment.value;
			
			if (rating == "" )
			{
				document.getElementById("err_rating").innerHTML="Please choose a rating.";
				no_error = false;
			}
			else
			{
				document.getElementById("err_rating").innerHTML="";
			}
			
			if (comment == "" )
			{
				document.getElementById("err_comment").innerHTML="Please write your comment.";
				no_error = false;
			}
			else
			{
				document.getElementById("err_comment").innerHTML="";
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
					<header class="major">
						<h2>Rate and Comment</h2>
					</header>
					
					<div class="ratencomm">
					
						<div class="ratencommbox1">
					
						<?php

						$get_item = mysqli_query($conn, "select * from itemtbl,producttbl where itemtbl.product_id=producttbl.product_id and item_id = $itemid");
						$rec = mysqli_fetch_assoc($get_item);
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
					
						echo "<div class='ratebox1'>";
							echo "<img src='".$filename."'>";
						echo "</div>";
						
						echo "<div class='ratebox2'>";
							echo "<p><b>Product : </b>".$rec["product_name"]."</p>";
							echo "<p><b>Price : </b>RM ".number_format($rec["product_price"],2)."</p>";
							echo "<p><b>Quantity Ordered : </b>".$rec["item_quantity"]."</p>";
							echo "<p><b>Total : </b>RM ".number_format($item_total,2)."</p>";
						echo "</div>";
						?>
						
						</div>
						
						<div class="ratencommbox2">
						
						<h3>Rate this product</h3>
					
							<form name="ratefrm" action="" method="post" onsubmit="return check_form();">
		
								<p>
									<label>Rating :</label> 
									<input type="radio" name="rating" value="1"  <?php if($rec["item_rating"]==1) echo "checked";?>/> 1 Star &nbsp;&nbsp;&nbsp;&nbsp;
									<input type="radio" name="rating" value="2"  <?php if($rec["item_rating"]==2) echo "checked";?>/> 2 Star &nbsp;&nbsp;&nbsp;&nbsp;
									<input type="radio" name="rating" value="3"  <?php if($rec["item_rating"]==3) echo "checked";?>/> 3 Star &nbsp;&nbsp;&nbsp;&nbsp;
									<input type="radio" name="rating" value="4"  <?php if($rec["item_rating"]==4) echo "checked";?>/> 4 Star &nbsp;&nbsp;&nbsp;&nbsp;
									<input type="radio" name="rating" value="5"  <?php if($rec["item_rating"]==5) echo "checked";?>/> 5 Star &nbsp;&nbsp;&nbsp;&nbsp;
									<br><span id="err_rating" style="color:red; font-style:italic; font-size:0.8em;"></span>
								</p>
								
								
								
								<p>
									<label>Comment :</label> 
									<textarea name="comment" rows="4" cols="50"><?php echo $rec["item_comment"]; ?></textarea>
									<span id="err_comment" style="color:red; font-style:italic; font-size:0.8em;"></span>
								</p>
								
								<p><input type="submit" name="ratebtn" value="Rate" /></p>
							
							</form>
						
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

if (isset($_POST["ratebtn"])) 
{
	$rating = $_POST ["rating"];
	
	$comment = $_POST ["comment"];
	
	$current_date = date("Y-m-d");

	mysqli_query($conn,"update itemtbl set item_rating = $rating, item_comment = '$comment', item_rating_date = '$current_date' where item_id = $itemid");

	echo
	"<script type='text/javascript'>
		alert('Your rating and comment have been recorded. Thank you.');
		window.location.href='customer_rate_comment.php?item_id=$itemid';
	</script>";
}

?>