<?php
@include 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>admin panel</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   
   <!-- custom css file link  -->
   <link rel="stylesheet" href="admin_css/style.css">

</head>
<body>
<header class="header">

<div class="flex">

   <a href="#" class="logo">Smart Gift Shop</a>

   <nav class="navbar">
      <a href="admin_page.php">home</a>
      <a href="admin_orders.php">orders</a>
      <a href="admin_users.php">users</a>
      <a href="reactive.php">reactive products</a>
      <a href="add_categories.php">add categories</a>
      <a href="add_products.php">add products</a>
      <!-- <a href="admin_view_category.php">view categories</a>-->
      <a id="user-btn" class="fas fa-user"></a>
   </nav>
   <!-- 
   ?php
   
   $select_rows = mysqli_query($conn, "SELECT * FROM `cart`") or die('query failed');
   $row_count = mysqli_num_rows($select_rows);

   ?>

   <a href="admin_cart.php" class="cart">cart <span>0</span> </a> -->
   
   <div id="menu-btn" class="fas fa-bars"></div>
   <form action="" method="post">
   <div class="account-box">
      <p>username : <span><?php echo $_SESSION['admin_name']; ?></span></p>
      <p>email : <span><?php echo $_SESSION['admin_email']; ?></span></p>
      <a href="./admin_logout.php" name="logout" class="delete-btn">logout</a>
   </div>
   </form>

</div>

</header>

<!-- <script src="js_admin/script.js"></script> -->

</body>
</html>