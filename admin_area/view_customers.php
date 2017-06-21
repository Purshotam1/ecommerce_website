<?php


if(!isset($_SESSION['user_email'])){
	echo "<script>window.open('login.php?not_admin=you are not an admin','_self')</script>";
}
else{





?>

<table align="center" width="795" bgcolor="pink">
	<tr align="center">
		<td colspan="6"><h2>View all Customers here</h2></td>
	</tr>

	<tr align="center" bgcolor="skyblue">
		<th>S.N</th>
		<th>Nmae</th>
		<th>Email</th>
		<th>Image</th>
		
		
		<th>Delete</th>
	</tr>

	<?php
	include("includes/db.php");
	$get_c="select * from customers";
    $i=0;
	$run_c=mysqli_query($conn,$get_c);

	while($row_pro=mysqli_fetch_array($run_c)){
		$c_id=$row_pro['customer_id'];
		$c_name=$row_pro['customer_name'];
		$c_image=$row_pro['customer_image'];
		$c_email=$row_pro['customer_email'];
		$i++;
	



	?>

	<tr align="center">
		<td><?php echo $i;  ?></td>
		<td><?php echo $c_name;  ?></td>
		<td><?php echo $c_email;  ?></td>
		<td><img src="../customer/customer_images/<?php echo $c_image;  ?>" width="60" hieght="60"></td>
		
		
		<td><a href="delete_c.php?delete_c=<?php echo $c_id;?>">Delete</a></td>
	</tr>

	<?php } ?>
</table>
<?php } ?>