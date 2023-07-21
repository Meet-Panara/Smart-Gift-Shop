<?php

@include 'config.php';

session_start();
session_unset();
session_destroy();
session_abort();
mysqli_query($conn, "UPDATE `users` SET mode = 'disactive'");
header('location:login.php');

?>