<?php


if(!isset($_SESSION['user_email'])){
	echo "<script>window.open('login.php?not_admin=you are not an admin','_self')</script>";
}
else{





?>

<table align="center" width="795" bgcolor="pink">
	<tr align="center">
		<td colspan="6"><h2>View all categories here</h2></td>
	</tr>

	<tr align="center" bgcolor="skyblue">
		<th>Category Id</th>
		<th>Category title</th>
		
		<th>Edit</th>
		<th>Delete</th>
	</tr>

	<?php
	include("includes/db.php");
	$get_cat="select * from categories";
    $i=0;
	$run_cat=mysqli_query($conn,$get_cat);

	while($row_pro=mysqli_fetch_array($run_cat)){
		$cat_id=$row_pro['cat_id'];
		$cat_title=$row_pro['cat_title'];
		
		$i++;
	



	?>

	<tr align="center">
		<td><?php echo $i;  ?></td>
		<td><?php echo $cat_title;  ?></td>
		
		<td><a href="index.php?edit_cat=<?php echo $cat_id;?>">Edit</a></td>
		<td><a href="delete_cat.php?delete_cat=<?php echo $cat_id;?>">Delete</a></td>
	</tr>

	<?php } ?>
</table>
<?php } ?>