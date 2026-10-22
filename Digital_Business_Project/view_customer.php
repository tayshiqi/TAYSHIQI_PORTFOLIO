<?php
include "config.php";

$sess_aid = $_SESSION["sess_aid"];

$get_admin = mysqli_query($conn, "select * from admintbl where admin_id=$sess_aid");

$admin_rec = mysqli_fetch_assoc($get_admin );

?>

<!DOCTYPE HTML>

<html>
	<head>
		<title>Customer List</title>
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
				
				<p><span style="background-color:#e0555a; color:white; border-radius:40px 0px 0px 40px; cursor:pointer; display:flex; 
				align-items:center; padding:10px 15px;"><i class="fa fa-users"></i>Customer</span></p>	
				
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
				
					<h3>Customer List</h3>
					
					<hr>
					
					<?php
		
					$get_customer = mysqli_query($conn, "select * from customertbl");

					$count = mysqli_num_rows($get_customer);
					
					if ($count == 0)
					{
						echo "No user record were found.";
					}
					else
					{
						echo "<table border='1px' class= 'product-table'>";
						
						echo "<tr>";
						echo "<th>No.</th>";
						echo "<th>User Profile</th>";
						echo "<th>Name</th>";
						echo "<th>Contact</th>";
						echo "<th>Email</th>";
						echo "<th>Gender</th>";
						echo "<th>Date of Birth</th>";
						echo "<th>Join Date</th>";
						echo "<th>Details</th>";
					
						$x=1; 

						while($cust_rec = mysqli_fetch_assoc($get_customer ))
						{
							if ($cust_rec["cust_image"] == "")
							{
								$filename = "customer_image/user.png";
							}
							else
							{
								$filename = "customer_image/".$cust_rec["cust_image"];
							}
							$cid = $cust_rec["cust_id"];

							echo "<tr>"; 

							echo "<td>". $x ."</td>";
							
							echo "<td><img src='".$filename."'></td>";

							echo "<td>".$cust_rec['cust_name']."</td>";

							echo "<td>";
							
								if ($cust_rec['cust_contact'] == '' )
								{
									echo "Not Provided";
								}
								else
								{
									echo $cust_rec['cust_contact'];
								}
							
							echo "</td>";
							
							echo "<td>".$cust_rec['cust_email']."</td>";

							echo "<td>";
							
								if ($cust_rec['cust_gender'] == '' )
								{
									echo "Not Specified";
								}
								else
								{
									echo $cust_rec['cust_gender'];
								}
							
							echo "</td>";
							
							echo "<td>";
								
								if ($cust_rec['cust_dob'] == '0000-00-00' )
								{
									echo "Not Entered";
								}
								else
								{
									echo $cust_rec["cust_dob"];
								}
							
							echo "</td>";
							
							echo "<td>".$cust_rec['cust_join_date']."</td>";
							
							echo "<td><a href='view_customer_detail.php?view_pk=".$cust_rec['cust_id']."' class='icon fas fa-eye'></a></td>";
						
							echo "</tr>";
							
							$x++; 
						}
									
					}
					echo "</table>";
					echo "<br>";
					echo "<p><b>Total Users : ".$count."</b></p>"; 	

					?>
				
									
				
				</div>

			</div>
		
		</div>
	
	</div>

	</body>
</html>


