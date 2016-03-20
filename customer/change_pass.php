<div>
<h3>Change Password</h3>
<form action="" method= "post">
  <table align="center" width="600">
	<tr>
	<td align="right"> <b>Enter Current Password: </b></td>
	<td><input type="password" name= "current_pass" required></td>
	</tr>
	<tr>
	<td align="right"><b>Enter New Password : </b></td>
	<td><input type="password" name= "new_pass" required></td>
	</tr>
	<tr>
	<td align="right"><b>Enter New Password Again : </b></td>
	<td><input type="password" name= "new_pass_again" required></td>
	</tr>
	<tr height="20"> 
		<td></td>
	</tr>	
	<tr>
	<td colspan= "2" align="center" ><input type="submit" name="change_pass" value="Change Password"/></td>
	</tr> 
  </table>
</form>
<?php
  include("includes/db.php");

  	if(isset($_POST['change_pass'])){

  		$current_pass = $_POST['current_pass'];
  		$new_pass = $_POST['new_pass'];
  		$new_again = $_POST['new_pass_again'];

  		$sel_pass = "select * from customers where customer_pass = '$current_pass' AND customer_email='$user'";

		$run_pass = mysqli_query($con, $sel_pass);
		$check_pass = mysqli_num_rows($run_pass);

		if($check_pass==0){
			echo "<script>alert('Your Current Password is wrong')</script>";
		}

	 	if($new_pass!=$new_again){
	 		echo "<script>alert('New Password DO NOT match!')</script>";
			
	 	}
	 	else{
	 		$update_pass = "update customers set customer_pass='$new_pass' where customer_email='$user'"; 
	 		$run_update = mysqli_query($con,$update_pass);

	 		echo "<script>alert('YOur password was updated succesfully!')</script>";
	 		echo "<script>window.open('myaccount.php','_self')</script>";
	 	} 
  	}
?>
</div> 