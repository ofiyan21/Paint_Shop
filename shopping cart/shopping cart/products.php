<?php

include 'config.php';

if(isset($_POST['add_to_cart'])){

   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_POST['product_image'];
   $product_quantity = 1;

   $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name'");

   if(mysqli_num_rows($select_cart) > 0){
      echo '<script language="javascript">';
		echo 'alert("Product already added to cart"); location.href="cart.php"';
		echo'</script>';
   }else{
      $insert_product = mysqli_query($conn, "INSERT INTO `cart`(name, price, image, quantity) VALUES('$product_name', '$product_price', '$product_image', '$product_quantity')");
   
      echo '<script language="javascript">';
		echo 'alert("Product added to cart succesfully"); location.href="cart.php"';
		echo'</script>';
      
     
   }
   
   //header('Location: cart.php');
    
}





