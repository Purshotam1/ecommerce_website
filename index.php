
<!DOCTYPE>
<?php
session_start();
include("functions/functions.php");

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
           	<li><a href="index.php">Home</a></li>
           	<li><a href="all_products.php">All Products</a></li>
           	<li><a href="customer/my_account.php">My Account</a></li>
           	<li><a href="#">Sign Up</a></li>
           	<li><a href="cart.php">Shopping Cart</a></li>
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
          <div id="sidebar_title">Catagories</div>

          <ul id="cats">
            <?php getcats() ;?>
          </ul>

          <div id="sidebar_title">Brands</div>

          <ul id="cats">
            <?php getbrands(); ?>
          </ul>


        </div>

       <div id="content_area">
       <?php cart(); ?>

         <div id="shopping_cart">
           <span style="float: right;size: 18px;line-height: 40px;padding: 5px;">
             Welcome Guest! <b style="color: yellow">Shopping Cart - </b>Total Items:<?php addItems(); ?> Total Price:<?php total_price(); ?> <a href="cart.php" style="color: yellow;">Go to Cart</a>

             <?php
             if(!isset($_SESSION['customer_email'])){
              echo "<a href='checkout.php' style='color:orange;'>LogIn</a>";
             }
             else{
              echo "<a href='logout.php' style='color:orange;'>LogOut</a>";
             }



             ?>
           </span>
         </div>


         <div id="products_box">
           <?php getpro(); ?>
           
           <?php getCatpro(); ?>
           <?php getBrandpro(); ?>

         </div>


       </div>

       </div>
       <!--contenet area ends here-->

       <div id="footer">this is footer</div>






















   	
   </div>
   <!--main_warapper ends here-->

</body>
</html>