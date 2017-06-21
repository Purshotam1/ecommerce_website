<?php
session_start();

if(!isset($_SESSION['user_email'])){
	echo "<script>window.open('login.php?not_admin=you are not an admin','_self')</script>";
}
else{





?>
<?php
include("includes/db.php");

if(isset($_GET['delete_c'])){
	$delete_id=$_GET['delete_c'];

	$sel_c="delete from customers where customer_id='$delete_id'";

	$run_c=mysqli_query($conn,$sel_c);

	if($run_c){
		echo "<script>alert('A customer has been deleted')</script>";
		echo "<script>window.open('index.php?view_customers','_self')</script>";
	}
}


}

?>