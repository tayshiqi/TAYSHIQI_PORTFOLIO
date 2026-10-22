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
		<title>Order Details</title>
		<link rel="icon" href="images/logo.png" type="images/png">
		<link rel="stylesheet" href="css/admin_design.css" />
		<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<script type="text/javascript">

		function check_form()
		{
			var no_error = true;
			var delivery_status = document.deliverfrm.delivery_status.value;
			var delivery_date = document.deliverfrm.delivery_date.value;
		

			if (delivery_status == "Pending")
			{
				document.getElementById("err_delivery_status").innerHTML="Please update delivery status.";
				no_error = false;
			}
			else
			{
				document.getElementById("err_delivery_status").innerHTML="";
			}

			if (delivery_date == "")
			{
				document.getElementById("err_delivery_date").innerHTML="Please select delivery date.";
				no_error = false;
			}
			else
			{
				document.getElementById("err_delivery_date").innerHTML="";
			}

			return no_error;
		}

		</script>
	
	<style type="text/css">
			
	td.viewcustinfo a 
	{
		padding:0px !important; 
		text-decoration:none !important;
		border-radius:0 !important; 
		color:black !important; 
		background-color:transparent !important; 
	}
		
	td.viewcustinfo a:hover
	{
		color:#e0555a !important; 
		font-style:italic;
		border:none !important;
	}
	
	form select
	{
		width:300px;
		border-radius:10px;
		border:1px solid #e0555a;
		height:2.75em;
		padding:0 10px;
		background:rgba(144, 144, 144, 0.075);
		border:solid 1px rgba(144, 144, 144, 0.25);
	}
	
	form input{
		width:278px;
		border:1px solid #e0555a;
		border-radius:10px;
		height:2.75em;
		padding:0 10px;
		background:rgba(144, 144, 144, 0.075);
		border:solid 1px rgba(144, 144, 144, 0.25);
	}
	
	form label
	{
		display:inline-block;
		width:200px;
	}

	
	form select:hover, form input:hover
	{
		border:1px solid #e0555a;
	}
	
	form select:focus, form input:focus
	{
		border:1px solid #e0555a;
		outline:none;
	}
	
	form input[type=submit]
	{
		border:none;
		border-radius:10px;
		padding:10px;
		color:white;
		background-color:#e0555a;
		font-weight:bold;
		width:150px;
	}
	
	form input[type=submit]:hover
	{
		color:#e0555a;
		background-color:white;
		border:1px solid #e0555a;
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
			
				<div class="table">
					
					<h3><a href="view_order.php" class="icon fas fa-angle-left"></a>&nbsp;&nbsp;
					Order Details - Order # <?php echo $ordid; ?></h3>
					
					<hr>
					
					<?php
					
					$get_item = mysqli_query($conn, "select * from itemtbl, producttbl, ordertbl, customertbl where 
					itemtbl.product_id=producttbl.product_id and ordertbl.order_id=itemtbl.order_id and itemtbl.order_id = $ordid and ordertbl.cust_id=customertbl.cust_id");
					
					$count = mysqli_num_rows($get_item);
					
					if ($count == 0) 
					{
						echo "<p>No order records found.</p>";
					}
					else
					{
						echo "<table border='1px' class='product-table'>";
						
						echo "<tr>";
						echo "<th>Customer Name</th>";
						echo "<th>Image</th>";
						echo "<th>Name</th>";
						echo "<th>Price</th>";
						echo "<th>Quantity Ordered</th>";
						echo "<th>Status</th>";
						echo "<th>Out for Delivery Date</th>";
						echo "<th>Total (RM)</th>";
						echo "</tr>";
						
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
							echo "<td class='viewcustinfo'><a href='view_customer_detail.php?view_pk=".$rec['cust_id']."'>".$rec["cust_name"]."</a></td>";
							echo "<td><img src='".$filename."'></td>";
							echo "<td>".$rec["product_name"]."</td>";
							echo "<td>".number_format($rec["product_price"],2)."</td>";
							echo "<td>".$rec["item_quantity"]."</td>";
							echo "<td>".$rec["order_status"]."</td>";
							echo "<td>";
							
								if ($rec["order_delivery_date"] == "0000-00-00") 
								{
									echo "Order has not been delivered yet.";
								} 
								else 
								{
									echo $rec["order_delivery_date"];
								}
							
							
							echo "</td>";
							
							echo "<td>RM ".number_format($item_total,2)."</td>";
							
							echo "</tr>";
							
						}
						
						echo "</table>";
						
						echo "<p><b>Total Product : ".$count."</b></p>";
						
						echo "<p><b>Shipping Fee : RM ".number_format($shipping_fee,2)."</b></p>";
					
						echo "<p><b>Total Payment : RM ".number_format($overall_total,2)."</b></p>";
					
						
					}
					
					
						$get_status = mysqli_query($conn, "select * from ordertbl where order_id =$ordid");
						$rec = mysqli_fetch_assoc($get_status);
						
						if ($rec["order_status"] != "Received")
						{
						
					?>
					
					<hr>
			
					<h4>Please Update Customer Delivery Status</h4>
					
					<p>Kindly ensure that the delivery status for customer orders is updated promptly. Keeping delivery statuses 
					accurate helps us maintain precise order records and keeps our customers informed about their order progress. Your 
					efforts in maintaining smooth operations and excellent customer service are greatly appreciated.</p>
					
					<form name="deliverfrm" action="" method="post" onsubmit="return check_form();">
					
						<p><label>Delivery Status</label> :&nbsp;&nbsp;&nbsp;
						<select name="delivery_status">
							<option value="<?php echo $rec["order_status"]; ?>"><?php echo $rec["order_status"]; ?></option>
							<option value="Out for Delivery">Out for Delivery</option>
						</select>
						<br><span id="err_delivery_status" style="color:red; font-style:italic; font-size:0.8em; padding-left:230px;"></span>
						</p>
						
						
						<p><label>Delivery Date</label> :&nbsp;&nbsp;&nbsp;
						<input value="<?php echo $rec["order_delivery_date"]; ?>" type="date" name="delivery_date"/>
						<br><span id="err_delivery_date" style="color:red; font-style:italic; font-size:0.8em; padding-left:230px;"></span>
						</p>
						
						<p>
						<input type="submit" name="submitbtn" value="Update Status" class="button"/>
						</p>
					
					</form>
					
					<?php
					
					}
					
					?>	
				
				</div>

			</div>
		
		</div>
	
	</div>

	</body>
</html>

<?php

if (isset($_POST["submitbtn"]))
{
	$status = $_POST ["delivery_status"];
	$date = $_POST["delivery_date"];

	mysqli_query ($conn, "update ordertbl set order_status ='$status', order_delivery_date ='$date' where order_id = $ordid");
		
	
	echo "<script type='text/javascript'>
			alert('Delivery status updated successfully.');
			window.location.href='view_order.php?order_id=$ordid';
		</script>";
	
	//header("Location: view_order.php?order_id=$ordid");

}

?>
