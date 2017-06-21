<?php 
include("includes/db.php");

$user=$_SESSION['customer_email'];


          $sel_c="select * from customers where customer_email='$user'";

          $run_c=mysqli_query($conn,$sel_c);

          $row_c=mysqli_fetch_array($run_c);

          $c_id=$row_c['customer_id'];
         

          $name=$row_c['customer_name'];
          $email=$row_c['customer_email'];
          $pass=$row_c['customer_pass'];
          $image=$row_c['customer_image'];
          $country=$row_c['customer_country'];
          $city=$row_c['customer_city'];
          $contact=$row_c['customer_contact'];
          $address=$row_c['customer_address'];




?>



<form action="" method="post" enctype="multipart/form-data" >

           <table align="center" width="750">
             <tr align="center">
               <td colspan="6"><h2>Update your Account</h2></td>
             </tr>

             <tr>
               <td align="right">Customer Name:</td>
               <td><input type="text" name="c_name" value=<?php echo $name; ?>></td>
             </tr>

              <tr>
               <td align="right">Customer Email:</td>
               <td><input type="text" name="c_email" value=<?php echo $email; ?>></td>
             </tr>

              <tr>
               <td align="right">Customer Password:</td>
               <td><input type="password" name="c_pass" value=<?php echo $pass; ?>></td>
             </tr>

             <tr>
               <td align="right">Customer Image</td>
               <td><input type="file" name="c_image"><img src="customer_images/<?php echo $image;  ?>" width="50" hieght="50"></td>
             </tr>

              <tr>
               <td align="right">Customer country</td>
               <td>
                 <select name="c_country" >
                   <option><?php echo $country; ?></option>
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
               <td><input type="text" name="c_city" value=<?php echo $city; ?>></td>
             </tr>

              <tr>
               <td align="right">Customer Contact</td>
               <td><input type="text" name="c_contact" value=<?php echo $contact; ?>></td>
             </tr>

             <tr>
               <td align="right">Customer Address</td>
               <td><input type="text" name="c_address" value=<?php echo $address; ?>></td>
             </tr>

             <tr align="center">
               <td colspan="6"><input type="submit" name="update" value="Update Account"></td>
             </tr>
           </table>
           
         </form>





         <?php
  if(isset($_POST['update'])){
   
   $customer_id=$c_id;
   
    $c_name=$_POST['c_name'];
   
    $c_email=$_POST['c_email'];
    $c_pass=$_POST['c_pass'];

    $c_image=$_FILES['c_image']['name'];
    $c_image_tmp=$_FILES['c_image']['tmp_name'];
  
    $c_city=$_POST['c_city'];

    $c_contact=$_POST['c_contact'];
    $c_address=$_POST['c_address'];

    move_uploaded_file($c_image_tmp, "customer_images/$c_image");

     $update_c="update customers set customer_name='$c_name',customer_email='$c_email',customer_pass='$c_pass',customer_city='$c_city',customer_contact='$c_contact',customer_address='$c_address',customer_image='$c_image' where customer_id='$customer_id'";

    $run_update= mysqli_query($conn,$update_c);
    
    if($run_update){
      echo "<script>alert('Account has been updated')</script>";
      echo "<script>window.open('my_account.php','_self')</script>";
    }

  }




?>