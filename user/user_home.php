<?php

@include 'config.php';

session_start();

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

    <?php include 'user_header.php'; ?>


    <section class="home" id="home">

        <div class="content">
            <h3>Gifts As You want</h3>
            <span> Crative And Beautiful Gifts</span>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae laborum ut minus corrupti dolorum dolore assumenda iste voluptate dolorem pariatur.</p>
            <a href="product.php" class="btn">shop now</a>
        </div>
        
    </section>



<section class="footer">

    <div class="box-container">

        <div class="box">
            <h3>quick links</h3>
            <a href="#">home</a>
            <a href="about.php">about</a>
            <a href="category.php">category</a>
            <a href="product.php">products</a>
        </div>

        <div class="box">
            <h3>extra links</h3>
            <a href="#">my account</a>
            <a href="#">my order</a>
            <a href="favorite.php">my favorite</a>
        </div>

        <div class="box">
            <h3>locations</h3>
            <a href="#">India Gujarat</a>
        </div>

        <div class="box">
            <h3>contact info</h3>
            <a href="#">+123-456-7890</a>
            <a href="#">example@gmail.com</a>
            <a href="#">gujarat, india</a>
        </div>

    </div>

    <div class="credit"> created by <span> Group ID: IT-53-07 </span></div>

</section>
    <script src="js/admin_script.js"></script>
</body>
</html>
<!-- <!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>home</title>

   <-- font awesome cdn link  -->
   <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"> -->

   <!-- custom admin css file link  -->
   <!-- <link rel="stylesheet" href="css/login_style.css"> -->
/
<!-- </head>
<body>
   
?php @include 'user_header.php'; ?>



<script src="js/script.js"></script>

</body>
</html>  -->