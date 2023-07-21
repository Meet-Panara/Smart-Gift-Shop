<?php

@include 'config.php';
session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:login.php');
};

if(isset($_POST['add_product'])){
   $p_name = trim($_POST['p_name']);
   $category = $_POST['category'];
   $p_price = $_POST['p_price'];
   $p_image = $_FILES['p_image']['name'];
   $p_image_tmp_name = $_FILES['p_image']['tmp_name'];
   $p_image_folder = 'uploaded_img/'.$p_image;

   
   // $insert_query = mysqli_query($conn, "INSERT INTO `products`(name, price, image) VALUES('$p_name', '$p_price', '$p_image')") or die('query failed');
  
   $select_products = mysqli_query($conn, "SELECT * FROM `products` WHERE name = '$p_name'");
   if(mysqli_num_rows($select_products) > 0){
      $message[] = 'product already added to products';
   }else{
      move_uploaded_file($p_image_tmp_name, $p_image_folder);
      $insert_query = mysqli_query($conn, "INSERT INTO `products`(name, category, price, image) VALUES('$p_name','$category', '$p_price', '$p_image')") or die('query failed');
      $message[] = 'product added succesfully';
   }

   // $select_disactive_query = mysqli_query($conn, "SELECT * FROM `disactive` WHERE name = '$p_name'");
   // if(mysqli_num_rows($select_disactive_query) > 0){
   //    $disactive_update_query = mysqli_query($conn, "UPDATE `disactive` SET name = '$p_name', category = '$category', price = '$p_price', image = '$p_image' WHERE name = '$p_name'");
   // }else{
   //    $insert_disactive_query = mysqli_query($conn, "INSERT INTO `disactive` (name, category, price, image) VALUES('$p_name','$category', '$p_price', '$p_image')") or die('query failed');
   //    // $message[] = 'product added to disactive products succesfully';
   // };
};

// if(isset($_GET['delete'])){
//    $delete_id = $_GET['delete'];
//    // $delete_name = $_GET['prod_name'];

//    $select_products = mysqli_query($conn, "SELECT * FROM `products` WHERE id = '$delete_id'");
//    $insert_disactive_query = mysqli_query($conn, "INSERT INTO `disactive` (name) VALUES('$delete_name')") or die('query failed');

//    $delete_query = mysqli_query($conn, "DELETE FROM `products` WHERE id = '$delete_id' ") or die('query failed');
//    if($delete_query){
//       header('location:add_products.php');
//       $message[] = 'product has been deleted';
//    }else{
//       header('location:add_products.php');
//       $message[] = 'product could not be deleted';
//    };
// };

if(isset($_POST['update_product'])){
   $update_p_id = $_POST['update_p_id'];
   $update_p_name = $_POST['update_p_name'];
   $update_category = $_POST['update_category'];
   $update_p_price = $_POST['update_p_price'];
   $update_p_image = $_FILES['update_p_image']['name'];
   $update_p_image_tmp_name = $_FILES['update_p_image']['tmp_name'];
   $update_p_image_folder = 'uploaded_img/'.$update_p_image;

   $update_query = mysqli_query($conn, "UPDATE `products` SET name = '$update_p_name', category = '$update_category', price = '$update_p_price', image = '$update_p_image' WHERE id = '$update_p_id'");

   if($update_query){
      move_uploaded_file($update_p_image_tmp_name, $update_p_image_folder);
      $message[] = 'product updated succesfully';
      header('location:add_products.php');
      mysqli_query($conn, "INSERT INTO `$update_category` (name, price, image) VALUES('$update_p_name', '$update_p_price', '$update_p_image')");
   }else{
      $message[] = 'product could not be updated';
      header('location:add_products.php');
   }

   $disactive_update_query = mysqli_query($conn, "UPDATE `disactive` SET name = '$update_p_name', category = '$update_category', price = '$update_p_price', image = '$update_p_image' WHERE name = '$update_p_name'");
   
   if($disactive_update_query){
      move_uploaded_file($update_p_image_tmp_name, $update_p_image_folder);
      $message[] = 'product updated succesfully';
      header('location:add_products.php');
   }else{
      $message[] = 'product could not be updated';
      header('location:add_products.php');
   }
}

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
   
<?php

if(isset($message)){
   foreach($message as $message){
      echo '<div class="message"><span>'.$message.'</span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>';
   };
};

?>

<?php include 'header.php'; ?>

<div class="container">

<section>

<form action="" method="post" class="add-product-form" enctype="multipart/form-data">
   <h3>add a new product</h3>
   <input type="text" name="p_name" placeholder="enter the product name" class="box" required>
   <input type="number" name="p_price" min="0" placeholder="enter the product price" class="box" required>
   
   <!-- special -->

   <select name="category" class="box" required>
      <!-- <option>...select category...</option> -->
      <?php
      $select_categories = mysqli_query($conn, "SELECT * FROM `categories`");
      if(mysqli_num_rows($select_categories) > 0){
         while($fetch_category = mysqli_fetch_assoc($select_categories)){
      ?>
      <option value="<?php echo $fetch_category['name']; ?>" ><?php echo $fetch_category['name']; ?></option>
      <?php
         };
      };
      ?>
      <!-- ?php
      
      $res = mysqli_query($conn, "SELECT * FROM `categories`");
      while($row=mysqli_fetch_assoc($res)){
         echo "<option value=".$row['name'].">".$row['name']."</option>";   
      }

      ?> -->
   </select>
   
   

   <input type="file" name="p_image" accept="image/png, image/jpg, image/jpeg" class="box" required>
   <input type="submit" value="add the product" name="add_product" class="btn">
</form>

</section>

<section class="display-product-table">

   <table>

      <thead>
         <th>product image</th>
         <th>product category</th>
         <th>product name</th>
         <th>product price</th>
         <th>action</th>
      </thead>

      <tbody>
         <?php
            // $name=$fetch_category['name'];
            $select_products = mysqli_query($conn, "SELECT * FROM `products`");
            if(mysqli_num_rows($select_products) > 0){
               while($row = mysqli_fetch_assoc($select_products)){
         ?>

         <tr>
            <td><img src="uploaded_img/<?php echo $row['image']; ?>" height="100" alt=""></td>
            <td><?php echo $row['category']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td>Rs.<?php echo $row['price']; ?>/-</td>
            <td>
               <a href="add_products.php?delete=<?php echo $row['id'];?><?php $delete_name=$row['name']; $delete_category=$row['category']; $delete_price=$row['price']; $delete_image=$row['image']; ?>" class="delete-btn" onclick="return confirm('are your sure you want to delete this?');"> <i class="fas fa-trash"></i> disactive </a>
               <a href="add_products.php?edit=<?php echo $row['id']; ?>" class="option-btn"> <i class="fas fa-edit"></i> update </a>
               
            </td>
         </tr>

         <?php
            };    
            }else{
               echo "<div class='empty'>no product added</div>";
            };
         ?>
      </tbody>
   </table>

</section>

<section class="edit-form-container">

   <?php
   
   if(isset($_GET['edit'])){
      $edit_id = $_GET['edit'];
      $edit_query = mysqli_query($conn, "SELECT * FROM `products` WHERE id = $edit_id");
      if(mysqli_num_rows($edit_query) > 0){
         while($fetch_edit = mysqli_fetch_assoc($edit_query)){
   ?>

   <form action="" method="post" enctype="multipart/form-data">
      <img src="uploaded_img/<?php echo $fetch_edit['image']; ?>" height="200" alt="">
      <input type="hidden" name="update_p_id" value="<?php echo $fetch_edit['id']; ?>">
      <input type="text" class="box" required name="update_p_name" value="<?php echo $fetch_edit['name']; ?>">
      <select name="update_category" class="box" required>
      <!-- <option>...select category...</option> -->
      <?php
      $select_categories = mysqli_query($conn, "SELECT * FROM `categories`");
      if(mysqli_num_rows($select_categories) > 0){
         while($fetch_category = mysqli_fetch_assoc($select_categories)){
      ?>
      <option value="<?php echo $fetch_category['name']; ?>" ><?php echo $fetch_category['name']; ?></option>
      <?php
         };
      };
      ?>
   </select>
      <input type="number" min="0" class="box" required name="update_p_price" value="<?php echo $fetch_edit['price']; ?>">
      <input type="file" class="box" required name="update_p_image" accept="image/png, image/jpg, image/jpeg">
      <input type="submit" value="update the prodcut" name="update_product" class="btn">
      <a href="add_products.php"><input type="reset" value="cancel" id="close-edit" class="option-btn"></a>
   </form>

   <?php
            };
         };
         echo "<script>document.querySelector('.edit-form-container').style.display = 'flex';</script>";
      };
      
      if(isset($_GET['delete'])){
         $delete_id = $_GET['delete'];
      
         $select_products = mysqli_query($conn, "SELECT * FROM `products` WHERE id = '$delete_id'");
         
         // $insert_disactive_query = mysqli_query($conn, "INSERT INTO `disactive` (name, category, price, image) VALUES('$delete_name', '$delete_category', '$delete_price', '$delete_image')") or die('query failed');
      
         $select_disactive_query = mysqli_query($conn, "SELECT * FROM `disactive` WHERE name = '$delete_name'");
         if(mysqli_num_rows($select_disactive_query) > 0){
            $disactive_update_query = mysqli_query($conn, "UPDATE `disactive` SET name = '$delete_name', category = '$delete_category', price = '$delete_price', image = '$delete_image' WHERE name = '$delete_name'");
         }else{
            $insert_disactive_query = mysqli_query($conn, "INSERT INTO `disactive` (name, category, price, image) VALUES('$delete_name','$delete_category', '$delete_price', '$delete_image')") or die('query failed');
            // $message[] = 'product added to disactive products succesfully';
         };

         $delete_query = mysqli_query($conn, "DELETE FROM `products` WHERE id = '$delete_id' ") or die('query failed');
         if($delete_query){
            header('location:add_products.php');
            $message[] = 'product has been deleted';
         }else{
            header('location:add_products.php');
            $message[] = 'product could not be deleted';
         };
      };
   ?>

</section>

</div>


<!-- custom js file link  -->
<script src="js/admin_script.js"></script>
<script src="js_admin/script.js"></script>

</body>
</html>