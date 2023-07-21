<?php

include 'config.php';
session_start();
$_SESSION['category'] = ['category'];

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
    
    <section class="categories" id="categories">
        
        <h1 class="heading">All<span> categories</span> </h1>
        
        <div class="box-container">
            
            <?php  
                $select_categories = mysqli_query($conn, "SELECT * FROM `categories`");
                if(mysqli_num_rows($select_categories) > 0){
                    while($fetch_category = mysqli_fetch_assoc($select_categories)){
            ?>

            <form method="post">
                <div class="box">
                    <a href="category_product.php?category_name=<?php echo $fetch_category['name'];?>" ><div class="image">
                        <img src="../admin/uploaded_img/<?php echo $fetch_category['image']; ?>" alt="" >
                        <h3><?php echo $fetch_category['name']; ?></h3>
                        <input type="hidden" name="product_image" value="<?php echo $fetch_category['image']; ?>">
                        
                        <!-- <div class="content">
                            <h3>
                                <input type="hidden" name="product_name" value="?php echo $fetch_category['name']; ?>">
                            </h3>
                        </div> -->
                    </div></a>
                </div>
                
            </form>

            <?php   
                    };
                };
            ?>
        </div>

    </section>

    
    <script src="js/admin_script.js"></script>

</body>
</html>