
<!DOCTYPE>
<?php
session_start();
include("functions/functions.php");
include("customer/includes/db.php");

if(isset($_SESSION['customer_email'])){
  echo "<script>alert('You are already logged in')</script>";
  echo "<script>window.open('customer/my_account.php','_self')</script>";
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
           </span>
         </div>


         <form action="customer_register.php" method="post" enctype="multipart/form-data" >

           <table align="center" width="750">
             <tr align="center">
               <td colspan="6"><h2>Create an Account</h2></td>
             </tr>

             <tr>
               <td align="right">Customer Name:</td>
               <td><input type="text" name="c_name"></td>
             </tr>

              <tr>
               <td align="right">Customer Email:</td>
               <td><input type="text" name="c_email"></td>
             </tr>

              <tr>
               <td align="right">Customer Password:</td>
               <td><input type="password" name="c_pass"></td>
             </tr>

             <tr>
               <td align="right">Customer Image</td>
               <td><input type="file" name="c_image"></td>
             </tr>

              <tr>
               <td align="right">Customer country</td>
               <td>
                 <select name="c_country">
                   <option>Select a Country</option>
                   <option>Afganistan</option>
                   <option>India</option>
                   <option>Pakistan</option>
                   <option>Australia</option>
                   <option>New Zealand</option>
                   <option>USA</option>
                   <option>Sri Lanka</option>
                   <option>Bangladesh</option>
                   <option>England</option>
                   <option>Germany</option>
                 </select>
               </td>
             </tr>

              <tr>
               <td align="right">Customer City</td>
               <td><input type="text" name="c_city"></td>
             </tr>

              <tr>
               <td align="right">Customer Contact</td>
               <td><input type="text" name="c_contact"></td>
             </tr>

             <tr>
               <td align="right">Customer Address</td>
               <td><input type="text" name="c_address"></td>
             </tr>

             <tr align="center">
               <td colspan="6"><input type="submit" name="register" value="Create Account"></td>
             </tr>
           </table>
           
         </form>


       </div>

       </div>
       <!--contenet area ends here-->

       <div id="footer">this is footer</div>






















   	
   </div>
   <!--main_warapper ends here-->

</body>
</html>

<?php
  if(isset($_POST['register'])){
    $ip=getIp();

    $c_name=$_POST['c_name'];
    $c_email=$_POST['c_email'];
    $c_pass=$_POST['c_pass'];

    $c_image=$_FILES['c_image']['name'];
    $c_image_tmp=$_FILES['c_image']['tmp_name'];
    $c_country=$_POST['c_country'];
    $c_city=$_POST['c_city'];

    $c_contact=$_POST['c_contact'];
    $c_address=$_POST['c_address'];

    move_uploaded_file($c_image_tmp, "customer/customer_images/$c_image");

     $insert_c="insert into customers (customer_ip,customer_name,customer_email,customer_pass,customer_country,customer_city,customer_contact,customer_address,customer_image) 
    values('$ip','$c_name','$c_email','$c_pass','$c_country','$c_city','$c_contact','$c_address','$c_image')";

    $run_c= mysqli_query($conn,$insert_c);
    
    $sel_cart="select * from cart where ip_add='$ip'";

    $run_cart=mysqli_query($conn,$sel_cart);

    $check_cart=mysqli_num_rows($run_cart);


    if($check_cart==0){
      $_SESSION['customer_email']=$c_email;
      

      echo "<script>alert('Acount has been created succefully')</script>";
      echo "<script>window.open('customer/my_account.php','_self')</script>";
    }
    else{
      $_SESSION['customer_email']=$c_email;

      echo "<script>alert('Acount has been created succefully')</script>";
      echo "<script>window.open('checkout.php','_self')</script>";
    }

  }




?>