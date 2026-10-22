<?php
include "config.php";

$sess_aid = $_SESSION["sess_aid"];

$get_admin = mysqli_query($conn, "select * from admintbl where admin_id=$sess_aid");

$admin_rec = mysqli_fetch_assoc($get_admin );

?>

<!DOCTYPE HTML>

<html>
	<head>
		<title>Edit Admin Profile</title>
		<link rel="icon" href="images/logo.png" type="images/png">
		<link rel="stylesheet" href="css/admin_design.css" />
		<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<script type="text/javascript">
	
		function check_form()
		{
			var no_error = true;
			var admin_name = document.editfrm.admin_name.value;
			var admin_email = document.editfrm.admin_email.value;
			var admin_contact = document.editfrm.admin_contact.value;
			var admin_gender = document.editfrm.admin_gender.value;
			
			if (admin_name == "")
			{
				document.getElementById("err_name").innerHTML="Please key-in your name.";
				no_error = false;
			}
			else
			{
				document.getElementById("err_name").innerHTML="";
			}
		
			if (admin_email == "")
			{
				document.getElementById("err_email").innerHTML="Please key-in your email address.";
				no_error = false;
			}
			else
			{
				document.getElementById("err_email").innerHTML="";
			}
		
			if (admin_contact == "")
			{
				document.getElementById("err_contact").innerHTML="Please key-in your contact number.";
				no_error = false;
			}
			else
			{
				document.getElementById("err_contact").innerHTML="";
			}
			
			if (admin_gender == "")
			{
				document.getElementById("err_gender").innerHTML="Please select your gender.";
				no_error = false;
			}
			else
			{
				document.getElementById("err_gender").innerHTML="";
			}
			
			return no_error;
		}
		
	</script>
	
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
			
				<h3 style="color:#e0555a; text-align:center; font-size:2.5em;">Edit Admin Profile</h3>
				
				<div class="adminprofilebox">
				
				<p class="adacc">
					<a href="admin_profile.php" class="icon fas fa-user">&nbsp;&nbsp;Profile</a>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<a href="edit_admin_profile.php?edit_pk=$sess_aid" class="icon fas fa-pencil-square-o ">&nbsp;Edit Profile</a>
				</p>
				
				<hr><br>
				
					<form name="editfrm" action="" method="post" autocomplete="off" enctype="multipart/form-data" 
					onsubmit="return check_form();">
					
					<?php
						
						if ($admin_rec["admin_image"] == "")
						{
							$filename = "admin_image/default.webp";
						}
						else
						{
							$filename = "admin_image/".$admin_rec["admin_image"];
						}

					?>
					
					<div class="adprofpic">
					<p>
						<img src= "<?php echo $filename; ?>">
						<br>Upload Image<br>
						<input type="file" name="admin_image" style="background-color:#fff; width:180px;"/>
					<p>
					</div>
					
					<div class="adprofdetail2">
					
					<p>
						<label>Name </label>:
						<input value="<?php echo $admin_rec['admin_name']; ?>" type="text" name="admin_name" size="50" maxlength="40"/>
						<br><span id="err_name"style="padding-left:31%;"></span>
					</p>
					
					<p>
						<label>Email Address</label>:
						<input value="<?php echo $admin_rec['admin_email']; ?>" type="email" name="admin_email" size="40" maxlength="30"  />
						<br><span id="err_email" style="padding-left:31%;"></span>
					</p>
					
					<p>
						<label>Contact  </label>:
						<input value="<?php echo $admin_rec['admin_contact']; ?>" type="text" name="admin_contact" size="20" maxlength="15" placeholder="xxx-xxx-xxxx"/>
						<br><span id="err_contact" style="padding-left:31%;"></span>
					</p>
		
					<div class="genderbox">Gender </div>:
						<div class="gender">
						<input <?php if($admin_rec["admin_gender"] == "Female")echo"checked"; ?> type="radio" name="admin_gender" value="Female" />Female&nbsp;&nbsp;&nbsp;&nbsp;
						<input <?php if($admin_rec["admin_gender"] == "Male")echo"checked"; ?> type="radio" name="admin_gender" value="Male" />Male
						<br><span id="err_gender" style="padding:0px;"></span><br>
						</div>
					
					<p>
						<input type="button" name="backbtn" value="Back" onclick="window.location.href='admin_profile.php';">
						&nbsp;&nbsp;
						<input type="submit" name="updatebtn" value="Update" />
					</p>
					
					</div>

					</form>
	
				</div>
				
			</div>
		
		</div>
	
	</div>

	</body>
</html>

<?php

if(isset($_POST["updatebtn"]))
{
	$aname = $_POST["admin_name"];
	$aemail = $_POST["admin_email"];
	$acontact = $_POST["admin_contact"];
	$agender = $_POST["admin_gender"];
	
	$filename = $_FILES["admin_image"]["name"];
	$tempname = $_FILES["admin_image"]["tmp_name"];

	$check_duplicate_name = mysqli_query($conn,"select * from admintbl where admin_name = '$aname' and admin_id != $sess_aid");
	$check_duplicate_email = mysqli_query($conn,"select * from admintbl where admin_email = '$aemail' and admin_id != $sess_aid");
	$check_duplicate_contact = mysqli_query($conn,"select * from admintbl where admin_contact = '$acontact' and admin_id != $sess_aid");
	
	if (mysqli_num_rows($check_duplicate_name) > 0)
	{
		echo
			"<script type='text/javascript'>
				alert('A record with this Admin Name already exists.');
				window.location.href='edit_admin_profile.php?edit_pk=".$sess_aid."';
			</script>";
	}
	else
		if(mysqli_num_rows($check_duplicate_email) > 0)
		{
			echo
			"<script type='text/javascript'>
				alert('A record with this Email Address already exists.');
				window.location.href='edit_admin_profile.php?edit_pk=".$sess_aid."';
			</script>";
		}
		else
			if(mysqli_num_rows($check_duplicate_contact) > 0)
			{
				echo
				"<script type='text/javascript'>
					alert('A record with this Contact Number already exists.');
					window.location.href='edit_admin_profile.php?edit_pk=".$sess_aid."';
				</script>";
			}
	else
	{
		$new_filename = date("YmdHis")."_".$filename;
		
		$path ="admin_image/".$filename;
		
		if (move_uploaded_file($tempname,$path))
		{
			mysqli_query($conn,
			"Update admintbl set
			admin_name = '$aname',
			admin_email = '$aemail',
			admin_contact = '$acontact',
			admin_gender = '$agender',
			admin_image = '$filename'

			where admin_id = $sess_aid");
			
			echo
			"<script type='text/javascript'>
				alert('Record updated successfully.');
				setTimeout(function(){ window.location.href='admin_profile.php' },2000);
			</script>
			";
		}
		else
		{
			mysqli_query($conn,
			"Update admintbl set
			admin_name = '$aname',
			admin_email = '$aemail',
			admin_contact = '$acontact',
			admin_gender = '$agender'

			where admin_id = $sess_aid");
			
			echo
			"<script type='text/javascript'>
				alert('Record updated successfully.');
				setTimeout(function(){ window.location.href='admin_profile.php' },2000);
			</script>
			";
		}
	
	}
}

?>

