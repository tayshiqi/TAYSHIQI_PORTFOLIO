<?php
include "config.php";

$sess_aid = $_SESSION["sess_aid"];

$get_admin = mysqli_query($conn, "select * from admintbl where admin_id=$sess_aid");

$admin_rec = mysqli_fetch_assoc($get_admin );

?>

<!DOCTYPE HTML>

<html>
	<head>
		<title>Admin Profile</title>
		<link rel="icon" href="images/logo.png" type="images/png">
		<link rel="stylesheet" href="css/admin_design.css" />
		<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<style type="text/css">
	
	#down{
		background-color:#FBF8EF;
	}
	
	</style>
	
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
			
				<h3 style="color:#e0555a; text-align:center; font-size:2.5em;">Admin Profile</h3>
				
				<div class="adminprofilebox">
				
				<p class="adacc">
					<a href="admin_profile.php" class="icon fas fa-user">&nbsp;&nbsp;Profile</a>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<a href="edit_admin_profile.php?edit_pk=$sess_aid" class="icon fas fa-pencil-square-o ">&nbsp;Edit Profile</a>
				</p>
				
				<hr><br>
				
				<?php
		
					if ($admin_rec["admin_image"] == "")
					{
						$filename = "admin_image/default.webp";
					}
					else
					{
						$filename = "admin_image/".$admin_rec["admin_image"];
					}
					
					echo "<div class='adprofpic'>";
					
						echo "<img src='".$filename."'>";
						
					echo "</div>";
						
					echo "<div class='adprofdetail'>";
					
						echo"<label>Name </label><p>:&nbsp;".$admin_rec["admin_name"]."</p>";
									
						echo"<label>Email Address </label><p>:&nbsp;".$admin_rec["admin_email"]."</p>";
									
						echo"<label>Contact </label><p>:&nbsp;";
									
								if ($admin_rec["admin_contact"] == '' )
								{
									echo "Not Provided";
								}
								else
								{
									echo $admin_rec["admin_contact"];
								}
										
						echo "</p>";
									
						echo "<label>Gender </label><p>:&nbsp;";
									
								if ($admin_rec["admin_gender"] == '' )
								{
									echo "Not Specified";
								}
								else
								{
									echo $admin_rec["admin_gender"];
								}
									
						echo "</p>";
					
					echo "</div>";
							
				?>
				
				</div>

			</div>
		
		</div>
	
	</div>

	</body>
</html>


