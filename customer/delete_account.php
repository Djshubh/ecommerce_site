<h2 style="text-align:center;">Do you really want to DELETE your account?</h2>

<form action="" method="post">

<input type="submit" name="yes" value="YES, I want">
<input type="submit" name= "no" value="No I was JOKING">

</form>

<?php
 include("includes/db.php");

 	$user = $_SESSION['customer_email'];

 	if(isset($_POST['yes'])){

 		$delete_customer = "delete from customers where customer_email='$user'";

 		$run_customer = mysqli_query($con,$delete_customer);

  		echo "<script>alert('We are sorry , yout account has been deleted!')</script>";
  		echo "<script>window.open('logout.php','_self')</script>";
 	
 	}
 	if(isset($_POST['no'])){

 		echo "<script>alert('Oh! do not joke again!')</script>";
 	 	echo "<script>window.open('myaccount.php','_self')</script>";	
 		
 	}
?>