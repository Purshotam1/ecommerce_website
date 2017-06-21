
     <h2 align="center">Change Password</h2>
<form action="" method="post" enctype="multipart/from-data">
	<table align="center" width="600">
		<tr>
			<td align="right">Enter Current Password</td>
			<td><input type="password" name="current_pass"></td>
		</tr>

		<tr>
			<td align="right">Enter New Password</td>
			<td><input type="password" name="new_pass"></td>
		</tr>

		<tr>
			<td align="right">Enter New Password Again</td>
			<td><input type="password" name="new_pass_again"></td>
		</tr>

		<tr align="center">
			
			<td colspan="8"><input type="submit" name="change_pass" value="Change Password"></td>
		</tr>
	</table>




</form>

<?php
include("includes/db.php");

$user=$_SESSION['customer_email'];

if(isset($_POST['change_pass'])){
	$curr_pass=$_POST['current_pass'];
	$new_pass=$_POST['new_pass'];
	$new_again=$_POST['new_pass_again'];

	$sel_pass="select * from customers where customer_email='$user'";

	$run_pass=mysqli_query($conn,$sel_pass);

	$check_pass=mysqli_num_rows($run_pass);

	if($check_pass==0){
		echo "<script>alert('Current password is wrong')</script>";
	}

	if($new_pass!=$new_again){
		echo "<script>alert('New password is wrong')</script>";
	}
	else{
		$update_pass="update customers set customer_pass='$new_pass'";

		$run_update=mysqli_query($conn,$update_pass);

		echo "<script>alert(' password is updated')</script>";
		echo "<script>window.open('my_account.php','_self')</script>";
	}
}



?>