<?php
// ini_set('display_errors','Off');
// ini_set('error_reporting', E_ALL );
// define('WP_DEBUG', false);
// define('WP_DEBUG_DISPLAY', false);

@include 'config.php';
session_start();
$admin_id = $_SESSION['admin_id'];

if(isset($_POST['reactive'])){

   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_POST['product_image'];
   $product_category = $_POST['category'];

   $select_product = mysqli_query($conn, "SELECT * FROM `products` WHERE name = '$product_name'");

   if(mysqli_num_rows($select_product) > 0){
      $message[] = 'product already added to products';
   }else{
      $insert_product = mysqli_query($conn, "INSERT INTO `products`(name, category, price, image) VALUES('$product_name', '$product_category', '$product_price', '$product_image')");
      $message[] = 'product added to products succesfully';
   }

};

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>reactive products</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="admin_css/style.css">
</head>
<body>
   
<?php

if(isset($message)){
   foreach($message as $message){
      echo '<div class="message"><span>'.$message.'</span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>';
   };
};

?>

<?php include 'header.php'; ?>

<div class="container">

   <section class="products">

      <h1 class="heading">All disactived products</h1>

      <div class="box-container">

         <?php
         
            $select_products = mysqli_query($conn, "SELECT * FROM `disactive`");
            if(mysqli_num_rows($select_products) > 0){
               while($fetch_product = mysqli_fetch_assoc($select_products)){
         ?>

         <form action="" method="post">
            <div class="box">
                <img src="uploaded_img/<?php echo $fetch_product['image']; ?>" alt="">
                <h3><?php echo $fetch_product['category']; ?></h3>
                <h3><?php echo $fetch_product['name']; ?></h3>
                <input type="hidden" name="product_name" value="<?php echo $fetch_product['name']; ?>">
                <input type="hidden" name="category" value="<?php echo $fetch_product['category']; ?>">
                <input type="hidden" name="product_price" value="<?php echo $fetch_product['price']; ?>">
                <h3><div class="price" name="product_price">Rs.<?php echo number_format($fetch_product['price'],1); ?>/-<span></span> </div></h3>
                <input type="hidden" name="product_image" value="<?php echo $fetch_product['image']; ?>">
                <input type="submit"class="delete-btn" value="Reactive" name="reactive" >
            </div>
         </form>

         <?php
            };
         };
         ?>

      </div>

   </section>

</div>

<!-- custom js file link  -->
<script src="js/admin_script.js"></script>
<!-- <script src="admin_js/script.js"></script> -->
<!-- <script src="js/admin_script.js"></script> -->
<script src="js_admin/script.js"></script>
</body>
</html>






