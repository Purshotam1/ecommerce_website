<?php


if(!isset($_SESSION['user_email'])){
	echo "<script>window.open('login.php?not_admin=you are not an admin','_self')</script>";
}
else{





?>
<form action="" method="post" style="padding: 80px;">
	<b>Insert new category</b>
	<input type="text" name="new_cat">
	<input type="submit" name="add_cat" value="Add Category">
</form>






<?php 
include("includes/db.php"); 

	if(isset($_POST['add_cat'])){
	
	$new_cat = $_POST['new_cat'];
	
	$insert_cat = "insert into categories (cat_title) values ('$new_cat')";

	$run_cat = mysqli_query($conn, $insert_cat); 
	
	if($run_cat){
	
	echo "<script>alert('New Category has been inserted!')</script>";
	echo "<script>window.open('index.php?view_cats','_self')</script>";
	}
	}
}
?>

