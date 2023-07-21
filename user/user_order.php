<?php

@include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:../admin/login.php');
}

if(isset($_GET['delete'])){
    $delete_id = $_GET['delete'];
    $delete_query = mysqli_query($conn, "DELETE FROM `order` WHERE id = $delete_id ") or die('query failed');
    if($delete_query){
       header('location:user_order.php');
       $message[] = 'category has been deleted';
    }else{
       header('location:user_order.php');
       $message[] = 'category could not be deleted';
    };
 };

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>orders</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom admin css file link  -->
   <link rel="stylesheet" href="css/user_style.css">

</head>
<body>
   
<?php @include 'user_header.php'; ?>

<section class="heading">
    <h5>your orders</h5>
    <h6> <a href="user_home.php">home</a> / order </h6>
</section>

<section class="placed-orders">

    <h1 class="heading">placed orders</h1>

    <div class="box-container">

    <?php
        $select_orders = mysqli_query($conn, "SELECT * FROM `order` WHERE user_id = '$user_id'") or die('query failed');
        if(mysqli_num_rows($select_orders) > 0){
            while($fetch_orders = mysqli_fetch_assoc($select_orders)){
    ?>
    <div class="box">
        <p> name : <span><?php echo $fetch_orders['name']; ?></span> </p>
        <p> number : <span><?php echo $fetch_orders['number']; ?></span> </p>
        <p> email : <span><?php echo $fetch_orders['email']; ?></span> </p>
        <p> address : <span><?php echo $fetch_orders['flat'], $fetch_orders['street'], $fetch_orders['city'], $fetch_orders['state'], $fetch_orders['country']; ?></span> </p>
        <p> payment method : <span><?php echo $fetch_orders['method']; ?></span> </p>
        <p> your orders : <span><?php echo $fetch_orders['total_products']; ?></span> </p>
        <p> total price : <span>rs.<?php echo $fetch_orders['total_price']; ?>/-</span> </p>
        <p> payment status : <span style="color:<?php if($fetch_orders['payment_status'] == 'pending'){echo 'tomato'; }else{echo 'green';} ?>"><?php echo $fetch_orders['payment_status']; ?></span> </p>
        <form action="" method="get">
            <p>
            <a href="user_order.php?delete=<?php echo $fetch_orders['id']; ?>" class="delete-btn" onclick="return confirm('are your sure you want to delete placed order?');"> <i class="fas fa-trash"></i>&nbsp cancel order </a>
            </p>
        </form>
    </div>
    <?php
        }
    }else{
        echo '<h1 class="empty">no orders placed yet!</h1>';
    }
    ?>
    </div>

</section>


<script src="js/admin_script.js"></script>

</body>
</html>