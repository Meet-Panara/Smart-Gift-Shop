<?php
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

    <div class="about" id="about" >

        <h1 class="heading"> about<span> us</span> </h1>

        <div class="row">

            <div class="video-container">
                <video src="https://media.istockphoto.com/videos/unwrapping-gift-stop-motion-animation-chroma-key-video-id1324747343?s=mp4-480x480-is" loop autoplay muted></video>
                <h3>best Gift Product sellers</h3>
            </div>

            <div class="content">
                <h3>why choose us?</h3>
                <p>Cause of the best quallity</p>
                <p>And the best services</p>
            </div>

        </div>

    </div>

    <section class="icons-container">

        <div class="icons">
            <img src="css/images/free-delivery.png" alt="">
            <div class="info">
                <h3>free delivery</h3>
                <span>on all orders</span>
            </div>
        </div>
    
        <div class="icons">
            <img src="css/images/10_days_return.png" alt="">
            <div class="info">
                <h3>10 days returns</h3>
                <span>moneyback guarantee</span>
            </div>
        </div>
    
        <div class="icons">
            <img src="css/images/offers.png" alt="">
            <div class="info">
                <h3>offer & gifts</h3>
                <span>on all orders</span>
            </div>
        </div>
       
    </section>

    <script src="js/admin_script.js"></script>

</body>
</html>