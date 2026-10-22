 <?php
include "config.php";

$sess_aid = $_SESSION["sess_aid"];

$get_admin = mysqli_query($conn, "select * from admintbl where admin_id=$sess_aid");

$admin_rec = mysqli_fetch_assoc($get_admin );

?>

<!DOCTYPE HTML>

<html>
	<head>
		<title>Product Details</title>
		<link rel="icon" href="images/logo.png" type="images/png">
		<link rel="stylesheet" href="css/admin_design.css" />
		<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
	</head>
	<body>
	
	<div id="body">
	
		<div id="leftnav">
		
			<div id="logo">
				<div class="one">
					<a href="index.html"><img src="images/logo.png" title="Kanso Fruits" alt="Kanso Fruits Logo" /></a>
				</div>
				<div class="two">	
					<a href="index.html">Kanso Fruit</a>
				</div>
			</div>
			
			<div id="sidenav">
				
				<p><a href="admin_dashboard.php"><i class="fa fa-home"></i>Dashboard</a></p>
					
				<p class="three"><i class="fa fa-bar-chart"></i>Product<i class="fa fa-angle-down"></i></p>
					<p class="angle"><a href="add_product.php">Add Product</a></p>
					<p class="angle"><a href="view_product.php">View Product</a></p>
			
				<p class="three"><i class="fa fa-pie-chart"></i>Category<i class="fa fa-angle-down"></i></p>
					<p class="angle"><a href="add_category.php">Add Category</a></p>
					<p class="angle"><a href="view_category.php">View Category</a></p>
					
				<p><a href="view_order.php"><i class="fa fa-shopping-cart"></i>Order</a></p>
					
				<p><a href="view_customer.php"><i class="fa fa-users"></i>Customer</a></p>
					
				<p><a href="view_feedback.php"><i class="fa fa-comments"></i>Feedback</a></p>
				
				<p style="color:#e0555a;"><a href="admin_logout.php"><i class="fa fa-sign-out"></i>Sign Out</a></p>
				
			</div>
	
		</div>
		
		<div id="rightnav">
		
			<div id="top">
			
				<div class="halo">
				
					<p>Hi, <?php echo $admin_rec['admin_name']; ?></p>
		
				</div>
				
				<div class="profile">
				
					<a href="admin_profile.php">
					
						<?php
						
							if ($admin_rec["admin_image"] == "")
							{
								$filename = "admin_image/profile.png";
							}
							else
							{
								$filename = "admin_image/".$admin_rec["admin_image"];
							}
							
							echo "<img src='".$filename."'>";
							
						?>
					
					</a>
					
				</div>
			
			</div>
		
			<div id="down">
			
				<div class="adbox1">
				
					<h3><a href="view_product.php" class="icon fas fa-angle-left"></a>&nbsp;&nbsp;Product Details</h3>
					
					<hr>
					
					<div class="product1">
					
					<?php
		
						$pid = $_REQUEST["view_pk"]; 
						
						$get_average = mysqli_query ($conn, "select avg(item_rating) as average_rating from itemtbl where product_id =$pid AND item_rating !=0");
						
						$rec = mysqli_fetch_assoc ($get_average);
						
						$get_product_list = mysqli_query($conn,"select * from producttbl, categorytbl WHERE product_id = $pid AND producttbl.category_id = categorytbl.category_id ");
						
						$prod_rec= mysqli_fetch_assoc($get_product_list);
						
						if ($prod_rec["product_image"] == "None")
						{
							$filename = "product_image/default.png";
						}
						else
						{
							$filename = "product_image/".$prod_rec["product_image"];
						}
						
					?>
					
					<img src= "<?php echo $filename; ?>">
					</div>
					<div class="product2">
					<h2><?php echo $prod_rec['product_name']; ?></h2>
					<i>"<?php echo $prod_rec['product_description']; ?>"</i>
					
					<p><label>Price </label> : RM <?php echo $prod_rec['product_price']; ?></p>
					<p><label>Stock Level </label> : <?php echo $prod_rec['product_stock_level']; ?> </p>
					<p><label>Date Created </label> : <?php echo $prod_rec['product_date_created']; ?></p>
					<p><label>Category </label> : <?php echo $prod_rec['category_name']; ?></p>
					<p><label>Rating </label> : 
					
					<?php  
						
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
					
					</p>
					
					</div>
				
					<br>
					
					<hr>
					
					<h3>Comments & Ratings</h3>
					
					<div class="formfilter">
	
						<form name="ratefilter" action="" method="post" style="display:flex; flex-wrap:wrap; align-items:center;">
							<p><b>Filter Rating :</b></p>&nbsp;&nbsp;
							<input type="radio" name="rating" value="1" <?php if (isset($_POST['rating']) &&
							$_POST['rating'] == 1) echo "checked"; ?> onchange="this.form.submit()" /> 1 Star
							&nbsp;&nbsp;
							<input type="radio" name="rating" value="2" <?php if (isset($_POST['rating']) &&
							$_POST['rating'] == 2) echo "checked"; ?> onchange="this.form.submit()" /> 2 Star
							&nbsp;&nbsp;
							<input type="radio" name="rating" value="3" <?php if (isset($_POST['rating']) &&
							$_POST['rating'] == 3) echo "checked"; ?> onchange="this.form.submit()" /> 3 Star
							&nbsp;&nbsp;
							<input type="radio" name="rating" value="4" <?php if (isset($_POST['rating']) &&
							$_POST['rating'] == 4) echo "checked"; ?> onchange="this.form.submit()" /> 4 Star
							&nbsp;&nbsp;
							<input type="radio" name="rating" value="5" <?php if (isset($_POST['rating']) &&
							$_POST['rating'] == 5) echo "checked"; ?> onchange="this.form.submit()" /> 5 Star
							&nbsp;&nbsp;
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
										echo "<b><a class='viewcustinfo' href='view_customer_detail.php?view_pk=".$rec['cust_id']."'>".$rec["cust_name"]."</a></b>";
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
								echo "<br>";
							}
							
							
							
							echo "<b>Total comments and ratings found : ".$count."</b>";
					
						}
						
						?>
								
				</div>

			</div>
		
		</div>
	
	</div>

	</body>
</html>

