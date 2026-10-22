<?php
include "config.php";

$sess_aid = $_SESSION["sess_aid"];

$get_admin = mysqli_query($conn, "select * from admintbl where admin_id=$sess_aid");

$admin_rec = mysqli_fetch_assoc($get_admin );

?>

<!DOCTYPE HTML>

<html>
	<head>
		<title>Dashboard</title>
		<link rel="icon" href="images/logo.png" type="images/png">
		<link rel="stylesheet" href="css/admin_design.css" />
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
				
				<p><span style="background-color:#e0555a; color:white; border-radius:40px 0px 0px 40px; cursor:pointer; display:flex; 
				align-items:center; padding:10px 15px;">
				<i class="fa fa-home"></i>Dashboard</span></p>
					
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
			
			<div id="dashboardbox">
				
				<h3>Dashboard</h3>
					
				<hr>
				
				<?php
			
				$get_product_count = "SELECT COUNT(*) AS count FROM producttbl";
				$result_product_count = mysqli_query($conn, $get_product_count);
				$count_product = mysqli_fetch_assoc($result_product_count)['count'];
				
				$get_category_count = "SELECT COUNT(*) AS count FROM categorytbl";
				$result_category_count = mysqli_query($conn, $get_category_count);
				$count_category = mysqli_fetch_assoc($result_category_count)['count'];
				
				$get_order_count = "SELECT COUNT(*) AS count FROM ordertbl";
				$result_order_count = mysqli_query($conn, $get_order_count);
				$count_order = mysqli_fetch_assoc($result_order_count)['count'];
				
				$get_customer_count = "SELECT COUNT(*) AS count FROM customertbl";
				$result_customer_count = mysqli_query($conn, $get_customer_count);
				$count_customer = mysqli_fetch_assoc($result_customer_count)['count'];
				
				$get_feedback_count = "SELECT COUNT(*) AS count FROM feedbacktbl";
				$result_feedback_count = mysqli_query($conn, $get_feedback_count);
				$count_feedback = mysqli_fetch_assoc($result_feedback_count)['count'];
				
				
				echo "<div id='dashboard'>";
				
				
				echo "<div id='board'>";
				echo "<a href='view_product.php'>";
				echo "<img src='images/totalproduct.png' alt='Total Product ' title='Total Product '/> ";
				echo "<p>Total Product</p> ";
				echo "<p>".$count_product."</p>"; 
				echo "</a>";
				echo "</div> ";
				
				
				echo "<div id='board'>";
				echo "<a href='view_category.php'>";
				echo "<img src='images/totalcategory.png' alt='Total Category ' title='Total Category'/> ";
				echo "<p>Total Category</p> ";
				echo "<p>".$count_category."</p>";
				echo "</a>";
				echo "</div> ";
			
				echo "<div id='board'>";
				echo "<a href='view_order.php'>";
				echo "<img src='images/totalorder.png' alt='Total Order ' title='Total Order '/> ";
				echo "<p>Total Order</p> ";
				echo "<p>".$count_order."</p>"; 
				echo "</a>";
				echo "</div> ";
				
				echo "<div id='board'>";
				echo "<a href='view_customer.php'>";
				echo "<img src='images/totaluser.png' alt='Total User ' title='Total User '/>";
				echo "<p>Total User</p>";
				echo "<p>".$count_customer."</p>"; 
				echo "</a>";
				echo "</div> ";
				
				echo "<div id='board'>";
				echo "<a href='view_feedback.php'>";
				echo "<img src='images/totalfeedback.png' alt='Total Feedback ' title='Total Feedback '/> ";
				echo "<p>Total Feedback</p> ";
				echo "<p>".$count_feedback."</p>"; 
				echo "</a>";
				echo "</div> ";
				
				
				echo "</div> ";
			
			?>
			
			</div>
				

			</div>
		
		</div>
	
	</div>

	</body>
</html>

