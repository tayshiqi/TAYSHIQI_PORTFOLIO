<?php
include "config.php";

$sess_aid = $_SESSION["sess_aid"];

$get_admin = mysqli_query($conn, "select * from admintbl where admin_id=$sess_aid");

$admin_rec = mysqli_fetch_assoc($get_admin );

?>

<!DOCTYPE HTML>

<html>
	<head>
		<title>Customer Information</title>
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
			
				<div class="custinfo">
				
					<h3><a href="view_customer.php" class="icon fas fa-angle-left"></a>&nbsp;&nbsp;Customer Information</h3>
					
					<hr>
					
					<?php
					
					$cid = $_REQUEST["view_pk"]; 
		
					$get_customer = mysqli_query($conn, "select * from customertbl where cust_id = $cid");
					
					$cust_rec = mysqli_fetch_assoc($get_customer );
					
					if ($cust_rec["cust_image"] == "")
					{
						$filename = "customer_image/user.png";
					}
					else
					{
						$filename = "customer_image/".$cust_rec["cust_image"];
					}
					$cid = $cust_rec["cust_id"];
					
					?>
					
					<div class="custinfobox">
					
						<div class="custinfobox1">
							<img src= "<?php echo $filename; ?>">
						</div>
						
						<div class="custinfobox2">
							<p><label>Name</label>: <?php echo $cust_rec['cust_name']; ?></p>
							<p><label>Email</label>: <?php echo $cust_rec['cust_email']; ?></p>
							<p><label>Contact</label>: 
							
							<?php
							
								if ($cust_rec['cust_contact'] == '' )
								{
									echo "Not Provided";
								}
								else
								{
									echo $cust_rec['cust_contact'];
								}
								
							?>
							
							</p>
							
							<p><label>Gender</label>: 
							
							<?php
							
								if ($cust_rec['cust_gender'] == '' )
								{
									echo "Not Specified";
								}
								else
								{
									echo $cust_rec['cust_gender'];
								} 
										
							?>
							
							</p>
							
							<p><label>Date of Birth</label>: 
							<?php 
								
								if ($cust_rec['cust_dob'] == '0000-00-00' )
								{
									echo "Not Entered";
								}
								else
								{
									echo $cust_rec["cust_dob"];
								}

							?>
							
							</p>
							
							<p><label>Join Date</label>: <?php echo $cust_rec['cust_join_date']; ?></p>
						
						</div>
						
					</div>
					
					<div class="table">
					
					<h3>Purchase History</h3>
					
					<?php
							
						$get_order = mysqli_query($conn, "select * from ordertbl where cust_id=$cid");
						
						$count = mysqli_num_rows($get_order);
						
						if ($count == 0)
						{
							echo "<p>No order records found.</p>";
						}
						else
						{
							echo "<table border='1px' class= 'product-table'>";
							echo "<tr>";
							echo "<th>Receiver's Name</th>";
							echo "<th>Receiver's Contact</th>";
							echo "<th>Delivery Address</th>";
							echo "<th>Payment Method</th>";
							echo "<th>Order Date</th>";
							echo "<th>Delivery Status</th>";
							echo "<th>Order Delivery Date</th>";
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
								echo "<td>";
								
								if ($rec["order_delivery_date"] ==  "0000-00-00")
								{
									echo "Order has not been delivered yet.";
								}
								else
								{
									echo $rec["order_delivery_date"];
								}
								
								echo "</td>";
								echo "<td><a href='view_customer_order_details.php?order_id=$ordid'>More</a></td>";
								
								echo "</tr>";

							}
						}
						echo "</table>";
						
						echo "<br>";
					
						echo "<p><b>Total Order : $count</b></p>";
					
					?>
					
					</div>
					
			</div>
		
		</div>
	
	</div>

	</body>
</html>


