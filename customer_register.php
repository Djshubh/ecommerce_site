 <!DOCTYPE HTML>
 <?php
  include("functions/functions.php");
  include("includes/db.php");
?>
<html>
	<head>
		<title>My Online Shop</title>

		<link rel="stylesheet" href="styles/style.css" media="all" />
	</head>
<body>
	<!-- Main container starts here-->
	<div class="main_wrapper">
 
		<!--Header starts here-->	
		<div class="header_wrapper">  	
			<a href="index.php"><img id="logo" src="images/logo.png" /></a> 
			<img id= "banner" src="images/ad-banner.jpg" />
		</div>	
		<!--Header ends Here -->

		<!-- Navagation starts here-->
			<div class= "menubar">
		     <ul id = "menu">
		     	<li> <a href="index.php">Home</a></li>
		     	<li> <a href="all_product.php">All Products</a></li>
		     	<li> <a href="customer/myaccount.php">My Account</a></li>
		     	<li> <a href="#">Sign Up</a></li>
		     	<li> <a href="#">Contact Us</a></li>
		     	<li> <a href="cart.php">Shopping Cart</a></li>
		    
		  <li> <div id = "form">
		    	<form method = "get" action= "results.php" enctype="multipart/form-data">
		    		<input type ="text" name = "user_query" placeholder="Search a product"/ >
		    		<input type = "submit" name= "search" value= "Search" />
		    	</form>	
		    </div>
		    </li> 
		    </ul>
		</div>
		<!-- Navagation Bar ends-->

		<!-- Content Wrapper starts-->
		 <div class="content_wrapper">
			
 			<div id="sidebar"> 
 					<div id= "sidebar_title">Categories</div>
 					
 					<ul id="cats">
 						<?php
  							getCats();
 						?>
 					</ul>
 					<div id=  "sidebar_title">Brands</div>
 					
 					<ul id="cats">
 						<?php getBrands(); ?>
 					</ul>
 			</div>

			<div id="content_area"> 
				<?php 	cart();  ?>	
				<div id="shopping_cart">
 					<span style="float:right font-size:10px; padding:5px; line-height: 40px; ">
 						Welcome Guest!  <b style="color:yelow"> Shopping Cart</b>
 						 Total Items : $<?php total_items();?> Total Price : <?php  total_price(); ?>
 						<a href="cart.php">Go to cart</a>
 					
 					</span>
				</div>
				
					<form action="customer_register.php" method = "post" enctype="multipart/form-data">

						<table align="center" width="750">
							<tr align="center">
								<td colspan="10"><h2>Create an Account</h2></td>
							</tr>

							
							<tr>
								<td align="right">Customer Name : </td>
								<td><input type="text" name="c_name"/ required ></td>
							</tr>
							<tr>
								<td align="right">Customer Email : </td>
								<td><input type="text" name="c_email" required/ ></td>
							</tr>
							<tr>
								<td align="right">Customer Password : </td>
								<td><input type="password" name="c_pass" required/ ></td>
							</tr>
							<tr>
								<td align="right">Customer Image : </td>
								<td><input type="file" name="c_pass"/ ></td>
							</tr>
							<tr>
								<td align="right">Cusotmer Country :</td>
								<td>
									<select name="c_country">
										<option>Select a country</option>
										<option>Afghanistan</option>
										<option>Israel</option>
										<option>Nepal</option>
										<option>Pakistan</option>
										<option>India</option>
										<option>United Kingdom</option>
										<option>United States</option>
										<option>Mexico</option>

								</td>
							</tr>
							<tr>
								<td align="right">Cusotmer City : </td>
								<td><input type="text" name="c_city" /></td>
							</tr>
							<tr>
								<td align="right">Customer Contact : </td>
								<td><input type="text" name="c_contact" required/>  </td>
							</tr>
							<tr>
								<td align="right">Customer Address : </td>
								<td><input type="text" name="c_address" /></td>
							</tr>
							<tr align="center">
								
								<td colspan="6"><input type="submit" name="register" value="Create Account" / ></td>
							</tr>	
						</table>
					</form>	
						
			 </div>

		</div>		
		<!-- Content Wrapper Ends-->
		<div id=  "footer"> foooter 
			<h2 style="text-align:center ; padding-top:30px ;">
		 &copy; 2016 by www.Wildprogrammers.com</h2>
		</div >
	</div>		  
</body>
</html>		 
<?php
	if(isset($_POST['register'])){

		$ip = getIp();

		$c_name = $_POST['c_name'];
		$c_email = $_POST['c_email'];
		$c_pass = $_POST['c_pass'];
		$c_image = $_FILES['c_image']['name'];
		$c_image_tmp = $_FILES['c_image']['tmp_name'];
		$c_country = $_POST['c_country'];
		$c_city = $_POST['c_city'];
		$c_contact = $_POST['c_contact'];
		$c_address = $_POST['c_address'];

		move_uploaded_file($c_image_tmp, "customer/customer_images/$c_image");

		$insert_c = "insert into customers 
		(customer_ip,customer_name ,customer_email ,customer_pass ,customer_country ,customer_city ,customer_contact ,customer_address ,customer_image )
		values ('$ip','$c_name','$c_email','$c_pass','$c_country','$c_city','$c_contact','$c_address','$c_image') ";		

		$run_c = mysqli_query($con, $insert_c);

		if($run_c)	{
			echo "<script>alert('Registration Successful!!')</script>";
		}
	}
?>