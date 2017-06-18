<?php

$conn =mysqli_connect("localhost","root","","ecommerce");

//getting ip address
function getIp(){

        $ip = $_SERVER['REMOTE_ADDR'];     
        if($ip){
            if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
                $ip = $_SERVER['HTTP_CLIENT_IP'];
            } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
            }
            return $ip;
        }
        // There might not be any data
        return false;
    }

//Adding items  to cart
function cart(){
	global $conn;

	if(isset($_GET['add_cart'])){
		$pro_id=$_GET['add_cart'];
		$ip=getIp();

		$check_query="select * from cart where p_id='$pro_id' AND ip_add='$ip'";

		$run_check=mysqli_query($conn,$check_query);

		if(mysqli_num_rows($run_check)>0){
			echo "";
		}
		else{
			$insert_pro="insert into cart (p_id,ip_add) values ('$pro_id','$ip')";

			$run=mysqli_query($conn,$insert_pro);

			echo "<script>window.open('index.php','_self')</script>";
		} 
	}
}

//deisplaying no of items in the cart
function addItems(){
	if(isset($_SESSION['customer_email'])){
		global $conn;

	if(isset($_GET['add_cart'])){
		$ip=getIp();

		$get_items="select * from cart where ip_add='$ip'";

		$run_items=mysqli_query($conn,$get_items);

		$count_items=mysqli_num_rows($run_items);
	}
	else{
		$ip=getIp();

		$get_items="select * from cart where ip_add='$ip'";

		$run_items=mysqli_query($conn,$get_items);

		$count_items=mysqli_num_rows($run_items);
	}

	echo $count_items;
	}
	else
	{
		echo "0";
	}
}

//adding the total price
function total_price(){
	if(isset($_SESSION['customer_email'])){
		global $conn;
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

			$values=array_sum($product_price);

			$total+=$values;
		}
	}
	echo "$".$total;
	}
	else{
		echo "0";
	}
}


// getting the categories
function getcats(){
    global $conn;

	$get_cats ="select * from categories";

	$run_cats=mysqli_query($conn,$get_cats);

	while($row_cats=mysqli_fetch_array($run_cats)){
		$cat_id=$row_cats['cat_id'];
		$cat_title=$row_cats['cat_title'];

		echo "<li><a href='index.php?cat=$cat_id'>$cat_title</a></li>";
	}
}

// getting the brands
function getbrands(){
    global $conn;

	$get_brands ="select * from brands";

	$run_brands=mysqli_query($conn,$get_brands);

	while($row_brands=mysqli_fetch_array($run_brands)){
		$brand_id=$row_brands['brand_id'];
		$brand_title=$row_brands['brand_title'];

		echo "<li><a href='index.php?brand=$brand_id'>$brand_title</a></li>";
	}
}

function getpro(){
	global $conn;
    if(!isset($_GET['cat'])){
    	if(!isset($_GET['brand'])){
	$get_pro="select * from products order by RAND() LIMIT 0,6";

	$run_pro=mysqli_query($conn,$get_pro);

	while($row_pro=mysqli_fetch_array($run_pro)){
		$pro_id=$row_pro['product_id'];
		$pro_cat=$row_pro['product_cat'];
		$pro_brand=$row_pro['product_brand'];
		$pro_title=$row_pro['product_title'];
		$pro_price=$row_pro['product_price'];
		$pro_image=$row_pro['product_image'];

		echo "
             <div id='single_product'>
                  <h3>$pro_title</h3>
                  <img src='admin_area/product_images/$pro_image' width='180' height='180' />
                  <p><b>$ $pro_price</b></p>

                  <a href='details.php?pro_id=$pro_id' style='float:left;'>Details</a>
                  <a href='index.php?add_cart=$pro_id'><button style='float:right;'>Add to Cart</button></a>


             </div>
             


		";
	}
}
}
}

function getCatpro(){
	
    if(isset($_GET['cat'])){
    	$cat_id=$_GET['cat'];
    	global $conn;
    	
	$get_cat_pro="select * from products where product_cat='$cat_id'";

	$run_cat_pro=mysqli_query($conn,$get_cat_pro);
     
     $count_rows=mysqli_num_rows($run_cat_pro);

     if($count_rows==0)
     {
     	echo "<h2 style='padding:20px;'>No product Found</h2>";
     }
     

	while($row_cat_pro=mysqli_fetch_array($run_cat_pro)){
		$pro_id=$row_cat_pro['product_id'];
		$pro_cat=$row_cat_pro['product_cat'];
		$pro_brand=$row_cat_pro['product_brand'];
		$pro_title=$row_cat_pro['product_title'];
		$pro_price=$row_cat_pro['product_price'];
		$pro_image=$row_cat_pro['product_image'];

		echo "
             <div id='single_product'>
                  <h3>$pro_title</h3>
                  <img src='admin_area/product_images/$pro_image' width='180' height='180' />
                  <p><b>$ $pro_price</b></p>

                  <a href='details.php?pro_id=$pro_id' style='float:left;'>Details</a>
                  <a href='index.php?add_cart=$pro_id'><button style='float:right;'>Add to Cart</button></a>


             </div>
             


		";
	}

}
}

function getBrandpro(){
	
    if(isset($_GET['brand'])){
    	$brand_id=$_GET['brand'];
    	global $conn;
    	
	$get_brand_pro="select * from products where product_brand='$brand_id'";

	$run_brand_pro=mysqli_query($conn,$get_brand_pro);
     
     $count_rows=mysqli_num_rows($run_brand_pro);

     if($count_rows==0)
     {
     	echo "<h2 style='padding:20px;'>No product Found</h2>";
     }

	while($row_brand_pro=mysqli_fetch_array($run_brand_pro)){
		$pro_id=$row_brand_pro['product_id'];
		$pro_cat=$row_brand_pro['product_cat'];
		$pro_brand=$row_brand_pro['product_brand'];
		$pro_title=$row_brand_pro['product_title'];
		$pro_price=$row_brand_pro['product_price'];
		$pro_image=$row_brand_pro['product_image'];

		echo "
             <div id='single_product'>
                  <h3>$pro_title</h3>
                  <img src='admin_area/product_images/$pro_image' width='180' height='180' />
                  <p><b>$ $pro_price</b></p>

                  <a href='details.php?pro_id=$pro_id' style='float:left;'>Details</a>
                  <a href='index.php?add_cart=$pro_id'><button style='float:right;'>Add to Cart</button></a>


             </div>
             


		";
	}

}
}




?>