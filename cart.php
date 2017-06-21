
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
           	<li><a href="customer_register.php">Sign Up</a></li>
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
             Welcome Guest! <b style="color: yellow">Shopping Cart - </b>Total Items:<?php addItems(); ?> Total Price:<?php total_price(); ?> <a href="index.php" style="color: yellow;">Back to Shop</a>
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
          
  




           

           <form action="" method="post" enctype="multipart/form-data">

             <table align="center" width="700" bgcolor="skyblue">

              <tr align="center">
                <td>Remove</td>
                <td>Product(s)</td>
                <td>Quantity</td>
                <td>Total Price</td>
              </tr>
             
              <?php
           $total=0;
  $ip=getIp();

  $get_pro="select * from cart where ip_add='$ip'";

  $run_pro=mysqli_query($conn,$get_pro);
  

  while($p_price=mysqli_fetch_array($run_pro)){
    $pro_id=$p_price['p_id'];
    
    $get_price="select * from products where product_id='$pro_id'";

    $run_price=mysqli_query($conn,$get_price);
    while($pp_price=mysqli_fetch_array($run_price)){
      $product_price=array($pp_price['product_price']);
      $product_title=$pp_price['product_title'];
      $product_image=$pp_price['product_image'];
      $single_price=$pp_price['product_price'];

      $values=array_sum($product_price);

      $total+=$values;

      ?>
  

              <tr align="center">
                <td><input type="checkbox" name="remove[]" value="<?php echo $pro_id; ?>"></td>
                <td><?php echo $product_title; ?><br>
                <img src="admin_area/product_images/<?php echo $product_image; ?>" width="80" hieght="80">

                </td>
                <td><input type="text" size="3" name="qty" value="<?php echo $_SESSION['qty'] ; ?>"></td>
                 <?php
              if(isset($_POST['update_cart'])){
                $qty=$_POST['qty'];

                $set_qty="update cart set qty='$qty'";

                $run_qty=mysqli_query($conn,$set_qty);
               $_SESSION['qty']=$qty;
                

                $total+=$single_price*($qty-1);

              } 

              ?>
                <td><?php echo "$",$single_price; ?></td>
              </tr>
              <?php } } 

              ?>
             

              <tr align="right">
                <td colspan="4">Sub Total</td>
                <td colspan="4"><?php echo "$".$total; ?></td>
              </tr>

              <tr align="center">
                <td colspan="2"><input type="submit" name="update_cart" value="Update Cart"></td>
                <td><input type="submit" name="continue_shopping" value="Continue Shopping"></td>
                <td><button><a href="checkout.php" style="text-decoration: none; color: black;">checkout</a></button></td>
              </tr>
               
             </table>
             
           </form>

           <?php
            if(isset($_POST['remove'])){
              updatecart();
            }
           
            function updatecart(){
              global $conn;
            
            $ip=getIp();
           if(isset($_POST['update_cart'])){
            foreach($_POST['remove'] as $remove_id ){
              $delete_item="delete from cart where p_id='$remove_id' AND ip_add='$ip'";

              $run_delete=mysqli_query($conn,$delete_item);

            }

            if($run_delete){
              echo "<script>window.open('cart.php','_self')</script>";
            }
           } 

         }
           if(isset($_POST['continue_shopping'])){
            echo "<script>window.open('index.php','_self')</script>";
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