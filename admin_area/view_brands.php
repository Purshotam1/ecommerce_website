<?php


if(!isset($_SESSION['user_email'])){
	echo "<script>window.open('login.php?not_admin=you are not an admin','_self')</script>";
}
else{





?>

<table align="center" width="795" bgcolor="pink">
	<tr align="center">
		<td colspan="6"><h2>View all Brands here</h2></td>
	</tr>

	<tr align="center" bgcolor="skyblue">
		<th>Brand Id</th>
		<th>Brand title</th>
		
		<th>Edit</th>
		<th>Delete</th>
	</tr>

	<?php
	include("includes/db.php");
	$get_brand="select * from brands";
    $i=0;
	$run_brand=mysqli_query($conn,$get_brand);

	while($row_pro=mysqli_fetch_array($run_brand)){
		$brand_id=$row_pro['brand_id'];
		$brand_title=$row_pro['brand_title'];
		
		$i++;
	



	?>

	<tr align="center">
		<td><?php echo $i;  ?></td>
		<td><?php echo $brand_title;  ?></td>
		
		<td><a href="index.php?edit_brand=<?php echo $brand_id;?>">Edit</a></td>
		<td><a href="delete_brand.php?delete_brand=<?php echo $brand_id;?>">Delete</a></td>
	</tr>

	<?php } ?>
</table>
<?php } ?>