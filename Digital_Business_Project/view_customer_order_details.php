<?php
include "config.php";

$sess_aid = $_SESSION["sess_aid"];

$get_admin = mysqli_query($conn, "select * from admintbl where admin_id=$sess_aid");

$admin_rec = mysqli_fetch_assoc($get_admin );

$ordid = $_REQUEST["order_id"];

?>

<!DOCTYPE HTML>

<html>
	<head>
		<title>Customer Order Information</title>
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
			
			<div class="table">
			
				<h3>Customer Order Information - Order # <?php echo $ordid; ?></h3>
				
				<hr>
				
				<?php
			
					$get_item = mysqli_query($conn, "select * from itemtbl,producttbl,ordertbl where 
					itemtbl.product_id=producttbl.product_id and ordertbl.order_id=itemtbl.order_id and itemtbl.order_id = $ordid ");
					
					$count = mysqli_num_rows($get_item);
						
					if ($count == 0) 
					{
						echo "<p>No order records found.</p>";
					}
					else
					{
						echo "<table border='1px' class='product-table'>";
							
						echo "<tr>";
						echo "<th>No.</th>";
						echo "<th>Image</th>";
						echo "<th>Product</th>";
						echo "<th>Price</th>";
						echo "<th>Quantity Ordered</th>";
						echo "<th>Total</th>";
						echo "<th>Rating</th>";
						echo "<th>Order Date</th>";
						echo "</tr>";
							
						$x=1;
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
							echo "<td>". $x ."</td>";
							echo "<td><img src='".$filename."' style='width:200px;'></td>";
							echo "<td>".$rec["product_name"]."</td>";
							echo "<td>RM ".number_format($rec["product_price"],2)."</td>";
							echo "<td>".$rec["item_quantity"]."</td>";
							echo "<td>RM ".number_format($item_total,2)."</td>";
							
							echo "<td>";
							
							if ($rec["item_rating"] != 0)
							{
								echo " ".number_format($rec["item_rating"],2);
							}
							else
							{
								echo "No Rating";
							}
								
							echo "</td>";
							
							echo "<td>".$rec["order_date"]."</td>";
								
							echo "</tr>";
								
							$x++; 
								
						}
						
						echo "</table>";
							
						echo "<br>";
							
						echo "<p><b>Total Product : ".$count."</b></p>";
						
						echo "<p><b>Shipping Fee : RM ".number_format($shipping_fee,2)."</b></p>";
						
						echo "<p><b>Total Payment : RM ".number_format($overall_total,2)."</b></p>";
							
							
					}
						
							
				?>
							
			
			</div>
			
			</div>
		
		</div>
	
	</div>

	</body>
</html>