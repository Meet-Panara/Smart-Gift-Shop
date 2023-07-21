<?php

@include 'config.php';

session_start();
$user_id = $_SESSION['user_id'];
if(!isset($user_id)){
    header('location:../admin/login.php');
}

if(isset($_GET['remove'])){
    $remove_id = $_GET['remove'];
    mysqli_query($conn, "DELETE FROM `favorite` WHERE id = '$remove_id'");
    header('location:favorite.php');
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
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
    <div class="products" id="products">

        <?php include 'user_header.php'; ?>

        <h1 class="heading"> liked <span>products</span> </h1>

        <div class="box-container">
            
            <?php  
                $select_favorite = mysqli_query($conn," SELECT * FROM `favorite` WHERE user_id = '$user_id'");
                if(mysqli_num_rows($select_favorite) > 0){
                    while($fetch_favorite = mysqli_fetch_assoc($select_favorite)){
            ?>

            <form action="" method="get">
                <div class="box">
                    <div class="image">
                        <img src="../admin/uploaded_img/<?php echo $fetch_favorite['image']; ?>" alt="" >
                        <!-- <div class="icons">
                            <a href="#" class="fas fa-heart"></a>
                            <input type="submit" class="cart-btn" value="add to cart" name="add_to_cart">
                        </div> -->
                    </div>
                    <div class="content">
                        <h3><?php echo $fetch_favorite['name']; ?></h3>
                        <input type="hidden" name="product_name" value="<?php echo $fetch_favorite['name']; ?>">
                        <input type="hidden" name="product_price" value="<?php echo $fetch_favorite['price']; ?>">
                        <div class="price" name="product_price">₹<?php echo number_format($fetch_favorite['price'],2); ?>/-<span></span> </div>
                        <input type="hidden" name="product_image" value="<?php echo $fetch_favorite['image']; ?>">
                        <td>
                            <a href="favorite.php?remove=<?php echo $fetch_favorite['id']; ?>" onclick="return confirm('remove item from favorite list?')" class="delete-btn"> <i class="fas fa-trash"></i> remove</a>
                        </td>
                    </div>
                </div>
                
            </form>

            <?php   
                    };
                };
            ?>        
        </div>
    </idv>
    
<!-- custom js file link  -->
<script src="js/admin_script.js"></script>
</body>
</html>