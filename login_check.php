
<?php
	include ('includes/db.php');
	session_start();	
	$email = $_POST['email'];
	$pass = $_POST['pass'];

	$check_email = "select * from customers where customer_email='$email' AND customer_pass='$pass'";
	$run_email = mysqli_query($con,$check_email);
	$row_email = mysqli_num_rows($run_email);
	if($row_email==1)
	{
		$_SESSION['customer_email'] = $email;
		echo "<script>alert('You are Logged In successfully,')</script>";
		echo "<script>window.open('customer/myaccount.php','_self')</script>";
	}		
	else
	{	echo '<script>alert("WRONG USERNAME OR PASSWORD. Please Re-enter")</script>';	
		echo "<script>window.open('checkout.php','_self')</script>";
	}
?>