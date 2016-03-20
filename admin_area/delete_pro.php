<?php


// session_start();

 if(!isset($_SESSION['user_email'])){

 	echo "<script>window.open('login.php?not_admin=You are not an Admin!','_self')</script>";

 }
 else {

	include("includes/db.php");
	if(isset($_GET['delete_pro'])){

		$delete_id = $_GET['delete_pro'];
		//echo $delete_id;	
		$delete_pro = "delete from products where product_id='$delete_id'";

		$run_delete = mysqli_query($con, $delete_pro);

		if($run_delete){
		//	echo $run_delete ;	
			echo "<script>alert('A product has been deleted!')</script>";
		  echo "<script>window.open('index.php?view_products','_self')</script>";
		}
	}
}
?>