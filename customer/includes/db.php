<?php
	$con = mysqli_connect("localhost" ,"root", "", "ecommerce");

	if(mysqli_connect_errno())
	{
		echo "failed to connect to MYSQL: ". mysqli_connect_error();
	}

?>

