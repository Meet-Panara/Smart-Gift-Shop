<?php
@include 'config.php';
?>

<header class="header">

    <div class="flex">

        <!-- <a href="user_home.php" class="logo">flowers.</a> -->
        <a href="user_home.php" class="logo">Smart Gift shop.</a>
        <nav class="navbar">
            <ul>
                <li><a href="user_home.php">home</a></li>
                <li><a href="about.php">about</a></li>
                <li><a href="category.php">category</a></li>
                <li><a href="product.php">products</a></li>
                <li><a href="user_order.php">orders</a></li>
                <!-- <li><a href="#">account +</a>
                    <ul>
                        <li><a href="user_login.php">login</a></li>
                        <li><a href="user_register.php">register</a></li>
                    </ul>
                </li> -->
            </ul>
        </nav>

        <div class="icons">
            <div id="menu-btn" class="fas fa-bars"></div>
            <!-- <div id="user-btn" href=user_login.php"" class="fas fa-user"></div> -->
            <a href="user_profile.php"><i class="fas fa-user"></i><span></span></a>
            <a href="favorite.php"><i class="fas fa-heart"></i><span></span></a>
            <a href="cart.php"><i class="fas fa-shopping-cart"></i><span></span></a>
        </div>

        <!-- <div class="account-box">
            <p>username : <span>?php echo $_SESSION['user_name']; ?></span></p>
            <p>email : <span>?php echo $_SESSION['user_email']; ?></span></p>
            <a href="logout.php" name="logout" class="delete-btn">logout</a>
        </div> -->

    </div>

</header>