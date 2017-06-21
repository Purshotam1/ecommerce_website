<!DOCTYPE html>
<html>
<head>
	<title>Admin Login</title>
	<link rel="stylesheet"  href="styles/admin_style.css" media="all">
</head>
<body>

  <div class="login">
    <h2 style="text-align: center;color: white;"><?php echo @$_GET['not_admin']; ?></h2>
	<h1>Admin Login</h1>
    <form method="post">
    	<input type="text" name="email" placeholder="Email" required="required" />
        <input type="password" name="pass" placeholder="Password" required="required" />
        <button type="submit" class="btn btn-primary btn-block btn-large" name="login">LogIn</button>
    </form>
</div>

</body>
</html>

<?php 
session_start();
include("includes/db.php");

if(isset($_POST['login'])){
	$email=$_POST['email'];
	$pass=$_POST['pass'];

	$sel_c="select * from admins where user_email='$email' AND user_pass='$pass'";

	$run_c=mysqli_query($conn,$sel_c);

	$check_c=mysqli_num_rows($run_c);

	if($check_c==0){
		echo "<script>alert('email or password is incorrect')</script>";
	}
	else{
		$_SESSION['user_email']=$email;
		echo "<script>window.open('index.php?logged_in=You are logged in','_self')</script>";
	}
}




?>