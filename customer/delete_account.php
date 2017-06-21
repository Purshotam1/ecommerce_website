
 <h2 style="text-align: center;">DO you really want to DELETE your account</h2>

<form  action="" method="post" >

<br>
	<p align="center"><input type="submit" name="yes" value="yes i want">
	<input type="submit" name="no" value="no, i was joking"></p>
</form>



<?php
include("includes/db.php");

$user=$_SESSION['customer_email'];

if(isset($_POST['yes'])){
	$delete_c="delete from customers where customer_email='$user'";

	mysqli_query($conn,$delete_c);
	echo "<script>alert('Account deleted')</script>";
	echo "<script>window.open('../index.php','_self')</script>";
}
if(isset($_POST['no'])){

	echo "<script>window.open('my_account.php','_self')</script>";
}



?>