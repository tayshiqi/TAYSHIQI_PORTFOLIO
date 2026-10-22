<?php
include "config.php";

$sess_aid = $_SESSION["sess_aid"];

$get_admin = mysqli_query($conn, "select * from admintbl where admin_id=$sess_aid");

$admin_rec = mysqli_fetch_assoc($get_admin );

?>

<!DOCTYPE HTML>

<html>
	<head>
		<title>View Category</title>
		<link rel="icon" href="images/logo.png" type="images/png">
		<link rel="stylesheet" href="css/admin_design.css" />
		
		<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style type="text/css">
	.adbox1 a
	{
		text-decoration:none;
		padding:10px;
		border-radius:20px;
		background-color:#e0555a;
		color:white;
	}
	
	.adbox1 a:hover
	{
		background-color:white;
		color:#e0555a;
		border:1px solid #e0555a;
	}
	
	</style>
	
	<script type="text/javascript">

	function delete_confirm()
	{
		var respond = confirm("Do you really want to remove this record?");
		return respond;
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
					<p class="angle"><a href="view_product.php">View Product</a></p>
			
				<p class="three"><i class="fa fa-pie-chart"></i>Category<i class="fa fa-angle-down"></i></p>
					<p class="angle"><a href="add_category.php">Add Category</a></p>
					<p class="angle">
					<span style="background-color:#e0555a; color:white; border-radius:40px 0px 0px 40px; cursor:pointer; display:flex; 
					align-items:center; padding:10px 15px;">
					View Category<span></p>
					
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
				
					<h3>View Category</h3>
					
					<hr>
					
					<?php
		
					$get_category_list = mysqli_query($conn,"select * from categorytbl ");
					
					$count = mysqli_num_rows($get_category_list);
					
					if($count ==0)
					{
						echo"No records found.";
					}
					
					else
					{
						$x=1;
						while($category_rec = mysqli_fetch_assoc($get_category_list))
						{
							$cid = $category_rec["category_id"];
						
							echo"<b>Category Name : </b>".$category_rec["category_name"];
							echo"<br>";
							echo"<br><b>Category Description : </b>".$category_rec["category_description"];
							echo"<br>";
							
							echo"<br>";
							
							echo "<a href='edit_category.php?edit_pk=$cid' class='icon fas fa-eye'></a>";
							echo"&nbsp;&nbsp;&nbsp;";
							echo "<a href='view_category.php?del_pk=$cid' onclick='return confirm_delete();' class='icon fas fa-trash'></a>";
							
							echo"<br><br><hr>";

							$x++;
						}
					}
					
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
	$cid = $_REQUEST["del_pk"];
	
	mysqli_query($conn,"delete from categorytbl where category_id=$cid");
		
	echo 
	"<script type='text/javascript'>
		alert('Record has been removed.');
		window.location.href='view_category.php';
	</script>";
	
	//header("Location: view_category.php");
}

?>
