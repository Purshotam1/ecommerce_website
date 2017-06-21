
<!DOCTYPE>
<?php
session_start();
include("functions/functions.php");

if(!isset($_SESSION['customer_email'])){
  echo "<script>alert('You are not logged in,first log in!')</script>";
  echo "<script>window.open('../checkout.php','_self')</script>";
}

?>
<html>
<head>
	<title>My Online Shop</title>






	<link rel="stylesheet" href="styles/style.css" media="all" />
</head>
<body>
   <!--main_wrapper starts here-->
   <div class="main_wrapper">
       <!--header starts here-->
       <div class="header_wrapper">
           
           <a href="index.php"><img  style="height: 50%;width: 50%;" id="logo" src="images/logo.png"></a>
           <a href="index.php"><img style="height: 50%;width: 50%;" id="banner" src="images/ad_banner.jpg"></a>

           	

       </div>
       <!--header ends here-->

       <!--navigation bar starts here-->
       <div class="menubar">
           <ul id="menu">
           	<li><a href="../index.php">Home</a></li>
           	<li><a href="../all_products.php">All Products</a></li>
           	<li><a href="my_account.php">My Account</a></li>
           	<li><a href="../customer_register.php">Sign Up</a></li>
           	<li><a href="../cart.php">Shopping Cart</a></li>
           	<li><a href="#">Contact Us</a></li>
           </ul>

           <div  id="form">
           	  <form method="get" action="results.php" enctype="multipart/form-data">
           	  	  <input type="text" name="user_query" placeholder="Search a Product">
           	  	  <input type="submit" name="search" value="Search">
           	  </form>
           </div>
       	
       </div>
       <!--navigation bar ends here-->

       <!--content area starts here-->
       <div class="content_wrapper">
       	<div id="sidebar">
          <div id="sidebar_title">My Account</div>



          <ul id="cats">
           <?php
          $c_email=$_SESSION['customer_email'];

          $sel_img="select * from customers where customer_email='$c_email'";

          $run_image=mysqli_query($conn,$sel_img);

          $row_image=mysqli_fetch_array($run_image);

          $c_image=$row_image['customer_image'];
          $c_name=$row_image['customer_name'];

          echo "<p style='text-align:center';><img  src='customer_images/$c_image' width='150' height='150'/></p>" 



          ?>

            <li><a href="my_account.php?my_orders">My Orders</a></li>
            <li><a href="my_account.php?edit_account">Edit Account</a></li>
            <li><a href="my_account.php?change_pass">Change Password</a></li>
            <li><a href="my_account.php?delete_account">Delete Account</a></li>
            <li><a href="../logout.php">Log Out</a></li>
          </ul>
         </div>

       <div id="content_area">
       <?php cart(); ?>

         <div id="shopping_cart">
           <span style="float: right;size: 18px;line-height: 40px;padding: 5px;">
             <?php

             if(isset($_SESSION['customer_email'])){
              echo "Welcome ".$_SESSION['customer_email'];
             } 

            



             ?>

             <?php
             if(!isset($_SESSION['customer_email'])){
              echo "<a href='../checkout.php' style='color:orange;'>LogIn</a>";
             }
             else{
              echo "<a href='../logout.php' style='color:orange;'>LogOut</a>";
             }



             ?>
           </span>
         </div>
          <div id="products_box">
          <?php
            if(!isset($_GET['my_orders'])){
              if(!isset($_GET['edit_account'])){
                if(!isset($_GET['change_pass'])){
                  if(!isset($_GET['delete_account'])){
                    echo "<h2 style='padding: 20px; text-align: center'>Welcome $c_name</h2><br>

            <p style='text-align: center;'><b>You can check your orders by clicking this <a href='my_account.php?my_orders'>link</a></b></p>";
                  }
                }
              }
            }

            if(isset($_GET['edit_account'])){
              include("edit_account.php");
            }
             if(isset($_GET['change_pass'])){
              include("change_pass.php");
            }
            if(isset($_GET['delete_account'])){
              include("delete_account.php");
            }



            ?>
            
            

          </div>

         


       </div>

       </div>
       <!--contenet area ends here-->

       <div id="footer">this is footer</div>






















   	
   </div>
   <!--main_warapper ends here-->

</body>
</html>