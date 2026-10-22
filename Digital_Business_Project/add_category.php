<?php
include "config.php";

$sess_aid = $_SESSION["sess_aid"];

$get_admin = mysqli_query($conn, "select * from admintbl where admin_id=$sess_aid");

$admin_rec = mysqli_fetch_assoc($get_admin );

?>

<!DOCTYPE HTML>

<html>
	<head>
		<title>Add Category</title>
		<link rel="icon" href="images/logo.png" type="images/png">
		<link rel="stylesheet" href="css/admin_design.css" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<script type="text/javascript">

	function check_form()
	{
		var no_error = true;
		var category_name = document.addfrm.category_name.value;
		var category_description = document.addfrm.category_description.value;

		if(category_name == "")
		{
			document.getElementById("err_category_name").innerHTML="Please key-in Category Name.";
			no_error = false;
		}
		else
		{
			document.getElementById("err_category_name").innerHTML="";
		}
		
		if(category_description == "")
		{
			document.getElementById("err_category_description").innerHTML="Please key-in Category Description.";
			no_error = false;
		}
		else
		{
			document.getElementById("err_category_description").innerHTML="";
		}
		
		
		return no_error;
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
					<p class="angle">
					<span style="background-color:#e0555a; color:white; border-radius:40px 0px 0px 40px; cursor:pointer; display:flex; 
					align-items:center; padding:10px 15px;">
					Add Category<span></p>
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
				
					<h3>Add Category</h3>
					
					<hr>
				
					<form name="addfrm" action="" method="post" onsubmit="return check_form();">
						
						<p><label>Category Name</label>
						<input type="text" name="category_name" class="details"/>
						<br><span id="err_category_name"></span>
						</p>
						
						<p><label>Category Description</label>
						<textarea name="category_description" rows="6" cols="4" class="details"></textarea>
						<br><span id="err_category_description"></span>
						</p>
						
						<p><input type="submit" name="savebtn" value="Save Category" /></p>
						
					</form>
				
				</div>

			</div>
		
		</div>
	
	</div>

	</body>
</html>

<?php

if (isset($_POST["savebtn"]))
{
	$cname = $_POST["category_name"];
	$cdescp = $_POST["category_description"];
	
	$check_duplicate_category_name = mysqli_query($conn,"select * from categorytbl where category_name = '$cname'");
	

	if(mysqli_num_rows($check_duplicate_category_name) > 0)
	{
		echo
		"<script type='text/javascript'>
			alert('A record with this Category Name already exists.');
			history.go(-1);
		</script>";
	}
	
	else	
		{
			mysqli_query($conn, "insert into categorytbl (category_name, category_description)
			values('$cname','$cdescp')");

			echo
			"<script type='text/javascript'>
				alert('Record has been saved.');
			</script>";
		}
	
}

?>