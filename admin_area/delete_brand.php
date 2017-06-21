<?php
session_start();

if(!isset($_SESSION['user_email'])){
	echo "<script>window.open('login.php?not_admin=you are not an admin','_self')</script>";
}
else{





?>
<?php

include("includes/db.php");

if(isset($_GET['delete_brand'])){
	$delete_id=$_GET['delete_brand'];

	$sel_brand="delete from brands where brand_id='$delete_id'";

	$run_brand=mysqli_query($conn,$sel_brand);

	if($run_brand){
		echo "<script>alert('A brand has been deleted')</script>";
		echo "<script>window.open('index.php?view_brands','_self')</script>";
	}
}



}
?>