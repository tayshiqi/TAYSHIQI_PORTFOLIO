<?php
include "config.php";

$sess_aid = $_SESSION["sess_aid"];

$get_admin = mysqli_query($conn, "select * from admintbl where admin_id=$sess_aid");

$admin_rec = mysqli_fetch_assoc($get_admin );

?>

<!DOCTYPE HTML>

<html>
	<head>
		<title>Add Product</title>
		<link rel="icon" href="images/logo.png" type="images/png">
		<link rel="stylesheet" href="css/admin_design.css" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<script type="text/javascript">
	
	function check_form()
	{
		var no_error = true;
		
		var product_name = document.addfrm.product_name.value;
		var product_description = document.addfrm.product_description.value;
		var product_price = document.addfrm.product_price.value;
		var product_stock_level = document.addfrm.product_stock_level.value;
		var product_date_created = document.addfrm.product_date_created.value;
		var product_category = document.addfrm.product_category.value;
		
		if(product_name == "")
		{
			document.getElementById("err_product_name").innerHTML="Please enter product name.";
			no_error = false;
		}
		else
		{
			document.getElementById("err_product_name").innerHTML="";
		}
		
		if(product_description == "")
		{
			document.getElementById("err_product_description").innerHTML="Please enter product description.";
			no_error = false;
		}
		else
		{
			document.getElementById("err_product_description").innerHTML="";
		}
		
		if(product_price == "")
		{
			document.getElementById("err_product_price").innerHTML="Please enter product price.";
			no_error = false;
		}
		else
			if(product_price < 1)
			{
				document.getElementById("err_product_price").innerHTML="Product price cannot be less than 1.";
				no_error = false;
			}
			else
			{
				document.getElementById("err_product_price").innerHTML="";
			}
		
		if(product_stock_level == "")
		{
			document.getElementById("err_product_stock_level").innerHTML="Product stock level cannot be empty.";
			no_error = false;
		}
		else
			if(product_stock_level < 10)
			{
				document.getElementById("err_product_stock_level").innerHTML="Product stock cannot be less than 10 units.";
				no_error = false;
			}
			else
			{
				document.getElementById("err_product_stock_level").innerHTML="";
			}
			
		if(product_date_created == "")
		{
			document.getElementById("err_product_date_created").innerHTML="Product date created cannot be empty.";
			no_error = false;
		}
		else
		{
			document.getElementById("err_product_date_created").innerHTML="";
		}
		
		if(product_category == "")
		{
			document.getElementById("err_product_category").innerHTML="Please select product category.";
			no_error = false;
		}
		else
		{
			document.getElementById("err_product_category").innerHTML="";
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
					<p class="angle">
					<span style="background-color:#e0555a; color:white; border-radius:40px 0px 0px 40px; cursor:pointer; display:flex; 
					align-items:center; padding:10px 15px;">
					Add Product<span></p>
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
				
					<h3>Add Product</h3>
					
					<hr>
				
					<form name="addfrm" action="" method="post"  autocomplete="off" enctype="multipart/form-data" onsubmit="return check_form();" >

						<p>
							<label>Product Name</label>
							<input type="text" name="product_name" class="details"/>
							<br><span id="err_product_name"></span>
						</p>
				
						<p>
							<label>Product Description</label>
							<textarea name="product_description" rows="4" cols="4" class="details"></textarea>
							<br><span id="err_product_description"></span>
						</p>
				
						<p>
							<label>Product Price (RM/kg)</label>
							<input type="number" name="product_price" step="0.01" class="details" />
							<br><span id="err_product_price"></span>
						</p>
				
						<p>
							<label>Product Stock Level</label>
							<input type="number" name="product_stock_level" class="details"/>
							<br><span id="err_product_stock_level"></span>
						</p>
				
						<p>
							<label>Product Date Created</label>
							<input type="date" name="product_date_created" class="details"/>
							<br><span id="err_product_date_created"></span>
						</p>
	
						<p>
						<div class="categorybox">
							<div class="category1">
							<label>Product Category</label>
							</div>
							<div class="category2">
							<?php
							$get_category_list = mysqli_query($conn,"select * from categorytbl");
							while($category_rec = mysqli_fetch_assoc($get_category_list))
							{
								echo "<input type='radio' name='product_category' value='".$category_rec['category_id']."'>".$category_rec['category_name'];
								echo "&nbsp; &nbsp; &nbsp;";
							}
							?>
							</div>
							<br><span id="err_product_category"></span>
						</div>
						</p>
				
						<p>
							<label>Product Image</label>
							<input type="file" name="product_image" class="details" />
						</p>
					
						<p><input type="submit" name="savebtn" value="Save Product" /></p>
						
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
	$pname = $_POST["product_name"];
	$pdescp = $_POST["product_description"];
	$pprice = $_POST["product_price"];
	$pstock = $_POST["product_stock_level"];
	$pdate = $_POST["product_date_created"];
	$pcategory = $_POST["product_category"];

	$filename = $_FILES["product_image"]["name"];
	$tempname = $_FILES["product_image"]["tmp_name"];

	$check_duplicate_product_name = mysqli_query($conn,"select * from producttbl where product_name = '$pname'");
	
	if (mysqli_num_rows($check_duplicate_product_name) > 0)
	{
		echo 
		"<script type='text/javascript'>
			alert('A record with this Product Name already exists.');
			window.history.back(); 
		</script>";
	}
	else if ($filename == "")
	{
		$filename = "None";

		mysqli_query($conn, "insert into producttbl
		(product_name,product_description,product_price,product_stock_level, product_date_created,category_id,product_image)
		
		values ('$pname','$pdescp',$pprice,$pstock,'$pdate',$pcategory,'$filename')");
		
		echo "  <script type='text/javascript'>
					alert('Product record has been saved.');
				</script>";
	}
	else
	{
		$new_filename = date("YmdHis")."_".$filename;
		
		$path ="product_image/".$filename;
		
		if (move_uploaded_file($tempname,$path))
		{
			mysqli_query($conn, "insert into producttbl
			(product_name,product_description,product_price,product_stock_level, product_date_created,category_id,product_image)
		
			values ('$pname','$pdescp',$pprice,$pstock,'$pdate',$pcategory,'$filename')");
			
			echo "  <script type='text/javascript'>
					alert('Product record has been saved.');
				</script>";
		}
		else
		{
			echo "  <script type='text/javascript'>
					alert('Product record cannot be saved.');
				</script>";
		}
	}

}

?>