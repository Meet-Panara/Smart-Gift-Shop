<?php
ini_set('display_errors','Off');
ini_set('error_reporting', E_ALL );
define('WP_DEBUG', false);
define('WP_DEBUG_DISPLAY', false);
@include 'config.php';
session_start();
$user_id = $_SESSION['user_id'];

$category_name= $_GET['category_name'];

if(isset($_POST['add_to_cart'])){

    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];
    $product_quantity = 1;

    $user_id = $_SESSION['user_id'];
    if(!isset($user_id)){
        header('location:../admin/login.php');
    }

    $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'");

    if(mysqli_num_rows($select_cart) > 0){
        $message[] = 'product already added to cart';
    }else{
        $insert_product = mysqli_query($conn, "INSERT INTO `cart`(user_id, name, price, image, quantity) VALUES('$user_id', '$product_name', '$product_price', '$product_image', '$product_quantity')");
        $message[] = 'product added to cart succesfully';
    }

};

if(isset($_POST['favorite'])){

    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];
 
    $user_id = $_SESSION['user_id'];
    if(!isset($user_id)){
        header('location:../admin/login.php');
    }

    $select_favorite = mysqli_query($conn, "SELECT * FROM `favorite` WHERE name = '$product_name' AND user_id = '$user_id'");
 
    if(mysqli_num_rows($select_favorite) > 0){
       $message[] = 'product already added to favorite list';
    }else{
       $insert_product = mysqli_query($conn, "INSERT INTO `favorite`(user_id, name, price, image) VALUES('$user_id', '$product_name', '$product_price', '$product_image')");
       $message[] = 'product added to favorite list succesfully';
    }
 
 };

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-eqive="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> gift shopping website</title>

    <link rel="StyleSheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="StyleSheet" href="css/user_style.css">

</head>
<body>
    <?php

    if(isset($message)){
        foreach($message as $message){
            echo '<section class="message"><span>'.$message.'</span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i> </section>';
        };
    };

    ?>

    <?php include 'user_header.php'; ?>

    <div class="products" id="products">

        <h1 class="heading"><?php echo $category_name;?></h1>
        
        <div class="box-container">
            
            <?php  
                $select_products = mysqli_query($conn,"SELECT * FROM `products` WHERE category = '$category_name'");
                if(mysqli_num_rows($select_products) > 0){
                    while($fetch_product = mysqli_fetch_assoc($select_products)){
            ?>

            <form action="" method="post">
                <div class="box">
                    <div class="image">
                        <img src="../admin/uploaded_img/<?php echo $fetch_product['image']; ?>" alt="" >
                        <div class="icons">
                            <input type="submit" class="cart-btn" name="favorite" value ="🤍"> 
                            <input type="submit" class="cart-btn" value="add to cart" name="add_to_cart" id="add to cart">
                        </div>
                    </div>
                    <div class="content">
                        <h3><?php echo $fetch_product['name']; ?></h3>
                        <input type="hidden" name="product_name" value="<?php echo $fetch_product['name']; ?>">
                        <input type="hidden" name="product_price" value="<?php echo $fetch_product['price']; ?>">
                        <div class="price" name="product_price">Rs.<?php echo number_format($fetch_product['price'],1); ?>/-<span></span> </div>
                        <input type="hidden" name="product_image" value="<?php echo $fetch_product['image']; ?>">
                    </div>
                </div>
                
            </form>

            <?php   
                    };
                };
            ?>

            
        </div>

    </div>

    <!-- custom js file link  -->
    <script src="js/admin_script.js"></script>
</body>
</html>