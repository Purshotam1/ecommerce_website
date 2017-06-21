<?php
session_start();

if(!isset($_SESSION['user_email'])){
	echo "<script>window.open('login.php?not_admin=you are not an admin','_self')</script>";
}
else{





?>
<?php
include("includes/db.php"); 
$cat_id=$_GET['edit_cat'];

$sel_cat="select * from categories where cat_id='$cat_id'";

$run_cat=mysqli_query($conn,$sel_cat);

$row_cat=mysqli_fetch_array($run_cat);

$cat_title=$row_cat['cat_title'];



?>



<form action="" method="post" style="padding: 80px;">
	<b>Update category</b>
	<input type="text" name="new_cat" value="<?php echo $cat_title; ?>">
	<input type="submit" name="update_cat" value="Update Category">
</form>






<?php 


	if(isset($_POST['update_cat'])){
	
	$new_cat = $_POST['new_cat'];
	
	$update_cat = "update categories set cat_title='$new_cat' where cat_id='$cat_id'";

	$run = mysqli_query($conn, $update_cat); 
	
	if($run){
	
	echo "<script>alert(' Category has been Updated!')</script>";
	echo "<script>window.open('index.php?view_cats','_self')</script>";
	}
	}
}
?>

