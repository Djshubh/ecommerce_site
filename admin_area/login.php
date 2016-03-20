
<?php
	 session_start();
 include("includes/db.php");
 if(isset($_POST['login_check'])){

 	$email = mysql_real_escape_string($_POST['email']);
 	$pass = mysql_real_escape_string($_POST['password']);

 	$sel_user = "select * from admins where user_email='$email' AND user_pass='$pass'";
 $run_user = mysqli_query($con,$sel_user);

 	 $check_user = mysqli_num_rows($run_user);
 	//echo $email;
 	if($check_user==1){
 			 
 		$_SESSION['user_email']=$email;
 		//echo "<script>alert('Password or Email is wrong, try again!')</script>";
 
 		echo "<script>window.open('index.php?logged_in=You have successfully Logged In!','_self')</script>";
 	
 		}
 	else {
 			echo "<script>alert('Password or Email is wrong, try again!')</script>";
 	
 	}
 }
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Admin Login</title>
</head>
<style>
  h2 {	margin : 50px; text-align: center;}
  #login_form { margin:auto; text-align: center;}
 </style>
<body>
<h2>Admin Login</h2> 
<div id="login_form">
<form action=" " method="post">
	
<input type="text" name="email"  placeholder="email"/><br><br>

<input type="password" name="password"  placeholder="password"/><br><br>
<input type="submit" value="Log In" name="login_check"/>
</form>
</div>
</body>
</html>

