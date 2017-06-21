<?php
session_start();

if(!isset($_SESSION['user_email'])){
	echo "<script>window.open('login.php?not_admin=you are not an admin','_self')</script>";
}
else{





?>
<?php
include("includes/db.php");

if(isset($_GET['delete_pro'])){
	$delete_id=$_GET['delete_pro'];

	$sel_pro="delete from products where product_id='$delete_id'";

	$run_pro=mysqli_query($conn,$sel_pro);

	if($run_pro){
		echo "<script>alert('A product has been deleted')</script>";
		echo "<script>window.open('index.php?view_product','_self')</script>";
	}
}



}
?>