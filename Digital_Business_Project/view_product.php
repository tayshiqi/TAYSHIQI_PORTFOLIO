<?php
include "config.php";

$sess_aid = $_SESSION["sess_aid"];

$get_admin = mysqli_query($conn, "select * from admintbl where admin_id=$sess_aid");

$admin_rec = mysqli_fetch_assoc($get_admin );

?>

<!DOCTYPE HTML>

<html>
	<head>
		<title>View Product</title>
		<link rel="icon" href="images/logo.png" type="images/png">
		<link rel="stylesheet" href="css/admin_design.css" />
		<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script type="text/javascript">

	function confirm_delete()
	{
		answer = confirm("Do you really want to remove this product?");
		return answer;
	}

	</script>

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
					<p class="angle">
					<span style="background-color:#e0555a; color:white; border-radius:40px 0px 0px 40px; cursor:pointer; display:flex; 
					align-items:center; padding:10px 15px;">
					View Product<span></p>
			
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
				
					<h3>Product List</h3>
					
					<hr>
					
					<p class="categorylink">
						<span style="padding:10px; border:none; background-color:#6a903d; color:#fff;">All</span>
						<a href="view_product1.php">Premium Fruits</a>
						<a href="view_product2.php">Seasonal Fruits</a>
						<a href="view_product3.php">Citrus Fruits</a>
						<a href="view_product4.php">Stone Fruits</a>
					</p>
					
				
					<?php
		
					$get_product_list = mysqli_query($conn,"select * from producttbl, categorytbl where producttbl.category_id = categorytbl.category_id");
					
					$count = mysqli_num_rows($get_product_list);
					
					echo "<table border='1px' class= 'product-table'>";
						
						echo "<tr>";
						echo "<th>No.</th>";
						echo "<th>Image</th>";
						echo "<th>Name</th>";
						echo "<th>Price (RM/kg)</th>";
						echo "<th>Stock</th>";
						echo "<th>Category</th>";
						echo "<th>Rating</th>";
						echo "<th>Details</th>";
						echo "<th>Edit</th>";
						echo "<th>Delete</th>";
						echo "</tr>";
						
					if ($count == 0)
					{
						echo "No product record were found.";
					}
					else
					{
					
						$x=1; 

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
							
							echo "<tr>"; 

							echo "<td>". $x ."</td>";
							
							echo "<td><img src='".$filename."'></td>";

							echo "<td>".$prod_rec['product_name']."</td>";

							echo "<td>".number_format($prod_rec['product_price'],2)."</td>";

							echo "<td>".$prod_rec['product_stock_level']."</td>";
							
							echo "<td>".$prod_rec['category_name']."</td>";
							
							echo "<td>";
							
							if ($rec["average_rating"] != 0)
							{
								echo " ".number_format($rec["average_rating"],2);
							}
							else
							{
								echo "No Rating";
							}
							
							echo "</td>";
					
							echo "<td><a href='view_product_detail.php?view_pk=".$prod_rec['product_id']."' class='icon fas fa-eye'></a></td>";

							echo "<td><a href='edit_product.php?edit_pk=".$prod_rec['product_id']."' class='icon fas fa-pencil-square-o '></a></td>";

							echo "<td><a href='view_product.php?del_pk=".$prod_rec['product_id']."' onclick='return confirm_delete();' 
							class='icon fas fa-trash'></a></td>";
						
							echo "</tr>";
							
							$x++; 
						}
									
					}
					echo "</table>";
					echo "<br>";
					echo "<p><b>Total Product Records : ".$count."</b></p>"; 

					?>
					
				
				</div>
				
			</div>
		
		</div>
	
	</div>

	</body>
</html>

<?php

if (isset($_REQUEST["del_pk"]))
{
	$pid = $_REQUEST["del_pk"]; 
	
	mysqli_query($conn,"delete from producttbl where product_id = $pid");
	
	echo 
	"<script type='text/javascript'>
		alert('The record has been deleted.'); 
		window.location.href = 'view_product.php'; 
	</script>";
}
?>
